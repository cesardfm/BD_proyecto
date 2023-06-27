<?php

require_once("../../models/programa.model.php");

$cantidad = array('cant' => $_POST['cantidad']);

echo json_encode(Programa::listarGrupo($cantidad));

?>