<?php

//session_start();

if($_SESSION["validar"]=="na"){

	header("location:index.php?".$_SESSION["validar"]."&action=ingresar");

	exit();

}

?>
<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Clientes</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post">
							<div class="form-group">
								<label for="exampleInputEmail1">Nombre de Cliente</label>
								<input  type="text"  class="form-control" placeholder="Ejem: Juan Francisco Martinez" id="nombreRegistro" name="nombreRegistro" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Tipo de Cliente </label>
								<select name="tipoRegistro" id="tipoRegistro">
								  <option value="Habitual">Habitual</option>
								  <option value="Esporadico">Esporadico</option>
								</select>
							</div>  
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Guardar</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content --> 
			</div>



<?php

$registro = new MvcController();
$registro -> registroClientes();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
