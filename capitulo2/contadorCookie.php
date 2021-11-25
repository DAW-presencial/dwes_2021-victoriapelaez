<?php
setcookie("FirstCookie", 0);
?>
<html>
    <head>
        <title>contador cookies</title>
    </head>
    <body>
        <h2>Visitas de la página</h2>
<?php
if (isset($_COOKIE['FirstCookie'])) {
    setcookie("FirstCookie", ++$_COOKIE["FirstCookie"]);
    echo "Visitas: " . $_COOKIE['FirstCookie'];
}
else{
    echo "Bienvenido a esta página" ;
}

?>
    </body>
</html>

