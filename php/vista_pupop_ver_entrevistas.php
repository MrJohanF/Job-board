<div style="padding-top: 5rem;">
    <select id="entrevista_id" class="form-login__input">
        <?php


        include "db.php";



        $idEmpresa = $_POST['id_Empresa'];
        $id_Candidato = $_POST['id_Candidato'];
        $correo_candidato = $_POST['correo_candidato'];
        $id_oferta = $_POST['id_oferta'];
        



        $all_interviews = "SELECT * FROM entrevista WHERE empresa_idEmpresa= {$idEmpresa}";


        $resul_interview = mysqli_query($connection, $all_interviews);
        $count = mysqli_num_rows($resul_interview);
        if (!$resul_interview) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        while ($row = mysqli_fetch_array($resul_interview)) {
            $idEntrevista = $row['idEntrevista'];
            $entrevista_nombre = $row['entrevista_nombre'];
        ?>


            <option value="<?php echo $idEntrevista ?>"><?php echo $entrevista_nombre ?></option>



        <?php

        }
        ?>
    </select>
</div>


<?php if ($count > 0) :  ?>
    <input type="button" onclick="send_interview()" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2" value="Enviar">
    

<?php else : ?>

    <script>

        document.getElementById("entrevista_id").style.visibility="hidden";
        document.getElementById("entrevista_id").style.display="none";
        
    </script>

<h1 style="text-align: center; font-size: 2rem;" class="title_company"> Aun no tienes entrevistas! </h4>

<?php endif; ?>


<script>
        function send_interview() {

            var entrevistaId = $("#entrevista_id").val();
            var id_empresa = "<?php echo $idEmpresa ?>";
            var idCandidato = "<?php echo $id_Candidato ?>";
            var correo_candidato = "<?php echo $correo_candidato ?>";
            var id_oferta = "<?php echo $id_oferta ?>";


            var paqueteDeDatos = new FormData();

            paqueteDeDatos.append('idEmpresa', id_empresa);
            paqueteDeDatos.append('id_oferta', id_oferta);
            paqueteDeDatos.append('idEntrevista', entrevistaId);
            paqueteDeDatos.append('idCandidato', idCandidato);
            paqueteDeDatos.append('correo_candidato', correo_candidato);


            $.ajax({
                type: "POST",
                url: "../php/send_email_interview.php",
                data: paqueteDeDatos,
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function(objeto) {},
                success: function(data) {
                    window.location="#main";
                
                }
            })


        }
    </script>