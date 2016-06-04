<?php
/* Script que captura datos recibidos por POST y los guarda en una DB*/

// Requerimos la clase conexión 
	require('connection.php');

    //Instanciamos la clase
    $db = new ConnectionDB();

    //Capturamos el rut via GET
    $var= $_GET['rut'];
    /* Enviamos la instrucción SQL que permite eliminar
    los datos a la BD en la tabla contacto */
    $db->query("delete from contacto where rut like '$var';");

     // Regresamos a index.php
    header("location: index.php");

?>