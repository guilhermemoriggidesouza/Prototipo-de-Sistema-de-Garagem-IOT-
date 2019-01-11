<?php
//chamada da função que seleciona o valor do banco
//aqui vem a chama post do JS, que  vai receber o select como resposta
require_once "Cadastrar.php";
require_once "conectbanco.php";

    $data = isset($_POST["test"]);
    $dados =  new Cadastrar;

    echo $dados->select($mysqli);
?>