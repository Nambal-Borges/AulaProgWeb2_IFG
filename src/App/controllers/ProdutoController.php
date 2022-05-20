<?php

namespace App\Controllers;

use App\Models\Produto;
use App\Models\Usuario;

class ProdutoController
{
    private static $instance;
    private $conexao;

    public static function getInstance(){
        if (self::$instance == null){
            self::$instance = new ProdutoController();
        }
        return self::$instance;
    }

    private function __construct(){
        $this->conexao = Conexao::getInstance();
    }

    public function inserir(Produto $produto){
        $sql = "INSERT INTO produto (id, nome, descricao, valor, imagem) VALUES (:id, :nome, :descricao, :valor, :imagem)";

        $statement = $this->conexao->prepare($sql);
        $statement->bindValue(":id", $produto->getId());
        $statement->bindValue(":nome", $produto->getNome());
        $statement->bindValue(":email", $produto->getDescricao());
        $statement->bindValue(":valor", $produto->getValor());
        $statement->bindValue(":imagem", $produto->getImagem());


        return $statement->execute();
    }

    public function listar(){
        $sql = "SELECT id, nome, descricao, valor, imagem FROM produto ORDER BY nome";
        $statement = $this->conexao->query($sql, \PDO::FETCH_ASSOC);
        $lsretorno = array();
        foreach ($statement as $row){
            $lsretorno[] = $this->preencherList($row);
        }
        return $lsretorno;
    }

    public function preencherList($row){
        $produto = new Produto();
        $produto->setId($row["id"]);
        $produto->setNome($row["nome"]);
        $produto->setDescricao($row["email"]);
        $produto->setValor($row["telefone"]);
        $produto->setImagem($row["imagem"]);
        return $produto;
    }

}