<?php

use CoffeeCode\Router\Router;

require __DIR__."/vendor/autoload.php";

/**
 * instancia do componente router passando com parametro
 * a constante de raiz do projeto
 */
$route = new Router(ROOT);

/**
 * setando o namespace contendo os controladores que serao acessados
 * ao acessar as rotas
 */
$route->namespace("Src\Controllers");

/**
 * rotas padroes do sistema que serao acessados, onde
 * o primeiro parametro de cada rota e a URL, o segundo
 * e a funcao do controlador e o terceiro e o nome da rota
 */
$route->group(null);
$route->get("/", "Web:home", "web.home");
$route->get("/{id}", "Web:show", "web.show");
$route->get("/{id}/editar", "Web:showForm", "web.showFormEdit");
$route->post("/excluir", "Web:delete", "web.delete");
$route->get("/novo", "Web:showForm", "web.showForm");
$route->post("/criar", "Web:create", "web.create");
$route->post("/salvar", "Web:edit", "web.edit");

/**
 * rotas de erro do sistema
 */
$route->group("ops");
$route->get("/", "Web:error");

/**
 * funcao que despacha as rotas para o funcionamento 
 */
$route->dispatch();
