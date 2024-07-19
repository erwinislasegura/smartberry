<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/RECHAZOMP.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class RECHAZOMP_ADO
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
    public function listarRechazo()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_rechazomp LIMIT 6;	");
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
    public function listarRechazoCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_rechazomp ;	");
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
    public function verRechazo($ID)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT *,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                    FROM fruta_rechazomp 
                                                    WHERE ID_RECHAZO= '" . $ID . "';");
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
    public function verRechazo2($IDRECHAZOMP)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                DATE_FORMAT(FECHA_RECHAZO, '%d-%m-%Y') AS 'FECHA', 
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                             FROM fruta_rechazomp WHERE ID_RECHAZO = '" . $IDRECHAZOMP . "';");
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
    public function agregarRechazo(RECHAZOMP $RECHAZOMP)
    {
        try {


            $query =
                "INSERT INTO fruta_rechazomp ( 
                                                NUMERO_RECHAZO,
                                                FECHA_RECHAZO, 
                                                TRECHAZO,
                                                RESPONSBALE_RECHAZO,
                                                MOTIVO_RECHAZO,

                                                ID_VESPECIES, 
                                                ID_PRODUCTOR, 
                                                ID_EMPRESA,
                                                ID_PLANTA,
                                                ID_TEMPORADA, 

                                                ID_USUARIOI, 
                                                ID_USUARIOM, 

                                                CANTIDAD_ENVASE_RECHAZO,                                               
                                                KILOS_NETO_RECHAZO,
                                                KILOS_BRUTO_RECHAZO,   
                                                INGRESO, 
                                                MODIFICACION,  
                                                ESTADO,  
                                                ESTADO_REGISTRO
                                            ) VALUES
	       	(?, ?, ?, ?, ?,      ?, ?, ?, ?, ?,     ?, ?,  0, 0, 0,  SYSDATE(),  SYSDATE(), 1, 1 );";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $RECHAZOMP->__GET('NUMERO_RECHAZO'),
                        $RECHAZOMP->__GET('FECHA_RECHAZO'),
                        $RECHAZOMP->__GET('TRECHAZO'),
                        $RECHAZOMP->__GET('RESPONSBALE_RECHAZO'),
                        $RECHAZOMP->__GET('MOTIVO_RECHAZO'),

                        $RECHAZOMP->__GET('ID_VESPECIES'),
                        $RECHAZOMP->__GET('ID_PRODUCTOR'),
                        $RECHAZOMP->__GET('ID_EMPRESA'),
                        $RECHAZOMP->__GET('ID_PLANTA'),
                        $RECHAZOMP->__GET('ID_TEMPORADA'),

                        $RECHAZOMP->__GET('ID_USUARIOI'),
                        $RECHAZOMP->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRechazo(RECHAZOMP $RECHAZOMP)
    {

        try {
            $query = "
            UPDATE fruta_rechazomp SET
                MODIFICACION = SYSDATE(), 
                
                FECHA_RECHAZO=?,
                TRECHAZO =?,
                RESPONSBALE_RECHAZO =?,
                MOTIVO_RECHAZO =?,

                CANTIDAD_ENVASE_RECHAZO =?,
                KILOS_BRUTO_RECHAZO =?,
                KILOS_NETO_RECHAZO =?, 

                ID_VESPECIES =?,
                ID_PRODUCTOR =?,

                ID_USUARIOM =?
            WHERE ID_RECHAZO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $RECHAZOMP->__GET('FECHA_RECHAZO'),
                        $RECHAZOMP->__GET('TRECHAZO'),
                        $RECHAZOMP->__GET('RESPONSBALE_RECHAZO'),
                        $RECHAZOMP->__GET('MOTIVO_RECHAZO'),

                        $RECHAZOMP->__GET('CANTIDAD_ENVASE_RECHAZO'),
                        $RECHAZOMP->__GET('KILOS_BRUTO_RECHAZO'),
                        $RECHAZOMP->__GET('KILOS_NETO_RECHAZO'),

                        $RECHAZOMP->__GET('ID_VESPECIES'),
                        $RECHAZOMP->__GET('ID_PRODUCTOR'),
                        
                        $RECHAZOMP->__GET('ID_USUARIOM'),
                        $RECHAZOMP->__GET('ID_RECHAZO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRechazo($id)
    {
        try {
            $sql = "DELETE FROM fruta_rechazomp WHERE ID_RECHAZO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(RECHAZOMP $RECHAZOMP)
    {

        try {
            $query = "
                UPDATE fruta_rechazomp SET			
                        ESTADO_REGISTRO = 0
                WHERE ID_RECHAZO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECHAZOMP->__GET('ID_RECHAZO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(RECHAZOMP $RECHAZOMP)
    {
        try {
            $query = "
                UPDATE fruta_rechazomp SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_RECHAZO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECHAZOMP->__GET('ID_RECHAZO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(RECHAZOMP $RECHAZOMP)
    {
        try {
            $query = "
                    UPDATE fruta_rechazomp SET			
                            ESTADO = 1
                    WHERE ID_RECHAZO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECHAZOMP->__GET('ID_RECHAZO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(RECHAZOMP $RECHAZOMP)
    {
        try {
            $query = "
                    UPDATE fruta_rechazomp SET			
                            ESTADO = 0
                    WHERE ID_RECHAZO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECHAZOMP->__GET('ID_RECHAZO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR
    public function listarRechazoCerradoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    IFNULL(CANTIDAD_ENVASE_RECHAZO,0) AS 'ENVASE'   ,                                                 
                                                    IFNULL(KILOS_NETO_RECHAZO,0) AS 'NETO'    ,                                                 
                                                    IFNULL(KILOS_BRUTO_RECHAZO,0) AS 'BRUTO',
                                                    FECHA_RECHAZO AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'
                                                FROM fruta_rechazomp                                                        
                                                WHERE ESTADO_REGISTRO = 1   
                                                AND ESTADO = 0                                                                                                     
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;	");
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
    public function listarRechazoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    IFNULL(CANTIDAD_ENVASE_RECHAZO,0) AS 'ENVASE'   ,                                                 
                                                    IFNULL(KILOS_NETO_RECHAZO,0) AS 'NETO'    ,                                                 
                                                    IFNULL(KILOS_BRUTO_RECHAZO,0) AS 'BRUTO',
                                                    FECHA_RECHAZO AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'
                                                FROM fruta_rechazomp                                                        
                                                WHERE ESTADO_REGISTRO = 1                                                                                                        
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;	");
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

    public function listarRechazoEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_RECHAZO,0),2,'de_DE') AS 'ENVASE'   ,                                                 
                                                    FORMAT(IFNULL(KILOS_NETO_RECHAZO,0),2,'de_DE') AS 'NETO'    ,                                                 
                                                    FORMAT(IFNULL(KILOS_BRUTO_RECHAZO,0),2,'de_DE') AS 'BRUTO',
                                                    DATE_FORMAT(FECHA_RECHAZO, '%d-%m-%Y') AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                                FROM fruta_rechazomp                                                        
                                                WHERE ESTADO_REGISTRO = 1                                                                                                        
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;	");
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


    //OBTENER TOTALES
   public function obtenerTotales($IDRECHAZO)
   {
       try {

           $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(CANTIDAD_ENVASE_RECHAZO,0) AS 'ENVASE'   ,                                                 
                                                    IFNULL(KILOS_NETO_RECHAZO,0) AS 'NETO'    ,                                                 
                                                    IFNULL(KILOS_BRUTO_RECHAZO,0) AS 'BRUTO'
                                               FROM fruta_rechazomp                                                        
                                               WHERE ID_RECHAZO = '" . $IDRECHAZO . "' ;	");
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

   public function obtenerTotales2($IDRECHAZO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_RECHAZO,0),2,'de_DE') AS 'ENVASE'   ,                                                 
                                                    FORMAT(IFNULL(KILOS_NETO_RECHAZO,0),2,'de_DE') AS 'NETO'    ,                                                 
                                                    FORMAT(IFNULL(KILOS_BRUTO_RECHAZO,0),2,'de_DE') AS 'BRUTO'
                                                FROM fruta_rechazomp                                                        
                                                WHERE ID_RECHAZO = '" . $IDRECHAZO . "' ;	");
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
  
    public function obtenerTotalesEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    SUM(IFNULL(CANTIDAD_ENVASE_RECHAZO,0)) AS 'ENVASE'   ,                                                 
                                                    SUM(IFNULL(KILOS_NETO_RECHAZO,0)) AS 'NETO'    ,                                                 
                                                    SUM(IFNULL(KILOS_BRUTO_RECHAZO,0)) AS 'BRUTO'
                                                FROM fruta_rechazomp                                                        
                                                WHERE ESTADO_REGISTRO = 1                                                                                                        
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;	");
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

    public function obtenerTotalesEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(SUM(IFNULL(CANTIDAD_ENVASE_RECHAZO,0)),2,'de_DE') AS 'ENVASE'   ,                                                 
                                                    FORMAT(SUM(IFNULL(KILOS_NETO_RECHAZO,0)),2,'de_DE') AS 'NETO'    ,                                                 
                                                    FORMAT(SUM(IFNULL(KILOS_BRUTO_RECHAZO,0)),2,'de_DE') AS 'BRUTO'
                                                FROM fruta_rechazomp                                                        
                                                WHERE ESTADO_REGISTRO = 1                                                                                                        
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;	");
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
  


    //OTRAS FUNCIONALIDADES

    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHARECHAZOMP, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM fruta_rechazomp
                                                WHERE 
                                                    FECHA_RECHAZO LIKE '" . $FECHARECHAZOMP . "'
                                                    AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                    AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')             
                                                    AND ID_EMPRESA = " . $EMPRESA . " 
                                                    AND ID_PLANTA = " . $PLANTA . " 
                                                    AND ID_TEMPORADA = " . $TEMPORADA . "  
                                                ORDER BY ID_RECHAZO DESC
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
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_RECHAZO,0)) AS 'NUMERO'
                                                FROM fruta_rechazomp
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
