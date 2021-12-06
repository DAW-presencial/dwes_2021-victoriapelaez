<?php
require "basedatos/Database.php";
require "clases/Contacto.php";


if (isset($_POST['nombre'])  && isset($_POST['apellido']) && $_POST['telefono']) {

    $nombre = htmlspecialchars(filter_input(INPUT_POST, 'nombre',));
    $apellido = htmlspecialchars(filter_input(INPUT_POST, 'apellido',));
    $telefono = htmlspecialchars($_POST['telefono']);

    $contacto = new Contacto($nombre, $apellido, $telefono);

    if (!isset($contacto)) {
        if (isset($_POST['agregar'])) {
            echo $contacto->agregarContacto();
        } else if (isset($_POST['editar'])) {
            echo $contacto->editarcontacto();
        } else if (isset($_POST['eliminar'])) {
            echo $contacto->eliminarContacto();
        }
    }else{
        echo "Este contacto ya existe<br>";
        echo Contacto::mostrarContactos();
    }
}

if (isset($_POST['mostrar'])) {
    echo Contacto::mostrarContactos();
}
?>


<html>
    <head>
        <title>agendaDB</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="background-color: beige">
        <!-- Html de agenda -->
        <h1 style="color: green">AGENDA CONTACTOS</h1>

        <form method="post">

            <input type="text" name="nombre" placeholder="Nombre" value=""/>
            <input type="text" name="apellido" placeholder="Apellido" value=""/>
            <input type="text" name="telefono" placeholder="Telefono" value=""/><br>
            <input type="submit" value="Añadir Contacto" name="agregar"/>
            <input type="submit" value="Editar Contacto" name="editar"/>
            <input type="submit" value="Eliminar Contacto" name="eliminar"/>
            <input type="submit" value="Mostrar Contactos" name="mostrar"/>


        </form>
    </body>
</html>
