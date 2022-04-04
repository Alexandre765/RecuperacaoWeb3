<?php

 // O Controller é responsáveL por processar as requisições do usuário, 
 // sempre que um usuário chama uma rota, um método Controller é chamado.
 // O método pode devolver uma View, acessar uma Model,
 // redirecionar o usuário para outra rota ou chamar outro Controller.
 
class ProdutoController 
{
 
     // As index são usadas para devolver uma View.

    public static function index() 
    {
        include 'View/modules/Produto/ListaProdutos.php';
    }


     // Devolve uma View que contém um formulário para o usuário.
 
    public static function form()
    {
        include 'View/modules/Produto/FormProduto.php';
    }

  
     // Preenche um Model para que seja enviado ao banco de dados para o mesmo salvar.

    public static function save() {

        include 'Model/ProdutoModel.php'; 
		
		// inclui o arquivo model.

        // Cada propriedade do objeto ´é abastecida com os dados informados
        // pelo usuário no formulário, por isso o método POST
		
		
        $produto = new ProdutoModel();

        $produto->nome = $_POST['nome'];
        $produto->codigo = $_POST['codigo'];
        $produto->descricao = $_POST['descricao'];
        $produto->data_entrada = $_POST['data_entrada'];
        $produto->estoque_min = $_POST['estoque_min'];
        $produto->fornecedor = $_POST['fornecedor'];
        $produto->categoria = $_POST['categoria'];

        $produto->save();  
		
		// chama o método save da model.

        header("Location: /produto"); 
		
		// redireciona o usuário para outra rota.
    }
}