<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TDOCUMENTO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TDOCUMENTO_ADO {
    
    
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
    public function listarTdocumento(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tdocumento  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarTdocumentoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tdocumento  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarTdocumento2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tdocumento  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verTdocumento($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tdocumento  WHERE  ID_TDOCUMENTO = '".$ID."';");
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

    public function agregarTdocumento(TDOCUMENTO $TDOCUMENTO){
        try{
            
            
            $query=
            "INSERT INTO  material_tdocumento  (
                                                     NUMERO_TDOCUMENTO , 
                                                     NOMBRE_TDOCUMENTO , 
                                                     ID_EMPRESA ,
                                                     ID_USUARIOI ,
                                                     ID_USUARIOM ,
                                                     INGRESO ,
                                                     MODIFICACION , 
                                                     ESTADO_REGISTRO 
                                                ) VALUES
	       	( ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TDOCUMENTO->__GET('NUMERO_TDOCUMENTO')  ,
                    $TDOCUMENTO->__GET('NOMBRE_TDOCUMENTO')  ,
                    $TDOCUMENTO->__GET('ID_EMPRESA') ,      
                    $TDOCUMENTO->__GET('ID_USUARIOI') , 
                    $TDOCUMENTO->__GET('ID_USUARIOM')              
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTdocumento($id){
        try{$sql="DELETE FROM  material_tdocumento  WHERE  ID_TDOCUMENTO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTdocumento(TDOCUMENTO $TDOCUMENTO){
        try{
            $query = "
		UPDATE  material_tdocumento  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_TDOCUMENTO = ?,
             ID_EMPRESA = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TDOCUMENTO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $TDOCUMENTO->__GET('NOMBRE_TDOCUMENTO'), 
                    $TDOCUMENTO->__GET('ID_EMPRESA') ,        
                    $TDOCUMENTO->__GET('ID_USUARIOM') ,          
                    $TDOCUMENTO->__GET('ID_TDOCUMENTO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TDOCUMENTO $TDOCUMENTO){

        try{
            $query = "
    UPDATE  material_tdocumento  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_TDOCUMENTO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TDOCUMENTO->__GET('ID_TDOCUMENTO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TDOCUMENTO $TDOCUMENTO){
        try{
            $query = "
    UPDATE  material_tdocumento  SET		
     MODIFICACION = SYSDATE(),			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TDOCUMENTO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TDOCUMENTO->__GET('ID_TDOCUMENTO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarTdocumentoPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_tdocumento  WHERE ESTADO_REGISTRO = 1 AND ID_EMPRESA = '".$IDEMPRESA."';	");
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
                                                IFNULL(COUNT(NUMERO_TDOCUMENTO),0) AS 'NUMERO'
                                            FROM  material_tdocumento   ; ");
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