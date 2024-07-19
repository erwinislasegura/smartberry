<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DNOTADC.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DNOTADC_ADO
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
    public function listarDnota()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dnotadc LIMIT 6;	");
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
    public function listarDnotaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dnotadc  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarDnota2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dnotadc  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verDnota($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dnotadc WHERE ID_DNOTA= '" . $ID . "';");
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
    public function agregarDnota(DNOTADC $DNOTADC)
    {
        try {

            $query =
                "INSERT INTO fruta_dnotadc 
                                        (
                                            TNOTA, 
                                            CANTIDAD, 
                                            TOTAL,

                                            NOTA,
                                            ID_NOTA,  
                                            ID_DICARGA, 
                                            
                                            INGRESO, 
                                            MODIFICACION, 
                                            ESTADO, 
                                            ESTADO_REGISTRO
                                        ) 
            VALUES
	       	(?, ?, ?,    ?, ?, ?,  SYSDATE(),SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DNOTADC->__GET('TNOTA'),
                        $DNOTADC->__GET('CANTIDAD'),
                        $DNOTADC->__GET('TOTAL'),

                        $DNOTADC->__GET('NOTA'),
                        $DNOTADC->__GET('ID_NOTA'),
                        $DNOTADC->__GET('ID_DICARGA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDnota($id)
    {
        try {
            $sql = "DELETE FROM fruta_dnotadc WHERE ID_DNOTA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDnota(DNOTADC $DNOTADC)
    {

        try {
            $query = "
                    UPDATE fruta_dnotadc SET
                        MODIFICACION = SYSDATE(),

                        TNOTA = ?,
                        CANTIDAD = ?,
                        TOTAL = ?,
                        
                        NOTA= ?,
                        ID_NOTA= ?,
                        ID_DICARGA= ?
                        
                    WHERE ID_DNOTA = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DNOTADC->__GET('TNOTA'),
                        $DNOTADC->__GET('CANTIDAD'),
                        $DNOTADC->__GET('TOTAL'),

                        $DNOTADC->__GET('NOTA'),
                        $DNOTADC->__GET('ID_NOTA'),
                        $DNOTADC->__GET('ID_DICARGA'),

                        $DNOTADC->__GET('ID_DNOTA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 


    //LISTAR POR INSTRUCTIVO CARGA
    public function buscarPorNota($IDNOTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dnotadc 
                                                WHERE ID_NOTA = '" . $IDNOTA . "'  
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

    public function buscarPorNotaDicarga($IDNOTA, $IDDICARGA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM fruta_dnotadc 
                                                WHERE ID_NOTA = '" . $IDNOTA . "'  
                                                AND ID_DICARGA = '" . $IDDICARGA . "'  
                                                AND ESTADO_REGISTRO = 1
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

    public function contarPorValor($IDVALOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(ID_DNOTA),0) AS 'CONTEO'
                                                FROM fruta_dnotadc 
                                                WHERE ID_NOTA = '" . $IDVALOR . "'  
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


    //OTRAS FUNCIONES
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DNOTADC $DNOTADC)
    {

        try {
            $query = "
		UPDATE fruta_dnotadc SET			
            ESTADO_REGISTRO = 0
		WHERE ID_DNOTA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DNOTADC->__GET('ID_DNOTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DNOTADC $DNOTADC)
    {

        try {
            $query = "
		UPDATE fruta_dnotadc SET			
            ESTADO_REGISTRO = 1
		WHERE ID_DNOTA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DNOTADC->__GET('ID_DNOTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO DE ESTADO DE LA FILA

    public function cerrado(DNOTADC $DNOTADC)
    {

        try {
            $query = "
		UPDATE fruta_dnotadc SET			
            ESTADO = 0
		WHERE ID_DNOTA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DNOTADC->__GET('ID_DNOTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function abierto(DNOTADC $DNOTADC)
    {

        try {
            $query = "
		UPDATE fruta_dnotadc SET			
            ESTADO = 1
		WHERE ID_DNOTA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DNOTADC->__GET('ID_DNOTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
