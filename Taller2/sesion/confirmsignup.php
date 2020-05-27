<h1>Crear Usuario</h1>
<?php
    if(trim($_POST['cedula']) == '' or trim($_POST['contrasena']) == '' or trim($_POST['contrasenac']) == '' or trim($_POST['usuario']) == '')
    {
        echo "No se pudo crear.";
        echo "<br>";
        echo "No ha introducido valor en alguna celda, vuelvalo a intentar.";
    }
    else{
        $err = validateEntries();
        if ($err != "")
        {
            echo "No se pudo actualizar ni crear.";
            echo $err;
        }
        else{
            include_once dirname(__FILE__) . '/config.php';
            $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
            if (mysqli_connect_errno()) {
                echo "Error en la conexión: " . mysqli_connect_error();
                }
            $vsql = "SELECT * FROM Usuarios";
            $res=mysqli_query($con,$vsql);
            if(mysqli_num_rows($res) == 0)
            {
                $isql = "INSERT INTO Usuarios (cedula, nombreusuario, rol, contrasena) VALUES ('".trim($_POST['cedula'])."','".trim($_POST['usuario'])."','admin','".crypt(trim($_POST['contrasena']),'$6$rounds=5000$rucrypt$')."')";
                if(mysqli_query($con,$isql))
                {
                    echo "Se ha insertado al nuevo administrador";
                }
                else{
                    echo mysqli_error($con);
                }
            }
            else{
                $isql = "INSERT INTO Usuarios (cedula, nombreusuario, rol, contrasena) VALUES ('".trim($_POST['cedula'])."','".trim($_POST['usuario'])."','usuario','".crypt(trim($_POST['contrasena']),'$6$rounds=5000$rucrypt$')."')";
                if(mysqli_query($con,$isql))
                {
                    echo "Se ha insertado al nuevo usuario";
                }
                else{
                    echo mysqli_error($con);
                }
            }
            mysqli_close($con);
        }
        }

    function validateEntries (){
        $err = "";
        $confir = trim($_POST['contrasenac']);
        $contra = trim($_POST['contrasena']);
        $cedula = trim($_POST['cedula']);
        $user = trim($_POST['usuario']);
        if (!preg_match("/^[a-zA-Z ]*$/",$user))
        {
            $err = $err."<br>"."Hubo un problema con el nombre ingresado. Deben ser solo caracteres.";
        }
        if(!preg_match('/^[0-9]*$/', $cedula))
        {
            $err = $err."<br>"."Hubo un problema con la cédula ingresada. Deben haber solo números.";
        }
        if($contra != $confir)
        {
            $err = $err."<br>"."Las contraseñas ingresadas no coinciden.";
        }
        include_once dirname(__FILE__) . '/config.php';
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
        $sql="SELECT COUNT(*) FROM Usuarios WHERE nombreusuario =". $_POST['usuario'];
        $resu=mysqli_query($con,$sql);
        if($resu > 0)
        {
            $err = $err."<br>"."El username escogido ya existe. Intentelo con uno nuevo.";
        }
        $sqlp="SELECT * FROM Personas WHERE cedula =". $_POST['cedula'];
        $resup=mysqli_query($con,$sqlp);
        if(mysqli_num_rows($resup) == 0)
        {
            $err = $err."<br>"."Esa cedula no se encuentra en la tabla de Personas";
        }
        mysqli_close($con);
        return $err;
    }
?>
<form action="./signup.php" method="post">
    <input type="hidden" name = "cedula" value=<?php echo "{$_POST['cedula']}";?>>
    <input type="hidden" name = "usuario" value=<?php echo "{$_POST['usuario']}";?>>
    <input type="hidden" name = "contrasena" value=<?php echo "{$_POST['contrasena']}";?>>
    <input type="hidden" name = "contrasenac" value=<?php echo "{$_POST['contrasenac']}";?>>
    <input type="submit" value="Volver" />
</form>