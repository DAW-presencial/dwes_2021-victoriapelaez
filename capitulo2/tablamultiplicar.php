<!DOCTYPE html>
<html>
    <body>
        <h1>TABLAS DE MULTIPLICAR</h1>
        <table border="2">
            <?php
            echo "<tr>";
            echo "<th/>";
            for ($i = 0; $i <= 10; $i++) {
                echo "<th style='background-color:#f5f5dc'>La Tabla de multiplicar de " . $i . " es: </th>";
            }
            echo "</tr>";
            for ($i = 0; $i <= 10; $i++) {
                echo "<tr>";
                echo "<th>La Tabla de multiplicar de " . $i . " es: </th>";
                for ($d = 0; $d <= 10; $d++) {

                    echo "<td>" . $i . " x " . $d . " =  " . $d * $i . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
