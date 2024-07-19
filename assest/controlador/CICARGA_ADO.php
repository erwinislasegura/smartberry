<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/CICARGA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class CICARGA_ADO {
    
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
    public function listarCicarga(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cicarga  limit 8;	");
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
    public function listarCicargaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cicarga   ;	");
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
    public function verCicarga($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_cicarga  WHERE  ID_CICARGA = '".$ID."';");
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
    public function agregarCicarga(CICARGA $CICARGA){
        try{          

    
            if ($CICARGA->__GET('ID_ICARGAO') == NULL) {
                $CICARGA->__SET('ID_ICARGAO', NULL);
            }
            if ($CICARGA->__GET('ID_ICARGAN') == NULL) {
                $CICARGA->__SET('ID_ICARGAN', NULL);
            }
            
            $query=
            "INSERT INTO  fruta_cicarga  (
                                             ID_ICARGAO , 
                                             ID_ICARGAN , 
                                             MOTIVO , 

                                             ID_EXIEXPORTACION , 
                                             ID_USUARIO , 

                                             INGRESO 

                                            ) VALUES
	       	( ?, ?, ?,   ?, ?,  SYSDATE() );";
            $this->conexion->prepare($query)
            ->execute(
                    array(
                        
                        $CICARGA->__GET('ID_ICARGAO'),
                        $CICARGA->__GET('ID_ICARGAN'),
                        $CICARGA->__GET('MOTIVO'),

                        $CICARGA->__GET('ID_EXIEXPORTACION'),
                        $CICARGA->__GET('ID_USUARIO')
                        
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
                                             FROM  fruta_cicarga   
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