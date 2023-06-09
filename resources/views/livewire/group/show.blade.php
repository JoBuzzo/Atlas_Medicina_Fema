<div>
    @if (session()->has('msg'))
        <livewire:components.toast />
    @endif
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 mx-auto sm:px-6 lg:px-8">
                <div class="mb-3">
                    @foreach ($categories as $cat)
                        <span class="font-medium text-blue-600 dark:text-blue-500">
                            #{{ $cat->name }}
                        </span>
                    @endforeach

                </div>
                <div class="flex flex-col gap-3 w-full mb-8 lg:mb-12">
                    <h1
                        class="flex items-center m-0 text-3xl sm:text-4xl md:text-5xl order-1 font-bold dark:text-white">
                        {{ $group->title }}
                    </h1>
                    <x-actions-dropdown :group="$group" />
                </div>

                @foreach ($images as $image)
                    @if ($image->title || $image->description)
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
                    @else
                        <div class="grid w-full gap-6">
                            <div class="">
                                <a href="{{ $image->image }}" target="_blank">
                                    <img class="w-full h-full" src="{{ $image->image }}">
                                </a>
                            </div>
                            <div class="">
                                @auth
                                    <x-actions-image-dropdown :imageId="$image->id" />
                                @endauth
                            </div>
                        </div>
                    @endif
                    <hr class="my-6 border-gray-300 sm:mx-auto dark:border-gray-700 lg:my-8">
                @endforeach
            </div>
        </div>
    </div>
</div>
