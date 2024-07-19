<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/MGUIAMP.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class MGUIAMP_ADO
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_mguiamp limit 8;	");
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_mguiamp ;	");
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
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_mguiamp 
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_mguiamp WHERE ID_MGUIA= '" . $ID . "';");
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
    public function agregarMguia(MGUIAMP $MGUIAMP)
    {
        try {


            $query =
                "INSERT INTO fruta_mguiamp ( 
                                                NUMERO_MGUIA,
                                                NUMERO_DESPACHO, 
                                                NUMERO_GUIA, 
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

                        $MGUIAMP->__GET('NUMERO_MGUIA'),
                        $MGUIAMP->__GET('NUMERO_DESPACHO'),
                        $MGUIAMP->__GET('NUMERO_GUIA'),
                        $MGUIAMP->__GET('MOTIVO_MGUIA'),
                        $MGUIAMP->__GET('ID_DESPACHO'),
                        $MGUIAMP->__GET('ID_PLANTA2'),
                        $MGUIAMP->__GET('ID_EMPRESA'),
                        $MGUIAMP->__GET('ID_PLANTA'),
                        $MGUIAMP->__GET('ID_TEMPORADA'),
                        $MGUIAMP->__GET('ID_USUARIOI'),
                        $MGUIAMP->__GET('ID_USUARIOM') 

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
            $sql = "DELETE FROM fruta_mguiamp WHERE ID_MGUIA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarMguia(MGUIAMP $MGUIAMP)
    {
        try {
            $query = "
		UPDATE fruta_mguiamp SET
            NUMERO_DESPACHO= ?,
            NUMERO_GUIA= ?,
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
                        $MGUIAMP->__GET('NUMERO_DESPACHO'),
                        $MGUIAMP->__GET('NUMERO_GUIA'),
                        $MGUIAMP->__GET('MOTIVO_MGUIA'),
                        $MGUIAMP->__GET('ID_DESPACHO'),
                        $MGUIAMP->__GET('ID_PLANTA2'),
                        $MGUIAMP->__GET('ID_EMPRESA'),
                        $MGUIAMP->__GET('ID_PLANTA'),
                        $MGUIAMP->__GET('ID_TEMPORADA'),
                        $MGUIAMP->__GET('ID_USUARIOM') ,
                        $MGUIAMP->__GET('ID_MGUIA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(MGUIAMP $MGUIAMP)
    {

        try {
            $query = "
    UPDATE fruta_mguiamp SET			
            ESTADO_REGISTRO = 0
    WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MGUIAMP->__GET('ID_TUSUARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(MGUIAMP $MGUIAMP)
    {
        try {
            $query = "
    UPDATE fruta_mguiamp SET			
            ESTADO_REGISTRO = 1
    WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MGUIAMP->__GET('ID_TUSUARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function listarMguiaEmpresaPlantaTemporadaDespachoOrigenCBX($DESPACHO, $EMPRESA, $PLANTA, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *
                                             FROM fruta_mguiamp 
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
                                             FROM fruta_mguiamp 
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
                                             FROM fruta_mguiamp 
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
