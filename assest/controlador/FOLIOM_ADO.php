<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/FOLIOM.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class FOLIOM_ADO {

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
 //LISTAR TODO CON LIMITE DE 8 FILAS       
    public function listarFolio(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_folio` limit 8;	");
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
    public function listarFolioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_folio` WHERE `ESTADO_REGISTRO` = 1;	");
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

    public function listarFolio2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_folio` WHERE `ESTADO_REGISTRO` = 0;	");
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
    public function verFolio($IDFOLIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_folio` WHERE `ID_FOLIO`= '".$IDFOLIO."';");
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
    public function verFolioPorNumero($NUMEROFOLIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_folio` WHERE `NUMERO_FOLIO`= '".$NUMEROFOLIO."';");
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
    public function agregarFolio(FOLIO $FOLIO){
        try{
            
            
            $query=
            "INSERT INTO `material_folio` (`NUMERO_FOLIO`,
                                           `ALIAS_DINAMICO_FOLIO`,
                                           `ALIAS_ESTATICO_FOLIO`,
                                           `TFOLIO`,
                                           `ID_EMPRESA`,
                                           `ID_PLANTA`,
                                           `ID_TEMPORADA`,
                                           `ID_USUARIOI`,
                                           `ID_USUARIOM`,
                                           `ESTADO_REGISTRO`) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $FOLIO->__GET('NUMERO_FOLIO'),
                    $FOLIO->__GET('ALIAS_DINAMICO_FOLIO')  , 
                    $FOLIO->__GET('ALIAS_ESTATICO_FOLIO') ,
                    $FOLIO->__GET('TFOLIO'),
                    $FOLIO->__GET('ID_EMPRESA'),
                    $FOLIO->__GET('ID_PLANTA'),
                    $FOLIO->__GET('ID_TEMPORADA'),
                    $FOLIO->__GET('ID_USUARIOI'),
                    $FOLIO->__GET('ID_USUARIOM') 
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarFolio($id){
        try{$sql="DELETE FROM `material_folio` WHERE `ID_FOLIO`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarFolio(FOLIO $FOLIO){
        try{
            $query = "
		UPDATE `material_folio` SET
            `NUMERO_FOLIO`= ?,
            `ALIAS_DINAMICO_FOLIO`= ? ,
            `ALIAS_ESTATICO_FOLIO`= ?  ,    
            `TFOLIO`= ?,
            `ID_EMPRESA`= ?,
            `ID_PLANTA`= ?,
            `ID_TEMPORADA`= ?,   
            `ID_USUARIOM`= ?     
		WHERE `ID_FOLIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $FOLIO->__GET('NUMERO_FOLIO'),
                    $FOLIO->__GET('ALIAS_DINAMICO_FOLIO')  , 
                    $FOLIO->__GET('ALIAS_ESTATICO_FOLIO') , 
                    $FOLIO->__GET('TFOLIO'),
                    $FOLIO->__GET('ID_EMPRESA'),
                    $FOLIO->__GET('ID_PLANTA'),
                    $FOLIO->__GET('ID_TEMPORADA'), 
                    $FOLIO->__GET('ID_USUARIOM') ,
                    $FOLIO->__GET('ID_FOLIO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(FOLIO $FOLIO){

        try{
            $query = "
    UPDATE `material_folio` SET				
    `MODIFICACION`= SYSDATE(),	
            `ESTADO_REGISTRO` = 0
    WHERE `ID_FOLIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FOLIO->__GET('ID_FOLIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(FOLIO $FOLIO){
        try{
            $query = "
    UPDATE `material_folio` SET			
    `MODIFICACION`= SYSDATE(),		
            `ESTADO_REGISTRO` = 1
    WHERE `ID_FOLIO`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FOLIO->__GET('ID_FOLIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //VER FOLIO FILTRADO POR EMPRESA
    public function listarFoliPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `material_folio` 
                                             WHERE `ESTADO_REGISTRO` = 1
                                             AND ID_EMPRESA= '".$IDEMPRESA."';");
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
    public function validarFolio($EMPRESA, $PLANTA, $TEMPORADA, $TFOLIO ){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                 FROM `material_folio` 
                                            WHERE `ID_EMPRESA` = ".$EMPRESA." 
                                                AND `ID_PLANTA` = ".$PLANTA."
                                                AND `ID_TEMPORADA` = ".$TEMPORADA."  
                                                AND `TFOLIO` =".$TFOLIO."   ;");
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
    public function verFolioPorEmpresaPlantaTemporadaTMateriales($EMPRESA, $PLANTA, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM `material_folio` 
                                                WHERE `ID_EMPRESA` = '".$EMPRESA."' 
                                                AND `ID_PLANTA`= '".$PLANTA."' 
                                                AND `ID_TEMPORADA`= '".$TEMPORADA."' 
                                                AND `TFOLIO` = 1
                                                AND  ESTADO_REGISTRO = 1;");
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
    public function verFolioPorEmpresaPlantaTemporadaTenvase($EMPRESA, $PLANTA, $TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                             FROM `material_folio` 
                                                WHERE `ID_EMPRESA`= '".$EMPRESA."' 
                                                AND `ID_PLANTA`= '".$PLANTA."' 
                                                AND `ID_TEMPORADA`= '".$TEMPORADA."' 
                                                AND  `TFOLIO`= 2
                                                AND ESTADO_REGISTRO = 1;");
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