<?php
/*Utilizamos una función para establecer la conexión*/
function Conectarse()
{
/*Mediante una condicion determinamos si se establecio o no la conexion.
Usamoa la pg_connect donde colocamos los parámetros:
dbname=Nombre de la Base de Datos
port=Puerto de Conexion a la Base de Datos
user=Nombre de Usuario para conectarse
password=Password para conectarse*/
if (!($conexion = pg_connect("host=localhost dbname=web port=5432 user=usuweb password=gdsweb")))
{
/*Si la conexion no es exitosa se mostrara el siguiente mensaje y salimos*/
echo "No pudo conectarse al servidor";
exit();
}
/*No importa si se establecio o no la conexion, esta sera devuelta por la funcion*/
return $conexion;
}

/*Ahora mandamos a llamar la funcion*/
Conectarse();

?>
