<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/AEROLINIA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class AEROLINIA_ADO {
    
    
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
    public function listarAerolinia(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_aerolinia` limit 8;	");
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
    public function listarAeroliniaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_aerolinia` WHERE `ESTADO_REGISTRO` = 1;	");
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

    public function listarAerolinia2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_aerolinia` WHERE `ESTADO_REGISTRO` = 0;	");
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
    public function verAerolinia($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_aerolinia` WHERE `ID_AEROLINIA`= '".$ID."';");
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
    public function agregarAerolinia(AEROLINIA $AEROLINIA){
        try{

       
            
            $query=
            "INSERT INTO `transporte_aerolinia` (
                                                    `NUMERO_AEROLINIA`,  
                                                    `NOMBRE_AEROLINIA`,  
                                                    `ID_LAEREA`, 
                                                    `ID_EMPRESA`, 
                                                    `ID_USUARIOI`, 
                                                    `ID_USUARIOM`, 
                                                    `ESTADO_REGISTRO` ) VALUES
	       	(?, ?, ?, ?, ?, ?,   1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $AEROLINIA->__GET('NUMERO_AEROLINIA')   ,   
                    $AEROLINIA->__GET('NOMBRE_AEROLINIA')   ,   
                    $AEROLINIA->__GET('ID_LAEREA')          ,   
                    $AEROLINIA->__GET('ID_EMPRESA')         ,   
                    $AEROLINIA->__GET('ID_USUARIOI')         ,   
                    $AEROLINIA->__GET('ID_USUARIOM')          
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarAerolinia($id){
        try{$sql="DELETE FROM `transporte_aerolinia` WHERE `ID_AEROLINIA`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarAerolinia(AEROLINIA $AEROLINIA){
        try{
            $query = "
                UPDATE `transporte_aerolinia` SET
                    `NOMBRE_AEROLINIA`= ?,    
                    `ID_LAEREA`= ?     ,    
                    `ID_USUARIOM`= ?     
                WHERE `ID_AEROLINIA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $AEROLINIA->__GET('NOMBRE_AEROLINIA'),    
                    $AEROLINIA->__GET('ID_LAEREA')   ,     
                    $AEROLINIA->__GET('ID_USUARIOM') ,  
                    $AEROLINIA->__GET('ID_AEROLINIA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
   

   
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(AEROLINIA $AEROLINIA){

        try{
            $query = "
		UPDATE `transporte_aerolinia` SET			
            `ESTADO_REGISTRO` = 0
		WHERE `ID_AEROLINIA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $AEROLINIA->__GET('ID_AEROLINIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(AEROLINIA $AEROLINIA){
        try{
            $query = "
		UPDATE `transporte_aerolinia` SET			
            `ESTADO_REGISTRO` = 1
		WHERE `ID_AEROLINIA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $AEROLINIA->__GET('ID_AEROLINIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function buscarAerolineaPorLarea($IDLAEREA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_aerolinia` WHERE `ID_LAEREA`= '".$IDLAEREA."';");
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

 
    public function listarAeroliniaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `transporte_aerolinia` 
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
                                                IFNULL(COUNT(NUMERO_AEROLINIA),0) AS 'NUMERO'
                                            FROM `transporte_aerolinia`
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