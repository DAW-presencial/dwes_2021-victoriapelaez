<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php

class Padre {

    public $nombre = "Ramon";
    protected $estadocivil = "Casado";
    private $edad = 66;

    function __get($propiedad) {
        return $this->$propiedad;
    }

    function __set($name, $value) {

        if ($this->$name== 66) {
            $this->$value = 67;
        }
    }

}

class Hijo extends Padre{

}
//instancia de la clase hijo que hereda del padre
$obj = new Hijo();
echo "El nombre del hijo es: " . $obj->nombre . "<br>";
echo "La edad del hijo es: " . $obj->edad . "<br>";
echo "El estado civil del hijo es:". $obj->estadocivil ;

?>
</body>
</html>