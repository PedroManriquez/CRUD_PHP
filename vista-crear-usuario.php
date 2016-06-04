<?php 
	require("connection.php");
	$db= new ConnectionDB();
	$select= $db->query("select * from cargo");
	$filas= $db->rows($select);
?>

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
	            <h4>CREAR CONTACTO</h4>
	        </div>
	        <br>
	        <div class="row">
	            <div>
	            	<a href="index.php" class="btn btn-primary">Volver a la lista</a>
	            </br>
	            </br>
	           	    <!-- Inicio formulario -->
	                <!-- Utilizamos el método POST -->
	                <!-- El atributo "action" hace referencia al script 
	                que permite crear un nuevo contacto (crear-usuario.php) -->
	                <form role="form" method="POST" action="crear-usuario.php">
	                    <!-- INPUT RUT -->
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">
	                            Ingrese rut:
	                        </label>
	                        <input name="in-rut" type="text" class="form-control" />
	                    </div>
	                    <!-- INPUT NOMBRE -->
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">
	                            Ingrese Nombre:
	                        </label>
	                        <input name="in-nombre" type="text" class="form-control" />
	                    </div>
	                    <!-- INPUT EMAIL -->
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">
	                            Ingrese e-mail:
	                        </label>
	                        <input name="in-mail" type="text" class="form-control" />
	                    </div>
	                    <!-- INPUT TELÉFONO -->
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">
	                            Ingrese teléfono:
	                        </label>
	                        <input name="in-telefono" type="text" class="form-control" />
	                    </div>
	                    <!-- COMBOBOX CARGO-->
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">
	                            Seleccione Cargo:  
	                        </label>
	                        <select name="in-cargo" id="" class="btn btn-default dropdown dropdown-toggle">
	                        <?php if($filas>0){
	                        	 	for($i=0 ; $i<$filas ; $i++){ 
	                        	 		$datos= $db->recorrer($select); 
	                        ?>
	                        			<option value=<?php echo $datos['codigo']; ?> > <?php echo $datos['descripcion'] ?></option>
							<?php 	} 
								  } 
							?>
	                        </select>
	                    </div>
	                    <!-- SUBMIT -->
	                    <button type="submit" class="btn btn-success">
	                        CREAR CONTACTO
	                    </button>
	                </form> <!-- Fin formulario -->
	            </div>
	        </div>
		</div>
    </div> <!-- /container -->
</body>
</html>