<?php
/*session start() te mira si hay cookie de sesion. Si no hay cookie, creo sesion. Si existe, pregunta si existe en disco
 * recupera todos los datos de la sesion. si no esta en disco, crea sesion.  Puede estar caducada pero estar en disco
 * Normalmente no se destruyen siempre las sesiones ni las cookies
 *
 * para eliminar una sesión tanto en el
servidor como en el navegador, además, debemos
destruir la cookie de sesión.
If (isset ($_COOKIE[session_name()] )) {
setcookie( session_name(), “”, time()-3600, ”/”);
unset($_COOKIE[session_name()]);
}
session_unset(); // o bien $_SESSION = array();
session_destroy();
*/
setcookie("FirstCookie", 0,3600);

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

