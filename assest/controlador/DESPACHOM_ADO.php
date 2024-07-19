<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DESPACHOM.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DESPACHOM_ADO
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
    public function listarDespachom()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_despachom limit 6;	");
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
    public function listarDespachomCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_despachom ;	");
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
    public function verDespachom($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,DATE_FORMAT(FECHA_DESPACHO, '%Y-%m-%d') AS 'FECHA',
                                             DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                             DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                             FROM material_despachom
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
    public function verDespachom2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, FECHA_DESPACHO AS 'FECHA'  
                                                    , DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO'
                                                    , DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'
                                            FROM material_despachom
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

    public function verDespachom3($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA'  
                                                    , DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO'
                                                    , DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                            FROM material_despachom
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
    public function buscarNombreDespachom($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_despachom WHERE OBSERVACIONES LIKE '%" . $NOMBRE . "%';");
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
    public function agregarDespachom(DESPACHOM $DESPACHOM)
    {
        try {
            if ($DESPACHOM->__GET('ID_BODEGA') == NULL) {
                $DESPACHOM->__SET('ID_BODEGA', NULL);
            }
            if ($DESPACHOM->__GET('ID_PLANTA2') == NULL) {
                $DESPACHOM->__SET('ID_PLANTA2', NULL);
            }
            if ($DESPACHOM->__GET('ID_BODEGA2') == NULL) {
                $DESPACHOM->__SET('ID_BODEGA2', NULL);
            }
            if ($DESPACHOM->__GET('ID_PRODUCTOR') == NULL) {
                $DESPACHOM->__SET('ID_PRODUCTOR', NULL);
            }
            if ($DESPACHOM->__GET('ID_PROVEEDOR') == NULL) {
                $DESPACHOM->__SET('ID_PROVEEDOR', NULL);
            }
            if ($DESPACHOM->__GET('ID_PLANTA3') == NULL) {
                $DESPACHOM->__SET('ID_PLANTA3', NULL);
            }
            if ($DESPACHOM->__GET('ID_CLIENTE') == NULL) {
                $DESPACHOM->__SET('ID_CLIENTE', NULL);
            }
            $query =
                "INSERT INTO material_despachom ( 
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
                                                ID_CLIENTE,  

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
               (  ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?, ?,    ?, ?, ?, ?,  ?, ?, ?,   ?, ?, ?, ?, ?,   0,  SYSDATE(),  SYSDATE(), 1, 1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('NUMERO_DESPACHO'),
                        $DESPACHOM->__GET('FECHA_DESPACHO'),
                        $DESPACHOM->__GET('NUMERO_DOCUMENTO'),
                        $DESPACHOM->__GET('PATENTE_CAMION'),
                        $DESPACHOM->__GET('PATENTE_CARRO'),

                        $DESPACHOM->__GET('TDESPACHO'),
                        $DESPACHOM->__GET('OBSERVACIONES'),
                        $DESPACHOM->__GET('REGALO_DESPACHO'),
                        $DESPACHOM->__GET('ID_TDOCUMENTO'),
                        $DESPACHOM->__GET('ID_TRANSPORTE'),
                        $DESPACHOM->__GET('ID_CONDUCTOR'),

                        $DESPACHOM->__GET('ID_BODEGA'),
                        $DESPACHOM->__GET('ID_PLANTA2'),
                        $DESPACHOM->__GET('ID_BODEGA2'),
                        $DESPACHOM->__GET('ID_PRODUCTOR'),

                        $DESPACHOM->__GET('ID_PROVEEDOR'),
                        $DESPACHOM->__GET('ID_PLANTA3'),
                        $DESPACHOM->__GET('ID_CLIENTE'),

                        $DESPACHOM->__GET('ID_EMPRESA'),
                        $DESPACHOM->__GET('ID_PLANTA'),
                        $DESPACHOM->__GET('ID_TEMPORADA'),
                        $DESPACHOM->__GET('ID_USUARIOI'),
                        $DESPACHOM->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDespachom($id)
    {
        try {
            $sql = "DELETE FROM material_despachom WHERE ID_DESPACHO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachom(DESPACHOM $DESPACHOM)
    {
        try {
            if ($DESPACHOM->__GET('ID_BODEGA') == NULL) {
                $DESPACHOM->__SET('ID_BODEGA', NULL);
            }
            if ($DESPACHOM->__GET('ID_PLANTA2') == NULL) {
                $DESPACHOM->__SET('ID_PLANTA2', NULL);
            }
            if ($DESPACHOM->__GET('ID_BODEGA2') == NULL) {
                $DESPACHOM->__SET('ID_BODEGA2', NULL);
            }
            if ($DESPACHOM->__GET('ID_PRODUCTOR') == NULL) {
                $DESPACHOM->__SET('ID_PRODUCTOR', NULL);
            }
            if ($DESPACHOM->__GET('ID_PROVEEDOR') == NULL) {
                $DESPACHOM->__SET('ID_PROVEEDOR', NULL);
            }
            if ($DESPACHOM->__GET('ID_PLANTA3') == NULL) {
                $DESPACHOM->__SET('ID_PLANTA3', NULL);
            }
            if ($DESPACHOM->__GET('ID_CLIENTE') == NULL) {
                $DESPACHOM->__SET('ID_CLIENTE', NULL);
            }
            $query = "
                UPDATE material_despachom SET
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
                        ID_CLIENTE = ?,

                        ID_USUARIOM = ? 
                WHERE ID_DESPACHO= ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('CANTIDAD_DESPACHO'),
                        $DESPACHOM->__GET('FECHA_DESPACHO'),
                        $DESPACHOM->__GET('NUMERO_DOCUMENTO'),
                        $DESPACHOM->__GET('PATENTE_CAMION'),
                        $DESPACHOM->__GET('PATENTE_CARRO'),

                        $DESPACHOM->__GET('TDESPACHO'),
                        $DESPACHOM->__GET('OBSERVACIONES'),
                        $DESPACHOM->__GET('REGALO_DESPACHO'),
                        $DESPACHOM->__GET('ID_TDOCUMENTO'),
                        $DESPACHOM->__GET('ID_TRANSPORTE'),
                        $DESPACHOM->__GET('ID_CONDUCTOR'),

                        $DESPACHOM->__GET('ID_BODEGA'),
                        $DESPACHOM->__GET('ID_PLANTA2'),
                        $DESPACHOM->__GET('ID_BODEGA2'),
                        $DESPACHOM->__GET('ID_PRODUCTOR'),

                        $DESPACHOM->__GET('ID_PROVEEDOR'),
                        $DESPACHOM->__GET('ID_PLANTA3'),
                        $DESPACHOM->__GET('ID_CLIENTE'),

                        $DESPACHOM->__GET('ID_USUARIOM'),
                        $DESPACHOM->__GET('ID_DESPACHO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //VISUALIZAR




    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DESPACHOM $DESPACHOM)
    {

        try {
            $query = "
                UPDATE material_despachom SET		
                        MODIFICACION = SYSDATE(),	
                        ESTADO_REGISTRO = 0
                WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DESPACHOM $DESPACHOM)
    {
        try {
            $query = "
                UPDATE material_despachom SET		
                        MODIFICACION = SYSDATE(),	
                        ESTADO_REGISTRO = 1
                WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DESPACHOM $DESPACHOM)
    {
        try {
            $query = "
                    UPDATE material_despachom SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO = 1
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DESPACHOM $DESPACHOM)
    {
        try {
            $query = "
                    UPDATE material_despachom SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO = 0
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('ID_DESPACHO')
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

    public function  porConfirmar(DESPACHOM $DESPACHOM)
    {
        try {
            $query = "
                    UPDATE material_despachom SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO_DESPACHO = 1
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function  Confirmado(DESPACHOM $DESPACHOM)
    {
        try {
            $query = "
                    UPDATE material_despachom SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO_DESPACHO = 2
                    WHERE ID_DESPACHO = ? AND ESTADO_DESPACHO !=4  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function  Rechazado(DESPACHOM $DESPACHOM)
    {
        try {
            $query = "
                    UPDATE material_despachom SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO_DESPACHO = 3
                    WHERE ID_DESPACHO= ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function  Aprobado(DESPACHOM $DESPACHOM)
    {
        try {
            $query = "
                    UPDATE material_despachom SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO_DESPACHO = 4
                    WHERE ID_DESPACHO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOM->__GET('ID_DESPACHO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAR
    public function listarDespachomCerradoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        FECHA_DESPACHO AS 'FECHA',  
                                                        WEEK(FECHA_DESPACHO,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION', 
                                                        IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachom                                                                           
                                        WHERE ESTADO_REGISTRO = 1 
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
    public function listarDespachomEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        FECHA_DESPACHO AS 'FECHA',  
                                                        WEEK(FECHA_DESPACHO,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION', 
                                                        IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachom                                                                           
                                        WHERE ESTADO_REGISTRO = 1 
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
    public function listarDespachomEmpresaTemporadaCBX($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                IFNULL(CANTIDAD_DESPACHO,0) AS 'CANTIDAD'
                                        FROM material_despachom                                                                           
                                        WHERE ESTADO_REGISTRO = 1 
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
    public function listarDespachomEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                FORMAT(IFNULL(CANTIDAD_DESPACHO,0),0,'de_DE')  AS 'CANTIDAD'
                                        FROM material_despachom                                                                           
                                        WHERE ESTADO_REGISTRO = 1 
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
    public function listarDespachomEmpresaPlantaTemporadaInterplantaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        FECHA_DESPACHO AS 'FECHA',  
                                                        WEEK(FECHA_DESPACHO,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION', 
                                                        IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachom                                                                           
                                        WHERE ESTADO_REGISTRO = 1 
                                        AND ESTADO_DESPACHO = 4
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
    public function listarDespachomEmpresaTemporadaInterplantaCBX($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachom                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ESTADO_DESPACHO = 4
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
    public function listarDespachomEmpresaPlantaTemporadaInterplantaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                FORMAT(IFNULL(CANTIDAD_DESPACHO,0),0,'de_DE')  AS 'CANTIDAD'
                                        FROM material_despachom                                                                           
                                        WHERE  ESTADO_REGISTRO = 1 
                                        AND ESTADO_DESPACHO = 4
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
    public function listarDespachomEmpresaPlantaTemporadaGuiaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                        FECHA_DESPACHO AS 'FECHA',  
                                                        WEEK(FECHA_DESPACHO,3) AS 'SEMANA',                                                     
                                                        WEEKOFYEAR(FECHA_DESPACHO) AS 'SEMANAISO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION', 
                                                        IFNULL(CANTIDAD_DESPACHO,0)  AS 'CANTIDAD'
                                        FROM material_despachom                                                                           
                                        WHERE   ESTADO_REGISTRO = 1 
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


    public function listarDespachomEmpresaPlantaTemporadaGuiaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION', 
                                                FORMAT(IFNULL(CANTIDAD_DESPACHO,0),0,'de_DE')  AS 'CANTIDAD'
                                        FROM material_despachom                                                                           
                                        WHERE   ESTADO_REGISTRO = 1 
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

    public function buscarDespachomPorProductorGuiaEmpresaPlantaTemporada($NUMEROGUIA, $PRODUCTOR, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM material_despachom
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
    public function obtenerTotalesDespachomCBX2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachom 
                                                                                                             
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
    public function obtenerTotalesDespachomEmpresaTemporadaCBX2($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachom 
                                                                                                             
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
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

    public function obtenerTotalesDespachomEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachom 
                                                                                                             
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
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
    public function obtenerTotalesDespachomEmpresaTemporadaInterplantaCBX2($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachom 
                                                                                                             
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
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

    public function obtenerTotalesDespachomEmpresaPlantaTemporadaInterplantaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD'  
                                        FROM material_despachom 
                                                                                                             
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
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
    public function obtenerTotalesDespachomEmpresaPlantaTemporadaGuiaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                    FORMAT(IFNULL(SUM(CANTIDAD_DESPACHO),0),0,'de_DE') AS 'CANTIDAD' 
                                        FROM material_despachom                                                                                                              
                                        WHERE   TDESPACHO = 2
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
                                        FROM material_despachom
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
                                            FROM material_despachom
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
