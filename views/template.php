<?php 
 
//session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
#alumnos {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#alumnos td, #alumnos th {
  border: 1px solid #ddd;
  padding: 8px;
}

#alumnos tr:nth-child(even){background-color: #f2f2f2;}

#alumnos tr:hover {background-color: #ddd;}

#alumnos th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: 
#4682B4
;
  color: white;
}
</style>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ESCUELA</title>

  <!-- Main Styles -->
  <link rel="stylesheet" href="assets/styles/style.min.css">

  <!-- mCustomScrollbar -->
  <link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

  <!-- Waves Effect -->
  <link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

  <!-- Sweet Alert -->
  <link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
  
  <!-- Data Tables -->
  <link rel="stylesheet" href="assets/plugin/datatables/media/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="assets/plugin/datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
 
<!-- Waves Effect -->
  <link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

  <!-- Sweet Alert -->
  <link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">
  
  <!-- FlexDatalist -->
  <link rel="stylesheet" href="assets/plugin/flexdatalist/jquery.flexdatalist.min.css">

  <!-- Popover -->
  <link rel="stylesheet" href="assets/plugin/popover/jquery.popSelect.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugin/select2/css/select2.min.css">

  <!-- Timepicker -->
  <link rel="stylesheet" href="assets/plugin/timepicker/bootstrap-timepicker.min.css">

  <!-- Touch Spin -->
  <link rel="stylesheet" href="assets/plugin/touchspin/jquery.bootstrap-touchspin.min.css">

  <!-- Colorpicker -->
  <link rel="stylesheet" href="assets/plugin/colorpicker/css/bootstrap-colorpicker.min.css">

  <!-- Datepicker -->
  <link rel="stylesheet" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css">

  <!-- DateRangepicker -->
  <link rel="stylesheet" href="assets/plugin/daterangepicker/daterangepicker.css">

  <!-- Color Picker -->
  <link rel="stylesheet" href="assets/color-switcher/color-switcher.min.css">


	<?php

 
