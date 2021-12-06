<?php
require "../basedatos/Database.php";

class Contacto
{
    private $nombre;
    private $apellido;
    private $telefono;
    private $conn;
    const TABLA = 'contactos';

    public function __construct($nombre, $apellido, $telefono, $conn)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->conn = $conn;
    }

    public function agregarContacto()
    {
        $conn = $this->db;
        $stmt_insert = 'insert into'. $this::TABLA.'(nombre, apellido, telefono)values ($this->nombre,$this->apellido,$this->telefono)';
            $conn->execute($stmt_insert);
            echo "Contacto agregado";
    }

    public function editarContacto()
    {
        $conn = $this->db;
        $stmt_actualizar = "update'. $this::TABLA.' set nombre = '$this->nombre',apellido = '$this->apellido', telefono='$this->telefono' where telefono='$this->telefono';";
        $conn->execute($stmt_actualizar);
        echo "Contacto editado";
    }

    public function eliminarContacto()
    {
        $conn = $this->db;
        $stmt_borrar = "delete from '. $this::TABLA.' where telefono='$this->telefono';";
        $conn->execute($stmt_borrar);
        echo "Contacto eliminado";

    }

    public function mostrarContactos()
    {
        $db = new Database();
        $conn = $db->getConnection();
        $stmt_mostrar = "select * from ". $this::TABLA. "order by nombre desc";

        $output = "<table><tr>";
        $output .= "<th>Nombre</th><th><th>Apellido</th><th>Teléfono</th></tr>";
        if ($conn->query($stmt_mostrar)->fetchColumn()) {
            $result = $conn->query($stmt_mostrar);
            foreach ($result as $contacto) {
                $output .= "<tr>";
                $output .= '<th>' . $contacto['nombre'] . '</th>';
                $output .= '<th>' . $contacto['apellido'] . '</th>';
                $output .= '<th>' . $contacto['telefono'] . '</th>';
                $output .= "</tr>";
            }
            $output .= "</table>";
        }
        return $output;


    }
}