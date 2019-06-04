<?php

 
if($_SESSION["validar"]=="na"  ||$_SESSION["validar"]!="1"){

	echo '<script type="text/javascript">
                  window.location.replace("index.php?action=ingresar");
                 </script>';

}

?>

<h1>EDITAR ALUMNO</h1>

<form method="post">
	
	<?php

	$editarMaestro = new MvcController();
	$editarMaestro -> editarAlumnoController();
	$editarMaestro -> actualizarAlumnoController();

	?>

</form>



