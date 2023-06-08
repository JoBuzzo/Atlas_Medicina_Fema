<?php

namespace App\Http\Livewire;

use App\Jobs\GeneratePDFJob;
use App\Models\Group;
use Livewire\Component;

class PdfStore extends Component
{
    public $groupId;
    public $pdfGenerationInProgress = false;

    public function mount($id)
    {
        $this->groupId = $id;
    }

    public function render()
    {
        return view('livewire.pdf');
    }

    public function startPdfGeneration()
    {
        $this->pdfGenerationInProgress = true;

        $group = Group::with('images')->find($this->groupId);
        GeneratePDFJob::dispatch($group)->delay(now()->addSeconds(15));
    }
}
