<div
    class="w-4/5 overflow-hidden bg-white hover:brightness-[90%] dark:hover:brightness-[80%] transition ease-in border hover:border-slate-300 rounded shadow-lg sm:w-full lg:w-full border-slate-300 dark:border-none dark:bg-gray-800 justify-self-center sm:justify-self-auto">
    <a href="{{ route('images.show', ['id' => $id]) }}">
        <img class="w-full h-64 object-cover " src="storage/images/{{ $image }}" alt="{{ $title }}">
        <div class="px-6 py-4">
            <div class="mb-2 text-xl font-bold truncate  dark:text-white">
                {{ $title }}
            </div>
            <p class="text-base text-gray-700 truncate max-h-24 dark:text-slate-300">
                {{ $description }}
            </p>
        </div>
        <div class="w-full flex justify-center">
            <div class="w-11/12 flex px-4 py-2 overflow-hidden">
                @foreach ($categories as $category)
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>
        </div>
    </a>
</div>
