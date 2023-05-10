<div>
    <a wire:click='show' class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
        Editar
    </a>

    @if ($show)
        <div
            class=" bg-[#000000bd] overflow-y-auto block fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-modal h-full">
            <div
                class="absolute w-full h-full max-w-lg md:max-w-6xl p-4 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <div class="relative w-full max-h-full">
                    <!-- Modal content -->
                    <div class="relative w-full bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Editar Imagem
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
                        <form wire:submit.prevent="save">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
                                <div>
                                    <p class="text-sm font-semibold dark:text-white">Imagem</p>
                                    <div class="relative flex items-center w-full mt-3 h-64 md:h-96">
                                        <label for="image"
                                            class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="z-10 flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                    </path>
                                                </svg>
                                                <div>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Clique para fazer
                                                            upload</span>
                                                    </p>
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                                        SVG, PNG,
                                                        JPG

                                                    </p>
                                                </div>
                                            </div>
                                            <input wire:model="newImage" id="image" type="file" class="hidden" />
                                            @if (!$newImage)
                                                <img class="absolute object-scale-down w-full h-full brightness-50"
                                                    src="{{ $img->image }}" alt="{{ $title }}">
                                            @else
                                                <img class="absolute object-scale-down w-full h-full brightness-50"
                                                    src="{{ $newImage->temporaryUrl() }}" alt="">
                                            @endif
                                        </label>
                                    </div>
                                    @error('image')
                                        <span
                                            class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <div>
                                        <label for="title" class="text-sm font-semibold dark:text-white">Titulo
                                            imagem</label>
                                        <input type="text" wire:model="title" id="title"
                                            placeholder="Digite aqui..."
                                            class="mt-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('title')
                                            <span
                                                class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for=""
                                            class="text-sm font-semibold dark:text-white">Descrição</label>
                                        <textarea wire:model="description"
                                            class="mt-3 block p-2.5 w-full h-60 md:h-[295px] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Digite aqui..."></textarea>
                                        @error('description')
                                            <span
                                                class="mt-2 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
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
