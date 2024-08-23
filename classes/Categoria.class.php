<?php
    require_once "../classes/autoload.php";
?>
<?php
    class Categoria extends Super{
        private $img;
        private $grt;
        public function __construct($id, $img, $nm, $grt){
            parent::__construct($id, $nm);
            $this->setImg($img);
            $this->setGerente($grt);
        }

        public function getImg(){ return $this->img; }
        public function setImg($img){ $this->img = $img;}

        public function getGerente(){ return $this->grt; }
        public function setGerente($grt){ $this->grt = $grt;}

        public function inserir(){
            $sql = 'INSERT INTO categorias (imagem, nome, gerente_id) 
            VALUES(:imagem, :nome, :gerente_id)';
            $parametros = array(":imagem"=>$this->getImg(),
                                ":nome"=> $this->getNome(),
                                ":gerente_id"=> $this->getGerente());
                        
            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE categorias SET imagem = :imagem, nome = :nome, gerente_id = :gerente_id WHERE id = :id';
            $parametros = array(":imagem"=>$this->getImg(),
                                ":nome"=> $this->getNome(),
                                ":gerente_id"=> $this->getGerente(),
                                ":id"=> $this->getId());
            
            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM categorias WHERE id = :id';
            $parametros = array(":id" => $this->getId());
            
            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM categorias";
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