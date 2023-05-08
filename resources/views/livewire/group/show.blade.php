<div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <span class="font-medium text-blue-600 dark:text-blue-500">
                        #categoriaVaiAqui
                    </span>
                </div>
                <div class="mb-8 lg:mb-12 flex items-center justify-between w-full">
                    <h1 class="m-0 flex items-center text-5xl font-bold dark:text-white">
                        {{ $group->title }}
                    </h1>
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Baixar
                    </button>
                </div>

                @foreach ($images as $image)
                    <div class="grid lg:grid-cols-2 w-full gap-6">
                        <div class="">
                            <a href="{{ $image->image }}" target="_blank">
                                <img class="w-full h-full" src="{{ $image->image }}" alt="{{ $image->title }}">
                            </a>
                        </div>
                        <div class="">
                            <div class="flex items-center justify-between mb-3">
                                <h2 class="text-2xl font-medium dark:text-white">{{ $image->title }}</h2>
                                <button
                                    class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    editar
                                </button>
                            </div>
                            <p class="">{{ $image->description }}</p>

                        </div>
                    </div>
                    <hr class="my-6 border-gray-300  sm:mx-auto dark:border-gray-700 lg:my-8">
                @endforeach






            </div>
        </div>
    </div>
</div>