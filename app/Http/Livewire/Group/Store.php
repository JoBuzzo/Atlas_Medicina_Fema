<?php

namespace App\Http\Livewire\Group;

use App\Models\Category;
use App\Models\Group;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Store extends Component
{
    use WithFileUploads;

    public $categories, $search_category, $selected_categories = [];

    protected $listeners = ['AddedCategory' => '$refresh'];

    public $validationAttributes = [
        'titleGroup' => 'titulo grupo',
        'selected_categories' => 'categorias',
        'image' => 'imagem',
        'titleImage' => 'titulo imagem',
    ];
    
    public function mount()
    {
        $this->categories = Category::orderBy('name', 'asc')->get();
    }

    public function render()
    {
        $this->categories = Category::where('name', 'LIKE', "%{$this->search_category}%")->orderBy('name', 'asc')->get();
        return view('livewire.group.store');
    }



    public $titleGroup;
    public $group;

    public function saveGroup()
    {
        $this->validate([
            'titleGroup' => 'required|string',
            'selected_categories' => 'required',
        ]);

        $this->group = Group::create([
            'title' => $this->titleGroup,
        ]);

        foreach ($this->selected_categories as $id) {
            $this->group->categories()->attach($id);
        }

        session()->flash('msg', 'Grupo adicionado com sucesso.');
    }


    public $titleImage;
    public $image;
    public $description;

    public function saveImage()
    {
        $this->validate([
            'titleImage' => 'required|string',
            'image' => 'image',
            'titleGroup' => 'required|string',
            'selected_categories' => 'required',
            'description' => 'required|string',
        ]);

        $nameFile = Str::slug($this->titleImage) . date("Ymdhis") . "." . $this->image->getClientOriginalExtension();
        $this->image->storeAs('public/images', $nameFile);

        $this->group->images()->create([
            'image' => $nameFile,
            'title' => $this->titleImage,
            'description' => $this->description
        ]);

        session()->flash('msg', 'Imagem adicionada com sucesso.');
        $this->resetImages();
    }

    public function resetGroup(){
        $this->reset();
    }


    public function resetImages()
    {
        $this->reset('titleImage');
        $this->reset('image');
        $this->reset('description');
    }


    public function updated($propertyName)
    {   
        $this->validateOnly($propertyName, [
            'titleGroup' => 'required|string',
            'titleImage' => 'required|string',
            'image' => 'image',
            'description' => 'required|string',
        ]);
    }

}
