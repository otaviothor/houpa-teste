<?php

namespace Src\Controllers;

use League\Plates\Engine;
use Src\Models\Product;

class Web
{
  /**
   * funcao construtora onde ele inicializa o Plates que e o 
   * sistema de template padrao de PHP e tambem injeta um 
   * parametro router que serve para trabalhar com o roteamento
   * do projeto
   */
  public function __construct($router)
  {
    $this->view = Engine::create(
      dirname(__DIR__, 2) . "/theme",
      "php"
    );
    $this->view->addData(["router" => $router]);
  }

  /**
   * funcao utilizada para renderizar o template home
   * passando como parametro uma variavel contendo todos os
   * produtos que foi abtido atraves da classe Product
   * onde foi abstraido todo a tabela de produtos do 
   * banco de dados
   */
  public function home(): void
  {
    echo $this->view->render("home", [
      "products" => (new Product())->find()->fetch(true)
    ]);
  }

  /**
   * funcao utilizada para renderizar o template show
   * passando como parametro uma variavel contendo um 
   * unico produto selecionado para consulta das demais
   * informacoes, porem ele verifica antes se o dado esta 
   * no banco, caso ele nao esteja, ele renderiza o template
   * de erro passando como parametro uma variavel especificando
   * o erro
   */
  public function show(array $data)
  {
    $product = (new Product())->findById($data["id"]);

    if ($product) {
      echo $this->view->render("show", [
        "product" => $product
      ]);
    } else {
      echo $this->view->render("error", [
        "error" => "Produto não encontrado"
      ]); 
    }
  }

  /**
   * funcao utilizada para renderizar o template form
   * utilizado para realizar um novo cadastro de produto
   */
  public function showForm()
  {
    echo $this->view->render("form", [
      "title" => "Cadastrar de produto",
      "subtitle" => "Preencha os dados abaixo.",
    ]);
  }

  /**
   * funcao utilizada para cadastrar um novo produto
   * onde ela é acessada por uma requisicao ajax via post
   * ele verifica se todos os campos foram preenchidos, 
   * caso nao esteja ele retorna um callback com uma 
   * mensagem de erro
   * caso esteja, ele realizado o cadastro e tambem 
   * retorna um callback com uma mensagem de sucesso
   */
  public function create(array $data)
  {
    $productData = filter_var_array($data, FILTER_SANITIZE_STRING);
    if (in_array("", $productData)) {
      $callback["message"] = "Preencha todos os campos!";
      $callback["error"] = true;
      echo json_encode($callback);
      return;
    }

    $product = new Product();
    $product->name = $productData["name"];
    $product->description = $productData["description"];
    $product->price = $productData["price"];
    $product->image_url = $productData["image"];
    $product->save();

    $callback["message"] = "Produto cadastrado com sucesso";
    echo json_encode($callback);
  }

  /**
   * funcao utilizada para atualizar um produto
   * onde ela é acessada por uma requisicao ajax via post
   * ele verifica se todos os campos foram preenchidos, 
   * caso nao esteja ele retorna um callback com uma 
   * mensagem de erro
   * caso esteja, ele realizado atualiza as informacoes e 
   * retorna um callback com uma mensagem de sucesso
   */
  public function edit(array $data)
  {
    $productData = filter_var_array($data, FILTER_SANITIZE_STRING);
    if (in_array("", $productData)) {
      $callback["message"] = "Preencha todos os campos!";
      $callback["error"] = true;
      echo json_encode($callback);
      return;
    }

    $product = (new Product())->findById($productData["id"]);   
    $product->name = $productData["name"];
    $product->description = $productData["description"];
    $product->price = $productData["price"];
    $product->image_url = $productData["image"];
    $product->save();

    $callback["message"] = "Produto editado com sucesso";
    echo json_encode($callback);
  }

  /**
   * funcao utilizada para renderizar o template edit
   * utilizado para editar um produto
   * ele envia como parametros, uma variavel com os dados
   * do produto para que os campos ja estejam preenchidos  
   * caso a o produto nao esteja cadastrado, ele renderiza 
   * o template de erro passando como parametro uma variavel 
   * especificando o erro
   */
  public function showFormEdit(array $data)
  {
    $product = (new Product())->findById($data["id"]);

    if ($product) {
      echo $this->view->render("edit", [
        "title" => "Editar produto",
        "subtitle" => "Preencha os dados abaixo.",
        "product" => $product
      ]);
    } else {
      echo $this->view->render("error", [
        "error" => "Produto não encontrado"
      ]);
    }
  }

  /**
   * funcao utilizada para excluir um produto
   * onde ela é acessada por uma requisicao ajax via post
   * ele verifica se foi enviado o id do produto 
   * e se o tipo do dado enviado e int 
   * caso esteja tudo ok, ele realizado a exclusao e 
   * retorna um callback com uma mensagem de sucesso
   */
  public function delete($data)
  {
    if (empty($data["id"])) {
      return;
    }

    $id = filter_var($data["id"], FILTER_VALIDATE_INT);
    $product = (new Product())->findById($id);

    if ($product) {
      $product->destroy();
    }

    $callback["message"] = "Produto excluído com sucesso!";
    echo json_encode($callback);
  }
}