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
    require "lang/" . $lang . ".php";
} else {
    require "lang/es.php";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/icon-font.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="/css/awesomefont/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery-3.6.0.js"></script>

    <script src="/js/tools.js"></script>
    <title>TuJob</title>
</head>









<!-- <style>
    .show-read-more .more-text {
        display: none;
    }


</style> -->

<body>

    <?php include "loader.php"; ?>

    <header class="header-browser">

        <div class="row">
            <div class="main_content">
                <div class="col-1-of-3">
                    <img style="height: 3.5rem; padding-left: 2rem;" src="img/emplea_logo.webp" alt="logo" class="header-browser__logo">
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
                <div class="col-1-of-3">
                    <div class="header-browser__line-vertical">
                        <h1 class="header-browser__title"><?php echo $lang["ofertas_Search_for_a_job"] ?></h1>
                        <h2 class="header-browser__subtitle"><?php echo $lang["ofertas_Home_Find_a_job"] ?></h2>
                    </div>
                </div>
                <div class="col-2-of-3">
                    <form id="form_filtro_full" class="form-browser">
                        <div class="form-browser__group">
                            <div class="form-browser__email-input">
                                <input type="text" class="form-browser__input" placeholder="<?php echo $lang["ofertas_im_looking_for"] ?>" id="filter_full" required name="fler_full">
                                </input>
                                <label for="filter_full" class="form-browser__label"><?php echo $lang["ofertas_im_looking_for"] ?></label>
                            </div>
                            <div class="form-browser__email-btn">
                                <button type="submit" form="form_filtro_full" class="btn-cuadrado-submit btn-cuadrado-submit--blue"><i class="fas fa-search" style="margin-right: 1rem;"></i><?php echo $lang["ofertas_search"] ?></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </header>
    <main>

        <section class="section-ofertas">
            <div class="row">
                <div class="col-1-of-4">

                    <form id="filtro_ciudad_form">

                        <div style="padding-bottom: 2rem;">
                            <button style="margin-left: 0;" class="btn-cuadrado-form btn-cuadrado-form--blue" type="submit" form="filtro_ciudad_form"><?php echo $lang["ofertas_filter"] ?></button>
                            <span style="margin-left: 1rem;" class="btn-cuadrado-form btn-cuadrado-form--yellow" onclick="location.href = 'ofertas.php'"><i class="fas fa-trash-alt"></i>
                        </div>

                        <!-- <input type="button" class="collapsible-filter" value="Ciudad" /> -->

                        <!--    <div class="content-collapsible">-->

                        <div style="padding: 1rem; background-color: #234085;">
                            <h1 style="color: white; font-family: 'Poppins', sans-serif; font-weight: 400; font-size: 1.6rem; padding-left: 1rem;"><?php echo $lang["ofertas_filters"] ?></h1>
                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-map-marker-alt"></i><?php echo $lang["ofertas_city"] ?></h1>
                        </div>

                        <div style="width: 99.3%; height: 160px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #f7f7f7; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">

                            <?php include "php/db.php" ?>

                            <?php
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
                                    <input type="checkbox" id="<?php echo $db_idCiudad_filtro ?>" name="city[]" value="<?php echo $db_idCiudad_filtro ?>">
                                    <label style="color: #484848;" for="<?php echo $db_idCiudad_filtro ?>"><?php echo $db_name_ciudad ?></label><br>
                                </div>

                            <?php
                            }
                            ?>

                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-file-alt"></i><?php echo $lang["ofertas_type_of_job"] ?></h1>
                        </div>

                        <div style="width: 99.3%; height: 100px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #f7f7f7; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">



                            <?php include "php/db.php" ?>

                            <?php
                            $request_filtro_ciudad = "SELECT * FROM tipo_trabajo";


                            $resul_filtro = mysqli_query($connection, $request_filtro_ciudad);
                            if (!$resul_filtro) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($resul_filtro)) {
                                $db_idTipo_trabajo = $row['idTipo_trabajo'];
                                $db_tipo_trabajo = $row['tipo_trabajo'];

                            ?>
                                <div style="padding-left: 1.3rem; padding-top: 2rem;">

                                    <input class="sal" type="radio" id="typejob_<?php echo $db_idTipo_trabajo ?>" name="Tjob" value="<?php echo $db_idTipo_trabajo ?>">
                                    <label for="typejob_<?php echo $db_idTipo_trabajo ?>"><?php echo $db_tipo_trabajo ?></label><br>
                                </div>
                            <?php
                            }
                            ?>


                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-language"></i><?php echo $lang["ofertas_language"] ?></h1>
                        </div>

                        <div style="width: 99.3%; height: 100px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #f7f7f7; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">



                            <?php include "php/db.php" ?>

                            <?php
                            $request_filtro_lenguaje = "SELECT * FROM lenguaje_general";


                            $resul_filtro_lenguaje = mysqli_query($connection, $request_filtro_lenguaje);
                            if (!$resul_filtro_lenguaje) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($resul_filtro_lenguaje)) {
                                $db_idLenguaje = $row['idLenguaje'];
                                $db_Lenguaje_nombre = $row['Nombre'];

                            ?>
                                <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                    <input type="checkbox" id="lang_<?php echo $db_idLenguaje ?>" name="lng[]" value="<?php echo $db_idLenguaje ?>">
                                    <label for="lang_<?php echo $db_idLenguaje ?>"><?php echo $db_Lenguaje_nombre ?></label><br>
                                </div>
                            <?php
                            }
                            ?>


                        </div>

                        <script>
                            $(function() {
                                $('input[class="sal"]').click(function() {
                                    var $radio = $(this);

                                    // if this was previously checked
                                    if ($radio.data('waschecked') == true) {
                                        $radio.prop('checked', false);
                                        $radio.data('waschecked', false);
                                    } else
                                        $radio.data('waschecked', true);

                                    // remove was checked from other radios
                                    $radio.siblings('input[class="sal"]').data('waschecked', false);
                                });
                            });
                        </script>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-dollar-sign"></i><?php echo $lang["ofertas_salary"] ?></h1>
                        </div>

                        <div style="width: 99.3%; height: 160px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #f7f7f7; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">

                            <div style="padding-left: 1.3rem; padding-top: 2rem;">
                                <input id="sla1" class="sal" type="radio" name="slro" data-waschecked="true" value="800000" />
                                <label for="sla1"><?php echo $lang["ofertas_1_minimum_wages"] ?></label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 1rem;">
                                <input id="sla2" class="sal" type="radio" name="slro" data-waschecked="true" value="1600000" />
                                <label for="sla2"><?php echo $lang["ofertas_2_minimum_wages"] ?></label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 1rem;">
                                <input id="sla3" class="sal" type="radio" name="slro" data-waschecked="true" value="2400000" />
                                <label for="sla3"><?php echo $lang["ofertas_3_minimum_wages"] ?></label><br>
                            </div>
                            <div style="padding-left: 1.3rem; padding-top: 1rem;">
                                <input id="sla4" class="sal" type="radio" name="slro" data-waschecked="true" value="3000000" />
                                <label for="sla4"><?php echo $lang["ofertas_4_minimum_wages"] ?></label><br>
                            </div>


                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-code"></i></i><?php echo $lang["ofertas_abilities"] ?></h1>
                        </div>

                        <div style="width: 99.3%; height: 160px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #f7f7f7; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">



                            <?php include "php/db.php" ?>

                            <?php
                            $request_filtro_ciudad = "SELECT DISTINCT idHabilidades_generales, nombre_habilidad_general FROM habilidades_requerida_oferta INNER JOIN habilidades_generales ON  habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales";


                            $resul_filtro = mysqli_query($connection, $request_filtro_ciudad);
                            if (!$resul_filtro) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($resul_filtro)) {

                                $db_idHabilidades_generales = $row['idHabilidades_generales'];
                                $db_name_habilidades_generales = $row['nombre_habilidad_general'];

                            ?>
                                <div style="padding-left: 1.3rem; padding-top: 1rem;">
                                    <input type="checkbox" id="skill_<?php echo $db_idHabilidades_generales ?>" name="skill[]" value="<?php echo $db_idHabilidades_generales ?>">
                                    <label for="skill_<?php echo $db_idHabilidades_generales ?>"><?php echo $db_name_habilidades_generales ?></label><br>
                                </div>
                            <?php
                            }
                            ?>

                        </div>

                        <div style="padding: 1rem; background-color: #ebebeb; border-style: solid; border-width: 3px 1px 1px 1px; border-color: #234085 #cacaca  #cacaca00  #cacaca ;">
                            <h1 style="font-family: 'Poppins', sans-serif; color: #292929; font-weight: 400;"><i style="padding-right: 1rem;" class="fas fa-book-open"></i><?php echo $lang["ofertas_categorias"] ?></h1>
                        </div>

                        <div style="width: 99.3%; height: 160px; overflow-y: scroll; font-family: 'Poppins', sans-serif; font-size: 1.4rem; background-color: #f7f7f7; border-style: solid; border-width: 1px; border-color: #23408600 #cacaca #cacaca #cacaca ;">



                            <?php include "php/db.php" ?>

                            <?php
                            $request_filtro_categoria = "SELECT DISTINCT idCategoria, nombre_categoria FROM oferta INNER JOIN categoria_requerido ON oferta.Categoria_idCategoria = categoria_requerido.idCategoria";


                            $resul_filtro_categoria = mysqli_query($connection, $request_filtro_categoria);
                            if (!$resul_filtro_categoria) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($resul_filtro_categoria)) {
                                $db_idCategoria = $row['idCategoria'];
                                $db_nombre_categoria = $row['nombre_categoria'];

                            ?>
                                <div style="padding-left: 1.3rem; padding-top: 1rem;">
                                    <input type="checkbox" id="categories_<?php echo $db_idCategoria ?>" name="catgria[]" value="<?php echo $db_idCategoria ?>">
                                    <label for="categories_<?php echo $db_idCategoria ?>"><?php echo $db_nombre_categoria ?></label><br>
                                </div>
                            <?php
                            }
                            ?>

                        </div>




                        </span>
                    </form>

                </div>
                <div class="col-3-of-4">



                    <?php
                    // Ne
                    $per_page = 6;

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

                    $consulta = "";
                    $consulta_skill = "";
                    $consulta_categoria_filtro = "";
                    $consulta_cargo_filtro = "";
                    $consul1 = "";
                    $cadena_completa = "";
                    $Tipo_trabajo = "";
                    $contador = "";


                    if (isset($_GET['city']) or isset($_GET['Tjob']) or isset($_GET['lng']) or isset($_GET['slro']) or isset($_GET['skill']) or isset($_GET['catgria']) or isset($_GET['fler_full'])) {

                        $contador = 0;

                        $filtro_idCiudad = "oferta.ciudad_idCiudad =";
                        $filtro_Tipo_trabajo = "oferta.tipo_idTipo_trabajo =";
                        $filtro_idLenguage = "oferta.Lenguaje_idLenguaje =";
                        $filtro_idSalario = "oferta.salario_mensual <=";
                        $filtro_idSkill = "habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales =";
                        $filtro_idCategoria = "oferta.Categoria_idCategoria =";
                        $filtro_idCargo = "oferta.titulo_oferta LIKE ";


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


                        if (isset($_GET['Tjob'])) {
                            $Tipo_trabajo = $_GET["Tjob"];

                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa =  "AND " . $filtro_Tipo_trabajo . "'" . $Tipo_trabajo . "'";
                            }
                            if ($contador >= 2) {
                                $cadena_completa =  $cadena_completa . " AND " . $filtro_Tipo_trabajo . "'" . $Tipo_trabajo . "'";
                            }
                        }

                        if (isset($_GET['lng'])) {
                            $length = count($_GET["lng"]);
                            for ($c = 0; $c < $length; $c++) {
                                $consul1 .=  " '" . $_GET["lng"][$c] . "'" . (($c == $length - 1) ? "" : " AND ");
                            }
                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa = "AND " . $filtro_idLenguage . $consul1;
                            }
                            if ($contador >= 2) {
                                $cadena_completa = $cadena_completa . " AND " . $filtro_idLenguage . $consul1;
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

                        if (isset($_GET['skill'])) {
                            $length = count($_GET["skill"]);
                            for ($c = 0; $c < $length; $c++) {
                                $consulta_skill .=  " '" . $_GET["skill"][$c] . "'" . (($c == $length - 1) ? "" : " AND ");
                            }
                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa = "AND " . $filtro_idSkill . $consulta_skill;
                            }
                            if ($contador >= 2) {
                                $cadena_completa = $cadena_completa . " AND " . $filtro_idSkill . $consulta_skill;
                            }
                        }

                        if (isset($_GET['catgria'])) {
                            $length = count($_GET["catgria"]);
                            for ($c = 0; $c < $length; $c++) {
                                $consulta_categoria_filtro .=  " '" . $_GET["catgria"][$c] . "'" . (($c == $length - 1) ? "" : " AND ");
                            }
                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa = "AND " . $filtro_idCategoria . $consulta_categoria_filtro;
                            }
                            if ($contador >= 2) {
                                $cadena_completa = $cadena_completa . " AND " . $filtro_idCategoria . $consulta_categoria_filtro;
                            }
                        }

                        if (isset($_GET['fler_full'])) {
                            $consulta_cargo_filtro = $_GET["fler_full"];

                            $contador = $contador + 1;

                            if ($contador == 1) {
                                $cadena_completa = "AND " . $filtro_idCargo . "'%" . $consulta_cargo_filtro . "%'";
                            }
                            if ($contador >= 2) {
                                $cadena_completa = $cadena_completa . " AND " . $filtro_idCargo . "'%" . $consulta_cargo_filtro . "%'";
                            }
                        }




                        // echo $cadena_completa . "tiene estos filtros activos ". $contador;




                    } else {
                        $id_filter = "";
                    }


                    $post_query_count = "SELECT DISTINCT idOferta, titulo_oferta FROM oferta INNER JOIN empresa ON oferta.Empresa_idEmpresa = empresa.idEmpresa INNER JOIN habilidades_requerida_oferta ON habilidades_requerida_oferta.Oferta_idOferta = oferta.idOferta WHERE aprobado = 1 AND oferta.fecha_expiracion > NOW() AND estado_idEstado = '1' $cadena_completa";
                    $find_count = mysqli_query($connection, $post_query_count);
                    $count = mysqli_num_rows($find_count);

                    $count = ceil($count / $per_page);


                    $all_offer = "SELECT DISTINCT idOferta, idEmpresa, nombre_empresa, func_oculto_nombre, aprobado, titulo_oferta, descripcion_oferta, salario_mensual, fecha_publicacion, ciudad_general, tipo_contrato, fecha_expiracion, func_resaltar, func_urgente FROM oferta INNER JOIN ciudad ON oferta.ciudad_idCiudad = ciudad.idCiudad INNER JOIN tipos_contrato ON oferta.tipo_idContrato = tipos_contrato.idTipo_contrato INNER JOIN empresa ON oferta.Empresa_idEmpresa = empresa.idEmpresa INNER JOIN habilidades_requerida_oferta ON habilidades_requerida_oferta.Oferta_idOferta = oferta.idOferta WHERE empresa.aprobado = 1 AND oferta.fecha_expiracion > NOW() AND estado_idEstado = '1'
                    $cadena_completa limit $page_1, $per_page";




                    $resul_all_offer = mysqli_query($connection, $all_offer);
                    if (!$resul_all_offer) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_array($resul_all_offer)) {
                        $db_idOferta = $row['idOferta'];
                        $db_idEmpresa = $row['idEmpresa'];
                        $db_nombre_empresa = $row['nombre_empresa'];
                        $db_func_oculto_nombre = $row['func_oculto_nombre'];
                        $db_titulo_oferta = $row['titulo_oferta'];
                        $db_description = $row['descripcion_oferta'];
                        $db_salary = $row['salario_mensual'];
                        $db_func_resaltar = $row['func_resaltar'];
                        $db_func_urgente = $row['func_urgente'];
                        $db_fecha_publicacion = $row['fecha_publicacion'];
                        $db_ciudad_oferta = $row['ciudad_general'];
                        $db_tipo_contrato = $row['tipo_contrato'];

                    ?>

                        <?php if ($db_func_resaltar == 1) : ?>
                            <div style="position: absolute; clip-path: polygon(0 0, 0% 100%, 100% 0); background-color: #ecdd00; padding: 2rem;">
                                <i style="font-size: 1.8rem; position: relative; left: -1.2rem; top: -1rem; color: white;" class="fas fa-star"></i>
                            </div>
                        <?php endif ?>

                        <?php if ($db_func_urgente == 1) : ?>
                            <div style="position: absolute; clip-path: polygon(0 0, 0% 100%, 100% 0); background-color: red; padding: 2rem;">
                                <i style="font-size: 1.8rem; position: relative; left: -1.2rem; top: -1rem; color: white;" class="fas fa-star"></i>
                            </div>
                        <?php endif ?>

                        <div style="box-shadow: 0 0.2rem 1rem #d4d4d4; margin-bottom: 2rem; border-style: solid; border-width: 1px; border-color: 
                        <?php
                        if ($db_func_resaltar == 1) {
                            echo "#ecdd00";
                        }
                        if ($db_func_urgente == 1) {
                            echo "#ff0202";
                        }
                        if ($db_func_resaltar == 0 && $db_func_urgente == 0) {
                            echo "#007aff";
                        }

                        ?>
                        ; background-color: #f7f7f7; padding-bottom: 0;" class="story">

                            <div class="row">

                                <div class="col-3-of-4">
                                    <div style="display: inline-flex;">
                                        <div style="padding-left: 3rem; padding-right: 3rem;">


                                            <?php
                                            $nombre_fichero_jpg = 'profile_empleador/profile' . $db_idEmpresa . '.jpg';
                                            $nombre_fichero_jpeg = 'profile_empleador/profile' . $db_idEmpresa . '.jpeg';
                                            $nombre_fichero_png = 'profile_empleador/profile' . $db_idEmpresa . '.png';
                                            $imagen = 0;
                                        

                                            if (file_exists($nombre_fichero_jpg)) {
                                                echo " <div  style='width: 10rem; height: 10rem; color: #0056b4; border-color: #0056b4;  border-radius: 50%; border-width: 1px; margin-top: 15%; font-size: 4rem; text-align: center;'><img  onclick='location.href=\"company.php?empresa=".$db_idEmpresa."\"' src='profile_empleador/profile" . $db_idEmpresa . ".jpg' alt='logo' style='cursor:pointer; width:100%; height:100%;' class='img-main-item'></div>";
                                                $imagen = 1;
                                            }
                                            if (file_exists($nombre_fichero_jpeg)) {
                                                echo " <div  style='width: 10rem; height: 10rem; color: #0056b4; border-color: #0056b4;  border-radius: 50%; border-width: 1px; margin-top: 15%; font-size: 4rem; text-align: center;'><img onclick='location.href=\"company.php?empresa=".$db_idEmpresa."\"' src='profile_empleador/profile" . $db_idEmpresa . ".jpeg' alt='logo' style='cursor:pointer; object-fit: cover;object-position: center center; height: auto; width: 100%;' class='profile-img'></div>";
                                                $imagen = 1;
                                            }
                                            if (file_exists($nombre_fichero_png)) {
                                                echo " <div   style='width: 10rem; height: 10rem; color: #0056b4; border-color: #0056b4;  border-radius: 50%; border-width: 1px; margin-top: 15%; font-size: 4rem; text-align: center;'><img onclick='location.href=\"company.php?empresa=".$db_idEmpresa."\"' src='profile_empleador/profile" . $db_idEmpresa . ".png' alt='logo' style='cursor:pointer; object-fit: cover;object-position: center center; height: auto; width: 100%;' class='profile-img'></div>";
                                                $imagen = 1;
                                            }
                                            if ($imagen == 0) {

                                                echo " <div style='width: 10rem; height: 10rem; color: #0056b4; border-color: #0056b4; border-style: solid; border-radius: 50%; border-width: 1px; margin-top: 15%; font-size: 4rem; text-align: center;'><h1 style='padding-top: 3px; font-weight: 400;'>" . strtoupper($db_titulo_oferta[0]) . "</h1> </div>";
                                            }
                                            ?>



                                        </div>
                                        <div style="padding-left: 0;" class="content-left">
                                            <h3 style="font-size: 1.9rem; font-weight: 600; color: #020202c4;" class="title-short title_company"><?php if ($db_func_urgente == 1) {
                                                                                                                                            echo "<span style='background-color: red; color: white; font-size: 1.3rem; border-radius: 3px; font-weight: 500; padding: 0.1rem 1.1rem 0.1rem 1.1rem; margin-right: 1rem;'>Urgente</span>";
                                                                                                                                        }
                                                                                                                                        echo ucfirst(substr($db_titulo_oferta, 0, 30)) . ".."; ?></h3>
                                            <h4 style="font-size: 1.6rem; font-weight: 400;" class="title_company--sub"><?php

                                                                                                                        if ($db_func_oculto_nombre == "1") {
                                                                                                                            echo ucfirst("Empresa del sector");
                                                                                                                        } else {
                                                                                                                            if (!empty($db_nombre_empresa)) {
                                                                                                                                echo ucfirst($db_nombre_empresa);
                                                                                                                            } else {

                                                                                                                                echo ucfirst("Empresa del sector");
                                                                                                                            }
                                                                                                                        }
                                                                                                                        ?>
                                            </h4>
                                            <p style="font-size: 1.4rem;" class="show-read-more title_country"><?php echo ucfirst(substr($db_description, 0, 180)) . ".."; ?></p>

                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1-of-4">
                                    <div style="text-align: left; margin-top: 7%;" class="content-right">
                                        <h4 style="font-size: 1.3rem; color: gray; margin-bottom: .4rem;" class="title_country"><i style="padding-right: 1.8rem; color: #007aff;" class="fas fa-dollar-sign"></i> <?php echo number_format($db_salary, 0, ' ', '.'); ?></h4>
                                        <h3 style="font-size: 1.3rem; color: gray; margin-bottom: .4rem" class="title_country"><i style="padding-right: 1rem; color: #007aff;" class="far fa-map"></i> <?php echo $db_ciudad_oferta ?></h3>
                                        <h3 style="font-size: 1.3rem; color: gray; margin-bottom: .4rem" class="title_country"><i style="padding-right: 1.3rem; color: #007aff;" class="far fa-calendar-alt"></i>
                                            <?php
                                            $date = new DateTime($db_fecha_publicacion);
                                            echo $date->format('Y/m/d');
                                            ?>
                                        </h3>
                                        <h5 class="title_country"><i style="padding-right: 1.4rem; color: #007aff;" class="far fa-file"></i> <?php echo $db_tipo_contrato ?></h5>
                                        <a onclick="oferta_detalle(<?php echo $db_idOferta ?>)" style="background-color: #2962ff; padding: .9rem 1.5rem; font-size: 1.2rem; height: auto;" class="btn-oferta btn-oferta--blue u-margin-top-2"><?php echo $lang["ofertas_apply"] ?></a>
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="background-color: #2962ff; height: 5rem;">
                                                <ul style="margin-top: 1rem; padding-top: 2rem; padding-left: 3rem;" id="skills" class="lista-habilidades">

                                                    <?php
                                                    $query_skills = "SELECT habilidades_generales.nombre_habilidad_general 
                                FROM `habilidades_requerida_oferta` 
                                INNER JOIN habilidades_generales 
                                ON habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales 
                                WHERE Oferta_idOferta = '$db_idOferta' LIMIT 4";

                                                    $result_skills = mysqli_query($connection, $query_skills);
                                                    if (!$result_skills) {
                                                        die("QUERY FAILED" . mysqli_error($connection));
                                                    }
                                                    while ($row = mysqli_fetch_array($result_skills)) {
                                                        $name_skill = $row['nombre_habilidad_general'];
                                                    ?>
                                                        <li style="font-size: 0.9rem; border-width: 1px; color: white; border-color: white; background-color: #0000ff0d;"><?php echo $name_skill; ?></li>

                                                    <?php
                                                    }

                                                    ?>


                                                </ul>
                                            </div>
                        </div>





                    <?php
                    }
                    ?>


    <!--                 <script>
          /*               var maxLength = 150;
                        $(".show-read-more").each(function() {
                            var myStr = $(this).text();
                            if ($.trim(myStr).length > maxLength) {
                                var newStr = myStr.substring(0, maxLength);
                                var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                                $(this).empty().html(newStr + "..");
                                $(this).append(' <a href="javascript:void(0);" class="read-more"></a>');
                                $(this).append('<span class="more-text">' + removedStr + '</span>');
                            }
                        });
                        $(".read-more").click(function() {
                            //   $(this).siblings(".more-text").contents().unwrap();
                            //   $(this).remove();
                        }); */

          
                     

                    </script> -->


                    <script>
                        function oferta_detalle(id_oferta) {

                            url = "../php/update_status_candidato.php?ofer=" + id_oferta;
                            $.ajax({
                                url: url,
                                beforeSend: function(objeto) {

                                },
                                success: function(data) {

                                    location.href = "detalle_oferta.php?ofer=" + id_oferta;
                                }
                            })
                        }
                    </script>


                    <ul class="pager list_pagination">

                        <?php


                        if (isset($_GET["page"])) {
                            $current_page_active = $_GET["page"];
                        } else {
                            $current_page_active = 1;
                        }


                        $desde = $current_page_active - 1;
                        $hasta = $current_page_active + 1;

                        for ($i = 1; $i <= $count; $i++) {

                            if ($i == 1 || $i == $count || ($i >= $desde && $i <= $hasta)) {
                                echo "<li class='pagination-group'><a id='page_$i' class='pagination-option' href='ofertas.php?page={$i}'>{$i}</a></li>";
                            }
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
            </div>
        </section>

    </main>




    <?php include "footer.php"; ?>

    <?php include "popup.php"; ?>






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

</body>

</html>