<?php

trait A
{
    private $a = 3;
    protected $b;
    public $c;
}

trait B
{
    use A;
    private $d;
    protected $e;
    public $f;
    protected $g = 7;
    //protected $a =5;
}

class C
{
    use B;
    public function getPrivate()
    {
        return $this->a;
    }
    public function getProtecte(){
        return $this->g;
    }
}

$pruebaC = new C();
echo "<pre>";
var_dump($pruebaC);
var_dump($pruebaC->getPrivate());
var_dump($pruebaC->getProtecte());
echo "</pre>";

class D
{
    use A, B;
    public function getPrivate()
    {
        return $this->a;
    }
    public function getProtecte(){
        return $this->g;
    }
}
$pruebaD = new D();
echo "<pre>";
var_dump($pruebaD);
var_dump($pruebaD->getPrivate());
var_dump($pruebaD->getProtecte());
echo "</pre>";
