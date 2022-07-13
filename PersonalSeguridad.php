<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title></title>
</head>

<body background="fondo.jpg" style="background-repeat: no-repeat;  background-size: 100%; height:100vh width:10vh;" >
			
			<br>
			<center><img src="logo.jpg" width="300" height="140"></center>


<form action="#" method="GET">
<center><h3><font face="Comic Sans MS" color="#0B3861">REGISTRO DE ENTRADA Y SALIDA PARQUEADERO</font></h3></center> <br>
<center>

<font face="Comic Sans MS" color="#0B3861">Ingrese PLACA /No. MARCO  </font><input type="text" name="idusuario"><br>
</center><br>
<table align="center">
<td><center><input type="submit" name="entrada" value="ENTRADA" class="btn btn-primary mb-2"></center><br></td>
<td><center><input type="submit" name="salida" value="SALIDA" class="btn btn-primary mb-2"></center><br></td>
<td><center><input type="submit" name="Ver" value="VER MINUTA" class="btn btn-primary mb-2"></center><br></td>


</table>

</form>


<?php

	error_reporting(0);

	include_once 'conexionPDO.php';
	session_start();
	if(!isset($_SESSION['Rol']))	
		{
			header('location: login.php');
		}
	else
		{
			if($_SESSION['Rol'] !=3)
				{
					header('location: login.php');
				}
			}
	

if(isset($_POST['cerrar_sesion']))
			{
				//include_once 'cerrar.php';
				session_unset();
				session_destroy();
			}


$conexion=mysqli_connect('localhost','root','','qrparking') or die ('Hay problemas en la conexion');

$id_usuario=$_GET['idusuario'];

if(isset($_GET['entrada'])){
$id_usuario=$_GET['idusuario'];
date_default_timezone_set('America/Bogota');
$DateAndTime1 = date('Y-m-d h:i:s ');
$insertar1= "INSERT INTO minuta (Id,Placa,Hora_entrada)  VALUES (null,'$id_usuario','$DateAndTime1')";
$ejecutar=mysqli_query($conexion,$insertar1);
echo("<center>Se ha registrado la  entrada de  ".$id_usuario."</center>" );

}



if(isset($_GET['salida'])){
date_default_timezone_set('America/Bogota');
$DateAndTime2 = date('Y-m-d h:i:s ');

//$insertar2= "INSERT INTO minuta (Id,Id_usuario , Hora_salida)  VALUES (null,'$id_usuario','$DateAndTime2') WHERE Id_usuario = '$id_usuario'";
$update = "UPDATE minuta SET Hora_salida = '$DateAndTime2'  WHERE Placa = '$id_usuario'";
$ejecutar=mysqli_query($conexion,$update);

echo("<center>Se ha registrado la  salida de  ".$id_usuario."</center>" );
}

if(isset($_GET['Ver'])){


?>

<center><h3><font face="Comic Sans MS" color="#0B3861">MINUTA USUARIOS  EASY-PARKING</font></h3></center> <br>
						<table class="table table-bordered">
							<tr>
								<thead class="thead-dark">
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">ID USUARIO</font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">NOMBRE DE USUARIO</font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">TIPO DE DOCUMENTO</font></font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">No. DOCUMENTO</font></font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">No. TELEFONO</font></font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">TIPO DE VEHICULO</font></font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">PLACA /No. MARCO</font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">HORA ENTRADA</font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">HORA SALIDA</font></th></thead></tr>
									<?php
										$conexion=mysqli_connect('localhost','root','','qrparking') or die("NO SE HA CONECTADO LA BASE DE DATOS");	
										
 										$observar="SELECT id_u,Nombre_Completo,Tipo,Numero_identificacion,Num_telefono,Tipo_Vehiculo,Placa_NumMarco,Hora_entrada,Hora_salida FROM usuarios,minuta,tipos_documento,tipo_vehiculo WHERE  usuarios.Id_Tipo_Documento=tipos_documento.Id AND usuarios.Id_Tipo_Vehiculo=tipo_vehiculo.Id AND usuarios.Placa_NumMarco=minuta.Placa";
										//$observar="SELECT Id_usuario,Nombre_Completo,Tipo,Numero_identificacion,Tipo_Vehiculo,Placa_NumMarco,Hora_entrada,Hora_salida FROM usuarios,minuta,tipos_documento,tipo_vehiculo WHERE usuarios.id_u=minuta.Id_usuario AND usuarios.Id_Tipo_Documento=tipos_documento.Id AND usuarios.Id_Tipo_Vehiculo=tipo_vehiculo.Id";
										$ejecutar=mysqli_query($conexion,$observar);
										$contador=0;
										while ($filas=mysqli_fetch_array($ejecutar)) 
											{
												$id=$filas['id_u'];
												$nombres=$filas['Nombre_Completo'];
												$doc=$filas['Tipo'];
												$identificacion=$filas['Numero_identificacion'];
												$telefono=$filas['Num_telefono'];
												$vehiculo=$filas['Tipo_Vehiculo'];
												$placa=$filas['Placa_NumMarco'];
												$entrada=$filas['Hora_entrada'];
												$salida=$filas['Hora_salida'];
												$contador++;
											
										
									?>

								<tr align="center">	
										<td><?php echo $id ?></td>
										<td><?php echo $nombres ?></td>
										<td><?php echo $doc ?></td> 
										<td><?php echo $identificacion ?></td>
										<td><?php  echo $telefono ?></td>
										<td><?php echo $vehiculo ?></td>
										<td><?php echo $placa ?></td>
										<td><?php echo $entrada ?></td>
										<td><?php echo $salida?></td>
										
								</tr>
							<?php
						}
					}
						?>
						</table>

					
						<br><br>


<form action="login.php" method="POST">
		
		<center><input type="submit" name="cerrar_sesion" value="CERRAR SESION" class="btn btn-primary mb-2"></center>
				
			
		
<!-- 
		<input type="submit" name="cerrar_sesion" value="Cerrar Sesion"> -->
	</form>
</body>
</html>
