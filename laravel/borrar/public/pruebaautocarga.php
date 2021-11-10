<?php
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

echo "<h1>Estamos en el fichero de autocarga</h1>";
$obj = new prueba();
// Manera 1
$mostrar = prueba::imprimir();
echo $mostrar;
// Manera 2
$obj -> imprimir();
?>