<html>
 
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	</head> 
	

	<body background="fondo.jpg" style="background-repeat: no-repeat;  background-size: 100%; height:100vh width:10vh;" >
			
			<br><br>
			<center><img src="logo.jpg" width="300" height="140"></center>
			<center><h1><font face="Cambria" color="#01A9DB">BIENVENID@</font></h1></center><br><br>

				<form method="POST" action="login.php">
					<center><font face="Comic Sans MS" size="3" color="#0B3861"> <input type="text"     name="identificacion" placeholder="No. de indentificacion" required></font></center><br>
					<center><font face="Comic Sans MS" size="3" color="#0B3861"> <input type="password" name="clave"   placeholder="Ingrese su clave" required></font></center><br>
					<center><input type="submit" value="INGRESAR" class="btn btn-primary mb-2"></center>
			</form>
			<center><font face="Comic Sans MS" size="3" color="#0B3861">¿No estas registrado?<br><a href="QR-PARKING.php">Registrate aqui</a></font></center>
	</body>


<?php
		include_once 'conexionPDO.php';
		$conexion=mysqli_connect("localhost", "root", "", "qrparking");
		session_start();
		if(isset($_POST['cerrar_sesion']))
			{
				//include_once 'cerrar.php';
				session_unset();
				session_destroy();
			}
		if(isset($_SESSION['Rol']))
			{
				switch ($_SESSION['Rol']) 
				{	
					case 1:
							header('Location: Administrador.php');
									break;
					case 2:
						header('Location: Usuario.php');
						break;
					case 3:
						header('Location: PersonalSeguridad.php');
						break;
					default:
						echo "Este rol no existe dentro de las opciones";
						break;
				}
			}
		if (isset($_POST['identificacion']) && isset($_POST['clave']))
			{
				$username=$_POST['identificacion'];
				$password=$_POST['clave'];

				$db=new Database();
				$query=$db->connectar()->prepare('SELECT * FROM usuarios WHERE Numero_identificacion=:identificacion AND Contrasena=:clave');
				$query->execute(['identificacion'=>$username,'clave'=>$password]);
				$arreglofila=$query->fetch(PDO::FETCH_NUM);

				if ($arreglofila == true ) 
					{
						$rol=$arreglofila[4];
						$_SESSION['Rol']=$rol;
						switch ($rol) 
							{	
								case 1:
									header('Location: Administrador.php');
									break;

								case 2:
									header('Location: Usuario.php');
									break;
								case 3:
									header('Location: PersonalSeguridad.php');
									break;
								default:
									echo "";
									break;
							}
						$usuario=$arreglofila[3];
						$_SESSION['identificacion']=$usuario;
						 $fotosesion=$arreglofila[9];
						 $_SESSION['foto']=$fotosesion;
					}
					else
					{
						echo'<script type="text/javascript">
		    				alert("NOMBRE O CONTRASEÑA INCORRECTOS");
		    				</script>';
					}
			}
	?>
	
</html>	