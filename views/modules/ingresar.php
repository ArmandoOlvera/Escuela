 <?php 
//session_start();
 
 ?>
 <form method="post" class="frm-single">
    <div class="inside">
      <div class="title"><strong>Sistema</strong>Escolar</div>
      <!-- /.title -->
      <div class="frm-title">Inicio de Sessión</div>
      <!-- /.frm-title -->
      <div class="frm-input"><input type="email" placeholder="Email"  id="emailIngreso" name="emailIngreso" class="frm-inp" value="superadmin@upv.edu.mx"><i class="fa fa-user frm-ico"></i></div>
      <!-- /.frm-input -->
      <div class="frm-input"><input type="password" placeholder="Password"  name="passwordIngreso" id="passwordIngreso" class="frm-inp" value="superadmin"><i class="fa fa-lock frm-ico"></i></div>
      <!-- /.frm-input -->
      <div class="clearfix margin-bottom-20">
       
      </div>
      <!-- /.clearfix -->
      <button type="submit" class="frm-submit">Entrar<i class="fa fa-arrow-circle-right"></i></button>
      <div class="row small-spacing">
        
 
      <!-- /.footer -->
    </div>
    <!-- .inside -->
  </form>
User: superadmin@upv.edu.mx <br> pass: superadmin<br><br><br>
<span>¿Eres un alumno y quieres reservar una tutoria?</span>
 <a href="index.php?action=registro_tutoria" class="frm-submit"><center>Reservar Tutoria<i class="fa fa-arrow-circle-right"></i></center></a>


 
 

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
 
<?php
 
$ingreso = new MvcController();
$ingreso -> ingresoMaestroController();

if(isset($_SESSION["validar"])){
//$_SESSION["validar"]="na";

}

?>