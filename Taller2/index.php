<html>
	<head>
		<link rel="stylesheet" type="text/css" href="index.css">
		<h1>Bienvenido Gestor</h1>
	</head>
    <body>
      <div id="section">
      	<h1>Gestor de Personas</h1>
      	<form action="./personas/crear.php" method="get">
    		<input type="submit" value="Inserción Persona" />
		</form>
      	<form action="./personas/verdes.php" method="get">
    		<input type="submit" value="Ver Personas Descendente" />
		</form>
      	<form action="./personas/verasc.php" method="get">
    		<input type="submit" value="Ver Personas Ascendente" />
		</form>
      	<form action="./personas/borrar.php" method="get">
    		<input type="submit" value="Borrar Persona" />
		</form>
      </div>
      <div id="section">
      	<h1>Gestor de Archivos</h1>
      	<form action="./archivos/subir.php" method="get">
    		<input type="submit" value="Subir Archivos al Servidor" />
		</form>
      	<?php
        	crear_imagen();
        	echo "<img src=imagen.png?".date("U").">";
        	echo "<br>";
        	print "Hoy es: ";
        	echo "<br>";
        	date_default_timezone_set('America/Bogota');
        	print date("j/F/Y - g.i a", time());

        	function  crear_imagen(){
            	    $im = imagecreate(200, 200) or die("Error en la creacion de imagenes");
                	$color_fondo = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));   // amarillo

                	$color1 = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));                  // rojo
                	$color2 = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));                 // azul
                	imagerectangle ($im, rand(0,200),  rand(0,200), rand(0,200), rand(0,200), $color1); //rectangulo (borde)
                	imagefilledrectangle ($im,  rand(0,200),   rand(0,200),  rand(0,200),  rand(0,200), $color2); //rectangulo (lleno)

                	imagepng($im,"imagen.png");
                	imagedestroy($im);
        	}
        ?>
      </div>
      <div id="section">
      	<h1>Sesión</h1>
      	<form action="./sesion/login.php" method="get">
    		<input type="submit" value="Login" />
		</form>
		<form action="./sesion/signup.php" method="get">
    		<input type="submit" value="Registrarse" />
		</form>
    <?php
      if(isset($_COOKIE['logouts'])){
        if(!empty($_POST['cont']))
        {
          $actual = $_COOKIE['logouts'];
          setcookie("logouts", $actual + 1, time()+3600);
          header("Location: " . "http://" . $_SERVER['HTTP_HOST']."/Taller1/index.php");
        }else{
          echo "Logouts Total: ".$_COOKIE['logouts'];
        }
      }else{
        setcookie("logouts", 0, time()+3600);
        header("Location: " . "http://" . $_SERVER['HTTP_HOST']."/Taller1/index.php");
      }
?>
      </div>    
    </body>
</html>