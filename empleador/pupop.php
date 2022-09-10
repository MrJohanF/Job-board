<div class="popup" id="popup">
    <div class="popup__content">
        <div class="popup__left">
            <div class="popup__filter">
                <div class="popup__imagen"></div>
            </div>
        </div>
        <div class="popup__right">
            <a href="#main" class="popup__close">&times;</a>

            <form action="../php/login_empleador.php" method="post" class="form-login">
               <!--  <img src="img/logo.webp" alt=""> -->
                <div class="u-margin-botton-4" style="margin-bottom: 2rem;">
                <h3 style="font-size: 2rem; font-weight: 300;" class="login__title">Empresa</h3>    
                <h3 class="login__title"><?php echo $lang['popup_company_log_in']?></h3>
                    <h3 class="login__sing-in"><?php echo $lang['popup_company_i_want_to_start_as']?> <a class="login__link" href="index.php#popup">"<?php echo $lang['popup_company_company']?>"</a></h3>

                </div>
                <div class="form-login__group">
                    <input name="username" type="email" class="form-login__input" placeholder="<?php echo $lang['popup_company_email']?>" id="name" required>
                    <label for="correo" class="form-login__label"><?php echo $lang['popup_company_email']?></label>
                </div>
                <div class="form-login__group">
                    <input name="password" type="password" class="form-login__input" placeholder="<?php echo $lang['popup_company_password']?>" id="correo" required>
                    <label for="contraseña" class="form-login__label"><?php echo $lang['popup_company_password']?></label>
                </div>
                <button name="login" type="submit" class="btn-cuadrado-full btn-cuadrado-full--yellow"><?php echo $lang['popup_company_log_in_btn']?></button>
                <div class="u-margin-top-2">
                    <a class="login__link" href="#recover_password"><?php echo $lang['popup_company_restore_password']?></a>
                    <h3 class="login__subtitle"><?php echo $lang['popup_company_do_not_have_account_yet']?> <a class="login__link" href="#register"><span><?php echo $lang['popup_company_sign_up']?></span> </a></h3>

                </div>
            </form>

        </div>
    </div>
</div>


