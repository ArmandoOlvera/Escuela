<?php

if($_SESSION["validar"]=="na"  ||$_SESSION["validar"]!="1"){

	echo '<script type="text/javascript">
                  window.location.replace("index.php?action=ingresar");
                 </script>';

}

?>

<h1>EDITAR TUTORIA</h1>

<form method="post"> 
	<?php 
	$editarMaestro = new MvcController();
	$editarMaestro -> editarTutoriaController();
	$editarMaestro -> actualizarTutoriaController();

	?>

</form>



