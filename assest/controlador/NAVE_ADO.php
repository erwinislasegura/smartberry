<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/NAVE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class NAVE_ADO {
    
    
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
    public function listarNave(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_nave` limit 8;	");
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
    public function listarNaveCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_nave` WHERE `ESTADO_REGISTRO` = 1;	");
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

    public function listarNave2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_nave` WHERE `ESTADO_REGISTRO` = 0;	");
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
    public function verNave($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_nave` WHERE `ID_NAVE`= '".$ID."';");
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
    public function agregarNave(NAVE $NAVE){
        try{

       
            
            $query=
            "INSERT INTO `transporte_nave` (
                                                `NUMERO_NAVE`,  
                                                `NOMBRE_NAVE`,  
                                                `ID_NAVIERA`, 
                                                `ID_EMPRESA`, 
                                                `ID_USUARIOI`, 
                                                `ID_USUARIOM`, 
                                                `ESTADO_REGISTRO` 
                                            ) VALUES
	       	(?, ?, ?, ?, ?, ?,   1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $NAVE->__GET('NUMERO_NAVE') ,  
                    $NAVE->__GET('NOMBRE_NAVE') ,   
                    $NAVE->__GET('ID_NAVIERA') ,   
                    $NAVE->__GET('ID_EMPRESA') ,   
                    $NAVE->__GET('ID_USUARIOI') ,   
                    $NAVE->__GET('ID_USUARIOM')           
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarNave($id){
        try{$sql="DELETE FROM `transporte_nave` WHERE `ID_NAVE`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarNave(NAVE $NAVE){
        try{
            $query = "
                UPDATE `transporte_nave` SET
                    `NOMBRE_NAVE`= ?,    
                    `ID_NAVIERA`= ?  ,    
                    `ID_USUARIOM`= ?      
                WHERE `ID_NAVE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $NAVE->__GET('NOMBRE_NAVE'),    
                    $NAVE->__GET('ID_NAVIERA')   ,   
                    $NAVE->__GET('ID_USUARIOM')   ,    
                    $NAVE->__GET('ID_NAVE')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
   

   
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(NAVE $NAVE){

        try{
            $query = "
		UPDATE `transporte_nave` SET			
            `ESTADO_REGISTRO` = 0
		WHERE `ID_NAVE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $NAVE->__GET('ID_NAVE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(NAVE $NAVE){
        try{
            $query = "
		UPDATE `transporte_nave` SET			
            `ESTADO_REGISTRO` = 1
		WHERE `ID_NAVE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $NAVE->__GET('ID_NAVE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function buscarNavePorNaviera($IDNAVIERA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_nave` WHERE `ID_NAVIERA` = '".$IDNAVIERA."';	");
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


    public function listarNavePorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_nave` 
                                            WHERE `ESTADO_REGISTRO` = 1
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "' ;	");
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
    
    public function obtenerNumero($IDEMPRESA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                IFNULL(COUNT(NUMERO_NAVE),0) AS 'NUMERO'
                                            FROM `transporte_nave`
                                            WHERE ID_EMPRESA = '" . $IDEMPRESA . "'     
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
?>  