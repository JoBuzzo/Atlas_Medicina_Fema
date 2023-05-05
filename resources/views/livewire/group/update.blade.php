<div>
    <form wire:submit.prevent='saveGroup'>
        <input type="text" placeholder="title" wire:model='titleGroup' class="text-black">
        @error('titleGroup')
            {{ $message }}
        @enderror


        <ul class="px-3 pb-3 overflow-y-auto text-sm text-gray-700 max-h-48 dark:text-gray-200">
            @forelse ($categories as $category)
                <li class="flex items-center p-2 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                    <div class="flex items-center w-full pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="checkbox={{ $category->id }}" type="checkbox" value="{{ $category->id }}"
                            wire:model="selected_categories"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded cursor-pointer focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox={{ $category->id }}"
                            class="block w-full ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300">
                            {{ $category->name }}
                        </label>
                    </div>
                </li>
            @empty
                <li class="w-full pl-4 mt-2">
                    <p class="text-sm font-semibold">Não encontrado</p>
                </li>
            @endforelse
        </ul>
        @error('selected_categories')
            <span class="block mt-2 text-xs font-medium text-red-600 lg:inline-block dark:text-red-400">{{ $message }}</span>
        @enderror

        <button>Submit</button>
    </form>

    @foreach ($images as $image)
        <div>
            <span>{{ $image->title }}</span>
            <img class="w-44" src="{{ $image->image }}" alt="{{ $image->title }}">
            <span>{{ $image->description }}</span>
        </div>
    @endforeach

    
</div>

