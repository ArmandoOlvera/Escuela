<?php

//session_start();

if($_SESSION["validar"]=="na"){

	header("location:index.php?".$_SESSION["validar"]."&action=ingresar");

	exit();

}


$registro = new MvcController();

?>
<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Reservas</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post">
							<div class="form-group">
								<label for="exampleInputEmail1">Numero Habitacion</label>
								<?php 
								$registro -> registroHabitaciones();//numRegistro   
								 ?>
							</div>
							<div class="form-group">
								<label for="imagenRegistro">Nombre de cliente</label>
								<input type="input"class="form-control" id="nombreRegistro" name="nombreRegistro"> 
							</div>
							   
							<div class="form-group">
										<div class="input-group">
											<label for="exampleInputEmail1">Fecha de la Reserva</label>
											<input  type="date"class="form-control" id="fecha" name="fecha" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
											<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
										</div>
										<!-- /.input-group -->
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Dias de Reserva</label>
								<select name="tipoRegistro" id="tipoRegistro">
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
<?php
 
$registro -> registroReservaController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
