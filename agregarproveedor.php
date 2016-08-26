<?php

include("conexion.php");

$nombreProveedor = $_POST['nombreProveedor'];
$rif = $_POST['rif'];
$telefono1 = $_POST['telefono1'];
$telefono2 = $_POST['telefono2'];
$direccion = $_POST['direccion'];


$consulta = mysqli_query($conexion,"SELECT * FROM proveedor WHERE rif='$rif'");

if (mysqli_num_rows($consulta) > 0) {
	echo "<h1>Ya existe un proveedor con este rif</h1>";
}else{

$consulta = mysqli_query($conexion,"INSERT INTO proveedor(nombre,rif,telefono1,telefono2,direccion) VALUES ('$nombreProveedor','$rif','$telefono1','$telefono2','$direccion')");

	if ($consulta) {
		
		echo "<h1>Registro de proveedor exitoso</h1>";

	}
	
}


?>