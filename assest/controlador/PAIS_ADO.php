<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PAIS.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PAIS_ADO {
    
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
    public function listarPais(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_pais` limit 6;	");
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
    public function listarPaisCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_pais` WHERE `ESTADO_REGISTRO` = 1;	");
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
    public function listarPais2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_pais`WHERE `ESTADO_REGISTRO` = 0 ;	");
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
    public function verPais($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_pais` WHERE `ID_PAIS`= '".$ID."';");
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
    public function buscarNombrePais($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `ubicacion_pais` WHERE `NOMBRE_PAIS` LIKE '%".$NOMBRE."%';");
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
    public function agregarPais(PAIS $PAIS){
        try{
            
            
            $query=
            "INSERT INTO `ubicacion_pais` (`NOMBRE_PAIS`,`CODIGO_SAG_PAIS`,`INGRESO`,`MODIFICACION`, `ESTADO_REGISTRO`) VALUES
	       	( ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $PAIS->__GET('NOMBRE_PAIS'),
                    $PAIS->__GET('CODIGO_SAG_PAIS')
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarPais($id){
        try{$sql="DELETE FROM `ubicacion_pais` WHERE `ID_PAIS`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
        
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarPais(PAIS $PAIS){
        try{
            $query = "
		UPDATE `ubicacion_pais` SET
            `MODIFICACION`= SYSDATE(),
            `NOMBRE_PAIS`= ?
		WHERE `ID_PAIS`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $PAIS->__GET('NOMBRE_PAIS'),
                    $PAIS->__GET('ID_PAIS')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarPais2(PAIS $PAIS){
        try{
            $query = "
		UPDATE `ubicacion_pais` SET
            `NOMBRE_PAIS`= ?,
            `CODIGO_SAG_SAG`= ?
		WHERE `ID_PAIS`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $PAIS->__GET('NOMBRE_PAIS'),
                    $PAIS->__GET('CODIGO_SAG_SAG'),
                    $PAIS->__GET('ID_PAIS')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PAIS $PAIS){

        try{
            $query = "
                UPDATE `ubicacion_pais` SET			
                `MODIFICACION`= SYSDATE(),		
                        `ESTADO_REGISTRO` = 0
                WHERE `ID_PAIS`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PAIS->__GET('ID_PAIS')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PAIS $PAIS){
        try{
            $query = "
                UPDATE `ubicacion_pais` SET			
                `MODIFICACION`= SYSDATE(),		
                        `ESTADO_REGISTRO` = 1
                WHERE `ID_PAIS`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PAIS->__GET('ID_PAIS')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
}
?>