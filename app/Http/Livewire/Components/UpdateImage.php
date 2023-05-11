<?php

namespace App\Http\Livewire\Components;

use App\Models\Image;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class UpdateImage extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.components.update-image');
    }

    public $img;
    public $title;
    public $description;
    public $newImage;

    public function mount($id)
    {
        $this->img = Image::find($id);
        $this->description = $this->img->description;
        $this->title = $this->img->title;
    }

    public $show;
    public function show()
    {
        $this->show = !$this->show;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string',
            'newImage' => 'nullable|image',
            'description' => 'required|string',
        ]);

        if($this->newImage){
            unlink(storage_path('app/public/images/' . $this->img->getRawOriginal('image')));
            $nameFile = Str::slug($this->title) . date("Ymdhis") . "." . $this->newImage->getClientOriginalExtension();

            $this->newImage->storeAs('public/images', $nameFile);

            $this->img->update([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $nameFile,
            ]);

        }else{
            $this->img->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
        }
        
        session()->flash('msg', 'Imagem editada com sucesso.');
        $this->reset('show');
        $this->emit('ImageUpdated', $this->img->group_id);
    }
}
