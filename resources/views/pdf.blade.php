<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>{{ $group->title }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;font-size: 24px; font-weight: bold;">{{ $group->title }}</h1>

    @foreach ($group->images as $img)
        <h2 style="font-size: 20px; font-weight: bold;">{{ $img->title }}</h2>
        
        <div style="text-align:center;">
            <img style="max-width: 100%; max-height: 40%;margin-top:16px;margin-bottom:12px" 
            src="{{ storage_path('app/public/images/' . $img->getRawOriginal('image')) }}"
            alt="{{ $img->title }}">
        </div>
        <p style="font-size: 16px;">{{ $img->description }}</p>
        @if (!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
</body>

</html>