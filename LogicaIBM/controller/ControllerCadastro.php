<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("$root/LogicaIBM/model/cadastro.php");

class ControllerCadastro{

    private $cadastro;

    public function __construct(){
        $this->cadastro = new Cadastro();
        if(isset($_GET['funcao']) && $_GET['funcao'] == "cadastro"){
            $this->incluir();
        }else if(isset($_GET['funcao']) && $_GET['funcao'] == "editar"){
            $this->editar($_GET['id']);
        }
    }

    private function incluir(){
        $this->cadastro->setNome($_POST['TxtNome']);
        $this->cadastro->setCat($_POST['TxtCat']);
        $this->cadastro->setPreco($_POST['TxtPreco']);

        $result = $this->cadastro->incluir();
        if($result >= 1){
            echo "<script>alert('Registro incluído com sucesso!');document.location='../index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');</script>";
        }
    }
    public function listar (){
        return $result = $this->cadastro->listar();
    }
}
new ControllerCadastro();
?>
