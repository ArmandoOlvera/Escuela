'<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	  
	#ENLACES
	#----------------------------------       ---

	public function enlacesPaginasController(){

		 

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "ingresar";
		}
		//echo $enlaces;

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}


	#REGISTRO DE RESERVAS
	#------------------------------------
	public function registroReservaController( ){
 
		if(isset($_POST["nombreRegistro"])){

 
			$respuesta = Datos::vistaNumHabitacionModel1("habitaciones",$_POST["numRegistro"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
	 
		$valor=0;	 
		foreach($respuesta as $row => $item){
		$valor=$item["precio"];
		}
		 $dias=$_POST["tipoRegistro"];
		 $ganancia=$dias*$valor;
		 //echo "ganancia ".$ganancia;fecha
		 
		 $fecha= $_POST["fecha"];

		 echo $fecha;
			/////////////////////////////////////////////////////////////// tipoRegistro

			$datosController = array( "nombreCliente"=>$_POST["nombreRegistro"],
								      "idHabitacion"=>$_POST["numRegistro"],
								      "fecha"=>$fecha,
								      "dias"=> $dias,
								      "ganancia"=>$ganancia);

			$respuesta = Datos::registroReservaModel($datosController, "reserva");

			if($respuesta == "success"){
				echo "guardado"; 

			}

			else{
				echo "FALLO"; 
			}

		}

	}



		#REGISTRO DE Habitaciones
	#------------------------------------
	public function traerHabitaciones(){

		 

			$datosController = array( "precio"=>"1");

			$respuesta = Datos::registroHabitacionModel($datosController, "habitaciones");

			if($respuesta == "success"){

				//header("location:index.php?action=ok");
				echo "Guardado!!!";

			}

			else{

				//header("location:index.php");
				echo "Fallo";
			}

		 

	}




	#REGISTRO DE Habitaciones
	#------------------------------------
	public function registroHabitaciones(){
		$respuesta = Datos::vistaNumHabitacionModel("habitaciones");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		echo "<select name=\"numRegistro\" id=\"numRegistro\">";
								 
		foreach($respuesta as $row => $item){
		echo' <option value='.$item["id"].'>No.'.$item["id"]." - "."$".$item["precio"].'</option> ';
		}
		echo "</select>";
	}


	#REGISTRO DE Habitaciones
	#------------------------------------ tipoRegistro
	public function registroClientes(){

		if(isset($_POST["nombreRegistro"])){
			$datosController = array( "nombre"=>$_POST["nombreRegistro"], 
								      "tipo"=>$_POST["tipoRegistro"] );

			$respuesta = Datos::registroClienteModel($datosController, "clientesh");

			if($respuesta == "success"){

				//header("location:index.php?action=ok");
				echo "Guardado!!!";

			}

			else{

				//header("location:index.php");
				echo "Fallo";
			}

		}

	}


	#REGISTRO DE Habitaciones
	#------------------------------------ tipoRegistro
	public function guardarHabitacion(){

		if(isset($_POST["habitacionRegistro"])){
			$ruta="images/";//ruta carpeta donde queremos copiar las imágenes
        $uploadfile_temporal=$_FILES['imagen']['tmp_name'];
        $uploadfile_nombre=$ruta.$_FILES['imagen']['name'];

 		if (is_uploaded_file($uploadfile_temporal))
        {
            
        }
        else
        {
          $errores = 'error <br/>';
        }

 if(empty($errores)){
			$datosController = array( "precio"=>$_POST["habitacionRegistro"], 
								      "tipo"=>$_POST["tipoRegistro"],
								      "imagen"=>$uploadfile_nombre );


		
			$respuesta = Datos::registroHabitacionModel($datosController, "habitaciones");

			if($respuesta == "success"){
 				move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
				//header("location:index.php?action=ok");
				echo "Guardado!!!";

			}

			else{

				//header("location:index.php");
				echo "Fallo";
			}
}
		}

	}


#VISTA DE CLIENTES
	#------------------------------------

	public function vistaClientessController(){

		$respuesta = Datos::vistaClientesModel("clientesh");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["tipo"].'</td>
				<td>'.$item["nombre"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=clientes&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}



	#VISTA DE Habitaciones
	#------------------------------------ if(isset($_POST["usuarioIngreso"])){

	public function vistaHabitacionesController(){

		$respuesta = Datos::vistaHabitacionesModel("habitaciones");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

		echo'<tr>
				<td>'.$item["id"].'</td> 
				<td>'.$item["precio"].'</td>
				<td>'.$item["tipo"].'</td> 
				<td><img src="'.$item["imagen"].'"  style="width:128px;height:128px"/></td>
				<td><a href="index.php?action=editarhab&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=habitaciones&idBorrar='.$item["id"].'" onclick="salir('.$item["id"].');"><button>Borrar</button></a></td>
			</tr>';

		}

	}

#VISTA DE Habitaciones
	#------------------------------------ if(isset($_POST["usuarioIngreso"])){

	public function vistaHabitacionesControllerb(){

		$respuesta = Datos::vistaHabitacionesModel("habitaciones");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

		echo'<tr>
				<td>'.$item["id"].'</td> 
				<td>'.$item["precio"].'</td>
				<td>'.$item["tipo"].'</td> 
				<td><img src="'.$item["imagen"].'"  style="width:128px;height:128px"/></td>
			 
			</tr>';

		}

	}
	#VISTA DE Habitaciones
	#------------------------------------ 

	public function vistaHabitacionesController2(){


	if(isset($_POST["tipoRegistro"])){
		$respuesta = Datos::vistaHabitacionesModel2("habitaciones",$_POST["tipoRegistro"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

		echo'<tr>
				<td>'.$item["id"].'</td> 
				<td>'.$item["precio"].'</td>
				<td>'.$item["tipo"].'</td> 
				<td><img src="'.$item["imagen"].'"  style="width:128px;height:128px"/></td>
				 
			</tr>';

		}

	}elseif (isset($_POST["precio"])) {
		$respuesta = Datos::vistaHabitacionesModel3("habitaciones",$_POST["precio"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

		echo'<tr>
				<td>'.$item["id"].'</td> 
				<td>'.$item["precio"].'</td>
				<td>'.$item["tipo"].'</td> 
				<td><img src="'.$item["imagen"].'"  style="width:128px;height:128px"/></td>
				 
			</tr>';

		}
	}
}


public function vistaReservasController2(){


	if(isset($_POST["tipoRegistro"])){
		$respuesta = Datos::vistaReservasModel2("reserva",$_POST["tipoRegistro"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){ 
		echo'<tr>
				<td>'.$item["id"].'</td> 
				<td>'.$item["nombreCliente"].'</td>
				<td>'.$item["idHabitacion"].'</td>
				<td>'.$item["fecha"].'</td> 
				<td>'.$item["dias"].'</td>
				  
			</tr>';

		}

	}elseif (isset($_POST["numero"])) {
		$respuesta = Datos::vistaReservasModel3("reserva",$_POST["numero"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

		echo'<tr>
				<td>'.$item["id"].'</td> 
				<td>'.$item["nombreCliente"].'</td>
				<td>'.$item["idHabitacion"].'</td>
				<td>'.$item["fecha"].'</td> 
				<td>'.$item["dias"].'</td>
			</tr>';

		}
	}elseif (isset($_POST["dias"])) {
		$respuesta = Datos::vistaReservasModel4("reserva",$_POST["dias"]);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){

		echo'<tr>
				<td>'.$item["id"].'</td> 
				<td>'.$item["nombreCliente"].'</td>
				<td>'.$item["idHabitacion"].'</td>
				<td>'.$item["fecha"].'</td> 
				<td>'.$item["dias"].'</td>
			</tr>';

		}
	}
}

	

#EDITAR habitacion
	#------------------------------------

	public function editarHabitacionController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarHabitacionModel($datosController, "habitaciones");


		echo "<div class=\"col-lg-6 col-xs-12\">
				<div class=\"box-content card white\">
					<h4 class=\"box-title\">Basic example</h4>
					<!-- /.box-title -->
					<div class=\"card-content\">
						<form   method=\"post\"  enctype=\"multipart/form-data\">

						<div class=\"form-group\">
								<label for=\"exampleInputEmail1\">Precio</label>
								<input  type=\"text\"  class=\"form-control\" value=\"".$respuesta["id"]."\" placeholder=\"Usuario\" name=\"id\" readonly>
							</div>
							<div class=\"form-group\">
								<label for=\"exampleInputEmail1\">Precio</label>
								<input  type=\"text\"  class=\"form-control\" value=\"".$respuesta["precio"]."\" placeholder=\"Usuario\" name=\"precioRegistro\" required>
							</div>
							<div class=\"form-group\">
								<label for=\"exampleInputEmail1\">Tipo de habitacion </label>
								<select name=\"tipoRegistro\" id=\"tipoRegistro\">
								  <option value=\"Simple\">Simple</option>
								  <option value=\"Doble\">Doble</option>
								  <option value=\"Matrimonial\">Matrimonial</option>
								</select>
							</div>
							<div class=\"form-group\">
								<label for=\"imagenRegistro\">Ingrese la imagen</label>
								<input type=\"file\"    name=\"imagen\" id=\"imagen\" required>
							</div>
							<button type=\"submit\" class=\"btn btn-primary btn-sm waves-effect waves-light\">Submit</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>";
		 
	}

 

#ACTUALIZAR HABITACION
	#------------------------------------
	public function actualizarHabitacionController(){

		if(isset($_POST["id"])){


		 
		$ruta="images/";//ruta carpeta donde queremos copiar las imágenes
        $uploadfile_temporal=$_FILES['imagen']['tmp_name'];
        $uploadfile_nombre=$ruta.$_FILES['imagen']['name'];

 		if (is_uploaded_file($uploadfile_temporal))
        {
            
        }
        else
        {
          $errores = 'error <br/>';
        }

 
 if(empty($errores)){

			$datosController = array( "id"=>$_POST["id"],
							          "precio"=>$_POST["precioRegistro"],
				                      "tipo"=>$_POST["tipoRegistro"],
				                      "imagen"=>$uploadfile_nombre);
			
			$respuesta = Datos::actualizarHabitacionModel($datosController, "habitaciones");

			if($respuesta == "success"){
	move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
				echo "Guardado Correctamente!";
				//header("location:index.php?action=cambio");

			}

			else{
  
				echo "Error, no se hizø la ACTUALIZÆCION favor de contactar al administrador";

			}
}
		}
	
	}



#ACTUALIZAR RESERVA
	#------------------------------------
	public function VerGanancias(){

		if(isset($_POST["mes"])){

		$mes = $_POST['mes'];
		 $anio=date('Y');

		 $fecha1=$anio."-".$mes."-01";
		 $fecha2= date("Y-m-t",strtotime($fecha1));

		  
			
			$respuesta = Datos::vistaGananciasModel4("reserva",$fecha1,$fecha2);

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
			$total=0;
		foreach($respuesta as $row => $item){
			$total=$item['ganancia']+$total; 
		}
 	echo "Las ganancias son: ".$total;
		}
	
	}




#ACTUALIZAR RESERVA
	#------------------------------------
	public function actualizarReservasController(){

		if(isset($_POST["numero"])){

		$fecha = new DateTime($_POST['fecha']);
		//echo $fecha->format('d-m-Y');
		 $respuesta = Datos::vistaNumHabitacionModel1("habitaciones",$_POST["habitacion"]);
		$dias=$_POST["dias"];
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		 
		$valor=0;	 
		foreach($respuesta as $row => $item){
		$valor=$item["precio"];
		}
		 $valor=$dias*$valor;
			$datosController = array( "id"=>$_POST["numero"],
							          "nombreCliente"=>$_POST["nombre"],
				                      "idHabitacion"=>$_POST["habitacion"],
				                      "fecha"=>$fecha->format("Y-m-d"),
				                      "dias"=>$dias,
				                      "ganancia"=>$valor
				                  );
			
			$respuesta = Datos::actualizarReservacionnModel($datosController, "reserva");

			if($respuesta == "success"){ 
				echo "Guardado Correctamente!";
				//header("location:index.php?action=cambio");

			}

			else{ 

				echo "Error, no se hizø la actualizacion favor de contactar al administrador";

			}
 
		}
	
	}



	#BORRAR USUARIO
	#------------------------------------
	public function borrarReservaController2(){

		if( isset($_POST["borrar"])){

			$datosController = $_POST["borrar"];
			
			$respuesta = Datos::borrarReservaModel($datosController, "reserva");

			if($respuesta == "success"){
				echo "Echo";
				//header("location:index.php?action=registroreserva");
			
			}else{
				echo "Error al borrar, no se ha borrado nada.";
			}

		}


		if( isset($_POST["borrar"])){

			$datosController = $_POST["borrar"];
			
			$respuesta = Datos::borrarReservaModel($datosController, "reserva");

			if($respuesta == "success"){
				echo "Echo";
				//header("location:index.php?action=registroreserva");
			
			}else{
				echo "Error al borrar, no se ha borrado nada.";
			}

		}

	}

	


	#BORRAR USUARIO
	#------------------------------------
	public function borrarClienteController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "clientesh");

			if($respuesta == "success"){

				//header("location:index.php?action=clientes");
			
			}

		}

	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarHabitacionController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarHabitaacionModel($datosController, "habitaciones");

			if($respuesta == "success"){

				//header("location:index.php?action=usuarios");
			
			}

		}

	}

	#######

