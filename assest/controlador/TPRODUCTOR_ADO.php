<?php
include_once '../../assest/modelo/TPRODUCTOR.php';
include_once '../../assest/config/BDCONFIG.php';

$HOST="";
$DBNAME="";
$USER="";
$PASS="";

class TPRODUCTOR_ADO {
    
    
    private $conexion;
    
    
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
    
    
    
    public function listarTproductor(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_tproductor limit 8;	");
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
    public function listarTproductorCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_tproductor WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarTproductor2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_tproductor WHERE ESTADO_REGISTRO = 0;	");
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


    public function verTproductor($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_tproductor WHERE ID_TPRODUCTOR= '".$ID."';");
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

  
    public function buscarNombreTproductor($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_tproductor WHERE NOMBRE_TPRODUCTOR LIKE '%".$NOMBRE."%';");
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
    
    public function agregarTproductor(TPRODUCTOR $TPRODUCTOR){
        try{
            
            
            $query=
            "INSERT INTO fruta_tproductor (
                                       NUMERO_TPRODUCTOR,
                                       NOMBRE_TPRODUCTOR,
                                       ID_EMPRESA,
                                       ID_USUARIOI,
                                       ID_USUARIOM,
                                       INGRESO,
                                       MODIFICACION,
                                       ESTADO_REGISTRO) VALUES
	       	( ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $TPRODUCTOR->__GET('NUMERO_TPRODUCTOR')      ,  
                    $TPRODUCTOR->__GET('NOMBRE_TPRODUCTOR')      ,  
                    $TPRODUCTOR->__GET('ID_EMPRESA') ,  
                    $TPRODUCTOR->__GET('ID_USUARIOI') ,  
                    $TPRODUCTOR->__GET('ID_USUARIOM')                       
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function eliminarTproductor($id){
        try{$sql="DELETE FROM fruta_tproductor WHERE ID_TPRODUCTOR=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    public function actualizarTproductor(TPRODUCTOR $TPRODUCTOR){
        try{
            $query = "
		UPDATE fruta_tproductor SET            
            MODIFICACION= SYSDATE(),
            NOMBRE_TPRODUCTOR= ?    ,
            ID_EMPRESA= ?      ,
            ID_USUARIOM= ?     
		WHERE ID_TPRODUCTOR= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TPRODUCTOR->__GET('NOMBRE_TPRODUCTOR'),  
                    $TPRODUCTOR->__GET('ID_EMPRESA') ,      
                    $TPRODUCTOR->__GET('ID_USUARIOM')   ,          
                    $TPRODUCTOR->__GET('ID_TPRODUCTOR')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TPRODUCTOR $TPRODUCTOR){

        try{
            $query = "
    UPDATE fruta_tproductor SET		    
            MODIFICACION= SYSDATE(),	
            ESTADO_REGISTRO = 0
    WHERE ID_TPRODUCTOR= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TPRODUCTOR->__GET('ID_TPRODUCTOR')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TPRODUCTOR $TPRODUCTOR){
        try{
            $query = "
    UPDATE fruta_tproductor SET		    
            MODIFICACION= SYSDATE(),	
            ESTADO_REGISTRO = 1
    WHERE ID_TPRODUCTOR= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TPRODUCTOR->__GET('ID_TPRODUCTOR')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarTproductorPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_tproductor WHERE ESTADO_REGISTRO = 1  AND ID_EMPRESA = '".$IDEMPRESA."';	");
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
                                                    IFNULL(COUNT(NUMERO_TPRODUCTOR),0) AS 'NUMERO'
                                                FROM fruta_tproductor
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