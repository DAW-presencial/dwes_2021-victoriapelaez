<!DOCTYPE html>
<html>

    <body>
        <h1>TABLA ESTADO DE UNA VARIABLE</h1>

        <table border="2" align="center" backgroundcolor="blue">

            <th>Contenido de $var</th>
            <th>isset($var)</th> 
            <th>empty($var)</th> 
            <th>(bool)$var</th> 

            <tr>
                <th>$var = null</th>
                   <?php
//                $var = null;
//                $funciones_prueba = [isset($var), empty($var), (bool) $var];
//                for ($i = 0; $i < 3; $i++) {
//                    echo "<td>" . $funciones_prueba[$i] . "</td>";
//                }
//                ?>   
                
                <td><?php $var = null;
                echo isset($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = null;
                echo empty($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = null;
                echo (bool) $var ? 'true' : 'false'; ?></td>
            </tr> 
            <tr>
                <th>$var = 0</th>
                <td><?php $var = 0;
                echo isset($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = 0;
                echo empty($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = 0;
                echo (bool) $var ? 'true' : 'false'; ?></td>
            </tr> 
            <tr>
                <th>$var = true</th>
                <td><?php $var = true;
                echo isset($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = true;
                echo empty($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = true;
                echo (bool) $var ? 'true' : 'false'; ?></td>
            </tr> 
            <tr>
                <th>$var = false</th>
                <td><?php $var = false;
                echo isset($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = false;
                echo empty($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = false;
                echo (bool) $var ? 'true' : 'false'; ?></td>
            </tr> 
            <tr>
                <th>$var = "0"</th>
                <td><?php $var = "0";
                echo isset($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = "0";
                echo empty($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = "0";
                echo (bool) $var ? 'true' : 'false'; ?></td>
            </tr> 
            <tr>
                <th>$var = ""</th>
                <td><?php $var = "";
                echo isset($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = "";
                echo empty($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = "";
                echo (bool) $var ? 'true' : 'false'; ?></td>
            </tr> 
            <tr>
                <th>$var = "foo"</th>
                <td><?php $var = "foo";
                echo isset($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = "foo";
                echo empty($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = "foo";
                echo (bool) $var ? 'true' : 'false'; ?></td>
            </tr> 
            <tr>
                <th>$var = array( )</th>
                <td><?php $var = array();
                echo isset($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = array();
                echo empty($var) ? 'true' : 'false'; ?></td>
                <td><?php $var = array();
                echo (bool) $var ? 'true' : 'false'; ?></td>
            </tr> 
            <tr>
                <th>unset ($var)</th>
                <td><?php unset($var);
                echo isset($var) ? 'true' : 'false'; ?></td>
                <td><?php unset($var);
                echo empty($var) ? 'true' : 'false'; ?></td>
                <td><?php error_reporting(0);
                unset($var);
                echo (bool) $var ? 'true' : 'false'; ?></td>
            </tr> 
        </table>



    </body>








</html>
