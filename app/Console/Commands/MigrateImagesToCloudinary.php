<?php

namespace App\Console\Commands;

use App\Models\Image;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

#[Signature('images:migrate-cloudinary')]
#[Description('Uploads local images from storage/app/public to Cloudinary and creates new database records.')]
class MigrateImagesToCloudinary extends Command
{
    public function handle()
    {
        $allFiles = Storage::disk('public')->allFiles();

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'];
        $imageFiles = array_filter($allFiles, function ($file) use ($allowedExtensions) {
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            return in_array($extension, $allowedExtensions);
        });

        if (empty($imageFiles)) {
            $this->info('No images found in storage/app/public.');
            return;
        }

        $this->info('Found ' . count($imageFiles) . ' images. Starting upload...');
        $bar = $this->output->createProgressBar(count($imageFiles));
        $bar->start();

        $errors = 0;


        foreach ($imageFiles as $file) {
            try {
                $absoluteLocalPath = Storage::disk('public')->path($file);

                $dimensions = @getimagesize($absoluteLocalPath);
                $width = $dimensions ? $dimensions[0] : null;
                $height = $dimensions ? $dimensions[1] : null;

                $pathWithoutExtension = preg_replace('/\\.[^.]+$/', '', $file);

                $stream = Storage::disk('public')->readStream($file);
                Storage::disk('cloudinary')->writeStream($pathWithoutExtension, $stream);

                $uploadedFileUrl = Storage::disk('cloudinary')->getAdapter()->getUrl($pathWithoutExtension);

                Image::create([
                    'img_url' => $uploadedFileUrl,
                    'width' => $width,
                    'height' => $height,
                ]);
            } catch (\Exception $e) {
                $this->error("\nFailed to process {$file}: " . $e->getMessage());
                $errors++;
            }

            $bar->advance();
        }

        $bar->finish();

        $this->newLine(2);
        $this->info('Migration process complete.');

        if ($errors > 0) {
            $this->warn("There were {$errors} errors. Check the output above.");
        }
    }
}
