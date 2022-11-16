<?php 

$rota = $_SERVER['REQUEST_URI'];

require_once '../src/controller/alunoController.php';

$pages = [
    '/' => 'home',
    '/list' => 'listAluno',
    '/new' => 'newAluno' 
];

include '../src/views/menu.phtml';

if(false === isset($pages[$rota])) {
    include '../src/views/error404.phtml';
    exit;
}

echo $pages[$rota]();