<?php
	require('connection.php');
	$db= new ConnectionDB();
	$var= $_GET['rut'];
	$sql= $db->query('select * from contacto where rut like "'.$var.'";');
	$consulta= $db->recorrer($sql);
	$select= $db->query("select * from cargo");
	$filas= $db->rows($select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body id="body">
	<br>
	<h2>CRUD en PHP</h2>
	<br>
	<div class="container">
		<div class="jumbotron">
			<h4>Datos actuales en : <?php echo $consulta['nombre']?></h4>
			<br>
			<table class="table table-bordered table-hover">
				<thead>
					<tr class="info">
						<th>Rut</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Telefono</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $consulta['rut']?></td>
						<td><?php echo $consulta['nombre']?></td>
						<td><?php echo $consulta['email']?></td>
						<td><?php echo $consulta['telefono']?></td>
					</tr>					
				</tbody>
			</table>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="jumbotron">
			<h4>Formulario para actualizar contacto</h4>

			<br>
			<div class="row">
	            <div>
	            	<a href="index.php" class="btn btn-primary">Volver a la lista</a>
	            </br>
	            </br>
	                
	                <form role="form" method="POST" action=<?php echo "update-usuario.php?rut=".$consulta['rut']; ?> >
	                    <!-- INPUT NUEVO RUT -->
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">
	                            Ingrese nuevo rut:
	                        </label>
	                        <input name="in-rut" type="text" class="form-control" />
	                    </div>
	                    <!-- INPUT NUEVO NOMBRE -->
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">
	                            Ingrese nuevo Nombre:
	                        </label>
	                        <input name="in-nombre" type="text" class="form-control" />
	                    </div>
	                    <!-- INPUT NUEVO EMAIL -->
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">
	                            Ingrese nuevo e-mail:
	                        </label>
	                        <input name="in-mail" type="text" class="form-control" />
	                    </div>
	                    <!-- INPUT NUEVO TELÉFONO -->
	                    <div class="form-group">
	                        <label for="exampleInputEmail1">
	                            Ingrese nuevo teléfono:
	                        </label>
	                        <input name="in-telefono" type="text" class="form-control" />
	                    </div>
	                     <!-- COMBOBOX NUEVO CARGO-->
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
	                        Actualizar
	                    </button>
	                </form> <!-- Fin formulario -->
	            </div>
	        </div>
		</div>
	</div>
	
</body>
</html>