<?php session_start();


if (isset($_POST["lang"])) {

  $lang = $_POST["lang"];
  if (!empty($lang)) {
    $_SESSION["lang"] = $lang;
  }
}

if (isset($_SESSION["lang"])) {
  $lang = $_SESSION["lang"];
  require "lang/" . $lang . ".php";
} else {
  require "lang/es.php";
}


?>



<?php

if (!isset($_SESSION['e_email_empresa'])) {
  header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script type="text/javascript" src="/js/sweetalert.min.js"></script>
  <!-- 
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css">

  <link rel="stylesheet" href="css/icon-font.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/extras.css">
  <link rel="stylesheet" href="css/formeter.css">
  <script defer src="/js/theme.js"></script>
  <script defer src="/js/add_skills.js"></script>
  <script defer src="/js/formeter.js"></script>

  <link href="/css/awesomefont/css/all.min.css" rel="stylesheet">

  <script type="text/javascript" src="/js/jquery-3.6.0.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" integrity="sha512-QEiC894KVkN9Tsoi6+mKf8HaCLJvyA6QIRzY5KrfINXYuP9NxdIkRQhGq3BZi0J4I7V5SidGM3XUQ5wFiMDuWg==" crossorigin="anonymous"></script>



  <title>Tujob</title>
</head>


<body>

  <body>

    <?php include "loader.php" ?>
    <!-- ///////////////// NAVIGATION BAR ///////////////// -->

    <?php include "empleador/dashboard/nav_bar.php" ?>


    <main>
      <!-- ///////////////// MENU TOP HEADER ///////////////// -->
      <header>
        <?php include "empleador/dashboard/header.php" ?>
      </header>


      <!-- /////////////////  ///////////////// -->

      <?php
      if ($_SESSION['e_servicios_empresa'] == 1) : $estado = 1; ?>

        <?php include "empleador/dashboard/headhunter.php" ?>

      <?php else : ?>
        <div id="#headhunter" class="tabcontent">
          <section class="edit-profile">
            <div class="row">
              <div class="u-center-text u-margin-botton-4 u-margin-top-8">
                <h2 class="heading-secondary">
                  Contactanos para mas informacion
                </h2>
                <h3 class="heading-tertiary-1">Clickea en el siguiente link para enviar una peticion</h3>
              </div>

              <div class="u-center-text">
                <a href="https://api.whatsapp.com/send?phone=+573041199528&text=Deseo%20conocer%20mas%20acerca%20de%20los%20servicios%20*id%20de%20la%20empresa%20:%20<?php echo $_SESSION['e_idEmpresa'] ?>*" class="btn btn--blue" style="background-color: #1ebea5;"><i class="fab fa-whatsapp"></i> Saber mas</a>
              </div>

            </div>
          </section>
        </div>

      <?php endif; ?>


      <!-- ///////////////// EDIT PROFILE ///////////////// -->

      <div id="#edit-profile" class="tabcontent">
        <?php include "empleador/dashboard/edit_profile.php" ?>
      </div>


      <!-- ///////////////// Opciones de entrada dashboard ///////////////// -->
      <div id="#dashboard" class="tabcontent">
        <section class="dashboard-main">
          <?php include "empleador/dashboard/main_options.php" ?>
        </section>
      </div>


      <!-- ///////////////// Bandeja de Entrada ///////////////// -->
      <div id="#messages" class="tabcontent">
        <?php include "empleador/dashboard/publicar_vacante.php" ?>
      </div>


      <!-- ///////////////// Bandeja de Entrada ///////////////// -->
      <div id="#planes" class="tabcontent">
        <?php include "empleador/dashboard/planes.php" ?>
      </div>



      <!-- ///////////////// Entrevistas ///////////////// -->
      <div id="#entrevistas" class="tabcontent">
        <section class="Aplicaciones-section">

          <div class="row">
            <div class="col-1-of-3">
              <div class='tooltip'>
                <input style="margin-left: 0;" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2" id="btn_entrevista" type="button" onclick="entrevista()" value="<?php echo $lang['dash_interview_update'] ?>">
                <span style="top: 130%;" class='tooltiptext'>Actualizar entrevistas.</span>
              </div>
            </div>
            <div class="col-2-of-3">
              <div id="container_entrevista">
              </div>
            </div>
          </div>
        </section>
      </div>



      <!-- ///////////////// Aplicaciones a ofertas ///////////////// -->

      <div id="#aplications" class="tabcontent">
        <section class="Aplicaciones-section">

          <div class="row">
            <div class="col-1-of-3">

              <div style="padding-bottom: 2rem;">
                <div class='tooltip'>
                  <input type="button" style="margin-left: 0;" class="btn-cuadrado-form btn-cuadrado-form--yellow" onclick="btn_filtrar()" value="<?php echo $lang['dash_manage_filter'] ?>">
                  <span class='tooltiptext'>Aplicar todos los filtros seleccionados.</span>
                </div>

                <div class='tooltip'>
                  <button style="margin-left: 1rem;" class="btn-cuadrado-form btn-cuadrado-form--blue tooltip" id="cargar" onclick="btn_trash_reset()"><i class="fas fa-trash-alt"></i></button>
                  <span class='tooltiptext'>Borrar todos los filtros aplicados.</span>
                </div>
                <div class='tooltip'>
                  <button class="btn-cuadrado-form btn-cuadrado-form--blue" onclick="location.href = 'universal_search.php'"><i class="fas fa-users"></i></a></button>
                  <span class='tooltiptext'>Buscador universal de candidatos.</span>
                </div>

              </div>

              <form name="f1">


                <div style="padding: 1rem; background-color: #234085;">
                  <h1 style="color: white; font-family: 'Poppins', sans-serif; font-weight: 400; font-size: 1.6rem; padding-left: 1rem;"><?php echo $lang['dash_manage_filter'] ?></h1>
                </div>

                <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                  <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-book-open"></i><?php echo $lang['dash_manage_categories'] ?></h1>
                </div>

                <div style="width: 99.3%; height: 160px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #dadada12; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">


                  <?php include "php/db.php" ?>

                  <?php


                  $id_empresa_publico = $_SESSION['e_idEmpresa'];

                  $request_filtro_categoria = "SELECT DISTINCT idCategoria, nombre_categoria FROM oferta INNER JOIN categoria_requerido ON oferta.Categoria_idCategoria = categoria_requerido.idCategoria WHERE Empresa_idEmpresa = $id_empresa_publico";


                  $resul_filtro_categoria = mysqli_query($connection, $request_filtro_categoria);
                  if (!$resul_filtro_categoria) {
                    die("QUERY FAILED" . mysqli_error($connection));
                  }

                  while ($row = mysqli_fetch_array($resul_filtro_categoria)) {
                    $db_idCategoria = $row['idCategoria'];
                    $db_nombre_categoria = $row['nombre_categoria'];

                  ?>
                    <div style="padding-left: 1.3rem; padding-top: 2rem;">
                      <input type="checkbox" id="<?php echo $db_idCategoria ?>" name="catgria[]" value="<?php echo $db_idCategoria ?>">
                      <label for="<?php echo $db_nombre_categoria ?>"><?php echo $db_nombre_categoria ?></label><br>
                    </div>
                  <?php
                  }
                  ?>

                </div>


                <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                  <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-info-circle"></i><?php echo $lang['dash_manage_offer_status'] ?></h1>
                </div>

                <div style="width: 99.3%; height: 160px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #dadada12; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">


                  <?php include "php/db.php" ?>

                  <?php
                  $request_filtro_categoria = "SELECT * FROM estado_oferta";


                  $resul_filtro_categoria = mysqli_query($connection, $request_filtro_categoria);
                  if (!$resul_filtro_categoria) {
                    die("QUERY FAILED" . mysqli_error($connection));
                  }

                  while ($row = mysqli_fetch_array($resul_filtro_categoria)) {
                    $db_idEstado = $row['idEstado'];
                    $db_nombre_estado = $row['estado'];

                  ?>
                    <div style="padding-left: 1.3rem; padding-top: 2rem;">
                      <input type="checkbox" id="check_<?php echo $db_idEstado ?>" name="estado[]" value="<?php echo $db_idEstado ?>">
                      <label for="check_<?php echo $db_idEstado ?>"><?php echo $db_nombre_estado ?></label><br>
                    </div>
                  <?php
                  }
                  ?>

                </div>
              </form>



              <?php if (!$_SESSION['e_aprobado_empresa'] == 1) : ?>
                <div style="padding-top: 3rem;text-align: center;">
                  <h3 style="font-size: 1.4rem;" class="login__subtitle"><?php echo $lang['dash_manage_message'] ?><a style="font-size: 1.4rem;" class="login__link" href="contactanos.php"><span><?php echo strtolower($lang['nav_bar-contact']) ?></span> </a></h3>
                </div>
              <?php endif; ?>

            </div>


            <div class="col-2-of-3">

              <div id="container_vacante">
              </div>

              <div id="paginador">
              </div>

            </div>


          </div>
        </section>


        <style>
          .pagination-option {
            color: black;
            padding: .5rem 1.5rem .5rem 1.5rem;
            font-size: 2rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            border-radius: 2px;
            background-color: white;
            border: none;
          }


          .pagination-option:last-child {
            margin-left: 1rem;
          }

          .btnactive {
            background-color: #1b3fdd;
            color: white;
          }
        </style>



      </div>



      <div id="#candidatos_aplicados" class="tabcontent">

        <section class="edit-profile">
          <div id="container_candidato">
          </div>
        </section>
      </div>

    </main>




    <div class="popup" id="popup" style="background-color: rgba(0, 0, 0, 0.64);">
      <div class="popup__content" style="width: 90%; height: 90%;">
        <div class="popup__right" style="vertical-align: top;">
          <a href="#main" class="popup__close">&times;</a>
          <div id="panel_editar">
          </div>
          <div id="panel_editar_respuesta" class="popup__right">
          </div>
        </div>
      </div>
    </div>


    <div class="popup" id="popup_entrevista" style="background-color: rgba(0, 0, 0, 0.64);">
      <div class="popup__content" style="width: 50%; height: 50%;">
        <div class="popup__right" style="vertical-align: top;">
          <a href="#main" class="popup__close">&times;</a>
          <div id="panel_entrevista">
          </div>
          <div id="panel_editar_respuesta" class="popup__right">
          </div>
        </div>
      </div>
    </div>



  </body>




  <script>
    var contador_video = <?php echo $contador_present ?>;

    function save_video_empresa(contador) {

      n = 0;
      var ddData = [];
      var idEmpresa = <?php echo $idEmpresa ?>;


      for (step = 1; step <= contador; step++) {


        // Creas un nuevo objeto.
        var objeto = {
          // Le agregas la fecha
          video: document.getElementById("video_" + step).innerText,

        }
        //Lo agregas al array.
        ddData.push(objeto);

      }

      // for (x in ddData) {
      //  console.log(ddData[x]);
      // }
      if (contador <= 1) {
        $.ajax({
          type: "POST",
          url: "../php/save_video_empresa.php",
          data: {
            'array': JSON.stringify(ddData),
            'empresa': idEmpresa
          },
          beforeSend: function(objeto) {},
          success: function(data) {
            console.log(data);
            swal("Video actualizado!", "Completado!", "success").then((value) => {

            });
          }
        })

      } else {

        swal("Solo puedes guardar un video!", "Completado!", "warning").then((value) => {

        });
      }


    }

    function add_video_empresa() {
      try {
        valor = document.getElementById("url-video").value;
        if (valor === '') {
          swal("Porfavor digita un link valido!", "Advertencia!", "warning").then((value) => {

          });
        } else {

          if (contador_video < 1) {

            contador_video = contador_video + 1;
            document
              .getElementById("container_video")
              .insertAdjacentHTML(
                "beforeend",
                "<div id='video_" + contador_video + "'" + "><div id='videocontainer' class='row'><div class='container-info-youtube'><div class='container-url-video'><h3 id='video_" + contador_video + "'" + "class='container-url-video-title'>" + valor + "</h3></div></div></div></div>"
              );

          } else {

            swal("Solo puedes guardar un video de presentacion!", "Advertencia!", "warning").then((value) => {

            });
          }

        }
      } catch (error) {}
    }

    function delete_video_empresa() {
      if (contador_video > 0) {
        $("#video_" + contador_video).remove();
        if (contador_video > 0) {
          contador_video = contador_video - 1;
        }

        console.log(contador_video);
      }
    }


    var hostNameLocation = window.location.protocol + "//" + window.location.hostname;

    //Solo se repetira una vez el inicio de carga de los taps
    var startLoadWindow = 0;

    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard_empleador.php#home") {
      document.getElementById("#dashboard").style.display = "block";
      startLoadWindow = 1;
    }
    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard_empleador.php#profile") {
      document.getElementById("#edit-profile").style.display = "block";
      var startLoadWindow = 1;

      //Carga de barra de porcentaje completacion de perfil

      $(function() {

        $("#bar_form_completed").html("<div style='width: 100%;' class='meter'><div id='percentage'></div></div>");

        $('#percentage').formProgress({
          speed: 600,
          style: 'blue',
          bubble: true,
          selector: '.required',
        });

      });

    }

    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard_empleador.php#publish") {
      document.getElementById("#messages").style.display = "block";
      var startLoadWindow = 1;
    }
    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard_empleador.php#manager") {
      document.getElementById("#aplications").style.display = "block";
      var startLoadWindow = 1;
    }
    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard_empleador.php#interviews") {
      document.getElementById("#entrevistas").style.display = "block";
      var startLoadWindow = 1;
    }
    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard_empleador.php#services") {
      document.getElementById("#headhunter").style.display = "block";
      var startLoadWindow = 1;

    }

    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard_empleador.php#perfil_publico") {
      document.getElementById("#edit-profile").style.display = "block";
      document.getElementById("emplea_edit_info").style.display = "none";
      document.getElementById("edit_public_profile").style.display = "block";
      var startLoadWindow = 1;
    }

    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard_empleador.php#media_content") {
      document.getElementById("#edit-profile").style.display = "block";
      document.getElementById("emplea_edit_info").style.display = "none";
      document.getElementById("edit_public_profile").style.display = "none";
      document.getElementById("edit_public_video").style.display = "block";
      var startLoadWindow = 1;
    }


    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard_empleador.php#info_laboral") {
      document.getElementById("#edit-profile").style.display = "block";
      var startLoadWindow = 1;

      //Carga de barra de porcentaje completacion de perfil

      $(function() {

        $("#bar_form_completed").html("<div style='width: 100%;' class='meter'><div id='percentage'></div></div>");

        $('#percentage').formProgress({
          speed: 600,
          style: 'blue',
          bubble: true,
          selector: '.required',
        });

      });
      var startLoadWindow = 1;
    }



    window.onhashchange = function() {



      if (document.location == hostNameLocation + "/dashboard_empleador.php#home") {
        openCity(event, '#dashboard');
      }
      if (document.location == hostNameLocation + "/dashboard_empleador.php#profile") {
        openCity(event, '#edit-profile');

        //Carga de barra de porcentaje completacion de perfil
        $(function() {

          $("#bar_form_completed").html("<div style='width: 100%;' class='meter'><div id='percentage'></div></div>");

          $('#percentage').formProgress({
            speed: 600,
            style: 'blue',
            bubble: true,
            selector: '.required',
          });

        });
      }
      if (document.location == hostNameLocation + "/dashboard_empleador.php#publish") {
        openCity(event, '#messages');
      }
      if (document.location == hostNameLocation + "/dashboard_empleador.php#manager") {
        openCity(event, '#aplications');
      }
      if (document.location == hostNameLocation + "/dashboard_empleador.php#interviews") {
        openCity(event, '#entrevistas');
      }
      if (document.location == hostNameLocation + "/dashboard_empleador.php#services") {
        openCity(event, '#headhunter');
      }

      if (document.location == hostNameLocation + "/dashboard_empleador.php#perfil_publico") {

        openTabEmpleador(event, 'edit_public_profile');

      }

      if (document.location == hostNameLocation + "/dashboard_empleador.php#media_content") {

        openTabEmpleador(event, 'edit_public_video');

      }




      if (document.location == hostNameLocation + "/dashboard_empleador.php#info_laboral") {

        openCity(event, '#edit-profile');

        $(function() {

          $("#bar_form_completed").html("<div style='width: 100%;' class='meter'><div id='percentage'></div></div>");

          $('#percentage').formProgress({
            speed: 600,
            style: 'blue',
            bubble: true,
            selector: '.required',
          });

        });

      }



    }



    // AQUI SE EJECUTAN LOS SCRIPTS AUTOMATICOS AL CARGAR EL SITIO WEB
    $(document).ready(function() {
      btn_cargar();
      $("#btn_entrevista").click();
    });


    function btn_trash_reset() {
      for (i = 0; i < document.f1.elements.length; i++) {
        if (document.f1.elements[i].type == "checkbox") {
          document.f1.elements[i].checked = 0
        }

      }

      btn_cargar();

    }

    function btn_cargar(page) {

      var arr = $('[name="catgria[]"]:checked').map(function() {
        return this.value;
      }).get();

      var estado = $('[name="estado[]"]:checked').map(function() {
        return this.value;
      }).get();


      ob = {
        idEmpresa: idEmpresa,
        page: page,
        estado: JSON.stringify(estado),
        catgria: JSON.stringify(arr)
      }


      $.ajax({
        type: "POST",
        url: "../php/gestionar_vacantes.php",
        data: ob,
        beforeSend: function(objeto) {

        },
        success: function(data) {
          $("#container_vacante").html(data);

          $("#paginador").html("");

          var current_page = $("#current_active_page").text();

          if (current_page == "") {
            current_page = "1";
          }

          for (i = 1; i <= $("#contador_ofertas_total").text(); i++) {

            $("#paginador").append("<button id='page_number_" + i + "' class='pagination-option' type='button' onclick='btn_cargar(" + i + ")'>" + i + "</button>");

          }

          $("#page_number_" + current_page).addClass("btnactive");



          setTimeout(function() {
            $("#panel_editar_respuesta").html("");
          }, 2000);


        }
      })




    }





    function entrevista() {


      var paqueteDeDatos = new FormData();

      paqueteDeDatos.append('idEmpresa', idEmpresa);

      $.ajax({
        type: "POST",
        url: "../php/entrevista.php",
        data: paqueteDeDatos,
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function(objeto) {

        },
        success: function(data) {
          $("#container_entrevista").html(data);
        }
      })
    }



    function btn_filtrar() {


      var paqueteDeDatos = new FormData();

      var arr = $('[name="catgria[]"]:checked').map(function() {
        return this.value;
      }).get();

      var estado = $('[name="estado[]"]:checked').map(function() {
        return this.value;
      }).get();

      if (!$.isEmptyObject(arr)) {
        paqueteDeDatos.append('catgria', JSON.stringify(arr));
      }
      if (!$.isEmptyObject(estado)) {
        paqueteDeDatos.append('estado', JSON.stringify(estado));
      }

      paqueteDeDatos.append('idEmpresa', idEmpresa);



      $.ajax({
        type: "POST",
        url: "../php/gestionar_vacantes.php",
        data: paqueteDeDatos,
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function(objeto) {

        },
        success: function(data) {
          $("#container_vacante").html(data);

          $("#paginador").html("");

          var current_page = $("#current_active_page").text();

          if (current_page == "") {
            current_page = "1";
          }

          for (i = 1; i <= $("#contador_ofertas_total").text(); i++) {

            $("#paginador").append("<button id='page_number_" + i + "' class='pagination-option' type='button' onclick='btn_cargar(" + i + ")'>" + i + "</button>");

          }

          $("#page_number_" + current_page).addClass("btnactive");

          setTimeout(function() {
            $("#panel_editar_respuesta").html("");
          }, 2000);
        }
      })
    }
  </script>








  <script>
    function btn_editar_oferta(id_oferta) {
      var ob = {
        id_oferta: id_oferta
      }

      $.ajax({
        type: "POST",
        url: "../php/vista_editar_oferta_datos.php",
        data: ob,
        beforeSend: function(objeto) {

        },
        success: function(data) {
          $("#panel_editar").html(data);
        }
      })
    }
  </script>







  <!-- ///////////////// effect collapsible ///////////////// -->
  <script>
    function collap() {



      $(document).on("click", ".collapsible", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        }
      });





    }
  </script>



  <script>
    var total_click = 0;

    function delete_entrevista(contador) {


      total_click = total_click + 1;
      var resultado = contador + 1 - total_click;

      if (resultado < 0) {
        resultado = 0;
      }

      $("#entrevista_" + resultado).remove();


      alert(resultado);

    }
  </script>


  <script>
    var coll = document.getElementsByClassName("collapsible-filter");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        }
      });
    }
  </script>



  <!-- ///////////////// TABS ///////////////// -->
  <script src="/js/tabs.js"></script>

  <!-- ///////////////// custom poups ///////////////// -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>




</body>



</html>