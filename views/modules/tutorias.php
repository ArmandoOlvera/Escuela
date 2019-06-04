<?php

if($_SESSION["validar"]=="na"  ||$_SESSION["validar"]!="1"){

	echo '<script type="text/javascript">
                  window.location.replace("index.php?action=ingresar");
                 </script>';

}
?>


<div class="box-content">
          <h4 class="box-title">TUTORIAS</h4>
          <!-- /.box-title -->
          
          <!-- /.dropdown js__dropdown -->
         <table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info"> 
						<thead>
							<tr >
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 190px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 298px;" aria-label="Position: activate to sort column ascending">Hora</th>
								 
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 136px;" aria-label="Start date: activate to sort column ascending">Fecha</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 136px;" aria-label="Start date: activate to sort column ascending">Tema</th> 
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 136px;" aria-label="Start date: activate to sort column ascending">Tipo</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 136px;" aria-label="Start date: activate to sort column ascending">Editar</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 136px;" aria-label="Start date: activate to sort column ascending">Borrar</th>
						</thead>
						 
						 
							<tbody>
			<?php

			$vistaAlumno = new MvcController();
			$vistaAlumno -> vistaTutoriasController();
			$vistaAlumno -> borrarTutoriaController();

			?>
</tbody>
						 
							<tfoot>
							<tr><th rowspan="1" colspan="1">ID</th>
								<th rowspan="1" colspan="1">Hora</th>
								 
								<th rowspan="1" colspan="1">Fecha</th>
								<th rowspan="1" colspan="1">Tema</th>
								<th rowspan="1" colspan="1">Tipo</th>
								<th rowspan="1" colspan="1">Editar</th>
								<th rowspan="1" colspan="1">Borrar</th> </tr>
						</tfoot>
					 
 
				 
					</table>
        </div>
<?php

if(isset($_GET["action"])){
	if($_GET["action"] == "cambio"){
		echo "Cambio Exitoso";
	}
}

?>


