<?php
//chamada da função que seleciona o valor do banco
//aqui vem a chama post do JS, que  vai receber o select como resposta
include "selecionar_function.php";

    $data = isset($_POST["test"]);
    
    echo select();
?>