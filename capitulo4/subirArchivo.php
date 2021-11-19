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
<h1>FORMULARIO POST</h1>
<form method="post" enctype="multipart/form-data" action="subirArchivo.php">
    Nombre: <input type="text" name="nombre"><br>
    Edad: <input type="text" name="edad"><br>
    Añada su fichero: <input type="file" name="fichero1"><br>
    Añada su fichero: <input type="file" name="fichero2"><br>
    <input type="submit" name="submit" value="Enviar Datos">
</form>


<?php

if (isset($_POST['submit'])) {
    $nombre = filter_input(INPUT_POST, 'nombre');
    $edad = filter_input(INPUT_POST, 'edad');
    echo "Bienvenido " . $nombre . "<br>";

    for ($i = 1; $i <= count($_FILES); $i++) {
        if ($_FILES["fichero$i"]["error"] === UPLOAD_ERR_OK) {
            $fichero = $_FILES["fichero$i"]["tmp_name"];
            $nombreArchivo = basename($_FILES["fichero$i"]["name"]);
            move_uploaded_file($fichero, __DIR__ . "/$nombreArchivo");
            }
    }
    echo "El archivo se ha subido satisfactoriamente";
    echo "<pre>";
    var_dump($_FILES);
    echo "<pre>";
}
?>
</body>
</html>
