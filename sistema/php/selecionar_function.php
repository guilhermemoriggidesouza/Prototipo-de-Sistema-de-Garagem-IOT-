<?php
include "conectbanco.php";
//função que seleciona o valor que foi cadastrado no banco
function select(){
    include "conectbanco.php";
    $query = mysqli_query($mysqli, "SELECT * FROM garagem_moriggi ORDER BY id desc")or die(mysqli_error($mysqli));
    $total = mysqli_num_rows($query)or die(mysqli_error($mysqli));
    $rows = mysqli_fetch_assoc($query)or die(mysqli_error($mysqli));
    if($total>0){
        $val = $rows["val"];
    }
    return $val;
}
?>