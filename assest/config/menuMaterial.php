<header class="main-header">
  <div class="d-flex align-items-center logo-box pl-20">
    <a href="#" class="waves-effect waves-light nav-link rounded d-none d-md-inline-block push-btn" data-toggle="push-menu" role="button">
      <img src="../../api/cryptioadmin10/html/images/svg-icon/collapse.svg" class="img-fluid svg-icon" alt="">
    </a>
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- logo-->
      <div class="logo-lg">
        <span class="light-logo"><img src="../../assest/img/logo.png" alt="logo"></span>
        <span class="dark-logo"><img src="../../assest/img/logo.png" alt="logo"></span>
      </div>
    </a>
  </div>
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top pl-10">
    <!-- Sidebar toggle button-->
    <div class="app-menu">
      <ul class="header-megamenu nav">
        <li class="btn-group nav-item d-md-none">
          <a href="#" class="waves-effect waves-light nav-link rounded push-btn" data-toggle="push-menu" role="button">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/collapse.svg" class="img-fluid svg-icon" alt="">
          </a>
        </li>
        <li class="btn-group nav-item">
          <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded full-screen" title="Full Screen">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/fullscreen.svg" class="img-fluid svg-icon" alt="">
          </a>
        </li>
        <li class="btn-group nav-item">
          <div class="search-bx ml-10">
            <div class="input-group" style="font-size: 12px;">
              <?php
              if (isset($_SESSION["NOMBRE_USUARIO"])) {
                $ARRAYEMPRESAS = $EMPRESA_ADO->verEmpresa($EMPRESAS);
                if ($ARRAYEMPRESAS) {
                  echo $ARRAYEMPRESAS[0]['NOMBRE_EMPRESA'];
                 // $EMPRESA = $ARRAYEMPRESAS[0]['ID_EMPRESA'];
                } else {
                  echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
                }
              } else {
                echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
              }
              ?>
              <br>
              <?php
              if (isset($_SESSION["NOMBRE_USUARIO"])) {
                $ARRAYPLANTAS = $PLANTA_ADO->verPlanta($PLANTAS);
                if ($ARRAYPLANTAS) {
                  echo $ARRAYPLANTAS[0]['NOMBRE_PLANTA'];
                  //$PLANTA = $ARRAYPLANTAS[0]['ID_PLANTA'];
                } else {
                  echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
                }
              } else {
                echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
              }
              ?>
              <br>
              <?php
              if (isset($_SESSION["NOMBRE_USUARIO"])) {
                $ARRAYTEMPORADAS = $TEMPORADA_ADO->verTemporada($TEMPORADAS);
                if ($ARRAYTEMPORADAS) {
                  echo $ARRAYTEMPORADAS[0]['NOMBRE_TEMPORADA'];
                  //$TEMPORADA = $ARRAYTEMPORADAS[0]['ID_TEMPORADA'];
                } else {
                  echo "<script type='text/javascript'> location.href ='iniciarSessionSeleccion.php';</script>";
                }
              } else {
                echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
              }
              ?>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="navbar-custom-menu r-side">
      <ul class="nav navbar-nav">       
        <!-- Notifications -->
        <li class="dropdown notifications-menu">
          <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="Notifications">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/notifications.svg" class="img-fluid svg-icon" alt="">
          </a>
          <ul class="dropdown-menu animated bounceIn">
            <li class="header">
              <div class="p-20">
                <div class="flexbox">
                  <div>
                    <h4 class="mb-0 mt-0">Notificaciones</h4>
                  </div>
                  <div>
                    <a href="#" class="text-danger">Limpiar Todo</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu sm-scrol">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer">
              <a href="#">Ver Todo</a>
            </li>
          </ul>
        </li>
        <!-- User Account-->
        <li class="dropdown user user-menu">
          <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/user.svg" class="rounded svg-icon" alt="" />
          </a>
          <ul class="dropdown-menu animated flipInX">
            <!-- User image -->
            <li class="user-header bg-img" style="background-image: url(../../api/cryptioadmin10/html/images/user-info.jpg)" data-overlay="3">
              <div class="flexbox align-self-center">
                <img src="../../api/cryptioadmin10/html/images/avatar/7.jpg" class="float-left rounded-circle" alt="User Image">
                <h4 class="user-name align-self-center">
                  <?php
                  if (isset($_SESSION["NOMBRE_USUARIO"])) {

                    $ARRAYNOMBRESUSUARIOSLOGIN = $USUARIO_ADO->ObtenerNombreCompleto($IDUSUARIOS);
                    $NOMBRESUSUARIOSLOGIN = $ARRAYNOMBRESUSUARIOSLOGIN[0]["NOMBRE_COMPLETO"];
                  }
                  ?>
                  <span> <?php echo $NOMBRESUSUARIOSLOGIN; ?> </span>
                  <br>
                  <small>
                    <?php
                    if (isset($_SESSION["NOMBRE_USUARIO"])) {
                      $ARRAYTUSUARIO = $TUSUARIO_ADO->verTusuario($_SESSION["TIPO_USUARIO"]);
                      if ($ARRAYTUSUARIO) {
                        echo $ARRAYTUSUARIO[0]['NOMBRE_TUSUARIO'];
                      }
                    } else {
                      session_destroy();
                      echo "<script type='text/javascript'> location.href ='iniciarSession.php';</script>";
                    }
                    ?>
                  </small>
                </h4>
              </div>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <a class="dropdown-item" href="verUsuario.php"><i class="ion ion-person"></i> Mi Perfil</a>              
              <a class="dropdown-item" href="editarUsuario.php"><i class="ion ion-email-unread"></i> Editar Perfil</a>
              <a class="dropdown-item" href="editarUsuarioClave.php"><i class="ion ion-settings"></i> Cambiar Contrasena</a>              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="verUsuarioActividad.php"><i class="ion ion-bag"></i> Mi Actividad</a>              
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" data-toggle="modal" data-target="#modal-empresa" title="Cambiar">
                <i class="ti-settings"></i>Cambiar Empresa
              </a>
              <a class="dropdown-item" data-toggle="modal" data-target="#modal-planta" title="Cambiar">
                <i class="ti-settings"></i>Cambiar Planta
              </a>
              <div class="dropdown-divider"></div>
              <div class="p-10">
                <center>
                  <form method="post">
                    <button type="submit" class="btn btn-rounded btn-danger " name="CERRARS" value="CERRARS">
                      <i class="ion-log-out"></i>
                      Cerrar Sesion
                    </button>
                  </form>
                </center>
              </div>
            </li>
          </ul>
        </li>
        <?php //include_once "../../config/menuExtra.php"; 
        ?>
        <!-- Control Sidebar Toggle Button -->
        <!--
        <li>
          <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/settings.svg" class="img-fluid svg-icon" alt="">
          </a>
        </li>
        -->
      </ul>
    </div>
  </nav>
