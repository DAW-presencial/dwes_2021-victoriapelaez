<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
         * ESTA FUNCION ESTÁ DEPRECATED EN LA VERSIÓN CON LA QUE TRABAJO 
         * 
         * function __autoload($Persona){
          include (clases/$Persona."Persona.php");
          } */

        function mi_autocargador($Persona) {
            include 'clases/' . $Persona . '.php';
        }

        spl_autoload_register('mi_autocargador');

        $madre = new Persona("Maria", 30);

        echo "La madre se llama " . $madre->nombre . " y tiene " . $madre->edad . " años";
        ?>
    </body>
</html>
