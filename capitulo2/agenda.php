<!DOCTYPE html>

<html>
    <head>
        <title>agenda</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="background-color: beige">
        <?php
        /**
         * @autor Maria Victoria Pelaez Lozano
         * @version 1.0
         */
        /**
         * Comprobar si existe agenda, si existe la recupera, si no crea un arry asociativo para introducir los datos
         * @global array $agenda
         * @global array sera donde almacenemos los datos recibidos del formulario
         */
        if (isset($_GET["agenda"])) {
            $agenda = $_GET["agenda"];
        } else {
            $agenda = [];
        }

        /**
         * comprobacion datos recogidos en la URL, filtrar nombre y telefono, llamar a las funciones para validarlos
         * @global string $nombre
         * @global string es el nombre introducido en nuestro formulario
         * @global string $telefono
         * @global string es el telefono introducido en nuestro formulario
         */
        if (isset($_GET["submit"])) {

            $nombre = filter_input(INPUT_GET, "nombre", FILTER_CALLBACK, array('options' => 'validarNombre'));
            $telefono = filter_input(INPUT_GET, "telefono", FILTER_CALLBACK, array('options' => 'validarTelefono'));

            /**
             * Introduccion del nombre y telefono, borrado del nombre si no hay telefono y sustitucion
             * del telefono si los campos estan rellenados pero con el mismo nombre 
             */
            if (empty($nombre)) {
                echo "<h4 style='color:red'>Introduzca un nombre por favor.</h4>";
            } elseif (empty($telefono)) {
                unset($agenda[$nombre]);
            } else {
                $agenda[$nombre] = $telefono;
            }
        }

        /**
         * funcion validacion de nombre
         * @return string $nombre
         * @param string $nombre
         */
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
        ?>
        <!-- Html de agenda -->
        <h1 style="color: green">AGENDA DE TELÉFONOS</h1>
        <h3><i>Funcionamiento de su agenda</i></h3>
        <ul>
            <li>Escriba nombre y teléfono para añadir. Recuerde que no puede repetir nombre.</li>
            <li>Si escribe un nombre de la agenda y no añade teléfono, este se borrara automáticamente.</li>
            <li>Para actualizar un contacto, escriba el nombre y añada el nuevo número de teléfono.</li>
        </ul>
        <form> <!--metodo GET por defecto-->
            <?php
            /**
             *  Recorremos nuestra agenda y para cada valor lo introducimos en un input escondido 
             * que será el que viajará por la URL y nos devolverá los datos 
             */
            foreach ($agenda as $nombre => $telefono) {
                echo '<input type="hidden" name="agenda[' . $nombre . ']" value="' . $telefono . '"/>';
            }
            ?>
            <!-- inputs y botones del formulario -->
            <input type="text" name="nombre" placeholder="Nombre" value=""/>
            <input type="text" name="telefono" placeholder="Telefono" value=""/>
            <input type="submit" value="Añadir" name="submit"/>

        </form>
        <h3 style="color: green">CONTACTOS</h3>
        <?php
        //aviso de que aun no hay contactos en la agenda
        if (count($agenda) == 0) {
            echo "La agenda está vacía";
        }
        ?>

        <!--en una lista iremos pintando todos los valores de la agenda-->
        <ul>
            <?php
            if (isset($agenda)) {
                foreach ($agenda as $nombre => $telefono) {
                    echo "<li style='color:blue'>El teléfono de " . $nombre . " es: " . $telefono . "</li>";
                }
            }
            ?>
        </ul>
    </body>

</html>