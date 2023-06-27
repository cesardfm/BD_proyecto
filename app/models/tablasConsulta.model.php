<?php
require_once('/home/cesar/Documentos/programas_snies/app/config/connection.php');


class Mostrar extends Connection
{
    public static function instituciones()
    {
        try {
            $sql = "SELECT * FROM instituciones";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }

    public static function municipios()
    {
        try {
            $sql = "SELECT * FROM municipios";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
    

    public static function caracterAcademico()
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
    public static function tiposReconocimiento()
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
    public static function estados()
    {
        try {
            $sql = "SELECT * FROM estados";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
    public static function titulo()
    {
        try {
            $sql = "SELECT * FROM titulos limit 200";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
    public static function departamentos()
    {
        try {
            $sql = "SELECT * FROM departamentos";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
    public static function nivelAcademico()
    {
        try {
            $sql = "SELECT * FROM nivel_academico";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
    public static function modalidades()
    {
        try {
            $sql = "SELECT * FROM modalidades";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
    public static function campoAmplio()
    {
        try {
            $sql = "SELECT * FROM campo_amplio";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
    public static function campoEspecifico()
    {
        try {
            $sql = "SELECT * FROM campo_especifico";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
    public static function campoDetallado()
    {
        try {
            $sql = "SELECT * FROM campo_detallado";
            $stmt = Connection::getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOExeption $th) {
            echo $th->getMessage();
        }
    }
}
?>