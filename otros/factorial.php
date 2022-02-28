<?php

function factorial($num){
    if($num==1){
        return 1;
    }
return $num*factorial($num-1);       
}
echo "el factorial de es:".factorial(170);
//con 171 petan los decimales y sale inf

?>
