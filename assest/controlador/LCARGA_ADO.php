<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/LCARGA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class LCARGA_ADO {
    
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
    public function listarLcarga(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_lcarga  limit 8;	");
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



    public function listarLcargaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_lcarga   WHERE ESTADO_REGISTRO = 1;	");
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
    
    public function listarLcargaCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_lcarga   WHERE ESTADO_REGISTRO = 0;	");
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
    public function verLcarga($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_lcarga  WHERE  ID_LCARGA = '".$ID."';");
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
    public function buscarNombreLcarga($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_lcarga  WHERE  NOMBRE_LCARGA  LIKE '%".$NOMBRE."%';");
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
    public function agregarLcarga(LCARGA $LCARGA){
        try{
            
            
            $query=
            "INSERT INTO  fruta_lcarga  (
                                             NUMERO_LCARGA , 
                                             NOMBRE_LCARGA , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM , 
                                             INGRESO ,
                                             MODIFICACION ,
                                             ESTADO_REGISTRO 
                                        ) VALUES
	       	( ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $LCARGA->__GET('NUMERO_LCARGA'),
                    $LCARGA->__GET('NOMBRE_LCARGA'),
                    $LCARGA->__GET('ID_EMPRESA'),
                    $LCARGA->__GET('ID_USUARIOI'),
                    $LCARGA->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarLcarga($id){
        try{$sql="DELETE FROM  fruta_lcarga  WHERE  ID_LCARGA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarLcarga(LCARGA $LCARGA){
        try{
            $query = "
		UPDATE  fruta_lcarga  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_LCARGA = ?,
             ID_USUARIOM = ?            
		WHERE  ID_LCARGA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $LCARGA->__GET('NOMBRE_LCARGA')      ,     
                    $LCARGA->__GET('ID_USUARIOM'),   
                    $LCARGA->__GET('ID_LCARGA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(LCARGA $LCARGA){

        try{
            $query = "
    UPDATE  fruta_lcarga  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_LCARGA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $LCARGA->__GET('ID_LCARGA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(LCARGA $LCARGA){
        try{
            $query = "
    UPDATE  fruta_lcarga  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_LCARGA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $LCARGA->__GET('ID_LCARGA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarLcargaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_lcarga   
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
                                                IFNULL(COUNT(NUMERO_LCARGA),0) AS 'NUMERO'
                                            FROM  fruta_lcarga 
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