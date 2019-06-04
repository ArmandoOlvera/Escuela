<?php

//session_start();

if($_SESSION["validar"]=="na"){

	header("location:index.php?".$_SESSION["validar"]."&action=ingresar");

	exit();

}

?>
<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Basic example</h4>
					<!-- /.box-title -->
					<div class="card-content">
						<form   method="post">
							<div class="form-group">
								<label for="exampleInputEmail1">Ingrese el Usuario</label>
								<input  type="text"  class="form-control" placeholder="Usuario" name="usuarioRegistro" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Ingrese la contraseña</label>
								<input type="password"  class="form-control" placeholder="Contraseña" name="passwordRegistro" >
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">INgrese el Email</label>
								<input type="email"   class="form-control" placeholder="Email" name="emailRegistro" required>
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
$registro -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
