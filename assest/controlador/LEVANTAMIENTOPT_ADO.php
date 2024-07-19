<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/LEVANTAMIENTOPT.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class LEVANTAMIENTOPT_ADO
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
    public function listarLevantamiento()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_levantamientopt LIMIT 6;	");
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
    public function listarLevantamientoCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_levantamientopt ;	");
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
    public function verLevantamiento($ID)
    {
        try {
            /*echo " SELECT *,
            DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
            DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
            FROM fruta_levantamientopt 
            WHERE ID_LEVANTAMIENTO= '" . $ID . "';";*/
            $datos = $this->conexion->prepare(" SELECT *,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                    FROM fruta_levantamientopt 
                                                    WHERE ID_LEVANTAMIENTO= '" . $ID . "';");
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
    public function verLevantamiento2($IDLEVANTAMIENTOMP)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                DATE_FORMAT(FECHA_LEVANTAMIENTO, '%d-%m-%Y') AS 'FECHA', 
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                             FROM fruta_levantamientopt WHERE ID_LEVANTAMIENTO = '" . $IDLEVANTAMIENTOMP . "';");
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
    public function agregarLevantamiento(LEVANTAMIENTOPT $LEVANTAMIENTOPT)
    {
        try {


            $query =
                "INSERT INTO fruta_levantamientopt ( 
                                                NUMERO_LEVANTAMIENTO,
                                                FECHA_LEVANTAMIENTO, 
                                                TLEVANTAMIENTO,
                                                RESPONSBALE_LEVANTAMIENTO,
                                                MOTIVO_LEVANTAMIENTO,

                                                ID_VESPECIES, 
                                                ID_PRODUCTOR, 
                                                ID_EMPRESA,
                                                ID_PLANTA,
                                                ID_TEMPORADA, 

                                                ID_USUARIOI, 
                                                ID_USUARIOM, 

                                                CANTIDAD_ENVASE_LEVANTAMIENTO,                                               
                                                KILOS_NETO_LEVANTAMIENTO,
                                                KILOS_BRUTO_LEVANTAMIENTO,   
                                                INGRESO, 
                                                MODIFICACION,  
                                                ESTADO,  
                                                ESTADO_REGISTRO
                                            ) VALUES
	       	(?, ?, ?, ?, ?,      ?, ?, ?, ?, ?,     ?, ?,  0, 0, 0,  SYSDATE(),  SYSDATE(), 1, 1 );";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $LEVANTAMIENTOPT->__GET('NUMERO_LEVANTAMIENTO'),
                        $LEVANTAMIENTOPT->__GET('FECHA_LEVANTAMIENTO'),
                        $LEVANTAMIENTOPT->__GET('TLEVANTAMIENTO'),
                        $LEVANTAMIENTOPT->__GET('RESPONSBALE_LEVANTAMIENTO'),
                        $LEVANTAMIENTOPT->__GET('MOTIVO_LEVANTAMIENTO'),

                        $LEVANTAMIENTOPT->__GET('ID_VESPECIES'),
                        $LEVANTAMIENTOPT->__GET('ID_PRODUCTOR'),
                        $LEVANTAMIENTOPT->__GET('ID_EMPRESA'),
                        $LEVANTAMIENTOPT->__GET('ID_PLANTA'),
                        $LEVANTAMIENTOPT->__GET('ID_TEMPORADA'),

                        $LEVANTAMIENTOPT->__GET('ID_USUARIOI'),
                        $LEVANTAMIENTOPT->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarLevantamiento(LEVANTAMIENTOPT $LEVANTAMIENTOPT)
    {

        try {
            $query = "
		UPDATE fruta_levantamientopt SET
            MODIFICACION = SYSDATE(), 
            FECHA_LEVANTAMIENTO=?,
            TLEVANTAMIENTO =?,
            RESPONSBALE_LEVANTAMIENTO =?,
            MOTIVO_LEVANTAMIENTO =?,

            CANTIDAD_ENVASE_LEVANTAMIENTO =?,
            KILOS_BRUTO_LEVANTAMIENTO =?,
            KILOS_NETO_LEVANTAMIENTO =?, 

            ID_VESPECIES =?,
            ID_PRODUCTOR =?,
            ID_EMPRESA =?, 
            ID_PLANTA =?, 
            ID_TEMPORADA =?, 

            ID_USUARIOM =?
		WHERE ID_LEVANTAMIENTO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $LEVANTAMIENTOPT->__GET('FECHA_LEVANTAMIENTO'),
                        $LEVANTAMIENTOPT->__GET('TLEVANTAMIENTO'),
                        $LEVANTAMIENTOPT->__GET('RESPONSBALE_LEVANTAMIENTO'),
                        $LEVANTAMIENTOPT->__GET('MOTIVO_LEVANTAMIENTO'),

                        $LEVANTAMIENTOPT->__GET('CANTIDAD_ENVASE_LEVANTAMIENTO'),
                        $LEVANTAMIENTOPT->__GET('KILOS_BRUTO_LEVANTAMIENTO'),
                        $LEVANTAMIENTOPT->__GET('KILOS_NETO_LEVANTAMIENTO'),

                        $LEVANTAMIENTOPT->__GET('ID_VESPECIES'),
                        $LEVANTAMIENTOPT->__GET('ID_PRODUCTOR'),
                        $LEVANTAMIENTOPT->__GET('ID_EMPRESA'),
                        $LEVANTAMIENTOPT->__GET('ID_PLANTA'),
                        $LEVANTAMIENTOPT->__GET('ID_TEMPORADA'),
                        
                        $LEVANTAMIENTOPT->__GET('ID_USUARIOM'),
                        $LEVANTAMIENTOPT->__GET('ID_LEVANTAMIENTO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarLevantamiento($id)
    {
        try {
            $sql = "DELETE FROM fruta_levantamientopt WHERE ID_LEVANTAMIENTO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(LEVANTAMIENTOPT $LEVANTAMIENTOPT)
    {

        try {
            $query = "
                UPDATE fruta_levantamientopt SET			
                        ESTADO_REGISTRO = 0
                WHERE ID_LEVANTAMIENTO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $LEVANTAMIENTOPT->__GET('ID_LEVANTAMIENTO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(LEVANTAMIENTOPT $LEVANTAMIENTOPT)
    {
        try {
            $query = "
                UPDATE fruta_levantamientopt SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_LEVANTAMIENTO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $LEVANTAMIENTOPT->__GET('ID_LEVANTAMIENTO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(LEVANTAMIENTOPT $LEVANTAMIENTOPT)
    {
        try {
            $query = "
                    UPDATE fruta_levantamientopt SET			
                            ESTADO = 1
                    WHERE ID_LEVANTAMIENTO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $LEVANTAMIENTOPT->__GET('ID_LEVANTAMIENTO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(LEVANTAMIENTOPT $LEVANTAMIENTOPT)
    {
        try {
            $query = "
                    UPDATE fruta_levantamientopt SET			
                            ESTADO = 0
                    WHERE ID_LEVANTAMIENTO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $LEVANTAMIENTOPT->__GET('ID_LEVANTAMIENTO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR
    public function listarLevantamientoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    IFNULL(CANTIDAD_ENVASE_LEVANTAMIENTO,0) AS 'ENVASE'   ,                                                 
                                                    IFNULL(KILOS_NETO_LEVANTAMIENTO,0) AS 'NETO'    ,                                                 
                                                    IFNULL(KILOS_BRUTO_LEVANTAMIENTO,0) AS 'BRUTO',
                                                    DATE_FORMAT(FECHA_LEVANTAMIENTO, '%d-%m-%Y') AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                                FROM fruta_levantamientopt                                                        
                                                WHERE ID_EMPRESA = '" . $EMPRESA . "' 
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

    public function listarLevantamientoEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_LEVANTAMIENTO,0),2,'de_DE') AS 'ENVASE'   ,                                                 
                                                    FORMAT(IFNULL(KILOS_NETO_LEVANTAMIENTO,0),2,'de_DE') AS 'NETO'    ,                                                 
                                                    FORMAT(IFNULL(KILOS_BRUTO_LEVANTAMIENTO,0),2,'de_DE') AS 'BRUTO',
                                                    DATE_FORMAT(FECHA_LEVANTAMIENTO, '%d-%m-%Y') AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                                FROM fruta_levantamientopt                                                        
                                                WHERE ID_EMPRESA = '" . $EMPRESA . "' 
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
   public function obtenerTotales($IDLEVANTAMIENTO)
   {
       try {

           $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(CANTIDAD_ENVASE_LEVANTAMIENTO,0) AS 'ENVASE'   ,                                                 
                                                    IFNULL(KILOS_NETO_LEVANTAMIENTO,0) AS 'NETO'    ,                                                 
                                                    IFNULL(KILOS_BRUTO_LEVANTAMIENTO,0) AS 'BRUTO'
                                               FROM fruta_levantamientopt                                                        
                                               WHERE ID_LEVANTAMIENTO = '" . $IDLEVANTAMIENTO . "' ;	");
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

   public function obtenerTotales2($IDLEVANTAMIENTO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_LEVANTAMIENTO,0),2,'de_DE') AS 'ENVASE'   ,                                                 
                                                    FORMAT(IFNULL(KILOS_NETO_LEVANTAMIENTO,0),2,'de_DE') AS 'NETO'    ,                                                 
                                                    FORMAT(IFNULL(KILOS_BRUTO_LEVANTAMIENTO,0),2,'de_DE') AS 'BRUTO'
                                                FROM fruta_levantamientopt                                                        
                                                WHERE ID_LEVANTAMIENTO = '" . $IDLEVANTAMIENTO . "' ;	");
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
    public function obtenerId($FECHALEVANTAMIENTOMP, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM fruta_levantamientopt
                                                WHERE 
                                                    FECHA_LEVANTAMIENTO LIKE '" . $FECHALEVANTAMIENTOMP . "'
                                                    AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                    AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')             
                                                    AND ID_EMPRESA = " . $EMPRESA . " 
                                                    AND ID_PLANTA = " . $PLANTA . " 
                                                    AND ID_TEMPORADA = " . $TEMPORADA . "  
                                                ORDER BY ID_LEVANTAMIENTO DESC
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
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_LEVANTAMIENTO,0)) AS 'NUMERO'
                                                FROM fruta_levantamientopt
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
