<?php 
include_once '../../assest/config/BDCONFIG.php';
class ProductorModel {
    private $db;

    public function __construct() {
        $dbConfig = new BDCONFIG(); // Crea una instancia de BDCONFIG
        $this->db = $dbConfig->conectar();  // Conectar a la base de datos usando el método de instancia
    }

    public function getAllProductores($ID_EMPRESA) {
        $query = "SELECT *, (SELECT COUNT(id_documento) FROM tb_documento WHERE estado_documento = 1 AND productor_documento = id_productor)AS NUMERO_DOCUMENTOS FROM fruta_productor WHERE ID_EMPRESA='".$ID_EMPRESA."'";

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
        $query = "INSERT INTO tb_documento (productor_documento, archivo_documento, vigencia_documento, estado_documento, nombre_documento, create_documento) 
                  VALUES (:productor_documento, :archivo_documento, :vigencia_documento, 1, :nombre_documento, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->execute($data);
    }
}
