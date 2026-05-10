<?php

use Livewire\Component;

new class extends Component
{
    public $imageSrc;
    public $width;
    public $height;

    public function mount(string $imageSrc, int $width, int $height)
    {
        $this->imageSrc = $imageSrc;
        $this->width = $width;
        $this->height = $height;
    }
};

