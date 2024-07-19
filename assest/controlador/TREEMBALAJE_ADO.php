<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TREEMBALAJE.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TREEMBALAJE_ADO {
   
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
    public function listarTreembalaje(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_treembalaje  limit 8;	");
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
    public function listarTreembalajeCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_treembalaje  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarTreembalaje2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_treembalaje  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verTreembalaje($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_treembalaje  WHERE  ID_TREEMBALAJE = '".$ID."';");
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
    public function buscarNombreTreembalaje($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_treembalaje  WHERE  NOMBRE_TREEMBALAJE  LIKE '%".$NOMBRE."%';");
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
    public function agregarTreembalaje(TREEMBALAJE $TREEMBALAJE){
        try{
            
            
            $query=
            "INSERT INTO  fruta_treembalaje  (
                                                 NOMBRE_TREEMBALAJE , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM ,
                                                 INGRESO,
                                                 MODIFICACION,
                                                 ESTADO_REGISTRO 
                                             ) VALUES
	       	( ?, ?, ?, SYSDATE() , SYSDATE(),  1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $TREEMBALAJE->__GET('NOMBRE_TREEMBALAJE'),
                    $TREEMBALAJE->__GET('ID_USUARIOI'),
                    $TREEMBALAJE->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTreembalaje($id){
        try{$sql="DELETE FROM  fruta_treembalaje  WHERE  ID_TREEMBALAJE =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTreembalaje(TREEMBALAJE $TREEMBALAJE){
        try{
            $query = "
                UPDATE  fruta_treembalaje  SET
                    MODIFICACION= SYSDATE(),
                    NOMBRE_TREEMBALAJE = ?,
                    ID_USUARIOM = ?            
                WHERE  ID_TREEMBALAJE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TREEMBALAJE->__GET('NOMBRE_TREEMBALAJE'),     
                    $TREEMBALAJE->__GET('ID_USUARIOM'),    
                    $TREEMBALAJE->__GET('ID_TREEMBALAJE')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
   
    //FUNCIONES ESPECIALIZADAS  
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TREEMBALAJE $TREEMBALAJE){

        try{
            $query = "
    UPDATE  fruta_treembalaje  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TREEMBALAJE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TREEMBALAJE->__GET('ID_TREEMBALAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TREEMBALAJE $TREEMBALAJE){
        try{
            $query = "
    UPDATE  fruta_treembalaje  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TREEMBALAJE = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TREEMBALAJE->__GET('ID_TREEMBALAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function validar2($NOMBRETREEMBALAJE , $NOMBRETREEMBALAJEV){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_treembalaje  WHERE  NOMBRE_TREEMBALAJE  LIKE '%".$NOMBRETREEMBALAJE."%' AND  NOMBRE_TREEMBALAJE  LIKE '%".$NOMBRETREEMBALAJEV."%' ;");
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
    public function validar1($NOMBRETREEMBALAJE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_treembalaje  WHERE  NOMBRE_TREEMBALAJE  LIKE '%".$NOMBRETREEMBALAJE."%';");
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

    
}
?>