<div>
    <button wire:click="show"
        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
        Editar
    </button>
    @if ($show)
        <div
            class=" bg-[#000000bd] overflow-y-auto block fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-modal h-full">
            <div
                class="absolute w-full h-full max-w-sm p-4 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <div class="relative w-full max-h-full">
                    <!-- Modal content -->
                    <div class="relative w-full bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Atualizar Grupo
                            </h3>
                            <button type="button" wire:click="show"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Fechar modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form wire:submit.prevent='saveGroup'>
                            <div class="p-6">
                                <div class="w-ful mb-6">
                                    <label for="titleGroup" class="text-sm font-semibold dark:text-white">Titulo</label>
                                    <input type="text" wire:model='titleGroup' id="titleGroup"
                                        placeholder="Digite aqui..."
                                        class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('titleGroup')
                                        <span
                                            class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex items-end justify-between w-full">
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
                                </div>

                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center justify-center gap-8 p-6 border-t border-gray-200 rounded-b dark:border-gray-600 ">
                                <button wire:click="show" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancelar</button>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
