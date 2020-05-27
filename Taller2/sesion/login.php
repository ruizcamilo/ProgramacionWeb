<html>
	<head>
		<h1>Login</h1>
	</head>
	<body>
	<form action="./confirmlogin.php" method="post">
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
    	<input type="submit" value="Login" />
	</form>
	<form action="./signup.php" method="get">
		<label>¿Aún no tiene una cuenta? Registrese acá</label>
    	<input type="submit" value="Registrarse" />
	</form>
	<br>
	<form action="../index.php" method="get">
    	<input type="submit" value="Volver" />
	</form>
	</body>
</html>
