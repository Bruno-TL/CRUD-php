<?php

//definindo que nesse arquivo será trabalhando os tipos de dados.

 
declare(strict_types=1);

function render(string $nomeDoArquivo, mixed $dados = null) 
{
    include '../src/views/header.phtml';
    include "../src/views/{$nomeDoArquivo}.phtml";
    $dados;
    include '../src/views/footer.phtml';
}

function redirection (string $onde) 
{
    header("location: {$onde}");
}

function home(): void // estamos declarando que essa função "não tem retorno"
{
    render("home");
}

function listAluno(): void
{
    $alunos = searchAlunos();
    render("list", $alunos);
}

function newAlunos(): void
{   
    render("new");

    if(false === empty($_POST)){
        $nome = trim($_POST['nome']);
        $cidade = trim($_POST['cidade']);
        $matricula = trim($_POST['matricula']);

        if(true === validateForm($nome,$cidade,$matricula))
        {
            newAluno($nome,$cidade,$matricula);
            redirection('/list');
        }
    }
}

function delete(): void
{
    $id = $_GET['id']; //recuperando o id que tava na URL

    deleteAlunos($id);

    redirection('/list');
}

function update() 
{
    $id =$_GET["id"];
    $aluno = searchOnlyAlunos($id);
    render("update",$aluno);
    if(false === empty($_POST)){
        $nome = trim($_POST['nome']);
        $cidade = trim($_POST['cidade']);
        $matricula = trim($_POST['matricula']);

        if(true === validateForm($nome,$cidade,$matricula)){
            updateAluno($nome,$cidade,$matricula,$id);
            redirection('/list');
        }
    }
}