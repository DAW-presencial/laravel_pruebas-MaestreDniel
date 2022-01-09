<?php
//selecionamos los nombres de la agenda
$stmt = $pdo->query('SELECT nombre FROM agenda_bd_maestre_hermoso_daniel_db');
while ($row = $stmt->fetch())
{
    echo $row['nombre'] . "\n";
}
//selecionamos los telefonos de la agenda
$stmt = $pdo->query('SELECT telefono FROM agenda_bd_maestre_hermoso_daniel_db');
while ($row = $stmt->fetch())
{
    echo $row['telefono'] . "\n";
}
?>