if(isset($_SESSION['validar']) && $_SESSION["validar"]!="na"){
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="main-menu">
  <header class="header">
    <a href="#" class="logo">ESCUELA</a>
    <button type="button" class="button-close fa fa-times js__menu_close"></button>
    <div class="user">
      <a href="#" class="avatar"><img src="images/avatar.png" height="80" alt=""><span class="status online"></span></a>
      <h5 class="name"><a href="#">Usuario </a></h5>
      <h5 class="position">Activo</h5>
      <!--  
      <div class="control-wrap js__drop_down">
        <i class="fa fa-caret-down js__drop_down_button"></i>
        <div class="control-list">
          <div class="control-item"><a href="profile.html"><i class="fa fa-user"></i> Profile</a></div>
          <div class="control-item"><a href="#"><i class="fa fa-gear"></i> Settings</a></div>
          <div class="control-item"><a href="#"><i class="fa fa-sign-out"></i> Log out</a></div>
        </div>
        
      </div>
   /.control-wrap -->
    </div>
    <!-- /.user -->
  </header>
  <!-- /.header -->
  <div class="content">

    <div class="navigation">
     
      <!-- /.title -->
      <?php include "modules/navegacion.php"; ?>
    
      <!-- /.menu js__accordion -->
    </div>
    <!-- /.navigation -->
  </div>
  <!-- /.content -->
</div>
<!-- /.main-menu -->
 
<div class="fixed-navbar">
<!--
  <div class="pull-left">
    <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
    <h1 class="page-title">SISTEMA DE HOTEL </h1>
   
  </div> 
  <div class="pull-right">
    <div class="ico-item">
      <a href="#" class="ico-item fa fa-search js__toggle_open" data-target="#searchform-header"></a>
      <form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="fa fa-search button-search" type="submit"></button></form>
 
    </div> 
    <div class="ico-item fa fa-arrows-alt js__full_screen"></div>
    
    <div class="ico-item toggle-hover js__drop_down ">
      <span class="fa fa-th js__drop_down_button"></span>
      <div class="toggle-content">
        <ul>
          <li><a href="#"><i class="fa fa-github"></i><span class="txt">Github</span></a></li>
          <li><a href="#"><i class="fa fa-bitbucket"></i><span class="txt">Bitbucket</span></a></li>
          <li><a href="#"><i class="fa fa-slack"></i><span class="txt">Slack</span></a></li>
          <li><a href="#"><i class="fa fa-dribbble"></i><span class="txt">Dribbble</span></a></li>
          <li><a href="#"><i class="fa fa-amazon"></i><span class="txt">Amazon</span></a></li>
          <li><a href="#"><i class="fa fa-dropbox"></i><span class="txt">Dropbox</span></a></li>
        </ul>
        <a href="#" class="read-more">More</a>
      </div>
      
    </div>
 
    <a href="#" class="ico-item fa fa-envelope notice-alarm js__toggle_open" data-target="#message-popup"></a>
    <a href="#" class="ico-item pulse"><span class="ico-item fa fa-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a>
    <a href="#" class="ico-item fa fa-power-off js__logout"></a>
  </div> 
  -->
</div> 

<div id="notification-popup" class="notice-popup js__toggle" data-space="75">
  <h2 class="popup-title">Your Notifications</h2>
   
  <div class="content">
    <ul class="notice-list">
      <li>
        <a href="#">
          <span class="avatar"><img src="images/yu.jpeg" alt=""></span>
          <span class="name">John Doe</span>
          <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
          <span class="time">10 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
          <span class="name">Anna William</span>
          <span class="desc">Like your post: “Facebook Messenger”</span>
          <span class="time">15 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
          <span class="name">Update Status</span>
          <span class="desc">Failed to get available update data. To ensure the please contact us.</span>
          <span class="time">30 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
          <span class="name">Jennifer</span>
          <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
          <span class="time">45 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
          <span class="name">Michael Zenaty</span>
          <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
          <span class="time">50 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
          <span class="name">Simon</span>
          <span class="desc">Like your post: “Facebook Messenger”</span>
          <span class="time">1 hour</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar bg-violet"><i class="fa fa-flag"></i></span>
          <span class="name">Account Contact Change</span>
          <span class="desc">A contact detail associated with your account has been changed.</span>
          <span class="time">2 hours</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
          <span class="name">Helen 987</span>
          <span class="desc">Like your post: “Facebook Messenger”</span>
          <span class="time">Yesterday</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
          <span class="name">Denise Jenny</span>
          <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
          <span class="time">Oct, 28</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
          <span class="name">Thomas William</span>
          <span class="desc">Like your post: “Facebook Messenger”</span>
          <span class="time">Oct, 27</span>
        </a>
      </li>
    </ul>
 
    <a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
  </div>
 
</div>
 

<div id="message-popup" class="notice-popup js__toggle" data-space="75">
  <h2 class="popup-title">Recent Messages<a href="#" class="pull-right text-danger">New message</a></h2>
  <!-- /.popup-title -->
  <div class="content">
    <ul class="notice-list">
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
          <span class="name">John Doe</span>
          <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
          <span class="time">10 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
          <span class="name">Harry Halen</span>
          <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
          <span class="time">15 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
          <span class="name">Thomas Taylor</span>
          <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
          <span class="time">30 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
          <span class="name">Jennifer</span>
          <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
          <span class="time">45 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
          <span class="name">Helen Candy</span>
          <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
          <span class="time">45 min</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
          <span class="name">Anna Cavan</span>
          <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
          <span class="time">1 hour ago</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar bg-success"><i class="fa fa-user"></i></span>
          <span class="name">Jenny Betty</span>
          <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
          <span class="time">1 day ago</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
          <span class="name">Denise Peterson</span>
          <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
          <span class="time">1 year ago</span>
        </a>
      </li>
    </ul>
    <!-- /.notice-list -->
    <a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
  </div>
  <!-- /.content -->
</div>
<!-- /#message-popup -->
<div id="wrapper">
  <div class="main-content">
    <div class="row small-spacing">
      <div class="col-xs-12">
        <?php 
        $mvc = new MvcController();
        $mvc -> enlacesPaginasController();
 ?>
      </div>
     
    </div>
    <!-- /.row small-spacing -->    
    <footer class="footer">
       
    </footer>
  </div>
  <!-- /.main-content -->
</div><!--/#wrapper -->
</body>
<?php 

//$mvc = new MvcController();
//$mvc -> enlacesPaginasController();

 ?>
    
</div>
  
     <?php
   
}else{ 
?>
<div id="single-wrapper">
  
    <?php
$mvc = new MvcController();
$mvc -> enlacesPaginasController(); 
} 
 
?>
  <!-- /.frm-single -->
</div><!--/#single-wrapper -->


   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="assets/script/html5shiv.min.js"></script>
    <script src="assets/script/respond.min.js"></script>
  <![endif]-->
  <!-- 
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="assets/scripts/jquery.min.js"></script>
  <script src="assets/scripts/modernizr.min.js"></script>
  <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="assets/plugin/nprogress/nprogress.js"></script>
  <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
  <script src="assets/plugin/waves/waves.min.js"></script>
  <!-- Full Screen Plugin -->
  <script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

  <!-- Data Tables -->
  <script src="assets/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="assets/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
  <script src="assets/scripts/datatables.demo.min.js"></script>

  <script src="assets/scripts/main.min.js"></script>


 
  <!-- Timepicker -->
  <script src="assets/plugin/timepicker/bootstrap-timepicker.min.js"></script>

  <!-- Colorpicker -->
  <script src="assets/plugin/colorpicker/js/bootstrap-colorpicker.min.js"></script>

  <!-- Datepicker -->
  <script src="assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>

  <!-- Moment -->
  <script src="assets/plugin/moment/moment.js"></script>

  <!-- DateRangepicker -->
  <script src="assets/plugin/daterangepicker/daterangepicker.js"></script>

  <!-- Maxlength -->
  <script src="assets/plugin/maxlength/bootstrap-maxlength.min.js"></script>

  <!-- Demo Scripts -->
  <script src="assets/scripts/form.demo.min.js"></script>
 
  <script src="assets/color-switcher/color-switcher.min.js"></script>
</body>
 
 

</html>