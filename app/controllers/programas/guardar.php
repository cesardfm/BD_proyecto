<?php

require_once("../../models/programa.model.php");

$programaInfo = array(
    'nomb_programa' => $_POST['nomb_programa'],
    'snies' => $_POST['snies'],
    'creditos' => $_POST['creditos'],
    'semestres' => $_POST['semestres'],
    'cod_titulo' => $_POST['cod_titulo'],
    'cod_munic' => $_POST['cod_munic'],
    'cod_estado' => $_POST['cod_estado'],
    'cod_inst' => $_POST['cod_inst'],
    'cod_academ' => $_POST['cod_academ'],
    'cod_modalidad' => $_POST['cod_modalidad'],
    'cod_ampplio' => $_POST['cod_amplio'],
    'cod_especifico' => $_POST['cod_especifico'],
    'cod_detallado' => $_POST['cod_detallado'],
);

echo json_encode(Programa::guardarDatos($programaInfo));

?>