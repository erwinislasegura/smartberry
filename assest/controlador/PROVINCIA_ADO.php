<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PROVINCIA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PROVINCIA_ADO {
    
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
    public function listarProvincia(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_provincia  limit 6;	");
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
    public function listarProvinciaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_provincia  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarProvincia2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_provincia  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function listarProvincia3CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                    provincia.ID_PROVINCIA,
                                                    provincia.NOMBRE_PROVINCIA  AS 'PROVINCIA',
                                                    region.NOMBRE_REGION  AS 'REGION',
                                                    pais.NOMBRE_PAIS  AS 'PAIS'
                                                FROM   ubicacion_provincia provincia, ubicacion_region region, ubicacion_pais pais
                                                WHERE provincia.ID_REGION = region.ID_REGION 
                                                    AND region.ID_PAIS = pais.ID_PAIS;	");
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
    public function verProvincia($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_provincia  WHERE  ID_PROVINCIA = '".$ID."';");
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
    
    public function verProvincia2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                provincia.ID_PROVINCIA,
                                                provincia.NOMBRE_PROVINCIA  AS 'PROVINCIA',
                                                region.NOMBRE_REGION  AS 'REGION',
                                                pais.NOMBRE_PAIS  AS 'PAIS'
                                            FROM   ubicacion_provincia provincia, ubicacion_region region, ubicacion_pais pais
                                            WHERE provincia.ID_REGION = region.ID_REGION 
                                                AND region.ID_PAIS = pais.ID_PAIS
                                                AND  ID_PROVINCIA = '".$ID."';");
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
    public function buscarNombreProvincia($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_provincia  WHERE  NOMBRE_PROVINCIA  LIKE '%".$NOMBRE."%';");
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
    public function agregarProvincia(PROVINCIA $PROVINCIA){
        try{
            
            
            $query=
            "INSERT INTO  ubicacion_provincia  ( NOMBRE_PROVINCIA , ID_REGION ,  INGRESO , MODIFICACION , ESTADO_REGISTRO ) VALUES
	       	( ?, ?, SYSDATE() , SYSDATE(),1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $PROVINCIA->__GET('NOMBRE_PROVINCIA'),
                    $PROVINCIA->__GET('ID_REGION')
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarProvincia($id){
        try{$sql="DELETE FROM  ubicacion_provincia  WHERE  ID_PROVINCIA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarProvincia(PROVINCIA $PROVINCIA){
        try{
            $query = "
		UPDATE  ubicacion_provincia  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_PROVINCIA = ?,
             ID_REGION = ?
		WHERE  ID_PROVINCIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $PROVINCIA->__GET('NOMBRE_PROVINCIA'),
                    $PROVINCIA->__GET('ID_REGION'),
                    $PROVINCIA->__GET('ID_PROVINCIA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PROVINCIA $PROVINCIA){

        try{
            $query = "
    UPDATE  ubicacion_provincia  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 0
    WHERE  ID_PROVINCIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PROVINCIA->__GET('ID_PROVINCIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PROVINCIA $PROVINCIA){
        try{
            $query = "
    UPDATE  ubicacion_provincia  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 1
    WHERE  ID_PROVINCIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PROVINCIA->__GET('ID_PROVINCIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    
    
}
?>