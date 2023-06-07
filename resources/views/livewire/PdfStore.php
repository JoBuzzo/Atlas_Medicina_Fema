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

    public function download($id)
    {
        $group = Group::find($id);
        $fileName = Str::slug($group->title);


        $data = [
            'group' => $group,
            'images' => $group->images,
        ];

        $pdfContent = PDF::loadView('pdf', $data)->output();

        return response()->streamDownload(
            fn () => print($pdfContent),
            "$fileName.pdf"
        );
    }
}
