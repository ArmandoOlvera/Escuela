<?php

if($_SESSION["validar"]=="na"  ||$_SESSION["validar"]!="1"){

	echo '<script type="text/javascript">
                  window.location.replace("index.php?action=ingresar");
                 </script>';

}

?>

<h1>EDITAR CARRERA</h1>
<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Clientes</h4>
					<!-- /.box-title -->
					<div class="card-content">

<form method="post">
	
	<?php

	$editarCarrera = new MvcController();
	$editarCarrera -> editarCarreraController();
	$editarCarrera -> actualizarCarreraController();

	?>

</form>


		</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content --> 
			</div>



