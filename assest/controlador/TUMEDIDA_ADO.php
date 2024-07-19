<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TUMEDIDA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TUMEDIDA_ADO {
    
    
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
    public function listarTumedida(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tumedida  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarTumedidaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tumedida  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarTumedida2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tumedida  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verTumedida($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tumedida  WHERE  ID_TUMEDIDA = '".$ID."';");
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

    public function agregarTumedida(TUMEDIDA $TUMEDIDA){
        try{
            
            
            $query=
            "INSERT INTO  material_tumedida  (
                                                 NUMERO_TUMEDIDA , 
                                                 NOMBRE_TUMEDIDA , 
                                                 ID_EMPRESA ,
                                                 ID_USUARIOI ,
                                                 ID_USUARIOM ,
                                                 INGRESO ,
                                                 MODIFICACION , 
                                                 ESTADO_REGISTRO ) VALUES
	       	( ?, ?, ?, ?, ?,SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TUMEDIDA->__GET('NUMERO_TUMEDIDA')  ,
                    $TUMEDIDA->__GET('NOMBRE_TUMEDIDA')  ,
                    $TUMEDIDA->__GET('ID_EMPRESA') ,
                    $TUMEDIDA->__GET('ID_USUARIOI') , 
                    $TUMEDIDA->__GET('ID_USUARIOM')                
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTumedida($id){
        try{$sql="DELETE FROM  material_tumedida  WHERE  ID_TUMEDIDA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTumedida(TUMEDIDA $TUMEDIDA){
        try{
            $query = "
		UPDATE  material_tumedida  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_TUMEDIDA = ?,
             ID_EMPRESA = ?,
             ID_TUMEDIDA = ?            
		WHERE  ID_TUMEDIDA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $TUMEDIDA->__GET('NOMBRE_TUMEDIDA'), 
                    $TUMEDIDA->__GET('ID_EMPRESA') ,  
                    $TUMEDIDA->__GET('ID_USUARIOM') ,               
                    $TUMEDIDA->__GET('ID_TUMEDIDA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TUMEDIDA $TUMEDIDA){

        try{
            $query = "
    UPDATE  material_tumedida  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_TUMEDIDA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TUMEDIDA->__GET('ID_TUMEDIDA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TUMEDIDA $TUMEDIDA){
        try{
            $query = "
    UPDATE  material_tumedida  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 1
    WHERE  ID_TUMEDIDA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TUMEDIDA->__GET('ID_TUMEDIDA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarTumedidaPorEmpresaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tumedida  WHERE ESTADO_REGISTRO = 1;	");
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


    public function obtenerNumero()
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(COUNT(NUMERO_TUMEDIDA),0) AS 'NUMERO'
                                                FROM  material_tumedida   ; ");
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