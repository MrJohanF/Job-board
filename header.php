<input class="navigation__checkbox" type="checkbox" id="navi-toggle" />
<label class="navigation__button" for="navi-toggle">
    <span class="navigation__icon">&nbsp;</span>
</label>
<div class="navigation__background"></div>


<nav class="navigation__nav">


    <ul class="navigation__list">
        <li class="navigation__item"><a href="Inicio" class="navigation__link"><?php echo $lang["nav_bar-home"] ?></a></li>
        <li class="navigation__item"><a href="Ofertas" class="navigation__link"><?php echo $lang["nav_bar-findjob"] ?></a></li>
        <li class="navigation__item"><a href="Empresas" class="navigation__link"><?php echo $lang["nav_bar-company"] ?></a></li>
        <li class="navigation__item"><a href="Contactanos" class="navigation__link"><?php echo $lang["nav_bar-contact"] ?></a></li>

        <?php
        $estado = 0;
        error_reporting(E_ALL ^ E_NOTICE);

        if (isset($_SESSION['s_id_candidato'])) : $estado = 1; ?>

            <a href="dashboard.php#home" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2">Dashboard</a>
            <a href="php/logout.php" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2">Logout</a>

        <?php else : ?>

        <?php endif; ?>

        <?php if (isset($_SESSION['e_email_empresa'])) : $estado = 1 ?>

            <a href="dashboard_empleador.php#home" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2">Dashboard</a>
            <a href="php/logout_empleador.php" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2">Logout</a>

        <?php endif; ?>

        <?php if ($estado == 0) :  ?>
            <li class="navigation__item">
                <a href="#popup" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2"><?php echo $lang["button_sign-in"] ?></a>
                <a href="#register" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><?php echo $lang["button_register"] ?></a>
            </li>


        <?php endif; ?>

        <li style="font-size: 1rem;" class="navigation__item">

            <div class="icon_languaje">
                <div id="demoBasic"></div>

            </div>
        </li>

    </ul>

</nav>