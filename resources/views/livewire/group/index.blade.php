<div>
    <div class="bg-white shadow dark:bg-gray-800">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative flex" x-data="{ open: false }">
                <button x-on:click="open = ! open"
                    class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                    type="button">
                    Todas categorias
                    <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"clip-rule="evenodd">
                        </path>
                    </svg>
                </button>
                <div x-cloak x-show="open" @click.away="open = false"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="absolute z-10 w-56 overflow-hidden bg-white rounded-lg shadow top-14 dark:bg-gray-700">
                    
                    <div class="p-3 border-b border-gray-200 dark:border-gray-600">
                        <label for="input-group-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="search" wire:model="search_category"
                                class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Pesquisar categoria">
                        </div>
                    </div>
                    <ul class="p-3 overflow-y-auto text-sm text-gray-700 max-h-48 dark:text-gray-200">
                        @forelse ($categories as $category)
                            <li
                                class="flex items-center p-2 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                                <div
                                    class="flex items-center w-full pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
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
                    <div class="flex items-center p-3 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg dark:border-gray-600 dark:bg-gray-700 "></div>
                </div>
                <div class="relative w-full">

                    <input type="search" wire:model="search"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="Digite aqui..." required>

                </div>
            </div>
            @if (session()->has('msg'))
                <livewire:components.toast />
            @endif
        </div>
    </div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 ">
            @if (count($groups) == 0)
                <div class="flex justify-center w-full">
                    <div
                        class="flex flex-col items-center w-4/5 p-12 bg-white rounded shadow-lg sm:w-full dark:bg-gray-800 sm:flex-row sm:justify-center">
                        <img class="w-20 h-20 mb-5 sm:mb-0" src="{{ asset('img/nothing-found.png') }}" alt="">
                        <div class="sm:ml-24">
                            <h1 class="m-0 text-2xl sm:text-3xl">Não há imagens que correspondam à sua busca</h1>
                            <div class="sm:ml-6">
                                <ul class="mt-3 list-disc">
                                    <li>
                                        Revise a ortografia da palavra.
                                    </li>
                                    <li>
                                        Utilize palavras mais genéricas ou menos palavras.
                                    </li>
                                    <li>
                                        Navegue pelas categorias para encontrar uma imagem.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @isset($groups)
                <div class="grid grid-cols-1 gap-10 mx-auto sm:px-6 sm:grid-cols-2 lg:px-8 lg:grid-cols-3">
                    @foreach ($groups as $gp)
                        <x-card id="{{ $gp->id }}" image="{{ $gp->image_path }}" title="{{ $gp->title }}"
                            description="{{ $gp->description }}" :categories="$gp->categories->take(3)" />
                    @endforeach
                </div>

                <div class="flex justify-center w-full gap-6 mt-16">
                    <div class="w-[65%] sm:w-full">

                        {{ $groups->links('livewire::tailwind') }}

                    </div>
                </div>
            @endisset

        </div>

    </div>
</div>
