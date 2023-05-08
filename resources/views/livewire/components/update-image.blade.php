<div>
    <button wire:click="show"
        class="flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
        Editar
    </button>



    @if ($show)
        <form wire:submit.prevent='save' >
            <input type="text" wire:model='title' placeholder="titulo" class="text-black">
            @error('title')<span>{{ $message }}</span>@enderror

            <input type="file" wire:model='newImage'>
            @error('title')<span>{{ $newImage }}</span>@enderror

            <img src="{{ $img->image }}">
            <textarea wire:model='description' cols="30" rows="10" class="text-black"></textarea>
            @error('description')<span>{{ $message }}</span>@enderror

            <button>Salvar</button>
        </form>
    @endif


</div>
