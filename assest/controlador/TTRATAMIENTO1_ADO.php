<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TTRATAMIENTO1.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TTRATAMIENTO1_ADO {
   
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
    public function listarTtratamiento(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tratamineto1  limit 8;	");
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
    public function listarTtratamientoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tratamineto1  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarTtratamientoPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  fruta_tratamineto1  
                                            WHERE  ESTADO_REGISTRO  = 1  
                                            AND ID_EMPRESA ='".$IDEMPRESA."';	");
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

    public function listarTtratamiento2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tratamineto1  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verTtratamiento($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tratamineto1  WHERE  ID_TTRATAMIENTO = '".$ID."';");
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
    public function buscarNombreTtratamiento($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tratamineto1  WHERE  NOMBRE_TTRATAMIENTO  LIKE '%".$NOMBRE."%';");
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
    public function agregarTtratamiento(TTRATAMIENTO1 $TTRATAMIENTO1){
        try{
            
            
            $query=
            "INSERT INTO  fruta_tratamineto1  (
                                             NUMERO_TTRATAMIENTO , 
                                             NOMBRE_TTRATAMIENTO , 
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
                    
                    $TTRATAMIENTO1->__GET('NUMERO_TTRATAMIENTO'),
                    $TTRATAMIENTO1->__GET('NOMBRE_TTRATAMIENTO'),
                    $TTRATAMIENTO1->__GET('ID_EMPRESA'),
                    $TTRATAMIENTO1->__GET('ID_USUARIOI'),
                    $TTRATAMIENTO1->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTtratamiento($id){
        try{$sql="DELETE FROM  fruta_tratamineto1  WHERE  ID_TTRATAMIENTO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTtratamiento(TTRATAMIENTO1 $TTRATAMIENTO1){
        try{
            $query = "
		UPDATE  fruta_tratamineto1  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_TTRATAMIENTO = ?,
             ID_EMPRESA = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TTRATAMIENTO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TTRATAMIENTO1->__GET('NOMBRE_TTRATAMIENTO'),   
                    $TTRATAMIENTO1->__GET('ID_EMPRESA'), 
                    $TTRATAMIENTO1->__GET('ID_USUARIOM'),     
                    $TTRATAMIENTO1->__GET('ID_TTRATAMIENTO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
   
    //FUNCIONES ESPECIALIZADAS  
  

    
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TTRATAMIENTO1 $TTRATAMIENTO1){

        try{
            $query = "
    UPDATE  fruta_tratamineto1  SET	
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_TTRATAMIENTO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TTRATAMIENTO1->__GET('ID_TTRATAMIENTO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TTRATAMIENTO1 $TTRATAMIENTO1){
        try{
            $query = "
    UPDATE  fruta_tratamineto1  SET	
             MODIFICACION = SYSDATE(),           		
             ESTADO_REGISTRO  = 1
    WHERE  ID_TTRATAMIENTO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TTRATAMIENTO1->__GET('ID_TTRATAMIENTO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerNumero($IDEMPRESA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(COUNT(NUMERO_TTRATAMIENTO),0) AS 'NUMERO'
                                                FROM `fruta_tratamineto1`
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