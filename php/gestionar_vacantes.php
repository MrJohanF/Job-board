<?php

session_start();

include "db.php";

if (isset($_POST["lang"])) {

    $lang = $_POST["lang"];
    if (!empty($lang)) {
        $_SESSION["lang"] = $lang;
    }
}

if (isset($_SESSION["lang"])) {
    $lang = $_SESSION["lang"];
    require "../lang/" . $lang . ".php";
} else {
    require "../lang/es.php";
}

// Ne
$per_page = 5;

if (isset($_POST['page'])) {

    $page = $_POST['page'];
} else {
    $page = "";
}

if ($page == "" || $page == 1) {
    $page_1 = 0;
} else {
    $page_1 = ($page * $per_page) - $per_page;
}


$idEmpresa = $_POST['idEmpresa'];

$consulta = "";
$consulta_skill = "";
$consulta_categoria_filtro = "";
$consulta_estado_filtro = "";
$consul1 = "";
$cadena_completa = "WHERE oferta.Empresa_idEmpresa= '$idEmpresa'";
$Tipo_trabajo = "";
$contador = 0;


if (isset($_POST['catgria'])) {



    $filtro_idCategoria = "oferta.Categoria_idCategoria =";



    if (isset($_POST['catgria'])) {
        $data = json_decode($_POST['catgria'], true);
        $length = count($data);
        for ($c = 0; $c < $length; $c++) {
            $consulta_categoria_filtro .=  " '" . $data[$c] . "'" . (($c == $length - 1) ? "" : " AND ");
        }
        $contador = $contador + 1;

        if ($contador == 1) {
            $cadena_completa = "WHERE oferta.Empresa_idEmpresa= '$idEmpresa' AND " . $filtro_idCategoria . $consulta_categoria_filtro;
        }
        if ($contador >= 2) {
            $cadena_completa = $cadena_completa . " AND " . $filtro_idCategoria . $consulta_categoria_filtro;
        }
        if ($length == 0) {
            $cadena_completa = "WHERE oferta.Empresa_idEmpresa= '$idEmpresa'";
        }
    }
}


if (isset($_POST['estado'])) {




    $filtro_idEstado = "oferta.estado_idEstado =";


    if (isset($_POST['estado'])) {
        $data = json_decode($_POST['estado'], true);
        $length = count($data);
        for ($c = 0; $c < $length; $c++) {
            $consulta_estado_filtro .=  " '" . $data[$c] . "'" . (($c == $length - 1) ? "" : " AND ");
        }
        $contador = $contador + 1;

        if ($contador == 1) {
            $cadena_completa =  "WHERE oferta.Empresa_idEmpresa= '$idEmpresa' AND " . $filtro_idEstado . $consulta_estado_filtro;
        }
        if ($contador >= 2) {
            $cadena_completa =  $cadena_completa . " AND " . $filtro_idEstado . $consulta_estado_filtro;
        }
        if ($length == 0) {
            $cadena_completa =  "WHERE oferta.Empresa_idEmpresa= '$idEmpresa'";
        }
    }
}




$post_query_count = "SELECT DISTINCT idOferta, fecha_expiracion, estado_idEstado, titulo_oferta, 
descripcion_oferta, salario_mensual, fecha_publicacion, 
ciudad_general, tipo_contrato FROM habilidades_requerida_oferta, oferta  
INNER JOIN ciudad ON oferta.ciudad_idCiudad = ciudad.idCiudad INNER JOIN 
tipos_contrato ON oferta.tipo_idContrato = tipos_contrato.idTipo_contrato $cadena_completa";


$find_count = mysqli_query($connection, $post_query_count);
$count = mysqli_num_rows($find_count);


$count = ceil($count / $per_page);



$all_offer = "SELECT DISTINCT idOferta, fecha_expiracion, estado_idEstado, titulo_oferta, 
          descripcion_oferta, salario_mensual, fecha_publicacion, 
          ciudad_general, tipo_contrato FROM habilidades_requerida_oferta, oferta  
          INNER JOIN ciudad ON oferta.ciudad_idCiudad = ciudad.idCiudad INNER JOIN 
          tipos_contrato ON oferta.tipo_idContrato = tipos_contrato.idTipo_contrato $cadena_completa limit $page_1, $per_page ";






echo "<p id='contador_ofertas_total' style='display: none; visibility:hidden' >" . $count . "</p>";
echo "<p id='current_active_page' style='display: none; visibility:hidden' >" . $page . "</p>";

$resul_all_offer = mysqli_query($connection, $all_offer);
if (!$resul_all_offer) {
    die("QUERY FAILED" . mysqli_error($connection));
}

