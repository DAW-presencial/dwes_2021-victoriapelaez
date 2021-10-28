<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Array burbuja</title>
    </head>
    <body>

        <?php
        error_reporting(0);

        $arrayDesordenado = [5, 98, 33, 67, 1, 87];
        echo "Array inicial: " . implode(",", $arrayDesordenado) . "<br>";

        //CODIGO       
        $longitud = count($arrayDesordenado);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - $i; $j++) {

                if ($arrayDesordenado[$j] > $arrayDesordenado[$j + 1]) {
                    $arrayOrdenado = $arrayDesordenado[$j];
                    $arrayDesordenado[$j] = $arrayDesordenado[$j + 1];
                    $arrayDesordenado[$j + 1] = $arrayOrdenado;
                }
            }
        }
        $arrayOrdenado = implode("<", $arrayDesordenado);
        echo "Array ordenado: " . substr($arrayOrdenado, 1) . "<br>";
        ?>
    </body>
</html>

