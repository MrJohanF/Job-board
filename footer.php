<footer class="footer">
    <!--     <div class="footer__background">
    </div> -->


    <div class="row">

        <div class="footer_container_header">

            <div>
                <div class="content-footer-logo">
                    <img style="height: 3.5rem; float: initial; padding-bottom: 1rem;" src="img/emplea_logo.webp" alt="logo" class="logo-footer">
                    <h2 class="footer-subtitle"><?php echo $lang["footer_subtitle"] ?> </h2>
                </div>


                <ul class="footer_list">
                    <li class="footer__item"><a href="Inicio" class="footer__link"><?php echo $lang["nav_bar-home"] ?></a></li>
                    <li class="footer__item"><a href="Ofertas" class="footer__link"><?php echo $lang["nav_bar-findjob"] ?></a></li>
                    <li class="footer__item"><a href="Empresas" class="footer__link"><?php echo $lang["nav_bar-company"] ?></a></li>
                    <li class="footer__item"><a href="Contactanos" class="footer__link"><?php echo $lang["nav_bar-contact"] ?></a></li>
                </ul>

                <div class="botones u-margin-top-4">
                    <a href="index.php#register" class="btn-cuadrado btn-cuadrado--blue-dark"><?php echo $lang["button_register"] ?></a>
                </div>

            </div>
            <div>
                <form role="form" action="/php/newsletter_register.php" method="POST">
                    <div class="form__group">
                        <div class="form__email-input">
                            <input type="email" class="form__input" placeholder="Direccion de correo" name="newsletter_correo" required>
                            </input>
                            <label for="correo" class="form__label"><?php echo $lang["holder_email"] ?></label>
                        </div>
                        <div class="form__email-btn">
                            <button style="color: #fcfcfc; background-color: #1b3fdd;" class="btn-cuadrado-submit btn-cuadrado-submit--blue-dark"><?php echo $lang["footer_button_send"] ?></button>
                        </div>

                    </div>

                </form>


                <div class="footer_container_header__info">

                    <div class="footer__contacto-info">

                        <ul class="footer_list">
                            <li class="footer__item-contacto"><a href="#" class="footer__link-contacto"><i class="fas fa-envelope" style="padding-right: 1rem;"></i> soporte@tujob.co</a></li>
                            <li class="footer__item-contacto"><a href="" class="footer__link-contacto"><i class="fas fa-phone-alt" style="padding-right: 1rem;"></i> 3041199528</a></li>
                        </ul>

                    </div>

                    <div class="footer_qr">
                        <img src="img/whatsapp.png" alt="whatsapp" class="footer__img-whatsapp">
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="section-skills">

            <div class="container_footer">

                <div>

                    <div class="row">
                        <span class="footer-subtitle-skills"><?php echo $lang["Technological_shortcuts"] ?></span>
                    </div>

                    <div class="container_footer">

                        <div>
                            <ul class="footer_list">
                                <li class="footer__item-skills"><a href="/Ofertas?skill%5B%5D=2" class="footer__link-skills">Php</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?skill%5B%5D=47" class="footer__link-skills">Html5</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?skill%5B%5D=76" class="footer__link-skills">Jquery</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?skill%5B%5D=27" class="footer__link-skills">Boostrap</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="footer_list">

                                <li class="footer__item-skills"><a href="/Ofertas?skill%5B%5D=230" class="footer__link-skills">Big data</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?skill%5B%5D=116" class="footer__link-skills">Sql</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?skill%5B%5D=10" class="footer__link-skills">C#</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?skill%5B%5D=153" class="footer__link-skills">Linux</a></li>
                            </ul>
                        </div>

                    </div>
                </div>


                <div>

                    <div class="row">
                        <span class="footer-subtitle-skills"><?php echo $lang["Professional_shortcuts"] ?></span>
                    </div>
                    <div class="container_footer">
                        <div>
                            <ul class="footer_list">

                                <li class="footer__item-skills"><a href="/Ofertas?catgria%5B%5D=7" class="footer__link-skills">Analista</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?catgria%5B%5D=4" class="footer__link-skills">Programador</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?catgria%5B%5D=33" class="footer__link-skills">Big data</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?catgria%5B%5D=21" class="footer__link-skills">Arquitecto Sofware</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="footer_list">

                                <li class="footer__item-skills"><a href="/Ofertas?catgria%5B%5D=58" class="footer__link-skills">Reclutador</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?catgria%5B%5D=46" class="footer__link-skills">Consultor</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?catgria%5B%5D=4" class="footer__link-skills">Desarollador Web</a></li>
                                <li class="footer__item-skills"><a href="/Ofertas?catgria%5B%5D=8" class="footer__link-skills">DevOps</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>



        </div>
    </div>
    <div class="row">

        <div class="container_bottom">

            <div class="footer__navigation-social">
                <ul class="footer_list">
                    <li class="footer__item-social"><a href="#" class="footer__link-social"><i class="fab fa-facebook"></i></a></li>
                    <li class="footer__item-social"><a href="#" class="footer__link-social"><i class="fab fa-twitter"></i></a></li>
                    <li class="footer__item-social"><a href="#" class="footer__link-social"><i class="fab fa-linkedin"></i></a></li>
                    <li class="footer__item-social"><a href="#" class="footer__link-social"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>

            <div>
                <p class="footer__copyright">
                    Desarrollado por <a href="#" class="footer__link">Johan Fernandez </a> para <a href="#" class="footer__link">TuJob</a>. Copyright &copy; by TuJob.
                </p>
            </div>

        </div>


    </div>

</footer>