<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/extras.css">
  <script src="node_modules/jquery/src/jquery.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="uploads/pix-favicon.ico">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!-- CSS dependencies -->
  <link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css" />
  <link rel="stylesheet" type="text/css" href="css/pix_style.css" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <link rel="stylesheet" type="text/css" href="css/font-style.css" />
  <link href="css/animations.min.css" rel="stylesheet" type="text/css" media="all" />

  <link href="/css/awesomefont/css/all.min.css" rel="stylesheet"> 



  <!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/ie-fix.css" />
	<![endif]-->
  <title>TuJob</title>
  <style type="text/css" id="pix_page_style"></style>
</head>

<body>
  <div class="pix_section pix_nav_menu normal none pix-over-header" data-scroll-bg="#ffffff" id="section_headers_1" style="display: block; background-repeat: repeat-x; padding-top: 0px; padding-bottom: 0px;">
    <div class="container">
      <div class="row">
        <div style="margin-top: 5rem;">
          <a href="administrador.php" class="pix-link-icon">
            <i class="pixicon-arrowleft" style="color: rgb(255, 255, 255); font-size: 40px;"></i></a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="pix_section pix-padding-v-85 pix-app-1" data-bg-img="url(&quot;https://pixfort.com/items/1/images/app/pattern-bg.png&quot;)" style="background-image: url(&quot;https://pixfort.com/items/1/images/app/pattern-bg.png&quot;); background-color: rgb(15, 93, 215); background-repeat: repeat-x; padding-top: 195px; padding-bottom: 85px;" id="section_2" data-pix-offset="110">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 column ui-droppable col-md-12" style="display: block;">
          <div class="pix-content pix-padding-top-10" style="background-repeat: repeat-x; padding: 0px; margin: 0px; text-align: center;">
            <div class="pix-margin-bottom-20">

            </div>
            <h2 class="pix-white pix-no-margin-top secondary-font pix-small-width-text">
              <span class="pix_edit_text"><strong>Elimina y Crea</strong><br><span><strong>Planes personalizados! &nbsp;</strong></span><span><strong></strong></span></span>
            </h2>
            <div>
              <p class="pix-blue-neon-2 pix-margin-bottom-30 pix-padding-top-10 ">
                <span class="pix_edit_text">Aca podras crear planes personalizados ajustados a tus necesidades que se ajusten a tus clientes.</span>
              </p>
            </div>

            <div class="pix-padding-v-30">



            </div>
          </div>
        </div>

      </div>
    </div>
  </div>





  <div class="pix_section pix-padding-v-40" id="section_3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 column ui-droppable">
          <div class="pix-content pix-padding-bottom-30" style="background-repeat: repeat-x; padding: 0px 0px 30px; margin: 0px; text-align: left;">
            <h2 class="pix-black-gray-dark text-center pix-no-margin-top secondary-font">
              <span class="pix_edit_text"><span><span style="font-weight: 700;">Custom memberships.</span></span></span>
            </h2>
            <h5 class="pix-black-gray-light text-center">

              <div>

                <a onclick="btn_new_membership()" href="#popup"><i class="fas fa-tools"> Crear una nueva</i></a>

              </div>

            </h5>


            <h5 class="pix-black-gray-light text-center">

              <table cellspacing="0" cellpadding="0">
                <tr>
                  <th style="width:15px; text-align: center;">ID</th>
                  <th>Nombre</th>
                  <th>Of. limite</th>
                  <th>Of. confidenciales</th>
                  <th>Of. urgentes</th>
                  <th>Cons. basedatos</th>
                  <th>Borrar</th>


                </tr>

                <?php include "php/db.php" ?>

                <?php

                $table_empresa = "SELECT * FROM `membresia_empresa`";

                $resul_table_empresa = mysqli_query($connection, $table_empresa);
                if (!$resul_table_empresa) {
                  die("QUERY FAILED" . mysqli_error($connection));
                }

                while ($row = mysqli_fetch_array($resul_table_empresa)) {
                  $idMembresia = $row['idMembresia'];
                  $mem_nombre = $row['mem_nombre'];
                  $mem_ofertas_limite = $row['mem_ofertas_limite'];
                  $mem_ofertas_confidenciales = $row['mem_ofertas_confidenciales'];
                  $mem_ofertas_urgentes = $row['mem_ofertas_urgentes'];
                  $mem_consultas_basedatos = $row['mem_consultas_basedatos'];

                ?>


                  <tr>
                    <td><?php echo $idMembresia ?></td>
                    <td><?php echo $mem_nombre ?></td>
                    <td><?php echo $mem_ofertas_limite ?></td>
                    <td><?php echo $mem_ofertas_confidenciales ?></td>
                    <td> <?php echo $mem_ofertas_urgentes ?> </td>
                    <td> <?php echo $mem_consultas_basedatos ?> </td>

                    <td>
                      <a onclick="btn_delete_membresia(<?php echo $idMembresia ?>)" href="#"><i style="color: red; width: 100%; text-align: center;" class="far fa-trash-alt"></i></a>
                    </td>



                  </tr>



                <?php
                }
                ?>
                <script>
                  function btn_delete_membresia(id) {

                    var ob = {
                      db_idMembresia: id
                    }

                    $.ajax({
                      type: "POST",
                      url: "../php/modelo_delete_membresia_datos.php",
                      data: ob,
                      beforeSend: function(objeto) {

                      },
                      success: function(data) {
                          alert(data);

                        setTimeout(function() {
                          location.href ="admin_edit.php";
                        }, 1000);
                      }
                    })
                  }
                </script>

              </table>


            </h5>



          </div>
        </div>


      </div>
    </div>
  </div>



  <script>
    function btn_guardar_membresia_new() {
      var db_idMembresia = $("#db_idMembresia").val();
      var db_mem_nombre = $("#db_mem_nombre").val();
      var db_mem_ofertas_limite = $("#db_mem_ofertas_limite").val();
      var db_mem_ofertas_confidenciales = $("#db_mem_ofertas_confidenciales").val();
      var db_mem_ofertas_urgentes = $("#db_mem_ofertas_urgentes").val();
      var db_mem_consultas_basedatos = $("#db_mem_consultas_basedatos").val();

      var ob = {
        db_idMembresia: db_idMembresia,
        db_mem_nombre: db_mem_nombre,
        db_mem_ofertas_limite: db_mem_ofertas_limite,
        db_mem_ofertas_confidenciales: db_mem_ofertas_confidenciales,
        db_mem_ofertas_urgentes: db_mem_ofertas_urgentes,
        db_mem_consultas_basedatos: db_mem_consultas_basedatos,
      }


      $.ajax({
        type: "POST",
        url: "../php/modelo_guardar_membresia_datos.php",
        data: ob,
        beforeSend: function(objeto) {

        },
        success: function(data) {
          alert(data);
        }
      })
    }
  </script>






  <script>
    function btn_new_membership() {
      var ob = {

      }

      $.ajax({
        type: "POST",
        url: "../php/vista_new_membresia_datos.php",
        data: ob,
        beforeSend: function(objeto) {

        },
        success: function(data) {
          $("#panel_editar").html(data);
        }
      })
    }
  </script>



  <div class="pix_section pix-padding-v-65 pix-padding-bottom-30" id="section_4">
    <div class="container">
      <div class="row">


        <div class="col-md-7 col-sm-7 col-xs-7 column ui-droppable">
          <div class="pix-content pix-padding-v-30">
            <span class="pix-black-gray-light"><span class="pix_edit_text"><span style="font-weight: 700;">Zearix&nbsp;</span>Copyright © 2020 All Rights Reserved</span></span>
          </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-5 column ui-droppable">
          <div class="pix-content pix-padding-v-20 text-right">
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

  <div class="popup" id="popup">
    <div class="popup__content">
      <div class="popup__right">
        <a href="#main" class="popup__close">&times;</a>
        <form action="admin_edit.php" method="post" id="panel_editar" class="form-login">
        </form>
        <div id="panel_editar_respuesta" class="popup__right">
        </div>
      </div>
    </div>
  </div>


</body>

</html>