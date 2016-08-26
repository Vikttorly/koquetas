<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php

include("conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

if (isset($_POST['enviar'])) {
	
	$consulta = mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave'");
	$datos = mysqli_fetch_assoc($consulta);
	$idUsuario = $datos['idUsuario'];
	$privilegios = $datos['privilegios'];

		if ($usuario == $datos['usuario'] AND $clave == $datos['clave']) {
			
			session_start();
			$_SESSION['usuario'] = $idUsuario;
			$_SESSION['privilegios'] = $privilegios;


			header("Status: 301 Moved Permanently", false, 301);
			header("Location: inicio.php");

		}else{
			
			?>

					<center><h1 style="padding-bottom: 15px;     
					color: #FFF;
    				text-transform: uppercase;
    				font-weight: 700;
    				font-size: 5em;
    				padding: 2em 0;">
    				Datos erroneos
    				</h1></center>

    				<meta http-equiv="Refresh" content="2;url=index.php">

			<?php

		}

}

?>
</body>
</html>