<?php

namespace App\Http\Livewire\Components;

use App\Models\Group;
use Livewire\Component;

class DeleteGroup extends Component
{
    public function render()
    {
        return view('livewire.components.delete-group');
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


    public function delete()
    {
        $images = $this->group->images;

        foreach ($images as $image){
            unlink(storage_path('app/public/images/' . $image->getRawOriginal('image')));
        }

        $this->group->images()->delete();

        $this->group->categories()->detach();

        $this->group->delete();

        session()->flash('msg', 'Grupo deletado com sucesso.');
        $this->reset('show');
        return redirect()->route('images.index');
    }

}
