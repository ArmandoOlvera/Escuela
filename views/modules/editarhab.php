<?php


if($_SESSION["validar"]=="na"){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>EDITAR HABITACION</h1>

  
  
 
	<?php

	$editarUsuario = new MvcController();
	$editarUsuario -> editarHabitacionController();
	$editarUsuario -> actualizarHabitacionController();

	?>
 
 
