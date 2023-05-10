<div>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 mx-auto sm:px-6 lg:px-8">
                <div wire:loading wire:target="pdf">
                    <div
                        class="bg-[#000000bd] overflow-y-auto block fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 h-modal h-full">
                        <div class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            <div class="flex flex-col items-center justify-center gap-5">
                                <svg aria-hidden="true"
                                    class="w-12 h-12 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                        fill="currentColor" />
                                    <path
                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                        fill="currentFill" />
                                </svg>
                                <span class="text-white">Baixando PDF...</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="mb-3">
                    @foreach ($categories as $cat)
                        <span class="font-medium text-blue-600 dark:text-blue-500">
                            #{{ $cat->name }}
                        </span>
                    @endforeach

                </div>
                <div class="flex flex-col gap-3 w-full mb-8 lg:mb-12">
                    <h1 class="flex items-center m-0 text-3xl sm:text-4xl md:text-5xl order-1 font-bold dark:text-white">
                        {{ $group->title }}
                    </h1>
                    <x-actions-dropdown :group="$group" />
                </div>

                @foreach ($images as $image)
                    <div class="grid w-full gap-6 lg:grid-cols-2">
                        <div class="">
                            <a href="{{ $image->image }}" target="_blank">
                                <img class="w-full h-full" src="{{ $image->image }}" alt="{{ $image->title }}">
                            </a>
                        </div>
                        <div class="">
                            @auth
                                <x-actions-image-dropdown :imageId="$image->id" />
                            @endauth
                            <div class="flex items-center justify-between mb-3">
                                <h2 class="text-lg md:text-2xl font-bold dark:text-white">{{ $image->title }}</h2>
                            </div>
                            <p class="">{{ $image->description }}</p>

                        </div>
                    </div>
                    <hr class="my-6 border-gray-300 sm:mx-auto dark:border-gray-700 lg:my-8">
                @endforeach
            </div>
        </div>
    </div>
</div>
