<?php


include_once '../../assest/modelo/NAVIERA.php';
include_once '../../assest/config/BDCONFIG.php';

$HOST="";
$DBNAME="";
$USER="";
$PASS="";

class NAVIERA_ADO {
    
    
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
    
    
    
    public function listarNaviera(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_naviera  limit 8;	");
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
    public function listarNavieraCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_naviera  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarNaviera2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_naviera  WHERE  ESTADO_REGISTRO  = 0;	");
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




    public function verNaviera($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_naviera  WHERE  ID_NAVIERA = '".$ID."';");
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

  
    
    public function buscarNombreNaviera($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_naviera  WHERE  NOMBRE_NAVIERA  LIKE '%".$NOMBRE."%';");
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


    public function buscarNombreNavieraID($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_naviera  WHERE  ID_NAVIERA  = '".$ID."';");
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

    
    
    
    public function agregarNaviera(NAVIERA $NAVIERA){
        try{
            
            
      
            $query=
            "INSERT INTO  transporte_naviera  (  
                                                    RUT_NAVIERA ,
                                                    DV_NAVIERA ,
                                                    NUMERO_NAVIERA ,
                                                    NOMBRE_NAVIERA ,
                                                    GIRO_NAVIERA ,
                                                    RAZON_SOCIAL_NAVIERA ,
                                                    DIRECCION_NAVIERA ,
                                                    CONTACTO_NAVIERA ,
                                                    TELEFONO_NAVIERA ,
                                                    EMAIL_NAVIERA ,
                                                    NOTA_NAVIERA , 
                                                    ID_EMPRESA , 
                                                    ID_USUARIOI , 
                                                    ID_USUARIOM , 
                                                    INGRESO ,
                                                    MODIFICACION , 
                                                    ESTADO_REGISTRO 
                                                ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $NAVIERA->__GET('RUT_NAVIERA'),
                    $NAVIERA->__GET('DV_NAVIERA'),
                    $NAVIERA->__GET('NUMERO_NAVIERA'),
                    $NAVIERA->__GET('NOMBRE_NAVIERA'),
                    $NAVIERA->__GET('GIRO_NAVIERA'),
                    $NAVIERA->__GET('RAZON_SOCIAL_NAVIERA'),
                    $NAVIERA->__GET('DIRECCION_NAVIERA'),
                    $NAVIERA->__GET('CONTACTO_NAVIERA'),
                    $NAVIERA->__GET('TELEFONO_NAVIERA'),
                    $NAVIERA->__GET('EMAIL_NAVIERA'),
                    $NAVIERA->__GET('NOTA_NAVIERA'),
                    $NAVIERA->__GET('ID_EMPRESA')   ,
                    $NAVIERA->__GET('ID_USUARIOI')   ,
                    $NAVIERA->__GET('ID_USUARIOM')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function eliminarNaviera($id){
        try{$sql="DELETE FROM  transporte_naviera  WHERE  ID_NAVIERA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }  
    
    
    public function actualizarNaviera(NAVIERA $NAVIERA){
        try{
            
            $query = "
		UPDATE  transporte_naviera  SET
                    MODIFICACION = SYSDATE(),
                    RUT_NAVIERA = ?,
                    DV_NAVIERA = ?,
                    NOMBRE_NAVIERA = ?,
                    GIRO_NAVIERA = ?,
                    RAZON_SOCIAL_NAVIERA = ?,
                    DIRECCION_NAVIERA = ?,
                    CONTACTO_NAVIERA = ?,
                    TELEFONO_NAVIERA = ?,
                    EMAIL_NAVIERA = ?,
                    NOTA_NAVIERA = ?,
                    ID_USUARIOM = ?            
		WHERE  ID_NAVIERA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(
                        $NAVIERA->__GET('RUT_NAVIERA'),
                        $NAVIERA->__GET('DV_NAVIERA'),
                        $NAVIERA->__GET('NOMBRE_NAVIERA'),
                        $NAVIERA->__GET('GIRO_NAVIERA'),
                        $NAVIERA->__GET('RAZON_SOCIAL_NAVIERA'),
                        $NAVIERA->__GET('DIRECCION_NAVIERA'),
                        $NAVIERA->__GET('CONTACTO_NAVIERA'),
                        $NAVIERA->__GET('TELEFONO_NAVIERA'),
                        $NAVIERA->__GET('EMAIL_NAVIERA'),
                        $NAVIERA->__GET('NOTA_NAVIERA'), 
                        $NAVIERA->__GET('ID_USUARIOM') ,
                        $NAVIERA->__GET('ID_NAVIERA')
                        
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(NAVIERA $NAVIERA){

        try{
            $query = "
    UPDATE  transporte_naviera  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_NAVIERA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $NAVIERA->__GET('ID_NAVIERA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(NAVIERA $NAVIERA){
        try{
            $query = "
    UPDATE  transporte_naviera  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_NAVIERA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $NAVIERA->__GET('ID_NAVIERA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    

    public function listarNavierPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  transporte_naviera 
                                             WHERE  ESTADO_REGISTRO  = 1
                                             AND ID_EMPRESA= '".$IDEMPRESA."';	");
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
                                                IFNULL(COUNT(NUMERO_NAVIERA),0) AS 'NUMERO'
                                            FROM  transporte_naviera 
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