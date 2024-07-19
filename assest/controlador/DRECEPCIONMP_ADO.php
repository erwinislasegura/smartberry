<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DRECEPCIONMP.php';
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DRECEPCIONMP_ADO
{


    //ATRIBUTO
    private $conexion;

    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS
    public function __CONSTRUCT()
    {
        try {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');


            $this->conexion = new PDO('mysql:host=' . $HOST . ';dbname=' . $DBNAME, $USER, $PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //FUNCIONES BASICAS 
    //LISTAR TODO CON LIMITE DE 6 FILAS   
    public function listarDrecepcion()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionmp limit 6;	");
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
    //LISTAR TODO
    public function listarDrecepcionCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionmp ;	");
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
    //LISTAR DETTALLE DE RECEPCION POR ID DE RECEPCION
    public function listarDrecepcionPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionmp WHERE ID_RECEPCION= '" . $IDRECEPCION . "' AND ESTADO_REGISTRO = 1;	");
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
    //VER DATOS DE DETALLE DE RECEPCION
    public function verDrecepcion($IDDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                    DATE_FORMAT(FECHA_COSECHA_DRECEPCION, '%d-%m-%Y') AS 'COSECHA',
                                                    IFNULL(CANTIDAD_ENVASE_DRECEPCION,0) AS 'ENVASE', 
                                                    IFNULL(KILOS_NETO_DRECEPCION,0) AS 'NETO', 
                                                    IFNULL(KILOS_PROMEDIO_DRECEPCION,0) AS 'PROMEDIO' , 
                                                    IFNULL(KILOS_BRUTO_DRECEPCION,0) AS 'BRUTO' 
                                                FROM fruta_drecepcionmp WHERE ID_DRECEPCION = " . $IDDRECEPCION . "  ;");
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

    public function verDrecepcion2($IDDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                    DATE_FORMAT(FECHA_COSECHA_DRECEPCION, '%d-%m-%Y') AS 'COSECHA',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_DRECEPCION,0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO', 
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_DRECEPCION,0),3,'de_DE') AS 'PROMEDIO' , 
                                                    FORMAT(IFNULL(KILOS_BRUTO_DRECEPCION,0),2,'de_DE')  AS 'BRUTO'  
                                                FROM fruta_drecepcionmp WHERE ID_DRECEPCION = " . $IDDRECEPCION . "  ;");
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





    //REGISTRO DE UNA NUEVA FILA      
    public function agregarDrecepcion(DRECEPCIONMP $DRECEPCIONMP)
    {
        try {
            if ($DRECEPCIONMP->__GET('ID_TTRATAMIENTO1') == NULL) {
                $DRECEPCIONMP->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($DRECEPCIONMP->__GET('ID_TTRATAMIENTO2') == NULL) {
                $DRECEPCIONMP->__SET('ID_TTRATAMIENTO2', NULL);
            }
            $query =
                "INSERT INTO fruta_drecepcionmp 
                                            (
                                                FOLIO_DRECEPCION, 
                                                FOLIO_MANUAL, 
                                                FECHA_COSECHA_DRECEPCION, 
                                                CANTIDAD_ENVASE_DRECEPCION, 
                                                KILOS_NETO_DRECEPCION, 

                                                KILOS_BRUTO_DRECEPCION, 
                                                KILOS_PROMEDIO_DRECEPCION, 
                                                PESO_PALLET_DRECEPCION, 
                                                NOTA_DRECEPCION, 
                                                GASIFICADO_DRECEPCION,

                                                ID_PRODUCTOR, 
                                                ID_VESPECIES, 
                                                ID_ESTANDAR, 
                                                ID_FOLIO, 
                                                ID_TMANEJO,   

                                                ID_TTRATAMIENTO1,
                                                ID_TTRATAMIENTO2,

                                                ID_RECEPCION,     

                                                INGRESO,
                                                MODIFICACION,
                                                ESTADO,
                                                ESTADO_REGISTRO
                                            ) 
             VALUES
               (?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?, ?,  ?, SYSDATE(), SYSDATE(), 1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONMP->__GET('FOLIO_DRECEPCION'),
                        $DRECEPCIONMP->__GET('FOLIO_MANUAL'),
                        $DRECEPCIONMP->__GET('FECHA_COSECHA_DRECEPCION'),
                        $DRECEPCIONMP->__GET('CANTIDAD_ENVASE_DRECEPCION'),
                        $DRECEPCIONMP->__GET('KILOS_NETO_DRECEPCION'),

                        $DRECEPCIONMP->__GET('KILOS_BRUTO_DRECEPCION'),
                        $DRECEPCIONMP->__GET('KILOS_PROMEDIO_DRECEPCION'),
                        $DRECEPCIONMP->__GET('PESO_PALLET_DRECEPCION'),
                        $DRECEPCIONMP->__GET('NOTA_DRECEPCION'),
                        $DRECEPCIONMP->__GET('GASIFICADO_DRECEPCION'),

                        $DRECEPCIONMP->__GET('ID_PRODUCTOR'),
                        $DRECEPCIONMP->__GET('ID_VESPECIES'),
                        $DRECEPCIONMP->__GET('ID_ESTANDAR'),
                        $DRECEPCIONMP->__GET('ID_FOLIO'),
                        $DRECEPCIONMP->__GET('ID_TMANEJO'),

                        $DRECEPCIONMP->__GET('ID_TTRATAMIENTO1'),
                        $DRECEPCIONMP->__GET('ID_TTRATAMIENTO2'),

                        $DRECEPCIONMP->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDrecepcion($id)
    {
        try {
            $sql = "DELETE FROM fruta_drecepcionmp WHERE ID_DRECEPCION=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR FILA
    public function actualizarDrecepcion(DRECEPCIONMP $DRECEPCIONMP)
    {
        try {
            if ($DRECEPCIONMP->__GET('ID_TTRATAMIENTO1') == NULL) {
                $DRECEPCIONMP->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($DRECEPCIONMP->__GET('ID_TTRATAMIENTO2') == NULL) {
                $DRECEPCIONMP->__SET('ID_TTRATAMIENTO2', NULL);
            }
            $query = "
                        UPDATE fruta_drecepcionmp SET     
                        
                                MODIFICACION = SYSDATE(), 
                                FECHA_COSECHA_DRECEPCION  = ?,
                                CANTIDAD_ENVASE_DRECEPCION  = ? ,
                                KILOS_NETO_DRECEPCION  = ?  ,
                                KILOS_BRUTO_DRECEPCION  = ?,
                                KILOS_PROMEDIO_DRECEPCION  = ?, 
                                PESO_PALLET_DRECEPCION  = ?,   
                                GASIFICADO_DRECEPCION = ?,
                                NOTA_DRECEPCION  = ?, 
                                ID_PRODUCTOR = ?, 
                                ID_VESPECIES = ?,   
                                ID_ESTANDAR = ?,   
                                ID_TMANEJO = ? ,
                                ID_TTRATAMIENTO1 = ? ,
                                ID_TTRATAMIENTO2 = ? ,
                                ID_RECEPCION = ?
                        WHERE  ID_DRECEPCION= ?";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONMP->__GET('FECHA_COSECHA_DRECEPCION'),
                        $DRECEPCIONMP->__GET('CANTIDAD_ENVASE_DRECEPCION'),
                        $DRECEPCIONMP->__GET('KILOS_NETO_DRECEPCION'),
                        $DRECEPCIONMP->__GET('KILOS_BRUTO_DRECEPCION'),
                        $DRECEPCIONMP->__GET('KILOS_PROMEDIO_DRECEPCION'),
                        $DRECEPCIONMP->__GET('PESO_PALLET_DRECEPCION'),
                        $DRECEPCIONMP->__GET('GASIFICADO_DRECEPCION'),
                        $DRECEPCIONMP->__GET('NOTA_DRECEPCION'),
                        $DRECEPCIONMP->__GET('ID_PRODUCTOR'),
                        $DRECEPCIONMP->__GET('ID_VESPECIES'),
                        $DRECEPCIONMP->__GET('ID_ESTANDAR'),
                        $DRECEPCIONMP->__GET('ID_TMANEJO'),
                        $DRECEPCIONMP->__GET('ID_TTRATAMIENTO1'),
                        $DRECEPCIONMP->__GET('ID_TTRATAMIENTO2'),
                        $DRECEPCIONMP->__GET('ID_RECEPCION'),
                        $DRECEPCIONMP->__GET('ID_DRECEPCION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS




    //BUSCAR
    public function buscarPorRecepcionPorProductoAgrupadoEstandarproducto($IDRECEPCION, $IDPRODUCTO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                        estandar.ID_PRODUCTO,
                                                        producto.ID_TUMEDIDA, 
                                                        IFNULL(SUM(detalle.CANTIDAD_ENVASE_DRECEPCION),0) AS 'ENVASE' 
                                                FROM fruta_drecepcionmp detalle, estandar_erecepcion estandar, material_producto producto 
                                                WHERE detalle.ID_ESTANDAR= estandar.ID_ESTANDAR 
                                                    AND estandar.ID_PRODUCTO=producto.ID_PRODUCTO 
                                                    AND detalle.ESTADO_REGISTRO = 1 
                                                    AND detalle.ID_RECEPCION = '" . $IDRECEPCION . "' 
                                                    AND estandar.ID_PRODUCTO = '" . $IDPRODUCTO . "' 
                                                GROUP BY estandar.ID_PRODUCTO     
                                             
                                             ;");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            echo "<br>";
            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorRecepcionAgrupadoEstandarproducto($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                        estandar.ID_PRODUCTO,
                                                        producto.ID_TUMEDIDA, 
                                                        IFNULL(SUM(detalle.CANTIDAD_ENVASE_DRECEPCION),0) AS 'ENVASE' 
                                                FROM fruta_drecepcionmp detalle, estandar_erecepcion estandar, material_producto producto 
                                                WHERE detalle.ID_ESTANDAR= estandar.ID_ESTANDAR 
                                                    AND estandar.ID_PRODUCTO=producto.ID_PRODUCTO 
                                                    AND detalle.ESTADO_REGISTRO = 1 
                                                    AND   ID_RECEPCION = '" . $IDRECEPCION . "' 
                                                GROUP BY estandar.ID_PRODUCTO     
                                             
                                             ;");
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
    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , FECHA_COSECHA_DRECEPCION AS 'COSECHA',
                                                        IFNULL(CANTIDAD_ENVASE_DRECEPCION,0) AS 'ENVASE', 
                                                        IFNULL(KILOS_NETO_DRECEPCION,0) AS 'NETO', 
                                                        IFNULL(KILOS_PROMEDIO_DRECEPCION,0) AS 'PROMEDIO' , 
                                                        IFNULL(KILOS_BRUTO_DRECEPCION,0)  AS 'BRUTO'  
                                             FROM fruta_drecepcionmp
                                             WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                             AND ESTADO_REGISTRO = 1 ;");
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
    public function buscarPorRecepcion2($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , DATE_FORMAT(FECHA_COSECHA_DRECEPCION, '%d-%m-%Y') AS 'COSECHA',
                                                        FORMAT(IFNULL(CANTIDAD_ENVASE_DRECEPCION,0),0,'de_DE') AS 'ENVASE', 
                                                        FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO', 
                                                        FORMAT(IFNULL(KILOS_PROMEDIO_DRECEPCION,0),3,'de_DE') AS 'PROMEDIO' , 
                                                        FORMAT(IFNULL(KILOS_BRUTO_DRECEPCION,0),2,'de_DE')  AS 'BRUTO'  
                                             FROM fruta_drecepcionmp
                                             WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                             AND ESTADO_REGISTRO = 1 ;");
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
    public function buscarPorRecepcionaAgrupadoVariedad2($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , DATE_FORMAT(FECHA_COSECHA_DRECEPCION, '%d-%m-%Y') AS 'COSECHA',
                                                        FORMAT(IFNULL(CANTIDAD_ENVASE_DRECEPCION,0),0,'de_DE') AS 'ENVASE', 
                                                        FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO', 
                                                        FORMAT(IFNULL(KILOS_PROMEDIO_DRECEPCION,0),3,'de_DE') AS 'PROMEDIO' , 
                                                        FORMAT(IFNULL(KILOS_BRUTO_DRECEPCION,0),2,'de_DE')  AS 'BRUTO'  
                                             FROM fruta_drecepcionmp
                                             WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                             AND ESTADO_REGISTRO = 1                                              
                                             GROUP  BY ID_VESPECIES; ;");
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
    public function buscarPorIdRecepcionPorVespecies2($IDRECEPCION, $IDVESPECIES){
        try{
            
            $datos=$this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_COSECHA_DRECEPCION, '%d-%m-%Y') AS 'COSECHA',
                                                FORMAT(CANTIDAD_ENVASE_DRECEPCION,0,'de_DE') AS 'ENVASE',
                                                FORMAT(KILOS_BRUTO_DRECEPCION, 2,'de_DE') AS 'BRUTO',
                                                FORMAT(KILOS_NETO_DRECEPCION, 2,'de_DE') AS 'NETO'
                                            FROM fruta_drecepcionmp
                                            WHERE  ID_RECEPCION = '".$IDRECEPCION."'
                                                AND ID_VESPECIES = '".$IDVESPECIES."'
                                                AND ESTADO_REGISTRO = '1'");
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


    
    public function obtenerTotalPorRecepcionVariedad2($IDRECEPCION, $IDVESPECIES){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DRECEPCION),0),0,'de_DE') AS 'ENVASE', 
                                                FORMAT(IFNULL(SUM(KILOS_NETO_DRECEPCION),0),2,'de_DE') AS 'NETO', 
                                                FORMAT(IFNULL(SUM(KILOS_PROMEDIO_DRECEPCION),0),3,'de_DE') AS 'PROMEDIO' , 
                                                FORMAT(IFNULL(SUM(KILOS_BRUTO_DRECEPCION),0),2,'de_DE')  AS 'BRUTO'  
                                            FROM fruta_drecepcionmp
                                            WHERE ID_RECEPCION = '".$IDRECEPCION."'
                                                  AND ID_VESPECIES = '".$IDVESPECIES."'
                                                  AND ESTADO_REGISTRO = '1'
                                            GROUP BY ID_VESPECIES;
                                            ");
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


    public function buscarPorRecepcionFolio($IDRECEPCION, $FOLIODRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_drecepcionmp WHERE ID_RECEPCION = '" . $IDRECEPCION . "' AND FOLIO_DRECEPCION='" . $FOLIODRECEPCION . "' ");
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

    public function buscarPorRecepcionFolio2($FOLIODRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * , DATE_FORMAT(FECHA_COSECHA_DRECEPCION, '%d-%m-%Y') AS 'COSECHA',
                                                        FORMAT(IFNULL(CANTIDAD_ENVASE_DRECEPCION,0),0,'de_DE') AS 'ENVASE', 
                                                        FORMAT(IFNULL(KILOS_NETO_DRECEPCION,0),2,'de_DE') AS 'NETO', 
                                                        FORMAT(IFNULL(KILOS_PROMEDIO_DRECEPCION,0),2,'de_DE') AS 'PROMEDIO' , 
                                                        FORMAT(IFNULL(KILOS_BRUTO_DRECEPCION,0),2,'de_DE')  AS 'BRUTO'  
                                             FROM fruta_drecepcionmp
                                             WHERE FOLIO_DRECEPCION = '" . $FOLIODRECEPCION . "' 
                                             AND ESTADO_REGISTRO = 1 ;");
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

    //TOTALES
    //OBTENER LOS TOTALES DEL CONSOLIDAD DEL DETALLE DE RECEPCION ASOCIADO A UNA RECEPCION
    public function obtenerTotales($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_DRECEPCION),0) AS 'ENVASE', 
                                                  IFNULL(SUM(KILOS_NETO_DRECEPCION),0) AS 'NETO', 
                                                  IFNULL(SUM(KILOS_PROMEDIO_DRECEPCION),0) AS 'PROMEDIO' , 
                                                  IFNULL(SUM(KILOS_BRUTO_DRECEPCION),0)  AS 'BRUTO'  
                                           FROM fruta_drecepcionmp 
                                           WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                           AND ESTADO_REGISTRO = 1;");
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
    public function obtenerTotales2($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DRECEPCION),0),0,'de_DE') AS 'ENVASE', 
                                                  FORMAT(IFNULL(SUM(KILOS_NETO_DRECEPCION),0),2,'de_DE') AS 'NETO', 
                                                  FORMAT(IFNULL(SUM(KILOS_PROMEDIO_DRECEPCION),0),2,'de_DE') AS 'PROMEDIO' , 
                                                  FORMAT(IFNULL(SUM(KILOS_BRUTO_DRECEPCION),0),2,'de_DE')  AS 'BRUTO'  
                                           FROM fruta_drecepcionmp
                                            WHERE ID_RECEPCION = '" . $IDRECEPCION . "' 
                                            AND ESTADO_REGISTRO = 1;");
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

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DRECEPCIONMP $DRECEPCIONMP)
    {

        try {
            $query = "
                UPDATE fruta_drecepcionmp SET		
                        MODIFICACION = SYSDATE(), 	
                        ESTADO_REGISTRO = 0
                WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONMP->__GET('ID_DRECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DRECEPCIONMP $DRECEPCIONMP)
    {
        try {
            $query = "
                        UPDATE fruta_drecepcionmp SET		
                                MODIFICACION = SYSDATE(), 	
                                ESTADO_REGISTRO = 1
                        WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONMP->__GET('ID_DRECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DRECEPCIONMP $DRECEPCIONMP)
    {
        try {
            $query = "
                            UPDATE fruta_drecepcionmp SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 1
                            WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONMP->__GET('ID_DRECEPCION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DRECEPCIONMP $DRECEPCIONMP)
    {
        try {
            $query = "
                            UPDATE fruta_drecepcionmp SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 0
                            WHERE ID_DRECEPCION= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DRECEPCIONMP->__GET('ID_DRECEPCION')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //OTRAS FUNCIONES
    //BUSCAR FECHA ACTUAL DEL SISTEMA
    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA';");
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

    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  RECEPCIONS
    public function obtenerFolio($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                        IFNULL(COUNT(FOLIO_DRECEPCION),0) AS 'ULTIMOFOLIO',
                                                        IFNULL(MAX(FOLIO_DRECEPCION),0) AS 'ULTIMOFOLIO2' 
                                                FROM fruta_drecepcionmp  
                                                WHERE  ID_FOLIO= '" . $IDFOLIO . "';");
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
