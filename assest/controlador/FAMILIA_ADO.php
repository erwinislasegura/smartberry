<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/FAMILIA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class FAMILIA_ADO {
    
    
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
    public function listarFamilia(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_familia  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarFamiliaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_familia  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarFamilia2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_familia  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verFamilia($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_familia  WHERE  ID_FAMILIA = '".$ID."';");
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

    public function agregarFamilia(FAMILIA $FAMILIA){
        try{
            
            
            $query=
            "INSERT INTO  material_familia  (
                                                 NUMERO_FAMILIA , 
                                                 NOMBRE_FAMILIA , 
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
                    $FAMILIA->__GET('NUMERO_FAMILIA')  ,
                    $FAMILIA->__GET('NOMBRE_FAMILIA')  ,
                    $FAMILIA->__GET('ID_EMPRESA') ,
                    $FAMILIA->__GET('ID_USUARIOI'),
                    $FAMILIA->__GET('ID_USUARIOM')              
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarFamilia($id){
        try{$sql="DELETE FROM  material_familia  WHERE  ID_FAMILIA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarFamilia(FAMILIA $FAMILIA){
        try{
            $query = "
		UPDATE  material_familia  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_FAMILIA = ?,
             ID_EMPRESA = ?    ,
             ID_USUARIOM = ?         
		WHERE  ID_FAMILIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $FAMILIA->__GET('NOMBRE_FAMILIA')  ,
                    $FAMILIA->__GET('ID_EMPRESA') ,
                    $FAMILIA->__GET('ID_USUARIOM') ,              
                    $FAMILIA->__GET('ID_FAMILIA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(FAMILIA $FAMILIA){

        try{
            $query = "
    UPDATE  material_familia  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 0
    WHERE  ID_FAMILIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FAMILIA->__GET('ID_FAMILIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(FAMILIA $FAMILIA){
        try{
            $query = "
    UPDATE  material_familia  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 1
    WHERE  ID_FAMILIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FAMILIA->__GET('ID_FAMILIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarFamiliaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                *
                                             FROM  material_familia  
                                             WHERE ESTADO_REGISTRO = 1 
                                             AND ID_EMPRESA = '".$IDEMPRESA."';	");
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
                                                    IFNULL(COUNT(NUMERO_FAMILIA),0) AS 'NUMERO'
                                                FROM  material_familia 
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