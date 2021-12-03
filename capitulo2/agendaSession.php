<?php
session_start(/*aqui podria ir una cookie*/);
echo session_id() . "<br>";
echo session_name() . "<br>";
?>
<?php
/*// Borrar cookie y sesion

    if (isset ($_COOKIE[session_name()])) {
        setcookie(session_name(), "", time() - 3600, "/");
        unset($_COOKIE[session_name()]);
    }
    session_unset(); // o bien $_SESSION = array();
    session_destroy();

*/?>
<!DOCTYPE html>

<html>
    <head>
        <title>agenda</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="background-color: beige">

        <?php
        if (isset($_GET["submit"])) {
            $nombre = filter_input(INPUT_GET, "nombre", FILTER_CALLBACK, array('options' => 'validarNombre'));
            $telefono = filter_input(INPUT_GET, "telefono", FILTER_CALLBACK, array('options' => 'validarTelefono'));
            $_SESSION['agenda'][$nombre] = $telefono;
            echo('<pre>');
            var_dump($_SESSION['agenda']);
            var_dump($_COOKIE);
            echo('</pre>');
        }

        /**
         * Introduccion del nombre y telefono, borrado del nombre si no hay telefono y sustitucion
         * del telefono si los campos estan rellenados pero con el mismo nombre 
         */
        if (empty($nombre)) {
            echo "<h4 style='color:red'>Introduzca un nombre por favor.</h4>";
        } elseif (empty($telefono)) {
            unset($_SESSION['agenda'][$nombre]);
        } else {
            $agenda[$nombre] = $telefono;
        }

        function validarNombre($nombre) {
            //elimina espacios para comprobar
            $nombre = trim($nombre);
            if (strlen($nombre) > 2) {
                return $nombre;
            }
            echo "<h3 style='color:red'> !EL NOMBRE DEBE TENER AL MENOS 2 LETRAS</h3>";
            return '';
        }

        /**
         * funcion validacion de telefono
         * @return string
         * @param string $telefono
         * @const LONGTELF
         */
        function validarTelefono($telefono) {
            //definimos la longitud del telefono como una constante
            define("LONGTELF", 9);
            //comparamos la longitud
            if (strlen($telefono) == LONGTELF) {
                return $telefono;
            } else {
                echo"<h3 style='color:red'> !EL TELÉFONO DEBE TENER " . LONGTELF . " DÍGITOS</h3>";
                return '';
            }
        }

        //}
        ?>

        <h1 style="color: green">AGENDA DE TELÉFONOS</h1>
        <h3><i>Funcionamiento de su agenda</i></h3>
        <ul>
            <li>Escriba nombre y teléfono para añadir. Recuerde que no puede repetir nombre.</li>
            <li>Si escribe un nombre de la agenda y no añade teléfono, este se borrara automáticamente.</li>
            <li>Para actualizar un contacto, escriba el nombre y añada el nuevo número de teléfono.</li>
        </ul>
        <form>
            <input type="text" name="nombre" placeholder="Nombre" value=""/>
            <input type="text" name="telefono" placeholder="Telefono" value=""/>
            <input type="submit" value="Añadir" name="submit"/>
           <!-- <input type="button" value="Borrar Sesión" name="">-->

        </form>
        <h3 style="color: green">CONTACTOS</h3>

        <!--en una lista iremos pintando todos los valores de la agenda-->
        <ul>
            <?php
            if (isset($_SESSION["agenda"])) {
                foreach ($_SESSION["agenda"] as $nombre => $telefono) {
                    echo "<li style='color:blue'>El teléfono de " . $nombre . " es: " . $telefono . "</li>";
                }
            }
            ?>
        </ul>
    </body>

</html>
