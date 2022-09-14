<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Str;

class SlugInput extends Component
{
    public $text;
    public $name;
    public $classes;
    public $inputId;

    public function updatedText()
    {
        $this->text = Str::slug($this->text);
    }

    public function mount($name, $inputId = '', $classes = '')
    {
        $this->name = $name;
        $this->inputId = $inputId;
        $this->classes = $classes;
    }

    public function render()
    {
        $classes = $this->classes;
        $name = $this->name;
        $inputId = $this->inputId;
        return view('livewire.partials.slug-input', compact('classes', 'name', 'inputId'));
    }
}
