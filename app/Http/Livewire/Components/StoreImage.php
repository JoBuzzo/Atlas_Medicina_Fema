<?php

namespace App\Http\Livewire\Components;

use App\Models\Group;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class StoreImage extends Component
{

    use WithFileUploads;
    
    public function render()
    {
        return view('livewire.components.store-image');
    }

    public $group;
    public function mount($id)
    {
        $this->group = Group::find($id);
    }

    public $show;
    public function show()
    {
        $this->show = !$this->show;
    }


    public $image, $title, $description;
    public function save()
    {

        $this->validate([
            'title' => 'nullable|string',
            'image' => 'required|image',
            'description' => 'nullable|string',
        ]);

        $nameFile = Str::slug($this->title) . date("Ymdhis") . "." . $this->image->getClientOriginalExtension();
        $this->image->storeAs('public/images', $nameFile);

        $this->group->images()->create([
            'image' => $nameFile,
            'title' => $this->title,
            'description' => $this->description
        ]);

        session()->flash('msg', 'Imagem adicionada com sucesso.');
        $this->emit('ImageUpdated', $this->group->id);
        $this->reset(['title', 'image', 'description', 'show']);

    }
}
