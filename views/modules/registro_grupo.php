<?php 
 
if($_SESSION["validar"]=="na"  ||$_SESSION["validar"]!="1"){

	echo '<script type="text/javascript">
                  window.location.replace("index.php?action=ingresar");
                 </script>';

}

 ?>
<h1>REGISTRO DE GRUPO</h1>

<form method="post">
	<?php
		$registro = new MvcController();
		$registro -> registroBaseGruposController();
		$registro -> registroGrupoController();
	?>
</form>

<?php


if(isset($_GET["action"])){
	if($_GET["action"] == "ok_alumno"){
		echo "Registro Exitoso";
	}
}

?>
