<?php

function openConnection()
{
    $hostName = "localhost";
    $bancoDeDados = "alunos";
    $user = "root";
    $senha = "1234";

    $conn = new mysqli($hostName, $user, $senha, $bancoDeDados);
    return $conn;
}
