<?php
spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
});

echo "<h1>Estamos en el índice</h1>";
$obj = new claseA();
// Manera 2
$obj -> __set("he puesto un name", 2);
// $obj -> __get("he puesto un name");
?>