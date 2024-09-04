<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TARJAM.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class TARJAM_ADO
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
    public function listarTarja()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  material_tarjam  limit 8 WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //LISTAR TODO
    public function listarTarjaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  material_tarjam  WHERE ESTADO_REGISTRO = 1;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarTarja2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  material_tarjam  WHERE ESTADO_REGISTRO = 0;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verTarja($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  material_tarjam  WHERE  ID_TARJA = '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verTarja2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM  material_tarjam  
                                                WHERE  ID_TARJA = '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //REGISTRO DE UNA NUEVA FILA    

    public function agregarTarjaDrecepcion(TARJAM $TARJAM)
    {
        try {

            if ($TARJAM->__GET('ID_DRECEPCION') == NULL) {
                $TARJAM->__SET('ID_DRECEPCION', NULL);
            }
            if ($TARJAM->__GET('ID_DOCOMPRA') == NULL) {
                $TARJAM->__SET('ID_DOCOMPRA', NULL);
            }
            $query =
                "INSERT INTO  material_tarjam  (   
                                                     FOLIO_TARJA ,
                                                     ALIAS_DINAMICO_TARJA ,
                                                     ALIAS_ESTATICO_TARJA ,
                                                     CANITDAD_CONTENEDOR ,
                                                     VALOR_UNITARIO ,      
                                                     CANTIDAD_TARJA ,                                     
                                                     ID_RECEPCION ,         
                                                     ID_PRODUCTO ,
                                                     ID_TCONTENEDOR ,
                                                     ID_TUMEDIDA ,
                                                     ID_FOLIO ,                        
                                                     ID_DRECEPCION ,
                                                     INGRESO ,
                                                     MODIFICACION ,     
                                                     ESTADO ,
                                                     ESTADO_REGISTRO,
                                                     FOLIOANTERIOR 
                                                ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(),  1, 1,?);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TARJAM->__GET('FOLIO_TARJA'),
                        $TARJAM->__GET('ALIAS_DINAMICO_TARJA'),
                        $TARJAM->__GET('ALIAS_ESTATICO_TARJA'),
                        $TARJAM->__GET('CANITDAD_CONTENEDOR'),
                        $TARJAM->__GET('VALOR_UNITARIO'),
                        $TARJAM->__GET('CANTIDAD_TARJA'),
                        $TARJAM->__GET('ID_RECEPCION'),
                        $TARJAM->__GET('ID_PRODUCTO'),
                        $TARJAM->__GET('ID_TCONTENEDOR'),
                        $TARJAM->__GET('ID_TUMEDIDA'),
                        $TARJAM->__GET('ID_FOLIO'),
                        $TARJAM->__GET('ID_DRECEPCION'),
                        $TARJAM->__GET('FOLIOANTERIOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTarja($id)
    {
        try {
            $sql = "DELETE FROM  material_tarjam  WHERE  ID_TARJA =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTarjaDrecepcion(TARJAM $TARJAM)
    {
        try {
            if ($TARJAM->__GET('ID_DRECEPCION') == NULL) {
                $TARJAM->__SET('ID_DRECEPCION', NULL);
            }
            if ($TARJAM->__GET('ID_DOCOMPRA') == NULL) {
                $TARJAM->__SET('ID_DOCOMPRA', NULL);
            }
            $query = "
		UPDATE  material_tarjam  SET
             MODIFICACION = SYSDATE(),
             CANITDAD_CONTENEDOR = ?,
             VALOR_UNITARIO = ?,
             CANTIDAD_TARJA = ?,
             ID_RECEPCION = ?,
             ID_PRODUCTO = ?,
             ID_TCONTENEDOR = ?,
             ID_TUMEDIDA = ?  ,
             ID_FOLIO = ?  ,
             ID_DRECEPCION = ?,
             FOLIOANTERIOR = ?
		WHERE  ID_TARJA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TARJAM->__GET('CANITDAD_CONTENEDOR'),
                        $TARJAM->__GET('VALOR_UNITARIO'),
                        $TARJAM->__GET('CANTIDAD_TARJA'),
                        $TARJAM->__GET('ID_RECEPCION'),
                        $TARJAM->__GET('ID_PRODUCTO'),
                        $TARJAM->__GET('ID_TCONTENEDOR'),
                        $TARJAM->__GET('ID_TUMEDIDA'),
                        $TARJAM->__GET('ID_FOLIO'),
                        $TARJAM->__GET('ID_DRECEPCION'),
                        $TARJAM->__GET('ID_TARJA'),
                        $TARJAM->__GET('FOLIOANTERIOR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS 


    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function cerrado(TARJAM $TARJAM)
    {

        try {
            $query = "
    UPDATE  material_tarjam  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO  = 0
    WHERE  ID_TARJA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TARJAM->__GET('ID_TARJA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ABIERTO
    public function abierto(TARJAM $TARJAM)
    {
        try {
            $query = "
    UPDATE  material_tarjam  SET				
             MODIFICACION = SYSDATE(),	
             ESTADO  = 1
    WHERE  ID_TARJA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TARJAM->__GET('ID_TARJA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TARJAM $TARJAM)
    {

        try {
            $query = "
    UPDATE  material_tarjam  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_TARJA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TARJAM->__GET('ID_TARJA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitar2(TARJAM $TARJAM)
    {

        try {
            $query = "
    UPDATE  material_tarjam  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  FOLIO_TARJA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TARJAM->__GET('FOLIO_TARJA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TARJAM $TARJAM)
    {
        try {
            $query = "
    UPDATE  material_tarjam  SET				
             MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 1
    WHERE  ID_TARJA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $TARJAM->__GET('ID_TARJA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //LISTAS

    public function listarTarjaPorRecepcionCBX($ID_RECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                            DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                            DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                            IFNULL( CANTIDAD_TARJA ,0) AS 'CANTIDAD'
                                            FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $ID_RECEPCION . "'  ;
                                        	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarTarjaPorRecepcion2CBX($ID_RECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL( CANTIDAD_TARJA ,0),0,'de_DE') AS 'CANTIDAD' 
                                            FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $ID_RECEPCION . "'  ;
                                        	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarTarjaPorDrecepcionCBX($IDDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DRECEPCION = '" . $IDDRECEPCION . "'  ;
                                        	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarTarjaPorDrecepcion2CBX($IDDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL( CANITDAD_CONTENEDOR ,0),0,'de_DE') AS 'CANTIDADC', 
                                                FORMAT(IFNULL( CANTIDAD_TARJA ,0),0,'de_DE') AS 'CANTIDAD' 
                                             FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DRECEPCION = '" . $IDDRECEPCION . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarTarjaPorDocompraCBX($IDDOCOMPRA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *  ,
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                    IFNULL( CANITDAD_CONTENEDOR ,0) AS 'CANTIDADC', 
                                                    IFNULL( CANTIDAD_TARJA ,0) AS 'CANTIDAD' 
                                            FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DOCOMPRA = '" . $IDDOCOMPRA . "'  ;
                                        	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarTarjaPorDocompra2CBX($IDDOCOMPRA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL( CANITDAD_CONTENEDOR ,0),0,'de_DE') AS 'CANTIDADC', 
                                                FORMAT(IFNULL( CANTIDAD_TARJA ,0),0,'de_DE') AS 'CANTIDAD' 
                                             FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DOCOMPRA = '" . $IDDOCOMPRA . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //TOTALES


    public function obtenerTotalTarjaPorRecepcionCBX($ID_RECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                            IFNULL(SUM( CANTIDAD_TARJA ),0) AS 'CANTIDAD'
                                            FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $ID_RECEPCION . "'  ;
                                        	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalTarjaPorRecepcion2CBX($ID_RECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM( CANTIDAD_TARJA ),0),0,'de_DE') AS 'CANTIDAD' 
                                            FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '" . $ID_RECEPCION . "'  ;
                                        	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    public function obtenerTotalesTarjaPorDrecepcionCBX($IDDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(SUM( CANITDAD_CONTENEDOR ),0) AS 'CANTIDADC', 
                                                IFNULL(SUM( CANTIDAD_TARJA ),0) AS 'CANTIDAD'      
                                            FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DRECEPCION = '" . $IDDRECEPCION . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesTarjaPorDrecepcion2CBX($IDDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM( CANITDAD_CONTENEDOR ),0),0,'de_DE') AS 'CANTIDADC', 
                                                FORMAT(IFNULL(SUM( CANTIDAD_TARJA ),0),0,'de_DE') AS 'CANTIDAD'       
                                             FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DRECEPCION = '" . $IDDRECEPCION . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerTotalesTarjaPorDocompraCBX($IDDOCOMPRA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(SUM( CANITDAD_CONTENEDOR ),0) AS 'CANTIDADC', 
                                                IFNULL(SUM( CANTIDAD_TARJA ),0) AS 'CANTIDAD'      
                                            FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DOCOMPRA = '" . $IDDOCOMPRA . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesTarjaPorDocompra2CBX($IDDOCOMPRA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM( CANITDAD_CONTENEDOR ),0),0,'de_DE') AS 'CANTIDADC', 
                                                FORMAT(IFNULL(SUM( CANTIDAD_TARJA ),0),0,'de_DE') AS 'CANTIDAD'       
                                             FROM  material_tarjam 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DOCOMPRA = '" . $IDDOCOMPRA . "'  ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
