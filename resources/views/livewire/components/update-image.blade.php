<div>
    <button wire:click='show'
        class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        editar
    </button>



    @if ($show)
        <form wire:submit.prevent='save'>
            <input type="text" wire:model='title' placeholder="titulo" class="text-black">
            @error('title')
                <span>{{ $message }}</span>
            @enderror

            <input type="file" wire:model='newImage'>
            @error('title')
                <span>{{ $newImage }}</span>
            @enderror

            <img src="{{ $img->image }}">
            <textarea wire:model='description' cols="30" rows="10" class="text-black"></textarea>
            @error('description')
                <span>{{ $message }}</span>
            @enderror

            <button>Salvar</button>
        </form>
    @endif


</div>
