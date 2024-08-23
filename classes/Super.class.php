<?php

require_once('Database.class.php');

abstract class Super extends Database{
    private $id;
    private $nome;
    private static $contador = 0;
    
    public function __construct($id, $nm){
        $this->setId($id);
        $this->setNome($nm);
        self::$contador = self::$contador + 1;
    }

    public function getId(){ return $this->id; }
    public function setId($id){ $this->id = $id;}

    public function getNome(){ return $this->nome; }
    public function setNome($nm){ $this->nome = $nm; }
    
    public abstract function inserir();
    public abstract function editar();
    public abstract function excluir();
    public abstract static function listar($cnst = 0, $procurar = "");

    public function __toString(){
        return "<br>Id: ".$this->getId().
        "<br>Nome: ".$this->getNome().
        "<br>Contador: ".self::$contador;
    }
}
?>