<?php

session_start();

include "db.php";



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

$id_oferta = $_POST['id_oferta'];
$contador = 0;


$enviar = "SELECT * FROM postulaciones INNER JOIN candidato ON postulaciones.Candidato_idCandidato = candidato.idCandidato INNER JOIN ciudad ON candidato.ciudad = ciudad.idCiudad WHERE Oferta_idOferta = $id_oferta AND estado_postulacion = '2'";
$resul_enviar = mysqli_query($connection, $enviar);

while ($row = mysqli_fetch_array($resul_enviar)) {

    $db_idCandidato = $row['idCandidato'];
    $db_nombre = $row['nombre'];
    $db_ciudad = $row['ciudad_general'];
    $db_apellido = $row['apellido'];
    $db_numero_cedula = $row['numero_cedula'];
    $db_fecha_nacimiento = $row['fecha_nacimiento'];
    $db_telefono = $row['telefono'];
    $db_email = $row['email'];
    $db_genero = $row['genero'];
    $db_direccion = $row['direccion'];
    $db_numero_whatsapp = $row['numero_whatsapp'];
    $db_cargo_deseado = $row['cargo_deseado'];
    $db_descripcion = $row['descripcion'];
    $db_estado_postulacion = $row['estado_postulacion'];
    $contador = $contador + 1;

?>


    <div id="result_<?php echo $contador ?>" class="row fbr">

        <div class="story">
            <div class="row">
                <div class="col-2-of-3">
                    <div class="content-left">
                        <div class="company_img">


                            <?php

                            $nombre_fichero_jpg = '../uploads/profile' . $db_idCandidato . '.jpg';
                            $nombre_fichero_jpeg = '../uploads/profile' . $db_idCandidato . '.jpeg';
                            $nombre_fichero_png = '../uploads/profile' . $db_idCandidato . '.png';
                            $imagen = 0;
                            if (file_exists($nombre_fichero_jpg)) {
                                echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/profile" . $db_idCandidato . ".jpg' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                $imagen = 1;
                            }
                            if (file_exists($nombre_fichero_jpeg)) {
                                echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/profile" . $db_idCandidato . ".jpeg' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                $imagen = 1;
                            }
                            if (file_exists($nombre_fichero_png)) {
                                echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/profile" . $db_idCandidato . ".png' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                $imagen = 1;
                            }
                            if ($imagen == 0) {
                                if ($db_genero == 1) {
                                    echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/icon-man.png' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                } else {
                                    echo "<div style='height: 17rem; width: 18rem;padding: 1rem 2rem 2rem 1rem;'><img src='../uploads/icon-woman.png' alt='logo' style='object-fit: cover; object-position: center center; height: auto; width: 100%;'></div>";
                                }
                            }
                            ?>
                        </div>
                        <h3 class="title_company"><?php echo ucwords($db_nombre); ?> <?php echo ucwords($db_apellido); ?></h3>
                        <h4 class="title_company--sub"><?php echo $db_ciudad ?></h4>
                        <h5 class="title_country" style="height: 17rem;"><?php echo substr($db_descripcion, 0, 520);  ?></h5>
                        <div>
                            <div class='tooltip'>
                                <button form="grupo_perfiles" onclick="ver_perfiles(<?php echo $id_oferta ?>, <?php echo $db_idCandidato ?>, <?php echo $db_estado_postulacion ?>)" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><i class="fas fa-address-card"></i></button>
                                <span style="top: 120%;" class='tooltiptext'>Ver detalles de perfil.</span>
                            </div>
                            <div class='tooltip'>
                                <a href="#enviar_entrevista" onclick="enviar_interview(<?php echo $db_idCandidato ?>, '<?php echo $db_email ?>')" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><i class="fas fa-file-alt"></i></a>
                                <span style="top: 120%;" class='tooltiptext'>Enviar entrevista personalizada.</span>
                            </div>
                            <select onchange="status(this, <?php echo $db_idCandidato ?>)" style="margin-left: 5rem;padding: 1rem;">
                                <option value="2"><?php echo $lang['dash_manage_selected'] ?></option>
                                <option value="3"><?php echo $lang['dash_manage_pre_selected'] ?></option>
                                <option value="4"><?php echo $lang['dash_manage_discarded'] ?></option>
                                <option value="5"><?php echo $lang['dash_manage_archived'] ?></option>
                            </select>
                        </div>

                    </div>

                </div>
                <div class="col-1-of-3">
                    <div class="content-right">

                        <div style="width: 45rem; transform: translateX(-7rem);padding-top: 1rem;">
                            <div>
                                <canvas id="myChart_<?php echo $contador ?>"></canvas>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


        </div>

    </div>

    <?php

    $consulta1 = "SELECT * FROM habilidades_requerida_oferta WHERE Oferta_idOferta = $id_oferta ";
    $resul_consulta1 = mysqli_query($connection, $consulta1);


    $resultado1 = 0;
    $habilidad_generar_consulta = "";

    while ($row1 = mysqli_fetch_array($resul_consulta1)) {

        $db_idHabilidad = $row1['Habilidades_generales_idHabilidades_generales'];
        $db_habilidad_valor = $row1['valor'];
        $resultado1 = $resultado1 + $db_habilidad_valor;
        $habilidad_generar_consulta .= "" . $row1['Habilidades_generales_idHabilidades_generales'] . " OR ";
    }
    $habilidad_generar_consulta = substr($habilidad_generar_consulta, 0, -3);



    $consulta2 = "SELECT * FROM habilidades_candidato WHERE candidato_idCandidato = $db_idCandidato AND Habilidades_generales_idHabilidades_generales = $habilidad_generar_consulta";
    $resul_consulta2 = mysqli_query($connection, $consulta2);
    $resultado2 = 0;

    while ($row = mysqli_fetch_array($resul_consulta2)) {

        $db_idHabilidad = $row['Habilidades_generales_idHabilidades_generales'];
        $db_habilidad_valor = $row['valor'];
        $resultado2 = $resultado2 + $db_habilidad_valor;
    }

    $porcentaje = $resultado2 / $resultado1 * 100;

    if ($porcentaje >= 100) {
        $residuo = 0;
    } else {
        $residuo = $porcentaje - 100;
    }


    ?>

    <script>
        var ctx = document.getElementById('myChart_<?php echo $contador ?>').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
                labels: ['Afinidad'],
                datasets: [{
                    label: 'Habilidades',
                    backgroundColor: ['#0c5cf5bd', '#d9d9d9'],

                    data: [<?php echo $porcentaje ?>, <?php echo $residuo ?>],
                    borderWidth: 1
                }]
            },

            // Configuration options go here
            options: {}

        });
    </script>


<?php

}

?>