<?php
    require_once "../classes/autoload.php";
?>
<?php
    class Mesa extends Super{
        public function __construct($id, $nm){
            parent::__construct($id, $nm);
        }

        public function inserir(){
            $sql = 'INSERT INTO mesa (nome) 
            VALUES(:nome)';
            $parametros = array(":nome"=> $this->getNome());
                        
            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE mesa SET nome = :nome WHERE id = :id';
            $parametros = array(":nome"=> $this->getNome(),
                                ":id"=> $this->getId());
            
            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM mesa WHERE id = :id';
            $parametros = array(":id" => $this->getId());
            
            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM mesa";
            if ($cnst > 0)
            switch($cnst){
                case(1): $sql .= " WHERE id like :procurar"; $procurar .= "%";break;
                case(2): $sql .= " WHERE nome like :procurar"; $procurar .="%"; break;
            }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            
                return parent::buscar($sql, $par);
        }

        public function __toString(){
        $str = parent::__toString();
        return $str;
}
}
?>