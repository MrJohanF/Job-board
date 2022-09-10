<div class="row">
    <div class="col-1-of-4">

        <div class="feature-dashboard" onclick="location.href='dashboard_empleador.php#profile'" style="cursor: pointer;">
            <div class="icon_performance-dashboard u-margin-botton-2">
                <img class="icon_performance-dashboard-container" src="img/account.png" alt="high-performance">
            </div>
            <h3 class="heading-tertiary-small"><?php echo $lang['dash_edit_main_text-1'] ?></h3>


            <div class="heading-tertiary__subtitle--blue tooltip"><?php echo $lang['dash_click_view_text'] ?>
                <span class="tooltiptext">
                    Edita o actualiza la informacion de tu empresa.
                </span>
            </div>


        </div>

    </div>
    <div class="col-1-of-4">
        <div class="feature-dashboard" onclick="location.href='company.php?empresa=<?php echo $_SESSION['e_idEmpresa'];  ?>'" style="cursor: pointer;">

            <div class="icon_performance-dashboard u-margin-botton-2">
                <img class="icon_performance-dashboard-container" src="img/person.png" alt="high-performance">
            </div>
            <h3 class="heading-tertiary-small"><?php echo $lang['dash_edit_main_text-2'] ?></h3>
            <div class="heading-tertiary__subtitle--blue tooltip"><?php echo $lang['dash_click_view_text'] ?>
                <span class="tooltiptext">
                    Revisa tu perfil publico.
                </span>
            </div>
        </div>
    </div>
    <div class="col-1-of-4">

        <div class="feature-dashboard" onclick="location.href='dashboard_empleador.php#publish'" style="cursor: pointer;">
            <div class="icon_performance-dashboard u-margin-botton-2">
                <img class="icon_performance-dashboard-container" src="img/survey.png" alt="high-performance">
            </div>
            <h3 class="heading-tertiary-small"><?php echo $lang['dash_edit_main_text-3'] ?></h3>
            <div class="heading-tertiary__subtitle--blue tooltip"><?php echo $lang['dash_click_view_text'] ?>
                <span class="tooltiptext">
                    Publica nuevas vacantes.
                </span>
            </div>
        </div>

    </div>
    <div class="col-1-of-4">
        <div class="feature-dashboard" onclick="location.href='dashboard_empleador.php#manager'" style="cursor: pointer;">
            <div class="icon_performance-dashboard u-margin-botton-2">
                <img class="icon_performance-dashboard-container" src="img/search.png" alt="high-performance">
            </div>
            <h3 class="heading-tertiary-small"><?php echo $lang['dash_edit_main_text-4'] ?></h3>

            <div class="heading-tertiary__subtitle--blue tooltip"><?php echo $lang['dash_click_view_text'] ?>
                <span class="tooltiptext">
                    Modifica, actualiza y gestiona tus vacantes publicadas.
                </span>
            </div>

        </div>

    </div>
</div>
<div class="row">



    <div class="col-1-of-4">

        <div class="feature-dashboard" onclick="location.href='universal_search.php'" style="cursor: pointer;">
            <div class="icon_performance-dashboard u-margin-botton-2">
                <img class="icon_performance-dashboard-container" src="img/world.png" alt="high-performance">
            </div>
            <h3 class="heading-tertiary-small">B. Universal</h3>

            <div class="heading-tertiary__subtitle--blue tooltip"><?php echo $lang['dash_click_view_text'] ?>
                <span class="tooltiptext">
                    Buscador universal de candidatos.
                </span>
            </div>

        </div>

    </div>


    <div class="col-1-of-4">
        <div class="feature-dashboard" onclick="location.href='dashboard_empleador.php#services'" style="cursor: pointer;">
            <div class="icon_performance-dashboard u-margin-botton-2">
                <img class="icon_performance-dashboard-container" src="img/cashback.png" alt="high-performance">
            </div>
            <h3 class="heading-tertiary-small"><?php echo $lang['dash_edit_main_text-6'] ?></h3>


            <div class="heading-tertiary__subtitle--blue tooltip"><?php echo $lang['dash_click_view_text'] ?>
                <span class="tooltiptext">
                    Aumenta el numero de tus publicaciones.
                </span>
            </div>


        </div>

    </div>


    <div class="col-1-of-4">

        <div class="feature-dashboard" onclick="location.href='Contactanos'" style="cursor: pointer;">
            <div class="icon_performance-dashboard u-margin-botton-2">
                <img style="width: 6rem; height: 6rem;" class="icon_performance-dashboard-container" src="img/headset.png" alt="high-performance">
            </div>
            <h3 class="heading-tertiary-small"><?php echo $lang['dash_edit_main_text-5'] ?></h3>

            <div class="heading-tertiary__subtitle--blue tooltip"><?php echo $lang['dash_click_view_text'] ?>
                <span class="tooltiptext">
                    Solicita soporte y ayuda especializada.
                </span>
            </div>

        </div>

    </div>



    <?php if ($_SESSION['e_aprobado_empresa'] == 1) : ?>
        <div class="col-1-of-4">

            <div class="feature-dashboard" style="cursor: pointer;">
                <div class="icon_performance-dashboard u-margin-botton-2">
                    <img class="icon_performance-dashboard-container" src="img/icon-positive-vote.png" alt="high-performance">
                </div>
                <h3 class="heading-tertiary-small"><?php echo $lang['dash_edit_main_text-7'] ?></h3>

                <div class="heading-tertiary__subtitle--blue tooltip"><?php echo $lang['dash_what_is_this'] ?>
                    <span class="tooltiptext"><?php echo $lang['dash_edit_main_text-7-description'] ?>
                    </span>
                </div>
            </div>
        </div>

</div>


<?php else : ?>

    <div class="col-1-of-4">

        <div class="feature-dashboard" style="cursor: pointer;">
            <div class="icon_performance-dashboard u-margin-botton-2">
                <img class="icon_performance-dashboard-container" src="img/icon-negative-vote.png" alt="high-performance">
            </div>
            <h3 class="heading-tertiary-small"><?php echo $lang['dash_edit_main_text-8'] ?></h3>
            <div class="heading-tertiary__subtitle--blue tooltip"><?php echo $lang['dash_what_is_this'] ?>
                <span class="tooltiptext"><?php echo $lang['dash_edit_main_text-8-description'] ?>
                </span>
            </div>
        </div>

    </div>


<?php endif; ?>




</div>