<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/EEXPORTACION.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR

class EEXPORTACION_ADO
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
    //LISTAR TODO CON LIMITE DE 8 FILAS    
    public function listarEstandar()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  estandar_eexportacion  limit 8;	");
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
    public function listarEstandarCBX()
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * FROM  estandar_eexportacion  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarEstandar2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  estandar_eexportacion  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verEstandar($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  estandar_eexportacion  WHERE  ID_ESTANDAR = '" . $ID . "';");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;

            //echo "SELECT * FROM  estandar_eexportacion  WHERE  ID_ESTANDAR = '" . $ID . "'";
            //	var_dump($resultado);


            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //BUSCAR CONSIDENCIA DE ACUERDO AL CARACTER INGRESADO EN LA FUNCION
    public function buscarNombreEstandar($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  estandar_eexportacion  WHERE  NOMBRE_ESTANDAR  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarEstandar(EEXPORTACION $EEXPORTACION)
    {
        try {


            $query =
                "INSERT INTO  estandar_eexportacion  (   CODIGO_ESTANDAR , 
                                                         NOMBRE_ESTANDAR , 
                                                         CANTIDAD_ENVASE_ESTANDAR ,
                                                         PESO_NETO_ESTANDAR ,
                                                         PESO_BRUTO_ESTANDAR ,

                                                         PESO_PALLET_ESTANDAR ,
                                                         PESO_ENVASE_ESTANDAR ,
                                                         PDESHIDRATACION_ESTANDAR ,
                                                         EMBOLSADO ,
                                                         STOCK ,

                                                         TCATEGORIA ,
                                                         TREFERENCIA ,
                                                         TCOLOR ,

                                                         ID_ESPECIES ,
                                                         ID_TETIQUETA ,
                                                         ID_TEMBALAJE  ,
                                                         ID_ECOMERCIAL ,
                                                         ID_EMPRESA , 
                                                        
                                                         ID_USUARIOI , 
                                                         ID_USUARIOM , 

                                                         INGRESO ,
                                                         MODIFICACION ,
                                                         TFRUTA_ESTANDAR , 
                                                         ESTADO_REGISTRO ) VALUES
	       	( ?, ?, ?, ?, ?,    ?, ?, ?, ?, ?,  ?, ?, ?,  ?, ?, ?, ?, ?,   ?, ?, SYSDATE(), SYSDATE(),   2, 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EEXPORTACION->__GET('CODIGO_ESTANDAR'),
                        $EEXPORTACION->__GET('NOMBRE_ESTANDAR'),
                        $EEXPORTACION->__GET('CANTIDAD_ENVASE_ESTANDAR'),
                        $EEXPORTACION->__GET('PESO_NETO_ESTANDAR'),
                        $EEXPORTACION->__GET('PESO_BRUTO_ESTANDAR'), 

                        $EEXPORTACION->__GET('PESO_PALLET_ESTANDAR'),
                        $EEXPORTACION->__GET('PESO_ENVASE_ESTANDAR'),
                        $EEXPORTACION->__GET('PDESHIDRATACION_ESTANDAR'),
                        $EEXPORTACION->__GET('EMBOLSADO'),
                        $EEXPORTACION->__GET('STOCK'),

                        $EEXPORTACION->__GET('TCATEGORIA'),
                        $EEXPORTACION->__GET('TREFERENCIA'),
                        $EEXPORTACION->__GET('TCOLOR'),

                        $EEXPORTACION->__GET('ID_ESPECIES'),
                        $EEXPORTACION->__GET('ID_TETIQUETA'),
                        $EEXPORTACION->__GET('ID_TEMBALAJE'),
                        $EEXPORTACION->__GET('ID_ECOMERCIAL'),
                        $EEXPORTACION->__GET('ID_EMPRESA'),

                        $EEXPORTACION->__GET('ID_USUARIOI'),
                        $EEXPORTACION->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarEstandar($id)
    {
        try {
            $sql = "DELETE FROM  estandar_eexportacion  WHERE  ID_ESTANDAR =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarEstandar(EEXPORTACION $EEXPORTACION)
    {
        try {
            $query = "
                UPDATE  estandar_eexportacion  SET
                    MODIFICACION = SYSDATE(),
                    CODIGO_ESTANDAR = ?, 
                    NOMBRE_ESTANDAR = ?,   

                    CANTIDAD_ENVASE_ESTANDAR = ?,  
                    PESO_NETO_ESTANDAR = ?,  
                    PESO_BRUTO_ESTANDAR = ?,  
                    PESO_PALLET_ESTANDAR = ?,  
                    PESO_ENVASE_ESTANDAR = ?,  
                    PDESHIDRATACION_ESTANDAR = ?,  

                    EMBOLSADO = ?,  
                    STOCK = ?,  
                    TCATEGORIA = ?,  
                    TREFERENCIA = ?,  
                    TCOLOR = ?,  

                    ID_ESPECIES = ?,  
                    ID_TETIQUETA = ?,   
                    ID_TEMBALAJE = ?,  
                    ID_ECOMERCIAL = ?  ,  

                    ID_USUARIOM = ?         
                WHERE  ID_ESTANDAR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EEXPORTACION->__GET('CODIGO_ESTANDAR'),
                        $EEXPORTACION->__GET('NOMBRE_ESTANDAR'),
                        $EEXPORTACION->__GET('CANTIDAD_ENVASE_ESTANDAR'),
                        
                        $EEXPORTACION->__GET('PESO_NETO_ESTANDAR'),
                        $EEXPORTACION->__GET('PESO_BRUTO_ESTANDAR'),
                        $EEXPORTACION->__GET('PESO_PALLET_ESTANDAR'),
                        $EEXPORTACION->__GET('PESO_ENVASE_ESTANDAR'),
                        $EEXPORTACION->__GET('PDESHIDRATACION_ESTANDAR'),

                        $EEXPORTACION->__GET('EMBOLSADO'),
                        $EEXPORTACION->__GET('STOCK'),
                        $EEXPORTACION->__GET('TCATEGORIA'),
                        $EEXPORTACION->__GET('TREFERENCIA'),
                        $EEXPORTACION->__GET('TCOLOR'),

                        $EEXPORTACION->__GET('ID_ESPECIES'),
                        $EEXPORTACION->__GET('ID_TETIQUETA'),
                        $EEXPORTACION->__GET('ID_TEMBALAJE'),
                        $EEXPORTACION->__GET('ID_ECOMERCIAL'),

                        $EEXPORTACION->__GET('ID_USUARIOM'),
                        $EEXPORTACION->__GET('ID_ESTANDAR')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(EEXPORTACION $EEXPORTACION)
    {

        try {
            $query = "
    UPDATE  estandar_eexportacion  SET			
             ESTADO_REGISTRO  = 0
    WHERE  ID_ESTANDAR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EEXPORTACION->__GET('ID_ESTANDAR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(EEXPORTACION $EEXPORTACION)
    {
        try {
            $query = "
    UPDATE  estandar_eexportacion  SET			
             ESTADO_REGISTRO  = 1
    WHERE  ID_ESTANDAR = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $EEXPORTACION->__GET('ID_ESTANDAR')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarVespeciesPorEspecies($IDESPECIES)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  estandar_eexportacion  WHERE  ID_ESPECIES = '" . $IDESPECIES . "' ;");
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


    public function listarEstandarPorEmpresaCBX($IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * FROM  estandar_eexportacion  
                                              WHERE  ESTADO_REGISTRO  = 1
                                              AND ID_EMPRESA = '" . $IDEMPRESA . "' ;	");
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
