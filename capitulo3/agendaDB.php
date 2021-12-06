<?php
require 'basedatos/Database.php';

    $db = Database::getConnection();



$stmt = $db->query('SELECT nombre,apellido,telefono FROM contactos');
while ($row = $stmt->fetch())
{
    echo "<br>";
    echo $row['nombre'] . ", ".$row['apellido']. ", ".$row['telefono'];

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

        </form>
    </body>

</html>
