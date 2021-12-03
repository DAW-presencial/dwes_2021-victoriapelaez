#Respuestas ejercicios prácticos

##Información para acceder a mi usuario, que está en el servidor del centro
###mpelaez@g1.ifc33b.cifpfbmoll.eu

#PREGUNTA 4
Como ya sabía y se puede ver en el ejemplo del archivo de este mismo directorio 
pregunta4.php, si no se definen propiedades en el hijo, pero hereda del padre va a heredar los valores definidos en las variables de la clase
padre. Para poder acceder a las privadas y protegidas si es necesario haber creado los metodos magicos set y get. Para una variable publica
no es necesario esas funciones magicas.
Por lo tanto.
a) si se activan
b) afecta en que si no se establecen las funciones magicas get y set en la clase padre, aunque heredase, no podria acceder a ellas.


#PREGUNTA 5
La pregunta 5 corresponde a un formulario con diferentes inputs.
Puedes comprobar el código realizado en el archivo *pregunta5.php* de esta misma carpeta.
El formulario tiene los campos solicitados (nombre, apellidos, fecha de nacimiento y dos inputs de subida de archivos).
El código recoge los valores de los inputs nombre, apellidos y fecha y la muestra en el propio documento
al clickar en enviar. 
Los archivos son subidos al mismo directorio que el archivo. Decidí no crear una carpeta exclusiva para los archivos por simplificar,
pero se podría haber hecho y solo cambiar la ruta donde se almacenan en vez de en __DIR__
Posteriormente, al final del documento, también se muestran los datos de los archivos enviados.

