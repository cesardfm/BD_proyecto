<?php

require_once("../../models/programa.model.php");

$tabla = array('tabla' => $_POST['tabla']);

echo json_encode(Programa::consultaTabla($tabla));

?>