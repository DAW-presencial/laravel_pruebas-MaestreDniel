<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>He creado una view para pasárselo a las rutas de web.php. FUNCIONA!!!</h1>
    <h2>Podemos introducir el contenido mediante @/yield('content')@yield('content'), sin la barra /. 
        La idea es que declares un @/section('content) para que luego se añada con su yield correspondiente</h2>
    <h2>También lo podemos extender de una página ya existente con @/extends('welcome')@extends('welcome'), sin /</h2>
</body>
</html>