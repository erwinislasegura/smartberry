<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DESPACHOIND.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DESPACHOIND_ADO
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
    public function listarDespachomp()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_despachoind limit 6;	");
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
    public function listarDespachompCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_despachoind ;	");
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
    public function verDespachomp($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,DATE_FORMAT(FECHA_DESPACHO, '%Y-%m-%d') AS 'FECHA',
                                             DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                             DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                             FROM fruta_despachoind
                                             WHERE ID_DESPACHO= '" . $ID . "';");
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
    public function verDespachomp2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FECHA_DESPACHO AS 'FECHA'  
                                                    , DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO'
                                                    , DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'
                                            FROM fruta_despachoind
                                            WHERE ID_DESPACHO= '" . $ID . "';");
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

    public function verDespachomp3($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                            FROM fruta_despachoind
                                            WHERE ID_DESPACHO= '" . $ID . "';");
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
    public function buscarNombreDespachomp($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_despachoind WHERE OBSERVACION_DESPACHO LIKE '%" . $NOMBRE . "%';");
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
    public function agregarDespachomp(DESPACHOIND $DESPACHOIND)
    {
        try {
            if ($DESPACHOIND->__GET('ID_PLANTA2') == NULL) {
                $DESPACHOIND->__SET('ID_PLANTA2', NULL);
            }
            if ($DESPACHOIND->__GET('ID_PLANTA3') == NULL) {
                $DESPACHOIND->__SET('ID_PLANTA3', NULL);
            }
            if ($DESPACHOIND->__GET('ID_PRODUCTOR') == NULL) {
                $DESPACHOIND->__SET('ID_PRODUCTOR', NULL);
            }
            if ($DESPACHOIND->__GET('ID_COMPRADOR') == NULL) {
                $DESPACHOIND->__SET('ID_COMPRADOR', NULL);
            }
            $query =
                "INSERT INTO fruta_despachoind ( 
                                                NUMERO_DESPACHO, 
                                                FECHA_DESPACHO, 
                                                NUMERO_GUIA_DESPACHO, 

                                                PATENTE_CAMION,
                                                PATENTE_CARRO,
                                                REGALO_DESPACHO,
                                                TDESPACHO, 
                                                OBSERVACION_DESPACHO, 
                                                ID_PLANTA2, 

                                                ID_PLANTA3, 
                                                ID_PRODUCTOR, 
                                                ID_COMPRADOR, 
                                                ID_CONDUCTOR, 
                                                ID_TRANSPORTE,  

                                                ID_EMPRESA, 
                                                ID_PLANTA, 
                                                ID_TEMPORADA, 
                                                ID_USUARIOI, 
                                                ID_USUARIOM, 

                                                KILOS_NETO_DESPACHO,
                                                TOTAL_PRECIO,   
                                                INGRESO, 
                                                MODIFICACION, 
                                                ESTADO, 
                                                ESTADO_DESPACHO,  
                                                ESTADO_REGISTRO,
                                                CANTIDADENVASE1,
                                                CANTIDADENVASE2,
                                                CANTIDADENVASE3,
                                                CANTIDADENVASE4,
                                                CANTIDADENVASE5,
                                                CANTIDADENVASE6,
                                                CANTIDADENVASE7
                                            )
             VALUES
               ( ?, ?, ?,  ?, ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,    0, 0,  SYSDATE(),  SYSDATE(), 1, 1, 1, ?, ?, ?, ?, ?, ?, ?);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('NUMERO_DESPACHO'),
                        $DESPACHOIND->__GET('FECHA_DESPACHO'),
                        $DESPACHOIND->__GET('NUMERO_GUIA_DESPACHO'),

                        $DESPACHOIND->__GET('PATENTE_CAMION'),
                        $DESPACHOIND->__GET('PATENTE_CARRO'),
                        $DESPACHOIND->__GET('REGALO_DESPACHO'),
                        $DESPACHOIND->__GET('TDESPACHO'),
                        $DESPACHOIND->__GET('OBSERVACION_DESPACHO'),
                        $DESPACHOIND->__GET('ID_PLANTA2'),

                        $DESPACHOIND->__GET('ID_PLANTA3'),
                        $DESPACHOIND->__GET('ID_PRODUCTOR'),
                        $DESPACHOIND->__GET('ID_COMPRADOR'),
                        $DESPACHOIND->__GET('ID_CONDUCTOR'),
                        $DESPACHOIND->__GET('ID_TRANSPORTE'),

                        $DESPACHOIND->__GET('ID_EMPRESA'),
                        $DESPACHOIND->__GET('ID_PLANTA'),
                        $DESPACHOIND->__GET('ID_TEMPORADA'),
                        $DESPACHOIND->__GET('ID_USUARIOI'),
                        $DESPACHOIND->__GET('ID_USUARIOM'),

                        $DESPACHOIND->__GET('CANTIDADENVASE1'),
                        $DESPACHOIND->__GET('CANTIDADENVASE2'),
                        $DESPACHOIND->__GET('CANTIDADENVASE3'),
                        $DESPACHOIND->__GET('CANTIDADENVASE4'),
                        $DESPACHOIND->__GET('CANTIDADENVASE5'),
                        $DESPACHOIND->__GET('CANTIDADENVASE6'),
                        $DESPACHOIND->__GET('CANTIDADENVASE7')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDespachomp($id)
    {
        try {
            $sql = "DELETE FROM fruta_despachoind WHERE ID_DESPACHO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachomp(DESPACHOIND $DESPACHOIND)
    {
        try {
            if ($DESPACHOIND->__GET('ID_PLANTA2') == NULL) {
                $DESPACHOIND->__SET('ID_PLANTA2', NULL);
            }
            if ($DESPACHOIND->__GET('ID_PLANTA3') == NULL) {
                $DESPACHOIND->__SET('ID_PLANTA3', NULL);
            }
            if ($DESPACHOIND->__GET('ID_PRODUCTOR') == NULL) {
                $DESPACHOIND->__SET('ID_PRODUCTOR', NULL);
            }
            if ($DESPACHOIND->__GET('ID_COMPRADOR') == NULL) {
                $DESPACHOIND->__SET('ID_COMPRADOR', NULL);
            }
            $query = "
                UPDATE fruta_despachoind SET
                        MODIFICACION = SYSDATE(),
                        FECHA_DESPACHO = ?,
                        NUMERO_GUIA_DESPACHO = ?,
                        KILOS_NETO_DESPACHO = ?, 
                        TOTAL_PRECIO = ?,           
                        PATENTE_CAMION = ?,
                        PATENTE_CARRO = ?,
                        TDESPACHO = ?,
                        OBSERVACION_DESPACHO = ?,
                        ID_PLANTA2 = ?,
                        ID_PLANTA3 = ?,
                        ID_PRODUCTOR = ?,
                        ID_COMPRADOR = ?,
                        ID_CONDUCTOR = ?,
                        ID_TRANSPORTE = ?, 
                        ID_USUARIOM = ?,
                        CANTIDADENVASE1 = ?,
                        CANTIDADENVASE2 = ?,
                        CANTIDADENVASE3 = ?,
                        CANTIDADENVASE4 = ?,
                        CANTIDADENVASE5 = ?,
                        CANTIDADENVASE6 = ?,
                        CANTIDADENVASE7 = ?
                WHERE ID_DESPACHO= ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('FECHA_DESPACHO'),
                        $DESPACHOIND->__GET('NUMERO_GUIA_DESPACHO'),
                        $DESPACHOIND->__GET('KILOS_NETO_DESPACHO'),
                        $DESPACHOIND->__GET('TOTAL_PRECIO'),
                        $DESPACHOIND->__GET('PATENTE_CAMION'),
                        $DESPACHOIND->__GET('PATENTE_CARRO'),
                        $DESPACHOIND->__GET('TDESPACHO'),
                        $DESPACHOIND->__GET('OBSERVACION_DESPACHO'),
                        $DESPACHOIND->__GET('ID_PLANTA2'),
                        $DESPACHOIND->__GET('ID_PLANTA3'),
                        $DESPACHOIND->__GET('ID_PRODUCTOR'),
                        $DESPACHOIND->__GET('ID_COMPRADOR'),
                        $DESPACHOIND->__GET('ID_CONDUCTOR'),
                        $DESPACHOIND->__GET('ID_TRANSPORTE'),
                        $DESPACHOIND->__GET('ID_USUARIOM'),
                        $DESPACHOIND->__GET('CANTIDADENVASE1'),
                        $DESPACHOIND->__GET('CANTIDADENVASE2'),
                        $DESPACHOIND->__GET('CANTIDADENVASE3'),
                        $DESPACHOIND->__GET('CANTIDADENVASE4'),
                        $DESPACHOIND->__GET('CANTIDADENVASE5'),
                        $DESPACHOIND->__GET('CANTIDADENVASE6'),
                        $DESPACHOIND->__GET('CANTIDADENVASE7'),
                        $DESPACHOIND->__GET('ID_DESPACHO')
                        

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //VISUALIZAR




    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DESPACHOIND $DESPACHOIND)
    {

        try {
            $query = "
    UPDATE fruta_despachoind SET			
            ESTADO_REGISTRO = 0
    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DESPACHOIND $DESPACHOIND)
    {
        try {
            $query = "
    UPDATE fruta_despachoind SET			
            ESTADO_REGISTRO = 1
    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DESPACHOIND $DESPACHOIND)
    {
        try {
            $query = "
                    UPDATE fruta_despachoind SET			
                            ESTADO = 1
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DESPACHOIND $DESPACHOIND)
    {
        try {
            $query = "
                    UPDATE fruta_despachoind SET			
                            ESTADO = 0
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIAR ESTADO DESPACHO
    /**
     * 1=Por Confirmar
     * 2=Confirmado
     * 3=Rechazado
     * 4=Aprobado
     */

    public function  porConfirmar(DESPACHOIND $DESPACHOIND)
    {
        try {
            $query = "
                    UPDATE fruta_despachoind SET			
                            ESTADO_DESPACHO = 1
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function  Confirmado(DESPACHOIND $DESPACHOIND)
    {
        try {
            $query = "
                    UPDATE fruta_despachoind SET			
                            ESTADO_DESPACHO = 2
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function  Rechazado(DESPACHOIND $DESPACHOIND)
    {
        try {
            $query = "
                    UPDATE fruta_despachoind SET			
                            ESTADO_DESPACHO = 3
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function  Aprobado(DESPACHOIND $DESPACHOIND)
    {
        try {
            $query = "
                    UPDATE fruta_despachoind SET			
                            ESTADO_DESPACHO = 4
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOIND->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR
    public function listarDespachompTemporadaCBX(  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    FECHA_DESPACHO AS 'FECHA',  
                                                    WEEK(FECHA_DESPACHO,3) AS 'SEMANA',
                                                    WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',    
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                    IFNULL(KILOS_NETO_DESPACHO,0)  AS 'NETO'
                                        FROM fruta_despachoind                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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

    public function listarDespachompTemporadaCBXEst(  $TEMPORADA, $ESPECIE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    FDESIND.FECHA_DESPACHO AS 'FECHA',  
                                                    WEEK(FDESIND.FECHA_DESPACHO,3) AS 'SEMANA',
                                                    WEEKOFYEAR(FDESIND.FECHA_DESPACHO) AS 'SEMANAISO',    
                                                    DATE_FORMAT(FDESIND.INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(FDESIND.MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                    IFNULL(KILOS_NETO_DESPACHO,0)  AS 'NETO'
                                        FROM fruta_despachoind FDESIND
																						LEFT JOIN fruta_exiindustrial FEXIND ON FDESIND.ID_DESPACHO = FEXIND.ID_DESPACHO
                                            LEFT JOIN fruta_vespecies VES ON FEXIND.ID_VESPECIES = VES.ID_VESPECIES                                                                         
                                        WHERE  FDESIND.ESTADO_REGISTRO = 1 
                                        AND FDESIND.ID_TEMPORADA = '" . $TEMPORADA . "' AND VES.ID_ESPECIES = '" . $ESPECIE . "';	");
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

    public function listarDespachompEmpresaTemporadaCBX($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    FECHA_DESPACHO AS 'FECHA',  
                                                    WEEK(FECHA_DESPACHO,3) AS 'SEMANA',
                                                    WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',    
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                    IFNULL(KILOS_NETO_DESPACHO,0)  AS 'NETO'
                                        FROM fruta_despachoind                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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
    public function listarDespachompCerradoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    FECHA_DESPACHO AS 'FECHA',
                                                    WEEK(FECHA_DESPACHO,3) AS 'SEMANA',
                                                    WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',  
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                    IFNULL(KILOS_NETO_DESPACHO,0)  AS 'NETO'
                                        FROM fruta_despachoind                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ESTADO = 0
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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
    public function listarDespachompEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    FECHA_DESPACHO AS 'FECHA',
                                                    WEEK(FECHA_DESPACHO,3) AS 'SEMANA',
                                                    WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',  
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                    IFNULL(KILOS_NETO_DESPACHO,0)  AS 'NETO'
                                        FROM fruta_despachoind                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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
    public function listarDespachompEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                FORMAT(IFNULL(KILOS_NETO_DESPACHO,0),2,'de_DE')  AS 'NETO'
                                        FROM fruta_despachoind                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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
    public function listarDespachompEmpresaPlantaTemporadaInterplantaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    FECHA_DESPACHO AS 'FECHA',  
                                                
                                                    WEEK(FECHA_DESPACHO,3) AS 'SEMANA',
                                                    WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',  
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION', 
                                                IFNULL(KILOS_NETO_DESPACHO,0) AS 'NETO'
                                        FROM fruta_despachoind                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA2 = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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
    public function listarDespachompEmpresaPlantaTemporadaInterplantaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                FORMAT(KILOS_NETO_DESPACHO,2,'de_DE')  AS 'NETO'
                                        FROM fruta_despachoind                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA2 = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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

    public function listarDespachompEmpresaPlantaTemporadaGuiaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    FECHA_DESPACHO AS 'FECHA',  
                                                    WEEK(FECHA_DESPACHO,3) AS 'SEMANA',
                                                    WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',  
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION', 
                                                    IFNULL(KILOS_NETO_DESPACHO,0)  AS 'NETO'
                                        FROM fruta_despachoind                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                                AND   TDESPACHO = 1
                                                AND ESTADO_DESPACHO = 2
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA2 = '" . $PLANTA . "'
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

    public function listarDespachompEmpresaPlantaTemporadaGuiaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                FORMAT(KILOS_NETO_DESPACHO,2,'de_DE')  AS 'NETO'
                                        FROM fruta_despachoind                                                                           
                                        WHERE   ESTADO_REGISTRO = 1 
                                                AND  TDESPACHO = 1
                                                AND ESTADO_DESPACHO = 2
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA2 = '" . $PLANTA . "'
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


    //BUSCAR

    public function buscarDespachompPorProductorGuiaEmpresaPlantaTemporada($NUMEROGUIA, $PRODUCTOR, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM fruta_despachoind
                                                WHERE  ESTADO_REGISTRO = 1 
                                                    AND   NUMERO_SELLO_DESPACHO = " . $NUMEROGUIA . "
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



    //TOTALES
    public function obtenerTotalesDespachompCBX2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT   
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_DESPACHO),0),2,'de_DE') AS 'NETO' , 
                                                    FORMAT(IFNULL(SUM(TOTAL_PRECIO),0),2,'de_DE') AS 'PRECIO'  
                                        FROM fruta_despachoind 
                                                                                                             
                                        WHERE ID_DESPACHO = '" . $IDDESPACHO . "' 
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
    public function obtenerTotalesDespachompEmpresaTemporadaCBX2($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_DESPACHO),0),2,'de_DE') AS 'NETO' , 
                                                    FORMAT(IFNULL(SUM(TOTAL_PRECIO),0),2,'de_DE') AS 'PRECIO'  
                                        FROM fruta_despachoind 
                                                                                                             
                                        WHERE   ESTADO_REGISTRO = 1 
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
    public function obtenerTotalesDespachompEmpresaTemporadaCBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    IFNULL(SUM(KILOS_NETO_DESPACHO),0) AS 'NETO'  , 
                                                    IFNULL(SUM(TOTAL_PRECIO),0) AS 'PRECIO'   
                                        FROM fruta_despachoind 
                                                                                                             
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
    public function obtenerTotalesDespachompEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    IFNULL(SUM(KILOS_NETO_DESPACHO),0) AS 'NETO'  , 
                                                    IFNULL(SUM(TOTAL_PRECIO),0) AS 'PRECIO'   
                                        FROM fruta_despachoind 
                                                                                                             
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
    public function obtenerTotalesDespachompEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_DESPACHO),0),2,'de_DE') AS 'NETO'  , 
                                                    FORMAT(IFNULL(SUM(TOTAL_PRECIO),0),2,'de_DE') AS 'PRECIO'   
                                        FROM fruta_despachoind 
                                                                                                             
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

    public function obtenerTotalesDespachompEmpresaPlantaTemporadaInterplantaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_DESPACHO),0),2,'de_DE') AS 'NETO'   , 
                                                    FORMAT(IFNULL(SUM(TOTAL_PRECIO),0),2,'de_DE') AS 'PRECIO'  
                                        FROM fruta_despachoind 
                                                                                                             
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA2 = '" . $PLANTA . "'
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
    public function obtenerTotalesDespachompEmpresaPlantaTemporadaGuiaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_DESPACHO),0),2,'de_DE') AS 'NETO' , 
                                                    FORMAT(IFNULL(SUM(TOTAL_PRECIO),0),2,'de_DE') AS 'PRECIO'  
                                        FROM fruta_despachoind                                                                                                              
                                        WHERE  ESTADO_REGISTRO = 1 
                                                AND   TDESPACHO = 1
                                                AND ESTADO_DESPACHO = 2
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA2 = '" . $PLANTA . "'
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


    //OTRAS FUNCIONALIDADES

    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHADESPACHOMP, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                        FROM fruta_despachoind
                                        WHERE 
                                             FECHA_DESPACHO LIKE '" . $FECHADESPACHOMP . "'
                                             AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                             AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')   
                                             AND ID_EMPRESA = '" . $EMPRESA . "'                                      
                                             AND ID_PLANTA = '" . $PLANTA . "'                                      
                                             AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                             ORDER BY ID_DESPACHO DESC
                                            
                                             ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            // var_dump($resultado);


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
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_DESPACHO,0)) AS 'NUMERO'
                                            FROM fruta_despachoind
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
