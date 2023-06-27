<?php

require_once("/home/cesar/Documentos/programas_snies/app/models/tablasConsulta.model.php");
class Nivel
{
    public static function academ()
    {
        return Mostrar::nivelAcademico();
    }
}

?>