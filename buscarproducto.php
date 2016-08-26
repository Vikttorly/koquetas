<?php

error_reporting(0);

include("conexion.php");

$consultaBusqueda = $_POST['valorBusqueda'];

$consulta = mysqli_query($conexion, "SELECT * FROM producto 
	WHERE nombre LIKE '%$consultaBusqueda%'
	");

$filas = mysqli_num_rows($consulta);

if ($filas === 0) {

			?>
		<br><br><br>
		<center><p>Ningun producto con esta informacion</p>
		 <button type="button" id="ClickMostrarRegistro2" class="btn btn-danger">Agregar Producto</button></center>

			<?php

	}else{
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		while($resultados = mysqli_fetch_assoc($consulta)) {
			$idProducto = $resultados['idProducto'];
			$nombre = $resultados['nombre'];
			$precio = $resultados['precio'];
			$existencia = $resultados['existencia'];
			$fechaAdquisicion = $resultados['fechaAdquisicion'];
			$proveedor = $resultados['proveedor'];

			$consultaProveedor = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT * FROM proveedor WHERE idProveedor=$proveedor"));
			$proveedor = $consultaProveedor['nombre'];


			$mensaje .= '  
			<tr><td><div>'.$idProducto.'</div></td><td>'.$nombre.'</td><td>'.$precio.'</td><td>'.$existencia.'</td><td>'.$fechaAdquisicion.'</td><td>'.$proveedor.'</td>
			</tr>
			';
		}

		?>

			<table class="table table-condensed">
				<tr>
					<td><strong>ID</strong></td>
					<td><strong>Nombre</strong></td>
					<td><strong>Precio (Bsf)</strong></td>
					<td><strong>Existencia</strong></td>
					<td><strong>Fecha Adquisicion</strong></td>
					<td><strong>proveedor</strong></td>
				</tr>
					<?php
						echo $mensaje;
					?>
			</table>

<?php

}

?>