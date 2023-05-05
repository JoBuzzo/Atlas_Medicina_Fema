<div>
    {{ $group->title }}

    @foreach ($images as $image)
        <img src="{{ $image->image }}" alt="">

        <span>{{ $image->title }}</span>
        <span>{{ $image->description }}</span>
    @endforeach
</div>
