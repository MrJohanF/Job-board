
<?php include "db.php" ?>

<?php

                    $total_skills = $_POST['contador'];


                    $all_skills = "SELECT * FROM habilidades_generales";
                    
                    $resul_all_skills= mysqli_query($connection, $all_skills);
                    if (!$resul_all_skills) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }

                 echo "<div id='skill_".$total_skills."' class='form-login__group' style='display: inline-flex; width: 100%;'><div class='form-login__group' style='width: 89%;'><select id='skill_selected_".$total_skills."' class='form-login__input'>";

                    while ($row = mysqli_fetch_array($resul_all_skills)) {
                        $db_idHabilidad = $row['idHabilidades_generales'];
                        $db_nombre_habilidad = $row['nombre_habilidad_general'];


                    ?>

                    <option value="<?php echo $db_idHabilidad ?>"><?php echo $db_nombre_habilidad; ?></option>

                    <?php
                    }

                    

                    echo "</select></div><div class='form-login__group' style='width: 8%;'><div class='form-login__group'><select id='valor_selected_".$total_skills."' class='form-login__input'><option value='10'>10%</option><option value='15'>15%</option><option value='20'>20%</option><option value='25'>25%</option> <option value='30'>30%</option><option value='35'>35%</option><option value='40'>40%</option><option value='45'>45%</option><option value='50'>50%</option><option value='55'>55%</option><option value='60'>60%</option><option value='65'>65%</option><option value='70'>70%</option> <option value='75'>75%</option><option value='80'>80%</option><option value='85'>85%</option><option value='90'>90%</option><option value='95'>95%</option><option value='100'>100%</option></select></div></div></div>"
                    ?>

                    