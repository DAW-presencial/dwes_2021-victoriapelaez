<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulario</title>
</head>
<body>
<h1>FORMULARIO POST CON SUBIDA DE ARCHIVOS</h1>
<form method="post" enctype="multipart/form-data" action="subirArchivo.php">
    Nombre: <input type="text" name="nombre"><br>
    <!--Edad: <input type="text" name="edad"><br>-->
    Añada el fichero 1: <input type="file" name="fichero1"><br>
    Añada el fichero 2: <input type="file" name="fichero2"><br>
    <input type="submit" name="submit" value="Enviar Datos">
</form>


<?php

if (isset($_POST['submit'])) {
    //$nombre = filter_input(INPUT_POST, 'nombre');
    $nombre = htmlspecialchars($_POST['nombre']);
    //$edad = filter_input(INPUT_POST, 'edad');
    echo "Bienvenido " . $nombre . "<br>";

    for ($i = 1; $i <= count($_FILES); $i++) {
        /* if ($_FILES["fichero$i"]["error"] === UPLOAD_ERR_OK ) {
             $fichero = $_FILES["fichero$i"]["tmp_name"];
             $nombreArchivo = basename($_FILES["fichero$i"]["name"]);
             move_uploaded_file($fichero, __DIR__ . "/$nombreArchivo");
             }*/
        $fichero = $_FILES["fichero$i"]["tmp_name"];
        $nombreArchivo = basename($_FILES["fichero$i"]["name"]);
        if ($_FILES["fichero$i"]['error']) {
            echo " El fichero $i no se ha enviado <br>";

        } else if (!move_uploaded_file($fichero, __DIR__ . "/$nombreArchivo")) {

            echo "Algo falló <br>";
        } else {
            echo "El fichero $i se subió correctamente <br>";
        }

    }

    echo "<pre>";
    var_dump($_FILES);
    echo "<pre>";
}
?>
<h3>Información de los archivos subidos</h3>
<?php
    for ($i = 1; $i <= count($_FILES); $i++) {
        if(isset($_FILES["fichero$i"])){
            echo "Fichero $i <br>";
            echo "Nombre del fichero:" . $_FILES["fichero$i"]['name'] . "<br>";
            echo "Tipo del fichero:" . $_FILES["fichero$i"]['type'] . "<br>";
            echo "Tamaño del fichero:" . $_FILES["fichero$i"]['size'] . "<br>";
            echo "<br>";
        }
    }
?>

</body>
</html>
