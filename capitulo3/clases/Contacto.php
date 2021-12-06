<?php


class Contacto
{
    private $nombre;
    private $apellido;
    private $telefono;

    public function __construct($nombre, $apellido, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
    }

    public static function mostrarContactos()
    {
        $db = Database::getConnection();
        $stmt = $db->query('SELECT nombre,apellido,telefono FROM contactos order by apellido');
        echo "<div class='tabla'>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Apellido</th>";
        echo "<th>Nombre</th>";
        echo "<th>Teléfono</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $stmt->fetch()) {
            echo "<tr><td> " . $row['apellido'] . "</td><td> " . $row['nombre'] . "</td> <td>" . $row['telefono'] . "</td> </tr>";
        }
        echo "</tbody>";
        echo "</div>";
        echo "</table>";
    }

    public function agregarContacto()
    {
        $db = Database::getConnection();
        $stmt_insert = "insert into contactos(nombre, apellido, telefono)values ('$this->nombre','$this->apellido','$this->telefono')";
        $db->exec($stmt_insert);
        echo "<br>Contacto agregado";
    }

    public function editarContacto()
    {
        $db = Database::getConnection();
        //para editar usar el telefono como id primario y modificar nombre y apellido
        $stmt_actualizar = "update contactos set nombre = '$this->nombre',apellido = '$this->apellido', telefono='$this->telefono' where telefono='$this->telefono';";
        $db->exec($stmt_actualizar);
        echo "<br>Contacto editado";
    }


    public function eliminarContacto()
    {
        $db = Database::getConnection();
        //para eliminar contacto hay que escribir el nombre y el telefono y darle a eliminar porque borra por telefono porque es clave primaria
        $stmt_borrar = "delete from contactos where telefono='$this->telefono';";
        $db->exec($stmt_borrar);
        echo "<br>Contacto eliminado";

    }
}