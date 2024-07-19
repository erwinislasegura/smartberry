<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/INVENTARIOE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class INVENTARIOE_ADO
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
    public function listarInventario()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_inventarioe limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarInventarioCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_inventarioe WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarInventario2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_inventarioe WHERE ESTADO_REGISTRO = 0;	");
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
    public function verInventario($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_inventarioe WHERE ID_INVENTARIO= '" . $ID . "';");
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

    public function verInventario2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM material_inventarioe 
                                                WHERE ID_INVENTARIO= '" . $ID . "';");
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
    public function agregarInventarioRecepcion(INVENTARIOE $INVENTARIOE)
    {
        try {

            $query =
                "INSERT INTO material_inventarioe (   
                                                        TRECEPCION,
                                                        VALOR_UNITARIO,   
                                                        CANTIDAD_ENTRADA, 
                                                        ID_EMPRESA,
                                                        ID_PLANTA,

                                                        ID_TEMPORADA,
                                                        ID_BODEGA,
                                                        ID_PRODUCTO,
                                                        ID_TUMEDIDA,
                                                        ID_RECEPCION,                                                     

                                                        CANTIDAD_SALIDA,
                                                        INGRESO,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  0,  SYSDATE() , SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('TRECEPCION'),
                        $INVENTARIOE->__GET('VALOR_UNITARIO'),
                        $INVENTARIOE->__GET('CANTIDAD_ENTRADA'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),

                        $INVENTARIOE->__GET('ID_TEMPORADA'),
                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function agregarInventarioRecepcionDocompra(INVENTARIOE $INVENTARIOE)
    {
        try {

            $query =
                "INSERT INTO material_inventarioe (   
                                                        TRECEPCION,
                                                        VALOR_UNITARIO,   
                                                        ID_EMPRESA,
                                                        ID_PLANTA,
                                                        ID_TEMPORADA,

                                                        ID_BODEGA,
                                                        ID_PRODUCTO,
                                                        ID_TUMEDIDA,
                                                        ID_RECEPCION, 
                                                        ID_DOCOMPRA,                                                     

                                                        CANTIDAD_ENTRADA, 
                                                        CANTIDAD_SALIDA,
                                                        INGRESO,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?,?,    ?, ?, ?, ?, ?,   0, 0, SYSDATE() , SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('TRECEPCION'),
                        $INVENTARIOE->__GET('VALOR_UNITARIO'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),
                        $INVENTARIOE->__GET('ID_TEMPORADA'),

                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_RECEPCION'),
                        $INVENTARIOE->__GET('ID_DOCOMPRA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarInventarioDespacho(INVENTARIOE $INVENTARIOE)
    {
        try {

            $query =
                "INSERT INTO material_inventarioe (   
                                                        CANTIDAD_SALIDA, 
                                                        ID_EMPRESA,
                                                        ID_PLANTA,
                                                        ID_TEMPORADA,

                                                        ID_BODEGA,
                                                        ID_PRODUCTO,
                                                        ID_TUMEDIDA,
                                                        ID_DESPACHO,                                                     

                                                        CANTIDAD_ENTRADA,
                                                        INGRESO,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?,   ?, ?, ?, ?,  0,  SYSDATE() , SYSDATE(),  1, 1);";
            //var_dump($query);
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('CANTIDAD_SALIDA'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),
                        $INVENTARIOE->__GET('ID_TEMPORADA'),

                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarInventarioBodega(INVENTARIOE $INVENTARIOE)
    {
        try {

            $query =
                "INSERT INTO material_inventarioe (   
                                                        INGRESO,     
                                                        CANTIDAD_ENTRADA,  
                                                        ID_EMPRESA,
                                                        ID_PLANTA,
                                                        ID_TEMPORADA,

                                                        ID_BODEGA,
                                                        ID_BODEGA2,
                                                        ID_PRODUCTO,
                                                        ID_TUMEDIDA,
                                                        ID_DESPACHO,                                               

                                                        CANTIDAD_SALIDA,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  0,   SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('INGRESO'),
                        $INVENTARIOE->__GET('CANTIDAD_ENTRADA'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),
                        $INVENTARIOE->__GET('ID_TEMPORADA'),

                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_BODEGA2'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_DESPACHO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function agregarInventarioGuia(INVENTARIOE $INVENTARIOE)
    {
        try {

            $query =
                "INSERT INTO material_inventarioe (   
                                                        CANTIDAD_ENTRADA,     
                                                        CANTIDAD_SALIDA,   
                                                        VALOR_UNITARIO,  
                                                        ID_BODEGA,
                                                        ID_PRODUCTO,

                                                        ID_TUMEDIDA,
                                                        ID_PLANTA2,
                                                        ID_DESPACHO2,

                                                        ID_EMPRESA,
                                                        ID_PLANTA, 
                                                        ID_TEMPORADA,                                               

                                                        INGRESO,   
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?,  ?,     ?, ?, ?,   ?, ?, ?,   SYSDATE(),  SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(                      

                        $INVENTARIOE->__GET('CANTIDAD_ENTRADA'),
                        $INVENTARIOE->__GET('CANTIDAD_SALIDA'),
                        $INVENTARIOE->__GET('VALOR_UNITARIO'),
                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),

                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_PLANTA2'),
                        $INVENTARIOE->__GET('ID_DESPACHO2'),

                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),
                        $INVENTARIOE->__GET('ID_TEMPORADA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarInventario($id)
    {
        try {
            $sql = "DELETE FROM material_inventarioe WHERE ID_INVENTARIO=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarInventarioRecepcion(INVENTARIOE $INVENTARIOE)
    {
        try {

            $query = "
                UPDATE material_inventarioe SET
                    MODIFICACION= SYSDATE(),
                    TRECEPCION= ?,
                    VALOR_UNITARIO= ?,
                    CANTIDAD_ENTRADA= ?,
                    ID_EMPRESA= ?,
                    ID_PLANTA= ?,

                    ID_TEMPORADA= ?,
                    ID_BODEGA= ?,
                    ID_PRODUCTO= ?  ,
                    ID_TUMEDIDA= ?  ,
                    ID_RECEPCION= ?  
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('TRECEPCION'),
                        $INVENTARIOE->__GET('VALOR_UNITARIO'),
                        $INVENTARIOE->__GET('CANTIDAD_ENTRADA'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),

                        $INVENTARIOE->__GET('ID_TEMPORADA'),
                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_RECEPCION'),

                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizarInventarioDespacho(INVENTARIOE $INVENTARIOE)
    {
        try {


            $query = "
                UPDATE material_inventarioe SET
                    MODIFICACION= SYSDATE(),

                    CANTIDAD_SALIDA= ?,
                    ID_EMPRESA= ?,
                    ID_PLANTA= ?,
                    ID_TEMPORADA= ?,

                    ID_BODEGA= ?,
                    ID_PRODUCTO= ?  ,
                    ID_TUMEDIDA= ?  ,
                    ID_DESPACHO= ?  

                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('CANTIDAD_SALIDA'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),
                        $INVENTARIOE->__GET('ID_TEMPORADA'),

                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_DESPACHO'),

                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarInventarioBodega(INVENTARIOE $INVENTARIOE)
    {
        try {


            $query = "
                UPDATE material_inventarioe SET
                    MODIFICACION= SYSDATE(),

                    INGRESO= ?,
                    CANTIDAD_ENTRADA= ?,
                    ID_EMPRESA= ?,
                    ID_PLANTA= ?,
                    ID_TEMPORADA= ?,

                    ID_BODEGA= ?,
                    ID_BODEGA2= ?,
                    ID_PRODUCTO= ?  ,
                    ID_TUMEDIDA= ?  ,
                    ID_DESPACHO= ?  

                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('INGRESO'),
                        $INVENTARIOE->__GET('CANTIDAD_ENTRADA'),
                        $INVENTARIOE->__GET('ID_EMPRESA'),
                        $INVENTARIOE->__GET('ID_PLANTA'),
                        $INVENTARIOE->__GET('ID_TEMPORADA'),

                        $INVENTARIOE->__GET('ID_BODEGA'),
                        $INVENTARIOE->__GET('ID_BODEGA2'),
                        $INVENTARIOE->__GET('ID_PRODUCTO'),
                        $INVENTARIOE->__GET('ID_TUMEDIDA'),
                        $INVENTARIOE->__GET('ID_DESPACHO'),

                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS 


    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function eliminado(INVENTARIOE $INVENTARIOE)
    {

        try {
            $query = "
    UPDATE material_inventarioe SET			
            MODIFICACION= SYSDATE(),		
            ESTADO = 0
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminado2(INVENTARIOE $INVENTARIOE)
    {

        try {
            $query = "
    UPDATE material_inventarioe SET			
            MODIFICACION= SYSDATE(),		
            ESTADO = 0
    WHERE FOLIO_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('FOLIO_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ABIERTO
    public function ingresando(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
    UPDATE material_inventarioe SET				
            MODIFICACION= SYSDATE(),	
            ESTADO = 1
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function disponible(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
    UPDATE material_inventarioe SET				
            MODIFICACION= SYSDATE(),	
            ESTADO = 2
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enDespacho(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
                UPDATE material_inventarioe SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 3
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function despachado(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
                UPDATE material_inventarioe SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 4
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function enTransito(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
                UPDATE material_inventarioe SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 5
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(INVENTARIOE $INVENTARIOE)
    {

        try {
            $query = "
    UPDATE material_inventarioe SET			
            MODIFICACION= SYSDATE(),		
            ESTADO_REGISTRO = 0
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitar2(INVENTARIOE $INVENTARIOE)
    {

        try {
            $query = "
    UPDATE material_inventarioe SET			
            MODIFICACION= SYSDATE(),		
            ESTADO_REGISTRO = 0
    WHERE FOLIO_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('FOLIO_INVENTARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(INVENTARIOE $INVENTARIOE)
    {
        try {
            $query = "
    UPDATE material_inventarioe SET				
            MODIFICACION= SYSDATE(),	
            ESTADO_REGISTRO = 1
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOE->__GET('ID_INVENTARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //LISTAS



    public function listarInventarioPorRecepcionCBX($IDINVENTARIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                IFNULL(CANTIDAD_ENTRADA,0) AS 'CANTIDAD', 
                                                IFNULL(VALOR_UNITARIO,0) AS 'VALOR' , 
                                                IFNULL(VALOR_UNITARIO * CANTIDAD_ENTRADA,0) AS 'TOTAL'  
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDINVENTARIO . "'  ;
                                        	");
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
    public function listarInventarioPorRecepcion2CBX($IDINVENTARIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_ENTRADA,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),5,'de_DE') AS 'VALOR' , 
                                                FORMAT(IFNULL(VALOR_UNITARIO * CANTIDAD_ENTRADA,0),0,'de_DE') AS 'TOTAL' 
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDINVENTARIO . "'  ;	");
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
    public function listarInventarioPorRecepcionDocompraCBX($IDINVENTARIO, $IDDOCOMPRA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDINVENTARIO . "' 
                                                AND ID_DOCOMPRA = '" . $IDDOCOMPRA . "'   ;
                                        	");
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


    public function listarInventarioPorRecepcionDocompraNull2CBX($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_ENTRADA,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR' 
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDRECEPCION . "' 
                                                AND ID_DOCOMPRA IS  NULL
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

    public function listarInventarioPorRecepcionDocompraNotNull2CBX($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_ENTRADA,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR' 
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDRECEPCION . "' 
                                                AND ID_DOCOMPRA IS  NOT NULL
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

   
    public function listarInventarioPorEmpresaPlantaTemporadaNoGroupCBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_ENTRADA,0),0,'de_DE') AS 'ENTRADA', 
                                                FORMAT(IFNULL(CANTIDAD_SALIDA,0),0,'de_DE') AS 'SALIDA', 
                                                FORMAT(IFNULL(CANTIDAD_ENTRADA-CANTIDAD_SALIDA,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'    
                                             FROM material_inventarioe
                                                WHERE  ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                AND ESTADO_REGISTRO = 1	");
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
    public function listarInventarioPorEmpresaTemporadaCBX($IDEMPRESA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                IFNULL(SUM(CANTIDAD_ENTRADA),0) AS 'ENTRADA', 
                                                IFNULL(SUM(CANTIDAD_SALIDA),0) AS 'SALIDA', 
                                                IFNULL(SUM(CANTIDAD_ENTRADA-CANTIDAD_SALIDA),0) AS 'CANTIDAD', 
                                                IFNULL(SUM(VALOR_UNITARIO),0) AS 'VALOR'    
                                             FROM material_inventarioe
                                                WHERE  ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                AND ESTADO_REGISTRO = 1
                                            GROUP BY ID_BODEGA, ID_PRODUCTO;	");
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
    public function listarInventarioPorEmpresaPlantaTemporadaCBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                IFNULL(SUM(CANTIDAD_ENTRADA),0) AS 'ENTRADA', 
                                                IFNULL(SUM(CANTIDAD_SALIDA),0) AS 'SALIDA', 
                                                IFNULL(SUM(CANTIDAD_ENTRADA-CANTIDAD_SALIDA),0) AS 'CANTIDAD', 
                                                IFNULL(SUM(VALOR_UNITARIO),0) AS 'VALOR'    
                                             FROM material_inventarioe
                                                WHERE  ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                AND ESTADO_REGISTRO = 1
                                            GROUP BY ID_BODEGA, ID_PRODUCTO;	");
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
    public function listarInventarioPorEmpresaPlantaTemporada2CBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENTRADA),0),0,'de_DE') AS 'ENTRADA', 
                                                FORMAT(IFNULL(SUM(CANTIDAD_SALIDA),0),0,'de_DE') AS 'SALIDA', 
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENTRADA-CANTIDAD_SALIDA),0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(SUM(VALOR_UNITARIO),0),3,'de_DE') AS 'VALOR'    
                                             FROM material_inventarioe
                                                WHERE  ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                AND ESTADO_REGISTRO = 1
                                            GROUP BY ID_BODEGA, ID_PRODUCTO;	");
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
    public function listarHinventarioPorEmpresaPlantaTemporada2CBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENTRADA),0),0,'de_DE') AS 'ENTRADA', 
                                                FORMAT(IFNULL(SUM(CANTIDAD_SALIDA),0),0,'de_DE') AS 'SALIDA', 
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENTRADA-CANTIDAD_SALIDA),0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(SUM(VALOR_UNITARIO),0),3,'de_DE') AS 'VALOR'    
                                             FROM material_inventarioe
                                                WHERE  ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                AND ESTADO_REGISTRO = 1
                                            GROUP BY ID_BODEGA, ID_PRODUCTO, ID_RECEPCION, ID_DESPACHO;	");
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
    public function listarHinventarioPorEmpresaPlantaTemporadaCBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                IFNULL(SUM(CANTIDAD_ENTRADA),0)AS 'ENTRADA', 
                                                IFNULL(SUM(CANTIDAD_SALIDA),0) AS 'SALIDA', 
                                                IFNULL(SUM(CANTIDAD_ENTRADA-CANTIDAD_SALIDA),0) AS 'CANTIDAD', 
                                                IFNULL(SUM(VALOR_UNITARIO),0) AS 'VALOR'    
                                             FROM material_inventarioe
                                                WHERE  ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND ID_PLANTA = '" . $IDPLANTA . "'
                                                AND ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                AND ESTADO_REGISTRO = 1
                                            GROUP BY ID_BODEGA, ID_PRODUCTO, ID_RECEPCION, ID_DESPACHO;	");
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
    public function listarKardexPorEmpresaPlantaTemporadaCBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

                $datos = $this->conexion->prepare("SELECT
                                                    producto.CODIGO_PRODUCTO AS 'CODIGO',
                                                    producto.NOMBRE_PRODUCTO AS 'NOMBRE', 
                                                    (   SELECT  tumedida.NOMBRE_TUMEDIDA
                                                        FROM material_tumedida tumedida
                                                        WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                    ) AS 'TUMEDIDA',    
                                                    IFNULL(SUM(inventario.CANTIDAD_ENTRADA),0) AS 'ENTRADA', 
                                                    IFNULL(SUM(inventario.CANTIDAD_SALIDA),0) AS 'SALIDA', 
                                                    IFNULL(SUM(inventario.CANTIDAD_ENTRADA-CANTIDAD_SALIDA),0) AS 'SALDO',
                                                    (  SELECT  bodega.NOMBRE_BODEGA
                                                        FROM principal_bodega bodega
                                                        WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                    ) AS 'BODEGA',
                                                    inventario.ID_RECEPCION AS 'RECEPCION',
                                                    inventario.ID_DESPACHO AS 'DESPACHO',
                                                    inventario.ID_DESPACHO2 AS 'DESPACHO2',
                                                    (   SELECT  empresa.NOMBRE_EMPRESA
                                                        FROM principal_empresa empresa
                                                        WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                    ) AS 'EMPRESA',
                                                    (   SELECT  planta.NOMBRE_PLANTA
                                                        FROM principal_planta planta
                                                        WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                    ) AS 'PLANTA',    
                                                    (   SELECT  temporada.NOMBRE_TEMPORADA
                                                        FROM principal_temporada temporada
                                                        WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                    ) AS 'TEMPORADA'
                                                FROM material_inventarioe inventario,  material_producto producto   
                                                WHERE inventario.ID_PRODUCTO=producto.ID_PRODUCTO
                                                AND inventario.ESTADO_REGISTRO = 1
                                                AND inventario.ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND inventario.ID_PLANTA = '" . $IDPLANTA . "'
                                                AND inventario.ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                GROUP BY 
                                                    inventario.ID_PRODUCTO, inventario.ID_EMPRESA, 
                                                    inventario.ID_PLANTA, inventario.ID_TEMPORADA, 
                                                    inventario.ID_RECEPCION, inventario.ID_DESPACHO,
                                                    inventario.ID_DESPACHO2, inventario.ID_BODEGA                                              
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
    
    public function listarKardexPorEmpresaTemporadaCBX($IDEMPRESA,  $IDTEMPORADA)
    {
        try {

                $datos = $this->conexion->prepare("SELECT
                                                    producto.CODIGO_PRODUCTO AS 'CODIGO',
                                                    producto.NOMBRE_PRODUCTO AS 'NOMBRE', 
                                                    (   SELECT  tumedida.NOMBRE_TUMEDIDA
                                                        FROM material_tumedida tumedida
                                                        WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                    ) AS 'TUMEDIDA',    
                                                    IFNULL(SUM(inventario.CANTIDAD_ENTRADA),0) AS 'ENTRADA', 
                                                    IFNULL(SUM(inventario.CANTIDAD_SALIDA),0) AS 'SALIDA', 
                                                    IFNULL(SUM(inventario.CANTIDAD_ENTRADA-CANTIDAD_SALIDA),0) AS 'SALDO',
                                                    (  SELECT  bodega.NOMBRE_BODEGA
                                                        FROM principal_bodega bodega
                                                        WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                    ) AS 'BODEGA',
                                                    inventario.ID_RECEPCION AS 'RECEPCION',
                                                    inventario.ID_DESPACHO AS 'DESPACHO',
                                                    inventario.ID_DESPACHO2 AS 'DESPACHO2',
                                                    (   SELECT  empresa.NOMBRE_EMPRESA
                                                        FROM principal_empresa empresa
                                                        WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                    ) AS 'EMPRESA',
                                                    (   SELECT  planta.NOMBRE_PLANTA
                                                        FROM principal_planta planta
                                                        WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                    ) AS 'PLANTA',    
                                                    (   SELECT  temporada.NOMBRE_TEMPORADA
                                                        FROM principal_temporada temporada
                                                        WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                    ) AS 'TEMPORADA'
                                                FROM material_inventarioe inventario,  material_producto producto   
                                                WHERE inventario.ID_PRODUCTO=producto.ID_PRODUCTO
                                                AND inventario.ESTADO_REGISTRO = 1
                                                AND inventario.ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                AND inventario.ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                GROUP BY 
                                                    inventario.ID_PRODUCTO, inventario.ID_EMPRESA, 
                                                    inventario.ID_PLANTA, inventario.ID_TEMPORADA, 
                                                    inventario.ID_RECEPCION, inventario.ID_DESPACHO,
                                                    inventario.ID_DESPACHO2                                                
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
    //BUSCAR

    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                * 
                                            FROM material_inventarioe 
                                                WHERE ID_RECEPCION= '" . $IDRECEPCION . "'
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

    public function buscarPorEnDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                * , 
                                                IFNULL(CANTIDAD_SALIDA,0) AS 'CANTIDAD' ,
                                                IFNULL(VALOR_UNITARIO,0) AS 'VALOR'
                                            FROM material_inventarioe 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                AND ESTADO = 3
                                                AND ESTADO_REGISTRO = 1
                                                AND ID_BODEGA2 IS NULL
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
    public function buscarPorDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                * , 
                                                IFNULL(CANTIDAD_SALIDA,0) AS 'CANTIDAD' ,
                                                IFNULL(VALOR_UNITARIO,0) AS 'VALOR'
                                            FROM material_inventarioe 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                AND ESTADO_REGISTRO = 1
                                                AND ID_BODEGA2 IS NULL
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
    public function buscarPorDespacho2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                *, 
                                                FORMAT(IFNULL(CANTIDAD_SALIDA,0),0,'de_DE') AS 'CANTIDAD' ,
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'
                                            FROM material_inventarioe 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                AND ESTADO_REGISTRO = 1
                                                AND ID_BODEGA2 IS NULL
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
    public function buscarPorDespachoIngresoBodega($IDDESPACHO, $INGRESO, $BODEGA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                * 
                                            FROM material_inventarioe 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                AND INGRESO = '".$INGRESO."'
                                                AND ID_BODEGA2 = '".$BODEGA."' 
                                                AND ESTADO_REGISTRO = 1
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

    public function obtenerTotalesInventarioPorRecepcionCBX($IDINVENTARIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(SUM(CANTIDAD_ENTRADA),0) AS 'CANTIDAD',
                                                IFNULL(SUM(VALOR_UNITARIO),0) AS 'VALOR'
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDINVENTARIO . "'  ;	");
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
    public function obtenerTotalesInventarioPorRecepcion2CBX($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENTRADA),0),0,'de_DE') AS 'CANTIDAD',
                                                    FORMAT(IFNULL(SUM(VALOR_UNITARIO),0),2,'de_DE') AS 'VALOR'
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $IDRECEPCION . "'  ;	");
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



    public function obtenerTotalesInventarioPorDespachoCBX($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(SUM(CANTIDAD_SALIDA),0) AS 'CANTIDAD'
                                            FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DESPACHO = '" . $IDDESPACHO . "'  ;	");
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
    public function obtenerTotalesInventarioPorDespacho2CBX($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_SALIDA),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventarioe
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DESPACHO = '" . $IDDESPACHO . "'  ;	");
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

    public function obtenerTotalInventarioPorEmpresaTemporada2CBX($IDEMPRESA,  $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENTRADA),0),0,'de_DE') AS 'ENTRADA', 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_SALIDA),0),0,'de_DE') AS 'SALIDA', 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENTRADA-CANTIDAD_SALIDA),0),0,'de_DE') AS 'CANTIDAD' 
                                                FROM material_inventarioe
                                                    WHERE  ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                    AND ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                    AND ESTADO_REGISTRO = 1;	");
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
    public function obtenerTotalInventarioPorEmpresaPlantaTemporada2CBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENTRADA),0),0,'de_DE') AS 'ENTRADA', 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_SALIDA),0),0,'de_DE') AS 'SALIDA', 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENTRADA-CANTIDAD_SALIDA),0),0,'de_DE') AS 'CANTIDAD' 
                                                FROM material_inventarioe
                                                    WHERE  ID_EMPRESA = '" . $IDEMPRESA . "' 
                                                    AND ID_PLANTA = '" . $IDPLANTA . "'
                                                    AND ID_TEMPORADA = '" . $IDTEMPORADA . "' 
                                                    AND ESTADO_REGISTRO = 1;	");
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
    //otros




}
