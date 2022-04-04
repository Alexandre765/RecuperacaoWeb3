<?php

  //DAO executa o SQL junto com o banco de dados.
 
class ProdutoDAO
{
    
      //Atributo da classe que armazena o link de conexão com o banco de dados.
     
	 
    private $conexao;


    
      //Método construtor, échamado quando a classe é instanciada.
      //Exemplo: $dao = new PessoaDAO().
      //Quando instânciado, faz uma conexão com o MySQL.
   
    function __construct() 
    {
        // DSN é onde o servidor MySQL será encontrado
        // Host marca em qual porta o MySQL está operado e qual o nome do banco. 
		
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Cria a conexão e armazena na propriedade definida.
		
        $this->conexao = new PDO($dsn, $user, $pass);
    }

     
     // Método que recebe um model que vai extrair dados do model 
	 // para fazer o insert na tabela correspondente ao model.
	 
    function insert(ProdutoModel $model) 
    {
        // Insere o marcador $model no ProdutoModel

		
        $sql = "INSERT INTO produto 
                (nome, descricao, codigo, data_entrada, estoque_min, fornecedor, categoria) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Variável stmt contém a montagem da consulta, A seta "->" "diz" que o prepare está dentro
        // da propriedade $conexao recebendo a string sql com os marcadores.
        $stmt = $this->conexao->prepare($sql);

        // BindValue é responsável por receber um valor (model vindo por um parâmetro) e trocar em uma posição,
		// acessamos com a seta o dado model que queremos pegar
        
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->codigo);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->data_entrada);
        $stmt->bindValue(5, $model->estoque_min);
        $stmt->bindValue(6, $model->fornecedor);
        $stmt->bindValue(7, $model->categoria);
        
        // "Execute" executa a consulta.
        $stmt->execute();      
    }
}