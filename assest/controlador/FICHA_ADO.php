<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/FICHA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class FICHA_ADO {
    
    
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
    public function listarFicha(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   material_ficha   limit 8;	");
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
    public function listarFichaCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   material_ficha   WHERE   ESTADO_REGISTRO   = 1;	");
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


    public function listarFicha2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   material_ficha   WHERE   ESTADO_REGISTRO   = 0;	");
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
    public function verFicha($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,            
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'  
                                            FROM   material_ficha   
                                            WHERE   ID_FICHA  = '".$ID."';");
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

    public function verFicha2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,            
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'  
                                            FROM   material_ficha   
                                            WHERE   ID_FICHA  = '".$ID."';");
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
    public function agregarFicha(FICHA $FICHA){
        try{
           

            
            $query=
            "INSERT INTO   material_ficha   (
                                              NUMERO_FICHA  ,
                                              OBSERVACIONES_FICHA  ,                                            
                                              ID_ESTANDAR  , 
                                              ID_EMPRESA  , 
                                              ID_TEMPORADA  ,  
                                              ID_USUARIOI  , 
                                              ID_USUARIOM  , 
                                              INGRESO  , 
                                              MODIFICACION  ,  
                                              ESTADO  ,
                                              ESTADO_REGISTRO  
                                           )  VALUES
	       	( ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(), 1, 1 );";
            $this->conexion->prepare($query)
            ->execute(
                array(                     
                    $FICHA->__GET('NUMERO_FICHA'),
                    $FICHA->__GET('OBSERVACIONES_FICHA') ,
                    $FICHA->__GET('ID_ESTANDAR') ,
                    $FICHA->__GET('ID_EMPRESA'),
                    $FICHA->__GET('ID_TEMPORADA')  ,
                    $FICHA->__GET('ID_USUARIOI'),
                    $FICHA->__GET('ID_USUARIOM')           
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarFicha($id){
        try{$sql="DELETE FROM   material_ficha   WHERE   ID_FICHA  =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarFicha(FICHA $FICHA){
        try{
            $query = "
                UPDATE   material_ficha   SET
                      MODIFICACION  = SYSDATE(),
                      OBSERVACIONES_FICHA  = ?,
                      ID_ESTANDAR  = ?,
                      ID_USUARIOM  = ?   
                WHERE   ID_FICHA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(
                    $FICHA->__GET('OBSERVACIONES_FICHA') ,
                    $FICHA->__GET('ID_ESTANDAR') ,
                    $FICHA->__GET('ID_USUARIOM'),
                    $FICHA->__GET('ID_FICHA')
                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(FICHA $FICHA){

        try{
            $query = "
    UPDATE   material_ficha   SET			
              ESTADO_REGISTRO   = 0
    WHERE   ID_FICHA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FICHA->__GET('ID_FICHA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(FICHA $FICHA){
        try{
            $query = "
    UPDATE   material_ficha   SET			
              ESTADO_REGISTRO   = 1
    WHERE   ID_FICHA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FICHA->__GET('ID_FICHA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function cerrado(FICHA $FICHA){

        try{
            $query = "
    UPDATE   material_ficha   SET			
              MODIFICACION  = SYSDATE(),		
              ESTADO   = 0
    WHERE   ID_FICHA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FICHA->__GET('ID_FICHA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ABIERTO
    public function abierto(FICHA $FICHA){
        try{
            $query = "
    UPDATE   material_ficha   SET				
              MODIFICACION  = SYSDATE(),	
              ESTADO   = 1
    WHERE   ID_FICHA  = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $FICHA->__GET('ID_FICHA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function buscarID($ESTANDAR, $OBSERVACIONESRECEPCION,  $EMPRESA,  $TEMPORADA)
    {
        try {


            $datos = $this->conexion->prepare(" SELECT *
                                            FROM   material_ficha  
                                            WHERE 
                                                 ID_ESTANDAR = '" . $ESTANDAR . "'
                                                 AND OBSERVACIONES_FICHA LIKE '" . $OBSERVACIONESRECEPCION . "'  
                                                 AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')  
                                                 AND ID_EMPRESA = " . $EMPRESA . " 
                                                 AND ID_TEMPORADA = " . $TEMPORADA . " 
                                            ORDER BY ID_FICHA DESC
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


    public function listarFichaPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,           
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'  
                                            FROM   material_ficha   
                                            WHERE   ESTADO_REGISTRO   = 1
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'     
                                            AND  ID_TEMPORADA = '" . $IDTEMPORADA . "' ;	");
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

    public function listarFichaCerradoPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,           
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'  
                                            FROM   material_ficha   
                                            WHERE   ESTADO_REGISTRO   = 1
                                            AND ESTADO = 0
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'     
                                            AND  ID_TEMPORADA = '" . $IDTEMPORADA . "' ;	");
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
    public function listarFichaPorEmpresaTemporada2CBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT *,           
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'  
                                            FROM   material_ficha   
                                            WHERE   ESTADO_REGISTRO   = 1
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'     
                                            AND  ID_TEMPORADA = '" . $IDTEMPORADA . "' ;	");
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
    public function listarConsumoFolioPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                    detalle.FOLIO_DPEXPORTACION as 'FOLIO',
                                                    detalle.FECHA_EMBALADO_DPEXPORTACION as 'FECHA',
                                                    detalle.ID_ESTANDAR,
                                                    (   SELECT  estandar.CODIGO_ESTANDAR
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'CODIGOESTANDAR',
                                                    (   SELECT  estandar.NOMBRE_ESTANDAR
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'NOMBREESTANDAR',
                                                    (   SELECT (  SELECT especies.NOMBRE_ESPECIES
                                                                FROM fruta_especies especies
                                                                WHERE estandar.ID_ESPECIES = especies.ID_ESPECIES
                                                            )
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'NOMBREESPECIES',
                                                    (   SELECT (  SELECT tetiqueta.NOMBRE_TETIQUETA
                                                                FROM fruta_tetiqueta tetiqueta
                                                                WHERE estandar.ID_TETIQUETA = tetiqueta.ID_TETIQUETA
                                                            )
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'NOMBRETETIQUETA',
                                                    (   SELECT (  SELECT tembalaje.NOMBRE_TEMBALAJE
                                                                FROM fruta_tembalaje tembalaje
                                                                WHERE estandar.ID_TEMBALAJE = tembalaje.ID_TEMBALAJE
                                                            )
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'NOMBRETEMBALAJE',                                                    
                                                    dficha.ID_PRODUCTO,
                                                    (
                                                        SELECT
                                                            CODIGO_PRODUCTO
                                                        FROM material_producto
                                                        WHERE ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'CODIGO',
                                                    (
                                                        SELECT
                                                            NOMBRE_PRODUCTO
                                                        FROM material_producto
                                                        WHERE ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'PRODUCTO',
                                                    (
                                                        SELECT
                                                            (   SELECT
                                                                    familia.NOMBRE_FAMILIA
                                                                FROM material_familia familia
                                                                WHERE familia.ID_FAMILIA=producto.ID_FAMILIA
                                                            )
                                                        FROM material_producto producto
                                                        WHERE producto.ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'FAMILIA',
                                                    (
                                                        SELECT
                                                            (
                                                                SELECT  subfamilia.NOMBRE_SUBFAMILIA
                                                                FROM material_subfamilia subfamilia
                                                                WHERE subfamilia.ID_SUBFAMILIA=producto.ID_SUBFAMILIA
                                                            )
                                                        FROM material_producto producto
                                                        WHERE producto.ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'SUBFAMILIA',
                                                    (
                                                        SELECT
                                                            (   SELECT  tumedida.NOMBRE_TUMEDIDA
                                                                FROM material_tumedida tumedida
                                                                WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                            )
                                                        FROM material_producto producto
                                                        WHERE producto.ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'TUMEDIDA',
                                                    SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION)  AS 'ENVASE',
                                                    dficha.FACTOR_CONSUMO_DFICHA as 'FACTOR',
                                                    dficha.FACTOR_CONSUMO_DFICHA * SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION) AS 'CONSUMO',
                                                
                                                    (   SELECT  empresa.NOMBRE_EMPRESA
                                                        FROM principal_empresa empresa
                                                        WHERE empresa.ID_EMPRESA=proceso.ID_EMPRESA
                                                    ) AS 'EMPRESA',
                                                    (   SELECT  planta.NOMBRE_PLANTA
                                                        FROM principal_planta planta
                                                        WHERE planta.ID_PLANTA=proceso.ID_PLANTA
                                                    ) AS 'PLANTA',
                                                    (   SELECT  temporada.NOMBRE_TEMPORADA
                                                        FROM principal_temporada temporada
                                                        WHERE temporada.ID_TEMPORADA=proceso.ID_TEMPORADA
                                                    ) AS 'TEMPORADA'
                                                from
                                                    fruta_proceso proceso,
                                                    fruta_dpexportacion detalle,
                                                    material_ficha ficha,
                                                    material_dficha dficha
                                                where
                                                    proceso.ID_PROCESO=detalle.ID_PROCESO
                                                    and detalle.ID_ESTANDAR = ficha.ID_ESTANDAR
                                                    and ficha.ID_FICHA = dficha.ID_FICHA
                                                    and proceso.ESTADO_REGISTRO = 1
                                                    and detalle.ESTADO_REGISTRO = 1
                                                    and ficha.ESTADO_REGISTRO = 1
                                                    and dficha.ESTADO_REGISTRO = 1
                                                    AND ficha.ID_EMPRESA = '" . $IDEMPRESA . "'     
                                                    AND ficha.ID_TEMPORADA = '" . $IDTEMPORADA . "'    
                                                group by
                                                        proceso.ID_PROCESO,
                                                        detalle.FOLIO_DPEXPORTACION,
                                                        detalle.ID_ESTANDAR,
                                                        dficha.ID_PRODUCTO;
                                                



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
    
    public function listarConsumoProcesoPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                proceso.ID_PROCESO,
                                                proceso.NUMERO_PROCESO as 'NUMERO',
                                                proceso.FECHA_PROCESO as 'FECHA',
                                                detalle.ID_ESTANDAR,
                                                (   SELECT  estandar.CODIGO_ESTANDAR
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'CODIGOESTANDAR',
                                                (   SELECT  estandar.NOMBRE_ESTANDAR
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBREESTANDAR',
                                                (   SELECT (  SELECT especies.NOMBRE_ESPECIES
                                                            FROM fruta_especies especies
                                                            WHERE estandar.ID_ESPECIES = especies.ID_ESPECIES
                                                        )
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBREESPECIES',
                                                (   SELECT (  SELECT tetiqueta.NOMBRE_TETIQUETA
                                                            FROM fruta_tetiqueta tetiqueta
                                                            WHERE estandar.ID_TETIQUETA = tetiqueta.ID_TETIQUETA
                                                        )
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBRETETIQUETA',
                                                (   SELECT (  SELECT tembalaje.NOMBRE_TEMBALAJE
                                                            FROM fruta_tembalaje tembalaje
                                                            WHERE estandar.ID_TEMBALAJE = tembalaje.ID_TEMBALAJE
                                                        )
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBRETEMBALAJE',
                                                dficha.ID_PRODUCTO,
                                                (
                                                    SELECT
                                                        CODIGO_PRODUCTO
                                                    FROM material_producto
                                                    WHERE ID_PRODUCTO = dficha.ID_PRODUCTO
                                                ) AS 'CODIGO',
                                                (
                                                    SELECT
                                                        NOMBRE_PRODUCTO
                                                    FROM material_producto
                                                    WHERE ID_PRODUCTO = dficha.ID_PRODUCTO
                                                ) AS 'PRODUCTO',
                                                (
                                                    SELECT
                                                        (   SELECT
                                                                familia.NOMBRE_FAMILIA
                                                            FROM material_familia familia
                                                            WHERE familia.ID_FAMILIA=producto.ID_FAMILIA
                                                        )
                                                    FROM material_producto producto
                                                    WHERE producto.ID_PRODUCTO = dficha.ID_PRODUCTO
                                                ) AS 'FAMILIA',
                                                (
                                                    SELECT
                                                        (
                                                            SELECT  subfamilia.NOMBRE_SUBFAMILIA
                                                            FROM material_subfamilia subfamilia
                                                            WHERE subfamilia.ID_SUBFAMILIA=producto.ID_SUBFAMILIA
                                                        )
                                                    FROM material_producto producto
                                                    WHERE producto.ID_PRODUCTO = dficha.ID_PRODUCTO
                                                ) AS 'SUBFAMILIA',
                                                (
                                                    SELECT
                                                        (   SELECT  tumedida.NOMBRE_TUMEDIDA
                                                            FROM material_tumedida tumedida
                                                            WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                        )
                                                    FROM material_producto producto
                                                    WHERE producto.ID_PRODUCTO = dficha.ID_PRODUCTO
                                                ) AS 'TUMEDIDA',
                                                SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION)  AS 'ENVASE',
                                                dficha.FACTOR_CONSUMO_DFICHA as 'FACTOR',
                                                dficha.FACTOR_CONSUMO_DFICHA * SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION) AS 'CONSUMO',
                                            
                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                    FROM principal_empresa empresa
                                                    WHERE empresa.ID_EMPRESA=proceso.ID_EMPRESA
                                                ) AS 'EMPRESA',
                                                (   SELECT  planta.NOMBRE_PLANTA
                                                    FROM principal_planta planta
                                                    WHERE planta.ID_PLANTA=proceso.ID_PLANTA
                                                ) AS 'PLANTA',
                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                    FROM principal_temporada temporada
                                                    WHERE temporada.ID_TEMPORADA=proceso.ID_TEMPORADA
                                                ) AS 'TEMPORADA'
                                            FROM
                                                fruta_proceso proceso,
                                                fruta_dpexportacion detalle,
                                                material_ficha ficha,
                                                material_dficha dficha
                                            WHERE
                                                proceso.ID_PROCESO=detalle.ID_PROCESO
                                                AND detalle.ID_ESTANDAR = ficha.ID_ESTANDAR
                                                AND ficha.ID_FICHA = dficha.ID_FICHA
                                                AND proceso.ESTADO_REGISTRO = 1
                                                AND detalle.ESTADO_REGISTRO = 1
                                                AND ficha.ESTADO_REGISTRO = 1
                                                AND dficha.ESTADO_REGISTRO = 1
                                                AND proceso.ID_EMPRESA = '" . $IDEMPRESA . "'     
                                                AND proceso.ID_TEMPORADA = '" . $IDTEMPORADA . "'
                                            GROUP BY
                                                    proceso.ID_PROCESO,
                                                    detalle.ID_ESTANDAR,
                                                    dficha.ID_PRODUCTO;
        



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
    public function listarConsumoTotalPorEmpresaTemporadaCBX($IDEMPRESA,  $IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                    detalle.ID_ESTANDAR,
                                                    (   SELECT  estandar.CODIGO_ESTANDAR
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'CODIGOESTANDAR',
                                                    (   SELECT  estandar.NOMBRE_ESTANDAR
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'NOMBREESTANDAR',
                                                    (   SELECT (  SELECT especies.NOMBRE_ESPECIES
                                                                FROM fruta_especies especies
                                                                WHERE estandar.ID_ESPECIES = especies.ID_ESPECIES
                                                            )
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'NOMBREESPECIES',
                                                    (   SELECT (  SELECT tetiqueta.NOMBRE_TETIQUETA
                                                                FROM fruta_tetiqueta tetiqueta
                                                                WHERE estandar.ID_TETIQUETA = tetiqueta.ID_TETIQUETA
                                                            )
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'NOMBRETETIQUETA',
                                                    (   SELECT (  SELECT tembalaje.NOMBRE_TEMBALAJE
                                                                FROM fruta_tembalaje tembalaje
                                                                WHERE estandar.ID_TEMBALAJE = tembalaje.ID_TEMBALAJE
                                                            )
                                                        FROM estandar_eexportacion estandar
                                                        WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'NOMBRETEMBALAJE',
                                                    dficha.ID_PRODUCTO,
                                                    (
                                                        SELECT
                                                            CODIGO_PRODUCTO
                                                        FROM material_producto
                                                        WHERE ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'CODIGO',
                                                    (
                                                        SELECT
                                                            NOMBRE_PRODUCTO
                                                        FROM material_producto
                                                        WHERE ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'PRODUCTO',
                                                    (
                                                        SELECT
                                                            (   SELECT
                                                                    familia.NOMBRE_FAMILIA
                                                                FROM material_familia familia
                                                                WHERE familia.ID_FAMILIA=producto.ID_FAMILIA
                                                            )
                                                        FROM material_producto producto
                                                        WHERE producto.ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'FAMILIA',
                                                    (
                                                        SELECT
                                                            (
                                                                SELECT  subfamilia.NOMBRE_SUBFAMILIA
                                                                FROM material_subfamilia subfamilia
                                                                WHERE subfamilia.ID_SUBFAMILIA=producto.ID_SUBFAMILIA
                                                            )
                                                        FROM material_producto producto
                                                        WHERE producto.ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'SUBFAMILIA',
                                                    (
                                                        SELECT
                                                            (   SELECT  tumedida.NOMBRE_TUMEDIDA
                                                                FROM material_tumedida tumedida
                                                                WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                            )
                                                        FROM material_producto producto
                                                        WHERE producto.ID_PRODUCTO = dficha.ID_PRODUCTO
                                                    ) AS 'TUMEDIDA',
                                                    SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION)  AS 'ENVASE',
                                                    dficha.FACTOR_CONSUMO_DFICHA as 'FACTOR',
                                                    dficha.FACTOR_CONSUMO_DFICHA * SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION) AS 'CONSUMO',
                                                
                                                    (   SELECT  empresa.NOMBRE_EMPRESA
                                                        FROM principal_empresa empresa
                                                        WHERE empresa.ID_EMPRESA=proceso.ID_EMPRESA
                                                    ) AS 'EMPRESA',
                                                    (   SELECT  temporada.NOMBRE_TEMPORADA
                                                        FROM principal_temporada temporada
                                                        WHERE temporada.ID_TEMPORADA=proceso.ID_TEMPORADA
                                                    ) AS 'TEMPORADA'
                                                FROM
                                                    fruta_proceso proceso,
                                                    fruta_dpexportacion detalle,
                                                    material_ficha ficha,
                                                    material_dficha dficha
                                                WHERE
                                                    proceso.ID_PROCESO=detalle.ID_PROCESO
                                                    AND detalle.ID_ESTANDAR = ficha.ID_ESTANDAR
                                                    AND ficha.ID_FICHA = dficha.ID_FICHA
                                                    AND proceso.ESTADO_REGISTRO = 1
                                                    AND detalle.ESTADO_REGISTRO = 1
                                                    AND ficha.ESTADO_REGISTRO = 1
                                                    AND dficha.ESTADO_REGISTRO = 1
                                                    AND ficha.ID_EMPRESA = '" . $IDEMPRESA . "'     
                                                    AND ficha.ID_TEMPORADA = '" . $IDTEMPORADA . "'    
                                                GROUP BY
                                                        detalle.ID_ESTANDAR,
                                                        dficha.ID_PRODUCTO;
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
    
    public function listarConsumoFichaPorEmpresaTemporadaCBX($IDEMPRESA,  $IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                ficha.ID_FICHA,
                                                DATE_FORMAT(ficha.INGRESO, '%Y-%m/%d') AS 'INGRESO',
                                                DATE_FORMAT(ficha.MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                ficha.NUMERO_FICHA,
                                                proceso.ID_PROCESO,
                                                proceso.NUMERO_PROCESO ,
                                                DATE_FORMAT(proceso.FECHA_PROCESO, '%Y-%m-%d') AS 'FECHAPROCESO',
                                                detalle.ID_ESTANDAR,
                                                (   SELECT  estandar.CODIGO_ESTANDAR
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'CODIGOESTANDAR',   
                                                (   SELECT  estandar.NOMBRE_ESTANDAR
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBREESTANDAR',  
                                                (   SELECT (  SELECT especies.NOMBRE_ESPECIES
                                                            FROM fruta_especies especies
                                                            WHERE estandar.ID_ESPECIES = especies.ID_ESPECIES
                                                            )
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBREESPECIES',  
                                                (   SELECT (  SELECT tetiqueta.NOMBRE_TETIQUETA
                                                            FROM fruta_tetiqueta tetiqueta
                                                            WHERE estandar.ID_TETIQUETA = tetiqueta.ID_TETIQUETA
                                                            )
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBRETETIQUETA',  
                                                (   SELECT (  SELECT tembalaje.NOMBRE_TEMBALAJE
                                                            FROM fruta_tembalaje tembalaje
                                                            WHERE estandar.ID_TEMBALAJE = tembalaje.ID_TEMBALAJE
                                                            )
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBRETEMBALAJE', 
                                                dficha.ID_DFICHA,
                                                dficha.ID_PRODUCTO,  
                                                producto.CODIGO_PRODUCTO AS 'CODIGO',   
                                                producto.NOMBRE_PRODUCTO AS 'PRODUCTO', 
                                                (   SELECT  familia.NOMBRE_FAMILIA
                                                    FROM material_familia familia
                                                    WHERE familia.ID_FAMILIA=producto.ID_FAMILIA
                                                ) AS 'FAMILIA',
                                                (   SELECT  subfamilia.NOMBRE_SUBFAMILIA
                                                    FROM material_subfamilia subfamilia
                                                    WHERE subfamilia.ID_SUBFAMILIA=producto.ID_SUBFAMILIA
                                                ) AS 'SUBFAMILIA',
                                                (   SELECT  tumedida.NOMBRE_TUMEDIDA
                                                    FROM material_tumedida tumedida
                                                    WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                ) AS 'TUMEDIDA',    
                                                IFNULL(SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION),0) AS 'ENVASE',
                                                dficha.FACTOR_CONSUMO_DFICHA  AS 'FACTORCONSUMO',	IFNULL(SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION),0)*dficha.FACTOR_CONSUMO_DFICHA  AS 'CONSUMO',      
                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                    FROM principal_empresa empresa
                                                    WHERE empresa.ID_EMPRESA=proceso.ID_EMPRESA
                                                ) AS 'EMPRESA',      
                                                (   SELECT  planta.NOMBRE_PLANTA
                                                    FROM principal_planta planta
                                                    WHERE planta.ID_PLANTA=proceso.ID_PLANTA
                                                ) AS 'PLANTA',
                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                    FROM principal_temporada temporada
                                                    WHERE temporada.ID_TEMPORADA=proceso.ID_TEMPORADA
                                                ) AS 'TEMPORADA'
                                            FROM fruta_proceso proceso, fruta_dpexportacion detalle, material_ficha ficha,  material_dficha dficha, material_producto producto
                                            WHERE proceso.ID_PROCESO=detalle.ID_PROCESO 
                                            AND detalle.ID_ESTANDAR=ficha.ID_ESTANDAR
                                            AND ficha.ID_FICHA = dficha.ID_FICHA
                                            AND dficha.ID_PRODUCTO= producto.ID_PRODUCTO
                                            AND detalle.ESTADO_REGISTRO = 1
                                            AND proceso.ID_EMPRESA = '" . $IDEMPRESA . "'     
                                            AND proceso.ID_TEMPORADA = '" . $IDTEMPORADA . "'
                                            GROUP BY  
                                                detalle.ID_ESTANDAR,  
                                                dficha.ID_PRODUCTO, 
                                                ficha.ID_FICHA, 
                                                proceso.ID_PROCESO, 
                                                proceso.ID_EMPRESA,  
                                                proceso.ID_PLANTA,
                                                proceso.ID_TEMPORADA   
                                            
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
    public function listarConsumoFichaPorEmpresaPlantaTemporadaCBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                ficha.ID_FICHA,
                                                DATE_FORMAT(ficha.INGRESO, '%d/%m/%Y') AS 'INGRESO',
                                                DATE_FORMAT(ficha.MODIFICACION, '%d/%m/%Y') AS 'MODIFICACION',
                                                ficha.NUMERO_FICHA,
                                                proceso.ID_PROCESO,
                                                proceso.NUMERO_PROCESO ,
                                                DATE_FORMAT(proceso.FECHA_PROCESO, '%d/%m/%Y') AS 'FECHAPROCESO',
                                                detalle.ID_ESTANDAR,
                                                (   SELECT  estandar.CODIGO_ESTANDAR
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'CODIGOESTANDAR',   
                                                (   SELECT  estandar.NOMBRE_ESTANDAR
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBREESTANDAR',  
                                                (   SELECT (  SELECT especies.NOMBRE_ESPECIES
                                                            FROM fruta_especies especies
                                                            WHERE estandar.ID_ESPECIES = especies.ID_ESPECIES
                                                            )
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBREESPECIES',  
                                                (   SELECT (  SELECT tetiqueta.NOMBRE_TETIQUETA
                                                            FROM fruta_tetiqueta tetiqueta
                                                            WHERE estandar.ID_TETIQUETA = tetiqueta.ID_TETIQUETA
                                                            )
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBRETETIQUETA',  
                                                (   SELECT (  SELECT tembalaje.NOMBRE_TEMBALAJE
                                                            FROM fruta_tembalaje tembalaje
                                                            WHERE estandar.ID_TEMBALAJE = tembalaje.ID_TEMBALAJE
                                                            )
                                                    FROM estandar_eexportacion estandar
                                                    WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                ) AS 'NOMBRETEMBALAJE', 
                                                dficha.ID_DFICHA,
                                                dficha.ID_PRODUCTO,  
                                                producto.CODIGO_PRODUCTO AS 'CODIGO',   
                                                producto.NOMBRE_PRODUCTO AS 'PRODUCTO', 
                                                (   SELECT  familia.NOMBRE_FAMILIA
                                                    FROM material_familia familia
                                                    WHERE familia.ID_FAMILIA=producto.ID_FAMILIA
                                                ) AS 'FAMILIA',
                                                (   SELECT  subfamilia.NOMBRE_SUBFAMILIA
                                                    FROM material_subfamilia subfamilia
                                                    WHERE subfamilia.ID_SUBFAMILIA=producto.ID_SUBFAMILIA
                                                ) AS 'SUBFAMILIA',
                                                (   SELECT  tumedida.NOMBRE_TUMEDIDA
                                                    FROM material_tumedida tumedida
                                                    WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                ) AS 'TUMEDIDA',    
                                                IFNULL(SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION),0) AS 'ENVASE',
                                                dficha.FACTOR_CONSUMO_DFICHA  AS 'FACTORCONSUMO',	IFNULL(SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION),0)*dficha.FACTOR_CONSUMO_DFICHA  AS 'CONSUMO',      
                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                    FROM principal_empresa empresa
                                                    WHERE empresa.ID_EMPRESA=proceso.ID_EMPRESA
                                                ) AS 'EMPRESA',      
                                                (   SELECT  planta.NOMBRE_PLANTA
                                                    FROM principal_planta planta
                                                    WHERE planta.ID_PLANTA=proceso.ID_PLANTA
                                                ) AS 'PLANTA',
                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                    FROM principal_temporada temporada
                                                    WHERE temporada.ID_TEMPORADA=proceso.ID_TEMPORADA
                                                ) AS 'TEMPORADA'
                                            FROM fruta_proceso proceso, fruta_dpexportacion detalle, material_ficha ficha,  material_dficha dficha, material_producto producto
                                            WHERE proceso.ID_PROCESO=detalle.ID_PROCESO 
                                            AND detalle.ID_ESTANDAR=ficha.ID_ESTANDAR
                                            AND ficha.ID_FICHA = dficha.ID_FICHA
                                            AND dficha.ID_PRODUCTO= producto.ID_PRODUCTO
                                            AND detalle.ESTADO_REGISTRO = 1
                                            AND proceso.ID_EMPRESA = '" . $IDEMPRESA . "'   
                                            AND proceso.ID_PLANTA = '" . $IDPLANTA . "'      
                                            AND proceso.ID_TEMPORADA = '" . $IDTEMPORADA . "'
                                            GROUP BY  
                                                detalle.ID_ESTANDAR,  
                                                dficha.ID_PRODUCTO, 
                                                dficha.ID_DFICHA,
                                                proceso.ID_PROCESO, 
                                                proceso.ID_EMPRESA,  
                                                proceso.ID_PLANTA,
                                                proceso.ID_TEMPORADA   
                                            
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
    public function listarKardexConsumoFichaPorEmpresaPlantaTemporadaCBX($IDEMPRESA, $IDPLANTA, $IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                
                                                proceso.ID_PROCESO,
                                                proceso.NUMERO_PROCESO ,
                                                DATE_FORMAT(proceso.FECHA_PROCESO, '%Y-%m/%d') AS 'FECHAPROCESO',
                                                dficha.ID_DFICHA,
                                                dficha.ID_PRODUCTO,  
                                                producto.CODIGO_PRODUCTO AS 'CODIGO',   
                                                producto.NOMBRE_PRODUCTO AS 'PRODUCTO', 
                                                (   SELECT  tumedida.NOMBRE_TUMEDIDA
                                                    FROM material_tumedida tumedida
                                                    WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                ) AS 'TUMEDIDA',    
                                                IFNULL(SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION),0)*dficha.FACTOR_CONSUMO_DFICHA  AS 'CONSUMO',      
                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                    FROM principal_empresa empresa
                                                    WHERE empresa.ID_EMPRESA=proceso.ID_EMPRESA
                                                ) AS 'EMPRESA',      
                                                (   SELECT  planta.NOMBRE_PLANTA
                                                    FROM principal_planta planta
                                                    WHERE planta.ID_PLANTA=proceso.ID_PLANTA
                                                ) AS 'PLANTA',
                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                    FROM principal_temporada temporada
                                                    WHERE temporada.ID_TEMPORADA=proceso.ID_TEMPORADA
                                                ) AS 'TEMPORADA'
                                            FROM fruta_proceso proceso, fruta_dpexportacion detalle, material_ficha ficha,  material_dficha dficha, material_producto producto
                                            WHERE proceso.ID_PROCESO=detalle.ID_PROCESO 
                                            AND detalle.ID_ESTANDAR=ficha.ID_ESTANDAR
                                            AND ficha.ID_FICHA = dficha.ID_FICHA
                                            AND dficha.ID_PRODUCTO= producto.ID_PRODUCTO
                                            AND detalle.ESTADO_REGISTRO = 1
                                            AND proceso.ID_EMPRESA = '" . $IDEMPRESA . "'   
                                            AND proceso.ID_PLANTA = '" . $IDPLANTA . "'      
                                            AND proceso.ID_TEMPORADA = '" . $IDTEMPORADA . "'
                                            GROUP BY  
                                                detalle.ID_ESTANDAR,  
                                                dficha.ID_PRODUCTO, 
                                                dficha.ID_DFICHA, 
                                                proceso.ID_PROCESO, 
                                                proceso.ID_EMPRESA,  
                                                proceso.ID_PLANTA,
                                                proceso.ID_TEMPORADA
                                                   
                                            
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

    public function listarKardexConsumoFichaDespachoPt($IDEMPRESA, $IDPLANTA, $IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
fruta_despachopt.ID_DESPACHO,
fruta_despachopt.NUMERO_DESPACHO,
fruta_despachopt.NUMERO_GUIA_DESPACHO,
DATE_FORMAT(fruta_despachopt.FECHA_DESPACHO, '%Y-%m/%d') AS 'FECHADESPACHO',   
folio.ID_ESTANDAR,
material_dficha.ID_DFICHA,
material_dficha.ID_PRODUCTO, 
material_producto.CODIGO_PRODUCTO AS 'CODIGO',   
material_producto.NOMBRE_PRODUCTO AS 'PRODUCTO', 
material_tumedida.NOMBRE_TUMEDIDA,
IFNULL(folio.CANTIDAD_ENVASE_EXIEXPORTACION,0)*material_dficha.FACTOR_CONSUMO_DFICHA  AS 'CONSUMO',
principal_empresa.NOMBRE_EMPRESA,
(SELECT NOMBRE_PLANTA FROM principal_planta WHERE principal_planta.ID_PLANTA = fruta_despachopt.ID_PLANTA)AS 'PLANTAORIGEN',
(SELECT NOMBRE_PLANTA FROM principal_planta WHERE principal_planta.ID_PLANTA = fruta_despachopt.ID_PLANTA3)AS 'PLANTADESTINO',
principal_temporada.NOMBRE_TEMPORADA 
FROM fruta_exiexportacion folio
LEFT JOIN fruta_despachopt ON fruta_despachopt.ID_DESPACHO = folio.ID_DESPACHO
LEFT JOIN principal_empresa ON principal_empresa.ID_EMPRESA = fruta_despachopt.ID_EMPRESA
LEFT JOIN principal_temporada ON principal_temporada.ID_TEMPORADA = fruta_despachopt.ID_TEMPORADA 
LEFT JOIN material_ficha ON material_ficha.ID_ESTANDAR = folio.ID_ESTANDAR
LEFT JOIN material_dficha ON material_dficha.ID_FICHA = material_ficha.ID_FICHA
LEFT JOIN material_producto ON material_producto.ID_PRODUCTO = material_dficha.ID_PRODUCTO
LEFT JOIN material_tumedida ON material_tumedida.ID_TUMEDIDA = material_producto.ID_TUMEDIDA
WHERE folio.ESTADO = '8' 
AND fruta_despachopt.ESTADO_REGISTRO = 1
AND fruta_despachopt.ID_EMPRESA = '" . $IDEMPRESA . "'   
AND fruta_despachopt.ID_PLANTA = '" . $IDPLANTA . "'      
AND fruta_despachopt.ID_TEMPORADA = '" . $IDTEMPORADA . "'
AND fruta_despachopt.ID_DESPACHO = '3'");
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
    public function listarKardexConsumoFichaPorEmpresaTemporadaCBX($IDEMPRESA,  $IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                
                                                proceso.ID_PROCESO,
                                                proceso.NUMERO_PROCESO ,
                                                DATE_FORMAT(proceso.FECHA_PROCESO, '%d/%m/%Y') AS 'FECHAPROCESO',
                                                dficha.ID_DFICHA,
                                                dficha.ID_PRODUCTO,  
                                                producto.CODIGO_PRODUCTO AS 'CODIGO',   
                                                producto.NOMBRE_PRODUCTO AS 'PRODUCTO', 
                                                (   SELECT  tumedida.NOMBRE_TUMEDIDA
                                                    FROM material_tumedida tumedida
                                                    WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                ) AS 'TUMEDIDA',    
                                                IFNULL(SUM(detalle.CANTIDAD_ENVASE_DPEXPORTACION),0)*dficha.FACTOR_CONSUMO_DFICHA  AS 'CONSUMO',      
                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                    FROM principal_empresa empresa
                                                    WHERE empresa.ID_EMPRESA=proceso.ID_EMPRESA
                                                ) AS 'EMPRESA',      
                                                (   SELECT  planta.NOMBRE_PLANTA
                                                    FROM principal_planta planta
                                                    WHERE planta.ID_PLANTA=proceso.ID_PLANTA
                                                ) AS 'PLANTA',
                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                    FROM principal_temporada temporada
                                                    WHERE temporada.ID_TEMPORADA=proceso.ID_TEMPORADA
                                                ) AS 'TEMPORADA'
                                            FROM fruta_proceso proceso, fruta_dpexportacion detalle, material_ficha ficha,  material_dficha dficha, material_producto producto
                                            WHERE proceso.ID_PROCESO=detalle.ID_PROCESO 
                                            AND detalle.ID_ESTANDAR=ficha.ID_ESTANDAR
                                            AND ficha.ID_FICHA = dficha.ID_FICHA
                                            AND dficha.ID_PRODUCTO= producto.ID_PRODUCTO
                                            AND detalle.ESTADO_REGISTRO = 1
                                            AND proceso.ID_EMPRESA = '" . $IDEMPRESA . "'      
                                            AND proceso.ID_TEMPORADA = '" . $IDTEMPORADA . "'
                                            GROUP BY  
                                                detalle.ID_ESTANDAR,  
                                                dficha.ID_PRODUCTO, 
                                                ficha.ID_FICHA, 
                                                proceso.ID_PROCESO, 
                                                proceso.ID_EMPRESA,  
                                                proceso.ID_PLANTA,
                                                proceso.ID_TEMPORADA   
                                            
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
    public function obtenerNumero($IDEMPRESA, $IDTEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                    IFNULL(COUNT(NUMERO_FICHA),0) AS 'NUMERO'
                                                FROM   material_ficha  
                                                WHERE ID_EMPRESA = '" . $IDEMPRESA . "'     
                                                AND  ID_TEMPORADA = '" . $IDTEMPORADA . "'  
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