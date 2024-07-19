<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DRECEPCIONPT.php';
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DRECEPCIONPT_ADO
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
    public function listarDRecepcionpt()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionpt limit 6;	");
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
    public function listarDRecepcionptCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionpt ;	");
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
    //LISTAR DETTALLE DE RECEPCION POR ID DE RECEPCION
    public function listarDrecepcionPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_drecepcionpt 
                                            WHERE ID_RECEPCION= '" . $IDRECEPCION . "' AND ESTADO_REGISTRO = 1;	");
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

    public function listarDrecepcionPorRecepcion2($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                    DATE_FORMAT(FECHA_EMBALADO_DRECEPCION, '%d-%m-%Y') AS 'EMBALADO', 
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_RECIBIDO_DRECEPCION,0),0,'de_DE') AS 'ENVASEI', 
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_RECHAZADO_DRECEPCION,0),0,'de_DE') AS 'ENVASER', 
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_APROBADO_DRECEPCION,0),0,'de_DE') AS 'ENVASEA', 
                                                    FORMAT(IFNULL(KILOS_NETO_REAL_DRECEPCION,0),2,'de_DE') AS 'NETOREAL', 
                                                    FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_DRECEPCION,0),0,'de_DE') AS 'BRUTO' ,
                                                    FORMAT(IFNULL(PDESHIDRATACION_DRECEPCION,0),2,'de_DE') AS 'PORCENTAJE' ,
                                                    FORMAT(IFNULL(KILOS_DESHIDRATACION_DRECEPCION,0),2,'de_DE') AS 'DESHIDRATACION' 
                                            FROM fruta_drecepcionpt 
                                            WHERE ID_RECEPCION= '" . $IDRECEPCION . "' AND ESTADO_REGISTRO = 1;	");
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

    //VER DATOS DE DETALLE DE RECEPCION
    public function verDrecepcion($IDDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_drecepcionpt
                                             WHERE ID_DRECEPCION = " . $IDDRECEPCION . "  ;");
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


    public function verDrecepcion2($IDDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(FECHA_EMBALADO_DRECEPCION, '%d-%m-%Y') AS 'EMBALADO', 
                                                FORMAT(IFNULL(CANTIDAD_ENVASE_RECIBIDO_DRECEPCION,0),0,'de_DE') AS 'ENVASEI', 
                                                FORMAT(IFNULL(CANTIDAD_ENVASE_RECHAZADO_DRECEPCION,0),0,'de_DE') AS 'ENVASER', 
                                                FORMAT(IFNULL(CANTIDAD_ENVASE_APROBADO_DRECEPCION,0),0,'de_DE') AS 'ENVASE', 
                                                FORMAT(IFNULL(KILOS_NETO_REAL_DRECEPCION,0),2,'de_DE') AS 'NETOREAL', 
                                                FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO',
                                                FORMAT(IFNULL(KILOS_BRUTO_DRECEPCION,0),0,'de_DE') AS 'BRUTO' ,
                                                FORMAT(IFNULL(PDESHIDRATACION_DRECEPCION,0),2,'de_DE') AS 'PORCENTAJE' ,
                                                FORMAT(IFNULL(KILOS_DESHIDRATACION_DRECEPCION,0),2,'de_DE') AS 'DESHIDRATACION'  
                                            FROM fruta_drecepcionpt
                                             WHERE ID_DRECEPCION = " . $IDDRECEPCION . "  ;");
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




    private   $ESTADO;
    private   $ESTADO_REGISTRO;

    //REGISTRO DE UNA NUEVA FILA      
    public function agregarDrecepcion(DRECEPCIONPT $DRECEPCIONPT)
    {
        try {



            $query =
                "INSERT INTO fruta_drecepcionpt 
                                                ( 
                                                        FOLIO_DRECEPCION,
                                                        FOLIO_MANUAL,
                                                        FECHA_EMBALADO_DRECEPCION,
                                                        CANTIDAD_ENVASE_RECIBIDO_DRECEPCION,
                                                        CANTIDAD_ENVASE_RECHAZADO_DRECEPCION,

                                                        CANTIDAD_ENVASE_APROBADO_DRECEPCION ,                
                                                        KILOS_NETO_REAL_DRECEPCION,
                                                        KILOS_NETO_DRECEPCION ,
                                                        KILOS_BRUTO_DRECEPCION ,
                                                        PDESHIDRATACION_DRECEPCION ,

                                                        KILOS_DESHIDRATACION_DRECEPCION ,
                                                        EMBOLSADO_DRECEPCION ,
                                                        TEMPERATURA_DRECEPCION,
                                                        STOCK_DRECEPCION,
                                                        GASIFICADO_DRECEPCION,

                                                        PREFRIO_DRECEPCION,
                                                        NOTA_DRECEPCION,
                                                        ID_RECEPCION, 
                                                        ID_PRODUCTOR, 
                                                        ID_VESPECIES,  
                                                        
                                                        ID_TCATEGORIA,                                                          
                                                        ID_TCOLOR,  

                                                        ID_ESTANDAR,   
                                                        ID_FOLIO,   
                                                        ID_TEMBALAJE,   
                                                        ID_TMANEJO,   
                                                        ID_TCALIBRE,  

                                                        INGRESO,
                                                        MODIFICACION,
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                ) 
             VALUES
               (  ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?,  ?, ?, ?, ?,  ?,   SYSDATE(), SYSDATE(), 1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONPT->__GET('FOLIO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('FOLIO_MANUAL'),
                        $DRECEPCIONPT->__GET('FECHA_EMBALADO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'),

                        $DRECEPCIONPT->__GET('CANTIDAD_ENVASE_APROBADO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('KILOS_NETO_REAL_DRECEPCION'),
                        $DRECEPCIONPT->__GET('KILOS_NETO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('KILOS_BRUTO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('PDESHIDRATACION_DRECEPCION'),

                        $DRECEPCIONPT->__GET('KILOS_DESHIDRATACION_DRECEPCION'),
                        $DRECEPCIONPT->__GET('EMBOLSADO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('TEMPERATURA_DRECEPCION'),
                        $DRECEPCIONPT->__GET('STOCK_DRECEPCION'),
                        $DRECEPCIONPT->__GET('GASIFICADO_DRECEPCION'),

                        $DRECEPCIONPT->__GET('PREFRIO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('NOTA_DRECEPCION'),
                        $DRECEPCIONPT->__GET('ID_RECEPCION'),
                        $DRECEPCIONPT->__GET('ID_PRODUCTOR'),
                        $DRECEPCIONPT->__GET('ID_VESPECIES'),

                        $DRECEPCIONPT->__GET('ID_TCATEGORIA'),
                        $DRECEPCIONPT->__GET('ID_TCOLOR'),

                        $DRECEPCIONPT->__GET('ID_ESTANDAR'),
                        $DRECEPCIONPT->__GET('ID_FOLIO'),
                        $DRECEPCIONPT->__GET('ID_TEMBALAJE'),
                        $DRECEPCIONPT->__GET('ID_TMANEJO'),
                        $DRECEPCIONPT->__GET('ID_TCALIBRE')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDrecepcion($id)
    {
        try {
            $sql = "DELETE FROM fruta_drecepcionpt WHERE ID_DRECEPCION=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR FILA
    public function actualizarDrecepcion(DRECEPCIONPT $DRECEPCIONPT)
    {
        try {


            $query = "
		UPDATE fruta_drecepcionpt SET      
          MODIFICACION = SYSDATE(),   
          FECHA_EMBALADO_DRECEPCION  = ?,
          CANTIDAD_ENVASE_RECIBIDO_DRECEPCION  = ? ,
          CANTIDAD_ENVASE_RECHAZADO_DRECEPCION  = ? ,
          CANTIDAD_ENVASE_APROBADO_DRECEPCION  = ? ,
          KILOS_NETO_REAL_DRECEPCION  = ?  ,
          KILOS_NETO_DRECEPCION  = ?  ,
          KILOS_BRUTO_DRECEPCION  = ?,
          PDESHIDRATACION_DRECEPCION  = ?, 
          KILOS_DESHIDRATACION_DRECEPCION  = ?,           
          EMBOLSADO_DRECEPCION  = ?, 
          TEMPERATURA_DRECEPCION  = ?, 
          STOCK_DRECEPCION  = ?, 
          GASIFICADO_DRECEPCION  = ?, 
          PREFRIO_DRECEPCION  = ?, 
          NOTA_DRECEPCION  = ?, 
          ID_RECEPCION = ?, 
          ID_PRODUCTOR = ?, 
          ID_VESPECIES = ?, 
          ID_TCATEGORIA = ?, 
          ID_TCOLOR = ?, 
          ID_ESTANDAR = ?,   
          ID_TEMBALAJE = ? ,
          ID_TMANEJO = ? ,
          ID_TCALIBRE = ?
		WHERE  ID_DRECEPCION= ?";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONPT->__GET('FECHA_EMBALADO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('CANTIDAD_ENVASE_RECIBIDO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('CANTIDAD_ENVASE_RECHAZADO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('CANTIDAD_ENVASE_APROBADO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('KILOS_NETO_REAL_DRECEPCION'),
                        $DRECEPCIONPT->__GET('KILOS_NETO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('KILOS_BRUTO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('PDESHIDRATACION_DRECEPCION'),
                        $DRECEPCIONPT->__GET('KILOS_DESHIDRATACION_DRECEPCION'),
                        $DRECEPCIONPT->__GET('EMBOLSADO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('TEMPERATURA_DRECEPCION'),
                        $DRECEPCIONPT->__GET('STOCK_DRECEPCION'),
                        $DRECEPCIONPT->__GET('GASIFICADO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('PREFRIO_DRECEPCION'),
                        $DRECEPCIONPT->__GET('NOTA_DRECEPCION'),
                        $DRECEPCIONPT->__GET('ID_RECEPCION'),
                        $DRECEPCIONPT->__GET('ID_PRODUCTOR'),
                        $DRECEPCIONPT->__GET('ID_VESPECIES'),
                        $DRECEPCIONPT->__GET('ID_TCATEGORIA'),
                        $DRECEPCIONPT->__GET('ID_TCOLOR'),
                        $DRECEPCIONPT->__GET('ID_ESTANDAR'),
                        $DRECEPCIONPT->__GET('ID_TEMBALAJE'),
                        $DRECEPCIONPT->__GET('ID_TMANEJO'),
                        $DRECEPCIONPT->__GET('ID_TCALIBRE'),
                        $DRECEPCIONPT->__GET('ID_DRECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //BUSQUEDAS


    public function buscarPorIdRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                FECHA_EMBALADO_DRECEPCION AS 'EMBALADO',
                                                IFNULL(CANTIDAD_ENVASE_APROBADO_DRECEPCION,0) AS 'ENVASE',
                                                IFNULL(KILOS_NETO_REAL_DRECEPCION,0) AS 'NETOREAL',
                                                IFNULL(KILOS_NETO_DRECEPCION,0) AS 'NETO',
                                                IFNULL(KILOS_BRUTO_DRECEPCION,0) AS 'BRUTO' ,
                                                IFNULL(PDESHIDRATACION_DRECEPCION,0) AS 'PORCENTAJE' ,
                                                IFNULL(KILOS_DESHIDRATACION_DRECEPCION,0) AS 'DESHIDRATACION' 
                                            FROM fruta_drecepcionpt 
                                            WHERE ID_RECEPCION = " . $IDRECEPCION . " 
                                            AND ESTADO_REGISTRO = '1' ;");
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
    public function buscarPorIdRecepcion2($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                            DATE_FORMAT(FECHA_EMBALADO_DRECEPCION, '%d-%m-%Y') AS 'EMBALADO',
                                                            FORMAT(IFNULL(CANTIDAD_ENVASE_APROBADO_DRECEPCION,0),0,'de_DE') AS 'ENVASE',
                                                            FORMAT(IFNULL(KILOS_NETO_REAL_DRECEPCION,0),2,'de_DE') AS 'NETOREAL',
                                                            FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO',
                                                            FORMAT(IFNULL(KILOS_BRUTO_DRECEPCION,0),0,'de_DE') AS 'BRUTO' ,
                                                            FORMAT(IFNULL(PDESHIDRATACION_DRECEPCION,0),2,'de_DE') AS 'PORCENTAJE' ,
                                                            FORMAT(IFNULL(KILOS_DESHIDRATACION_DRECEPCION,0),2,'de_DE') AS 'DESHIDRATACION' 

                                             FROM fruta_drecepcionpt
                                             WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                             AND ESTADO_REGISTRO = '1' ;");
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

    public function buscarPorRecepcionFolio($IDRECEPCION, $FOLIODRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *
                                             FROM fruta_drecepcionpt
                                             WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                             AND FOLIO_DRECEPCION='" . $FOLIODRECEPCION . "' ");
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

    public function buscarPorRecepcionFolio2($FOLIODRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                        DATE_FORMAT(FECHA_EMBALADO_DRECEPCION, '%d-%m-%Y') AS 'EMBALADO',
                                                        FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_APROBADO_DRECEPCION),0),0,'de_DE') AS 'ENVASEA', 
                                                        FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_RECIBIDO_DRECEPCION),0),0,'de_DE') AS 'ENVASEI', 
                                                        FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_RECHAZADO_DRECEPCION),0),0,'de_DE') AS 'ENVASER', 
                                                        FORMAT(IFNULL(KILOS_NETO_REAL_DRECEPCION,0),2,'de_DE') AS 'NETOREAL',
                                                        FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO',
                                                        FORMAT(IFNULL(KILOS_BRUTO_DRECEPCION,0),0,'de_DE') AS 'BRUTO' ,
                                                        FORMAT(IFNULL(PDESHIDRATACION_DRECEPCION,0),2,'de_DE') AS 'PORCENTAJE' ,
                                                        FORMAT(IFNULL(KILOS_DESHIDRATACION_DRECEPCION,0),2,'de_DE') AS 'DESHIDRATACION' 
                                             FROM fruta_drecepcionpt
                                             WHERE FOLIO_DRECEPCION = '" . $FOLIODRECEPCION . "' 
                                             AND ESTADO_REGISTRO = '1' ;");
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
    //OBTENER LOS TOTALES DEL CONSOLIDAD DEL DETALLE DE RECEPCION ASOCIADO A UNA RECEPCION
    public function obtenerTotales($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                        IFNULL(SUM(CANTIDAD_ENVASE_APROBADO_DRECEPCION),0) AS 'ENVASEA', 
                                                        IFNULL(SUM(CANTIDAD_ENVASE_RECIBIDO_DRECEPCION),0) AS 'ENVASEI', 
                                                        IFNULL(SUM(CANTIDAD_ENVASE_RECHAZADO_DRECEPCION),0) AS 'ENVASER', 
                                                        IFNULL(SUM(KILOS_NETO_DRECEPCION),0) AS 'NETO', 
                                                        IFNULL(SUM(KILOS_BRUTO_DRECEPCION),0)  AS 'BRUTO',  
                                                        IFNULL(SUM(KILOS_NETO_REAL_DRECEPCION),0)  AS 'NETOREAL'  
                                         FROM fruta_drecepcionpt 
                                         WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                         AND ESTADO_REGISTRO = 1 ;");
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
    public function obtenerTotales2($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_APROBADO_DRECEPCION),0),0,'de_DE') AS 'ENVASEA', 
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_RECIBIDO_DRECEPCION),0),0,'de_DE') AS 'ENVASEI', 
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_RECHAZADO_DRECEPCION),0),0,'de_DE') AS 'ENVASER', 
                                                FORMAT(IFNULL(SUM(KILOS_NETO_DRECEPCION),0),2,'de_DE') AS 'NETO', 
                                                FORMAT(IFNULL(SUM(KILOS_BRUTO_DRECEPCION),0),2,'de_DE')  AS 'BRUTO'  ,
                                                FORMAT(IFNULL(SUM(KILOS_NETO_REAL_DRECEPCION),0),2,'de_DE') AS 'NETOREAL' 
                                         FROM fruta_drecepcionpt                                         
                                         WHERE 
                                                ID_RECEPCION = '" . $IDRECEPCION . "' 
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

    ///CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DRECEPCIONPT $DRECEPCIONPT)
    {

        try {
            $query = "
                UPDATE fruta_drecepcionpt SET	 
                        MODIFICACION = SYSDATE(),   		
                        ESTADO_REGISTRO = 0
                WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONPT->__GET('ID_DRECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DRECEPCIONPT $DRECEPCIONPT)
    {
        try {
            $query = "
                UPDATE fruta_drecepcionpt SET	 
                        MODIFICACION = SYSDATE(),   		
                        ESTADO_REGISTRO = 1
                WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONPT->__GET('ID_DRECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DRECEPCIONPT $DRECEPCIONPT)
    {
        try {
            $query = "
                    UPDATE fruta_drecepcionpt SET		 
                            MODIFICACION = SYSDATE(),   	
                            ESTADO = 1
                    WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONPT->__GET('ID_DRECEPCION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DRECEPCIONPT $DRECEPCIONPT)
    {
        try {
            $query = "
                    UPDATE fruta_drecepcionpt SET		 
                            MODIFICACION = SYSDATE(),   	
                            ESTADO = 0
                    WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONPT->__GET('ID_DRECEPCION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //OTRAS FUNCIONES
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
