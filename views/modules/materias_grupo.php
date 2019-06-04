<h1>REGISTRO DE ALUMNOS A MATERIAS</h1>
 
<form id="tutoriaForm" method="post">
	<?php
		$registro = new MvcController();
		$registro -> registroBaseMateriaGrupoController();
		$registro -> registroMateriaGRupoController();
	?>
</form>

<?php


if(isset($_GET["action"])){
	if($_GET["action"] == "ok_tutoria"){
		echo "Registro Exitoso";
	}
}

?>
