<?php

include("conexion.php");
session_start();

if ($_SESSION['usuario']) {

$usuario = $_SESSION['usuario'];
$privilegios = $_SESSION['privilegios'];

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Koquetas - Panel de control</title>
		<script src="js/jquery.min.js"></script>
		<meta charset="utf-8">
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!---- animated-css ---->
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script type="text/javascript" src="js/jquery.corner.js"></script> 
		<script src="js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
		<!---- animated-css ---->
		<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		
		 <!---- start-smoth-scrolling---->
		<!----webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		<!---//webfonts--->
		<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
	</head>

	<body>
		<div class="bg">
		<!----- start-header---->
		<div class="container">
			<div id="home" class="header wow bounceInDown" data-wow-delay="0.4s">
					<div class="top-header">
						<div class="logo">
							<a href="#">Koquetas</a>
						</div>
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li id="mostrarFactura" ><a  href="#" class="scroll">factura</a></li>
								<li id="mostrarProducto"><a href="#">producto</a></li>

								<?php

									if ($privilegios == 'A') {
										?>
											<li id="mostrarProveedor"><a href="#" class="scroll">proveedor</a></li>
										<?php
									}

								?>

								<li id="mostrarHistorial"><a href="#" class="scroll">historial</a></li>
								<li><a href="javascript:cerrarSesion()" style="padding:20px 20px 14px 20px"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></a></li>
							</ul>
							<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
						</nav>

						 <script> 

                    		function cerrarSesion(){ 
                    		document.cerrar_sesion.submit()
                    		} 

                		</script>

						<form method="post" action="inicio.php" name="cerrar_sesion">
                            <input type="hidden" name="cerrar" value="1">
						</form>

                        

						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!----- //End-header---->
			<!---- banner-info ---->
			<br>
			<div class="banner-info">
				<div class="container">

				<!--Sección para factura-->

					<div class="header wow bounceInDown factura recuadro" data-wow-delay="0.04s">
						
						<h1>Contenido para pestaña factura</h1>

					</div>

				<!--Fin sección para factura-->	


				<!--Sección para productos-->

					<div class="header wow bounceInDown producto recuadro" data-wow-delay="0.04s" align="center" style="color:white;">
						

					<div id="menuProducto">
						<input type="button" value="Nuevo Producto" id="nuevoProducto">
						<input type="button" value="Buscar Producto" id="buscarProducto">
					</div>



					<div id="respuestaProducto"></div>

					<!--Inicio agregar producto-->

					<div id="agregarProducto">

							<h2>REGISTRO DE PRODUCTOS</h2>

							<table>
									<tr>
										<td>
											<form class="form-horizontal" autocomplete="off">
  										<div class="form-group">
    										<div class="col-sm-12">
      										Nombre <input type="text" class="form-control" id="nombreProducto" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
    										</div>
  										</div>
									</form><br>
										</td>
									</tr>

									<tr>
										<td>
								<form class="form-inline">
  								<div class="form-group">
    								<label for="rif">Precio</label>
    								<input type="text" class="form-control" id="precioProducto" size="30">
  								</div>
  								<div class="form-group">
    								<label for="telefono1">Existencia</label>
    								<input type="text" class="form-control" id="existencia" maxlength="11" size="30" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  								</div>
    								<div class="form-group">
    								<label for="telefono2">Proveedor</label>
    								<input type="text" class="form-control" id="proveedor" maxlength="11" size="30" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  								</div>
  								
								</form><br>
										</td>
									</tr>

									<tr>
										<td>
											<form>
									Descipcion <br>
									<textarea class="form-control" id="descripcion" rows="3"></textarea>
								</form>
										</td>
									</tr>
							</table>

								<input class="botonInicio" name="enviar" type="submit" id="registrarProducto">

<script>

	$("#registrarProducto").click(function() {
		var c1 = false;
		var c2 = false;
		var c3 = false;
		var c4 = false;
		var nombreProducto = $("#nombreProducto").val();
		var precioProducto = $("#precioProducto").val();
		var existencia = $("#existencia").val();
		var proveedor = $("#proveedor").val();
		var descripcion = $("#descripcion").val();

		if (nombreProducto.length < 1) {
			$("#nombreProducto").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#nombreProducto").css("-moz-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#nombreProducto").css("box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			var c1 = false;
		}else{
			$("#nombreProducto").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#nombreProducto").css("-moz-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#nombreProducto").css("box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			var c1 = true;
		}

		if (precioProducto.length < 1) {
			$("#precioProducto").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#precioProducto").css("-moz-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#precioProducto").css("box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			var c2 = false;
		}else{
			$("#precioProducto").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#precioProducto").css("-moz-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#precioProducto").css("box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			var c2 = true;
		}

		if (existencia.length < 1) {
			$("#existencia").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#existencia").css("-moz-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#existencia").css("box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			var c3 = false;
		}else{
			$("#existencia").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#existencia").css("-moz-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#existencia").css("box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			var c3 = true;
		}

		if (proveedor.length < 1) {
			$("#proveedor").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#proveedor").css("-moz-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#proveedor").css("box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			var c4 = false;
		}else{
			$("#proveedor").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#proveedor").css("-moz-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#proveedor").css("box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			var c4 = true;
		}

		if (descripcion.length < 1) {
			$("#descripcion").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#descripcion").css("-moz-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#descripcion").css("box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			var c5 = false;
		}else{
			$("#descripcion").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#descripcion").css("-moz-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#descripcion").css("box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			var c5 = true;
		}


		if ((c1 == true) && (c2 == true) && (c3 == true) && (c4 == true) && (c5 == true)) {

			var url = "agregarproducto.php"; 
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                    	nombreProducto,
                    	precioProducto,
                    	existencia,
                    	proveedor,
                    	descripcion
                    }, 
                    success: function(data)
                    {
                    	$('#agregarProducto').hide();
                        $("#respuestaProducto").html(data); 
                    }
                });

		}else{

			alert("No se cumple con la validacion");

		}
		return false;
	});

