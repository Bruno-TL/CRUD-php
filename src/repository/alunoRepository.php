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
    $sql = "SELECT * FROM alunos.aluno WHERE idAluno='{$id}'";
    $aluno = openConnection()->query($sql);
    return $aluno->fetch(PDO::FETCH_ASSOC);
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

        $sql = "INSERT INTO aluno (nome,cidade,matricula) VALUES (?,?,?)";
        $query =openConnection()->prepare($sql);
        $query->execute([$nome,$cidade,$matricula]);
        header('location: /list');
    }
}

function updateAluno()
{
    if(false === empty($_POST)){
        $id = $_POST['idAluno'];
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $cidade = $_POST['cidade'];

        
        $sql = "UPDATE aluno SET nome=?, matricula=?, cidade=? WHERE id=?";
        $query = openConnection()->prepare($sql);
        $query->execute([$nome, $matricula, $cidade,$id]);
        header('location: /list');
    }
}