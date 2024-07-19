<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/ERECEPCION.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR

class ERECEPCION_ADO {
    
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
    public function listarEstandar(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM estandar_erecepcion limit 8;	");
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
    public function listarEstandarCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM estandar_erecepcion WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarEstandar2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM estandar_erecepcion WHERE ESTADO_REGISTRO = 0;	");
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
    public function verEstandar($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM estandar_erecepcion WHERE ID_ESTANDAR= '".$ID."';");
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
    public function buscarNombreEstandar($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM estandar_erecepcion WHERE NOMBRE_ESTANDAR LIKE '%".$NOMBRE."%';");
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
    public function agregarEstandar(ERECEPCION $ERECEPCION){
        try{
            
            
            $query=
            "INSERT INTO estandar_erecepcion (     
                                                    CODIGO_ESTANDAR,
                                                    NOMBRE_ESTANDAR,
                                                    CANTIDAD_ENVASE_ESTANDAR,
                                                    PESO_ENVASE_ESTANDAR, 
                                                    PESO_PALLET_ESTANDAR,

                                                    TRATAMIENTO1,
                                                    TRATAMIENTO2,
                                                    ID_ESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PRODUCTO, 

                                                    ID_USUARIOI, 
                                                    ID_USUARIOM, 
                                                    INGRESO ,
                                                    MODIFICACION , 
                                                    TFRUTA_ESTANDAR, 
                                                    ESTADO_REGISTRO 
                                            ) 
                                            VALUES
	       	( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,   ?, ?,   SYSDATE(), SYSDATE(),  1,  1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $ERECEPCION->__GET('CODIGO_ESTANDAR'),
                    $ERECEPCION->__GET('NOMBRE_ESTANDAR'),
                    $ERECEPCION->__GET('CANTIDAD_ENVASE_ESTANDAR')  ,
                    $ERECEPCION->__GET('PESO_ENVASE_ESTANDAR')  ,
                    $ERECEPCION->__GET('PESO_PALLET_ESTANDAR')  ,
                    $ERECEPCION->__GET('TRATAMIENTO1')  ,
                    $ERECEPCION->__GET('TRATAMIENTO2')  ,
                    $ERECEPCION->__GET('ID_ESPECIES') ,
                    $ERECEPCION->__GET('ID_EMPRESA') ,
                    $ERECEPCION->__GET('ID_PRODUCTO') ,
                    $ERECEPCION->__GET('ID_USUARIOI') ,
                    $ERECEPCION->__GET('ID_USUARIOM')               
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarEstandar($id){
        try{$sql="DELETE FROM estandar_erecepcion WHERE ID_ESTANDAR=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEstandar(ERECEPCION $ERECEPCION){
        try{
            $query = "
                UPDATE estandar_erecepcion SET
                    MODIFICACION = SYSDATE(),
                    CODIGO_ESTANDAR= ?,  
                    NOMBRE_ESTANDAR= ?,  
                    CANTIDAD_ENVASE_ESTANDAR= ?,  
                    PESO_ENVASE_ESTANDAR= ?,  
                    PESO_PALLET_ESTANDAR= ?,  
                    TRATAMIENTO1= ?,  
                    TRATAMIENTO2= ?,  
                    ID_ESPECIES= ?  ,  
                    ID_PRODUCTO= ?  ,  
                    ID_USUARIOM= ?  
                WHERE ID_ESTANDAR= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $ERECEPCION->__GET('CODIGO_ESTANDAR'),
                    $ERECEPCION->__GET('NOMBRE_ESTANDAR'),
                    $ERECEPCION->__GET('CANTIDAD_ENVASE_ESTANDAR')  ,
                    $ERECEPCION->__GET('PESO_ENVASE_ESTANDAR')  ,
                    $ERECEPCION->__GET('PESO_PALLET_ESTANDAR')  ,
                    $ERECEPCION->__GET('TRATAMIENTO1')  ,
                    $ERECEPCION->__GET('TRATAMIENTO2')  ,
                    $ERECEPCION->__GET('ID_ESPECIES')   ,
                    $ERECEPCION->__GET('ID_PRODUCTO') ,
                    $ERECEPCION->__GET('ID_USUARIOM'),    
                    $ERECEPCION->__GET('ID_ESTANDAR'),              
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(ERECEPCION $ERECEPCION){

        try{
            $query = "
                UPDATE estandar_erecepcion SET			
                        ESTADO_REGISTRO = 0
                WHERE ID_ESTANDAR= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ERECEPCION->__GET('ID_ESTANDAR')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(ERECEPCION $ERECEPCION){
        try{
            $query = "
            UPDATE estandar_erecepcion SET			
                    ESTADO_REGISTRO = 1
            WHERE ID_ESTANDAR= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ERECEPCION->__GET('ID_ESTANDAR')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarEstandarPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM estandar_erecepcion 
                                            WHERE ESTADO_REGISTRO = 1
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