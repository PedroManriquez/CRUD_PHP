<?php
/* Script que captura datos recibidos por POST y los guarda en una DB*/

// Requerimos la clase conexión 
	require('connection.php');

    //Instanciamos la clase
    $db = new ConnectionDB();

    //Capturamos los datos recibidos vía POST
    $rut = $_POST['in-rut'];
    $nombre = $_POST['in-nombre'];
    $mail = $_POST['in-mail'];
    $telefono = $_POST['in-telefono'];
    $cargo = $_POST['in-cargo'];

    /* Enviamos la instrucción SQL que permite ingresar 
    los datos a la BD en la tabla contactos */
    $db->query("insert into contacto values ('$rut','$nombre','$mail','$telefono', '$cargo');");

     // Regresamos a index.php
    header("location: index.php");

?>