<?php

use Livewire\Component;

new class extends Component
{
    public $width;

    public function mount(string $width)
    {
        $this->width = $width;
    }
};

