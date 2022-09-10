<script>
    var ddData = [];
    var valor = [];
</script>

<?php

session_start();

if (isset($_POST["lang"])) {

    $lang = $_POST["lang"];
    if (!empty($lang)) {
        $_SESSION["lang"] = $lang;
    }
}

if (isset($_SESSION["lang"])) {
    $lang = $_SESSION["lang"];
    require "../lang/" . $lang . ".php";
} else {
    require "../lang/es.php";
}

include "db.php";

?>

<?php

$id_oferta = $_POST['id_oferta'];
$id_empresa = $_POST['id_empresa'];

$all_graficas = "SELECT * FROM postulaciones INNER JOIN oferta ON postulaciones.oferta_idOferta = oferta.idOferta WHERE Oferta_idOferta = {$id_oferta} AND Empresa_idEmpresa = {$id_empresa} AND fecha_postulacion < NOW()";

$resul_graficas = mysqli_query($connection, $all_graficas);

$count = mysqli_num_rows($resul_graficas);


$all_graficas_day = "SELECT * FROM postulaciones INNER JOIN oferta ON postulaciones.oferta_idOferta = oferta.idOferta WHERE Oferta_idOferta = {$id_oferta} AND Empresa_idEmpresa = {$id_empresa}";

$resul_graficas_day = mysqli_query($connection, $all_graficas_day);

$count_day = mysqli_num_rows($resul_graficas_day);


$all_entrevista = "SELECT DISTINCT entrevista_invitacion FROM `entrevista_respuesta` INNER JOIN entrevista_candidato ON entrevista_respuesta.entrevista_invitacion = entrevista_candidato.idEntrevista_candidato WHERE oferta_idOferta = {$id_oferta}";

$resul_entrevista = mysqli_query($connection, $all_entrevista);

$count_entrevista = mysqli_num_rows($resul_entrevista);


$all_vacantes = "SELECT vacantes_disponibles FROM oferta WHERE oferta.idOferta = {$id_oferta}";

$resul_vacantes = mysqli_query($connection, $all_vacantes);

$count_vacantes = mysqli_fetch_array($resul_vacantes);

$vacantes_disponibles = $count_vacantes['vacantes_disponibles'];



$request_seleccionados = "SELECT * FROM postulaciones WHERE Oferta_idOferta = $id_oferta AND estado_postulacion = '2'";

$resul_seleccionados = mysqli_query($connection, $request_seleccionados);

$count_seleccionados = mysqli_num_rows($resul_seleccionados);



$vacantes_restantes =  $vacantes_disponibles - $count_seleccionados;



$all_habilidades_requeridas = "SELECT * FROM `habilidades_requerida_oferta` INNER JOIN habilidades_generales ON habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales WHERE Oferta_idOferta = {$id_oferta}";

$resul_habilidades_requeridas = mysqli_query($connection, $all_habilidades_requeridas);

while ($row = mysqli_fetch_array($resul_habilidades_requeridas)) {

    $nombre_habilidad = $row['nombre_habilidad_general'];

?>
    <script>
        var objeto = ["<?php echo $nombre_habilidad ?>"];
        ddData.push(objeto);
    </script>
    <?php
    $valor = $row['valor'];
    ?>
    <script>
        var objeto2 = [<?php echo $valor ?>];
        valor.push(objeto2);
    </script>
<?php

}

?>

<section class="divion-graficas">
    <h1 class="titulo-section-graficas"><?php echo $lang['dash_manage_analytics'] ?></h1>
    <div class="row">
        <div class="col-1-of-3">
            <div class="container_grafica container_grafica-purple">
                <div class="icon-graficas">
                    <img src="img-svg/user.svg" alt="user">
                </div>
                <div class="container-info-graficas">
                    <span class="number-graficas"><?php echo $count ?></span>
                    <span class="texto-card-graficas"><?php echo $lang['dash_manage_total_applicants'] ?></span>
                </div>
            </div>

        </div>
        <div class="col-1-of-3">
            <div class="container_grafica container_grafica-green">
                <div class="icon-graficas">
                    <img src="img-svg/user.svg" alt="user">
                </div>
                <div class="container-info-graficas">
                    <span class="number-graficas"><?php echo $count_day ?></span>
                    <span class="texto-card-graficas"><?php echo $lang['dash_manage_applications_day'] ?></span>
                </div>
            </div>
        </div>
        <div class="col-1-of-3">
            <div class="container_grafica container_grafica-blue">
                <div class="icon-graficas">
                    <img src="img-svg/form1.svg" alt="fomr">
                </div>
                <div class="container-info-graficas">
                    <span class="number-graficas"><?php echo $count_entrevista ?></span>
                    <span class="texto-card-graficas"><?php echo $lang['dash_manage_interviews_answered'] ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="divion-graficas">
    <div class="row">


        <div class="col-1-of-3">
            <div class="contener-patron-graficas">
                <div style="width: 63rem; transform: translateX(-23%);padding-top: 3rem; padding-bottom: 4rem;">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-2-of-3">
            <div class="contener-patron-graficas">
                <div style="width: 94%; padding-top: 3rem; padding-left: 2rem;">
                    <div>
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {

            labels: ddData,
            datasets: [{
                fill: 'origin',
                label: '<?php echo $lang['dash_manage_required_skills']?>',
                backgroundColor: 'rgb(0 63 136 / 70%)',
                data: valor
            }]
        },


        // Configuration options go here
        options: {
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    ticks: {
                        beginAtZero: true,
                        steps: 10,
                        stepValue: 5,
                        max: 100
                    }
                }]
            }
        }

    });
</script>



<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['<?php echo $lang['dash_manage_selected']?>', '<?php echo $lang['dash_manage_available']?>'],
            datasets: [{
                label: 'Habilidades',
                backgroundColor: ['#0c5cf5bd', '#d9d9d9'],

                data: [<?php echo $count_seleccionados ?>, <?php echo $vacantes_restantes ?>],
                borderWidth: 1
            }]
        },

        // Configuration options go here
        options: {}

    });
</script>