<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR

//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class CONSULTA_ADO
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


    //CONSULTAS DASHBOARD FRUTA @MICHAEL.SALAS

    

    public function TotalKgPtDespachadoExportacion($TEMPORADA, $PLANTA)
    {
        try {
        
            $datos = $this->conexion->prepare("SELECT E.NOMBRE_EMPRESA, FORMAT(IFNULL(KILOS_NETO_EXIEXPORTACION,0),2,'de_DE') AS NETO FROM FRUTA_DESPACHOEX DEX 
            JOIN FRUTA_EXIEXPORTACION DDEX ON DDEX.ID_DESPACHOEX = DEX.ID_DESPACHOEX 
            JOIN principal_empresa E ON E.ID_EMPRESA = DEX.ID_EMPRESA 
            WHERE DEX.ESTADO_REGISTRO = 1 
            AND DDEX.ESTADO_REGISTRO = 1 
            AND DEX.ESTADO = 0 
            AND DEX.ID_TEMPORADA = '".$TEMPORADA."' 
            AND DEX.ID_PLANTA = '".$PLANTA."'
            GROUP BY DEX.ID_EMPRESA");
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

    public function TotalKgMpRecepcionadosEmpresaPlanta($TEMPORADA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT E.NOMBRE_EMPRESA, SUM(DR.KILOS_NETO_DRECEPCION)AS TOTAL FROM fruta_recepcionmp R 
            JOIN fruta_drecepcionmp DR ON DR.ID_RECEPCION = R.ID_RECEPCION 
            JOIN principal_empresa E ON E.ID_EMPRESA = R.ID_EMPRESA 
            WHERE R.ESTADO_REGISTRO = 1 
            AND DR.ESTADO_REGISTRO = 1 
            AND R.ESTADO = 0 
            AND R.ID_TEMPORADA = '".$TEMPORADA."' 
            AND R.ID_PLANTA = '".$PLANTA."'
            GROUP BY R.ID_EMPRESA");
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


    public function TotalKgMpRecepcionadosPlanta($TEMPORADA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT SUM(DR.KILOS_NETO_DRECEPCION)AS TOTAL FROM fruta_recepcionmp R 
            JOIN fruta_drecepcionmp DR ON DR.ID_RECEPCION = R.ID_RECEPCION 
            JOIN principal_empresa E ON E.ID_EMPRESA = R.ID_EMPRESA 
            WHERE R.ESTADO_REGISTRO = 1 
            AND DR.ESTADO_REGISTRO = 1 
            AND R.ESTADO = 0 
            AND R.ID_TEMPORADA = '".$TEMPORADA."' 
            AND R.ID_PLANTA = '".$PLANTA."'");
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


    public function TotalRecepcionMpAbiertas($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT COUNT(ID_RECEPCION)AS NUMERO FROM fruta_recepcionmp R WHERE R.ID_PLANTA = '".$PLANTA."' AND R.ID_EMPRESA = '".$EMPRESA."' AND R.ESTADO = 1 AND R.ID_TEMPORADA = '".$TEMPORADA."'");
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


    public function TotalRecepcionIndAbiertas($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT COUNT(ID_RECEPCION)AS NUMERO FROM fruta_recepcionind R WHERE R.ID_PLANTA = '".$PLANTA."' AND R.ID_EMPRESA = '".$EMPRESA."' AND R.ESTADO = 1 AND R.ID_TEMPORADA = '".$TEMPORADA."'");
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


    public function TotalDespachoMpAbiertas($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT COUNT(ID_DESPACHO)AS NUMERO FROM fruta_despachomp D WHERE D.ID_PLANTA = '".$PLANTA."' AND D.ID_EMPRESA = '".$EMPRESA."' AND D.ESTADO = 1 AND D.ID_TEMPORADA = '".$TEMPORADA."'");
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


    public function TotalDespachoIndAbiertas($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT COUNT(ID_DESPACHO)AS NUMERO FROM fruta_despachoind D WHERE D.ID_PLANTA = '".$PLANTA."' AND D.ID_EMPRESA = '".$EMPRESA."' AND D.ESTADO = 1 AND D.ID_TEMPORADA = '".$TEMPORADA."'");
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

    public function TotalProcesosAbiertos($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT COUNT(ID_PROCESO)AS NUMERO FROM fruta_proceso P WHERE P.ID_PLANTA = '".$PLANTA."' AND P.ID_EMPRESA = '".$EMPRESA."' AND P.ESTADO = 1 AND P.ID_TEMPORADA = '".$TEMPORADA."'");
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

    public function TotalReembalajesAbiertos($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT COUNT(ID_REEMBALAJE)AS NUMERO FROM fruta_reembalaje REE WHERE REE.ID_PLANTA = '".$PLANTA."' AND REE.ID_EMPRESA = '".$EMPRESA."' AND REE.ESTADO = 1 AND REE.ID_TEMPORADA = '".$TEMPORADA."'");
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


    public function TotalRepaletizajesAbiertos($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT COUNT(ID_REPALETIZAJE)AS NUMERO FROM fruta_repaletizajeex REPA WHERE REPA.ID_PLANTA = '".$PLANTA."' AND REPA.ID_EMPRESA = '".$EMPRESA."' AND REPA.ESTADO = 1 AND REPA.ID_TEMPORADA = '".$TEMPORADA."'");
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


    public function TotalKgMpRecepcionadoAcumulado($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT SUM(DR.KILOS_NETO_DRECEPCION)AS TOTAL FROM fruta_recepcionmp R 
            JOIN fruta_drecepcionmp DR ON DR.ID_RECEPCION = R.ID_RECEPCION 
            WHERE R.ID_PLANTA = '".$PLANTA."' AND R.ID_EMPRESA = '".$EMPRESA."' AND R.ESTADO = 0 AND R.ID_TEMPORADA = '".$TEMPORADA."'");
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

    public function TotalKgMpRecepcionadoDiaAnterior($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT SUM(DR.KILOS_NETO_DRECEPCION)AS TOTAL FROM fruta_recepcionmp R 
            JOIN fruta_drecepcionmp DR ON DR.ID_RECEPCION = R.ID_RECEPCION 
            WHERE R.ID_PLANTA = '".$PLANTA."' AND R.ID_EMPRESA = '".$EMPRESA."' AND R.ESTADO = 1 AND R.ID_TEMPORADA = '".$TEMPORADA."' AND DATE_FORMAT(R.FECHA_RECEPCION, '%Y-%m-%d') = DATE_FORMAT(date_sub(now(),interval 1 day), '%Y-%m-%d')");
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


    public function TotalKgMpProcesado($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT SUM(P.KILOS_NETO_ENTRADA)AS TOTAL FROM fruta_proceso P 
            WHERE P.ID_PLANTA = '".$PLANTA."' AND P.ID_EMPRESA = '".$EMPRESA."' AND P.ESTADO = 0 AND P.ID_TEMPORADA = '".$TEMPORADA."'");
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


    public function TotalKgMpProcesadoDiaAnterior($TEMPORADA, $EMPRESA, $PLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT SUM(P.KILOS_NETO_ENTRADA)AS TOTAL FROM fruta_proceso P 
            WHERE P.ID_PLANTA = '".$PLANTA."' AND P.ID_EMPRESA = '".$EMPRESA."' AND P.ESTADO = 0 AND P.ID_TEMPORADA = '".$TEMPORADA."' AND DATE_FORMAT(P.FECHA_PROCESO, '%Y-%m-%d') = DATE_FORMAT(date_sub(now(),interval 1 day), '%Y-%m-%d')");
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

    public function verPlanta($ID_PLANTA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM   principal_planta   WHERE   ID_PLANTA  = '".$ID_PLANTA."';");
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

    




/* FIN CONSULTAS DASHBOARD */

    //FUNCIONES ESPECIALIZADAS 
    //RECEPCION VS PROCESO
    public function acumuladoRecepcionMp($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1 
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    
    public function acumuladoRecepcionMpNoBulk($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1 
                                                AND recepcion.TRECEPCION !=3
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    
    public function acumuladoRecepcionMpBulk($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1 
                                                AND  recepcion.TRECEPCION = 3
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    public function acumuladoRecepcionMpPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    
    public function acumuladoRecepcionMpNoBulkPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION != 3
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    public function acumuladoRecepcionMpBulkPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION = 3
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    
    public function acumuladoRecepcionMpPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    public function acumuladoRecepcionMpNoBulkPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION !=3
                                                AND  recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    
    public function acumuladoRecepcionMpBulkPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle, principal_empresa empresa
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND recepcion.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND  empresa.ESTADO_REGISTRO = 1
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION =3
                                                AND recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    public function acumuladoRecepcionMpPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    public function acumuladoRecepcionMpNoBulkPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION !=3
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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
    public function acumuladoRecepcionMpBulkPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(detalle.KILOS_NETO_DRECEPCION),0)  AS 'NETO' 
                                                FROM  fruta_recepcionmp recepcion ,  fruta_drecepcionmp detalle
                                                WHERE recepcion.ID_RECEPCION =  detalle.ID_RECEPCION
                                                AND  recepcion.ESTADO = 0
                                                AND  recepcion.ESTADO_REGISTRO = 1
                                                AND  detalle.ESTADO_REGISTRO = 1
                                                AND  recepcion.TRECEPCION =3
                                                AND recepcion.ID_EMPRESA = '".$EMPRESA."'
                                                AND recepcion.ID_PLANTA = '".$PLANTA."'
                                                AND  recepcion.ID_TEMPORADA = '".$TEMPORADA."'
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

    public function acumuladoProcesadoMp($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(existencia.KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima existencia, principal_empresa empresa
                                                WHERE existencia.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND empresa.ESTADO_REGISTRO = 1
                                                AND existencia.ESTADO_REGISTRO = 1 
                                                AND existencia.ID_PROCESO IS NOT NULL                                             
                                                AND existencia.ID_TEMPORADA = '".$TEMPORADA."'
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
    
    public function acumuladoProcesadoMpPorEmpresa($EMPRESA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_PROCESO IS NOT NULL
                                                AND ID_EMPRESA = '".$EMPRESA."'                                    
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'
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
    
    public function acumuladoProcesadoMpPorPlanta($PLANTA,$TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(existencia.KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima existencia, principal_empresa empresa
                                                WHERE existencia.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND empresa.ESTADO_REGISTRO = 1
                                                AND existencia.ESTADO_REGISTRO = 1 
                                                AND existencia.ID_PROCESO IS NOT NULL                                             
                                                AND existencia.ID_TEMPORADA = '".$TEMPORADA."'
                                                AND existencia.ID_PLANTA = '".$PLANTA."'   
    
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
    public function acumuladoProcesadoMpPorEmpresaPlanta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_PROCESO IS NOT NULL
                                                AND ID_EMPRESA = '".$EMPRESA."'
                                                AND ID_PLANTA = '".$PLANTA."'                                    
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'
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


 
    //EXISTENCIA DISPONIBLE
    public function existenciaDisponibleMp($TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(existencia.KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima existencia, principal_empresa empresa
                                                WHERE existencia.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND empresa.ESTADO_REGISTRO = 1
                                                AND existencia.ESTADO_REGISTRO = 1 
                                                AND existencia.ESTADO = 2                                           
                                                AND existencia.ID_TEMPORADA = '".$TEMPORADA."'
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
    
    public function existenciaDisponibleMpPorEmpresa($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                      IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2      
                                                AND ID_EMPRESA  = '".$EMPRESA."'                                          
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'
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
    
    public function existenciaDisponibleMpPorPlanta($PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(existencia.KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima existencia, principal_empresa empresa
                                                WHERE existencia.ID_EMPRESA=empresa.ID_EMPRESA
                                                AND empresa.ESTADO_REGISTRO = 1
                                                AND existencia.ESTADO_REGISTRO = 1 
                                                AND existencia.ESTADO = 2 
                                                AND existencia.ID_PLANTA = '".$PLANTA ."'                                         
                                                AND existencia.ID_TEMPORADA = '".$TEMPORADA."'           
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
    
    public function existenciaDisponibleMpPorEmpresaPlanta($EMPRESA,$PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                      IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0)  AS 'NETO' 
                                                FROM fruta_eximateriaprima 
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2         
                                                AND ID_EMPRESA = '".$EMPRESA."'        
                                                AND ID_PLANTA  = '".$PLANTA ."'                                              
                                                AND  ID_TEMPORADA = '".$TEMPORADA."'

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
    


    public function contarRegistrosAbiertosMateriales($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    (
                                                        select IFNULL( COUNT(recepcione.ID_RECEPCION),0) 
                                                        FROM material_recepcione recepcione
                                                        WHERE recepcione.ESTADO = 1     
                                                        AND recepcione.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                    ) AS 'RECEPCIONE',
                                                    (
                                                        select IFNULL( COUNT(recepcionm.ID_RECEPCION),0) 
                                                        FROM material_recepcionm recepcionm
                                                        WHERE recepcionm.ESTADO = 1
                                                        AND recepcionm.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                    ) AS 'RECEPCIONM',
                                                    (
                                                        select IFNULL( COUNT(despachoe.ID_DESPACHO),0) 
                                                        FROM material_despachoe despachoe
                                                        WHERE despachoe.ESTADO = 1
                                                        AND despachoe.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                    ) AS 'DESPACHOE',
                                                    (
                                                        select IFNULL( COUNT(despachom.ID_DESPACHO),0) 
                                                        FROM material_despachom despachom
                                                        WHERE despachom.ESTADO = 1
                                                        AND despachom.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                    ) AS 'DESPACHOM'
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
    public function contarRegistrosAbiertosFruta($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                        ( SELECT IFNULL( COUNT(recepcionmp.ID_RECEPCION),0)
                                                        FROM fruta_recepcionmp recepcionmp
                                                        WHERE recepcionmp.ESTADO = 1
                                                        AND recepcionmp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'RECEPCIONMP',
                                                        ( SELECT IFNULL( COUNT(recepcionind.ID_RECEPCION),0)
                                                        FROM fruta_recepcionind recepcionind
                                                        WHERE recepcionind.ESTADO = 1
                                                        AND recepcionind.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        )AS 'RECEPCIONIND',
                                                        ( SELECT IFNULL( COUNT(recepcionp.ID_RECEPCION),0)
                                                        FROM fruta_recepcionpt recepcionp
                                                        WHERE recepcionp.ESTADO = 1
                                                        AND recepcionp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        )AS 'RECEPCIONPT', 
                                                        ( SELECT IFNULL( COUNT(recepcionmp.ID_RECEPCION),0)
                                                        FROM fruta_recepcionmp recepcionmp
                                                        WHERE recepcionmp.ESTADO = 1
                                                        AND recepcionmp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        )+
                                                        ( SELECT IFNULL( COUNT(recepcionind.ID_RECEPCION),0)
                                                        FROM fruta_recepcionind recepcionind
                                                        WHERE recepcionind.ESTADO = 1
                                                        AND recepcionind.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        )+
                                                        ( SELECT IFNULL( COUNT(recepcionp.ID_RECEPCION),0)
                                                        FROM fruta_recepcionpt recepcionp
                                                        WHERE recepcionp.ESTADO = 1
                                                        AND recepcionp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'RECEPCION',
                                                        ( SELECT IFNULL( COUNT(despachomp.ID_DESPACHO),0)
                                                        FROM fruta_despachomp despachomp
                                                        WHERE despachomp.ESTADO = 1
                                                        AND despachomp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHOMP',
                                                        ( SELECT IFNULL( COUNT(despachoind.ID_DESPACHO),0)
                                                        FROM fruta_despachoind despachoind
                                                        WHERE despachoind.ESTADO = 1
                                                        AND despachoind.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHOIND',
                                                        ( SELECT IFNULL( COUNT(despachopt.ID_DESPACHO),0)
                                                        FROM fruta_despachopt despachopt
                                                        WHERE despachopt.ESTADO = 1
                                                        AND despachopt.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHOPT',
                                                        ( SELECT IFNULL( COUNT(despachoex.ID_DESPACHOEX),0)
                                                        FROM fruta_despachoex despachoex
                                                        WHERE despachoex.ESTADO = 1
                                                        AND despachoex.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHOEXPO'  ,
                                                        ( SELECT IFNULL( COUNT(despachomp.ID_DESPACHO),0)
                                                        FROM fruta_despachomp despachomp
                                                        WHERE despachomp.ESTADO = 1
                                                        AND despachomp.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) +
                                                        ( SELECT IFNULL( COUNT(despachoind.ID_DESPACHO),0)
                                                        FROM fruta_despachoind despachoind
                                                        WHERE despachoind.ESTADO = 1
                                                        AND despachoind.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) +
                                                        ( SELECT IFNULL( COUNT(despachopt.ID_DESPACHO),0)
                                                        FROM fruta_despachopt despachopt
                                                        WHERE despachopt.ESTADO = 1
                                                        AND despachopt.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) +
                                                        ( SELECT IFNULL( COUNT(despachoex.ID_DESPACHOEX),0)
                                                        FROM fruta_despachoex despachoex
                                                        WHERE despachoex.ESTADO = 1
                                                        AND despachoex.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'DESPACHO',
                                                        ( SELECT IFNULL( COUNT(proceso.ID_PROCESO),0)
                                                        FROM fruta_proceso proceso
                                                        WHERE proceso.ESTADO = 1
                                                        AND proceso.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'PROCESO' ,
                                                        ( SELECT IFNULL( COUNT(reembalaje.ID_REEMBALAJE),0)
                                                        FROM fruta_reembalaje reembalaje
                                                        WHERE reembalaje.ESTADO = 1
                                                        AND reembalaje.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'REEMBALAJE',
                                                        ( SELECT IFNULL( COUNT(repaletizajeex.ID_REPALETIZAJE),0)
                                                        FROM fruta_repaletizajeex repaletizajeex
                                                        WHERE repaletizajeex.ESTADO = 1
                                                        AND repaletizajeex.ESTADO_REGISTRO = 1
                                                        AND ID_EMPRESA = '".$EMPRESA."'
                                                        AND ID_PLANTA = '".$PLANTA."'
                                                        AND ID_TEMPORADA = '".$TEMPORADA."'
                                                        ) AS 'REPALETIZAJE'
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
}
