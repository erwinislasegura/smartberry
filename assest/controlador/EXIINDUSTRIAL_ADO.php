<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/EXIINDUSTRIAL.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class EXIINDUSTRIAL_ADO
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
    public function listarExiindustrial()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial limit 8;	");
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
    public function listarExiindustrialCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,  DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'FECHA_EMBALADO_EXIINDUSTRIAL',
                                                        IFNULL(ID_PROCESO,'-') AS 'PROCESO',
                                                        IFNULL(ID_REEMBALAJE,'-') AS 'REEMBALAJE'
                                            FROM fruta_exiindustrial 
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









    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verExiindustrial($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_EXIINDUSTRIAL= '" . $ID . "';");
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
    public function agregarExiindustrialRecepcion(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   

                                                    CANTIDAD_ENVASE_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,    
                                                    KILOS_BRUTO_EXIINDUSTRIAL,    
                                                    KILOS_PROMEDIO_EXIINDUSTRIAL,  
                                                    PESO_PALLET_EXIINDUSTRIAL,        

                                                    GASIFICADO,    
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL, 
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,   
                                                    FECHA_RECEPCION,    

                                                    ID_TMANEJO, 
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,
                                                    ID_PRODUCTOR,

                                                    ID_VESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    ID_RECEPCION,

                                                    INGRESO,
                                                    MODIFICACION,  
                                                    TCOBRO,    
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?, ?,  ?, ?, ?, ?,  ?, ?, ?, ?, ?,  SYSDATE(), SYSDATE(), 1,  1, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('CANTIDAD_ENVASE_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_BRUTO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_PROMEDIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('PESO_PALLET_EXIINDUSTRIAL'),
                        
                        $EXIINDUSTRIAL->__GET('GASIFICADO'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_RECEPCION'),

                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),

                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //REGISTRO DE UNA NUEVA FILA    
    public function agregarExiindustrialProceso(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,       
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,        
                                                    FECHA_PROCESO,          
                                                    TCOBRO,    
                                                    ID_TMANEJO, 
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    ID_PROCESO,
                                                    INGRESO,
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                    
                                                ) VALUES
	       	( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?,  SYSDATE(),SYSDATE(),  2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_PROCESO'),
                        $EXIINDUSTRIAL->__GET('TCOBRO'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarExiindustrialReembalaje(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,       
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,        
                                                    FECHA_REEMBALAJE,       
                                                    TCOBRO,    
                                                    ID_TMANEJO, 
                                                    ID_FOLIO,
                                                    ID_ESTANDAR,
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    ID_REEMBALAJE,
                                                    INGRESO,
                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO,
                                                    ID_TCALIBRE
                                                ) VALUES
	       	( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?,  SYSDATE(),SYSDATE(),  1, 1,?);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('TCOBRO'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('ID_TCALIBRE')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarExiindustrialGuia(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        if ($EXIINDUSTRIAL->__GET('ID_TCALIBRE') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_TCALIBRE', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_TEMBALAJE') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_TEMBALAJE', NULL);
        }    
        if ($EXIINDUSTRIAL->__GET('ID_TTRATAMIENTO1') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_TTRATAMIENTO2', NULL);
        } 
        if ($EXIINDUSTRIAL->__GET('ID_ESTANDAR') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_ESTANDAR', NULL);
        }       
        if ($EXIINDUSTRIAL->__GET('ID_ESTANDARMP') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_ESTANDARMP', NULL);
        }    
        if ($EXIINDUSTRIAL->__GET('ID_RECEPCION') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_RECEPCION', NULL);
        }  
        if ($EXIINDUSTRIAL->__GET('ID_PROCESO') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_PROCESO', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_REEMBALAJE') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_DESPACHO2') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_DESPACHO2', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_DESPACHO3') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_DESPACHO3', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_PLANTA2') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_PLANTA2', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_PLANTA3') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_PLANTA3', NULL);
        } 
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,      

                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,    

                                                    STOCK,    
                                                    EMBOLSADO,    
                                                    PREFRIO,    
                                                    TESTADOSAG,    
                                                    GASIFICADO,   

                                                    TCOBRO,     

                                                    FECHA_RECEPCION,     
                                                    FECHA_PROCESO,     
                                                    FECHA_REEMBALAJE,              
                                                    INGRESO,    
                                                    
                                                    ID_TMANEJO, 
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_ESTANDAR,
                                                    ID_FOLIO,

                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    
                                                    ID_TCALIBRE,
                                                    ID_TEMBALAJE,
                                                    ID_TTRATAMIENTO1,
                                                    ID_TTRATAMIENTO2,

                                                    ID_ESTANDARMP,
                                                    ID_RECEPCION,
                                                    ID_PROCESO,
                                                    ID_REEMBALAJE,

                                                    ID_DESPACHO2,
                                                    ID_DESPACHO3,

                                                    
                                                    ID_PLANTA2,
                                                    ID_PLANTA3,
                                                    ID_EXIINDUSTRIAL2,

                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?, ?,   ?, ?,  ?, ?, ?, ?, ?,    ?,   ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?,   ?, ?, ?, ?,   ?, ?, ?, ?,   ?, ?,   ?, ?, ?, SYSDATE(),  2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(


                        
                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        
                        $EXIINDUSTRIAL->__GET('STOCK'),
                        $EXIINDUSTRIAL->__GET('EMBOLSADO'),
                        $EXIINDUSTRIAL->__GET('PREFRIO'),
                        $EXIINDUSTRIAL->__GET('TESTADOSAG'),
                        $EXIINDUSTRIAL->__GET('GASIFICADO'),  

                        $EXIINDUSTRIAL->__GET('TCOBRO'),
                      
                        $EXIINDUSTRIAL->__GET('FECHA_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('FECHA_PROCESO'),
                        $EXIINDUSTRIAL->__GET('FECHA_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('INGRESO'),
                        
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),

                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),                       
              
                        $EXIINDUSTRIAL->__GET('ID_TCALIBRE'),
                        $EXIINDUSTRIAL->__GET('ID_TEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('ID_TTRATAMIENTO1'),
                        $EXIINDUSTRIAL->__GET('ID_TTRATAMIENTO2'),

                        $EXIINDUSTRIAL->__GET('ID_ESTANDARMP'),
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO'),
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),

                        $EXIINDUSTRIAL->__GET('ID_DESPACHO2'),
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO3'),
                        
                        $EXIINDUSTRIAL->__GET('ID_PLANTA2'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA3'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL2')     
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarExiindustrialDespachoNuevo(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        if ($EXIINDUSTRIAL->__GET('ID_TCALIBRE') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_TCALIBRE', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_TEMBALAJE') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_TEMBALAJE', NULL);
        }    
        if ($EXIINDUSTRIAL->__GET('ID_TTRATAMIENTO1') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_TTRATAMIENTO2', NULL);
        } 
        if ($EXIINDUSTRIAL->__GET('ID_ESTANDAR') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_ESTANDAR', NULL);
        }       
        if ($EXIINDUSTRIAL->__GET('ID_ESTANDARMP') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_ESTANDARMP', NULL);
        }    
        if ($EXIINDUSTRIAL->__GET('ID_RECEPCION') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_RECEPCION', NULL);
        }  
        if ($EXIINDUSTRIAL->__GET('ID_PROCESO') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_PROCESO', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_REEMBALAJE') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_DESPACHO') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_DESPACHO', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_DESPACHO2') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_DESPACHO2', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_PLANTA2') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_PLANTA2', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_PLANTA3') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_PLANTA3', NULL);
        } 
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,      

                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,    

                                                    STOCK,    
                                                    EMBOLSADO,    
                                                    PREFRIO,    
                                                    TESTADOSAG,    
                                                    GASIFICADO,   

                                                    TCOBRO,     

                                                    FECHA_RECEPCION,     
                                                    FECHA_PROCESO,     
                                                    FECHA_REEMBALAJE,              
                                                    INGRESO,    
                                                    
                                                    ID_TMANEJO, 
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_ESTANDAR,
                                                    ID_FOLIO,

                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    
                                                    ID_TCALIBRE,
                                                    ID_TEMBALAJE,
                                                    ID_TTRATAMIENTO1,
                                                    ID_TTRATAMIENTO2,

                                                    ID_ESTANDARMP,
                                                    ID_RECEPCION,
                                                    ID_PROCESO,
                                                    ID_REEMBALAJE,

                                                    ID_DESPACHO,
                                                    ID_DESPACHO2,
                                                    
                                                    ID_PLANTA2,
                                                    ID_PLANTA3,
                                                    ID_EXIINDUSTRIAL2,

                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?, ?,   ?, ?,  ?, ?, ?, ?, ?,    ?,   ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?,   ?, ?, ?, ?,   ?, ?, ?, ?,   ?, ?,   ?, ?, ?,      SYSDATE(),  3, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(


                        
                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        
                        $EXIINDUSTRIAL->__GET('STOCK'),
                        $EXIINDUSTRIAL->__GET('EMBOLSADO'),
                        $EXIINDUSTRIAL->__GET('PREFRIO'),
                        $EXIINDUSTRIAL->__GET('TESTADOSAG'),
                        $EXIINDUSTRIAL->__GET('GASIFICADO'),  

                        $EXIINDUSTRIAL->__GET('TCOBRO'),
                      
                        $EXIINDUSTRIAL->__GET('FECHA_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('FECHA_PROCESO'),
                        $EXIINDUSTRIAL->__GET('FECHA_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('INGRESO'),
                        
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),

                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),                       
              
                        $EXIINDUSTRIAL->__GET('ID_TCALIBRE'),
                        $EXIINDUSTRIAL->__GET('ID_TEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('ID_TTRATAMIENTO1'),
                        $EXIINDUSTRIAL->__GET('ID_TTRATAMIENTO2'),

                        $EXIINDUSTRIAL->__GET('ID_ESTANDARMP'),
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO'),
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),

                        $EXIINDUSTRIAL->__GET('ID_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO2'),
                        
                        $EXIINDUSTRIAL->__GET('ID_PLANTA2'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA3'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL2')     
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function agregarExiindustrialDespachoResto(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        if ($EXIINDUSTRIAL->__GET('ID_TCALIBRE') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_TCALIBRE', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_TEMBALAJE') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_TEMBALAJE', NULL);
        }    
        if ($EXIINDUSTRIAL->__GET('ID_TTRATAMIENTO1') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_TTRATAMIENTO2', NULL);
        } 
        if ($EXIINDUSTRIAL->__GET('ID_ESTANDAR') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_ESTANDAR', NULL);
        }       
        if ($EXIINDUSTRIAL->__GET('ID_ESTANDARMP') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_ESTANDARMP', NULL);
        }    
        if ($EXIINDUSTRIAL->__GET('ID_RECEPCION') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_RECEPCION', NULL);
        }  
        if ($EXIINDUSTRIAL->__GET('ID_PROCESO') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_PROCESO', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_REEMBALAJE') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_REEMBALAJE', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_DESPACHO2') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_DESPACHO2', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_DESPACHO3') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_DESPACHO3', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_PLANTA2') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_PLANTA2', NULL);
        }
        if ($EXIINDUSTRIAL->__GET('ID_PLANTA3') == NULL) {
            $EXIINDUSTRIAL->__SET('ID_PLANTA3', NULL);
        } 
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,      

                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL,   
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,    

                                                    STOCK,    
                                                    EMBOLSADO,    
                                                    PREFRIO,    
                                                    TESTADOSAG,    
                                                    GASIFICADO,   

                                                    TCOBRO,     

                                                    FECHA_RECEPCION,     
                                                    FECHA_PROCESO,     
                                                    FECHA_REEMBALAJE,              
                                                    INGRESO,    
                                                    
                                                    ID_TMANEJO, 
                                                    ID_PRODUCTOR,
                                                    ID_VESPECIES,
                                                    ID_ESTANDAR,
                                                    ID_FOLIO,

                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    
                                                    ID_TCALIBRE,
                                                    ID_TEMBALAJE,
                                                    ID_TTRATAMIENTO1,
                                                    ID_TTRATAMIENTO2,

                                                    ID_ESTANDARMP,
                                                    ID_RECEPCION,
                                                    ID_PROCESO,
                                                    ID_REEMBALAJE,

                                                    ID_DESPACHO2,
                                                    ID_DESPACHO3,

                                                    
                                                    ID_PLANTA2,
                                                    ID_PLANTA3,
                                                    ID_EXIINDUSTRIAL2,

                                                    MODIFICACION,
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?, ?,   ?, ?,  ?, ?, ?, ?, ?,    ?,   ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?,   ?, ?, ?, ?,   ?, ?, ?, ?,   ?, ?,   ?, ?, ?, SYSDATE(),  2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(


                        
                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),
                        
                        $EXIINDUSTRIAL->__GET('STOCK'),
                        $EXIINDUSTRIAL->__GET('EMBOLSADO'),
                        $EXIINDUSTRIAL->__GET('PREFRIO'),
                        $EXIINDUSTRIAL->__GET('TESTADOSAG'),
                        $EXIINDUSTRIAL->__GET('GASIFICADO'),  

                        $EXIINDUSTRIAL->__GET('TCOBRO'),
                      
                        $EXIINDUSTRIAL->__GET('FECHA_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('FECHA_PROCESO'),
                        $EXIINDUSTRIAL->__GET('FECHA_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('INGRESO'),
                        
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_FOLIO'),

                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),                       
              
                        $EXIINDUSTRIAL->__GET('ID_TCALIBRE'),
                        $EXIINDUSTRIAL->__GET('ID_TEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('ID_TTRATAMIENTO1'),
                        $EXIINDUSTRIAL->__GET('ID_TTRATAMIENTO2'),

                        $EXIINDUSTRIAL->__GET('ID_ESTANDARMP'),
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO'),
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),

                        $EXIINDUSTRIAL->__GET('ID_DESPACHO2'),
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO3'),
                        
                        $EXIINDUSTRIAL->__GET('ID_PLANTA2'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA3'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL2')     
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function agregarExiindustrialRechazoMP(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   

                                                    CANTIDAD_ENVASE_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,    
                                                    KILOS_BRUTO_EXIINDUSTRIAL,    
                                                    KILOS_PROMEDIO_EXIINDUSTRIAL,  
                                                    PESO_PALLET_EXIINDUSTRIAL,        

                                                    GASIFICADO,     
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL, 
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,   

                                                    ID_TMANEJO, 
                                                    ID_ESTANDARMP,
                                                    ID_PRODUCTOR,

                                                    ID_VESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    ID_RECHAZADOMP,

                                                    INGRESO,
                                                    MODIFICACION,
                                                    TCOBRO,              
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?,    ?, ?, ?, ?, ?,     ?, ?, ?,   ?, ?, ?,   ?, ?, ?, ?, ?,  SYSDATE(),SYSDATE(), 1, 2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('CANTIDAD_ENVASE_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_BRUTO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_PROMEDIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('PESO_PALLET_EXIINDUSTRIAL'),
                        
                        $EXIINDUSTRIAL->__GET('GASIFICADO'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDARMP'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),

                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_RECHAZADOMP')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function agregarExiindustrialLevantamientoMP(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query =
                "INSERT INTO fruta_exiindustrial (  
                                                    FOLIO_EXIINDUSTRIAL,
                                                    FOLIO_AUXILIAR_EXIINDUSTRIAL,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL,   

                                                    CANTIDAD_ENVASE_EXIINDUSTRIAL,   
                                                    KILOS_NETO_EXIINDUSTRIAL,    
                                                    KILOS_BRUTO_EXIINDUSTRIAL,    
                                                    KILOS_PROMEDIO_EXIINDUSTRIAL,  
                                                    PESO_PALLET_EXIINDUSTRIAL,        

                                                    GASIFICADO,   
                                                    ESTADO_REGISTRO,  
                                                    ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL, 
                                                    ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL,   

                                                    ID_TMANEJO, 
                                                    ID_ESTANDARMP,
                                                    ID_PRODUCTOR,

                                                    ID_VESPECIES,
                                                    ID_EMPRESA, 
                                                    ID_PLANTA, 
                                                    ID_TEMPORADA,
                                                    ID_LEVANTAMIENTOMP,

                                                    INGRESO,
                                                    MODIFICACION,
                                                    TCOBRO,              
                                                    ESTADO,  
                                                    ESTADO_REGISTRO
                                                ) VALUES
	       	( ?, ?, ?,    ?, ?, ?, ?, ?,     ?, ?, ?,   ?, ?, ?,   ?, ?, ?, ?, ?,  SYSDATE(),SYSDATE(), 1, 2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('CANTIDAD_ENVASE_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_BRUTO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_PROMEDIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('PESO_PALLET_EXIINDUSTRIAL'),
                        
                        $EXIINDUSTRIAL->__GET('GASIFICADO'),
                        $EXIINDUSTRIAL->__GET('ESTADO_REGISTRO'),
                        $EXIINDUSTRIAL->__GET('ALIAS_DINAMICO_FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ALIAS_ESTATICO_FOLIO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDARMP'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),

                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_LEVANTAMIENTOMP')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarExiindustrial($id)
    {
        try {
            $sql = "DELETE FROM fruta_exiindustrial WHERE ID_EXIINDUSTRIAL=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarExiindustrialRecepcion(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
                MODIFICACION =  SYSDATE(),
                FECHA_EMBALADO_EXIINDUSTRIAL = ?,

                CANTIDAD_ENVASE_EXIINDUSTRIAL = ?,
                KILOS_NETO_EXIINDUSTRIAL = ?,
                KILOS_BRUTO_EXIINDUSTRIAL = ?,
                KILOS_PROMEDIO_EXIINDUSTRIAL = ?,
                PESO_PALLET_EXIINDUSTRIAL = ?,

                GASIFICADO = ?,
                FECHA_RECEPCION = ?,

                ID_TMANEJO = ?, 
                ID_ESTANDAR = ?, 
                ID_PRODUCTOR = ?,

                ID_VESPECIES = ?,
                ID_EMPRESA = ?,
                ID_PLANTA = ?, 
                ID_TEMPORADA = ? ,
                ID_RECEPCION = ?           
		WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('CANTIDAD_ENVASE_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_BRUTO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_PROMEDIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('PESO_PALLET_EXIINDUSTRIAL'),
                        
                        $EXIINDUSTRIAL->__GET('GASIFICADO'),
                        $EXIINDUSTRIAL->__GET('FECHA_RECEPCION'),

                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),

                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarExiindustrialProceso(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
                MODIFICACION =  SYSDATE(),
                FECHA_EMBALADO_EXIINDUSTRIAL = ?,
                KILOS_NETO_EXIINDUSTRIAL = ?,
                FECHA_PROCESO = ?,
                TCOBRO = ?,
                ID_TMANEJO = ?, 
                ID_ESTANDAR = ?, 
                ID_PRODUCTOR = ?,
                ID_VESPECIES = ?,
                ID_EMPRESA = ?,
                ID_PLANTA = ?, 
                ID_TEMPORADA = ? ,
                ID_PROCESO = ?         
		WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_PROCESO'),
                        $EXIINDUSTRIAL->__GET('TCOBRO'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarExiindustrialReembalaje(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
                MODIFICACION =  SYSDATE(),
                FECHA_EMBALADO_EXIINDUSTRIAL = ?,
                KILOS_NETO_EXIINDUSTRIAL = ?,
                FECHA_REEMBALAJE = ?,
                TCOBRO = ?,
                ID_TMANEJO = ?, 
                ID_ESTANDAR = ?, 
                ID_PRODUCTOR = ?,
                ID_VESPECIES = ?,
                ID_EMPRESA = ?,
                ID_PLANTA = ?, 
                ID_TEMPORADA = ? ,
                ID_REEMBALAJE = ? ,
                ID_TCALIBRE = ?            
		WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FECHA_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('TCOBRO'),
                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDAR'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),
                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('ID_TCALIBRE'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function actualizarExiindustrialLevantamientoMP(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
            UPDATE fruta_exiindustrial SET
                    MODIFICACION =  SYSDATE(),

                    FECHA_EMBALADO_EXIINDUSTRIAL = ?,

                    CANTIDAD_ENVASE_EXIINDUSTRIAL = ?,
                    KILOS_NETO_EXIINDUSTRIAL = ?,
                    KILOS_BRUTO_EXIINDUSTRIAL = ?,
                    KILOS_PROMEDIO_EXIINDUSTRIAL = ?,
                    PESO_PALLET_EXIINDUSTRIAL = ?,
                    
                    GASIFICADO = ?,
                    ESTADO_REGISTRO = ?,
                    ESTADO = ?,

                    ID_TMANEJO = ?, 
                    ID_ESTANDARMP = ?, 
                    ID_PRODUCTOR = ?,

                    ID_VESPECIES = ?,
                    ID_EMPRESA = ?,
                    ID_PLANTA = ?, 
                    ID_TEMPORADA = ? ,
                    ID_LEVANTAMIENTOMP = ?   
                            
            WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('CANTIDAD_ENVASE_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_BRUTO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_PROMEDIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('PESO_PALLET_EXIINDUSTRIAL'),
                        
                        $EXIINDUSTRIAL->__GET('GASIFICADO'),
                        $EXIINDUSTRIAL->__GET('ESTADO_REGISTRO'),
                        $EXIINDUSTRIAL->__GET('ESTADO'),

                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDARMP'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),

                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_LEVANTAMIENTOMP'),

                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarExiindustrialRechazoMP(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
            UPDATE fruta_exiindustrial SET
                    MODIFICACION =  SYSDATE(),

                    FECHA_EMBALADO_EXIINDUSTRIAL = ?,

                    CANTIDAD_ENVASE_EXIINDUSTRIAL = ?,
                    KILOS_NETO_EXIINDUSTRIAL = ?,
                    KILOS_BRUTO_EXIINDUSTRIAL = ?,
                    KILOS_PROMEDIO_EXIINDUSTRIAL = ?,
                    PESO_PALLET_EXIINDUSTRIAL = ?,
                    
                    GASIFICADO = ?,

                    ID_TMANEJO = ?, 
                    ID_ESTANDARMP = ?, 
                    ID_PRODUCTOR = ?,

                    ID_VESPECIES = ?,
                    ID_EMPRESA = ?,
                    ID_PLANTA = ?, 
                    ID_TEMPORADA = ? ,
                    ID_RECHAZADOMP = ?   
                            
            WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_EMBALADO_EXIINDUSTRIAL'),

                        $EXIINDUSTRIAL->__GET('CANTIDAD_ENVASE_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_BRUTO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('KILOS_PROMEDIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('PESO_PALLET_EXIINDUSTRIAL'),
                        
                        $EXIINDUSTRIAL->__GET('GASIFICADO'),

                        $EXIINDUSTRIAL->__GET('ID_TMANEJO'),
                        $EXIINDUSTRIAL->__GET('ID_ESTANDARMP'),
                        $EXIINDUSTRIAL->__GET('ID_PRODUCTOR'),

                        $EXIINDUSTRIAL->__GET('ID_VESPECIES'),
                        $EXIINDUSTRIAL->__GET('ID_EMPRESA'),
                        $EXIINDUSTRIAL->__GET('ID_PLANTA'),
                        $EXIINDUSTRIAL->__GET('ID_TEMPORADA'),
                        $EXIINDUSTRIAL->__GET('ID_RECHAZADOMP'),

                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO_REGISTRO = 0
                WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitarRecepcion(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO_REGISTRO = 0	,	
                        ID_RECEPCION = ?
                WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deshabilitarProceso(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO_REGISTRO = 0	                        
                WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ? AND FOLIO_EXIINDUSTRIAL= ? AND ID_PROCESO = ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deshabilitarReembalaje(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO_REGISTRO = 0	,	
                        ID_REEMBALAJE = ?
                WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
    public function deshabilitarEliminarRechazomp(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO = 0	,		
                        ESTADO_REGISTRO = 0	
                WHERE  ID_RECHAZADOMP= ? AND FOLIO_EXIINDUSTRIAL= ? AND FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_RECHAZADOMP'),
                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function deshabilitarEliminarLevantamientomp(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {

        try {
            $query = "
                UPDATE fruta_exiindustrial SET	
                        MODIFICACION =  SYSDATE(),		
                        ESTADO = 0	,		
                        ESTADO_REGISTRO = 0	
                WHERE  ID_LEVANTAMIENTOMP= ? AND FOLIO_EXIINDUSTRIAL= ? AND FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_LEVANTAMIENTOMP'),
                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                UPDATE fruta_exiindustrial SET		
                        MODIFICACION =  SYSDATE(),	
                        ESTADO_REGISTRO = 1
                WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO A ESTADO
    public function eliminado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE fruta_exiindustrial SET	
                            MODIFICACION =  SYSDATE(),		
                            ESTADO = 0
                    WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminadoRecepcion(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE fruta_exiindustrial SET	
                            MODIFICACION =  SYSDATE(),		
                            ESTADO = 0	,	
                            ID_RECEPCION = ?
                    WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_RECEPCION'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function eliminadoProceso(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE fruta_exiindustrial SET	
                            MODIFICACION =  SYSDATE(),		
                            ESTADO = 0	
                           
                    WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ? AND FOLIO_EXIINDUSTRIAL= ? AND  ID_PROCESO = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('FOLIO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ID_PROCESO')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminadoReembaleaje(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                    UPDATE fruta_exiindustrial SET	
                            MODIFICACION =  SYSDATE(),		
                            ESTADO = 0	,	
                            ID_REEMBALAJE = ?
                    WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_REEMBALAJE'),
                        $EXIINDUSTRIAL->__GET('FOLIO_AUXILIAR_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function ingresado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),		
                                ESTADO = 1
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function vigente(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),		
                                ESTADO = 2
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enDespacho(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),		
                                ESTADO = 3
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function despachado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),	
                                ESTADO = 4	,	
                                FECHA_DESPACHO = ?
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function despachadoInterplanta(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),	
                                ESTADO = 4	
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function enTransito(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),		
                                ESTADO = 5	,	
                                FECHA_DESPACHO = ?
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('FECHA_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
    public function repaletizado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
                        UPDATE fruta_exiindustrial SET	
                                MODIFICACION = SYSDATE(),	   
                                ID_DESPACHO3 = ?   ,        	
                                ESTADO = 6
                        WHERE ID_EXIINDUSTRIAL= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO3'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarSelecionarDespachoAgregarNeto(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            MODIFICACION = SYSDATE(),      
            ID_DESPACHO = ?           
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarSelecionarDespachoNeto(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            MODIFICACION = SYSDATE(),     
            ESTADO = 3,           
            ID_DESPACHO = ? ,       
            KILOS_NETO_EXIINDUSTRIAL = ?          
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('KILOS_NETO_EXIINDUSTRIAL'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarSelecionarDespachoAgregarPrecio(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            MODIFICACION = SYSDATE(),      
            ID_DESPACHO = ? ,      
            PRECIO_KILO = ?          
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('PRECIO_KILO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO


    public function actualizarSelecionarDespachoCambiarEstado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            MODIFICACION = SYSDATE(),
            ESTADO = 3,           
            ID_DESPACHO = ?          
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_DESPACHO'),
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO
    public function actualizarDeselecionarDespachoCambiarEstado(EXIINDUSTRIAL $EXIINDUSTRIAL)
    {
        try {
            $query = "
		UPDATE fruta_exiindustrial SET
            ESTADO = 2,          
            MODIFICACION = SYSDATE(), 
            ID_DESPACHO = null, 
            PRECIO_KILO = null          
		WHERE ID_EXIINDUSTRIAL= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EXIINDUSTRIAL->__GET('ID_EXIINDUSTRIAL')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //
    public function verExistenciaPorDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial 
                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
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
    
    public function verExistenciaPorDespacho2($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial 
                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                AND ESTADO_REGISTRO = 1
                                AND ESTADO = 3
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
    public function verExistenciaPorDespachoEnTransito($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial 
                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                AND ESTADO_REGISTRO = 1
                                AND ESTADO = 5;");
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


    //LISTAR
    public function listarExiindustrialTemporadaDisponibleCBX(  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',     
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eindustrial estandar 
                                                WHERE existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1
                                                AND  estandar.COBRO = 1                      
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialEmpresaTemporadaDisponibleCBX($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',     
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eindustrial estandar 
                                                WHERE existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1
                                                AND  estandar.COBRO = 1                      
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialRechazoMPTemporadaDisponibleCBX(  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',      
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',          
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_erecepcion estandar 
                                                WHERE existencia.ID_ESTANDARMP=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialRechazoMPEmpresaTemporadaDisponibleCBX($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',      
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',          
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_erecepcion estandar 
                                                WHERE existencia.ID_ESTANDARMP=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialRechazoPTTemporadaDisponibleCBX(  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',      
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',        
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eexportacion estandar 
                                                WHERE existencia.ID_ESTANDARPT=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialRechazoPTEmpresaTemporadaDisponibleCBX($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',      
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',        
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eexportacion estandar 
                                                WHERE existencia.ID_ESTANDARPT=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
   
    public function listarExiindustrialEmpresaPlantaTemporadaDisponibleCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',     
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO',
                                                    ID_TCALIBRE  
                                                FROM fruta_exiindustrial existencia, estandar_eindustrial estandar 
                                                WHERE existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1
                                                AND  estandar.COBRO = 1                      
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialRechazoMPEmpresaPlantaTemporadaDisponibleCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',     
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_erecepcion estandar 
                                                WHERE existencia.ID_ESTANDARMP=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialRechazoPTEmpresaPlantaTemporadaDisponibleCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',     
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eexportacion estandar 
                                                WHERE existencia.ID_ESTANDARPT=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    
    public function listarExiindustrialEmpresaPlantaTemporadaDisponibleCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                        DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                        DATE_FORMAT(existencia.INGRESO, '%d/%m/%Y ') AS 'INGRESO',
                                                        DATE_FORMAT(existencia.MODIFICACION, '%d/%m/%Y ') AS 'MODIFICACION',      
                                                        DATE_FORMAT(existencia.FECHA_EMBALADO_EXIINDUSTRIAL, '%d/%m/%Y') AS 'EMBALADO',         
                                                        FORMAT(IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0),2,'de_DE') AS 'NETO' 
                                                    FROM fruta_exiindustrial existencia, estandar_eindustrial estandar 
                                                    WHERE existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    AND  existencia.ESTADO = 2
                                                    AND  existencia.ESTADO_REGISTRO = 1
                                                    AND  estandar.COBRO = 1                     
                                            AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                            AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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

    public function listarExiindustrialRechazoMpEmpresaPlantaTemporadaDespachadoCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(existencia.INGRESO, '%d/%m/%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%d/%m/%Y ') AS 'MODIFICACION',      
                                                    DATE_FORMAT(existencia.FECHA_EMBALADO_EXIINDUSTRIAL, '%d/%m/%Y') AS 'EMBALADO',     
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_erecepcion estandar 
                                                WHERE existencia.ID_ESTANDARPT=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 4
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialRechazoPTEmpresaPlantaTemporadaDespachadoCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(existencia.INGRESO, '%d/%m/%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%d/%m/%Y ') AS 'MODIFICACION',      
                                                    DATE_FORMAT(existencia.FECHA_EMBALADO_EXIINDUSTRIAL, '%d/%m/%Y') AS 'EMBALADO',     
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eexportacion estandar 
                                                WHERE existencia.ID_ESTANDARPT=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 4
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    
    public function listarExiindustrialEmpresaPlantaTemporadaDespachadoCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                        DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                        DATE_FORMAT(existencia.INGRESO, '%d/%m/%Y ') AS 'INGRESO',
                                                        DATE_FORMAT(existencia.MODIFICACION, '%d/%m/%Y ') AS 'MODIFICACION',      
                                                        DATE_FORMAT(existencia.FECHA_EMBALADO_EXIINDUSTRIAL, '%d/%m/%Y') AS 'EMBALADO',         
                                                        FORMAT(IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0),2,'de_DE') AS 'NETO' 
                                                    FROM fruta_exiindustrial existencia, estandar_eindustrial estandar 
                                                    WHERE existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                    AND  existencia.ESTADO = 4
                                                    AND  existencia.ESTADO_REGISTRO = 1
                                                    AND  estandar.COBRO = 1                     
                                            AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                            AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    
    public function listarExiindustrialEmpresaTemporadaDespachadoCBX($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',     
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia
                                                WHERE existencia.ID_ESTANDAR
                                                AND  existencia.ESTADO = 4
                                                AND  existencia.ESTADO_REGISTRO = 1                     
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialEmpresaPlantaTemporadaDespachadoCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT  *,
                                                    DATEDIFF(SYSDATE(), existencia.FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(existencia.INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                    DATE_FORMAT(existencia.MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                    existencia.FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',     
                                                    IFNULL(existencia.KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia
                                                WHERE existencia.ID_ESTANDAR
                                                AND  existencia.ESTADO = 4
                                                AND  existencia.ESTADO_REGISTRO = 1                     
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialEmpresaPlantaTemporadaCBX($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                        DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                        IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                        IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                        IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                        IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                        FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',     
                                                        IFNULL(KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO'    
                                        FROM fruta_exiindustrial 
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'	");
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

    public function listarExiindustrialEmpresaTemporadaCBX($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                        DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                        IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                        IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                        IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                        IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                        DATE_FORMAT(INGRESO, '%Y-%m-%d ') AS 'INGRESO',
                                                        DATE_FORMAT(MODIFICACION, '%Y-%m-%d ') AS 'MODIFICACION',      
                                                        FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',     
                                                        IFNULL(KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO'    
                                        FROM fruta_exiindustrial 
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function listarExiindustrialEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                        IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                        IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                        IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                        IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',      
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',     
                                                    FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL,0),2,'de_DE') AS 'NETO'    
                                        FROM fruta_exiindustrial 
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'	");
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
    public function buscarExiindustrialEmpresaPlantaTemporadaCBX2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT *,  
                                                    DATEDIFF(SYSDATE(), FECHA_EMBALADO_EXIINDUSTRIAL) AS 'DIAS',    
                                                    DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y ') AS 'RECEPCION',
                                                    DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y ') AS 'PROCESO',
                                                    DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y ') AS 'REEMBALAJE',
                                                    DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y ') AS 'DESPACHO',
                                                    DATE_FORMAT(INGRESO, '%d-%m-%Y ') AS 'INGRESO',
                                                    DATE_FORMAT(MODIFICACION, '%d-%m-%Y ') AS 'MODIFICACION',      
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',     
                                                    FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL,0),2,'de_DE') AS 'NETO'    
                                        FROM fruta_exiindustrial 
                                        WHERE ID_EMPRESA = '" . $EMPRESA . "' 
                                            AND ID_PLANTA = '" . $PLANTA . "'
                                            AND ID_TEMPORADA = '" . $TEMPORADA . "'	
                                            AND ESTADO_REGISTRO = 1
                                            AND ESTADO = 2");
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


    //BUSCAR
    public function buscarPorRecepcionIngresado($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial 
                                      WHERE ID_RECEPCION= '" . $IDRECEPCION . "'  
                                      AND ESTADO = 1
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
    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial 
                                      WHERE ID_RECEPCION= '" . $IDRECEPCION . "'  
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
    public function buscarPorDespacho($IDDESPACHOIND)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                    FECHA_EMBALADO_EXIINDUSTRIAL AS 'EMBALADO',
                                                    IFNULL(DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y'),'Sin Datos') AS 'RECEPCION',
                                                    IFNULL(DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y'),'Sin Datos') AS 'PROCESO',
                                                    IFNULL(DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y'),'Sin Datos') AS 'REEMBALAJE',
                                                    IFNULL(DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y'),'Sin Datos') AS 'DESPACHO',
                                                    IFNULL(KILOS_NETO_EXIINDUSTRIAL,0) AS 'NETO'  ,
                                                    IFNULL(PRECIO_KILO,0) AS 'KILOP'  ,  
                                                    IFNULL(KILOS_NETO_EXIINDUSTRIAL*PRECIO_KILO,0) AS 'PRECIO'   
                                        FROM fruta_exiindustrial 
                                        WHERE ID_DESPACHO= '" . $IDDESPACHOIND . "'   
                                        AND ESTADO BETWEEN 3 AND  5
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
    public function buscarPorDespacho2($IDDESPACHOIND)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                    DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',
                                                    DATE_FORMAT(FECHA_RECEPCION, '%d-%m-%Y ') AS 'RECEPCION',
                                                    DATE_FORMAT(FECHA_PROCESO, '%d-%m-%Y ') AS 'PROCESO',
                                                    DATE_FORMAT(FECHA_REEMBALAJE, '%d-%m-%Y ') AS 'REEMBALAJE',
                                                    DATE_FORMAT(FECHA_DESPACHO, '%d-%m-%Y ') AS 'DESPACHO',
                                                    FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL,0),2,'de_DE') AS 'NETO'  ,   
                                                    FORMAT(IFNULL(PRECIO_KILO,0),2,'de_DE') AS 'KILOP'  ,  
                                                    FORMAT(IFNULL(KILOS_NETO_EXIINDUSTRIAL*PRECIO_KILO,0),2,'de_DE') AS 'PRECIO'   
                                        FROM fruta_exiindustrial 
                                        WHERE ID_DESPACHO= '" . $IDDESPACHOIND . "'   
                                        AND ESTADO_REGISTRO = 1
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
    public function buscarPorNumeroFolio($NUMEROFOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial
                                         WHERE FOLIO_AUXILIAR_EXIINDUSTRIAL= '" . $NUMEROFOLIO . "';");
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

    //BUSCAR POR LA RECEPCION ASOCIADA A LA EXIINDUSTRIAL
    //BUSQUEDA POR NUMERO FOLIO ASOCIADO AL REGISTRO
    public function buscarPorRecepcionNumeroFolio($IDRECEPCION, $FOLIOAUXILIAREXIINDUSTRIAL)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_RECEPCION= '" . $IDRECEPCION . "'  AND FOLIO_AUXILIAR_EXIINDUSTRIAL = '" . $FOLIOAUXILIAREXIINDUSTRIAL . "';");
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



    public function buscarPorProcesoNumeroFolio($IDPROCESO, $FOLIOAUXILIAREXIINDUSTRIAL)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_PROCESO= '" . $IDPROCESO . "'  AND FOLIO_AUXILIAR_EXIINDUSTRIAL = '" . $FOLIOAUXILIAREXIINDUSTRIAL . "';");
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

    public function buscarPorReembalajeNumeroFolio($IDREEMBALAJE,  $FOLIOAUXILIAREXIINDUSTRIAL)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_REEMBALAJE= '" . $IDREEMBALAJE . "'  AND FOLIO_AUXILIAR_EXIINDUSTRIAL = '" . $FOLIOAUXILIAREXIINDUSTRIAL . "';");
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
    //BUSQUEDA POR PROCESO

    public function buscarPorProcesoIngresando($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiindustrial 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'   
                                                AND ESTADO = 1
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

    public function buscarPorProceso($IDPROCESO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                                FROM fruta_exiindustrial 
                                                WHERE ID_PROCESO= '" . $IDPROCESO . "'                                            
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
    public function buscarPorReembalajeIngresnado($IDREEMBALAJE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_exiindustrial WHERE ID_REEMBALAJE= " . $IDREEMBALAJE . " AND ESTADO = 1   AND ESTADO_REGISTRO = 1;");
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


    public function buscarPorFolioEmpresaPlantaTemporada($FOLIOAUXILIAREXIINDUSTRIAL, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y') AS 'EMBALADO',
                                                FORMAT(KILOS_NETO_EXIINDUSTRIAL,2,'de_DE') AS 'NETO'
                                             FROM fruta_exiindustrial 
                                             WHERE   FOLIO_AUXILIAR_EXIINDUSTRIAL LIKE '%" . $FOLIOAUXILIAREXIINDUSTRIAL . "%' 
                                             AND ID_EMPRESA = '" . $EMPRESA . "' 
                                             AND ID_PLANTA = '" . $PLANTA . "'
                                             AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                             AND ESTADO_REGISTRO = 1
                                             AND ESTADO = 2
                                             GROUP BY FOLIO_AUXILIAR_EXIINDUSTRIAL;");
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
    public function buscarPorFolioRepaletizaje($FOLIOAUXILIAREXIEXPORTACION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM fruta_exiindustrial 
                                                WHERE  
                                                     FOLIO_AUXILIAR_EXIINDUSTRIAL LIKE '" . $FOLIOAUXILIAREXIEXPORTACION . "'                                                     
                                                    GROUP BY `FOLIO_AUXILIAR_EXIINDUSTRIAL` ;");
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


    public function buscarPorFolio2($FOLIOAUXILIAREXIINDUSTRIAL)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *, DATE_FORMAT(FECHA_EMBALADO_EXIINDUSTRIAL, '%d-%m-%Y')  AS 'EMBALADO',
                                                  FORMAT(KILOS_NETO_EXIINDUSTRIAL,2,'de_DE') AS 'NETO'
                                             FROM fruta_exiindustrial
                                             WHERE   FOLIO_AUXILIAR_EXIINDUSTRIAL LIKE '" . $FOLIOAUXILIAREXIINDUSTRIAL . "'  ;");
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


    public function buscarPorRechazoMpFolio($IDRECHAZADOMP, $FOLIO, $FOLIOAUXILIAR)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *
                                             FROM fruta_exiindustrial
                                             WHERE ID_RECHAZADOMP = '".$IDRECHAZADOMP."'
                                             AND FOLIO_EXIINDUSTRIAL LIKE '" . $FOLIO . "' 
                                             AND FOLIO_AUXILIAR_EXIINDUSTRIAL LIKE '" . $FOLIOAUXILIAR . "'
                                             AND ESTADO != 0
                                             AND ESTADO_REGISTRO = 1  ;");
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


    public function buscarPorLevantamientoMpFolio($IDLEVANTAMIENTOMP, $FOLIO, $FOLIOAUXILIAR)
    {
        try {
            /* ID_LEVANTAMIENTOMP = '".$IDLEVANTAMIENTOMP."'
                                             AND */
            $datos = $this->conexion->prepare("SELECT *
                                             FROM fruta_exiindustrial
                                             WHERE FOLIO_EXIINDUSTRIAL LIKE '" . $FOLIO . "' 
                                             AND FOLIO_AUXILIAR_EXIINDUSTRIAL LIKE '" . $FOLIOAUXILIAR . "'
                                             AND ESTADO != 0
                                             AND ESTADO_REGISTRO = 1  ;");
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
    //OBTENER TOTALES
    public function obtenerTotalesEmpresaTemporadaDisponible($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT   
                                                    IFNULL(SUM(existencia.KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eindustrial estandar 
                                                WHERE existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1
                                                AND  estandar.COBRO = 1                      
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'               
            
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
    public function obtenerTotalesRechazoMpEmpresaTemporadaDisponible($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT   
                                                    IFNULL(SUM(existencia.KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_erecepcion estandar 
                                                WHERE existencia.ID_ESTANDARMP=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'            
            
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
    public function obtenerTotalesRechazoPTEmpresaTemporadaDisponible($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT   
                                                    IFNULL(SUM(existencia.KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eexportacion estandar 
                                                WHERE existencia.ID_ESTANDARPT=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'             
            
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


    public function obtenerTotalesEmpresaPlantaTemporadaDisponible($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT   
                                                    IFNULL(SUM(existencia.KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eindustrial estandar 
                                                WHERE existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1
                                                AND  estandar.COBRO = 1                          
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'               
            
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
    public function obtenerTotalesRechazoMpEmpresaPlantaTemporadaDisponible($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT   
                                                    IFNULL(SUM(existencia.KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_erecepcion estandar 
                                                WHERE existencia.ID_ESTANDARMP=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'            
            
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
    public function obtenerTotalesRechazoPTEmpresaPlantaTemporadaDisponible($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT   
                                                    IFNULL(SUM(existencia.KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eexportacion estandar 
                                                WHERE existencia.ID_ESTANDARPT=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 2
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'             
            
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


    public function obtenerTotalesEmpresaPlantaTemporadaDespachado($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT   
                                                    IFNULL(SUM(existencia.KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eindustrial estandar 
                                                WHERE existencia.ID_ESTANDAR=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 4
                                                AND  existencia.ESTADO_REGISTRO = 1
                                                AND  estandar.COBRO = 1                      
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'               
            
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
    public function obtenerTotalesRechazoMpEmpresaPlantaTemporadaDespachado($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT   
                                                    IFNULL(SUM(existencia.KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_erecepcion estandar 
                                                WHERE existencia.ID_ESTANDARMP=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 4
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'            
            
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
    public function obtenerTotalesRechazoPTEmpresaPlantaTemporadaDespachado($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT   
                                                    IFNULL(SUM(existencia.KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                                FROM fruta_exiindustrial existencia, estandar_eexportacion estandar 
                                                WHERE existencia.ID_ESTANDARPT=estandar.ID_ESTANDAR
                                                AND  existencia.ESTADO = 4
                                                AND  existencia.ESTADO_REGISTRO = 1   
                                                AND existencia.ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND existencia.ID_PLANTA = '" . $PLANTA . "'
                                                AND existencia.ID_TEMPORADA = '" . $TEMPORADA . "'             
            
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
    public function obtenerTotalesEmpresaPlantaTemporada2($EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare("SELECT             
                                                IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' 
                                             FROM fruta_exiindustrial 
                                             WHERE                                                                                  
                                                AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                AND ID_PLANTA = '" . $PLANTA . "'
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


    public function obtenerTotalesDespacho($IDDESPACHOIND)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL),0) AS 'NETO' ,
                                                    IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL*PRECIO_KILO),0) AS 'PRECIO' 
                                             FROM fruta_exiindustrial
                                             WHERE 
                                              ID_DESPACHO = '" . $IDDESPACHOIND . "' 
                                             AND ESTADO BETWEEN 3 AND  5
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
    public function obtenerTotalesDespacho2($IDDESPACHOIND)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL),0),2,'de_DE') AS 'NETO' ,
                                                    FORMAT(IFNULL(SUM(KILOS_NETO_EXIINDUSTRIAL*PRECIO_KILO),0),2,'de_DE') AS 'PRECIO' 
                                             FROM fruta_exiindustrial
                                             WHERE 
                                              ID_DESPACHO = '" . $IDDESPACHOIND . "' 
                                             AND ESTADO BETWEEN 3 AND  5
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

    //OTRAS FUNCIONALIDADES

    public function contarExistenciaPorDespachoPrecioNulo($IDDESPACHO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                    IFNULL(COUNT(ID_EXIINDUSTRIAL),0)  AS 'CONTEO'
                                                FROM fruta_exiindustrial 
                                                WHERE ID_DESPACHO= '" . $IDDESPACHO . "'                                           
                                                    AND ESTADO_REGISTRO = 1
                                                    AND PRECIO_KILO IS  NULL
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




    //OBTENER EL ULTIMO FOLIO OCUPADO DEL DETALLE DE  RECEPCIONS
    public function obtenerFolio($IDFOLIO, $EMPRESA, $PLANTA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                        IFNULL(MAX(FOLIO_EXIINDUSTRIAL),0) AS 'ULTIMOFOLIO' 
                                                    FROM fruta_exiindustrial  
                                                    WHERE  ID_FOLIO= '" . $IDFOLIO . "'                                                           
                                                    AND ID_DESPACHO2 IS NULL                                                                     
                                                    AND ID_DESPACHO3 IS NULL                                                     
                                                    AND ID_EMPRESA = '" . $EMPRESA . "' 
                                                    AND ID_PLANTA = '" . $PLANTA . "'
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

    //VALIDAR FOLIO
    public function validarFolioProceso($FOLIO)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * 
                                            FROM fruta_exiindustrial
                                            WHERE 
                                                 ID_DESPACHO IS NULL
                                                AND FOLIO_EXIINDUSTRIAL = '" . $FOLIO . "' ;");
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
