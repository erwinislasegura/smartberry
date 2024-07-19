<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CFOLIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class CFOLIO_ADO {
    
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
    public function listarCfolio(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cfolio  limit 8;	");
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
    public function listarCfolioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cfolio   ;	");
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
    public function verCfolio($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cfolio  WHERE  ID_CFOLIO = '".$ID."';");
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
    public function agregarCfolio(CFOLIO $CFOLIO){
        try{          

    
            
            $query=
            "INSERT INTO  fruta_cfolio  (
                                             FOLIOORIGINAL , 
                                             FOLIONUEVO , 
                                             MOTIVO , 

                                             ID_EXIEXPORTACION , 
                                             ID_USUARIO , 

                                             INGRESO 

                                            ) VALUES
	       	( ?, ?, ?,   ?, ?,  SYSDATE() );";
            $this->conexion->prepare($query)
            ->execute(
                    array(
                        
                        $CFOLIO->__GET('FOLIOORIGINAL'),
                        $CFOLIO->__GET('FOLIONUEVO'),
                        $CFOLIO->__GET('MOTIVO'),

                        $CFOLIO->__GET('ID_EXIEXPORTACION'),
                        $CFOLIO->__GET('ID_USUARIO')
                        
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
 
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
 
    
    //FUNCIONES ESPECIALIZADAS


    public function buscarPorIdExistenciaPt($IDEXIEXPORTACION){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                             FROM  fruta_cfolio   
                                             WHERE ID_EXIEXPORTACION = '".$IDEXIEXPORTACION."';	");
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