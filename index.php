<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body id="body">
	<br>
	
	<h2> CRUD en PHP</h2>
	<br>
    <div class="container">
    	<div class="jumbotron">
	        <div class="row">
	            <h4>LISTA USUARIOS</h4>
	        </div>
	        <br>
	        <a href="vista-crear-usuario.php" class="btn btn-primary">Crear contacto</a>

	            <div class="row">
	                <!-- TABLA -->
	                <br>
	                <table class="table table-bordered table-hover">
	                    <!-- Cabeza tabla -->
	                    <thead>
	                        <tr class="info">
	                          <th>Rut</th>
	                          <th>Nombre</th>
	                          <th>Email</th>
	                          <th>Teléfono</th>
	                          <th>Cargo</th>
	                          <th>Acciones</th>
	                        </tr>
	                    </thead>
	                    <!-- Cuerpo tabla -->
	                    <tbody>
	                      <?php 
	                        // Requerimos archivo conexion.php
	                        require('connection.php');
	                        // Instanciamos la clase Conexion       
	                        $db = new ConnectionDB();   
	                        // Instrucción SQL que permite rescatar todos los datos de la tabla contactos
	                        $sql = $db->query("select * from contacto c inner join cargo a on (c.cod_cargo=a.codigo);");
	                        // Obtenemos el número de filas del conjunto seleccionado
	                        $nfilas = $db->rows($sql);
	                        // Si la cantidad de filas es mayor a cero podemos proceder
	                        if ($nfilas > 0){
	                            for ($i=0; $i<$nfilas; $i++) {
	                                // Obtenemos fila en formato arreglo
	                                $datos = $db->recorrer($sql);
	                                //Imprimimos los datos obtenidos    
	                                echo '<tr>';
	                                echo '<td>'. $datos['rut'] . '</td>';
	                                echo '<td>'. $datos['nombre'] . '</td>';
	                                echo '<td>'. $datos['email'] . '</td>';
	                                echo '<td>'. $datos['telefono'] . '</td>';
	                                echo '<td>'. $datos['descripcion'] . '</td>';
	                                echo '<td> <a href="vista-update-usuario.php?rut='.$datos['rut'].'" class="btn btn-success">Actualizar</a> - <a href="delete-usuario.php?rut='.$datos['rut'].'" class="btn btn-danger">Eliminar</a></td>';
	                                echo '</tr>';
	                            }
	                        }
	                      ?>
	                    </tbody>
	                </table>
	            </div>  <!-- /row -->
	        </div>
    </div> <!-- /container -->
</body>
</html>