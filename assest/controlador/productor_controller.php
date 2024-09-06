<?php

include_once '../../assest/modelo/productor_model.php';
include_once '../../assest/modelo/documento_model.php';

class ProductorController {
    private $productorModel;
    private $documentoModel;

    public function __construct() {
        // Crea instancias de los modelos
        $this->productorModel = new ProductorModel();
        $this->documentoModel = new DocumentoModel();
    }

    // Detectar la acción enviada por AJAX

    public function index() {
        $productores = $this->productorModel->getAllProductores();
       return $productores;
    }

    

    public function viewDocumentos($productorId) {
        $documentos = $this->documentoModel->getDocumentosByProductor($productorId);
        return $documentos;
    }

    public function uploadDocumento() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $productorId = $_POST['productor'];
            $nombreDocumento = $_POST['nombre_documento'];
            $fechaVigencia = $_POST['fecha_vigencia'];

            // Convertir la fecha de vigencia a formato DDMMYYYY
            $fechaVigenciaFormateada = date("dmY", strtotime($fechaVigencia));

            // Generar un código aleatorio irrepetible de 8 caracteres
            $codigoAleatorio = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);

            // Validar archivo
            if (isset($_FILES['documento']) && $_FILES['documento']['error'] == UPLOAD_ERR_OK) {
                $extension = pathinfo($_FILES['documento']['name'], PATHINFO_EXTENSION);  // Obtener la extensión del archivo
                $nombreArchivo = "{$productorId}_{$nombreDocumento}_{$fechaVigenciaFormateada}_{$codigoAleatorio}.{$extension}";
                $rutaDestino = '../../data/data_productor/' . basename($nombreArchivo);
                move_uploaded_file($_FILES['documento']['tmp_name'], $rutaDestino);

                // Guardar datos en la base de datos
                $data = [
                    'productor_documento' => $productorId,
                    'nombre_documento' => $nombreDocumento,
                    'vigencia_documento' => $fechaVigencia,
                    'archivo_documento' => $nombreArchivo
                ];

                $this->productorModel->saveDocumento($data);

                // Enviar respuesta JSON
                echo json_encode(['message' => 'Documento subido correctamente']);
                return;
            }

            // En caso de error con el archivo
            echo json_encode(['message' => 'Error al subir el archivo']);
        } 
        
    }

    public function deleteDocumento($id) {
        $this->documentoModel->deleteDocumento($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}


// Detectar la acción enviada por AJAX
if (isset($_GET['action']) || isset($_POST['action'])) {
    $controller = new ProductorController();
    
    $action = $_GET['action'] ?? $_POST['action']; // Detectar si la acción está en GET o POST

    switch ($action) {
        case 'uploadDocumento':
            $controller->uploadDocumento();
            break;
        case 'deleteDocumento':
            $controller->deleteDocumento();
            break;
        case 'viewDocumentos':
            if (isset($_GET['productorId'])) {
                $controller->viewDocumentos($_GET['productorId']);
            }
            break;
        // Agregar otros casos para otras acciones
        default:
            echo json_encode(['success' => false, 'message' => 'Acción no válida']);
            break;
    }
}
