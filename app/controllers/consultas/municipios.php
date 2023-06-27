<?php

require_once("/home/cesar/Documentos/programas_snies/app/models/tablasConsulta.model.php");
class Municipio
{
    public static function municip()
    {
        return Mostrar::municipios();
    }
}

?>