<?php
//muda as configurações para ligado ou desligado
    include "conectbanco.php";

    $estado = $_POST['estado'];
    
    function update($status, $mysqli){
        $query = mysqli_query($mysqli,"UPDATE config SET estado = '$status'") or die(mysqli_error($mysqli));
    }

    if(update($estado, $mysqli)){
        echo "LIGADO";
    }else{
        echo "DESLIGADO";
    }
        
?>