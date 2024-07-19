<?php

include_once "../../assest/config/validarUsuarioFruta.php";


//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES
//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR


//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD



//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES



$ARRAYAVISOS=$AVISO_ADO->listarAvisoTodosCBX();





?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Consolidado Despacho Granel</title>
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

           
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                function abrirPestana(url) {
                    var win = window.open(url, '_blank');
                    win.focus();
                }
                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE RECEPCION
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
                }
            </script>
</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <?php include_once "../../assest/config/menuFruta.php"; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Granel</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Avisos</a>  </li>
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
                    <?php foreach ($ARRAYAVISOS as $r) : ?>
            <div class="col-md-12 col-12">
				<div class="box">
				  <div class="box-header">
					<div class="box-controls pull-right">
					  <button class="btn btn-xs btn-<?php echo $r["TPRIORIDAD"]?>" href="#"><?php echo $r["NOMBRETPRIORIDAD"]?></button>
					</div>                
				  </div>

				  <div class="box-body">
					<p><?php echo $r["MENSAJE"]?></p>
				  </div>
				</div>
			  </div>

              <?php endforeach; ?>     
                       <!--<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">  
                        
                            <div class="box box-solid box-info">
                                <div class="box-header with-border">
                                    <h4 class="box-title">Avisos</h4>                                   
                                    <ul class="box-controls pull-right">
                          
                                        <li><a class="box-title" href="index.php">Volver</a></li>
                                    </ul>                                     
                                </div>
                                <div class="box-body p-0" id="aviso">
                                 
			  
                                    <ul class="todo-list">   
                                        
                                            <li class="p-10">
                                                <div class="box p-10 mb-0 d-block bb-2 border-danger">
                                                  
                                                    <span class="handle">
                                                        <i class="fa fa-plus"></i>
                                                    </span>
                                                  
                                                    <span class="pull-right badge <?php //echo $r["TPRIORIDAD"]?>"><?php //echo $r["NOMBRETPRIORIDAD"]?></span>
                                                    <span class="font-size-14 text-line"><a href="#"><?php //echo $r["MENSAJE"]?></a> </span>
                                                </div>
                                            </li>
                                                                              
                                    </ul>
                                </div>
                            
                            </div>
                      
                        </div>-->
                    </div>
                </section>
                <!-- /.content -->
            </div>
        </div>

        <?php include_once "../../assest/config/footer.php"; ?>
        <?php include_once "../../assest/config/menuExtraFruta.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
</body>

</html>