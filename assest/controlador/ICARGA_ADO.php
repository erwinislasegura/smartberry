<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/ICARGA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class ICARGA_ADO
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
    public function listarIcarga()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_icarga LIMIT 6;	");
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
    public function listarIcargaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATEDIFF( FECHAETA_ICARGA, FECHAETD_ICARGA) AS 'ESTIMADO',
                                                       DATEDIFF(CURDATE(), FECHAETD_ICARGA ) AS 'REAL'
                                            FROM fruta_icarga  
                                            WHERE ESTADO_REGISTRO = 1;	");
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



    public function listarIcarga2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_icarga  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verIcarga($ID)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT *,
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO', 
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                FROM fruta_icarga 
                                                WHERE ID_ICARGA= '" . $ID . "';");
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

    public function verReferencia($ID)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT *,
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO', 
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                                FROM fruta_icarga 
                                                WHERE ID_ICARGA= '" . $ID . "';");
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


    public function verIcarga2($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_ICARGA, '%d/%m/%Y') AS 'FECHA', 
                                                DATE_FORMAT(FECHA_CDOCUMENTAL_ICARGA, '%d/%m/%Y') AS 'FECHACD', 
                                                DATE_FORMAT(FECHAETD_ICARGA, '%d/%m/%Y') AS 'FECHAETD', 
                                                DATE_FORMAT(FECHAETA_ICARGA, '%d/%m/%Y') AS 'FECHAETA', 
                                                DATE_FORMAT(FECHAETAREAL_ICARGA, '%d/%m/%Y') AS 'FECHAETAREAL', 
                                                DATE_FORMAT(FECHASTACKING_ICARGA, '%d/%m/%Y') AS 'FECHAESTACKING', 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO', 
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION'
                                            FROM fruta_icarga
                                            WHERE ID_ICARGA = '" . $IDICARGA . "';");
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


    public function verIcargaInforme($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_ICARGA, '%d/%m/%Y') AS 'FECHA', 
                                                DATE_FORMAT(FECHAETD_ICARGA, '%W, %d of %M of %Y'') AS 'FECHAETD', 
                                                DATE_FORMAT(FECHAETA_ICARGA, '%W, %d of %M of %Y') AS 'FECHAETA', 
                                            FROM fruta_icarga
                                            WHERE ID_ICARGA = '" . $IDICARGA . "';");
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
    public function agregarIcarga(ICARGA $ICARGA)
    {
        try {
            if ($ICARGA->__GET('ID_CONSIGNATARIO') == NULL) {
                $ICARGA->__SET('ID_CONSIGNATARIO', NULL);
            }
            if ($ICARGA->__GET('ID_EMISIONBL') == NULL) {
                $ICARGA->__SET('ID_EMISIONBL', NULL);
            }
            if ($ICARGA->__GET('ID_EXPPORTADORA') == NULL) {
                $ICARGA->__SET('ID_EXPPORTADORA', NULL);
            }
            if ($ICARGA->__GET('ID_NOTIFICADOR') == NULL) {
                $ICARGA->__SET('ID_NOTIFICADOR', NULL);
            }
            if ($ICARGA->__GET('ID_BROKER') == NULL) {
                $ICARGA->__SET('ID_BROKER', NULL);
            }
            if ($ICARGA->__GET('ID_RFINAL') == NULL) {
                $ICARGA->__SET('ID_RFINAL', NULL);
            }
            if ($ICARGA->__GET('ID_MERCADO') == NULL) {
                $ICARGA->__SET('ID_MERCADO', NULL);
            }
            if ($ICARGA->__GET('ID_AADUANA') == NULL) {
                $ICARGA->__SET('ID_AADUANA', NULL);
            }
            if ($ICARGA->__GET('ID_AGCARGA') == NULL) {
                $ICARGA->__SET('ID_AGCARGA', NULL);
            }
            if ($ICARGA->__GET('ID_DFINAL') == NULL) {
                $ICARGA->__SET('ID_DFINAL', NULL);
            }
            if ($ICARGA->__GET('ID_TRANSPORTE') == NULL) {
                $ICARGA->__SET('ID_TRANSPORTE', NULL);
            }
            if ($ICARGA->__GET('ID_LCARGA') == NULL) {
                $ICARGA->__SET('ID_LCARGA', NULL);
            }
            if ($ICARGA->__GET('ID_LDESTINO') == NULL) {
                $ICARGA->__SET('ID_LDESTINO', NULL);
            }
            if ($ICARGA->__GET('ID_LAREA') == NULL) {
                $ICARGA->__SET('ID_LAREA', NULL);
            }
            if ($ICARGA->__GET('NAVE_ICARGA') == NULL) {
                $ICARGA->__SET('NAVE_ICARGA', NULL);
            }
            if ($ICARGA->__GET('ID_ACARGA') == NULL) {
                $ICARGA->__SET('ID_ACARGA', NULL);
            }
            if ($ICARGA->__GET('ID_ADESTINO') == NULL) {
                $ICARGA->__SET('ID_ADESTINO', NULL);
            }
            if ($ICARGA->__GET('ID_NAVIERA') == NULL) {
                $ICARGA->__SET('ID_NAVIERA', NULL);
            }
            if ($ICARGA->__GET('ID_PCARGA') == NULL) {
                $ICARGA->__SET('ID_PCARGA', NULL);
            }
            if ($ICARGA->__GET('ID_PDESTINO') == NULL) {
                $ICARGA->__SET('ID_PDESTINO', NULL);
            }
            if ($ICARGA->__GET('ID_FPAGO') == NULL) {
                $ICARGA->__SET('ID_FPAGO', NULL);
            }
            if ($ICARGA->__GET('ID_CVENTA') == NULL) {
                $ICARGA->__SET('ID_CVENTA', NULL);
            }
            if ($ICARGA->__GET('ID_MVENTA') == NULL) {
                $ICARGA->__SET('ID_MVENTA', NULL);
            }
            if ($ICARGA->__GET('ID_TCONTENEDOR') == NULL) {
                $ICARGA->__SET('ID_TCONTENEDOR', NULL);
            }
            if ($ICARGA->__GET('ID_ATMOSFERA') == NULL) {
                $ICARGA->__SET('ID_ATMOSFERA', NULL);
            }
            if ($ICARGA->__GET('ID_PAIS') == NULL) {
                $ICARGA->__SET('ID_PAIS', NULL);
            }
            if ($ICARGA->__GET('ID_TFLETE') == NULL) {
                $ICARGA->__SET('ID_TFLETE', NULL);
            }
            if ($ICARGA->__GET('FUMIGADO_ICARGA') == NULL) {
                $ICARGA->__SET('FUMIGADO_ICARGA', NULL);
            }
            if ($ICARGA->__GET('ID_SEGURO') == NULL) {
                $ICARGA->__SET('ID_SEGURO', NULL);
            }
            if ($ICARGA->__GET('FECHAETAREAL_ICARGA') == NULL) {
                $ICARGA->__SET('FECHAETAREAL_ICARGA', NULL);
            }
            if ($ICARGA->__GET('FECHA_CDOCUMENTAL_ICARGA') == NULL) {
                $ICARGA->__SET('FECHA_CDOCUMENTAL_ICARGA', NULL);
            }
            $query =
                "INSERT INTO fruta_icarga ( 
                                            NUMERO_ICARGA, 
                                            FECHA_ICARGA, 
                                            BOOKING_ICARGA, 
                                            NREFERENCIA_ICARGA, 
                                            FECHAETD_ICARGA, 
                                            FECHAETA_ICARGA, 
                                            FECHAETAREAL_ICARGA, 
                                            FDA_ICARGA, 
                                            TEMBARQUE_ICARGA, 
                                            NCONTENEDOR_ICARGA,
                                            CRT_ICARGA,  
                                            FECHASTACKING_ICARGA,
                                            NVIAJE_ICARGA, 
                                            FUMIGADO_ICARGA, 
                                            T_ICARGA,
                                            O2_ICARGA, 
                                            C02_ICARGA, 
                                            ALAMPA_ICARGA, 
                                            COSTO_FLETE_ICARGA,
                                            DUS_ICARGA, 
                                            BOLAWBCRT_ICARGA, 
                                            NETO_ICARGA, 
                                            REBATE_ICARGA,
                                            PUBLICA_ICARGA,  
                                            FECHA_CDOCUMENTAL_ICARGA, 
                                            OBSERVACION_ICARGA, 
                                            OBSERVACIONI_ICARGA, 
                                            NAVE_ICARGA, 
                                            ID_EXPPORTADORA, 
                                            ID_CONSIGNATARIO, 
                                            ID_EMISIONBL, 
                                            ID_NOTIFICADOR, 
                                            ID_BROKER, 
                                            ID_RFINAL,
                                            ID_MERCADO, 
                                            ID_AADUANA, 
                                            ID_AGCARGA, 
                                            ID_DFINAL, 
                                            ID_TRANSPORTE,
                                            ID_LCARGA,
                                            ID_LDESTINO, 
                                            ID_LAREA,
                                            ID_ACARGA, 
                                            ID_ADESTINO, 
                                            ID_NAVIERA,                                    
                                            ID_PCARGA, 
                                            ID_PDESTINO, 
                                            ID_FPAGO, 
                                            ID_CVENTA, 
                                            ID_MVENTA,
                                            ID_TCONTENEDOR, 
                                            ID_ATMOSFERA, 
                                            ID_TSERVICIO,
                                            ID_TFLETE,
                                            ID_SEGURO,
                                            ID_PAIS, 
                                            ID_EMPRESA,
                                            ID_TEMPORADA,                                            
                                            ID_USUARIOI, 
                                            ID_USUARIOM,  
                                            TOTAL_ENVASE_ICAGRA, 
                                            TOTAL_NETO_ICARGA, 
                                            TOTAL_BRUTO_ICARGA,
                                            TOTAL_US_ICARGA,
                                            INGRESO, 
                                            MODIFICACION,  
                                            ESTADO,
                                            ESTADO_ICARGA, 
                                            ESTADO_REGISTRO
                                        ) 
            VALUES
	       	    (  ?,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                 0, 0, 0, 0, SYSDATE(), SYSDATE(), 1, 2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('NUMERO_ICARGA'),
                        $ICARGA->__GET('FECHA_ICARGA'),
                        $ICARGA->__GET('BOOKING_ICARGA'),
                        $ICARGA->__GET('NREFERENCIA_ICARGA'),
                        $ICARGA->__GET('FECHAETD_ICARGA'),
                        $ICARGA->__GET('FECHAETA_ICARGA'),
                        $ICARGA->__GET('FECHAETAREAL_ICARGA'),
                        $ICARGA->__GET('FDA_ICARGA'),
                        $ICARGA->__GET('TEMBARQUE_ICARGA'),
                        $ICARGA->__GET('NCONTENEDOR_ICARGA'),
                        $ICARGA->__GET('CRT_ICARGA'),
                        $ICARGA->__GET('FECHASTACKING_ICARGA'),
                        $ICARGA->__GET('NVIAJE_ICARGA'),
                        $ICARGA->__GET('FUMIGADO_ICARGA'),
                        $ICARGA->__GET('T_ICARGA'),
                        $ICARGA->__GET('O2_ICARGA'),
                        $ICARGA->__GET('C02_ICARGA'),
                        $ICARGA->__GET('ALAMPA_ICARGA'),
                        $ICARGA->__GET('COSTO_FLETE_ICARGA'),
                        $ICARGA->__GET('DUS_ICARGA'),
                        $ICARGA->__GET('BOLAWBCRT_ICARGA'),
                        $ICARGA->__GET('NETO_ICARGA'),
                        $ICARGA->__GET('REBATE_ICARGA'),
                        $ICARGA->__GET('PUBLICA_ICARGA'),
                        $ICARGA->__GET('FECHA_CDOCUMENTAL_ICARGA'),
                        $ICARGA->__GET('OBSERVACION_ICARGA'),
                        $ICARGA->__GET('OBSERVACIONI_ICARGA'),
                        $ICARGA->__GET('NAVE_ICARGA'),
                        $ICARGA->__GET('ID_EXPPORTADORA'),
                        $ICARGA->__GET('ID_CONSIGNATARIO'),
                        $ICARGA->__GET('ID_EMISIONBL'),
                        $ICARGA->__GET('ID_NOTIFICADOR'),
                        $ICARGA->__GET('ID_BROKER'),
                        $ICARGA->__GET('ID_RFINAL'),
                        $ICARGA->__GET('ID_MERCADO'),
                        $ICARGA->__GET('ID_AADUANA'),
                        $ICARGA->__GET('ID_AGCARGA'),
                        $ICARGA->__GET('ID_DFINAL'),
                        $ICARGA->__GET('ID_TRANSPORTE'),
                        $ICARGA->__GET('ID_LCARGA'),
                        $ICARGA->__GET('ID_LDESTINO'),
                        $ICARGA->__GET('ID_LAREA'),
                        $ICARGA->__GET('ID_ACARGA'),
                        $ICARGA->__GET('ID_ADESTINO'),
                        $ICARGA->__GET('ID_NAVIERA'),
                        $ICARGA->__GET('ID_PCARGA'),
                        $ICARGA->__GET('ID_PDESTINO'),
                        $ICARGA->__GET('ID_FPAGO'),
                        $ICARGA->__GET('ID_CVENTA'),
                        $ICARGA->__GET('ID_MVENTA'),
                        $ICARGA->__GET('ID_TCONTENEDOR'),
                        $ICARGA->__GET('ID_ATMOSFERA'),
                        $ICARGA->__GET('ID_TSERVICIO'),
                        $ICARGA->__GET('ID_TFLETE'),
                        $ICARGA->__GET('ID_SEGURO'),
                        $ICARGA->__GET('ID_PAIS'),
                        $ICARGA->__GET('ID_EMPRESA'),
                        $ICARGA->__GET('ID_TEMPORADA'),
                        $ICARGA->__GET('ID_USUARIOI'),
                        $ICARGA->__GET('ID_USUARIOM')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarIcarga($id)
    {
        try {
            $sql = "DELETE FROM fruta_icarga WHERE ID_ICARGA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarIcarga(ICARGA $ICARGA)
    {
        if ($ICARGA->__GET('ID_CONSIGNATARIO') == NULL) {
            $ICARGA->__SET('ID_CONSIGNATARIO', NULL);
        }
        if ($ICARGA->__GET('ID_EMISIONBL') == NULL) {
            $ICARGA->__SET('ID_EMISIONBL', NULL);
        }
        if ($ICARGA->__GET('ID_EXPPORTADORA') == NULL) {
            $ICARGA->__SET('ID_EXPPORTADORA', NULL);
        }
        if ($ICARGA->__GET('ID_NOTIFICADOR') == NULL) {
            $ICARGA->__SET('ID_NOTIFICADOR', NULL);
        }
        if ($ICARGA->__GET('ID_BROKER') == NULL) {
            $ICARGA->__SET('ID_BROKER', NULL);
        }
        if ($ICARGA->__GET('ID_RFINAL') == NULL) {
            $ICARGA->__SET('ID_RFINAL', NULL);
        }
        if ($ICARGA->__GET('ID_MERCADO') == NULL) {
            $ICARGA->__SET('ID_MERCADO', NULL);
        }
        if ($ICARGA->__GET('ID_AADUANA') == NULL) {
            $ICARGA->__SET('ID_AADUANA', NULL);
        }
        if ($ICARGA->__GET('ID_AGCARGA') == NULL) {
            $ICARGA->__SET('ID_AGCARGA', NULL);
        }
        if ($ICARGA->__GET('ID_DFINAL') == NULL) {
            $ICARGA->__SET('ID_DFINAL', NULL);
        }
        if ($ICARGA->__GET('ID_TRANSPORTE') == NULL) {
            $ICARGA->__SET('ID_TRANSPORTE', NULL);
        }
        if ($ICARGA->__GET('ID_LCARGA') == NULL) {
            $ICARGA->__SET('ID_LCARGA', NULL);
        }
        if ($ICARGA->__GET('ID_LDESTINO') == NULL) {
            $ICARGA->__SET('ID_LDESTINO', NULL);
        }
        if ($ICARGA->__GET('ID_LAREA') == NULL) {
            $ICARGA->__SET('ID_LAREA', NULL);
        }
        if ($ICARGA->__GET('NAVE_ICARGA') == NULL) {
            $ICARGA->__SET('NAVE_ICARGA', NULL);
        }
        if ($ICARGA->__GET('ID_ACARGA') == NULL) {
            $ICARGA->__SET('ID_ACARGA', NULL);
        }
        if ($ICARGA->__GET('ID_ADESTINO') == NULL) {
            $ICARGA->__SET('ID_ADESTINO', NULL);
        }
        if ($ICARGA->__GET('ID_NAVIERA') == NULL) {
            $ICARGA->__SET('ID_NAVIERA', NULL);
        }
        if ($ICARGA->__GET('ID_PCARGA') == NULL) {
            $ICARGA->__SET('ID_PCARGA', NULL);
        }
        if ($ICARGA->__GET('ID_PDESTINO') == NULL) {
            $ICARGA->__SET('ID_PDESTINO', NULL);
        }
        if ($ICARGA->__GET('ID_FPAGO') == NULL) {
            $ICARGA->__SET('ID_FPAGO', NULL);
        }
        if ($ICARGA->__GET('ID_CVENTA') == NULL) {
            $ICARGA->__SET('ID_CVENTA', NULL);
        }
        if ($ICARGA->__GET('ID_MVENTA') == NULL) {
            $ICARGA->__SET('ID_MVENTA', NULL);
        }
        if ($ICARGA->__GET('ID_TCONTENEDOR') == NULL) {
            $ICARGA->__SET('ID_TCONTENEDOR', NULL);
        }
        if ($ICARGA->__GET('ID_ATMOSFERA') == NULL) {
            $ICARGA->__SET('ID_ATMOSFERA', NULL);
        }
        if ($ICARGA->__GET('ID_PAIS') == NULL) {
            $ICARGA->__SET('ID_PAIS', NULL);
        }
        if ($ICARGA->__GET('ID_TFLETE') == NULL) {
            $ICARGA->__SET('ID_TFLETE', NULL);
        }
        if ($ICARGA->__GET('FUMIGADO_ICARGA') == NULL) {
            $ICARGA->__SET('FUMIGADO_ICARGA', NULL);
        }
        if ($ICARGA->__GET('ID_SEGURO') == NULL) {
            $ICARGA->__SET('ID_SEGURO', NULL);
        }
        if ($ICARGA->__GET('FECHAETAREAL_ICARGA') == NULL) {
            $ICARGA->__SET('FECHAETAREAL_ICARGA', NULL);
        }
        if ($ICARGA->__GET('FECHA_CDOCUMENTAL_ICARGA') == NULL) {
            $ICARGA->__SET('FECHA_CDOCUMENTAL_ICARGA', NULL);
        }

        try {
            $query = "
		UPDATE fruta_icarga SET       
			MODIFICACION = SYSDATE(),     
            FECHA_ICARGA=  ?, 
            BOOKING_ICARGA = ?, 
            NREFERENCIA_ICARGA = ?, 
            FECHAETD_ICARGA = ?, 
            FECHAETA_ICARGA = ?, 
            FECHAETAREAL_ICARGA = ?, 
            FDA_ICARGA = ?, 
            TEMBARQUE_ICARGA = ?, 
            NCONTENEDOR_ICARGA = ?, 
            CRT_ICARGA = ?,
            FECHASTACKING_ICARGA = ?,
            NVIAJE_ICARGA = ?, 
            FUMIGADO_ICARGA = ?, 
            T_ICARGA = ?,
            O2_ICARGA = ?, 
            C02_ICARGA = ?, 
            ALAMPA_ICARGA = ?, 
            COSTO_FLETE_ICARGA = ?,
            DUS_ICARGA = ?, 
            BOLAWBCRT_ICARGA = ?, 
            NETO_ICARGA = ?, 
            REBATE_ICARGA = ?,
            PUBLICA_ICARGA = ?,
            FECHA_CDOCUMENTAL_ICARGA = ?, 
            OBSERVACION_ICARGA = ?, 
            OBSERVACIONI_ICARGA = ?, 
            NAVE_ICARGA = ?, 
            TOTAL_ENVASE_ICAGRA = ?, 
            TOTAL_NETO_ICARGA = ?, 
            TOTAL_BRUTO_ICARGA = ?,
            TOTAL_US_ICARGA = ?,   
            ID_EXPPORTADORA = ?, 
            ID_CONSIGNATARIO = ?, 
            ID_EMISIONBL = ?, 
            ID_NOTIFICADOR = ?, 
            ID_BROKER = ?, 
            ID_RFINAL = ?,
            ID_MERCADO = ?, 
            ID_AADUANA = ?, 
            ID_AGCARGA = ?, 
            ID_DFINAL = ?, 
            ID_TRANSPORTE = ?,
            ID_LCARGA = ?,
            ID_LDESTINO = ?, 
            ID_LAREA = ?,
            ID_ACARGA = ?, 
            ID_ADESTINO = ?, 
            ID_NAVIERA = ?,                                  
            ID_PCARGA = ?, 
            ID_PDESTINO = ?, 
            ID_FPAGO = ?, 
            ID_CVENTA = ?, 
            ID_MVENTA = ?,
            ID_TCONTENEDOR = ?, 
            ID_ATMOSFERA = ?, 
            ID_TSERVICIO = ?,
            ID_TFLETE = ?,
            ID_SEGURO = ?,
            ID_PAIS = ?, 
            ID_USUARIOM = ?  
		WHERE ID_ICARGA = ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('FECHA_ICARGA'),
                        $ICARGA->__GET('BOOKING_ICARGA'),
                        $ICARGA->__GET('NREFERENCIA_ICARGA'),
                        $ICARGA->__GET('FECHAETD_ICARGA'),
                        $ICARGA->__GET('FECHAETA_ICARGA'),
                        $ICARGA->__GET('FECHAETAREAL_ICARGA'),
                        $ICARGA->__GET('FDA_ICARGA'),
                        $ICARGA->__GET('TEMBARQUE_ICARGA'),
                        $ICARGA->__GET('NCONTENEDOR_ICARGA'),
                        $ICARGA->__GET('CRT_ICARGA'),
                        $ICARGA->__GET('FECHASTACKING_ICARGA'),
                        $ICARGA->__GET('NVIAJE_ICARGA'),
                        $ICARGA->__GET('FUMIGADO_ICARGA'),
                        $ICARGA->__GET('T_ICARGA'),
                        $ICARGA->__GET('O2_ICARGA'),
                        $ICARGA->__GET('C02_ICARGA'),
                        $ICARGA->__GET('ALAMPA_ICARGA'),
                        $ICARGA->__GET('COSTO_FLETE_ICARGA'),
                        $ICARGA->__GET('DUS_ICARGA'),
                        $ICARGA->__GET('BOLAWBCRT_ICARGA'),
                        $ICARGA->__GET('NETO_ICARGA'),
                        $ICARGA->__GET('REBATE_ICARGA'),
                        $ICARGA->__GET('PUBLICA_ICARGA'),
                        $ICARGA->__GET('FECHA_CDOCUMENTAL_ICARGA'),
                        $ICARGA->__GET('OBSERVACION_ICARGA'),
                        $ICARGA->__GET('OBSERVACIONI_ICARGA'),
                        $ICARGA->__GET('NAVE_ICARGA'),
                        $ICARGA->__GET('TOTAL_ENVASE_ICAGRA'),
                        $ICARGA->__GET('TOTAL_NETO_ICARGA'),
                        $ICARGA->__GET('TOTAL_BRUTO_ICARGA'),
                        $ICARGA->__GET('TOTAL_US_ICARGA'),
                        $ICARGA->__GET('ID_EXPPORTADORA'),
                        $ICARGA->__GET('ID_CONSIGNATARIO'),
                        $ICARGA->__GET('ID_EMISIONBL'),
                        $ICARGA->__GET('ID_NOTIFICADOR'),
                        $ICARGA->__GET('ID_BROKER'),
                        $ICARGA->__GET('ID_RFINAL'),
                        $ICARGA->__GET('ID_MERCADO'),
                        $ICARGA->__GET('ID_AADUANA'),
                        $ICARGA->__GET('ID_AGCARGA'),
                        $ICARGA->__GET('ID_DFINAL'),
                        $ICARGA->__GET('ID_TRANSPORTE'),
                        $ICARGA->__GET('ID_LCARGA'),
                        $ICARGA->__GET('ID_LDESTINO'),
                        $ICARGA->__GET('ID_LAREA'),
                        $ICARGA->__GET('ID_ACARGA'),
                        $ICARGA->__GET('ID_ADESTINO'),
                        $ICARGA->__GET('ID_NAVIERA'),
                        $ICARGA->__GET('ID_PCARGA'),
                        $ICARGA->__GET('ID_PDESTINO'),
                        $ICARGA->__GET('ID_FPAGO'),
                        $ICARGA->__GET('ID_CVENTA'),
                        $ICARGA->__GET('ID_MVENTA'),
                        $ICARGA->__GET('ID_TCONTENEDOR'),
                        $ICARGA->__GET('ID_ATMOSFERA'),
                        $ICARGA->__GET('ID_TSERVICIO'),
                        $ICARGA->__GET('ID_TFLETE'),
                        $ICARGA->__GET('ID_SEGURO'),
                        $ICARGA->__GET('ID_PAIS'),
                        $ICARGA->__GET('ID_USUARIOM'),
                        $ICARGA->__GET('ID_ICARGA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS 


    //LISTAS
    public function listarIcargaCerradoEmpresaTemporadaCBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,DATEDIFF( FECHAETA_ICARGA, FECHAETD_ICARGA) AS 'ESTIMADO',
                                                        DATEDIFF(CURDATE(), FECHAETD_ICARGA ) AS 'REAL',
                                                        FECHA_ICARGA AS 'FECHA', 
                                                        FECHA_CDOCUMENTAL_ICARGA AS 'FECHACORTEDOCUMENTAL', 
                                                        FECHAETD_ICARGA AS 'FECHAETD', 
                                                        FECHAETA_ICARGA AS 'FECHAETA', 
                                                        FECHAETAREAL_ICARGA AS 'FECHAETAREAL', 
                                                        
                                                        WEEK(FECHA_ICARGA,3) AS 'SEMANA', 
                                                        WEEK(FECHA_CDOCUMENTAL_ICARGA,3) AS 'SEMANACORTEDOCUMENTAL', 
                                                        WEEK(FECHAETD_ICARGA,3) AS 'SEMANAETD', 
                                                        WEEK(FECHAETA_ICARGA,3) AS 'SEMANAETA', 
                                                        WEEK(FECHAETAREAL_ICARGA,3) AS 'SEMANAETAREAL', 

                                                        WEEKOFYEAR(FECHA_ICARGA) AS 'SEMANAISO', 
                                                        WEEKOFYEAR(FECHA_CDOCUMENTAL_ICARGA) AS 'SEMANACORTEDOCUMENTALISO', 
                                                        WEEKOFYEAR(FECHAETD_ICARGA) AS 'SEMANAETDISO', 
                                                        WEEKOFYEAR(FECHAETA_ICARGA) AS 'SEMANAETAISO', 
                                                        WEEKOFYEAR(FECHAETAREAL_ICARGA) AS 'SEMANAETAREALISO', 

                                                        IFNULL(BOLAWBCRT_ICARGA, 'Sin Datos' ) AS 'BLAWB',
                                                        IFNULL(TOTAL_ENVASE_ICAGRA,0) AS 'ENVASE',
                                                        IFNULL(TOTAL_NETO_ICARGA,0) AS 'NETO',
                                                        IFNULL(TOTAL_BRUTO_ICARGA,0) AS 'BRUTO',
                                                        IFNULL(TOTAL_US_ICARGA,0) AS 'US'
                                            FROM fruta_icarga  
                                            WHERE ESTADO_REGISTRO = 1     
                                            AND ESTADO = 0                                                                                                   
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            
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
    public function listarIcargaEmpresaTemporadaCBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,DATEDIFF( FECHAETA_ICARGA, FECHAETD_ICARGA) AS 'ESTIMADO',
                                                        DATEDIFF(CURDATE(), FECHAETD_ICARGA ) AS 'REAL',
                                                        FECHA_ICARGA AS 'FECHA', 
                                                        FECHA_CDOCUMENTAL_ICARGA AS 'FECHACORTEDOCUMENTAL', 
                                                        FECHAETD_ICARGA AS 'FECHAETD', 
                                                        FECHAETA_ICARGA AS 'FECHAETA', 
                                                        FECHAETAREAL_ICARGA AS 'FECHAETAREAL', 
                                                        
                                                        WEEK(FECHA_ICARGA,3) AS 'SEMANA', 
                                                        WEEK(FECHA_CDOCUMENTAL_ICARGA,3) AS 'SEMANACORTEDOCUMENTAL', 
                                                        WEEK(FECHAETD_ICARGA,3) AS 'SEMANAETD', 
                                                        WEEK(FECHAETA_ICARGA,3) AS 'SEMANAETA', 
                                                        WEEK(FECHAETAREAL_ICARGA,3) AS 'SEMANAETAREAL', 

                                                        WEEKOFYEAR(FECHA_ICARGA) AS 'SEMANAISO', 
                                                        WEEKOFYEAR(FECHA_CDOCUMENTAL_ICARGA) AS 'SEMANACORTEDOCUMENTALISO', 
                                                        WEEKOFYEAR(FECHAETD_ICARGA) AS 'SEMANAETDISO', 
                                                        WEEKOFYEAR(FECHAETA_ICARGA) AS 'SEMANAETAISO', 
                                                        WEEKOFYEAR(FECHAETAREAL_ICARGA) AS 'SEMANAETAREALISO', 

                                                        IFNULL(BOLAWBCRT_ICARGA, 'Sin Datos' ) AS 'BLAWB',
                                                        IFNULL(TOTAL_ENVASE_ICAGRA,0) AS 'ENVASE',
                                                        IFNULL(TOTAL_NETO_ICARGA,0) AS 'NETO',
                                                        IFNULL(TOTAL_BRUTO_ICARGA,0) AS 'BRUTO',
                                                        IFNULL(TOTAL_US_ICARGA,0) AS 'US',
                                                        ID_ICARGA,
														(select COUNT(ID_EXIEXPORTACION) FROM fruta_exiexportacion WHERE ESTADO = 2 AND REFERENCIA = fruta_icarga.ID_ICARGA)AS N_FOLIOS
                                            FROM fruta_icarga  
                                            WHERE ESTADO_REGISTRO = 1                                                                                                        
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            
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
    public function listarIcargaEmpresaTemporada2CBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,DATEDIFF( FECHAETA_ICARGA, FECHAETD_ICARGA) AS 'ESTIMADO',
                                                        DATEDIFF(CURDATE(), FECHAETD_ICARGA ) AS 'REAL',
                                                        DATE_FORMAT(FECHA_ICARGA, '%d-%m-%Y') AS 'FECHA', 
                                                        DATE_FORMAT(FECHAETD_ICARGA, '%d-%m-%Y') AS 'FECHAETD', 
                                                        DATE_FORMAT(FECHAETA_ICARGA, '%d-%m-%Y') AS 'FECHAETA', 
                                                        IFNULL(BOLAWBCRT_ICARGA, 'Sin Datos' ) AS 'CONTENEDOR',
                                                        FORMAT(IFNULL(TOTAL_ENVASE_ICAGRA,0),0,'de_DE') AS 'ENVASE',
                                                        FORMAT(IFNULL(TOTAL_NETO_ICARGA,0),2,'de_DE') AS 'NETO',
                                                        FORMAT(IFNULL(TOTAL_BRUTO_ICARGA,0),2,'de_DE') AS 'BRUTO',
                                                        FORMAT(IFNULL(TOTAL_US_ICARGA,0),0,'de_DE') AS 'US'
                                            FROM fruta_icarga  
                                            WHERE ESTADO_REGISTRO = 1                                                                                                        
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                            
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
    public function listarIcargaConfirmadoCBX($IDEMPRESA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATEDIFF( FECHAETA_ICARGA, FECHAETD_ICARGA) AS 'ESTIMADO',
                                                       DATEDIFF(CURDATE(), FECHAETD_ICARGA ) AS 'REAL'
                                            FROM fruta_icarga  
                                            WHERE ESTADO_REGISTRO = 1
                                            AND  ESTADO_ICARGA = 2
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'
                                            AND ID_TEMPORADA = '" . $IDTEMPORADA . "' ; ");
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
    
    public function listarIcargaDespachadoCBX($IDEMPRESA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATEDIFF( FECHAETA_ICARGA, FECHAETD_ICARGA) AS 'ESTIMADO',
                                                       DATEDIFF(CURDATE(), FECHAETD_ICARGA ) AS 'REAL'
                                            FROM fruta_icarga  
                                            WHERE ESTADO_REGISTRO = 1
                                            AND  ESTADO_ICARGA = 3
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'
                                            AND ID_TEMPORADA = '" . $IDTEMPORADA . "' ; ");
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
    
    public function listarIcargaDespachadoNoLiquidacionCBX($IDEMPRESA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATEDIFF( FECHAETA_ICARGA, FECHAETD_ICARGA) AS 'ESTIMADO',
                                                       DATEDIFF(CURDATE(), FECHAETD_ICARGA ) AS 'REAL'
                                            FROM fruta_icarga  
                                            WHERE ESTADO_REGISTRO = 1
                                            AND  ESTADO_ICARGA = 3
                                            AND  LIQUIDACION IS NULL
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'
                                            AND ID_TEMPORADA = '" . $IDTEMPORADA . "' ; ");
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
    
    public function listarIcargaDespachadoNoPagoCBX($IDEMPRESA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATEDIFF( FECHAETA_ICARGA, FECHAETD_ICARGA) AS 'ESTIMADO',
                                                       DATEDIFF(CURDATE(), FECHAETD_ICARGA ) AS 'REAL'
                                            FROM fruta_icarga  
                                            WHERE ESTADO_REGISTRO = 1
                                            AND  ESTADO_ICARGA = 3
                                            AND  PAGO IS NULL
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'
                                            AND ID_TEMPORADA = '" . $IDTEMPORADA . "' ; ");
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
    public function listarIcargaTomadoCBX($IDEMPRESA, $IDTEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATEDIFF( FECHAETA_ICARGA, FECHAETD_ICARGA) AS 'ESTIMADO',
                                                       DATEDIFF(CURDATE(), FECHAETD_ICARGA ) AS 'REAL'
                                            FROM fruta_icarga  
                                            WHERE ESTADO_REGISTRO = 1
                                            AND  ESTADO_ICARGA > 2 
                                            AND ID_EMPRESA = '" . $IDEMPRESA . "'
                                            AND ID_TEMPORADA = '" . $IDTEMPORADA . "' ; ");
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



    public function obtenerTotalesEmpresaTemporada($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(TOTAL_ENVASE_ICAGRA),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(SUM(TOTAL_NETO_ICARGA),0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(SUM(TOTAL_BRUTO_ICARGA),0),2,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(SUM(TOTAL_US_ICARGA),0),0,'de_DE') AS 'US'
                                             FROM fruta_icarga
                                             WHERE  ESTADO_REGISTRO = 1 
                                              AND ID_EMPRESA = '" . $EMPRESA . "' 
                                              AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
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



    //CAMBIAR ESTADOS

    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(ICARGA $ICARGA)
    {

        try {
            $query = "
		UPDATE fruta_icarga SET			
            MODIFICACION = SYSDATE(),     
            ESTADO_REGISTRO = 0
		WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(ICARGA $ICARGA)
    {

        try {
            $query = "
		UPDATE fruta_icarga SET		
            MODIFICACION = SYSDATE(),     	
            ESTADO_REGISTRO = 1
		WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function abierto(ICARGA $ICARGA)
    {

        try {
            $query = "
		UPDATE fruta_icarga SET	
            MODIFICACION = SYSDATE(),     		
            ESTADO = 1
		WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function cerrrado(ICARGA $ICARGA)
    {

        try {
            $query = "
		UPDATE fruta_icarga SET	
            MODIFICACION = SYSDATE(),     		
            ESTADO = 0
		WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A CERRADO
    public function Eliminado(ICARGA $ICARGA)
    {

        try {
            $query = "
		UPDATE fruta_icarga SET	
            MODIFICACION = SYSDATE(),     		
            ESTADO_ICARGA = 0
		WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function creado(ICARGA $ICARGA)
    {

        try {
            $query = "
		UPDATE fruta_icarga SET		
            MODIFICACION = SYSDATE(),     	
            ESTADO_ICARGA = 1
		WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function PorCargar(ICARGA $ICARGA)
    {
        try {
            $query = "
		UPDATE fruta_icarga SET
            MODIFICACION = SYSDATE(),     			
            ESTADO_ICARGA = 2
		WHERE ID_ICARGA= ? AND ESTADO_ICARGA < 3;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Cargado(ICARGA $ICARGA)
    {
        try {
            $query = "
		UPDATE fruta_icarga SET	
            MODIFICACION = SYSDATE(),     		
            ESTADO_ICARGA = 3
		WHERE ID_ICARGA= ?   ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Arrivado(ICARGA $ICARGA)
    {
        try {
            $query = "
		UPDATE fruta_icarga SET	
            MODIFICACION = SYSDATE(),     		
            ESTADO_ICARGA = 4
		WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Cancelado(ICARGA $ICARGA)
    {
        try {
            $query = "
		UPDATE fruta_icarga SET	
            MODIFICACION = SYSDATE(),     		
            ESTADO_ICARGA = 5
		WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    
    public function CargadoCerrado(ICARGA $ICARGA)
    {
        try {
            $query = "
		UPDATE fruta_icarga SET	
            MODIFICACION = SYSDATE(),    
            ID_USUARIOM = ?  , 		
            ESTADO_ICARGA = 3
		WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_USUARIOM'),
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function liquidacion(ICARGA $ICARGA)
    {

        try {
            $query = "
            UPDATE fruta_icarga SET			
                MODIFICACION = SYSDATE(),     
                LIQUIDACION = 1
            WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
    public function pago(ICARGA $ICARGA)
    {

        try {
            $query = "
            UPDATE fruta_icarga SET			
                MODIFICACION = SYSDATE(),     
                PAGO = 1
            WHERE ID_ICARGA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $ICARGA->__GET('ID_ICARGA')
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



    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHAICARGA,  $OBSERVACIONICARGA, $EMPRESA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                            FROM fruta_icarga
                                            WHERE 
                                                 FECHA_ICARGA LIKE '" . $FECHAICARGA . "'           
                                                 AND OBSERVACION_ICARGA LIKE '" . $OBSERVACIONICARGA . "' 
                                                 AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                                 AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')
                                                 AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                 AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                                 ORDER BY ID_ICARGA DESC
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


    public function obtenerNumero($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_ICARGA,0)) AS 'NUMERO'
                                                FROM fruta_icarga
                                                WHERE  
                                                    ID_EMPRESA = '" . $EMPRESA . "' 
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

    static public function getInstructivoCarga($id){
        $instructivoCarga = ICARGA::mdlGetInstructivoCarga($id);
        return $instructivoCarga;
    }
}
