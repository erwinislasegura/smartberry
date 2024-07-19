<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TEMBALAJE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TEMBALAJE_ADO {
    
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
    public function listarEmbalaje(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tembalaje  LIMIT 6;	");
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
    public function listarEmbalajeCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tembalaje  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarEmbalaje2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tembalaje  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verEmbalaje($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tembalaje  WHERE  ID_TEMBALAJE = '".$ID."';");
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
    public function buscarNombreEmbalaje($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tembalaje  WHERE  NOMBRE_TEMBALAJE  LIKE '%".$NOMBRE."%';");
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
    public function agregarEmbalaje(TEMBALAJE $TEMBALAJE){
        try{
  
            
            $query=
            "INSERT INTO  fruta_tembalaje  (
                                                 NUMERO_TEMBALAJE , 
                                                 NOMBRE_TEMBALAJE , 
                                                 PESO_TEMBALAJE ,  
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM , 
                                                 INGRESO ,
                                                 MODIFICACION , 
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	(?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $TEMBALAJE->__GET('NUMERO_TEMBALAJE'),
                    $TEMBALAJE->__GET('NOMBRE_TEMBALAJE'),
                    $TEMBALAJE->__GET('PESO_TEMBALAJE'),
                    $TEMBALAJE->__GET('ID_EMPRESA'),
                    $TEMBALAJE->__GET('ID_USUARIOI'),
                    $TEMBALAJE->__GET('ID_USUARIOM')   
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEmbalaje(TEMBALAJE $TEMBALAJE){

        try{
            $query = "
            UPDATE  fruta_tembalaje  SET
                MODIFICACION = SYSDATE(),
                NOMBRE_TEMBALAJE  = ?,
                PESO_TEMBALAJE = ?,
                ID_USUARIOM = ?
            WHERE  ID_TEMBALAJE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TEMBALAJE->__GET('NOMBRE_TEMBALAJE'),
                    $TEMBALAJE->__GET('PESO_TEMBALAJE'),
                    $TEMBALAJE->__GET('ID_USUARIOM'),
                    $TEMBALAJE->__GET('ID_TEMBALAJE')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarEmbalaje($id){
        try{$sql="DELETE FROM  fruta_tembalaje  WHERE  NOMBRE_TEMBALAJE =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
 
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TEMBALAJE $TEMBALAJE){

        try{
            $query = "
    UPDATE  fruta_tembalaje  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TEMBALAJE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TEMBALAJE->__GET('ID_TEMBALAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TEMBALAJE $TEMBALAJE){
        try{
            $query = "
    UPDATE  fruta_tembalaje  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TEMBALAJE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TEMBALAJE->__GET('ID_TEMBALAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function listarEmbalajePorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tembalaje  
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
                                                IFNULL(COUNT(NUMERO_TEMBALAJE),0) AS 'NUMERO'
                                            FROM  fruta_tembalaje 
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