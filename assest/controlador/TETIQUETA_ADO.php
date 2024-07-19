<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TETIQUETA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TETIQUETA_ADO {
    
   
    
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
    public function listarEtiqueta(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tetiqueta  limit 8;	");
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
    public function listarEtiquetaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tetiqueta  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarEtiqueta2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tetiqueta  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verEtiqueta($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tetiqueta  WHERE  ID_TETIQUETA = '".$ID."';");
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
    public function buscarNombreEtiqueta($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tetiqueta  WHERE  NOMBRE_TETIQUETA  LIKE '%".$NOMBRE."%';");
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
    public function agregarEtiqueta(TETIQUETA $TETIQUETA){
        try{
            
            
            $query=
            "INSERT INTO  fruta_tetiqueta  (
                                                 NUMERO_TETIQUETA , 
                                                 NOMBRE_TETIQUETA , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM , 
                                                 INGRESO ,
                                                 MODIFICACION , 
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $TETIQUETA->__GET('NUMERO_TETIQUETA')  ,  
                    $TETIQUETA->__GET('NOMBRE_TETIQUETA')  ,  
                    $TETIQUETA->__GET('ID_EMPRESA')  ,  
                    $TETIQUETA->__GET('ID_USUARIOI')  ,  
                    $TETIQUETA->__GET('ID_USUARIOM')                   
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarEtiqueta($id){
        try{$sql="DELETE FROM  fruta_tetiqueta  WHERE  ID_TETIQUETA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEtiqueta(TETIQUETA $TETIQUETA){
        try{
            $query = "
                UPDATE  fruta_tetiqueta  SET
                    MODIFICACION = SYSDATE(),
                    NOMBRE_TETIQUETA = ?    ,
                    ID_USUARIOM = ?           
                WHERE  ID_TETIQUETA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TETIQUETA->__GET('NOMBRE_TETIQUETA')   , 
                    $TETIQUETA->__GET('ID_USUARIOM') ,               
                    $TETIQUETA->__GET('ID_TETIQUETA')
                    
                )
                
        );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TETIQUETA $TETIQUETA){

        try{
            $query = "
                UPDATE  fruta_tetiqueta  SET			
                         ESTADO_REGISTRO  = 0
                WHERE  ID_TETIQUETA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TETIQUETA->__GET('ID_TETIQUETA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TETIQUETA $TETIQUETA){
        try{
            $query = "
                UPDATE  fruta_tetiqueta  SET			
                         ESTADO_REGISTRO  = 1
                WHERE  ID_TETIQUETA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TETIQUETA->__GET('ID_TETIQUETA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarEtiquetaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tetiqueta  
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
                                                IFNULL(COUNT(NUMERO_TETIQUETA),0) AS 'NUMERO'
                                            FROM  fruta_tetiqueta 
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