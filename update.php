<?php
	require('connection.php');
	$db= new ConnectionDB();

	$rut = $db->escape_string($_POST['up-rut']);
    $nombre = $db->escape_string($_POST['up-nombre']);
    $mail = $db->escape_string($_POST['up-email']);
    $telefono = $db->escape_string($_POST['up-telefono']);
    $cargo = $db->escape_string($_POST['up-cargo']);
    $var= $db->escape_string($_GET['rut']);

    /* Enviamos la instrucción SQL que permite ingresar 
    los datos a la BD en la tabla contactos */
    if($db->query("update contacto set rut = '$rut', nombre = '$nombre', email='$mail', telefono='$telefono', cod_cargo='$cargo' where rut like '$var';")){
    	header('Content-Type: application/json');
    	echo json_encode(array('exito'=>true, 'rut'=>$rut,'nombre'=>$nombre, 'email'=>$mail,'telefono'=>$telefono,'cargo'=>$cargo));
    }else{
    	die("Ocurrio UN problema al ejecutar la consulta de insercion en BBDD error [ ".$db->error." ]");
    }

?>