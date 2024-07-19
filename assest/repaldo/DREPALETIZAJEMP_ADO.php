<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DREPALETIZAJEMP.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class DREPALETIZAJEMP_ADO {
    
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
    public function listarDrepaletizaje(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_drepaletizajemp` limit 8;	");
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
    public function listarDrepaletizajeCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_drepaletizajemp` WHERE `ESTADO_REGISTRO` = 1;	");
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
    public function listarDrepaletizajeCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_drepaletizajemp`WHERE  `ESTADO_REGISTRO` = 0;;	");
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
    public function verDrepaletizaje($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_drepaletizajemp` WHERE `ID_DREPALETIZAJE`= '".$ID."';");
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
    public function agregarDrepaletizaje(DREPALETIZAJEMP $DREPALETIZAJEMP){
        try{
            
            
            $query=
            "INSERT INTO `fruta_drepaletizajemp` ( `FOLIO_NUEVO_DREPALETIZAJE`,`FECHA_COSECHA_DREPALETIZAJE`,`FOLIO_MANUAL`,
                                            `CANTIDAD_ENVASE_DREPALETIZAJE`,`KILOS_NETO_DREPALETIZAJE`,`KILOS_BRUTO_DREPALETIZAJE`,
                                            `KILOS_PROMEDIO_DREPALETIZAJE`,`PESO_PALLET_DREPALETIZAJE`,
                                            `ALIAS_FOLIO_DREPALETIZAJE`,`GASIFICADO`,
                                            `ID_TMANEJO`,`ID_FOLIO`,`ID_ESTANDAR`,`ID_PRODUCTOR`,`ID_PVESPECIES`,`ID_REPALETIZAJE`,
                                            `FECHA_INGRESO`,`FECHA_MODIFICACION`,
                                            `ESTADO`,`ESTADO_REGISTRO`  ) 
            VALUES
	       	(  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE(), SYSDATE(),  1, 1 );";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                        $DREPALETIZAJEMP->__GET('FOLIO_NUEVO_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('FECHA_COSECHA_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('FOLIO_MANUAL'),
                        $DREPALETIZAJEMP->__GET('CANTIDAD_ENVASE_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('KILOS_NETO_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('KILOS_BRUTO_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('KILOS_PROMEDIO_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('PESO_PALLET_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('ALIAS_FOLIO_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('GASIFICADO')  ,
                        $DREPALETIZAJEMP->__GET('ID_TMANEJO')  ,
                        $DREPALETIZAJEMP->__GET('ID_FOLIO'),
                        $DREPALETIZAJEMP->__GET('ID_ESTANDAR')  ,
                        $DREPALETIZAJEMP->__GET('ID_PRODUCTOR'),
                        $DREPALETIZAJEMP->__GET('ID_PVESPECIES'),
                        $DREPALETIZAJEMP->__GET('ID_REPALETIZAJE')                    
                     )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDrepaletizaje($id){
        try{$sql="DELETE FROM `fruta_drepaletizajemp` WHERE `ID_DREPALETIZAJE`=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDrepaletizaje(DREPALETIZAJEMP $DREPALETIZAJEMP){
        try{
            $query = "
		UPDATE `fruta_drepaletizajemp` SET
            `FECHA_MODIFICACION`= SYSDATE(),   
            `FOLIO_MANUAL`= ?,
            `CANTIDAD_ENVASE_DREPALETIZAJE`= ?,
            `KILOS_NETO_DREPALETIZAJE`= ?,    
            `KILOS_BRUTO_DREPALETIZAJE`= ?,    
            `KILOS_PROMEDIO_DREPALETIZAJE`= ?,    
            `PESO_PALLET_DREPALETIZAJE`= ?,    
            `GASIFICADO`= ?,
            `ID_TMANEJO`= ?,   
            `ID_FOLIO`= ?,        
            `ID_ESTANDAR` = ? ,  
            `ID_PRODUCTOR`= ?,
            `ID_PVESPECIES`= ?,
            `ID_REPALETIZAJE` = ?           
		WHERE `ID_DREPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(
                        $DREPALETIZAJEMP->__GET('FOLIO_MANUAL'),
                        $DREPALETIZAJEMP->__GET('CANTIDAD_ENVASE_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('KILOS_NETO_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('KILOS_BRUTO_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('KILOS_PROMEDIO_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('PESO_PALLET_DREPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('GASIFICADO'),
                        $DREPALETIZAJEMP->__GET('ID_TMANEJO'),
                        $DREPALETIZAJEMP->__GET('ID_FOLIO'),
                        $DREPALETIZAJEMP->__GET('ID_ESTANDAR'),
                        $DREPALETIZAJEMP->__GET('ID_PRODUCTOR'),
                        $DREPALETIZAJEMP->__GET('ID_PVESPECIES'),
                        $DREPALETIZAJEMP->__GET('ID_REPALETIZAJE'),
                        $DREPALETIZAJEMP->__GET('ID_DREPALETIZAJE')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DREPALETIZAJEMP $DREPALETIZAJEMP){

        try{
            $query = "
                UPDATE `fruta_drepaletizajemp` SET			
                        `ESTADO_REGISTRO` = 0
                WHERE `ID_DREPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DREPALETIZAJEMP->__GET('ID_DREPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DREPALETIZAJEMP $DREPALETIZAJEMP){
        try{
            $query = "
                UPDATE `fruta_drepaletizajemp` SET			
                        `ESTADO_REGISTRO` = 1
                WHERE `ID_DREPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DREPALETIZAJEMP->__GET('ID_DREPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function deshabilitar2(DREPALETIZAJEMP $DREPALETIZAJEMP){

        try{
            $query = "
                UPDATE `fruta_drepaletizajemp` SET			
                        `ESTADO_REGISTRO` = 0
                WHERE `FOLIO_NUEVO_DREPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DREPALETIZAJEMP->__GET('FOLIO_NUEVO_DREPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar2(DREPALETIZAJEMP $DREPALETIZAJEMP){
        try{
            $query = "
                UPDATE `fruta_drepaletizajemp` SET			
                        `ESTADO_REGISTRO` = 1
                WHERE `FOLIO_NUEVO_DREPALETIZAJE`= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $DREPALETIZAJEMP->__GET('FOLIO_NUEVO_DREPALETIZAJE')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

           //CAMBIO ESTADO
        //ABIERTO 1
        public function abierto(DREPALETIZAJEMP $DREPALETIZAJEMP){
            try{
                $query = "
                    UPDATE `fruta_drepaletizajemp` SET			
                            `ESTADO` = 1
                    WHERE `ID_DREPALETIZAJE`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $DREPALETIZAJEMP->__GET('ID_DREPALETIZAJE')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }
        //CERRADO 0
        public function  cerrado(DREPALETIZAJEMP $DREPALETIZAJEMP){
            try{
                $query = "
                    UPDATE `fruta_drepaletizajemp` SET			
                            `ESTADO` = 0
                    WHERE `ID_DREPALETIZAJE`= ?;";
                $this->conexion->prepare($query)
                ->execute(
                        array(                 
                            $DREPALETIZAJEMP->__GET('ID_DREPALETIZAJE')                   
                        )                    
                    );                
            }catch(Exception $e){
                die($e->getMessage());
            }
            
        }


    //BUSCAR POR REPALETIZAJE
     //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
     public function buscarDrepaletizaje($IDREPALETIZAJE){
        try{
            
            $datos=$this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_INGRESO, '%Y-%m-%d ') AS 'INGRESO'  FROM `fruta_drepaletizajemp` WHERE `ID_REPALETIZAJE`= '".$IDREPALETIZAJE."' AND `ESTADO_REGISTRO` = 1;");
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
    public function buscarDrepaletizaje2($IDREPALETIZAJE){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,
                                              DATE_FORMAT(FECHA_INGRESO, '%d-%m-%Y ') AS 'INGRESO' 
                                            FROM `fruta_drepaletizajemp` 
                                            WHERE `ID_REPALETIZAJE`= '".$IDREPALETIZAJE."'
                                            AND `ESTADO_REGISTRO` = 1;");
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
     public function totalesDrepaletizaje($IDREPALETIZAJE){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                IFNULL(COUNT(`ID_DREPALETIZAJE`),0) AS 'TOTA_REGISTRO_REPALETIZAJE',
                                                IFNULL(SUM(`CANTIDAD_ENVASE_DREPALETIZAJE`),0) AS 'TOTAL_ENVASE', 
                                                IFNULL(SUM(`KILOS_NETO_DREPALETIZAJE`),0) AS 'TOTAL_NETO'
                                             FROM `fruta_drepaletizajemp`
                                             WHERE `ID_REPALETIZAJE`= '".$IDREPALETIZAJE."'
                                             AND `ESTADO_REGISTRO` = 1;");
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
    public function totalesDrepaletizaje2($IDREPALETIZAJE){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                IFNULL(COUNT(`ID_DREPALETIZAJE`),0) AS 'TOTA_REGISTRO_REPALETIZAJE',
                                                FORMAT(IFNULL(SUM(`CANTIDAD_ENVASE_DREPALETIZAJE`),0),0,'de_DE') AS 'TOTAL_ENVASE', 
                                                FORMAT(IFNULL(SUM(`KILOS_NETO_DREPALETIZAJE`),0),2,'de_DE') AS 'TOTAL_NETO'
                                             FROM `fruta_drepaletizajemp`
                                             WHERE `ID_REPALETIZAJE`= '".$IDREPALETIZAJE."'
                                             AND `ESTADO_REGISTRO` = 1;");
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
    public function totalesDrepaletizajePorExistencia($IDEXIMATERIAPRIMA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                IFNULL(COUNT(`ID_DREPALETIZAJE`),0) AS 'TOTA_REGISTRO_REPALETIZAJE',
                                                IFNULL(SUM(`CANTIDAD_ENVASE_DREPALETIZAJE`),0) AS 'TOTAL_ENVASE', 
                                                IFNULL(SUM(`KILOS_NETO_DREPALETIZAJE`),0) AS 'TOTAL_NETO'
                                             FROM `fruta_drepaletizajemp`
                                             WHERE `ID_EXIMATERIAPRIMA`= '".$IDEXIMATERIAPRIMA."'
                                              AND  `ESTADO_REGISTRO` = 1
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


   //OBTENER FOLIO DE EXISTENCIA REPALETIZADA
    public function buscarDrepaletizajeAgrupadoFolio($IDREPALETIZAJE){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM `fruta_drepaletizajemp` 
                                             WHERE `ID_REPALETIZAJE` = '".$IDREPALETIZAJE."' 
                                             AND  `ESTADO_REGISTRO` = 1 
                                             GROUP BY `FOLIO_NUEVO_DREPALETIZAJE` ;");
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