<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>{{ $group->title }}</title>
</head>
<body>
    <h1>{{ $group->title }}</h1>
    @foreach ($categories as $cat)
    <span>
    #{{ $cat->name }}
    </span>
    @endforeach
@foreach ($images as $img)
    {{ $img->title}}
    
    <img src="{{storage_path("app/public/images/".$img->getRawOriginal('image'))}}" alt="{{ $img->title }}">

    {{ $img->description }}
@endforeach
</body>
</html>