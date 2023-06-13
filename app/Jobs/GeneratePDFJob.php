<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class GeneratePDFJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $group;

 
    public function __construct($group)
    {
        $this->group = $group;
    }


    public function handle()
    {
        $group = $this->group;

        // Lógica para gerar o PDF com as imagens do grupo
        $pdf = PDF::loadView('pdf', compact('group'));

        // Gerar um nome de arquivo único para o PDF
        $pdfFileName = '/public/pdfs/' . $group->id . '.pdf';

        // Salvar o PDF no disco temporário
        Storage::disk('local')->put($pdfFileName, $pdf->output());
    }
}
