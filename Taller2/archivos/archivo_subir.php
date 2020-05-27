<meta charset="UTF-8">
<h1>Subir Archivo</h1>
<?php
	$fake = true;
	$str_pagina = "";
	if ($_FILES["arch"]["error"] > 0){
		echo "No se ha subido ningun archivo. Escoja alguno valido.";
		$str_pagina.="Error: " . $_FILES["arch"]["error"] . "<br>";
		$fake=false;
	}
	else  {
		$str_pagina.= "Nombre: " . $_FILES["arch"] ["name"] . "<br>";
		$str_pagina.= "Tipo: " . $_FILES["arch"]["type"] . "<br>";
		$str_pagina.= "Tamaño: " . ($_FILES["arch"]["size"] / 1024) . " kB<br>";
		$str_pagina.= "Guardado en: " . $_FILES["arch"]["tmp_name"];
	}
	if($fake)
	{
		echo $str_pagina;
        if (!file_exists('subidos/')) {
           mkdir('subidos/',0777,true);
        }
        move_uploaded_file($_FILES["arch"]["tmp_name"],"subidos/".$_FILES["arch"]["name"]);
        echo "Guardado en: " . "subidos/" . $_FILES["arch"]["name"];
    }
?>
<form action="./subir.php" method="get">
    <input type="submit" value="Volver" />
</form>