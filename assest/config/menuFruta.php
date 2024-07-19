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
                  //$EMPRESA = $ARRAYEMPRESAS[0]['ID_EMPRESA'];
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
        <?php //include_once "../../config/menuExtra.php"; ?>
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
      <?php if($PFRUTA=="1"){ ?>
        <li class="header">Modulo</li>        
        <?php if($PFGRANEL=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/layout.svg" class="svg-icon" alt="">
              <span>Granel</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">                  
              <?php if($PFGRECEPCION=="1"){ ?>
                <li class="treeview">
                  <a href="#">Recepcion
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right "></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="treeview">
                      <a href="#">Materia Prima
                        <span class="pull-left-container">
                          <i class=" fa fa-angle-right pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="registroRecepcionmp.php">Registro Recepción <i class="ti-more"></i></a></li>
                        <li><a href="listarRecepcionmp.php">Agrupado Recepción<i class="ti-more"></i></a></li>
                        <li><a href="listarRecepcionmpDetallado.php">Detallado Recepción<i class="ti-more"></i></a></li>
                        <li><a href="listarRecepcionmpInterplanta.php">Agrupado Interplanta<i class="ti-more"></i></a></li>
                      </ul>
                    </li>
                    <li class="treeview">
                      <a href="#">Industrial
                        <span class="pull-left-container">
                          <i class=" fa fa-angle-right pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="registroRecepcionind.php">Registro Recepción <i class="ti-more"></i></a> </li>
                        <li><a href="listarRecepcionind.php">Agrupado Recepción<i class="ti-more"></i></a></li>
                        <li><a href="listarRecepcionindDetallado.php">Detallado Recepción<i class="ti-more"></i></a></li>
                        <li><a href="listarRecepcionindInterplanta.php">Agrupado Interplanta<i class="ti-more"></i></a></li>
                      </ul>
                    </li>
                    <li><a href="listarRecepcionGranelConsolidado.php">Consolidado Recepción<i class="ti-more"></i></a></li>     
                  </ul>
                </li>     
              <?php  } ?>
              <?php if($PFGDESPACHO=="1"){ ?>
                <li class="treeview">
                  <a href="#">Despacho
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="treeview">
                      <a href="#">Materia Prima
                        <span class="pull-left-container">
                          <i class=" fa fa-angle-right pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="registroDespachomp.php">Registro Despacho<i class="ti-more"></i></a></li>
                        <li><a href="listarDespachomp.php">Agrupado Despacho<i class="ti-more"></i></a></li>
                        <li><a href="listarDespachompDetallado.php">Detallado Despacho<i class="ti-more"></i></a></li>
                      </ul>
                    </li>
                    <li class="treeview">
                      <a href="#">Industrial
                        <span class="pull-left-container">
                          <i class=" fa fa-angle-right pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="registroDespachoind.php">Registro Despacho<i class="ti-more"></i></a></li>
                        <li><a href="listarDespachoind.php">Agrupado Despacho<i class="ti-more"></i></a></li>
                        <li><a href="listarDespachoindDetallado.php">Detallado Despacho<i class="ti-more"></i></a></li>
                      </ul>
                    </li>
                    <li><a href="listarDespachoGranelConsoliado.php">Consolidado Despacho<i class="ti-more"></i></a></li>
                  </ul>
                </li>      
              <?php  } ?>
              <?php if($PFGGUIA=="1"){ ?>
                <li class="treeview">
                  <a href="#">Guia Por Recibir
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroGuiaPorRecibirMP.php">Materia Prima<i class="ti-more"></i> </a></li>
                    <li><a href="registroGuiaPorRecibirIND.php">Inudstrial<i class="ti-more"></i></a></li>
                  </ul>
                </li>      
              <?php  } ?>
            </ul>
          </li>                 
        <?php  } ?>
        <?php if($PMATERIALES=="1"){ ?>
          <?php if($PMENVASE=="1"){ ?>
            <li class="treeview">
              <a href="#">
                <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/cards.svg" class="svg-icon" alt="">
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
                          <li><a href="registroRecepcione.php">Registro Recepcion<i class="ti-more"></i></a></li>
                          <li><a href="listarRecepcione.php">Agrupado Recepcion<i class="ti-more"></i></a></li>
                          <li><a href="listarRecepcioneDetallado.php">Detallado Recepcion<i class="ti-more"></i></a></li>
                          <li><a href="listarRecepcioneInterplanta.php">Agrupado Interplanta<i class="ti-more"></i></a></li>
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
                            <li><a href="registroDespachoe.php">Registro Despacho<i class="ti-more"></i></a></li>
                            <li><a href="listarDespachoe.php">Agrupado Despacho<i class="ti-more"></i></a></li>
                            <li><a href="listarDespachoeDetallado.php">Detallado Despacho<i class="ti-more"></i></a></li>
                        </ul>
                      </li>
                    <?php  } ?>
                    <?php if($PMEGUIA=="1"){ ?>
                      <li class="treeview">
                        <a href="#">Guia Por Recibir  
                          <span class="pull-left-container">
                            <i class=" fa fa-angle-right pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="registroGuiaPorRecibirE.php">Envases<i class="ti-more"></i></a></li>
                        </ul>
                      </li>
                    <?php  } ?>
                    <?php if($PMKARDEX=="1"){ ?>
                      <?php if($PMKENVASE=="1"){ ?>
                        <li><a href="listarHinventarioe.php">Kardex <i class="ti-more"></i></a></li>
                      <?php  } ?>
                    <?php  } ?>
              </ul>
            </li>              
          <?php  } ?>      
        <?php  } ?>
        <?php if($PFPACKING=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/forms2.svg" class="svg-icon" alt="">
              <span>Packing</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if($PFPPROCESO=="1"){ ?>
                <li class="treeview">
                  <a href="#">Proceso
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroProceso.php">Registro Proceso<i class="ti-more"></i></a></li>
                    <li><a href="listarProceso.php">Agrupado Proceso<i class="ti-more"></i></a></li>
                  </ul>
                </li>    
              <?php  } ?>
              <?php if($PFPREEMBALEJE=="1"){ ?>
                <li class="treeview">
                  <a href="#">Reembalaje
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroReembalajeEx.php"> Registro Reembalaje<i class="ti-more"></i></a></li>
                    <li><a href="listarReembalajeEx.php">Agrupado Reembalaje<i class="ti-more"></i></a></li>
                  </ul>
                </li>    
              <?php  } ?>
              <?php if($PFPPROCESO=="1"){ ?>
              <li class="treeview">
                  <a href="#">Repaletizaje
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroRepaletizajePTFrigorifico.php">Registro Repaletizaje<i class="ti-more"></i></a></li>
                    <li><a href="listarRepaletizajePTFrigorifico.php">Agrupado Repaletizaje<i class="ti-more"></i></a></li>
                  </ul>
                </li> 
                <?php  } ?>
            </ul>
          </li>          
        <?php  } ?>
        <?php if($PEXPORTADORA=="1"){ ?>
          <?php if($PEEXPORTACION=="1"){ ?>
            <li class="treeview">
              <a href="#">
                <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/exchange.svg" class="svg-icon" alt="">
                <span> Exportación</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#">Inst. Carga
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroICarga.php">Registro Inst. Carga<i class="ti-more"></i></a></li>
                    <li><a href="listarICarga.php">Agrupado Inst. Carga<i class="ti-more"></i></a></li>
                    <li><a href="listarICargaDetallado.php">Detallado Inst. Carga</i></a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#">Nota D/C
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroNotadc.php">Registro Nota<i class="ti-more"></i></a></li>
                    <li><a href="listarNotadc.php">Agrupado Nota<i class="ti-more"></i></a></li>
                  </ul>
                </li>
              </ul>
            </li>        
          <?php  } ?>  
        <?php  } ?>
        <?php if($PFSAG=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/transactions.svg" class="svg-icon" alt="">
              <span> Operaciónes SAG</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if($PFSAGINSPECCION=="1"){ ?>
                <li class="treeview">
                  <a href="#">Inspección SAG
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroInpsag.php">Registro Inspección<i class="ti-more"></i></a></li>
                    <li><a href="listarInpsag.php">Agrupado Inspección<i class="ti-more"></i></a></li>
                  </ul>
                </li>  
              <?php  } ?>
            </ul>
          </li>          
        <?php  } ?>
        <?php if($PFFRIGORIFICO=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/maps.svg" class="svg-icon" alt="">
              <span> Frigorifico</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if($PFFRECEPCION=="1"){ ?>
                <li class="treeview">
                  <a href="#">Recepción P. Terminado
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroRecepcionpt.php">Registro Recepción<i class="ti-more"></i></a></li>
                    <li><a href="listarRecepcionpt.php">Agrupado Recepción<i class="ti-more"></i></a></li>
                    <li><a href="listarRecepcionptDetallado.php">Detallado Recepción<i class="ti-more"></i></a></li>
                    <li><a href="listarRecepcionptInterplanta.php">Agrupado Interplanta<i class="ti-more"></i></a></li>
                  </ul>
                </li>     
              <?php  } ?>
              <?php if($PFFRDESPACHO=="1"){ ?>
                <li class="treeview">
                  <a href="#">Despacho
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="treeview">
                      <a href="#">Despacho P. Terminado
                        <span class="pull-left-container">
                          <i class=" fa fa-angle-right pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="registroDespachopt.php">Registro Despacho<i class="ti-more"></i></a></li>
                        <li><a href="listarDespachopt.php">Agrupado Despacho<i class="ti-more"></i></a></li>
                      </ul>
                    </li>
                    <li class="treeview">
                      <a href="#">Despacho Exportacion
                        <span class="pull-left-container">
                          <i class=" fa fa-angle-right pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="registroDespachoEX.php">Registro Despacho<i class="ti-more"></i></a></li>
                        <li><a href="listarDespachoEX.php">Agrupado Despacho<i class="ti-more"></i></a></li>
                      </ul>
                    </li>
                    <li><a href="listarDespachoptexConsolidado.php">Consolidado Despacho<i class="ti-more"></i></a></li>
                  </ul>
                </li>     
              <?php  } ?>
              <?php if($PFFRGUIA=="1"){ ?>
                <li class="treeview">
                  <a href="#">Guia Por Recibir
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroGuiaPorRecibirPT.php"> Producto Terminado<i class="ti-more"></i></a></li>
                  </ul>
                </li>     
              <?php  } ?>
              <?php if($PFFRREPALETIZAJE=="1"){ ?>
                <li class="treeview">
                  <a href="#">Repaletizaje
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroRepaletizajePTFrigorifico.php">Registro Repaletizaje<i class="ti-more"></i></a></li>
                    <li><a href="listarRepaletizajePTFrigorifico.php">Agrupado Repaletizaje<i class="ti-more"></i></a></li>
                  </ul>
                </li>     
              <?php  } ?>
              <?php if($PFFRPC=="1"){ ?>
                <li class="treeview">
                  <a href="#">Planificador Carga
                    <span class="pull-left-container">
                      <i class=" fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="registroPcdespacho.php"> Registro PC<i class="ti-more"></i></a></li>
                    <li><a href="listarPcdespacho.php">Agrupado PC<i class="ti-more"></i></a></li>
                  </ul>
                </li>     
              <?php  } ?>
              <?php if($PFFRCFOLIO=="1"){ ?>
                <li><a href="registroCambiarFolioPT.php">Cambiar Folio P. Terminado<i class="ti-more"></i></a></li>     
              <?php  } ?>
            </ul>
          </li>            
        <?php  } ?>
        <?php if($PFCFRUTA=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/reports.svg" class="svg-icon" alt="">
              <span> Calidad de la fruta</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">              
                <?php if($PFCFRECHAZO=="1"){ ?>
                  <li class="treeview">
                    <a href="#">Rechazo  
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="treeview">
                        <a href="#">Materia Prima
                          <span class="pull-left-container">
                            <i class=" fa fa-angle-right pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="registroRechazomp.php">Registro Rechazo<i class="ti-more"></i></a></li>
                          <li><a href="listarRechazomp.php">Agrupado Rechazo<i class="ti-more"></i></a></li>
                          <li><a href="listarRechazompDetallado.php">Detallado Rechazo<i class="ti-more"></i></a></li>
                        </ul>
                      </li>                  
                      <li class="treeview">
                        <a href="#">Producto Terminado
                          <span class="pull-left-container">
                            <i class=" fa fa-angle-right pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="registroRechazopt.php">Registro Rechazo<i class="ti-more"></i></a></li>
                          <li><a href="listarRechazopt.php">Agrupado Rechazo<i class="ti-more"></i></a></li>
                          <li><a href="listarRechazoptDetallado.php">Detallado Rechazo<i class="ti-more"></i></a></li>
                        </ul>
                      </li>                
                    </ul>
                  </li> 
                  <li class="treeview">
                    <a href="#">Levantamiento  
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="treeview">
                        <a href="#">Materia Prima
                          <span class="pull-left-container">
                            <i class=" fa fa-angle-right pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="registroLevantamientomp.php">Registro Levantamiento<i class="ti-more"></i></a></li>
                          <li><a href="listarLevantamientomp.php">Agrupado Levantamiento<i class="ti-more"></i></a></li>
                          <li><a href="listarLevantamientompDetallado.php">Detallado Levantamiento<i class="ti-more"></i></a></li>
                        </ul>
                      </li>                  
                      <li class="treeview">
                        <a href="#">Producto Terminado
                          <span class="pull-left-container">
                            <i class=" fa fa-angle-right pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="registroLevantamientopt.php">Registro Levantamiento<i class="ti-more"></i></a></li>
                          <li><a href="listarLevantamientopt.php">Agrupado Levantamiento<i class="ti-more"></i></a></li>
                          <li><a href="listarLevantamientoptDetallado.php">Detallado Levantamiento<i class="ti-more"></i></a></li>
                        </ul>
                      </li>                
                    </ul>
                  </li> 
                  <li><a href="listarExiRegistroCalidad.php">Registro de Calidad<i class="ti-more"></i></a></li>                 
                <?php  } ?>
                <?php if($PFCFLEVANTAMIENTO=="1"){ ?>
                  <!--
                  <li class="treeview">
                    <a href="#">Levantamiento  
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="treeview">
                          <a href="#">Materia Prima
                            <span class="pull-left-container">
                              <i class=" fa fa-angle-right pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="#">Registro Levantamiento<i class="ti-more"></i></a></li>
                            <li><a href="#">Agrupado Levantamiento<i class="ti-more"></i></a></li>
                            <li><a href="#">Detallado Levantamiento<i class="ti-more"></i></a></li>
                          </ul>
                        </li>
                        <li class="treeview">
                          <a href="#">Producto Terminado
                            <span class="pull-left-container">
                              <i class=" fa fa-angle-right pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="#">Registro Levantamiento<i class="ti-more"></i></a></li>
                            <li><a href="#">Agrupado Levantamiento<i class="ti-more"></i></a></li>
                            <li><a href="#">Detallado Levantamiento<i class="ti-more"></i></a></li>
                          </ul>
                        </li>
                    </ul>
                  </li> 
                  -->              
                <?php  } ?>       
            </ul>
          </li>           
        <?php  } ?>
        <?php if($PFEXISTENCIA=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/pages.svg" class="svg-icon" alt="">
              <span>Existencia</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <li class="treeview" style="display:none;">
                <a href="#">En Desarrollo
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="listarProductoTerminadoCompleto.php">PT Completo<i class="ti-more"></i></a></li>
                  <li><a href="listarProductoTerminadoIncompleto.php">PT Incompleto<i class="ti-more"></i></a></li>
                  <li><a href="listarProductoTerminadoMuestras.php">PT Muestras<i class="ti-more"></i></a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Disponible
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="listarEximateriaprima.php">Materia Prima<i class="ti-more"></i></a></li>
                  <li><a href="listarExiexportacion.php">Producto Terminado<i class="ti-more"></i></a></li>
                  <li><a href="listarExiIndexportacion.php">Ind Producto Terminado<i class="ti-more"></i></a></li>
                  <li><a href="listarExiindustrial.php">Producto Industrial<i class="ti-more"></i></a></li>
                  <li><a href="listarExiexportacionAgrupado.php">Existencia PT Resumen<i class="ti-more"></i></a></li>
                  
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Despachado
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="listarEximateriaprimaDespachado.php">Materia Prima<i class="ti-more"></i></a></li>
                  <li><a href="listarExiexportacionDespachado.php">Producto Terminado<i class="ti-more"></i></a></li>
                  <li><a href="listarExiindustrialDespachado.php">Producto Industrial<i class="ti-more"></i></a></li>
                </ul>
              </li>        
              <li class="treeview">
                <a href="#">Historial
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="listarHEximateriaprima.php"> Materia Prima<i class="ti-more"></i></a></li>
                  <li><a href="listarHExiexportacion.php"> Producto Terminado<i class="ti-more"></i></a></li>
                  <li><a href="listarHExiindustrial.php">Producto Industrial<i class="ti-more"></i></a></li>
                </ul>
              </li>
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
                <?php if($PFGRANEL=="1"){ ?>     
                  <?php if($PFGRECEPCION=="1"){ ?>
                    <li><a href="listarAPrecepcionmp.php">Recepcion Materia Prima </a></li>
                    <li><a href="listarAPrecepcionind.php">Recepcion Producto Industrial </a></li>
                  <?php  } ?>         
                  <?php if($PFGDESPACHO=="1"){ ?>
                    <li><a href="listarAPdespachomp.php">Despacho Materia Prima </a></li>
                    <li><a href="listarAPdespachoind.php">Despacho Producto Industrial </a></li>
                  <?php  } ?>    
                <?php  } ?>    
                <?php if($PFPACKING=="1"){ ?>
                  <?php if($PFPPROCESO=="1"){ ?>
                    <li><a href="listarAPproceso.php">Proceso </a></li>
                  <?php  } ?>       
                  <?php if($PFPREEMBALEJE=="1"){ ?>
                    <li><a href="listarAPreembalajeEx.php">Reembalaje </a></li>
                  <?php  } ?>    
                <?php  } ?>    
                <?php if($PFSAG=="1"){ ?>
                  <?php if($PFSAGINSPECCION=="1"){ ?>
                    <li><a href="listarAPInpSag.php">Inspección SAG </a></li>
                  <?php  } ?>      
                <?php  } ?>    
                <?php if($PFFRIGORIFICO=="1"){ ?>     
                  <?php if($PFFRECEPCION=="1"){ ?>
                    <li><a href="listarAPrecepcionpt.php">Recepcion Producto Terminado </a></li>
                  <?php  } ?>         
                  <?php if($PFFRDESPACHO=="1"){ ?>
                    <li><a href="listarAPdespachopt.php">Despacho Producto Terminado </a></li>
                    <li><a href="listarAPdespachoEX.php">Despacho Exportacion </a></li>
                  <?php  } ?>    
                  <?php if($PFFRREPALETIZAJE=="1"){ ?>
                    <li><a href="listarAPrepaletizajePTFrigorifico.php"> Repaletizaje </a></li>
                  <?php  } ?>   
                  <?php if($PFFRREPALETIZAJE=="1"){ ?>
                    <li><a href="listarAPpcdespacho.php"> Planificador Carga </a></li>
                  <?php  } ?>   
                <?php  } ?>                   
                <?php if($PFCFRUTA=="1"){ ?>
                  <?php if($PFCFRECHAZO=="1"){ ?>
                    <li><a href="listarAPrechazomp.php"> Rechazo Materia Prima </a></li>
                    <li><a href="listarAPrechazopt.php"> Rechazo Producto Terminado </a></li>
                  <?php  } ?>   
                <?php  } ?>   
              </ul>
            </li> 
          <?php  } ?>  
        <?php  } ?>   
      <?php  } ?> 
    </ul>
  </section>
</aside>