<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DREXPORTACION.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DREXPORTACION_ADO
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
    public function listarDrexportacion()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_drexportacion  limit 8;	");
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
    public function listarDrexportacionCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_drexportacion  ;	");
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
    public function verDrexportacion($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_drexportacion  WHERE  ID_DREXPORTACION = '" . $ID . "';");
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
    public function agregarDrexportacion(DREXPORTACION $DREXPORTACION)
    {
        try {

            if ($DREXPORTACION->__GET('ID_TCATEGORIA') == NULL) {
                $DREXPORTACION->__SET('ID_TCATEGORIA', NULL);
            }

            $query =
                "INSERT INTO  fruta_drexportacion  ( 
                                                 FOLIO_DREXPORTACION ,
                                                 FOLIO_MANUAL ,
                                                 FECHA_EMBALADO_DREXPORTACION ,                                                                          
                                                 CANTIDAD_ENVASE_DREXPORTACION , 
                                                 KILOS_NETO_DREXPORTACION , 

                                                 PDESHIDRATACION_DREXPORTACION ,  
                                                 KILOS_DESHIDRATACION_DREXPORTACION ,
                                                 KILOS_BRUTO_DREXPORTACION , 
                                                 EMBOLSADO ,
                                                 ID_TMANEJO ,

                                                 ID_TCALIBRE , 
                                                 ID_TEMBALAJE ,
                                                 ID_FOLIO , 
                                                 ID_ESTANDAR ,  
                                                 
                                                 ID_TCATEGORIA , 
                                                 ID_ICARGA, 
                                                 ID_VESPECIES , 

                                                 ID_PRODUCTOR , 
                                                 ID_REEMBALAJE , 

                                                 INGRESO ,
                                                 MODIFICACION ,
                                                 ESTADO ,
                                                 ESTADO_REGISTRO,
                                                 ESTADO_FOLIO
                                                )
             VALUES
	       	    ( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   ?, ?, ?, ?,   ?, ?, ?,   ?, ?, SYSDATE(), SYSDATE(), 1, 1,?);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DREXPORTACION->__GET('FOLIO_DREXPORTACION'),
                        $DREXPORTACION->__GET('FOLIO_MANUAL'),
                        $DREXPORTACION->__GET('FECHA_EMBALADO_DREXPORTACION'),
                        $DREXPORTACION->__GET('CANTIDAD_ENVASE_DREXPORTACION'),
                        $DREXPORTACION->__GET('KILOS_NETO_DREXPORTACION'),

                        $DREXPORTACION->__GET('PDESHIDRATACION_DREXPORTACION'),
                        $DREXPORTACION->__GET('KILOS_DESHIDRATACION_DREXPORTACION'),
                        $DREXPORTACION->__GET('KILOS_BRUTO_DREXPORTACION'),
                        $DREXPORTACION->__GET('EMBOLSADO'),
                        $DREXPORTACION->__GET('ID_TMANEJO'),

                        $DREXPORTACION->__GET('ID_TCALIBRE'),
                        $DREXPORTACION->__GET('ID_TEMBALAJE'),
                        $DREXPORTACION->__GET('ID_FOLIO'),
                        $DREXPORTACION->__GET('ID_ESTANDAR'),

                        $DREXPORTACION->__GET('ID_TCATEGORIA'),
                        $DREXPORTACION->__GET('ID_ICARGA'),
                        $DREXPORTACION->__GET('ID_VESPECIES'),

                        $DREXPORTACION->__GET('ID_PRODUCTOR'),
                        $DREXPORTACION->__GET('ID_REEMBALAJE'),
                        $DREXPORTACION->__GET('ESTADO_FOLIO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDrexportacion($id)
    {
        try {
            $sql = "DELETE FROM  fruta_drexportacion  WHERE  ID_DREXPORTACION =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDrexportacion(DREXPORTACION $DREXPORTACION)
    {
        try {
            if ($DREXPORTACION->__GET('ID_TCATEGORIA') == NULL) {
                $DREXPORTACION->__SET('ID_TCATEGORIA', NULL);
            }
            $query = "
            UPDATE  fruta_drexportacion  SET
                MODIFICACION  = SYSDATE() ,

                FECHA_EMBALADO_DREXPORTACION  = ? ,
                CANTIDAD_ENVASE_DREXPORTACION  = ? ,
                KILOS_NETO_DREXPORTACION  = ? ,
                PDESHIDRATACION_DREXPORTACION  = ? ,
                KILOS_DESHIDRATACION_DREXPORTACION  = ? ,

                KILOS_BRUTO_DREXPORTACION  = ? ,
                EMBOLSADO  = ? ,
                ID_TMANEJO  = ? ,
                ID_TCALIBRE  = ? ,
                ID_TEMBALAJE  = ? ,

                ID_ESTANDAR  = ? ,
                ID_TCATEGORIA  = ? ,
                ID_VESPECIES  = ? ,
                ID_ICARGA  = ? ,

                ID_PRODUCTOR  = ? ,
                ID_REEMBALAJE  = ? ,
                ESTADO_FOLIO = ?                             
            WHERE  ID_DREXPORTACION = ?;";
                $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREXPORTACION->__GET('FECHA_EMBALADO_DREXPORTACION'),
                        $DREXPORTACION->__GET('CANTIDAD_ENVASE_DREXPORTACION'),
                        $DREXPORTACION->__GET('KILOS_NETO_DREXPORTACION'),
                        $DREXPORTACION->__GET('PDESHIDRATACION_DREXPORTACION'),
                        $DREXPORTACION->__GET('KILOS_DESHIDRATACION_DREXPORTACION'),

                        $DREXPORTACION->__GET('KILOS_BRUTO_DREXPORTACION'),
                        $DREXPORTACION->__GET('EMBOLSADO'),
                        $DREXPORTACION->__GET('ID_TMANEJO'),
                        $DREXPORTACION->__GET('ID_TCALIBRE'),
                        $DREXPORTACION->__GET('ID_TEMBALAJE'),

                        $DREXPORTACION->__GET('ID_ESTANDAR'),
                        $DREXPORTACION->__GET('ID_TCATEGORIA'),
                        $DREXPORTACION->__GET('ID_VESPECIES'),
                        $DREXPORTACION->__GET('ID_ICARGA'),

                        $DREXPORTACION->__GET('ID_PRODUCTOR'),
                        $DREXPORTACION->__GET('ID_REEMBALAJE'),
                        $DREXPORTACION->__GET('ESTADO_FOLIO'),
                        $DREXPORTACION->__GET('ID_DREXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONE ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DREXPORTACION $DREXPORTACION)
    {

        try {
            $query = "
                UPDATE  fruta_drexportacion  SET			
                         ESTADO_REGISTRO  = 0
                WHERE  ID_DREXPORTACION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREXPORTACION->__GET('ID_DREXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DREXPORTACION $DREXPORTACION)
    {
        try {
            $query = "
                UPDATE  fruta_drexportacion  SET			
                         ESTADO_REGISTRO  = 1
                WHERE  ID_DREXPORTACION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREXPORTACION->__GET('ID_DREXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A DESACTIVADO
    public function deshabilitar2(DREXPORTACION $DREXPORTACION)
    {

        try {
            $query = "
                UPDATE  fruta_drexportacion  SET			
                         ESTADO_REGISTRO  = 0
                WHERE  FOLIO_AUX_DREXPORTACION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREXPORTACION->__GET('FOLIO_AUX_DREXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar2(DREXPORTACION $DREXPORTACION)
    {
        try {
            $query = "
                UPDATE  fruta_drexportacion  SET			
                         ESTADO_REGISTRO  = 1
                WHERE  FOLIO_AUX_DREXPORTACION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREXPORTACION->__GET('FOLIO_AUX_DREXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A DESACTIVADO
    public function deshabilitar3(DREXPORTACION $DREXPORTACION)
    {
        try {
            $query = "
                    UPDATE  fruta_drexportacion  SET			
                             ESTADO_REGISTRO  = 0
                            WHERE  FOLIO_AUX_DREXPORTACION = ? AND  CANTIDAD_ENVASE_DREXPORTACION  = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREXPORTACION->__GET('FOLIO_AUX_DREXPORTACION'),
                        $DREXPORTACION->__GET('CANTIDAD_ENVASE_DREXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar3(DREXPORTACION $DREXPORTACION)
    {
        try {
            $query = "
                    UPDATE  fruta_drexportacion  SET			
                             ESTADO_REGISTRO  = 1
                    WHERE  FOLIO_AUX_DREXPORTACION = ? AND  CANTIDAD_ENVASE_DREXPORTACION  = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREXPORTACION->__GET('FOLIO_AUX_DREXPORTACION'),
                        $DREXPORTACION->__GET('CANTIDAD_ENVASE_DREXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DREXPORTACION $DREXPORTACION)
    {
        try {
            $query = "
                    UPDATE  fruta_drexportacion  SET			
                             ESTADO  = 1
                    WHERE  FOLIO_AUX_DREXPORTACION = ? AND  CANTIDAD_ENVASE_DREXPORTACION  = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREXPORTACION->__GET('FOLIO_AUX_DREXPORTACION'),
                        $DREXPORTACION->__GET('CANTIDAD_ENVASE_DREXPORTACION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DREXPORTACION $DREXPORTACION)
    {
        try {
            $query = "
                    UPDATE  fruta_drexportacion  SET			
                             ESTADO  = 0
                    WHERE  ID_DREXPORTACION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DREXPORTACION->__GET('ID_DREXPORTACION')
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

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(NUMERO_LINEA),0) AS 'NUMEROLINEAN' FROM  fruta_drexportacion  WHERE   ID_REEMBALAJE = '" . $IDPROCESO . "';");
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

    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  PROCESO
    public function obtenerFolio($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(FOLIO_DREXPORTACION),0) AS 'ULTIMOFOLIO',IFNULL(MAX(FOLIO_DREXPORTACION),0) AS 'ULTIMOFOLIO2' FROM  fruta_drexportacion   WHERE   ID_FOLIO = '" . $IDFOLIO . "';");
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

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_drexportacion  WHERE  ID_REEMBALAJE = '" . $IDREEMBALAJE . "'  AND  ESTADO_REGISTRO  = 1;");
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

            $datos = $this->conexion->prepare("SELECT *,  DATE_FORMAT(FECHA_EMBALADO_DREXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                        FORMAT(CANTIDAD_ENVASE_DREXPORTACION,0,'de_DE') AS 'ENVASE', 
                                                        FORMAT(KILOS_NETO_DREXPORTACION,2,'de_DE') AS 'NETO' , 
                                                        FORMAT(KILOS_BRUTO_DREXPORTACION,2,'de_DE') AS 'BRUTO' , 
                                                        FORMAT(PDESHIDRATACION_DREXPORTACION,2,'de_DE') AS 'PORCENTAJE' , 
                                                        FORMAT(KILOS_DESHIDRATACION_DREXPORTACION,2,'de_DE') AS 'DESHIDRATACION'  
                                        FROM  fruta_drexportacion  
                                        WHERE  ID_REEMBALAJE = '" . $IDREEMBALAJE . "'  AND  ESTADO_REGISTRO  = 1;");
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
    public function buscarPorReembalajeAgrupadoCalibre($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                        IFNULL(SUM(KILOS_NETO_DREXPORTACION),0) AS 'NETO',
                                                        FORMAT(IFNULL(SUM(KILOS_NETO_DREXPORTACION),0),2,'de_DE') AS 'NETOF' , 
                                                        ID_TCALIBRE
                                        FROM  fruta_drexportacion  
                                        WHERE  ID_REEMBALAJE = '" . $IDREEMBALAJE . "'  
                                        AND  ESTADO_REGISTRO  = 1                                        
                                        GROUP BY ID_TCALIBRE ;");
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
    public function obtenerTotales($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(SUM(CANTIDAD_ENVASE_DREXPORTACION),0) AS 'ENVASE', 
                                                IFNULL(SUM(KILOS_NETO_DREXPORTACION),0) AS 'NETO' , 
                                                IFNULL(SUM(KILOS_BRUTO_DREXPORTACION),0) AS 'BRUTO' , 
                                                IFNULL(SUM(KILOS_DESHIDRATACION_DREXPORTACION),0) AS 'DESHIDRATACION' 
                                         FROM  fruta_drexportacion
                                         WHERE ID_REEMBALAJE = '" . $IDPROCESO . "' 
                                         AND  ESTADO_REGISTRO  = 1;");
                                     
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

            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DREXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                FORMAT(IFNULL(SUM(KILOS_NETO_DREXPORTACION),0),2,'de_DE') AS 'NETO' , 
                                                FORMAT(IFNULL(SUM(KILOS_BRUTO_DREXPORTACION),0),2,'de_DE') AS 'BRUTO' , 
                                                FORMAT(IFNULL(SUM(KILOS_DESHIDRATACION_DREXPORTACION),0),2,'de_DE') AS 'DESHIDRATACION', 
                                                IFNULL(SUM(KILOS_DESHIDRATACION_DREXPORTACION),0) AS 'DESHIDRATACIONSF', 
                                                IFNULL(SUM(KILOS_NETO_DREXPORTACION),0) AS 'NETOSF'  
                                         FROM  fruta_drexportacion  
                                         WHERE ID_REEMBALAJE = '" . $IDPROCESO . "' 
                                         AND  ESTADO_REGISTRO  = 1;");
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

    public function buscarPorFolio($FOLIODPEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                        FROM  fruta_drexportacion  
                                         WHERE  FOLIO_DPEXPORTACION = '" . $FOLIODPEXPORTACION . "';");
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

    public function obtenerTotales2AgrupadoFolio2($FOLIONUEVODREPALETIZAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                            FORMAT(IFNULL(SUM( CANTIDAD_ENVASE_DREXPORTACION ),0),0,'de_DE') AS 'TOTAL_ENVASE', 
                                            FORMAT(IFNULL(SUM( KILOS_NETO_DREXPORTACION ),0),2,'de_DE') AS 'TOTAL_NETO'
                                         FROM  fruta_drexportacion 
                                         WHERE  FOLIO_AUX_DREXPORTACION = '" . $FOLIONUEVODREPALETIZAJE . "'
                                         AND  ESTADO_REGISTRO  = 1
                                         GROUP BY FOLIO_AUX_DREXPORTACION;");
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