</script>	


					</div>

					<!--Fin agregar producto-->


					<div id="busquedaProducto">
					<br>

                           <input type="text" class="form-control" size="30" style="width: 326px;" id="busqueda" maxlength="30" autocomplete="off" onKeyUp="buscar();">

                        
                        <div id="resultadoBusqueda"></div>

                            <script>
                                function buscar() {
                                    var textoBusqueda = $("input#busqueda").val();
 
                                    if (textoBusqueda != "") {
                                        $.post("buscarproducto.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                                            $("#resultadoBusqueda").html(mensaje);
                                        }); 
                                    } else { 
                                         $("#resultadoBusqueda").html('<center><p>Sin instrucciones de busqueda</p></center>');
                                        };
                                };
                            </script>

                    </div>


                    <script type="text/javascript">
                    	
                    	$(document).ready(function(){
                    	$('#busquedaProducto').hide();
                    	$('#agregarProducto').hide();

                    	$("#nuevoProducto").click(function(){
							$('#busquedaProducto').hide();
							$('#agregarProducto').show();
		 					});

						$("#buscarProducto").click(function(){
							$('#busquedaProducto').show();
							$('#agregarProducto').hide();
		 					});
		 				});

                    </script>

					</div>

				<!--Fin sección para factura-->

				<!--Sección para proveedores-->

					<?php

						if ($privilegios == 'A') {

							?>
								<div class="header wow bounceInDown proveedor recuadro" data-wow-delay="0.04s" align="center" style="color:white;">

								<style type="text/css">

									.form-control{
										border-radius: 0px;
									}

									.botonInicio {
    									background-color: rgba(0,0,0,0);
    									border-width: thin;
    									border-color: white;
									}

								</style>

								<div id="respuestaProveedor"></div>
								<div id="formularioProveedor">

								<br>
									<h2>REGISTRO DE PROVEEDOR</h2>
								<br>

								<table>
									<tr>
										<td>
											<form class="form-horizontal" autocomplete="off">
  										<div class="form-group">
    										<div class="col-sm-12">
      										Nombre <input type="text" class="form-control" id="nombreProveedor">
    										</div>
  										</div>
									</form><br>
										</td>
									</tr>

									<tr>
										<td>
								<form class="form-inline">
  								<div class="form-group">
    								<label for="rif">Rif</label>
    								<input type="text" class="form-control" id="rif" size="30">
  								</div>
  								<div class="form-group">
    								<label for="telefono1">Telefono</label>
    								<input type="text" class="form-control" id="telefono1" maxlength="11" size="30" onkeypress="return soloNumeros(event);">
  								</div>
    								<div class="form-group">
    								<label for="telefono2">Telefono 2</label>
    								<input type="text" class="form-control" id="telefono2" maxlength="11" size="30" onkeypress="return soloNumeros(event);">
  								</div>
  								
								</form><br>
										</td>
									</tr>

									<tr>
										<td>
											<form>
									Direccion <br>
									<textarea class="form-control" id="direccion" rows="3"></textarea>
								</form>
										</td>
									</tr>
								</table>

								<input class="botonInicio" name="enviar" type="submit" id="registrarProveedor">

								</div>

							</div>

							<?php
						}

					?>

				<!--Fin sección para factura-->

				<!--Sección para historial-->

					<div class="header wow bounceInDown historial recuadro" data-wow-delay="0.04s">
						
						<h1>Contenido para pestaña historial</h1>

					</div>

				<!--Fin sección para factura-->
				</div>
			</div>
		</div>

		<script>
            function soloNumeros(e){

            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
            return true;
         
            return /\d/.test(String.fromCharCode(keynum));

        }
        </script>


        <script>
            function soloLetras(e){
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = "8-37-39-46";

            tecla_especial = false
            for(var i in especiales){
                    if(key == especiales[i]){
                        tecla_especial = true;
                        break;
                    }
                }

                if(letras.indexOf(tecla)==-1 && !tecla_especial){
                    return false;
                }
            }
        </script>


