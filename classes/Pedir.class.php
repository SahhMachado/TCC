<?php
    require_once('autoload.php'); 
?>
<?php
    class Pedir extends Database{
        private $idPed;
        private $prat;
        private $desc;
        private $preco;
        private $qtd;
        private $mesaid;
        
        public function __construct($idPed, $prat, $desc, $preco, $qtd, $mesaid){
            $this->setId($idPed);
            $this->setPrato($prat);
            $this->setDesc($desc);
            $this->setPreco($preco);
            $this->setQuant($qtd);
            $this->setMesa($mesaid);
        }

        public function getId(){ return $this->idPed; }
        public function setId($idPed){ $this->idPed = $idPed;}

        public function getPrato(){ return $this->prat; }
        public function setPrato($prat){ $this->prat = $prat;}

        public function getDesc(){ return $this->desc; }
        public function setDesc($desc){ $this->desc = $desc;}

        public function getPreco(){ return $this->preco; }
        public function setPreco($preco){ $this->preco = $preco;}

        public function getQuant(){ return $this->qtd; }
        public function setQuant($qtd){ $this->qtd = $qtd;}

        public function getMesa(){ return $this->mesaid; }
        public function setMesa($mesaid){ $this->mesaid = $mesaid;}


        public function inserir(){
            $sql = 'INSERT INTO pedidos (nome_prat, descricao, preco, quant, mesa_id) 
            VALUES(:nome_prat, :descricao, :preco, :quant, :mesa_id)';
            $parametros = array(":nome_prat"=> $this->getPrato(),
                                ":descricao"=> $this->getDesc(),
                                ":preco"=> $this->getPreco(),
                                ":quant"=> $this->getQuant(),
                                ":mesa_id"=> $this->getMesa());

            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE pedidos SET nome_prat = :nome_prat, descricao = :descricao, preco = :preco, 
            quant = :quant, mesa_id = :mesa_id,  = : WHERE idPed = :idPed';
            $parametros = array(":nome_prat"=> $this->getPrato(),
                                ":descricao"=> $this->getDesc(),
                                ":preco"=> $this->getPreco(),
                                ":quant"=> $this->getQuant(),
                                ":mesa_id"=> $this->getMesa(),
                                ":idPed"=> $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM pedidos WHERE idPed = :idPed';
            $parametros = array(":idPed" => $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM pedidos";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE idPed like :procurar"; $procurar .= "%";break;
                    case(2): $sql .= " WHERE nome_prat like :procurar"; $procurar .="%"; break;
                }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }
    }
?>