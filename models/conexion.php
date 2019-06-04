<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=tutorias","root","tacosconsalsaverde123");
		return $link;


	}

}

?>
