<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asientos PDF</title>
    <style>
        *{
            margin:0;
            padding:0
        }
    </style>
</head>
<body style="margin: 0%">
    @if (!empty($imageData))
        @foreach ($imageData as $index => $image)
            @if ($index !== 0)
                <div style="page-break-before: always; margin: 0%"></div>
            @endif
            <div style="margin: 0; padding: 0;">
                <img style="margin: 0%" src="data:image/jpeg;base64,{{ base64_encode($image) }}" alt="Asiento Image" style="width: 100%; margin: 0; padding: 0;">
            </div>
            <br>
        @endforeach
    @endif
</body>
</html>
