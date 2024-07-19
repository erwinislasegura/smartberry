<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/COMUNA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class COMUNA_ADO {
    
    
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
    public function listarComuna(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_comuna` limit 6;	");
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
    public function listarComunaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_comuna` WHERE `ESTADO_REGISTRO` = 1;	");
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
    public function listarComuna2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_comuna` WHERE `ESTADO_REGISTRO` = 0;	");
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
    
    public function listarComuna3CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                    comuna.ID_COMUNA  ,
                                                    comuna.NOMBRE_COMUNA  AS 'COMUNA',
                                                    provincia.NOMBRE_PROVINCIA  AS 'PROVINCIA',
                                                    region.NOMBRE_REGION  AS 'REGION',
                                                    pais.NOMBRE_PAIS  AS 'PAIS'
                                                FROM  ubicacion_comuna comuna, ubicacion_provincia provincia, ubicacion_region region, ubicacion_pais pais
                                                WHERE comuna.ID_PROVINCIA = provincia.ID_PROVINCIA 
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
    public function verComuna($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_comuna` WHERE `ID_COMUNA`= '".$ID."';");
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
    public function verComuna2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                    comuna.ID_COMUNA  ,
                                                    comuna.NOMBRE_COMUNA  AS 'COMUNA',
                                                    provincia.NOMBRE_PROVINCIA  AS 'PROVINCIA',
                                                    region.NOMBRE_REGION  AS 'REGION',
                                                    pais.NOMBRE_PAIS  AS 'PAIS'
                                                FROM  ubicacion_comuna comuna, ubicacion_provincia provincia, ubicacion_region region, ubicacion_pais pais
                                                WHERE ID_COMUNA= '".$ID."'
                                                    AND comuna.ID_PROVINCIA = provincia.ID_PROVINCIA 
                                                    AND provincia.ID_REGION = region.ID_REGION 
                                                    AND region.ID_PAIS = pais.ID_PAIS
                                                    ;");
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
    public function buscarNombreComuna($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_comuna` WHERE `NOMBRE_COMUNA` LIKE '%".$NOMBRE."%';");
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
    public function agregarComuna(COMUNA $COMUNA){
        try{
            
            
            $query=
            "INSERT INTO `ubicacion_comuna` (`NOMBRE_COMUNA`, `ID_PROVINCIA`,`INGRESO`,`MODIFICACION`, `ESTADO_REGISTRO`) VALUES
	       	( ?, ?, SYSDATE() , SYSDATE(),1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $COMUNA->__GET('NOMBRE_COMUNA'),
                    $COMUNA->__GET('ID_PROVINCIA')
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarComuna($id){
        try{$sql="DELETE FROM `ubicacion_comuna` WHERE `ID_COMUNA`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarComuna(COMUNA $COMUNA){
        try{
            $query = "
		UPDATE `ubicacion_comuna` SET
            `MODIFICACION`= SYSDATE(),
            `NOMBRE_COMUNA`= ?,
            `ID_PROVINCIA`= ?
		WHERE `ID_COMUNA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $COMUNA->__GET('NOMBRE_COMUNA'),
                    $COMUNA->__GET('ID_PROVINCIA'),
                    $COMUNA->__GET('ID_COMUNA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(COMUNA $COMUNA){

        try{
            $query = "
    UPDATE `ubicacion_comuna` SET				
    `MODIFICACION`= SYSDATE(),	
            `ESTADO_REGISTRO` = 0
    WHERE `ID_COMUNA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $COMUNA->__GET('ID_COMUNA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(COMUNA $COMUNA){
        try{
            $query = "
    UPDATE `ubicacion_comuna` SET			
    `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 1
    WHERE `ID_COMUNA`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $COMUNA->__GET('ID_COMUNA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
}
?>