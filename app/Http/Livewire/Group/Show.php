<?php

namespace App\Http\Livewire\Group;

use App\Models\Group;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class Show extends Component
{
    public function render()
    {
        return view('livewire.group.show');
    }

    public $group;
    public $images;
    public $categories;

    protected $listeners = ['ImageUpdated' => 'refreshComponent', 'GroupUpdated' => 'refreshComponent'];
    
    public function mount($id)
    {
        if(!$this->group = Group::with('images', 'categories')->find($id)){
            return redirect()->route('images.index');
        }
        $this->images = $this->group->images;
        $this->categories = $this->group->categories;
    }


    public function refreshComponent($id){
        $this->group = Group::with('images', 'categories')->find($id);
        $this->images = $this->group->images;
        $this->categories = $this->group->categories;
    }

    public function pdf()
    {
        $fileName = Str::slug($this->group->title);


        $data = [
            'group' => $this->group,
            'images' => $this->images,
        ];

        $pdfContent = PDF::loadView('pdf', $data)->output();

        return response()->streamDownload(
             fn () => print($pdfContent),
             "$fileName.pdf"
        );

    }
    
}