while ($row = mysqli_fetch_array($resul_all_offer)) {
    $db_idOferta = $row['idOferta'];
    $db_titulo_oferta = $row['titulo_oferta'];
    $db_description = $row['descripcion_oferta'];
    $db_salary = $row['salario_mensual'];
    $db_fecha_publicacion = $row['fecha_publicacion'];
    $db_fecha_expiracion = $row['fecha_expiracion'];
    $db_ciudad_oferta = $row['ciudad_general'];
    $db_tipo_contrato = $row['tipo_contrato'];
    $db_estado_oferta = $row['estado_idEstado'];

?>


    <div class="row">
        <div class="story">
            <div class="row">
                <div class="col-2-of-3">
                    <div class="content-left">


                        <h3 class="title_company"><?php echo ucwords($db_titulo_oferta); ?></h3>
                        <h4 class="title_company--sub"><?php echo ucwords($db_titulo_oferta); ?></h4>
                        <p class="show-read-more title_country"><?php echo $cortado = substr($db_description, 0, 200) . ". Etc..."; ?></p>
                        <h3 style="font-size: 1.3rem; color: gray; margin-top: 1rem;" class="title_country">
                            <?php
                            $date = new DateTime($db_fecha_publicacion);
                            echo $date->format('Y-m-d H:i:s');
                            ?>
                        </h3>
                        <select onchange="update_status(<?php echo $db_idOferta ?>, this)">
                            <?php

                            $status_oferta = "SELECT * FROM `estado_oferta` ORDER BY idEstado = $db_estado_oferta";
                            $result_status_oferta = mysqli_query($connection, $status_oferta);
                            if (!$result_status_oferta) {
                                die("QUERY FAILED" . mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($result_status_oferta)) {
                                $estado_nombre = $row["estado"];
                                $estado_num = $row["idEstado"];
                            ?>
                                <option selected value='<?php echo $estado_num ?>'><?php echo $estado_nombre ?></option>
                            <?php
                            }
                            ?>


                        </select>
                        <ul id="skills" class="lista-habilidades">

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
                                <li><?php echo $name_skill; ?></li>

                            <?php
                            }

                            ?>


                        </ul>

                    </div>


                </div>
                <div class="col-1-of-3">
                    <div class="content-right">
                        <h4 class="title_company--sub u-margin-top-2"><?php echo $lang['dash_manage_salary'] ?> <?php echo $db_salary ?></h4>
                        <h3 class="title_country"><?php echo $db_ciudad_oferta ?></h3>
                        <h3 class="title_country"><?php echo $lang['dash_manage_type_contract'] ?></h3>
                        <h5 class="title_country"><?php echo $db_tipo_contrato ?></h5>


                    </div>

                    <div style="position: absolute;margin-left: -3.7%;padding-top: 1.5%;">

                        <?php
                        $datetime1 = date($db_fecha_expiracion);
                        $datetime2 = date('Y-m-d H:m:s');
                        $desactivado_date = "";
                        if ($datetime2 < $datetime1) {

                            $desactivado_date = "disabled";
                        } else {

                            $desactivado_date = "";
                        }
                        ?>
                        <div class='tooltip'>
                            <a onclick="btn_candidatos_aplican(<?php echo $db_idOferta ?>)" href="#manager" class="btn-cuadrado-form btn-cuadrado-form--yellow u-margin-top-2"><i class="fas fa-users"></i></a>
                            <span style="top: 120%;" class='tooltiptext'>Ver posibles candidatos.</span>
                        </div>

                        <div class='tooltip'>
                            <a onclick="btn_editar_oferta(<?php echo $db_idOferta ?>)" href="#popup" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2"><i class="fas fa-edit"></i></a>
                            <span style="top: 120%;" class='tooltiptext'>Editar oferta.</span>
                        </div>
                        <div class='tooltip'>
                            <button <?php echo $desactivado_date ?> onclick="btn_update_oferta(<?php echo $db_idOferta ?>, '<?php echo $db_fecha_expiracion ?>')" class="btn-cuadrado-form btn-cuadrado-form--blue u-margin-top-2" style=""><i class="fas fa-sync"></i></button>
                            <span style="top: 120%;" class='tooltiptext'>Actualizar fecha fecha de vencimiento.</span>
                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

    <style>
        button:disabled,
        button[disabled] {
            border: 1px solid #999999;
            background-color: #cccccc;
            color: #666666;
        }
    </style>


<?php

}
?>



<script>
    function btn_update_oferta(idOferta, date_expira) {


        var ob = {
            idOferta: idOferta,
            date_expira: date_expira
        }

        $.ajax({
            type: "POST",
            url: "../php/update_date_oferta.php",
            data: ob,
            beforeSend: function(objeto) {

            },
            success: function(data) {
                alert(data);
            }
        })

    }



    function update_status(idOferta, v) {

        var valor_estado = $(v).val();

        var ob = {
            idOferta: idOferta,
            estado: valor_estado
        }

        $.ajax({
            type: "POST",
            url: "../php/update_estado_oferta.php",
            data: ob,
            beforeSend: function(objeto) {

            },
            success: function(data) {
                alert(data);
            }
        })

    }

    function btn_candidatos_aplican(id_oferta) {

        var id_Empresa = <?php echo $idEmpresa ?>;

        var ob = {
            id_oferta: id_oferta,
            id_Empresa: id_Empresa
        }

        $.ajax({
            type: "POST",
            url: "../php/vista_ver_candidato_aplicado.php",
            data: ob,
            beforeSend: function(objeto) {

            },
            success: function(data) {
                $("#container_candidato").html(data);
                openCity(event, '#candidatos_aplicados');
            }
        })
    }
</script>
