<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PRODUCTOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PRODUCTOR_ADO {
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
    public function listarProductor(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_productor  LIMIT 6;	");
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
    public function listarProductorCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_productor   WHERE  ESTADO_REGISTRO  = 1;	");
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
    
    public function listarProductor2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_productor   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verProductor($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_productor  WHERE  ID_PRODUCTOR = '".$ID."';");
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
    public function buscarNombreProductor($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_productor  WHERE  NOMBRE_PRODUCTOR  LIKE '%".$NOMBRE."%';");
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
    public function agregarProductor(PRODUCTOR $PRODUCTOR){
        try{

            if($PRODUCTOR->__GET('ID_COMUNA')==NULL){
                $PRODUCTOR->__SET('ID_COMUNA', NULL);
            }
            if($PRODUCTOR->__GET('ID_PROVINCIA')==NULL){
                $PRODUCTOR->__SET('ID_PROVINCIA', NULL);
            }
            if($PRODUCTOR->__GET('ID_REGION')==NULL){
                $PRODUCTOR->__SET('ID_REGION', NULL);
            }
            $query=            
            "INSERT INTO  fruta_productor    (
                                         RUT_PRODUCTOR ,
                                         DV_PRODUCTOR ,
                                         NUMERO_PRODUCTOR , 
                                         NOMBRE_PRODUCTOR , 

                                         DIRECCION_PRODUCTOR , 
                                         TELEFONO_PRODUCTOR , 
                                         EMAIL_PRODUCTOR , 

                                         GIRO_PRODUCTOR , 
                                         CSG_PRODUCTOR , 
                                         SDP_PRODUCTOR , 
                                         PRB_PRODUCTOR , 
                                         GGN_PRODUCTOR , 

                                         CODIGO_ASOCIADO_PRODUCTOR , 
                                         NOMBRE_ASOCIADO_PRODUCTOR , 

                                         ID_EMPRESA ,  
                                         ID_TPRODUCTOR ,

                                         ID_COMUNA ,  
                                         ID_PROVINCIA ,  
                                         ID_REGION ,  

                                         ID_USUARIOI ,
                                         ID_USUARIOM ,
                                         INGRESO ,
                                         MODIFICACION , 
                                         ESTADO_REGISTRO  ) 
            VALUES 
	       	(?, ?, ?, ?,    ?, ?, ?,    ?, ?, ?, ?, ?,    ?, ?,    ?, ?,    ?, ?, ?,   ?, ?, SYSDATE() , SYSDATE(),  1 );";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $PRODUCTOR->__GET('RUT_PRODUCTOR'),
                    $PRODUCTOR->__GET('DV_PRODUCTOR'),
                    $PRODUCTOR->__GET('NUMERO_PRODUCTOR'), 
                    $PRODUCTOR->__GET('NOMBRE_PRODUCTOR'),     

                    $PRODUCTOR->__GET('DIRECCION_PRODUCTOR'),
                    $PRODUCTOR->__GET('TELEFONO_PRODUCTOR'),
                    $PRODUCTOR->__GET('EMAIL_PRODUCTOR'),

                    $PRODUCTOR->__GET('GIRO_PRODUCTOR'),
                    $PRODUCTOR->__GET('CSG_PRODUCTOR'),
                    $PRODUCTOR->__GET('SDP_PRODUCTOR'),
                    $PRODUCTOR->__GET('PRB_PRODUCTOR'),
                    $PRODUCTOR->__GET('GGN_PRODUCTOR'),

                    $PRODUCTOR->__GET('CODIGO_ASOCIADO_PRODUCTOR'),
                    $PRODUCTOR->__GET('NOMBRE_ASOCIADO_PRODUCTOR'),

                    $PRODUCTOR->__GET('ID_EMPRESA'),
                    $PRODUCTOR->__GET('ID_TPRODUCTOR'),

                    $PRODUCTOR->__GET('ID_COMUNA'),
                    $PRODUCTOR->__GET('ID_PROVINCIA'),
                    $PRODUCTOR->__GET('ID_REGION'),

                    $PRODUCTOR->__GET('ID_USUARIOI'),
                    $PRODUCTOR->__GET('ID_USUARIOM')

                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarProductor($id){
        try{$sql="DELETE FROM  fruta_productor  WHERE  ID_PRODUCTOR =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
 

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarProductor(PRODUCTOR $PRODUCTOR){

        try{

            if($PRODUCTOR->__GET('ID_COMUNA')==NULL){
                $PRODUCTOR->__SET('ID_COMUNA', NULL);
            }
            if($PRODUCTOR->__GET('ID_PROVINCIA')==NULL){
                $PRODUCTOR->__SET('ID_PROVINCIA', NULL);
            }
            if($PRODUCTOR->__GET('ID_REGION')==NULL){
                $PRODUCTOR->__SET('ID_REGION', NULL);
            }

            $query = "
                    UPDATE  fruta_productor  SET
                         MODIFICACION = SYSDATE(),

                         RUT_PRODUCTOR  = ?,
                         DV_PRODUCTOR  = ?,
                         NOMBRE_PRODUCTOR  = ?,

                         DIRECCION_PRODUCTOR  = ?,
                         TELEFONO_PRODUCTOR  = ?,
                         EMAIL_PRODUCTOR  = ?,

                         GIRO_PRODUCTOR  = ?,
                         CSG_PRODUCTOR  = ?,
                         SDP_PRODUCTOR = ?,
                         PRB_PRODUCTOR = ?,
                         GGN_PRODUCTOR = ?,

                         CODIGO_ASOCIADO_PRODUCTOR = ?,
                         NOMBRE_ASOCIADO_PRODUCTOR = ?,

                         ID_EMPRESA = ?,
                         ID_TPRODUCTOR = ?,

                         ID_COMUNA = ?,  
                         ID_PROVINCIA = ?,  
                         ID_REGION = ?,  

                         ID_USUARIOM = ?
                    WHERE  ID_PRODUCTOR  = ?  ;";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $PRODUCTOR->__GET('RUT_PRODUCTOR'),
                    $PRODUCTOR->__GET('DV_PRODUCTOR'),
                    $PRODUCTOR->__GET('NOMBRE_PRODUCTOR'),      

                    $PRODUCTOR->__GET('DIRECCION_PRODUCTOR'),
                    $PRODUCTOR->__GET('TELEFONO_PRODUCTOR'),
                    $PRODUCTOR->__GET('EMAIL_PRODUCTOR'),

                    $PRODUCTOR->__GET('GIRO_PRODUCTOR'),
                    $PRODUCTOR->__GET('CSG_PRODUCTOR'),
                    $PRODUCTOR->__GET('SDP_PRODUCTOR'),
                    $PRODUCTOR->__GET('PRB_PRODUCTOR'),
                    $PRODUCTOR->__GET('GGN_PRODUCTOR'),

                    $PRODUCTOR->__GET('CODIGO_ASOCIADO_PRODUCTOR'),
                    $PRODUCTOR->__GET('NOMBRE_ASOCIADO_PRODUCTOR'),

                    $PRODUCTOR->__GET('ID_EMPRESA'),
                    $PRODUCTOR->__GET('ID_TPRODUCTOR'),

                    $PRODUCTOR->__GET('ID_COMUNA'),
                    $PRODUCTOR->__GET('ID_PROVINCIA'),
                    $PRODUCTOR->__GET('ID_REGION'),

                    $PRODUCTOR->__GET('ID_USUARIOM'),
                    $PRODUCTOR->__GET('ID_PRODUCTOR')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PRODUCTOR $PRODUCTOR){

        try{
            $query = "
		UPDATE  fruta_productor  SET					
             MODIFICACION = SYSDATE(),
             ESTADO_REGISTRO  = 0
		WHERE  ID_PRODUCTOR = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PRODUCTOR->__GET('ID_PRODUCTOR')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PRODUCTOR $PRODUCTOR){

        try{
            $query = "
		UPDATE  fruta_productor  SET				
             MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 1
		WHERE  ID_PRODUCTOR = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PRODUCTOR->__GET('ID_PRODUCTOR')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }



    public function listarProductorPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_productor   WHERE  ESTADO_REGISTRO  = 1 AND ID_EMPRESA = '".$IDEMPRESA."' ;	");
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

//VALIDAR SI EXISTE UN REGISTRO ASOCIADO AL VALOR A CAMBIAR
public function obtenerNombreTarja($ID_PRODUCTOR){
    try{
        
        $datos=$this->conexion->prepare("SELECT *, if( LENGTH(NOMBRE_PRODUCTOR)>70,SUBSTRING(NOMBRE_PRODUCTOR,1,70),NOMBRE_PRODUCTOR) AS 'NOMBRE_CORTADO' FROM  fruta_productor   WHERE  ID_PRODUCTOR =".$ID_PRODUCTOR."  ;");
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
                                                IFNULL(COUNT(NUMERO_PRODUCTOR),0) AS 'NUMERO'
                                            FROM  fruta_productor 
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