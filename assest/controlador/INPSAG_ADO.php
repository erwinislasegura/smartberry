<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/INPSAG.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class INPSAG_ADO
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
    public function listarInpsag()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_inpsag limit 6;	");
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

    public function listarInpsagCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                       DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                       DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'
                                            FROM fruta_inpsag ;	");
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

    public function listarInpsagCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                       DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                       DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                       FORMAT(IFNULL(CANTIDAD_ENVASE_INPSAG,0),0,'de_DE')  AS 'ENVASE',
                                                       FORMAT(IFNULL(KILOS_NETO_INPSAG,0),2,'de_DE')  AS 'NETO',
                                                       FORMAT(IFNULL(KILOS_BRUTO_INPSAG,0),2,'de_DE')  AS 'BRUTO',
                                                       FORMAT(IFNULL(CIF_INPSAG,0),2,'de_DE')  AS 'CIF'
                                            FROM fruta_inpsag ;	");
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
    public function verInpsag($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                             DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'FECHA_INGRESOR',
                                             DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'FECHA_MODIFICACIONR' 
                                             FROM fruta_inpsag WHERE ID_INPSAG= '" . $ID . "';");
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
    public function verInpsag2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_INPSAG, '%d/%m/%Y') AS 'FECHA',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM fruta_inpsag
                                            WHERE ID_INPSAG = '" . $ID . "';");
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

    public function verInpsag3($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_INPSAG, '%Y/%m/%d') AS 'FECHA',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM fruta_inpsag
                                            WHERE ID_INPSAG = '" . $ID . "';");
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
    public function verInpsagCsv($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_INPSAG, '%Y%m%d') AS 'FECHA'
                                            FROM fruta_inpsag
                                            WHERE ID_INPSAG = '" . $ID . "';");
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



    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreInpsag($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_inpsag WHERE OBSERVACION_INPSAG LIKE '%" . $NOMBRE . "%';");
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
    public function agregarInpsag(INPSAG $INPSAG)
    {
        if ($INPSAG->__GET('ID_PAIS1') == NULL) {
            $INPSAG->__SET('ID_PAIS1', NULL);
        }
        if ($INPSAG->__GET('ID_PAIS2') == NULL) {
            $INPSAG->__SET('ID_PAIS2', NULL);
        }
        if ($INPSAG->__GET('ID_PAIS3') == NULL) {
            $INPSAG->__SET('ID_PAIS3', NULL);
        }
        if ($INPSAG->__GET('ID_PAIS4') == NULL) {
            $INPSAG->__SET('ID_PAIS4', NULL);
        }

        try {

            $query =
                "INSERT INTO fruta_inpsag (         
                                                NUMERO_INPSAG,
                                                CORRELATIVO_INPSAG,
                                                FECHA_INPSAG,                                            
                                                OBSERVACION_INPSAG, 
                                                CIF_INPSAG, 
                                                TESTADOSAG, 
                                                ID_INPECTOR, 
                                                ID_CONTRAPARTE, 
                                                ID_TINPSAG,
                                                ID_PAIS1, 
                                                ID_PAIS2, 
                                                ID_PAIS3, 
                                                ID_PAIS4, 
                                                ID_PLANTA, 
                                                ID_TEMPORADA, 
                                                ID_USUARIOI, 
                                                ID_USUARIOM, 
                                                CANTIDAD_ENVASE_INPSAG, 
                                                KILOS_NETO_INPSAG,
                                                KILOS_BRUTO_INPSAG, 
                                                INGRESO, 
                                                MODIFICACION, 
                                                ESTADO,  
                                                ESTADO_REGISTRO
                                            )
             VALUES
               ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 0, 0, SYSDATE(),  SYSDATE(),  1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INPSAG->__GET('NUMERO_INPSAG'),
                        $INPSAG->__GET('CORRELATIVO_INPSAG'),
                        $INPSAG->__GET('FECHA_INPSAG'),
                        $INPSAG->__GET('OBSERVACION_INPSAG'),
                        $INPSAG->__GET('CIF_INPSAG'),
                        $INPSAG->__GET('TESTADOSAG'),
                        $INPSAG->__GET('ID_INPECTOR'),
                        $INPSAG->__GET('ID_CONTRAPARTE'),
                        $INPSAG->__GET('ID_TINPSAG'),
                        $INPSAG->__GET('ID_PAIS1'),
                        $INPSAG->__GET('ID_PAIS2'),
                        $INPSAG->__GET('ID_PAIS3'),
                        $INPSAG->__GET('ID_PAIS4'),
                        $INPSAG->__GET('ID_PLANTA'),
                        $INPSAG->__GET('ID_TEMPORADA'),
                        $INPSAG->__GET('ID_USUARIOI'),
                        $INPSAG->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarInpsag($id)
    {
        try {
            $sql = "DELETE FROM fruta_inpsag WHERE ID_INPSAG=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarInpsag(INPSAG $INPSAG)
    {

        if ($INPSAG->__GET('ID_PAIS2') == NULL) {
            $INPSAG->__SET('ID_PAIS2', NULL);
        }
        if ($INPSAG->__GET('ID_PAIS3') == NULL) {
            $INPSAG->__SET('ID_PAIS3', NULL);
        }
        if ($INPSAG->__GET('ID_PAIS4') == NULL) {
            $INPSAG->__SET('ID_PAIS4', NULL);
        }


        try {
            $query = "
            UPDATE fruta_inpsag SET
                MODIFICACION = SYSDATE(),
                FECHA_INPSAG = ?,
                CORRELATIVO_INPSAG = ?,
                CANTIDAD_ENVASE_INPSAG = ?,
                KILOS_NETO_INPSAG = ?, 
                KILOS_BRUTO_INPSAG = ?, 
                OBSERVACION_INPSAG = ?,
                CIF_INPSAG = ?, 
                TESTADOSAG = ?, 
                ID_INPECTOR = ?, 
                ID_CONTRAPARTE = ?, 
                ID_TINPSAG = ?, 
                ID_PAIS1 = ?, 
                ID_PAIS2 = ?, 
                ID_PAIS3 = ?, 
                ID_PAIS4 = ?, 
                ID_USUARIOM = ?
            WHERE ID_INPSAG= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $INPSAG->__GET('FECHA_INPSAG'),
                        $INPSAG->__GET('CORRELATIVO_INPSAG'),
                        $INPSAG->__GET('CANTIDAD_ENVASE_INPSAG'),
                        $INPSAG->__GET('KILOS_NETO_INPSAG'),
                        $INPSAG->__GET('KILOS_BRUTO_INPSAG'),
                        $INPSAG->__GET('OBSERVACION_INPSAG'),
                        $INPSAG->__GET('CIF_INPSAG'),
                        $INPSAG->__GET('TESTADOSAG'),
                        $INPSAG->__GET('ID_INPECTOR'),
                        $INPSAG->__GET('ID_CONTRAPARTE'),
                        $INPSAG->__GET('ID_TINPSAG'),
                        $INPSAG->__GET('ID_PAIS1'),
                        $INPSAG->__GET('ID_PAIS2'),
                        $INPSAG->__GET('ID_PAIS3'),
                        $INPSAG->__GET('ID_PAIS4'),
                        $INPSAG->__GET('ID_USUARIOM'),
                        $INPSAG->__GET('ID_INPSAG')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //FUNCIONES ESPECIALIZADAS 
    //LISTAR

    public function listarInpsagEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                   DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i:%S') AS 'INGRESO',
                                                   DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i:%S') AS 'MODIFICACION',
                                                   IFNULL(CANTIDAD_ENVASE_INPSAG,0)  AS 'ENVASE',
                                                   IFNULL(KILOS_NETO_INPSAG,0) AS 'NETO',
                                                   IFNULL(KILOS_BRUTO_INPSAG,0)  AS 'BRUTO'
                                        FROM fruta_inpsag                                                                                                     
                                        WHERE ESTADO_REGISTRO = 1                                                                                                        
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
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
    
    public function listarInpsagCerradoPlantaTemporadaCBX($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                   IFNULL(CANTIDAD_ENVASE_INPSAG,0)  AS 'ENVASE',
                                                   IFNULL(KILOS_NETO_INPSAG,0)  AS 'NETO',
                                                   IFNULL(KILOS_BRUTO_INPSAG,0)  AS 'BRUTO',
                                                   IFNULL(CIF_INPSAG,0)  AS 'CIF'
                                        FROM fruta_inpsag                                                                                                     
                                        WHERE ESTADO_REGISTRO = 1     
                                        AND ESTADO = 0                                                                                                   
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
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
    public function listarInpsagPlantaTemporadaCBX($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' ,
                                                   IFNULL(CANTIDAD_ENVASE_INPSAG,0)  AS 'ENVASE',
                                                   IFNULL(KILOS_NETO_INPSAG,0)  AS 'NETO',
                                                   IFNULL(KILOS_BRUTO_INPSAG,0)  AS 'BRUTO',
                                                   IFNULL(CIF_INPSAG,0)  AS 'CIF'
                                        FROM fruta_inpsag                                                                                                     
                                        WHERE ESTADO_REGISTRO = 1                                                                                                        
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
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

    public function listarInpsagPlantaTemporadaCBX2($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                   DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                   DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                   FORMAT(IFNULL(CANTIDAD_ENVASE_INPSAG,0),0,'de_DE')  AS 'ENVASE',
                                                   FORMAT(IFNULL(KILOS_NETO_INPSAG,0),2,'de_DE')  AS 'NETO',
                                                   FORMAT(IFNULL(KILOS_BRUTO_INPSAG,0),2,'de_DE')  AS 'BRUTO',
                                                   FORMAT(IFNULL(CIF_INPSAG,0),2,'de_DE')  AS 'CIF'
                                        FROM fruta_inpsag                                                                                                     
                                        WHERE ESTADO_REGISTRO = 1                                                                                                        
                                        AND  ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
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
    public function buscarPorSagCategoria($IDINPSAG)
    {
        try {

            
            $datos = $this->conexion->prepare(" SELECT 
                                                    (
                                                        SELECT FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') 
                                                        FROM fruta_exiexportacion existencia, estandar_eexportacion estandar
                                                        WHERE existencia.ID_INPSAG = inpsag.ID_INPSAG
                                                        AND existencia.ID_ESTANDAR = estandar.ID_ESTANDAR
                                                        AND estandar.PESO_NETO_ESTANDAR BETWEEN  0 AND 5
                                                    ) AS 'A',
                                                    (
                                                        SELECT FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') 
                                                        FROM fruta_exiexportacion existencia, estandar_eexportacion estandar
                                                        WHERE existencia.ID_INPSAG = inpsag.ID_INPSAG
                                                        AND existencia.ID_ESTANDAR = estandar.ID_ESTANDAR
                                                        AND estandar.PESO_NETO_ESTANDAR BETWEEN  6 AND 10
                                                    ) AS 'B',	(
                                                        SELECT FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE')  
                                                        FROM fruta_exiexportacion existencia, estandar_eexportacion estandar
                                                        WHERE existencia.ID_INPSAG = inpsag.ID_INPSAG
                                                        AND existencia.ID_ESTANDAR = estandar.ID_ESTANDAR
                                                        AND estandar.PESO_NETO_ESTANDAR >  10 
                                                    ) AS 'C'
                                                FROM fruta_inpsag inpsag

                                                WHERE ID_INPSAG= '" . $IDINPSAG . "'                                               
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
    
    public function buscarPorSagProductoEspecies($IDINPSAG)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                            (SELECT productor.CSG_PRODUCTOR
                                                            FROM fruta_productor productor
                                                            WHERE productor.ID_PRODUCTOR = existencia.ID_PRODUCTOR      
                                                            ) AS 'CSG',  
                                                            (SELECT productor.NOMBRE_PRODUCTOR
                                                            FROM fruta_productor productor
                                                            WHERE productor.ID_PRODUCTOR = existencia.ID_PRODUCTOR      
                                                            ) AS 'PRODUCTOR',  
                                                            (SELECT especies.NOMBRE_ESPECIES
                                                            FROM fruta_especies especies
                                                            WHERE especies.ID_ESPECIES = variedad.ID_ESPECIES      
                                                            ) AS 'ESPECIES',  
                                                            ( SELECT especies.CODIGO_SAG_ESPECIES
                                                              FROM fruta_especies especies
                                                              WHERE especies.ID_ESPECIES = variedad.ID_ESPECIES      
                                                            )  AS 'CODIGO',
                                                            FORMAT(IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'CANTIDAD'
                                                    FROM fruta_inpsag inpsag, fruta_exiexportacion existencia, fruta_vespecies variedad
                                                    WHERE 
                                                         inpsag.ID_INPSAG= '" . $IDINPSAG . "'           
                                                        AND inpsag.ID_INPSAG = existencia.ID_INPSAG
                                                        AND existencia.ID_VESPECIES = variedad.ID_VESPECIES    
                                                    GROUP BY existencia.ID_PRODUCTOR, variedad.ID_ESPECIES        
                                                
                                                 
                                                
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

    //TOTALES

    public function obtenerTotalesInpsagCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_INPSAG),0),0,'de_DE') AS 'ENVASE',   
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_INPSAG),0),2,'de_DE') AS 'NETO',  
                                                 FORMAT(IFNULL(SUM(KILOS_BRUTO_INPSAG),0),2,'de_DE')  AS 'BRUTO'  
                                        FROM fruta_inpsag ;	");
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
    public function obtenerTotalesInpsagCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT  IFNULL(SUM(CANTIDAD_ENVASE_INPSAG),0) AS 'ENVASE',   
                                                 IFNULL(SUM(KILOS_NETO_INPSAG),0) AS 'NETO',  
                                                 IFNULL(SUM(KILOS_BRUTO_INPSAG),0)  AS 'BRUTO'  
                                        FROM fruta_inpsag ;	");
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


    public function obtenerTotalesInpsaEmpresaPlantaTemporadagCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  IFNULL(SUM(CANTIDAD_ENVASE_INPSAG),0) AS 'ENVASE',   
                                                 IFNULL(SUM(KILOS_NETO_INPSAG),0) AS 'NETO',  
                                                 IFNULL(SUM(KILOS_BRUTO_INPSAG),0)  AS 'BRUTO'  
                                        FROM fruta_inpsag 
                                                                                                                    
                                        WHERE ESTADO_REGISTRO = 1                                                                                                        
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
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
    public function obtenerTotalesInpsaPlantaTemporadagCBX2($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_INPSAG),0),0,'de_DE') AS 'ENVASE',   
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_INPSAG),0),2,'de_DE') AS 'NETO',  
                                                 FORMAT(IFNULL(SUM(KILOS_BRUTO_INPSAG),0),2,'de_DE')  AS 'BRUTO'  
                                        FROM fruta_inpsag 
                                                                                                                    
                                        WHERE ESTADO_REGISTRO = 1                                                                                                        
                                        AND ID_PLANTA = '" . $PLANTA . "'
                                        AND ID_TEMPORADA = '" . $TEMPORADA . "'
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

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachoExistenciaExportacion(INPSAG $INPSAG)
    {
        try {
            $query = "
    UPDATE fruta_inpsag SET
        CANTIDAD_ENVASE_INPSAG= ?,
        KILOS_NETO_INPSAG= ?,
        MODIFICACION = SYSDATE()        
    WHERE ID_INPSAG= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INPSAG->__GET('CANTIDAD_ENVASE_INPSAG'),
                        $INPSAG->__GET('KILOS_NETO_INPSAG'),
                        $INPSAG->__GET('ID_INPSAG')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachoQuitarExistenciaExportacion(INPSAG $INPSAG)
    {
        try {
            $query = "
    UPDATE fruta_inpsag SET
        CANTIDAD_ENVASE_INPSAG= ?,
        KILOS_NETO_INPSAG= ?,
        MODIFICACION = SYSDATE()        
    WHERE ID_INPSAG= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INPSAG->__GET('CANTIDAD_ENVASE_PCDESPACHO'),
                        $INPSAG->__GET('KILOS_NETO_INPSAG'),
                        $INPSAG->__GET('ID_INPSAG')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(INPSAG $INPSAG)
    {

        try {
            $query = "
    UPDATE fruta_inpsag SET			
            ESTADO_REGISTRO = 0
    WHERE ID_INPSAG= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INPSAG->__GET('ID_INPSAG')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(INPSAG $INPSAG)
    {
        try {
            $query = "
    UPDATE fruta_inpsag SET			
            ESTADO_REGISTRO = 1
    WHERE ID_INPSAG= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INPSAG->__GET('ID_INPSAG')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(INPSAG $INPSAG)
    {
        try {
            $query = "
                    UPDATE fruta_inpsag SET			
                            ESTADO = 1
                    WHERE ID_INPSAG= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INPSAG->__GET('ID_INPSAG')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(INPSAG $INPSAG)
    {
        try {
            $query = "
                    UPDATE fruta_inpsag SET			
                            ESTADO = 0
                    WHERE ID_INPSAG= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INPSAG->__GET('ID_INPSAG')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //OTRAS FUNCIONES

    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHAINPSAG, $OBSERVACIONINPSAG,  $PLANTA, $TEMPORADA)
    {

        try {
            $datos = $this->conexion->prepare(" SELECT *
                                        FROM fruta_inpsag
                                        WHERE 
                                             FECHA_INPSAG LIKE '" . $FECHAINPSAG . "' 
                                             AND OBSERVACION_INPSAG LIKE '" . $OBSERVACIONINPSAG . "' 
                                             AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                             AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')                                                                                    
                                             AND ID_PLANTA = '" . $PLANTA . "'                                      
                                             AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                             ORDER BY ID_INPSAG DESC
                                            
                                             ; ");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //	print_r($resultado);
            // var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //BUSCAR FECHA ACTUAL DEL SISTEMA
    public function obtenerFecha()
    {
        try {

            $datos = $this->conexion->prepare("SELECT CURDATE() AS 'FECHA' , DATE_FORMAT(NOW( ), '%H:%i') AS 'HORA'   ;");
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


    public function obtenerNumero($PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_INPSAG,0)) AS 'NUMERO'
                                                FROM fruta_inpsag
                                                WHERE  
                                                    ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "'     
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
