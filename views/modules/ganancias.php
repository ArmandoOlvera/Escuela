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
 
 <?php
  
 
	?>


<div class="col-lg-6 col-xs-6">
				<div class="box-content card white">
					<h4 class="box-title">Ganancias por Mes</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post" enctype="multipart/form-data">
							 <div class="form-group">
								<label for="exampleInputEmail1">Ingrese el mes que desea ver</label>
								<select name="mes" id="mes">
								  <option value="01">Enero</option>
								  <option value="02">Febrero</option>
								  <option value="03">Marzo</option>
								  <option value="04">Abril</option>
								  <option value="05">Mayo</option>
								  <option value="06">Junio</option>
								  <option value="07">Julio</option>
								  <option value="08">Agosto</option>
								  <option value="09">Septiembre</option>
								  <option value="10">Octubre</option>
								  <option value="11">Noviembre</option>
								  <option value="12">Diciembre</option>
								</select>
							</div>
							 
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Calcular</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div> 
	 
 	</div>	
 

<?php
$vistaUsuario = new MvcController();
$vistaUsuario -> VerGanancias(); 
if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>



