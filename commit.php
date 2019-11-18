<?php
$db=mysqli_connect("127.0.0.1","raul","root","raulosuna") or die("No se puede conectar a la base de datos");
print_r($_POST);
?>
<html>
<head>
	<title>Commit</title>
</head>
<body>
	<?php
	switch ($_GET['action']) {
		case 'add':
		switch ($_GET['type']) {
			case 'videojuego':
			$query = 'INSERT INTO
			videojuego
			(videojuego_nombre, videojuego_genero, videojuego_companyia)
			VALUES
			("' . $_POST['videojuego_nombre'] . '",
			' . $_POST['videojuego_genero'] . ',
			' . $_POST['companyia'] . ')';
			break;
			case 'companyia': 
			$query = "INSERT INTO
			companyia
			(companyia)
			VALUES
			(' ".$_POST['companyia'] . "')";
			break;
		}
		break;
		case 'edit':
		switch ($_GET['type']) {
			case 'videojuego':
			$query = 'UPDATE videojuego SET
			videojuego_nombre = "' . $_POST['videojuego_nombre'] . '",
			videojuego_genero = ' . $_POST['videojuego_genero'] . ',
			videojuego_companyia = ' . $_POST['companyia'] . '
			WHERE
			videojuego_id = ' . $_POST['videojuego_id'];
			break;
			case 'companyia':
			$query = "UPDATE companyia SET
			companyia = '" . $_POST['companyia'] . "'
			WHERE
			videojuego_companyia = " . $_POST['videojuego_companyia'];
			break;
		}
		break;
	}
	if (isset($query)) {
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
	}
	?>
	<p>Datos actualizados correctamente</p>
	<a href="admin.php">Volver</a>
</body>
</html>