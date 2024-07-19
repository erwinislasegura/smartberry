<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DPEXPORTACION.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DPEXPORTACION_ADO
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
    public function listarDpexportacion()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dpexportacion limit 8;	");
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
    public function listarDpexportacionCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dpexportacion ;	");
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
    public function verDpexportacion($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dpexportacion WHERE ID_DPEXPORTACION= '" . $ID . "';");
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
    public function agregarDpexportacion(DPEXPORTACION $DPEXPORTACION)
    {
        try {

            if ($DPEXPORTACION->__GET('ID_TCATEGORIA') == NULL) {
                $DPEXPORTACION->__SET('ID_TCATEGORIA', NULL);
            }
            if ($DPEXPORTACION->__GET('ID_ICARGA') == NULL) {
                $DPEXPORTACION->__SET('ID_ICARGA', NULL);
            }

            $query =
                "INSERT INTO fruta_dpexportacion (
                                                FOLIO_DPEXPORTACION,
                                                FOLIO_MANUAL,
                                                FECHA_EMBALADO_DPEXPORTACION,
                                                CANTIDAD_ENVASE_DPEXPORTACION,
                                                KILOS_NETO_DPEXPORTACION,

                                                PDESHIDRATACION_DPEXPORTACION,
                                                KILOS_DESHIDRATACION_DPEXPORTACION, 
                                                KILOS_BRUTO_DPEXPORTACION, 
                                                EMBOLSADO,
                                                ID_TEMBALAJE, 

                                                ID_TCALIBRE, 
                                                ID_TMANEJO, 
                                                ID_ESTANDAR, 
                                                ID_FOLIO, 
                                                ID_VESPECIES,

                                                ID_TCATEGORIA, 
                                                ID_ICARGA, 
                                                ID_PRODUCTOR,
                                                ID_PROCESO, 

                                                INGRESO,
                                                MODIFICACION,
                                                ESTADO,
                                                ESTADO_REGISTRO,
                                                ESTADO_FOLIO
                                          )
             VALUES
	       	    ( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?,   ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1, 1,?);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DPEXPORTACION->__GET('FOLIO_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('FOLIO_MANUAL'),
                        $DPEXPORTACION->__GET('FECHA_EMBALADO_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('CANTIDAD_ENVASE_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('KILOS_NETO_DPEXPORTACION'),

                        $DPEXPORTACION->__GET('PDESHIDRATACION_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('KILOS_DESHIDRATACION_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('KILOS_BRUTO_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('EMBOLSADO'),
                        $DPEXPORTACION->__GET('ID_TEMBALAJE'),

                        $DPEXPORTACION->__GET('ID_TCALIBRE'),
                        $DPEXPORTACION->__GET('ID_TMANEJO'),
                        $DPEXPORTACION->__GET('ID_ESTANDAR'),
                        $DPEXPORTACION->__GET('ID_FOLIO'),
                        $DPEXPORTACION->__GET('ID_VESPECIES'),

                        $DPEXPORTACION->__GET('ID_TCATEGORIA'),
                        $DPEXPORTACION->__GET('ID_ICARGA'),
                        $DPEXPORTACION->__GET('ID_PRODUCTOR'),
                        $DPEXPORTACION->__GET('ID_PROCESO'),
                        $DPEXPORTACION->__GET('ESTADO_FOLIO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDpexportacion($id)
    {
        try {
            $sql = "DELETE FROM fruta_dpexportacion WHERE ID_DPEXPORTACION=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDpexportacion(DPEXPORTACION $DPEXPORTACION)
    {
        try {
            if ($DPEXPORTACION->__GET('ID_TCATEGORIA') == NULL) {
                $DPEXPORTACION->__SET('ID_TCATEGORIA', NULL);
            }
            $query = "
                UPDATE fruta_dpexportacion SET
                    MODIFICACION = SYSDATE(),

                    FECHA_EMBALADO_DPEXPORTACION = ? ,
                    CANTIDAD_ENVASE_DPEXPORTACION = ? ,
                    KILOS_NETO_DPEXPORTACION = ? ,
                    PDESHIDRATACION_DPEXPORTACION = ? ,
                    KILOS_DESHIDRATACION_DPEXPORTACION = ? ,

                    KILOS_BRUTO_DPEXPORTACION = ? ,
                    EMBOLSADO = ? ,
                    ID_TEMBALAJE = ? ,
                    ID_TCALIBRE = ? ,
                    ID_TMANEJO = ? ,

                    ID_ESTANDAR = ? , 
                    ID_VESPECIES = ? ,
                    ID_TCATEGORIA = ?,
                    ID_PRODUCTOR = ?,

                    ID_ICARGA = ?,
                    ID_PROCESO = ?,
                    ESTADO_FOLIO = ?            
                WHERE ID_DPEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DPEXPORTACION->__GET('FECHA_EMBALADO_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('CANTIDAD_ENVASE_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('KILOS_NETO_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('PDESHIDRATACION_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('KILOS_DESHIDRATACION_DPEXPORTACION'),

                        $DPEXPORTACION->__GET('KILOS_BRUTO_DPEXPORTACION'),
                        $DPEXPORTACION->__GET('EMBOLSADO'),
                        $DPEXPORTACION->__GET('ID_TEMBALAJE'),
                        $DPEXPORTACION->__GET('ID_TCALIBRE'),
                        $DPEXPORTACION->__GET('ID_TMANEJO'),

                        $DPEXPORTACION->__GET('ID_ESTANDAR'),
                        $DPEXPORTACION->__GET('ID_VESPECIES'),
                        $DPEXPORTACION->__GET('ID_TCATEGORIA'),
                        $DPEXPORTACION->__GET('ID_PRODUCTOR'),

                        $DPEXPORTACION->__GET('ID_ICARGA'),
                        $DPEXPORTACION->__GET('ID_PROCESO'),
                        $DPEXPORTACION->__GET('ESTADO_FOLIO'),
                        $DPEXPORTACION->__GET('ID_DPEXPORTACION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONE ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DPEXPORTACION $DPEXPORTACION)
    {

        try {
            $query = "
                UPDATE fruta_dpexportacion SET	
                        MODIFICACION = SYSDATE(),		
                        ESTADO_REGISTRO = 0
                WHERE ID_DPEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DPEXPORTACION->__GET('ID_DPEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DPEXPORTACION $DPEXPORTACION)
    {
        try {
            $query = "
                 UPDATE fruta_dpexportacion SET	
                         MODIFICACION = SYSDATE(),		
                        ESTADO_REGISTRO = 1
                WHERE ID_DPEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DPEXPORTACION->__GET('ID_DPEXPORTACION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DPEXPORTACION $DPEXPORTACION)
    {
        try {
            $query = "
                    UPDATE fruta_dpexportacion SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO = 1
                    WHERE ID_DPEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DPEXPORTACION->__GET('DPEXPORTACION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DPEXPORTACION $DPEXPORTACION)
    {
        try {
            $query = "
                    UPDATE fruta_dpexportacion SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO = 0
                    WHERE ID_DPEXPORTACION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DPEXPORTACION->__GET('ID_DPEXPORTACION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTA

    //BUSCAR 
    ///BUSQUEDA POR ID PROCESO ASOCIADO AL REGISTRO
    public function buscarPorProceso($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_dpexportacion 
                                            WHERE ID_PROCESO= '" . $IDPROCESO . "' AND  ESTADO_REGISTRO = 1;");
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
    public function buscarPorProceso2($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                            DATE_FORMAT(FECHA_EMBALADO_DPEXPORTACION, '%d-%m-%Y') AS 'EMBALADO',
                                                            FORMAT(CANTIDAD_ENVASE_DPEXPORTACION,0,'de_DE') AS 'ENVASE',
                                                            FORMAT(KILOS_NETO_DPEXPORTACION,2,'de_DE') AS 'NETO',
                                                            FORMAT(KILOS_BRUTO_DPEXPORTACION,2,'de_DE') AS 'BRUTO',
                                                            FORMAT(PDESHIDRATACION_DPEXPORTACION,2,'de_DE') AS 'PORCENTAJE',
                                                            FORMAT(KILOS_DESHIDRATACION_DPEXPORTACION,2,'de_DE') AS 'DESHIDRATACION'
                                                FROM fruta_dpexportacion 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "' AND  ESTADO_REGISTRO = 1 ;");
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

    public function buscarPorProcesoAgrupadoCalibre($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(SUM(KILOS_NETO_DPEXPORTACION),0) AS 'NETO',
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_DPEXPORTACION),0),2,'de_DE') AS 'NETOF',
                                                    ID_TCALIBRE
                                                FROM fruta_dpexportacion 
                                                WHERE ID_PROCESO= '".$IDPROCESO."' 
                                                AND  ESTADO_REGISTRO = 1
                                                GROUP BY ID_TCALIBRE 
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
    //TOTALES
    //BUSQUEDA DE LOS TOTALES ASOCIADOS AL ID PROCESO
    public function obtenerTotales($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_DPEXPORTACION),0) AS 'ENVASE', 
                                                IFNULL(SUM(KILOS_NETO_DPEXPORTACION),0) AS 'NETO' , 
                                                IFNULL(SUM(KILOS_BRUTO_DPEXPORTACION),0) AS 'BRUTO' , 
                                                IFNULL(SUM(KILOS_DESHIDRATACION_DPEXPORTACION),0) AS 'DESHIDRATACION' 
                                         FROM fruta_dpexportacion 
                                         WHERE ID_PROCESO = '" . $IDPROCESO . "' AND  ESTADO_REGISTRO = 1;");
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
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DPEXPORTACION),0),0,'de_DE') AS 'ENVASE', 
                                                FORMAT(IFNULL(SUM(KILOS_NETO_DPEXPORTACION),0),2,'de_DE') AS 'NETO' , 
                                                FORMAT(IFNULL(SUM(KILOS_BRUTO_DPEXPORTACION),0),2,'de_DE') AS 'BRUTO' , 
                                                FORMAT(IFNULL(SUM(KILOS_DESHIDRATACION_DPEXPORTACION),0),2,'de_DE') AS 'DESHIDRATACION' ,
                                                IFNULL(SUM(KILOS_DESHIDRATACION_DPEXPORTACION),0) AS 'DESHIDRATACIONSF' ,
                                                IFNULL(SUM(KILOS_NETO_DPEXPORTACION),0) AS 'NETOSF' 
                                         FROM fruta_dpexportacion 
                                         WHERE ID_PROCESO = '" . $IDPROCESO . "' AND  ESTADO_REGISTRO = 1;");
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
                                            FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DPEXPORTACION),0),0,'de_DE') AS 'TOTAL_ENVASE', 
                                            FORMAT(IFNULL(SUM(KILOS_NETO_DPEXPORTACION),0),2,'de_DE') AS 'TOTAL_NETO'
                                         FROM fruta_dpexportacion
                                         WHERE FOLIO_DPEXPORTACION= '" . $FOLIONUEVODREPALETIZAJE . "'
                                         AND ESTADO_REGISTRO = 1
                                         GROUP BY FOLIO_DPEXPORTACION;");
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

    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  PROCESO
    public function obtenerFolio($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(FOLIO_DPEXPORTACION),0) AS 'ULTIMOFOLIO',IFNULL(MAX(FOLIO_DPEXPORTACION),0) AS 'ULTIMOFOLIO2' FROM fruta_dpexportacion  WHERE  ID_FOLIO= '" . $IDFOLIO . "';");
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dpexportacion 
                                        WHERE FOLIO_DPEXPORTACION= '" . $FOLIODPEXPORTACION . "';");
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
