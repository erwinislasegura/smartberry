<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/REGION.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class REGION_ADO {
    
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
    public function listarRegion(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_region` limit 6;	");
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
    public function listarRegionCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_region` WHERE `ESTADO_REGISTRO` = 1;	");
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
    public function listarRegion2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_region` WHERE `ESTADO_REGISTRO` = 0;	");
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
    
    public function listarRegion3CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                    region.ID_REGION,
                                                    region.NOMBRE_REGION  AS 'REGION',
                                                    pais.NOMBRE_PAIS  AS 'PAIS'
                                                FROM    ubicacion_region region, ubicacion_pais pais
                                                WHERE  region.ID_PAIS = pais.ID_PAIS;	");
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
    public function verRegion($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_region` WHERE `ID_REGION`= '".$ID."';");
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

    public function verRegion2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                region.ID_REGION,
                                                region.NOMBRE_REGION  AS 'REGION',
                                                pais.NOMBRE_PAIS  AS 'PAIS'
                                            FROM    ubicacion_region region, ubicacion_pais pais
                                            WHERE  region.ID_PAIS = pais.ID_PAIS
                                            AND region.ID_REGION= '".$ID."'
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
    public function buscarNombreRegion($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_region` WHERE `NOMBRE_REGION` LIKE '%".$NOMBRE."%';");
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
    public function agregarRegion(REGION $REGION){
        try{
            
            
            $query=
            "INSERT INTO `ubicacion_region` (`NOMBRE_REGION`,`ID_PAIS`,`INGRESO`,`MODIFICACION`, `ESTADO_REGISTRO`) VALUES
	       	( ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $REGION->__GET('NOMBRE_REGION'),
                    $REGION->__GET('ID_PAIS')
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRegion($id){
        try{$sql="DELETE FROM `ubicacion_region` WHERE `ID_REGION`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRegion(REGION $REGION){
        try{
            $query = "
		UPDATE `ubicacion_region` SET
            `MODIFICACION`= SYSDATE(),
            `NOMBRE_REGION`= ?,
            `ID_PAIS`= ?            
		WHERE `ID_REGION`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $REGION->__GET('NOMBRE_REGION'),
                    $REGION->__GET('ID_PAIS'),
                    $REGION->__GET('ID_REGION')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //FUNCIONES ESPECIALIZADOS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(REGION $REGION){

        try{
            $query = "
    UPDATE `ubicacion_region` SET				
    `MODIFICACION`= SYSDATE(),	
            `ESTADO_REGISTRO` = 0
    WHERE `ID_REGION`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $REGION->__GET('ID_REGION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(REGION $REGION){
        try{
            $query = "
    UPDATE `ubicacion_region` SET				
    `MODIFICACION`= SYSDATE(),	
            `ESTADO_REGISTRO` = 1
    WHERE `ID_REGION`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $REGION->__GET('ID_REGION')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    
}
?>