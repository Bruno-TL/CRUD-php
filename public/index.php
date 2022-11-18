<?php 

$rota = explode('?',$_SERVER['REQUEST_URI']);
$rota = $rota[0];

require_once '../src/controller/alunoController.php';
require_once '../src/connection/connection.php';
require_once '../src/repository/alunoRepository.php';
require_once '../src/validator/alunoValidator.php';

$pages = [
    '/' => 'home',
    '/list' => 'listAluno',
    '/new' => 'newAlunos',
    '/update' => 'update',
    '/delete' => 'delete',
    
];

if(false === isset($pages[$rota])) {
    include '../src/views/error404.phtml';
    exit;
}

echo $pages[$rota]();