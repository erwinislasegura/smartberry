<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/MOCOMPRA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class MOCOMPRA_ADO {
    
    //ATRIBUTO
    private $conexion;
    
    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS
    public function __CONSTRUCT()
    {
        try
        {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');

            
            $this->conexion = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME, $USER ,$PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    
    
 //FUNCIONES BASICAS 
 //LISTAR TODO CON LIMITE DE 6 FILAS   
    public function listarMcompra(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_mocompra limit 8;	");
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

    //LISTAR TODO
    public function listarMcompraCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_mocompra WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarMcompraPorOcompraCBX($IDOCOMPRA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_mocompra 
                                            WHERE ESTADO_REGISTRO = 1
                                            AND ID_OCOMPRA = '" . $IDOCOMPRA . "' ;	");
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


    public function listarMcompraCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_mocompra WHERE ESTADO_REGISTRO= 1;	");
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
    public function verMcompra($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_mocompra WHERE ID_MGUIA= '".$ID."';");
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

     
    //REGISTRO DE UNA NUEVA FILA    
    public function agregarMcompra(MOCOMPRA $MOCOMPRA){
        try{
            
           /* $query = "INSERT INTO material_mocompra ( 
                NUMERO_MOCOMPRA,
                NUMERO_OCOMPRA, 
                NUMEROI_OCOMPRA, 
                MOTIVO_MOCOMPRA, 
                ID_OCOMPRA,
                ID_EMPRESA, 
                ID_PLANTA, 
                ID_TEMPORADA, 
                ID_USUARIOI, 
                ID_USUARIOM, 
                FECHA_INGRESO_MOCOMPRA, 
                ESTADO_REGISTRO
            ) VALUES
('" . $MOCOMPRA->__GET('NUMERO_MOCOMPRA') . "', 
'" . $MOCOMPRA->__GET('NUMERO_OCOMPRA') . "', 
'" . $MOCOMPRA->__GET('NUMEROI_OCOMPRA') . "', 
'" . $MOCOMPRA->__GET('MOTIVO_MOCOMPRA') . "', 
'" . $MOCOMPRA->__GET('ID_OCOMPRA') . "', 
'" . $MOCOMPRA->__GET('ID_EMPRESA') . "', 
'" . $MOCOMPRA->__GET('ID_PLANTA') . "', 
'" . $MOCOMPRA->__GET('ID_TEMPORADA') . "', 
'" . $MOCOMPRA->__GET('ID_USUARIOI') . "', 
'" . $MOCOMPRA->__GET('ID_USUARIOM') . "', 
SYSDATE(), 
1
);";*/
            $query=
            "INSERT INTO material_mocompra (
        NUMERO_MOCOMPRA,
        NUMERO_OCOMPRA, 
        NUMEROI_OCOMPRA, 
        MOTIVO_MOCOMPRA, 
        ID_OCOMPRA,
        ID_EMPRESA, 
        ID_PLANTA, 
        ID_TEMPORADA, 
        ID_USUARIOI, 
        ID_USUARIOM, 
        FECHA_INGRESO_MOCOMPRA, 
        ESTADO_REGISTRO
    ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), 1);";
            //echo $query;
            $this->conexion->prepare($query)->execute(array(
                $MOCOMPRA->__GET('NUMERO_MOCOMPRA'),
                $MOCOMPRA->__GET('NUMERO_OCOMPRA'),
                $MOCOMPRA->__GET('NUMEROI_OCOMPRA'),
                $MOCOMPRA->__GET('MOTIVO_MOCOMPRA'),
                $MOCOMPRA->__GET('ID_OCOMPRA'),
                $MOCOMPRA->__GET('ID_EMPRESA'),
                $MOCOMPRA->__GET('ID_PLANTA'),
                $MOCOMPRA->__GET('ID_TEMPORADA'),
                $MOCOMPRA->__GET('ID_USUARIOI'),
                $MOCOMPRA->__GET('ID_USUARIOM')
            ));
                
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarMcompra($id){
        try{$sql="DELETE FROM material_mocompra WHERE ID_MGUIA=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarMcompra(MOCOMPRA $MOCOMPRA){
        try{
            $query = "
		UPDATE material_mocompra SET
            NUMERO_OCOMPRA= ?,
            NUMEROI_OCOMPRA= ?,
            MOTIVO_MGUIA= ?,
            ID_OCOMPRA= ?,
            ID_EMPRESA= ?,
            ID_PLANTA= ?,
            ID_TEMPORADA= ?,
            ID_USUARIOM= ?            
		WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $MOCOMPRA->__GET('NUMERO_OCOMPRA'),
                    $MOCOMPRA->__GET('NUMEROI_OCOMPRA'),
                    $MOCOMPRA->__GET('MOTIVO_MOCOMPRA'),
                    $MOCOMPRA->__GET('ID_OCOMPRA'),
                    $MOCOMPRA->__GET('ID_EMPRESA'),
                    $MOCOMPRA->__GET('ID_PLANTA'),
                    $MOCOMPRA->__GET('ID_TEMPORADA'),
                    $MOCOMPRA->__GET('ID_USUARIOM'),    
                    $MOCOMPRA->__GET('ID_MGUIA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(MOCOMPRA $MOCOMPRA){

        try{
            $query = "
    UPDATE material_mocompra SET			
            ESTADO_REGISTRO = 0
    WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $MOCOMPRA->__GET('ID_TUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(MOCOMPRA $MOCOMPRA){
        try{
            $query = "
    UPDATE material_mocompra SET			
            ESTADO_REGISTRO = 1
    WHERE ID_MGUIA= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $MOCOMPRA->__GET('ID_TUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarMcompraEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *
                                             FROM material_mocompra 
                                             WHERE ESTADO_REGISTRO = 1
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
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarMcompraEmpresaPlantaTemporadaOcompraCBX($IDOCOMPRA, $EMPRESA, $PLANTA, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *
                                             FROM material_mocompra 
                                             WHERE ESTADO_REGISTRO = 1
                                            AND ID_OCOMPRA = '" . $IDOCOMPRA . "' 
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                             ;	");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            
          //  print_r($resultado);
            //var_dump($resultado);
            
            
            return $resultado;
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarMcompraOcompraCBX($IDOCOMPRA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *
                                             FROM material_mocompra 
                                             WHERE ESTADO_REGISTRO = 1
                                            AND ID_OCOMPRA = '" . $IDOCOMPRA . "' 
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

    public function obtenerNumero($IDOCOMPRA, $EMPRESA,  $PLANTA, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT IFNULL(COUNT(NUMERO_MOCOMPRA),0) AS 'NUMERO'
                                             FROM material_mocompra 
                                             WHERE ESTADO_REGISTRO = 1
                                                AND ID_OCOMPRA = '" . $IDOCOMPRA . "' 
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
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }



}
