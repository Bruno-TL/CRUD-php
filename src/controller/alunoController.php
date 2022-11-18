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

    if(false === empty($_POST)){
        $nome = trim($_POST['nome']);
        $cidade = trim($_POST['cidade']);
        $matricula = trim($_POST['matricula']);

        if(true === validateForm($nome,$cidade,$matricula))
        {
            newAluno($nome,$cidade,$matricula);
            header('location: /list');
        }
    }
}

function delete(): void
{
    $id = $_GET['id']; //recuperando o id que tava na URL

    deleteAlunos($id);

    header('location: /list');
}

function update() 
{
    $id =$_GET["id"];
    $aluno = searchOnlyAlunos($id);
    updateAluno();
    include '../src/views/update.phtml';
}