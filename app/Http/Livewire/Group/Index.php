<?php

namespace App\Http\Livewire\Group;

use App\Models\Category;
use App\Models\Group;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $search_category = '';
    public $categories;
    public $selected_categories = [];

    public function mount()
    {
        $this->categories = Category::orderBy('name', 'asc')->get();
    }

    public function render()
    {
        $this->categories = Category::where('name', 'LIKE', "%{$this->search_category}%")->orderBy('name', 'asc')->get();

        $groups = Group::query()
            ->when($this->selected_categories, function ($query) {
                return $query->whereHas('categories', function ($q) {
                    $q->whereIn('categories.id', $this->selected_categories);
                });
            })
            ->when($this->search, function ($query) {
                return $query->where('groups.title', 'LIKE', "%{$this->search}%");
            })
            ->leftJoin('images', function ($join) {
                $join->on('groups.id', '=', 'images.group_id')
                    ->whereRaw('images.id = (select min(id) from `images` where `images`.`group_id` = `groups`.`id`)');
            })
            ->with('categories')
            ->selectRaw('`groups`.*, `images`.`image` as `image_path`')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $this->resetPage();

        return view('livewire.group.index', [
            'groups' => $groups
        ]);
    }
}