<div class="popup" id="register">
    <div class="popup__content">
        <div class="popup__left">
            <div class="popup__filter">
                <div class="popup__imagen"></div>
            </div>
        </div>

        <div class="popup__right">
            <a href="#main" class="popup__close">&times;</a>
            <form class="form-login" role="form" action="../php/register.php" method="POST">
                <div class="u-margin-botton-4" style="margin-bottom: 3rem;">
                    <h3 class="login__title"><?php echo $lang['popup_register_create_account']?></h3>

                    <h3 class="login__subtitle"><?php echo $lang['popup_register_do_you_have_account']?> <a class="login__link" href="#popup"><span><?php echo $lang['popup_register_log_in']?></span> </a></h3>
                </div>

                <div class="register__type-customer">
                    <h3 class="login__subtitle-small"><?php echo $lang['popup_register_i_want_to_start_as']?></h3>
                    <div class="register__option-radio">
                        <input class="register__option" type="radio" id="regi_candidato" name="opt_date" value="candidato" required>
                        <label class="register__option-label" for="regi_candidato"><?php echo $lang['popup_register_candidate']?></label>
                        <input class="register__option" type="radio" id="regi_company" name="opt_date" value="empresa" required>
                        <label class="register__option-label" for="regi_company"><?php echo $lang['popup_register_company']?></label>
                    </div>
                </div>
                <!-- Field Name and Last name -->
                <div class="form-login__group" style="display: inline-flex; width: 100%;">
                    <div class="form-login__group" style="width: 48%; padding-right: 5%;">
                        <input type="text" class="form-login__input" placeholder="<?php echo $lang['popup_register_name']?>" name="regi_name" required>
                    </div>
                    <div class="form-login__group" style="width: 45%;">
                        <input type="text" class="form-login__input" placeholder="<?php echo $lang['popup_register_last_name']?>" name="regi_lastname" required>
                    </div>
                </div>

                <!-- Email and Password -->
                <div class="form-login__group">
                    <input type="email" class="form-login__input" placeholder="<?php echo $lang['popup_register_email']?>" name="regi_email" required>
                </div>
                <div class="form-login__group">
                    <input type="password" class="form-login__input" placeholder="<?php echo $lang['popup_register_password']?>" minlength="8" name="regi_pass" onkeyup="muestra_seguridad_clave(this.value)" required>
                    <!-- security level bar -->
                    <div style="width: 100%; height: 5px;">
                        <div class="barra-security" style="height: 100%; transition: all .5s;"></div>
                    </div>
                </div>
                <button type="submit" name="form_register" class="btn-cuadrado-full btn-cuadrado-full--yellow" style="margin-top: 2rem;"><?php echo $lang['popup_register_register']?></button>
                <div class="u-margin-top-2">
                    <a class="login__link" href="#recover_password"><?php echo $lang['popup_register_restore']?></a>
                    <h3 class="login__sing-in"><?php echo $lang['popup_register_i_want_to_start_as']?> <a class="login__link" href="index.php#popup">"<?php echo $lang['popup_company_company']?>"</a></h3>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="popup" id="recover_password">
    <div class="popup__content">
        <div class="popup__left">
            <div class="popup__filter">
                <div class="popup__imagen"></div>
            </div>
        </div>

        <div class="popup__right">
            <a href="#main" class="popup__close">&times;</a>

            <div>
                <form class="form-login" role="form" action="/php/send_email_reset_password.php" method="POST">
       <!--     <img src="img/emplea_logo_azul.webp" alt="">  -->
                    <div class="u-margin-botton-4" style="margin-bottom: 3rem;">
                        <h3 class="login__title"><?php echo $lang['popup_restore_title_password']?></h3>
                        <h3 class="login__subtitle"><?php echo $lang['popup_restore_do_you_have_account']?> <a class="login__link" href="#popup"><span><?php echo $lang['popup_restore_log_in']?></span> </a></h3>
                    </div>


                    <!-- Email and Password -->
                    <div class="form-login__group">
                        <input type="email" class="form-login__input" placeholder="<?php echo $lang['popup_restore_email']?>" name="recover_email_company" required>
                    </div>
                    <button type="submit" class="btn-cuadrado-full btn-cuadrado-full--yellow" style="margin-top: 2rem;"><?php echo $lang['popup_restore_restore']?></button>
                    <div class="u-margin-top-2">

                        <h3 class="login__sing-in"><?php echo $lang['popup_restore_sign_in_with']?><a class="login__link" href="#">"<?php echo $lang['popup_restore_facebook']?>"</a> <?php echo $lang['popup_restore_o']?> <a class="login__link" href="#">"<?php echo $lang['popup_restore_gmail']?>"</a></h3>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<div class="popup" id="submited_info">
    <div class="popup__content">
        <div class="popup__left">
            <div class="popup__filter">
                <div class="popup__imagen"></div>
            </div>
        </div>

        <div class="popup__right">
            <a href="#main" class="popup__close">&times;</a>

            <div>
                <form class="form-login" role="form" action="#main" method="POST">
                    <img style="width: 6rem; margin-bottom: 2rem;" src="img/icon-checked.png" alt="eror">
                    <div class="u-margin-botton-4" style="margin-bottom: 2rem;">
                        <h3 class="login__title"><?php echo $lang['popup_restore_completed_reset_password']?></h3>

                    </div>
                    <h3 class="login__subtitle"><span><?php echo $lang['popup_restore_completed_message-1']?></span></h3>
                    <h3 class="login__subtitle" style="margin-top: 2rem;"><span>
                            <?php echo $lang['popup_restore_completed_message-2']?>
                            <a class="login__link" href="#popup"><span><?php echo $lang['popup_restore_completed_contact']?></span></a>.
                        </span></h3>

                    <button type="submit" class="btn-cuadrado-full btn-cuadrado-full--yellow" style="margin-top: 2rem;"><?php echo $lang['popup_restore_completed_accept']?></button>
                    <div class="u-margin-top-2">

                        <h3 class="login__sing-in"><?php echo $lang['popup_restore_completed_sign_in']?> <a class="login__link" href="#popup">"<?php echo $lang['popup_restore_completed_title_page']?>"</a></h3>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>