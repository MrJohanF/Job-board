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

if (!isset($_SESSION['s_email'])) {
  header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/styles.css">

  <link rel="stylesheet" href="css/icon-font.css">

  <link rel="stylesheet" href="css/extras.css">
  <link rel="stylesheet" href="css/formeter.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

  <script type="text/javascript" src="/js/sweetalert.min.js"></script>

  <script defer src="/js/theme.js"></script>
  <script defer src="/js/add_skills.js"></script>
  <script defer src="/js/formeter.js"></script>
  <script defer src="/js/add_experience.js"></script>

  <script defer src="/js/dashboard_candidato.js"></script>
  <link href="/css/awesomefont/css/all.min.css" rel="stylesheet">
  <script type="text/javascript" src="/js/jquery-3.6.0.js"></script>
  <title>Dashboard</title>
</head>

<body>



  <!-- ///////////////// NAVIGATION BAR ///////////////// -->
  <nav class="navbar">
    <?php include "candidato/options_main_dashboard.php" ?>
  </nav>


  <main>

    <!-- ///////////////// MENU TOP HEADER ///////////////// -->
    <header>
      <?php include "candidato/options_top_dashboard.php" ?>

    </header>


    <!-- ///////////////// EDITAR PERFIL ///////////////// -->
    <div id="#edit-profile" class="tabcontent">
      <?php include "candidato/dashboard/edit_profile.php" ?>

    </div>


    <!-- ///////////////// ACCESOS RAPIDOS DASHBOARD ///////////////// -->
    <div id="#dashboard" class="tabcontent">
      <?php include "candidato/dashboard/dashboard.php" ?>
    </div>


    <!-- ///////////////// INVITACIONES DE EMPRESAS ///////////////// -->
    <div id="#messages" class="tabcontent">
      <?php include "candidato/dashboard/messages.php" ?>
    </div>



    <!-- ///////////////// Aplicaciones a ofertas ///////////////// -->

    <div id="#aplications" class="tabcontent">
      <?php include "candidato/dashboard/aplications.php" ?>
    </div>


  </main>

  <script>
    let hostNameLocation = window.location.protocol + "//" + window.location.hostname;

    let startLoadWindow = 0;

    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard.php#home") {
      document.getElementById("#dashboard").style.display = "block";
      startLoadWindow = 1;

    }



    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard.php#profile") {
      document.getElementById("#edit-profile").style.display = "block";
      startLoadWindow = 1;

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
    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard.php#invitations") {
      document.getElementById("#messages").style.display = "block";
      startLoadWindow = 1;
    }
    if (startLoadWindow == 0 && document.location == hostNameLocation + "/dashboard.php#aplications") {
      document.getElementById("#aplications").style.display = "block";
      startLoadWindow = 1;
    }

    window.onhashchange = function() {
      if (document.location == hostNameLocation + "/dashboard.php#home") {
        openCity(event, '#dashboard');
      }
      if (document.location == hostNameLocation + "/dashboard.php#profile") {
        openCity(event, '#edit-profile');
        $("#bar_form_completed").html("<div style='width: 100%;' class='meter'><div id='percentage'></div></div>");

        $('#percentage').formProgress({
          speed: 600,
          style: 'blue',
          bubble: true,
          selector: '.required',
        });
      }
      if (document.location == hostNameLocation + "/dashboard.php#invitations") {
        openCity(event, '#messages');
      }
      if (document.location == hostNameLocation + "/dashboard.php#aplications") {
        openCity(event, '#aplications');
      }



    }


    var contador = <?php echo $contador_skills ?>;
    var contador_exp = <?php echo $contador_exp ?>;
    var contador_edu = <?php echo $contador_edu ?>;
    var contador_video = <?php echo $contador_present ?>;


    function add_skills() {
      try {

        contador = contador + 1;

        var ob = {
          contador: contador
        };


        $.ajax({
          type: "POST",
          url: "../php/skills.php",
          data: ob,

          beforeSend: function(objeto) {

          },
          success: function(data) {
            document.getElementById("container_skills").insertAdjacentHTML("beforeend", data);

            console.log(contador);
          }
        })



      } catch (error) {

      }
    }



    function add_exp() {
      try {
        contador_exp = contador_exp + 1;
        var ob = {
          contador_exp: contador_exp,
        };


        $.ajax({
          type: "POST",
          url: "../php/exp.php",
          data: ob,

          beforeSend: function(objeto) {

          },
          success: function(data) {
            document.getElementById("accordion").insertAdjacentHTML("beforeend", data);
            $("#accordion").accordion("refresh");
            console.log(contador_exp);
          }
        })

      } catch (error) {}
    }



    function add_edu() {
      try {

        contador_edu = contador_edu + 1;
        var ob = {
          contador_edu: contador_edu,
        };
        $.ajax({
          type: "POST",
          url: "../php/edu.php",
          data: ob,

          beforeSend: function(objeto) {

          },
          success: function(data) {
            document.getElementById("accordion1").insertAdjacentHTML("beforeend", data);
            $("#accordion1").accordion("refresh");
            console.log(contador_edu);
          }
        })
      } catch (error) {}
    }


    function add_video() {
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



    function delete_video() {
      if (contador_video > 0) {
        $("#video_" + contador_video).remove();
        if (contador_video > 0) {
          contador_video = contador_video - 1;
        }

        console.log(contador_video);
      }
    }

    function delete_exp() {

      if (contador_exp > 0) {

        $("#exp_" + contador_exp).remove();
        $("#exp1_" + contador_exp).remove();



        if (contador_exp > 0) {
          contador_exp = contador_exp - 1;
        }
        console.log(contador_exp);
      }
    }


    function delete_edu() {

      if (contador_edu > 0) {

        $("#edu_" + contador_edu).remove();
        $("#edu1_" + contador_edu).remove();

        if (contador_edu > 0) {
          contador_edu = contador_edu - 1;
        }
        console.log(contador_edu);
      }
    }

    function delete_skills() {
      if (contador > 0) {
        $("#skill_" + contador).remove();
        if (contador > 0) {
          contador = contador - 1;
        }
        console.log(contador);
      }

    }


    function save_skills(contador) {

      var MinHabilidades = 4;

      if (contador > MinHabilidades) {

        n = 0;
        var ddData = [];
        var idCandidato = <?php echo $id_cantidato ?>;


        for (step = 1; step <= contador; step++) {


          // Creas un nuevo objeto.
          var objeto = {
            // Le agregas la fecha
            habilidad: document.getElementById("skill_selected_" + step).value,
            valor: document.getElementById("valor_selected_" + step).value
          }
          //Lo agregas al array.
          ddData.push(objeto);

        }

        for (x in ddData) {
          console.log(ddData[x]);
        }

        $.ajax({
          type: "POST",
          url: "../php/save_skills.php",
          data: {
            'array': JSON.stringify(ddData),
            'candidato': idCandidato
          },
          beforeSend: function(objeto) {},
          success: function(data) {
            switch (data) {
              case "0x45123":

                swal("Tienes habilidades repetidas!", "Advertencia!", "warning").then((value) => {

                });

                break;

              case "0x23123":

                swal("Habilidades actualizadas!", "Informacion!", "success").then((value) => {

                });

                break;



              default:
                break;
            }
          }
        })

      } else {
        habilidades_restantes = MinHabilidades + 1 - contador;

        swal("Debes agregar " + habilidades_restantes + " habilidad(es) para guardar los cambios", "Informacion!", "warning").then((value) => {

        });

      }



    }


    function save_video(contador) {

      n = 0;
      var ddData = [];
      var idCandidato = <?php echo $id_cantidato ?>;


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
          url: "../php/save_video.php",
          data: {
            'array': JSON.stringify(ddData),
            'candidato': idCandidato
          },
          beforeSend: function(objeto) {},
          success: function(data) {
            swal("Video actualizado!", "Completado!", "success").then((value) => {

            });
          }
        })

      } else {

        swal("Solo puedes guardar un video!", "Completado!", "warning").then((value) => {

        });
      }


    }


    function save_laboral(contador) {

      n = 0;
      var ddData = [];
      var idCandidato = <?php echo $id_cantidato ?>;

      console.log(contador);
      var paqueteDeDatos = new FormData();

      for (step = 1; step <= contador; step++) {



        var objeto = {

          nombre_empresa: document.getElementById("nombre_empresa_laboral_" + step).value,
          cargo_ocupado: document.getElementById("cargo_ocupado_laboral_" + step).value,
          inicio: document.getElementById("inicio_tiempo_laborado_" + step).value,
          final: document.getElementById("final_tiempo_laborado_" + step).value,
          funciones: document.getElementById("funciones_realizadas_laboral_" + step).value,
          retiro: document.getElementById("motivo_retiro_laboral_" + step).value,
        }
        paqueteDeDatos.append('img' + contador, $('#pdf_exp_' + contador)[0].files[0]);
        //agregas al array.
        ddData.push(objeto);

      }





      paqueteDeDatos.append('array', JSON.stringify(ddData));
      paqueteDeDatos.append('idCandidato', idCandidato);
      paqueteDeDatos.append('contador', contador);





      $.ajax({
        type: "POST",
        url: "../php/save_exp.php",
        data: paqueteDeDatos,
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function(objeto) {},
        success: function(data) {
          swal("Experiencia actualizada!", "Completado!", "success").then((value) => {
            location.reload();
          });
        }
      })

    }


    function save_edu(contador) {

      n = 0;
      var ddData = [];
      var idCandidato = <?php echo $id_cantidato ?>;

      console.log(contador);
      var paqueteDeDatos = new FormData();

      for (step = 1; step <= contador; step++) {


        var objeto = {

          titulo_obtenido: document.getElementById("titulo_obtenido_" + step).value,
          nombre_institucion: document.getElementById("nombre_institucion_" + step).value,
          titulo: document.getElementById("titulo_" + step).value,
          fecha_finalizacion: document.getElementById("fecha_finalizacion_" + step).value,
          encurso_estudiando: document.getElementById("encurso_estudiando_" + step).value,

        }

        //agregas al array.
        ddData.push(objeto);

      }


      paqueteDeDatos.append('array', JSON.stringify(ddData));
      paqueteDeDatos.append('idCandidato', idCandidato);
      paqueteDeDatos.append('contador', contador_edu);


      //  for (x in ddData) {
      //    console.log(ddData[x]);
      //   }


      $.ajax({
        type: "POST",
        url: "../php/save_edu.php",
        data: paqueteDeDatos,
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function(objeto) {},
        success: function(data) {
          swal("Educacion actualizada!", "Completado!", "success").then((value) => {
            location.reload();
          });
        }
      })

    }




    function save_social() {


      var idCandidato = <?php echo $id_cantidato ?>;



      var objeto2 = {

        idCandidato: idCandidato,
        instagram: document.getElementById("social_instagram").value,
        linkedin: document.getElementById("social_linkedin").value,
        facebook: document.getElementById("social_facebook").value,
        whatsapp: document.getElementById("social_whatsapp").value
      }


      $.ajax({
        type: "POST",
        url: "../php/save_social.php",
        data: objeto2,
        beforeSend: function(objeto) {},
        success: function(data) {
          swal("Redes sociales actualizadas!", "Completado!", "success").then((value) => {
            location.reload();
          });
        }
      })


    }
  </script>


  <style>
    .swal-text {
      font-family: 'Poppins', sans-serif;
    }

    .swal-title {
      font-family: 'Poppins', sans-serif;
    }
  </style>



  <script>
    function profile(id_oferta) {

      url = "../profile.php?profile=" + id_oferta;
      $.ajax({
        url: url,
        beforeSend: function(objeto) {

        },
        success: function(data) {

          location.href = "profile.php?profile=" + id_oferta;
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


  <script type="text/javascript">
    setTimeout(function() {
      $(function() {
        $('#percentage').formProgress({
          speed: 600,
          style: 'blue',
          bubble: true,
          selector: '.required',
        });
      });
    }, 300);
  </script>

  <!-- ///////////////// TABS ///////////////// -->
  <script src="/js/tabs.js"></script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>

</html>