<!DOCTYPE html>
<html>
	<head>
		<title>EASY-PARKING</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	
	 <body background="fondo.jpg" style="background-repeat: no-repeat;  background-size: 100%; height:100vh width:10vh;" >
			
			<br>
			<center><img src="logo.jpg" width="300" height="140"></center>
		
				<center><h1><font face="Cambria" color="#01A9DB">FORMULARIO DE REGISTRO</font></h1></center>
				
				<form  action="recibir.php" method="POST">
					<center><p><b><font face="Comic Sans MS" size="2" color="#0B3861">INGRESE SUS NOMBRES Y APELLIDOS  
						<input type="text" name="nombres" required></font></p></b>
								<p><b><font face="Comic Sans MS" size="2" color="##0B3861">SELECCIONE TIPO DE DOCUMENTO  
						<input type="radio" name="doc" value="1">TARJETA DE IDENTIDAD 
						<input type="radio" name="doc" value="2" checked>CEDULA  
						<input type="radio" name="doc" value="3">PASAPORTE 
						<input type="radio" name="doc" value="5">CC EXTRANJERA
								<p><b><font face="Comic Sans MS" size="2" color="##0B3861">INGRESE No. IDENTIFICACION  
						<input type="text" name="identificacion" required></font></p></b>
						
								<p><b><font face="Comic Sans MS" size="2" color="##0B3861">INGRESE SU No.TELEFONICO  
						<input type="text" name="telefono" required></font></p></b>
					
								<p><b><font face="Comic Sans MS" size="2" color="##0B3861">INGRESE SU CORREO  
						<input type="text" name="correo" required></font></p></b>
					
								<p><b><font face="Comic Sans MS" size="2" color="##0B3861">SELECCIONE TIPO DE VEHICULO 
						<input type="radio" name="vehiculo" value="1">BICICLETA <input type="radio" name="vehiculo" value="2" checked>MOTOCICLETA
						
								<p><b><font face="Comic Sans MS" size="2" color="##0B3861">INGRESE NUMERO DE PLACA O TARJETA DE PROPIEDAD DEL VEHICULO  
						<input type="text" name="placa" required></font></p></b>
					
								<p><b><font face="Comic Sans MS" size="2" color="##0B3861">SELECCIONE SU JORNADA  
						<input type="radio" name="jornada" value="1">MAÑANA <input type="radio" name="jornada" value="2">TARDE  
						<input type="radio" name="jornada" value="3" checked>NOCHE
						
								<p><b><font face="Comic Sans MS" size="2" color="#FE2E2E">INGRESE UNA CONTRASEÑA   
						<input type="password" name="clave" required></font></p></b>
					
									
					
								<p><b><font face="Comic Sans MS" size="2" color="##0B3861">SUBIR FOTO DE USUARIO 
						<input type="file" name="foto" ><br></font></p></b>

					
				    <input type="submit" name="actualizame" value="CONFIRMAR Y ENVIAR" style="cursor: pointer;" class="btn btn-primary mb-2">
				</form>
		</body>
</html>