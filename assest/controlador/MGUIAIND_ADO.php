<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/MGUIAIND.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class MGUIAIND_ADO
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_mguiaind limit 8;	");
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_mguiaind ;	");
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
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_mguiaind 
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_mguiaind WHERE ID_MGUIA= '" . $ID . "';");
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
    public function agregarMguia(MGUIAIND $MGUIAIND)
    {
        try {


            $query =
                "INSERT INTO fruta_mguiaind ( 
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

                        $MGUIAIND->__GET('NUMERO_MGUIA'),
                        $MGUIAIND->__GET('NUMERO_DESPACHO'),
                        $MGUIAIND->__GET('NUMERO_GUIA'),
                        $MGUIAIND->__GET('MOTIVO_MGUIA'),
                        $MGUIAIND->__GET('ID_DESPACHO'),
                        $MGUIAIND->__GET('ID_PLANTA2'),
                        $MGUIAIND->__GET('ID_EMPRESA'),
                        $MGUIAIND->__GET('ID_PLANTA'),
                        $MGUIAIND->__GET('ID_TEMPORADA'),
                        $MGUIAIND->__GET('ID_USUARIOI'),
                        $MGUIAIND->__GET('ID_USUARIOM') 

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
            $sql = "DELETE FROM fruta_mguiaind WHERE ID_MGUIA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarMguia(MGUIAIND $MGUIAIND)
    {
        try {
            $query = "
		UPDATE fruta_mguiaind SET
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
                        $MGUIAIND->__GET('NUMERO_DESPACHO'),
                        $MGUIAIND->__GET('NUMERO_GUIA'),
                        $MGUIAIND->__GET('MOTIVO_MGUIA'),
                        $MGUIAIND->__GET('ID_DESPACHO'),
                        $MGUIAIND->__GET('ID_PLANTA2'),
                        $MGUIAIND->__GET('ID_EMPRESA'),
                        $MGUIAIND->__GET('ID_PLANTA'),
                        $MGUIAIND->__GET('ID_TEMPORADA'),
                        $MGUIAIND->__GET('ID_USUARIOM') ,
                        $MGUIAIND->__GET('ID_MGUIA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(MGUIAIND $MGUIAIND)
    {

        try {
            $query = "
    UPDATE fruta_mguiaind SET			
            ESTADO_REGISTRO = 0
    WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MGUIAIND->__GET('ID_TUSUARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(MGUIAIND $MGUIAIND)
    {
        try {
            $query = "
    UPDATE fruta_mguiaind SET			
            ESTADO_REGISTRO = 1
    WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $MGUIAIND->__GET('ID_TUSUARIO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function listarMguiaEmpresaPlantaTemporadaDespachoOrigenCBX($DESPACHO, $EMPRESA, $PLANTA, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *
                                             FROM fruta_mguiaind 
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
                                             FROM fruta_mguiaind 
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
                                             FROM fruta_mguiaind 
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