///////////////////////////////////////////////////////////////////////////////////Seccion de la escuela
#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				 
			
			}

		}

	}


	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                      "email"=>$_POST["emailEditar"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				echo "Guardado Correctamente!";
				 
			}

			else{
  
				echo "Error, no se hizø la ACTUALIZACION favor de contactar al administrador";

			}

		}
	
	}

#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["user"].'" name="usuarioEditar" required>

			 <input type="text" value="'.$respuesta["pass"].'" name="passwordEditar" required>

			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

			 <input type="submit" value="Actualizar">';

	}


	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["user"].'</td>
				<td>'.$item["pass"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

 

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			 
			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if($respuesta["user"] == $_POST["usuarioIngreso"] && $respuesta["pass"] == $_POST["passwordIngreso"]){

				//session_start();
 
				$_SESSION["validar"] = $respuesta["tipo"];
				$_SESSION["num_empleado"]=$respuesta["num_empleado"];
 echo $_SESSION['validar'];

 				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=dashboard");
                  </script>';

			}

			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=ingresar");
                  </script>';
			}

		}	

	}



	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"],
								      "email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				 

			}

			else{

			 
			}

		}

	}


////////////////////////////////////////////////////////////////
	############################################################### MAESTROS #########################################################


	#Ingreso de maestros
	#------------------------------------
	#Permite controlar el ingreso al sistema ademas generando la variable cookie que almacena el tipo de usuario que es (maestro/superadmin)
	public function ingresoMaestroController(){

		if(isset($_POST["emailIngreso"])){
			$datosController = array( "email"=>$_POST["emailIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoMaestroModel($datosController, "maestros");
			
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["email"] == $_POST["emailIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
				 
				$_SESSION["validar"] = $respuesta["nivel"]; 
				
				$_SESSION["num_empleado"] = $respuesta["num_empleado"];
				 echo '<script type="text/javascript">
                    window.location.replace("index.php?action=dashboard");
                  </script>';

			}
			else{
				$_SESSION["validar"] = "na"; 
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=ingresar");
                  </script>';

			}
		}
	}

	#Registro de maestros
	#------------------------------------
	#Permite hacer un registro de un maestro a en la bd.
	public function registroMaestrosController(){
		if(isset($_POST["usuarioRegistro"])){
			$datosController = array( "num_empleado"=>$_POST["num_empleado"], 
								      "nombre"=>$_POST["nombre"],
								      "email"=>$_POST["email"],
								  	  "carrera"=>$_POST["carrera"]);
			$respuesta = Datos::registroMaestrosModel($datosController, "maestros");

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=grupos");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=ingresar");
                  </script>';
			}
		}
	}


	#Vista de GRUPOS
	#------------------------------------
	#Interfaz de los maestros, imprime los componentes de la misma
	public function vistaGruposController(){

		$respuesta = Datos::vistaGruposModel("grupos");
		//$respuesta = Datos::vistaCarreraIDModel("carrera",$item["id_carrera"]);

		foreach($respuesta as $row => $item){
		 
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["clave"].'</td> ';
				$respuesta2 = Datos::vistaCarreraIDModel("carrera",$item["id_carrera"]);
				foreach($respuesta2 as $row2 => $item2){
					echo '<td>'.$item2["nombre"].'</td>';
				}
				echo '
				<td>'.$item["cuatrimestre"].'</td>
				<td><a href="index.php?action=editar_grupos&id='.$item["id"].'"><button class="small alert">Editar</button></a></td>
				<td><a href="index.php?action=grupos&idBorrar='.$item["id"].'"><button onclick="wait();" class="small alert">Borrar</button></a></td>
				<td><a href="index.php?action=materias_grupo&id='.$item["id"].'"><button class="small alert">Gestión Materias</button></a></td>
			</tr>';
		 
		}

	}

	#Vista de maestros
	#------------------------------------
	#Interfaz de los maestros, imprime los componentes de la misma
	public function vistaMaestrosController(){

		$respuesta = Datos::vistaMaestrosModel("maestros");

		foreach($respuesta as $row => $item){
			$item["nivel"]=$item["nivel"]==1?"SuperAdmin":"Maestro";
		echo'<tr>
				<td>'.$item["num_empleado"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["nombre_carrera"].'</td>
				<td>'.$item["nivel"].'</td>
				<td><a href="index.php?action=editar_maestro&num_empleado='.$item["num_empleado"].'"><button class="small alert">Editar</button></a></td>
				<td><a href="index.php?action=maestros&idBorrar='.$item["num_empleado"].'"><button onclick="wait();" class="small alert">Borrar</button></a></td>
			</tr>';
		echo ' 
			<script type="text/javascript">
		        function wait(){
		          var r = confirm("¿Desea eliminar el usuario?");
		          if (!r) 
		              event.preventDefault();
		        }
		    </script>';
		}

	}

	#Editar Maestro
	#------------------------------------
	#permite controlar la edicion de un maestro imprimiendo la interfaz con los valores de la bd del registro seleccionado.
	public function editarMaestroController(){

		$datosController = $_GET["num_empleado"];
		$respuesta = Datos::editarMaestroModel($datosController, "maestros");
		$respuesta_select = Datos::obtenerCarrerasModel("carrera");
echo '<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Editar Maestro</h4>
					<!-- /.box-title -->
					<div class="card-content">';

		$st_carreras="";
		for($i=0;$i<sizeof($respuesta_select);$i++)
			$st_carreras=$st_carreras."<option value='".$respuesta_select[$i]['id']."'>".$respuesta_select[$i]['nombre']."</option>";
		 echo '<div class="form-group">';
		echo'<input type="hidden" value="'.$respuesta["num_empleado"].'" name="num_empleado">
			 </div>
			   <div class="form-group">
			 <label for="nombre">Nombre:</label>
			 <input class="form-control" type="text" value="'.$respuesta["nombre"].'" name="nombre" required>
 </div>
			   <div class="form-group">
			 <label for="email">Email:</label>
			 <input class="form-control" type="text" value="'.$respuesta["email"].'" name="email" required>
 </div>
			   <div class="form-group">
			 <label for="password">Password:</label>
			 <input  class="form-control" type="password" value="'.$respuesta["password"].'" name="password" required>
 </div>
			   <div class="form-group">
			 <label for="carrera">Carrera:</label>
			 <select class="form-control"  id="carreras" class="js-example-basic-multiple" name="carrera">
				  '.$st_carreras.'
			 </select>
			  </div>
			 <br><br>
			 <label for="nivel">Nivel:</label>
			   <div class="form-group">
 			 <select   class="form-control" name="nivel" id="nivel">
			 	<option class="form-group" value="0">Maestro</option>
			 	<option value="1">SuperAdmin</option>
			 </select> 
			  </div>
			   <div class="form-group">
			 <input  class="form-control" type="submit" value="Actualizar">
			  </div>';
		echo"
		<script>
			$(document).ready(function() {
			    $('.js-example-basic-multiple').select2();
			});
			$('#carreras').val(".$respuesta['id_carrera'].");
			$('#nivel').val(".$respuesta['nivel'].");
		</script>";

	}

	#Actualizar Maestro
	#------------------------------------
	#Permite la actualizacion de un maestro en la base de datos.
	public function actualizarMaestroController(){
		if(isset($_POST["num_empleado"])){
			$datosController = array( "num_empleado"=>$_POST["num_empleado"],
							          "nombre"=>$_POST["nombre"],
				                      "email"=>$_POST["email"],
				                      "password"=>$_POST["password"],
				                      "carrera"=>$_POST["carrera"],
				                      "nivel"=>$_POST["nivel"]);

			$respuesta = Datos::actualizarMaestroModel($datosController, "maestros");

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=maestros");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=registro_maestro");
                  </script>';
			}
		}
	}

	#BORRAR MAESTRO
	#------------------------------------
	#Controla el borrado de un maestro y ademas muestra un mensaje de error en caso de que este no se cumpla.
	public function borrarMaestroController(){

		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarMaestroModel($datosController, "maestros");
			
			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=maestros");
                  </script>';
			}else{
				echo('<script> alert("El maestro no pudo ser eliminado, debido a que existen elementos dependientes a el (tutorias, alumnos), elimine primero esos elementos."); </script>');
			}
		}
	}

 

	#REGISTRO DE MATERIAS
	#------------------------------------
	#Se encarga de controlar un registro o agregado de unA materia, recibiendo todos los valores del mismo y
	#almacenandolos en la bd
	public function registroMateriaController(){

		if(isset($_POST["num_empleado"])){
			$datosController = array( "num_empleado"=>$_POST["num_empleado"], 
								      "nombre"=>$_POST["nombre"],
								      "nombre_corto"=>$_POST["nombre_corto"]);

			$respuesta = Datos::registroMateriasModel($datosController, "materias");

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=materias");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=ingresar");
                  </script>';
			}
		}
	}

	#REGISTRO DE MAESTROS
	#------------------------------------
	#Se encarga de controlar un registro o agregado de un maestro, recibiendo todos los valores del mismo y
	#almacenandolos en la bd
	public function registroMaestroController(){

		if(isset($_POST["num_empleado"])){
			$datosController = array( "num_empleado"=>$_POST["num_empleado"], 
								      "nombre"=>$_POST["nombre"],
								      "email"=>$_POST["email"],
								      "password"=>$_POST["password"],
								  	  "id_carrera"=>$_POST["id_carrera"],
								  	  "nivel"=>$_POST["nivel"]);

			$respuesta = Datos::registroMaestroModel($datosController, "maestros");

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=maestros");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=maestros");
                  </script>';
			}
		}
	}

	#REGISTRO DE BASE DE MAESTROS
	#------------------------------------
	#Genera la interfazbase para realizar un registro de un maestro
	public function registroBaseMaestroController(){

		$respuesta_carreras = Datos::obtenerCarrerasModel("carrera");

		$st_carreras="";
		for($i=0;$i<sizeof($respuesta_carreras);$i++)
			$st_carreras=$st_carreras."<option value='".$respuesta_carreras[$i]['id']."'>".$respuesta_carreras[$i]['nombre']."</option>";

		echo'<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Maestros</h4>
					<!-- /.box-title -->
					<div class="card-content">


<div class="form-group">
			<label for="num_empleado">Numero Empleado:</label>
			 <input class="form-control" type="text" name="num_empleado">
</div>
			 <div class="form-group">
			 <label for="nombre">Nombre:</label>
			 <input class="form-control"type="text" name="nombre" required>
</div>

			 <div class="form-group">
			 <label for="email">Email:</label>
			 <input type="email" class="form-control" name="email" required>
			 </div>

			 <div class="form-group">
			 <label for="id_carrera">Carrera:</label>
			 </div>
<div class="form-group">
			 <select id="carreras" class="form-control" class="js-example-basic-multiple" name="id_carrera">
				  '.$st_carreras.'
			 </select>
			 <br><br>
			 <div class="form-group">
			 <label for="password">Password:</label>
			 <input type="password" class="form-control" name="password" required>
			 </div>

<div class="form-group">
			 <label for="nivel">Nivel:</label>
			 <select class="form-control" name="nivel">
			 	<option value="0">Maestro</option>
			 	<option value="1">SuperAdmin</option>
			 </select> 
			</div>
			<div class="form-group">
			 <input class="form-control" type="submit" value="Registrar"></div>';
		echo"
		<script>
			$(document).ready(function() {
			    $('.js-example-basic-multiple').select2();
			});
		</script>";

	}

