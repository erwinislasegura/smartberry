<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/EXIMATERIAPRIMA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class EXIMATERIAPRIMA_ADO
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
    public function listarEximateriaprima()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima limit 8;	");
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
    public function listarEximateriaprimaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS'
                                                FROM fruta_eximateriaprima
                                                WHERE ESTADO_REGISTRO = 1;
                                                ORDER BY FOLIO_EXIMATERIAPRIMA ASC; ");
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
    public function listarEximateriaprimaHCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, 
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS' 
                                             FROM fruta_eximateriaprima
                                             ORDER BY FOLIO_EXIMATERIAPRIMA ASC; ");
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
    public function verEximateriaprima($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima WHERE ID_EXIMATERIAPRIMA= '" . $ID . "';");
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
    public function agregarEximateriaprimaRecepcion(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {

            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO2', NULL);
            }
            $query =
                "INSERT INTO fruta_eximateriaprima ( 


                                                            FOLIO_EXIMATERIAPRIMA,
                                                            FOLIO_AUXILIAR_EXIMATERIAPRIMA,
                                                            FOLIO_MANUAL,
                                                            FECHA_COSECHA_EXIMATERIAPRIMA,
                                                            CANTIDAD_ENVASE_EXIMATERIAPRIMA,
                                                            KILOS_NETO_EXIMATERIAPRIMA,
                                                            KILOS_BRUTO_EXIMATERIAPRIMA,
                                                            KILOS_PROMEDIO_EXIMATERIAPRIMA,
                                                            PESO_PALLET_EXIMATERIAPRIMA,
                                                            ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA,
                                                            ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA,
                                                            GASIFICADO,
                                                            FECHA_RECEPCION,
                                                            ID_TMANEJO,
                                                            ID_TTRATAMIENTO1,
                                                            ID_TTRATAMIENTO2,
                                                            ID_FOLIO,
                                                            ID_ESTANDAR,
                                                            ID_PRODUCTOR,
                                                            ID_VESPECIES,
                                                            ID_RECEPCION,
                                                            ID_EMPRESA, 
                                                            ID_PLANTA, 
                                                            ID_TEMPORADA,
                                                            INGRESO,
                                                            MODIFICACION,
                                                            ESTADO,  
                                                            ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIMATERIAPRIMA->__GET('FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_MANUAL'),
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2'),
                        $EXIMATERIAPRIMA->__GET('ID_FOLIO'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),
                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //REGISTRO DE UNA NUEVA FILA    
    public function agregarEximateriaprimaGuia(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {


            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO2', NULL);
            }
            $query =
                "INSERT INTO fruta_eximateriaprima ( 


                                                           FOLIO_EXIMATERIAPRIMA,
                                                           FOLIO_AUXILIAR_EXIMATERIAPRIMA,
                                                           FOLIO_MANUAL,
                                                           FECHA_COSECHA_EXIMATERIAPRIMA,
                                                           CANTIDAD_ENVASE_EXIMATERIAPRIMA,

                                                           KILOS_NETO_EXIMATERIAPRIMA,
                                                           KILOS_BRUTO_EXIMATERIAPRIMA,
                                                           KILOS_PROMEDIO_EXIMATERIAPRIMA,
                                                           PESO_PALLET_EXIMATERIAPRIMA,
                                                           ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA,

                                                           ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA,
                                                           GASIFICADO,
                                                           INGRESO,
                                                           COLOR,
                                                           ID_TMANEJO,
                                                           ID_FOLIO,
                                                           ID_TTRATAMIENTO1,
                                                           ID_TTRATAMIENTO2,
                                                           
                                                           ID_ESTANDAR,
                                                           ID_PRODUCTOR,
                                                           ID_VESPECIES,
                                                           ID_PLANTA2,
                                                           ID_DESPACHO2,

                                                           ID_EMPRESA, 
                                                           ID_PLANTA, 
                                                           ID_TEMPORADA,

                                                           MODIFICACION,
                                                           ESTADO,  
                                                           ESTADO_REGISTRO
                                                   ) VALUES
              ( ?, ?, ?, ?, ?,     ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?,  ?,   ?, ?, ?, ?, ?,   ?, ?, ?, SYSDATE(), 2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIMATERIAPRIMA->__GET('FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_MANUAL'),
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),

                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA'),

                        $EXIMATERIAPRIMA->__GET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('INGRESO'),
                        $EXIMATERIAPRIMA->__GET('COLOR'),
                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_FOLIO'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2'),

                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA2'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO2'),

                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //MP DIVIDIDA
    public function agregarEximateriaprimaProcesoNuevo(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {       
            

            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO3', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PROCESO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PROCESO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_RECHAZADO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_RECHAZADO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PLANTA3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PLANTA3', NULL);
            }
            $query =
                "INSERT INTO fruta_eximateriaprima ( 


                                                           FOLIO_EXIMATERIAPRIMA,
                                                           FOLIO_AUXILIAR_EXIMATERIAPRIMA,
                                                           FOLIO_MANUAL,
                                                           FECHA_COSECHA_EXIMATERIAPRIMA,


                                                           CANTIDAD_ENVASE_EXIMATERIAPRIMA,
                                                           KILOS_NETO_EXIMATERIAPRIMA,
                                                           KILOS_BRUTO_EXIMATERIAPRIMA,
                                                           KILOS_PROMEDIO_EXIMATERIAPRIMA,
                                                           PESO_PALLET_EXIMATERIAPRIMA,

                                                           ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA,
                                                           ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA,
                                                           GASIFICADO,
                                                           COLOR,
                                                           
                                                           FECHA_RECEPCION,
                                                           INGRESO,

                                                           ID_TMANEJO,
                                                           ID_FOLIO,
                                                           ID_ESTANDAR,
                                                           ID_PRODUCTOR,
                                                           ID_VESPECIES,

                                                           ID_EMPRESA, 
                                                           ID_PLANTA, 
                                                           ID_TEMPORADA,
                                                           
                                                           ID_TTRATAMIENTO1,
                                                           ID_TTRATAMIENTO2,                                                           

                                                           ID_RECEPCION,
                                                           ID_PROCESO,
                                                           ID_DESPACHO2,
                                                           ID_DESPACHO3,
                                                           ID_PROCESO2,
                                                           
                                                           ID_RECHAZADO,
                                                           ID_LEVANTAMIENTO,
                                                           ID_PLANTA2,
                                                           ID_PLANTA3,
                                                           ID_EXIMATERIAPRIMA2,
                                                           
                                                           MODIFICACION,
                                                           ESTADO,  
                                                           ESTADO_REGISTRO

                                                   ) VALUES
              ( ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?, ?,   ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?,   ?, ?,   ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,    SYSDATE(), 7, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIMATERIAPRIMA->__GET('FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_MANUAL'),
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),


                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),

                        $EXIMATERIAPRIMA->__GET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('COLOR'),

                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('INGRESO'),

                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_FOLIO'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),

                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA'),

                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2'),

                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO2'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO3'),
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO2'),
              
                        $EXIMATERIAPRIMA->__GET('ID_RECHAZADO'),
                        $EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA2'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA3'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA2')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarEximateriaprimaProcesoNuevo2(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {       
            

            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO3', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PROCESO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PROCESO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_RECHAZADO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_RECHAZADO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PLANTA3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PLANTA3', NULL);
            }
            $query =
                "INSERT INTO fruta_eximateriaprima ( 


                                                           FOLIO_EXIMATERIAPRIMA,
                                                           FOLIO_AUXILIAR_EXIMATERIAPRIMA,
                                                           FOLIO_MANUAL,
                                                           FECHA_COSECHA_EXIMATERIAPRIMA,


                                                           CANTIDAD_ENVASE_EXIMATERIAPRIMA,
                                                           KILOS_NETO_EXIMATERIAPRIMA,
                                                           KILOS_BRUTO_EXIMATERIAPRIMA,
                                                           KILOS_PROMEDIO_EXIMATERIAPRIMA,
                                                           PESO_PALLET_EXIMATERIAPRIMA,

                                                           ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA,
                                                           ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA,
                                                           GASIFICADO,
                                                           COLOR,
                                                           
                                                           FECHA_RECEPCION,
                                                           INGRESO,

                                                           ID_TMANEJO,
                                                           ID_FOLIO,
                                                           ID_ESTANDAR,
                                                           ID_PRODUCTOR,
                                                           ID_VESPECIES,

                                                           ID_EMPRESA, 
                                                           ID_PLANTA, 
                                                           ID_TEMPORADA,
                                                           
                                                           ID_TTRATAMIENTO1,
                                                           ID_TTRATAMIENTO2,                                                           

                                                           ID_RECEPCION,
                                                           ID_PROCESO,
                                                           ID_DESPACHO2,
                                                           ID_DESPACHO3,
                                                           ID_PROCESO2,
                                                           
                                                           ID_RECHAZADO,
                                                           ID_LEVANTAMIENTO,
                                                           ID_PLANTA2,
                                                           ID_PLANTA3,
                                                           ID_EXIMATERIAPRIMA2,
                                                           
                                                           MODIFICACION,
                                                           ESTADO,  
                                                           ESTADO_REGISTRO

                                                   ) VALUES
              ( ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?, ?,   ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?,   ?, ?,   ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,    SYSDATE(), 3, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIMATERIAPRIMA->__GET('FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_MANUAL'),
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),


                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),

                        $EXIMATERIAPRIMA->__GET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('COLOR'),

                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('INGRESO'),

                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_FOLIO'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),

                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA'),

                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2'),

                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO2'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO3'),
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO2'),
              
                        $EXIMATERIAPRIMA->__GET('ID_RECHAZADO'),
                        $EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA2'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA3'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA2')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarEximateriaprimaProcesoResto2(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {       
            

            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO3', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PROCESO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PROCESO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_RECHAZADO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_RECHAZADO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PLANTA3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PLANTA3', NULL);
            }
            $query =
                "INSERT INTO fruta_eximateriaprima ( 


                                                           FOLIO_EXIMATERIAPRIMA,
                                                           FOLIO_AUXILIAR_EXIMATERIAPRIMA,
                                                           FOLIO_MANUAL,
                                                           FECHA_COSECHA_EXIMATERIAPRIMA,


                                                           CANTIDAD_ENVASE_EXIMATERIAPRIMA,
                                                           KILOS_NETO_EXIMATERIAPRIMA,
                                                           KILOS_BRUTO_EXIMATERIAPRIMA,
                                                           KILOS_PROMEDIO_EXIMATERIAPRIMA,
                                                           PESO_PALLET_EXIMATERIAPRIMA,

                                                           ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA,
                                                           ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA,
                                                           GASIFICADO,
                                                           COLOR,
                                                           
                                                           FECHA_RECEPCION,
                                                           INGRESO,

                                                           ID_TMANEJO,
                                                           ID_FOLIO,
                                                           ID_ESTANDAR,
                                                           ID_PRODUCTOR,
                                                           ID_VESPECIES,

                                                           ID_EMPRESA, 
                                                           ID_PLANTA, 
                                                           ID_TEMPORADA,
                                                           
                                                           ID_TTRATAMIENTO1,
                                                           ID_TTRATAMIENTO2,                                                           

                                                           ID_RECEPCION,
                                                           ID_DESPACHO2,
                                                           ID_DESPACHO3,
                                                           ID_PROCESO2,
                                                           
                                                           ID_RECHAZADO,
                                                           ID_LEVANTAMIENTO,
                                                           ID_PLANTA2,
                                                           ID_PLANTA3,
                                                           ID_EXIMATERIAPRIMA2,
                                                           
                                                           MODIFICACION,
                                                           ESTADO,  
                                                           ESTADO_REGISTRO

                                                   ) VALUES
              ( ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?, ?,   ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?,   ?, ?,   ?, ?, ?, ?,     ?, ?, ?, ?, ?,    SYSDATE(), 2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIMATERIAPRIMA->__GET('FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_MANUAL'),
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),


                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),

                        $EXIMATERIAPRIMA->__GET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('COLOR'),

                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('INGRESO'),

                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_FOLIO'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),

                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA'),

                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2'),

                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO2'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO3'),
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO2'),
              
                        $EXIMATERIAPRIMA->__GET('ID_RECHAZADO'),
                        $EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA2'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA3'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA2')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarEximateriaprimaProcesoResto(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {       
            

            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO3', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PROCESO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PROCESO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_RECHAZADO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_RECHAZADO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PLANTA3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PLANTA3', NULL);
            }
            $query =
                "INSERT INTO fruta_eximateriaprima ( 


                                                           FOLIO_EXIMATERIAPRIMA,
                                                           FOLIO_AUXILIAR_EXIMATERIAPRIMA,
                                                           FOLIO_MANUAL,
                                                           FECHA_COSECHA_EXIMATERIAPRIMA,


                                                           CANTIDAD_ENVASE_EXIMATERIAPRIMA,
                                                           KILOS_NETO_EXIMATERIAPRIMA,
                                                           KILOS_BRUTO_EXIMATERIAPRIMA,
                                                           KILOS_PROMEDIO_EXIMATERIAPRIMA,
                                                           PESO_PALLET_EXIMATERIAPRIMA,

                                                           ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA,
                                                           ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA,
                                                           GASIFICADO,
                                                           COLOR,
                                                           
                                                           FECHA_RECEPCION,
                                                           INGRESO,

                                                           ID_TMANEJO,
                                                           ID_FOLIO,
                                                           ID_ESTANDAR,
                                                           ID_PRODUCTOR,
                                                           ID_VESPECIES,

                                                           ID_EMPRESA, 
                                                           ID_PLANTA, 
                                                           ID_TEMPORADA,
                                                           
                                                           ID_TTRATAMIENTO1,
                                                           ID_TTRATAMIENTO2,                                                           

                                                           ID_RECEPCION,
                                                           ID_DESPACHO2,
                                                           ID_DESPACHO3,
                                                           ID_PROCESO2,
                                                           
                                                           ID_RECHAZADO,
                                                           ID_LEVANTAMIENTO,
                                                           ID_PLANTA2,
                                                           ID_PLANTA3,
                                                           ID_EXIMATERIAPRIMA2,
                                                           
                                                           MODIFICACION,
                                                           ESTADO,  
                                                           ESTADO_REGISTRO

                                                   ) VALUES
              ( ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?, ?,   ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?,   ?, ?,   ?, ?, ?, ?,     ?, ?, ?, ?, ?,    SYSDATE(), 7, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIMATERIAPRIMA->__GET('FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_MANUAL'),
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),


                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),

                        $EXIMATERIAPRIMA->__GET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('COLOR'),

                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('INGRESO'),

                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_FOLIO'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),

                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA'),

                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2'),

                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO2'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO3'),
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO2'),
              
                        $EXIMATERIAPRIMA->__GET('ID_RECHAZADO'),
                        $EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA2'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA3'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA2')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarEximateriaprimaDespachoNuevo(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {       
            

            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PROCESO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PROCESO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_RECHAZADO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_RECHAZADO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PLANTA3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PLANTA3', NULL);
            }
            $query =
                "INSERT INTO fruta_eximateriaprima ( 


                                                           FOLIO_EXIMATERIAPRIMA,
                                                           FOLIO_AUXILIAR_EXIMATERIAPRIMA,
                                                           FOLIO_MANUAL,
                                                           FECHA_COSECHA_EXIMATERIAPRIMA,


                                                           CANTIDAD_ENVASE_EXIMATERIAPRIMA,
                                                           KILOS_NETO_EXIMATERIAPRIMA,
                                                           KILOS_BRUTO_EXIMATERIAPRIMA,
                                                           KILOS_PROMEDIO_EXIMATERIAPRIMA,
                                                           PESO_PALLET_EXIMATERIAPRIMA,

                                                           ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA,
                                                           ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA,
                                                           GASIFICADO,
                                                           COLOR,
                                                           
                                                           FECHA_RECEPCION,
                                                           INGRESO,

                                                           ID_TMANEJO,
                                                           ID_FOLIO,
                                                           ID_ESTANDAR,
                                                           ID_PRODUCTOR,
                                                           ID_VESPECIES,

                                                           ID_EMPRESA, 
                                                           ID_PLANTA, 
                                                           ID_TEMPORADA,
                                                           
                                                           ID_TTRATAMIENTO1,
                                                           ID_TTRATAMIENTO2,                                                           

                                                           ID_RECEPCION,
                                                           ID_DESPACHO,
                                                           ID_DESPACHO2,
                                                           ID_PROCESO2,
                                                           
                                                           ID_RECHAZADO,
                                                           ID_LEVANTAMIENTO,
                                                           ID_PLANTA2,
                                                           ID_PLANTA3,
                                                           ID_EXIMATERIAPRIMA2,
                                                           
                                                           MODIFICACION,
                                                           ESTADO,  
                                                           ESTADO_REGISTRO

                                                   ) VALUES
              ( ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?, ?,   ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?,   ?, ?,   ?, ?, ?, ?,    ?, ?, ?, ?, ?,    SYSDATE(), 7, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIMATERIAPRIMA->__GET('FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_MANUAL'),
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),


                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),

                        $EXIMATERIAPRIMA->__GET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('COLOR'),

                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('INGRESO'),

                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_FOLIO'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),

                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA'),

                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2'),

                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO2'),
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO2'),
              
                        $EXIMATERIAPRIMA->__GET('ID_RECHAZADO'),
                        $EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA2'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA3'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA2')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function agregarEximateriaprimaDespachoResto(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {       
            

            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_DESPACHO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_DESPACHO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PROCESO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PROCESO2', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_RECHAZADO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_RECHAZADO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_LEVANTAMIENTO', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_PLANTA3') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_PLANTA3', NULL);
            }
            $query =
                "INSERT INTO fruta_eximateriaprima ( 


                                                           FOLIO_EXIMATERIAPRIMA,
                                                           FOLIO_AUXILIAR_EXIMATERIAPRIMA,
                                                           FOLIO_MANUAL,
                                                           FECHA_COSECHA_EXIMATERIAPRIMA,


                                                           CANTIDAD_ENVASE_EXIMATERIAPRIMA,
                                                           KILOS_NETO_EXIMATERIAPRIMA,
                                                           KILOS_BRUTO_EXIMATERIAPRIMA,
                                                           KILOS_PROMEDIO_EXIMATERIAPRIMA,
                                                           PESO_PALLET_EXIMATERIAPRIMA,

                                                           ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA,
                                                           ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA,
                                                           GASIFICADO,
                                                           COLOR,
                                                           
                                                           FECHA_RECEPCION,
                                                           INGRESO,

                                                           ID_TMANEJO,
                                                           ID_FOLIO,
                                                           ID_ESTANDAR,
                                                           ID_PRODUCTOR,
                                                           ID_VESPECIES,

                                                           ID_EMPRESA, 
                                                           ID_PLANTA, 
                                                           ID_TEMPORADA,
                                                           
                                                           ID_TTRATAMIENTO1,
                                                           ID_TTRATAMIENTO2,                                                           

                                                           ID_RECEPCION,
                                                           ID_DESPACHO2,
                                                           ID_DESPACHO3,
                                                           ID_PROCESO2,
                                                           
                                                           ID_RECHAZADO,
                                                           ID_LEVANTAMIENTO,
                                                           ID_PLANTA2,
                                                           ID_PLANTA3,
                                                           ID_EXIMATERIAPRIMA2,
                                                           
                                                           MODIFICACION,
                                                           ESTADO,  
                                                           ESTADO_REGISTRO

                                                   ) VALUES
              ( ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?, ?,   ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?,   ?, ?,   ?, ?, ?, ?,    ?, ?, ?, ?, ?,    SYSDATE(), 2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIMATERIAPRIMA->__GET('FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('FOLIO_MANUAL'),
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),


                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),

                        $EXIMATERIAPRIMA->__GET('ALIAS_DINAMICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ALIAS_ESTATICO_FOLIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('COLOR'),

                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('INGRESO'),

                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_FOLIO'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),

                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA'),

                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2'),

                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO2'),
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO3'),
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO2'),
              
                        $EXIMATERIAPRIMA->__GET('ID_RECHAZADO'),
                        $EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA2'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA3'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA2')


                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //REGISTRO DE UNA NUEVA FILA    


    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarEximateriaprima($id)
    {
        try {
            $sql = "DELETE FROM fruta_eximateriaprima WHERE ID_EXIMATERIAPRIMA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEximateriaprimaRecepcion(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO1', NULL);
            }
            if ($EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2') == NULL) {
                $EXIMATERIAPRIMA->__SET('ID_TTRATAMIENTO2', NULL);
            }
            $query = "
		UPDATE fruta_eximateriaprima SET
            MODIFICACION = SYSDATE(),
            FECHA_COSECHA_EXIMATERIAPRIMA = ?,
            CANTIDAD_ENVASE_EXIMATERIAPRIMA = ?,
            KILOS_NETO_EXIMATERIAPRIMA = ?,
            KILOS_BRUTO_EXIMATERIAPRIMA = ?,
            KILOS_PROMEDIO_EXIMATERIAPRIMA = ?,
            PESO_PALLET_EXIMATERIAPRIMA = ?,
            GASIFICADO = ?,
            FECHA_RECEPCION = ?,
            ID_TMANEJO = ?, 
            ID_TTRATAMIENTO1 = ?, 
            ID_TTRATAMIENTO2 = ?, 
            ID_ESTANDAR = ?,
            ID_PRODUCTOR = ?,
            ID_VESPECIES = ?   ,
            ID_RECEPCION = ?   ,
            ID_EMPRESA = ?,
            ID_PLANTA = ?, 
            ID_TEMPORADA = ?       
		WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('FECHA_COSECHA_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('CANTIDAD_ENVASE_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_NETO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_BRUTO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('KILOS_PROMEDIO_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('PESO_PALLET_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('GASIFICADO'),
                        $EXIMATERIAPRIMA->__GET('FECHA_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_TMANEJO'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO1'),
                        $EXIMATERIAPRIMA->__GET('ID_TTRATAMIENTO2'),
                        $EXIMATERIAPRIMA->__GET('ID_ESTANDAR'),
                        $EXIMATERIAPRIMA->__GET('ID_PRODUCTOR'),
                        $EXIMATERIAPRIMA->__GET('ID_VESPECIES'),
                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION'),
                        $EXIMATERIAPRIMA->__GET('ID_EMPRESA'),
                        $EXIMATERIAPRIMA->__GET('ID_PLANTA'),
                        $EXIMATERIAPRIMA->__GET('ID_TEMPORADA'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }







    ///FUNCIONES ESPECIALIZADAS
    //VISUALIZAR
    public function verExistenciaPorDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima 
                                    WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                    AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function verExistenciaPorDespacho2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima 
                                    WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                    AND ESTADO_REGISTRO = 1
                                    AND ESTADO = 7;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function verExistenciaPorDespachoEnTransito($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima 
                                    WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                    AND ESTADO_REGISTRO = 1
                                    AND ESTADO = 9;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function contarExistenciaPorDespachoPrecioNulo($IDDESPACHO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(COUNT(ID_EXIMATERIAPRIMA),0)  AS 'CONTEO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                                    AND ESTADO_REGISTRO = 1
                                                    AND PRECIO_PALLET IS  NULL
                                        ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //LISTAS 
    //BUSCAR POR LA RECEPCION ASOCIADA A LA EXIMATERIAPRIMA
    public function listarEximateriaprimaTemporadaDisponible(   $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d')AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0) AS 'PROMEDIO',
                                                    IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0) AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEximateriaprimaTemporadaDisponibleEst(   $TEMPORADA, $ESPECIE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    DATE_FORMAT(FEXMP.INGRESO, '%Y-%m-%d')AS 'INGRESO',
                                                    DATE_FORMAT(FEXMP.MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0) AS 'PROMEDIO',
                                                    IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0) AS 'PALLET'
                                                    FROM fruta_eximateriaprima FEXMP

                                            LEFT JOIN fruta_vespecies VES ON FEXMP.ID_VESPECIES = VES.ID_VESPECIES
                                                    WHERE FEXMP.ESTADO_REGISTRO = 1
                                                    AND FEXMP.ESTADO = 2
                                                    AND FEXMP.ID_TEMPORADA = '" . $TEMPORADA . "' AND VES.ID_ESPECIES = '" . $ESPECIE . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarEximateriaprimaEmpresaTemporadaDisponible($EMPRESA,   $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d')AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0) AS 'PROMEDIO',
                                                    IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0) AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarEximateriaprimaEmpresaTemporadaDisponible2($EMPRESA,   $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }





    public function listarEximateriaprimaEmpresaPlantaTemporadaDisponible($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0) AS 'PROMEDIO',
                                                    IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0) AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                                    /**esta linea de abajo**/
                                                    AND KILOS_NETO_EXIMATERIAPRIMA>0 
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarEximateriaprimaEmpresaPlantaTemporadaDisponible2($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEximateriaprimaEmpresaTemporadaDespachado($EMPRESA,   $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0) AS 'PROMEDIO',
                                                    IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0) AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 8
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEximateriaprimaEmpresaTemporadaDespachado2($EMPRESA,   $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 8
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function listarEximateriaprimaEmpresaPlantaTemporadaDespachado($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0) AS 'PROMEDIO',
                                                    IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0) AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 8
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listarEximateriaprimaEmpresaPlantaTemporada($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0) AS 'PROMEDIO',
                                                    IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0) AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function listarEximateriaprimaEmpresaTemporada($EMPRESA,   $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0) AS 'PROMEDIO',
                                                    IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0) AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function listarEximateriaprimaEmpresaPlantaTemporada2($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                    FROM fruta_eximateriaprima
                                                    WHERE
                                                        ID_EMPRESA = '" . $EMPRESA . "' 
                                                        AND ID_PLANTA = '" . $PLANTA . "'
                                                        AND ID_TEMPORADA = '" . $TEMPORADA . "';  ");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



 

    //BUSCAR
    public function buscarPorDespachoAgrupadoEstandarProducto($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT                                                     
                                                    estandar.ID_PRODUCTO,
                                                    producto.ID_TUMEDIDA, 
                                                    IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIMATERIAPRIMA),0) AS 'ENVASE'
                                                FROM fruta_eximateriaprima existencia, estandar_erecepcion estandar, material_producto producto 
                                                WHERE existencia.ID_ESTANDAR= estandar.ID_ESTANDAR 
                                                AND estandar.ID_PRODUCTO=producto.ID_PRODUCTO 
                                                AND existencia.ESTADO_REGISTRO = 1
                                                AND existencia.ESTADO = 8
                                                AND existencia.ID_DESPACHO= '" . $IDDESPACHO . "'  
                                                GROUP BY estandar.ID_PRODUCTO  
                                                
                                                ;");
                                                //7 en despacho
                                                //8 despachado
                                                //9 en transito
                           /* die("SELECT                                                     
                            estandar.ID_PRODUCTO,
                            producto.ID_TUMEDIDA, 
                            IFNULL(SUM(existencia.CANTIDAD_ENVASE_EXIMATERIAPRIMA),0) AS 'ENVASE'
                        FROM fruta_eximateriaprima existencia, estandar_erecepcion estandar, material_producto producto 
                        WHERE existencia.ID_ESTANDAR= estandar.ID_ESTANDAR 
                        AND estandar.ID_PRODUCTO=producto.ID_PRODUCTO 
                        AND existencia.ESTADO_REGISTRO = 1
                        AND existencia.ESTADO = 7
                        AND existencia.ID_DESPACHO= '" . $IDDESPACHO . "'  
                        GROUP BY estandar.ID_PRODUCTO");  */              
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorRecepcionIngresado($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima 
                                              WHERE ID_RECEPCION= '" . $IDRECEPCION . "' AND ESTADO = 1   AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
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

            $datos = $this->conexion->prepare("SELECT * FROM fruta_eximateriaprima 
                                              WHERE ID_RECEPCION= '" . $IDRECEPCION . "'    AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorProceso($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * 
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'  
                                                      AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorProceso2($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,  
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3),5,'de_DE') AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'  
                                                      AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,  
                                                    IFNULL(FECHA_COSECHA_EXIMATERIAPRIMA,'Sin Datos') AS 'COSECHA',
                                                    IFNULL(FECHA_RECEPCION,'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0) AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'  
                                                      AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorDespacho2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,  
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'  
                                                      AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function buscarPorRechazo($IDRECHAZADO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,  
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3) AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_RECHAZADO= '" . $IDRECHAZADO . "'  
                                                AND ESTADO_REGISTRO = 1 ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function buscarPorLevantamiento($IDLEVANTAMIENTO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,  
                                                    FECHA_COSECHA_EXIMATERIAPRIMA AS 'COSECHA',
                                                    IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0) AS 'ENVASE',
                                                    IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0) AS 'NETO',
                                                    IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0) AS 'BRUTO',
                                                    IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3) AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_LEVANTAMIENTO= '" . $IDLEVANTAMIENTO . "'  
                                                AND ESTADO_REGISTRO = 1 ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorRechazo2($IDRECHAZADO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,  
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3),5,'de_DE') AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_RECHAZADO= '" . $IDRECHAZADO . "'  
                                                AND ESTADO_REGISTRO = 1
                                                AND ESTADO = 10;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function buscarPorLevantamiento2($IDLEVANTAMIENTO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3),5,'de_DE') AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_LEVANTAMIENTO= '" . $IDLEVANTAMIENTO . "'  
                                                AND ESTADO_REGISTRO = 1
                                                AND ESTADO = 12;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verExistenciaPorRechazo2($IDRECHAZADO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,  
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3),5,'de_DE') AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_RECHAZADO= '" . $IDRECHAZADO . "'  
                                                AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function verExistenciaPorLevantamiento2($IDLEVANTAMIENTO)
    {
        try {

            $datos = $this->conexion->prepare("  SELECT * ,  
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,3),5,'de_DE') AS 'PROMEDIO'
                                                FROM fruta_eximateriaprima 
                                                WHERE ID_LEVANTAMIENTO= '" . $IDLEVANTAMIENTO . "'  
                                                AND ESTADO_REGISTRO = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function buscarPorRecepcionNumeroFolio($IDRECEPCION, $NUMEROFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                               FROM fruta_eximateriaprima 
                                               WHERE 
                                                    ID_RECEPCION= '" . $IDRECEPCION . "'  
                                                    AND FOLIO_EXIMATERIAPRIMA= '" . $NUMEROFOLIO . "'  
                                                    AND FOLIO_AUXILIAR_EXIMATERIAPRIMA= '" . $NUMEROFOLIO . "'  
                                                    AND ESTADO_REGISTRO = 1
                                                    AND ESTADO !=0;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //BUSQUEDA POR NUMERO FOLIO ASOCIADO AL REGISTRO
    public function buscarPorFolio($FOLIOAUXILIAREXIMATERIAPRIMA, $EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                             FROM fruta_eximateriaprima 
                                             WHERE   FOLIO_AUXILIAR_EXIMATERIAPRIMA LIKE '" . $FOLIOAUXILIAREXIMATERIAPRIMA . "' 
                                            AND ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "';");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //BUSQUEDA POR EMPRESA PLANTA TEMPORADA
    public function buscarPorEmpresaPlantaTemporada($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO',
                                                FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                            FROM fruta_eximateriaprima 
                                            WHERE  ESTADO = 2  
                                            AND ESTADO_REGISTRO = 1 
                                            AND ID_EMPRESA = '" . $EMPRESA . "'
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "';");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarPorEmpresaPlantaTemporadaVariedadProductor($EMPRESA, $PLANTA, $TEMPORADA,  $VESPECIES, $PRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                FROM fruta_eximateriaprima 
                                                WHERE  ESTADO = 2  
                                                AND ESTADO_REGISTRO = 1 
                                                AND ID_PRODUCTOR = '" . $PRODUCTOR . "'
                                                AND ID_VESPECIES = '" . $VESPECIES . "'
                                                AND ID_EMPRESA = '" . $EMPRESA . "'
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function buscarPorEmpresaPlantaTemporadaVariedadProductorColorNulo($EMPRESA, $PLANTA, $TEMPORADA,  $VESPECIES, $PRODUCTOR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                FROM fruta_eximateriaprima 
                                                WHERE  ESTADO = 2  
                                                AND ESTADO_REGISTRO = 1 
                                                AND COLOR IS NULL 
                                                AND ID_PRODUCTOR = '" . $PRODUCTOR . "'
                                                AND ID_VESPECIES = '" . $VESPECIES . "'
                                                AND ID_EMPRESA = '" . $EMPRESA . "'
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function buscarPorEmpresaPlantaTemporadaVariedadProductorColorNuloLevantamiento($EMPRESA, $PLANTA, $TEMPORADA,  $VESPECIES, $PRODUCTOR)
    {
        try {

            /*echo "SELECT * ,  
            DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
            IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
            IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
            IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
            IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
            IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
            IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
            FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
            FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
            FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
            FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO',
            FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
        FROM fruta_eximateriaprima 
        WHERE  ESTADO = 11   
        AND ESTADO_REGISTRO = 1 
        AND COLOR IS 1 
        AND ID_PRODUCTOR = '" . $PRODUCTOR . "'
        AND ID_VESPECIES = '" . $VESPECIES . "'
        AND ID_EMPRESA = '" . $EMPRESA . "'
        AND ID_PLANTA = '" . $PLANTA . "'
        AND ID_TEMPORADA = '" . $TEMPORADA . "' ;";*/

            $datos = $this->conexion->prepare("SELECT * ,  
                                                    DATEDIFF(SYSDATE(), FECHA_COSECHA_EXIMATERIAPRIMA) AS 'DIAS',
                                                    IFNULL(DATE_FORMAT(INGRESO, '%d-%m-%Y'),'Sin Datos') AS 'INGRESO',
                                                    IFNULL(DATE_FORMAT(MODIFICACION, '%d-%m-%Y'),'Sin Datos') AS 'MODIFICACION',
                                                    IFNULL(DATE_FORMAT(FECHA_COSECHA_EXIMATERIAPRIMA, '%d-%m-%Y'),'Sin Datos') AS 'COSECHA',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_REPALETIZAJE, '%d-%m-%Y'),'Sin Datos') AS 'REPALETIZAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    FORMAT(IFNULL(CANTIDAD_ENVASE_EXIMATERIAPRIMA,0),0,'de_DE') AS 'ENVASE',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIMATERIAPRIMA,0),2,'de_DE') AS 'NETO',
                                                    FORMAT(IFNULL(KILOS_BRUTO_EXIMATERIAPRIMA,0),0,'de_DE') AS 'BRUTO',
                                                    FORMAT(IFNULL(KILOS_PROMEDIO_EXIMATERIAPRIMA,0),5,'de_DE') AS 'PROMEDIO',
                                                    FORMAT(IFNULL(PESO_PALLET_EXIMATERIAPRIMA,0),0,'de_DE') AS 'PALLET'
                                                FROM fruta_eximateriaprima 
                                                WHERE  ESTADO = 11   
                                                AND ESTADO_REGISTRO = 1 
                                                AND COLOR = 1 
                                                AND ID_PRODUCTOR = '" . $PRODUCTOR . "'
                                                AND ID_VESPECIES = '" . $VESPECIES . "'
                                                AND ID_EMPRESA = '" . $EMPRESA . "'
                                                AND ID_PLANTA = '" . $PLANTA . "'
                                                AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //TOTALES
    public function obtenerTotalesEmpresaPlantaTemporadaDisponible($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT  
                                                         IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0) AS 'ENVASE', 
                                                         IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0) AS 'NETO' 
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2                                             
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerTotalesEmpresaTemporadaDisponible2($EMPRESA,   $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                            FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0),0,'de_DE') AS 'ENVASE', 
                                                            FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2                                             
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTotalesEmpresaPlantaTemporadaDisponible2($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                            FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0),0,'de_DE') AS 'ENVASE', 
                                                            FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2                                             
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    

    public function obtenerTotalesEmpresaPlantaTemporadaDespachado2($EMPRESA,  $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT  
                                                            FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0),0,'de_DE') AS 'ENVASE', 
                                                            FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                                    FROM fruta_eximateriaprima
                                                    WHERE ESTADO_REGISTRO = 1
                                                    AND ESTADO = 8                                             
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
                                                    AND ID_TEMPORADA = '" . $TEMPORADA . "' ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTotalesProceso($IDPROCESO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0) AS 'NETO' 
                                             FROM fruta_eximateriaprima
                                             WHERE ID_PROCESO = '" . $IDPROCESO . "' 
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesProceso2($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0),0,'de_DE') AS 'ENVASE', 
                                                     FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' , 
                                                     IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0) AS 'NETOSF' 
                                             FROM fruta_eximateriaprima
                                             WHERE ID_PROCESO = '" . $IDPROCESO . "'
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerTotalesRechazo($IDRECHAZADO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0) AS 'NETO' , 
                                                    IFNULL(SUM(KILOS_BRUTO_EXIMATERIAPRIMA),0) AS 'BRUTO' 
                                             FROM fruta_eximateriaprima
                                             WHERE ID_RECHAZADO = '" . $IDRECHAZADO . "' 
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerTotalesLevantamiento($IDLEVANTAMIENTO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0) AS 'NETO' , 
                                                    IFNULL(SUM(KILOS_BRUTO_EXIMATERIAPRIMA),0) AS 'BRUTO' 
                                             FROM fruta_eximateriaprima
                                             WHERE ID_LEVANTAMIENTO = '" . $IDLEVANTAMIENTO . "' 
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function obtenerTotalesRechazo2($IDRECHAZADO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' , 
                                                    FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'BRUTO' 
                                             FROM fruta_eximateriaprima
                                             WHERE ID_RECHAZADO = '" . $IDRECHAZADO . "' 
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function obtenerTotalesLevantamiento2($IDLEVANTAMIENTO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0),0,'de_DE') AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' , 
                                                    FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'BRUTO' 
                                             FROM fruta_eximateriaprima
                                             WHERE ID_LEVANTAMIENTO = '" . $IDLEVANTAMIENTO . "' 
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
  

    public function obtenerTotalProcesoEmpresaPlantaTemporada($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                         FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'NETO' 
                                             FROM fruta_eximateriaprima
                                             WHERE ESTADO_REGISTRO= 1
                                             AND ID_EMPRESA = '" . $EMPRESA . "'
                                             AND ID_PLANTA = '" . $PLANTA . "'
                                             AND ID_TEMPORADA = '" . $TEMPORADA . "' 
                                             AND ID_PROCESO IS NOT NULL ;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function obtenerTotalesDespacho($IDDESPACHO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT                                                     
                                                    IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0) AS 'ENVASE', 
                                                    IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0) AS 'NETO' ,
                                                    IFNULL(SUM(KILOS_BRUTO_EXIMATERIAPRIMA),0) AS 'BRUTO'                                              
                                             FROM fruta_eximateriaprima
                                             WHERE ID_DESPACHO = '" . $IDDESPACHO . "' 
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerTotalesDespacho2($IDDESPACHO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(CANTIDAD_ENVASE_EXIMATERIAPRIMA),0),0,'de_DE')  AS 'ENVASE', 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIMATERIAPRIMA),0),2,'de_DE')  AS 'NETO' ,
                                                    FORMAT(IFNULL(SUM(KILOS_BRUTO_EXIMATERIAPRIMA),0),2,'de_DE') AS 'BRUTO'
                                             FROM fruta_eximateriaprima
                                             WHERE ID_DESPACHO = '" . $IDDESPACHO . "' 
                                             AND  ESTADO_REGISTRO= 1;");
            $datos->execute();
            $resultado = $datos->fetchAll(PDO::FETCH_ASSOC);
            $datos=null;

            //	print_r($resultado);
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIOS DE ESTADO Y SELECION    
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO

    public function actualizarSelecionarProcesoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(),
                ESTADO = 3,     
                ID_PROCESO = ?          
            WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarSelecionarDespachoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(),
                ESTADO = 7,     
                ID_DESPACHO = ?          
            WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarSelecionarRechazoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(),
                ESTADO = 10,     
                ID_RECHAZADO = ?          
            WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_RECHAZADO'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizarSelecionarLevantamientoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(),
                ESTADO = 12,     
                ID_LEVANTAMIENTO = ?          
            WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_LEVANTAMIENTO'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO    
    public function actualizarDeselecionarProcesoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(), 
                ESTADO = 2,         
                ID_PROCESO = null          
            WHERE ID_EXIMATERIAPRIMA= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarDeselecionarDespachoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(), 
                ESTADO = 2,         
                ID_DESPACHO = null          
            WHERE ID_EXIMATERIAPRIMA= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizarDeselecionarRechazoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(), 
                ESTADO = 2,         
                COLOR = null,        
                ID_RECHAZADO = null          
            WHERE ID_EXIMATERIAPRIMA= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizarDeselecionarLevantamientoCambiarEstado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(), 
                ESTADO = 2,         
                COLOR = null,        
                ID_LEVANTAMIENTO = null          
            WHERE ID_EXIMATERIAPRIMA= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //CAMBIO A DESACTIVADO
    public function deshabilitarRecepcion(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {

        try {
            $query = "
                    UPDATE fruta_eximateriaprima SET	
                            MODIFICACION = SYSDATE(),		
                            ESTADO_REGISTRO = 0                            
                    WHERE FOLIO_AUXILIAR_EXIMATERIAPRIMA= ? AND  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET	
                        MODIFICACION = SYSDATE(),		
                        ESTADO_REGISTRO = 1
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //CAMBIO A ESTADO

    public function eliminadoRecepcion(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET	
                        MODIFICACION = SYSDATE(),		
                        ESTADO = 0
                WHERE FOLIO_AUXILIAR_EXIMATERIAPRIMA= ? AND  ID_RECEPCION = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('FOLIO_AUXILIAR_EXIMATERIAPRIMA'),
                        $EXIMATERIAPRIMA->__GET('ID_RECEPCION')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function eliminado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET	
                        MODIFICACION = SYSDATE(),		
                        ESTADO = 0
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function ingresando(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET
                        MODIFICACION = SYSDATE(),			
                        ESTADO = 1
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function vigente(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET
                        MODIFICACION = SYSDATE(),			
                        ESTADO = 2
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    public function enProceso(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET	
                        MODIFICACION = SYSDATE(),			
                        ESTADO = 3
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function procesado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                UPDATE fruta_eximateriaprima SET
                        MODIFICACION = SYSDATE(),				
                        ESTADO = 4
                WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function repaletizando(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET	
                                MODIFICACION = SYSDATE(),			
                                ESTADO = 5
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function repaletizado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET	
                                MODIFICACION = SYSDATE(),			
                                ESTADO = 6
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enDespacho(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET	
                                MODIFICACION = SYSDATE(),			
                                ESTADO = 7
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function despachado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),	
                                FECHA_DESPACHO = ?,			
                                ESTADO = 8
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('FECHA_DESPACHO'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function despachadoInterplanta(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                            UPDATE fruta_eximateriaprima SET	
                                    MODIFICACION = SYSDATE(), 		
                                    ESTADO = 8
                            WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enTransito(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),				
                                ESTADO = 9	,			
                                FECHA_DESPACHO = ?
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('FECHA_DESPACHO'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function rechazado(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),		
                                ESTADO = 10
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                         $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function rechazadoColor(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),				
                                COLOR = ?,				
                                ESTADO = 11
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                         $EXIMATERIAPRIMA->__GET('COLOR'),
                         $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function levantamientoColor(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),				
                                COLOR = ?,				
                                ESTADO = 2
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                         $EXIMATERIAPRIMA->__GET('COLOR'),
                         $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function objetadoColor(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),				
                                COLOR = ?,							
                                ESTADO = 2
                        WHERE ID_EXIMATERIAPRIMA = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('COLOR'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function AprobadoColor(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
                        UPDATE fruta_eximateriaprima SET
                                MODIFICACION = SYSDATE(),				
                                COLOR = ?,				
                                ESTADO = 3
                        WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                         $EXIMATERIAPRIMA->__GET('COLOR'),
                         $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function repaletizadoDespacho(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(),    		
                ESTADO = 6,
                ID_DESPACHO3 = ?          
            WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_DESPACHO3'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function repaletizadoProceso(EXIMATERIAPRIMA $EXIMATERIAPRIMA)
    {
        try {
            $query = "
            UPDATE fruta_eximateriaprima SET
                MODIFICACION = SYSDATE(),    		
                ESTADO = 6,
                ID_PROCESO2 = ?          
            WHERE ID_EXIMATERIAPRIMA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIMATERIAPRIMA->__GET('ID_PROCESO2'),
                        $EXIMATERIAPRIMA->__GET('ID_EXIMATERIAPRIMA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //OTRAS FUNCIONALIDADES

    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  RECEPCIONS



    public function obtenerFolio($IDFOLIO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT IFNULL(MAX(FOLIO_AUXILIAR_EXIMATERIAPRIMA),0) AS 'ULTIMOFOLIO'
                                                FROM fruta_eximateriaprima  
                                                WHERE  ID_FOLIO= '" . $IDFOLIO . "' 
                                                AND FOLIO_MANUAL = 0
                                                AND ID_DESPACHO2 IS NULL   
                                                AND ID_DESPACHO3 IS NULL   
                                                AND ID_PROCESO2 IS NULL                                                                             
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
