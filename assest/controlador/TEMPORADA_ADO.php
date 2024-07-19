<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TEMPORADA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TEMPORADA_ADO {
    
    
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
    public function listarTemporada(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_temporada   limit 8;	");
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
    public function listarTemporadaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_temporada   WHERE   ESTADO_REGISTRO   = 1;	");
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
    public function listarTemporada2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_temporada   WHERE   ESTADO_REGISTRO   = 0;	");
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
    public function verTemporada($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_temporada   WHERE   ID_TEMPORADA  = '".$ID."';");
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
    public function buscarNombreTemporada($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_temporada   WHERE   NOMBRE_TEMPORADA   LIKE '%".$NOMBRE."%';");
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
    public function agregarTemporada(TEMPORADA $TEMPORADA){
        try{



            if ($TEMPORADA->__GET('FECHA_TERMINO_TEMPORADA') == NULL) {
                $TEMPORADA->__SET('FECHA_TERMINO_TEMPORADA', NULL);
            }
            
            $query=
            "INSERT INTO   principal_temporada   (
                                                      NOMBRE_TEMPORADA  ,
                                                      FECHA_INICIO_TEMPORADA  ,
                                                      FECHA_TERMINO_TEMPORADA  ,
                                                      ID_USUARIOI  , 
                                                      ID_USUARIOM  , 
                                                      INGRESO  ,
                                                      MODIFICACION  , 
                                                      ESTADO_REGISTRO   
                                                ) VALUES
	       	( ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(),  1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $TEMPORADA->__GET('NOMBRE_TEMPORADA'),
                    $TEMPORADA->__GET('FECHA_INICIO_TEMPORADA'),
                    $TEMPORADA->__GET('FECHA_TERMINO_TEMPORADA'),
                    $TEMPORADA->__GET('ID_USUARIOI'),
                    $TEMPORADA->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTemporada($id){
        try{$sql="DELETE FROM   principal_temporada   WHERE   ID_TEMPORADA  =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTemporada(TEMPORADA $TEMPORADA){
        try{
            $query = "
                UPDATE   principal_temporada   SET
                    MODIFICACION  = SYSDATE(),
                    FECHA_INICIO_TEMPORADA  = ?,
                    FECHA_TERMINO_TEMPORADA  = ?   ,
                    NOMBRE_TEMPORADA  = ?,
                    ID_USUARIOM  = ?           
                WHERE   ID_TEMPORADA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TEMPORADA->__GET('FECHA_INICIO_TEMPORADA'),
                    $TEMPORADA->__GET('FECHA_TERMINO_TEMPORADA'),  
                    $TEMPORADA->__GET('NOMBRE_TEMPORADA'),
                    $TEMPORADA->__GET('ID_USUARIOM'),                
                    $TEMPORADA->__GET('ID_TEMPORADA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TEMPORADA $TEMPORADA){

        try{
            $query = "
    UPDATE   principal_temporada   SET			
              MODIFICACION  = SYSDATE(),		
              ESTADO_REGISTRO   = 0
    WHERE   ID_TEMPORADA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TEMPORADA->__GET('ID_TEMPORADA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TEMPORADA $TEMPORADA){
        try{
            $query = "
    UPDATE   principal_temporada   SET				
              MODIFICACION  = SYSDATE(),	
              ESTADO_REGISTRO   = 1
    WHERE   ID_TEMPORADA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TEMPORADA->__GET('ID_TEMPORADA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }



        

}
?>