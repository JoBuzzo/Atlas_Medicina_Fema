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

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border: none;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            vertical-align: top;
            padding: 10px;
            border: none;
        }

        img {
            display: block;
            width: 75%;
            margin-bottom: 10px;
            max-width: 100%;
            max-height: 50%;
        }

        p {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .page-break {
            page-break-after: always;
        }

        span {
            margin: 3px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center">{{ $group->title }}</h1>
{{--     
    @foreach ($images as $img)
        <table border="0">
            <tr>
                <td style="width: 100%">
                    <h2>{{ $img->title }}</h2>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="{{ storage_path('app/public/images/' . $img->getRawOriginal('image')) }}" alt="{{ $img->title }}">
                </td>
                <td style="width: 50%;">
                    <p>{{ $img->description }}</p>
                </td>
            </tr>
        </table>
        @if (!$loop->last)
            <div class="page-break"></div>
        @endif

    @endforeach --}}
    @foreach ($images as $img)
        <h2>{{$img->title}}</h2>
        <img style="text-align:center" src="{{ storage_path('app/public/images/' . $img->getRawOriginal('image')) }}" alt="{{ $img->title }}">
        <p>{{ $img->description }}</p>
    @endforeach
</body>

</html>
