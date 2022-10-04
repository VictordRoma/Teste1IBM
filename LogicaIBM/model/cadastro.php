<?php
require_once("banco.php");

class Cadastro extends Banco {

    private $id;
    /*private $email;
    private $senha;
    private $endereco;
    private $bairro;
    private $cidade;
    private $estado;*/
    private $nome;
    private $cat; 
    private $preco;

    //Metodos Set
    public function setId($string){
        $this->id = $string;
    }

    //metodos novos
    public function setNome($string){
        $this->nome = $string;
    }
    public function setCat($string){
        $this->cat = $string;
    }
    public function setPreco($string){
        $this->preco = $string;
    }




    //Metodos Get
    public function getId(){
        return $this->id;
    }
    //metodos novos
    public function getNome(){
        return $this->nome;
    }
    public function getCat(){
        return $this->cat;
    }
    public function getPreco(){
        return $this->preco;
    }


    public function incluir(){
        return $this->setLojaBrinquedo($this->getNome(),$this->getCat(),$this->getPreco());
    }

    public function listar(){
    	return $this->getLojaBrinquedo();
    }


}
?>