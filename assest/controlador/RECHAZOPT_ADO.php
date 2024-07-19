<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/RECHAZOPT.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class RECHAZOPT_ADO
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_rechazopt LIMIT 6;	");
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_rechazopt ;	");
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
                                                    FROM fruta_rechazopt 
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
                                             FROM fruta_rechazopt WHERE ID_RECHAZO = '" . $IDRECHAZOMP . "';");
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
    public function agregarRechazo(RECHAZOPT $RECHAZOPT)
    {
        try {


            $query =
                "INSERT INTO fruta_rechazopt ( 
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

                        $RECHAZOPT->__GET('NUMERO_RECHAZO'),
                        $RECHAZOPT->__GET('FECHA_RECHAZO'),
                        $RECHAZOPT->__GET('TRECHAZO'),
                        $RECHAZOPT->__GET('RESPONSBALE_RECHAZO'),
                        $RECHAZOPT->__GET('MOTIVO_RECHAZO'),

                        $RECHAZOPT->__GET('ID_VESPECIES'),
                        $RECHAZOPT->__GET('ID_PRODUCTOR'),
                        $RECHAZOPT->__GET('ID_EMPRESA'),
                        $RECHAZOPT->__GET('ID_PLANTA'),
                        $RECHAZOPT->__GET('ID_TEMPORADA'),

                        $RECHAZOPT->__GET('ID_USUARIOI'),
                        $RECHAZOPT->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRechazo(RECHAZOPT $RECHAZOPT)
    {

        try {
            $query = "
		UPDATE fruta_rechazopt SET
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

                        $RECHAZOPT->__GET('FECHA_RECHAZO'),
                        $RECHAZOPT->__GET('TRECHAZO'),
                        $RECHAZOPT->__GET('RESPONSBALE_RECHAZO'),
                        $RECHAZOPT->__GET('MOTIVO_RECHAZO'),

                        $RECHAZOPT->__GET('CANTIDAD_ENVASE_RECHAZO'),
                        $RECHAZOPT->__GET('KILOS_BRUTO_RECHAZO'),
                        $RECHAZOPT->__GET('KILOS_NETO_RECHAZO'),

                        $RECHAZOPT->__GET('ID_VESPECIES'),
                        $RECHAZOPT->__GET('ID_PRODUCTOR'),
                        
                        $RECHAZOPT->__GET('ID_USUARIOM'),
                        $RECHAZOPT->__GET('ID_RECHAZO')

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
            $sql = "DELETE FROM fruta_rechazopt WHERE ID_RECHAZO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(RECHAZOPT $RECHAZOPT)
    {

        try {
            $query = "
                UPDATE fruta_rechazopt SET			
                        ESTADO_REGISTRO = 0
                WHERE ID_RECHAZO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECHAZOPT->__GET('ID_RECHAZO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(RECHAZOPT $RECHAZOPT)
    {
        try {
            $query = "
                UPDATE fruta_rechazopt SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_RECHAZO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECHAZOPT->__GET('ID_RECHAZO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(RECHAZOPT $RECHAZOPT)
    {
        try {
            $query = "
                    UPDATE fruta_rechazopt SET			
                            ESTADO = 1
                    WHERE ID_RECHAZO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECHAZOPT->__GET('ID_RECHAZO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(RECHAZOPT $RECHAZOPT)
    {
        try {
            $query = "
                    UPDATE fruta_rechazopt SET			
                            ESTADO = 0
                    WHERE ID_RECHAZO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECHAZOPT->__GET('ID_RECHAZO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR
    public function listarRechazoCerrarEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    IFNULL(CANTIDAD_ENVASE_RECHAZO,0) AS 'ENVASE'   ,                                                 
                                                    IFNULL(KILOS_NETO_RECHAZO,0) AS 'NETO'    ,                                                 
                                                    IFNULL(KILOS_BRUTO_RECHAZO,0) AS 'BRUTO',
                                                    DATE_FORMAT(FECHA_RECHAZO, '%d-%m-%Y') AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                                FROM fruta_rechazopt                                
                                                WHERE ESTADO_REGISTRO = 1   
                                                AND ESTADO = 0
                                                AND  ID_EMPRESA = '" . $EMPRESA . "' 
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
                                                    DATE_FORMAT(FECHA_RECHAZO, '%d-%m-%Y') AS 'FECHA', 
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO', 
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                                FROM fruta_rechazopt                               
                                                WHERE ESTADO_REGISTRO = 1   
                                                AND  ID_EMPRESA = '" . $EMPRESA . "' 
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
                                                FROM fruta_rechazopt                                
                                                WHERE ESTADO_REGISTRO = 1   
                                                AND  ID_EMPRESA = '" . $EMPRESA . "' 
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
                                               FROM fruta_rechazopt                                                        
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
                                                FROM fruta_rechazopt                                                        
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
  


    //OTRAS FUNCIONALIDADES

    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHARECHAZOMP, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM fruta_rechazopt
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
                                                FROM fruta_rechazopt
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
