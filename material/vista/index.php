<?php
include_once "../../assest/config/validarUsuarioMaterial.php";



//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
include_once "../../assest/controlador/CONSULTA_ADO.php";


//INICIALIZAR CONTROLADOR
$CONSULTA_ADO =  NEW CONSULTA_ADO;
//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD
$RECEPCIONE=0;
$RECEPCIONM=0;
$DESPACHOE=0;
$DESPACHOM=0;


//INICIALIZAR ARREGLOS
$ARRAYREGISTROSABIERTOS="";


//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
$ARRAYREGISTROSABIERTOS=$CONSULTA_ADO->contarRegistrosAbiertosMateriales($EMPRESAS,$PLANTAS,$TEMPORADAS);
if($ARRAYREGISTROSABIERTOS){
    $RECEPCIONE=$ARRAYREGISTROSABIERTOS[0]["RECEPCIONE"];
    $RECEPCIONM=$ARRAYREGISTROSABIERTOS[0]["RECEPCIONM"];
    $DESPACHOE=$ARRAYREGISTROSABIERTOS[0]["DESPACHOE"];
    $DESPACHOM=$ARRAYREGISTROSABIERTOS[0]["DESPACHOM"];
}



include_once "../../assest/config/ValidardatosUrl.php";

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
        <?php include_once "../../assest/config/menuMaterial.php"; ?>
        <!-- Content Wrapper. Contains page content -->
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
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                    </div>
                </div>
                <section class="content">
                        <div class="row">	              
                            <?php if($PMRABIERTO=="1"){ ?>                            
                                <?php if($PMATERIALES=="1"){ ?>            
                                    <?php if($PMMRECEPION=="1"){ ?>
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 col-xs-6">                           
                                            <div class="box pull-up  ribbon-box       ">
                                                <div class="box-body ">
                                                    <div class="ribbon ribbon-warning"><span>Recepciones Materiales </span></div>  
                                                    <p class="my-2 mb-0 pt-5 ">
                                                        <div class="text-center my-2">
                                                            <div class="font-size-40"><?php echo $RECEPCIONM; ?></div>
                                                            <span>Abiertos</span>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>   
                                        </div>	                                 
                                    <?php  } ?>        
                                    <?php if($PMMDEAPCHO=="1"){ ?>                     
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 col-xs-6">                                            
                                            <div class="box pull-up  ribbon-box       ">
                                                <div class="box-body ">
                                                    <div class="ribbon ribbon-warning"><span>Despacho Materiales </span></div>  
                                                    <p class="my-2 mb-0 pt-5 ">
                                                        <div class="text-center my-2">
                                                            <div class="font-size-40"><?php echo $DESPACHOM; ?></div>
                                                            <span>Abiertos</span>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>   
                                        </div>                                    
                                    <?php  } ?>                                      
                                <?php  } ?>            
                                <?php if($PMENVASE=="1"){ ?>      
                                    <?php if($PMERECEPCION=="1"){ ?>
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 col-xs-6">                                 
                                            <div class="box pull-up  ribbon-box      ">
                                                <div class="box-body ">
                                                    <div class="ribbon ribbon-warning"><span>Recepciones Envases </span></div>  
                                                    <p class="my-2 mb-0 pt-5 ">
                                                        <div class="text-center my-2">
                                                            <div class="font-size-40"><?php echo $RECEPCIONE; ?></div>
                                                            <span>Abiertos</span>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>   
                                        </div>	 	           
                                    <?php  } ?>        
                                    <?php if($PMEDESPACHO=="1"){ ?>                           
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 col-xs-6">                                     
                                            <div class="box pull-up  ribbon-box       ">
                                                <div class="box-body ">
                                                    <div class="ribbon ribbon-warning"><span>Despacho Envases </span></div>  
                                                    <p class="my-2 mb-0 pt-5 ">
                                                        <div class="text-center my-2">
                                                            <div class="font-size-40"><?php echo $DESPACHOE; ?></div>
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
            </div>
        </div>
        <!- LLAMADA ARCHIVO DEL DISEÑO DEL FOOTER Y MENU USUARIO -!>
            <?php include_once "../../assest/config/footer.php"; ?>
            <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>
</html>