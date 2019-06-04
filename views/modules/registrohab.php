<?php

//session_start();

if($_SESSION["validar"]=="na"){

	header("location:index.php?".$_SESSION["validar"]."&action=ingresar");

	exit();

}

?>
<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Habitaciones</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleInputEmail1">Precio</label>
								<input  type="text"  class="form-control" placeholder="EJemplo: 1000 (enteros)" id="habitacionRegistro" name="habitacionRegistro" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tipo de habitacion </label>
								<select name="tipoRegistro" id="tipoRegistro">
								  <option value="Simple">Simple</option>
								  <option value="Doble">Doble</option>
								  <option value="Matrimonial">Matrimonial</option>
								</select>
								 
							</div> 
							<div class="form-group">
								<label for="imagenRegistro">Imagen de la habitacion</label>
								<input type="file" name="imagen" required>
								<p class="help-block">Solo ingrese imagenes JPGE,PNG o JPEG.</p>
							</div>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Submit</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>



<?php

$registro = new MvcController();
$registro -> guardarHabitacion();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
