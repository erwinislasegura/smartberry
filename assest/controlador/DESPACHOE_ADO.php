<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DESPACHOE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DESPACHOE_ADO 
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
    public function listarDespachoe()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_despachoe limit 6;	");
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
    public function listarDespachoeCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_despachoe ;	");
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
    public function verDespachoe($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,DATE_FORMAT(FECHA_DESPACHO, '%Y-%m-%d') AS 'FECHA',
                                             DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                             DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                             FROM material_despachoe
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
    public function verDespachoe3($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA'  
                                                    , DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO'
                                                    , DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                            FROM material_despachoe
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


    public function verDespachoe2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FECHA_DESPACHO AS 'FECHA'   
                                                    , DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO'
                                                    , DATE_FORMAT(MODIFICACION, '%y-%m-%d') AS 'MODIFICACION'
                                            FROM material_despachoe
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
    public function buscarNombreDespachoe($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_despachoe WHERE OBSERVACIONES LIKE '%" . $NOMBRE . "%';");
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
    public function agregarDespachoe(DESPACHOE $DESPACHOE)
    {
        try {
            if ($DESPACHOE->__GET('ID_BODEGA') == NULL) {
                $DESPACHOE->__SET('ID_BODEGA', NULL);
            }
            if ($DESPACHOE->__GET('ID_PLANTA2') == NULL) {
                $DESPACHOE->__SET('ID_PLANTA2', NULL);
            }
            if ($DESPACHOE->__GET('ID_BODEGA2') == NULL) {
                $DESPACHOE->__SET('ID_BODEGA2', NULL);
            }
            if ($DESPACHOE->__GET('ID_PRODUCTOR') == NULL) {
                $DESPACHOE->__SET('ID_PRODUCTOR', NULL);
            }
            if ($DESPACHOE->__GET('ID_PROVEEDOR') == NULL) {
                $DESPACHOE->__SET('ID_PROVEEDOR', NULL);
            }
            if ($DESPACHOE->__GET('ID_PLANTA3') == NULL) {
                $DESPACHOE->__SET('ID_PLANTA3', NULL);
            }
            if ($DESPACHOE->__GET('ID_COMPRADOR') == NULL) {
                $DESPACHOE->__SET('ID_COMPRADOR', NULL);
            }
            $query =
                "INSERT INTO material_despachoe ( 
                                                NUMERO_DESPACHO, 
                                                FECHA_DESPACHO, 
                                                NUMERO_DOCUMENTO, 
                                                PATENTE_CAMION,
                                                PATENTE_CARRO,

                                                TDESPACHO, 
                                                OBSERVACIONES,
                                                REGALO_DESPACHO,
                                                ID_TDOCUMENTO, 
                                                ID_TRANSPORTE, 
                                                ID_CONDUCTOR, 

                                                ID_BODEGA, 
                                                ID_PLANTA2, 
                                                ID_BODEGA2, 
                                                ID_PRODUCTOR,  

                                                ID_PROVEEDOR, 
                                                ID_PLANTA3,  
                                                ID_COMPRADOR,  
                                                ID_DESPACHOMP,  
                                                ID_BODEGAO,  

                                                ID_EMPRESA, 
                                                ID_PLANTA, 
                                                ID_TEMPORADA, 
                                                ID_USUARIOI, 
                                                ID_USUARIOM, 

                                                CANTIDAD_DESPACHO,   
                                                INGRESO, 
                                                MODIFICACION, 
                                                ESTADO, 
                                                ESTADO_DESPACHO,  
                                                ESTADO_REGISTRO
                                            )
             VALUES
               (  ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?, ?,    ?, ?, ?, ?,  ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   0,  SYSDATE(),  SYSDATE(), 1, 1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('NUMERO_DESPACHO'),
                        $DESPACHOE->__GET('FECHA_DESPACHO'),
                        $DESPACHOE->__GET('NUMERO_DOCUMENTO'),
                        $DESPACHOE->__GET('PATENTE_CAMION'),
                        $DESPACHOE->__GET('PATENTE_CARRO'),

                        $DESPACHOE->__GET('TDESPACHO'),
                        $DESPACHOE->__GET('OBSERVACIONES'),
                        $DESPACHOE->__GET('REGALO_DESPACHO'),
                        $DESPACHOE->__GET('ID_TDOCUMENTO'),
                        $DESPACHOE->__GET('ID_TRANSPORTE'),
                        $DESPACHOE->__GET('ID_CONDUCTOR'),

                        $DESPACHOE->__GET('ID_BODEGA'),
                        $DESPACHOE->__GET('ID_PLANTA2'),
                        $DESPACHOE->__GET('ID_BODEGA2'),
                        $DESPACHOE->__GET('ID_PRODUCTOR'),

                        $DESPACHOE->__GET('ID_PROVEEDOR'),
                        $DESPACHOE->__GET('ID_PLANTA3'),
                        $DESPACHOE->__GET('ID_COMPRADOR'),
                        $DESPACHOE->__GET('ID_DESPACHOMP'),
                        $DESPACHOE->__GET('ID_BODEGAO'),

                        $DESPACHOE->__GET('ID_EMPRESA'),
                        $DESPACHOE->__GET('ID_PLANTA'),
                        $DESPACHOE->__GET('ID_TEMPORADA'),
                        $DESPACHOE->__GET('ID_USUARIOI'),
                        $DESPACHOE->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
   
    public function agregarDespachoeMp(DESPACHOE $DESPACHOE)
    {
        try {
            if ($DESPACHOE->__GET('ID_BODEGA') == NULL) {
                $DESPACHOE->__SET('ID_BODEGA', NULL);
            }
            if ($DESPACHOE->__GET('ID_PLANTA2') == NULL) {
                $DESPACHOE->__SET('ID_PLANTA2', NULL);
            }
            if ($DESPACHOE->__GET('ID_BODEGA2') == NULL) {
                $DESPACHOE->__SET('ID_BODEGA2', NULL);
            }
            if ($DESPACHOE->__GET('ID_PRODUCTOR') == NULL) {
                $DESPACHOE->__SET('ID_PRODUCTOR', NULL);
            }
            if ($DESPACHOE->__GET('ID_PROVEEDOR') == NULL) {
                $DESPACHOE->__SET('ID_PROVEEDOR', NULL);
            }
            if ($DESPACHOE->__GET('ID_PLANTA3') == NULL) {
                $DESPACHOE->__SET('ID_PLANTA3', NULL);
            }
            if ($DESPACHOE->__GET('ID_COMPRADOR') == NULL) {
                $DESPACHOE->__SET('ID_COMPRADOR', NULL);
            }
            $query =
                "INSERT INTO material_despachoe ( 
                                                NUMERO_DESPACHO, 
                                                FECHA_DESPACHO, 
                                                NUMERO_DOCUMENTO, 
                                                PATENTE_CAMION,
                                                PATENTE_CARRO,

                                                TDESPACHO, 
                                                OBSERVACIONES,
                                                REGALO_DESPACHO,
                                                ID_TDOCUMENTO, 
                                                ID_TRANSPORTE, 
                                                ID_CONDUCTOR, 

                                                ID_BODEGA, 
                                                ID_PLANTA2, 
                                                ID_BODEGA2, 
                                                ID_PRODUCTOR,  

                                                ID_PROVEEDOR, 
                                                ID_PLANTA3,  
                                                ID_COMPRADOR,  
                                                ID_DESPACHOMP,  
                                                ID_BODEGAO,  

                                                ID_EMPRESA, 
                                                ID_PLANTA, 
                                                ID_TEMPORADA, 
                                                ID_USUARIOI, 
                                                ID_USUARIOM, 

                                                CANTIDAD_DESPACHO,   
                                                INGRESO, 
                                                MODIFICACION, 
                                                ESTADO, 
                                                ESTADO_DESPACHO,  
                                                ESTADO_REGISTRO
                                            )
             VALUES
               (  ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?, ?,    ?, ?, ?, ?,  ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   0,  SYSDATE(),  SYSDATE(), 0, 1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('NUMERO_DESPACHO'),
                        $DESPACHOE->__GET('FECHA_DESPACHO'),
                        $DESPACHOE->__GET('NUMERO_DOCUMENTO'),
                        $DESPACHOE->__GET('PATENTE_CAMION'),
                        $DESPACHOE->__GET('PATENTE_CARRO'),

                        $DESPACHOE->__GET('TDESPACHO'),
                        $DESPACHOE->__GET('OBSERVACIONES'),
                        $DESPACHOE->__GET('REGALO_DESPACHO'),
                        $DESPACHOE->__GET('ID_TDOCUMENTO'),
                        $DESPACHOE->__GET('ID_TRANSPORTE'),
                        $DESPACHOE->__GET('ID_CONDUCTOR'),

                        $DESPACHOE->__GET('ID_BODEGA'),
                        $DESPACHOE->__GET('ID_PLANTA2'),
                        $DESPACHOE->__GET('ID_BODEGA2'),
                        $DESPACHOE->__GET('ID_PRODUCTOR'),

                        $DESPACHOE->__GET('ID_PROVEEDOR'),
                        $DESPACHOE->__GET('ID_PLANTA3'),
                        $DESPACHOE->__GET('ID_COMPRADOR'),
                        $DESPACHOE->__GET('ID_DESPACHOMP'),
                        $DESPACHOE->__GET('ID_BODEGAO'),

                        $DESPACHOE->__GET('ID_EMPRESA'),
                        $DESPACHOE->__GET('ID_PLANTA'),
                        $DESPACHOE->__GET('ID_TEMPORADA'),
                        $DESPACHOE->__GET('ID_USUARIOI'),
                        $DESPACHOE->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDespachoe($id)
    {
        try {
            $sql = "DELETE FROM material_despachoe WHERE ID_DESPACHO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachoe(DESPACHOE $DESPACHOE)
    {
        try {
            if ($DESPACHOE->__GET('ID_BODEGA') == NULL) {
                $DESPACHOE->__SET('ID_BODEGA', NULL);
            }
            if ($DESPACHOE->__GET('ID_PLANTA2') == NULL) {
                $DESPACHOE->__SET('ID_PLANTA2', NULL);
            }
            if ($DESPACHOE->__GET('ID_BODEGA2') == NULL) {
                $DESPACHOE->__SET('ID_BODEGA2', NULL);
            }
            if ($DESPACHOE->__GET('ID_PRODUCTOR') == NULL) {
                $DESPACHOE->__SET('ID_PRODUCTOR', NULL);
            }
            if ($DESPACHOE->__GET('ID_PROVEEDOR') == NULL) {
                $DESPACHOE->__SET('ID_PROVEEDOR', NULL);
            }
            if ($DESPACHOE->__GET('ID_PLANTA3') == NULL) {
                $DESPACHOE->__SET('ID_PLANTA3', NULL);
            }
            if ($DESPACHOE->__GET('ID_COMPRADOR') == NULL) {
                $DESPACHOE->__SET('ID_COMPRADOR', NULL);
            }
            $query = "
                UPDATE material_despachoe SET
                        MODIFICACION = SYSDATE(),

                        CANTIDAD_DESPACHO = ?,
                        FECHA_DESPACHO = ?,
                        NUMERO_DOCUMENTO = ?,        
                        PATENTE_CAMION = ?,
                        PATENTE_CARRO = ?,

                        TDESPACHO = ?, 
                        OBSERVACIONES = ?,   
                        REGALO_DESPACHO = ?,   
                        ID_TDOCUMENTO = ?,
                        ID_TRANSPORTE = ?,
                        ID_CONDUCTOR = ?,

                        ID_BODEGA = ?,
                        ID_PLANTA2 = ?,
                        ID_BODEGA2 = ?,
                        ID_PRODUCTOR = ?, 

                        ID_PROVEEDOR = ?,
                        ID_PLANTA3 = ?,
                        ID_COMPRADOR = ?,
                        ID_DESPACHOMP = ?,
                        ID_BODEGAO = ?,

                        ID_USUARIOM = ? 
                WHERE ID_DESPACHO= ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('CANTIDAD_DESPACHO'),
                        $DESPACHOE->__GET('FECHA_DESPACHO'),
                        $DESPACHOE->__GET('NUMERO_DOCUMENTO'),
                        $DESPACHOE->__GET('PATENTE_CAMION'),
                        $DESPACHOE->__GET('PATENTE_CARRO'),

                        $DESPACHOE->__GET('TDESPACHO'),
                        $DESPACHOE->__GET('OBSERVACIONES'),
                        $DESPACHOE->__GET('REGALO_DESPACHO'),
                        $DESPACHOE->__GET('ID_TDOCUMENTO'),
                        $DESPACHOE->__GET('ID_TRANSPORTE'),
                        $DESPACHOE->__GET('ID_CONDUCTOR'),

                        $DESPACHOE->__GET('ID_BODEGA'),
                        $DESPACHOE->__GET('ID_PLANTA2'),
                        $DESPACHOE->__GET('ID_BODEGA2'),
                        $DESPACHOE->__GET('ID_PRODUCTOR'),

                        $DESPACHOE->__GET('ID_PROVEEDOR'),
                        $DESPACHOE->__GET('ID_PLANTA3'),
                        $DESPACHOE->__GET('ID_COMPRADOR'),
                        $DESPACHOE->__GET('ID_DESPACHOMP'),
                        $DESPACHOE->__GET('ID_BODEGAO'),

                        $DESPACHOE->__GET('ID_USUARIOM'),
                        $DESPACHOE->__GET('ID_DESPACHO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //VISUALIZAR




    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DESPACHOE $DESPACHOE)
    {

        try {
            $query = "
    UPDATE material_despachoe SET			
            ESTADO_REGISTRO = 0
    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DESPACHOE $DESPACHOE)
    {
        try {
            $query = "
    UPDATE material_despachoe SET			
            ESTADO_REGISTRO = 1
    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DESPACHOE $DESPACHOE)
    {
        try {
            $query = "
                    UPDATE material_despachoe SET			
                            ESTADO = 1
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DESPACHOE $DESPACHOE)
    {
        try {
            $query = "
                    UPDATE material_despachoe SET			
                            ESTADO = 0
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function  cerrarActualizarcantidad(DESPACHOE $DESPACHOE)
    {
        try {
            $query = "
                    UPDATE material_despachoe SET			
                            ESTADO = 0,		
                            CANTIDAD_DESPACHO = ?
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('CANTIDAD_DESPACHO'),
                        $DESPACHOE->__GET('ID_DESPACHO')
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

    public function  porConfirmar(DESPACHOE $DESPACHOE)
    {
        try {
            $query = "
                    UPDATE material_despachoe SET			
                            ESTADO_DESPACHO = 1
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function  Confirmado(DESPACHOE $DESPACHOE)
    {
        try {
            $query = "
                    UPDATE material_despachoe SET			
                            ESTADO_DESPACHO = 2 
                    WHERE ID_DESPACHO= ? AND ESTADO_DESPACHO !=4;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function  Rechazado(DESPACHOE $DESPACHOE)
    {
        try {
            $query = "
                    UPDATE material_despachoe SET			
                            ESTADO_DESPACHO = 3
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function  Aprobado(DESPACHOE $DESPACHOE)
    {
        try {
            $query = "
                    UPDATE material_despachoe SET			
                            ESTADO_DESPACHO = 4
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOE->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR
    public function listarDespachoePorDespachoMPCBX($DESPACHOMP)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *
                                            FROM material_despachoe                                                                           
                                            WHERE ESTADO_REGISTRO = 1 
                                            AND ID_DESPACHOMP = '" . $DESPACHOMP . "' ;	");
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
    public function listarDespachoeCerradoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        FECHA_DESPACHO AS 'FECHA',   
                                                        WEEK(FECHA_DESPACHO,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                        IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachoe                                                                           
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
    public function listarDespachoeEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        FECHA_DESPACHO AS 'FECHA',   
                                                        WEEK(FECHA_DESPACHO,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                        IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachoe                                                                           
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
    public function listarDespachoeEmpresaTemporadaCBX($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachoe                                                                           
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
    public function listarDespachoeEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                FORMAT(IFNULL(CANTIDAD_DESPACHO,0),0,'de_DE')  AS 'CANTIDAD'
                                        FROM material_despachoe                                                                           
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
    public function listarDespachoeEmpresaPlantaTemporadaInterplantaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        FECHA_DESPACHO AS 'FECHA',  
                                                        WEEK(FECHA_DESPACHO,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                        IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachoe                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA2 = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'  ;	");
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
    public function listarDespachoeEmpresaTemporadaInterplantaCBX($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachoe                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                        AND TDESPACHO = 2  ;	");
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
    public function listarDespachoeEmpresaPlantaTemporadaInterplantaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                FORMAT(IFNULL(CANTIDAD_DESPACHO,0),0,'de_DE')  AS 'CANTIDAD'
                                        FROM material_despachoe                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA2 = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'  ;	");
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

    public function listarDespachoeEmpresaPlantaTemporadaGuiaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        FECHA_DESPACHO AS 'FECHA',  
                                                        WEEK(FECHA_DESPACHO,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION', 
                                                        IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachoe                                                                           
                                        WHERE    ESTADO_REGISTRO = 1 
                                                AND TDESPACHO = 2
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
    public function listarDespachoeEmpresaPlantaTemporadaGuiaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                FORMAT(IFNULL(CANTIDAD_DESPACHO,0),0,'de_DE')  AS 'CANTIDAD'
                                        FROM material_despachoe                                                                           
                                        WHERE    ESTADO_REGISTRO = 1 
                                                AND TDESPACHO = 2
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

    public function buscarDespachoePorProductorGuiaEmpresaPlantaTemporada($NUMEROGUIA, $PRODUCTOR, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM material_despachoe
                                                WHERE 
                                                    NUMERO_SELLO_DESPACHO = " . $NUMEROGUIA . "
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
    public function obtenerTotalesDespachoeCBX2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachoe 
                                                                                                             
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_DESPACHO = '" . $IDDESPACHO . "' 
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

    public function obtenerTotalesDespachoeEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachoe 
                                                                                                             
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

    public function obtenerTotalesDespachoeEmpresaTemporadaCBX2($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachoe 
                                                                                                             
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND  ID_EMPRESA = '" . $EMPRESA . "' 
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
    public function obtenerTotalesDespachoeEmpresaTemporadaInterplantaCBX2($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachoe 
                                                                                                             
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                        AND TDESPACHO = 2
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
    public function obtenerTotalesDespachoeEmpresaPlantaTemporadaInterplantaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachoe 
                                                                                                             
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
    public function obtenerTotalesDespachoeEmpresaPlantaTemporadaGuiaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD' 
                                        FROM material_despachoe                                                                                                              
                                        WHERE    ESTADO_REGISTRO = 1 
                                                AND TDESPACHO = 2
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
    public function obtenerId($FECHADESPACHOEP, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                        FROM material_despachoe
                                        WHERE 
                                             FECHA_DESPACHO LIKE '" . $FECHADESPACHOEP . "'
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
                                            FROM material_despachoe
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
