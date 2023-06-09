<div>
    @if (session()->has('msg'))
        <livewire:components.toast />
    @endif
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 mx-auto sm:px-6 lg:px-8">

                <div class="">
                    <div class="flex flex-col gap-10">
                        <div class="flex items-center justify-between">
                            <h2 class="text-3xl font-bold">Grupo</h2>
                            <button wire:click="resetGroup"
                                class="flex items-center gap-1 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Novo grupo
                            </button>
                        </div>
                        <form wire:submit.prevent="saveGroup">
                            <div class="flex flex-col justify-between w-full gap-6 md:flex-row md:items-end">
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
                                <div class="flex items-end justify-between w-full md:gap-8 md:w-1/2">
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
                                                    <input id="input-group-search" type="search" wire:model="search_category"
                                                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Pesquisar categoria">
                                                </div>
                                            </div>
                                            <ul
                                                class="px-3 py-3 overflow-y-auto text-sm text-gray-700 max-h-48 dark:text-gray-200">
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
                                            <livewire:components.create-category />
                                        </div>
                                        @error('selected_categories')
                                            <p class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    @if (!$group)
                                        <div class="text-center">
                                            <button
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                                type="submit">
                                                Confirmar
                                            </button>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </form>

                        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                        <form wire:submit.prevent='saveImage'>
                            <div class="flex items-center justify-between">
                                <h2 class="mb-4 text-3xl font-bold">Imagens</h2>
                            </div>
                            <div class="flex flex-col items-end w-ful">

                                <div
                                    class="flex flex-col items-center w-full gap-8 md:flex-row md:items-start md:justify-between">
                                    <div class="flex flex-col justify-between w-full gap-5 md:w-1/2">

                                        <div>
                                            <p class="text-sm font-semibold dark:text-white">Imagem</p>
                                            <div class="relative flex items-center w-full mt-3 h-96">
                                                <label for="image"
                                                    class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                    <div
                                                        class="z-10 flex flex-col items-center justify-center pt-5 pb-6">
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
                                                                <p class="text-xs text-center text-gray-400">
                                                                    SVG, PNG, JPG
                                                                </p>
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
                                                                <p class="text-xs text-center text-gray-500 dark:text-gray-400">
                                                                    SVG, PNG,
                                                                    JPG
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <input wire:model="image" id="image" type="file"
                                                        class="hidden" />
                                                    @isset($image)
                                                        <img class="absolute object-scale-down w-full h-full brightness-50"
                                                            src="{{ $image->temporaryUrl() }}" alt="">
                                                    @endisset
                                                </label>
                                            </div>
                                            @error('image')
                                                <span
                                                    class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="w-full md:w-1/2">
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

                                        <div class="mt-6">
                                            <label for="description"
                                                class="text-sm font-semibold dark:text-white">Descrição</label>
                                            <textarea wire:model="description" id="description"
                                                class="mt-3 block p-2.5 w-full h-[275px] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Digite aqui..."></textarea>
                                            @error('description')
                                                <span
                                                    class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($group)
                                <div class="w-full text-center">
                                <button type="reset"
                                    class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                    Cancelar
                                </button>
                                <button
                                    class="disable mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    type="submit">
                                    Confirmar
                                </button>
                            </div>
                            @else
                                <div class="mt-6">
                                    <p class="text-center dark:text-gray-200">É necessário criar um grupo antes para enviar as imagens</p>
                                </div>
                            @endif
                        </form>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
