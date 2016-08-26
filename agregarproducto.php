<?php

include("conexion.php");

$nombreProducto = $_POST['nombreProducto'];
$precioProducto = $_POST['precioProducto'];
$existencia = $_POST['existencia'];
$proveedor = $_POST['proveedor'];
$descripcion = $_POST['descripcion'];

$consulta = mysqli_query($conexion,"INSERT INTO producto (nombre,precio,existencia,fechaAdquisicion,proveedor)
	VALUES ('$nombreProducto','$precioProducto','$existencia',NOW(),'$proveedor')");

if ($consulta) {
		
		echo "<h1>Registro de proveedor exitoso</h1>";

	}

?>