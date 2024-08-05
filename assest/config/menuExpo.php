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
      <?php if($PEXPORTADORA=="1"){ ?>
        <li class="header">Modulo</li>    
        <?php if($PEMATERIALES=="1"){ ?>
          <!--<li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/reports.svg" class="svg-icon" alt="">
              <span>Materiales</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">     
              <li class="treeview">
                <a href="#">Ficha Consumo
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroFicha.php">Registro Ficha </i></a></li>
                  <li><a href="listarFicha.php"> Agrupado Ficha</i></a></li>
                </ul>
              </li>
              <li><a href="listarConsumo.php">Consumo Materiales</i></a></li>
              <li><a href="listarConsumoProceso.php">Cons. Mat. Proceso</i></a></li>
               <li style="display:none"><a href="listarConsumoFolio.php">Cons. Mat. Folio</i></a></li> 
            </ul>
          </li>-->            
        <?php  } ?>    
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
                <!--<a href="#">Inst. Carga
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroICarga.php">Registro Inst. Carga</i></a></li>
                  <li><a href="listarICarga.php">Agrupado Inst. Carga</i></a></li>
                  <li><a href="listarICargaDetallado.php">Detallado Inst. Carga</i></a></li>
                </ul>-->
              </li> 
              <li class="treeview">
                <a href="#">Nota D/C
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="registroNotadc.php">Registro Nota</i></a></li>
                  <li><a href="listarNotadc.php">Agrupado Nota</i></a></li>
                </ul>
              </li>
            </ul>
          </li>
        <?php  } ?>     
        <?php if($PELIQUIDACION=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/transactions.svg" class="svg-icon" alt="">
              <span> Liquidación</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="registroValorLiquidacion.php">Registro Valor Liqui.</i></a></li>
                <li><a href="listarValorLiquidacion.php">Agrupado Valor Liqui.</i></a></li>   
                <li><a href="registroTitemLiqui.php"></i>Item Liqui.</a></li>   
            </ul>
          </li>
        <?php  } ?>
          <li class="treeview">
              <a href="#">
                  <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/transactions.svg" class="svg-icon" alt="">
                  <span> Anticipo</span>
                  <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="registroAnticipo.php">Registro Anticipo</i></a></li>
                  <li><a href="listarAnticipo.php">Agrupado Anticipo.</i></a></li>
              </ul>
          </li>
        <?php if($PEPAGO=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/transactions.svg" class="svg-icon" alt="">
              <span> Pago</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="registroValorPago.php">Registro Valor Pago.</i></a></li>
                <li><a href="listarValorPago.php">Agrupado Valor Pago.</i></a></li>   
                <li><a href="registroTitemPago.php"></i>Item Pago.</a></li>   
            </ul>
          </li>
        <?php  } ?>
        <?php if($PEFRUTA=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/apps.svg" class="svg-icon" alt="">
              <span> Fruta</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <?php if($PEFCICARGA=="1"){ ?>
                  <li><a href="registroCambiarIcarga.php">Cambio  Inst. Carga</i></a></li>
                <?php  } ?>  
            </ul>
          </li>
        <?php  } ?> 
        <?php if($PEINFORMES=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/pages.svg" class="svg-icon" alt="">
              <span> Informes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="treeview">
                <a href="#">Granel
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">                  
                  <li class="treeview">
                    <a href="#">Detallado Recepción
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="listarRecepcionmpDetallado.php">Detallado Recepción MP</i></a></li>
                      <li><a href="listarRecepcionindDetallado.php">Detallado Recepción IND</i></a></li>
                      <li><a href="listarRecepcionGranelConsolidado.php">Consolidado Recep. Granel</i></a></li>
                    </ul>
                  </li>
                  <li class="treeview">
                    <a href="#">Detallado Despacho
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="listarDespachompDetallado.php">Detallado Despacho MP</i></a></li>  
                      <li><a href="listarDespachoindDetallado.php">Detallado Despacho IND</i></a></li>
                      <li><a href="listarDespachoGranelConsoliado.php">Consolidado Desp. Granel</i></a></li>
                    </ul>
                  </li>              
                  <li class="treeview">
                    <a href="#">Existencia
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">         
                      <li class="treeview">
                        <a href="#">Disponible
                          <span class="pull-left-container">
                            <i class=" fa fa-angle-right pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="listarEximateriaprima.php">Materia Prima</i></a></li>          
                          <li><a href="listarExiindustrial.php">Producto Industrial</i></a></li>
                        </ul>
                      </li>            
                      <li class="treeview">
                        <a href="#">Despachado
                          <span class="pull-left-container">
                            <i class=" fa fa-angle-right pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="listarEximateriaprimaDespachado.php">Materia Prima</i></a></li>          
                          <li><a href="listarExiindustrialDespachado.php">Producto Industrial</i></a></li>
                        </ul>
                      </li>     
                      <li class="treeview">
                        <a href="#">Historial
                          <span class="pull-left-container">
                            <i class=" fa fa-angle-right pull-right"></i>
                          </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="listarHEximateriaprima.php">Materia Prima</i></a></li>
                          <li><a href="listarHExiindustrial.php">Producto Industrial</i></a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Producto Terminado
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">    
                  <li><a href="listarRecepcionptDetallado.php">Detallado Recepción</i></a></li>             
                  <li class="treeview">
                    <a href="#">Detallado Despacho
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="listarDespachoptDetallado.php">Despacho PT</i></a></li>
                      <li><a href="listarDespachoexDetallado.php">Despacho Expo</i></a></li>
                      <li><a href="listarDespachoptexConsolidado.php">Consolidado Desp. PT</i></a></li>
                    </ul>
                  </li>       
                  <li class="treeview">
                    <a href="#">Existencia
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="listarExiexportacion.php">Disponible </i></a></li>
                      <li><a href="listarExiexportacionDespachado.php">Despachado </i></a></li>
                      <li><a href="listarHExiexportacion.php">Historial </i></a></li>
                    </ul>
                  </li>                         
                  <li><a href="listarExiexportacionAgrupado.php">Agrupado PT </i></a></li>  
                </ul>
              </li>
              <li class="treeview">
                <a href="#">Gestión
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="listarRecepcionConsolidado.php">Consolidado Recepción </i></a></li>
                  <li><a href="listarDespachoConsolidado.php">Consolidado Despacho </i></a></li>
                  <li><a href="#">Informe Liquidación </i></a></li>
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
                <?php if($PEMATERIALES=="1"){ ?>
                  <li><a href="listarAPficha.php">Ficha Consumo </a></li>
                <?php  } ?>         
                <?php if($PEEXPORTACION=="1"){ ?>
                  <li><a href="listarAPiCarga.php">Instructivo Carga </a></li>
                <?php  } ?>  
                <?php if($PEEXPORTACION=="1"){ ?>
                  <li><a href="listarAPnotadc.php">Nota D/C </a></li>
                <?php  } ?>  
                <?php if($PELIQUIDACION=="1"){ ?>
                  <li><a href="listarAPvalor.php">Valor Liquidación </a></li>
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
            <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/miscellaneous.svg" class="svg-icon" alt="">
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
                <li><a href="registroEmpresa.php"></i>Empresa</a></li>
                <li><a href="registroPlanta.php"></i>Planta</a></li>
                <li><a href="registroTemporada.php"></i>Temporada</a></li>
                <!--<li><a href="registroBodega.php"></i>Bodega</a></li> -->
                <li><a href="registroFolio.php"></i>Folio</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">Fruta
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroProductor.php"></i>Productor</a></li>
                <li><a href="registroVespecies.php"></i>Variedad </a></li>
                <li><a href="registroEspecies.php"></i>Especies</a></li>
                <li><a href="registroCuartel.php"></i> Cuartel</a></li>
                <li><a href="registroTetiqueta.php"></i>Etiqueta</a></li>
                <li><a href="registroTembalaje.php"></i>Embalaje</a></li>
                <li><a href="registroTcalibre.php"></i>Calibre</a></li>
                <li><a href="registroTcalibreind.php"></i>Calibre Industrial</a></li>
              </ul>
            </li>          
            <li class="treeview">
              <a href="#">Estandares
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroErecepcion.php"></i>Granel</a></li>
                <li><a href="registroEexportacion.php"></i>Exportacion</a></li>
                <li><a href="registroEcomercial.php"></i> Expo. Comercial</a></li>
                <li><a href="registroEindustrial.php"></i>Industrial</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">Ubicacion
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroCiudad.php"></i>Ciudad</a></li>
                <li><a href="registroComuna.php"></i>Comuna</a></li>
                <li><a href="registroProvincia.php"></i>Provincia</a></li>
                <li><a href="registroRegion.php"></i>Region</a></li>
                <li><a href="registroPais.php"></i>Pais</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">Transporte
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroLaerea.php"></i>Linea Area</a></li>
                <li><a href="registroNaviera.php"></i>Naviera</a></li>
                <li><a href="registroTransporte.php"></i>Transporte</a></li>
                <li><a href="registroConductor.php"></i>Conductor</a></li>
              </ul>
            </li>
            <?php if($PEEXPORTACION=="1"){ ?>
              <li class="treeview">
                <a href="#">Instructivo
                  <span class="pull-left-container">
                    <i class=" fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">              
                  <li class="treeview">
                    <a href="#">Destino
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="registroLdestino.php"></i>Lugar Destino</a></li>
                      <li><a href="registroPdestino.php"></i>Puerto Destino </a></li>
                      <li><a href="registroAdestino.php"></i>Aeropuerto Destino </a></li>
                    </ul>
                  </li>
                  <li class="treeview">
                    <a href="#">Carga
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="registroLcarga.php"></i>Lugar Carga</a></li>
                      <li><a href="registroPcarga.php"></i>Puerto Carga </a></li>
                      <li><a href="registroAcarga.php"></i>Aeropuerto Carga </a></li>
                    </ul>
                  </li>
                  <li class="treeview">
                    <a href="#">Pago
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="registroFpago.php"></i>Formato Pago</a></li>
                      <li><a href="registroCventa.php"></i>Clausaula Venta </a></li>
                      <li><a href="registroMventa.php"></i>Modalidad Venta </a></li>
                    </ul>
                  </li>
                  <li class="treeview">
                    <a href="#">Mercado
                      <span class="pull-left-container">
                        <i class=" fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="registroMercado.php"></i>Mercado</a></li>
                      <li><a href="registroRmercado.php"></i>Restrinccion Mercado</a></li>
                    </ul>
                  </li>
                  <li><a href="registroExportadora.php"></i>Exportadora</a></li>
                  <li><a href="registroAtmosfera.php"></i>Atmosfera</a></li>
                  <li><a href="registroEmisionbl.php"></i>Emision BL</a></li>
                  <li><a href="registroConsignatorio.php"></i>Consignatorio</a></li>
                  <li><a href="registroNotificador.php"></i>Notificador </a></li>
                  <li><a href="registroBroker.php"></i>Cliente </a></li>
                  <li><a href="registroRfinal.php"></i>Recibidor Final </a></li>
                  <li><a href="registroAaduana.php"></i>Agente Aduana </a></li>
                  <li><a href="registroAgcarga.php"></i>Agente Carga </a></li>
                  <li><a href="registroDfinal.php"></i>Destino Final </a></li>
                  <li><a href="registroSeguro.php"></i>Seguro </a></li>
                </ul>
              </li>  
            <?php  } ?>     
            <li class="treeview">
              <a href="#">Tipo
                <span class="pull-left-container">
                <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroTproductor.php"></i>Tipo Productor</a></li>
                <li><a href="registroTproceso.php"></i>Tipo Proceso</a></li>
                <li><a href="registroTreembalaje.php"></i>Tipo Reembalaje</a></li>
                <li><a href="registroTcontenedor.php"></i>Tipo Contenedor</a></li>
                <li><a href="registroTflete.php"></i>Tipo Flete</a></li>
                <li><a href="registroTmoneda.php"></i>Tipo Moneda</a></li>
                <li><a href="registroTservicio.php"></i>Tipo Servicio</a></li>
                <li><a href="registroTmanejo.php"></i>Tipo Manejo</a></li>
                <li><a href="registroTinpsag.php"></i>Tipo Inspección Sag</a></li>
                <li><a href="registroTtratamiento1.php"></i>Tipo Tratamiento 1</a></li>
                <li><a href="registroTtratamiento2.php"></i>Tipo Tratamiento 2</a></li>
                <li><a href="registroTcategoria.php"></i>Tipo Categoria</a></li>
                <li><a href="registroTcolor.php"></i>Tipo Color</a></li>    
              </ul>
            </li>         
            <li class="treeview">
              <a href="#">Otros
                <span class="pull-left-container">
                  <i class=" fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="registroCcalidad.php"></i>Color Calidad</a></li>
                <li><a href="registroContraparte.php"></i>Contraparte</a></li>
                <li><a href="registroInpector.php"></i>Inpector</a></li>
                <li><a href="registroComprador.php"></i>Comprador</a></li>
              </ul>
            </li>      
          </ul>
        </li>     
      <?php  } ?>
      <?php if($PADMINISTRADOR=="1"){ ?>
        <?php if($PADUSUARIO=="1"){ ?>
          <li class="treeview">
            <a href="#">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/members.svg" class="svg-icon" alt="">
              <span>Usuario</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="registroUsuario.php">Usuario</i></a></li>
              <li><a href="listarAusuario.php">Historial Usuario</i></a></li>
              <li><a href="registroTusuario.php">Tipo Usuario</i></a></li>
              <li><a href="registroPtusuario.php">Privilegio Tipo Usuario</i></a></li>
              <li><a href="registroUsuarioEmpPro.php">Usu. Asoc.Empre. Prod.</i></a></li>
            </ul>
          </li>    
        <?php  } ?>   
        <?php if($PADAVISO=="1"){ ?>
          <li>
            <a href="registroUsuarioAviso.php">
              <img src="../../api/cryptioadmin10/html/images/svg-icon/sidebar-menu/miscellaneous.svg" class="svg-icon" alt="">
              <span>Avisos</span>
            </a>
          </li> 
        <?php  } ?>
      <?php  } ?>
    </ul>
  </section>
</aside>