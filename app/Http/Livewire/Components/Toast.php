<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Toast extends Component
{
    public $visible = true;

    public function render()
    {
        return view('livewire.components.toast');
    }

    public function show(){
        $this->visible = !$this->visible;
    }
}
