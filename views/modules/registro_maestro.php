<?php  
if($_SESSION["validar"]=="na"  ||$_SESSION["validar"]!="1"){

	echo '<script type="text/javascript">
                  window.location.replace("index.php?action=ingresar");
                 </script>';

}

 ?>
<h1>REGISTRO DE MAESTRO</h1>

<form method="post">
	<?php
		$registro = new MvcController();
		$registro -> registroBaseMaestroController();
		$registro -> registroMaestroController();
	?>
</form>

<?php


if(isset($_GET["action"])){
	if($_GET["action"] == "ok_maestro"){
		echo "Registro Exitoso";
	}
}

?>
