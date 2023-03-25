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
<html>

<head>


    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>TuJob</title>

    <meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1'>
    <link rel="stylesheet" href="css/styles.css">
    <script src="/js/tools.js"></script>
    <link rel="stylesheet" href="package/css/swiper.min.css">

    <link href="/css/awesomefont/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery-3.6.0.js"></script>
    <script src="/js/type_effect.js"></script>
    <script type="text/javascript" src="/js/selectlist.js"></script>
    <link rel="stylesheet" href="css/icon-font.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
</head>



<style>
    .show-read-more .more-text {
        display: none;
    }
</style>



<body>


    <?php include "loader.php"; ?>


    <script>
        $(document).ready(function() {

            let maxLength = 150;
            $(".show-read-more").each(function() {
                let myStr = $(this).text();
                if ($.trim(myStr).length > maxLength) {
                    let newStr = myStr.substring(0, maxLength);
                    let removedStr = myStr.substring(maxLength, $.trim(myStr).length);
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





    <header class="header" id="main">


        <div class="row">
            <div class="main_content">
                <div class="col-1-of-3">
                    <div style="display: inline-flex; padding-top: 3rem;">

                        <img style="height: 3.5rem; padding-left: 2rem; padding-right: 4rem;" src="img/emplea_logo.webp" alt="logo" class="header-browser__logo">

                    </div>

                </div>
                <div class="col-2-of-3">

                    <?php include "header.php"; ?>


                    <div>

                        <form id="form_lang" method="POST">
                            <select style="display: none; visibility: hidden;" name="lang" id="select_lang">
                                <option value="es">lang</option>
                                <option value="en">lang</option>
                            </select>
                        </form>




                        <script>

                            let ddData = [];

                            let lang = "<?php if (isset($_SESSION["lang"])) {
                                            echo $_SESSION["lang"];
                                        } else {
                                            echo "es";
                                        } ?>";
                            contador = 0;

                            if (lang) {
                                if (lang === "en") {
                                    let ddData = [{
                                            text: "EN",
                                            value: 'en',
                                            selected: true,
                                            description: "",
                                            imageSrc: "img/en.png"
                                        },
                                        {
                                            text: "ES",
                                            value: 'es',
                                            selected: false,
                                            description: "",
                                            imageSrc: "img/es.png"
                                        }
                                    ];

                                }
                                if (lang === "es") {

                                    ddData = [{
                                            text: "IN",
                                            value: 'en',
                                            selected: false,
                                            description: "",
                                            imageSrc: "img/en.png"
                                        },
                                        {
                                            text: "ES",
                                            value: 'es',
                                            selected: true,
                                            description: "",
                                            imageSrc: "img/es.png"
                                        }
                                    ];
                                }

                            }

                            $('#demoBasic').ddslick({
                                data: ddData,
                                width: 90,
                                imagePosition: "right",
                                selectText: "Idioma",

                                onSelected: function(data) {
                                    let valor = data['selectedData']['value'];

                                    let formvalue = document.getElementById("select_lang").value = valor;

                                    contador = contador + 1;


                                    if (contador > 1) {

                                        setTimeout(function() {
                                            $('#demoSetSelected').ddslick('destroy');
                                            document.getElementById("form_lang").submit();
                                        }, 100);
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="container_header">


                <div class="container_header_left_text">
                    <h1 class="heading-primary">
                        <span class="heading-primary-main--title"><?php echo $lang["title"] ?></span>
                        <div class="heading-primary-main--secundary">
                            <ul>
                                <li><?php echo $lang["subtitle-option-1"] ?></li>
                                <li><?php echo $lang["subtitle-option-2"] ?></li>
                                <li><?php echo $lang["subtitle-option-3"] ?></li>
                            </ul>
                        </div>
                        <span class="heading-primary-main--description"><?php echo $lang["description"] ?>
                        </span>

                    </h1>
                </div>




                <div style="background: white; height: 45rem; border-radius: 1rem; justify-self: center; margin: 2rem;" class="search-bar">

                    <div style="padding: 3rem;">
                        <div>

                            <h1 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 2rem;"><?php echo $lang["filter_title_subtile"] ?></h1>
                        </div>
                        <div>
                            <input id="positionFilter" style="width: 90%; height: 4.5rem; margin-top: 1.5rem; padding-left: 2rem; border-color: #dfdede; border-width: 1px; border-style: solid;" type="text" placeholder="Estoy buscando...">
                            <select id="cityFilter" style="width: 90%; height: 4.5rem; margin-top: 1.5rem; padding-left: 2rem; border-color: #dfdede; border-width: 1px; border-style: solid;" type="text" placeholder="Ciudad">

                                <?php
                                include "php/db.php";

                                $all_cities = "SELECT * FROM ciudad where pais_idPais = 1";

                                $resul_all_cities = mysqli_query($connection, $all_cities);


                                if (!$resul_all_cities) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }


                                while ($row = mysqli_fetch_array($resul_all_cities)) {
                                    $db_idCitie = $row['idCiudad'];
                                    $db_nombre_citie = $row['ciudad_general'];

                                ?>

                                    <option value="<?php echo $db_idCitie ?>"><?php echo $db_nombre_citie ?></option>
                                <?php
                                }
                                ?>



                            </select>
                        </div>
                        <div style="margin-top: 3.2rem;">
                            <h2 style="font-family: 'Poppins', sans-serif; "><?php echo $lang["filter_Salary_Range"] ?></h1>
                                <h3 style="font-family: 'Poppins', sans-serif; font-weight: 300; margin-top: 0.5rem;">$<span id="rangeValue1">800.000</span> - $15.000.000</h1>

                                    <div style="margin-top: 2rem;">

                                        <input id="range_salary_filter" step="100000" style="width: 95%;" type="range" min="0" max="15000000" value="800000">

                                        <script>
                                            let slider = document.getElementById("range_salary_filter");
                                            let output = document.getElementById("rangeValue1");



                                            slider.oninput = function() {
                                                output.innerHTML = this.value;
                                                output.innerHTML = this.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                            }
                                        </script>
                                    </div>

                        </div>


                        <div style="margin-top: 2rem;">
                            <button type="button" onclick="filterIndex()" style="margin-left: 0;" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><?php echo $lang["filter_Salary_search"] ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </header>


    <script>
        let active_nav = 0;


        $('.btn_input_main').click(function() {

            active_nav = active_nav + 1;

            if (active_nav == 1) {
                $('.header__content-left').css({
                    "top": "32rem",
                    "transition": "top 0.4s",
                });
            }

            if (active_nav == 2) {
                setTimeout(function() {
                    $('.header__content-left').css({
                        "top": "18rem",
                        "transition": "top 0.4s",
                    });
                }, 70);
                active_nav = 0;
            }


        });
    </script>



    <main>
        <section style="padding-top: 23rem;" class="section-about">
        
            <div class="row">
                <div style="padding-bottom: 1rem;" class="container_section_about">

                    <div class="container_section_content">

                        <h3 class="heading-tertiary u-margin-botton-1"><?php echo $lang["section_categories-main"] ?></h3>
                        <h3 class="heading-subtitle u-margin-botton-2"><?php echo $lang["section_categories-title-categories"] ?><span><?php echo $lang["section_categories-categories"] ?></span> </h3>
                        <p class="paragraph"><?php echo $lang["section_categories-description"] ?></p>


                        <div class="u-margin-top-6">
                            <a href="#" class="btn btn--yellow"><?php echo $lang["section_categories-button"] ?></a>
                        </div>

                    </div>

                    <div>

                        <div class="container_composition">

                            <div class="composition__photo composition__photo--p1">


                                <div class="novedad">
                                    <i class="novedad__icon1 icon-basic-smartphone"></i>
                                    <h3 class="heading-tertiary-2 u-margin-botton-2"><?php echo $lang["section_categories-item-1"] ?></h3>
                                    <p class="feature-box__text"><?php echo $lang["section_categories-item-1-description"] ?></p>
                                </div>

                            </div>
                            <div class="composition__photo composition__photo--p2">

                                <div class="novedad">
                                    <i class="novedad__icon1 icon-basic-display"></i>
                                    <h3 class="heading-tertiary-2 u-margin-botton-2"><?php echo $lang["section_categories-item-2"] ?></h3>
                                    <p class="feature-box__text"><?php echo $lang["section_categories-item-2-description"] ?></p>
                                </div>

                            </div>
                            <div class="composition__photo composition__photo--p3">
                                <div class="novedad">
                                    <i class="novedad__icon1 icon-basic-video"></i>
                                    <h3 class="heading-tertiary-2 u-margin-botton-2"><?php echo $lang["section_categories-item-3"] ?></h3>
                                    <p class="feature-box__text"><?php echo $lang["section_categories-item-3-description"] ?></p>
                                </div>

                            </div>
                            <div class="composition__photo composition__photo--p4">
                                <div class="novedad">
                                    <i class="novedad__icon1 icon-basic-todo-pen"></i>
                                    <h3 class="heading-tertiary-2 u-margin-botton-2"><?php echo $lang["section_categories-item-4"] ?></h3>
                                    <p class="feature-box__text"><?php echo $lang["section_categories-item-4-description"] ?></p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
        </section>





        <section class="section-stories">




            <?php include "php/db.php" ?>

            <?php
            $latest_offer = "SELECT oferta.fecha_publicacion, oferta.idOferta, oferta.titulo_oferta, descripcion_oferta, oferta.salario_mensual, ciudad_general, oferta.ciudad_idCiudad, tipo_contrato, fecha_publicacion, func_urgente
            FROM oferta  INNER JOIN ciudad ON oferta.ciudad_idCiudad = ciudad.idCiudad INNER JOIN tipos_contrato ON oferta.tipo_idContrato = tipos_contrato.idTipo_contrato 
            WHERE DATE(oferta.fecha_publicacion) = DATE(NOW()) LIMIT 4";

            $resul_latest_offer = mysqli_query($connection, $latest_offer);
            if (!$resul_latest_offer) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            $counter_loop = 0;

            while ($row = mysqli_fetch_array($resul_latest_offer)) {
                $db_idOferta = $row['idOferta'];
                $db_titulo_oferta = $row['titulo_oferta'];
                $db_description = $row['descripcion_oferta'];
                $db_func_urgente = $row['func_urgente'];
                $db_salary = $row['salario_mensual'];
                $db_ciudad_oferta = $row['ciudad_general'];
                $db_tipo_contrato = $row['tipo_contrato'];
                $db_fecha_publicacion = $row['fecha_publicacion'];
                if ($counter_loop == 0) {
            ?>

                    <div class="u-center-text u-margin-botton-8 u-margin-top-2">
                        <h2 class="heading-secondary-3"><?php echo $lang["section_lastest-position-title"] ?><span class="heading-color-blue"><?php echo $lang["title_general"] ?></span></h2>
                        <h5 class="heading-secondary-2"><?php echo $lang["section_lastest-position-subtitle"] ?></h5>

                    </div>


                <?php
                    $counter_loop++;
                }
                ?>



                <div class="row">
                    <div class="container_card_role">

                        <div class="container_card_role__circle">
                            <h1 class="container_card_role__circle--letter"><?php echo  strtoupper($db_titulo_oferta[0]);  ?>
                            </h1>
                        </div>




                        <div class="container_card_role__content">
                            <h3 style="font-size: 1.9rem; font-weight: 600; color: #020202c4;" class="title_company"><?php if ($db_func_urgente == 1) {
                                                                                                                            echo "<span style='background-color: red; color: white; font-size: 1.3rem; border-radius: 3px; font-weight: 500; padding: 0.1rem 1.1rem 0.1rem 1.1rem; margin-right: 1rem;'>Urgente</span>";
                                                                                                                        }
                                                                                                                        echo ucfirst($db_titulo_oferta); ?></h3>
                            <h4 style="font-size: 1.6rem; font-weight: 400;" class="title_company--sub"><?php echo ucfirst($db_titulo_oferta); ?></h4>
                            <p style="font-size: 1.4rem;" class="show-read-more title_country"><?php echo ucfirst($db_description); ?></p>


                        </div>

                        <div class="container_card_role__footer">


                            <div>
                                <span class="container_card_role__footer--opt1"> <?php echo $db_salary ?></span>
                            </div>

                            <div>
                                <span class="container_card_role__footer--opt2"> <?php echo $db_ciudad_oferta ?></span>
                            </div>

                            <div>
                                <span class="container_card_role__footer--opt3">
                                    <?php
                                    $date = new DateTime($db_fecha_publicacion);
                                    echo $date->format('d/m/Y')
                                    ?>
                                </span>
                            </div>

                            <div>
                                <span class="container_card_role__footer--opt4"> <?php echo $db_tipo_contrato ?></span>
                            </div>

                        </div>


                        <div class="container_card_role__btn">
                            <a onclick="oferta_detalle(<?php echo $db_idOferta ?>)" style="padding: .9rem 1.5rem; font-size: 1.2rem; height: auto;" class="btn-oferta btn-oferta--blue u-margin-top-2">Ver Mas</a>
                        </div>


                        <div class="container_card_role__skills">
                            <ul style="margin-top: 2rem;" id="skills" class="lista-habilidades">

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
                                    <li style="border-width: 0; color: #0056b4ab; background-color: #0000ff0d;"><?php echo $name_skill; ?></li>

                                <?php
                                }

                                ?>


                            </ul>
                        </div>


                    </div>
                </div>




                   <div class="row">
                    <div class="story">
                        <div class="row">
                            <div class="col-1-of-2">
                                <div class="content-left">
                                    <div class="company_img">
                                        <img src="img/company__logo.jpg" alt="Negocios" class="company__img--p1">
                                    </div>
                                    <h3 class="title_company"><?php echo $db_ciudad_oferta ?></h3>
                                    <h4 class="title_company--sub"><?php echo $db_titulo_oferta ?></h4>
                                    <h5 class="show-read-more title_country"><?php echo $db_description ?></h5>
                                    <ul id="skills" class="lista-habilidades">
                                        <?php
                                        $query_skills = "SELECT habilidades_generales.nombre_habilidad_general 
                                FROM `habilidades_requerida_oferta` 
                                INNER JOIN habilidades_generales 
                                ON habilidades_requerida_oferta.Habilidades_generales_idHabilidades_generales = habilidades_generales.idHabilidades_generales 
                                WHERE Oferta_idOferta = '$db_idOferta'";

                                        $result_skills = mysqli_query($connection, $query_skills);
                                        if (!$result_skills) {
                                            die("QUERY FAILED" . mysqli_error($connection));
                                        }
                                        while ($row = mysqli_fetch_array($result_skills)) {
                                            $name_skill = $row['nombre_habilidad_general'];
                                        ?>

                                            <li><?php echo $name_skill; ?></li>

                                        <?php
                                        }

                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-1-of-2">
                                <div class="content-right">
                                    <h3 class="title_country">remuneracion</h3>
                                    <h4 class="title_company--sub">$ <?php echo $db_salary ?></h4>
                                    <h5 class="title_country">6 meses</h5>
                                    <a href="#" class="btn btn--blue-dark u-margin-top-2"><?php echo $lang["botton-apply"] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

            <?php
            }
            ?>
        </section>

        <section class="section-features">

            <div class="u-center-text u-margin-botton-4 u-margin-top-2">
                <h2 class="heading-secondary">
                    <?php echo $lang["section_best_features"] ?>
                </h2>

            </div>


            <div class="row">

                <div class="container_feature-box">

                    <div>
                        <div class="feature-box">
                            <div class="icon_performance u-margin-botton-2">
                                <img class="icon_performance-container" src="img/features/feature_1.png" alt="high-performance">
                            </div>
                            <h3 class="heading-tertiary-1 u-margin-botton-2"><?php echo $lang["section_skills-title-1"] ?></h3>
                            <p class="feature-box__text">
                                <?php echo $lang["section_skills-1"] ?>
                            </p>

                        </div>
                    </div>
                    <div>
                        <div class="feature-box">
                            <div class="icon_performance u-margin-botton-2">
                                <img class="icon_performance-container" src="img/features/feature_2.png" alt="dashboard">
                            </div>
                            <h3 class="heading-tertiary-1 u-margin-botton-2"><?php echo $lang["section_skills-title-2"] ?></h3>
                            <p class="feature-box__text">
                                <?php echo $lang["section_skills-2"] ?>
                            </p>

                        </div>
                    </div>
                    <div>
                        <div class="feature-box">
                            <div class="icon_performance u-margin-botton-2">
                                <img class="icon_performance-container" src="img/features/feature_3.png" alt="meeting">
                            </div>
                            <h3 class="heading-tertiary-1 u-margin-botton-2"><?php echo $lang["section_skills-title-3"] ?></h3>
                            <p class="feature-box__text">
                                <?php echo $lang["section_skills-3"] ?>
                            </p>

                        </div>
                    </div>
                    <div>
                        <div class="feature-box">
                            <div class="icon_performance u-margin-botton-2">
                                <img class="icon_performance-container" src="img/features/feature_4.png" alt="reminder">
                            </div>
                            <h3 class="heading-tertiary-1 u-margin-botton-2"><?php echo $lang["section_skills-title-4"] ?></h3>
                            <p class="feature-box__text">
                                <?php echo $lang["section_skills-4"] ?>
                            </p>

                        </div>
                    </div>
                </div>
            </div>


        </section>

        <section class="section-promotion">
            <!--   <div class="u-center-text u-margin-botton-8 u-margin-top-8">
                <h2 class="heading-secondary">
                     mejores caracteristicas
                 </h2>   
            </div>
-->
            <div style="visibility: hidden; display: none;" class="row">
                <div class="container_promotion">
                    <div>

                        <h3 class="heading-tertiary u-margin-botton-1"><?php echo $lang["section_app-main"] ?></h3>
                        <h3 class="heading-subtitle u-margin-botton-2"><?php echo $lang["section_app-title"] ?><span><?php echo $lang["title_general"] ?></span> </h3>
                        <p class="paragraph"><?php echo $lang["section_app-description"] ?></p>


                        <ul id="features-app">
                            <li><?php echo $lang["section_app-options-1"] ?></li>
                            <li><?php echo $lang["section_app-options-2"] ?></li>
                            <li><?php echo $lang["section_app-options-3"] ?></li>
                            <li><?php echo $lang["section_app-options-4"] ?></li>
                        </ul>


                        <p class="paragraph u-margin-top-4"><?php echo $lang["section_app-subdescription"] ?></p>


                        <div class="botones u-margin-top-6">
                            <a href="#" class="btn-cuadrado btn-cuadrado--green"><?php echo $lang["section_app-button"] ?></a>
                        </div>

                    </div>



                    <div class="promotion-img">
                        <img src="img/phone.png" alt="Negocios" class="promotion-img--p1">
                    </div>



                </div>
            </div>

        </section>


        <section class="section-staff">

            <div class="title_section-staff u-center-text">
                <h3 class="heading-subtitle"><?php echo $lang["section_best-employers-title"] ?><span><?php echo $lang["title_general"] ?></span> </h3>
                <h5 class="heading-secondary-2 u-margin-botton-8"><?php echo $lang["section_best-employers-subtitle"] ?></h5>
            </div>



            <div class="swiper-container">
                <div class="swiper-wrapper u-margin-botton-8">

                    <?php
                    $latest_candidato = "SELECT candidato.idCandidato, candidato.verificado_candidato, candidato.nombre, candidato.apellido, ciudad.ciudad_general, candidato.cargo_deseado, candidato.verificado_candidato
            FROM `candidato` INNER JOIN ciudad on candidato.ciudad = ciudad.idCiudad LIMIT 5";

                    $resul_latest_candidato = mysqli_query($connection, $latest_candidato);
                    if (!$resul_latest_candidato) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                    while ($row = mysqli_fetch_array($resul_latest_candidato)) {
                        $db_idCandidato = $row['idCandidato'];
                        $db_nombre_candidato = $row['nombre'];
                        $db_apellido_candidato = $row['apellido'];
                        $db_nacionalidad = $row['ciudad_general'];
                        $db_candidato_verificado = $row['verificado_candidato'];
                        $db_cargo_deseado = $row['cargo_deseado'];
                        $db_verificado_candidato = $row['verificado_candidato'];

                    ?>

                        <div class="swiper-slide" style="width: 45rem;">
                            <div class="content">
                                <div class="description">
                                    <h2 class="position__author "><?php echo ucfirst($db_nombre_candidato); ?> <?php echo ucfirst($db_apellido_candidato) ?>
                                        <?php if ($db_verificado_candidato == 1) {
                                            echo "<i class='fas fa-check-circle'></i>";
                                        } else {
                                        } ?>
                                    </h2>
                                    <h3 class="position__name "><?php echo $db_cargo_deseado ?></h3>
                                    <h3 class="position__name "><?php echo $db_nacionalidad ?></h3>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>


                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>

        </section>


    </main>




    <?php include "footer.php"; ?>
    <?php include "popup.php"; ?>




    <script src="/js/main.js"></script>




    <!-- Swiper JS -->
    <script src="../package/js/swiper.min.js"></script>

    <script>
        let swiper = new Swiper('.swiper-container', {
            initialSlide: 1,
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>


    <script>
   

            let $input = $("#positionFilter");


     

            $input.typed({
                strings: ["<?php echo $lang["subtitle-option-1"] ?>",
                    "<?php echo $lang["subtitle-option-2"] ?>",
                    "<?php echo $lang["subtitle-option-3"] ?>"
                ],
                typeSpeed: 100,
                backDelay: 3000,
                loop: true
            });
    
    

        function filterIndex() {
            positionFilter = document.getElementById("positionFilter").value;

            range_salary = $("#range_salary_filter").val();


            cityFilter = document.getElementById("cityFilter").value;

            if (positionFilter != "") {
                window.location.href = "ofertas.php?city%5B%5D=" + cityFilter + "&fler_full=" + positionFilter + "&slro=" + range_salary;
            } else {
                window.location.href = "ofertas.php?city%5B%5D=" + cityFilter + "&slro=" + range_salary;
            }

            console.log(cityFilter + " = " + positionFilter);
        }




    </script>



</body>

</html>