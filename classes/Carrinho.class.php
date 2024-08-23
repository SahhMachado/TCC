<?php
    require_once('autoload.php'); 
?>
<?php
    class Carrinho extends Database{
        private $id;
        private $desc;
        private $ing;
        private $preco;
        private $qtd;
        private $mesaid;
        private $pratoid;
        
        public function __construct($id, $desc, $ing, $preco, $qtd, $mesaid, $pratoid){
            $this->setId($id);
            $this->setDesc($desc);
            $this->setIng($ing);
            $this->setPreco($preco);
            $this->setQuant($qtd);
            $this->setMesa($mesaid);
            $this->setPrato($pratoid);
        }

        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id;}

        public function getDesc(){ return $this->desc; }
        public function setDesc($desc){ $this->desc = $desc;}

        public function getIng(){ return $this->ing; }
        public function setIng($ing){ $this->ing = $ing;}

        public function getPreco(){ return $this->preco; }
        public function setPreco($preco){ $this->preco = $preco;}

        public function getQuant(){ return $this->qtd; }
        public function setQuant($qtd){ $this->qtd = $qtd;}

        public function getMesa(){ return $this->mesaid; }
        public function setMesa($mesaid){ $this->mesaid = $mesaid;}

        public function getPrato(){ return $this->pratoid; }
        public function setPrato($pratoid){ $this->pratoid = $pratoid;}

        public function inserir(){
            $sql = 'INSERT INTO carrinho (personalizar, ingredientes, preco, quant, mesa_id, pratos_id) 
            VALUES(:personalizar, :ingredientes, :preco, :quant, :mesa_id, :pratos_id)';
            $parametros = array(":personalizar"=> $this->getDesc(),
                                ":ingredientes"=> $this->getIng(),
                                ":preco"=> $this->getPreco(),
                                ":quant"=> $this->getQuant(),
                                ":mesa_id"=> $this->getMesa(),
                                ":pratos_id"=> $this->getPrato());

            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE carrinho SET personalizar = :personalizar, ingredientes = :ingredientes, preco = :preco, 
            quant = :quant, mesa_id = :mesa_id, pratos_id = :pratos_id WHERE id = :id';
            $parametros = array(":personalizar"=> $this->getDesc(),
                                ":ingredientes"=> $this->getIng(),
                                ":preco"=> $this->getPreco(),
                                ":quant"=> $this->getQuant(),
                                ":mesa_id"=> $this->getMesa(),
                                ":pratos_id"=> $this->getPrato(),
                                ":id"=> $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM carrinho WHERE id = :id';
            $parametros = array(":id" => $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM carrinho";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE id like :procurar"; $procurar .= "%";break;
                    case(2): $sql .= " WHERE nome like :procurar"; $procurar .="%"; break;
                    case(3): $sql .= " WHERE personalizar like :procurar"; $procurar .="%"; break;
                }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }
    }
?>