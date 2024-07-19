<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/REAPT.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class REAPT_ADO {
    
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
    public function listarReapt(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_reapt ;	");
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
    public function verReapt($ID1, $ID2){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  fruta_reapt  
                                            WHERE  ID_RECHAZO = '".$ID1."'
                                            AND ID_EXIEXPORTACION = '".$ID2."';");
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
    public function agregarReapt(REAPT $REAPT){
        try{
            
            
            $query=
            "INSERT INTO  fruta_reapt  (                                            
                                            ID_RECHAZO , 
                                            ID_EXIEXPORTACION 
                                        ) VALUES
	       	( ?, ? );";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $REAPT->__GET('ID_RECHAZO'),
                    $REAPT->__GET('ID_EXIEXPORTACION')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarReapt($ID1, $ID2){
        try{$sql="DELETE FROM  fruta_reapt   
                  WHERE  ID_RECHAZO = '".$ID1."'
                  AND ID_EXIEXPORTACION = '".$ID2."';";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  


    
}
?>