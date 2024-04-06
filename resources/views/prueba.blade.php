<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Permisos</h1>
    @php
        echo("<pre>");
        print_r($permisosSeleccionados);
        echo("</pre>");
    @endphp
    <h1>Miembros</h1>
    @php
        echo("<pre>");
        print_r($miembrosSeleccionados);
        echo("</pre>");
    @endphp
    <h1>Valor: {{$valorSeleccionado}}</h1>


</body>
</html>