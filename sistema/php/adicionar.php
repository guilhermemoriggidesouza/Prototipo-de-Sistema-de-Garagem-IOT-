
<?php
require_once "Cadastrar.php";
include "conectbanco.php";
//pega o valor do sensor
$val = $_GET['val'];
//define a data e o tempo 
$temp = date('h:i');
            
$date = date('d:m:y');
//cria objeto  para cadastrar
$hcr =  new Cadastrar($val, $temp, $date, $mysqli);
//define valor
$valor = "";
//seleciona o dado da  tabela de controle pra ver se o sistema está ligado ou desligado      
$query = mysqli_query($mysqli, "SELECT * FROM config")or die(mysqli_error($mysqli));
$total = mysqli_num_rows($query)or die(mysqli_error($mysqli));
$rows = mysqli_fetch_assoc($query)or die(mysqli_error($mysqli));
//atribui esse dado ao valor
if($total>0){
    $valor = $rows["estado"];

}     
//caso o dado seja "ligado", inicia o cadastro
if($valor == "ligado"){
    $hcr->cadastrando();
}else{
    echo "Sistema Desligado";
}
?>