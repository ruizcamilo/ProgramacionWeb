<?php
	$user = $_POST['user'];
	$newrole = $_POST['rol'];
	include_once 'C:\xampp\htdocs\Taller1\sesion\config.php';
    $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
    if (mysqli_connect_errno()) {
        echo "Error en la conexión: " . mysqli_connect_error();
        }
    $vsql = "UPDATE Usuarios
			SET rol = '{$newrole}'
			WHERE nombreusuario = '{$user}'";
	#echo $vsql;
    $resultado = mysqli_query($con,$vsql);
    mysqli_close($con);
    header('Location: http://'.$_SERVER['HTTP_HOST']."/Taller1/sesion/admin/usuarios.php?admin=".$_POST["admin"]);
?>