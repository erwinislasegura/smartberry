<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/AUSUARIO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class AUSUARIO_ADO {
    
    
    //ATRIBUTO
    private $conexion;
    
    //LLAMADO A LA BD Y CONFIGURAR PARAMETROS
    public function __CONSTRUCT()
    {
        try
        {
            $BDCONFIG = new BDCONFIG();
            $HOST = $BDCONFIG->__GET('HOST');
            $DBNAME = $BDCONFIG->__GET('DBNAME');
            $USER = $BDCONFIG->__GET('USER');
            $PASS = $BDCONFIG->__GET('PASS');

            
            $this->conexion = new PDO('mysql:host='.$HOST.';dbname='.$DBNAME, $USER ,$PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    
    
 //FUNCIONES BASICAS 
 //LISTAR TODO CON LIMITE DE 6 FILAS    
    public function listarAusuario(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ausuario  limit 8;	");
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
    //LISTAR TODO
    public function listarAusuarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ausuario  ;	");
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
    
    public function listarAusuarioTodo(){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                    IF(NUMERO_REGISTRO IS NOT NULL,NUMERO_REGISTRO,
                                                        'No Aplica'
                                                        ) AS 'NUMERO_REGISTRO',
                                                    IF(TMODULO = 1,'Fruta',
                                                        IF(TMODULO = 2,'Material',
                                                            IF(TMODULO = 3,'Exportadora',
                                                                IF(TMODULO = 4,'Estadistica',
                                                                    'Sin Datos')
                                                                )
                                                            )
                                                        ) AS 'TMODULO',
                                                        IF(TOPERACION = 0,'Inicio Session',
                                                            IF(TOPERACION = 1,'Registro',
                                                                IF(TOPERACION = 2,'Modificación',
                                                                    IF(TOPERACION = 3,'Cerrar',
                                                                        IF(TOPERACION = 4, 'Deshabilitar',
                                                                            IF(TOPERACION = 5,'Habilitar',
                                                                                'Sin Datos')
                                                                            )
                                                                        )
                                                                    )
                                                                )
                                                            ) AS 'TOPERACION',
                                                        MENSAJE,
                                                        INGRESO,
                                                        IF(ID_EMPRESA IS NOT NULL,
                                                            (
                                                            SELECT NOMBRE_EMPRESA
                                                            FROM principal_empresa
                                                            WHERE ID_EMPRESA = usuario_ausuario.ID_EMPRESA
                                                            ),'No Aplica'
                                                        ) AS 'EMPRESA',                                            
                                                        IF(ID_PLANTA IS NOT NULL,
                                                            (
                                                            SELECT NOMBRE_PLANTA
                                                            FROM principal_planta
                                                            WHERE ID_PLANTA = usuario_ausuario.ID_PLANTA
                                                            ),'No Aplica'
                                                        ) AS 'PLANTA',
                                                        IF(ID_TEMPORADA IS NOT NULL,
                                                            (
                                                            SELECT NOMBRE_TEMPORADA
                                                            FROM principal_temporada
                                                            WHERE ID_TEMPORADA = usuario_ausuario.ID_TEMPORADA
                                                            ),'No Aplica'
                                                        ) AS 'TEMPORADA'
                                            FROM usuario_ausuario
                                            ORDER BY ID_AUSUARIO DESC;
                                            
                                            ;");
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



    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function verAusuario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_ausuario  WHERE  ID_AUSUARIO = '".$ID."';");
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
    
    public function verAusuarioTodo($IDUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                    IF(NUMERO_REGISTRO IS NOT NULL,NUMERO_REGISTRO,
                                                        'No Aplica'
                                                        ) AS 'NUMERO_REGISTRO',
                                                    IF(TMODULO = 1,'Fruta',
                                                        IF(TMODULO = 2,'Material',
                                                            IF(TMODULO = 3,'Exportadora',
                                                                IF(TMODULO = 4,'Estadistica',
                                                                    'Sin Datos')
                                                                )
                                                            )
                                                        ) AS 'TMODULO',
                                                        IF(TOPERACION = 0,'Inicio Session',
                                                            IF(TOPERACION = 1,'Registro',
                                                                IF(TOPERACION = 2,'Modificación',
                                                                    IF(TOPERACION = 3,'Cerrar',
                                                                        IF(TOPERACION = 4, 'Deshabilitar',
                                                                            IF(TOPERACION = 5,'Habilitar',
                                                                                'Sin Datos')
                                                                            )
                                                                        )
                                                                    )
                                                                )
                                                            ) AS 'TOPERACION',
                                                        MENSAJE,
                                                        INGRESO,
                                                        IF(ID_EMPRESA IS NOT NULL,
                                                            (
                                                            SELECT NOMBRE_EMPRESA
                                                            FROM principal_empresa
                                                            WHERE ID_EMPRESA = usuario_ausuario.ID_EMPRESA
                                                            ),'No Aplica'
                                                        ) AS 'EMPRESA',                                            
                                                        IF(ID_PLANTA IS NOT NULL,
                                                            (
                                                            SELECT NOMBRE_PLANTA
                                                            FROM principal_planta
                                                            WHERE ID_PLANTA = usuario_ausuario.ID_PLANTA
                                                            ),'No Aplica'
                                                        ) AS 'PLANTA',
                                                        IF(ID_TEMPORADA IS NOT NULL,
                                                            (
                                                            SELECT NOMBRE_TEMPORADA
                                                            FROM principal_temporada
                                                            WHERE ID_TEMPORADA = usuario_ausuario.ID_TEMPORADA
                                                            ),'No Aplica'
                                                        ) AS 'TEMPORADA'
                                            FROM usuario_ausuario
                                            WHERE ID_USUARIO = '".$IDUSUARIO."' 
                                            ORDER BY ID_AUSUARIO DESC
                                            
                                            ;");
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
    
    public function verAusuarioLimit5($IDUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                    IF(NUMERO_REGISTRO IS NOT NULL,NUMERO_REGISTRO,
                                                        'No Aplica'
                                                        ) AS 'NUMERO_REGISTRO',
                                                    IF(TMODULO = 1,'Fruta',
                                                        IF(TMODULO = 2,'Material',
                                                            IF(TMODULO = 3,'Exportadora',
                                                                IF(TMODULO = 4,'Estadistica',
                                                                    'Sin Datos')
                                                                )
                                                            )
                                                        ) AS 'TMODULO',
                                                        IF(TOPERACION = 0,'Inicio Session',
                                                            IF(TOPERACION = 1,'Registro',
                                                                IF(TOPERACION = 2,'Modificación',
                                                                    IF(TOPERACION = 3,'Cerrar',
                                                                        IF(TOPERACION = 4, 'Deshabilitar',
                                                                            IF(TOPERACION = 5,'Habilitar',
                                                                                'Sin Datos')
                                                                            )
                                                                        )
                                                                    )
                                                                )
                                                            ) AS 'TOPERACION',
                                                        MENSAJE,
                                                        INGRESO,
                                                        IF(ID_EMPRESA IS NOT NULL,
                                                            (
                                                            SELECT NOMBRE_EMPRESA
                                                            FROM principal_empresa
                                                            WHERE ID_EMPRESA = usuario_ausuario.ID_EMPRESA
                                                            ),'No Aplica'
                                                        ) AS 'EMPRESA',                                            
                                                        IF(ID_PLANTA IS NOT NULL,
                                                            (
                                                            SELECT NOMBRE_PLANTA
                                                            FROM principal_planta
                                                            WHERE ID_PLANTA = usuario_ausuario.ID_PLANTA
                                                            ),'No Aplica'
                                                        ) AS 'PLANTA',
                                                        IF(ID_TEMPORADA IS NOT NULL,
                                                            (
                                                            SELECT NOMBRE_TEMPORADA
                                                            FROM principal_temporada
                                                            WHERE ID_TEMPORADA = usuario_ausuario.ID_TEMPORADA
                                                            ),'No Aplica'
                                                        ) AS 'TEMPORADA'
                                            FROM usuario_ausuario
                                            WHERE ID_USUARIO = '".$IDUSUARIO."' 
                                            ORDER BY ID_AUSUARIO DESC
                                            LIMIT 5                                            
                                            ;");
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

  
    
    //REGISTRO DE UNA NUEVA FILA    

    public function agregarAusuario(AUSUARIO $AUSUARIO){
        try{
            
            IF ($AUSUARIO->__GET('ID_EMPRESA') == NULL) {
                $AUSUARIO->__SET('ID_EMPRESA', NULL);
            }
            IF ($AUSUARIO->__GET('ID_PLANTA') == NULL) {
                $AUSUARIO->__SET('ID_PLANTA', NULL);
            }
            IF ($AUSUARIO->__GET('ID_TEMPORADA') == NULL) {
                $AUSUARIO->__SET('ID_TEMPORADA', NULL);
            }


            
            $query=
            "INSERT INTO  usuario_ausuario  (   
                                                NUMERO_REGISTRO , 
                                                TMODULO ,
                                                TOPERACION ,

                                                MENSAJE ,
                                                TABLA ,
                                                ID_REGISTRO ,
                                                
                                                ID_USUARIO ,
                                                ID_EMPRESA ,
                                                ID_PLANTA ,
                                                ID_TEMPORADA ,

                                                INGRESO 
                                            ) VALUES
	       	( ?, ?, ?,   ?, ?, ?,   ?, ?, ?, ?, SYSDATE() );";
            $this->conexion->prepare($query)
            ->execute(
                array(                    
                    $AUSUARIO->__GET('NUMERO_REGISTRO')  ,
                    $AUSUARIO->__GET('TMODULO') ,
                    $AUSUARIO->__GET('TOPERACION') ,

                    $AUSUARIO->__GET('MENSAJE') ,
                    $AUSUARIO->__GET('TABLA') ,
                    $AUSUARIO->__GET('ID_REGISTRO') ,

                    $AUSUARIO->__GET('ID_USUARIO')  ,
                    $AUSUARIO->__GET('ID_EMPRESA') ,
                    $AUSUARIO->__GET('ID_PLANTA') ,
                    $AUSUARIO->__GET('ID_TEMPORADA')              
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    } 
    

    public function agregarAusuario2($NUMERO,$TMODULO,$TOPERACION, $MENSAJE, $TABLA, $REGISTRO, $USUARIO, $EMPRESA, $PLANTA, $TEMPORADA){
        try{                   
            $query=
                                            "INSERT INTO  usuario_ausuario  
                                            (   
                                                NUMERO_REGISTRO , 
                                                TMODULO ,
                                                TOPERACION ,

                                                MENSAJE ,
                                                TABLA ,
                                                ID_REGISTRO ,

                                                ID_USUARIO ,
                                                ID_EMPRESA ,
                                                ID_PLANTA ,
                                                ID_TEMPORADA ,                                                

                                                INGRESO 
                                            ) VALUES
	       	                                (  '".$NUMERO."',  '".$TMODULO."',  '".$TOPERACION."',   '".$MENSAJE."',  '".$TABLA."', ".$REGISTRO.",  ".$USUARIO.", ".$EMPRESA.", ".$PLANTA.", ".$TEMPORADA.",    SYSDATE()  );";

                            //echo $query;

                                         
            $this->conexion->prepare($query)
            ->execute( );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    } 
    //FUNCIONES ESPECIALIZADAS 
    //BUSCADE DE LA EMPRESAS ASOACIADAS A USUARIOS

    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function buscarAusuarioPorNombreUsuario($NOMBREUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                             FROM  usuario_ausuario 
                                             WHERE  ID_USUARIO = '".$NOMBREUSUARIO."';");
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

    

    //VER LA INFORMACION RELACIONADA EN BASE AL ID INGRESADO A LA FUNCION
    public function buscarAusuarioPorNombreUsuarioUltimasCinco($NOMBREUSUARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM  usuario_ausuario  
                                            WHERE  ID_USUARIO = '".$NOMBREUSUARIO."' 
                                            ORDER BY  FECHA_AUSUARIO  DESC LIMIT 5 ; ");
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
}
?>