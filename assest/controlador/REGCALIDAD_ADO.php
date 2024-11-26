<?php

// LLAMADA DE LOS ARCHIVOS NECESARIOS PARA LA OPERACION DEL CONTROLADOR
include_once '../../assest/modelo/REGCALIDAD.php';
include_once '../../assest/config/BDCONFIG.php';

// INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

// ESTRUCTURA DEL CONTROLADOR
class REGCALIDAD_ADO {
    
    private $conexion;

    public function __CONSTRUCT() {
        try {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');
            
            $this->conexion = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME, $USER, $PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarRegCalidad($folioex, $empresa) {
        try {
            $datos = $this->conexion->prepare("SELECT * FROM registro_calidad WHERE FOLIOEX = ? AND ID_EMPRESA = ? AND ESTADO=1 order by ID DESC;");
            $datos->execute([$folioex, $empresa]);
            $resultado = $datos->fetchAll();
            $datos = null;
            return $resultado;
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarResumenRegCalidad($empresa, $temporada) {
        try {
            $datos = $this->conexion->prepare("SELECT * FROM registro_calidad 
             LEFT JOIN fruta_exiexportacion  on fruta_exiexportacion.FOLIO_AUXILIAR_EXIEXPORTACION = registro_calidad.FOLIO 
             LEFT JOIN fruta_productor on fruta_productor.id_productor = fruta_exiexportacion.id_productor 
             LEFT JOIN estandar_eexportacion on estandar_eexportacion.ID_ESTANDAR = fruta_exiexportacion.ID_ESTANDAR 
             WHERE registro_calidad.ID_EMPRESA = ? AND registro_calidad.ESTADO=1 AND fruta_exiexportacion.ID_TEMPORADA=?  order by ID DESC;");
            $datos->execute([$empresa]);
            $datos->execute([$temporada]);
            $resultado = $datos->fetchAll();
            $datos = null;
            return $resultado;




        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarRegCalidad(REGCALIDAD $REGCALIDAD) {
        try {
            $query = "INSERT INTO registro_calidad (FOLIOEX,
                         FOLIO, FECHA, HORA, ID_USUARIO, TIPO, BAXLO_PROMEDIO, PESO_10_FRUTOS, 
                         TEMPERATURA, BRIX, PUDRICION_MICELIO, HERIDAS_ABIERTAS, DESHIDRATACION,
                         EXUDACION_JUGO, BLANDO, MACHUCON, INMADURA_ROJA, QC_CALIDAD, 
                         QC_CONDICION, ESTADO, ID_EMPRESA
                     ) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?)";
            
            $this->conexion->prepare($query)->execute(array(
                $REGCALIDAD->__GET('FOLIOEX'),
                $REGCALIDAD->__GET('FOLIO'),
                $REGCALIDAD->__GET('FECHA'),
                $REGCALIDAD->__GET('HORA'),
                $REGCALIDAD->__GET('ID_USUARIO'),
                $REGCALIDAD->__GET('TIPO'),
                $REGCALIDAD->__GET('BAXLO_PROMEDIO'),
                $REGCALIDAD->__GET('PESO_10_FRUTOS'),
                $REGCALIDAD->__GET('TEMPERATURA'),
                $REGCALIDAD->__GET('BRIX'),
                $REGCALIDAD->__GET('PUDRICION_MICELIO'),
                $REGCALIDAD->__GET('HERIDAS_ABIERTAS'),
                $REGCALIDAD->__GET('DESHIDRATACION'),
                $REGCALIDAD->__GET('EXUDACION_JUGO'),
                $REGCALIDAD->__GET('BLANDO'),
                $REGCALIDAD->__GET('MACHUCON'),
                $REGCALIDAD->__GET('INMADURA_ROJA'),
                $REGCALIDAD->__GET('QC_CALIDAD'),
                $REGCALIDAD->__GET('QC_CONDICION'),
                $REGCALIDAD->__GET('ID_EMPRESA')
            ));
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function rechazoFolioCalidad(REGCALIDAD $REGCALIDAD) {
        try {

        $query = "
            UPDATE fruta_exiexportacion SET
                COLOR=1 
            WHERE FOLIO_EXIEXPORTACION= ?;";
            $this->conexion->prepare($query)->execute(array(
                        $REGCALIDAD->__GET('FOLIOEX')
            ));


          
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function handleAjaxRequest() {

 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';

            if ($action == 'insert') {
                $regCalidad = new REGCALIDAD();
                $regCalidad->__SET('FOLIOEX', $_POST['folioex']);
                $regCalidad->__SET('FOLIO', $_POST['folio']);
                $regCalidad->__SET('FECHA', $_POST['fecha']);
                $regCalidad->__SET('HORA', $_POST['hora']);
                $regCalidad->__SET('ID_USUARIO', $_POST['usuario']);
                $regCalidad->__SET('TIPO', $_POST['tipo']);
                $regCalidad->__SET('BAXLO_PROMEDIO', $_POST['baxlo_promedio']);
                $regCalidad->__SET('PESO_10_FRUTOS', $_POST['peso_10_frutos']);
                $regCalidad->__SET('TEMPERATURA', $_POST['temperatura']);
                $regCalidad->__SET('BRIX', $_POST['brix']);
                $regCalidad->__SET('PUDRICION_MICELIO', $_POST['pudricion_micelio']);
                $regCalidad->__SET('HERIDAS_ABIERTAS', $_POST['heridas_abiertas']);
                $regCalidad->__SET('DESHIDRATACION', $_POST['deshidratacion']);
                $regCalidad->__SET('EXUDACION_JUGO', $_POST['exudacion_jugo']);
                $regCalidad->__SET('BLANDO', $_POST['blando']);
                $regCalidad->__SET('MACHUCON', $_POST['machucon']);
                $regCalidad->__SET('INMADURA_ROJA', $_POST['inmadura_roja']);
                $regCalidad->__SET('QC_CALIDAD', $_POST['qc_calidad']);
                $regCalidad->__SET('QC_CONDICION', $_POST['qc_condicion']);
                $regCalidad->__SET('ID_EMPRESA', $_POST['empresa']);
                
                $this->agregarRegCalidad($regCalidad);
                
                echo 1;
            } elseif ($action == 'list') {

                $folioex = $_POST['folioex'];
                $empresa = $_POST['empresa'];
                $resultado = $this->listarRegCalidad($folioex, $empresa);
                echo json_encode($resultado);

            }elseif ($action == 'listResumen') {

                $empresa = $_POST['empresa'];
                $temporada = $_POST['temporada'];
                $resultado = $this->listarResumenRegCalidad($empresa, $temporada);
                echo json_encode($resultado);

            }elseif ($action == 'rechazo') {

                $regCalidad = new REGCALIDAD();
                $regCalidad->__SET('FOLIOEX', $_POST['folioex']);
                $this->rechazoFolioCalidad($regCalidad);

                echo 1;

            } else {
                echo 2;
            }
        }
    }
}

$controller = new REGCALIDAD_ADO();
$controller->handleAjaxRequest();

?>