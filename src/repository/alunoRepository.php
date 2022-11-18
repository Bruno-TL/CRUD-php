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
    $sql = "DELETE FROM alunos.aluno WHERE idAluno={$id}";
    openConnection()->query($sql);
}

function newAluno(string $nome, string $cidade, string $matricula): void
{
    $sql = "INSERT INTO aluno (nome,cidade,matricula) VALUES (?,?,?)";
    $query =openConnection()->prepare($sql);
    $query->execute([$nome,$cidade,$matricula]);
    
}

function updateAluno($nome, $matricula, $cidade,$id)
{
    $sql = "UPDATE aluno SET nome=?, matricula=?, cidade=? WHERE idAluno=?";
    $query = openConnection()->prepare($sql);
    $query->execute([$nome, $matricula, $cidade,$id]);
}