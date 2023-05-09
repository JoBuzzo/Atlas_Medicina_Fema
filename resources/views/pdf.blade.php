<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>{{ $group->title }}</title>
</head>
<body>
    <h1>{{ $group->title }}</h1>

@foreach ($images as $img)
    {{ $img->title}}
@endforeach
</body>
</html>