<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TCOLOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TCOLOR_ADO {
   
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
    public function listarTcolor(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcolor  limit 8;	");
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
    public function listarTcolorCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcolor  WHERE  ESTADO_REGISTRO  = 1;	");
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


    public function listarTcolor2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcolor  WHERE  ESTADO_REGISTRO  = 0;	");
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

    public function listarTcolorPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  fruta_tcolor 
                                            WHERE  ESTADO_REGISTRO  = 1
                                            AND ID_EMPRESA='".$IDEMPRESA."';	");
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
    public function verTcolor($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcolor  WHERE  ID_TCOLOR = '".$ID."';");
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
    public function buscarNombreTcolor($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcolor  WHERE  NOMBRE_TCOLOR  LIKE '%".$NOMBRE."%';");
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
    public function agregarTcolor(TCOLOR $TCOLOR){
        try{
            
            
            $query=
            "INSERT INTO  fruta_tcolor  (
                                             NUMERO_TCOLOR , 
                                             NOMBRE_TCOLOR , 
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
                    
                    $TCOLOR->__GET('NUMERO_TCOLOR'),
                    $TCOLOR->__GET('NOMBRE_TCOLOR'),
                    $TCOLOR->__GET('ID_EMPRESA'),
                    $TCOLOR->__GET('ID_USUARIOI'),
                    $TCOLOR->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTcolor($id){
        try{$sql="DELETE FROM  fruta_tcolor  WHERE  ID_TCOLOR =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTcolor(TCOLOR $TCOLOR){
        try{
            $query = "
		UPDATE  fruta_tcolor  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_TCOLOR = ?,
             ID_EMPRESA = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TCOLOR = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TCOLOR->__GET('NOMBRE_TCOLOR'),  
                    $TCOLOR->__GET('ID_EMPRESA'),  
                    $TCOLOR->__GET('ID_USUARIOM'),     
                    $TCOLOR->__GET('ID_TCOLOR')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
   
    //FUNCIONES ESPECIALIZADAS  
  

    
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TCOLOR $TCOLOR){

        try{
            $query = "
    UPDATE  fruta_tcolor  SET	
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_TCOLOR = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TCOLOR->__GET('ID_TCOLOR')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TCOLOR $TCOLOR){
        try{
            $query = "
    UPDATE  fruta_tcolor  SET	
             MODIFICACION = SYSDATE(),           		
             ESTADO_REGISTRO  = 1
    WHERE  ID_TCOLOR = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TCOLOR->__GET('ID_TCOLOR')                    
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
                                                    IFNULL(COUNT(NUMERO_TCOLOR),0) AS 'NUMERO'
                                                FROM `fruta_tcolor`
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