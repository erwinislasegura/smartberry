<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/ADESTINO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class ADESTINO_ADO {
    
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
    public function listarAdestino(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_adestino  limit 8;	");
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
    public function listarAdestinoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_adestino   WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarAdestinoCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_adestino  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verAdestino($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_adestino  WHERE  ID_ADESTINO = '".$ID."';");
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
    public function buscarNombreAdestino($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_adestino  WHERE  NOMBRE_ADESTINO  LIKE '%".$NOMBRE."%';");
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
    public function agregarAdestino(ADESTINO $ADESTINO){
        try{
            
            
            $query=
            "INSERT INTO  fruta_adestino  (
                                             NUMERO_ADESTINO , 
                                             NOMBRE_ADESTINO , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM , 
                                             INGRESO ,
                                             MODIFICACION ,
                                             ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $ADESTINO->__GET('NUMERO_ADESTINO'),
                    $ADESTINO->__GET('NOMBRE_ADESTINO'),
                    $ADESTINO->__GET('ID_EMPRESA'),
                    $ADESTINO->__GET('ID_USUARIOI'),
                    $ADESTINO->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarAdestino($id){
        try{$sql="DELETE FROM  fruta_adestino  WHERE  ID_ADESTINO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarAdestino(ADESTINO $ADESTINO){
        try{
            $query = "
		UPDATE  fruta_adestino  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_ADESTINO = ?,
             ID_USUARIOM = ?            
		WHERE  ID_ADESTINO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $ADESTINO->__GET('NOMBRE_ADESTINO')      ,     
                    $ADESTINO->__GET('ID_USUARIOM'),   
                    $ADESTINO->__GET('ID_ADESTINO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(ADESTINO $ADESTINO){

        try{
            $query = "
    UPDATE  fruta_adestino  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_ADESTINO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ADESTINO->__GET('ID_ADESTINO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(ADESTINO $ADESTINO){
        try{
            $query = "
    UPDATE  fruta_adestino  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_ADESTINO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ADESTINO->__GET('ID_ADESTINO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarAdestinoPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_adestino   
                                            WHERE ESTADO_REGISTRO = 1
                                            AND ID_EMPRESA = '".$IDEMPRESA."';	");
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
                                                IFNULL(COUNT(NUMERO_ADESTINO),0) AS 'NUMERO'
                                            FROM  fruta_adestino 
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