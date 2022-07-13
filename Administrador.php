<?php
include_once 'conexionPDO.php';
session_start();
if(!isset($_SESSION['Rol']))	
	{
		header('location: login.php');
	}
else
	{
		if($_SESSION['Rol'] !=1)
			{
				header('location: login.php');
			}
	}
?>
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body background="fondo.jpg" style="background-repeat: no-repeat;  background-size: 100%; height:130vh width:10vh;" >
			

<div align="center">
	<?php
		$nombres = $_SESSION['identificacion'];
		//$fotosesion = $_SESSION['foto'];
			echo "<font face= impact size= 4> Bienvenido <br> Administrador</font><br>";
			//echo $fotosesion;
	?>
	<?php
		$conexion=mysqli_connect('localhost','root','','qrparking') or die ('Hay problemas en la conexion');
	?>
</div >
    <center><a href="QR-PARKING.php">Registrar Nuevo Usuario</a></center>
    <br>
    <br>


		
	
		
			<?php
			//echo "<div align='center'><img src='imagenes/$fotosesion <!-- ' width='200' height='160' > --></div>";	
			?>
		
	

<div>
<table border="3" align="center" class="table table-bordered" >
	<b>
		<tr>
		<thead class="thead-dark">	
			<th>ID</th>
			<th>NOMBRES</th>
			<th>TIPO DOC</th>
			<th>NUMERO</th>
			<th>CATEGORIA</th>
	 		<th>TELEFONO</th>
	 		<th>CORREO</th>
	 		<th>VEHICULO</th>
	 		<th>PLACA</th>
	 		<th>CLAVE</th>
	 		<!-- <th>FOTO</th> -->
			<th>EDITAR</th>
			<th>BORRAR</th>
		</thead>
	</tr>
	<?php

	$observar=" SELECT * FROM vista_usuarios ";

//$observar="SELECT id_u,Nombre_Completo,Rol,Tipo,Numero_identificacion,Tipo_Vehiculo,Placa_NumMarco,Email,Num_Telefono,Contrasena,Foto_Vehiculo FROM usuarios,roles,tipos_documento,tipo_vehiculo WHERE usuarios.Id_Rol=roles.Id AND usuarios.Id_Tipo_Documento=tipos_documento.Id AND usuarios.Id_Tipo_Vehiculo=tipo_vehiculo.Id";

	//$observar=" SELECT * FROM usuarios ";

	$ejecutar=mysqli_query($conexion,$observar);
	$contador = 0;
	while ($filas=mysqli_fetch_array($ejecutar)) 
	{
		$id =             $filas['id_u'];
		$nombres =        $filas['Nombre_Completo'];
		$doc =            $filas['Tipo'];
		$identificacion = $filas['Numero_identificacion'];
		$categoria =      $filas['Rol'];
		$telefono =       $filas['Num_Telefono'];
		$correo =         $filas['Email'];
		$vehiculo =       $filas['Tipo_Vehiculo'];
		$placa =          $filas['Placa_NumMarco'];
		$clave =         $filas['Contrasena'];
	  //$imagenasubir = $filas['Foto_Vehiculo'];
		$contador++;
	?>
	<tr align="center">	
			<td><?php echo $id ?></td>
			<td><?php echo $nombres ?></td>
			<td><?php echo $doc ?></td>
			<td><?php echo $identificacion ?></td>
			<td><?php echo $categoria ?></td>
			<td><?php echo $telefono ?></td>
			<td><?php echo $correo ?></td>
			<td><?php echo $vehiculo ?></td>
			<td><?php echo $placa ?></td>
			<td><?php echo $clave ?></td>
		<!-- <td><img src="imagenes/<?php echo $fotografia ?>" width="50" height="40" ></td>  -->

			<td><button style="background-color: whitesmoke; " class="btn btn-primary mb-2"><a href="administrador.php? editar= <?php echo $id;?> ">Editar</a></button></td>
			<td><button style="background-color: whitesmoke;" class="btn btn-primary mb-2"><a href="administrador.php? borrar= <?php echo $id; ?>">Borrar</a></button></td>
	</tr>
</b>
	<?php
	}
	?>
