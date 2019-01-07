<?php
//sistema poo para cadastro
include_once "conectbanco.php";
class Cadastrar{
    private $valorCm;
    private $tempo;
    private $conn;
    private $insert;
    private $dataMes;

    public function __construct($valor, $temp, $data, $conn){
        $this->setValorCm($valor);
        $this->setTempo($temp);
        $this->setDataMes($data);
        $this->setConn($conn);
    }

    public function cadastrando(){
        $valorCm_sql = $this->getValorCm();
        $tempo_sql = $this->getTempo();
        $conn = $this->getConn();
        $data_sql = $this->getDataMes();

        $this->insert = mysqli_query($this->conn, "INSERT INTO  garagem_moriggi VALUES (null, '$valorCm_sql', '$tempo_sql', '$data_sql')")or die(mysqli_error($this->conn));
        
        if($this->insert){
            return true;
        }else{
            return false;
        }
    }
    public function getTempo(){
        return $this->tempo;
    }
    public function setTempo($tempo){
        $this->tempo = $tempo;
    }
    public function getValorCm(){
        return $this->valorCm;
    }
    public function setValorCm($valorCm){
        $this->valorCm = $valorCm;
    }
    public function getConn()
    {
        return $this->conn;
    }
    public function setConn($conn)
    {
        $this->conn = $conn;
    }
    public function getDataMes()
    {
        return $this->dataMes;
    }
    public function setDataMes($dataMes)
    {
        $this->dataMes = $dataMes;
    }
}
?>