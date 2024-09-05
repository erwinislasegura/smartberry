<?php 

class DocumentoModel {
    private $db;

    public function __construct() {
        $this->db = BDCONFIG::conectar();  // Conectar a la base de datos
    }

    public function getDocumentosByProductor($productorId) {
        $query = "SELECT * FROM tb_documento WHERE productor_documento = :productorId";
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
