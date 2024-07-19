<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CIUDAD.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class CIUDAD_ADO {
    
    
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
    public function listarCiudad(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_ciudad  limit 8;	");
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
    public function listarCiudadCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_ciudad  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarCiudad2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_ciudad  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function listarCiudad3CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                    ciudad.ID_CIUDAD ,
                                                    ciudad.NOMBRE_CIUDAD  AS 'CIUDAD',
                                                    comuna.NOMBRE_COMUNA  AS 'COMUNA',
                                                    provincia.NOMBRE_PROVINCIA  AS 'PROVINCIA',
                                                    region.NOMBRE_REGION  AS 'REGION',
                                                    pais.NOMBRE_PAIS  AS 'PAIS'
                                                FROM ubicacion_ciudad ciudad, ubicacion_comuna comuna, ubicacion_provincia provincia, ubicacion_region region, ubicacion_pais pais
                                                WHERE  ciudad.ID_COMUNA = comuna.ID_COMUNA 
                                                    AND comuna.ID_PROVINCIA = provincia.ID_PROVINCIA 
                                                    AND provincia.ID_REGION = region.ID_REGION 
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
    public function verCiudad($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_ciudad  WHERE  ID_CIUDAD = '".$ID."';");
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
    public function buscarNombreCiudad($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  ubicacion_ciudad  WHERE  NOMBRE_CIUDAD  LIKE '%".$NOMBRE."%';");
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
    public function agregarCiudad(CIUDAD $CIUDAD){
        try{
            
            
            $query=
            "INSERT INTO  ubicacion_ciudad  ( NOMBRE_CIUDAD , ID_COMUNA ,  INGRESO , MODIFICACION , ESTADO_REGISTRO ) VALUES
	       	( ?, ?, SYSDATE() , SYSDATE(),1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $CIUDAD->__GET('NOMBRE_CIUDAD'),
                    $CIUDAD->__GET('ID_COMUNA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarCiudad($id){
        try{$sql="DELETE FROM  ubicacion_ciudad  WHERE  ID_CIUDAD =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
  
    //BUSCAR
    
    public function listarCiudadeCoProRePACBX($IDCIUDAD){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                             CONCAT(  ciudad.NOMBRE_CIUDAD ,', ', pais.NOMBRE_PAIS ) AS 'UBICACION'
                                            FROM ubicacion_ciudad ciudad, ubicacion_comuna comuna, ubicacion_provincia provincia, ubicacion_region region, ubicacion_pais pais
                                            WHERE  ciudad.ID_COMUNA = comuna.ID_COMUNA 
                                                AND comuna.ID_PROVINCIA = provincia.ID_PROVINCIA 
                                                AND provincia.ID_REGION = region.ID_REGION 
                                                AND region.ID_PAIS = pais.ID_PAIS
                                                AND ciudad.ID_CIUDAD = '".$IDCIUDAD."'
                                              ;	");
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
    
    public function listarCiudadeUbicaciónCompleta($IDCIUDAD){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                             ciudad.NOMBRE_CIUDAD  AS 'CIUDAD',
                                             comuna.NOMBRE_COMUNA  AS 'COMUNA',
                                             provincia.NOMBRE_PROVINCIA  AS 'PROVINCIA',
                                             region.NOMBRE_REGION  AS 'REGION',
                                             pais.NOMBRE_PAIS  AS 'PAIS'
                                            FROM ubicacion_ciudad ciudad, ubicacion_comuna comuna, ubicacion_provincia provincia, ubicacion_region region, ubicacion_pais pais
                                            WHERE  ciudad.ID_COMUNA = comuna.ID_COMUNA 
                                                AND comuna.ID_PROVINCIA = provincia.ID_PROVINCIA 
                                                AND provincia.ID_REGION = region.ID_REGION 
                                                AND region.ID_PAIS = pais.ID_PAIS
                                                AND ciudad.ID_CIUDAD = '".$IDCIUDAD."'
                                              ;	");
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

    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarCiudad(CIUDAD $CIUDAD){
        try{
            $query = "
		UPDATE  ubicacion_ciudad  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_CIUDAD = ?,
             ID_COMUNA = ?
            
		WHERE  ID_CIUDAD = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $CIUDAD->__GET('NOMBRE_CIUDAD'),     
                    $CIUDAD->__GET('ID_COMUNA'),               
                    $CIUDAD->__GET('ID_CIUDAD')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(CIUDAD $CIUDAD){

        try{
            $query = "
    UPDATE  ubicacion_ciudad  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 0
    WHERE  ID_CIUDAD = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CIUDAD->__GET('ID_CIUDAD')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(CIUDAD $CIUDAD){
        try{
            $query = "
    UPDATE  ubicacion_ciudad  SET					
     MODIFICACION = SYSDATE(),
             ESTADO_REGISTRO  = 1
    WHERE  ID_CIUDAD = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CIUDAD->__GET('ID_CIUDAD')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
}
?>