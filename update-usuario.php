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
    $var= $_GET['rut'];
    $cargo= $_POST['in-cargo'];
    /* Enviamos la instrucción SQL que permite actualizar
    los datos a la BD en la tabla contacto */
    $db->query("update contacto set rut = '$rut', nombre = '$nombre', email='$mail', telefono='$telefono', cod_cargo='$cargo' where rut like '$var';");

     // Regresamos a index.php
    header("location: index.php");

?>