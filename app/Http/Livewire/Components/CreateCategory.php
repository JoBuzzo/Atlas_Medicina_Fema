<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class CreateCategory extends Component
{
    public function render()
    {
        return view('livewire.components.create-category');
    }

    public $category, $show = false;
    public function saveCategory()
    {
        $this->validate([
            'category' => 'required|min:2|unique:categories,name',
        ], [
            'category.required' => "O campo categoria é obrigatório",
            'category.min' => "O campo categoria deve ter no mínimo 2 caracteres",
            'category.unique' => "Essa categoria já está registrada.",
        ]);

        Category::create([
            'name' => $this->category
        ]);

        session()->flash('msg', 'Categoria adicionada com sucesso.');
        $this->reset('category');
        $this->reset('show');
        $this->emit('AddedCategory');
    }

    public function show()
    {
        $this->show = !$this->show;
    }
}