#REGISTRO DE BASE DE MATERIAS
	#------------------------------------
	#Genera la interfazbase para realizar un registro de un maestro
	public function registroMateriasController(){

		$respuesta_carreras = Datos::obtenerMaestrosModel("maestros");

		$st_carreras="";
		for($i=0;$i<sizeof($respuesta_carreras);$i++)
			$st_carreras=$st_carreras."<option value='".$respuesta_carreras[$i]['num_empleado']."'>".$respuesta_carreras[$i]['nombre']."</option>";

		echo'<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Materias</h4>
					<!-- /.box-title -->
					<div class="card-content">
  
			 <div class="form-group">
			 <label for="nombre">Nombre:</label>
			 <input class="form-control"type="text" id="nombre" name="nombre" required>
			</div>

			 <div class="form-group">
			 <label for="email">Nombre Corto:</label>
			 <input type="text" class="form-control" name="nombre_corto" id="nombre_corto" required>
			 </div>

			 <div class="form-group">
			 <label for="id_carrera">Maestro:</label>
			 </div>
			<div class="form-group">
			 <select id="num_empleado" class="form-control" class="js-example-basic-multiple" name="num_empleado">
				  '.$st_carreras.'
			 </select>
			 </div>
			<div class="form-group">
			 <input class="form-control" type="submit" value="Registrar"></div>';
		  
	}

	############################################################### ALUMNOS #########################################################

	#VISTA DE ALUMNOS
	#------------------------------------
	#Se encarga de controlar la vista de la interfaz de alumnos
	public function vistaAlumnosController(){

		$respuesta = Datos::vistaAlumnoModel("alumnos");

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["tutor"].'</td>
				<td><a href="index.php?action=editar_alumnos&matricula='.$item["matricula"].'"><button class="small alert">Editar</button></a></td>
				<td><a href="index.php?action=alumnos&idBorrar='.$item["matricula"].'"><button class="small alert">Borrar</button></a></td>
			</tr>';
		}
	}

	#VISTA DE Materias
	#------------------------------------
	#Se encarga de controlar la vista de la interfaz de materias
	public function vistaMateriasController(){

		$respuesta = Datos::vistaMateriasModel("materias");

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["nombre_corto"].'</td>
				<td>'.$item["nombre_maestro"].'</td>  
				<td><a href="index.php?action=editar_materias&id='.$item["id"].'"><button class="small alert">Editar</button></a></td>
				<td><a href="index.php?action=materias&idBorrar='.$item["id"].'"><button class="small alert">Borrar</button></a></td>
				<td><a href="index.php?action=alumnos_materia&id='.$item["id"].'"><button class="small alert">Gestión Alumnos</button></a></td>
			</tr>';
		}
	}

	#BORRAR ALUMNO
	#------------------------------------
	#Permite el borrado de un alumno de la base de datos.
	public function borrarAlumnoController(){

		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=alumnos");
                  </script>';
			}else{
				echo('<script> alert("El alumno no pudo ser eliminado, debido a que existen elementos dependientes a el, elimine primero esos elementos."); </script>');
			}
		}
	}

	#BORRAR MATERIA
	#------------------------------------
	#Permite el borrado de un alumno de la base de datos.
	public function borrarMateriaController(){
 
		if(isset($_GET["idBorrar"])){
			$rasa=0;
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::vistaAlumnoMateriaModel("alumno_materia",$datosController);

			foreach($respuesta as $row => $item){
			$rasa=1;
			}
			if($rasa==1){
				echo('<script> alert("La materia no pudo ser eliminada, debido a que existen elementos dependientes a el, elimine primero esos elementos."); </script>');
			}else{
				$respuesta2 = Datos::borrarMateriaModel($datosController, "materias");
				if($respuesta2 == "success"){
					echo '<script type="text/javascript">
	                    window.location.replace("index.php?action=materias");
	                  </script>';
				}else{
					echo('<script> alert("La materia no pudo ser eliminada, debido a que existen elementos dependientes a el, elimine primero esos elementos."); </script>');
				}
			}
			
		}
	}

	#BORRAR GRUPO
	#------------------------------------
	#Permite el borrado de un alumno de la base de datos.
	public function borrarGrupoController(){
 
		if(isset($_GET["idBorrar"])){
			$rasa=0;
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::vistaMateriaGrupoModel("materia_grupo",$datosController);

			foreach($respuesta as $row => $item){
			$rasa=1;
			}
			if($rasa==1){
				echo('<script> alert("La materia no pudo ser eliminada, debido a que existen elementos dependientes a el, elimine primero esos elementos."); </script>');
			}else{
				$respuesta2 = Datos::borrarGrupoModel($datosController, "grupos");
				if($respuesta2 == "success"){
					echo '<script type="text/javascript">
	                    window.location.replace("index.php?action=grupos");
	                  </script>';
				}else{
					echo('<script> alert("El grupo no pudo ser eliminada, debido a que existen elementos dependientes a el, elimine primero esos elementos."); </script>');
				}
			}
			
		}
	}

	#REGISTRO DE GRUPOS
	#------------------------------------
	#Permite realizar el registro de algun alumno en la base de datos.
	public function registroGrupoController(){

		if(isset($_POST["clave"])){
			$datosController = array( "clave"=>$_POST["clave"], 
								      "cuatrimestre"=>$_POST["cuatrimestre"],
								      "id_carrera"=>$_POST["id_carrera"]);

			$respuesta = Datos::registroGrupoModel($datosController, "grupos");

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=grupos");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=ingresar");
                  </script>';
			}

		}

	}


	#REGISTRO DE ALUMNOS
	#------------------------------------
	#Permite realizar el registro de algun alumno en la base de datos.
	public function registroAlumnoController(){

		if(isset($_POST["matricula"])){
			$datosController = array( "matricula"=>$_POST["matricula"], 
								      "nombre"=>$_POST["nombre"],
								      "id_carrera"=>$_POST["id_carrera"],
								      "id_tutor"=>$_POST["id_tutor"]);

			$respuesta = Datos::registroAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=alumnos");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=registro_alumno");
                  </script>';
			}

		}

	}


