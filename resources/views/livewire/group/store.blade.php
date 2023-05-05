<div>
    <div class="bg-white shadow dark:bg-gray-800">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="sm:flex sm:flex-row sm:items-center sm:gap-6">
                <button wire:click="show"
                    class="flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                    Adicionar categoria
                </button>
                {{-- @if ($show)
                    <div class="relative flex flex-col">
                        <form wire:submit.prevent="saveCategory" class="items-center mt-4 sm:flex sm:mt-0">
                            <div class="mb-3 sm:mb-0">
                                <input type="text" wire:model="category" placeholder="Digite aqui..."
                                    class="w-56 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                            </div>
                            <button type="submit"
                                class="sm:ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirmar</button>
                        </form>
                        @error('category')
                            <span
                                class="sm:absolute sm:bottom-[-18px] mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if (session()->has('msg'))
                    <livewire:components.toast />
                @endif --}}
            </div>

        </div>
    </div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <div class="flex flex-col gap-10">
                        <form wire:submit.prevent="saveGroup">
                            <h2 class="text-3xl font-bold mb-4">Grupo</h2>
                            <div class="flex flex-col md:flex-row md:items-end justify-between w-full gap-6">
                                <div class="w-full md:w-1/2">
                                    <label for="titleGroup" class="text-sm font-semibold dark:text-white">Titulo</label>
                                    <input type="text" wire:model='titleGroup' id="titleGroup"
                                        placeholder="Digite aqui..."
                                        class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('titleGroup')
                                        <span
                                            class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex items-end w-full md:gap-8 md:w-1/2 justify-between">
                                    <div x-data="{ open: false }" class="relative">
                                        <p class="text-sm font-semibold dark:text-white">Categorias</p>
                                        <button x-on:click="open = ! open"
                                            class="z-10 inline-flex items-center flex-shrink-0 h-12 px-4 mt-3 text-sm font-medium text-center text-gray-900 border border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                            type="button">
                                            @if (count($selected_categories) > 0)
                                                {{ count($selected_categories) }} categorias
                                            @else
                                                Escolha aqui
                                            @endif
                                            <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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
                                            class="absolute z-10 w-56 overflow-hidden bg-white rounded-lg shadow top-24 dark:bg-gray-700">
                                            <div class="p-3 border-b border-gray-200 dark:border-gray-600">
                                                <label for="input-group-search" class="sr-only">Search</label>
                                                <div class="relative">
                                                    <div
                                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                                            aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
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
                                            <ul
                                                class="px-3 pb-3 overflow-y-auto text-sm text-gray-700 max-h-48 dark:text-gray-200">
                                                @forelse ($categories as $category)
                                                    <li
                                                        class="flex items-center p-2 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600">
                                                        <div
                                                            class="flex items-center w-full pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                            <input id="checkbox={{ $category->id }}" type="checkbox"
                                                                value="{{ $category->id }}"
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
                                            <div
                                                class="flex items-center p-3 text-sm font-medium text-red-600 border-t border-gray-200 rounded-b-lg dark:border-gray-600 dark:bg-gray-700 ">
                                            </div>
                                        </div>
                                        @error('selected_categories')
                                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                            type="submit">
                                            Confirmar
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                        <form wire:submit.prevent='saveImage'>
                            <div class="flex justify-between items-center">
                                <h2 class="text-3xl font-bold mb-4">Imagens</h2>
                                <button wire:click="resetImages"
                                    class="flex items-center gap-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    type="submit">
                                    Nova imagem
                                </button>
                            </div>
                            <div class="w-ful flex flex-col items-end">

                                <div
                                    class="flex flex-col md:flex-row gap-8 w-full items-center md:items-start md:justify-between">
                                    <div class="flex w-full md:w-1/2 flex-col gap-5 justify-between">

                                        <div>
                                            <p class="text-sm font-semibold dark:text-white">Imagem</p>
                                            <div class="flex items-center  w-full h-96 mt-3 relative">
                                                <label for="image"
                                                    class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div
                                                        class="flex flex-col items-center justify-center pt-5 pb-6 z-10">
                                                        @if (isset($image))
                                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                                </path>
                                                            </svg>
                                                            <div>
                                                                <p class="mb-2 text-sm text-gray-400">
                                                                    <span class="font-semibold">Clique para fazer
                                                                        upload</span>
                                                                </p>
                                                                <p class="text-xs text-gray-400">
                                                                    SVG, PNG,
                                                                    JPG
                                                                    (MAX. 800x400px)</p>
                                                            </div>
                                                        @else
                                                            <svg aria-hidden="true"
                                                                class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                                </path>
                                                            </svg>
                                                            <div>
                                                                <p
                                                                    class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                                    <span class="font-semibold">Clique para fazer
                                                                        upload</span>
                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    SVG, PNG,
                                                                    JPG
                                                                    (MAX. 800x400px)</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <input wire:model="image" id="image" type="file"
                                                        class="hidden" />
                                                    @isset($image)
                                                        <img class="h-full w-full absolute object-scale-down brightness-50"
                                                            src="{{ $image->temporaryUrl() }}" alt="">
                                                    @endisset
                                                </label>
                                            </div>
                                            @error('image')
                                                <span
                                                    class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="titleImage"
                                                class="text-sm font-semibold dark:text-white">Titulo
                                                imagem</label>
                                            <input type="text" wire:model="titleImage" id="titleImage"
                                                placeholder="Digite aqui..."
                                                class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @error('titleImage')
                                                <span
                                                    class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="w-full md:w-1/2">
                                        <label for=""
                                            class="text-sm font-semibold dark:text-white">Descrição</label>
                                        <textarea wire:model="description"
                                            class="mt-3 block p-2.5 w-full h-80 md:h-96 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Digite aqui..."></textarea>
                                        @error('description')
                                            <span
                                                class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-full text-center">
                                <button type="reset"
                                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                    Cancelar
                                </button>
                                <button
                                    class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    type="submit">
                                    Confirmar
                                </button>
                            </div>
                        </form>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
