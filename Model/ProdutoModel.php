<?php

class ProdutoModel
{
    //A "class" define um tipo de dado em uma linguagem voltada ao objeto.
	
    public $id, $nome, $descricao, $codigo;
    public $data_entrada, $estoque_min;
    public $fornecedor, $categoria;


     //Public significa um membro que pode ser acessado por qualquer classe
     //Declaração do método save que chamará a DAO para gravar no banco de dados
     //o model preenchido.
     
    public function save()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        // Id nulo é usado para um novo registro
        // Se não, é um update porque a chave primária já existe.
        if($this->id == null) 
        {
            // Usamos o this porque estamos enviando o objeto model para o insert.
            $dao->insert($this);
        } else {
            // update
        }
    }
}