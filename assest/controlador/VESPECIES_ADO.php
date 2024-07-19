<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/VESPECIES.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class VESPECIES_ADO
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
    public function listarVespecies()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_vespecies  limit 8;	");
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
    public function listarVespeciesCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_vespecies  WHERE  ESTADO_REGISTRO  = 1;	");
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

    public function listarVespecies2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_vespecies  WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verVespecies($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_vespecies  WHERE  ID_VESPECIES = '" . $ID . "';");
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
    public function buscarNombreVespecies($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_vespecies  WHERE  NOMBRE_VESPECIES  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarVespecies(VESPECIES $VESPECIES)
    {
        try {


            
            $query =
                "INSERT INTO  fruta_vespecies  (
                                                     NUMERO_VESPECIES ,
                                                     NOMBRE_VESPECIES ,
                                                     CODIGO_SAG_VESPECIES , 
                                                     ID_ESPECIES ,
                                                     ID_EMPRESA , 
                                                     ID_USUARIOI ,  
                                                     ID_USUARIOM , 
                                                     INGRESO ,
                                                     MODIFICACION , 
                                                     ESTADO_REGISTRO ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, SYSDATE() , SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VESPECIES->__GET('NUMERO_VESPECIES'),
                        $VESPECIES->__GET('NOMBRE_VESPECIES'),
                        $VESPECIES->__GET('CODIGO_SAG_VESPECIES'),
                        $VESPECIES->__GET('ID_ESPECIES'),
                        $VESPECIES->__GET('ID_EMPRESA'),
                        $VESPECIES->__GET('ID_USUARIOI'),
                        $VESPECIES->__GET('ID_USUARIOM')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarVespecies($id)
    {
        try {
            $sql = "DELETE FROM  fruta_vespecies  WHERE  ID_VESPECIES =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarVespecies(VESPECIES $VESPECIES)
    {
        try {
            $query = "
		UPDATE  fruta_vespecies  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_VESPECIES = ?  ,
             CODIGO_SAG_VESPECIES = ?  ,
             ID_USUARIOM = ?     , 
             ID_ESPECIES = ?      
		WHERE  ID_VESPECIES = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VESPECIES->__GET('NOMBRE_VESPECIES'),
                        $VESPECIES->__GET('CODIGO_SAG_VESPECIES'),
                        $VESPECIES->__GET('ID_USUARIOM'),
                        $VESPECIES->__GET('ID_ESPECIES'),
                        $VESPECIES->__GET('ID_VESPECIES')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(VESPECIES $VESPECIES)
    {

        try {
            $query = "
		UPDATE  fruta_vespecies  SET			
             ESTADO_REGISTRO  = 0
		WHERE  ID_VESPECIES = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VESPECIES->__GET('ID_VESPECIES')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //CAMBIO A ACTIVADO
    public function habilitar(VESPECIES $VESPECIES)
    {
        try {
            $query = "
		UPDATE  fruta_vespecies  SET			
             ESTADO_REGISTRO  = 1
		WHERE  ID_VESPECIES = ?;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $VESPECIES->__GET('ID_VESPECIES')
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //FILTRAR POR ID ESPECIES
    public function buscarVespeciesPorEspecies($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_vespecies  WHERE  ID_ESPECIES = '" . $ID . "';");
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

    public function buscarVespeciesPorEspeciesCBX($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_vespecies  WHERE  ID_ESPECIES = '" . $ID . "'  AND  ESTADO_REGISTRO  = 1;");
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
    public function buscarVespeciesPorEspeciesPorEmpresaCBX($ID, $IDEMPRESA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_vespecies  
                                                WHERE  ID_ESPECIES = '" . $ID . "'  
                                                AND ID_EMPRESA = '".$IDEMPRESA."'
                                                AND  ESTADO_REGISTRO  = 1;");
            $datos->execute();
            $resultado = $datos->fetchAll();
            $datos=null;
            //print_r($resultado);
            //var_dump($resultado);
            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function buscarVespeciesPorEspeciesCBX2($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  fruta_vespecies  WHERE  ID_ESPECIES = '" . $ID . "'  AND  ESTADO_REGISTRO  = 0;");
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

    public function listarVespeciesPorEmpresaCBX($IDEMPRESA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  fruta_vespecies   WHERE  ESTADO_REGISTRO  = 1 AND ID_EMPRESA = '".$IDEMPRESA."' ;	");
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

    public function obtenerNumero($IDEMPRESA)
    {
        try {
            $datos = $this->conexion->prepare(" SELECT  
                                                IFNULL(COUNT(NUMERO_VESPECIES),0) AS 'NUMERO'
                                            FROM  fruta_vespecies 
                                            WHERE ID_EMPRESA = '" . $IDEMPRESA . "'     
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
