<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refresca esta página</title>
</head>
<body>
    <style>
        body {
            background-color: #EEEEEE;
            font-family: sans-serif, arial;
        }

        h1 {
            text-decoration: underline;
            display: inline-block;
            text-align: center;
            font-size: 4vw;
        }
    </style>
    <main>
        <?php 

        if (isset($_COOKIE['unacookie'])) {
            $veces = ++$_COOKIE['unacookie'];
            setcookie('unacookie', $veces);
            echo "<h1>Has visitado esta página " . $_COOKIE['unacookie'] . " veces</h1>";
        } else {
            $veces = 1;
            echo "<h1>Primera visita a la página, te voy a meter una cookie</h1>";
            setcookie('unacookie', $veces);
        }

        ?>
    </main>
    </form>
    <br><a href="./">Volver al índice</a>
</body>
</html>