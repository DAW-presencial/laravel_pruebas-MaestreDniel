<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contactos</title>
</head>
<body>
    <style>
        body {
            background-color: #EEEEEE;
        }

        h1, h2 {
            text-decoration: underline;
            display: inline-block;
        }
    </style>
    <h1>{{ __('Welcome to our website') }}</h1>
    <form name="formulario" method="get" action="">
    <label><h2>{{ __('Name') }}:</h2></label>
    <input type="text" name="nombre"/><br>
    <label><h2>{{ __('Phone') }}:</h2></label>
    <input type="text" maxlength="9" name="telefono"/><br><br>
    <input type="submit" name="submit" value='{{ __("Send") }}'/></label><br>
    <h2>{{ __('Contacts') }}</h2>
    <?php 

    /**
     * @author Daniel Maestre Hermoso
     * Fecha Inicio: 25/11/2021
     * Fecha Fin: 25/11/2021
     * Curso: 2º FP DAW Presencial
     * Módulo: DWES
     * Práctica: Formulario Laravel con traducción de idiomas, en mi caso he reutilizado la primera agenda de contactos
     * @version: 1.0
     */


        // Se comprueba si la agenda ya existe
        if (isset($_GET['agenda']))
            $agenda = unserialize($_GET['agenda']);
        else
            $agenda = []; // Cuando no exista, la agenda se generará vacía
            echo "<label type=hidden for='agenda'></label><input type=hidden id='agenda' name='agenda' value=".serialize($agenda).">";
            // Se introducirán los datos de la agenda como campos ocultos

        if (isset($_GET['submit'])) {
            // Recoge los input del formulario y muestra un aviso si el nombre está vacío
            $nombre = filter_input(INPUT_GET, 'nombre');
            $telefono = filter_input(INPUT_GET, 'telefono');
            if (empty($_GET['nombre'])) {
                echo "<h3>Es necesario introducir un nombre!</h3><br>";
            } elseif (empty($_GET['telefono'])) {
                unset($agenda[$nombre]); // Borra el contacto al escribir solo su nombre
            } else {
                $agenda[($_GET['nombre'])] = $_GET['telefono'];
            }
        }
        

        // Cuando la agenda está construida, se empieza a recorrer con tal de introducir todos los datos
        if (is_array($agenda)) {
            foreach ($agenda as $clave => $valor) {
                echo "<label type=hidden for='agenda'></label><input type=hidden id='agenda' name='agenda' value =".serialize($agenda).">";
            }
        }

        /* Las instrucciones aparecen cuando la agenda está vacía y se resetean los campos ocultos cada vez que
         la agenda vuelve a quedar completamente vacía, porque al no hacerlo había un bug que provocaba que un 
         contacto que había borrado volviera a aparecer repentinamente */
        if (is_array($agenda)) {
            if (count($agenda) == 0) {
                echo "<label type=hidden for='agenda'></label><input type=hidden id='agenda' name='agenda' value =".serialize($agenda).">";
                // Con el doble guión bajo, si lo tenemos todo configurado se pueden traducir las cadenas de caracteres
                echo '<p>'.__('This schedule does not have any contact').'</p>';
            } else {
                // Imprime todos los datos almacenados de la agenda
                echo "<ul>";
                foreach ($agenda as $clave => $valor) {
                    echo "<h3><li>{$clave} - {$valor}</li></h3>";
                }
                echo "</ul>";
            }
        }
    ?>

    </form>
    <br><a href="./">{{ __('Go Home') }}</a>
</body>
</html>