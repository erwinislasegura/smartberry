<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/MGUIAE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class MGUIAE_ADO
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
    public function listarMguia()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_mguiae limit 8;	");
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
    public function listarMguiaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_mguiae ;	");
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

    public function listarMguiaDespachoCBX($DESPACHO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_mguiae 
                                            WHERE ESTADO_REGISTRO = 1
                                            AND ID_DESPACHO = '" . $DESPACHO . "' ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verMguia($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM material_mguiae WHERE ID_MGUIA= '" . $ID . "';");
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
    public function agregarMguia(MGUIAE $MGUIAE)
    {
        try {


            $query =
                "INSERT INTO material_mguiae ( 
                                                NUMERO_MGUIA,
                                                NUMERO_DESPACHO, 
                                                NUMERO_DOCUMENTO, 
                                                MOTIVO_MGUIA, 
                                                ID_DESPACHO, 
                                                ID_PLANTA2, 
                                                ID_EMPRESA, 
                                                ID_PLANTA, 
                                                ID_TEMPORADA, 
                                                ID_USUARIOI, 
                                                ID_USUARIOM, 
                                                INGRESO, 
                                                ESTADO_REGISTRO
                                     ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $MGUIAE->__GET('NUMERO_MGUIA'),
                        $MGUIAE->__GET('NUMERO_DESPACHO'),
                        $MGUIAE->__GET('NUMERO_DOCUMENTO'),
                        $MGUIAE->__GET('MOTIVO_MGUIA'),
                        $MGUIAE->__GET('ID_DESPACHO'),
                        $MGUIAE->__GET('ID_PLANTA2'),
                        $MGUIAE->__GET('ID_EMPRESA'),
                        $MGUIAE->__GET('ID_PLANTA'),
                        $MGUIAE->__GET('ID_TEMPORADA'),
                        $MGUIAE->__GET('ID_USUARIOI'),
                        $MGUIAE->__GET('ID_USUARIOM') 

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarMguia($id)
    {
        try {
            $sql = "DELETE FROM material_mguiae WHERE ID_MGUIA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarMguia(MGUIAE $MGUIAE)
    {
        try {
            $query = "
		UPDATE material_mguiae SET
            NUMERO_DESPACHO= ?,
            NUMERO_DOCUMENTO= ?,
            MOTIVO_MGUIA= ?,
            ID_DESPACHO= ?,
            ID_PLANTA2= ?,
            ID_EMPRESA= ?,
            ID_PLANTA= ?,
            ID_TEMPORADA= ?,
            ID_USUARIOM= ?               
		WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MGUIAE->__GET('NUMERO_DESPACHO'),
                        $MGUIAE->__GET('NUMERO_DOCUMENTO'),
                        $MGUIAE->__GET('MOTIVO_MGUIA'),
                        $MGUIAE->__GET('ID_DESPACHO'),
                        $MGUIAE->__GET('ID_PLANTA2'),
                        $MGUIAE->__GET('ID_EMPRESA'),
                        $MGUIAE->__GET('ID_PLANTA'),
                        $MGUIAE->__GET('ID_TEMPORADA'),
                        $MGUIAE->__GET('ID_USUARIOM') ,
                        $MGUIAE->__GET('ID_MGUIA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(MGUIAE $MGUIAE)
    {

        try {
            $query = "
    UPDATE material_mguiae SET			
            ESTADO_REGISTRO = 0
    WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MGUIAE->__GET('ID_TUSUARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(MGUIAE $MGUIAE)
    {
        try {
            $query = "
    UPDATE material_mguiae SET			
            ESTADO_REGISTRO = 1
    WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MGUIAE->__GET('ID_TUSUARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function listarMguiaEmpresaPlantaTemporadaDespachoOrigenCBX($DESPACHO, $EMPRESA, $PLANTA, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *
                                             FROM material_mguiae 
                                             WHERE ESTADO_REGISTRO = 1
                                                AND ID_DESPACHO = '" . $DESPACHO . "' 
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
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarMguiaEmpresaPlantaTemporadaDespachoOrigenCBX2($DESPACHO, $EMPRESA, $PLANTA, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO'
                                             FROM material_mguiae 
                                             WHERE ESTADO_REGISTRO = 1
                                                AND ID_DESPACHO = '" . $DESPACHO . "' 
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
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //OTRAS FUNCIONES

    public function obtenerNumero($DESPACHO, $EMPRESA, $PLANTAORIGEN, $PLANTADESTINO, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT IFNULL(COUNT(NUMERO_MGUIA),0) AS 'NUMERO'
                                             FROM material_mguiae 
                                             WHERE ESTADO_REGISTRO = 1
                                            AND ID_DESPACHO = '" . $DESPACHO . "' 
                                            AND ID_PLANTA2= '" . $PLANTAORIGEN . "'
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTADESTINO . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                             ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
            //	print_r($resultado);
            //	var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

}
