<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TUSUARIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TUSUARIO_ADO {
    
    
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
    public function listarTusuario(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_tusuario  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarTusuarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_tusuario  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarTusuario2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_tusuario  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verTusuario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_tusuario  WHERE  ID_TUSUARIO = '".$ID."';");
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

  
    
    private   $ID_USUARIOI;
    private   $ID_USUARIOM;
    //REGISTRO DE UNA NUEVA FILA    

    public function agregarTusuario(TUSUARIO $TUSUARIO){
        try{
            
            
            $query=
            "INSERT INTO  usuario_tusuario  ( 
                                             NOMBRE_TUSUARIO ,  
                                             ID_USUARIOI , 
                                             ID_USUARIOM , 
                                             INGRESO , 
                                             MODIFICACION ,  
                                             ESTADO_REGISTRO 
                                             ) VALUES
	       	( ?, ?,?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $TUSUARIO->__GET('NOMBRE_TUSUARIO')  ,
                    $TUSUARIO->__GET('ID_USUARIOI')   ,
                    $TUSUARIO->__GET('ID_USUARIOM')                
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTusuario($id){
        try{$sql="DELETE FROM  usuario_tusuario  WHERE  ID_TUSUARIO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTusuario(TUSUARIO $TUSUARIO){
        try{
            $query = "
		UPDATE  usuario_tusuario  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_TUSUARIO = ?,
             ID_USUARIOI = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TUSUARIO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TUSUARIO->__GET('NOMBRE_TUSUARIO'),    
                    $TUSUARIO->__GET('ID_USUARIOI')   ,
                    $TUSUARIO->__GET('ID_USUARIOM')  ,                
                    $TUSUARIO->__GET('ID_TUSUARIO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TUSUARIO $TUSUARIO){

        try{
            $query = "
    UPDATE  usuario_tusuario  SET		
             MODIFICACION = SYSDATE(),			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TUSUARIO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TUSUARIO->__GET('ID_TUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TUSUARIO $TUSUARIO){
        try{
            $query = "
    UPDATE  usuario_tusuario  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 1
    WHERE  ID_TUSUARIO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TUSUARIO->__GET('ID_TUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

}
?>