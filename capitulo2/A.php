
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        class A {

            public $publica = "variablePublica";
            protected $protegida = "variableProtegida";
            private $privada1 = "variablePrivada1";
            private $privada2 = "variablePrivada2";
            private $privada3 = "variablePrivada3";

            function __get($propiedad) {
                return $this->$propiedad;
            }

            function __set($name, $value) {

                if ($this->$name == "privada1") {
                    $this->$privada1 = $value;
                }
            }

        }

        $A = new A();
        echo "La variable publica es: " . $A->publica . "<br>";
        echo "La variable protegida es: " . $A->protegida . "<br>";
        echo "La variable privada1 es: " . $A->privada1 = "privada4" . "<br>";
        echo "La variable privada2 es: " . $A->privada2 . "<br>";
        echo "La variable privada3 es: " . $A->privada3 . "<br>";

        function mi_autocargador($A) {
            include 'clases/' . $A . '.php';
        }

        spl_autoload_register('mi_autocargador');
        ?>
    </body>
</html>
