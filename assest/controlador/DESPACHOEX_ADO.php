<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/DESPACHOEX.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class DESPACHOEX_ADO
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
    public function listarDespachoex()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_despachoex limit 6;	");
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
    public function listarDespachoexCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_despachoex ;	");
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
    public function listarDespachoexCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                               FROM fruta_despachoex ;	");
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
    public function verDespachoex($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                             DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                             DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                             FROM fruta_despachoex WHERE ID_DESPACHOEX= '" . $ID . "';");
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
    public function verDespachoex2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                     FECHA_DESPACHOEX AS 'FECHA' ,
                                                     FECHAETA_DESPACHOEX AS 'ETA' ,
                                                     FECHAETD_DESPACHOEX AS 'ETD' ,
                                                     FORMAT(NUMERO_GUIA_DESPACHOEX,0,'de_DE') AS 'TOTAL_GUIA'  
                                            FROM fruta_despachoex
                                            WHERE ID_DESPACHOEX= '" . $ID . "'");
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


    public function verDespachoex3($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION' , 
                                                DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y') AS 'FECHA' ,
                                                DATE_FORMAT(FECHA_GUIA_DESPACHOEX, '%d-%m-%Y') AS 'GUIA',
                                                DATE_FORMAT(FECHAETA_DESPACHOEX, '%d-%m-%Y') AS 'ETA' ,
                                                DATE_FORMAT(FECHAETD_DESPACHOEX, '%d-%m-%Y') AS 'ETD' 
                                            FROM fruta_despachoex
                                            WHERE ID_DESPACHOEX= '" . $ID . "';");
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

    public function verDespachoexCsv($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                     DATE_FORMAT(FECHA_DESPACHOEX, '%Y%m%d') AS 'FECHA' 
                                            FROM fruta_despachoex
                                            WHERE ID_DESPACHOEX= '" . $ID . "';");
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
    public function buscarNombreDespachoex($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_despachoex WHERE OBSERVACION_DESPACHOEX LIKE '%" . $NOMBRE . "%';");
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
    public function agregarDespachoex(DESPACHOEX $DESPACHOEX)
    {
        try {

            if ($DESPACHOEX->__GET('ID_ICARGA') == NULL) {
                $DESPACHOEX->__SET('ID_ICARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_INPECTOR') == NULL) {
                $DESPACHOEX->__SET('ID_INPECTOR', NULL);
            }
            if ($DESPACHOEX->__GET('ID_DFINAL') == NULL) {
                $DESPACHOEX->__SET('ID_DFINAL', NULL);
            }
            if ($DESPACHOEX->__GET('ID_EXPPORTADORA') == NULL) {
                $DESPACHOEX->__SET('ID_EXPPORTADORA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_RFINAL') == NULL) {
                $DESPACHOEX->__SET('ID_RFINAL', NULL);
            }
            if ($DESPACHOEX->__GET('ID_AGCARGA') == NULL) {
                $DESPACHOEX->__SET('ID_AGCARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_MERCADO') == NULL) {
                $DESPACHOEX->__SET('ID_MERCADO', NULL);
            }
            if ($DESPACHOEX->__GET('ID_PAIS') == NULL) {
                $DESPACHOEX->__SET('ID_PAIS', NULL);
            }
            if ($DESPACHOEX->__GET('ID_TRANSPORTE2') == NULL) {
                $DESPACHOEX->__SET('ID_TRANSPORTE2', NULL);
            }
            if ($DESPACHOEX->__GET('ID_LCARGA') == NULL) {
                $DESPACHOEX->__SET('ID_LCARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_LDESTINO') == NULL) {
                $DESPACHOEX->__SET('ID_LDESTINO', NULL);
            }
            if ($DESPACHOEX->__GET('ID_LAREA') == NULL) {
                $DESPACHOEX->__SET('ID_LAREA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_ACARGA') == NULL) {
                $DESPACHOEX->__SET('ID_ACARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_ADESTINO') == NULL) {
                $DESPACHOEX->__SET('ID_ADESTINO', NULL);
            }
            if ($DESPACHOEX->__GET('ID_NAVIERA') == NULL) {
                $DESPACHOEX->__SET('ID_NAVIERA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_PCARGA') == NULL) {
                $DESPACHOEX->__SET('ID_PCARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_PDESTINO') == NULL) {
                $DESPACHOEX->__SET('ID_PDESTINO', NULL);
            }

            $query =
                "INSERT INTO fruta_despachoex (    

                                                    NUMERO_DESPACHOEX, 
                                                    FECHA_DESPACHOEX, 
                                                    SNICARGA,                                                     
                                                    NUMERO_SELLO_DESPACHOEX, 
                                                    FECHA_GUIA_DESPACHOEX, 
                                                    NUMERO_GUIA_DESPACHOEX, 
                                                    NUMERO_CONTENEDOR_DESPACHOEX, 
                                                    NUMERO_PLANILLA_DESPACHOEX, 
                                                    TERMOGRAFO_DESPACHOEX, 
                                                    VGM, 
                                                    TEMBARQUE_DESPACHOEX, 
                                                    BOOKING_DESPACHOEX,  
                                                    FECHAETD_DESPACHOEX, 
                                                    FECHAETA_DESPACHOEX, 
                                                    CRT_DESPACHOEX, 
                                                    FECHASTACKING_DESPACHOEX, 
                                                    NVIAJE_DESPACHOEX, 
                                                    NAVE_DESPACHOEX, 
                                                    PATENTE_CAMION, 
                                                    PATENTE_CARRO, 
                                                    OBSERVACION_DESPACHOEX, 
                                                    TINPUSDA, 
                                                    ID_ICARGA, 
                                                    ID_EXPPORTADORA, 
                                                    ID_DFINAL, 
                                                    ID_AGCARGA, 
                                                    ID_INPECTOR, 
                                                    ID_RFINAL, 
                                                    ID_MERCADO, 
                                                    ID_PAIS, 
                                                    ID_TRANSPORTE2,                                                     
                                                    ID_LCARGA, 
                                                    ID_LDESTINO, 
                                                    ID_LAREA,                                                                                              
                                                    ID_ACARGA, 
                                                    ID_ADESTINO, 
                                                    ID_NAVIERA,                                                                        
                                                    ID_PCARGA, 
                                                    ID_PDESTINO, 
                                                    ID_TRANSPORTE, 
                                                    ID_CONDUCTOR, 
                                                    ID_CONTRAPARTE, 
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA, 
                                                    ID_USUARIOI, 
                                                    ID_USUARIOM,              
                                                    CANTIDAD_ENVASE_DESPACHOEX, 
                                                    KILOS_NETO_DESPACHOEX,
                                                    KILOS_BRUTO_DESPACHOEX,  
                                                    INGRESO, 
                                                    MODIFICACION, 
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                )
             VALUES
               ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  0, 0, 0, SYSDATE(),  SYSDATE(),  1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOEX->__GET('NUMERO_DESPACHOEX'),
                        $DESPACHOEX->__GET('FECHA_DESPACHOEX'),
                        $DESPACHOEX->__GET('SNICARGA'),
                        $DESPACHOEX->__GET('NUMERO_SELLO_DESPACHOEX'),
                        $DESPACHOEX->__GET('FECHA_GUIA_DESPACHOEX'),
                        $DESPACHOEX->__GET('NUMERO_GUIA_DESPACHOEX'),
                        $DESPACHOEX->__GET('NUMERO_CONTENEDOR_DESPACHOEX'),
                        $DESPACHOEX->__GET('NUMERO_PLANILLA_DESPACHOEX'),
                        $DESPACHOEX->__GET('TERMOGRAFO_DESPACHOEX'),
                        $DESPACHOEX->__GET('VGM'),
                        $DESPACHOEX->__GET('TEMBARQUE_DESPACHOEX'),
                        $DESPACHOEX->__GET('BOOKING_DESPACHOEX'),
                        $DESPACHOEX->__GET('FECHAETD_DESPACHOEX'),
                        $DESPACHOEX->__GET('FECHAETA_DESPACHOEX'),
                        $DESPACHOEX->__GET('CRT_DESPACHOEX'),
                        $DESPACHOEX->__GET('FECHASTACKING_DESPACHOEX'),
                        $DESPACHOEX->__GET('NVIAJE_DESPACHOEX'),
                        $DESPACHOEX->__GET('NAVE_DESPACHOEX'),
                        $DESPACHOEX->__GET('PATENTE_CAMION'),
                        $DESPACHOEX->__GET('PATENTE_CARRO'),
                        $DESPACHOEX->__GET('OBSERVACION_DESPACHOEX'),
                        $DESPACHOEX->__GET('TINPUSDA'),
                        $DESPACHOEX->__GET('ID_ICARGA'),
                        $DESPACHOEX->__GET('ID_EXPPORTADORA'),
                        $DESPACHOEX->__GET('ID_DFINAL'),
                        $DESPACHOEX->__GET('ID_AGCARGA'),
                        $DESPACHOEX->__GET('ID_INPECTOR'),
                        $DESPACHOEX->__GET('ID_RFINAL'),
                        $DESPACHOEX->__GET('ID_MERCADO'),
                        $DESPACHOEX->__GET('ID_PAIS'),
                        $DESPACHOEX->__GET('ID_TRANSPORTE2'),
                        $DESPACHOEX->__GET('ID_LCARGA'),
                        $DESPACHOEX->__GET('ID_LDESTINO'),
                        $DESPACHOEX->__GET('ID_LAREA'),
                        $DESPACHOEX->__GET('ID_ACARGA'),
                        $DESPACHOEX->__GET('ID_ADESTINO'),
                        $DESPACHOEX->__GET('ID_NAVIERA'),
                        $DESPACHOEX->__GET('ID_PCARGA'),
                        $DESPACHOEX->__GET('ID_PDESTINO'),
                        $DESPACHOEX->__GET('ID_TRANSPORTE'),
                        $DESPACHOEX->__GET('ID_CONDUCTOR'),
                        $DESPACHOEX->__GET('ID_CONTRAPARTE'),
                        $DESPACHOEX->__GET('ID_EMPRESA'),
                        $DESPACHOEX->__GET('ID_PLANTA'),
                        $DESPACHOEX->__GET('ID_TEMPORADA'),
                        $DESPACHOEX->__GET('ID_USUARIOI'),
                        $DESPACHOEX->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarDespachoex($id)
    {
        try {
            $sql = "DELETE FROM fruta_despachoex WHERE ID_DESPACHOEX=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachoex(DESPACHOEX $DESPACHOEX)
    {
        try {


            if ($DESPACHOEX->__GET('ID_ICARGA') == NULL) {
                $DESPACHOEX->__SET('ID_ICARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_INPECTOR') == NULL) {
                $DESPACHOEX->__SET('ID_INPECTOR', NULL);
            }
            if ($DESPACHOEX->__GET('ID_DFINAL') == NULL) {
                $DESPACHOEX->__SET('ID_DFINAL', NULL);
            }
            if ($DESPACHOEX->__GET('ID_EXPPORTADORA') == NULL) {
                $DESPACHOEX->__SET('ID_EXPPORTADORA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_RFINAL') == NULL) {
                $DESPACHOEX->__SET('ID_RFINAL', NULL);
            }
            if ($DESPACHOEX->__GET('ID_AGCARGA') == NULL) {
                $DESPACHOEX->__SET('ID_AGCARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_MERCADO') == NULL) {
                $DESPACHOEX->__SET('ID_MERCADO', NULL);
            }
            if ($DESPACHOEX->__GET('ID_PAIS') == NULL) {
                $DESPACHOEX->__SET('ID_PAIS', NULL);
            }
            if ($DESPACHOEX->__GET('ID_TRANSPORTE2') == NULL) {
                $DESPACHOEX->__SET('ID_TRANSPORTE2', NULL);
            }
            if ($DESPACHOEX->__GET('ID_LCARGA') == NULL) {
                $DESPACHOEX->__SET('ID_LCARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_LDESTINO') == NULL) {
                $DESPACHOEX->__SET('ID_LDESTINO', NULL);
            }
            if ($DESPACHOEX->__GET('ID_LAREA') == NULL) {
                $DESPACHOEX->__SET('ID_LAREA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_ACARGA') == NULL) {
                $DESPACHOEX->__SET('ID_ACARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_ADESTINO') == NULL) {
                $DESPACHOEX->__SET('ID_ADESTINO', NULL);
            }
            if ($DESPACHOEX->__GET('ID_NAVIERA') == NULL) {
                $DESPACHOEX->__SET('ID_NAVIERA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_PCARGA') == NULL) {
                $DESPACHOEX->__SET('ID_PCARGA', NULL);
            }
            if ($DESPACHOEX->__GET('ID_PDESTINO') == NULL) {
                $DESPACHOEX->__SET('ID_PDESTINO', NULL);
            }



            $query = "
                    UPDATE fruta_despachoex SET
                        MODIFICACION = SYSDATE(),                            
                        FECHA_DESPACHOEX = ?,
                        NUMERO_SELLO_DESPACHOEX = ?,
                        FECHA_GUIA_DESPACHOEX = ?,
                        NUMERO_GUIA_DESPACHOEX = ?,
                        NUMERO_CONTENEDOR_DESPACHOEX = ?,
                        NUMERO_PLANILLA_DESPACHOEX = ?,
                        TERMOGRAFO_DESPACHOEX = ?,
                        VGM = ?,
                        TEMBARQUE_DESPACHOEX = ?,
                        BOOKING_DESPACHOEX = ?,
                        FECHAETD_DESPACHOEX = ?,
                        FECHAETA_DESPACHOEX = ?,
                        CRT_DESPACHOEX = ?,
                        FECHASTACKING_DESPACHOEX = ?,
                        NVIAJE_DESPACHOEX = ?,
                        NAVE_DESPACHOEX = ?,
                        PATENTE_CAMION = ?,
                        PATENTE_CARRO = ?,
                        OBSERVACION_DESPACHOEX = ?,
                        TINPUSDA = ?,
                        CANTIDAD_ENVASE_DESPACHOEX = ?,
                        KILOS_NETO_DESPACHOEX = ?,
                        KILOS_BRUTO_DESPACHOEX = ?,          
                        ID_ICARGA = ?,
                        ID_EXPPORTADORA = ?,
                        ID_DFINAL = ?,
                        ID_AGCARGA = ?,
                        ID_INPECTOR = ?,
                        ID_RFINAL = ?,
                        ID_MERCADO = ?,
                        ID_PAIS = ?,
                        ID_TRANSPORTE2 = ?,
                        ID_LCARGA = ?,
                        ID_LDESTINO = ?,
                        ID_LAREA = ?,
                        ID_ACARGA = ?,
                        ID_ADESTINO = ?,
                        ID_NAVIERA = ?,
                        ID_PCARGA = ?,
                        ID_PDESTINO = ?,
                        ID_TRANSPORTE = ?, 
                        ID_CONDUCTOR = ?,
                        ID_CONTRAPARTE = ?, 
                        ID_USUARIOM = ?
                    WHERE ID_DESPACHOEX= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOEX->__GET('FECHA_DESPACHOEX'),
                        $DESPACHOEX->__GET('NUMERO_SELLO_DESPACHOEX'),
                        $DESPACHOEX->__GET('FECHA_GUIA_DESPACHOEX'),
                        $DESPACHOEX->__GET('NUMERO_GUIA_DESPACHOEX'),
                        $DESPACHOEX->__GET('NUMERO_CONTENEDOR_DESPACHOEX'),
                        $DESPACHOEX->__GET('NUMERO_PLANILLA_DESPACHOEX'),
                        $DESPACHOEX->__GET('TERMOGRAFO_DESPACHOEX'),
                        $DESPACHOEX->__GET('VGM'),
                        $DESPACHOEX->__GET('TEMBARQUE_DESPACHOEX'),
                        $DESPACHOEX->__GET('BOOKING_DESPACHOEX'),
                        $DESPACHOEX->__GET('FECHAETD_DESPACHOEX'),
                        $DESPACHOEX->__GET('FECHAETA_DESPACHOEX'),
                        $DESPACHOEX->__GET('CRT_DESPACHOEX'),
                        $DESPACHOEX->__GET('FECHASTACKING_DESPACHOEX'),
                        $DESPACHOEX->__GET('NVIAJE_DESPACHOEX'),
                        $DESPACHOEX->__GET('NAVE_DESPACHOEX'),
                        $DESPACHOEX->__GET('PATENTE_CAMION'),
                        $DESPACHOEX->__GET('PATENTE_CARRO'),
                        $DESPACHOEX->__GET('OBSERVACION_DESPACHOEX'),
                        $DESPACHOEX->__GET('TINPUSDA'),
                        $DESPACHOEX->__GET('CANTIDAD_ENVASE_DESPACHOEX'),
                        $DESPACHOEX->__GET('KILOS_NETO_DESPACHOEX'),
                        $DESPACHOEX->__GET('KILOS_BRUTO_DESPACHOEX'),     
                        $DESPACHOEX->__GET('ID_ICARGA'),
                        $DESPACHOEX->__GET('ID_EXPPORTADORA'),
                        $DESPACHOEX->__GET('ID_DFINAL'),
                        $DESPACHOEX->__GET('ID_AGCARGA'),
                        $DESPACHOEX->__GET('ID_INPECTOR'),
                        $DESPACHOEX->__GET('ID_RFINAL'),
                        $DESPACHOEX->__GET('ID_MERCADO'),
                        $DESPACHOEX->__GET('ID_PAIS'),
                        $DESPACHOEX->__GET('ID_TRANSPORTE2'),
                        $DESPACHOEX->__GET('ID_LCARGA'),
                        $DESPACHOEX->__GET('ID_LDESTINO'),
                        $DESPACHOEX->__GET('ID_LAREA'),
                        $DESPACHOEX->__GET('ID_ACARGA'),
                        $DESPACHOEX->__GET('ID_ADESTINO'),
                        $DESPACHOEX->__GET('ID_NAVIERA'),
                        $DESPACHOEX->__GET('ID_PCARGA'),
                        $DESPACHOEX->__GET('ID_PDESTINO'),
                        $DESPACHOEX->__GET('ID_TRANSPORTE'),
                        $DESPACHOEX->__GET('ID_CONDUCTOR'),
                        $DESPACHOEX->__GET('ID_CONTRAPARTE'),
                        $DESPACHOEX->__GET('ID_USUARIOM'),
                        $DESPACHOEX->__GET('ID_DESPACHOEX')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //FUNCIONES ESPECIALIZADAS 

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachoExistenciaExportacion(DESPACHOEX $DESPACHOEX)
    {
        try {
            $query = "
    UPDATE fruta_despachoex SET
        CANTIDAD_ENVASE_DESPACHOEX= ?,
        KILOS_NETO_DESPACHOEX= ?,
        MODIFICACION = SYSDATE()        
    WHERE ID_DESPACHOEX= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOEX->__GET('CANTIDAD_ENVASE_DESPACHOEX'),
                        $DESPACHOEX->__GET('KILOS_NETO_DESPACHOEX'),
                        $DESPACHOEX->__GET('ID_DESPACHOEX')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarDespachoQuitarExistenciaExportacion(DESPACHOEX $DESPACHOEX)
    {
        try {
            $query = "
    UPDATE fruta_despachoex SET
        CANTIDAD_ENVASE_DESPACHOEX= ?,
        KILOS_NETO_DESPACHOEX= ?,
        MODIFICACION = SYSDATE()        
    WHERE ID_DESPACHOEX= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOEX->__GET('CANTIDAD_ENVASE_PCDESPACHO'),
                        $DESPACHOEX->__GET('KILOS_NETO_DESPACHOEX'),
                        $DESPACHOEX->__GET('ID_DESPACHOEX')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    //LISTAR
    public function listarDespachoexCerradoEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * ,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' , 
                                                    FECHA_DESPACHOEX  AS 'FECHA' ,
                                                    FECHA_GUIA_DESPACHOEX  AS 'GUIA',
                                                    FECHAETA_DESPACHOEX  AS 'ETA' ,
                                                    FECHAETD_DESPACHOEX  AS 'ETD',


                                                    WEEK(FECHA_DESPACHOEX,3) AS 'SEMANA',
                                                    WEEK(FECHA_GUIA_DESPACHOEX,3) AS 'SEMANAGUIA',
                                                    WEEKOFYEAR(FECHA_DESPACHOEX) AS 'SEMANAISO',  
                                                    WEEKOFYEAR(FECHA_GUIA_DESPACHOEX) AS 'SEMANAGUIAISO',  

                                                    IFNULL(CANTIDAD_ENVASE_DESPACHOEX,0)  AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_DESPACHOEX,0)  AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_DESPACHOEX,0)  AS 'BRUTO'
                                                FROM fruta_despachoex                                                                           
                                                WHERE ESTADO_REGISTRO = 1        
                                                AND ESTADO = 0                                                                                                
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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

    public function listarDespachoexEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * ,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' , 
                                                    FECHA_DESPACHOEX  AS 'FECHA' ,
                                                    FECHA_GUIA_DESPACHOEX  AS 'GUIA',
                                                    FECHAETA_DESPACHOEX  AS 'ETA' ,
                                                    FECHAETD_DESPACHOEX  AS 'ETD',


                                                    WEEK(FECHA_DESPACHOEX,3) AS 'SEMANA',
                                                    WEEK(FECHA_GUIA_DESPACHOEX,3) AS 'SEMANAGUIA',
                                                    WEEKOFYEAR(FECHA_DESPACHOEX) AS 'SEMANAISO',  
                                                    WEEKOFYEAR(FECHA_GUIA_DESPACHOEX) AS 'SEMANAGUIAISO',  

                                                    IFNULL(CANTIDAD_ENVASE_DESPACHOEX,0)  AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_DESPACHOEX,0)  AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_DESPACHOEX,0)  AS 'BRUTO'
                                                FROM fruta_despachoex                                                                           
                                                WHERE ESTADO_REGISTRO = 1                                                                                                        
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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

    public function listarDespachoexEmpresaPlantaTemporada2CBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * ,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' , 
                                                    FECHA_DESPACHOEX AS 'FECHA' ,
                                                    FECHA_GUIA_DESPACHOEX  AS 'GUIA',
                                                    FECHAETA_DESPACHOEX  AS 'ETA' ,
                                                    FECHAETD_DESPACHOEX  AS 'ETD',
                                                    FORMAT(CANTIDAD_ENVASE_DESPACHOEX,0,'de_DE')  AS 'ENVASE',
                                                    FORMAT(KILOS_NETO_DESPACHOEX,2,'de_DE')  AS 'NETO',
                                                    FORMAT(KILOS_BRUTO_DESPACHOEX,2,'de_DE')  AS 'BRUTO'
                                                FROM fruta_despachoex                                                                           
                                                WHERE ESTADO_REGISTRO = 1                                                                                                        
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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
    
    public function listarDespachoexTemporadaCBX( $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * ,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' , 
                                                    FECHA_DESPACHOEX AS 'FECHA' ,
                                                    FECHA_GUIA_DESPACHOEX AS 'GUIA',
                                                    FECHAETA_DESPACHOEX AS 'ETA' ,
                                                    FECHAETD_DESPACHOEX AS 'ETD',
                                                    
                                                    WEEK(FECHA_DESPACHOEX,3) AS 'SEMANA',
                                                    WEEK(FECHA_GUIA_DESPACHOEX,3) AS 'SEMANAGUIA',
                                                    WEEKOFYEAR(FECHA_DESPACHOEX) AS 'SEMANAISO',  
                                                    WEEKOFYEAR(FECHA_GUIA_DESPACHOEX) AS 'SEMANAGUIAISO',  

                                                    FORMAT(CANTIDAD_ENVASE_DESPACHOEX,0,'de_DE')  AS 'ENVASE',
                                                    FORMAT(KILOS_NETO_DESPACHOEX,2,'de_DE')  AS 'NETO',
                                                    FORMAT(KILOS_BRUTO_DESPACHOEX,2,'de_DE')  AS 'BRUTO'
                                                FROM fruta_despachoex                                                                           
                                                WHERE ESTADO_REGISTRO = 1            
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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


    public function listarDespachoexTemporadaCBXEst( $TEMPORADA, $ESPECIE)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,
                                                    DATE_FORMAT(FDESEX.INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(FDESEX.MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' , 
                                                    FDESEX.FECHA_DESPACHOEX AS 'FECHA' ,
                                                    FECHA_GUIA_DESPACHOEX AS 'GUIA',
                                                    FECHAETA_DESPACHOEX AS 'ETA' ,
                                                    FECHAETD_DESPACHOEX AS 'ETD',
                                                    
                                                    WEEK(FDESEX.FECHA_DESPACHOEX,3) AS 'SEMANA',
                                                    WEEK(FECHA_GUIA_DESPACHOEX,3) AS 'SEMANAGUIA',
                                                    WEEKOFYEAR(FDESEX.FECHA_DESPACHOEX) AS 'SEMANAISO',  
                                                    WEEKOFYEAR(FECHA_GUIA_DESPACHOEX) AS 'SEMANAGUIAISO',  

                                                    FORMAT(CANTIDAD_ENVASE_DESPACHOEX,0,'de_DE')  AS 'ENVASE',
                                                    FORMAT(KILOS_NETO_DESPACHOEX,2,'de_DE')  AS 'NETO',
                                                    FORMAT(KILOS_BRUTO_DESPACHOEX,2,'de_DE')  AS 'BRUTO'
                                                FROM fruta_despachoex FDESEX
																						LEFT JOIN fruta_exiexportacion FEXEX ON FDESEX.ID_DESPACHOEX = FEXEX.ID_DESPACHOEX
                                            LEFT JOIN fruta_vespecies VES ON FEXEX.ID_VESPECIES = VES.ID_VESPECIES                                                                          
                                                WHERE FDESEX.ESTADO_REGISTRO = 1            
                                                AND FDESEX.ID_TEMPORADA = '" . $TEMPORADA . "' AND VES.ID_ESPECIES = '" . $ESPECIE . "';	");
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


    public function listarDespachoexEmpresaTemporadaCBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * ,
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' , 
                                                    FECHA_DESPACHOEX AS 'FECHA' ,
                                                    FECHA_GUIA_DESPACHOEX AS 'GUIA',
                                                    FECHAETA_DESPACHOEX AS 'ETA' ,
                                                    FECHAETD_DESPACHOEX AS 'ETD',
                                                    
                                                    WEEK(FECHA_DESPACHOEX,3) AS 'SEMANA',
                                                    WEEK(FECHA_GUIA_DESPACHOEX,3) AS 'SEMANAGUIA',
                                                    WEEKOFYEAR(FECHA_DESPACHOEX) AS 'SEMANAISO',  
                                                    WEEKOFYEAR(FECHA_GUIA_DESPACHOEX) AS 'SEMANAGUIAISO',  

                                                    FORMAT(CANTIDAD_ENVASE_DESPACHOEX,0,'de_DE')  AS 'ENVASE',
                                                    FORMAT(KILOS_NETO_DESPACHOEX,2,'de_DE')  AS 'NETO',
                                                    FORMAT(KILOS_BRUTO_DESPACHOEX,2,'de_DE')  AS 'BRUTO'
                                                FROM fruta_despachoex                                                                           
                                                WHERE ESTADO_REGISTRO = 1                                                                                                        
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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
    public function listarDespachoexEmpresaTemporada2CBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * ,
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION' , 
                                                    DATE_FORMAT(FECHA_DESPACHOEX, '%d-%m-%Y') AS 'FECHA' ,
                                                    DATE_FORMAT(FECHA_GUIA_DESPACHOEX, '%d-%m-%Y') AS 'GUIA',
                                                    DATE_FORMAT(FECHAETA_DESPACHOEX, '%d-%m-%Y') AS 'ETA' ,
                                                    DATE_FORMAT(FECHAETD_DESPACHOEX, '%d-%m-%Y') AS 'ETD',
                                                    FORMAT(CANTIDAD_ENVASE_DESPACHOEX,0,'de_DE')  AS 'ENVASE',
                                                    FORMAT(KILOS_NETO_DESPACHOEX,2,'de_DE')  AS 'NETO',
                                                    FORMAT(KILOS_BRUTO_DESPACHOEX,2,'de_DE')  AS 'BRUTO'
                                                FROM fruta_despachoex                                                                           
                                                WHERE ESTADO_REGISTRO = 1                                                                                                        
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "';	");
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

    //BUSCADOR
    
    public function buscarPorDespachoexEspecies($IDDESPACHOEX)
    {
        try {

            $datos = $this->conexion->prepare("SELECT   
                                                    (
                                                        SELECT especies.CODIGO_SAG_ESPECIES
                                                        FROM fruta_especies especies
                                                        WHERE especies.ID_ESPECIES = vespecies.ID_ESPECIES      
                                                    )  AS 'CODIGO'
                                                FROM fruta_despachoex despacho, fruta_exiexportacion existencia, fruta_vespecies vespecies
                                                WHERE despacho.ID_DESPACHOEX = existencia.ID_DESPACHOEX
                                                    AND existencia.ID_VESPECIES = vespecies.ID_VESPECIES
                                                    AND despacho.ID_DESPACHOEX= '" . $IDDESPACHOEX . "'                  
                                                
                                                 
                                                
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


    public function buscarDespachoexPorProductorGuiaEmpresaPlantaTemporada($NUMEROGUIA, $PRODUCTOR, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                                FROM fruta_despachoex
                                                WHERE ESTADO_REGISTRO = 1                                                                                                        
                                                    AND NUMERO_SELLO_DESPACHOEX = " . $NUMEROGUIA . "
                                                    AND ID_PRODUCTOR = " . $PRODUCTOR . "                                                 
                                                    AND ID_EMPRESA = " . $EMPRESA . " 
                                                    AND ID_PLANTA = " . $PLANTA . " 
                                                    AND ID_TEMPORADA = " . $TEMPORADA . "     
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
    public function buscarDespachoExPorIcarga($IDICARGA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *,
                                                        DATE_FORMAT(FECHA_DESPACHOEX, '%d/%m/%Y') AS 'FECHA' 
                                                FROM fruta_despachoex
                                                WHERE 
                                                ID_ICARGA = " . $IDICARGA . "    
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


    public function buscarGGNxCarga($IDICARGA)
    {
        try {
            
            $datos = $this->conexion->prepare("
            SELECT ID_EXIEXPORTACION, FOLIO_EXIEXPORTACION, FOLIO_AUXILIAR_EXIEXPORTACION, FECHA_EMBALADO_EXIEXPORTACION, CANTIDAD_ENVASE_EXIEXPORTACION, KILOS_NETO_EXIEXPORTACION, GGN_PRODUCTOR
FROM fruta_exiexportacion a
JOIN fruta_productor b on b.id_productor = a.id_productor 
JOIN fruta_despachoex c ON c.ID_DESPACHOEX = a.ID_DESPACHOEX
WHERE c.ID_ICARGA=  " . $IDICARGA . " 
AND a.ESTADO BETWEEN 7 AND  8
AND a.ESTADO_REGISTRO = 1; ");
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
    
    public function buscarDespachoExPorIcargaAgrupadoPorPlanta($IDICARGA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT 
                                                        ID_PLANTA, 
                                                        DATE_FORMAT(FECHA_DESPACHOEX, '%d/%m/%Y') AS 'FECHA' ,
                                                        NUMERO_SELLO_DESPACHOEX
                                                    FROM fruta_despachoex
                                                WHERE 
                                                    ID_ICARGA = '" . $IDICARGA . "'   
                                                GROUP BY ID_PLANTA, FECHA_DESPACHOEX, NUMERO_SELLO_DESPACHOEX      
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


    public function consolidadoDespachoExistencia($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                            SUM(fruta_exiexportacion.CANTIDAD_ENVASE_EXIEXPORTACION) AS 'ENVASE',
                                            SUM(fruta_exiexportacion.KILOS_NETO_EXIEXPORTACION) AS 'NETO',
                                            SUM(fruta_exiexportacion.KILOS_BRUTO_EXIEXPORTACION) AS 'BRUTO',
                                            DATE_FORMAT(fruta_exiexportacion.FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y')  AS 'EMBALADO' ,
                                            fruta_exiexportacion.ID_PRODUCTOR,fruta_exiexportacion.ID_VESPECIES,
                                            fruta_exiexportacion.ID_ESTANDAR,fruta_exiexportacion.ID_FOLIO
                                        FROM fruta_despachoex, fruta_exiexportacion 
                                        WHERE  fruta_despachoex.ID_DESPACHOEX=fruta_exiexportacion.ID_DESPACHOEX
                                        AND fruta_despachoex.ID_ICARGA = '" . $IDICARGA . "'
                                        AND fruta_exiexportacion.ESTADO_REGISTRO = 1  
                                        GROUP BY 
                                        fruta_exiexportacion.ID_PRODUCTOR,
                                        fruta_exiexportacion.ID_VESPECIES,
                                        fruta_exiexportacion.ID_ESTANDAR,
                                        fruta_exiexportacion.ID_FOLIO, 
                                        fruta_exiexportacion.FECHA_EMBALADO_EXIEXPORTACION;
                                         ");
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

    public function consolidadoDespachoExistencia2($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                            FORMAT(IFNULL(SUM(fruta_exiexportacion.CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                            FORMAT(IFNULL(SUM(fruta_exiexportacion.KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO',
                                            FORMAT(IFNULL(SUM(fruta_exiexportacion.KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE') AS 'BRUTO',
                                            DATE_FORMAT(fruta_exiexportacion.FECHA_EMBALADO_EXIEXPORTACION, '%d-%m-%Y')  AS 'EMBALADO' ,
                                            fruta_exiexportacion.ID_PRODUCTOR,fruta_exiexportacion.ID_VESPECIES,
                                            fruta_exiexportacion.ID_ESTANDAR,fruta_exiexportacion.ID_FOLIO
                                        FROM fruta_despachoex, fruta_exiexportacion 
                                        WHERE  fruta_despachoex.ID_DESPACHOEX=fruta_exiexportacion.ID_DESPACHOEX
                                        AND fruta_despachoex.ID_ICARGA = '" . $IDICARGA . "'
                                        AND fruta_exiexportacion.ESTADO_REGISTRO = 1  
                                        GROUP BY 
                                        fruta_exiexportacion.ID_PRODUCTOR,
                                        fruta_exiexportacion.ID_VESPECIES,
                                        fruta_exiexportacion.ID_ESTANDAR,
                                        fruta_exiexportacion.ID_FOLIO, 
                                        fruta_exiexportacion.FECHA_EMBALADO_EXIEXPORTACION;
                                         ");
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
    public function DespachoExistencia($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                            fruta_exiexportacion.FECHA_EMBALADO_EXIEXPORTACION AS 'FECHA_EMBALADO' ,
                                            fruta_exiexportacion.ID_PRODUCTOR,fruta_exiexportacion.ID_VESPECIES,
                                            fruta_exiexportacion.ID_ESTANDAR,fruta_exiexportacion.ID_FOLIO
                                        FROM fruta_despachoex, fruta_exiexportacion 
                                        WHERE  fruta_despachoex.ID_DESPACHOEX=fruta_exiexportacion.ID_DESPACHOEX
                                        AND fruta_despachoex.ID_ICARGA = '" . $IDICARGA . "'
                                        AND fruta_exiexportacion.ESTADO_REGISTRO = 1;
                                         ");
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

    public function obtenerTotalconsolidadoDespachoExistencia2($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(fruta_exiexportacion.CANTIDAD_ENVASE_EXIEXPORTACION),0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(SUM(fruta_exiexportacion.KILOS_NETO_EXIEXPORTACION),0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(SUM(fruta_exiexportacion.KILOS_BRUTO_EXIEXPORTACION),0),2,'de_DE') AS 'BRUTO'
                                        FROM fruta_despachoex, fruta_exiexportacion 
                                        WHERE  fruta_despachoex.ID_DESPACHOEX=fruta_exiexportacion.ID_DESPACHOEX
                                        AND fruta_despachoex.ID_ICARGA = '" . $IDICARGA . "'
                                        AND fruta_exiexportacion.ESTADO_REGISTRO = 1  
                                        
                                         ");
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
    public function obtenerTotalesDespachoexCBX2()
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                 FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DESPACHOEX),0),0,'de_DE') AS 'ENVASE',   
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_DESPACHOEX),0),2,'de_DE') AS 'NETO',  
                                                 FORMAT(IFNULL(SUM(KILOS_BRUTO_DESPACHOEX),0),2,'de_DE')  AS 'BRUTO'  
                                        FROM fruta_despachoex 
                                        
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
    
    public function obtenerTotalesDespachoexEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                 IFNULL(SUM(CANTIDAD_ENVASE_DESPACHOEX),0) AS 'ENVASE',   
                                                 IFNULL(SUM(KILOS_NETO_DESPACHOEX),0) AS 'NETO',  
                                                 IFNULL(SUM(KILOS_BRUTO_DESPACHOEX),0)  AS 'BRUTO'  
                                        FROM fruta_despachoex 
                                                                                                             
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
    public function obtenerTotalesDespachoexEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DESPACHOEX),0),0,'de_DE') AS 'ENVASE',   
                                                 FORMAT(IFNULL(SUM(KILOS_NETO_DESPACHOEX),0),2,'de_DE') AS 'NETO',  
                                                 FORMAT(IFNULL(SUM(KILOS_BRUTO_DESPACHOEX),0),2,'de_DE')  AS 'BRUTO'  
                                        FROM fruta_despachoex 
                                                                                                             
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
    public function obtenerTotalesDespachoexEmpresaTemporadaCBX($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                 IFNULL(SUM(CANTIDAD_ENVASE_DESPACHOEX),0) AS 'ENVASE',   
                                                 IFNULL(SUM(KILOS_NETO_DESPACHOEX),0) AS 'NETO',  
                                                 IFNULL(SUM(KILOS_BRUTO_DESPACHOEX),0)  AS 'BRUTO'  
                                        FROM fruta_despachoex 
                                                                                                             
                                        WHERE ESTADO_REGISTRO = 1                                                                                                        
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
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
    public function obtenerTotalesDespachoexEmpresaTemporadaCBX2($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                  FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_DESPACHOEX),0),0,'de_DE') AS 'ENVASE',   
                                                  FORMAT(IFNULL(SUM(KILOS_NETO_DESPACHOEX),0),2,'de_DE') AS 'NETO',  
                                                  FORMAT(IFNULL(SUM(KILOS_BRUTO_DESPACHOEX),0),2,'de_DE')  AS 'BRUTO'  
                                        FROM fruta_despachoex 
                                                                                                             
                                        WHERE ESTADO_REGISTRO = 1                                                                                                        
                                        AND ID_EMPRESA = '" . $EMPRESA . "' 
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

    public function obtenerTotalesDespachoExistencia($IDICARGA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                     IFNULL(SUM(fruta_exiexportacion.CANTIDAD_ENVASE_EXIEXPORTACION),0) AS 'ENVASE',   
                                                     IFNULL(SUM(fruta_exiexportacion.KILOS_NETO_EXIEXPORTACION),0) AS 'NETO',  
                                                     IFNULL(SUM(fruta_exiexportacion.KILOS_BRUTO_EXIEXPORTACION),0)  AS 'BRUTO'  ,
                                                     IFNULL(SUM(fruta_exiexportacion.KILOS_DESHIRATACION_EXIEXPORTACION),0)  AS 'DESHIDRATACION'  
                                        FROM fruta_despachoex, fruta_exiexportacion 
                                        WHERE  fruta_despachoex.ID_DESPACHOEX=fruta_exiexportacion.ID_DESPACHOEX
                                        AND fruta_despachoex.ID_ICARGA = '" . $IDICARGA . "'
                                        AND fruta_exiexportacion.ESTADO_REGISTRO = 1  ;
                                         ");
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



    public function obtenerTotalesDespachoexCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT  IFNULL(SUM(CANTIDAD_ENVASE_DESPACHOEX),0) AS 'ENVASE',   
                                                     IFNULL(SUM(KILOS_NETO_DESPACHOEX),0) AS 'NETO',  
                                                     IFNULL(SUM(KILOS_BRUTO_DESPACHOEX),0)  AS 'BRUTO'  
                                            FROM fruta_despachoex ;	");
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
    //OTRAS FUNCIONALIDADES
    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHADESPACHOEX, $OBSERVACIONDESPACHOEX, $EMPRESA, $PLANTA, $TEMPORADA)
    {

        try {
            $datos = $this->conexion->prepare(" SELECT *
                                         FROM fruta_despachoex
                                         WHERE 
                                              FECHA_DESPACHOEX LIKE '" . $FECHADESPACHOEX . "' 
                                              AND OBSERVACION_DESPACHOEX LIKE '" . $OBSERVACIONDESPACHOEX . "' 
                                              AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                              AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')                                                                                                 
                                              AND ID_EMPRESA = '" . $EMPRESA . "'                                      
                                              AND ID_PLANTA = '" . $PLANTA . "'                                      
                                              AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                              ORDER BY ID_DESPACHOEX DESC
                                             
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

    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(DESPACHOEX $DESPACHOEX)
    {

        try {
            $query = "
    UPDATE fruta_despachoex SET			
            ESTADO_REGISTRO = 0
    WHERE ID_DESPACHOEX= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOEX->__GET('ID_DESPACHOEX')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(DESPACHOEX $DESPACHOEX)
    {
        try {
            $query = "
    UPDATE fruta_despachoex SET			
            ESTADO_REGISTRO = 1
    WHERE ID_DESPACHOEX= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOEX->__GET('ID_DESPACHOEX')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(DESPACHOEX $DESPACHOEX)
    {
        try {
            $query = "
                    UPDATE fruta_despachoex SET			
                            ESTADO = 1
                    WHERE ID_DESPACHOEX= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOEX->__GET('ID_DESPACHOEX')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(DESPACHOEX $DESPACHOEX)
    {
        try {
            $query = "
                    UPDATE fruta_despachoex SET			
                            ESTADO = 0
                    WHERE ID_DESPACHOEX= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $DESPACHOEX->__GET('ID_DESPACHOEX')
                    )
                );
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


    public function obtenerNumero($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_DESPACHOEX,0)) AS 'NUMERO'
                                            FROM fruta_despachoex
                                            WHERE  
                                                ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
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
