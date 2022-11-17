<?php

declare(strict_types=1);

function searchAlunos(): iterable
{
    $sql = 'SELECT * FROM alunos.aluno';
    $alunos = openConnection()->query($sql);
    return $alunos;
}


function searchOnlyAlunos($id): iterable
{
    $sql = "SELECT * FROM alunos.aluno WHERE id='{$id}'";
    $aluno = openConnection()->query($sql);
    return $aluno;
}

function deleteAlunos(string $id): void 
{
    $sql = "DELETE FROM alunos.aluno WHERE id={$id}";
    openConnection()->query($sql);
}

function newAluno(): void
{
    if(isset($_POST['cadastrar'])){
        $nome= $_POST['nome'];
        $cidade = $_POST['cidade'];
        $matricula = $_POST['matricula'];

        $sql = "INSERT INTO aluno (nome,cidade,matricula) VALUES ('{$nome}','{$cidade}','{$matricula}')";
        $inserir = mysqli_query(openConnection(),$sql);
        header('location: /list');
    }
}

// function updateAluno()
// {

// }