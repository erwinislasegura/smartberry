<?php

include_once '../../assest/modelo/productor_model.php';

class ProductorController {
    private $productorModel;

    public function __construct() {
        // Crea instancias de los modelos
        $this->productorModel = new ProductorModel();
    }

    public function index() {
        $productores = $this->productorModel->getAllProductores();

       return $productores;
    }

    public function viewDocumentos($productorId) {
        $documentos = $this->documentoModel->getDocumentosByProductor($productorId);
        include 'views/documentos/index.php';
    }

    public function uploadDocumento() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombreDocumento = $_FILES['documento']['name'];
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($nombreDocumento);
            move_uploaded_file($_FILES['documento']['tmp_name'], $targetFile);

            $data = [
                'productor_documento' => $_POST['productor_id'],
                'nombre_documento' => $nombreDocumento
            ];

            $this->documentoModel->saveDocumento($data);
            header('Location: /productores');
        } else {
            $productores = $this->productorModel->getAllProductores();
            include 'views/documentos/upload.php';
        }
    }

    public function deleteDocumento($id) {
        $this->documentoModel->deleteDocumento($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
