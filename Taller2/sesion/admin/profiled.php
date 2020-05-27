<html>
	<?php
		$admin = $_GET['admin'];
		$current = $_GET['user'];
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
				echo "<h1>Actualmente viendo el perfil de ".$filau['nombreusuario']."</h1>";
				echo "<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/User_font_awesome.svg/240px-User_font_awesome.svg.png' width='200' height='200'>";
				echo "<h3>Datos Personales: </h3>";
				echo "<label>Nombre: </label>".$filap['nombre']." ".$filap['apellido'];
				echo "<br>";
				echo "<label>Cedula: </label>".$filap['cedula'];
				echo "<br>";
				echo "<label>E-mail: </label>".$filap['email'];
				echo "<br>";
				echo "<label>Edad: </label>".$filap['edad'];
				echo "<br>";
				echo "<h3>Datos Cuenta: </h3>";
				echo "<form action='./changerole.php' method='post'>";
					echo "Username: ".$filau['nombreusuario'];
				echo "<br>";
					echo "<input type='hidden' name='admin' value='".$admin."'>";
					echo "<input type='hidden' name='user' value='".$filau['nombreusuario']."'>";
					echo "<label>Rol: </label>";
					if($filau['rol'] == 'admin')
					{
						echo "<select name='rol'>
  								<option value='admin' selected>Administrador</option> 
  								<option value='usuario'>Usuario</option>
  						 	</select>";
  					}
  					else{
  						echo "<select name='rol'>
  								<option value='admin'>Administrador</option> 
  								<option value='usuario' selected>Usuario</option>
  						 	</select>";
  					}
  				echo "<br>";
  				echo "<br>";
				echo "<input type='submit' value='Guardar' />";
				echo "</form>";
				echo "<form action='./delete.php' method='post'>";
				echo "<input type='hidden' name='admin' value='".$admin."'>";
				echo "<input type='hidden' name='user' value='".$filau['nombreusuario']."'>";
				echo "<input type='submit' value='Borrar Usuario' />";
				echo "</form>";
				echo "<br>";
				$one = false;
			}
			mysqli_close($con);
		}
	?>
</html>