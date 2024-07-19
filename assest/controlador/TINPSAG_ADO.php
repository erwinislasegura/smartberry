<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TINPSAG.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TINPSAG_ADO {
   
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
    public function listarTinpsag(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tinpsag  limit 8;	");
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
    public function listarTinpsagCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tinpsag  WHERE  ESTADO_REGISTRO  = 1;	");
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


    public function listarTinpsag2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tinpsag  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verTinpsag($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tinpsag  WHERE  ID_TINPSAG = '".$ID."';");
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
    public function buscarNombreTinpsag($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tinpsag  WHERE  NOMBRE_TINPSAG  LIKE '%".$NOMBRE."%';");
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
    public function agregarTinpsag(TINPSAG $TINPSAG){
        try{
            
            
            $query=
            "INSERT INTO  fruta_tinpsag  (
                                                 NOMBRE_TINPSAG , 
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
                    
                    $TINPSAG->__GET('NOMBRE_TINPSAG'),
                    $TINPSAG->__GET('ID_USUARIOI'),
                    $TINPSAG->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTinpsag($id){
        try{$sql="DELETE FROM  fruta_tinpsag  WHERE  ID_TINPSAG =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTinpsag(TINPSAG $TINPSAG){
        try{
            $query = "
		UPDATE  fruta_tinpsag  SET
             MODIFICACION= SYSDATE(),
             NOMBRE_TINPSAG = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TINPSAG = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TINPSAG->__GET('NOMBRE_TINPSAG'),    
                    $TINPSAG->__GET('ID_USUARIOM'),     
                    $TINPSAG->__GET('ID_TINPSAG')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
   
    //FUNCIONES ESPECIALIZADAS  

    
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TINPSAG $TINPSAG){

        try{
            $query = "
    UPDATE  fruta_tinpsag  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_TINPSAG = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TINPSAG->__GET('ID_TINPSAG')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TINPSAG $TINPSAG){
        try{
            $query = "
    UPDATE  fruta_tinpsag  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_TINPSAG = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TINPSAG->__GET('ID_TINPSAG')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
}
?>