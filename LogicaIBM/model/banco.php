<?php
//timezone
date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados
define('BD_SERVIDOR','localhost');
define('BD_USUARIO','root');
define('BD_SENHA','');
define('BD_BANCO','lojabrinquedos');
    
class Banco{

    protected $mysqli;
    private $cadastro;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }
    /*$email,
    $senha,
    $endereco,
    $bairro,
    $cep, 
    $cidade, 
    $estado*/

    public function setLojaBrinquedo($nome,$cat,$preco){
        $stmt = $this->mysqli->prepare("INSERT INTO tblbrinquedos (`nome`, `cat`, `preco`) VALUES (?,?,?);");
        $stmt->bind_param("sss",$nome,$cat,$preco);
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }
    }

    public function getLojaBrinquedo(){
        try{
            $stmt = $this->mysqli->query("SELECT * FROM tblbrinquedos;");
            $lista = $stmt->fetch_all(MYSQLI_ASSOC);
            $f_lista = array();
            $i = 0;
            foreach ($lista as $l){
                $f_lista[$i]['id'] = $l['id'];
                $f_lista[$i]['nome'] = $l['nome'];
                $f_lista[$i]['cat'] = $l['cat'];
                $f_lista[$i]['preco'] = $l['preco'];
                $i++;
            }
            return $f_lista;
        } catch(Exception $e) {
            echo "Ocorreu um erro ao tentar Buscar Todos." .$e;
        }
    }
}    
?>