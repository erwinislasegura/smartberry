<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/EMPRESA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class EMPRESA_ADO {
    
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
 //LISTAR TODO CON LIMITE DE 8 FILAS       
    public function listarEmpresa(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_empresa   LIMIT 6;	");
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
    public function listarEmpresaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_empresa   WHERE   ESTADO_REGISTRO   = 1;	");
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
    public function listarEmpresa2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_empresa   WHERE   ESTADO_REGISTRO   = 0 ;	");
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
    public function verEmpresa($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_empresa   WHERE   ID_EMPRESA  = '".$ID."'");
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
   
  
    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION    
    public function buscarNombreEmpresa($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_empresa   WHERE   NOMBRE_EMPRESA   LIKE '%".$NOMBRE."%';");
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
    public function agregarEmpresa(EMPRESA $EMPRESA){
        try{
  
            
            $query=
            "INSERT INTO   principal_empresa   ( 
                                                  RUT_EMPRESA  , 
                                                  DV_EMPRESA  , 
                                                  NOMBRE_EMPRESA  , 
                                                  RAZON_SOCIAL_EMPRESA  , 
                                                  DIRECCION_EMPRESA  , 
                                                  GIRO_EMPRESA  ,  
                                                  TELEFONO_EMPRESA  , 
                                                  ENCARGADO_COMPRA_EMPRESA  , 
                                                  LOGO_EMPRESA  , 
                                                  ID_COMUNA  ,
                                                  ID_PROVINCIA  ,
                                                  ID_REGION  ,
                                                  ID_USUARIOI  ,
                                                  ID_USUARIOM  ,
                                                  INGRESO  ,
                                                  MODIFICACION  , 
                                                  ESTADO_REGISTRO, 
                                                  COC ,
                                                  FOLIO_MANUAL,
                                                  USO_CALIBRE 
                                             ) VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1, ?, ?, ?);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $EMPRESA->__GET('RUT_EMPRESA'),
                    $EMPRESA->__GET('DV_EMPRESA'),
                    $EMPRESA->__GET('NOMBRE_EMPRESA'),
                    $EMPRESA->__GET('RAZON_SOCIAL_EMPRESA'),
                    $EMPRESA->__GET('DIRECCION_EMPRESA'),
                    $EMPRESA->__GET('GIRO_EMPRESA'),
                    $EMPRESA->__GET('TELEFONO_EMPRESA'),
                    $EMPRESA->__GET('ENCARGADO_COMPRA_EMPRESA'), 
                    $EMPRESA->__GET('LOGO_EMPRESA'),
                    $EMPRESA->__GET('ID_COMUNA'),
                    $EMPRESA->__GET('ID_PROVINCIA'),
                    $EMPRESA->__GET('ID_REGION'),
                    $EMPRESA->__GET('ID_USUARIOI'),
                    $EMPRESA->__GET('ID_USUARIOM'),
                    $EMPRESA->__GET('COC'),
                    $EMPRESA->__GET('FOLIO_MANUAL'),
                    $EMPRESA->__GET('USO_CALIBRE')
                    )
                );
        //die($query);
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEmpresa(EMPRESA $EMPRESA){

        try{
            $query = "
		UPDATE   principal_empresa   SET
              MODIFICACION   = SYSDATE(),
			  RUT_EMPRESA   = ?,
			  DV_EMPRESA   = ?,
			  NOMBRE_EMPRESA   = ?,
              RAZON_SOCIAL_EMPRESA  = ?,
              DIRECCION_EMPRESA  = ?,
              GIRO_EMPRESA  = ?,
              TELEFONO_EMPRESA   = ?,
              ENCARGADO_COMPRA_EMPRESA   = ?,
              LOGO_EMPRESA   = ?,
              ID_COMUNA  = ?,
              ID_PROVINCIA  = ?,
              ID_REGION  = ?,
              ID_USUARIOM  = ?,
              COC  = ?,
              FOLIO_MANUAL  = ?,
              USO_CALIBRE  = ?
		WHERE   ID_EMPRESA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $EMPRESA->__GET('RUT_EMPRESA'),
                    $EMPRESA->__GET('DV_EMPRESA'),
                    $EMPRESA->__GET('NOMBRE_EMPRESA'),
                    $EMPRESA->__GET('RAZON_SOCIAL_EMPRESA'),
                    $EMPRESA->__GET('DIRECCION_EMPRESA'),
                    $EMPRESA->__GET('GIRO_EMPRESA'),
                    $EMPRESA->__GET('TELEFONO_EMPRESA'),
                    $EMPRESA->__GET('ENCARGADO_COMPRA_EMPRESA'),
                    $EMPRESA->__GET('LOGO_EMPRESA'),
                    $EMPRESA->__GET('ID_COMUNA'),
                    $EMPRESA->__GET('ID_PROVINCIA'),
                    $EMPRESA->__GET('ID_REGION'),
                    $EMPRESA->__GET('ID_USUARIOM'),
                    $EMPRESA->__GET('COC'),
                    $EMPRESA->__GET('FOLIO_MANUAL'),
                    $EMPRESA->__GET('USO_CALIBRE'),
                    $EMPRESA->__GET('ID_EMPRESA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarempresa($id){
        try{$sql="DELETE FROM   principal_empresa   WHERE   nombre_empresa  =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }

    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(EMPRESA $EMPRESA){

        try{
            $query = "
		UPDATE   principal_empresa   SET			
          MODIFICACION  = SYSDATE(),		
              ESTADO_REGISTRO   = 0
		WHERE   ID_EMPRESA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $EMPRESA->__GET('ID_EMPRESA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EMPRESA $EMPRESA){
        try{
            $query = "
		UPDATE   principal_empresa   SET			
          MODIFICACION  = SYSDATE(),		
              ESTADO_REGISTRO   = 1
		WHERE   ID_EMPRESA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $EMPRESA->__GET('ID_EMPRESA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }




 
    

    
    
    
}
?>