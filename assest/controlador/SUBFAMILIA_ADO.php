<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/SUBFAMILIA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class SUBFAMILIA_ADO {
    
    
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
    public function listarSubfamilia(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_subfamilia  limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarSubfamiliaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_subfamilia  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarSubfamilia2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_subfamilia  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verSubfamilia($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_subfamilia  WHERE  ID_SUBFAMILIA = '".$ID."';");
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

    public function agregarSubfamilia(SUBFAMILIA $SUBFAMILIA){
        try{
            
            
            $query=
            "INSERT INTO  material_subfamilia  (
                                                     NUMERO_SUBFAMILIA , 
                                                     NOMBRE_SUBFAMILIA , 
                                                     ID_EMPRESA ,
                                                     ID_FAMILIA ,
                                                     ID_USUARIOI ,
                                                     ID_USUARIOM ,
                                                     INGRESO ,
                                                     MODIFICACION , 
                                                     ESTADO_REGISTRO ) VALUES
	       	( ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $SUBFAMILIA->__GET('NUMERO_SUBFAMILIA')  ,
                    $SUBFAMILIA->__GET('NOMBRE_SUBFAMILIA')  ,
                    $SUBFAMILIA->__GET('ID_EMPRESA')    ,
                    $SUBFAMILIA->__GET('ID_FAMILIA')     ,
                    $SUBFAMILIA->__GET('ID_USUARIOI')     ,
                    $SUBFAMILIA->__GET('ID_USUARIOM')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarSubfamilia($id){
        try{$sql="DELETE FROM  material_subfamilia  WHERE  ID_SUBFAMILIA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarSubfamilia(SUBFAMILIA $SUBFAMILIA){
        try{
            $query = "
		UPDATE  material_subfamilia  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_SUBFAMILIA = ?,
             ID_EMPRESA = ?,
             ID_FAMILIA = ?  ,
             ID_USUARIOM = ?           
		WHERE  ID_SUBFAMILIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(   
                    $SUBFAMILIA->__GET('NOMBRE_SUBFAMILIA')  ,
                    $SUBFAMILIA->__GET('ID_EMPRESA') ,
                    $SUBFAMILIA->__GET('ID_FAMILIA') ,
                    $SUBFAMILIA->__GET('ID_USUARIOM') ,        
                    $SUBFAMILIA->__GET('ID_SUBFAMILIA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(SUBFAMILIA $SUBFAMILIA){

        try{
            $query = "
    UPDATE  material_subfamilia  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_SUBFAMILIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $SUBFAMILIA->__GET('ID_SUBFAMILIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(SUBFAMILIA $SUBFAMILIA){
        try{
            $query = "
    UPDATE  material_subfamilia  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 1
    WHERE  ID_SUBFAMILIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $SUBFAMILIA->__GET('ID_SUBFAMILIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarSubfamiliaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_subfamilia  WHERE ESTADO_REGISTRO = 1  AND ID_EMPRESA = '".$IDEMPRESA."';	");
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
    public function listarSubfamiliaPorEmpresaFamiliaCBX($IDEMPRESA, $IDFAMILIA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  material_subfamilia  WHERE ESTADO_REGISTRO = 1  AND ID_EMPRESA = '".$IDEMPRESA."' AND ID_FAMILIA = '".$IDFAMILIA."';	");
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
                                                    IFNULL(COUNT(NUMERO_SUBFAMILIA),0) AS 'NUMERO'
                                                FROM  material_subfamilia 
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