</table>
</div>
<br><br>
<?php
if(isset($_GET['editar']))
	{
	$editar_id = $_GET['editar'];
	$consulta = "SELECT * FROM usuarios WHERE id_u = '$editar_id'";
	$ejecutar=mysqli_query($conexion,$consulta);
	$filas=mysqli_fetch_array($ejecutar);
		$id =             $filas['id_u'];
		$nombres =        $filas['Nombre_Completo'];
		$doc =            $filas['Id_Tipo_Documento'];
		$identificacion = $filas['Numero_identificacion'];
		$categoria =      $filas['Id_Rol'];
		$telefono =       $filas['Num_Telefono'];
		$correo =         $filas['Email'];
		$vehiculo =       $filas['Id_Tipo_Vehiculo'];
		$placa =          $filas['Placa_NumMarco'];
		$clave   =        $filas['Contrasena'];
	 	$fotoeditor =     $filas['Foto_Vehiculo'];
?>
<table border="4" align="center" class="table table-bordered">
	<tr>
		<td>
<div align="center">
	<form method="POST" action="#" enctype="multipart/form-data">
		NOMBRES    <input type="text"    	 name="nombres" value="<?php echo $nombres  ?>"> <br>
		DOCUMENTO  <input type="number"     name="doc" value="<?php echo $doc  ?>"> <br>
		NUMERO     <input type="number"     name="identificacion" value="<?php echo $identificacion  ?>"> <br>
		CATEGORIA  <input type="number"     name="categoria" value="<?php echo $categoria ?>"> <br>
		TELEFONO   <input type="number"     name="telefono" value="<?php echo $telefono ?>"> <br>
		CORREO     <input type="email"     	name="correo" value="<?php echo $correo ?>"> <br>
		VEHICULO   <input type="number" 		name="vehiculo"   value="<?php echo $vehiculo ?>"><br>
		PLACA      <input type="text"   		name="placa"   value="<?php echo $placa    ?>"><br>
		CLAVE      <input type="password"   name="clave"   value="<?php echo $clave    ?>"><br>
		<!-- FOTO       <input type="text"    		name="foto"    value="<?php echo $fotoeditor ?>"><br> -->
			         <!-- <input type="file" 	  	name="imagenasubir" ><br> -->
			         <input type="submit"   	name="actualizame" value="Actualizar Datos" style="cursor: pointer;"><br>
	</form>
</div>
		</td>
		
			<?php
			//echo "<div align='center'><img src='imagenes/$fotoeditor <!-- ' width='200' height='160' > -->	
			?>
	
	</tr>
</table>
<br><br><br>
<?php
  }
?>
<?php
if(isset($_POST['actualizame']))
	{
	$actualizanombres = $_POST['nombres'];
	$actualizadoc = $_POST['doc'];
	$actualizaidentificacion = $_POST['identificacion'];
	$actualizacategoria = $_POST['categoria'];
	$actualizatelefono = $_POST['telefono'];
	$actualizacorreo = $_POST['correo'];
	$actualizavehiculo   = $_POST['vehiculo'];
	$actualizaplaca   = $_POST['placa'];
	$actualizaclave   = $_POST['clave'];
	//$actualizafoto   = $_POST['foto'];

	// $ruta = "imagenes/".basename( $_FILES['imagenasubir']['name']);
	// 	if (move_uploaded_file( $_FILES['imagenasubir']['tmp_name'],$ruta)) 
	// 		{
	// 		echo "<div align='center'><font face='impact' size='3'><b> 
	// 		El archivo ".basename( $_FILES['imagenasubir']['name'])." ha sido subido satisfactoriamente</b></font></div>";
	// 		}
	// 	else
	// 		{
	// 			echo "El archivo no se ha podido cargar";
	// 		}

	$update = "UPDATE usuarios SET Nombre_Completo = '$actualizanombres',Id_Tipo_Documento = '$actualizadoc',Numero_identificacion = '$actualizaidentificacion',Id_Rol = '$actualizacategoria',Num_Telefono= '$actualizatelefono',Email = '$actualizacorreo',Id_Tipo_Vehiculo = '$actualizavehiculo',Placa_NumMarco = '$actualizaplaca',Contrasena = '$actualizaclave'  WHERE id_u = '$editar_id'";

	//,Foto_Vehiculo ='$actualizafoto'
	$ejecutar=mysqli_query($conexion,$update);
	if ($ejecutar)
		{
			
			echo "<script>
					windows.open('Administrador.php')
				 </script> ";
		}
	else
		{
			echo "<script>
					alert ('NO SE PUDO EDITAR')
				</script> ";
		}
	}
	
?>
<?php
if(isset($_GET['borrar']))
	{
	$borrar_id = $_GET['borrar'];
	$borrar = "DELETE FROM usuarios WHERE id_u = '$borrar_id'";
	$ejecutar=mysqli_query($conexion,$borrar);
	if($ejecutar)
		{
			
			echo "<script>
						windows.open('Administrador.php')
					 </script> ";
		}
	else
		{
			echo "<script>
						alert ('No se ha podido eliminar')
					 </script> ";
		}
    }
    	unset($_POST['borrar']);
?>
<div align="center">
	<form action="login.php" method="POST">
		
		<input type="submit" name="cerrar_sesion" value="CERRAR SESION" class="btn btn-primary mb-2">
				
			
		
<!-- 
		<input type="submit" name="cerrar_sesion" value="Cerrar Sesion"> -->
	</form>
</div>
</body>
</html>