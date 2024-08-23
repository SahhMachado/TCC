<?php

class Database{

    public static function iniciaConexao(){
        return $pdo = Conexao::getInstance();
    }

    public static function vinculaParametros($stmt, $parametros=array()){
        foreach ($parametros as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        return $stmt;
    }

    public static function executaComando($sql, $parametros=array()){
        $conexao = self::iniciaConexao();
        $stmt = $conexao->prepare($sql);
        $stmt = self::vinculaParametros($stmt, $parametros);

        return $stmt->execute(); 
    }

    public static function buscar($sql, $parametros=array()){
        $conexao = self::iniciaConexao();
        $stmt = $conexao->prepare($sql);
        $stmt = self::vinculaParametros($stmt, $parametros);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>