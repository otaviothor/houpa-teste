<?php

/**
 * constante com a rota raiz onde o projeto esta rodando
 */
define("ROOT", "http://192.168.1.9/houpa-teste/teste1");

/**
 * constante com dados de configuracao do componente DataLayer 
 * utilizado na abstracao do banco de dados
 */
define('DATA_LAYER_CONFIG', [
  "driver" => "mysql",
  "host" => "localhost",
  "port" => "3306",
  "dbname" => "shop",
  "username" => "root",
  "passwd" => "",
  "options" => [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_CASE => PDO::CASE_NATURAL
  ]
]);

/**
 * funcao utilizada para trabalhar com o roteamento
 */
function url(string $uri = null): string
{
  if ($uri) {
    return ROOT . "/{$uri}";
  }

  return ROOT;
}

/**
 * funcao utilizada para importar assets no projeto como CSS ou JS
 */
function asset($path): string
{
  return ROOT . "/theme/assets{$path}";
}

/**
 * funcao utilizada para importar pacotes instalados com o NPM
 */
function package($path): string
{
  return ROOT . "/node_modules{$path}";
}

/**
 * funcao utilizada para importar as fotos dos produtos
 */
function upload($path): string
{
  return ROOT . "/uploads{$path}";
}
