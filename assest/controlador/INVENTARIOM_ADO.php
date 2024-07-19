<?php
//LLAMADA DE LOS ARCHIVOS NECESAROP PARA LA OPERACION DEL CONTROLADOR
//LLAMADA AL MODELO DE CLASE
include_once '../../assest/modelo/INVENTARIOM.php';
//LLAMADA AL CONFIGURACION DE LA BASE DE DATOS
include_once '../../assest/config/BDCONFIG.php';


//INICIALIZAR VARIABLES
$HOST="";
$DBNAME="";
$USER="";
$PASS="";

//ESTRUCTURA DEL CONTROLADOR
class INVENTARIOM_ADO {
    
    
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
    public function listarInventario(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_inventariom limit 8 WHERE ESTADO_REGISTRO = 1;	");
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
    public function listarInventarioCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_inventariom WHERE ESTADO_REGISTRO = 1;	");
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

    public function listarInventario2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_inventariom WHERE ESTADO_REGISTRO = 0;	");
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
    public function verInventario($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_inventariom WHERE ID_INVENTARIO= '".$ID."';");
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

    public function verInventario2($ID){
        try{
            
            $datos=$this->conexion->prepare("SELECT * , 
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION' 
                                            FROM material_inventariom 
                                                WHERE ID_INVENTARIO= '".$ID."';");
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
    public function agregarInventarioRecepcion(INVENTARIOM $INVENTARIOM){
        try{      
            if($INVENTARIOM->__GET('ID_PROVEEDOR')==NULL){
                $INVENTARIOM->__SET('ID_PROVEEDOR', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA2')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA2', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA3')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA3', NULL);
            }
            if($INVENTARIOM->__GET('ID_PRODUCTOR')==NULL){
                $INVENTARIOM->__SET('ID_PRODUCTOR', NULL);
            }
            $query=
                "INSERT INTO material_inventariom (   
                                                        FOLIO_INVENTARIO,
                                                        FOLIO_AUXILIAR_INVENTARIO,
                                                        ALIAS_DINAMICO_FOLIO,
                                                        ALIAS_ESTATICO_FOLIO,
                                                        TRECEPCION,
                                                        VALOR_UNITARIO,   
                                                        CANTIDAD_INVENTARIO, 
                                                        ID_EMPRESA,
                                                        ID_PLANTA,
                                                        ID_TEMPORADA,
                                                        ID_BODEGA,
                                                        ID_FOLIO,
                                                        ID_PRODUCTO,
                                                        ID_TCONTENEDOR,
                                                        ID_TUMEDIDA,
                                                        ID_RECEPCION,
                                                        ID_PLANTA2,
                                                        ID_PLANTA3,
                                                        ID_PROVEEDOR,
                                                        ID_PRODUCTOR,
                                                        INGRESO,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(),  1, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('FOLIO_INVENTARIO') , 
                    $INVENTARIOM->__GET('FOLIO_AUXILIAR_INVENTARIO') ,  
                    $INVENTARIOM->__GET('ALIAS_DINAMICO_FOLIO') ,    
                    $INVENTARIOM->__GET('ALIAS_ESTATICO_FOLIO') ,    
                    $INVENTARIOM->__GET('TRECEPCION') ,  
                    $INVENTARIOM->__GET('VALOR_UNITARIO') ,   
                    $INVENTARIOM->__GET('CANTIDAD_INVENTARIO') ,
                    $INVENTARIOM->__GET('ID_EMPRESA') ,  
                    $INVENTARIOM->__GET('ID_PLANTA') ,  
                    $INVENTARIOM->__GET('ID_TEMPORADA') ,  
                    $INVENTARIOM->__GET('ID_BODEGA') ,     
                    $INVENTARIOM->__GET('ID_FOLIO') ,     
                    $INVENTARIOM->__GET('ID_PRODUCTO') ,     
                    $INVENTARIOM->__GET('ID_TCONTENEDOR') ,     
                    $INVENTARIOM->__GET('ID_TUMEDIDA') ,     
                    $INVENTARIOM->__GET('ID_RECEPCION') ,     
                    $INVENTARIOM->__GET('ID_PLANTA2') ,     
                    $INVENTARIOM->__GET('ID_PLANTA3') ,     
                    $INVENTARIOM->__GET('ID_PROVEEDOR') ,     
                    $INVENTARIOM->__GET('ID_PRODUCTOR')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }   
    
    public function agregarInventarioDespacho(INVENTARIOM $INVENTARIOM){
        try{      
            if($INVENTARIOM->__GET('ID_PROVEEDOR')==NULL){
                $INVENTARIOM->__SET('ID_PROVEEDOR', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA2')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA2', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA3')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA3', NULL);
            }
            if($INVENTARIOM->__GET('ID_PRODUCTOR')==NULL){
                $INVENTARIOM->__SET('ID_PRODUCTOR', NULL);
            }
            $query=
                "INSERT INTO material_inventariom (   
                                                        FOLIO_INVENTARIO,
                                                        FOLIO_AUXILIAR_INVENTARIO,
                                                        ALIAS_DINAMICO_FOLIO,
                                                        ALIAS_ESTATICO_FOLIO,
                                                        TRECEPCION,
                                                        VALOR_UNITARIO,   
                                                        CANTIDAD_INVENTARIO, 
                                                        ID_EMPRESA,
                                                        ID_PLANTA,
                                                        ID_TEMPORADA,
                                                        ID_BODEGA,
                                                        ID_FOLIO,
                                                        ID_PRODUCTO,
                                                        ID_TCONTENEDOR,
                                                        ID_TUMEDIDA,
                                                        ID_RECEPCION,
                                                        ID_PLANTA2,
                                                        ID_PLANTA3,
                                                        ID_PROVEEDOR,
                                                        ID_PRODUCTOR,
                                                        INGRESO,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSDATE() , SYSDATE(),  2, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('FOLIO_INVENTARIO') , 
                    $INVENTARIOM->__GET('FOLIO_AUXILIAR_INVENTARIO') ,  
                    $INVENTARIOM->__GET('ALIAS_DINAMICO_FOLIO') ,    
                    $INVENTARIOM->__GET('ALIAS_ESTATICO_FOLIO') ,    
                    $INVENTARIOM->__GET('TRECEPCION') ,  
                    $INVENTARIOM->__GET('VALOR_UNITARIO') ,   
                    $INVENTARIOM->__GET('CANTIDAD_INVENTARIO') ,
                    $INVENTARIOM->__GET('ID_EMPRESA') ,  
                    $INVENTARIOM->__GET('ID_PLANTA') ,  
                    $INVENTARIOM->__GET('ID_TEMPORADA') ,  
                    $INVENTARIOM->__GET('ID_BODEGA') ,     
                    $INVENTARIOM->__GET('ID_FOLIO') ,     
                    $INVENTARIOM->__GET('ID_PRODUCTO') ,     
                    $INVENTARIOM->__GET('ID_TCONTENEDOR') ,     
                    $INVENTARIOM->__GET('ID_TUMEDIDA') ,     
                    $INVENTARIOM->__GET('ID_RECEPCION') ,     
                    $INVENTARIOM->__GET('ID_PLANTA2') ,     
                    $INVENTARIOM->__GET('ID_PLANTA3') ,     
                    $INVENTARIOM->__GET('ID_PROVEEDOR') ,     
                    $INVENTARIOM->__GET('ID_PRODUCTOR')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }   
    
    public function agregarInventarioBodega(INVENTARIOM $INVENTARIOM){
        try{      
            if($INVENTARIOM->__GET('ID_PROVEEDOR')==NULL){
                $INVENTARIOM->__SET('ID_PROVEEDOR', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA2')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA2', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA3')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA3', NULL);
            }
            if($INVENTARIOM->__GET('ID_PRODUCTOR')==NULL){
                $INVENTARIOM->__SET('ID_PRODUCTOR', NULL);
            }
            $query=
                "INSERT INTO material_inventariom (   
                                                        FOLIO_INVENTARIO,
                                                        FOLIO_AUXILIAR_INVENTARIO,
                                                        ALIAS_DINAMICO_FOLIO,
                                                        ALIAS_ESTATICO_FOLIO,
                                                        TRECEPCION,

                                                        VALOR_UNITARIO,   
                                                        CANTIDAD_INVENTARIO, 
                                                        ID_EMPRESA,
                                                        ID_PLANTA,
                                                        ID_TEMPORADA,

                                                        ID_BODEGA,
                                                        ID_FOLIO,
                                                        ID_PRODUCTO,
                                                        ID_TCONTENEDOR,
                                                        ID_TUMEDIDA,

                                                        ID_RECEPCION,
                                                        ID_DESPACHO,
                                                        ID_PLANTA2,
                                                        ID_PLANTA3,
                                                        ID_PROVEEDOR,

                                                        ID_PRODUCTOR,
                                                        INGRESO,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,  ?,   SYSDATE() , SYSDATE(),  2, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('FOLIO_INVENTARIO') , 
                    $INVENTARIOM->__GET('FOLIO_AUXILIAR_INVENTARIO') ,  
                    $INVENTARIOM->__GET('ALIAS_DINAMICO_FOLIO') ,    
                    $INVENTARIOM->__GET('ALIAS_ESTATICO_FOLIO') ,    
                    $INVENTARIOM->__GET('TRECEPCION') ,  

                    $INVENTARIOM->__GET('VALOR_UNITARIO') ,   
                    $INVENTARIOM->__GET('CANTIDAD_INVENTARIO') ,
                    $INVENTARIOM->__GET('ID_EMPRESA') ,  
                    $INVENTARIOM->__GET('ID_PLANTA') ,  
                    $INVENTARIOM->__GET('ID_TEMPORADA') ,  

                    $INVENTARIOM->__GET('ID_BODEGA') ,     
                    $INVENTARIOM->__GET('ID_FOLIO') ,     
                    $INVENTARIOM->__GET('ID_PRODUCTO') ,     
                    $INVENTARIOM->__GET('ID_TCONTENEDOR') ,     
                    $INVENTARIOM->__GET('ID_TUMEDIDA') ,   

                    $INVENTARIOM->__GET('ID_RECEPCION') ,   
                    $INVENTARIOM->__GET('ID_DESPACHO') ,     
                    $INVENTARIOM->__GET('ID_PLANTA2') ,     
                    $INVENTARIOM->__GET('ID_PLANTA3') ,     
                    $INVENTARIOM->__GET('ID_PROVEEDOR') ,

                    $INVENTARIOM->__GET('ID_PRODUCTOR')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }   
    

    public function agregarInventarioGuia(INVENTARIOM $INVENTARIOM){
        try{      
            if($INVENTARIOM->__GET('ID_PROVEEDOR')==NULL){
                $INVENTARIOM->__SET('ID_PROVEEDOR', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA2')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA2', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA3')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA3', NULL);
            }
            if($INVENTARIOM->__GET('ID_PRODUCTOR')==NULL){
                $INVENTARIOM->__SET('ID_PRODUCTOR', NULL);
            }
            $query=
                "INSERT INTO material_inventariom (   
                                                        FOLIO_INVENTARIO,
                                                        FOLIO_AUXILIAR_INVENTARIO,
                                                        ALIAS_DINAMICO_FOLIO,
                                                        ALIAS_ESTATICO_FOLIO,
                                                        TRECEPCION,

                                                        VALOR_UNITARIO,   
                                                        CANTIDAD_INVENTARIO, 
                                                        ID_EMPRESA,
                                                        ID_PLANTA,
                                                        ID_TEMPORADA,

                                                        ID_BODEGA,
                                                        ID_FOLIO,
                                                        ID_PRODUCTO,
                                                        ID_TCONTENEDOR,
                                                        ID_TUMEDIDA,

                                                        ID_PLANTA2,
                                                        ID_PLANTA3,
                                                        ID_PROVEEDOR,

                                                        ID_PRODUCTOR,
                                                        ID_DESPACHO2,
                                                        INGRESO,
                                                        MODIFICACION,     
                                                        ESTADO,
                                                        ESTADO_REGISTRO
                                                    ) VALUES
	       	( ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?, ?, ?,   ?, ?, ?,   ?, ?,     SYSDATE() , SYSDATE(),  2, 1);";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('FOLIO_INVENTARIO') , 
                    $INVENTARIOM->__GET('FOLIO_AUXILIAR_INVENTARIO') ,  
                    $INVENTARIOM->__GET('ALIAS_DINAMICO_FOLIO') ,    
                    $INVENTARIOM->__GET('ALIAS_ESTATICO_FOLIO') ,    
                    $INVENTARIOM->__GET('TRECEPCION') ,  

                    $INVENTARIOM->__GET('VALOR_UNITARIO') ,   
                    $INVENTARIOM->__GET('CANTIDAD_INVENTARIO') ,
                    $INVENTARIOM->__GET('ID_EMPRESA') ,  
                    $INVENTARIOM->__GET('ID_PLANTA') ,  
                    $INVENTARIOM->__GET('ID_TEMPORADA') ,  

                    $INVENTARIOM->__GET('ID_BODEGA') ,     
                    $INVENTARIOM->__GET('ID_FOLIO') ,     
                    $INVENTARIOM->__GET('ID_PRODUCTO') ,     
                    $INVENTARIOM->__GET('ID_TCONTENEDOR') ,     
                    $INVENTARIOM->__GET('ID_TUMEDIDA') ,   
   
                    $INVENTARIOM->__GET('ID_PLANTA2') ,     
                    $INVENTARIOM->__GET('ID_PLANTA3') ,     
                    $INVENTARIOM->__GET('ID_PROVEEDOR') ,

                    $INVENTARIOM->__GET('ID_PRODUCTOR') ,     
                    $INVENTARIOM->__GET('ID_DESPACHO2')      
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }   
    
    //ELIMINAR FILA, NO SE UTILIZA
    public function eliminarInventario($id){
        try{$sql="DELETE FROM material_inventariom WHERE ID_INVENTARIO=".$id.";";
        $statement=$this->conexion->prepare($sql);
        $statement->execute();
        }catch(Exception $e){
            die($e->getMessage());
            
        }
        
    }      
    //ACTUALIZAR INFORMACION DE LA FILA
    public function actualizarInventarioRecepcion(INVENTARIOM $INVENTARIOM){
        try{    
            if($INVENTARIOM->__GET('ID_PROVEEDOR')==NULL){
                $INVENTARIOM->__SET('ID_PROVEEDOR', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA2')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA2', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA3')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA3', NULL);
            }
            if($INVENTARIOM->__GET('ID_PRODUCTOR')==NULL){
                $INVENTARIOM->__SET('ID_PRODUCTOR', NULL);
            }            
            $query = "
		UPDATE material_inventariom SET
            MODIFICACION= SYSDATE(),
            TRECEPCION= ?,
            VALOR_UNITARIO= ?,
            CANTIDAD_INVENTARIO= ?,
            ID_EMPRESA= ?,
            ID_PLANTA= ?,
            ID_TEMPORADA= ?,
            ID_BODEGA= ?,
            ID_FOLIO= ? ,
            ID_PRODUCTO= ?  ,
            ID_TCONTENEDOR= ?  ,
            ID_TUMEDIDA= ?  ,
            ID_RECEPCION= ?  ,
            ID_PLANTA2= ?  ,
            ID_PLANTA3= ?  ,
            ID_PROVEEDOR= ?  ,
            ID_PRODUCTOR= ?       
		WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(         
                        $INVENTARIOM->__GET('TRECEPCION') ,  
                        $INVENTARIOM->__GET('VALOR_UNITARIO') ,   
                        $INVENTARIOM->__GET('CANTIDAD_INVENTARIO') ,  
                        $INVENTARIOM->__GET('ID_EMPRESA') ,  
                        $INVENTARIOM->__GET('ID_PLANTA') ,  
                        $INVENTARIOM->__GET('ID_TEMPORADA') ,  
                        $INVENTARIOM->__GET('ID_BODEGA') ,     
                        $INVENTARIOM->__GET('ID_FOLIO') ,     
                        $INVENTARIOM->__GET('ID_PRODUCTO') ,     
                        $INVENTARIOM->__GET('ID_TCONTENEDOR') ,     
                        $INVENTARIOM->__GET('ID_TUMEDIDA') ,     
                        $INVENTARIOM->__GET('ID_RECEPCION') ,     
                        $INVENTARIOM->__GET('ID_PLANTA2') ,     
                        $INVENTARIOM->__GET('ID_PLANTA3') ,     
                        $INVENTARIOM->__GET('ID_PROVEEDOR') ,     
                        $INVENTARIOM->__GET('ID_PRODUCTOR')  ,      
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function actualizarInventarioBodega(INVENTARIOM $INVENTARIOM){
        try{    
            if($INVENTARIOM->__GET('ID_PROVEEDOR')==NULL){
                $INVENTARIOM->__SET('ID_PROVEEDOR', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA2')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA2', NULL);
            }
            if($INVENTARIOM->__GET('ID_PLANTA3')==NULL){
                $INVENTARIOM->__SET('ID_PLANTA3', NULL);
            }
            if($INVENTARIOM->__GET('ID_PRODUCTOR')==NULL){
                $INVENTARIOM->__SET('ID_PRODUCTOR', NULL);
            }            
            $query = "
                UPDATE material_inventariom SET
                    MODIFICACION= SYSDATE(),
                    TRECEPCION= ?,

                    VALOR_UNITARIO= ?,
                    CANTIDAD_INVENTARIO= ?,
                    ID_EMPRESA= ?,
                    ID_PLANTA= ?,
                    ID_TEMPORADA= ?,

                    ID_BODEGA= ?,
                    ID_FOLIO= ? ,
                    ID_PRODUCTO= ?  ,
                    ID_TCONTENEDOR= ?  ,
                    ID_TUMEDIDA= ?  ,

                    ID_RECEPCION= ?  ,
                    ID_DESPACHO= ?  ,
                    ID_PLANTA2= ?  ,
                    ID_PLANTA3= ?  ,            
                    ID_PROVEEDOR= ?  ,
                    
                    ID_PRODUCTOR= ?       
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(           
                        $INVENTARIOM->__GET('TRECEPCION') ,  
    
                        $INVENTARIOM->__GET('VALOR_UNITARIO') ,   
                        $INVENTARIOM->__GET('CANTIDAD_INVENTARIO') ,
                        $INVENTARIOM->__GET('ID_EMPRESA') ,  
                        $INVENTARIOM->__GET('ID_PLANTA') ,  
                        $INVENTARIOM->__GET('ID_TEMPORADA') ,  
    
                        $INVENTARIOM->__GET('ID_BODEGA') ,     
                        $INVENTARIOM->__GET('ID_FOLIO') ,     
                        $INVENTARIOM->__GET('ID_PRODUCTO') ,     
                        $INVENTARIOM->__GET('ID_TCONTENEDOR') ,     
                        $INVENTARIOM->__GET('ID_TUMEDIDA') ,   
    
                        $INVENTARIOM->__GET('ID_RECEPCION') ,   
                        $INVENTARIOM->__GET('ID_DESPACHO') ,     
                        $INVENTARIOM->__GET('ID_PLANTA2') ,     
                        $INVENTARIOM->__GET('ID_PLANTA3') ,     
                        $INVENTARIOM->__GET('ID_PROVEEDOR') ,
    
                        $INVENTARIOM->__GET('ID_PRODUCTOR'),     
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    
    //FUNCIONES ESPECIALIZADAS 
    public function actualizarSelecionarDespachoCambiarCantidadEstado(INVENTARIOM $INVENTARIOM)
    {
        try {
            $query = "
		UPDATE material_inventariom SET
            MODIFICACION = SYSDATE(),
            ESTADO = 3,           
            CANTIDAD_INVENTARIO = ?,       
            ID_DESPACHO = ?          
		WHERE ID_INVENTARIO= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOM->__GET('CANTIDAD_INVENTARIO'),
                        $INVENTARIOM->__GET('ID_DESPACHO'),
                        $INVENTARIOM->__GET('ID_INVENTARIO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function actualizarSelecionarDespachoCambiarEstado(INVENTARIOM $INVENTARIOM)
    {
        try {
            $query = "
		UPDATE material_inventariom SET
            MODIFICACION = SYSDATE(),
            ESTADO = 3,           
            ID_DESPACHO = ?          
		WHERE ID_INVENTARIO= ? ;";
        //die($query);
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOM->__GET('ID_DESPACHO'),
                        $INVENTARIOM->__GET('ID_INVENTARIO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //ACTUALIZAR ESTADO, ASOCIAR PROCESO, REGISTRO HISTORIAL PROCESO
    public function actualizarDeselecionarDespachoCambiarEstado(INVENTARIOM $INVENTARIOM)
    {
        try {
            $query = "
		UPDATE material_inventariom SET
            ESTADO = 2,          
            MODIFICACION = SYSDATE(), 
            ID_DESPACHO = null        
		WHERE ID_INVENTARIO= ? ;";
            $this->conexion->prepare($query)
                ->execute(
                    array(
                        $INVENTARIOM->__GET('ID_INVENTARIO')

                    )

                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    //CAMBIO DE ESTADO 
    //CAMBIO A CERRADO
    public function eliminado(INVENTARIOM $INVENTARIOM){

        try{
            $query = "
    UPDATE material_inventariom SET			
            MODIFICACION= SYSDATE(),		
            ESTADO = 0
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                    
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function eliminado2(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
    UPDATE material_inventariom SET			
            MODIFICACION= SYSDATE(),		
            ESTADO = 0
    WHERE FOLIO_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('FOLIO_INVENTARIO')                    
                    )                    
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ABIERTO
    public function ingresando(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
    UPDATE material_inventariom SET				
            MODIFICACION= SYSDATE(),	
            ESTADO = 1
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }

    public function disponible(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
                UPDATE material_inventariom SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 2
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
        
    public function enDespacho(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
                UPDATE material_inventariom SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 3
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    public function despachado(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
                UPDATE material_inventariom SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 4
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }



    public function enTransito(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
                UPDATE material_inventariom SET				
                        MODIFICACION= SYSDATE(),	
                        ESTADO = 5
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                    array(                 
                        $INVENTARIOM->__GET('ID_INVENTARIO')                    
                    )                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    
    //CAMBIO DE ESTADO DE REGISTRO DEL REGISTRO
    //CAMBIO A DESACTIVADO
    public function deshabilitar(INVENTARIOM $INVENTARIOM){

        try{
            $query = "
                UPDATE material_inventariom SET			
                        MODIFICACION= SYSDATE(),		
                        ESTADO_REGISTRO = 0
                WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('ID_INVENTARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    public function deshabilitar2(INVENTARIOM $INVENTARIOM){

        try{
            $query = "
    UPDATE material_inventariom SET			
            MODIFICACION= SYSDATE(),		
            ESTADO_REGISTRO = 0
    WHERE FOLIO_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('FOLIO_INVENTARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }
    //CAMBIO A ACTIVADO
    public function habilitar(INVENTARIOM $INVENTARIOM){
        try{
            $query = "
    UPDATE material_inventariom SET				
            MODIFICACION= SYSDATE(),	
            ESTADO_REGISTRO = 1
    WHERE ID_INVENTARIO= ?;";
            $this->conexion->prepare($query)
            ->execute(
                array(                 
                    $INVENTARIOM->__GET('ID_INVENTARIO')                    
                )
                
                );
            
        }catch(Exception $e){
            die($e->getMessage());
        }
        
    }




    //LISTAS



    public function listarInventariotCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * FROM material_inventariom ;	");
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
    public function listarInventariot2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),0,'de_DE') AS 'VALOR'  
                                             FROM material_inventariom ;	");
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

    public function listarInventarioPorRecepcionCBX($IDINVENTARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                            FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDINVENTARIO."'  ;
                                        	");
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
    public function listarInventarioPorRecepcion2CBX($IDINVENTARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y %H:%i') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y %H:%i') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),0,'de_DE') AS 'VALOR' 
                                             FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDINVENTARIO."'  ;	");
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
   

    public function listarInventarioPorEmpresaPlantaTemporadaDisponibleCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{

           /* die("SELECT * ,
            DATE_FORMAT(MI.INGRESO, '%Y-%m-%d') AS 'INGRESO',
            DATE_FORMAT(MI.MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
            IFNULL(MI.CANTIDAD_INVENTARIO,0) AS 'CANTIDAD', 
            IFNULL(MI.VALOR_UNITARIO,0) AS 'VALOR'   
         FROM material_inventariom MI
        JOIN principal_bodega PB ON PB.ID_BODEGA = MI.ID_BODEGA
                                                WHERE MI.ESTADO_REGISTRO = 1 
                                                AND MI.ESTADO = 2
                                                AND MI.ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND MI.ID_PLANTA = '".$IDPLANTA."'
                                                AND MI.ID_TEMPORADA = '".$IDTEMPORADA."' AND PB.SUBBODEGA=0;");*/

            $datos=$this->conexion->prepare("SELECT * ,
            DATE_FORMAT(MI.INGRESO, '%Y-%m-%d') AS 'INGRESO',
            DATE_FORMAT(MI.MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
            IFNULL(MI.CANTIDAD_INVENTARIO,0) AS 'CANTIDAD', 
            IFNULL(MI.VALOR_UNITARIO,0) AS 'VALOR'   
         FROM material_inventariom MI
        JOIN principal_bodega PB ON PB.ID_BODEGA = MI.ID_BODEGA
                                                WHERE MI.ESTADO_REGISTRO = 1 
                                                AND MI.ESTADO = 2
                                                AND MI.ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND MI.ID_PLANTA = '".$IDPLANTA."'
                                                AND MI.ID_TEMPORADA = '".$IDTEMPORADA."';	");

            
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
    
    public function listarInventarioPorEmpresaPlantaTemporadaDisponible2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'   
                                             FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function listarInventarioPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%Y-%m-%d') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%Y-%m-%d') AS 'MODIFICACION',
                                                IFNULL(CANTIDAD_INVENTARIO,0) AS 'CANTIDAD', 
                                                IFNULL(VALOR_UNITARIO,0) AS 'VALOR'   
                                             FROM material_inventariom
                                                WHERE ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function listarInventarioPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * ,
                                                DATE_FORMAT(INGRESO, '%d-%m-%Y') AS 'INGRESO',
                                                DATE_FORMAT(MODIFICACION, '%d-%m-%Y') AS 'MODIFICACION',
                                                FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD', 
                                                FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'   
                                             FROM material_inventariom
                                                WHERE ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function listarResumenInventarioPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                    inventario.ID_PRODUCTO ,                                                     
                                                (  SELECT  producto.CODIGO_PRODUCTO
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'CODIGO',  
                                                (   SELECT  producto.NOMBRE_PRODUCTO
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'PRODUCTO',                                                     
                                                (   SELECT (   
                                                            SELECT  tumedida.NOMBRE_TUMEDIDA
                                                            FROM material_tumedida tumedida
                                                            WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                        )
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'TUMEDIDA',                                    
                                                (  SELECT  bodega.NOMBRE_BODEGA
                                                    FROM principal_bodega bodega 
                                                    WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                ) AS 'BODEGA', 
                                                SUM(IFNULL(inventario.CANTIDAD_INVENTARIO,0)) AS 'CANTIDAD',
                                            
                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                    FROM principal_empresa empresa
                                                    WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                ) AS 'EMPRESA',
                                                (   SELECT  planta.NOMBRE_PLANTA
                                                    FROM principal_planta planta
                                                    WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                ) AS 'PLANTA',    
                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                    FROM principal_temporada temporada
                                                    WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                ) AS 'TEMPORADA'
                                            FROM 
                                                material_inventariom inventario  
                                            WHERE inventario.ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                                    AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                    AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                            GROUP BY 
                                                inventario.ID_PRODUCTO,
                                                inventario.ID_BODEGA,
                                                inventario.ID_EMPRESA , 
                                                inventario.ID_PLANTA , 
                                                inventario.ID_TEMPORADA

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
    public function listarResumenInventarioPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                    inventario.ID_PRODUCTO ,                                                     
                                                (  SELECT  producto.CODIGO_PRODUCTO
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'CODIGO',  
                                                (   SELECT  producto.NOMBRE_PRODUCTO
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'PRODUCTO',                                                     
                                                (   SELECT (   
                                                            SELECT  tumedida.NOMBRE_TUMEDIDA
                                                            FROM material_tumedida tumedida
                                                            WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                        )
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'TUMEDIDA',                                    
                                                (  SELECT  bodega.NOMBRE_BODEGA
                                                    FROM principal_bodega bodega 
                                                    WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                ) AS 'BODEGA', 
                                                SUM(IFNULL(inventario.CANTIDAD_INVENTARIO,0)) AS 'CANTIDAD',
                                            
                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                    FROM principal_empresa empresa
                                                    WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                ) AS 'EMPRESA',
                                                (   SELECT  planta.NOMBRE_PLANTA
                                                    FROM principal_planta planta
                                                    WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                ) AS 'PLANTA',    
                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                    FROM principal_temporada temporada
                                                    WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                ) AS 'TEMPORADA'
                                            FROM 
                                                material_inventariom inventario  
                                            WHERE inventario.ESTADO_REGISTRO = 1
                                                    AND ESTADO = 2
                                                    AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                    AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                            GROUP BY 
                                                inventario.ID_PRODUCTO,
                                                inventario.ID_BODEGA,
                                                inventario.ID_EMPRESA , 
                                                inventario.ID_PLANTA , 
                                                inventario.ID_TEMPORADA

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
    
    public function listarKardexInventarioRecepcionPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                                 inventario.ID_PRODUCTO ,                                                     
                                                                (  SELECT  producto.CODIGO_PRODUCTO
                                                                    FROM material_producto producto 
                                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                                ) AS 'CODIGO',  
                                                                (   SELECT  producto.NOMBRE_PRODUCTO
                                                                    FROM material_producto producto 
                                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                                ) AS 'PRODUCTO',                                                     
                                                                (   SELECT (   
                                                                            SELECT  tumedida.NOMBRE_TUMEDIDA
                                                                            FROM material_tumedida tumedida
                                                                            WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                                        )
                                                                    FROM material_producto producto 
                                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                                ) AS 'TUMEDIDA',                                    
                                                                (  SELECT  bodega.NOMBRE_BODEGA
                                                                    FROM principal_bodega bodega 
                                                                    WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                                ) AS 'BODEGA', 
                                                                SUM(IFNULL(inventario.CANTIDAD_INVENTARIO,0)) AS 'CANTIDAD',
                                                                inventario.ID_RECEPCION,
                                                                (	select recepcion.NUMERO_RECEPCION
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'NUMERORECEPCION', 
                                                                (	select recepcion.NUMERO_DOCUMENTO_RECEPCION
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'NUMERODOCUMENTORECEPCION',
                                                                (	select DATE_FORMAT(recepcion.FECHA_RECEPCION, '%Y-%m-%d')
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'FECHARECEPCION',                                                    
                                                                (	select 
                                                                            if(recepcion.TRECEPCION = 1,'Recepción desde Proveedor', 
                                                                            if(recepcion.TRECEPCION = 2,'Recepción desde Productor', 
                                                                                if(recepcion.TRECEPCION = 3,'Recepción de planta Extena',
                                                                                    if(recepcion.TRECEPCION = 4,'Recepción de Inventario Inicial','Sin Datos'))))
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'TRECEPCION',       
                                                                                                        
                                                                (	select 
                                                                    if(recepcion.TRECEPCION = 1,
                                                                        if(recepcion.ID_PROVEEDOR IS NOT NULL, 
                                                                        (  select proveedor.NOMBRE_PROVEEDOR   
                                                                            FROM material_proveedor proveedor                   
                                                                            WHERE recepcion.ID_PROVEEDOR=proveedor.ID_PROVEEDOR),'Sin Datos'), 
                                                                    
                                                                    if(recepcion.TRECEPCION = 2,
                                                                    if(recepcion.ID_PRODUCTOR IS NOT NULL, 
                                                                        (  select productor.NOMBRE_PRODUCTOR  
                                                                            FROM fruta_productor productor     
                                                                            WHERE recepcion.ID_PRODUCTOR=productor.ID_PRODUCTOR),'Sin Datos'), 
                                                                    if(recepcion.TRECEPCION = 3,
                                                                    if(recepcion.ID_PLANTA2 IS NOT NULL, 
                                                                        (  select planta.NOMBRE_PLANTA                                                         
                                                                            FROM principal_planta planta                                                             
                                                                            WHERE recepcion.ID_PLANTA2=planta.ID_PLANTA),'Sin Datos'),
                                                                    if(recepcion.TRECEPCION = 4,'No Aplica','Sin Datos'))))
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'ORIGENRECEPCION',  
                                                            
                                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                                    FROM principal_empresa empresa
                                                                    WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                                ) AS 'EMPRESA',
                                                                (   SELECT  planta.NOMBRE_PLANTA
                                                                    FROM principal_planta planta
                                                                    WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                                ) AS 'PLANTA',    
                                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                                    FROM principal_temporada temporada
                                                                    WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                                ) AS 'TEMPORADA'
                                                            FROM 
                                                                material_inventariom inventario  
                                                            WHERE inventario.ESTADO_REGISTRO = 1
                                                            AND inventario.ID_RECEPCION IS NOT NULL
                                                            AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                            AND ID_PLANTA = '".$IDPLANTA."'
                                                            AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                                            GROUP BY 
                                                                inventario.ID_PRODUCTO,
                                                                inventario.ID_RECEPCION,
                                                                inventario.ID_EMPRESA , 
                                                                inventario.ID_PLANTA , 
                                                                inventario.ID_TEMPORADA,
                                                                inventario.ID_BODEGA		  
            
            
                                                       
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
    public function listarKardexInventarioRecepcionInterplantaPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                    inventario.ID_PRODUCTO ,                                                     
                                                    (  SELECT  producto.CODIGO_PRODUCTO
                                                        FROM material_producto producto 
                                                        WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                    ) AS 'CODIGO',  
                                                    (   SELECT  producto.NOMBRE_PRODUCTO
                                                        FROM material_producto producto 
                                                        WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                    ) AS 'PRODUCTO',                                                     
                                                    (   SELECT (   
                                                                SELECT  tumedida.NOMBRE_TUMEDIDA
                                                                FROM material_tumedida tumedida
                                                                WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                            )
                                                        FROM material_producto producto 
                                                        WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                    ) AS 'TUMEDIDA',                                    
                                                    (  SELECT  bodega.NOMBRE_BODEGA
                                                        FROM principal_bodega bodega 
                                                        WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                    ) AS 'BODEGA', 
                                                    SUM(IFNULL(inventario.CANTIDAD_INVENTARIO,0)) AS 'CANTIDAD',  
                                                    inventario.ID_DESPACHO2,                             
                                                    (	select despacho.NUMERO_DESPACHO
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2
                                                    )AS 'NUMERODESPACHO2', 
                                                    (	select despacho.NUMERO_DOCUMENTO
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2
                                                    )AS 'NUMERODOCUMENTODESPACHO2',
                                                    (	select DATE_FORMAT(despacho.FECHA_DESPACHO, '%Y-%m-%d')
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2
                                                    )AS 'FECHADESPACHO2',                                                     
                                                    (	select 'Recepción Interplanta'
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2
                                                    )AS 'TDESPACHO2',                        
                                                    (   select 
                                                            if(despacho.ID_PLANTA IS NOT NULL, 
                                                            (  select planta.NOMBRE_PLANTA   
                                                                FROM principal_planta planta                   
                                                                WHERE despacho.ID_PLANTA=planta.ID_PLANTA
                                                            ),'Sin Datos')
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2 
                                                    )AS 'DESTINODESPACHO2', 
                                                    (   SELECT  empresa.NOMBRE_EMPRESA
                                                        FROM principal_empresa empresa
                                                        WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                    ) AS 'EMPRESA',
                                                    (   SELECT  planta.NOMBRE_PLANTA
                                                        FROM principal_planta planta
                                                        WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                    ) AS 'PLANTA',    
                                                    (   SELECT  temporada.NOMBRE_TEMPORADA
                                                        FROM principal_temporada temporada
                                                        WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                    ) AS 'TEMPORADA'
                                                FROM 
                                                    material_inventariom inventario  
                                                WHERE inventario.ESTADO_REGISTRO = 1
                                                    AND ID_DESPACHO2 IS NOT NULL
                                                    AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                    AND ID_PLANTA = '".$IDPLANTA."'
                                                    AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                                GROUP BY 
                                                    inventario.ID_PRODUCTO,
                                                    inventario.ID_DESPACHO2 , 
                                                    inventario.ID_EMPRESA , 
                                                    inventario.ID_PLANTA , 
                                                    inventario.ID_TEMPORADA,
                                                    inventario.ID_BODEGA
            
                                                       
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
    public function listarKardexInventarioDespachoPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                inventario.ID_PRODUCTO ,                                                     
                                                (  SELECT  producto.CODIGO_PRODUCTO
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'CODIGO',  
                                                (   SELECT  producto.NOMBRE_PRODUCTO
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'PRODUCTO',                                                     
                                                (   SELECT (   
                                                            SELECT  tumedida.NOMBRE_TUMEDIDA
                                                            FROM material_tumedida tumedida
                                                            WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                        )
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'TUMEDIDA',                                    
                                                (  SELECT  bodega.NOMBRE_BODEGA
                                                    FROM principal_bodega bodega 
                                                    WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                ) AS 'BODEGA', 
                                                SUM(IFNULL(inventario.CANTIDAD_INVENTARIO,0)) AS 'CANTIDAD',                                                  
                                                inventario.ID_DESPACHO ,                                                    
                                                (	select despacho.NUMERO_DESPACHO
                                                    FROM material_despachom despacho
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'NUMERODESPACHO', 
                                                (	select despacho.NUMERO_DOCUMENTO
                                                    FROM material_despachom despacho
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'NUMERODOCUMENTODESPACHO',
                                                (	select DATE_FORMAT(despacho.FECHA_DESPACHO, '%Y-%m-%d')
                                                    FROM material_despachom despacho
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'FECHADESPACHO',                                                                                              
                                                (	select 
                                                    if(despacho.TDESPACHO = 1,'Despacho a Sub Bodega',
                                                        if(despacho.TDESPACHO = 2,'Despacho a Interplanta',
                                                        if(despacho.TDESPACHO = 3,'Despacho de devolución a Productor',
                                                            if(despacho.TDESPACHO = 4,'Despacho de devolución a Proveedor',
                                                                if(despacho.TDESPACHO = 5,'Despacho a planta Externa',
                                                                    if(despacho.TDESPACHO = 6,'Venta',
                                                                    if(despacho.TDESPACHO = 7,'Regalo','Sin Datos'))))))) 
                                                
                                                    FROM material_despachom despacho                                                     
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'TDESPACHO',   
                                                (	select 
                                                    if(despacho.TDESPACHO = 1,
                                                        if(despacho.ID_BODEGA IS NOT NULL, 
                                                        (  select bodega.NOMBRE_BODEGA   
                                                            FROM principal_bodega bodega                   
                                                            WHERE despacho.ID_BODEGA=bodega.ID_BODEGA),'Sin Datos'),
                                                    if(despacho.TDESPACHO = 2,
                                                        if(despacho.ID_PLANTA2 IS NOT NULL, 
                                                        (  select planta.NOMBRE_PLANTA   
                                                            FROM principal_planta planta                   
                                                            WHERE despacho.ID_PLANTA2=planta.ID_PLANTA),'Sin Datos'),
                                                    if(despacho.TDESPACHO = 3,
                                                    if(despacho.ID_PRODUCTOR IS NOT NULL, 
                                                        (  select productor.NOMBRE_PRODUCTOR   
                                                            FROM fruta_productor productor                   
                                                            WHERE despacho.ID_PRODUCTOR=productor.ID_PRODUCTOR),'Sin Datos'),
                                                    if(despacho.TDESPACHO = 4,
                                                    if(despacho.ID_PROVEEDOR IS NOT NULL, 
                                                        (  select proveedor.NOMBRE_PROVEEDOR   
                                                            FROM material_proveedor proveedor                   
                                                            WHERE despacho.ID_PROVEEDOR=proveedor.ID_PROVEEDOR),'Sin Datos'),
                                                    if(despacho.TDESPACHO = 5,
                                                    if(despacho.ID_PLANTA3 IS NOT NULL, 
                                                        (  select planta.NOMBRE_PLANTA   
                                                            FROM principal_planta planta                     
                                                            WHERE despacho.ID_PLANTA3=planta.ID_PLANTA),'Sin Datos'),      
                                                    
                                                    if(despacho.TDESPACHO = 6,
                                                    if(despacho.ID_CLIENTE IS NOT NULL, 
                                                        (  select cliente.NOMBRE_CLIENTE   
                                                            FROM material_cliente cliente                   
                                                            WHERE despacho.ID_CLIENTE=cliente.ID_CLIENTE),'Sin Datos'),   
                                                    if(despacho.TDESPACHO = 7,despacho.REGALO_DESPACHO,'Sin Datos')  
                                                    ))))))   
                                                    FROM material_despachom despacho
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'DESTINODESPACHO',                                                    
                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                    FROM principal_empresa empresa
                                                    WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                ) AS 'EMPRESA',
                                                (   SELECT  planta.NOMBRE_PLANTA
                                                    FROM principal_planta planta
                                                    WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                ) AS 'PLANTA',    
                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                    FROM principal_temporada temporada
                                                    WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                ) AS 'TEMPORADA'
                                            FROM 
                                                material_inventariom inventario  
                                            WHERE inventario.ESTADO_REGISTRO = 1
                                                AND inventario.ID_DESPACHO IS NOT NULL
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                            GROUP BY 
                                                inventario.ID_PRODUCTO,
                                                inventario.ID_DESPACHO, 
                                                inventario.ID_EMPRESA , 
                                                inventario.ID_PLANTA , 
                                                inventario.ID_TEMPORADA,
                                                inventario.ID_BODEGA
            
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

    
    public function listarKardexInventarioRecepcionPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                                 inventario.ID_PRODUCTO ,                                                     
                                                                (  SELECT  producto.CODIGO_PRODUCTO
                                                                    FROM material_producto producto 
                                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                                ) AS 'CODIGO',  
                                                                (   SELECT  producto.NOMBRE_PRODUCTO
                                                                    FROM material_producto producto 
                                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                                ) AS 'PRODUCTO',                                                     
                                                                (   SELECT (   
                                                                            SELECT  tumedida.NOMBRE_TUMEDIDA
                                                                            FROM material_tumedida tumedida
                                                                            WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                                        )
                                                                    FROM material_producto producto 
                                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                                ) AS 'TUMEDIDA',                                    
                                                                (  SELECT  bodega.NOMBRE_BODEGA
                                                                    FROM principal_bodega bodega 
                                                                    WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                                ) AS 'BODEGA', 
                                                                SUM(IFNULL(inventario.CANTIDAD_INVENTARIO,0)) AS 'CANTIDAD',
                                                                inventario.ID_RECEPCION,
                                                                (	select recepcion.NUMERO_RECEPCION
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'NUMERORECEPCION', 
                                                                (	select recepcion.NUMERO_DOCUMENTO_RECEPCION
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'NUMERODOCUMENTORECEPCION',
                                                                (	select DATE_FORMAT(recepcion.FECHA_RECEPCION, '%d/%m/%Y')
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'FECHARECEPCION',                                                    
                                                                (	select 
                                                                            if(recepcion.TRECEPCION = 1,'Recepción desde Proveedor', 
                                                                            if(recepcion.TRECEPCION = 2,'Recepción desde Productor', 
                                                                                if(recepcion.TRECEPCION = 3,'Recepción de planta Extena',
                                                                                    if(recepcion.TRECEPCION = 4,'Recepción de Inventario Inicial','Sin Datos'))))
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'TRECEPCION',       
                                                                                                        
                                                                (	select 
                                                                    if(recepcion.TRECEPCION = 1,
                                                                        if(recepcion.ID_PROVEEDOR IS NOT NULL, 
                                                                        (  select proveedor.NOMBRE_PROVEEDOR   
                                                                            FROM material_proveedor proveedor                   
                                                                            WHERE recepcion.ID_PROVEEDOR=proveedor.ID_PROVEEDOR),'Sin Datos'), 
                                                                    
                                                                    if(recepcion.TRECEPCION = 2,
                                                                    if(recepcion.ID_PRODUCTOR IS NOT NULL, 
                                                                        (  select productor.NOMBRE_PRODUCTOR  
                                                                            FROM fruta_productor productor     
                                                                            WHERE recepcion.ID_PRODUCTOR=productor.ID_PRODUCTOR),'Sin Datos'), 
                                                                    if(recepcion.TRECEPCION = 3,
                                                                    if(recepcion.ID_PLANTA2 IS NOT NULL, 
                                                                        (  select planta.NOMBRE_PLANTA                                                         
                                                                            FROM principal_planta planta                                                             
                                                                            WHERE recepcion.ID_PLANTA2=planta.ID_PLANTA),'Sin Datos'),
                                                                    if(recepcion.TRECEPCION = 4,'No Aplica','Sin Datos'))))
                                                                    FROM material_recepcionm recepcion
                                                                    WHERE recepcion.ID_RECEPCION=inventario.ID_RECEPCION
                                                                )AS 'ORIGENRECEPCION',  
                                                            
                                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                                    FROM principal_empresa empresa
                                                                    WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                                ) AS 'EMPRESA',
                                                                (   SELECT  planta.NOMBRE_PLANTA
                                                                    FROM principal_planta planta
                                                                    WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                                ) AS 'PLANTA',    
                                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                                    FROM principal_temporada temporada
                                                                    WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                                ) AS 'TEMPORADA'
                                                            FROM 
                                                                material_inventariom inventario  
                                                            WHERE inventario.ESTADO_REGISTRO = 1
                                                            AND inventario.ID_RECEPCION IS NOT NULL
                                                            AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                            AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                                            GROUP BY 
                                                                inventario.ID_PRODUCTO,
                                                                inventario.ID_RECEPCION,
                                                                inventario.ID_EMPRESA , 
                                                                inventario.ID_PLANTA , 
                                                                inventario.ID_TEMPORADA,
                                                                inventario.ID_BODEGA  
            
            
                                                       
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
    public function listarKardexInventarioRecepcionInterplantaPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                    inventario.ID_PRODUCTO ,                                                     
                                                    (  SELECT  producto.CODIGO_PRODUCTO
                                                        FROM material_producto producto 
                                                        WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                    ) AS 'CODIGO',  
                                                    (   SELECT  producto.NOMBRE_PRODUCTO
                                                        FROM material_producto producto 
                                                        WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                    ) AS 'PRODUCTO',                                                     
                                                    (   SELECT (   
                                                                SELECT  tumedida.NOMBRE_TUMEDIDA
                                                                FROM material_tumedida tumedida
                                                                WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                            )
                                                        FROM material_producto producto 
                                                        WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                    ) AS 'TUMEDIDA',                                    
                                                    (  SELECT  bodega.NOMBRE_BODEGA
                                                        FROM principal_bodega bodega 
                                                        WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                    ) AS 'BODEGA', 
                                                    SUM(IFNULL(inventario.CANTIDAD_INVENTARIO,0)) AS 'CANTIDAD',  
                                                    inventario.ID_DESPACHO2,                             
                                                    (	select despacho.NUMERO_DESPACHO
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2
                                                    )AS 'NUMERODESPACHO2', 
                                                    (	select despacho.NUMERO_DOCUMENTO
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2
                                                    )AS 'NUMERODOCUMENTODESPACHO2',
                                                    (	select DATE_FORMAT(despacho.FECHA_DESPACHO, '%d/%m/%Y')
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2
                                                    )AS 'FECHADESPACHO2',                                                     
                                                    (	select 'Recepción Interplanta'
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2
                                                    )AS 'TDESPACHO2',                        
                                                    (   select 
                                                            if(despacho.ID_PLANTA IS NOT NULL, 
                                                            (  select planta.NOMBRE_PLANTA   
                                                                FROM principal_planta planta                   
                                                                WHERE despacho.ID_PLANTA=planta.ID_PLANTA
                                                            ),'Sin Datos')
                                                        FROM material_despachom despacho
                                                        WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO2 
                                                    )AS 'DESTINODESPACHO2', 
                                                    (   SELECT  empresa.NOMBRE_EMPRESA
                                                        FROM principal_empresa empresa
                                                        WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                    ) AS 'EMPRESA',
                                                    (   SELECT  planta.NOMBRE_PLANTA
                                                        FROM principal_planta planta
                                                        WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                    ) AS 'PLANTA',    
                                                    (   SELECT  temporada.NOMBRE_TEMPORADA
                                                        FROM principal_temporada temporada
                                                        WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                    ) AS 'TEMPORADA'
                                                FROM 
                                                    material_inventariom inventario  
                                                WHERE inventario.ESTADO_REGISTRO = 1
                                                    AND ID_DESPACHO2 IS NOT NULL
                                                    AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                    AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                                GROUP BY 
                                                    inventario.ID_PRODUCTO,
                                                    inventario.ID_DESPACHO2 , 
                                                    inventario.ID_EMPRESA , 
                                                    inventario.ID_PLANTA , 
                                                    inventario.ID_TEMPORADA,
                                                    inventario.ID_BODEGA
            
                                                       
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
    public function listarKardexInventarioDespachoPorEmpresaTemporadaCBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT
                                                inventario.ID_PRODUCTO ,                                                     
                                                (  SELECT  producto.CODIGO_PRODUCTO
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'CODIGO',  
                                                (   SELECT  producto.NOMBRE_PRODUCTO
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'PRODUCTO',                                                     
                                                (   SELECT (   
                                                            SELECT  tumedida.NOMBRE_TUMEDIDA
                                                            FROM material_tumedida tumedida
                                                            WHERE tumedida.ID_TUMEDIDA=producto.ID_TUMEDIDA
                                                        )
                                                    FROM material_producto producto 
                                                    WHERE producto.ID_PRODUCTO=inventario.ID_PRODUCTO
                                                ) AS 'TUMEDIDA',                                    
                                                (  SELECT  bodega.NOMBRE_BODEGA
                                                    FROM principal_bodega bodega 
                                                    WHERE bodega.ID_BODEGA=inventario.ID_BODEGA
                                                ) AS 'BODEGA', 
                                                SUM(IFNULL(inventario.CANTIDAD_INVENTARIO,0)) AS 'CANTIDAD',                                                  
                                                inventario.ID_DESPACHO ,                                                    
                                                (	select despacho.NUMERO_DESPACHO
                                                    FROM material_despachom despacho
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'NUMERODESPACHO', 
                                                (	select despacho.NUMERO_DOCUMENTO
                                                    FROM material_despachom despacho
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'NUMERODOCUMENTODESPACHO',
                                                (	select DATE_FORMAT(despacho.FECHA_DESPACHO, '%d/%m/%Y')
                                                    FROM material_despachom despacho
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'FECHADESPACHO',                                                                                              
                                                (	select 
                                                    if(despacho.TDESPACHO = 1,'Despacho a Sub Bodega',
                                                        if(despacho.TDESPACHO = 2,'Despacho a Interplanta',
                                                        if(despacho.TDESPACHO = 3,'Despacho de devolución a Productor',
                                                            if(despacho.TDESPACHO = 4,'Despacho de devolución a Proveedor',
                                                                if(despacho.TDESPACHO = 5,'Despacho a planta Externa',
                                                                    if(despacho.TDESPACHO = 6,'Venta',
                                                                    if(despacho.TDESPACHO = 7,'Regalo','Sin Datos'))))))) 
                                                
                                                    FROM material_despachom despacho                                                     
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'TDESPACHO',   
                                                (	select 
                                                    if(despacho.TDESPACHO = 1,
                                                        if(despacho.ID_BODEGA IS NOT NULL, 
                                                        (  select bodega.NOMBRE_BODEGA   
                                                            FROM principal_bodega bodega                   
                                                            WHERE despacho.ID_BODEGA=bodega.ID_BODEGA),'Sin Datos'),
                                                    if(despacho.TDESPACHO = 2,
                                                        if(despacho.ID_PLANTA2 IS NOT NULL, 
                                                        (  select planta.NOMBRE_PLANTA   
                                                            FROM principal_planta planta                   
                                                            WHERE despacho.ID_PLANTA2=planta.ID_PLANTA),'Sin Datos'),
                                                    if(despacho.TDESPACHO = 3,
                                                    if(despacho.ID_PRODUCTOR IS NOT NULL, 
                                                        (  select productor.NOMBRE_PRODUCTOR   
                                                            FROM fruta_productor productor                   
                                                            WHERE despacho.ID_PRODUCTOR=productor.ID_PRODUCTOR),'Sin Datos'),
                                                    if(despacho.TDESPACHO = 4,
                                                    if(despacho.ID_PROVEEDOR IS NOT NULL, 
                                                        (  select proveedor.NOMBRE_PROVEEDOR   
                                                            FROM material_proveedor proveedor                   
                                                            WHERE despacho.ID_PROVEEDOR=proveedor.ID_PROVEEDOR),'Sin Datos'),
                                                    if(despacho.TDESPACHO = 5,
                                                    if(despacho.ID_PLANTA3 IS NOT NULL, 
                                                        (  select planta.NOMBRE_PLANTA   
                                                            FROM principal_planta planta                     
                                                            WHERE despacho.ID_PLANTA3=planta.ID_PLANTA),'Sin Datos'),      
                                                    
                                                    if(despacho.TDESPACHO = 6,
                                                    if(despacho.ID_CLIENTE IS NOT NULL, 
                                                        (  select cliente.NOMBRE_CLIENTE   
                                                            FROM material_cliente cliente                   
                                                            WHERE despacho.ID_CLIENTE=cliente.ID_CLIENTE),'Sin Datos'),   
                                                    if(despacho.TDESPACHO = 7,despacho.REGALO_DESPACHO,'Sin Datos')  
                                                    ))))))   
                                                    FROM material_despachom despacho
                                                    WHERE despacho.ID_DESPACHO=inventario.ID_DESPACHO
                                                )AS 'DESTINODESPACHO',                                                    
                                                (   SELECT  empresa.NOMBRE_EMPRESA
                                                    FROM principal_empresa empresa
                                                    WHERE empresa.ID_EMPRESA=inventario.ID_EMPRESA
                                                ) AS 'EMPRESA',
                                                (   SELECT  planta.NOMBRE_PLANTA
                                                    FROM principal_planta planta
                                                    WHERE planta.ID_PLANTA=inventario.ID_PLANTA
                                                ) AS 'PLANTA',    
                                                (   SELECT  temporada.NOMBRE_TEMPORADA
                                                    FROM principal_temporada temporada
                                                    WHERE temporada.ID_TEMPORADA=inventario.ID_TEMPORADA
                                                ) AS 'TEMPORADA'
                                            FROM 
                                                material_inventariom inventario  
                                            WHERE inventario.ESTADO_REGISTRO = 1
                                                AND inventario.ID_DESPACHO IS NOT NULL
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'
                                            GROUP BY 
                                                inventario.ID_PRODUCTO,
                                                inventario.ID_DESPACHO, 
                                                inventario.ID_EMPRESA , 
                                                inventario.ID_PLANTA , 
                                                inventario.ID_TEMPORADA,
                                                inventario.ID_BODEGA
            
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
    //TOTALES

    public function obtenerTotalesInventariotCBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(CANTIDAD_INVENTARIO),0) AS 'CANTIDAD'
                                            FROM material_inventariom  ;	");
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
    public function obtenerTotalesInventariot2CBX(){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventariom ;	");
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

    public function obtenerTotalesInventarioPorRecepcionCBX($IDINVENTARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                IFNULL(SUM(CANTIDAD_INVENTARIO),0) AS 'CANTIDAD'
                                            FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDINVENTARIO."'  ;	");
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
    public function obtenerTotalesInventarioPorRecepcion2CBX($IDINVENTARIO){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_RECEPCION = '".$IDINVENTARIO."'  ;	");
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
    public function obtenerTotalesInventarioPorDespachoCBX($IDDESPACHO){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                IFNULL(SUM(CANTIDAD_INVENTARIO),0) AS 'CANTIDAD'
                                            FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DESPACHO = '".$IDDESPACHO."' 
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
    public function obtenerTotalesInventarioPorDespacho2CBX($IDDESPACHO){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ID_DESPACHO = '".$IDDESPACHO."'  
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


    public function obtenerTotalesInventarioPorEmpresaPlantaTemporadaCBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT * 
                                                IFNULL(SUM(CANTIDAD_INVENTARIO),0) AS 'CANTIDAD'
                                            FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function obtenerTotalesInventarioPorEmpresaPlantaTemporadaDisponible2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function obtenerTotalesInventarioPorEmpresaTemporadaDisponible2CBX($IDEMPRESA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventariom
                                                WHERE ESTADO_REGISTRO = 1 
                                                AND ESTADO = 2
                                                AND ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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
    public function obtenerTotalesInventarioPorEmpresaPlantaTemporada2CBX($IDEMPRESA,$IDPLANTA,$IDTEMPORADA){
        try{
            
            $datos=$this->conexion->prepare("SELECT 
                                                FORMAT(IFNULL(SUM(CANTIDAD_INVENTARIO),0),0,'de_DE') AS 'CANTIDAD'
                                             FROM material_inventariom
                                                WHERE ID_EMPRESA = '".$IDEMPRESA."' 
                                                AND ID_PLANTA = '".$IDPLANTA."'
                                                AND ID_TEMPORADA = '".$IDTEMPORADA."'  ;	");
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

    
    public function obtenerFolio($IDFOLIO)
    {
        try {
            $datos = $this->conexion->prepare("SELECT 
                                                IFNULL(COUNT(FOLIO_INVENTARIO),0) AS 'ULTIMOFOLIO',
                                                IFNULL(MAX(FOLIO_INVENTARIO),0) AS 'ULTIMOFOLIO2' 
                                            FROM material_inventariom 
                                                 WHERE  ID_FOLIO = '" . $IDFOLIO . "' 
                                            AND ESTADO_REGISTRO = 1
                                            AND ESTADO !=0
                                            GROUP BY FOLIO_INVENTARIO
                                            ORDER BY ULTIMOFOLIO2 DESC
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
    public function buscarPorRecepcion($IDRECEPCION)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * 
                                                FROM material_inventariom 
                                                    WHERE ID_RECEPCION= '" . $IDRECEPCION . "' 
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
    
    public function buscarPorDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * ,
                                                    IFNULL(CANTIDAD_INVENTARIO,0) AS 'CANTIDAD' ,
                                                    IFNULL(VALOR_UNITARIO,0) AS 'VALOR'
                                                FROM material_inventariom 
                                                    WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                    AND ESTADO_REGISTRO = 1
                                                    AND ESTADO BETWEEN 3 AND 5
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
    public function buscarPorEnDespacho($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * ,
                                                    IFNULL(CANTIDAD_INVENTARIO,0) AS 'CANTIDAD' ,
                                                    IFNULL(VALOR_UNITARIO,0) AS 'VALOR'
                                                FROM material_inventariom 
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
    public function buscarPorDespachoEnTransito($IDDESPACHO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * 
                                                FROM material_inventariom 
                                                    WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                    AND ESTADO_REGISTRO = 1
                                                    AND ESTADO =  5
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


    public function buscarPorDespacho2($IDDESPACHO)
    {
        try {

            /*echo " SELECT 
            *, 
            FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD' ,
            FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'
            FROM material_inventariom IM 
            JOIN principal_bodega PB ON PB.ID_BODEGA = IM.ID_BODEGA
            WHERE IM.ID_DESPACHO= '" . $IDDESPACHO . "' 
            AND IM.ESTADO_REGISTRO = 1
            ;";*/
            $datos = $this->conexion->prepare(" SELECT 
                                                    *, 
                                                    FORMAT(IFNULL(CANTIDAD_INVENTARIO,0),0,'de_DE') AS 'CANTIDAD' ,
                                                    FORMAT(IFNULL(VALOR_UNITARIO,0),3,'de_DE') AS 'VALOR'
                                                    FROM material_inventariom IM 
                                                    JOIN principal_bodega PB ON PB.ID_BODEGA = IM.ID_BODEGA
                                                    WHERE IM.ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                    AND IM.ESTADO_REGISTRO = 1
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
    public function buscarPorRecepcionFolio($IDRECEPCION, $FOLIOINVENTARIO)
    {
        try {

            $datos = $this->conexion->prepare(" SELECT 
                                                    * 
                                                FROM material_inventariom 
                                                    WHERE ID_RECEPCION= '" . $IDRECEPCION . "' 
                                                    AND FOLIO_INVENTARIO = '" . $FOLIOINVENTARIO . "'
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

    public function buscarPorDespachoFolio($IDDESPACHO, $FOLIOINVENTARIO)
    {
        try {

           /* echo " SELECT 
            * 
        FROM material_inventariom 
            WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
            AND FOLIO_INVENTARIO = '" . $FOLIOINVENTARIO . "'
            AND ESTADO_REGISTRO = 1
            AND ESTADO = 2 ;";*/
            $datos = $this->conexion->prepare(" SELECT 
                                                    * 
                                                FROM material_inventariom 
                                                    WHERE ID_DESPACHO= '" . $IDDESPACHO . "' 
                                                    AND FOLIO_INVENTARIO = '" . $FOLIOINVENTARIO . "'
                                                    AND ESTADO_REGISTRO = 1
                                                    AND ESTADO = 3 ;");
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
