<html>
	<h1>Login</h1>
	<?php
		$user = trim($_POST['usuario']);
		$password = trim($_POST['contrasena']);
		if($user == "" and $password=="")
		{
			echo "No ha ingresado ningun valor, intentelo de nuevo.";
			echo "<form action="."./login.php"." method="."get".">";
    		echo	"<input type="."submit"." value="."Volver"." />";
			echo "</form>";
		}
		else if($user == "")
		{
			echo "Solo ha ingresado contraseña, intentelo de nuevo.";
			echo "<form action="."./login.php"." method="."post".">";
            echo "<input type='hidden' name = 'contrasena' value='".$password."'/>";
    		echo "<input type="."submit"." value="."Volver"." />";
			echo "</form>";
		}
        else if($password==""){
            echo "Solo ha ingresado usuario, intentelo de nuevo.";
            echo "<form action="."./login.php"." method="."post".">";
            echo "<input type='hidden' name = 'usuario' value='".$user."'/>";
            echo "<input type="."submit"." value="."Volver"." />";
            echo "</form>";
        }
		else{
			validateLogin ($user, $password);
		}

        function validateLogin ($user, $password)
        {
        	include_once dirname(__FILE__) . '/config.php';
        	$con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
        	if (mysqli_connect_errno()) 
        	{
           		echo "Error en la conexión: " . mysqli_connect_error();
        	}
        	$sql="SELECT * FROM Usuarios WHERE nombreusuario = '{$user}'";
        	$resul = mysqli_query($con,$sql);
        	if(mysqli_num_rows($resul) == 0)
            {
            	echo "Ese usuario no existe, por favor registrese.";
            	echo "<form action="."./signup.php"." method="."post".">";
    			echo	"<input type="."submit"." value="."Registrarse"." />";
				echo "</form>";
				echo "<form action="."./login.php"." method="."post".">";
                echo "<input type='hidden' name = 'usuario' value='".$user."'/>";
                echo "<input type='hidden' name = 'contrasena' value='".$password."'/>";
    			echo	"<input type="."submit"." value="."Volver"." />";
				echo "</form>";
            }
        	while($fila = mysqli_fetch_array($resul))
        	{
        		if(hash_equals($fila["contrasena"], crypt($password, $fila["contrasena"])))
        		{
        			if($fila["rol"]=="admin")
        			{
        				header('Location: http://'.$_SERVER['HTTP_HOST']."/Taller1/sesion/admin/usuarios.php?admin=".$fila["nombreusuario"]);
        			}
        			else{
        				header('Location: http://'.$_SERVER['HTTP_HOST']."/Taller1/sesion/user/perfil.php?usuario=".$fila["nombreusuario"]);
        			}
        		}
        		else{
        			echo "La contraseña no es correcta para este usuario. Vuelva a intentarlo";
        			echo "<form action="."./login.php"." method="."post".">";
                    echo "<input type='hidden' name = 'usuario' value='".$user."'/>";
                    echo "<input type='hidden' name = 'contrasena' value='".$password."'/>";
    				echo "<input type="."submit"." value="."Volver"." />";
					echo "</form>";
        		}
        	}
        	mysqli_close($con);
        }
    ?>
</html>