<?php
include_once '../../assest/modelo/TCALIBREIND.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TCALIBREIND_ADO {
    
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
    
    public function listarCalibreInd(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibreind  limit 8;	");
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
    public function listarCalibreIndCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibreind  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarCalibreInd2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibreind  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verCalibreInd($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibreind  WHERE  ID_TCALIBREIND = '".$ID."';");
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
    public function buscarNombreCalibreInd($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibreind  WHERE  NOMBRE_TCALIBREIND  LIKE '%".$NOMBRE."%';");
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
    public function agregarCalibreInd(TCALIBREIND $TCALIBREIND){
        try{
            
            
            $query=
            "INSERT INTO  fruta_tcalibreind  (
                                             NUMERO_TCALIBREIND , 
                                             NOMBRE_TCALIBREIND , 
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
                    
                    $TCALIBREIND->__GET('NUMERO_TCALIBREIND'),
                    $TCALIBREIND->__GET('NOMBRE_TCALIBREIND'),
                    $TCALIBREIND->__GET('ID_EMPRESA'),
                    $TCALIBREIND->__GET('ID_USUARIOI'),
                    $TCALIBREIND->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarCalibreInd($id){
        try{$sql="DELETE FROM  fruta_tcalibreind  WHERE  ID_TCALIBREIND =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
  
    //ACTUALIZAR INFORMACION DE LA FILA    
    public function actualizarCalibreInd(TCALIBREIND $TCALIBREIND){
        try{
            $query = "
                UPDATE  fruta_tcalibreind  SET
                    MODIFICACION = SYSDATE(),
                    NOMBRE_TCALIBREIND = ?,
                    ID_USUARIOM = ?            
                WHERE  ID_TCALIBREIND = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TCALIBREIND->__GET('NOMBRE_TCALIBREIND')  ,  
                    $TCALIBREIND->__GET('ID_USUARIOM'),          
                    $TCALIBREIND->__GET('ID_TCALIBREIND')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZDAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TCALIBREIND $TCALIBREIND){

        try{
            $query = "
    UPDATE  fruta_tcalibreind  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TCALIBREIND = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TCALIBREIND->__GET('ID_TCALIBREIND')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TCALIBREIND $TCALIBREIND){
        try{
            $query = "
    UPDATE  fruta_tcalibreind  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TCALIBREIND = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TCALIBREIND->__GET('ID_TCALIBREIND')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarCalibreIndPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcalibreind  
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
                                                IFNULL(COUNT(NUMERO_TCALIBREIND),0) AS 'NUMERO'
                                            FROM  fruta_tcalibreind 
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