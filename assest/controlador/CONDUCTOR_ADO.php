<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CONDUCTOR.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";


//ESTRUCTURA DEL CONTROLADOR
class CONDUCTOR_ADO {
    
    
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
    public function listarConductor(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_conductor  LIMIT 6;	");
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
    public function listarConductorCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_conductor  WHERE  ESTADO_REGISTRO  = 1;	");
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
    public function listarConductor2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_conductor  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verConductor($IDCONDUCTOR){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_conductor  WHERE  ID_CONDUCTOR  LIKE '".$IDCONDUCTOR."';");
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
    public function agregarConductor(CONDUCTOR $CONDUCTOR){
        try{
  
            
            $query=
            "INSERT INTO  transporte_conductor  ( 
                                                     RUT_CONDUCTOR ,
                                                     DV_CONDUCTOR , 
                                                     NUMERO_CONDUCTOR , 
                                                     NOMBRE_CONDUCTOR , 
                                                     NOTA_CONDUCTOR , 
                                                     TELEFONO_CONDUCTOR ,
                                                     EMAIL_CONDUCTOR,
                                                     ID_EMPRESA ,
                                                     ID_USUARIOI ,
                                                     ID_USUARIOM ,
                                                     INGRESO ,
                                                     MODIFICACION , 
                                                     ESTADO_REGISTRO 
                                                ) VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(),  1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $CONDUCTOR->__GET('RUT_CONDUCTOR'),
                    $CONDUCTOR->__GET('DV_CONDUCTOR'),
                    $CONDUCTOR->__GET('NUMERO_CONDUCTOR'),
                    $CONDUCTOR->__GET('NOMBRE_CONDUCTOR'),
                    $CONDUCTOR->__GET('NOTA_CONDUCTOR'),
                    $CONDUCTOR->__GET('TELEFONO_CONDUCTOR'),
                    $CONDUCTOR->__GET('EMAIL_CONDUCTOR'),
                    $CONDUCTOR->__GET('ID_EMPRESA'),
                    $CONDUCTOR->__GET('ID_USUARIOI'),
                    $CONDUCTOR->__GET('ID_USUARIOM')
                    
                    
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarConductor(CONDUCTOR $CONDUCTOR){

        try{
            $query = "
		UPDATE  transporte_conductor  SET
             MODIFICACION  = SYSDATE() ,
			 RUT_CONDUCTOR  = ?,
			 DV_CONDUCTOR  = ?,
			 NOMBRE_CONDUCTOR  = ?,
             NOTA_CONDUCTOR = ?,
             TELEFONO_CONDUCTOR = ?,
             EMAIL_CONDUCTOR = ?,
             ID_EMPRESA = ?,
             ID_USUARIOM = ?
		WHERE  ID_CONDUCTOR = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $CONDUCTOR->__GET('RUT_CONDUCTOR'),
                    $CONDUCTOR->__GET('DV_CONDUCTOR'),
                    $CONDUCTOR->__GET('NOMBRE_CONDUCTOR'),
                    $CONDUCTOR->__GET('NOTA_CONDUCTOR'),
                    $CONDUCTOR->__GET('TELEFONO_CONDUCTOR'),
                    $CONDUCTOR->__GET('EMAIL_CONDUCTOR'),
                    $CONDUCTOR->__GET('ID_EMPRESA'),
                    $CONDUCTOR->__GET('ID_USUARIOM'),
                    $CONDUCTOR->__GET('ID_CONDUCTOR')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarConductor($id){
        try{$sql="DELETE FROM  transporte_conductor  WHERE  ID_CONDUCTOR =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
 
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(CONDUCTOR $CONDUCTOR){

        try{
            $query = "
    UPDATE  transporte_conductor  SET				
     MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 0
    WHERE  ID_CONDUCTOR = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CONDUCTOR->__GET('ID_CONDUCTOR')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(CONDUCTOR $CONDUCTOR){
        try{
            $query = "
    UPDATE  transporte_conductor  SET			
     MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 1
    WHERE  ID_CONDUCTOR = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $CONDUCTOR->__GET('ID_CONDUCTOR')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

 
      
  //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
  public function buscarNombreConductor($NOMBRE){
    try{
        
        $datos=$this->conexion->prepare("SELECT * FROM  transporte_conductor  WHERE  NOMBRE_CONDUCTOR  LIKE '%".$NOMBRE."%';");
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
public function listarConductorPorEmpresaCBX($IDEMPRESA){
    try{
        
        $datos=$this->conexion->prepare("SELECT * FROM  transporte_conductor  WHERE  ESTADO_REGISTRO  = 1 AND ID_EMPRESA = '".$IDEMPRESA."';	");
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
                                                IFNULL(COUNT(NUMERO_CONDUCTOR),0) AS 'NUMERO'
                                            FROM  transporte_conductor  
                                            WHERE ID_EMPRESA = '".$IDEMPRESA."' ; ");
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