#REGISTRO DE BASE DE GRUPOS
	#------------------------------------
	#Genera una interfaz base donde para la modificacion de un alumno.
	public function registroBaseGruposController(){

		$respuesta_carreras = Datos::obtenerCarrerasModel("carrera");

		$st_carreras="";
		for($i=0;$i<sizeof($respuesta_carreras);$i++)
			$st_carreras=$st_carreras."<option value='".$respuesta_carreras[$i]['id']."'>".$respuesta_carreras[$i]['nombre']."</option>";

		 
		
		echo'
		<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Grupos</h4>
					<!-- /.box-title -->

					<div class="card-content">
					<div class="form-group">
			
			<label for="matricula">Clave:</label>
			 <input class="form-control" type="text" name="clave" id="clave">
			 </div> 
			  
			 <div class="form-group">
			 <label for="id_carrera">Carrera:</label>
			 <select class="form-control" id="id_carrera" class="js-example-basic-multiple" name="id_carrera">
				  '.$st_carreras.'
			 </select>
			 </div> 
			
			 <div class="form-group">
			 <label for="id_tutor">Cuatrimestre:</label>
			 <select id="cuatrimestre"  class="form-control" class="js-example-basic-multiple" name="cuatrimestre">
				 <option value="1">1</option>
				 <option value="2">2</option>
				 <option value="3">3</option>
				 <option value="4">4</option>
				 <option value="5">5</option>
				 <option value="6">6</option>
				 <option value="7">7</option>
				 <option value="8">8</option>
				 <option value="9">9</option>
				 <option value="10">10</option>
			 </select>
			 </div> 
			
			 <div class="form-group">
			 <input type="submit"  class="form-control" value="Registrar"></div> ';
	 
	}


	#REGISTRO DE BASE DE ALUMNOS
	#------------------------------------
	#Genera una interfaz base donde para la modificacion de un alumno.
	public function registroBaseAlumnoController(){

		$respuesta_carreras = Datos::obtenerCarrerasModel("carrera");
		$respuesta_tutores = Datos::obtenerTutoresModel("maestros");

		$st_carreras="";
		for($i=0;$i<sizeof($respuesta_carreras);$i++)
			$st_carreras=$st_carreras."<option value='".$respuesta_carreras[$i]['id']."'>".$respuesta_carreras[$i]['nombre']."</option>";

		$st_tutores="";
		for($i=0;$i<sizeof($respuesta_tutores);$i++)
			$st_tutores=$st_tutores."<option value='".$respuesta_tutores[$i]['num_empleado']."'>".$respuesta_tutores[$i]['nombre']."</option>";
		
		echo'
		<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Clientes</h4>
					<!-- /.box-title -->
					<div class="card-content">
					<div class="form-group">
		<label for="matricula">Matricula:</label>
			 <input class="form-control" type="text" name="matricula">
			 </div> 
			 <div class="form-group">
			 <label for="nombre">Nombre:</label>
			 <input  class="form-control"type="text" name="nombre" required>
			 </div> 
			 <div class="form-group">
			 <label for="id_carrera">Carrera:</label>
			 <select class="form-control" id="carreras" class="js-example-basic-multiple" name="id_carrera">
				  '.$st_carreras.'
			 </select>
			 </div> 
			 <div class="form-group">
			 <label for="id_tutor">Tutor:</label>
			 <select id="tutores"  class="form-control" class="js-example-basic-multiple" name="id_tutor">
				  '.$st_tutores.'
			 </select>
			 </div> 
			 <div class="form-group">
			 <input type="submit"  class="form-control" value="Registrar"></div> ';
		echo"
		<script>
			$(document).ready(function() {
			    $('.js-example-basic-multiple').select2();
			});
		</script>";

	}

	#EDITAR ALUMNO
	#------------------------------------
	#Controla la edicion de un alumno permitiendo su actualizacion en la base de datos mostrando la interfaz
	public function editarAlumnoController(){

		$datosController = $_GET["matricula"];
		$respuesta = Datos::editarAlumnoModel($datosController, "alumnos");
		$respuesta_carreras = Datos::obtenerCarrerasModel("carrera");
		$respuesta_tutores = Datos::obtenerTutoresModel("maestros");

		$st_carreras=""; 
echo '<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Editar Alumno</h4>
					<!-- /.box-title -->
					<div class="card-content">';

		for($i=0;$i<sizeof($respuesta_carreras);$i++)
			$st_carreras=$st_carreras."<option value='".$respuesta_carreras[$i]['id']."'>".$respuesta_carreras[$i]['nombre']."</option>";
 		$st_tutores="";
 
		for($i=0;$i<sizeof($respuesta_tutores);$i++)
			$st_tutores=$st_tutores."<option value='".$respuesta_tutores[$i]['num_empleado']."'>".$respuesta_tutores[$i]['nombre']."</option>";



		echo '<div class="form-group">';		
		echo'<input class="form-control"  type="hidden" value="'.$respuesta["matricula"].'" name="matricula">
		<div class="form-group">
			 <label for="nombre">Nombre:</label>
			 <input type="text"  class="form-control"  value="'.$respuesta["nombre"].'" name="nombre" required>
	</div>
		<div class="form-group">	 
			 <label for="carrera">Carrera:</label>
			 <select  class="form-control"  id="carreras" class="js-example-basic-multiple" name="carrera">
				  '.$st_carreras.'
			 </select>
</div>
		<div class="form-group">
			 <label for="tutor">Tutor:</label>
			 <select  class="form-control"  id="tutores" class="js-example-basic-multiple" name="tutor">
				  '.$st_tutores.'
			 </select>
</div>
			<div class="form-group">
			 <input class="form-control"  type="submit" value="Actualizar">
			 </div>';
		echo"
		<script>
			$(document).ready(function() {
			    $('.js-example-basic-multiple').select2();
			});
			$('#carreras').val(".$respuesta['id_carrera'].");
			$('#tutores').val(".$respuesta['id_tutor'].");
		</script>";
echo '</div>';


echo '</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>';
	}

	#ACTUALIZAR ALUMNO
	#------------------------------------
	#Permite realizar el update en la base de datos de un alumno
	public function actualizarAlumnoController(){
		if(isset($_POST["matricula"])){
			$datosController = array( "matricula"=>$_POST["matricula"],
							          "nombre"=>$_POST["nombre"],
				                      "id_carrera"=>$_POST["carrera"],
				                      "id_tutor"=>$_POST["tutor"]
										);
			
			$respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){
					echo '<script type="text/javascript">
                    window.location.replace("index.php?action=alumnos");
                  </script>';

			}
			else{
				echo "error";
			}
		}
	}

	############################################################### CARRERAS #########################################################

	#VISTA DE CARRERAS
	#------------------------------------
	#Genera la interfaz de las carreras mostrando una tabla para su edicion o eliminacion
	public function vistaCarreraController(){

		$respuesta = Datos::vistaCarreraModel("carrera");

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td><a href="index.php?action=editar_carreras&id='.$item["id"].'"><button class="small alert">Editar</button></a></td>
				<td><a href="index.php?action=carreras&idBorrar='.$item["id"].'"><button class="small alert">Borrar</button></a></td>
			</tr>';
		}
	}

	#BORRAR CARRERAS
	#------------------------------------
	#Permite borrar alguna carrera seleccionada dependiendo de el id ingresado por el metodo get
	public function borrarCarreraController(){

		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];

			$respuesta = Datos::borrarCarreraModel($datosController, "carrera");
			
			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=carreras");
                  </script>';
			}else{
				echo('<script> alert("La carrera no pudo ser eliminado, debido a que existen elementos dependientes a el (alumnos, maestros, tutorias), elimine primero esos elementos."); </script>');
			}
		}
	}

	#EDITAR CARRERAS
	#------------------------------------
	#GEnera la interfaz llena de la edicion de carreras
	public function editarCarreraController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarCarreraModel($datosController, "carrera");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
		<div class="form-group">
			 <label  for="nombre">Nombre:</label>
			 <input class="form-control"  type="text" value="'.$respuesta["nombre"].'" name="nombre" required>
			 </div>  <div class="form-group">
			 <input class="form-control" type="submit" value="Actualizar"></div>  ';
	}


	#EDITAR CARRERAS
	#------------------------------------
	#GEnera la interfaz llena de la edicion de carreras
	public function editarGruposController(){

		$datosController = $_GET["id"];
		$st_carreras="";
		$respuesta = Datos::editarGrupoModel($datosController, "grupos");
		$respuesta_carreras = Datos::obtenerCarrerasModel("carrera");
		for($i=0;$i<sizeof($respuesta_carreras);$i++)
			$st_carreras=$st_carreras."<option value='".$respuesta_carreras[$i]['id']."'>".$respuesta_carreras[$i]['nombre']."</option>";
 		$st_tutores="";

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">
			<div class="form-group">
			 <label  for="nombre">Nombre:</label>
			 <input class="form-control"  type="text" value="'.$respuesta["clave"].'" name="clave" id="clave" required>
			 </div>  
			<div class="form-group">	 
			 <label for="carrera">Carrera:</label>
			 <select  class="form-control"  id="carreras" class="js-example-basic-multiple" name="carreras">
				  '.$st_carreras.'
			 </select>
			</div> <div class="form-group">
			<select id="cuatrimestre"  class="form-control" name="cuatrimestre">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select></div>
			 <div class="form-group">
			 <input class="form-control" type="submit" value="Actualizar">
			 </div>  ';
	}


	#EDITAR MATERIA
	#------------------------------------
	#GEnera la interfaz llena de la edicion de carreras
	public function editarMateriaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarMateriaModel($datosController, "materias");
		//num_empleado
		$st_alumnos="";
		$respuesta2 = Datos::vistaTutoriasNivelModel("maestros",$datosController);
		for($i=0;$i<sizeof($respuesta2);$i++)
			$st_alumnos=$st_alumnos."<option value='".$respuesta2[$i]['num_empleado']."'>".$respuesta2[$i]['nombre']."</option>";
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id" name="id">
			 
				
			<div class="form-group">
			 <label  for="nombre">Nombre Materia:</label>
			 <input class="form-control"  type="text" value="'.$respuesta["nombre"].'" id="nombre" name="nombre" required>
			 </div>  
			 <div class="form-group">
			 <label  for="nombre">nombre_corto:</label>
			 <input class="form-control"  type="text" value="'.$respuesta["nombre_corto"].'" id="nombre_corto" name="nombre_corto" required>
			 </div>  

			 <div class="form-group">
			 <label  for="nombre">Maestro:</label>
			 	<select id="num_empleado"  class="form-control" class="js-example-basic-multiple" name="num_empleado">
			 	'.$st_alumnos.'	
			 	</select>
			 </div> 	 

			 <div class="form-group">
			 <input class="form-control" type="submit" value="Actualizar">
			 </div>  ';
	}

	#ACTUALIZAR MATERIAS
	#------------------------------------
	#Permite la actualizacion de la carrera al realizar la actualizacion en la base de datos.
	public function actualizarMateriaController(){
		if(isset($_POST["id"])){
			$datosController = array( "id"=>$_POST["id"],
							          "nombre"=>$_POST["nombre"],
							          "nombre_corto"=>$_POST["nombre_corto"],
							          "num_empleado"=>$_POST["num_empleado"]
										);
			$respuesta = Datos::actualizarMateriaModel($datosController, "materias");
			

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=materias");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=ingresar");
                  </script>';
			}
		}
	}


