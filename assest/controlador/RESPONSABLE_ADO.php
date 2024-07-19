<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/RESPONSABLE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class RESPONSABLE_ADO {
    
    
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
    public function listarResponsable(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_responsable  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarResponsableCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_responsable  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarResponsable2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_responsable  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verResponsable($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_responsable  WHERE  ID_RESPONSABLE = '".$ID."';");
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

    public function agregarResponsable(RESPONSABLE $RESPONSABLE){
        try{
            if($RESPONSABLE->__GET('ID_USUARIO')==NULL){
                $RESPONSABLE->__SET('ID_USUARIO', NULL);
            }
            if($RESPONSABLE->__GET('ID_COMUNA')==NULL){
                $RESPONSABLE->__SET('ID_COMUNA', NULL);
            }
            $query=
            "INSERT INTO  material_responsable  (    RUT_RESPONSABLE ,
                                                     DV_RESPONSABLE ,
                                                     NUMERO_RESPONSABLE ,
                                                     NOMBRE_RESPONSABLE ,
                                                     DIRECCION_RESPONSABLE ,
                                                     TELEFONO_RESPONSABLE ,
                                                     EMAIL_RESPONSABLE ,
                                                     ID_EMPRESA ,
                                                     ID_COMUNA ,
                                                     ID_USUARIO ,
                                                     ID_USUARIOI ,
                                                     ID_USUARIOM ,
                                                     INGRESO ,
                                                     MODIFICACION , 
                                                     ESTADO_REGISTRO ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(            
                    $RESPONSABLE->__GET('RUT_RESPONSABLE')  ,     
                    $RESPONSABLE->__GET('DV_RESPONSABLE')  , 
                    $RESPONSABLE->__GET('NUMERO_RESPONSABLE')  ,

                    $RESPONSABLE->__GET('NOMBRE_RESPONSABLE')  ,
                    $RESPONSABLE->__GET('DIRECCION_RESPONSABLE')  ,
                    $RESPONSABLE->__GET('TELEFONO_RESPONSABLE')  ,

                    $RESPONSABLE->__GET('EMAIL_RESPONSABLE') ,
                    $RESPONSABLE->__GET('ID_EMPRESA') ,
                    $RESPONSABLE->__GET('ID_COMUNA') ,
                    
                    $RESPONSABLE->__GET('ID_USUARIO') , 
                    $RESPONSABLE->__GET('ID_USUARIOI') ,
                    $RESPONSABLE->__GET('ID_USUARIOM')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarResponsable($id){
        try{$sql="DELETE FROM  material_responsable  WHERE  ID_RESPONSABLE =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarResponsable(RESPONSABLE $RESPONSABLE){
        try{
            if($RESPONSABLE->__GET('ID_USUARIO')==NULL){
                $RESPONSABLE->__SET('ID_USUARIO', NULL);
            }
            if($RESPONSABLE->__GET('ID_COMUNA')==NULL){
                $RESPONSABLE->__SET('ID_COMUNA', NULL);
            }
            $query = "
		UPDATE  material_responsable  SET
             MODIFICACION = SYSDATE(),
             RUT_RESPONSABLE = ?,
             DV_RESPONSABLE = ?,
             NOMBRE_RESPONSABLE = ?,
             DIRECCION_RESPONSABLE = ?,
             TELEFONO_RESPONSABLE = ?,
             EMAIL_RESPONSABLE = ?,
             ID_EMPRESA = ? ,
             ID_COMUNA = ? ,
             ID_USUARIO = ?   ,
             ID_USUARIOM = ?         
		WHERE  ID_RESPONSABLE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $RESPONSABLE->__GET('RUT_RESPONSABLE') ,
                    $RESPONSABLE->__GET('DV_RESPONSABLE') , 
                    $RESPONSABLE->__GET('NOMBRE_RESPONSABLE') ,
                    $RESPONSABLE->__GET('DIRECCION_RESPONSABLE')  ,
                    $RESPONSABLE->__GET('TELEFONO_RESPONSABLE')  ,
                    $RESPONSABLE->__GET('EMAIL_RESPONSABLE') ,
                    $RESPONSABLE->__GET('ID_EMPRESA') ,
                    $RESPONSABLE->__GET('ID_COMUNA') ,  
                    $RESPONSABLE->__GET('ID_USUARIO') , 
                    $RESPONSABLE->__GET('ID_USUARIOM') ,
                    $RESPONSABLE->__GET('ID_RESPONSABLE')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(RESPONSABLE $RESPONSABLE){

        try{
            $query = "
    UPDATE  material_responsable  SET				
             MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 0
    WHERE  ID_RESPONSABLE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RESPONSABLE->__GET('ID_RESPONSABLE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(RESPONSABLE $RESPONSABLE){
        try{
            $query = "
    UPDATE  material_responsable  SET			
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 1
    WHERE  ID_RESPONSABLE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $RESPONSABLE->__GET('ID_RESPONSABLE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarResponsablePorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_responsable  WHERE ESTADO_REGISTRO = 1  AND ID_EMPRESA = '".$IDEMPRESA."';	");
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
    public function listarResponsablePorEmpresaUsuarioCBX($IDEMPRESA, $IDUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                * 
                                            FROM  material_responsable  
                                                WHERE ESTADO_REGISTRO = 1  
                                                AND ID_EMPRESA = '".$IDEMPRESA."'
                                                AND ID_USUARIO = '".$IDUSUARIO."'
                                            ORDER BY ID_RESPONSABLE DESC;	");
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
                                                    IFNULL(COUNT(NUMERO_RESPONSABLE),0) AS 'NUMERO'
                                                FROM  material_responsable   ; ");
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