<?php
	include_once 'conexionPDO.php';
	session_start();
	if(!isset($_SESSION['Rol']))	
		{
			header('location: login.php');
		}
	else
		{
			if($_SESSION['Rol'] !=2)
				{
					header('location: login.php');
				}
		}
?>
<html>
	<head>
		<title>USUARIO</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
		<body background="fondo.jpg" style="background-repeat: no-repeat;  background-size: 100%; height:130vh width:10vh;" >
			
			<center><img src="logo.jpg" width="300" height="140"></center><br>		
			<div align="center">
				<?php
					$conexion=mysqli_connect('localhost','root','','qrparking')or die('TENEMOS PROBLEMAS EN LA CONEXION');
				?>

				<?php
					$usuario = $_SESSION['identificacion'];
					$fotosesion = $_SESSION['foto'];
					echo "<font face=Cambria size= 6 color=#01A9DB> Bienvenid@ <br></font>";
					echo "<div align='center'><img src='imagenes/$fotosesion ?>' width='200' height='160' ></div>";
				
				?>

				<center><h3><font face="Comic Sans MS" color="#0B3861">ESTA ES TU INFORMACION COMO USUARIO DE EASY-PARKING</font></h3></center> <br>
						<table class="table table-bordered">
							<tr>
								<thead class="thead-dark">
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">ID USUARIO</font></th>	
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">NOMBRE DE USUARIO</font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">TIPO. DE DOCUMENTO</font></font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">No. DE DOCUMENTO</font></font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">CATEGORIA</font></font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">No. TELEFONICO</font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">TIPO DE VEHICULO</font></font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">CORREO</font></th>
								<th><font face="Comic Sans MS" size="2" color="#01A9DB">PLACA /No. MARCO</font></th></thead></tr>
									<?php
										$conexion=mysqli_connect('localhost','root','','qrparking') or die("NO SE HA CONECTADO LA BASE DE DATOS");	
										
 
										$observar = "SELECT * FROM vista_usuarios where Numero_identificacion = '$usuario'";
										$ejecutar=mysqli_query($conexion,$observar);
										$contador=0;
										while ($filas=mysqli_fetch_array($ejecutar)) 
											{
												$id=$filas['id_u'];
												$nombres=$filas['Nombre_Completo'];
												$doc=$filas['Tipo'];
												$identificacion=$filas['Numero_identificacion'];
												$categoria=$filas['Rol'];
												$telefono=$filas['Num_Telefono'];
												$vehiculo=$filas['Tipo_Vehiculo'];
												$correo=$filas['Email'];
												$placa=$filas['Placa_NumMarco'];
												$contador++;
											
										
									?>

								<tr align="center">	
										<td><?php echo $id ?></td>
										<td><?php echo $nombres ?></td>
										<td><?php echo $doc ?></td>
										<td><?php echo $identificacion ?></td>
										<td><?php echo $categoria ?></td>
										<td><?php echo $telefono ?></td>
										<td><?php echo $vehiculo ?></td>
										<td><?php echo $correo ?></td>
										<td><?php echo $placa ?></td>
								</tr>
							<?php
						}
						?>
						</table>
			</div >
			<br><br>
				<font face="Comic Sans MS" size="2" color="##0B3861">
				<?php /*echo $_POST['Nombre_Completo'];*/?> </font>
				<center><h4><font face="Comic Sans MS" color="#0B3861">* Recuerda que si necesitas hacer algun cambio en tu informacion de registro debes comunicarte con el personal de seguridad o el administrador</font></h4></center><br><br>
				<form action="login.php" method="POST">
					<center><input type="submit" name="cerrar_sesion" value="CERRAR SESION" class="btn btn-primary mb-2"></center>
				</form>
		</body>
</html>

