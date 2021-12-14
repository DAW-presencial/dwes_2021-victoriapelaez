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

    /**
     *Funcion que conecta con la base de datos y ejecuta una query para extraer los datos de la agendo solicitados
     *Los datos se pintan en una tabla mediante un fetch asignando cada trio de datos a una fila
     */
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

    /**
     * Funcion que conecta con la base de datos y mediante la query elegida comprueba mediante el telefono, que es la clava primaria
     * comprueba si existe o no existe. Si existe, avisa de que existe, pero si no existe, llama a la funcion agregarContacto.
     */
    public function contactoExiste()
    {
        $db = Database::getConnection();
        $stmt_telefono = $db->query("select telefono from contactos where telefono = '$this->telefono'");
        $data = $stmt_telefono->fetch();
        if (!empty($data['telefono'])) {
            echo "<br>El contacto ya existe";
        } else {
            Contacto::agregarContacto();
        }
    }

    /**
     * Funcion que inserta un nuevo contacto mediante una query insert y el metodo exec
     */
    public function agregarContacto()
    {
        $db = Database::getConnection();
        $stmt_insert = $db->prepare("insert into contactos(nombre, apellido, telefono)values (?,?,?)");
        $stmt_insert->execute([$this->nombre, $this->apellido, $this->telefono]);
        echo "<br>Contacto agregado";
    }

    /**
     * Funcion para editar un contacto mediante una query update, mediante la eleccion del contacto mediante el telefono que es la clave
     * primaria y cambiando la propiedad nombre o apellido
     */
    public function editarContacto()
    {
        $db = Database::getConnection();
        //para editar usar el telefono como id primario y modificar nombre y apellido
        $stmt_actualizar = "update contactos set nombre = '$this->nombre',apellido = '$this->apellido', telefono='$this->telefono' where telefono='$this->telefono';";
        $db->exec($stmt_actualizar);
        echo "<br>Contacto editado";
    }

    /**
     * Funcion para eliminar un contacto. Hay que escribir el telefono y darle a eliminar porque borra por
     * telefono porque es clave primaria.
     */
    public function eliminarContacto()
    {
        $db = Database::getConnection();
        $stmt_borrar = $db->prepare("delete from contactos where telefono=?;");
        $stmt_borrar->execute([$this->telefono]);
        echo "<br>Contacto eliminado";
    }
}