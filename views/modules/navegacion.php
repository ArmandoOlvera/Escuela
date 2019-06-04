<script type="text/javascript">
	function salir(){
		window.location.href = "index.php?action=ingresar"; 
	}
</script>
<?php
//session_start();
if(!isset($_SESSION['validar'])){
//do nothing
}else{


if($_SESSION["validar"]=="na"){
?>
<nav>
	<ul>
		
	</ul>
</nav>
<?php
}elseif ($_SESSION["validar"]=="1") {
?>
 <h5 class="title">MENU ADMIN</h5>
<ul class="menu js__accordion">
          
        <li>
          <a class="waves-effect" href="index.php?action=reportes"><i class="menu-icon fa fa-book"></i><span>Reportes</span></a>
        </li>
        <li>
          <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-object-group"></i><span>Grupos</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="index.php?action=registro_grupo">Registro Grupos</a></li>
            <li><a href="index.php?action=grupos">Ver Grupos</a></li> 
          </ul>
          <!-- /.sub-menu js__content -->
        </li>
          <li>
          <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-suitcase"></i><span>Materias</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="index.php?action=registro_materias">Registro Materias</a></li>
            <li><a href="index.php?action=materias">Ver Materias</a></li> 
          </ul>
          <!-- /.sub-menu js__content -->
        </li>
        <li>
          <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-assistive-listening-systems"></i><span>Tutorias</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="index.php?action=registro_tutoria">Registro Tutorias</a></li>
            <li><a href="index.php?action=tutorias">Ver Tutorias</a></li> 
          </ul>
          <!-- /.sub-menu js__content -->
        </li>
        <li>
          <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user"></i><span>Alumnos</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="index.php?action=registro_alumno">Registro Alumnos</a></li>
            <li><a href="index.php?action=alumnos">Ver Alumnos</a></li> 
          </ul>
          <!-- /.sub-menu js__content -->
        </li>
        <li>
          <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-users"></i><span>Maestros</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="index.php?action=registro_maestro">Registro Maestros</a></li>
            <li><a href="index.php?action=maestros">Ver Maestros</a></li> 
          </ul>
          <!-- /.sub-menu js__content   plus-->
        </li>
        <li>
          <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-university"></i><span>Carreras</span><span class="menu-arrow fa fa-angle-down"></span></a>
          <ul class="sub-menu js__content">
            <li><a href="index.php?action=registro_carrera" >Registro Carreras</a></li>
            <li><a href="index.php?action=carreras">Ver Carreras</a></li> 
          </ul>
          <!-- /.sub-menu js__content -->
        </li>
        <li>
          <a class="waves-effect"  href="index.php?action=salir"   onclick="salir();" ><i class="menu-icon fa fa-sign-out"></i><span>Salir</span></a>
        </li>



</ul>
 

<?php
}elseif ($_SESSION["validar"]=="0") {
 
?>
 <h5 class="title">MENU MAESTRO</h5>
<ul class="menu js__accordion">
        <li>
          <a class="waves-effect" href="index.php?action=registroreserva"><i class="menu-icon fa fa-book"></i><span>Realizar Reserva</span></a>
        </li>
        <li>
          <a class="waves-effect" href="index.php?action=verhabitaciones"><i class="menu-icon fa fa-home"></i><span>Buscar Habitaciones</span></a>
        </li>
        <li>
          <a class="waves-effect" href="index.php?action=verreservas"><i class="menu-icon fa fa-building-o"></i><span>Buscar Reserva</span></a>
        </li>
        <li>
          <a class="waves-effect" href="index.php?action=habitaciones2"><i class="menu-icon fa fa-eye"></i><span>Ver Habitaciones</span></a>
        </li>
         <li>
          <a class="waves-effect" href="index.php?action=reservas2"><i class="menu-icon fa fa-exchange"></i><span>Moficiar/Borrar Reservas</span></a>
        </li>
        <li>
          <a class="waves-effect"  href="index.php?action=salir"   onclick="salir();" ><i class="menu-icon fa fa-sign-out"></i><span>Salir</span></a>
        </li>

</ul>
 

<?php
} }
?>
