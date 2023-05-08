<?php

namespace App\Http\Livewire\Components;

use App\Models\Image;
use Livewire\Component;

class DeleteImage extends Component
{
    public function render()
    {
        return view('livewire.components.delete-image');
    }

    public $image;
    public function mount($id)
    {
        $this->image = Image::find($id);
    }

    public function delete()
    {
        unlink(storage_path('app/public/images/' . $this->image->getRawOriginal('image')));

        $this->emit('ImageUpdated', $this->image->group_id);
        $this->image->delete();
        

        session()->flash('msg', 'Imagem deletada com sucesso.');
        $this->reset('show');
    }

    public $show;
    public function show()
    {
        $this->show = !$this->show;
    }
}
