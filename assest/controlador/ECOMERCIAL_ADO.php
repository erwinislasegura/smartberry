<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/ECOMERCIAL.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class ECOMERCIAL_ADO {
    
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
    public function listarEcomercial(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  estandar_ecomercial  LIMIT 6;	");
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
    public function listarEcomercialCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  estandar_ecomercial  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarEcomercial2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  estandar_ecomercial  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verEcomercial($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  estandar_ecomercial  WHERE  ID_ECOMERCIAL = '".$ID."';");
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
    public function buscarNombreEcomercial($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  estandar_ecomercial  WHERE  NOMBRE_ECOMERCIAL  LIKE '%".$NOMBRE."%';");
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
    public function agregarEcomercial(ECOMERCIAL $ECOMERCIAL){
        try{
  
            
            $query=
            "INSERT INTO  estandar_ecomercial  (
                                                     CODIGO_ECOMERCIAL , 
                                                     NOMBRE_ECOMERCIAL , 
                                                     DESCRIPCION_ECOMERCIAL , 
                                                     PESO_NETO_ECOMERCIAL , 
                                                     PESO_BRUTO_ECOMERCIAL , 
                                                     ID_EMPRESA , 
                                                     ID_USUARIOI , 
                                                     ID_USUARIOM , 
                                                     INGRESO ,
                                                     MODIFICACION ,
                                                     ESTADO_REGISTRO 
                                                ) VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE(), SYSDATE(),  1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $ECOMERCIAL->__GET('CODIGO_ECOMERCIAL'), 
                    $ECOMERCIAL->__GET('NOMBRE_ECOMERCIAL'),
                    $ECOMERCIAL->__GET('DESCRIPCION_ECOMERCIAL'),
                    $ECOMERCIAL->__GET('PESO_NETO_ECOMERCIAL'),
                    $ECOMERCIAL->__GET('PESO_BRUTO_ECOMERCIAL'),
                    $ECOMERCIAL->__GET('ID_EMPRESA'),
                    $ECOMERCIAL->__GET('ID_USUARIOI'),
                    $ECOMERCIAL->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEcomercial(ECOMERCIAL $ECOMERCIAL){

        try{
            $query = "
                UPDATE  estandar_ecomercial  SET
                    MODIFICACION = SYSDATE(),
                    CODIGO_ECOMERCIAL  = ?,
                    NOMBRE_ECOMERCIAL  = ?,
                    DESCRIPCION_ECOMERCIAL  = ?,
                    PESO_NETO_ECOMERCIAL  = ?,
                    PESO_BRUTO_ECOMERCIAL = ?,
                    ID_USUARIOM = ?
                WHERE  ID_ECOMERCIAL = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $ECOMERCIAL->__GET('CODIGO_ECOMERCIAL'), 
                    $ECOMERCIAL->__GET('NOMBRE_ECOMERCIAL'),
                    $ECOMERCIAL->__GET('DESCRIPCION_ECOMERCIAL'),
                    $ECOMERCIAL->__GET('PESO_NETO_ECOMERCIAL'),
                    $ECOMERCIAL->__GET('PESO_BRUTO_ECOMERCIAL'),
                    $ECOMERCIAL->__GET('ID_USUARIOM'),
                    $ECOMERCIAL->__GET('ID_ECOMERCIAL')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarCcomercial($id){
        try{$sql="DELETE FROM  estandar_ecomercial  WHERE  ID_ECOMERCIAL =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
 
    
//FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(ECOMERCIAL $ECOMERCIAL){

        try{
            $query = "
    UPDATE  estandar_ecomercial  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_ECOMERCIAL = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ECOMERCIAL->__GET('ID_ECOMERCIAL')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(ECOMERCIAL $ECOMERCIAL){
        try{
            $query = "
    UPDATE  estandar_ecomercial  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_ECOMERCIAL = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ECOMERCIAL->__GET('ID_ECOMERCIAL')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    public function listarEcomercialPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  estandar_ecomercial 
                                             WHERE  ESTADO_REGISTRO  = 1 
                                              AND ID_EMPRESA = '" . $IDEMPRESA . "' ;	");
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