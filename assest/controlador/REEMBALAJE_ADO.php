<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/REEMBALAJE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class REEMBALAJE_ADO
{

    //ATRIBUTO
    private $conexion;

    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS
    public function __CONSTRUCT()
    {
        try {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');


            $this->conexion = new PDO('mysql:host=' . $HOST . ';dbname=' . $DBNAME, $USER, $PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //FUNCIONES BASICAS 
    //LISTAR TODO CON LIMITE DE 8 FILAS
    public function listarReembalaje()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_reembalaje LIMIT 6;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //LISTAR TODO
    public function listarReembalajeCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_reembalaje ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION

    public function verReembalaje($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM fruta_reembalaje WHERE ID_REEMBALAJE = '" . $IDREEMBALAJE . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verReembalaje2($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                FECHA_REEMBALAJE AS 'FECHA', 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM fruta_reembalaje WHERE ID_REEMBALAJE = '" . $IDREEMBALAJE . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function verReembalaje3($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',      
                                                DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y') AS 'FECHA' 
                                            FROM fruta_reembalaje WHERE ID_REEMBALAJE = '" . $IDREEMBALAJE . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //REGISTRO DE UNA NUEVA FILA   
    public function agregarReembalaje(REEMBALAJE $REEMBALAJE)
    {
        try {


            $query =
                "INSERT INTO fruta_reembalaje (
                                                    NUMERO_REEMBALAJE, 
                                                    FECHA_REEMBALAJE,  
                                                    TURNO,

                                                    OBSERVACIONE_REEMBALAJE, 
                                                    ID_VESPECIES, 
                                                    ID_PRODUCTOR,

                                                    ID_TREEMBALAJE,  
                                                    ID_EMPRESA,
                                                    ID_PLANTA,

                                                    ID_TEMPORADA, 
                                                    ID_USUARIOI, 
                                                    ID_USUARIOM, 

                                                    KILOS_NETO_ENTRADA, 
                                                    KILOS_NETO_REEMBALAJE, 
                                                    KILOS_EXPORTACION_REEMBALAJE, 
                                                    KILOS_INDUSTRIAL_REEMBALAJE,
                                                    KILOS_INDUSTRIALSC_REEMBALAJE,
                                                    KILOS_INDUSTRIALNC_REEMBALAJE,
                                                    
                                                    PDEXPORTACION_REEMBALAJE, 
                                                    PDEXPORTACIONCD_REEMBALAJE, 
                                                    PDINDUSTRIAL_REEMBALAJE, 
                                                    PDINDUSTRIALSC_REEMBALAJE, 
                                                    PDINDUSTRIALNC_REEMBALAJE, 
                                                    PORCENTAJE_REEMBALAJE,

                                                    INGRESO, 
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	(?, ?, ?,   ?, ?, ?,   ?, ?, ?,   ?, ?, ?,    0, 0, 0,  0, 0, 0,  0, 0, 0, 0, 0, 0,  SYSDATE(),  SYSDATE(), 1, 1 );";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $REEMBALAJE->__GET('NUMERO_REEMBALAJE'),
                        $REEMBALAJE->__GET('FECHA_REEMBALAJE'),
                        $REEMBALAJE->__GET('TURNO'),
                        $REEMBALAJE->__GET('OBSERVACIONE_REEMBALAJE'),
                        $REEMBALAJE->__GET('ID_VESPECIES'),
                        $REEMBALAJE->__GET('ID_PRODUCTOR'),
                        $REEMBALAJE->__GET('ID_TREEMBALAJE'),
                        $REEMBALAJE->__GET('ID_EMPRESA'),
                        $REEMBALAJE->__GET('ID_PLANTA'),
                        $REEMBALAJE->__GET('ID_TEMPORADA'),
                        $REEMBALAJE->__GET('ID_USUARIOI'),
                        $REEMBALAJE->__GET('ID_USUARIOM')



                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarReembalaje(REEMBALAJE $REEMBALAJE)
    {

        try {
            $query = "
                    UPDATE fruta_reembalaje SET
                        MODIFICACION = SYSDATE(), 
                        FECHA_REEMBALAJE=?,
                        TURNO =?,
                        OBSERVACIONE_REEMBALAJE =?,     

                        KILOS_NETO_ENTRADA =?,
                        KILOS_NETO_REEMBALAJE =?,
                        KILOS_EXPORTACION_REEMBALAJE =?,
                        KILOS_INDUSTRIAL_REEMBALAJE =?, 
                        KILOS_INDUSTRIALSC_REEMBALAJE =?, 
                        KILOS_INDUSTRIALNC_REEMBALAJE =?, 

                        PDEXPORTACION_REEMBALAJE =?, 
                        PDEXPORTACIONCD_REEMBALAJE =?, 
                        PDINDUSTRIAL_REEMBALAJE =?, 
                        PDINDUSTRIALSC_REEMBALAJE =?, 
                        PDINDUSTRIALNC_REEMBALAJE =?, 
                        PORCENTAJE_REEMBALAJE =?,

                        ID_TREEMBALAJE =?,
                        ID_VESPECIES =?,
                        ID_PRODUCTOR =?,

                        ID_USUARIOM =?
                    WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $REEMBALAJE->__GET('FECHA_REEMBALAJE'),
                        $REEMBALAJE->__GET('TURNO'),
                        $REEMBALAJE->__GET('OBSERVACIONE_REEMBALAJE'),

                        $REEMBALAJE->__GET('KILOS_NETO_ENTRADA'),
                        $REEMBALAJE->__GET('KILOS_NETO_REEMBALAJE'),
                        $REEMBALAJE->__GET('KILOS_EXPORTACION_REEMBALAJE'),
                        $REEMBALAJE->__GET('KILOS_INDUSTRIAL_REEMBALAJE'),
                        $REEMBALAJE->__GET('KILOS_INDUSTRIALSC_REEMBALAJE'),
                        $REEMBALAJE->__GET('KILOS_INDUSTRIALNC_REEMBALAJE'),

                        $REEMBALAJE->__GET('PDEXPORTACION_REEMBALAJE'),
                        $REEMBALAJE->__GET('PDEXPORTACIONCD_REEMBALAJE'),
                        $REEMBALAJE->__GET('PDINDUSTRIAL_REEMBALAJE'),
                        $REEMBALAJE->__GET('PDINDUSTRIALSC_REEMBALAJE'),
                        $REEMBALAJE->__GET('PDINDUSTRIALNC_REEMBALAJE'),
                        $REEMBALAJE->__GET('PORCENTAJE_REEMBALAJE'),

                        $REEMBALAJE->__GET('ID_TREEMBALAJE'),
                        $REEMBALAJE->__GET('ID_VESPECIES'),
                        $REEMBALAJE->__GET('ID_PRODUCTOR'),

                        $REEMBALAJE->__GET('ID_USUARIOM'),

                        $REEMBALAJE->__GET('ID_REEMBALAJE')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarReembalaje($id)
    {
        try {
            $sql = "DELETE FROM fruta_reembalaje WHERE ID_REEMBALAJE=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS



    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(REEMBALAJE $REEMBALAJE)
    {

        try {
            $query = "
                UPDATE fruta_reembalaje SET			
                        ESTADO_REGISTRO = 0
                WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $REEMBALAJE->__GET('ID_REEMBALAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(REEMBALAJE $REEMBALAJE)
    {
        try {
            $query = "
                UPDATE fruta_reembalaje SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $REEMBALAJE->__GET('ID_REEMBALAJE')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(REEMBALAJE $REEMBALAJE)
    {
        try {
            $query = "
                    UPDATE fruta_reembalaje SET			
                            ESTADO = 1
                    WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $REEMBALAJE->__GET('ID_REEMBALAJE')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(REEMBALAJE $REEMBALAJE)
    {
        try {
            $query = "
                    UPDATE fruta_reembalaje SET			
                            ESTADO = 0
                    WHERE ID_REEMBALAJE= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $REEMBALAJE->__GET('ID_REEMBALAJE')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR

    public function obtenerTotalEnvasesEmbolsado($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(SUM(detalle.CANTIDAD_ENVASE_DREXPORTACION),0) AS 'ENVASE'
                                                FROM fruta_reembalaje reemabaleje, fruta_drexportacion detalle
                                                WHERE reemabaleje.ID_REEMBALAJE = detalle.ID_REEMBALAJE
                                                    AND detalle.ESTADO_REGISTRO = 1
                                                    AND detalle.EMBOLSADO = 1       
                                                    AND reemabaleje.ID_REEMBALAJE ='" . $ID . "'
                                            
                                            ;");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarReembalajeCerradoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                        IFNULL(KILOS_EXPORTACION_REEMBALAJE,0) AS 'EXPORTACION'   ,                                                 
                                                        IFNULL(KILOS_INDUSTRIAL_REEMBALAJE,0) AS 'INDUSTRIAL'    ,                                                
                                                        IFNULL(KILOS_INDUSTRIALSC_REEMBALAJE,0) AS 'INDUSTRIALSC'    ,                                               
                                                        IFNULL(KILOS_INDUSTRIALNC_REEMBALAJE,0) AS 'INDUSTRIALNC'    ,                                                
                                                        IFNULL(KILOS_NETO_REEMBALAJE,0) AS 'NETO',                                        
                                                        IFNULL(KILOS_NETO_ENTRADA,0) AS 'ENTRADA',   
                                                        FECHA_REEMBALAJE AS 'FECHA',
                                                        WEEK(FECHA_REEMBALAJE,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_REEMBALAJE) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                    
                                        FROM fruta_reembalaje                                                                               
                                        WHERE   ESTADO_REGISTRO = 1 
                                        AND ESTADO = 0
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                        ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarReembalajeTemporadaCBX( $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                        IFNULL(KILOS_EXPORTACION_REEMBALAJE,0) AS 'EXPORTACION'   ,                                                 
                                                        IFNULL(KILOS_INDUSTRIAL_REEMBALAJE,0) AS 'INDUSTRIAL'    ,                                                
                                                        IFNULL(KILOS_INDUSTRIALSC_REEMBALAJE,0) AS 'INDUSTRIALSC'    ,                                               
                                                        IFNULL(KILOS_INDUSTRIALNC_REEMBALAJE,0) AS 'INDUSTRIALNC'    ,                                                
                                                        IFNULL(KILOS_NETO_REEMBALAJE,0) AS 'NETO',                                        
                                                        IFNULL(KILOS_NETO_ENTRADA,0) AS 'ENTRADA',   
                                                        FECHA_REEMBALAJE AS 'FECHA',
                                                        WEEK(FECHA_REEMBALAJE,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_REEMBALAJE) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                    
                                        FROM fruta_reembalaje                                                                               
                                        WHERE   ESTADO_REGISTRO = 1 
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                        ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarReembalajeTemporadaCBXEst( $TEMPORADA, $ESPECIE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                        IFNULL(KILOS_EXPORTACION_REEMBALAJE,0) AS 'EXPORTACION'   ,                                                 
                                                        IFNULL(KILOS_INDUSTRIAL_REEMBALAJE,0) AS 'INDUSTRIAL'    ,                                                
                                                        IFNULL(KILOS_INDUSTRIALSC_REEMBALAJE,0) AS 'INDUSTRIALSC'    ,                                               
                                                        IFNULL(KILOS_INDUSTRIALNC_REEMBALAJE,0) AS 'INDUSTRIALNC'    ,                                                
                                                        IFNULL(KILOS_NETO_REEMBALAJE,0) AS 'NETO',                                        
                                                        IFNULL(KILOS_NETO_ENTRADA,0) AS 'ENTRADA',   
                                                        FECHA_REEMBALAJE AS 'FECHA',
                                                        WEEK(FECHA_REEMBALAJE,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_REEMBALAJE) AS 'SEMANAISO',
                                                        DATE_FORMAT(FREE.INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(FREE.MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                    
                                        FROM fruta_reembalaje FREE
																			LEFT JOIN fruta_vespecies VES ON FREE.ID_VESPECIES = VES.ID_VESPECIES 		                                                                              
                                        WHERE   FREE.ESTADO_REGISTRO = 1 
                                        AND FREE.ID_TEMPORADA = '" . $TEMPORADA . "' AND VES.ID_ESPECIES = '" . $ESPECIE . "'
                                        ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarReembalajeEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                        IFNULL(KILOS_EXPORTACION_REEMBALAJE,0) AS 'EXPORTACION'   ,                                                 
                                                        IFNULL(KILOS_INDUSTRIAL_REEMBALAJE,0) AS 'INDUSTRIAL'    ,                                                
                                                        IFNULL(KILOS_INDUSTRIALSC_REEMBALAJE,0) AS 'INDUSTRIALSC'    ,                                               
                                                        IFNULL(KILOS_INDUSTRIALNC_REEMBALAJE,0) AS 'INDUSTRIALNC'    ,                                                
                                                        IFNULL(KILOS_NETO_REEMBALAJE,0) AS 'NETO',                                        
                                                        IFNULL(KILOS_NETO_ENTRADA,0) AS 'ENTRADA',   
                                                        FECHA_REEMBALAJE AS 'FECHA',
                                                        WEEK(FECHA_REEMBALAJE,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_REEMBALAJE) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                    
                                        FROM fruta_reembalaje                                                                               
                                        WHERE   ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                        ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarReembalajeEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,                                                    
                                                FORMAT(IFNULL(KILOS_EXPORTACION_REEMBALAJE,0),2,'de_DE') AS 'EXPORTACION',
                                                FORMAT(IFNULL(KILOS_INDUSTRIAL_REEMBALAJE,0),2,'de_DE') AS 'INDUSTRIAL'  ,
                                                FORMAT(IFNULL(KILOS_INDUSTRIALSC_REEMBALAJE,0),2,'de_DE') AS 'INDUSTRIALSC'  ,
                                                FORMAT(IFNULL(KILOS_INDUSTRIALNC_REEMBALAJE,0),2,'de_DE') AS 'INDUSTRIALNC'  ,
                                                FORMAT(IFNULL(KILOS_NETO_REEMBALAJE,0),2,'de_DE') AS 'NETO'  ,
                                                FORMAT(IFNULL(KILOS_NETO_ENTRADA,0),2,'de_DE') AS 'ENTRADA'  ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',      
                                                DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y') AS 'FECHA' 
                                        FROM fruta_reembalaje                                                                               
                                        WHERE   ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                        ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //TOTLAES

    public function obtenerTotales($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                             FORMAT(IFNULL(SUM(KILOS_EXPORTACION_REEMBALAJE)+SUM(KILOS_INDUSTRIAL_REEMBALAJE),0),2,'de_DE') AS 'SALIDA',   
                                             IFNULL(SUM(KILOS_EXPORTACION_REEMBALAJE)+SUM(KILOS_INDUSTRIAL_REEMBALAJE),0) AS 'SALIDASF'                                                  
                                         FROM fruta_reembalaje 
                                         WHERE ID_REEMBALAJE = '" . $IDREEMBALAJE . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTotalEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                IFNULL(SUM(KILOS_EXPORTACION_REEMBALAJE),0) AS 'EXPORTACION'   ,                                                 
                                                IFNULL(SUM(KILOS_INDUSTRIAL_REEMBALAJE),0) AS 'INDUSTRIAL'   ,                                                 
                                                IFNULL(SUM(KILOS_NETO_REEMBALAJE),0) AS 'NETO'                ,                                                 
                                                IFNULL(SUM(KILOS_NETO_ENTRADA),0) AS 'ENTRADA'       
                                         FROM fruta_reembalaje                                                                                              
                                         WHERE   ESTADO_REGISTRO = 1 
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                         ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                 FORMAT(IFNULL(SUM(KILOS_EXPORTACION_REEMBALAJE),0),2,'de_DE') AS 'EXPORTACION'   ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_INDUSTRIAL_REEMBALAJE),0),2,'de_DE') AS 'INDUSTRIAL'   ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_REEMBALAJE),0),2,'de_DE') AS 'NETO'                ,                                                 
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_ENTRADA),0),2,'de_DE') AS 'ENTRADA'        
                                         FROM fruta_reembalaje                                                                                              
                                         WHERE   ESTADO_REGISTRO = 1 
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                         ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //OTRAS FUNCIONALIADES



    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHAREEMBALAJE, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {


            $datos = $this->conexion->prepare(" SELECT *
                                            FROM fruta_reembalaje
                                            WHERE   FECHA_REEMBALAJE LIKE '" . $FECHAREEMBALAJE . "'
                                                    AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                    AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')                                            
                                                    AND ID_EMPRESA = " . $EMPRESA . " 
                                                    AND ID_PLANTA = " . $PLANTA . " 
                                                    AND ID_TEMPORADA = " . $TEMPORADA . " 
                                            ORDER BY ID_REEMBALAJE DESC
                                                 ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function buscarProcesoRecepcionMpExistenciaEnReembalaje($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                        reembalaje.ID_REEMBALAJE,
                                                        existenciapt.ID_REEMBALAJE,
                                                        existenciapt.ID_PROCESO,
                                                        proceso.ID_PROCESO,
                                                        existenciamp.ID_PROCESO,
                                                        existenciamp.ID_RECEPCION,
                                                        existenciamp.ID_DESPACHO2,
                                                        MIN(IF(existenciamp.ID_RECEPCION IS NOT NULL,
                                                            (   SELECT
                                                                    FECHA_RECEPCION
                                                                FROM fruta_recepcionmp
                                                                WHERE ID_RECEPCION = existenciamp.ID_RECEPCION
                                                            ),
                                                            IF(existenciamp.ID_DESPACHO2 IS NOT NULL ,
                                                            (   SELECT (
                                                                            SELECT
                                                                                fruta_recepcionmp.FECHA_RECEPCION
                                                                            FROM fruta_eximateriaprima, fruta_recepcionmp
                                                                            WHERE fruta_eximateriaprima.ID_DESPACHO =existenciamp.ID_DESPACHO2
                                                                            AND fruta_eximateriaprima.ID_RECEPCION = fruta_recepcionmp.ID_RECEPCION
                                                                            ORDER BY fruta_recepcionmp.FECHA_RECEPCION asc
                                                                            LIMIT 1
                                                                            )
                                                                    FROM fruta_despachomp
                                                                    WHERE ID_DESPACHO = existenciamp.ID_DESPACHO2
                                                                    ),
                                                                    'Sin Datos')
                                                        ))AS 'FECHA',
                                                        IF(existenciamp.ID_RECEPCION IS NOT NULL,
                                                            (   SELECT
                                                                    NUMERO_RECEPCION
                                                                FROM fruta_recepcionmp
                                                                WHERE ID_RECEPCION = existenciamp.ID_RECEPCION
                                                            ),
                                                            IF(existenciamp.ID_DESPACHO2 IS NOT NULL ,
                                                            (   SELECT (
                                                                            SELECT
                                                                                fruta_recepcionmp.NUMERO_RECEPCION
                                                                            FROM fruta_eximateriaprima, fruta_recepcionmp
                                                                            WHERE fruta_eximateriaprima.ID_DESPACHO =existenciamp.ID_DESPACHO2
                                                                            AND fruta_eximateriaprima.ID_RECEPCION = fruta_recepcionmp.ID_RECEPCION
                                                                            ORDER BY fruta_recepcionmp.FECHA_RECEPCION asc
                                                                            LIMIT 1
                                                                            )
                                                                    FROM fruta_despachomp
                                                                    WHERE ID_DESPACHO = existenciamp.ID_DESPACHO2
                                                                    ),
                                                                    'Sin Datos')
                                                        )AS 'NUMERO',
                                                        IF(existenciamp.ID_RECEPCION IS NOT NULL,
                                                            (   SELECT
                                                                    FECHA_GUIA_RECEPCION
                                                                FROM fruta_recepcionmp
                                                                WHERE ID_RECEPCION = existenciamp.ID_RECEPCION
                                                            ),
                                                            IF(existenciamp.ID_DESPACHO2 IS NOT NULL ,
                                                            (   SELECT (
                                                                            SELECT
                                                                                fruta_recepcionmp.FECHA_GUIA_RECEPCION
                                                                            FROM fruta_eximateriaprima, fruta_recepcionmp
                                                                            WHERE fruta_eximateriaprima.ID_DESPACHO =existenciamp.ID_DESPACHO2
                                                                            AND fruta_eximateriaprima.ID_RECEPCION = fruta_recepcionmp.ID_RECEPCION
                                                                            ORDER BY fruta_recepcionmp.FECHA_RECEPCION asc
                                                                            LIMIT 1
                                                                            )
                                                                    FROM fruta_despachomp
                                                                    WHERE ID_DESPACHO = existenciamp.ID_DESPACHO2
                                                                    ),
                                                                    'Sin Datos')
                                                        )AS 'FECHAGUIA',
                                                        IF(existenciamp.ID_RECEPCION IS NOT NULL,
                                                            (   SELECT
                                                                    NUMERO_GUIA_RECEPCION
                                                                FROM fruta_recepcionmp
                                                                WHERE ID_RECEPCION = existenciamp.ID_RECEPCION
                                                            ),
                                                            IF(existenciamp.ID_DESPACHO2 IS NOT NULL ,
                                                            (   SELECT (
                                                                            SELECT
                                                                                fruta_recepcionmp.NUMERO_GUIA_RECEPCION
                                                                            FROM fruta_eximateriaprima, fruta_recepcionmp
                                                                            WHERE fruta_eximateriaprima.ID_DESPACHO =existenciamp.ID_DESPACHO2
                                                                            AND fruta_eximateriaprima.ID_RECEPCION = fruta_recepcionmp.ID_RECEPCION
                                                                            ORDER BY fruta_recepcionmp.FECHA_RECEPCION asc
                                                                            LIMIT 1
                                                                            )
                                                                    FROM fruta_despachomp
                                                                    WHERE ID_DESPACHO = existenciamp.ID_DESPACHO2
                                                                    ),
                                                                    'Sin Datos')
                                                        )AS 'NUMEROGUIA',
                                                        IF(existenciamp.ID_RECEPCION IS NOT NULL,
                                                        (
                                                                SELECT
                                                                    IF(fruta_recepcionmp.TRECEPCION = 1,'Desde Productor',
                                                                        IF(fruta_recepcionmp.TRECEPCION = 2,'Desde Planta Externa',
                                                                        IF( fruta_recepcionmp.TRECEPCION=3 ,'Desde Productor BDH', 'Sin Datos'))
                                                                    )
                                                                FROM fruta_recepcionmp
                                                                WHERE ID_RECEPCION = existenciamp.ID_RECEPCION
                                                        ),
                                                        IF(existenciamp.ID_DESPACHO2 IS NOT NULL ,
                                                            (   SELECT   (
                                                                                SELECT
                                                                                        IF(fruta_recepcionmp.TRECEPCION = 1,'Desde Productor',
                                                                                            IF(fruta_recepcionmp.TRECEPCION = 2,'Desde Planta Externa',
                                                                                            IF( fruta_recepcionmp.TRECEPCION=3 ,'Desde Productor BDH', 'Sin Datos'))
                                                                                        )
                                                                                FROM fruta_eximateriaprima, fruta_recepcionmp
                                                                                WHERE fruta_eximateriaprima.ID_DESPACHO =existenciamp.ID_DESPACHO2
                                                                                AND fruta_eximateriaprima.ID_RECEPCION = fruta_recepcionmp.ID_RECEPCION
                                                                                ORDER BY fruta_recepcionmp.FECHA_RECEPCION asc
                                                                                LIMIT 1
                                                                            )
                                                            FROM fruta_despachomp
                                                            WHERE ID_DESPACHO = existenciamp.ID_DESPACHO2
                                                        ),
                                                        'Sin Datos')
                                                        )AS 'TRECEPCION',
                                                        IF(existenciamp.ID_RECEPCION IS NOT NULL,
                                                            (
                                                                SELECT
                                                                    IF(fruta_recepcionmp.TRECEPCION = 1,
                                                                        (
                                                                            SELECT
                                                                                    NOMBRE_PRODUCTOR
                                                                            FROM fruta_productor
                                                                            WHERE ID_PRODUCTOR = fruta_recepcionmp.ID_PRODUCTOR
                                                                        ),
                                                                        IF(fruta_recepcionmp.TRECEPCION = 2,
                                                                            (
                                                                                SELECT
                                                                                        NOMBRE_PLANTA
                                                                                FROM principal_planta
                                                                                WHERE ID_PLANTA = fruta_recepcionmp.ID_PLANTA
                                                                            ),
                                                                            IF( fruta_recepcionmp.TRECEPCION=3 ,
                                                                                (
                                                                                    SELECT NOMBRE_PRODUCTOR
                                                                                    FROM fruta_productor
                                                                                        WHERE ID_PRODUCTOR = fruta_recepcionmp.ID_PRODUCTOR
                                                                                ), 'Sin Datos')
                                                                            )
                                                                        )
                                                                FROM fruta_recepcionmp
                                                                WHERE ID_RECEPCION = existenciamp.ID_RECEPCION
                                                            ),
                                                            IF(existenciamp.ID_DESPACHO2 IS NOT NULL ,
                                                                (
                                                                    SELECT
                                                                        (
                                                                                SELECT
                                                                                        IF(fruta_recepcionmp.TRECEPCION = 1,
                                                                                            (
                                                                                                SELECT
                                                                                                    NOMBRE_PRODUCTOR
                                                                                                FROM fruta_productor
                                                                                                WHERE ID_PRODUCTOR = fruta_recepcionmp.ID_PRODUCTOR
                                                                                            ),
                                                                                            IF(fruta_recepcionmp.TRECEPCION = 2,
                                                                                                (
                                                                                                    SELECT NOMBRE_PLANTA
                                                                                                    FROM principal_planta
                                                                                                    WHERE ID_PLANTA = fruta_recepcionmp.ID_PLANTA
                                                                                                ),
                                                                                                IF( fruta_recepcionmp.TRECEPCION=3 ,
                                                                                                    (
                                                                                                        SELECT
                                                                                                                NOMBRE_PRODUCTOR
                                                                                                        FROM fruta_productor
                                                                                                        WHERE ID_PRODUCTOR = fruta_recepcionmp.ID_PRODUCTOR
                                                                                                    ), 'Sin Datos')
                                                                                                )
                                                                                            )
                                                                                FROM fruta_eximateriaprima, fruta_recepcionmp
                                                                                WHERE fruta_eximateriaprima.ID_DESPACHO =existenciamp.ID_DESPACHO2
                                                                                AND fruta_eximateriaprima.ID_RECEPCION = fruta_recepcionmp.ID_RECEPCION
                                                                                ORDER BY fruta_recepcionmp.FECHA_RECEPCION asc
                                                                                LIMIT 1
                                                                        )
                                                                FROM fruta_despachomp
                                                                WHERE ID_DESPACHO = existenciamp.ID_DESPACHO2
                                                                ),
                                                                'Sin Datos')
                                                            )AS 'ORIGEN',
                                                            IF(existenciamp.ID_RECEPCION IS NOT NULL,
                                                                (   SELECT
                                                                            (
                                                                                SELECT
                                                                                    NOMBRE_PLANTA
                                                                                FROM principal_planta
                                                                                WHERE ID_PLANTA = fruta_recepcionmp.ID_PLANTA
                                                                            )
                                                                    FROM fruta_recepcionmp
                                                                    WHERE ID_RECEPCION = existenciamp.ID_RECEPCION
                                                                ),
                                                                IF(existenciamp.ID_DESPACHO2 IS NOT NULL ,
                                                                    (
                                                                        SELECT
                                                                            (
                                                                                SELECT
                                                                                        (
                                                                                            SELECT
                                                                                                    NOMBRE_PLANTA
                                                                                            FROM principal_planta
                                                                                            WHERE ID_PLANTA = fruta_recepcionmp.ID_PLANTA
                                                                                        )
                                                                                FROM fruta_eximateriaprima, fruta_recepcionmp
                                                                                WHERE fruta_eximateriaprima.ID_DESPACHO =existenciamp.ID_DESPACHO2
                                                                                AND fruta_eximateriaprima.ID_RECEPCION = fruta_recepcionmp.ID_RECEPCION
                                                                                ORDER BY fruta_recepcionmp.FECHA_RECEPCION asc
                                                                                LIMIT 1
                                                                            )
                                                                        FROM fruta_despachomp
                                                                        WHERE ID_DESPACHO = existenciamp.ID_DESPACHO2
                                                                    ),
                                                                    'Sin Datos')
                                                            )AS 'PLANTA'
                                                    
                                                    from
                                                        fruta_reembalaje reembalaje,
                                                        fruta_exiexportacion existenciapt,
                                                        fruta_proceso proceso,
                                                        fruta_eximateriaprima existenciamp
                                                    where existenciapt.ESTADO_REGISTRO = 1                                                    
                                                    AND reembalaje.ID_REEMBALAJE = '" . $IDREEMBALAJE . "'
                                                    and reembalaje.ID_REEMBALAJE=existenciapt.ID_REEMBALAJE
                                                    and existenciapt.ID_PROCESO=proceso.ID_PROCESO
                                                    and proceso.ID_PROCESO=existenciamp.ID_PROCESO;
                                                    
        
                                                ;
                                             ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //BUSCAR FECHA ACTUAL DEL SISTEMA
    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerNumero($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_REEMBALAJE,0)) AS 'NUMERO'
                                            FROM fruta_reembalaje
                                            WHERE  
                                                ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'     
                                                ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
