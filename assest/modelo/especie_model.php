<?php 
include_once '../../assest/config/BDCONFIG.php';
class EspecieModel {
    private $db;

    public function __construct() {
        $dbConfig = new BDCONFIG(); // Crea una instancia de BDCONFIG
        $this->db = $dbConfig->conectar();  // Conectar a la base de datos usando el método de instancia
    }

    public function getAllEspecie() {
        $query = "SELECT * FROM fruta_especies WHERE ESTADO_REGISTRO = 1";

        $result =  $this->db->query($query)->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
