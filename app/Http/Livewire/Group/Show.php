<?php

namespace App\Http\Livewire\Group;

use App\Models\Group;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.group.show');
    }

    public $group;
    public $images;
    public function mount($id)
    {
        $this->group = Group::with('images')->find($id);
        $this->images = $this->group->images;
    }
}
