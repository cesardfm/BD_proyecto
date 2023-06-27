<?php

require_once("/home/cesar/Documentos/programas_snies/app/models/tablasConsulta.model.php");
class CampoD
{
    public static function detallado()
    {
        return Mostrar::campoDetallado();
    }
    public static function estado()
    {
        return Mostrar::estados();
    }
    public static function institucion()
    {
        return Mostrar::instituciones();
    }
    public static function titul()
    {
        return Mostrar::titulo();
    }
}

?>