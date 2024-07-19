<?php

//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/AVISO.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';

//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class AVISO_ADO {
    
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
    public function listarAviso(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_aviso  limit 8;	");
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
    public function listarAvisoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_aviso   WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarAvisoCBX2(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_aviso  WHERE ESTADO_REGISTRO = 0;	");
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
    public function verAviso($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM  usuario_aviso  WHERE  ID_AVISO = '".$ID."';");
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
    public function agregarAviso(AVISO $AVISO){
        try{
            

    
            
            $query=
            "INSERT INTO  usuario_aviso  (
                                             DIA_INICIO , 
                                             DIA_TERMINO , 
                                             MENSAJE , 

                                             TAVISO , 
                                             TPRIORIDAD , 
                                             FECHA_TERMINO , 

                                             ID_USUARIOI , 
                                             ID_USUARIOM , 

                                             INGRESO ,
                                             MODIFICACION ,
                                             ESTADO_REGISTRO 
                                            ) VALUES
	       	( ?, ?, ?,   ?, ?, ?,  ?, ?,   SYSDATE(), SYSDATE(), 1);";
            $this->conexion->prepare($query)
            ->execute(
                    array(
                        
                        $AVISO->__GET('DIA_INICIO'),
                        $AVISO->__GET('DIA_TERMINO'),
                        $AVISO->__GET('MENSAJE'),

                        $AVISO->__GET('TAVISO'),
                        $AVISO->__GET('TPRIORIDAD'),
                        $AVISO->__GET('FECHA_TERMINO'),

                        $AVISO->__GET('ID_USUARIOI'),
                        $AVISO->__GET('ID_USUARIOM')
                        
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarAviso($id){
        try{$sql="DELETE FROM  usuario_aviso  WHERE  ID_AVISO =".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }
    
    
  
    
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarAviso(AVISO $AVISO){
        try{
            $query = "
                UPDATE  usuario_aviso  SET
                    MODIFICACION = SYSDATE(),
                    DIA_INICIO = ?,
                    DIA_TERMINO = ?,
                    MENSAJE = ?,

                    TAVISO = ?,
                    TPRIORIDAD = ?,
                    FECHA_TERMINO = ?,

                    ID_USUARIOM = ?            
                WHERE  ID_AVISO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(
                        $AVISO->__GET('DIA_INICIO'),
                        $AVISO->__GET('DIA_TERMINO'),
                        $AVISO->__GET('MENSAJE'),

                        $AVISO->__GET('TAVISO'),
                        $AVISO->__GET('TPRIORIDAD'),
                        $AVISO->__GET('FECHA_TERMINO'),

                        $AVISO->__GET('ID_USUARIOM'),
                        $AVISO->__GET('ID_AVISO')
                        
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //FUNCIONES ESPECIALIZADAS
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(AVISO $AVISO){

        try{
            $query = "
            UPDATE  usuario_aviso  SET			
                    ESTADO_REGISTRO  = 0
            WHERE  ID_AVISO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $AVISO->__GET('ID_AVISO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(AVISO $AVISO){
        try{
            $query = "
                UPDATE  usuario_aviso  SET			
                        ESTADO_REGISTRO  = 1
                WHERE  ID_AVISO = ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $AVISO->__GET('ID_AVISO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function listarAvisoActivosCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT MENSAJE, (DIA_TERMINO -DATE_FORMAT(SYSDATE(),'%d')) AS 'DIASTERMINO',
                                                        if(TPRIORIDAD = 1,'badge badge-danger',
                                                            if(TPRIORIDAD=2,'badge badge-warning',
                                                                if(TPRIORIDAD=3,'badge badge-info',
                                                                'Sin Datos'))) AS 'TPRIORIDAD',                                                                
                                                        if(TPRIORIDAD = 1,'Critico',
                                                            if(TPRIORIDAD=2,'Advertencia',
                                                                if(TPRIORIDAD=3,'No Critico',
                                                                'Sin Datos'))) AS 'NOMBRETPRIORIDAD'
                                                FROM `usuario_aviso` 
                                                WHERE ESTADO_REGISTRO = 1
                                                AND if(TAVISO = 1, FECHA_TERMINO IS NULL ,
                                                        if(TAVISO = 2,FECHA_TERMINO>=SYSDATE(),
                                                        ''))     
                                                AND DIA_INICIO = DATE_FORMAT(SYSDATE(),'%d')
                                                OR DIA_TERMINO = DATE_FORMAT(SYSDATE(),'%d')
            
            
                                            ;	");
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
    public function listarAvisoActivosSiempreCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT MENSAJE, (DIA_TERMINO -DATE_FORMAT(SYSDATE(),'%d')) AS 'DIASTERMINO',
                                                        if(TPRIORIDAD = 1,'badge badge-danger',
                                                            if(TPRIORIDAD=2,'badge badge-warning',
                                                                if(TPRIORIDAD=3,'badge badge-info',
                                                                'Sin Datos'))) AS 'TPRIORIDAD',                                                                
                                                        if(TPRIORIDAD = 1,'Critico',
                                                            if(TPRIORIDAD=2,'Advertencia',
                                                                if(TPRIORIDAD=3,'No Critico',
                                                                'Sin Datos'))) AS 'NOMBRETPRIORIDAD'
                                                FROM `usuario_aviso` 
                                                WHERE ESTADO_REGISTRO = 1
                                                AND TAVISO = 1
                                                AND FECHA_TERMINO IS NULL 
                                                AND DIA_INICIO = DATE_FORMAT(SYSDATE(),'%d')
                                                OR DIA_TERMINO = DATE_FORMAT(SYSDATE(),'%d')
            
            
                                            ;	");
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
    public function listarAvisoActivosFijoCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT MENSAJE, (DIA_TERMINO -DATE_FORMAT(SYSDATE(),'%d')) AS 'DIASTERMINO',
                                                        if(TPRIORIDAD = 1,'badge badge-danger',
                                                            if(TPRIORIDAD=2,'badge badge-warning',
                                                                if(TPRIORIDAD=3,'badge badge-info',
                                                                'Sin Datos'))) AS 'TPRIORIDAD',                                                                
                                                        if(TPRIORIDAD = 1,'Critico',
                                                            if(TPRIORIDAD=2,'Advertencia',
                                                                if(TPRIORIDAD=3,'No Critico',
                                                                'Sin Datos'))) AS 'NOMBRETPRIORIDAD'
                                                FROM `usuario_aviso` 
                                                WHERE ESTADO_REGISTRO = 1
                                                AND TAVISO = 2
                                                AND FECHA_TERMINO>=SYSDATE()
                                                AND DIA_INICIO = DATE_FORMAT(SYSDATE(),'%d')
                                                OR DIA_TERMINO = DATE_FORMAT(SYSDATE(),'%d')
            
            
                                            ;	");
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

    public function listarAvisoTodosCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT *, (DIA_TERMINO -DATE_FORMAT(SYSDATE(),'%d')) AS 'DIASTERMINO',
                                                        if(TPRIORIDAD = 1,'badge badge-danger',
                                                            if(TPRIORIDAD=2,'badge badge-warning',
                                                                if(TPRIORIDAD=3,'badge badge-info',
                                                                'Sin Datos'))) AS 'TPRIORIDAD',                                                                
                                                        if(TPRIORIDAD = 1,'Critico',
                                                            if(TPRIORIDAD=2,'Advertencia',
                                                                if(TPRIORIDAD=3,'No Critico',
                                                                'Sin Datos'))) AS 'NOMBRETPRIORIDAD'
                                                FROM `usuario_aviso` 
                                                WHERE ESTADO_REGISTRO = 1
            
            
                                            ;	");
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