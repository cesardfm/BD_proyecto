<?php

require_once("/home/cesar/Documentos/programas_snies/app/models/tablasConsulta.model.php");
class Modalidad
{
    public static function elegir()
    {
        return Mostrar::modalidades();
    }
}

?>