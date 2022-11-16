<?php

//definindo que nesse arquivo será trabalhando os tipos de dados.


declare(strict_types=1);

function home(): void // estamos declarando que essa função "não tem retorno"
{
    include '../src/views/home.phtml';
}

function listAluno(): void
{
    include '../src/views/list.phtml';
}

function newAluno(): void
{
    include '../src/views/new.phtml';
}