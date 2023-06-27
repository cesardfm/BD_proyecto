<?php

require_once('/home/cesar/Documentos/programas_snies/app/config/connection.php');


class Programa extends Connection
{

    public static function listarGrupo($cantidad)
    {
        try {
            $sql = "SELECT p.snies, p.nomb_programa, m.nomb_modalidad, 
            i.nomb_inst, mu.nomb_munic
            FROM programas p
            INNER JOIN modalidades m ON p.cod_modalidad=m.cod_modalidad
            INNER JOIN instituciones i ON p.cod_inst=i.cod_inst
            INNER JOIN municipios mu ON p.cod_munic=mu.cod_munic
            LIMIT 10 OFFSET :cantidad";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':cantidad', $cantidad['cant']);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }

    public static function mostrarDatos()
    {

        try {
            $sql = "codigo sql";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }

    public static function obtenerDatoId($id)
    {
        try {
            $sql = "SELECT p.snies, p.nomb_programa, p.creditos, 
            p.periocidad, p.semestres, m.nomb_modalidad, 
            na.nomb_nivel, ca.nomb_amplio, ce.nomb_especifico,
            cd.nomb_detallado, t.nomb_titulo, e.nomb_estado,
            i.nomb_inst, mu.nomb_munic, tr.nomb_tipo,d.nomb_depto
            FROM programas p
            INNER JOIN modalidades m ON p.cod_modalidad=m.cod_modalidad
            INNER JOIN nivel_academico na ON p.cod_nivel=na.cod_nivel
            INNER JOIN campo_amplio ca ON p.cod_amplio=ca.cod_amplio
            INNER JOIN campo_especifico ce ON p.cod_especifico=ce.cod_especifico
            INNER JOIN campo_detallado cd ON p.cod_detallado=cd.cod_detallado
            INNER JOIN titulos t ON p.cod_titulo=t.cod_titulo
            INNER JOIN estados e ON p.cod_estado=e.cod_estado
            INNER JOIN instituciones i ON p.cod_inst=i.cod_inst
            INNER JOIN municipios mu ON p.cod_munic=mu.cod_munic
            JOIN departamentos d ON mu.cod_depto = d.cod_depto
            INNER JOIN reconocimientos re ON re.cod_progr=p.snies
            INNER JOIN tipos_reconocimientos tr ON re.cod_tipo=tr.cod_tipo
            WHERE p.snies = :snies;";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':snies', $id['snies']);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }

    public static function guardarDatos($datos)
    {
        try {
            $sql = "INSERT INTO programas (snies, nomb_programa, creditos, 
            periocidad, semestres, cod_modalidad, 
            cod_nivel, cod_amplio, cod_especifico,
            cod_detallado, cod_titulo,cod_estado,
            cod_inst, cod_munic) VALUES (:snies, :nomb_programa, :creditos, 
            :periocidad, :semestres, :cod_modalidad, 
            :cod_nivel, :cod_amplio, :cod_especifico,
            :cod_detallado, :cod_titulo,:cod_estado,
            :cod_inst, :cod_munic)";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':snies', $datos['snies']);
            $stmt->bindParam(':nomb_programa', $datos['nomb_programa']);
            $stmt->bindParam(':creditos', $datos['creditos']);
            $stmt->bindParam(':periocidad', $datos['perocidad']);
            $stmt->bindParam(':semestres', $datos['semestres']);
            $stmt->bindParam(':cod_modalidad', $datos['cod_modalidad']);
            $stmt->bindParam(':cod_nivel', $datos['cod_nivel']);
            $stmt->bindParam(':cod_amplio', $datos['cod_amplio']);
            $stmt->bindParam(':cod_especifico', $datos['cod_especifico']);
            $stmt->bindParam(':cod_detallado', $datos['cod_detallado']);
            $stmt->bindParam(':cod_titulo', $datos['cod_titulo']);
            $stmt->bindParam(':cod_estado', $datos['cod_estado']);
            $stmt->bindParam(':cod_inst', $datos['cod_inst']);
            $stmt->bindParam(':cod_munic', $datos['cod_munic']);

            $stmt->execute();
            return true;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }

    public static function actualizarDatos($data)
    {
        try {
            $sql = "UPDATE ingredientes SET nomb_ingr = :nomb_ingr where id_ingr= :id_ingr";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt = bindParam(':nomb_ingr', $data['nomb_ingr']);
            $stmt = bindParam(':id_ingr', $data['id_ingr']);
            $stmt->execute();
            return true;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }

    public static function eliminarDatoId($id)
    {
        try {
            $sql = "DELETE FROM programas WHERE  snies = :snies";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':snies', $id['snies']);
            $stmt->execute();
            return true;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }

    public static function tiposReconocimientos($datos)
    {
        try {
            $sql = "SELECT ingredientes.nomb_ingr
            FROM ingredientes
            JOIN preparacion ON ingredientes.id_ingr = preparacion.id_ingr
            WHERE preparacion.id_prod = :id_prod";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':id_prod', $datos);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }

    public static function consultaTabla($tabla)
    {
        try 
        {
            $sql = "SELECT * FROM :tabla";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->bindParam(':tabla', $tabla['tabla']);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
}
?>