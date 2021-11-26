<?php
/*session start() te mira si hay cookie de sesion. Si no hay cookie, creo sesion. Si existe, pregunta si existe en disco
 * recupera todos los datos de la sesion. si no esta en disco, crea sesion.  Puede estar caducada pero estar en disco
 * Normalmente no se destruyen siempre las sesiones ni las cookies
*/
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

