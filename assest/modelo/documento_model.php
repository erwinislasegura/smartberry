<?php 
include_once '../../assest/config/BDCONFIG.php';
class DocumentoModel {
    private $db;

    public function __construct() {
        $dbConfig = new BDCONFIG();  // Conectar a la base de datos
        $this->db = $dbConfig->conectar();
    }

    public function getDocumentosByProductor($productorId) {
        $query = "SELECT * FROM tb_documento WHERE productor_documento = :productorId AND estado_documento = 1";
        //echo $productorId.' '.$query;
        $stmt = $this->db->prepare($query);
        $stmt->execute(['productorId' => $productorId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getDocumentosByProductorEspecie($productorId, $especieId) {
        $query = "SELECT * FROM tb_documento WHERE productor_documento = :productorId AND estado_documento = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['productorId' => $productorId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getDocumentoById($id) {
        $query = "SELECT * FROM tb_documento WHERE id_documento = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function deleteDocumento($id) {
        $query = "UPDATE tb_documento SET estado_documento = 3 WHERE id_documento = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
    }
}
