<?php 
include_once '../../assest/config/BDCONFIG.php';
class ProductorModel {
    private $db;

    public function __construct() {
        $dbConfig = new BDCONFIG(); // Crea una instancia de BDCONFIG
        $this->db = $dbConfig->conectar();  // Conectar a la base de datos usando el método de instancia
    }

    public function getAllProductores() {
        $query = "SELECT * FROM fruta_productor";
        $result =  $this->db->query($query)->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getProductorById($id) {
        $query = "SELECT * FROM fruta_productor WHERE ID_PRODUCTOR = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function saveDocumento($data) {
        $query = "INSERT INTO tb_documento (productor_documento, estado_documento, nombre_documento, create_documento) 
                  VALUES (:productor_documento, 1, :nombre_documento, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->execute($data);
    }
}