</header>
<?php
$ARRAYEMPRESACAMBIAR = $EMPRESA_ADO->listarEmpresaCBX();
$ARRAYPLANTACAMBIAR = $PLANTA_ADO->listarPlantaPropiaCBX();
?>
<!-- modal Area -->
<div class="modal center-modal fade" id="modal-empresa" tabindex="-1">
  <form method="POST">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar </h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
          <div class="form-group">
            <label>Empresa</label>
            <select class="form-control select2" id="EMPRESACAMBIAR" name="EMPRESACAMBIAR" style="width: 100%;" <?php echo $DISABLEDMENU; ?>>
              <option></option>
              <?php foreach ($ARRAYEMPRESACAMBIAR as $r) : ?>
                <?php if ($ARRAYEMPRESACAMBIAR) {    ?>
                  <option value="<?php echo $r['ID_EMPRESA']; ?>" <?php if ($EMPRESAS == $r['ID_EMPRESA']) {
                                                                    echo "selected";
                                                                  } ?>> <?php echo $r['NOMBRE_EMPRESA'] ?> </option>
                <?php } else { ?>
                  <option>No Hay Datos Registrados </option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
            <label id="val_empresa" class="validacion"> </label>
          </div>
          </p>

        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-rounded btn-primary float-right" id="CAMBIARE" name="CAMBIARE" <?php echo $DISABLEDMENU; ?>>Cambiar</button>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="modal center-modal fade" id="modal-planta" tabindex="-1">
  <form method="POST">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar </h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
          <div class="form-group">
            <label>Planta</label>
            <select class="form-control select2" id="PLANTACAMBIAR" name="PLANTACAMBIAR" style="width: 100%;" <?php echo $DISABLEDMENU; ?>>
              <option></option>
              <?php foreach ($ARRAYPLANTACAMBIAR as $r) : ?>
                <?php if ($ARRAYPLANTACAMBIAR) {    ?>
                  <option value="<?php echo $r['ID_PLANTA']; ?>" <?php if ($PLANTAS == $r['ID_PLANTA']) {
                                                                    echo "selected";
                                                                  } ?>> <?php echo $r['NOMBRE_PLANTA'] ?> </option>
                <?php } else { ?>
                  <option>No Hay Datos Registrados </option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
            <label id="val_planta" class="validacion"> </label>
          </div>
          </p>

        </div>
        <div class="modal-footer modal-footer-uniform">
          <button type="button" class="btn btn-rounded btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-rounded btn-primary float-right" id="CAMBIARP" name="CAMBIARP" <?php echo $DISABLEDMENU; ?>>Cambiar</button>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="index.php">
          <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/dashboard.svg" class="svg-icon" alt="">
          <span>Inicio</span>
        </a>
      </li>      
      <?php if($PMATERIALES=="1"){ ?>
        <li class="header">Modulo</li>        
        <?php if($PMMATERIALES=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/layout.svg" class="svg-icon" alt="">
              <span>Materiales</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu"> 
              <?php if($PMMRECEPION=="1"){ ?>
                <li class="treeview">
                  <a href="#">Recepcion
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroRecepcionm.php">Registro Recepción </a></li>
                    <li><a href="listarRecepcionm.php"> Agrupado Recepción  </a></li>
                    <li><a href="listarRecepcionmDetallado.php"> Detallado Recepción  </a></li>
                    <li><a href="listarRecepcionmInterplanta.php"> Agrupado Interplanta  </a></li>
                  </ul>
                </li>      
              <?php  } ?> 
              <?php if($PMMDEAPCHO=="1"){ ?>
                <li class="treeview">
                  <a href="#">Despacho
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroDespachom.php">Registro Despacho </a></li>
                    <li><a href="listarDespachom.php">Agrupado Despacho </a></li>
                    <li><a href="listarDespachomDetallado.php">Detallado Despacho </a></li>
                  </ul>
                </li>
              <?php  } ?> 
              <?php if($PMMGUIA=="1"){ ?>
                <li class="treeview">
                  <a href="#">Guía Por Recibir
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroGuiaPorRecibirM.php">Materiales  </a></li>
                  </ul>
                </li>
              <?php  } ?> 
              <li><a href="listarInventariom.php">Existencia Materiales </a></li>
              <li><a href="listarInventariomResumen.php">Resumen Materiales </a></li>
              <li><a href="listarInventariomHistorial.php">Historial Materiales </a></li>
            </ul>
          </li> 
        <?php  } ?>   
        <?php if($PMENVASE=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/apps.svg" class="svg-icon" alt="">
              <span>Envases</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if($PMERECEPCION=="1"){ ?>
                <li class="treeview">
                  <a href="#">Recepcion
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroRecepcione.php">Registro Recepción </a></li>
                    <li><a href="listarRecepcione.php"> Agrupado Recepción </a></li>
                    <li><a href="listarRecepcioneDetallado.php"> Detallado Recepción  </a></li>
                    <li><a href="listarRecepcioneInterplanta.php"> Agrupado Interplanta  </a></li>
                  </ul>
                </li>     
              <?php  } ?>        
              <?php if($PMEDESPACHO=="1"){ ?>
                <li class="treeview">
                  <a href="#">Despacho
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroDespachoe.php">Registro Despacho </a></li>
                    <li><a href="listarDespachoe.php">Agrupado Despacho </a></li>
                    <li><a href="listarDespachoeDetallado.php">Detallado Despacho </a></li>
                  </ul>
                </li>
              <?php  } ?>   
              <?php if($PMEGUIA=="1"){ ?>
                <li class="treeview">
                  <a href="#">Guía Por Recibir
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroGuiaPorRecibirE.php">Envases </a></li>
                  </ul>
                </li>
              <?php  } ?>  
              <li><a href="listarInventarioe.php">Existencia Envases </a></li>
            </ul>
          </li>   
        <?php  } ?>  
        <?php if($PMADMINISTRACION=="1"){ ?>            
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/invoice.svg" class="svg-icon" alt="">
              <span>Administración</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#">Orden Compra
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">                  
                  <?php if($PMAOC=="1"){ ?>    
                    <li><a href="registroOcompra.php">Registro Orden </a></li>
                    <li><a href="listarOcompra.php"> Agrupado Orden </a></li>
                    <li><a href="listarOcompraDetallado.php"> Detallado Orden </a></li>
                  <?php  } ?>  
                  <?php if($PMAOCAR=="1"){ ?>    
                    <li><a href="listarOcompraAR.php"> Aprobar/Rechazar </a></li>
                  <?php  } ?>  
                </ul>
              </li>             
              <?php if($PMMATERIALES=="1"){ ?>    
                <li><a href="listarInventariomOcompra.php">Existencia Materiales </a></li>
              <?php  } ?>  
              <?php if($PMENVASE=="1"){ ?>    
                <li><a href="listarInventarioeOcompra.php">Existencia Envases </a></li>
              <?php  } ?>  
            </ul>
          </li>
        <?php  } ?> 

        <?php if($PMKARDEX=="1"){ ?>     
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/pages.svg" class="svg-icon" alt="">
              <span>Kardex</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if($PMKMATERIAL=="1"){ ?>  
                <li><a href="listarHInventariom.php">Kardex Materiales </a></li>
              <?php  } ?>  
              <?php if($PMKENVASE=="1"){ ?>  
                <li><a href="listarHInventarioe.php">Kardex Envases </a></li>
              <?php  } ?>  
            </ul>
          </li>
        <?php  } ?>          
        <?php if($PADMINISTRADOR=="1"){ ?>   
          <?php if($PADAPERTURA=="1"){ ?> 
            <li class="treeview">
              <a href="#">
                <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/extensions.svg" class="svg-icon" alt="">
                <span>Apertura Registro</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">                
                <?php if($PMERECEPCION=="1"){ ?>
                  <li><a href="listarAPrecepcionm.php">Recepcion Materiales </a></li>
                <?php  } ?>  
                <?php if($PMMDEAPCHO=="1"){ ?>
                  <li><a href="listarAPDespachom.php">Despacho Materiales </a></li>
                <?php  } ?>  
                <?php if($PMERECEPCION=="1"){ ?>
                  <li><a href="listarAPrecepcione.php">Recepcion Envases </a></li>
                <?php  } ?>  
                <?php if($PMEDESPACHO=="1"){ ?>
                  <li><a href="listarAPdespachoe.php">Despacho Envases </a></li>
                <?php  } ?>  
                <?php if($PMAOC=="1"){ ?>
                  <li><a href="listarAPocompra.php">Orden Compra </a></li>
                <?php  } ?>                  
              </ul>
            </li> 
          <?php  } ?>  
        <?php  } ?>   
      <?php  } ?>      
      <?php if($PMANTENEDORES=="1"){ ?>
        <li class="header">Configuraciones</li>
        <li class="treeview">
          <a href="#">
            <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/forms2.svg" class="svg-icon" alt="">
            <span>Mantenedores</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#">Principal
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroPlanta.php">Planta </a></li>
                <li><a href="registroBodega.php">Bodega </a></li>
                <li><a href="registroFolio.php">Folio </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">Ubicacion
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroCiudad.php">Ciudad </a></li>
                <li><a href="registroComuna.php">Comuna </a></li>
                <li><a href="registroProvincia.php">Provincia </a></li>
                <li><a href="registroRegion.php">Region </a></li>
                <li><a href="registroPais.php">Pais </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">Fruta
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroEspecies.php">Especies </a></li>
                <li><a href="registroProductor.php">Productor </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">Producto
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroFamilia.php">Familia </a></li>
                <li><a href="registroSubfamilia.php">Sub Familia </a></li>
                <li><a href="registroProveedor.php">Proveedor </a></li>
                <li><a href="registroProducto.php">Producto </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">Transporte
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroTransporte.php">Transporte </a></li>
                <li><a href="registroConductor.php">Conductor </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">Tipo
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroTmoneda.php">Tipo Moneda </a></li>
                <li><a href="registroTdocumento.php">Tipo Documento </a></li>
                <li><a href="registroTumedida.php">Tipo Unid. Medida </a></li>
                <li><a href="registroTcontenedor.php">Tipo Contenedor </a></li>
                <li><a href="registroTproductor.php">Tipo Productor </a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">Otros
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroCliente.php">Cliente </a></li>
                <li><a href="registroComprador.php">Comprador </a></li>
                <li><a href="registroResponsable.php">Responsable </a></li>
                <li><a href="registroFpago.php">Formato Pago </a></li>
              </ul>
            </li>
          </ul>
        </li>
      <?php  } ?>
    </ul>
  </section>
</aside>