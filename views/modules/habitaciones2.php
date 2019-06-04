<?php

//session_start();

if($_SESSION["validar"]=="na"){

	header("location:index.php?".$_SESSION["validar"]."&action=ingresar");

	exit();

}

?>
<script type="text/javascript">
	function salir(h){
		window.location.href = "index.php?action=habitaciones&idBorrar="+h;
		window.location.href = "index.php?action=habitaciones";
	}
</script>
<div class="box-content">
          <h4 class="box-title">Habitaciones</h4>
          <!-- /.box-title -->
          
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
			$vistaUsuario -> vistaHabitacionesControllerb();
			$vistaUsuario -> borrarHabitacionController();

			?>
							 </tbody>
						 
							<tfoot>
							<tr><th rowspan="1" colspan="1">id</th> 
								<th rowspan="1" colspan="1">Precio</th>
								<th rowspan="1" colspan="1">Tipo</th>
								<th rowspan="1" colspan="1">Imagen</th>
								 </tr>
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



