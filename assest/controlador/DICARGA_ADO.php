<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DICARGA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DICARGA_ADO
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
    public function listarDicarga()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dicarga LIMIT 6;	");
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
    public function listarDicargaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dicarga  WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarDicarga2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dicarga  WHERE ESTADO_REGISTRO = 0;	");
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
    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verDicarga($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_dicarga WHERE ID_DICARGA= '" . $ID . "';");
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
    public function agregarDicarga(DICARGA $DICARGA)
    {
        try {

            if ($DICARGA->__GET('ID_TMONEDA') == NULL) {
                $DICARGA->__SET('ID_TMONEDA', NULL);
            }
            if ($DICARGA->__GET('ID_TMANEJO') == NULL) {
                $DICARGA->__SET('ID_TMANEJO', NULL);
            }
            if ($DICARGA->__GET('ID_VESPECIES') == NULL) {
                $DICARGA->__SET('ID_VESPECIES', NULL);
            }

            $query =
                "INSERT INTO fruta_dicarga 
                                        (
                                            CANTIDAD_ENVASE_DICARGA, 
                                            KILOS_NETO_DICARGA, 
                                            KILOS_BRUTO_DICARGA, 
                                            PRECIO_US_DICARGA, 
                                            TOTAL_PRECIO_US_DICARGA, 

                                            ID_ESTANDAR,  
                                            ID_TCALIBRE, 
                                            ID_TMONEDA, 
                                            ID_TMANEJO, 
                                            ID_VESPECIES, 

                                            ID_ICARGA, 
                                            INGRESO, 
                                            MODIFICACION, 
                                            ESTADO, 
                                            ESTADO_REGISTRO
                                        ) 
            VALUES
	       	(?, ?, ?, ?, ?,  ?, ?, ?, ?, ?,  ?,  SYSDATE(),SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DICARGA->__GET('CANTIDAD_ENVASE_DICARGA'),
                        $DICARGA->__GET('KILOS_NETO_DICARGA'),
                        $DICARGA->__GET('KILOS_BRUTO_DICARGA'),
                        $DICARGA->__GET('PRECIO_US_DICARGA'),
                        $DICARGA->__GET('TOTAL_PRECIO_US_DICARGA'),

                        $DICARGA->__GET('ID_ESTANDAR'),
                        $DICARGA->__GET('ID_TCALIBRE'),
                        $DICARGA->__GET('ID_TMONEDA'),
                        $DICARGA->__GET('ID_TMANEJO'),
                        $DICARGA->__GET('ID_VESPECIES'),

                        $DICARGA->__GET('ID_ICARGA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDicarga($id)
    {
        try {
            $sql = "DELETE FROM fruta_dicarga WHERE ID_DICARGA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDicarga(DICARGA $DICARGA)
    {

        
        if ($DICARGA->__GET('ID_TMONEDA') == NULL) {
            $DICARGA->__SET('ID_TMONEDA', NULL);
        }
        if ($DICARGA->__GET('ID_TMANEJO') == NULL) {
            $DICARGA->__SET('ID_TMANEJO', NULL);
        }
        if ($DICARGA->__GET('ID_VESPECIES') == NULL) {
            $DICARGA->__SET('ID_VESPECIES', NULL);
        }
        try {
            $query = "
                    UPDATE fruta_dicarga SET
                        CANTIDAD_ENVASE_DICARGA = ?,
                        KILOS_NETO_DICARGA = ?,
                        KILOS_BRUTO_DICARGA = ?,
                        PRECIO_US_DICARGA = ?,
                        TOTAL_PRECIO_US_DICARGA = ?,

                        ID_ESTANDAR = ?,
                        ID_TCALIBRE= ?,
                        ID_TMONEDA= ?,
                        ID_TMANEJO= ?,
                        ID_VESPECIES= ?,

                        ID_ICARGA= ?
                    WHERE ID_DICARGA = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $DICARGA->__GET('CANTIDAD_ENVASE_DICARGA'),
                        $DICARGA->__GET('KILOS_NETO_DICARGA'),
                        $DICARGA->__GET('KILOS_BRUTO_DICARGA'),
                        $DICARGA->__GET('PRECIO_US_DICARGA'),
                        $DICARGA->__GET('TOTAL_PRECIO_US_DICARGA'),
                        $DICARGA->__GET('ID_ESTANDAR'),

                        $DICARGA->__GET('ID_TCALIBRE'),
                        $DICARGA->__GET('ID_TMONEDA'),
                        $DICARGA->__GET('ID_TMANEJO'),
                        $DICARGA->__GET('ID_VESPECIES'),
                        
                        $DICARGA->__GET('ID_ICARGA'),
                        $DICARGA->__GET('ID_DICARGA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 


    //LISTAR POR INSTRUCTIVO CARGA
    public function buscarPorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                IFNULL(CANTIDAD_ENVASE_DICARGA,0)AS 'ENVASE',
                                                IFNULL(KILOS_NETO_DICARGA,0)AS 'NETO',
                                                IFNULL(KILOS_BRUTO_DICARGA,0) AS 'BRUTO',
                                                IFNULL(PRECIO_US_DICARGA,0) AS 'US',
                                                IFNULL(TOTAL_PRECIO_US_DICARGA,0) AS 'TOTALUS'
            
                                                 FROM fruta_dicarga 
                                                WHERE ID_ICARGA = '" . $IDICARGA . "'  
                                                AND ESTADO_REGISTRO = 1;	");
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
    
    public function buscarPorIcarga2($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_DICARGA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_DICARGA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_DICARGA,0),2,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(PRECIO_US_DICARGA,0),2,'de_DE') AS 'US',
                                                    FORMAT(IFNULL(TOTAL_PRECIO_US_DICARGA,0),2,'de_DE') AS 'TOTALUS'
                                                FROM fruta_dicarga 
                                                WHERE ID_ICARGA = '" . $IDICARGA . "'  
                                                AND ESTADO_REGISTRO = 1;	");
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
    
    public function buscarPorIcargaLimitado1($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  detalle.ID_TMONEDA AS 'ID_TMONEDA',
                                                        (SELECT NOMBRE_TMONEDA
                                                        FROM fruta_tmoneda
                                                        WHERE ID_TMONEDA= detalle.ID_TMONEDA     
                                                        LIMIT 1
                                                        ) AS 'TMONEDA'
                                                FROM fruta_dicarga  detalle
                                                WHERE detalle.ID_ICARGA = '" . $IDICARGA . "'  
                                                AND detalle.ESTADO_REGISTRO = 1
                                                LIMIT 1;	");
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
    public function buscarInvoiceIntPorIcarga($IDICARGA){
        try {

            $datos = $this->conexion->prepare("SELECT 	
                                                    estandar.ID_ESTANDAR,
                                                    (select PESO_NETO_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'PESONETOE',
                                                    (select PESO_BRUTO_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'PESOBRUTOE',
                                                    estandar.ID_ECOMERCIAL,
                                                    (select CODIGO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'CODIGO',
                                                    (select NOMBRE_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NOMBRE',                                                    
                                                    (select PESO_NETO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'PESONETOC',
                                                    (select PESO_BRUTO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'PESOBRUTOC',                      
                                                    IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0)  AS 'ENVASESF',                              
                                                    (select IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) *PESO_NETO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NETOSF',                                                    
                                                    (select IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) *PESO_BRUTO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'BRUTOSF',  
                                                    IFNULL(detalle.PRECIO_US_DICARGA,0) AS 'US',
                                                    IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) * IFNULL(detalle.PRECIO_US_DICARGA,0) AS 'TOTALUSSF',                   
                                                    FORMAT(IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0),2,'de_DE')  AS 'ENVASE',                                
                                                    (select FORMAT(IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) *PESO_NETO_ECOMERCIAL,2,'de_DE')
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NETO',                                                    
                                                    (select FORMAT(IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) *PESO_BRUTO_ECOMERCIAL,2,'de_DE')
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'BRUTO',  
                                                    (SELECT NOMBRE_TMONEDA
                                                    FROM fruta_tmoneda
                                                    WHERE ID_TMONEDA=detalle.ID_TMONEDA     
                                                    LIMIT 1
                                                    ) AS 'TMONEDA',
                                                    FORMAT(IFNULL(detalle.PRECIO_US_DICARGA,0),2,'de_DE') AS 'US',
                                                    FORMAT(IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) * IFNULL(detalle.PRECIO_US_DICARGA,0),2,'de_DE') AS 'TOTALUS'                                 
                                                FROM fruta_dicarga detalle, estandar_eexportacion estandar, estandar_ecomercial comercial
                                                WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND estandar.ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                AND detalle.ESTADO_REGISTRO = 1
                                                AND detalle.ID_ICARGA = '".$IDICARGA."'
                                                GROUP BY comercial.ID_ECOMERCIAL
                                                        
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

    public function buscarInvoiceIntPorIcargaPorCalibre($IDICARGA){
        try {

            $datos = $this->conexion->prepare("SELECT 	
                                                        estandar.ID_ESTANDAR,
                                                        (select PESO_NETO_ESTANDAR
                                                        FROM estandar_eexportacion
                                                        WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                        ) AS 'PESONETOE',
                                                        (select PESO_BRUTO_ESTANDAR
                                                        FROM estandar_eexportacion
                                                        WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                        ) AS 'PESOBRUTOE',
                                                        estandar.ID_ECOMERCIAL,
                                                        (select CODIGO_ECOMERCIAL
                                                        FROM estandar_ecomercial
                                                        WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                        ) AS 'CODIGO',
                                                        (select NOMBRE_ECOMERCIAL
                                                        FROM estandar_ecomercial
                                                        WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                        ) AS 'NOMBRE',                                                    
                                                        (select PESO_NETO_ECOMERCIAL
                                                        FROM estandar_ecomercial
                                                        WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                        ) AS 'PESONETOC',
                                                        (select PESO_BRUTO_ECOMERCIAL
                                                        FROM estandar_ecomercial
                                                        WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                        ) AS 'PESOBRUTOC',                      
                                                        IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0)  AS 'ENVASESF',                              
                                                        (select IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) *PESO_NETO_ECOMERCIAL
                                                        FROM estandar_ecomercial
                                                        WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                        ) AS 'NETOSF',                                                    
                                                        (select IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) *PESO_BRUTO_ECOMERCIAL
                                                        FROM estandar_ecomercial
                                                        WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                        ) AS 'BRUTOSF',  
                                                        IFNULL(detalle.PRECIO_US_DICARGA,0) AS 'US',
                                                        IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) * IFNULL(detalle.PRECIO_US_DICARGA,0) AS 'TOTALUSSF',                   
                                                        FORMAT(IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0),2,'de_DE')  AS 'ENVASE',                                
                                                        (select FORMAT(IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) *PESO_NETO_ECOMERCIAL,2,'de_DE')
                                                        FROM estandar_ecomercial
                                                        WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                        ) AS 'NETO',                                                    
                                                        (select FORMAT(IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) *PESO_BRUTO_ECOMERCIAL,2,'de_DE')
                                                        FROM estandar_ecomercial
                                                        WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                        ) AS 'BRUTO',  
                                                        (SELECT NOMBRE_TMONEDA
                                                        FROM fruta_tmoneda
                                                        WHERE ID_TMONEDA=detalle.ID_TMONEDA     
                                                        LIMIT 1
                                                        ) AS 'TMONEDA',                                                    
                                                        (
                                                        SELECT calibre2.NOMBRE_TCALIBRE
                                                        FROM fruta_tcalibre calibre2
                                                        WHERE  calibre2.ID_TCALIBRE = calibre.ID_TCALIBRE
                                                        ) AS 'TCALIBRE',
                                                        FORMAT(IFNULL(detalle.PRECIO_US_DICARGA,0),2,'de_DE') AS 'US',
                                                        FORMAT(IFNULL(SUM(detalle.CANTIDAD_ENVASE_DICARGA),0) * IFNULL(detalle.PRECIO_US_DICARGA,0),2,'de_DE') AS 'TOTALUS'                                 
                                                FROM fruta_dicarga detalle, fruta_tcalibre calibre, estandar_eexportacion estandar, estandar_ecomercial comercial
                                                WHERE detalle.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    AND estandar.ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    AND detalle.ID_TCALIBRE = calibre.ID_TCALIBRE
                                                    AND detalle.ESTADO_REGISTRO = 1
                                                    AND detalle.ID_ICARGA = '".$IDICARGA."'
                                                GROUP BY comercial.ID_ECOMERCIAL, calibre.ID_TCALIBRE;
                                                                                                
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

    
    public function buscarInvoicePorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 	
                                                    estandar.ID_ESTANDAR, 
                                                    (select PESO_NETO_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'PESONETOE',
                                                    (select PESO_BRUTO_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'PESOBRUTOE',
                                                    estandar.ID_ECOMERCIAL,
                                                    (select CODIGO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'CODIGO',
                                                    (select NOMBRE_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NOMBRE',                                                    
                                                    (select PESO_NETO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'PESONETOC',
                                                    (select PESO_BRUTO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'PESOBRUTOC',      
                                                    IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASESF',
                                                    (select IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) *PESO_NETO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NETOSF',                                                 
                                                    (select IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) *PESO_BRUTO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'BRUTOSF',                                                           
                                                    (  SELECT
                                                            IFNULL(detalle.PRECIO_US_DICARGA,0)
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                     		LIMIT 1
                                                        ) AS 'USSF',  
                                                    (  SELECT
                                                        IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) * IFNULL(detalle.PRECIO_US_DICARGA,0)
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                     		LIMIT 1
                                                        ) AS 'TOTALUSSF',                                                                                                                                                 
                                                    (select FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) *PESO_NETO_ECOMERCIAL,2,'de_DE')
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NETO',                                                    
                                                    (select FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) *PESO_BRUTO_ECOMERCIAL,2,'de_DE')
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'BRUTO',   
                                                    (  SELECT               
                                                                (	SELECT NOMBRE_TMONEDA
                                                                    FROM fruta_tmoneda
                                                                    WHERE ID_TMONEDA=detalle.ID_TMONEDA   
                                                                )
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                     		LIMIT 1
                                                        ) AS 'TMONEDA',
                                                    FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(SUM(existencia.KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETOF',
                                                    FORMAT(IFNULL(SUM(existencia.KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE') AS 'BRUTOF',
                                                    (  SELECT
                                                            FORMAT(IFNULL(detalle.PRECIO_US_DICARGA,0),2,'de_DE')
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                     		LIMIT 1
                                                        ) AS 'US',            
                                                    (  SELECT
                                                        FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) * IFNULL(detalle.PRECIO_US_DICARGA,0),2,'de_DE')
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                     		LIMIT 1
                                                        ) AS 'TOTALUS'
                                            FROM  fruta_icarga icarga,   fruta_despachoex despacho, fruta_exiexportacion existencia, estandar_eexportacion estandar, estandar_ecomercial comercial
                                            WHERE icarga.ID_ICARGA = despacho.ID_ICARGA 
                                                AND despacho.ID_DESPACHOEX = existencia.ID_DESPACHOEX
                                                AND existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND estandar.ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                AND icarga.ID_ICARGA = '".$IDICARGA."'
                                            GROUP by comercial.ID_ECOMERCIAL
                                                ;	");
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
    
    public function buscarInvoicePorIcargaPorCalibre($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 	
                                                    estandar.ID_ESTANDAR, 
                                                    (select PESO_NETO_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'PESONETOE',
                                                    (select PESO_BRUTO_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'PESOBRUTOE',
                                                    estandar.ID_ECOMERCIAL,
                                                    (select CODIGO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'CODIGO',
                                                    (select NOMBRE_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NOMBRE',                                                    
                                                    (select PESO_NETO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'PESONETOC',
                                                    (select PESO_BRUTO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'PESOBRUTOC',      
                                                    IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASESF',
                                                    (select IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) *PESO_NETO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NETOSF',                                                 
                                                    (select IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) *PESO_BRUTO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'BRUTOSF',                                                           
                                                    (  SELECT
                                                            IFNULL(detalle.PRECIO_US_DICARGA,0)
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                            LIMIT 1
                                                        ) AS 'USSF',  
                                                    (  SELECT
                                                        IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) * IFNULL(detalle.PRECIO_US_DICARGA,0)
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                            LIMIT 1
                                                        ) AS 'TOTALUSSF',                                                                                                                                                 
                                                    (select FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) *PESO_NETO_ECOMERCIAL,2,'de_DE')
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NETO',                                                    
                                                    (select FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) *PESO_BRUTO_ECOMERCIAL,2,'de_DE')
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'BRUTO',   
                                                    (  SELECT               
                                                                (	SELECT NOMBRE_TMONEDA
                                                                    FROM fruta_tmoneda
                                                                    WHERE ID_TMONEDA=detalle.ID_TMONEDA   
                                                                )
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                            LIMIT 1
                                                        ) AS 'TMONEDA',
                                                        (
                                                        SELECT calibre2.NOMBRE_TCALIBRE
                                                        FROM fruta_tcalibre calibre2
                                                        WHERE  calibre2.ID_TCALIBRE = calibre.ID_TCALIBRE
                                                        ) AS 'TCALIBRE',
                                                    FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(SUM(existencia.KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETOF',
                                                    FORMAT(IFNULL(SUM(existencia.KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE') AS 'BRUTOF',
                                                    (  SELECT
                                                            FORMAT(IFNULL(detalle.PRECIO_US_DICARGA,0),2,'de_DE')
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                            LIMIT 1
                                                        ) AS 'US',            
                                                    (  SELECT
                                                        FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0) * IFNULL(detalle.PRECIO_US_DICARGA,0),2,'de_DE')
                                                            FROM fruta_dicarga detalle, estandar_eexportacion estandar2, estandar_ecomercial comercial2
                                                            WHERE   detalle.ID_ESTANDAR=estandar2.ID_ESTANDAR
                                                            AND estandar2.ID_ECOMERCIAL = comercial2.ID_ECOMERCIAL
                                                            AND detalle.ID_ICARGA = icarga.ID_ICARGA  
                                                            AND comercial2.ID_ECOMERCIAL =comercial.ID_ECOMERCIAL
                                                            AND detalle.ESTADO_REGISTRO = 1
                                                            LIMIT 1
                                                        ) AS 'TOTALUS'
                                            FROM  fruta_icarga icarga,   fruta_despachoex despacho, fruta_exiexportacion existencia, 
                                                  fruta_tcalibre calibre,  estandar_eexportacion estandar, estandar_ecomercial comercial
                                            WHERE icarga.ID_ICARGA = despacho.ID_ICARGA 
                                                AND despacho.ID_DESPACHOEX = existencia.ID_DESPACHOEX
                                                AND existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND existencia.ID_TCALIBRE = calibre.ID_TCALIBRE
                                                AND estandar.ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                                                        AND icarga.ID_ICARGA = '".$IDICARGA."'
                                            GROUP by comercial.ID_ECOMERCIAL, calibre.ID_TCALIBRE;
                                                ;	");
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

   
    public function buscarEstandarEnInvoicePorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 	
                                                    estandar.ID_ESTANDAR,
                                                    (select CODIGO_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'CODIGO',
                                                    (select NOMBRE_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'NOMBRE',                                                    
                                                    (select PESO_NETO_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'PESONETO',
                                                    (select PESO_BRUTO_ESTANDAR
                                                    FROM estandar_eexportacion
                                                    WHERE ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    ) AS 'PESOBRUTO'    
                                            FROM  fruta_icarga icarga,   fruta_despachoex despacho, fruta_exiexportacion existencia, estandar_eexportacion estandar
                                            WHERE icarga.ID_ICARGA = despacho.ID_ICARGA 
                                                AND despacho.ID_DESPACHOEX = existencia.ID_DESPACHOEX
                                                AND existencia.ID_ESTANDAR = estandar.ID_ESTANDAR
                                                AND icarga.ID_ICARGA = '".$IDICARGA."'
                                            GROUP by estandar.ID_ESTANDAR
                                                ;	");
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
    
    public function buscarCalibreEnInvoicePorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 	
                                                    tcalibre.ID_TCALIBRE,
                                                    (select NOMBRE_TCALIBRE
                                                    FROM fruta_tcalibre
                                                    WHERE ID_TCALIBRE=tcalibre.ID_TCALIBRE
                                                    ) AS 'NOMBRE'                                               
                                                        
                                            FROM  fruta_icarga icarga,   fruta_despachoex despacho, fruta_exiexportacion existencia, fruta_tcalibre tcalibre
                                            WHERE icarga.ID_ICARGA = despacho.ID_ICARGA 
                                                AND despacho.ID_DESPACHOEX = existencia.ID_DESPACHOEX
                                                AND existencia.ID_TCALIBRE = tcalibre.ID_TCALIBRE
                                                AND icarga.ID_ICARGA = '".$IDICARGA."'
                                            GROUP by tcalibre.ID_TCALIBRE
                                                ;	");
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
    
    public function buscarEcomercialenInvoicePorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 	
                                                    estandar.ID_ECOMERCIAL,
                                                    (select CODIGO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'CODIGO',
                                                    (select NOMBRE_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'NOMBRE',                                                    
                                                    (select PESO_NETO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'PESONETOC',
                                                    (select PESO_BRUTO_ECOMERCIAL
                                                    FROM estandar_ecomercial
                                                    WHERE ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                    ) AS 'PESOBRUTOC'    
                                            FROM  fruta_icarga icarga,   fruta_despachoex despacho, fruta_exiexportacion existencia, estandar_eexportacion estandar, estandar_ecomercial comercial
                                            WHERE icarga.ID_ICARGA = despacho.ID_ICARGA 
                                                AND despacho.ID_DESPACHOEX = existencia.ID_DESPACHOEX
                                                AND existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND estandar.ID_ECOMERCIAL=comercial.ID_ECOMERCIAL
                                                AND icarga.ID_ICARGA = '".$IDICARGA."'
                                            GROUP by comercial.ID_ECOMERCIAL
                                                ;	");
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
    public function totalesPorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                            IFNULL(SUM(CANTIDAD_ENVASE_DICARGA),0) AS 'ENVASE',
                                            IFNULL(SUM(KILOS_NETO_DICARGA),0) AS 'NETO',
                                            IFNULL(SUM(KILOS_BRUTO_DICARGA),0) AS 'BRUTO',
                                            IFNULL(SUM(TOTAL_PRECIO_US_DICARGA),0) AS 'TOTALUS'
                                         FROM fruta_dicarga 
                                         WHERE ID_ICARGA = '" . $IDICARGA . "'
                                               AND ESTADO_REGISTRO = 1;	");
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

    public function totalesPorIcarga2($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                            FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DICARGA),0),0,'de_DE') AS 'ENVASE',
                                            FORMAT(IFNULL(SUM(KILOS_NETO_DICARGA),0 ),2,'de_DE') AS 'NETO',
                                            FORMAT(IFNULL(SUM(KILOS_BRUTO_DICARGA),0),2,'de_DE') AS 'BRUTO',
                                            FORMAT(IFNULL(SUM(TOTAL_PRECIO_US_DICARGA),0),2,'de_DE') AS 'TOTALUS'
                                         FROM fruta_dicarga 
                                         WHERE ID_ICARGA = '" . $IDICARGA . "'   
                                               AND ESTADO_REGISTRO = 1;	");
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



    public function conteoPorIcarga($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT IFNULL(COUNT(ID_DICARGA),0) AS 'CONTEO'
            
                                                 FROM fruta_dicarga 
                                                WHERE ID_ICARGA = '" . $IDICARGA . "'  
                                                AND ESTADO_REGISTRO = 1;	");
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

    //OTRAS FUNCIONES
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DICARGA $DICARGA)
    {

        try {
            $query = "
		UPDATE fruta_dicarga SET			
            ESTADO_REGISTRO = 0
		WHERE ID_DICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DICARGA->__GET('ID_DICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DICARGA $DICARGA)
    {

        try {
            $query = "
		UPDATE fruta_dicarga SET			
            ESTADO_REGISTRO = 1
		WHERE ID_DICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DICARGA->__GET('ID_DICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO DE ESTADO DE LA FILA

    public function cerrado(DICARGA $DICARGA)
    {

        try {
            $query = "
		UPDATE fruta_dicarga SET			
            ESTADO = 0
		WHERE ID_DICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DICARGA->__GET('ID_DICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function abierto(DICARGA $DICARGA)
    {

        try {
            $query = "
		UPDATE fruta_dicarga SET			
            ESTADO = 1
		WHERE ID_DICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DICARGA->__GET('ID_DICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
