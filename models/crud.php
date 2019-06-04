<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (user, pass, email) VALUES (:usuario,:password,:email)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroReservaModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreCliente, idHabitacion, fecha,dias,ganancia) VALUES (:nombreCliente, :idHabitacion, :fecha,:dias,:ganancia)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombreCliente", $datosModel["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":idHabitacion", $datosModel["idHabitacion"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":dias", $datosModel["dias"], PDO::PARAM_INT);
		$stmt->bindParam(":ganancia", $datosModel["ganancia"],PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE Habitaciones
	#-------------------------------------
	public function traerHabitacionModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (precio, tipo, imagen) VALUES (:usuario,:password,:email)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":usuario", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["imagen"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#REGISTRO DE Habitaciones
	#-------------------------------------
	public function registroHabitacionModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (precio, tipo, imagen) VALUES (:usuario,:password,:email)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":usuario", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["imagen"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#REGISTRO DE clientes
	#-------------------------------------
	public function registroClienteModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( tipo, nombre) VALUES (:tipo,:nombre)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR); 

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT user, pass,tipo  FROM $tabla WHERE user = :usuario");	
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}


	#VISTA USUARIOS 
	#-------------------------------------

	public function vistaNumHabitacionModel1($tabla,$val){

		$stmt = Conexion::conectar()->prepare("SELECT id, precio  FROM $tabla WHERE id=".$val);	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

#VISTA USUARIOS 
	#-------------------------------------

	public function vistaNumHabitacionModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, precio  FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


	#VISTA USUARIOS 
	#-------------------------------------

	public function vistaUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, user, pass , email FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


	#VISTA USUARIOS 
	#-------------------------------------

	public function vistaClientesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, tipo,nombre  FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA USUARIOS vistaHabitacionesModel
	#-------------------------------------

	public function vistaHabitacionesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, precio, tipo , imagen,numero FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


	#VISTA reservas por tipo de habitacion
	#-------------------------------------

	public function vistaReservasModel2($tabla,$tipo){

		$stmt = Conexion::conectar()->prepare("SELECT r.id, r.nombreCliente,r.idHabitacion,r.fecha,r.dias from reserva r, habitaciones h where h.id=r.idHabitacion and h.tipo='".$tipo."'");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	#VISTA reservas por numero de reserva
	#-------------------------------------

	public function vistaReservasModel3($tabla,$tipo){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombreCliente, idHabitacion ,fecha,dias FROM $tabla WHERE id=".$tipo."");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

#VISTA reservas por numero de dias reservados
	#-------------------------------------

	public function vistaGananciasModel4($tabla,$fecha1,$fecha2){

		$stmt = Conexion::conectar()->prepare("SELECT ganancia FROM $tabla WHERE fecha>=\"".$fecha1."\" AND fecha<=\"".$fecha2."\"");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA reservas por numero de dias reservados
	#-------------------------------------

	public function vistaReservasModel4($tabla,$tipo){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombreCliente, idHabitacion ,fecha,dias FROM $tabla WHERE dias=".$tipo."");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


#VISTA habitaciones por tipo
	#-------------------------------------

	public function vistaHabitacionesModel2($tabla,$tipo){

		$stmt = Conexion::conectar()->prepare("SELECT id, precio, tipo , imagen,numero FROM $tabla WHERE tipo='".$tipo."'");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
#VISTA habitaciones por precio
	#-------------------------------------

	public function vistaHabitacionesModel3($tabla,$precio){

		$stmt = Conexion::conectar()->prepare("SELECT id, precio, tipo , imagen,numero FROM $tabla WHERE precio=".$precio."");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------editarHabitacionModel

	public function editarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, user, pass, email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------

	public function editarHabitacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, precio, tipo, imagen FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}


	#ACTUALIZAR USUARIO
	#------------------------------------- actualizarHabitacionModel

	public function actualizarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET user = :usuario, pass = :password, email = :email WHERE id = :id");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

#ACTUALIZAR RESERVA
	#------------------------------------- actualizarHabitacionModel

	public function actualizarReservacionnModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET   nombreCliente = :nombreCliente, idHabitacion = :idHabitacion , fecha = :fecha , dias = :dias , ganancia = :ganancia WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombreCliente", $datosModel["nombreCliente"], PDO::PARAM_STR);
		$stmt->bindParam(":idHabitacion", $datosModel["idHabitacion"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":dias", $datosModel["dias"], PDO::PARAM_INT);
		$stmt->bindParam(":ganancia", $datosModel["ganancia"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}




#ACTUALIZAR HABITACION
	#------------------------------------- actualizarHabitacionModel

	public function actualizarHabitacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET precio = :precio, tipo = :tipo, imagen = :imagen WHERE id = :id");

		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_INT);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datosModel["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#BORRAR RESERVA
	#------------------------------------borrarHabitaacionModel
	public function borrarReservaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#BORRAR USUARIO
	#------------------------------------borrarHabitaacionModel
	public function borrarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#BORRAR HABITACION
	#------------------------------------
	public function borrarHabitaacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	#INGRESO MAESTRO
	#-------------------------------------
	#Obtiene el email, contrasena, numero de empleado y nivel de los maestros.
	public function ingresoMaestroModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT email, password, num_empleado, nivel FROM $tabla WHERE email = :email");	
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();
		$stmt->close();
	}

#VISTA GRUPOS MODEL
	#-------------------------------------
	#Obtiene los datos de todos los maestros
	public function vistaCarreraIDModel($tabla,$id){

		$stmt = Conexion::conectar()->prepare("SELECT * from carrera where id=".$id);	
		$stmt->execute();
 
		return $stmt->fetchAll();

		$stmt->close();

	}

#VISTA GRUPOS MODEL
	#-------------------------------------
	#Obtiene los datos de todos los maestros
	public function vistaGruposModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * from grupos");	
		$stmt->execute();
 
		return $stmt->fetchAll();

		$stmt->close();

	}
	#VISTA MAESTROS MODEL
	#-------------------------------------
	#Obtiene los datos de todos los maestros
	public function vistaMaestrosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT m.num_empleado as num_empleado, m.nombre as nombre, m.email as email, c.nombre as nombre_carrera, m.nivel as nivel FROM $tabla as m inner join carrera as c on m.id_carrera=c.id");	
		$stmt->execute();
 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR MAESTRO
	#-------------------------------------
	#Se encarga de obtener los valores actuales de cierto empleado
	public function editarMaestroModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT num_empleado, nombre, email, password, id_carrera, nivel FROM $tabla WHERE num_empleado = :num_empleado");
		$stmt->bindParam(":num_empleado", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	#OBTENER CARRERAS
	#-------------------------------------
	#Obtiene las carreras de toda la tabla
	public function obtenerCarrerasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#OBTENER TUTORES
	#-------------------------------------
	#Obtiene las tutores de toda la tabla
	public function obtenerTutoresModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT num_empleado, nombre FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
	}


	#OBTENER MAESTROS
	#-------------------------------------
	#Obtiene las alumnos de toda la tabla
	public function obtenerMaestrosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#OBTENER PROFESOR POR ID
	#-------------------------------------
	#Obtiene las alumnos de toda la tabla
	public function obtenerMaestroIDModel($tabla,$datosController){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE num_empleado=". $datosController); 
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

#OBTENER materias
	#-------------------------------------
	#Obtiene las alumnos de toda la tabla
	public function obtenerMateriasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#OBTENER ALUMNOS
	#-------------------------------------
	#Obtiene las alumnos de toda la tabla
	public function obtenerAlumnosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#OBTENER ALUMNOS NIVEL
	#-------------------------------------
	#Obtiene los alumnos que tienen a cierto tutor
	public function obtenerAlumnosNivelModel($tabla, $id){
		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre FROM $tabla WHERE id_tutor=:id_tutor");
		$stmt->bindParam(":id_tutor", $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#ACTUALIZAR MAESTRO
	#-------------------------------------
	#Permite realizar un update a la tabla de maestros
	public function actualizarMaestroModel($datosModel, $tabla){

		var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email, password = :password, id_carrera = :id_carrera, nivel= :nivel WHERE num_empleado = :num_empleado");

		$stmt->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);  
		$stmt->bindParam(":nivel", $datosModel["nivel"], PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#BORRAR MAESTRO
	#------------------------------------
	public function borrarMaestroModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE num_empleado = :num_empleado");
		$stmt->bindParam(":num_empleado", $datosModel, PDO::PARAM_STR);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}

	#REGISTRO DE MAESTROS
	#-------------------------------------
	public function registroMaestroModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (num_empleado, nombre, email, password, id_carrera, nivel) VALUES (:num_empleado,:nombre,:email,:password,:id_carrera,:nivel)");	
		
		$stmt1->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_STR);
		$stmt1->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt1->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt1->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt1->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);
		$stmt1->bindParam(":nivel", $datosModel["nivel"], PDO::PARAM_INT);

		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#REGISTRO DE MATERIAS
	#-------------------------------------
	public function registroMateriasModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, nombre_corto, num_empleado) VALUES (:nombre, :nombre_corto, :num_empleado)");	
		
		$stmt1->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_INT);
		$stmt1->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt1->bindParam(":nombre_corto", $datosModel["nombre_corto"], PDO::PARAM_STR); 
		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#REGISTRO DE ALUMNOS
	#-------------------------------------
	public function registroAlumnoModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, nombre, id_carrera, id_tutor) VALUES (:matricula,:nombre,:id_carrera,:id_tutor)");	
		
		$stmt1->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt1->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt1->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);
		$stmt1->bindParam(":id_tutor", $datosModel["id_tutor"], PDO::PARAM_INT);
		
		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}
#REGISTRO DE GRUPOS
	#-------------------------------------
	public function registroGrupoModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (clave, id_carrera, cuatrimestre ) VALUES (:clave, :id_carrera, :cuatrimestre )");	
		
		$stmt1->bindParam(":clave", $datosModel["clave"], PDO::PARAM_STR);
		$stmt1->bindParam(":cuatrimestre", $datosModel["cuatrimestre"], PDO::PARAM_INT);
		$stmt1->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT); 
		
		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#VISTA ALUMNOS
	#-------------------------------------
	public function vistaAlumnoModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT a.matricula as matricula, a.nombre as nombre, c.nombre as carrera, m.nombre as tutor from $tabla as a inner join carrera as c on c.id=a.id_carrera INNER JOIN maestros as m on m.num_empleado=a.id_tutor");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}


	#VISTA ALUMNOS_MATERIA  por ID
	#-------------------------------------
	public function vistaAlumnoMateriaModel($tabla,$datosController){

		$stmt = Conexion::conectar()->prepare("SELECT id_alumno, id_materia  from alumno_materia  where id_materia=".$datosController);	
		$stmt->execute(); 
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();

	}

	#VISTA MATERIAS_GRUPOS  por ID
	#-------------------------------------
	public function vistaMateriaGrupoModel($tabla,$datosController){

		$stmt = Conexion::conectar()->prepare("SELECT id_materia, id_grupo  from materia_grupo  where id_grupo=".$datosController);	
		$stmt->execute(); 
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();

	}

	#VISTA MATERIAS
	#-------------------------------------
	public function vistaMateriasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT a.id as id, a.nombre as nombre, a.nombre_corto as nombre_corto, b.nombre as nombre_maestro from $tabla as a inner join maestros as b on a.num_empleado=b.num_empleado");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDICION DE ALUMNOS 
	#-------------------------------------
	public function editarAlumnoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre, id_carrera, id_tutor FROM $tabla WHERE matricula = :matricula");
		$stmt->bindParam(":matricula", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZACION DE ALUMNOS 
	#-------------------------------------
	public function actualizarAlumnoModel($datosModel, $tabla){
		var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, id_carrera = :id_carrera, id_tutor = :id_tutor WHERE matricula = :matricula");

		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":id_tutor", $datosModel["id_tutor"], PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarAlumnoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE matricula = :matricula");
		$stmt->bindParam(":matricula", $datosModel, PDO::PARAM_STR);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}


	#BORRAR MATERIA
	#------------------------------------
	public function borrarMateriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}

	#BORRAR grupo
	#------------------------------------
	public function borrarGrupoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}


	#VISTA CARRERA
	#-------------------------------------
	public function vistaCarreraModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre from $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#REGISTRO DE CARRERAS 
	#-------------------------------------
	public function registroCarreraModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");	
		
		$stmt1->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		
		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#EDICION DE LA CARRERA  
	#-------------------------------------
	public function editarCarreraModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#EDICION DEL GRUPO  
	#-------------------------------------
	public function editarGrupoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id,clave,id_carrera,cuatrimestre FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}


	#EDICION DE LA materia  
	#-------------------------------------
	public function editarMateriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre,nombre_corto,num_empleado FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}


	#ACTUALIZACION DE LA MATERIA
	#-------------------------------------
	public function actualizarMateriaModel($datosModel, $tabla){
		var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, nombre_corto=:nombre_corto,num_empleado=:num_empleado WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_corto", $datosModel["nombre_corto"], PDO::PARAM_STR);
		$stmt->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_INT);

		var_dump($datosModel);
		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#ACTUALIZACION DE LA CARRERA
	#-------------------------------------
	public function actualizarCarreraModel($datosModel, $tabla){
		var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

		var_dump($datosModel);
		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#ACTUALIZACION DEL GRUPO
	#-------------------------------------
	public function actualizarGrupoModel($datosModel, $tabla){
		var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET clave = :clave, id_carrera=:carrera,cuatrimestre=:cuatrimestre WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":clave", $datosModel["clave"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carreras"], PDO::PARAM_INT);
		$stmt->bindParam(":cuatrimestre", $datosModel["cuatrimestre"], PDO::PARAM_INT);

		var_dump($datosModel);
		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#BORRAR TODO SOBRE LA CARRERA
	#------------------------------------
	public function borrarCarreraModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}

	#PERMITE REALIZAR UNA VISTA PARA TUTORIAS
	#-------------------------------------
	public function vistaTutoriasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}



	
	#VISTA DE LAS TUTORIAS POR NIVEL 
	#-------------------------------------
	#Muestra solo las tutorias que ha hecho el empleado, con el numero de maestro ingresado
	public function vistaTutoriasNivelModel($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");	
		$stmt->bindParam(":num_maestro", $id, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#BORRAR DE LAS TUTORIAS 
	#-------------------------------------
	public function borrarTutoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}

	#BORRAR ALUMNOS MATERIAS 
	#-------------------------------------
	public function borrarMateriasGrupoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_grupo = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#BORRAR MATERIAS GRUPOS 
	#-------------------------------------
	public function borrarAlumnosMateriasModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_materia = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}



	#BORRAR ALUMNOS TUTORIAS 
	#-------------------------------------
	public function borrarAlumnosTutoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sesion = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}


	#REGISTRO DE TUTORIAS
	#-------------------------------------
	public function registroTutoriaModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha, hora, tipo, tema, num_maestro) VALUES (:fecha,:hora,:tipo,:tema,:num_maestro)");	
		
		$stmt1->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt1->bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
		$stmt1->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt1->bindParam(":tema", $datosModel["tema"], PDO::PARAM_STR);
		$stmt1->bindParam(":num_maestro", $datosModel["num_maestro"], PDO::PARAM_STR);
		
		var_dump($datosModel);

		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#OBTENER ULTIMA TUTORIA
	#-------------------------------------
	public function ObtenerLastTutoria($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT max(id) FROM $tabla");
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}


	#REGISTRO DE LOS MATERIA EN EL GRUPO
	#-------------------------------------
	public function registroMateriaGrupoModel($datosModel, $id_sesion, $tabla){
		 $datosModel_array =  explode(",",$datosModel);
		
		for($i=0;$i<sizeof($datosModel_array);$i++){
			$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (id_materia, id_grupo) VALUES (:id_materia,:id_grupo)");	 
			$stmt1->bindParam(":id_materia", $datosModel_array[$i], PDO::PARAM_INT);
			$stmt1->bindParam(":id_grupo", $id_sesion, PDO::PARAM_INT);

			if(!$stmt1->execute())
				return "error";

		}
		
		return "success";		

		$stmt1->close();

	}

	#REGISTRO DE LOS ALUMNOS EN MATERIA
	#-------------------------------------
	public function registroAlumnosMateriaModel($datosModel, $id_sesion, $tabla){
		 $datosModel_array =  explode(",",$datosModel);
		
		for($i=0;$i<sizeof($datosModel_array);$i++){
			$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (id_alumno, id_materia) VALUES (:id_alumno,:id_materia)");	 
			$stmt1->bindParam(":id_alumno", $datosModel_array[$i], PDO::PARAM_INT);
			$stmt1->bindParam(":id_materia", $id_sesion, PDO::PARAM_INT);

			if(!$stmt1->execute())
				return "error";

		}
		
		return "success";		

		$stmt1->close();

	}

	#REGISTRO DE LOS ALUMNOS
	#-------------------------------------
	public function registroAlumnosTutoriaModel($datosModel, $id_sesion, $tabla){
		$datosModel_array =  explode(",",$datosModel);
		
		for($i=0;$i<sizeof($datosModel_array);$i++){
			$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula_alumno, id_sesion) VALUES (:matricula_alumno,:id_sesion)");	
			$stmt1->bindParam(":matricula_alumno", $datosModel_array[$i], PDO::PARAM_STR);
			$stmt1->bindParam(":id_sesion", $id_sesion, PDO::PARAM_INT);

			if(!$stmt1->execute())
				return "error";

		}
		
		return "success";		

		$stmt1->close();

	}

	#EDICION DE LA INTERFAZ
	#-------------------------------------
	public function editarTutoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, hora, fecha, tipo, tema, num_maestro FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}


	#OBTENER CARRERA POR ID
	#-------------------------------------
	public function obtenerCarreraGrupoModel($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM carrera where id=:id"); 
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	#OBTENER LOS MATERIA DEL GRUPO
	#-------------------------------------
	public function obtenerMateriaGrupoModel($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("SELECT st.id_materia, a.nombre FROM materia_grupo as st INNER JOIN materias AS a ON a.id=st.id_materia WHERE st.id_grupo=:id_sesion");
		$stmt->bindParam(":id_sesion", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	#OBTENER LOS ALUMNOS DE LA MATERIA
	#-------------------------------------
	public function obtenerAlumnosMateriaModel($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("SELECT st.id_alumno, a.nombre FROM alumno_materia as st INNER JOIN alumnos AS a ON a.matricula=st.id_alumno WHERE st.id_materia=:id_sesion");
		$stmt->bindParam(":id_sesion", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}


	#OBTENER LOS ALUMNOS DE LA TUTORIA
	#-------------------------------------
	public function obtenerAlumnosTutoriaModel($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("SELECT st.matricula_alumno, a.nombre FROM $tabla as st INNER JOIN alumnos AS a ON a.matricula=st.matricula_alumno WHERE st.id_sesion=:id_sesion");
		$stmt->bindParam(":id_sesion", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	#ACTUALIZA EL TUTOR MUCHO MAS.
	#-------------------------------------
	public function actualizarTutoriaModel($datosModel, $tabla){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, hora = :hora, tipo = :tipo, tema = :tema WHERE id = :id");

		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":tema", $datosModel["tema"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

}
 


?>