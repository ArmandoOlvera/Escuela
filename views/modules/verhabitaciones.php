<?php

//session_start();

if($_SESSION["validar"]=="na"){

	header("location:index.php?".$_SESSION["validar"]."&action=ingresar");

	exit();

}

?>
 
</script>

<div class="box-content">
	<h4 class="box-title">Busqueda de Habitaciones</h4>
<div class="col-lg-6 col-xs-6">
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
<div class="col-lg-6 col-xs-6">
				<div class="box-content card white">
					<h4 class="box-title">Busqueda por precio</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post" enctype="multipart/form-data">
							 <div class="form-group">
								<label for="exampleInputEmail1">Ingrese el Precio</label>
								<input  type="text"  class="form-control" placeholder="solo enteros" name="precio" required>
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
          <h4 class="box-title">Resultados de Habitaciones</h4>
          <!-- /.box-title -->
          <span></span>
          <!-- /.dropdown js__dropdown -->
         <table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info"> 
						<thead>
							<tr >
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 190px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 298px;" aria-label="Position: activate to sort column ascending">Precio</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 144px;" aria-label="Office: activate to sort column ascending">Tipo</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 144px;" aria-label="Office: activate to sort column ascending">Imagen</th>
								 
						</thead>
						 
						 
							<tbody>

							  <?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaHabitacionesController2();
			$vistaUsuario -> borrarHabitacionController();

			?>
							 </tbody>
						 
							<tfoot>
							<tr><th rowspan="1" colspan="1">ID</th>
								<th rowspan="1" colspan="1">Precio</th>
								<th rowspan="1" colspan="1">Tipo</th>
								<th rowspan="1" colspan="1">Imagen</th>  </tr>
						</tfoot>
						</div>
 
				 
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



