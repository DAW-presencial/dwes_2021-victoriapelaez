<!doctype html>
<!-- Ejemplo de formulario sin validación de campos, 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sin validación</title>
    </head>
    <body>
        <?php
        
        // Comprobamos si se reciben datos del forumulario.
        if (isset($_GET['submit'])) {//ESTO DISTINGUE SI VIENE DE PRIMERA VEZ O NO, SI ESTA VACIO EL FORMULARIO, TE LO LANZA POR PRIMERA VEZ
            //ES EN VARIABLE GLOBAL GET DONDE RECOGEN LOS DATOS
            echo "El formulario fue correctamente procesado";
            // Aquí procesaríamos el formulario.
        } else {// 
            displayForm();
        }

/////////////////////////////////////////////////////////////////////////////////////////////////////

        function DisplayForm() {
            global $nombre, $edad, $email;
            ?>  
            <h1>Registro de usuario</h1>
            <form>
                <input type = "text" name = "nombre" 
                       placeholder="Nombre" value = "<?php echo $nombre; ?>"/>
                <input type = "text" name = "edad" 
                       placeholder="Edad" value = "<?= $edad; ?>"/>
                <input type = "text" name = "email" 
                       placeholder="email" value = "<?= $email; ?>"/>
                <input type = "submit" name="submit"/>
            </form>
            <?php
        }
        ?>
    </body>
</html>