<?php

namespace App\Http\Livewire;

use App\Jobs\GeneratePDFJob;
use App\Models\Group;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfStore extends Component
{
    public function render()
    {
        return view('livewire.pdf');
    }

    public function teste($id)
    {
        $group = Group::with('images')->find($id);

        dd(GeneratePDFJob::dispatch($group)->delay(now()->addSeconds(15)));

        return PDF::loadView('pdf', compact('group'))->stream();
    }   

    
    // public function teste1($id)
    // {
    //     $group = Group::with('images')->find($id);

    //     return PDF::loadView('pdf', compact('group'))->stream();
    // }
}
