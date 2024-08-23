<?php
    require_once('autoload.php'); 
?>
<?php
    class Cliente extends Super{
        private $dt;
        private $em;
        private $sn;
        
        public function __construct($id, $nm, $dt, $em, $sn){
            parent::__construct($id, $nm);
            $this->setDataN($dt);
            $this->setEmail($em);
            $this->setSenha($sn);
        }

        public function getDataN(){ return $this->dt; }
        public function setDataN($dt){ $this->dt = $dt;}

        public function getEmail(){ return $this->em; }
        public function setEmail($em){ $this->em = $em;}

        public function getSenha(){ return $this->sn; }
        public function setSenha($sn){ $this->sn = $sn;}

        public function inserir(){
            $sql = 'INSERT INTO cliente (nome, dataNasc, email, senha) 
            VALUES(:nome, :dataNasc, :email, :senha)';
            $parametros = array(":nome"=> $this->getNome(),
                                ":dataNasc"=> $this->getDataN(),
                                ":email"=> $this->getEmail(),
                                ":senha"=> $this->getSenha());

            return parent::executaComando($sql, $parametros); 
        }

        public function editar(){
            $sql = 'UPDATE cliente SET nome = :nome, dataNasc = :dataNasc, email = :email, senha = :senha WHERE id = :id';
            $parametros = array(":nome"=> $this->getNome(),
                                ":dataNasc"=> $this->getDataN(),
                                ":email"=> $this->getEmail(),
                                ":senha"=> $this->getSenha(),
                                ":id"=> $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public function excluir(){
            $sql ='DELETE FROM cliente WHERE id = :id';
            $parametros = array(":id" => $this->getId());

            return parent::executaComando($sql, $parametros); 
        }

        public static function listar($cnst = 0, $procurar = ""){
            $sql = "SELECT * FROM cliente";
            if ($cnst > 0)
                switch($cnst){
                    case(1): $sql .= " WHERE id like :procurar"; $procurar .= "%";break;
                    case(2): $sql .= " WHERE nome like :procurar"; $procurar .="%"; break;
                    case(3): $sql .= " WHERE email like :procurar"; $procurar .="%"; break;
                }

            $par = array();
            if ($cnst > 0)
                $par = array(':procurar'=>$procurar);
            return parent::buscar($sql, $par);
        }

        public static function efetuarLogin($email, $senha){
            $sql = "SELECT id, nome FROM cliente WHERE email = :email AND senha = :senha";
            $parametros = array(
                ':email' => $email,
                ':senha' => $senha,
            );
            session_set_cookie_params(0);
            session_start();
            if (self::buscar($sql, $parametros)) {
                $_SESSION['id'] = self::buscar($sql, $parametros)[0]['id'];
                $_SESSION['nome'] = self::buscar($sql, $parametros)[0]['nome'];
                return true;
            } else {
                $_SESSION['id'] = "";
                $_SESSION['nome'] = "";
                return false;
            }
        }

        public function __toString(){
            $str = parent::__toString();
            $str .= "<br>Data de Nascimento: ".$this->getDataN().
            "<br>Email: ".$this->getEmail().
            "<br>Senha: ".$this->getSenha();
            return $str;
        }
    }
?>