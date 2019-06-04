<?php

//session_start();

if($_SESSION["validar"]=="na"){

	header("location:index.php?".$_SESSION["validar"]."&action=ingresar");

	exit();

}

?>
 
</script>

<div class="box-content">
	<h4 class="box-title">Busqueda de Reservas</h4>
<div class="col-lg-4 col-xs-4">
				<div class="box-content card white">
					<h4 class="box-title">Busqueda por tipo</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post" enctype="multipart/form-data">
							 
							<div class="form-group">
								<label for="exampleInputEmail1">Tipo de habitacion </label>
								<select name="tipoRegistro" id="tipoRegistro">
								  <option value="Simple">Simple</option>
								  <option value="Doble">Doble</option>
								  <option value="Matrimonial">Matrimonial</option>
								</select>
								 
							</div> 
							 
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Buscar</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
<div class="col-lg-4 col-xs-4">
				<div class="box-content card white">
					<h4 class="box-title">Busqueda por numero de reserva</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post" enctype="multipart/form-data">
							 <div class="form-group">
								<label for="exampleInputEmail1">Ingrese el numero de reserva</label>
								<input  type="text"  class="form-control" placeholder="solo enteros" name="numero" required>
							</div>
							 
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Buscar</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div> 
	<div class="col-lg-4 col-xs-4">
				<div class="box-content card white">
					<h4 class="box-title">Busqueda por dias de hospedaje</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post" enctype="multipart/form-data">
							 <div class="form-group">
								<label for="exampleInputEmail1">Dias de reserva</label>
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
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Buscar</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
 	</div>	
<div class="box-content">
          <h4 class="box-title">Resultados de Reservas</h4>
          <!-- /.box-title -->
          <span></span>
          <!-- /.dropdown js__dropdown -->
         <table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info"> 
						<thead>
							<tr >
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 190px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 298px;" aria-label="Position: activate to sort column ascending">Propietario</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 144px;" aria-label="Office: activate to sort column ascending">Id Habitacion</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 144px;" aria-label="Office: activate to sort column ascending">Fecha de reserva</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 71px;" aria-label="Age: activate to sort column ascending">Dias reservados</th> 
						</thead>
						 
						 
							<tbody>

							  <?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaReservasController2();
			$vistaUsuario -> borrarHabitacionController();

			?>
							 </tbody>
						 
							<tfoot>
							<tr><th rowspan="1" colspan="1">ID</th>
								<th rowspan="1" colspan="1">Propietario</th>
								<th rowspan="1" colspan="1">ID Habitacion</th>
								<th rowspan="1" colspan="1">Fecha de reserva</th>
								<th rowspan="1" colspan="1">Dias reservados</th> </tr>
						</tfoot>
						 
 
				 
					</table>
        </div>
        <!-- /.box-content -->

  


<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>



