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
  <title>tuJob</title>
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
              <span class="pix_edit_text"><strong>Aprueba y Desactiva</strong><br><span><strong>Empresas! &amp;&nbsp;</strong></span><span><strong>Candidatos!</strong></span></span>
            </h2>
            <div>
              <p class="pix-blue-neon-2 pix-margin-bottom-30 pix-padding-top-10 ">
                <span class="pix_edit_text">En esta seccion puedes aprobar cuentas de candidatos y cuentas de empresa, encontraras 2 tablas y buscador el cual te facilitara la busqueda del candidato y la empresa.</span>
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
              <span class="pix_edit_text"><span><span style="font-weight: 700;">Empresas.</span></span></span>
            </h2>
            <h5 class="pix-black-gray-light text-center">

              <table cellspacing="0" cellpadding="0">
                <tr>
                  <th style="width:15px; text-align: center;">ID</th>
                  <th>Compañia</th>
                  <th>Nit</th>
                  <th>Telefono</th>
                  <th style="width: 8rem;">Memb</th>
                  <th style="width: 8rem;">Aprob</th>
                  <th style="width: 8rem;">Serv</th>
                  <th style="width: 8rem;">Sello</th>
                  <th style="width: 2rem;">edit</th>
        
                </tr>

                <?php include "php/db.php" ?>

                <?php
                $checked = "";
                $verify_company = "";


                $table_empresa = "SELECT * FROM empresa INNER JOIN membresia_empresa ON empresa.membresia = membresia_empresa.idMembresia";

                $resul_table_empresa = mysqli_query($connection, $table_empresa);
                if (!$resul_table_empresa) {
                  die("QUERY FAILED" . mysqli_error($connection));
                }

                while ($row = mysqli_fetch_array($resul_table_empresa)) {
                  $db_idEmpresa = $row['idEmpresa'];
                  $db_nombre_empresa = $row['nombre_empresa'];
                  $db_nit_empresa = $row['nit_empresa'];
                  $db_telefono_empresa = $row['telefono_empresa'];
                  $db_aprobado_empresa = $row['aprobado'];
                  $db_verificado_empresa = $row['verificado_empresa'];
                  $db_idMembresia = $row['idMembresia'];
                  $db_servicios = $row['servicios'];



                  if ($db_aprobado_empresa == 1) {
                    $checked = "active";
                  } else {
                    $checked = "";
                  }
                  if ($db_verificado_empresa == 1) {
                    $verify_company = "active";
                  } else {
                    $verify_company = "";
                  }
                  if ($db_servicios == 1) {
                    $services = "active";
                  } else {
                    $services = "";
                  }

                ?>



                  <tr>
                    <td><?php echo $db_idEmpresa ?></td>
                    <td><?php echo $db_nombre_empresa ?></td>
                    <td><?php echo $db_nit_empresa ?></td>
                    <td><?php echo $db_telefono_empresa ?></td>
                    <td>
                      <select onchange="update_membresia(<?php echo $db_idEmpresa ?>, this)">

                        <?php


                        $request_mem = "SELECT * FROM membresia_empresa ORDER BY idMembresia = $db_idMembresia DESC";

                        $resul_mem = mysqli_query($connection, $request_mem);
                        if (!$resul_mem) {
                          die("QUERY FAILED" . mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_array($resul_mem)) {
                          $idMembresia = $row['idMembresia'];
                          $membresia = $row['mem_nombre'];

                        ?>

                          <option value="<?php echo $idMembresia ?>"><?php echo $membresia ?></option>
                        <?php
                        }
                        ?>


                      </select>
                    </td>


                    <script>
                      function update_membresia(id, select) {
                        var mem = $(select).val();
                        $.ajax({
                          url: "../php/update_membresia.php?id=" + id + "&membresia=" + mem
                        })
                      }
                    </script>


                    <script>
                      function approveCompany(result1, b) {

                        if (b.classList == "toggle-btn active") {
                          b.classList = "toggle-btn";
                          r = 0
                          $.ajax({
                            url: "../php/update_status.php?var=" + result1 + "&var2=" + r
                          })

                        } else {
                          b.classList = "toggle-btn active";

                          r = 1;
                          $.ajax({
                            url: "../php/update_status.php?var=" + result1 + "&var2=" + r
                          })
                        }
                      }
                    </script>

                    <td>
                      <div id="<?php echo $db_idEmpresa ?>" class="toggle-btn <?php echo $checked ?>" onclick="approveCompany(<?php echo $db_idEmpresa ?>, this)">
                        <div class="inner-circle"></div>
                      </div>
                    </td>





                    <td>
                      <div id="servicios_<?php echo $db_idEmpresa ?>" class="toggle-btn <?php echo $services ?>" onclick="updateServices(<?php echo $db_idEmpresa ?>, this)">
                        <div class="inner-circle"></div>
                      </div>
                    </td>


                    <script>
                      function updateServices(result1, b) {

                        if (b.classList == "toggle-btn active") {
                          b.classList = "toggle-btn";
                          r = 0
                          $.ajax({
                            url: "../php/update_services.php?var=" + result1 + "&var2=" + r
                          })

                        } else {
                          b.classList = "toggle-btn active";

                          r = 1;
                          $.ajax({
                            url: "../php/update_services.php?var=" + result1 + "&var2=" + r
                          })
                        }
                      }
                    </script>



                    <script>
                      function verifyCompany(result1, b) {

                        if (b.classList == "toggle-btn active") {
                          b.classList = "toggle-btn";
                          r = 0
                          $.ajax({
                            url: "../php/verify_status.php?var=" + result1 + "&var2=" + r
                          })

                        } else {
                          b.classList = "toggle-btn active";

                          r = 1;
                          $.ajax({
                            url: "../php/verify_status.php?var=" + result1 + "&var2=" + r,
                            success: function(data) {
                              alert(data);
                            }
                          })
                        }
                      }
                    </script>


                    <td>
                      <div id="<?php echo $db_idEmpresa ?>" class="toggle-btn <?php echo $verify_company ?>" onclick="verifyCompany(<?php echo $db_idEmpresa ?>, this)">
                        <div class="inner-circle"></div>
                      </div>
                    </td>

                    <td>
                      <a onclick="btn_editar(<?php echo $db_idEmpresa ?>)" href="#popup"><i class="fas fa-tools"></i></a>
                    </td>



                  </tr>



                <?php
                }
                ?>


              </table>
            </h5>

            <script>
              function btn_editar(id_empresa) {
                var ob = {
                  id_empresa: id_empresa
                }

                $.ajax({
                  type: "POST",
                  url: "../php/vista_editar_datos.php",
                  data: ob,
                  beforeSend: function(objeto) {

                  },
                  success: function(data) {
                    $("#panel_editar").html(data);
                  }
                })
              }
            </script>

            <script>
              function btn_guardar_edicion() {
                var idEmpresa = $("#idEmpresa_ed").val();
                var nombre_empresa = $("#nombre_empresa_ed").val();
                var telefono_empresa = $("#telefono_empresa_ed").val();
                var ciudad_empresa = $("#ciudad_empresa_ed").val();
                var nit_empresa = $("#nit_empresa_ed").val();
                var direccion_empresa = $("#direccion_empresa_ed").val();
                var nombre_contacto_empresa = $("#nombre_contacto_empresa_ed").val();
                var email_empresa = $("#email_empresa_ed").val();
                var numero_empleados = $("#numero_empleados_ed").val();
                var descripcion_empresa = $("#descripcion_empresa_ed").val();
                var beneficios_empresa = $("#beneficios_empresa_ed").val();
                var membresia = $("#membresia_ed").val();

                var ob = {
                  idEmpresa: idEmpresa,
                  nombre_empresa: nombre_empresa,
                  telefono_empresa: telefono_empresa,
                  ciudad_empresa: ciudad_empresa,
                  direccion_empresa: direccion_empresa,
                  nombre_contacto_empresa: nombre_contacto_empresa,
                  email_empresa: email_empresa,
                  numero_empleados: numero_empleados,
                  beneficios_empresa: beneficios_empresa,
                  membresia: membresia,
                  descripcion_empresa: descripcion_empresa,
                  nit_empresa: nit_empresa
                }


                $.ajax({
                  type: "POST",
                  url: "../php/modelo_guardar_datos.php",
                  data: ob,
                  beforeSend: function(objeto) {

                  },
                  success: function(data) {
                    $("#panel_editar_respuesta").html(data);

                    setTimeout(function() {
                      $("#panel_editar_respuesta").html("");
                    }, 2000);
                  }
                })
              }
            </script>





            <h5 class="pix-black-gray-light text-center">


            </h5>
          </div>
        </div>
        <div class="col-md-12 col-xs-12 col-sm-12 column ui-droppable">
          <div class="pix-content pix-padding-bottom-30">
            <h2 class="pix-black-gray-dark text-center pix-no-margin-top secondary-font">
              <span class="pix_edit_text"><span style="font-weight: 700;">Candidatos.</span></span>
            </h2>
            <h5 class="pix-black-gray-light text-center">
              <table cellspacing="0" cellpadding="0">
                <tr>
                  <th style="width:15px; text-align: center;">ID</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>telefono</th>

                  <th style="width: 8rem;">Aprob</th>
                  <th style="width: 8rem;">Sello</th>
                  <th style="width: 2rem;">edit</th>
                </tr>


                <?php
                $checked_candidato = "";
                $verify_candidato = "";


                $table_candidato = "SELECT * FROM candidato";

                $resul_table_candidato = mysqli_query($connection, $table_candidato);
                if (!$resul_table_empresa) {
                  die("QUERY FAILED" . mysqli_error($connection));
                }

                while ($row = mysqli_fetch_array($resul_table_candidato)) {
                  $db_idCandidato = $row['idCandidato'];
                  $db_nombre_candidato = $row['nombre'];
                  $db_email_candidato = $row['email'];
                  $db_telefono_candidato = $row['telefono'];
                  $db_aprobado_candidato = $row['aprobado'];
                  $db_verify_candidato = $row['verificado_candidato'];


                  if ($db_aprobado_candidato == 1) {
                    $checked_candidato = "active";
                  } else {
                    $checked_candidato = "";
                  }

                  if ($db_verify_candidato == 1) {
                    $verify_candidato = "active";
                  } else {
                    $verify_candidato = "";
                  }

                ?>


                  <tr>
                    <td><?php echo $db_idCandidato ?></td>
                    <td><?php echo $db_nombre_candidato ?></td>
                    <td><?php echo $db_email_candidato ?></td>
                    <td><?php echo $db_telefono_candidato ?></td>



                    <script>
                      function activeCandidato(result1, b) {

                        if (b.classList == "toggle-btn active") {
                          b.classList = "toggle-btn";
                          r = 0
                          $.ajax({
                            url: "../php/update_status_candidato.php?var5=" + result1 + "&var6=" + r
                          })

                        } else {
                          b.classList = "toggle-btn active";

                          r = 1;
                          $.ajax({
                            url: "../php/update_status_candidato.php?var5=" + result1 + "&var6=" + r,
                          })
                        }
                      }
                    </script>



                    <td>
                      <div id="<?php echo $db_idCandidato ?>" class="toggle-btn <?php echo $checked_candidato ?>" onclick="activeCandidato(<?php echo $db_idCandidato ?>, this)">
                        <div class="inner-circle"></div>
                      </div>
                    </td>


                    <script>
                      function verifyCandidato(result1, b) {

                        if (b.classList == "toggle-btn active") {
                          b.classList = "toggle-btn";
                          r = 0
                          $.ajax({
                            url: "../php/verify_status_candidato.php?var=" + result1 + "&var2=" + r
                          })

                        } else {
                          b.classList = "toggle-btn active";

                          r = 1;
                          $.ajax({
                            url: "../php/verify_status_candidato.php?var=" + result1 + "&var2=" + r,

                          })
                        }
                      }
                    </script>

                    <td>
                      <div id="<?php echo $db_idCandidato ?>" class="toggle-btn <?php echo $verify_candidato ?>" onclick="verifyCandidato(<?php echo $db_idCandidato ?>, this)">
                        <div class="inner-circle"></div>
                      </div>
                    </td>

                    <td>
                      <a onclick="btn_editar_candidato(<?php echo $db_idCandidato ?>)" href="#popup"><i class="fas fa-tools"></i></a>
                    </td>

                  </tr>

                <?php
                }
                ?>



              </table>
            </h5>
          </div>
        </div>


      </div>
    </div>
  </div>



  <script>
    function btn_editar_candidato(id_candidato) {
      var ob = {
        id_candidato: id_candidato
      }

      $.ajax({
        type: "POST",
        url: "../php/vista_editar_candidato_datos.php",
        data: ob,
        beforeSend: function(objeto) {

        },
        success: function(data) {
          $("#panel_editar").html(data);
        }
      })
    }
  </script>


  <script>
    function btn_guardar_candidato_edicion() {
      var idCandidato = $("#idCandidato_cl").val();
      var nombre = $("#nombre_cl").val();
      var apellido = $("#apellido_cl").val();
      var numero_cedula = $("#numero_cedula_cl").val();
      var fecha_nacimiento = $("#fecha_nacimiento_cl").val();
      var telefono = $("#telefono_cl").val();
      var email = $("#email_cl").val();
      var genero = $("#genero_cl").val();
      var direccion = $("#direccion_cl").val();
      var numero_whatsapp = $("#numero_whatsapp_cl").val();
      var cargo_deseado = $("#cargo_deseado_cl").val();
      var descripcion = $("#descripcion_cl").val();

      var ob = {
        idCandidato: idCandidato,
        nombre: nombre,
        apellido: apellido,
        numero_cedula: numero_cedula,
        fecha_nacimiento: fecha_nacimiento,
        telefono: telefono,
        email: email,
        genero: genero,
        direccion: direccion,
        numero_whatsapp: numero_whatsapp,
        cargo_deseado: cargo_deseado,
        descripcion: descripcion
      }


      $.ajax({
        type: "POST",
        url: "../php/modelo_guardar_candidato_datos.php",
        data: ob,
        beforeSend: function(objeto) {

        },
        success: function(data) {
          $("#panel_editar_respuesta").html(data);

          setTimeout(function() {
            $("#panel_editar_respuesta").html("");
          }, 2000);
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
        <form action="php/login.php" method="post" id="panel_editar" class="form-login">
        </form>
        <div id="panel_editar_respuesta" class="popup__right">
        </div>
      </div>
    </div>
  </div>





</body>

</html>