#ACTUALIZAR GRUPOS
	#------------------------------------
	#Permite la actualizacion de la carrera al realizar la actualizacion en la base de datos.
	public function actualizarGrupoController(){
		if(isset($_POST["id"])){
			$datosController = array( "id"=>$_POST["id"],
							          "clave"=>$_POST["clave"],
							          "carreras"=>$_POST["carreras"],
							          "cuatrimestre"=>$_POST["cuatrimestre"]
										);
			$respuesta = Datos::actualizarGrupoModel($datosController, "grupos");
			

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=grupos");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=ingresar");
                  </script>';
			}
		}
	}




	#ACTUALIZAR CARRERAS
	#------------------------------------
	#Permite la actualizacion de la carrera al realizar la actualizacion en la base de datos.
	public function actualizarCarreraController(){
		if(isset($_POST["id"])){
			$datosController = array( "id"=>$_POST["id"],
							          "nombre"=>$_POST["nombre"]
										);
			$respuesta = Datos::actualizarCarreraModel($datosController, "carrera");
			

			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=carreras");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=carreras");
                  </script>';
			}
		}
	}

	#REGISTRO CARRERAS
	#------------------------------------
	#Permite el registro de la carrera en la base de datos
	public function registroCarreraController(){

		if(isset($_POST["nombre"])){
			$datosController = array(
								      "nombre"=>$_POST["nombre"]
								  );

			$respuesta = Datos::registroCarreraModel($datosController, "carrera");
			
			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=carreras");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=registro_carrera");
                  </script>';
			}
			
		}

	}


	#REGISTRO CARRERAS
	#------------------------------------
	#Permite generar la interfaz base para la edicion de una carrera
	public function registroBaseCarreraController(){
		echo'<div class="col-lg-6 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Registro de Carreras</h4>
					<!-- /.box-title -->
					<div class="card-content">

<div class="form-group">
					<label for="nombre">Nombre:</label>
			 <input class="form-control" type="text" name="nombre" required>
	</div>  
			 <div class="form-group">
			 <input type="submit" class="form-control"  value="Registrar">
	</div>  



		</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content --> 
			</div>';
	}


	############################################################### TUTORIAS #########################################################

	#REGISTRO TUTORIAS
	#------------------------------------
	#Genera la interfaz que muestra en una tabla todos los registros almacenados
	public function vistaTutoriasController(){
		if($_SESSION['validar']=="1")
			$respuesta = Datos::vistaTutoriasModel("sesion_tutoria");
		else
			$respuesta = Datos::vistaTutoriasNivelModel("sesion_tutoria",$_SESSION["num_empleado"]);		
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["hora"].'</td>
				<td>'.$item["tema"].'</td>
				<td>'.$item["tipo"].'</td>
				<td><a href="index.php?action=editar_tutoria&id='.$item["id"].'"><button class="small alert">Editar</button></a></td>
				<td><a href="index.php?action=tutorias&idBorrar='.$item["id"].'"><button class="small alert">Borrar</button></a></td>
			</tr>';
		}
	}

	#BORRAR TUTORIAS
	#------------------------------------
	#Permite el eliminado de las tutorais llamando el modelo
	public function borrarTutoriaController(){

		if(isset($_GET["idBorrar"])){
			$datosController = $_GET["idBorrar"];
			$respuesta = Datos::borrarAlumnosTutoriaModel($datosController, "sesion_alumnos");
			$respuesta = Datos::borrarTutoriaModel($datosController, "sesion_tutoria");
			
			if($respuesta == "success"){
					echo '<script type="text/javascript">
                    window.location.replace("index.php?action=tutorias");
                  </script>';
			}
		}
	}


	#REGISTRAR ALUMNOS A MATERIAS
	#------------------------------------
	#Permite el registro de una tutoria en la base de datos
	public function registroAlumnoMateriaController(){	  
		if(isset($_POST["id"])){ 
$lol=$_POST["id"];

 

			if(isset($_POST['hid'])){
				$data = $_POST['hid'];

			$respuesta = Datos::borrarAlumnosMateriasModel($_GET["id"], "alumno_materia");

				$respuesta = Datos::registroAlumnosMateriaModel($data,$lol , "alumno_materia");
		  	}
		  	
			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=materias");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=alumnos_materia?id='.$_POST["id"].');</script>';
			}
		
		}
		
	}


	#REGISTRAR MATERIAS A GRUPO
	#------------------------------------
	#Permite el registro de una tutoria en la base de datos
	public function registroMateriaGRupoController(){	  
		if(isset($_POST["id"])){ 
		$lol=$_POST["id"];

 

			if(isset($_POST['hid'])){
				$data = $_POST['hid'];

			$respuesta = Datos::borrarMateriasGrupoModel($_GET["id"], "materia_grupo");

			$respuesta = Datos::registroMateriaGrupoModel($data,$lol , "materia_grupo");
		  	}
		  	
			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=grupos");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=materias_grupo?id='.$_POST["id"].');</script>';
			}
		
		}
		
	}

	#REGISTRAR TUTORIAS
	#------------------------------------
	#Permite el registro de una tutoria en la base de datos
	public function registroTutoriaController(){	  
		if(isset($_POST["fecha"])){
			$datosController = array(
								      "hora"=>$_POST["hora"],
								      "fecha"=>$_POST["fecha"],
								      "tema"=>$_POST["tema"],
								      "tipo"=>$_POST["tipo"],
								      "num_maestro"=>$_POST["num_maestro"]
								  );

			$respuesta = Datos::registroTutoriaModel($datosController, "sesion_tutoria");
			
			if(isset($_POST['hid'])){
				$data = $_POST['hid'];

				$id_sesion = Datos::ObtenerLastTutoria("sesion_tutoria");

				$respuesta = Datos::registroAlumnosTutoriaModel($data, $id_sesion[0], "sesion_alumnos");
		  	}
		  	
			if($respuesta == "success"){
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=tutorias");
                  </script>';
			}
			else{
				echo '<script type="text/javascript">
                    window.location.replace("index.php?action=ingresar");
                  </script>';
			}
		
		}
		
	}

	#REGISTRO BASE DE ALUMNOS A MATERIAS
	#------------------------------------
	#Genera la interfaz base para el registro de las tutorias
	public function registroBaseAlumnoMateriaController(){
		$datosController = $_GET["id"]; 
		$respuesta_alumnos = Datos::obtenerAlumnosModel("alumnos");
		
		$respuesta_alumnosTutoria = Datos::obtenerAlumnosMateriaModel($datosController,"alumno_materia");

		
		$respuesta = Datos::editarMateriaModel($datosController, "materias");
		 //se obteiene el nombre del profesoe
		//echo "num_empleado.    ".$respuesta["num_empleado"];
		$respuesta_profesor = Datos::obtenerMaestroIDModel("maestros",$respuesta["num_empleado"]);
		
		echo' 
		<input type="hidden" value="'.$respuesta["id"].'" name="id" name="id">
		  <input type="hidden" id="hid" name="hid">
		<div class="box-content col-md-4"> 
			<div class="form-group">
			 <label  for="nombre">Nombre Materia:</label>
			 <input class="form-control"  type="text" value="'.$respuesta["nombre"].'" id="nombre" name="nombre"  disabled>
			 </div>  
			 <div class="form-group">
			 <label  for="nombre">nombre_corto:</label>
			 <input class="form-control"  type="text" value="'.$respuesta["nombre_corto"].'" id="nombre_corto" name="nombre_corto"  disabled>
			 </div>  

			 <div class="form-group">
			 <label  for="nombre">Maestro:</label>
			 <input class="form-control"  type="text" value="'.$respuesta_profesor["nombre"].'" id="nombr1e_corto" name="nombre_c1orto"  disabled>
			 </div> 	 

			 <div class="form-group">
			 <input class="form-control" onclick="sendData();" type="submit" value="Actualizar">
			 </div> </div>  ';

		 


		$st_alumnos="";
		for($i=0;$i<sizeof($respuesta_alumnos);$i++)
			$st_alumnos=$st_alumnos."<option value='".$respuesta_alumnos[$i]['matricula']."'>".$respuesta_alumnos[$i]['nombre']."</option>";

		//echo $_SESSION["validar"];
		echo'
			 <div class="box-content col-md-4">
          <h4 class="box-title"><h4>Selección de alumnos en la materia</h4>
						
						 
							 <div class="form-group">
								 <label for="alumno">Nombre del Alumno:</label>
								 <select name="alumno" class="form-control" id="alumno">
								 	'.$st_alumnos.'
								 </select>
								  
							 </div> <div class="form-group">
							 	<button type="button" class=" form-control btn btn-info btn-lg waves-effect waves-light" onclick="addAlumno()">Agregar Alumno</button>
							 	</div> 
							</div>
			  
<div class="box-content col-md-4"><h4>Alumnos en Materia</h4>
						<table id="alumnos" width="50%" style=" border: 1px solid #ddd;
  padding: 8px;"></table>
  </div>';
////////////////////
  echo'
		<script>
		 
			var alumnos=[];
			var send_alumnos=[];
			var tab = document.getElementById("alumnos");
fillTable();

			function fillTable(){
				var resp_at = '.json_encode($respuesta_alumnosTutoria).';
				alumnos=resp_at;
				for(var i=0;i<alumnos.length;i++){
					send_alumnos[i]=alumnos[i][0];
				}
				updateTable();
			}

			function updateTable(){
				tab.innerHTML="<tr><th >Matricula</th><th>Nombre</th><th>¿Eliminar?</th><tr>";
				for(var i=0;i<alumnos.length;i++){
					tab.innerHTML=tab.innerHTML+"<tr><td >"+alumnos[i][0]+"</td><td>"+alumnos[i][1]+"</td><td><button class=\'alert\' type=\'button\' onclick=\'deleteAlumno("+i+");\'>Eliminar</button></td><tr>";
				}
			}

			function addAlumno(){
				
				var select = document.getElementById("alumno");
				var flag=false;
				for(var i=0;i<alumnos.length;i++){
					if(alumnos[i][0]==select.options[select.selectedIndex].value && alumnos[i][1]==select.options[select.selectedIndex].text){
						flag=true;
						break;
					}
				}

				if(!flag){
					alumnos.push([select.options[select.selectedIndex].value,select.options[select.selectedIndex].text]);
					send_alumnos.push([select.options[select.selectedIndex].value]);
					updateTable();						
				}else{
					alert("Alumno ya Agregado");
				}
			}

			function deleteAlumno(index){
				alumnos.splice(index, 1);
				send_alumnos.splice(index, 1);
				updateTable();
			}

			function sendData(){
				var hid = document.getElementById("hid");
				hid.value=send_alumnos;
			}
		</script>';

  ////////////////////////
				 
	}


	#REGISTRO BASE DE MATERIAS A GRUPOS
	#------------------------------------
	#Genera la interfaz base para el registro de las tutorias
	public function registroBaseMateriaGrupoController(){
		$datosController = $_GET["id"]; 

		$respuesta_alumnos = Datos::obtenerMateriasModel("materias");


		
		$respuesta_alumnosTutoria = Datos::obtenerMateriaGrupoModel($datosController,"materia_grupo");

		$respuesta = Datos::editarGrupoModel($datosController, "grupos"); 

		$asd=$respuesta["id_carrera"];
		$respuesta_carrera = Datos::obtenerCarreraGrupoModel($asd,"carrera");
		 
		echo' 
		<input type="hidden" value="'.$respuesta["id"].'" name="id" name="id">
		  <input type="hidden" id="hid" name="hid">
		<div class="box-content col-md-4"> 
			<div class="form-group">
			 <label  for="nombre">Nombre Materia:</label>
			 <input class="form-control"  type="text" value="'.$respuesta["clave"].'" id="nombre" name="nombre"  disabled>
			 </div>  
			 <div class="form-group">
			 <label  for="nombre">Carrera:</label>
			 <input class="form-control"  type="text" value="'.$respuesta_carrera["nombre"].'" id="nombre_corto" name="nombre_corto"  disabled>
			 </div>  

			 <div class="form-group">
			 <label  for="nombre">Cuatrimestre:</label>
			 <input class="form-control"  type="text" value="'.$respuesta["cuatrimestre"].'" id="nombr1e_corto" name="nombre_c1orto"  disabled>
			 </div> 	 

			 <div class="form-group">
			 <input class="form-control" onclick="sendData();" type="submit" value="Actualizar">
			 </div> </div>  ';

		 


		$st_alumnos="";
		for($i=0;$i<sizeof($respuesta_alumnos);$i++)
			$st_alumnos=$st_alumnos."<option value='".$respuesta_alumnos[$i]['id']."'>".$respuesta_alumnos[$i]['nombre']."</option>";

		//echo $_SESSION["validar"];
		echo'
			 <div class="box-content col-md-4">
          <h4 class="box-title"><h4>Selección de materas en el grupo</h4>
							 <div class="form-group">
								 <label for="alumno">Nombre de la Materia:</label>
								 <select name="alumno" class="form-control" id="alumno">
								 	'.$st_alumnos.'
								 </select>
								  
							 </div> <div class="form-group">
							 	<button type="button" class=" form-control btn btn-info btn-lg waves-effect waves-light" onclick="addAlumno()">Agregar Materia</button>
							 	</div> 
							</div>
			  
<div class="box-content col-md-4"><h4>Alumnos en Materia</h4>
						<table id="alumnos" width="50%" style=" border: 1px solid #ddd;
  padding: 8px;"></table>
  </div>';
////////////////////
  echo'
		<script>
		 
			var alumnos=[];
			var send_alumnos=[];
			var tab = document.getElementById("alumnos");
fillTable();

			function fillTable(){
				var resp_at = '.json_encode($respuesta_alumnosTutoria).';
				alumnos=resp_at;
				for(var i=0;i<alumnos.length;i++){
					send_alumnos[i]=alumnos[i][0];
				}
				updateTable();
			}

			function updateTable(){
				tab.innerHTML="<tr><th >Matricula</th><th>Nombre</th><th>¿Eliminar?</th><tr>";
				for(var i=0;i<alumnos.length;i++){
					tab.innerHTML=tab.innerHTML+"<tr><td >"+alumnos[i][0]+"</td><td>"+alumnos[i][1]+"</td><td><button class=\'alert\' type=\'button\' onclick=\'deleteAlumno("+i+");\'>Eliminar</button></td><tr>";
				}
			}

			function addAlumno(){
				
				var select = document.getElementById("alumno");
				var flag=false;
				for(var i=0;i<alumnos.length;i++){
					if(alumnos[i][0]==select.options[select.selectedIndex].value && alumnos[i][1]==select.options[select.selectedIndex].text){
						flag=true;
						break;
					}
				}

				if(!flag){
					alumnos.push([select.options[select.selectedIndex].value,select.options[select.selectedIndex].text]);
					send_alumnos.push([select.options[select.selectedIndex].value]);
					updateTable();						
				}else{
					alert("Alumno ya Agregado");
				}
			}

			function deleteAlumno(index){
				alumnos.splice(index, 1);
				send_alumnos.splice(index, 1);
				updateTable();
			}

			function sendData(){
				var hid = document.getElementById("hid");
				hid.value=send_alumnos;
			}
		</script>';

  ////////////////////////
				 
	}




	#REGISTRO BASE DE TUTORIAS
	#------------------------------------
	#Genera la interfaz base para el registro de las tutorias
	public function registroBaseTutoriaController(){
		if($_SESSION["validar"]=="na")
			$respuesta_alumnos = Datos::obtenerAlumnosModel("alumnos");
		else
			$respuesta_alumnos = Datos::obtenerAlumnosNivelModel("alumnos",$_SESSION['num_empleado']);

		$st_alumnos="";
		for($i=0;$i<sizeof($respuesta_alumnos);$i++)
			$st_alumnos=$st_alumnos."<option value='".$respuesta_alumnos[$i]['matricula']."'>".$respuesta_alumnos[$i]['nombre']."</option>";

		//echo $_SESSION["validar"];
		echo'
			<input type="hidden" id="hid" name="hid">
			<div class="box-content col-md-4">
          <h4 class="box-title"><h4>Detalles en la tutoria</h4></h4>
						 
						<input type="hidden" name="num_maestro" value="'.$_SESSION['num_empleado'].'" required>
						
<div class="form-group">
<label for="fecha">Fecha:</label>
						<input class="form-control" type="date" name="fecha" required>
</div>  
<div class="form-group">
						<label for="hora">Hora:</label>
						<input class="form-control" type="time" name="hora" required>
</div>  
<div class="form-group">
						<label for="tipo">Tipo:</label>
						<select class="form-control" name="tipo" required>
							<option value="Grupal">Grupal</option>
							<option value="Individual">Individual</option>
						 </select>
</div>  
<div class="form-group">
						<label for="Tema">Tema:</label>
						<input class="form-control" type="text" name="tema" required>
</div>  

<div class="form-group">
						<button class=" form-control btn btn-success btn-lg waves-effect waves-light" onclick="sendData();" type="submit">Registrar</button>
						</div>  
					<td>
					</div>

					<div class="box-content col-md-4">
          <h4 class="box-title"><h4>Selección de alumnos en tutoria</h4>
						
						 
							 <div class="form-group">
								 <label for="alumno">Nombre del Alumno:</label>
								 <select name="alumno" class="form-control" id="alumno">
								 	'.$st_alumnos.'
								 </select>
								  
							 </div> <div class="form-group">
							 	<button type="button" class=" form-control btn btn-info btn-lg waves-effect waves-light" onclick="addAlumno()">Agregar Alumno</button>
							 	</div> 
							</div>
			 
<div class="box-content col-md-4"><h4>Alumnos en tutoria</h4>
						<table id="alumnos" width="50%" style=" border: 1px solid #ddd;
  padding: 8px;"></table>
  </div>';

		echo'<script>
		var alumnos=[];
				var send_alumnos=[];
				var tab = document.getElementById("alumnos");

				$(document).ready(function() {
					$(".js-example-basic-multiple").select2();
				});

				

				function updateTable(){
					tab.innerHTML="<tr><th>Matricula</th><th>Nombre</th><th>¿Eliminar?</th><tr>";
					for(var i=0;i<alumnos.length;i++){
						tab.innerHTML=tab.innerHTML+"<tr><td>"+alumnos[i][0]+"</td><td>"+alumnos[i][1]+"</td><td><button class=\'alert\' type=\'button\' onclick=\'deleteAlumno("+i+");\'>Eliminar</button></td><tr>";
					}
				}

				function addAlumno(){
					
					var select = document.getElementById("alumno");
					var flag=false;
					for(var i=0;i<alumnos.length;i++){
						if(alumnos[i][0]==select.options[select.selectedIndex].value && alumnos[i][1]==select.options[select.selectedIndex].text){
							flag=true;
							break;
						}
					}

					if(!flag){
						alumnos.push([select.options[select.selectedIndex].value,select.options[select.selectedIndex].text]);
						send_alumnos.push([select.options[select.selectedIndex].value]);
						updateTable();						
					}else{
						alert("Alumno ya Agregado");
					}
				}

				function deleteAlumno(index){
					alumnos.splice(index, 1);
					send_alumnos.splice(index, 1);
					updateTable();
				}

				function sendData(){
					var hid = document.getElementById("hid");
					hid.value=send_alumnos;
				}

			</script>';
	}

	#EDICION DE TUTORIAS
	#------------------------------------
	#Se encarga de controlar la edicion de una tutoria
	public function editarTutoriaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarTutoriaModel($datosController, "sesion_tutoria");
		
		$respuesta_alumnos = Datos::obtenerAlumnosModel("alumnos");
		$respuesta_alumnosTutoria = Datos::obtenerAlumnosTutoriaModel($datosController,"sesion_alumnos");

		$st_alumnos="";
		for($i=0;$i<sizeof($respuesta_alumnos);$i++)
			$st_alumnos=$st_alumnos."<option value='".$respuesta_alumnos[$i]['matricula']."'>".$respuesta_alumnos[$i]['nombre']."</option>";

		echo '
		<input type="hidden" id="hid" name="hid">
		<input type="hidden" value="'.$respuesta["num_maestro"].'" name="num_maestro">

		<div class="box-content col-md-4">
          <h4 class="box-title"><h4>Detalles en la tutoria</h4></h4>
       
					<div class="form-group">
					<label  >Fecha:</label> 
					<input class="form-control" type="date" value="'.$respuesta["fecha"].'" name="fecha" required>
					</div> 
					 
						<div class="form-group">
						<label  >Hora:</label> 
						<input class="form-control" type="time" value="'.$respuesta["hora"].'" name="hora" required>
						</div> 
						 
						<div class="form-group">
						<label  >Tipo:</label> 
						<select class="form-control" id="tipos" name="tipo" required> 
							<option value="Grupal">Grupal</option>
							<option value="Individual">Individual</option>
						 </select>
						 </div> 
						 
						<div class="form-group">
						<label  >Tema:</label> 
						<input  class="form-control"type="text" value="'.$respuesta["tema"].'" name="tema" required></div> 
				 
					 <div class="form-group">
							 	<button class=" form-control btn btn-success btn-lg waves-effect waves-light" onclick="sendData();" type="submit">Actualizar</button></div> 
        </div>



					</table>
						
						


