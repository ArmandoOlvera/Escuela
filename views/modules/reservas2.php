<?php

//session_start();

if($_SESSION["validar"]=="na"){

	header("location:index.php?".$_SESSION["validar"]."&action=ingresar");

	exit();

}

?>
 
</script>
<script type="text/javascript">
	function salir2(h){
		window.location.href = "index.php?action=habitaciones&Borrar="+h;
		window.location.href = "index.php?action=habitaciones";
	}
</script>
<div class="box-content">
	<h4 class="box-title">Busqueda de Reservas</h4>
 
 <?php
$registro = new MvcController(); 


	$editarUsuario = new MvcController(); 

	?>
	<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Reservas</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post">
							<div class="form-group">
								<label for="exampleInputEmail1">Numero Reserva</label>
								 <input type="input"class="form-control" id="numero" name="numero"> 
							</div>
							<div class="form-group">
								<label for="imagenRegistro">Nombre de cliente</label>
								<input type="input"class="form-control" id="nombre" name="nombre"> 
							</div> 
							<div class="form-group">
								<label for="imagenRegistro">Id Habitacion</label>
								<input type="input"class="form-control" id="habitacion" name="habitacion"> 
							</div> 
							<div class="form-group">
								<label for="imagenRegistro">Fecha</label>
								<input type="date"  class="form-control" id="fecha" name="fecha"> 
							</div> 
							<div class="form-group">
								<label for="dias">Dias de reserva</label>
								<select name="dias" id="dias">
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
								</select>
							</div>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Reservar</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>

<div class="col-lg-6 col-xs-6">
				<div class="box-content card white">
					<h4 class="box-title">Borrar Reserva</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post" enctype="multipart/form-data">
							 <div class="form-group">
								<label for="exampleInputEmail1">Ingrese el numero de reserva a borrar</label>
								<input  type="text"  class="form-control" placeholder="solo enteros" name="borrar" required>
							</div>
							 
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Borrar</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div> 
	 
 	</div>	
 

<?php
$vistaUsuario = new MvcController();
$vistaUsuario -> actualizarReservasController();
$vistaUsuario -> borrarReservaController2();
if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>



