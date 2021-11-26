
<!DOCTYPE html>
<html>
    <body>

        <h1>MI PRIMERA PÁGINA EN PHP</h1>

        <?php
        
        echo 'Hola Mundo';
        //comentario simple
        #Comentario simple
        /* Comentario
         * de varias lineas */
        ?>

        <h2>Primeros pasos para aprender</h2>

        <?php
        $texto = "mi primera variable ";
        $num1 = 2;
        $num2 = 3;
        echo "Esta es " . $texto . "<br>";
        echo "La suma de las dos variables es: " . $num1 + $num2;
        ?>

        <?php

        class Car {

            public $color;
            public $model;

            public function __construct($color, $model) {
                $this->color = $color;
                $this->model = $model;
            }

            public function message() {
                return "My car is a " . $this->color . " " . $this->model . "!";
            }

        }

        $myCar = new Car("black", "Volvo");
        echo $myCar->message();
        echo "<br>";
        $myCar = new Car("red", "Toyota");
        echo $myCar->message();
        ?>

        <!-- FOREACH -->

        <?php
        $colors = array("red", "green", "blue", "yellow");

        foreach ($colors as $value) {
            echo "$value <br>";
        }
        ?>

        <?php
        $age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");

        foreach ($age as $x => $val) {
            echo "$x = $val<br>";
        }
        ?>

        <!--FUNCIONES-->
        
        function familyName($fname, $year) {
            echo "$fname Refsnes. Born in $year <br>";
        }

        familyName("Hege", "1975");
        familyName("Stale", "1978");
        familyName("Kai Jim", "1983");
        ?>

        <!-- FUNCION PARA DEMOSTRAR QUE CAMBIA EL TIPO PORQUE NO ES ESTRICTO -->
        <?php

        function addNumbers(int $a, int $b) {
            return $a + $b;
        }

        echo addNumbers(5, "5 days");
        // since strict is NOT enabled "5 days" is changed to int(5), and it will return 10
        ?>



        

        <?php
/*In PHP, arguments are usually passed by value, 
 * which means that a copy of the value is used in the function and the variable that was passed into the function cannot be changed.
 * When a function argument is passed by reference, changes to the argument also change the variable that was passed in. 
 * To turn a function argument into a reference, the & operator is used:*/
        function add_five(&$value) {
            $value += 5;
        }
        $num = 2;
        add_five($num);
        echo $num;
        ?>
        
        
        <?php 
        $funcs = get_defined_functions();
        echo $funcs?>
    </body>
</html>
