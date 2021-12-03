<?php
require 'database/Database.php';

    $db = Database::getConnection();

$stmt = $db->query('SELECT nombre,apellido,telefono FROM contactos');
while ($row = $stmt->fetch())
{
    echo "<br>";
    echo $row['nombre'] . ", ".$row['apellido']. ", ".$row['telefono'];

}

