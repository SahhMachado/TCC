<?php
    require_once('autoload.php'); 
?>
<?php
    class Pratos extends Super{
        private $img;
        private $ing;
        private $des;
        private $pr;
        private $cId;
        private $gId;
        
        public function __construct($id, $img, $nm, $ing, $des, $pr, $cId, $gId){
            parent::__construct($id, $nm);
            $this->setImg($img);
            $this->setIng($ing);
            $this->setDesc($des);
            $this->setPreco($pr);
            $this->setCid($cId);
            $this->setGid($gId);
        }

        public function getImg(){ return $this->img; }
        public function setImg($img){ $this->img = $img;}

        public function getIng(){ return $this->ing; }
        public function setIng($ing){ $this->ing = $ing;}

        public function getDesc(){ return $this->des; }
        public function setDesc($des){ $this->des = $des;}

        public function getPreco(){ return $this->pr; }
        public function setPreco($pr){ $this->pr = $pr;}

        public function getCid(){ return $this->cId; }
        public function setCid($cId){ $this->cId = $cId;}

        public function getGid(){ return $this->gId; }
        public function setGid($gId){ $this->gId = $gId;}

        public function inserir(){
            $sql = 'INSERT INTO pratos (imagem, nome, ingredientes, descricao, preco, categorias_id, gerente_id) 
            VALUES(:imagem, :nome, :ingredientes, :descricao, :preco, :categorias_id, :gerente_id)';
            $parametros = array(":imagem" => $this->getImg(),
                                ":nome" => $this->getNome(),
                                ":ingredientes"=> $this->getIng(),
                                ":descricao"=> $this->getDesc(),
                                ":preco"=> $this->getPreco(),
                                ":categorias_id"=> $this->getCid(),
                                ":gerente_id"=> $this->getGid());

            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE pratos SET imagem = :imagem, nome = :nome, ingredientes = :ingredientes, descricao = :descricao, preco = :preco, categorias_id = :categorias_id, gerente_id = :gerente_id 
            WHERE id = :id';
            $parametros = array(":imagem" => $this->getImg(),
                                ":nome" => $this->getNome(),
                                ":ingredientes"=> $this->getIng(),
                                ":descricao"=> $this->getDesc(),
                                ":preco"=> $this->getPreco(),
                                ":categorias_id"=> $this->getCid(),
                                ":gerente_id"=> $this->getGid(),
                                ":id"=> $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM pratos WHERE id = :id';
            $parametros = array(":id" => $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM pratos";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE id like :procurar"; $procurar .= "%";break;
                    case(2): $sql .= " WHERE ingredientes like :procurar"; $procurar .="%"; break;
                }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }
    }
?>