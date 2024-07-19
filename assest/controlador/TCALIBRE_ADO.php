<?php
include_once '../../assest/modelo/TCALIBRE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TCALIBRE_ADO {
    
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
    
    public function listarCalibre(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibre  limit 8;	");
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
    public function listarCalibreCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibre  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarCalibre2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibre  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verCalibre($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibre  WHERE  ID_TCALIBRE = '".$ID."';");
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
    public function buscarNombreCalibre($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibre  WHERE  NOMBRE_TCALIBRE  LIKE '%".$NOMBRE."%';");
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
    public function agregarCalibre(TCALIBRE $TCALIBRE){
        try{
            
            
            $query=
            "INSERT INTO  fruta_tcalibre  (
                                             NUMERO_TCALIBRE , 
                                             NOMBRE_TCALIBRE , 
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
                    
                    $TCALIBRE->__GET('NUMERO_TCALIBRE'),
                    $TCALIBRE->__GET('NOMBRE_TCALIBRE'),
                    $TCALIBRE->__GET('ID_EMPRESA'),
                    $TCALIBRE->__GET('ID_USUARIOI'),
                    $TCALIBRE->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarCalibre($id){
        try{$sql="DELETE FROM  fruta_tcalibre  WHERE  ID_TCALIBRE =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
  
    //ACTUALIZAR INFORMACION DE LA FILA    
    public function actualizarCalibre(TCALIBRE $TCALIBRE){
        try{
            $query = "
                UPDATE  fruta_tcalibre  SET
                    MODIFICACION = SYSDATE(),
                    NOMBRE_TCALIBRE = ?,
                    ID_USUARIOM = ?            
                WHERE  ID_TCALIBRE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TCALIBRE->__GET('NOMBRE_TCALIBRE')  ,  
                    $TCALIBRE->__GET('ID_USUARIOM'),          
                    $TCALIBRE->__GET('ID_TCALIBRE')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZDAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TCALIBRE $TCALIBRE){

        try{
            $query = "
    UPDATE  fruta_tcalibre  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TCALIBRE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TCALIBRE->__GET('ID_TCALIBRE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TCALIBRE $TCALIBRE){
        try{
            $query = "
    UPDATE  fruta_tcalibre  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TCALIBRE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TCALIBRE->__GET('ID_TCALIBRE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarCalibrePorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibre  
                                            WHERE  ESTADO_REGISTRO  = 1
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
                                                IFNULL(COUNT(NUMERO_TCALIBRE),0) AS 'NUMERO'
                                            FROM  fruta_tcalibre 
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