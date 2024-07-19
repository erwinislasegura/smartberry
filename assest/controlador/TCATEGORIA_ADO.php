<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/TCATEGORIA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class TCATEGORIA_ADO {
   
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
    public function listarTcategoria(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcategoria  limit 8;	");
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
    public function listarTcategoriaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcategoria  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarTcategoriaPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  fruta_tcategoria  
                                            WHERE  ESTADO_REGISTRO  = 1
                                            AND ID_EMPRESA='".$IDEMPRESA."';	");
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

    public function listarTcategoria2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcategoria  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verTcategoria($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcategoria  WHERE  ID_TCATEGORIA = '".$ID."';");
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
    public function buscarNombreTcategoria($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_tcategoria  WHERE  NOMBRE_TCATEGORIA  LIKE '%".$NOMBRE."%';");
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
    public function agregarTcategoria(TCATEGORIA $TCATEGORIA){
        try{
            
            
            $query=
            "INSERT INTO  fruta_tcategoria  (
                                             NUMERO_TCATEGORIA , 
                                             NOMBRE_TCATEGORIA , 
                                             ID_EMPRESA , 
                                             ID_USUARIOI , 
                                             ID_USUARIOM ,
                                             INGRESO ,
                                             MODIFICACION ,
                                             ESTADO_REGISTRO 
                                        ) VALUES
	       	( ?, ?, ?,  ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $TCATEGORIA->__GET('NUMERO_TCATEGORIA'),
                    $TCATEGORIA->__GET('NOMBRE_TCATEGORIA'),
                    $TCATEGORIA->__GET('ID_EMPRESA'),
                    $TCATEGORIA->__GET('ID_USUARIOI'),
                    $TCATEGORIA->__GET('ID_USUARIOM')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarTcategoria($id){
        try{$sql="DELETE FROM  fruta_tcategoria  WHERE  ID_TCATEGORIA =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarTcategoria(TCATEGORIA $TCATEGORIA){
        try{
            $query = "
		UPDATE  fruta_tcategoria  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_TCATEGORIA = ?,
             ID_EMPRESA = ?,
             ID_USUARIOM = ?            
		WHERE  ID_TCATEGORIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $TCATEGORIA->__GET('NOMBRE_TCATEGORIA'),    
                    $TCATEGORIA->__GET('ID_EMPRESA'),
                    $TCATEGORIA->__GET('ID_USUARIOM'),     
                    $TCATEGORIA->__GET('ID_TCATEGORIA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
   
    //FUNCIONES ESPECIALIZADAS  
  

    
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(TCATEGORIA $TCATEGORIA){

        try{
            $query = "
    UPDATE  fruta_tcategoria  SET	
             MODIFICACION = SYSDATE(),		
             ESTADO_REGISTRO  = 0
    WHERE  ID_TCATEGORIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TCATEGORIA->__GET('ID_TCATEGORIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(TCATEGORIA $TCATEGORIA){
        try{
            $query = "
    UPDATE  fruta_tcategoria  SET	
             MODIFICACION = SYSDATE(),           		
             ESTADO_REGISTRO  = 1
    WHERE  ID_TCATEGORIA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $TCATEGORIA->__GET('ID_TCATEGORIA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function obtenerNumero($IDEMPRESA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(COUNT(NUMERO_TCATEGORIA),0) AS 'NUMERO'
                                                FROM `fruta_tcategoria`
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