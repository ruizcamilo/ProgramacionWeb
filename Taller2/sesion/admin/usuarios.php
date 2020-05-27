<html>
	<h1>Bienvenido Admin</h1>
	<body>
		<table>
			<tr>
    			<th>Cedula</th>
    			<th>Username</th>
 				<th>Rol</th>
  			</tr>
		<?php
			$current = $_GET['admin'];
			include_once 'C:\xampp\htdocs\Taller1\sesion\config.php';
			$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
			if (mysqli_connect_errno()) {
				echo "Error en la conexión: " . mysqli_connect_error();
			}
			$sql = "SELECT * FROM Usuarios ORDER BY rol ASC";
			$resultado = mysqli_query($con,$sql);
			while($fila = mysqli_fetch_array($resultado)) {
				if($fila['nombreusuario'] != $current)
				{
					echo "<tr>";
					echo "<td>".$fila ['cedula']."</td>";
					echo "<td>"."<a href='.\profiled.php?user=".$fila['nombreusuario']."&admin=".$current."'>".$fila ['nombreusuario']."</td>";
	  				echo "<td>".$fila ['rol']."</td>";
	  				echo "</tr>";
	  			}
	  			else{
	  				echo "<tr>";
					echo "<td>".$fila ['cedula']."</td>";
					echo "<td>".$fila ['nombreusuario']."</td>";
	  				echo "<td>".$fila ['rol']."</td>";
	  				echo "</tr>";
	  			}
			}
			mysqli_close($con);
		?>
		</table>
		<form action="../../index.php" method="post">
			<input type="hidden" name = "cont" value="1">
    		<input type="submit" value="Salir" />
		</form>
	</body>
</html>