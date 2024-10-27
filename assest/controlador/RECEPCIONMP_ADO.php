<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/RECEPCIONMP.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class RECEPCIONMP_ADO
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
    public function listarRecepcion()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_recepcionmp limit 6;	");
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
    public function listarRecepcionCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_recepcionmp ;	");
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
    public function verRecepcion($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                    FROM fruta_recepcionmp 
                                             WHERE ID_RECEPCION= '" . $ID . "';");
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
    public function verRecepcion2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        FECHA_GUIA_RECEPCION AS 'GUIA',
                                                        FECHA_RECEPCION AS 'FECHA',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'  
                                            FROM fruta_recepcionmp
                                            WHERE ID_RECEPCION= '" . $ID . "';");
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

    public function verRecepcion3($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        DATE_FORMAT(FECHA_GUIA_RECEPCION, '%d-%m-%Y') AS 'GUIA',
                                                        DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y') AS 'FECHA',
                                                        DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%d-%m-%y') AS 'MODIFICACION'
                                            FROM fruta_recepcionmp
                                            WHERE ID_RECEPCION= '" . $ID . "';");
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

    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreRecepcion($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_recepcionmp WHERE OBSERVACION_RECEPCION LIKE '%" . $NOMBRE . "%';");
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
    public function agregarRecepcion(RECEPCIONMP $RECEPCIONMP)
    {
        try {



            $query =
                "INSERT INTO fruta_recepcionmp (   
                                                    NUMERO_RECEPCION, 
                                                    FECHA_RECEPCION, 
                                                    HORA_RECEPCION, 
                                                    FECHA_GUIA_RECEPCION,   
                                                    NUMERO_GUIA_RECEPCION, 
                                                    TOTAL_KILOS_GUIA_RECEPCION, 
                                                    CANTIDAD_ENVASE_RECEPCION, 
                                                    KILOS_NETO_RECEPCION,
                                                    KILOS_BRUTO_RECEPCION,                                         
                                                    OBSERVACION_RECEPCION, 
                                                    PATENTE_CAMION, 
                                                    PATENTE_CARRO,   
                                                    ID_PLANTA2, 
                                                    ID_PRODUCTOR,
                                                    TRECEPCION,  
                                                    ID_TRANSPORTE,  
                                                    ID_CONDUCTOR,    
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA, 
                                                    ID_USUARIOI, 
                                                    ID_USUARIOM, 
                                                    INGRESO,
                                                    MODIFICACION,  
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                    )
             VALUES
               ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?,   SYSDATE(),  SYSDATE(), 1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECEPCIONMP->__GET('NUMERO_RECEPCION'),
                        $RECEPCIONMP->__GET('FECHA_RECEPCION'),
                        $RECEPCIONMP->__GET('HORA_RECEPCION'),
                        $RECEPCIONMP->__GET('FECHA_GUIA_RECEPCION'),
                        $RECEPCIONMP->__GET('NUMERO_GUIA_RECEPCION'),
                        $RECEPCIONMP->__GET('TOTAL_KILOS_GUIA_RECEPCION'),
                        $RECEPCIONMP->__GET('CANTIDAD_ENVASE_RECEPCION'),
                        $RECEPCIONMP->__GET('KILOS_NETO_RECEPCION'),
                        $RECEPCIONMP->__GET('KILOS_BRUTO_RECEPCION'),
                        $RECEPCIONMP->__GET('OBSERVACION_RECEPCION'),
                        $RECEPCIONMP->__GET('PATENTE_CAMION'),
                        $RECEPCIONMP->__GET('PATENTE_CARRO'),
                        $RECEPCIONMP->__GET('ID_PLANTA2'),
                        $RECEPCIONMP->__GET('ID_PRODUCTOR'),
                        $RECEPCIONMP->__GET('TRECEPCION'),
                        $RECEPCIONMP->__GET('ID_TRANSPORTE'),
                        $RECEPCIONMP->__GET('ID_CONDUCTOR'),
                        $RECEPCIONMP->__GET('ID_EMPRESA'),
                        $RECEPCIONMP->__GET('ID_PLANTA'),
                        $RECEPCIONMP->__GET('ID_TEMPORADA'),
                        $RECEPCIONMP->__GET('ID_USUARIOI'),
                        $RECEPCIONMP->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRecepcion($id)
    {
        try {
            $sql = "DELETE FROM fruta_recepcionmp WHERE ID_RECEPCION=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRecepcion(RECEPCIONMP $RECEPCIONMP)
    {
        try {
            $query = "
                    UPDATE fruta_recepcionmp SET
                        MODIFICACION = SYSDATE(),
                        FECHA_RECEPCION = ?,
                        HORA_RECEPCION = ?, 
                        FECHA_GUIA_RECEPCION = ?,
                        NUMERO_GUIA_RECEPCION = ?,
                        TOTAL_KILOS_GUIA_RECEPCION = ?,
                        CANTIDAD_ENVASE_RECEPCION = ?,
                        KILOS_NETO_RECEPCION = ?, 
                        KILOS_BRUTO_RECEPCION = ?, 
                        OBSERVACION_RECEPCION = ?,
                        PATENTE_CAMION = ?,
                        PATENTE_CARRO = ?,
                        TRECEPCION = ?, 
                        ID_PLANTA2 = ?, 
                        ID_PRODUCTOR = ?, 
                        ID_TRANSPORTE = ?, 
                        ID_CONDUCTOR = ?,
                        ID_USUARIOM = ?
                    WHERE ID_RECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECEPCIONMP->__GET('FECHA_RECEPCION'),
                        $RECEPCIONMP->__GET('HORA_RECEPCION'),
                        $RECEPCIONMP->__GET('FECHA_GUIA_RECEPCION'),
                        $RECEPCIONMP->__GET('NUMERO_GUIA_RECEPCION'),
                        $RECEPCIONMP->__GET('TOTAL_KILOS_GUIA_RECEPCION'),
                        $RECEPCIONMP->__GET('CANTIDAD_ENVASE_RECEPCION'),
                        $RECEPCIONMP->__GET('KILOS_NETO_RECEPCION'),
                        $RECEPCIONMP->__GET('KILOS_BRUTO_RECEPCION'),
                        $RECEPCIONMP->__GET('OBSERVACION_RECEPCION'),
                        $RECEPCIONMP->__GET('PATENTE_CAMION'),
                        $RECEPCIONMP->__GET('PATENTE_CARRO'),
                        $RECEPCIONMP->__GET('TRECEPCION'),
                        $RECEPCIONMP->__GET('ID_PLANTA2'),
                        $RECEPCIONMP->__GET('ID_PRODUCTOR'),
                        $RECEPCIONMP->__GET('ID_TRANSPORTE'),
                        $RECEPCIONMP->__GET('ID_CONDUCTOR'),
                        $RECEPCIONMP->__GET('ID_USUARIOM'),
                        $RECEPCIONMP->__GET('ID_RECEPCION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(RECEPCIONMP $RECEPCIONMP)
    {

        try {
            $query = "
    UPDATE fruta_recepcionmp SET			
            ESTADO_REGISTRO = 0
    WHERE ID_RECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECEPCIONMP->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(RECEPCIONMP $RECEPCIONMP)
    {
        try {
            $query = "
    UPDATE fruta_recepcionmp SET			
            ESTADO_REGISTRO = 1
    WHERE ID_RECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECEPCIONMP->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(RECEPCIONMP $RECEPCIONMP)
    {
        try {
            $query = "
                    UPDATE fruta_recepcionmp SET			
                            ESTADO = 1
                    WHERE ID_RECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECEPCIONMP->__GET('ID_RECEPCION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(RECEPCIONMP $RECEPCIONMP)
    {
        try {
            $query = "
                    UPDATE fruta_recepcionmp SET			
                            ESTADO = 0
                    WHERE ID_RECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $RECEPCIONMP->__GET('ID_RECEPCION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }






    public function buscarRecepcionPorProductorGuiaEmpresaPlantaTemporada($NUMEROGUIA, $PRODUCTOR, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM fruta_recepcionmp
                                                WHERE   ESTADO_REGISTRO = 1 
                                                    AND NUMERO_GUIA_RECEPCION = " . $NUMEROGUIA . "
                                                    AND ID_PRODUCTOR = " . $PRODUCTOR . "                                                 
                                                    AND ID_EMPRESA = " . $EMPRESA . " 
                                                    AND ID_PLANTA = " . $PLANTA . " 
                                                    AND ID_TEMPORADA = " . $TEMPORADA . "     
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
    public function buscarRecepcionPorPlantaExternaGuiaEmpresaPlantaTemporada($NUMEROGUIA, $PLANTA2, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM fruta_recepcionmp
                                                WHERE  ESTADO_REGISTRO = 1 
                                                    AND NUMERO_GUIA_RECEPCION = " . $NUMEROGUIA . "
                                                    AND ID_PLANTA2 = " . $PLANTA2 . "                                                 
                                                    AND ID_EMPRESA = " . $EMPRESA . " 
                                                    AND ID_PLANTA = " . $PLANTA . " 
                                                    AND ID_TEMPORADA = " . $TEMPORADA . "     
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


    //LISTA
    public function listarRecepcionEmpresaTemporadaCBX($EMPRESA,   $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,
                                                    FECHA_GUIA_RECEPCION AS 'FECHA_GUIA',
                                                    FECHA_RECEPCION AS 'FECHA',

                                                    
                                                    WEEK(FECHA_RECEPCION,3) AS 'SEMANA', 
                                                    WEEK(FECHA_GUIA_RECEPCION,3) AS 'SEMANAGUIA', 

                                                    
                                                    WEEKOFYEAR(FECHA_RECEPCION) AS 'SEMANAISO', 
                                                    WEEKOFYEAR(FECHA_GUIA_RECEPCION) AS 'SEMANAGUIAISO', 

                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    IFNULL(CANTIDAD_ENVASE_RECEPCION,0)  AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_RECEPCION,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_RECEPCION,0)  AS 'BRUTO',
                                                    IFNULL(TOTAL_KILOS_GUIA_RECEPCION,0)  AS 'GUIA'
                                            FROM fruta_recepcionmp 
                                            WHERE ESTADO_REGISTRO = 1 
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
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

    public function listarRecepcionEmpresaProductorTemporadaCBX( $EMPRESA,$PRODUCTOR, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,
                                                    FECHA_GUIA_RECEPCION AS 'FECHA_GUIA',
                                                    FECHA_RECEPCION AS 'FECHA',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    IFNULL(CANTIDAD_ENVASE_RECEPCION,0)  AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_RECEPCION,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_RECEPCION,0)  AS 'BRUTO',
                                                    IFNULL(TOTAL_KILOS_GUIA_RECEPCION,0)  AS 'GUIA'
                                            FROM fruta_recepcionmp 
                                            WHERE  ESTADO_REGISTRO = 1 
                                                AND  ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PRODUCTOR = '" . $PRODUCTOR . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                                AND FECHA_RECEPCION < CURRENT_DATE;	");
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

    public function listarRecepcionTemporadaCBX( $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,
                                                    FECHA_GUIA_RECEPCION AS 'FECHA_GUIA',
                                                    FECHA_RECEPCION AS 'FECHA',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    IFNULL(CANTIDAD_ENVASE_RECEPCION,0)  AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_RECEPCION,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_RECEPCION,0)  AS 'BRUTO',
                                                    IFNULL(TOTAL_KILOS_GUIA_RECEPCION,0)  AS 'GUIA'
                                            FROM fruta_recepcionmp 
                                            WHERE  ESTADO_REGISTRO = 1 
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


    public function listarRecepcionTemporadaCBXEst( $TEMPORADA, $ESPECIE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,
                                                    FECHA_GUIA_RECEPCION AS 'FECHA_GUIA',
                                                    FECHA_RECEPCION AS 'FECHA',
                                                    DATE_FORMAT(FRECMP.INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(FRECMP.MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    IFNULL(CANTIDAD_ENVASE_RECEPCION,0)  AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_RECEPCION,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_RECEPCION,0)  AS 'BRUTO',
                                                    IFNULL(TOTAL_KILOS_GUIA_RECEPCION,0)  AS 'GUIA'
                                            FROM fruta_recepcionmp FRECMP 
											LEFT JOIN fruta_drecepcionmp FDRECMP ON FRECMP.ID_RECEPCION = FDRECMP.ID_RECEPCION
                                            LEFT JOIN fruta_vespecies VES ON FDRECMP.ID_VESPECIES = VES.ID_VESPECIES
                                            WHERE  FRECMP.ESTADO_REGISTRO = 1 
                                            AND FRECMP.ID_TEMPORADA = '" . $TEMPORADA . "' AND VES.ID_ESPECIES = '" . $ESPECIE . "'  
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
    public function listarRecepcionCerradoEmpresaPlantaTemporadaCBX($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,                                                    
                                                    FECHA_GUIA_RECEPCION AS 'FECHA_GUIA',
                                                    FECHA_RECEPCION AS 'FECHA',
                                                    
                                                    WEEK(FECHA_RECEPCION,3) AS 'SEMANA', 
                                                    WEEK(FECHA_GUIA_RECEPCION,3) AS 'SEMANAGUIA', 

                                                    
                                                    WEEKOFYEAR(FECHA_RECEPCION) AS 'SEMANAISO', 
                                                    WEEKOFYEAR(FECHA_GUIA_RECEPCION) AS 'SEMANAGUIAISO', 

                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                    IFNULL(CANTIDAD_ENVASE_RECEPCION,0)  AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_RECEPCION,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_RECEPCION,0)  AS 'BRUTO',
                                                    IFNULL(TOTAL_KILOS_GUIA_RECEPCION,0)  AS 'GUIA'
                                            FROM fruta_recepcionmp 
                                            WHERE  ESTADO_REGISTRO = 1 
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

    public function listarRecepcionEmpresaPlantaTemporadaCBX($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,                                                    
                                                    FECHA_GUIA_RECEPCION AS 'FECHA_GUIA',
                                                    FECHA_RECEPCION AS 'FECHA',
                                                    
                                                    WEEK(FECHA_RECEPCION,3) AS 'SEMANA', 
                                                    WEEK(FECHA_GUIA_RECEPCION,3) AS 'SEMANAGUIA', 

                                                    
                                                    WEEKOFYEAR(FECHA_RECEPCION) AS 'SEMANAISO', 
                                                    WEEKOFYEAR(FECHA_GUIA_RECEPCION) AS 'SEMANAGUIAISO', 

                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                    IFNULL(CANTIDAD_ENVASE_RECEPCION,0)  AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_RECEPCION,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_RECEPCION,0)  AS 'BRUTO',
                                                    IFNULL(TOTAL_KILOS_GUIA_RECEPCION,0)  AS 'GUIA'
                                            FROM fruta_recepcionmp 
                                            WHERE  ESTADO_REGISTRO = 1 
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

    public function listarRecepcionEmpresaPlantaTemporada2CBX($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,
                                                    DATE_FORMAT(FECHA_GUIA_RECEPCION, '%d-%m-%Y') AS 'FECHA_GUIA',
                                                    DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y') AS 'FECHA',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_RECEPCION,0),0,'de_DE')  AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_RECEPCION,0),2,'de_DE')  AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_RECEPCION,0),2,'de_DE')  AS 'BRUTO',
                                                    FORMAT(IFNULL(TOTAL_KILOS_GUIA_RECEPCION,0),2,'de_DE')  AS 'GUIA'
                                            FROM fruta_recepcionmp 
                                            WHERE  ESTADO_REGISTRO = 1 
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

    //TOTALES
    public function obtenerTotalesRecepcionCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                     IFNULL(SUM(CANTIDAD_ENVASE_RECEPCION),0) AS 'ENVASE',   
                                                     IFNULL(SUM(KILOS_NETO_RECEPCION),0) AS 'NETO',  
                                                     IFNULL(SUM(KILOS_BRUTO_RECEPCION),0)  AS 'BRUTO'  
                                            FROM fruta_recepcionmp 
                                            WHERE ESTADO_REGISTRO = 1 
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

    public function obtenerTotalesRecepcionCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     FORMAT(IFNULL(SUM(TOTAL_KILOS_GUIA_RECEPCION),0),2,'de_DE')  AS 'GUIA',   
                                                     FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_RECEPCION),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(KILOS_NETO_RECEPCION),0),2,'de_DE') AS 'NETO',  
                                                     FORMAT(IFNULL(SUM(KILOS_BRUTO_RECEPCION),0),2,'de_DE')  AS 'BRUTO'  
                                            FROM fruta_recepcionmp 
                                            WHERE ESTADO_REGISTRO = 1 ;	");
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

    public function obtenerTotalesRecepcionEmpresaTemporadaCBX($EMPRESA,   $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  IFNULL(SUM(TOTAL_KILOS_GUIA_RECEPCION),0) AS 'GUIA',   
                                                        IFNULL(SUM(CANTIDAD_ENVASE_RECEPCION),0) AS 'ENVASE',  
                                                        IFNULL(SUM(KILOS_NETO_RECEPCION),0)  AS 'NETO',  
                                                        IFNULL(SUM(KILOS_BRUTO_RECEPCION),0)   AS 'BRUTO'  
                                            FROM fruta_recepcionmp 
                                            WHERE  ESTADO_REGISTRO = 1 
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
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

    public function obtenerTotalesRecepcionTemporada2CBX($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT   
                                                        FORMAT(IFNULL(SUM(TOTAL_KILOS_GUIA_RECEPCION),0),2,'de_DE')  AS 'GUIA',   
                                                        FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_RECEPCION),0),0,'de_DE') AS 'ENVASE',  
                                                        FORMAT(IFNULL(SUM(KILOS_NETO_RECEPCION),0),2,'de_DE')  AS 'NETO',  
                                                        FORMAT(IFNULL(SUM(KILOS_BRUTO_RECEPCION),0),2,'de_DE')   AS 'BRUTO'  
                                            FROM fruta_recepcionmp 
                                            WHERE   ESTADO_REGISTRO = 1 
                                                AND  ID_TEMPORADA = '" . $TEMPORADA . "' 
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

    public function obtenerTotalesRecepcionEmpresaPlantaTemporada2CBX($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT   
                                                        FORMAT(IFNULL(SUM(TOTAL_KILOS_GUIA_RECEPCION),0),2,'de_DE')  AS 'GUIA',   
                                                        FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_RECEPCION),0),0,'de_DE') AS 'ENVASE',  
                                                        FORMAT(IFNULL(SUM(KILOS_NETO_RECEPCION),0),2,'de_DE')  AS 'NETO',  
                                                        FORMAT(IFNULL(SUM(KILOS_BRUTO_RECEPCION),0),2,'de_DE')   AS 'BRUTO'  
                                            FROM fruta_recepcionmp 
                                            WHERE ESTADO_REGISTRO = 1 
                                            AND  ID_EMPRESA = '" . $EMPRESA . "' 
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



    //OTRAS FUNCIONES


    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerID($OBSERVACION,   $TRECEPCION, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                            FROM fruta_recepcionmp
                                            WHERE    
                                                 DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')
                                                 AND OBSERVACION_RECEPCION LIKE '" . $OBSERVACION . "'     
                                                 AND TRECEPCION = '" . $TRECEPCION . "'                                                     
                                                 AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                 AND ID_PLANTA = '" . $PLANTA . "' 
                                                 AND ID_TEMPORADA = '" . $TEMPORADA . "'         
                                                 ORDER BY ID_RECEPCION DESC
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

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA' , DATE_FORMAT(NOW( ), '%H:%i') AS 'HORA'   ;");
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
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_RECEPCION,0)) AS 'NUMERO'
                                            FROM fruta_recepcionmp
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
