<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Imágenes</title>
    <!-- Agrega cualquier estilo adicional que necesites -->
</head>
<body>
    @foreach ($data as $image)
        <img src="data:image/png;base64, {{ $image }}" alt="Imagen">
        <hr> <!-- Otra forma de separar las imágenes -->
    @endforeach

    <script>
        // Cierra la ventana o pestaña actual después de cargar
        window.close();
    </script>
</body>
</html>
