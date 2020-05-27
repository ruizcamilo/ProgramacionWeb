<html>
	<head>
		<h1>Borrar Persona</h1>
	</head>
	<body>
		<h4>Ingrese la ceula de quien desea borrar</h4>
		<form action="./borrarconfirmar.php" method="post">
  			<label>Cedula</label>
  			<input type="text" id="cedula" name="cedula"><br><br>
  			<input type="submit" value="Borrar" />
  		</form>
  		<form action="../index.php" method="get">
        	<input type="submit" value="Volver" />
    	</form>
	</body>
</html>
