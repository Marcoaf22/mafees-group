<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="flex flex-wrap px-8 -mx-3">
        @php
        use chillerlan\QRCode\QRCode;
        use chillerlan\QRCode\QROptions;
        $options = new QROptions(
        [
        'eccLevel' => QRCode::ECC_L,
        'outputType' => QRCode::OUTPUT_MARKUP_SVG,
        'version' => 5,
        ]
        );
        @endphp

        <img src="{{ (new QRCode($options))->render(route('tanque.detalle', ['id' => $tanque->id])) }} "
            alt="QR Code" />
    </div>
</body>

</html>
