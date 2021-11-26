<?php
abstract class claseAbstracta{
    abstract function unmetodo();
}
abstract class claseAbstractaHija extends claseAbstracta{
    
}

class nieta extends claseAbstractaHija {
    function unmetodo(){
        echo "Hola Mundo";
    }
}

$o =new nieta;
echo $o->unmetodo();

//la primera daria error, no se puede instanciar





?>
