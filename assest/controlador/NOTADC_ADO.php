<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/NOTADC.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';
//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class NOTADC_ADO
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
    public function listarNota()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_notadc limit 6;	");
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
    public function listarNotaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_notadc ;	");
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
    public function verNota($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * ,
                                             DATE_FORMAT(FECHA_NOTA, '%Y-%m-%d') AS 'FECHA',
                                             DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                             DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                             FROM fruta_notadc
                                             WHERE ID_NOTA= '" . $ID . "';");
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
    public function verNota2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *
                                                    , DATE_FORMAT(FECHA_NOTA, '%d/%m/%Y') AS 'FECHA'  
                                                    , DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO'
                                                    , DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                            FROM fruta_notadc
                                            WHERE ID_NOTA= '" . $ID . "';");
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
    public function buscarNombreNota($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM fruta_notadc WHERE OBSERVACION_NOTA LIKE '%" . $NOMBRE . "%';");
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
    public function agregarNota(NOTADC $NOTADC)
    {
        try {
            $query =
                "INSERT INTO fruta_notadc ( 
                                                NUMERO_NOTA, 
                                                FECHA_NOTA, 
                                                TNOTA, 
                                                OBSERVACIONES, 
                                                ID_ICARGA,  

                                                ID_EMPRESA, 
                                                ID_TEMPORADA, 
                                                ID_USUARIOI, 
                                                ID_USUARIOM, 

                                                INGRESO, 
                                                MODIFICACION, 
                                                ESTADO, 
                                                ESTADO_REGISTRO
                                            )
             VALUES
               ( ?, ?, ?, ?, ?,     ?, ?, ?, ?,     SYSDATE(),  SYSDATE(),  1, 1);";

            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $NOTADC->__GET('NUMERO_NOTA'),
                        $NOTADC->__GET('FECHA_NOTA'),
                        $NOTADC->__GET('TNOTA'),
                        $NOTADC->__GET('OBSERVACIONES'),
                        $NOTADC->__GET('ID_ICARGA'),

                        $NOTADC->__GET('ID_EMPRESA'),
                        $NOTADC->__GET('ID_TEMPORADA'),
                        $NOTADC->__GET('ID_USUARIOI'),
                        $NOTADC->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarNota($id)
    {
        try {
            $sql = "DELETE FROM fruta_notadc WHERE ID_NOTA=" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarNota(NOTADC $NOTADC)
    {
        try {
            $query = "
                UPDATE fruta_notadc SET
                        MODIFICACION = SYSDATE(),
                        
                        FECHA_NOTA = ?,
                        TNOTA = ?,
                        OBSERVACIONES = ?,
                        ID_ICARGA = ?,

                        ID_USUARIOM = ? 

                WHERE ID_NOTA= ?  ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $NOTADC->__GET('FECHA_NOTA'),
                        $NOTADC->__GET('TNOTA'),
                        $NOTADC->__GET('OBSERVACIONES'),
                        $NOTADC->__GET('ID_ICARGA'),

                        $NOTADC->__GET('ID_USUARIOM'),

                        $NOTADC->__GET('ID_NOTA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

//VISUALIZAR




    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(NOTADC $NOTADC)
    {

        try {
            $query = "
                    UPDATE fruta_notadc SET			
                            ESTADO_REGISTRO = 0
                    WHERE ID_NOTA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $NOTADC->__GET('ID_NOTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(NOTADC $NOTADC)
    {
        try {
            $query = "
                UPDATE fruta_notadc SET			
                        ESTADO_REGISTRO = 1
                WHERE ID_NOTA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $NOTADC->__GET('ID_NOTA')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //CAMBIO ESTADO
    //ABIERTO 1
    public function abierto(NOTADC $NOTADC)
    {
        try {
            $query = "
                    UPDATE fruta_notadc SET			
                            ESTADO = 1
                    WHERE ID_NOTA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $NOTADC->__GET('ID_NOTA')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CERRADO 0
    public function  cerrado(NOTADC $NOTADC)
    {
        try {
            $query = "
                    UPDATE fruta_notadc SET			
                            ESTADO = 0
                    WHERE ID_NOTA= ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $NOTADC->__GET('ID_NOTA')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //LISTAR
    public function listarNotaCerradoEmpresaTemporadaCBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                FECHA_NOTA AS 'FECHA',  
                                                
                                                WEEK(FECHA_NOTA,3) AS 'SEMANA',
                                                WEEKOFYEAR(FECHA_NOTA) AS 'SEMANAISO', 
                                                
                                                INGRESO AS 'INGRESO',
                                                MODIFICACION AS 'MODIFICACION'
                                        FROM fruta_notadc                                                                           
                                        WHERE ESTADO_REGISTRO = 1
                                        AND ESTADO = 0
                                        AND  ID_EMPRESA = '" . $EMPRESA . "' 
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
    public function listarNotaEmpresaTemporadaCBX($EMPRESA, $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                FECHA_NOTA AS 'FECHA',  
                                                
                                                WEEK(FECHA_NOTA,3) AS 'SEMANA',
                                                WEEKOFYEAR(FECHA_NOTA) AS 'SEMANAISO', 
                                                
                                                INGRESO AS 'INGRESO',
                                                MODIFICACION AS 'MODIFICACION'
                                        FROM fruta_notadc                                                                           
                                        WHERE ESTADO_REGISTRO = 1
                                        AND  ID_EMPRESA = '" . $EMPRESA . "' 
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
    
    public function listarNotaEmpresaPlantaTemporadaCBX2($EMPRESA,  $TEMPORADA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT *,
                                                DATE_FORMAT(FECHA_NOTA, '%d-%m-%Y') AS 'FECHA',  
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION'
                                        FROM fruta_notadc                                                                           
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





    //OTRAS FUNCIONALIDADES

    //CONSULTA PARA OBTENER LA FILA EN EL MISMO MOMENTO DE REGISTRAR LA FILA
    public function obtenerId($FECHANOTADC, $EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT *
                                        FROM fruta_notadc
                                        WHERE 
                                             FECHA_NOTA LIKE '" . $FECHANOTADC . "'
                                             AND DATE_FORMAT(INGRESO, '%Y-%m-%d %H:%i') =  DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i') 
                                             AND DATE_FORMAT(MODIFICACION, '%Y-%m-%d %H:%i') = DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i')   
                                             AND ID_EMPRESA = '" . $EMPRESA . "'                                      
                                             AND ID_TEMPORADA = '" . $TEMPORADA . "'
                                             ORDER BY ID_NOTA DESC
                                            
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

    public function obtenerNumero($EMPRESA,  $TEMPORADA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  COUNT(IFNULL(NUMERO_NOTA,0)) AS 'NUMERO'
                                            FROM fruta_notadc
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
}
