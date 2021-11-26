<?php

function factorial($num){
    if($num==1){
        return 1;
    }
return $num*factorial($num-1);       
}
echo "el factorial de 3 es:".factorial(999);


?>
