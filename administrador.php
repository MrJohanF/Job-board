
<?php session_start(); ?>

<?php 
if (!isset($_SESSION['a_idAdmin'])) {
  header("Location: ../admin_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="uploads/pix-favicon.ico">  
	<meta name="description" content="">
	<meta name="keywords" content="">
	<!-- CSS dependencies -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css" />
	<link rel="stylesheet" type="text/css" href="css/pix_style.css" />
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-style.css" />
	<link href="css/animations.min.css" rel="stylesheet" type="text/css" media="all" />
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/ie-fix.css" />
	<![endif]-->
  <title>TuJob</title>
	<style type="text/css" id="pix_page_style"></style>
</head>
<body>



<div class="pix_section pix_nav_menu normal pix-padding-v-20 pix_scroll_header" data-scroll-bg="#0f81d7" id="section_headers_1" style="display: block; background-repeat: repeat-x; padding-top: 0px; padding-bottom: 20px;">
  <div class="container">
   <div class="row">
    <div class="col-md-10 col-xs-12 pix-inner-col col-sm-10 column ui-droppable">
     <div class="pix-content">
      <nav class="navbar navbar-default pix-no-margin-bottom pix-navbar-default">
       <div class="container">
        <div class="navbar-header pix-lg-inline-block pix-float-none">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#pix-navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand logo-img logo-img-a pix-adjust-height" style="width: 20rem;" href="#"><img src="img/emplea_logo_azul.webp" alt="" class="img-responsive pix-logo-img"></a>
        </div>
       </div>
      </nav>
     </div>
    </div>
    <div class="col-md-2 col-xs-12 pix-inner-col col-sm-2 column ui-droppable">
     <div class="pix-content pix-adjust-height text-right mobile-text-left" id="pix-header-btn" style="margin-top: 25.5px;">
      <a href="php/logout_admin.php" class="btn small-text orange-bg pix-white pix-margin-top-10 pix-inline-block normal btn-md" style="background: rgb(15, 129, 215); border-color: rgb(15, 129, 215);">
       <span class="pix_edit_text"><span style="font-weight: 700;">CERRAR SESION</span></span>
      </a>
     </div>
    </div>
    <div class="col-md-10 col-xs-10 pix-inner-col col-sm-10 column ui-droppable">
     <div class="pix-content">
      <div class="collapse navbar-collapse pix-no-h-padding" id="pix-navbar-collapse">
       <ul class="nav navbar-nav pix-inline-block pix-float-none media-middle pix-header-nav pix-adjust-height" id="pix-header-nav" style="margin-top: 52.5px;">
<li><a href="#" class="pix-gray pix-nav-link  " data-toggle="undefined" style="color: rgb(46, 46, 46);">Bienvenido de nuevo ADMIN</a>
</li>
</ul>
      </div>
     </div>
    </div>
    <div class="col-md-2 col-xs-12 pix-inner-col col-sm-2 column ui-droppable">
     <div class="pix-content pix-adjust-height text-right mobile-text-left" style="margin-top: 24px;">
      <div class="pix-header-item">
       <a href="#" class="small-social">
        <i class="pixicon-facebook3 big-icon-50 pix-slight-white"></i>
       </a>
       <a href="#" class="small-social">
        <i class="pixicon-twitter4 big-icon-50 pix-slight-white"></i>
       </a>
       <a href="#" class="small-social">
        <i class="pixicon-instagram4 big-icon-50 pix-slight-white"></i>
       </a>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>



<div class="pix_section pix-padding-v-85 pix-showcase-2" id="section_content_1" style="display: block;">
  <div class="container">
   <div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12 column ui-droppable">
     <div class="pix-content text-center">
      <h1 class="pix-white text-center pix-no-margin-top secondary-font">
       <span class="pix_edit_text"><strong>TuJob!</strong></span>
      </h1>
      <p class="pix-blue-neon-2 big-text-20 text-center pix-margin-bottom-30">
       <span class="pix_edit_text">Panel de aministrador, gestiona, de la mejor manera!.</span>
      </p>
     </div>
    </div>
   </div>
  </div>
 </div><div class="pix_section pix-padding-v-85" id="section_features_1" style="display: block;">
  <div class="container">
   <div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12 column ui-droppable">
     <div class="pix-content text-center">
      <div class="pix-margin-bottom-15"><h6><span class="pix_edit_text"><br><br><span><font color="#818e9b"><span style="font-size: 12px; white-space: nowrap; background-color: rgb(242, 246, 250);"><b>Realiza cambios rapidamente</b></span></font></span></span></h6></div>
      <h2 class="pix-navy-blue pix-no-margin-top secondary-font">
        <span class="pix_edit_text">Selecciona un aplicativo.
        </span>
      </h2>
      <p class="pix-navy-blue-2 big-text pix-margin-bottom-50">
       <span class="pix_edit_text">Presiona click para realizar edicion en cada una de las caracteristicas.</span>
      </p>
     </div>
    </div>
    <div class="col-xs-12 col-sm-3 column ui-droppable col-md-4">
     <div onclick="location.href='admin_aprobar.php'" style="cursor: pointer;" class="pix-content text-center pix-border-box-3-light-blue pix-padding-v-30 pix-margin-v-10 pix-padding-h-10">
      <div class="pix-margin-bottom-20">
       <i class="pixicon-money210" style="color: rgb(15, 129, 215); font-size: 60px;"></i>
      </div>
      <h5 class="pix-navy-blue secondary-font">
       <span class="pix_edit_text">Aprobar</span>
      </h5>
      <p class="pix-navy-blue-2 text-center pix-margin-bottom-10">
       <span class="pix_edit_text">Aprueba cuentas de Candidatos y empresas</span>
      </p>
     </div>
    </div>
    <div class="col-xs-12 col-sm-3 column ui-droppable col-md-4">
     <div style="cursor: pointer;" class="pix-content text-center pix-border-box-3-light-blue pix-padding-v-30 pix-margin-v-10 pix-padding-h-10">
      <div class="pix-margin-bottom-20">
       <i class="pixicon-check" style="color: rgb(15, 129, 215); font-size: 60px;"></i>
      </div>
      <h5 class="pix-navy-blue secondary-font">
       <span class="pix_edit_text">Verificacion</span>
      </h5>
      <p class="pix-navy-blue-2 text-center pix-margin-bottom-10">
       <span class="pix_edit_text">Verfica usuarios rapidamente</span>
      </p>
     </div>
    </div>
    <div class="col-xs-12 col-sm-3 column ui-droppable col-md-4">
     <div onclick="location.href='admin_edit.php'" style="cursor: pointer;" class="pix-content text-center pix-border-box-3-light-blue pix-padding-v-30 pix-margin-v-10 pix-padding-h-10">
      <div class="pix-margin-bottom-20">
       <i class="pixicon-tools" style="color: rgb(15, 129, 215); font-size: 60px;"></i>
      </div>
      <h5 class="pix-navy-blue secondary-font">
       <span class="pix_edit_text">Editar</span>
      </h5>
      <p class="pix-navy-blue-2 text-center pix-margin-bottom-10">
       <span class="pix_edit_text">Editar informacion como ofertas y cuentas de perfil</span>
      </p>
     </div>
    </div>
    
   </div>
  </div>
 </div>





<!-- Javascript -->
<script src="js/jquery-1.11.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/velocity.min.js"></script>
<script src="js/velocity.ui.min.js"></script>
<script src="js/appear.min.js" type="text/javascript"></script>
<script src="js/animations.js" type="text/javascript"></script>
<script src="js/plugins.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.min.js" type="text/javascript"></script>
<script src="js/custom.js"></script>
</body>
</html>