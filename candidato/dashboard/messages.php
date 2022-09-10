<section class="Aplicaciones-section">

    <script>
        openCity(event, '#messages');
    </script>

    <div class="row">
        <h3 class="text-animation"><?php echo $lang['candidato_invi_title'] ?></h3>


        <div style="display: inline-flex; flex-wrap: wrap;">



            <?php

            $idCandidato = $_SESSION['s_id_candidato'];

            $request_apli = "SELECT idOferta, nombre_empresa ,titulo_oferta, idEmpresa FROM `seleccion_invitaciones` INNER JOIN oferta ON seleccion_invitaciones.oferta_idOferta = oferta.idOferta INNER JOIN empresa ON seleccion_invitaciones.empresa_idEmpresa = idEmpresa WHERE candidato_idCandidato =  $idCandidato";

            $resul_apli = mysqli_query($connection, $request_apli);

            $count_aplicaciones = mysqli_num_rows($resul_apli);

            if (!$resul_apli) {
                die("QUERY FAILED" . mysqli_error($connection));
                echo "error";
            }


            while ($row = mysqli_fetch_array($resul_apli)) {
                $idOferta = $row['idOferta'];
                $nombre_empresa = $row['nombre_empresa'];
                $titulo_oferta = $row['titulo_oferta'];
                $idEmpresa = $row['idEmpresa'];


            ?>

                <div class="invi_padding-card-invitation">

                    <a href="../detalle_oferta.php?ofer=<?php echo $idOferta ?>" class="invi_data-card">

                        <h3>
                            <div class="LinkProfileCompany">

                                <?php

                                $nombre_fichero_jpg = 'profile_empleador/profile' . $idEmpresa . '.jpg';
                                $nombre_fichero_jpeg = 'profile_empleador/profile' . $idEmpresa . '.jpeg';
                                $nombre_fichero_png = 'profile_empleador/profile' . $idEmpresa . '.png';
                                $imagen = 0;
                                if (file_exists($nombre_fichero_jpg)) {
                                    echo "<img src='profile_empleador/profile" . $idEmpresa . ".jpg' alt='logo' class='img-main-item'>";
                                    $imagen = 1;
                                }
                                if (file_exists($nombre_fichero_jpeg)) {
                                    echo "<img src='profile_empleador/profile" . $idEmpresa . ".jpeg' alt='logo' class='img-main-item'>";
                                    $imagen = 1;
                                }
                                if (file_exists($nombre_fichero_png)) {
                                    echo "<img src='profile_empleador/profile" . $idEmpresa . ".png' alt='logo' class='img-main-item'>";
                                    $imagen = 1;
                                }
                                if ($imagen == 0) {
                                    echo "<img src='uploads/logo.jpg' alt='logo' class='img-main-item'>";
                                }
                                ?>

                            </div>

                        </h3>
                        <h4><?php echo substr($nombre_empresa, 0, 15); ?></h4>
                        <p><?php echo substr($titulo_oferta, 0, 40) . "..."; ?></p>
                        <span class="link-text">
                            <?php echo $lang['candidato_invi_view_all_details'] ?>
                            <svg width="25" height="16" viewBox="0 0 25 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.8631 0.929124L24.2271 7.29308C24.6176 7.68361 24.6176 8.31677 24.2271 8.7073L17.8631 15.0713C17.4726 15.4618 16.8394 15.4618 16.4489 15.0713C16.0584 14.6807 16.0584 14.0476 16.4489 13.657L21.1058 9.00019H0.47998V7.00019H21.1058L16.4489 2.34334C16.0584 1.95281 16.0584 1.31965 16.4489 0.929124C16.8394 0.538599 17.4726 0.538599 17.8631 0.929124Z" fill="#1f44bd" />
                            </svg>
                        </span>
                    </a>
                </div>




            <?php
            }
            ?>
        </div>

    </div>

    <?php if ($count_aplicaciones < 1) :  ?>
        <div class="row">
            <div style="text-align: center; margin-top: 2rem;">
                <img src="img/empty.jpg" alt="" style="width: 53%; height: 53rem;">
            </div>
        </div>

    <?php endif; ?>

</section>