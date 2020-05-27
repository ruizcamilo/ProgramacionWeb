<html>
	<?php
		$current = $_GET['usuario'];
		include_once 'C:\xampp\htdocs\Taller1\sesion\config.php';
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
        if (mysqli_connect_errno()) {
            echo "Error en la conexión: " . mysqli_connect_error();
            }
        $vsql = "SELECT * FROM Usuarios WHERE nombreusuario = '".$current."'";
        $resultado = mysqli_query($con,$vsql);
        $one = true;
		while($filau = mysqli_fetch_array($resultado)) 
		{
			$psql = "SELECT * FROM Personas WHERE cedula = ".$filau['cedula'];
			$resul = mysqli_query($con,$psql);
			while($filap = mysqli_fetch_array($resul) and $one)
			{
				echo "<h1>Bienvenid@, ".$filap['nombre']."</h1>";
				echo "<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/User_font_awesome.svg/240px-User_font_awesome.svg.png' width='200' height='200'>";
				echo "<h3>Mis datos: </h3>";
				echo "<label>Nombre: </label>".$filap['nombre']." ".$filap['apellido'];
				echo "<br>";
				echo "<label>Cedula: </label>".$filap['cedula'];
				echo "<br>";
				echo "<label>E-mail: </label>".$filap['email'];
				echo "<br>";
				echo "<label>Edad: </label>".$filap['edad'];
				echo "<br>";
				echo "<h3>Datos Cuenta: </h3>";
				echo "<label>Username: </label>".$filau['nombreusuario'];
				echo "<br>";
				echo "<label>Rol: </label>".$filau['rol'];
				echo "<br>";
				echo "<br>";
				$one = false;
			}
		}
		mysqli_close($con);
	?>
	<form action="../../index.php" method="post">
		<input type="hidden" name = "cont" value="1">
    	<input type="submit" value="Salir" />
	</form>
</html>
