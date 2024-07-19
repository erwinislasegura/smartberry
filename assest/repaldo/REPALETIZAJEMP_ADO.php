<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/REPALETIZAJEMP.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class REPALETIZAJEMP_ADO {
    
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
    public function listarRepaletizaje(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_repaletizajemp limit 8;	");
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
    public function listarRepaletizajeCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_repaletizajemp WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarRepaletizajeEmpresaPlantaTemporadaCBX($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_repaletizajemp 
                                            WHERE ESTADO_REGISTRO = 1                                                                 
                                            AND ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."' ;	");
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
    public function obtenerTotalesRepaletizajeCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_REPALETIZAJE),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(KILOS_NETO_REPALETIZAJE),0),2,'de_DE') AS 'NETO' 
                                            FROM fruta_repaletizajemp ;	");
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
    public function obtenerTotalesRepaletizajeEmpresaPlantaTemporadaCBX($EMPRESA,$PLANTA,$TEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_REPALETIZAJE),0),0,'de_DE') AS 'ENVASE',   
                                                     FORMAT(IFNULL(SUM(KILOS_NETO_REPALETIZAJE),0),2,'de_DE') AS 'NETO' 
                                            FROM fruta_repaletizajemp                                                                                                     
                                            WHERE ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."';	");
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
    public function listarRepaletizajeCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM fruta_repaletizajempWHERE  ESTADO_REGISTRO = 0;;	");
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
    public function verRepaletizaje($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT *, DATE_FORMAT(INGRESO, '%Y-%m-%d ') AS 'INGRESO' ,
                                                      DATE_FORMAT(MODIFICACION, '%Y-%m-%d ')  AS 'MODIFICACION'  
                                            FROM fruta_repaletizajemp WHERE ID_REPALETIZAJE= '".$ID."';");
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

    public function verRepaletizaje2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT *, DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO' ,
                                                      DATE_FORMAT(MODIFICACION, '%d-%m-%Y ')  AS 'MODIFICACION',
                                                      FORMAT(CANTIDAD_ENVASE_REPALETIZAJE,0,'de_DE') AS 'ENVASE',
                                                      FORMAT(KILOS_NETO_REPALETIZAJE,2,'de_DE') AS 'NETO'  
                                            FROM fruta_repaletizajemp
                                             WHERE ID_REPALETIZAJE= '".$ID."';");
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
    public function agregarRepaletizaje(REPALETIZAJEMP $REPALETIZAJEMP){
        try{
            
            
            $query=
            "INSERT INTO fruta_repaletizajemp ( 
                                            NUMERO_REPALETIZAJE,
                                            CANTIDAD_ENVASE_REPALETIZAJE,KILOS_NETO_REPALETIZAJE,
                                            MOTIVO_REPALETIZAJE,
                                            ID_EMPRESA, ID_PLANTA, ID_TEMPORADA,
                                            INGRESO,MODIFICACION,
                                            ESTADO, ESTADO_REGISTRO  ) 
            VALUES
	       	( ?, ?, ?, ?, ?, ?, ?,  SYSDATE(), SYSDATE(),  1, 1 );";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    
                    $REPALETIZAJEMP->__GET('NUMERO_REPALETIZAJE'),
                    $REPALETIZAJEMP->__GET('CANTIDAD_ENVASE_REPALETIZAJE'),
                    $REPALETIZAJEMP->__GET('KILOS_NETO_REPALETIZAJE'),
                    $REPALETIZAJEMP->__GET('MOTIVO_REPALETIZAJE'),
                    $REPALETIZAJEMP->__GET('ID_EMPRESA'),
                    $REPALETIZAJEMP->__GET('ID_PLANTA'),
                    $REPALETIZAJEMP->__GET('ID_TEMPORADA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarRepaletizaje($id){
        try{$sql="DELETE FROM fruta_repaletizajemp WHERE ID_REPALETIZAJE=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarRepaletizaje(REPALETIZAJEMP $REPALETIZAJEMP){
        try{
            $query = "
		UPDATE fruta_repaletizajemp SET
            CANTIDAD_ENVASE_REPALETIZAJE= ?,
            KILOS_NETO_REPALETIZAJE= ?,
            MOTIVO_REPALETIZAJE= ?,
            MODIFICACION = SYSDATE(),
            ID_EMPRESA = ?,
            ID_PLANTA = ?, 
            ID_TEMPORADA = ?
            
		WHERE ID_REPALETIZAJE= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $REPALETIZAJEMP->__GET('CANTIDAD_ENVASE_REPALETIZAJE'),
                    $REPALETIZAJEMP->__GET('KILOS_NETO_REPALETIZAJE'),
                    $REPALETIZAJEMP->__GET('MOTIVO_REPALETIZAJE'),    
                    $REPALETIZAJEMP->__GET('ID_EMPRESA'),
                    $REPALETIZAJEMP->__GET('ID_PLANTA'),
                    $REPALETIZAJEMP->__GET('ID_TEMPORADA'),   
                    $REPALETIZAJEMP->__GET('ID_REPALETIZAJE')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
//ACTUALIZAR INFORMACION DE LA FILA
public function actualizarRepaletizajeExistenciaMateriaPrima(REPALETIZAJEMP $REPALETIZAJEMP){
    try{
        $query = "
    UPDATE fruta_repaletizajemp SET
        CANTIDAD_ENVASE_REPALETIZAJE= ?,
        KILOS_NETO_REPALETIZAJE= ?,
        MODIFICACION = SYSDATE()        
    WHERE ID_REPALETIZAJE= ?;";
        $this->conexion->prepare($query)
        ->execute(
            array(
                $REPALETIZAJEMP->__GET('CANTIDAD_ENVASE_REPALETIZAJE'),
                $REPALETIZAJEMP->__GET('KILOS_NETO_REPALETIZAJE'),  
                $REPALETIZAJEMP->__GET('ID_REPALETIZAJE')
                
            )
            
            );
        
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}
//ACTUALIZAR INFORMACION DE LA FILA
public function actualizarRepaletizajeQuitarExistenciaMateriaPrima(REPALETIZAJEMP $REPALETIZAJEMP){
    try{
        $query = "
    UPDATE fruta_repaletizajemp SET
        CANTIDAD_ENVASE_REPALETIZAJE= ?,
        KILOS_NETO_REPALETIZAJE= ?,
        MODIFICACION = SYSDATE()        
    WHERE ID_REPALETIZAJE= ?;";
        $this->conexion->prepare($query)
        ->execute(
            array(  
                    $REPALETIZAJEMP->__GET('CANTIDAD_ENVASE_REPALETIZAJE'),
                    $REPALETIZAJEMP->__GET('KILOS_NETO_REPALETIZAJE'),  
                    $REPALETIZAJEMP->__GET('ID_REPALETIZAJE')
                
            )
            
            );
        
    }catch(Exception $e){
        die($e->getMessage());
    }
    
}



    //FUNCIONES ESPECIALIZADAS
//CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function buscarID( $CANTIDADENVASEORIGINALREPALETIZAJE,$KILOSNETOORGINALREPALETIZAJE,
                              $MOTIVO_REPALETIZAJE,
                              $EMPRESA,$PLANTA,$TEMPORADA ){
        try{
            $datos=$this->conexion->prepare(" SELECT *
                                            FROM fruta_repaletizajemp
                                            WHERE 
                                                CANTIDAD_ENVASE_REPALETIZAJE LIKE '".$CANTIDADENVASEORIGINALREPALETIZAJE."'
                                            AND KILOS_NETO_REPALETIZAJE = '".$KILOSNETOORGINALREPALETIZAJE."'                                                  
                                            AND MOTIVO_REPALETIZAJE  LIKE '".$MOTIVO_REPALETIZAJE."'  
                                            AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                            AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')   
                                            AND ID_EMPRESA = '".$EMPRESA."'                                      
                                            AND ID_PLANTA = '".$PLANTA ."'                                      
                                            AND ID_TEMPORADA = '".$TEMPORADA."'
                                            ORDER BY ID_REPALETIZAJE DESC
                                                 ; ");
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
    public function deshabilitar(REPALETIZAJEMP $REPALETIZAJEMP){

        try{
            $query = "
                UPDATE fruta_repaletizajemp SET			
                        ESTADO_REGISTRO = 0
                WHERE ID_REPALETIZAJE= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $REPALETIZAJEMP->__GET('ID_REPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(REPALETIZAJEMP $REPALETIZAJEMP){
        try{
            $query = "
                UPDATE fruta_repaletizajemp SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_REPALETIZAJE= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $REPALETIZAJEMP->__GET('ID_REPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
       //CAMBIO ESTADO
        //ABIERTO 1
        public function abierto(REPALETIZAJEMP $REPALETIZAJEMP){
            try{
                $query = "
                    UPDATE fruta_repaletizajemp SET			
                            ESTADO = 1
                    WHERE ID_REPALETIZAJE= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $REPALETIZAJEMP->__GET('ID_REPALETIZAJE')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }
        //CERRADO 0
        public function  cerrado(REPALETIZAJEMP $REPALETIZAJEMP){
            try{
                $query = "
                    UPDATE fruta_repaletizajemp SET			
                            ESTADO = 0
                    WHERE ID_REPALETIZAJE= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $REPALETIZAJEMP->__GET('ID_REPALETIZAJE')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }

//FILTRO
public function filtro4RepaletizajeCBX($FECHADESDE, $FECHAHASTA){
    try{
        
        $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                FORMAT(CANTIDAD_ENVASE_REPALETIZAJE,0,'de_DE')  AS 'ENVASE',
                                                FORMAT(KILOS_NETO_REPALETIZAJE,2,'de_DE')  AS 'NETO'
                                        FROM fruta_repaletizajemp  
                                        WHERE INGRESO BETWEEN '".$FECHADESDE."' AND '".$FECHAHASTA."'
                                        ;");
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
public function filtro4TotalesRepaletizajeCBX($FECHADESDE, $FECHAHASTA){
    try{
        
        $datos=$this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_REPALETIZAJE),0),0,'de_DE') AS 'ENVASE',   
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_REPALETIZAJE),0),2,'de_DE') AS 'NETO'
                                        FROM fruta_repaletizajemp  
                                        WHERE INGRESO BETWEEN '".$FECHADESDE."' AND '".$FECHAHASTA."'
                                        ;	");
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
    
public function obtenerNumero($EMPRESA,$PLANTA,$TEMPORADA){
    try{
        $datos=$this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_REPALETIZAJE,0)) AS 'NUMERO'
                                            FROM fruta_repaletizajemp
                                            WHERE  
                                                ID_EMPRESA = '".$EMPRESA."' 
                                            AND ID_PLANTA = '".$PLANTA."'
                                            AND ID_TEMPORADA = '".$TEMPORADA."'     
                                                ; ");
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