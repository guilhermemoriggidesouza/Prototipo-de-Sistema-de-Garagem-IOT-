//define variaveis globais
var val;
var giro;
var deletes;

function addButton(){
    //envia resposta para update para ligar o sistema de cadastro
    $.post("php/update.php", {estado: "ligado"}, function(valor){
        $("#sistema").html("<h3>"+valor+"</h3>");
    });
    //cria um laço q a cada 200 milisegundos enviauma solicitação para receber os dados e trata-los
    giro = setInterval(function(){
        let recebido = "";
        $.ajax({url: "php/select_monitorado.php", success: function(result){
            recebido = result;
            if(recebido<10){
                $("#dados").html("<h1 class='display-1 text-center'>PARAAA</h1>");
                $("#gif").html("<img class='big text-center' src='gifs/stop.gif'>");
                console.log(recebido);
            }else if(recebido >= 51){
                $("#dados").html("<h1 class='display-1 text-center'>Carro a mais de "+recebido+" centimetros da parede</h1>");
                $("#gif").html("<img  class='big' src='gifs/podevir.gif'>");
                console.log(recebido);
            }else{
                $("#dados").html("<h1 class='display-1 text-center'>"+recebido+" Centimetros da parede</h1>");
                $("#gif").html("<img class='big' src='gifs/podevir.gif'>");
                console.log(recebido);
            }
          }});
       
    } ,30);

}
//função que muda a tabela config para desligado, para o laço e limpa a tela
function removeButton(){
    $.post("php/update.php", {estado: "desligado"}, function(valor){
        $("#sistema").html(valor);
    });
    clearInterval(giro);
    $("#gif").html("");
    $("#dados").html("sistema desligado");

}
window.onbeforeunload = function () {
    clearInterval(giro);
    $.post("php/update.php", {estado: "desligado"}, function(valor){
        $("#sistema").html(valor);
    });
};
