<?php
    require_once('autoload.php'); 
?>
<?php
    class Promo extends Database{
        private $id;
        private $dia;
        private $img;
        private $desc;
        private $gerente_id;
        private $pratos_id;
        
        public function __construct($id, $dia, $img, $desc, $gerente_id, $pratos_id){
            $this->setId($id);
            $this->setDia($dia);
            $this->setImg($img);
            $this->setDesc($desc);
            $this->setGeId($gerente_id);
            $this->setPrId($pratos_id);
        }

        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id;}

        public function getDia(){ return $this->dia; }
        public function setDia($dia){ $this->dia = $dia;}

        public function getImg(){ return $this->img; }
        public function setImg($img){ $this->img = $img;}

        public function getDesc(){ return $this->desc; }
        public function setDesc($desc){ $this->desc = $desc;}

        public function getGeId(){ return $this->gerente_id; }
        public function setGeId($gerente_id){ $this->gerente_id = $gerente_id;}

        public function getPrId(){ return $this->pratos_id; }
        public function setPrId($pratos_id){ $this->pratos_id = $pratos_id;}



        public function inserir(){
            $sql = 'INSERT INTO promocao (dia, imagem, descricao, gerente_id, pratos_id) 
            VALUES(:dia, :imagem, :descricao, :gerente_id, :pratos_id)';
            $parametros = array(":dia"=> $this->getDia(),
                                ":imagem"=> $this->getImg(),
                                ":descricao"=> $this->getDesc(),
                                ":gerente_id"=> $this->getGeId(),
                                ":pratos_id"=> $this->getPrId());

            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE promocao SET dia = :dia, imagem = :imagem, descricao = :descricao, 
            gerente_id = :gerente_id, pratos_id = :pratos_id WHERE id = :id';
            $parametros = array(":dia"=> $this->getDia(),
                                ":imagem"=> $this->getImg(),
                                ":descricao"=> $this->getDesc(),
                                ":gerente_id"=> $this->getGeId(),
                                ":pratos_id"=> $this->getPrId(),
                                ":id"=> $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM promocao WHERE id = :id';
            $parametros = array(":id" => $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM promocao";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE id like :procurar"; $procurar .= "%";break;
                    case(2): $sql .= " WHERE dia like :procurar"; $procurar .="%"; break;
                }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }
    }
?>