<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="shortcut icon" href="{{asset('imagenes/logo.png')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pide</title>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body{
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  background:url('imagenes/fondo.jpg');
  background-size:cover;
  background-position:center;
}

.window{
  width:400px;
  height:380px;
  padding:40px;
  text-align:center;
  border:1px solid white;
  border-radius:20px;
  
  backdrop-filter:blur(20px);
  
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  color:white;
}
input[type="text"], input[type="password"]{
  border-radius:8px;
  border:2px solid black;
  color:black !important;
  background:transparent;
}
form{
  width:100%;
}
input[type="text"]:focus, input[type="password"]:focus{
  background:#00000040;
  box-shadow:none;

  border:2px solid black;
}
input[type="text"]::placeholder, input[type="password"]::placeholder{
  color:black;
}
input[type="submit"]{
  width:100%;
  border-radius:8px;
  text-transform:uppercase;
  font-weight:bold;
  font-size:14px;
}
    </style>
</head>
<body>
    <div class="window">
      <img src="{{ asset('imagenes/logo.png') }}" width="100" height="100">
        <span class="h1">Consultas PIDE</span>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="email" class="mt-4 form-control" placeholder="Correo">
            <input type="password" name="password" class="mt-2 form-control" placeholder="Clave">
            <input type="submit" class="mb-2 btn btn-light mt-2" value="Ingresar">
        </form>
      </div>

</body>
</html>
