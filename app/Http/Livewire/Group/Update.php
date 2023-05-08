<?php

namespace App\Http\Livewire\Group;

use App\Models\Category;
use App\Models\Group;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $group, $titleGroup, $selected_categories = array();
    public $images, $titleImage, $description;


    public $category;
    public $categories;
    public $search_category;

    public function render()
    {
        $this->categories = Category::where('name', 'LIKE', "%{$this->search_category}%")->orderBy('name', 'asc')->get();
        return view('livewire.group.update');
    }

    public function mount($id)
    {
        $this->group = Group::find($id);
        $this->titleGroup = $this->group->title;


        $this->images = $this->group->images;
        $this->categories = Category::orderBy('name', 'asc')->get();
        $this->selected_categories = $this->group->categories->pluck('id')->toArray();
    }

    public function saveGroup()
    {

        $this->validate([
            'titleGroup' => 'required|string|max:60',
            'selected_categories' => 'required',
        ]);

        $this->group->update([
            'title' => $this->titleGroup,
        ]);

        $this->group->categories()->detach();
        foreach ($this->selected_categories as $id) {
            $this->group->categories()->attach($id);
        }

        $this->reset('show');
        $this->emit('GroupUpdated', $this->group->id);
    }



    public function updated($propertyName)
    {   
        $this->validateOnly($propertyName, [
            'titleGroup' => 'required|string|max:60',
        ]);
    }

    public $show;
    public function show()
    {
        $this->show = !$this->show;
    }

}
