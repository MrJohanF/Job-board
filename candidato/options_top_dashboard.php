<div class="row">
    <div class="main_content">
        <div class="col-1-of-3">
            <div onclick="openCity(event, '#dashboard')" style="cursor: pointer;">
                <img style="height: 3.5rem;" src="img/emplea_logo_azul.webp" alt="logo" class="header-browser__logo">
            </div>
        </div>
        <div class="col-2-of-3">
            <div class="main_options-dashboard">
                <ul class="footer_list">
                    <li class="main__item"><a href="Inicio" class="main__link main__link--dark"><?php echo $lang['nav_bar-home']?></a></li>
                    <li class="main__item"><a href="Ofertas" class="main__link main__link--dark"><?php echo $lang['nav_bar-findjob']?></a></li>
                    <li class="main__item"><a href="Empresas" class="main__link main__link--dark"><?php echo $lang['nav_bar-company']?></a></li>
                    <li class="main__item"><a href="Contactanos" class="main__link main__link--dark"><?php echo $lang['nav_bar-contact']?></a></li>

                    <div class="container-profile">
                        <?php


                        $nombre_fichero_jpg = 'uploads/profile' . $_SESSION['s_id_candidato'] . '.jpg';
                        $nombre_fichero_jpeg = 'uploads/profile' . $_SESSION['s_id_candidato'] . '.jpeg';
                        $nombre_fichero_png = 'uploads/profile' . $_SESSION['s_id_candidato'] . '.png';
                        $imagen = 0;
                        if (file_exists($nombre_fichero_jpg)) {
                            echo "<img src='uploads/profile" . $_SESSION['s_id_candidato'] . ".jpg' alt='logo' style='margin-left: -1rem;' class='img-main-item'>";
                            $imagen = 1;
                        }
                        if (file_exists($nombre_fichero_jpeg)) {
                            echo "<img src='uploads/profile" . $_SESSION['s_id_candidato'] . ".jpeg' alt='logo' style='margin-left: -1rem;' class='img-main-item'>";
                            $imagen = 1;
                        }
                        if (file_exists($nombre_fichero_png)) {
                            echo "<img src='uploads/profile" . $_SESSION['s_id_candidato'] . ".png' alt='logo' style='margin-left: -1rem;' class='img-main-item'>";
                            $imagen = 1;
                        }
                        if ($imagen == 0) {
                            echo "<img src='uploads/logo.jpg' alt='logo' style='margin-left: -1rem;' class='img-main-item'>";
                        }
                        ?>



                        <div class="container-profile__info">
                            <h3 class="login__profile-title"><?php echo ucfirst($_SESSION['s_nombre']); ?> </h3>
                          <!--   <h4 class="login__profile-subtitle">Director grafico</h4> -->
                          <a style="text-decoration: none;" href="php/logout.php" class="login__profile-subtitle"><i class="fas fa-sign-out-alt"></i> <?php echo $lang['button_sign-out']?> </a>
                           
                        </div>
                    </div>
                </ul>

            </div>
        </div>
    </div>

</div>