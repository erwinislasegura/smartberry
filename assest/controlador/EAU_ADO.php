<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/EAU.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class EAU_ADO {
    
    
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
    public function listarEau(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `control_eau` limit 8;	");
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
    public function listarEauCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `control_eau` WHERE `ESTADO_REGISTRO` = 1;	");
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

    public function listarEau2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `control_eau` WHERE `ESTADO_REGISTRO` = 0;	");
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
    public function verEau($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `control_eau` WHERE `ID_EAU`= '".$ID."';");
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
    public function buscarRutUsuarioEau($NOMBRE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `control_eau` WHERE `RUT_USUARIO` LIKE '%".$NOMBRE."%';");
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

    
    //ELIMINAR FILA, NO SE UTILIZA
    public function agregarEau(EAU $EAU){
        try{
            
            
            $query=
            "INSERT INTO `control_eau` (
                                            `ID_USUARIO`,
                                            `ID_EMPRESA`,
                                            `ID_USUARIOI`,
                                            `ID_USUARIOM`,
                                            `INGRESO`,
                                            `MODIFICACION`, 
                                            `ESTADO`, 
                                            `ESTADO_REGISTRO`) VALUES
	       	( ?, ?, ?, ?,  SYSDATE() , SYSDATE(),1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $EAU->__GET('ID_USUARIO'),
                    $EAU->__GET('ID_EMPRESA')   ,
                    $EAU->__GET('ID_USUARIOI') ,
                    $EAU->__GET('ID_USUARIOM')                  
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    public function eliminarEau($IDEAU){
        try{$sql="DELETE FROM `control_eau` WHERE `ID_EAU`=".$IDEAU.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEau(EAU $EAU){
        try{
            $query = "
		UPDATE `control_eau` SET
            `MODIFICACION`= SYSDATE(),
            `ID_USUARIO`= ?,
            `ID_EMPRESA`= ?,
            `ID_USUARIOM`= ?            
		WHERE `ID_EAU`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $EAU->__GET('ID_USUARIO'),                    
                    $EAU->__GET('ID_EMPRESA'),   
                    $EAU->__GET('ID_USUARIOM') ,                 
                    $EAU->__GET('ID_EAU')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //BUSCADE DE LA EMPRESAS ASOACIADAS A USUARIOS
    public function buscarIdEmpresaEau($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `control_eau` WHERE `ID_EMPRESA` LIKE '%".$IDEMPRESA."%';");
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

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(EAU $EAU){

        try{
            $query = "
    UPDATE `control_eau` SET		
            `MODIFICACION`= SYSDATE(),			
            `ESTADO_REGISTRO` = 0
    WHERE `ID_EAU`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $EAU->__GET('ID_EAU')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EAU $EAU){
        try{
            $query = "
    UPDATE `control_eau` SET		
            `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 1
    WHERE `ID_EAU`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $EAU->__GET('ID_EAU')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    
    public function listarEauPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `control_eau` WHERE `ESTADO_REGISTRO` = 1 AND ID_EMPRESA ='".$IDEMPRESA."';	");
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