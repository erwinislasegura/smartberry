<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/PTUSUARIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class PTUSUARIO_ADO {
    
    
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
    public function listarPtusuario(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ptusuario  limit 8;	");
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
    public function listarPtusuarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ptusuario WHERE  ESTADO_REGISTRO = 1;	");
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


    public function listarPtusuario2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ptusuario WHERE ESTADO_REGISTRO = 0;	");
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
    public function verPtusuario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ptusuario  WHERE  ID_PTUSUARIO = '".$ID."';");
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

    public function agregarPtusuario(PTUSUARIO $PTUSUARIO){
        try{
            
              
            
            $query=
            "INSERT INTO  usuario_ptusuario  (          
                                                        FRUTA,
                                                        FAVISO,
                                                        FRABIERTO,

                                                        FGRANEL,
                                                        FGRECEPCION,
                                                        FGDESPACHO,
                                                        FGGUIA,

                                                        FPACKING,
                                                        FPPROCESO,
                                                        FPREEMBALEJE,

                                                        FSAG,
                                                        FSAGINSPECCION,

                                                        FFRIGORIFICO,
                                                        FFRECEPCION,
                                                        FFRDESPACHO,
                                                        FFRGUIA,
                                                        FFRREPALETIZAJE,
                                                        FFRPC,
                                                        FFRCFOLIO,

                                                        FCFRUTA,
                                                        FCFRECHAZO,
                                                        FCFLEVANTAMIENTO,

                                                        FEXISTENCIA,
                   
                                                        MATERIALES,
                                                        MRABIERTO,

                                                        MMATERIALES,
                                                        MMRECEPION,
                                                        MMDEAPCHO,
                                                        MMGUIA,

                                                        MENVASE,
                                                        MERECEPCION,
                                                        MEDESPACHO,
                                                        MEGUIA,

                                                        MADMINISTRACION,
                                                        MAOC,
                                                        MAOCAR,

                                                        MKARDEX,
                                                        MKMATERIAL,
                                                        MKENVASE,

                                                        EXPORTADORA,
                                                        EMATERIALES,
                                                        EEXPORTACION,
                                                        ELIQUIDACION,
                                                        EPAGO,
                                                        EFRUTA,
                                                        EFCICARGA,
                                                        EINFORMES,

                                                        ESTADISTICA , 
                                                        ESTARVSP , 
                                                        ESTASTOPMP , 
                                                        ESTAINFORME , 
                                                        ESTAEXISTENCIA , 
                                                        ESTAPRODUCTOR , 

                                                        MANTENEDORES , 
                                                        MREGISTRO , 
                                                        MEDITAR , 
                                                        MVER , 
                                                        MAGRUPADO , 

                                                        ADMINISTRADOR , 
                                                        ADUSUARIO ,  
                                                        ADAPERTURA ,  
                                                        ADAVISO , 

                                                        ID_USUARIOI , 
                                                        ID_USUARIOM , 
                                                        ID_TUSUARIO , 

                                                        INGRESO,
                                                        MODIFICACION,
                                                        ESTADO_REGISTRO
                                             ) VALUES
	       	( ?, ?, ?,     ?, ?, ?, ?,    ?, ?, ?,    ?, ?,   ?, ?, ?, ?, ?, ?, ?,   ?, ?, ?,   ?,    ?,?,     ?, ?, ?, ?,   ?, ?, ?, ?,   ?, ?, ?,   ?, ?, ?,    ?, ?, ?, ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?, ?, ?, ?,      ?, ?, ?,  SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(              
                    $PTUSUARIO->__GET('FRUTA')  ,  
                    $PTUSUARIO->__GET('FAVISO')  ,  
                    $PTUSUARIO->__GET('FRABIERTO')  ,  

                    $PTUSUARIO->__GET('FGRANEL')  ,  
                    $PTUSUARIO->__GET('FGRECEPCION')  ,  
                    $PTUSUARIO->__GET('FGDESPACHO')  ,  
                    $PTUSUARIO->__GET('FGGUIA')  ,  

                    $PTUSUARIO->__GET('FPACKING')  ,  
                    $PTUSUARIO->__GET('FPPROCESO')  ,  
                    $PTUSUARIO->__GET('FPREEMBALEJE')  ,  
                  
                    $PTUSUARIO->__GET('FSAG')  ,  
                    $PTUSUARIO->__GET('FSAGINSPECCION')  ,                   
                   
                    $PTUSUARIO->__GET('FFRIGORIFICO')  ,  
                    $PTUSUARIO->__GET('FFRECEPCION')  ,  
                    $PTUSUARIO->__GET('FFRDESPACHO')  , 
                    $PTUSUARIO->__GET('FFRGUIA')  ,  
                    $PTUSUARIO->__GET('FFRREPALETIZAJE')  ,  
                    $PTUSUARIO->__GET('FFRPC')  ,  
                    $PTUSUARIO->__GET('FFRCFOLIO')  ,    
                    
                    $PTUSUARIO->__GET('FCFRUTA')  ,  
                    $PTUSUARIO->__GET('FCFRECHAZO')  ,  
                    $PTUSUARIO->__GET('FCFLEVANTAMIENTO')  ,  
                 
                    $PTUSUARIO->__GET('FEXISTENCIA')  , 

                    $PTUSUARIO->__GET('MATERIALES')  ,  
                    $PTUSUARIO->__GET('MRABIERTO')  ,  
                    
                    $PTUSUARIO->__GET('MMATERIALES')  ,  
                    $PTUSUARIO->__GET('MMRECEPION')  ,  
                    $PTUSUARIO->__GET('MMDEAPCHO')  ,  
                    $PTUSUARIO->__GET('MMGUIA')  ,  
                    
                    $PTUSUARIO->__GET('MENVASE')  ,  
                    $PTUSUARIO->__GET('MERECEPCION')  ,  
                    $PTUSUARIO->__GET('MEDESPACHO')  ,  
                    $PTUSUARIO->__GET('MEGUIA')  ,  

                    $PTUSUARIO->__GET('MADMINISTRACION')  ,  
                    $PTUSUARIO->__GET('MAOC')  ,  
                    $PTUSUARIO->__GET('MAOCAR')  ,  
                    
                    $PTUSUARIO->__GET('MKARDEX')  ,  
                    $PTUSUARIO->__GET('MKMATERIAL')  ,  
                    $PTUSUARIO->__GET('MKENVASE')  ,  

                    $PTUSUARIO->__GET('EXPORTADORA')  ,  
                    $PTUSUARIO->__GET('EMATERIALES')  ,  
                    $PTUSUARIO->__GET('EEXPORTACION')  ,  
                    $PTUSUARIO->__GET('ELIQUIDACION')  ,  
                    $PTUSUARIO->__GET('EPAGO')  ,  
                    $PTUSUARIO->__GET('EFRUTA')  ,  
                    $PTUSUARIO->__GET('EFCICARGA')  ,  
                    $PTUSUARIO->__GET('EINFORMES')  ,  

                    $PTUSUARIO->__GET('ESTADISTICA')  ,  
                    $PTUSUARIO->__GET('ESTARVSP')  ,  
                    $PTUSUARIO->__GET('ESTASTOPMP')  ,  
                    $PTUSUARIO->__GET('ESTAINFORME')  ,  
                    $PTUSUARIO->__GET('ESTAEXISTENCIA')  ,  
                    $PTUSUARIO->__GET('ESTAPRODUCTOR')  ,

                    $PTUSUARIO->__GET('MANTENEDORES')  ,  
                    $PTUSUARIO->__GET('MREGISTRO')  ,  
                    $PTUSUARIO->__GET('MEDITAR')  ,  
                    $PTUSUARIO->__GET('MVER')  ,  
                    $PTUSUARIO->__GET('MAGRUPADO')  ,  

                    $PTUSUARIO->__GET('ADMINISTRADOR')  , 
                    $PTUSUARIO->__GET('ADUSUARIO')  , 
                    $PTUSUARIO->__GET('ADAPERTURA')  , 
                    $PTUSUARIO->__GET('ADAVISO')  , 

                    $PTUSUARIO->__GET('ID_USUARIOI')  ,  
                    $PTUSUARIO->__GET('ID_USUARIOM')  ,  
                    $PTUSUARIO->__GET('ID_TUSUARIO')              
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarPtusuario($id){
        try{$sql="DELETE FROM  usuario_ptusuario  WHERE  ID_PTUSUARIO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarPtusuario(PTUSUARIO $PTUSUARIO){
        try{
            $query = "
		UPDATE  usuario_ptusuario  SET             
                MODIFICACION = SYSDATE(),

                FRUTA = ?,
                FAVISO = ?,
                FRABIERTO = ?,
                
                FGRANEL = ?,
                FGRECEPCION = ?,
                FGDESPACHO = ?,
                FGGUIA = ?,

                FPACKING = ?,
                FPPROCESO = ?,
                FPREEMBALEJE = ?,

                FSAG = ?,
                FSAGINSPECCION = ?,

                FFRIGORIFICO = ?,
                FFRECEPCION = ?,
                FFRDESPACHO = ?,
                FFRGUIA = ?,
                FFRREPALETIZAJE = ?,
                FFRPC = ?,
                FFRCFOLIO = ?,

                FCFRUTA = ?,
                FCFRECHAZO = ?,
                FCFLEVANTAMIENTO = ?,

                FEXISTENCIA = ?,
                
                MATERIALES = ?,
                MRABIERTO = ?,
                
                MMATERIALES = ?,
                MMRECEPION = ?,
                MMDEAPCHO = ?,
                MMGUIA = ?,

                MENVASE = ?,
                MERECEPCION = ?,
                MEDESPACHO = ?,
                MEGUIA = ?,
                
                MADMINISTRACION = ?,
                MAOC = ?,
                MAOCAR = ?,
                
                MKARDEX = ?,
                MKMATERIAL = ?,
                MKENVASE = ?,

                EXPORTADORA = ?,
                EMATERIALES = ?,
                EEXPORTACION = ?,
                ELIQUIDACION = ?,
                EPAGO = ?,
                EFRUTA = ?,
                EFCICARGA = ?,
                EINFORMES = ?,               

                ESTADISTICA = ?,
                ESTARVSP = ?,
                ESTASTOPMP = ?,
                ESTAINFORME = ?,
                ESTAEXISTENCIA = ?,
                ESTAPRODUCTOR = ?,

                MANTENEDORES = ?,
                MREGISTRO = ?,
                MEDITAR = ?,
                MVER = ?,
                MAGRUPADO = ?,

                ADMINISTRADOR = ?,
                ADUSUARIO = ?,
                ADAPERTURA = ?,
                ADAVISO = ?,

                ID_USUARIOM = ?          
		WHERE  ID_PTUSUARIO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                        

                    $PTUSUARIO->__GET('FRUTA')  ,  
                    $PTUSUARIO->__GET('FAVISO')  ,  
                    $PTUSUARIO->__GET('FRABIERTO')  ,  

                    $PTUSUARIO->__GET('FGRANEL')  ,  
                    $PTUSUARIO->__GET('FGRECEPCION')  ,  
                    $PTUSUARIO->__GET('FGDESPACHO')  ,  
                    $PTUSUARIO->__GET('FGGUIA')  ,  

                    $PTUSUARIO->__GET('FPACKING')  ,  
                    $PTUSUARIO->__GET('FPPROCESO')  ,  
                    $PTUSUARIO->__GET('FPREEMBALEJE')  ,  
                  
                    $PTUSUARIO->__GET('FSAG')  ,  
                    $PTUSUARIO->__GET('FSAGINSPECCION')  ,                   
                   
                    $PTUSUARIO->__GET('FFRIGORIFICO')  ,  
                    $PTUSUARIO->__GET('FFRECEPCION')  ,  
                    $PTUSUARIO->__GET('FFRDESPACHO')  , 
                    $PTUSUARIO->__GET('FFRGUIA')  ,  
                    $PTUSUARIO->__GET('FFRREPALETIZAJE')  ,  
                    $PTUSUARIO->__GET('FFRPC')  ,  
                    $PTUSUARIO->__GET('FFRCFOLIO')  ,    
                    
                    $PTUSUARIO->__GET('FCFRUTA')  ,  
                    $PTUSUARIO->__GET('FCFRECHAZO')  ,  
                    $PTUSUARIO->__GET('FCFLEVANTAMIENTO')  ,  
                 
                    $PTUSUARIO->__GET('FEXISTENCIA')  , 

                    $PTUSUARIO->__GET('MATERIALES')  ,  
                    $PTUSUARIO->__GET('MRABIERTO')  ,  

                    $PTUSUARIO->__GET('MMATERIALES')  ,  
                    $PTUSUARIO->__GET('MMRECEPION')  ,  
                    $PTUSUARIO->__GET('MMDEAPCHO')  ,  
                    $PTUSUARIO->__GET('MMGUIA')  ,  
                    
                    $PTUSUARIO->__GET('MENVASE')  ,  
                    $PTUSUARIO->__GET('MERECEPCION')  ,  
                    $PTUSUARIO->__GET('MEDESPACHO')  ,  
                    $PTUSUARIO->__GET('MEGUIA')  ,  
                                        
                    $PTUSUARIO->__GET('MADMINISTRACION')  ,  
                    $PTUSUARIO->__GET('MAOC')  ,  
                    $PTUSUARIO->__GET('MAOCAR')  ,  
                    
                    $PTUSUARIO->__GET('MKARDEX')  ,  
                    $PTUSUARIO->__GET('MKMATERIAL')  ,  
                    $PTUSUARIO->__GET('MKENVASE')  ,  

                    $PTUSUARIO->__GET('EXPORTADORA')  ,  
                    $PTUSUARIO->__GET('EMATERIALES')  ,  
                    $PTUSUARIO->__GET('EEXPORTACION')  ,  
                    $PTUSUARIO->__GET('ELIQUIDACION')  , 
                    $PTUSUARIO->__GET('EPAGO')  ,  
                    $PTUSUARIO->__GET('EFRUTA')  ,  
                    $PTUSUARIO->__GET('EFCICARGA')  ,   
                    $PTUSUARIO->__GET('EINFORMES')  ,  
                    
                    $PTUSUARIO->__GET('ESTADISTICA')  ,  
                    $PTUSUARIO->__GET('ESTARVSP')  ,  
                    $PTUSUARIO->__GET('ESTASTOPMP')  ,  
                    $PTUSUARIO->__GET('ESTAINFORME')  ,  
                    $PTUSUARIO->__GET('ESTAEXISTENCIA')  ,  
                    $PTUSUARIO->__GET('ESTAPRODUCTOR')  ,

                    $PTUSUARIO->__GET('MANTENEDORES')  ,  
                    $PTUSUARIO->__GET('MREGISTRO')  ,  
                    $PTUSUARIO->__GET('MEDITAR')  ,  
                    $PTUSUARIO->__GET('MVER')  ,  
                    $PTUSUARIO->__GET('MAGRUPADO')  ,  

                    $PTUSUARIO->__GET('ADMINISTRADOR')  , 
                    $PTUSUARIO->__GET('ADUSUARIO')  , 
                    $PTUSUARIO->__GET('ADAPERTURA')  , 
                    $PTUSUARIO->__GET('ADAVISO')  , 


                    $PTUSUARIO->__GET('ID_USUARIOM')  ,             
                    $PTUSUARIO->__GET('ID_PTUSUARIO')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(PTUSUARIO $PTUSUARIO){

        try{
            $query = "
            UPDATE  usuario_ptusuario  SET			
                    ESTADO_REGISTRO  = 0
            WHERE  ID_PTUSUARIO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PTUSUARIO->__GET('ID_PTUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(PTUSUARIO $PTUSUARIO){
        try{
            $query = "
            UPDATE  usuario_ptusuario  SET			
                    ESTADO_REGISTRO  = 1
            WHERE  ID_PTUSUARIO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $PTUSUARIO->__GET('ID_PTUSUARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //BUSCADE DE LA EMPRESAS ASOACIADAS A USUARIOS
    public function listarPtusuarioPorTusuarioCBX($IDTUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  usuario_ptusuario  
                                            WHERE ID_TUSUARIO = '".$IDTUSUARIO."'
                                            AND ESTADO_REGISTRO = 1;	");
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