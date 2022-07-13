<html>
	<body background="logo2.jpg" style="background-repeat: no-repeat; background-position:center; background-size: cover; height:100vh;" >
				<?php

					$nombres=$_POST['nombres'];
					$doc=$_POST['doc'];
					$identificacion=$_POST['identificacion'];
					$categoria=2;
					$telefono=$_POST['telefono'];
					$correo=$_POST['correo'];
					$vehiculo=$_POST['vehiculo'];
					$placa=$_POST['placa'];
					$fotosesion=$_POST['foto'];
					$clave=$_POST['clave'];
					
					$conexion=mysqli_connect('localhost','root','','qrparking') or die("NO SE HA CONECTADO LA BASE DE DATOS");
					 $sql="INSERT INTO usuarios(Nombre_Completo,Id_Tipo_Documento,Numero_identificacion,Id_Rol,Num_Telefono,Email,Id_Tipo_Vehiculo,Placa_NumMarco,Foto_Vehiculo,Contrasena) 
						VALUES ('$nombres','$doc','$identificacion','$categoria','$telefono','$correo','$vehiculo','$placa','$fotosesion','$clave')";

					$resultado=mysqli_query($conexion,$sql) or die("ERROR EN LA BASE DE DATOS");
					mysqli_close($conexion);
						if($resultado)
							{
								header('Location: login.php');
							}
				?>
	</body>
</html>