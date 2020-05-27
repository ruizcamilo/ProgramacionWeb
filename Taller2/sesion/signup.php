<html>
	<head>
		<h1>Crear Usuario</h1>
	</head>
	<body>
	<form action="./confirmsignup.php" method="post">
		Cedula: <input type="text" name="cedula" 
			<?php 
				if(isset($_POST['cedula']))
					{
						echo "value='".$_POST['cedula']."'";
					}
				?>
			>
		<br>
		Username: <input type="text" name="usuario"<?php 
				if(isset($_POST['usuario']))
					{
						echo "value='".$_POST['usuario']."'";
					}
				?>
			><br>
		Contraseña: <input type="password" name="contrasena"<?php 
				if(isset($_POST['contrasena']))
					{
						echo "value='".$_POST['contrasena']."'";
					}
				?>
			><br>
		Confirmar Contraseña: <input type="password" name="contrasenac"<?php 
				if(isset($_POST['contrasenac']))
					{
						echo "value='".$_POST['contrasenac']."'";
					}
				?>
			><br>
    	<input type="submit" value="Crear" />
	</form>
	<form action="../index.php" method="get">
    	<input type="submit" value="Volver" />
	</form>
	</body>
</html>