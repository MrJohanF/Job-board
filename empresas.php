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
    <script src="/js/tools.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/icon-font.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="package/css/swiper.min.css">
    <link href="/css/awesomefont/css/all.min.css" rel="stylesheet"> 
    <script type="text/javascript" src="/js/jquery-3.6.0.js"></script>
   
    <script src="/js/tools.js"></script>


    <title>TuJob</title>
</head>

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

                        <ul class="footer_list">
                            <li class="main__item"><a href="Inicio" class="main__link"><?php echo $lang["nav_bar-home"] ?></a></li>
                            <li class="main__item"><a href="Ofertas" class="main__link"><?php echo $lang["nav_bar-findjob"] ?></a></li>
                            <li class="main__item"><a href="Empresas" class="main__link"><?php echo $lang["nav_bar-company"] ?></a></li>
                            <li class="main__item"><a href="Contactanos" class="main__link"><?php echo $lang["nav_bar-contact"] ?></a></li>

                            <?php error_reporting(E_ALL ^ E_NOTICE);
                            if (isset($_SESSION['e_idEmpresa'])) : ?>

                                <a href="dashboard_empleador.php#home" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2">Dashboard</a>
                                <a href="php/logout_empleador.php" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2">Logout</a>
                            <?php else : ?>
                                <a href="#popup" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2"><?php echo $lang["button_sign-in"] ?></a>
                                <a href="#register" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><?php echo $lang["button_register"] ?></a>
                            <?php endif; ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="u-margin-top-4">
                <div class="header-browser__line-vertical">
                    <h1 class="header-browser__title"><?php echo $lang["empresa"] ?></h1>
                    <h2 class="header-browser__subtitle"><?php echo $lang["empresa_inicio_empresas"] ?></h2>
                </div>
            </div>
        </div>

    </header>


    <main style="margin-left: 0; padding: 0;">


        <section style="position: inherit; padding-top: 2rem; padding-bottom: 2rem;" class="section-stories">

            <div class="u-center-text u-margin-botton-8 u-margin-top-2">
                <h2 class="heading-secondary-3"><span class="heading-color-blue"><?php echo $lang["empresa_title_top_banner"] ?></span></h2>
                <h2 class="heading-secondary-3"><?php echo $lang["empresa_subtitle_top_banner"] ?></h2>
                <div style="margin-top: 2rem;">
                    <a href="#popup" style="border-radius: 4rem; background-color: #ffe57b; padding: 1.85rem 2.6rem;" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2"><?php echo $lang["empresa_sign_up_free"] ?></a>
                </div>

            </div>



            <div style="height: 55rem; background-image: url(../img/man2.jpg); background-size: cover; background-position-y: -24rem; opacity: 0.1;" class="bg-video">

                <div class="u-center-text u-margin-botton-8 ">
                    <h2 class="heading-secondary-dark">
                    <?php echo $lang["empresa_best_features"] ?>
                    </h2>

                </div>

            </div>
        </section>


        <section style="position: inherit;" class="section-stories">

            <div class="u-center-text u-margin-botton-8 u-margin-top-2">
                <h2 class="heading-secondary-3"><?php echo $lang["empresa_find_talents"] ?><span class="heading-color-blue"><?php echo $lang["empresa_technological"] ?></span></h2>

            </div>

            <div class="row">
                <div class="col-1-of-3">

                    <div class="feature-dashboard" style="cursor: pointer;">
                        <div class="icon_performance-dashboard u-margin-botton-2">
                            <img class="icon_performance-dashboard-container" src="img/blog.png" alt="high-performance">
                        </div>
                        <h3 class="heading-tertiary-small"><?php echo $lang["empresa_publish_your_vacancies"] ?></h3>
                        <p style="color: gray; margin-top: .4rem;" class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang["empresa_publish_your_vacancies_description"] ?></p>
                        <p style="margin-top: 1.5rem;" class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang["empresa_more_information"] ?></p>

                    </div>

                </div>
                <div class="col-1-of-3">
                    <div class="feature-dashboard" style="cursor: pointer;">

                        <div class="icon_performance-dashboard u-margin-botton-2">
                            <img class="icon_performance-dashboard-container" src="img/lupa.png" alt="high-performance">
                        </div>
                        <h3 class="heading-tertiary-small"><?php echo $lang["empresa_search_in_databases"] ?></h3>
                        <p style="color: gray; margin-top: .4rem;" class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang["empresa_search_in_databases_description"] ?></p>
                        <p style="margin-top: 1.5rem;" class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang["empresa_more_information"] ?></p>

                    </div>
                </div>
                <div class="col-1-of-3">

                    <div class="feature-dashboard" style="cursor: pointer;">
                        <div class="icon_performance-dashboard u-margin-botton-2">
                            <img class="icon_performance-dashboard-container" src="img/bombilla.png" alt="high-performance">
                        </div>
                        <h3 class="heading-tertiary-small"><?php echo $lang["empresa_employer_brand"] ?></h3>
                        <p style="color: gray; margin-top: .4rem;" class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang["empresa_employer_brand_description"] ?></p>
                        <p style="margin-top: 1.5rem;" class="heading-tertiary heading-tertiary__subtitle heading-tertiary__subtitle--blue"><?php echo $lang["empresa_more_information"] ?></p>
                    </div>

                </div>
            </div>


        </section>


        <section class="section-stories">

            
                <div style="height: 66%; background-image: url(../img/man2.jpg); background-size: cover; background-position-y: -24rem;">

                    <div style="padding-top: 5rem;" class="u-center-text u-margin-botton-2">
                        <h2 class="heading-secondary-dark">
                        <?php echo $lang["empresa_how_it_works"] ?>                      
                        </h2>
                       

                        <div style="margin-top: 2rem; padding-bottom: 5rem;">
                            <a href="#popup" style="border-radius: 4rem; background-color: #ffe57b; padding: 1.85rem 2.6rem;" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2"> <?php echo $lang["empresa_button_register"] ?></a>
                        </div>

                    </div>



                </div>

          

            <div style="margin-top: 10rem;" class="row">
                <div style="padding-top: 2rem;" class="u-center-text u-margin-botton-4">
                    <h2 class="heading-secondary-dark">
                        <span class="heading-color-blue"><?php echo $lang["empresa_why_empleatic"] ?></span>
                    </h2>

                </div>
            </div>

            <div class="row">
                <div class="col-1-of-3">
                    <div class="u-center-text u-margin-botton-8 u-margin-top-2" style="border-right: solid; border-right-color: #0cadec; border-right-width: 1px;">
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_specialized_in_ict']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_remote_ict_talent']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_highlight_your_offers']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_automatic_update_vacancies']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_filters_skills_others']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_metamotors']?></h2>

                    </div>
                </div>
                <div class="col-1-of-3">
                    <div class="u-center-text u-margin-botton-8 u-margin-top-2" style="border-right: solid; border-right-color: #0cadec; border-right-width: 1px;">
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_it_profiles_candidate_database']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_personalized_site_vacancies']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_verified_candidates']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_Reduction_recruitment_times']?></h2>

                    </div>
                </div>
                <div class="col-1-of-3">
                    <div class="u-center-text u-margin-botton-8 u-margin-top-2">
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_quick_contact_social_networks']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_candidate_management']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_university alliances']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_it_salary_studies']?></h2>
                        <h2 style="font-size: 2rem; color: #a4a5a4; font-weight: 300; padding-bottom: 0.8rem;" class="heading-secondary-3"><?php echo $lang['empresa_invitation_bd_selection_processes']?></h2>
                    </div>
                </div>
            </div>

        </section>



        <section style="padding-top: 6rem;" class="section-stories">



            <div style="height: 100%; background-image: url(../img/background-blue.jpg); background-size: cover; background-position-y: -24rem; opacity: 1; position: relative;" class="bg-video">


                <div class="row">
                    <div class="col-3-of-4">
                        <div style="padding-top: 7.9rem;" class="u-center-text u-margin-botton-8 ">
                            <h2 style="color: white;" class="heading-secondary-dark">
                                <?php echo $lang['empresa_ready_start_recruiting_employment']?>
                            </h2>
                        </div>

                    </div>
                    <div class="col-1-of-4">
                        <div style="margin-top: 6.1rem;">
                            <a href="#popup" style="border-radius: 4rem; background-color: #ffe57b; padding: 1.85rem 2.6rem;" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2"><?php echo $lang['empresa_sign_up_free']?></a>
                        </div>
                    </div>
                </div>




            </div>

        </section>


        <section class="section-staff">

            <div class="title_section-staff u-center-text">
                <h3 class="heading-subtitle"><?php echo $lang['empresa_our_associates']?></span> </h3>
                <h5 class="heading-secondary-2 u-margin-botton-8"><?php echo $lang['empresa_what_waiting_join']?></h5>
            </div>



            <div class="swiper-container">
                <div class="swiper-wrapper u-margin-botton-8">

                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" style="width: 45rem;">
                        <div class="content">
                            <div class="description">
                                <div class="icon_performance-dashboard u-margin-botton-2">
                                    <img class="icon_performance-dashboard-container" src="img/youtube.png" alt="high-performance">
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>

        </section>





    </main>

    <?php include "footer.php"; ?>

    <?php include "empleador/pupop.php"; ?>

    <!-- Swiper JS -->
    <script src="../package/js/swiper.min.js"></script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            initialSlide: 5,
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


</body>

</html>