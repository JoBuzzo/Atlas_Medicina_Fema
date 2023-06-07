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
        $group = Group::find($id);
        $fileName = Str::slug($group->title);


        $data = [
            'group' => $group,
            'images' => $group->images,
        ];

        return PDF::loadView('pdf', $data)->stream();

        // return response()->streamDownload(
        //     fn () => print($pdfContent),
        //     "$fileName.pdf"
        // );
    }
}
