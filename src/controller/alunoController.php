<?php

//definindo que nesse arquivo será trabalhando os tipos de dados.

 
declare(strict_types=1);

function home(): void // estamos declarando que essa função "não tem retorno"
{
    include '../src/views/home.phtml';
}

function listAluno(): void
{
    $alunos = searchAlunos();
    include '../src/views/list.phtml';
}

function newAlunos(): void
{   
    include '../src/views/new.phtml';
    newAluno();
}

function delete(): void
{
    $id = $_GET['id']; //recuperando o id que tava na URL

    deleteAlunos($id);

    header('location: /listar');
}

function update() 
{
    include '../src/views/update.phtml';
}