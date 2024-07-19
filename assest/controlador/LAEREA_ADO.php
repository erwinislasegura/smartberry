<?php


include_once '../../assest/modelo/LAEREA.php';
include_once '../../assest/config/BDCONFIG.php';

$HOST="";
$DBNAME="";
$USER="";
$PASS="";

class LAEREA_ADO {
    
    
    private $conexion;
    
    
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
    
    
    
    public function listarLaerea(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_laerea  limit 8;	");
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
    public function listarLaereaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_laerea  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarLaerea2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_laerea  WHERE  ESTADO_REGISTRO  = 0;	");
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




    public function verLaerea($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_laerea  WHERE  ID_LAEREA = '".$ID."';");
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

  
    
    public function buscarNombreLaerea($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_laerea  WHERE  NOMBRE_LAEREA  LIKE '%".$NOMBRE."%';");
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

    
    
    
    public function agregarLaerea(LAEREA $LAEREA){
        try{
            
            
            $query=
            "INSERT INTO  transporte_laerea  (   
                                                 RUT_LAEREA ,
                                                 DV_LAEREA ,
                                                 NUMERO_LAEREA ,
                                                 NOMBRE_LAEREA ,
                                                 GIRO_LAEREA ,
                                                 RAZON_SOCIAL_LAEREA ,
                                                 DIRECCION_LAEREA ,
                                                 CONTACTO_LAEREA ,
                                                 TELEFONO_LAEREA ,
                                                 EMAIL_LAEREA ,
                                                 NOTA_LAEREA , 
                                                 ID_EMPRESA , 
                                                 ID_USUARIOI , 
                                                 ID_USUARIOM , 
                                                 INGRESO ,
                                                 MODIFICACION , 
                                                 ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $LAEREA->__GET('RUT_LAEREA'),
                    $LAEREA->__GET('DV_LAEREA'),
                    $LAEREA->__GET('NUMERO_LAEREA'),
                    $LAEREA->__GET('NOMBRE_LAEREA'),
                    $LAEREA->__GET('GIRO_LAEREA'),
                    $LAEREA->__GET('RAZON_SOCIAL_LAEREA'),
                    $LAEREA->__GET('DIRECCION_LAEREA'),
                    $LAEREA->__GET('CONTACTO_LAEREA'),
                    $LAEREA->__GET('TELEFONO_LAEREA'),
                    $LAEREA->__GET('EMAIL_LAEREA'),
                    $LAEREA->__GET('NOTA_LAEREA'),
                    $LAEREA->__GET('ID_EMPRESA')  ,
                    $LAEREA->__GET('ID_USUARIOI')  ,
                    $LAEREA->__GET('ID_USUARIOM')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function eliminarLaerea($id){
        try{$sql="DELETE FROM  transporte_laerea  WHERE  ID_LAEREA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }  
    
    
    public function actualizarLaerea(LAEREA $LAEREA){
        try{
        
            $query = "
                UPDATE  transporte_laerea  SET
                    MODIFICACION = SYSDATE(),
                    RUT_LAEREA = ?,
                    DV_LAEREA = ?,
                    NOMBRE_LAEREA = ?,
                    GIRO_LAEREA = ?,
                    RAZON_SOCIAL_LAEREA = ?,
                    DIRECCION_LAEREA = ?,
                    CONTACTO_LAEREA = ?,
                    TELEFONO_LAEREA = ?,
                    EMAIL_LAEREA = ?,
                    NOTA_LAEREA = ?,

                    ID_USUARIOM = ?                    
                WHERE  ID_LAEREA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(
                        $LAEREA->__GET('RUT_LAEREA'),
                        $LAEREA->__GET('DV_LAEREA'),
                        $LAEREA->__GET('NOMBRE_LAEREA'),
                        $LAEREA->__GET('GIRO_LAEREA'),
                        $LAEREA->__GET('RAZON_SOCIAL_LAEREA'),
                        $LAEREA->__GET('DIRECCION_LAEREA'),
                        $LAEREA->__GET('CONTACTO_LAEREA'),
                        $LAEREA->__GET('TELEFONO_LAEREA'),
                        $LAEREA->__GET('EMAIL_LAEREA'),
                        $LAEREA->__GET('NOTA_LAEREA'),
                        $LAEREA->__GET('ID_USUARIOM')   ,  
                        $LAEREA->__GET('ID_LAEREA')
                        
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(LAEREA $LAEREA){

        try{
            $query = "
    UPDATE  transporte_laerea  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_LAEREA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $LAEREA->__GET('ID_LAEREA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(LAEREA $LAEREA){
        try{
            $query = "
    UPDATE  transporte_laerea  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_LAEREA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $LAEREA->__GET('ID_LAEREA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function listarLaereaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_laerea  
                                            WHERE  ESTADO_REGISTRO  = 1
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
    
    public function obtenerNumero($IDEMPRESA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                IFNULL(COUNT(NUMERO_LAEREA),0) AS 'NUMERO'
                                            FROM  transporte_laerea 
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