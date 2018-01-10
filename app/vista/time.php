<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Prueba de Conexión</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="../controlador/registrar_usuario.php" method="post" accept-charset="utf-8">
		<input type="text" name="nombre" placeholder="Nombres">
		<input type="text" name="apellido" placeholder="Apellidos">
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Clave">
		<select name="id_perfil">
			<option value="1">Perfil 1</option>
			<option value="2">Perfil 2</option>
		</select>
		<input type="submit" value="Registrar">
	</form>
	
</body>
</html>