<script>

	$("#registrarProveedor").click(function() {
		var c1 = false;
		var c2 = false;
		var c3 = false;
		var c4 = false;
		var nombreProveedor = $("#nombreProveedor").val();
		var rif = $("#rif").val();
		var telefono1 = $("#telefono1").val();
		var telefono2 = $("#telefono2").val();
		var direccion = $("#direccion").val();

		if (nombreProveedor.length < 1) {
			$("#nombreProveedor").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#nombreProveedor").css("-moz-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#nombreProveedor").css("box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			var c1 = false;
		}else{
			$("#nombreProveedor").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#nombreProveedor").css("-moz-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#nombreProveedor").css("box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			var c1 = true;
		}

		if (rif.length < 1) {
			$("#rif").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#rif").css("-moz-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#rif").css("box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			var c2 = false;
		}else{
			$("#rif").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#rif").css("-moz-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#rif").css("box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			var c2 = true;
		}

		if (telefono1.length < 1) {
			$("#telefono1").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#telefono1").css("-moz-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#telefono1").css("box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			var c3 = false;
		}else{
			$("#telefono1").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#telefono1").css("-moz-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#telefono1").css("box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			var c3 = true;
		}

		if (direccion.length < 1) {
			$("#direccion").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#direccion").css("-moz-box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			$("#direccion").css("box-shadow", "0px 0px 20px -3px rgba(210,55,55,1)");
			var c4 = false;
		}else{
			$("#direccion").css("-webkit-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#direccion").css("-moz-box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			$("#direccion").css("box-shadow", "0px 0px 20px -3px rgba(146,197,79,1)");
			var c4 = true;
		}


		if ((c1 == true) && (c2 == true) && (c3 == true) && (c4 == true)) {

			var url = "agregarproveedor.php"; 
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                    	nombreProveedor,
                    	rif,
                    	telefono1,
                    	telefono2,
                    	direccion
                    }, 
                    success: function(data)
                    {
                    	$('#formularioProveedor').hide();
                        $("#respuestaProveedor").html(data); 
                    }
                });

		}else{

			alert("No se cumple con la validacion");

		}
		return false;
	});

</script>


<script>
		$(document).ready(function(){
			$('.producto').hide();
			$('.proveedor').hide();
			$('.historial').hide();
			$('#mostrarFactura').addClass("active-join");
		$("#mostrarFactura").click(function(){
			$('.producto').hide();
			$('.proveedor').hide();
			$('.historial').hide();
			$('.factura').show(100);
			$('#mostrarFactura').addClass("active-join");
			$('#mostrarProducto').removeClass("active-join");
			$('#mostrarHistorial').removeClass("active-join");
			$('#mostrarProveedor').removeClass("active-join");
		 });
		$("#mostrarProducto").click(function(){
			$('.factura').hide();
			$('.proveedor').hide();
			$('.historial').hide();
			$('.producto').show();
			$('#mostrarProducto').addClass("active-join");
			$('#mostrarFactura').removeClass("active-join");
			$('#mostrarHistorial').removeClass("active-join");
			$('#mostrarProveedor').removeClass("active-join");
		 });
		$("#mostrarHistorial").click(function(){
			$('.factura').hide();
			$('.proveedor').hide();
			$('.producto').hide();
			$('.historial').show();
			$('#mostrarHistorial').addClass("active-join");
			$('#mostrarFactura').removeClass("active-join");
			$('#mostrarProducto').removeClass("active-join");
			$('#mostrarProveedor').removeClass("active-join");
		 });
		$("#mostrarProveedor").click(function(){
			$('.factura').hide();
			$('.historial').hide();
			$('.producto').hide();
			$('.proveedor').show();
			$('#mostrarProveedor').addClass("active-join");
			$('#mostrarFactura').removeClass("active-join");
			$('#mostrarProducto').removeClass("active-join");
			$('#mostrarHistorial').removeClass("active-join");
		 });
	});
</script>

</body>
</html>

<?php

}else{
	header("Status: 301 Moved Permanently", false, 301);
	header("Location: index.php");
}

if (isset($_POST['cerrar'])) {
	session_destroy();
    echo '<meta http-equiv="Refresh" content="0">';
}

?>