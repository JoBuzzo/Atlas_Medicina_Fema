<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Categories extends Component
{
    use WithPagination;

    public $name;
    public $modalDelete = false;
    public $modalEdit = false;
    public $modalCreate = false;
    public $modalCategory = [];

    public $search;
 
    protected $queryString = ['search'];
    
    public function delete($id)
    {
        $category = Category::find($id);

        DB::table('category_group')->where('category_id', $category->id)->delete();

        $category->delete();

        $this->modalDelete = false;
        session()->flash('msg', 'Categoria excluída com sucesso.');
    }

    public function edit($id)
    {
        $this->validate([
            'name' => ['required','min:2', Rule::unique('categories')->ignore($id)]
        ]);

        $category = Category::find($id);
        $category->update([
            'name' => $this->name,
        ]);
        $this->modalEdit = false;
        $this->reset('name');
        session()->flash('msg', 'Categoria editada com sucesso.');
    }

    public function create()
    {
        $this->validate([
            'name' => "required|min:2|unique:categories,name"
        ]);
        
        Category::create([
            'name' => $this->name,
        ]);

        $this->modalCreate = false;
        $this->reset('name');
        session()->flash('msg', 'Categoria adicionada com sucesso.');
    }

    public function modalEdit($category = null)
    {
        $this->modalEdit = !$this->modalEdit;
        if ($category) {
            $this->name = $category['name'];
            $this->modalEdit = $category;
        }
    }

    public function modalDelete($category = null)
    {
        $this->modalDelete = !$this->modalDelete;
        $this->modalCategory = $category;
        
    }

    public function modalCreate()
    {
        $this->modalCreate = !$this->modalCreate;
        $this->reset('name');
    }



    public function render()
    {

        $categories = Category::where('name', 'like', '%'.$this->search.'%')->paginate(5);


        return view('livewire.categories', [
            'categories' => $categories,
        ]);
    }
}
