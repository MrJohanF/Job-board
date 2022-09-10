
<?php

require_once __DIR__ . '/../../vendor/autoload.php';
 
require_once('srt-resume.php');

$css = file_get_contents('../../app/hv/css/styles.css');

require_once('datos.php');

$plantilla = getPlantilla($datos, $experiencia, $educacion, $habilidades);


$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/../../app/hv/css',
    ]),
    'fontdata' => $fontData + [
        'frutiger' => [
            'R' => 'SourceSansPro-ExtraLight.ttf',
        ],
        'frutiger_bold' => [
            'R' => 'SourceSansPro-Bold.ttf',
        ],
        'frutiger_regular' => [
            'R' => 'SourceSansPro-Regular.ttf',
        ]
        ,
        'frutiger_light' => [
            'R' => 'SourceSansPro-Light.ttf',
        ],
        'frutiger_semibold' => [
            'R' => 'SourceSansPro-SemiBold.ttf',
        ]
    ],
    
    'mode' => 'utf-8',
    'format' => [190, 236],
    'margin_left' => 0,
    'margin_top' => 0,
    'margin_right' => 0,
    'margin_bottom' => 0
]);




$mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY );



$mpdf->Output();


?>