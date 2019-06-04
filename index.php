<?php 
session_start();
require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "controllers/controller.php";
if (isset($_SESSION['validar'])){
   echo "La sesión existe ...";
} else{
  $_SESSION["validar"] = "na"; 
}
 
$mvc = new MvcController();
$mvc -> pagina(); 
?>