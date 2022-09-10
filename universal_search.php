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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

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
    <title>TuJob</title>
</head>


<script>
    $(document).ready(function() {


        var maxLength = 150;
        $(".show-read-more").each(function() {
            var myStr = $(this).text();
            if ($.trim(myStr).length > maxLength) {
                var newStr = myStr.substring(0, maxLength);
                var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                $(this).empty().html(newStr);
                $(this).append(' <a href="javascript:void(0);" class="read-more"></a>');
                $(this).append('<span class="more-text">' + removedStr + '</span>');
            }
        });
        $(".read-more").click(function() {
            //   $(this).siblings(".more-text").contents().unwrap();
            //   $(this).remove();
        });
    });
</script>

<body>

    <?php include "loader.php"; ?>


    <header class="header-browser">

        <div class="row">
            <div class="main_content">
                <div class="col-1-of-3">
                   <img style="height: 3.5rem;" src="img/emplea_logo.webp" alt="logo" class="header-browser__logo"> 
                </div>
                <div class="col-2-of-3">
                    <div class="main_options">
                        <?php include "header.php"; ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="u-margin-top-4">
                <div class="header-browser__line-vertical">
                    <h1 class="header-browser__title">Universal Search</h1>
                    <h2 class="header-browser__subtitle">Dashboard / Universal Search</h2>
                </div>
            </div>
        </div>

    </header>

    <main>
        <section class="section-ofertas">
            <div class="row">
                <div class="col-1-of-4">

                    <form id="filtro_universal_search">

                        <div style="padding-bottom: 2rem;">
                            <div class='tooltip'>
                                <button class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2" type="submit">Filtrar</button>
                                <span style="top: 120%;" class='tooltiptext'>Aplicar filtros seleccionados.</span>
                            </div>
                            <div class='tooltip'>
                                <span style="margin-left: 0; margin-left: 1rem;" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2" onclick="location.href = 'universal_search.php'"><i class="fas fa-trash-alt"></i></span>
                                <span style="top: 120%;" class='tooltiptext'>Deshacer filtros.</span>
                            </div>
                        </div>

                        <div style="padding: 1rem; background-color: #234085;">
                            <h1 style="color: white; font-family: 'Poppins', sans-serif; font-weight: 400; font-size: 1.6rem; padding-left: 1rem;">Filtros</h1>
                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-keyboard"></i>Palabra clave</h1>
                        </div>

                        <div style="width: 99.3%; height: 100px; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #dadada12; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">


                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input style="width: 19rem; display: inline-block;" type="text" class="form-login__input required" placeholder="Ej: Desarrollador" id="filter_word_key" name="fler_full">
                            </div>

                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-user-circle"></i>Edad</h1>
                        </div>

                        <div style="width: 99.3%; height: 100px; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #dadada12; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">

                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input style="width: 7rem; display: inline-block;" type="number" class="form-login__input required" placeholder="Min#" value="0" name="minAge">
                                <h1 style="padding-left: .7rem; padding-right: .7rem; display: inline-block; font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"> - </h1>
                                <input style="width: 7rem; display: inline-block" type="number" class="form-login__input required" placeholder="Max#" value="100" name="maxAge">
                            </div>
                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-venus-mars"></i>Genero</h1>
                        </div>

                        <div style="width: 99.3%; height: 110px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #dadada12; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">



                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input id="selector_genre_male" type="checkbox" name="genre[]" value="1">
                                <label for="selector_genre_male" style="color: #484848;">Masculino</label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input id="selector_genre_female" type="checkbox" name="genre[]" value="2">
                                <label for="selector_genre_female" style="color: #484848;">Femenino</label><br>
                            </div>

                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-map-marker-alt"></i>Departamento</h1>
                        </div>

                        <div style="width: 99.3%; height: 160px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #dadada12; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">


                            <?php

                            include "php/db.php";

                            $request_filtro_ciudad = "SELECT * FROM ciudad WHERE active_ciudad = 1";


                            $resul_filtro = mysqli_query($connection, $request_filtro_ciudad);
                            if (!$resul_filtro) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($resul_filtro)) {
                                $db_idCiudad_filtro = $row['idCiudad'];
                                $db_name_ciudad = $row['ciudad_general'];
                            ?>

                                <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                    <input id="city_<?php echo $db_idCiudad_filtro ?>" type="checkbox" name="city[]" value="<?php echo $db_idCiudad_filtro ?>">
                                    <label for="city_<?php echo $db_idCiudad_filtro ?>" style="color: #484848;"><?php echo $db_name_ciudad ?></label><br>
                                </div>

                            <?php
                            }
                            ?>

                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-pencil-ruler"></i>Nivel de estudios</h1>
                        </div>

                        <div style="width: 99.3%; height: 160px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #dadada12; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">




                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input id="level_study_1" type="checkbox" name="estudio[]">
                                <label for="level_study_1" style="color: #484848;">Tecnico</label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input id="level_study_2" type="checkbox" name="estudio[]">
                                <label for="level_study_2" style="color: #484848;">Tecnologo</label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input id="level_study_3" type="checkbox" name="estudio[]">
                                <label for="level_study_3" style="color: #484848;">Profesional</label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input id="level_study_4" type="checkbox" name="estudio[]">
                                <label for="level_study_4" style="color: #484848;">Maestria</label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input id="level_study_5" type="checkbox" name="estudio[]">
                                <label for="level_study_5" style="color: #484848;">Doctorado</label><br>
                            </div>


                        </div>
                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-dollar-sign"></i>Prestacion Salarial</h1>
                        </div>

                        <div style="width: 99.3%; height: 160px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #dadada12; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">

                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input id="radio_salary_1" class="sal" type="radio" name="slro" data-waschecked="true" value="800000" />
                                <label for="radio_salary_1">1 Salario Minimo</label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 1rem;">
                                <input id="radio_salary_2" class="sal" type="radio" name="slro" data-waschecked="true" value="1600000" />
                                <label for="radio_salary_2">2 Salario Minimos</label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 1rem;">
                                <input id="radio_salary_3" class="sal" type="radio" name="slro" data-waschecked="true" value="2400000" />
                                <label for="radio_salary_3">3 Salario Minimos</label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 1rem;">
                                <input id="radio_salary_4" class="sal" type="radio" name="slro" data-waschecked="true" value="3000000" />
                                <label for="radio_salary_4">4 Salario Minimos</label><br>
                            </div>

                        </div>




                    </form>


                </div>
                <div class="col-3-of-4">

                    <?php

                    include "php/db.php";

                    $cadena_completa = "";
                    $contador = "";

                    $consulta_genre = "";
                    $consulta = "";

                    if (isset($_GET['minAge']) or isset($_GET['maxAge'])  or isset($_GET['fler_full']) or isset($_GET['city']) or isset($_GET['genre'])) {

                        $contador = 0;

                        $filtro_idCargo = "candidato.cargo_deseado LIKE ";
                        $filtro_MinAge = "candidato.edad >=";
                        $filtro_MaxAge = "candidato.edad <=";
                        $filtro_genre = "candidato.genero =";
                        $filtro_idCiudad = "candidato.ciudad =";
                        $filtro_idSalario = "candidato.aspiracion_salarial <=";



                        if (!empty($_GET['fler_full'])) {

                            $consulta_cargo_filtro = $_GET["fler_full"];

                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa = "AND " . $filtro_idCargo . "'%" . $consulta_cargo_filtro . "%'";
                            }
                            if ($contador >= 2) {
                                $cadena_completa = $cadena_completa . " AND " . $filtro_idCargo . "'%" . $consulta_cargo_filtro . "%'";
                            }
                        }

                        if (isset($_GET['minAge']) and isset($_GET['maxAge'])) {

                            $consulta_minAge = $_GET["minAge"];


                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa = "AND " . $filtro_MinAge . "'" . $consulta_minAge . "'";
                            }
                            if ($contador >= 2) {
                                $cadena_completa = $cadena_completa . " AND " . $filtro_MinAge . "'" . $consulta_minAge . "'";
                            }
                        }

                        if (isset($_GET['minAge']) and isset($_GET['maxAge'])) {

                            $consulta_maxAge = $_GET["maxAge"];


                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa = "AND " . $filtro_MaxAge . "'" . $consulta_maxAge . "'";
                            }
                            if ($contador >= 2) {
                                $cadena_completa = $cadena_completa . " AND " . $filtro_MaxAge . "'" . $consulta_maxAge . "'";
                            }
                        }

                        if (isset($_GET['genre'])) {
                            $length = count($_GET["genre"]);

                            for ($c = 0; $c < $length; $c++) {
                                $consulta_genre .=  " '" . $_GET["genre"][$c] . "'" . (($c == $length - 1) ? "" : " AND ");
                            }
                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa = "AND " . $filtro_genre . $consulta_genre;
                            }
                            if ($contador >= 2) {
                                $cadena_completa = $cadena_completa . " AND " . $filtro_genre . $consulta_genre;
                            }
                        }


                        if (isset($_GET['city'])) {
                            $length = count($_GET["city"]);

                            for ($c = 0; $c < $length; $c++) {
                                $consulta .=  " '" . $_GET["city"][$c] . "'" . (($c == $length - 1) ? "" : " AND ");
                            }
                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa = "AND " . $filtro_idCiudad . $consulta;
                            }
                            if ($contador >= 2) {
                                $cadena_completa = $cadena_completa . " AND " . $filtro_idCiudad . $consulta;
                            }
                        }

                        if (isset($_GET['slro'])) {
                            $Salario = $_GET["slro"];

                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa =  "AND " . $filtro_idSalario . "'" . $Salario . "'";
                            }
                            if ($contador >= 2) {
                                $cadena_completa =  $cadena_completa . " AND " . $filtro_idSalario . "'" . $Salario . "'";
                            }
                        }


                        $cadena_completa . "tiene estos filtros activos " . $contador;
                    } else {
                        $id_filter = "";
                    }


                    $per_page = 5;

                    if (isset($_GET['page'])) {

                        $page = $_GET['page'];
                    } else {
                        $page = "";
                    }

                    if ($page == "" || $page == 1) {
                        $page_1 = 0;
                    } else {
                        $page_1 = ($page * $per_page) - $per_page;
                    }

                    $post_query_count = "SELECT * FROM candidato INNER JOIN ciudad ON candidato.ciudad = ciudad.idCiudad INNER JOIN pais ON ciudad.pais_idPais = pais.idPais WHERE aprobado = 1 $cadena_completa";

                    $find_count = mysqli_query($connection, $post_query_count);
                    $count = mysqli_num_rows($find_count);
                    $count = ceil($count / $per_page);


                    $all_offer = "SELECT * FROM candidato INNER JOIN ciudad ON candidato.ciudad = ciudad.idCiudad INNER JOIN pais ON ciudad.pais_idPais = pais.idPais WHERE aprobado = 1 $cadena_completa limit $page_1, $per_page ";



                    $resul_all_offer = mysqli_query($connection, $all_offer);
                    if (!$resul_all_offer) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_array($resul_all_offer)) {

                        $db_id = $row['idCandidato'];
                        $db_fecha_registro = $row['fecha_registro'];
                        $db_nombre = $row['nombre'];
                        $db_apellido = $row['apellido'];
                        $db_numero_cedula = $row['numero_cedula'];
                        $db_foto_perfil = $row['foto_perfil'];
                        $db_fecha_nacimiento = $row['fecha_nacimiento'];
                        $db_edad = $row['edad'];
                        $db_telefono = $row['telefono'];
                        $db_email = $row['email'];
                        $db_genero = $row['genero'];
                        $db_pais = $row['nombre_pais'];
                        $db_id_ciudad = $row['ciudad'];
                        $db_ciudad = $row['ciudad_general'];
                        $db_direccion = $row['direccion'];
                        $db_tipo_cuenta = $row['tipo_cuenta'];
                        $db_numero_whatsapp = $row['numero_whatsapp'];
                        $db_aspiracion_salarial = $row['aspiracion_salarial'];
                        $db_cargo_deseado = $row['cargo_deseado'];
                        $db_disponibilidad_vehiculo = $row['disponibilidad_vehiculo'];
                        $db_disponibilidad_viajar = $row['disponibilidad_viaje'];
                        $db_descripcion = $row['descripcion'];
                        $db_verificado_candidato = $row['verificado_candidato'];
                        $db_tipo_trabajo = $row['id_tipoTrabajo'];
                        $db_nivel_ingles = $row['nivel_ingles'];

                    ?>

                        <div style="box-shadow: none; border-style: solid; border-width: 1px; border-color: #007aff; background-color: white; margin-bottom: 2rem;" class="story">
                            <div class="row">
                                <div style="margin-right: 3rem;" class="col-1-of-3">

                                    <div style="height: 19rem; margin: 1rem 1rem 1rem 3rem;" class="card">
                                        <div style="height: 19rem;" class="card__side card__side--front">

                                            <div style="padding: 0;" class="card__details">


                                                <?php
                                                $nombre_fichero_jpg = 'uploads/profile' . $db_id . '.jpg';
                                                $nombre_fichero_jpeg = 'uploads/profile' . $db_id . '.jpeg';
                                                $nombre_fichero_png = 'uploads/profile' . $db_id . '.png';
                                                $imagen = 0;
                                                if (file_exists($nombre_fichero_jpg)) {
                                                    echo "<img src='uploads/profile" . $db_id . ".jpg' alt='logo' style='object-fit: cover;object-position: center center; height: auto; width: 100%;' class='profile-img'>";
                                                    $imagen = 1;
                                                }
                                                if (file_exists($nombre_fichero_jpeg)) {
                                                    echo "<img src='uploads/profile" . $db_id . ".jpeg' alt='logo' style='object-fit: cover;object-position: center center; height: auto; width: 100%;' class='profile-img'>";
                                                    $imagen = 1;
                                                }
                                                if (file_exists($nombre_fichero_png)) {
                                                    echo "<img src='uploads/profile" . $db_id . ".png' alt='logo' style='object-fit: cover;object-position: center center; height: auto; width: 100%;' class='profile-img'>";
                                                    $imagen = 1;
                                                }
                                                if ($imagen == 0) {
                                                    if ($db_genero == 1) {
                                                        echo "<img src='uploads/icon-man.png' alt='logo' style='object-fit: cover;object-position: center center; height: auto; width: 100%;' class='profile-img'>";
                                                    } else {
                                                        echo "<img src='uploads/icon-woman.png' alt='logo' style='object-fit: cover;object-position: center center; height: auto; width: 100%;' class='profile-img'>";
                                                    }
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div style="height: 19rem;" class="card__side card__side--back card__side--back-1">
                                            <div class="card__cta">
                                                <div style="margin-bottom: 0rem;" class="card__price-box">
                                                    <p class="card__price-value"><?php echo $db_edad; ?></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-2-of-3">
                                    <div style="width: 100%; display: inline-flex;">

                                        <div style="text-align: left; flex: 3;">

                                            <div>
                                                <h1 style="color: #234085; margin-top: 2rem; font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 1.6rem;"><?php echo ucfirst($db_ciudad); ?></h1>
                                                <h1 style="margin-top: .2rem; font-family: 'Poppins', sans-serif; font-weight: 400; font-size: 1.5rem;"><?php echo ucfirst($db_nombre); ?></h1>
                                                <p class="show-read-more" style="margin-top: .1rem; height: 9rem; font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.5rem;"><?php echo ucfirst($db_descripcion); ?></p>
                                            </div>

                                            <div>
                                                <ul style="margin-top: 2rem;" id="skills" class="lista-habilidades">

                                                    <?php
                                                    $query_skills = "SELECT * FROM `habilidades_candidato` INNER JOIN habilidades_generales ON habilidades_candidato.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales WHERE Candidato_idCandidato  = $db_id LIMIT 4";

                                                    $result_skills = mysqli_query($connection, $query_skills);
                                                    if (!$result_skills) {
                                                        die("QUERY FAILED" . mysqli_error($connection));
                                                    }
                                                    while ($row = mysqli_fetch_array($result_skills)) {
                                                        $name_skill = $row['nombre_habilidad_general'];
                                                    ?>
                                                        <li style="border-width: 0; color: #0056b4ab; background-color: #0000ff0d;"><?php echo $name_skill; ?></li>

                                                    <?php
                                                    }

                                                    ?>


                                                </ul>
                                            </div>
                                        </div>
                                        <div style=" text-align: left; flex: 1;">
                                            <div style="padding-left: 1.6rem;">
                                                <h1 style="color: #717171; margin-top: 2rem; font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem;"><?php if ($db_verificado_candidato == 1) {
                                                                                                                                                                            echo "<i class='fas fa-check-circle' style='padding-right: 5px; color: #00cc8d;'></i>";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "<i class='fas fa-times-circle' style='padding-right: 9px; color: #ff4e4e;'></i>";
                                                                                                                                                                        } ?>Verificado</h1>
                                                <h1 style="color: #717171; margin-top: 0; font-family: 'Poppins', sans-serif; font-weight: 300; font-size: 1.4rem;"><i style="padding-right: 9px;" class="far fa-calendar-alt"></i>23/23/2001</h1>
                                            </div>
                                            <div style="padding-top: 64%;">
                                                <a href="universal_search_profile.php?oferta=<?php echo $db_id; ?>" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2">Ver perfil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    <?php
                    }
                    ?>




                    <ul class="pager list_pagination">

                        <?php


                        if (isset($_GET["page"])) {
                            $current_page_active = $_GET["page"];
                        } else {
                            $current_page_active = 1;
                        }




                        for ($i = 1; $i <= $count; $i++) {

                            echo "<li class='pagination-group'><a id='page_$i' class='pagination-option' href='universal_search.php?page={$i}'>{$i}</a></li>";
                        }


                        ?>

                    </ul>


                    <style>
                        .list_pagination {
                            list-style: none;
                            display: inline-block;
                        }

                        .pagination-group {

                            display: inline;
                        }

                        .pagination-option {

                            text-decoration: none;

                            color: black;

                            padding: .5rem 1.5rem .5rem 1.5rem;
                            font-size: 2rem;
                            font-family: 'Poppins', sans-serif;
                            font-weight: 400;
                            border-radius: 2px;

                        }

                        .pagination-option.active {

                            background-color: #1b3fdd;
                            color: white;
                        }
                    </style>


                    <script>
                        // Get all buttons with class="btn" inside the container


                        var current_page = <?php echo $current_page_active ?>;

                        $("#page_" + current_page).addClass("active");
                    </script>

                </div>
        </section>
    </main>



</body>

</html>