<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DFICHA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DFICHA_ADO
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
    public function listarDFicha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  material_dficha  limit 8;	");
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
    public function listarDFichaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  material_dficha  WHERE  ESTADO_REGISTRO  = 1;	");
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


    public function listarDFicha2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  material_dficha  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verDFicha($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  material_dficha  WHERE  ID_DFICHA = '" . $ID . "';");
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
    public function agregarDFicha(DFICHA $DFICHA)
    {
        try {



            $query =
                "INSERT INTO  material_dficha  (
                                                    FACTOR_CONSUMO_DFICHA ,
                                                    CONSUMO_PALLET_DFICHA , 
                                                    PALLET_CARGA_DFICHA , 
                                                    CONSUMO_CONTENEDOR_DFICHA , 
                                                    OBSERVACIONES_DFICHA ,
                                                    ID_PRODUCTO , 
                                                    ID_FICHA , 
                                                    ESTADO ,
                                                    ESTADO_REGISTRO 
                                                )  VALUES
	       	( ?, ?, ?, ?, ?, ?, ?,   1, 1 );";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DFICHA->__GET('FACTOR_CONSUMO_DFICHA'),
                        $DFICHA->__GET('CONSUMO_PALLET_DFICHA'),
                        $DFICHA->__GET('PALLET_CARGA_DFICHA'),
                        $DFICHA->__GET('CONSUMO_CONTENEDOR_DFICHA'),
                        $DFICHA->__GET('OBSERVACIONES_DFICHA'),
                        $DFICHA->__GET('ID_PRODUCTO'),
                        $DFICHA->__GET('ID_FICHA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDFicha($id)
    {
        try {
            $sql = "DELETE FROM  material_dficha  WHERE  ID_DFICHA =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDFicha(DFICHA $DFICHA)
    {
        try {
            $query = "
		UPDATE  material_dficha  SET
             FACTOR_CONSUMO_DFICHA = ?,
             CONSUMO_PALLET_DFICHA = ?,
             PALLET_CARGA_DFICHA = ?,
             CONSUMO_CONTENEDOR_DFICHA = ?,
             OBSERVACIONES_DFICHA = ?,
             ID_PRODUCTO = ?,
             ID_FICHA = ?
		WHERE  ID_DFICHA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DFICHA->__GET('FACTOR_CONSUMO_DFICHA'),
                        $DFICHA->__GET('CONSUMO_PALLET_DFICHA'),
                        $DFICHA->__GET('PALLET_CARGA_DFICHA'),
                        $DFICHA->__GET('CONSUMO_CONTENEDOR_DFICHA'),
                        $DFICHA->__GET('OBSERVACIONES_DFICHA'),
                        $DFICHA->__GET('ID_PRODUCTO'),
                        $DFICHA->__GET('ID_FICHA'),
                        $DFICHA->__GET('ID_DFICHA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DFICHA $DFICHA)
    {

        try {
            $query = "
    UPDATE  material_dficha  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_DFICHA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DFICHA->__GET('ID_DFICHA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DFICHA $DFICHA)
    {
        try {
            $query = "
    UPDATE  material_dficha  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_DFICHA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DFICHA->__GET('ID_DFICHA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function cerrado(DFICHA $DFICHA)
    {

        try {
            $query = "
    UPDATE  material_dficha  SET			
             ESTADO  = 0
    WHERE  ID_DFICHA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DFICHA->__GET('ID_DFICHA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function abierto(DFICHA $DFICHA)
    {
        try {
            $query = "
    UPDATE  material_dficha  SET			
             ESTADO  = 1
    WHERE  ID_DFICHA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DFICHA->__GET('ID_DFICHA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarDfichaPorFichaCBX($IDFICHA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM  material_dficha 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_FICHA = '" . $IDFICHA . "'  ;
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


    public function listarDifchaValorProductoOcCBX($IDPRODUCTO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                    IFNULL(MAX(docompra.VALOR_UNITARIO_DOCOMPRA),0) AS 'VALOR'
                                                FROM material_dficha dficha, material_docompra docompra
                                                WHERE dficha.ID_PRODUCTO= docompra.ID_PRODUCTO
                                                AND dficha.ESTADO_REGISTRO =1
                                                AND docompra.ESTADO_REGISTRO =1  
                                                AND dficha.ID_PRODUCTO = '".$IDPRODUCTO."'
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



    public function listarDfichaPorFichCBX($IDFICHA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',                                                
                                                FACTOR_CONSUMO_DFICHA AS 'FACTOR',
                                                CONSUMO_PALLET_DFICHA AS 'CONSUMOPALLET' , 
                                                PALLET_CARGA_DFICHA AS 'PALLET' , 
                                                CONSUMO_CONTENEDOR_DFICHA AS  'CONSUMOCONTENEDOR'

                                             FROM  material_dficha 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_FICHA = '" . $IDFICHA . "'  ;	");
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


    public function listarDfichaPorFich2CBX($IDFICHA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',                                                
                                                FORMAT(FACTOR_CONSUMO_DFICHA,5,'de_DE') AS 'FACTOR',
                                                FORMAT(CONSUMO_PALLET_DFICHA,0,'de_DE') AS 'CONSUMOPALLET' , 
                                                FORMAT(PALLET_CARGA_DFICHA,0,'de_DE') AS 'PALLET' , 
                                                FORMAT(CONSUMO_CONTENEDOR_DFICHA,2,'de_DE') AS  'CONSUMOCONTENEDOR'

                                             FROM  material_dficha 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_FICHA = '" . $IDFICHA . "'  ;	");
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
