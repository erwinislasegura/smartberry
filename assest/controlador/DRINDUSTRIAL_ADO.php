<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DRINDUSTRIAL.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DRINDUSTRIAL_ADO
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
    //LISTAR TODO CON LIMITE DE 6 FILAS   
    public function listarDrindustrial()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drindustrial limit 8;	");
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
    public function listarDrindustrialCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drindustrial ;	");
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
    public function verDrindustrial($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drindustrial WHERE ID_DRINDUSTRIAL= '" . $ID . "';");
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
    public function agregarDrindustrial(DRINDUSTRIAL $DRINDUSTRIAL)
    {
        try {


            $query =
                "INSERT INTO fruta_drindustrial (    
                                                FOLIO_DRINDUSTRIAL,
                                                FECHA_EMBALADO_DRINDUSTRIAL,
                                                KILOS_NETO_DRINDUSTRIAL,
                                                ID_TMANEJO,
                                                ID_FOLIO,
                                                ID_VESPECIES,
                                                ID_ESTANDAR,
                                                ID_PRODUCTOR,
                                                ID_REEMBALAJE,
                                                INGRESO,
                                                MODIFICACION,
                                                ESTADO,
                                                ESTADO_REGISTRO,
                                                ID_TCALIBREIND
                                           ) VALUES
	       	( ?, ?, ?, ?,  ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1, 1,?);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DRINDUSTRIAL->__GET('FOLIO_DRINDUSTRIAL'),
                        $DRINDUSTRIAL->__GET('FECHA_EMBALADO_DRINDUSTRIAL'),
                        $DRINDUSTRIAL->__GET('KILOS_NETO_DRINDUSTRIAL'),
                        $DRINDUSTRIAL->__GET('ID_TMANEJO'),
                        $DRINDUSTRIAL->__GET('ID_FOLIO'),
                        $DRINDUSTRIAL->__GET('ID_VESPECIES'),
                        $DRINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $DRINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $DRINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $DRINDUSTRIAL->__GET('ID_TCALIBREIND')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDrindustrial($id)
    {
        try {
            $sql = "DELETE FROM fruta_drindustrial WHEREID_DRINDUSTRIAL=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDrindustrial(DRINDUSTRIAL $DRINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_drindustrial SET
            MODIFICACION = SYSDATE() ,
            FECHA_EMBALADO_DRINDUSTRIAL = ? ,
            KILOS_NETO_DRINDUSTRIAL = ? ,
            ID_TMANEJO = ? ,
            ID_VESPECIES = ? ,
            ID_ESTANDAR = ? ,
            ID_PRODUCTOR = ?  ,
            ID_REEMBALAJE = ?,
            ID_TCALIBREIND = ?              
		WHERE ID_DRINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRINDUSTRIAL->__GET('FECHA_EMBALADO_DRINDUSTRIAL'),
                        $DRINDUSTRIAL->__GET('KILOS_NETO_DRINDUSTRIAL'),
                        $DRINDUSTRIAL->__GET('ID_TMANEJO'),
                        $DRINDUSTRIAL->__GET('ID_VESPECIES'),
                        $DRINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $DRINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $DRINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $DRINDUSTRIAL->__GET('ID_TCALIBREIND'),
                        $DRINDUSTRIAL->__GET('ID_DRINDUSTRIAL')
                        

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONE ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DRINDUSTRIAL $DRINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_drindustrial SET		
                        MODIFICACION = SYSDATE() ,	
                        ESTADO_REGISTRO = 0
                WHERE ID_DRINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRINDUSTRIAL->__GET('ID_DRINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DRINDUSTRIAL $DRINDUSTRIAL)
    {
        try {
            $query = "
            UPDATE fruta_drindustrial SET	
                    MODIFICACION = SYSDATE() ,		
                    ESTADO_REGISTRO = 1
            WHERE ID_DRINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRINDUSTRIAL->__GET('ID_DRINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DRINDUSTRIAL $DRINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE fruta_drindustrial SET	
                           MODIFICACION = SYSDATE() ,		
                           ESTADO = 1
                    WHERE ID_DRINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRINDUSTRIAL->__GET('ID_DRINDUSTRIAL')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DRINDUSTRIAL $DRINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE  fruta_drindustrial SET	
                            MODIFICACION = SYSDATE() ,		
                            ESTADO = 0
                    WHERE ID_DRINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRINDUSTRIAL->__GET('ID_DRINDUSTRIAL')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //OBTENER EL NUMERO LINEA DE ACUERDO A LOS REGISTROA ASOCIADOS A UNA RECEPCION
    public function obtenerNumeroLinea($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(NUMERO_LINEA),0) AS 'NUMEROLINEAN' FROM fruta_drindustrial WHERE ID_REEMBALAJE= '" . $IDPROCESO . "';");
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



    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  RECEPCIONS
    public function obtenerFolio($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(FOLIO_DRINDUSTRIAL),0) AS 'ULTIMOFOLIO',IFNULL(MAX(FOLIO_DRINDUSTRIAL),0) AS 'ULTIMOFOLIO2' FROM fruta_drindustrial  WHERE ID_FOLIO= '" . $IDFOLIO . "';");
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


    ///BUSQUEDA POR ID PROCESO ASOCIADO AL REGISTRO
    public function buscarPorReembalaje($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drindustrial WHERE ID_REEMBALAJE= '" . $IDREEMBALAJE . "'  AND ESTADO_REGISTRO = 1;");
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
    public function buscarPorReembalaje2($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                     DATE_FORMAT(FECHA_EMBALADO_DRINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',
                                                     FORMAT(KILOS_NETO_DRINDUSTRIAL,2,'de_DE') AS 'NETO' 
                                            FROM fruta_drindustrial 
                                            WHERE ID_REEMBALAJE= '" . $IDREEMBALAJE . "'  AND ESTADO_REGISTRO = 1;");
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
    //BUSQUEDA DE LOS TOTALES ASOCIADOS AL ID PROCESO


    public function obtenerTotalesSC($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(SUM(detalle.KILOS_NETO_DRINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_drindustrial detalle, estandar_eindustrial estandar 
                                                WHERE   
                                                        detalle.ID_ESTANDAR= estandar.ID_ESTANDAR
                                                        AND  detalle.ESTADO_REGISTRO = 1
                                                        AND estandar.COBRO =1     
                                                        AND detalle.ID_REEMBALAJE = '" . $IDREEMBALAJE . "' 
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
    public function obtenerTotalesNC($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(SUM(detalle.KILOS_NETO_DRINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_drindustrial detalle, estandar_eindustrial estandar 
                                                WHERE   
                                                        detalle.ID_ESTANDAR= estandar.ID_ESTANDAR
                                                        AND  detalle.ESTADO_REGISTRO = 1
                                                        AND estandar.COBRO =0     
                                                        AND detalle.ID_REEMBALAJE = '" . $IDREEMBALAJE . "' 
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


    public function obtenerTotales($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(SUM(KILOS_NETO_DRINDUSTRIAL),0) AS 'NETO'
                                          FROM fruta_drindustrial 
                                          WHERE ID_REEMBALAJE = '" . $IDPROCESO . "' 
                                          AND ESTADO_REGISTRO = 1;");
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
    public function obtenerTotales2($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_DRINDUSTRIAL),0),2,'de_DE') AS 'NETO',
                                                 IFNULL(SUM(KILOS_NETO_DRINDUSTRIAL),0) AS 'NETOSF'
                                          FROM fruta_drindustrial 
                                          WHERE ID_REEMBALAJE = '" . $IDPROCESO . "' 
                                          AND ESTADO_REGISTRO = 1;");
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
}
