<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){

//editarhab verhabitaciones
		if($enlaces == "reportes" || $enlaces == "registro_alumno" || $enlaces == "registro_tutoria" ||  $enlaces == "registro_maestro" || $enlaces == "registro_carrera" || $enlaces == "ingresar" || $enlaces == "maestros" || $enlaces == "carreras" || $enlaces == "tutorias" || $enlaces == "alumnos" || $enlaces == "editar_carreras" || $enlaces == "editar_tutoria" || $enlaces == "editar_maestro" || $enlaces == "editar_alumnos" || $enlaces == "salir"|| $enlaces == "alumnos" ||$enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar"|| $enlaces == "dashboard"|| $enlaces == "editar_materias"|| $enlaces == "materias"|| $enlaces == "editar_grupos"|| $enlaces == "grupos"|| $enlaces == "registro_materias"|| $enlaces == "registro_grupo"|| $enlaces == "grupos" || $enlaces == "editar_grupos" || $enlaces == "alumnos_materia"|| $enlaces == "materias_grupo"){

			$module =  "views/modules/".$enlaces.".php";
		
		}
		else if($enlaces == "salir"){

			$module =  "views/modules/salir.php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/usuarios.php";
		
		}

		else{

			$module =  "views/modules/registro.php";

		}
		
		return $module;

	}

}

?>