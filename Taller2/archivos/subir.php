<!DOCTYPE html>
<h1>Subir Archivo</h1>
<html>
    <head>
        <title>Subir Archivo</title>
        <meta charset="UTF-8">
    </head>
<body>
    <form action="archivo_subir.php" method="post" enctype="multipart/form-data">
        <label for="arch">Nombre: </label>
        <input type="file" name="arch" id="arch"><br>
        <input type="submit" name="submit" value="Enviar"><br>
    </form>
    <form action="../index.php" method="get">
        <input type="submit" value="Volver" />
    </form>
</body>
</html>
