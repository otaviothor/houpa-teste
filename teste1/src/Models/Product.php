<?php

namespace Src\Models;

use CoffeeCode\DataLayer\DataLayer;

class Product extends DataLayer
{

  /**
   * funcao construtora com a abstracao da tabela de produtos do 
   * banco de dados
   */
  public function __construct()
  {
    parent::__construct("products", ["name", "description", "price", "image_url"]);
  }
}