<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class PdfStore extends Component
{
    public function render()
    {
        return view('livewire.pdf');
    }

    public function teste($id)
    {
        $group = Group::with('images')->find($id);

        return PDF::loadView('pdf', compact('group'))->stream();
    }
}
