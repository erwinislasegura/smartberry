<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/ACARGA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class ACARGA_ADO {
    
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
    public function listarAcarga(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_acarga  limit 8;	");
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
    public function listarAcargaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_acarga  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarAcargaCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_acarga  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verAcarga($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_acarga  WHERE  ID_ACARGA = '".$ID."';");
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
    public function buscarNombreAcarga($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_acarga  WHERE  NOMBRE_ACARGA  LIKE '%".$NOMBRE."%';");
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
    public function agregarAcarga(ACARGA $ACARGA){
        try{
            
            
            $query=
            "INSERT INTO  fruta_acarga  (
                                             NUMERO_ACARGA , 
                                             NOMBRE_ACARGA , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM , 
                                             INGRESO ,
                                             MODIFICACION ,
                                             ESTADO_REGISTRO ) VALUES
	       	( ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $ACARGA->__GET('NUMERO_ACARGA'),
                    $ACARGA->__GET('NOMBRE_ACARGA'),
                    $ACARGA->__GET('ID_EMPRESA'),
                    $ACARGA->__GET('ID_USUARIOI'),
                    $ACARGA->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarAcarga($id){
        try{$sql="DELETE FROM  fruta_acarga  WHERE  ID_ACARGA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarAcarga(ACARGA $ACARGA){
        try{
            $query = "
		UPDATE  fruta_acarga  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_ACARGA = ?,
             ID_USUARIOM = ?            
		WHERE  ID_ACARGA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $ACARGA->__GET('NOMBRE_ACARGA') ,
                    $ACARGA->__GET('ID_USUARIOM'),        
                    $ACARGA->__GET('ID_ACARGA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(ACARGA $ACARGA){

        try{
            $query = "
    UPDATE  fruta_acarga  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_ACARGA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ACARGA->__GET('ID_ACARGA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(ACARGA $ACARGA){
        try{
            $query = "
    UPDATE  fruta_acarga  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_ACARGA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $ACARGA->__GET('ID_ACARGA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    public function listarAcargaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_acarga   
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
                                                IFNULL(COUNT(NUMERO_ACARGA),0) AS 'NUMERO'
                                            FROM  fruta_acarga 
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