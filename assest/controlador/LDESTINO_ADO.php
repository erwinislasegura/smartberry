<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/LDESTINO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class LDESTINO_ADO {
    
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
    public function listarLdestino(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_ldestino  limit 8;	");
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
    public function listarLdestinoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_ldestino  WHERE ESTADO_REGISTRO = 1;	");
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


    public function listarLdestinoCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_ldestino  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verLdestino($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_ldestino  WHERE  ID_LDESTINO = '".$ID."';");
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
    public function buscarNombreLdestino($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_ldestino  WHERE  NOMBRE_LDESTINO  LIKE '%".$NOMBRE."%';");
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
    public function agregarLdestino(LDESTINO $LDESTINO){
        try{
            
            
            $query=
            "INSERT INTO  fruta_ldestino  (
                                             NUMERO_LDESTINO , 
                                             NOMBRE_LDESTINO , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM , 
                                             INGRESO ,
                                             MODIFICACION ,
                                             ESTADO_REGISTRO 
                                          ) VALUES
	       	( ?, ?, ?, ?, ?,  SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $LDESTINO->__GET('NUMERO_LDESTINO'),
                    $LDESTINO->__GET('NOMBRE_LDESTINO'),
                    $LDESTINO->__GET('ID_EMPRESA'),
                    $LDESTINO->__GET('ID_USUARIOI'),
                    $LDESTINO->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarLdestino($id){
        try{$sql="DELETE FROM  fruta_ldestino  WHERE  ID_LDESTINO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarLdestino(LDESTINO $LDESTINO){
        try{
            $query = "
		UPDATE  fruta_ldestino  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_LDESTINO = ?,
             ID_USUARIOM = ?            
		WHERE  ID_LDESTINO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $LDESTINO->__GET('NOMBRE_LDESTINO') ,  
                    $LDESTINO->__GET('ID_USUARIOM'),      
                    $LDESTINO->__GET('ID_LDESTINO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(LDESTINO $LDESTINO){

        try{
            $query = "
    UPDATE  fruta_ldestino  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_LDESTINO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $LDESTINO->__GET('ID_LDESTINO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(LDESTINO $LDESTINO){
        try{
            $query = "
    UPDATE  fruta_ldestino  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_LDESTINO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $LDESTINO->__GET('ID_LDESTINO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarLdestinoPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_ldestino  
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
                                                IFNULL(COUNT(NUMERO_LDESTINO),0) AS 'NUMERO'
                                            FROM  fruta_ldestino 
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