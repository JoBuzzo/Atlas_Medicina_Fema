<div>
    <a wire:click="show"
        class="cursor-pointer flex items-center justify-center p-3 gap-1 text-sm font-medium text-blue-600 border-t border-gray-200 rounded-b-lg bg-gray-50 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-blue-500 hover:underline">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
        </svg>
        Adicionar nova categoria
    </a>
    @if ($show)
        <div
            class=" bg-[#000000bd] overflow-y-auto block fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-modal h-full">
            <div
                class="absolute w-full h-full max-w-md p-4 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <div class="relative w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Cadastrar categoria
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
                        <form action="" wire:submit.prevent="saveCategory">
                            <div class="p-6">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                                <input type="text" wire:model="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Digite aqui..." required>
                                @error('category')
                                    <span
                                        class="mt-1 text-xs font-medium text-red-600 dark:text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center justify-center gap-8 p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button wire:click="show" type="reset"
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
    @if (session()->has('msg'))
        <livewire:components.toast />
    @endif
</div>
