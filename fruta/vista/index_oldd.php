<?php
include_once "../../assest/config/validarUsuarioFruta.php";



//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once "../../assest/controlador/CONSULTA_ADO.php";


//INICIALIZAR CONTROLADOR
$CONSULTA_ADO =  NEW CONSULTA_ADO;

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$RECEPCION=0;
$RECEPCIONMP=0;
$RECEPCIONIND=0;
$RECEPCIONPT=0;
$DESPACHO=0;
$PROCESO=0;
$REEMBALAJE=0;
$REPALETIZAJE=0;

//INICIALIZAR ARREGLOS
$ARRAYREGISTROSABIERTOS="";
$ARRAYAVISOS1=$AVISO_ADO->listarAvisoActivosCBX();
//$ARRAYAVISOS2=$AVISO_ADO->listarAvisoActivosFijoCBX();



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYREGISTROSABIERTOS=$CONSULTA_ADO->contarRegistrosAbiertosFruta($EMPRESAS,$PLANTAS,$TEMPORADAS);
if($ARRAYREGISTROSABIERTOS){
    $RECEPCION=$ARRAYREGISTROSABIERTOS[0]["RECEPCION"];
    $RECEPCIONMP=$ARRAYREGISTROSABIERTOS[0]["RECEPCIONMP"];
    $RECEPCIONIND=$ARRAYREGISTROSABIERTOS[0]["RECEPCIONIND"];
    $RECEPCIONPT=$ARRAYREGISTROSABIERTOS[0]["RECEPCIONPT"];
    $DESPACHO=$ARRAYREGISTROSABIERTOS[0]["DESPACHO"];
    $DESPACHOMP=$ARRAYREGISTROSABIERTOS[0]["DESPACHOMP"];
    $DESPACHOIND=$ARRAYREGISTROSABIERTOS[0]["DESPACHOIND"];
    $DESPACHOPT=$ARRAYREGISTROSABIERTOS[0]["DESPACHOPT"];
    $DESPACHOEXPO=$ARRAYREGISTROSABIERTOS[0]["DESPACHOEXPO"];
    $PROCESO=$ARRAYREGISTROSABIERTOS[0]["PROCESO"];
    $REEMBALAJE=$ARRAYREGISTROSABIERTOS[0]["REEMBALAJE"];
    $REPALETIZAJE=$ARRAYREGISTROSABIERTOS[0]["REPALETIZAJE"];
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>INICIO</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!- LLAMADA DE LOS ARCHIVOS NECESARIOS PARA DISEÑO Y FUNCIONES BASE DE LA VISTA -!>
        <?php include_once "../../assest/config/urlHead.php"; ?>
        <!- FUNCIONES BASES -!>
        <script type="text/javascript">
            //REDIRECCIONAR A LA PAGINA SELECIONADA
            function irPagina(url) {
                location.href = "" + url;
            }
        </script>
</head>
<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <!- LLAMADA AL MENU PRINCIPAL DE LA PAGINA-!>
            <?php include_once "../../assest/config/menuFruta.php"; ?>
            <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
            <div class="content-wrapper">
                <div class="container-full">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="page-title">Inicio</h3>
                                <div class="d-inline-block align-items-center">
                                    <nav>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>                                      
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                        </div>
                    </div>
                    <!-- Main content -->                        
                        <section class="content">
                            <div class="row">	     
                                <?php if($PFAVISO=="1"){ ?>    
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12 " >   
                                        <!-- Default box -->
                                        <div class="box box-solid box-info">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">Avisos</h4>                                        
                                                <ul class="box-controls pull-right">
                                                    <!-- <li><a class="box-btn-close" href="#"></a></li> -->
                                                    <li><a class="box-btn-slide" href="#"></a></li>	
                                                    <li><a class="box-title" href="listarAvisos.php">Todo</a></li>
                                                </ul>                                        
                                            </div>
                                            <div class="box-body p-0" id="aviso">
                                                <ul class="todo-list">   
                                                    <?php foreach ($ARRAYAVISOS1 as $r) : ?>
                                                        <li class="p-10">
                                                            <div class="box p-10 mb-0 d-block bb-2 border-danger">
                                                                <!-- drag handle -->
                                                                <span class="handle">
                                                                    <i class="fa fa-plus"></i>
                                                                </span>
                                                                <!-- checkbox -->
                                                                <span class="pull-right badge <?php echo $r["TPRIORIDAD"]?>"><?php echo $r["NOMBRETPRIORIDAD"]?></span>
                                                                <span class="font-size-14 text-line"><a href="#"><?php echo $r["MENSAJE"]?></a> </span>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; ?>                                             
                                                </ul>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /.box -->
                                    </div>    
                                <?php  } ?>   
                                <?php if($PFRABIERTO=="1"){ ?>   
                                    <?php if($PFGRANEL=="1"){ ?>            
                                        <?php if($PFGRECEPCION=="1"){ ?>
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 col-xs-4">                            
                                                <div class="box pull-up  ribbon-box       ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Recepciones MP</span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                                <div class="font-size-40"><?php echo $RECEPCIONMP; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>                         
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 col-xs-4">                               
                                                <div class="box pull-up  ribbon-box       ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Recepciones IND</span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                                <div class="font-size-40"><?php echo $RECEPCIONIND; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>                               
                                        <?php  } ?>                             
                                    <?php  } ?>   
                                    <?php if($PFFRIGORIFICO=="1"){ ?>            
                                        <?php if($PFFRECEPCION=="1"){ ?> 
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 col-xs-4">                              
                                                <div class="box pull-up  ribbon-box       ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Recepciones PT</span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                                <div class="font-size-40"><?php echo $RECEPCIONPT; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>                           
                                        <?php  } ?>                             
                                    <?php  } ?>  
                                    <?php if($PFPACKING=="1"){ ?>            
                                        <?php if($PFPPROCESO=="1"){ ?>
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 col-xs-4">                                         
                                                <div class="box pull-up  ribbon-box      ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Proceso </span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                            <div class="font-size-40"><?php echo $PROCESO; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>	 
                                        <?php  } ?>     	
                                        <?php if($PFPREEMBALEJE=="1"){ ?>                        
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 col-xs-4">                                          
                                                <div class="box pull-up  ribbon-box       ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Reembalaje  </span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                                <div class="font-size-40"><?php echo $REEMBALAJE; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>   
                                        <?php  } ?>                             
                                    <?php  } ?>    
                                    <?php if($PFFRIGORIFICO=="1"){ ?>            
                                        <?php if($PFFRREPALETIZAJE=="1"){ ?> 
                                            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-sm-4 col-4 col-xs-4">                                
                                                <div class="box pull-up  ribbon-box       ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Repaletizaje  </span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                                <div class="font-size-40"><?php echo $REPALETIZAJE; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </diV>
                                            </div>  
                                        <?php  } ?>                             
                                    <?php  } ?>  
                                    <?php if($PFGRANEL=="1"){ ?>            
                                        <?php if($PFGRECEPCION=="1"){ ?>
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">                                              
                                                <div class="box pull-up  ribbon-box       ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Despacho  MP</span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                                <div class="font-size-40"><?php echo $DESPACHOMP; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>    
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">                                                
                                                <div class="box pull-up  ribbon-box       ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Despacho  IND</span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                                <div class="font-size-40"><?php echo $DESPACHOIND; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>  
                                        <?php  } ?>                             
                                    <?php  } ?>    
                                    <?php if($PFFRIGORIFICO=="1"){ ?>            
                                        <?php if($PFFRDESPACHO=="1"){ ?> 
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">                                               
                                                <div class="box pull-up  ribbon-box       ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Despacho  PT</span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                                <div class="font-size-40"><?php echo $DESPACHOPT; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>   
                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 col-xs-6">                                             
                                                <div class="box pull-up  ribbon-box       ">
                                                    <div class="box-body ">
                                                        <div class="ribbon ribbon-warning"><span>Despacho EXPO </span></div>  
                                                        <p class="my-2 mb-0 pt-5 ">
                                                            <div class="text-center my-2">
                                                                <div class="font-size-40"><?php echo $DESPACHOEXPO; ?></div>
                                                                <span>Abiertos</span>
                                                            </div>
                                                        </p>
                                                    </div>
                                                </div>   
                                            </div>   
                                        <?php  } ?>                             
                                    <?php  } ?>  
                                <?php  } ?>                      
                            </div>  

                        </section>
                    <!-- /.content -->
                </div>
            </div>
            <?php include_once "../../assest/config/footer.php"; ?>
            <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <!- LLAMADA URL DE ARCHIVOS DE DISEÑO Y JQUERY E OTROS -!>
        <?php include_once "../../assest/config/urlBase.php"; ?>
</body>
</html>