<div class="box-content col-md-4">
						 <h4>Selección de alumnos en tutoria</h4>
								<div class="form-group">
								 <label for="alumno"><h4>Nombre del Alumno:<h4></label>
								 <select name="alumno" class="form-control" id="alumno">
								 	'.$st_alumnos.'
								 </select>
								 </div>  
								 
								<div class="form-group">
							 	<button  type="button" class=" form-control btn btn-info btn-lg waves-effect waves-light" onclick="addAlumno()">Agregar Alumno</button></div> 

							  </div>
						<div class="box-content col-md-4">
						<h4>Alumnos en tutoria</h4>
						<table id="alumnos" width="50%" style=" border: 1px solid #ddd;
  padding: 8px;">
						</table>
					 </div>
			';

		echo'
		<script>
		/*
			$("#tipos").val("'.$respuesta["tipo"].'");
			$(document).ready(function() {
				$(".js-example-basic-multiple").select2();
				fillTable();

			});
*/
			var alumnos=[];
			var send_alumnos=[];
			var tab = document.getElementById("alumnos");
fillTable();

			function fillTable(){
				var resp_at = '.json_encode($respuesta_alumnosTutoria).';
				alumnos=resp_at;
				for(var i=0;i<alumnos.length;i++){
					send_alumnos[i]=alumnos[i][0];
				}
				updateTable();
			}

			function updateTable(){
				tab.innerHTML="<tr><th >Matricula</th><th>Nombre</th><th>¿Eliminar?</th><tr>";
				for(var i=0;i<alumnos.length;i++){
					tab.innerHTML=tab.innerHTML+"<tr><td >"+alumnos[i][0]+"</td><td>"+alumnos[i][1]+"</td><td><button class=\'alert\' type=\'button\' onclick=\'deleteAlumno("+i+");\'>Eliminar</button></td><tr>";
				}
			}

			function addAlumno(){
				
				var select = document.getElementById("alumno");
				var flag=false;
				for(var i=0;i<alumnos.length;i++){
					if(alumnos[i][0]==select.options[select.selectedIndex].value && alumnos[i][1]==select.options[select.selectedIndex].text){
						flag=true;
						break;
					}
				}

				if(!flag){
					alumnos.push([select.options[select.selectedIndex].value,select.options[select.selectedIndex].text]);
					send_alumnos.push([select.options[select.selectedIndex].value]);
					updateTable();						
				}else{
					alert("Alumno ya Agregado");
				}
			}

			function deleteAlumno(index){
				alumnos.splice(index, 1);
				send_alumnos.splice(index, 1);
				updateTable();
			}

			function sendData(){
				var hid = document.getElementById("hid");
				hid.value=send_alumnos;
			}
		</script>';


	}

	#ACTUALIZAR TUTORIAS
	#------------------------------------
	#Permite la actualizacion de la tutoria, al registrarlo en lab base de datos, realiza una eliminacion
	#completa de los alumnos para volver a realizar su insercion
	public function actualizarTutoriaController(){
		if(isset($_POST["hora"])){
			$datosController = array( "id"=>$_GET["id"],
							          "fecha"=>$_POST["fecha"],
				                      "hora"=>$_POST["hora"],
				                      "tipo"=>$_POST["tipo"],
				                      "tema"=>$_POST["tema"]);

			$respuesta = Datos::actualizarTutoriaModel($datosController, "sesion_tutoria");

			$respuesta = Datos::borrarAlumnosTutoriaModel($_GET["id"], "sesion_alumnos");
			
			$data = $_POST['hid'];

			$respuesta = Datos::registroAlumnosTutoriaModel($data, $_GET["id"], "sesion_alumnos");
		  	
			

			if($respuesta == "success"){
				
	echo '
	<script type="text/javascript">
                    window.location.replace("index.php?action=tutorias");
                  </script>';
			}
			else{
				
	echo '
	<script type="text/javascript">
                    window.location.replace("index.php?action=editar_tutoria&id='.$_GET["id"].');
                  </script>';
			}
		}
	}


	#VISTA MAESTROS REPORTES
	#------------------------------------
	#Genera la tabla de los reportes de maestros
	public function vistaReporteMaestrosController(){

		$respuesta = Datos::vistaMaestrosModel("maestros");

		foreach($respuesta as $row => $item){
			$item["nivel"]=$item["nivel"]==1?"SuperAdmin":"Maestro";
		echo'<tr>
				<td>'.$item["num_empleado"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["nombre_carrera"].'</td>
				<td>'.$item["nivel"].'</td>
			</tr>';
		}

		echo'<script>
				$(document).ready( function () {
				    $("#table_maestros").DataTable();
				} );		
			</script>';

	}


	#VISTA ALUMNOS REPORTES
	#------------------------------------
	#Genera la tabla de los reportes de alumnos
	public function vistaReporteAlumnosController(){

		$respuesta = Datos::vistaAlumnoModel("alumnos");

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["tutor"].'</td>
			</tr>';
		}


		echo'<script>
				$(document).ready( function () {
				    $("#table_alumnos").DataTable();
				} );		
			</script>';
	}

	#VISTA TUTORIAS REPORTES
	#------------------------------------
	#Genera la tabla de los reportes de tutorias
	public function vistaReporteTutoriasController(){
		if($_SESSION['validar']=="1")
			$respuesta = Datos::vistaTutoriasModel("sesion_tutoria");
		else
			$respuesta = Datos::vistaTutoriasNivelModel("sesion_tutoria",$_SESSION["num_empleado"]);		
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["hora"].'</td>
				<td>'.$item["tema"].'</td>
				<td>'.$item["tipo"].'</td>
			</tr>';
		}


		echo'<script>
				$(document).ready( function () {
				    $("#table_tutorias").DataTable();
				} );		
			</script>';
	}
}





?>