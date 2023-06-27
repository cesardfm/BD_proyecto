<?php

require_once("../../models/programa.model.php");

$id = array('snies' => $_POST['snies']);

echo json_encode(Programa::eliminarDatoId($id));

?>