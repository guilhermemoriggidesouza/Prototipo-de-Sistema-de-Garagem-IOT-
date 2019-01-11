<?php
//sistema poo para cadastro
include_once "conectbanco.php";
class Cadastrar{
    private $valorCm;
    private $tempo;
    private $conn;
    private $insert;
    private $dataMes;
    private $contador;
    private $result;
    private $query;
    private $total;
    private $rows;

    public function cadastrando($valor, $temp, $data, $conn){
        $this->valorCm_sql = $valor;
        $this->tempo_sql = $temp;
        $this->conn = $conn;
        $this->data_sql = $data;

        $this->insert = mysqli_query($this->conn, "INSERT INTO  garagem_moriggi VALUES (null, '$this->valorCm_sql', '$this->tempo_sql', '$this->data_sql')")or die(mysqli_error($this->conn));
        
        if($this->insert){
            return true;

        }else{
            return false;
        }
    }
    public function resetar(){

    }
    public function select($conn){
        $this->conn = $conn;
        $this->query = mysqli_query($this->conn, "SELECT * FROM garagem_moriggi ORDER BY id desc")or die(mysqli_error($this->conn));
        $this->total = mysqli_num_rows($this->query)or die(mysqli_error($this->conn));
        $this->rows = mysqli_fetch_assoc($this->query)or die(mysqli_error($this->conn));
        if($this->total>0){
            $this->setResult($this->rows["val"]);
        }elseif($this->total >5000){
            $this->setResult($this->rows["val"]);
            $this->reset();
        }
        return $this->getResult();
    }
    public function reset(){
        $this->insert = mysqli_query($this->conn, "TRUNCATE TABLE garagem_moriggi")or die(mysqli_error($this->conn));
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
    public function getContador()
    {
        return $this->contador;
    }
    public function setContador($contador)
    {
        $this->contador = $contador;
    }
    public function getResult()
    {
        return $this->result;
    }
    public function setResult($result)
    {
        $this->result = $result;
    } 
    public function getQuery()
    {
        return $this->query;
    }
    public function setQuery($query)
    {
        $this->query = $query;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
    public function getRows()
    {
        return $this->rows;
    } 
    public function setRows($rows)
    {
        $this->rows = $rows;
    }
}
?>