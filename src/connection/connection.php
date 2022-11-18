<?php

function openConnection():PDO
{
    $hostName = "localhost";
    $bancoDeDados = "alunos";
    $user = "root";
    $senha = "1234";

    $conn = new PDO("mysql:host={$hostName}; dbname={$bancoDeDados}",$user, $senha);
    return $conn;
}
