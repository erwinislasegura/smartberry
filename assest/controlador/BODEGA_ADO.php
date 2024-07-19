<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/BODEGA.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST = "";
$DBNAME = "";
$USER = "";
$PASS = "";

//ESTRUCTURA DEL CONTROLADOR
class BODEGA_ADO
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
    public function listarBodega()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  principal_bodega  limit 20;	");
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
    public function listarBodegaCBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  principal_bodega  WHERE  ESTADO_REGISTRO  = 1;");
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
    public function listarBodega2CBX()
    {
        try {

            $datos = $this->conexion->prepare("SELECT * FROM  principal_bodega   WHERE  ESTADO_REGISTRO  = 0;	");
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
    public function verBodega($ID)
    {
        try {

            $datos = $this->conexion->prepare("SELECT
                                                 * 
                                              FROM  principal_bodega  
                                              WHERE  ID_BODEGA = '" . $ID . "';");
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
    public function buscarNombreBodega($NOMBRE)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                * 
                                               FROM  principal_bodega  
                                               WHERE  NOMBRE_BODEGA  LIKE '%" . $NOMBRE . "%';");
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
    public function agregarBodega(BODEGA $BODEGA)
    {
        try {


            $query =
                "INSERT INTO  principal_bodega  (
                                                     NOMBRE_BODEGA ,
                                                     NOMBRE_CONTACTO_BODEGA ,
                                                     PRINCIPAL ,
                                                     ENVASES ,
                                                     ID_EMPRESA ,
                                                     ID_PLANTA ,
                                                     ID_USUARIOI ,
                                                     ID_USUARIOM ,
                                                     INGRESO ,
                                                     MODIFICACION ,
                                                     ESTADO_REGISTRO
                                                      
                                                ) VALUES
	       	(?, ?, ?, ?, ?, ?, ?, ?, SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
                ->execute(
                    array(

                        $BODEGA->__GET('NOMBRE_BODEGA'),
                        $BODEGA->__GET('NOMBRE_CONTACTO_BODEGA'),
                        $BODEGA->__GET('PRINCIPAL'),
                        $BODEGA->__GET('ENVASES'),
                        $BODEGA->__GET('ID_EMPRESA'),
                        $BODEGA->__GET('ID_PLANTA'),
                        $BODEGA->__GET('ID_USUARIOI'),
                        $BODEGA->__GET('ID_USUARIOM'),
                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarBodega($id)
    {
        try {
            $sql = "DELETE FROM  principal_bodega  WHERE  ID_BODEGA =" . $id . ";";
            $statement = $this->conexion->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }




    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarBodega(BODEGA $BODEGA)
    {
        try {


            $query = "
		UPDATE  principal_bodega  SET
             MODIFICACION = SYSDATE(),
             NOMBRE_BODEGA = ?,
             NOMBRE_CONTACTO_BODEGA = ?,
             PRINCIPAL = ?,
             ENVASES = ?,
             ID_EMPRESA = ?,
             ID_PLANTA = ?,
             ID_USUARIOM = ?
             
        WHERE 
           ID_BODEGA = ?;
            ";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $BODEGA->__GET('NOMBRE_BODEGA'),
                        $BODEGA->__GET('NOMBRE_CONTACTO_BODEGA'),
                        $BODEGA->__GET('PRINCIPAL'),
                        $BODEGA->__GET('ENVASES'),
                        $BODEGA->__GET('ID_EMPRESA'),
                        $BODEGA->__GET('ID_PLANTA'),
                        $BODEGA->__GET('ID_USUARIOM'),
                        
                        $BODEGA->__GET('ID_BODEGA')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


//FUNCIONES ESPECIALIZADAS 
    //CAMBIO DE ESTADO DE LA FILA
    //CAMBIO A DESACTIVADO
    public function deshabilitar(BODEGA $BODEGA){

        try{
            $query = "
		UPDATE  principal_bodega  SET					
             MODIFICACION = SYSDATE(),
             ESTADO_REGISTRO  = 0
		WHERE  ID_BODEGA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $BODEGA->__GET('ID_BODEGA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(BODEGA $BODEGA){

        try{
            $query = "
		UPDATE  principal_bodega  SET				
             MODIFICACION = SYSDATE(),	
             ESTADO_REGISTRO  = 1
		WHERE  ID_BODEGA = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $BODEGA->__GET('ID_BODEGA')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function listarBodegaPorEmpresaPlantaCBX($IDEMPRESA, $IDPLANTA)
    {
        try {

            $datos = $this->conexion->prepare("SELECT 
                                                * 
                                             FROM  principal_bodega  
                                             WHERE  ESTADO_REGISTRO  = 1 
                                             AND ID_EMPRESA = '".$IDEMPRESA."'
                                             AND ID_PLANTA = '".$IDPLANTA."';	");
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
    public function listarBodegaPorEmpresaCBX($IDEMPRESA, $IDPLANTA)
    {
        try {
            /*echo "SELECT 
            * 
         FROM  principal_bodega  
         WHERE  ESTADO_REGISTRO  = 1 
         AND ID_EMPRESA = '".$IDEMPRESA."' AND ID_PLANTA ='".$IDPLANTA."';	";*/
            $datos = $this->conexion->prepare("SELECT  * 
                                             FROM  principal_bodega  
                                             WHERE  ESTADO_REGISTRO  =  1
                                             AND ID_EMPRESA = '".$IDEMPRESA."' AND ID_PLANTA ='".$IDPLANTA."';	");
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

    public function listarBodegaPorEmpresaPlantaPrincipalCBX($IDEMPRESA,$IDPLANTA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM  principal_bodega  
                                                WHERE  ESTADO_REGISTRO  = 1                                              
                                                    AND ID_EMPRESA = '".$IDEMPRESA."'
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                    AND PRINCIPAL = 1
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
    
  

    
    public function listarBodegaPorEmpresaPlantaEnvasesCBX($IDEMPRESA,$IDPLANTA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM  principal_bodega  
                                                WHERE  ESTADO_REGISTRO  = 1                                              
                                                    AND ID_EMPRESA = '".$IDEMPRESA."'
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                     
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

    public function listarBodegaPorEmpresaPlantaSubbodegaCBX($IDEMPRESA,$IDPLANTA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM  principal_bodega  
                                                WHERE  ESTADO_REGISTRO  = 1                                              
                                                    AND ID_EMPRESA = '".$IDEMPRESA."'
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                     
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


    public function listarBodegaPrincipalMateriales($IDEMPRESA,$IDPLANTA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM  principal_bodega  
                                                WHERE  ESTADO_REGISTRO  = 1                                              
                                                    AND ID_EMPRESA = '".$IDEMPRESA."'
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                    AND PRINCIPAL = 1
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

    public function listarBodegaPrincipalEnvases($IDEMPRESA,$IDPLANTA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM  principal_bodega  
                                                WHERE  ESTADO_REGISTRO  = 1                                              
                                                    AND ID_EMPRESA = '".$IDEMPRESA."'
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                     AND ENVASES = 1
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
    public function listarBodegaPorEmpresaPlantaEnvasesDistinoActualCBX($IDEMPRESA,$IDPLANTA, $IDBODEGA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM  principal_bodega  
                                                WHERE  ESTADO_REGISTRO  = 1                                              
                                                    AND ID_EMPRESA = '".$IDEMPRESA."'
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                    AND ID_BODEGA != '".$IDBODEGA."'
                                                    AND ENVASES = 1
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

    public function listarBodegaPorEmpresaPlantaSubbodegaDistinoActualCBX($IDEMPRESA,$IDPLANTA, $IDBODEGA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM  principal_bodega  
                                                WHERE  ESTADO_REGISTRO  = 1                                              
                                                    AND ID_EMPRESA = '".$IDEMPRESA."'
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                    AND ID_BODEGA != '".$IDBODEGA."'
                                                    
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
    public function listarBodegaPorEmpresaPlantaPrincipalDistinoActualCBX($IDEMPRESA,$IDPLANTA, $IDBODEGA)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT * 
                                                FROM  principal_bodega  
                                                WHERE  ESTADO_REGISTRO  = 1                                              
                                                    AND ID_EMPRESA = '".$IDEMPRESA."'
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                    AND ID_BODEGA != '".$IDBODEGA."'
                                                    AND PRINCIPAL = 1
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
