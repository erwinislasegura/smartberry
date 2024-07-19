<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PDESTINO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PDESTINO_ADO {
    
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
    public function listarPdestino(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_pdestino  limit 8;	");
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
    public function listarPdestinoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_pdestino  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarPdestinoCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_pdestino  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verPdestino($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_pdestino  WHERE  ID_PDESTINO = '".$ID."';");
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
    public function buscarNombrePdestino($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_pdestino  WHERE  NOMBRE_PDESTINO  LIKE '%".$NOMBRE."%';");
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
    public function agregarPdestino(PDESTINO $PDESTINO){
        try{
            
            
            $query=
            "INSERT INTO  fruta_pdestino  (
                                             NUMERO_PDESTINO , 
                                             NOMBRE_PDESTINO , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM , 
                                             INGRESO ,
                                             MODIFICACION ,
                                             ESTADO_REGISTRO 
                                          ) VALUES
	       	( ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(),  1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $PDESTINO->__GET('NUMERO_PDESTINO'),
                    $PDESTINO->__GET('NOMBRE_PDESTINO'),
                    $PDESTINO->__GET('ID_EMPRESA'),
                    $PDESTINO->__GET('ID_USUARIOI'),
                    $PDESTINO->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarPdestino($id){
        try{$sql="DELETE FROM  fruta_pdestino  WHERE  ID_PDESTINO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarPdestino(PDESTINO $PDESTINO){
        try{
            $query = "
		UPDATE  fruta_pdestino  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_PDESTINO = ?,
             ID_USUARIOM = ?            
		WHERE  ID_PDESTINO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $PDESTINO->__GET('NOMBRE_PDESTINO') ,   
                    $PDESTINO->__GET('ID_USUARIOM'),     
                    $PDESTINO->__GET('ID_PDESTINO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PDESTINO $PDESTINO){

        try{
            $query = "
    UPDATE  fruta_pdestino  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_PDESTINO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PDESTINO->__GET('ID_PDESTINO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PDESTINO $PDESTINO){
        try{
            $query = "
    UPDATE  fruta_pdestino  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_PDESTINO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PDESTINO->__GET('ID_PDESTINO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarPdestinoPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_pdestino  
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
                                                IFNULL(COUNT(NUMERO_PDESTINO),0) AS 'NUMERO'
                                            FROM  fruta_pdestino 
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