<?php

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Image;
use Livewire\Attributes\Computed;

new #[Title('Gallery')] class extends Component {

    #[Computed]
    public function images()
    {
        return Image::all();
    }
};
