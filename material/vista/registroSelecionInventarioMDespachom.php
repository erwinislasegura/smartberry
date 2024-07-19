<?php

//var_dump($_REQUEST);

include_once "../../assest/config/validarUsuarioMaterial.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/controlador/BODEGA_ADO.php';
include_once '../../assest/controlador/PRODUCTO_ADO.php';
include_once '../../assest/controlador/TUMEDIDA_ADO.php';
include_once '../../assest/controlador/TCONTENEDOR_ADO.php';

include_once '../../assest/controlador/RECEPCIONM_ADO.php';
include_once '../../assest/controlador/INVENTARIOM_ADO.php';

include_once "../../assest/modelo/INVENTARIOM.php";




//INCIALIZAR LAS VARIBLES
//INICIALIZAR CONTROLADOR
$BODEGA_ADO =  new BODEGA_ADO();
$PRODUCTO_ADO =  new PRODUCTO_ADO();
$TUMEDIDA_ADO =  new TUMEDIDA_ADO();
$TCONTENEDOR_ADO =  new TCONTENEDOR_ADO();

$RECEPCIONM_ADO =  new RECEPCIONM_ADO();
$INVENTARIOM_ADO =  new INVENTARIOM_ADO();

//INIICIALIZAR MODELO 
$INVENTARIOM = new INVENTARIOM();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD

$EMPRESA = "";
$PLANTA = "";
$TEMPORADA = "";
$CONTADOR=0;
$MENSAJE="";

$TOTALCANTIDAD = "";
$TOTCALVALOR = "";

$FECHADESDE = "";
$FECHAHASTA = "";
$PRODUCTOR = "";
$DISABLED = "";
$DISABLEDMENU = "";
$NUMEROGUIA = "";

//INICIALIZAR ARREGLOS
$ARRAYINVENTARIO = "";
$ARRAYINVENTARIOTOTALES = "";

$ARRAYVERBODEGA = "";
$ARRAYVERTCONTENEDOR = "";
$ARRAYVERTUMEDIDA = "";
$ARRAYVERPRODUCTO = "";
$ARRAYDRECEPCION = "";

//DEFINIR ARREGLOS CON LOS DATOS OBTENIDOS DE LAS FUNCIONES DE LOS CONTROLADORES
//OPERACIONES
//OPERACION DE REGISTRO DE FILA

if (isset($_GET["id"])) {
    $id_dato = $_GET["id"];
}else{
    $id_dato = "";
}


if (isset($_GET["a"])) {
    $accion_dato = $_GET["a"];
}else{
    $accion_dato = "";
}

if (isset($_GET["urlo"])) {
    $urlo_dato = $_GET["urlo"];
}else{
    $urlo_dato = "";
}



if (isset($id_dato) && isset($accion_dato) && isset($urlo_dato)) {
    $IDP = $id_dato;
    $OPP = $accion_dato;
    $URLO = $urlo_dato;
    $ARRAYINVENTARIO = $INVENTARIOM_ADO->listarInventarioPorEmpresaPlantaTemporadaDisponibleCBX($EMPRESAS, $PLANTAS, $TEMPORADAS);
}

include_once "../../assest/config/validarDatosUrlD.php";



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Seleccion Iventario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">

        <?php include_once "../../assest/config/urlHead.php"; ?>
 
            <script type="text/javascript">
                //REDIRECCIONAR A LA PAGINA SELECIONADA



                function irPagina(url) {
                    location.href = "" + url;
                }

                
                function refrescar() {
                    document.getElementById("form_reg_dato").submit();
                }

                //REDIRECCIONAR A LA PAGINA SELECIONADA
                function irPagina(url) {
                    location.href = "" + url;
                }


                //FUNCION PARA ABRIR VENTANA QUE SE ENCUENTRA LA OPERACIONES DE DETALLE DE INVENTARIO
                function abrirVentana(url) {
                    var opciones =
                        "'directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=1000, height=800'";
                    window.open(url, 'window', opciones);
                }
            </script>

<script type="text/javascript">
              
              //FUNCION PARA CERRAR VENTANA Y ACTUALIZAR PRINCIPAL
              /*function cerrar() {
                  window.opener.refrescar()
                  window.close();
              }

              function irPagina(url) {
                  location.href = "" + url;
              }*/
          </script>




</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <?php include_once "../../assest/config/menuMaterial.php";   ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Materiales</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                            <li class="breadcrumb-item" aria-current="page">Módulo</li>
                                            <li class="breadcrumb-item" aria-current="page">Materiales </li>
                                            <li class="breadcrumb-item" aria-current="page">Despacho</li>
                                            <li class="breadcrumb-item" aria-current="page">Registro Despacho</li>
                                            <li class="breadcrumb-item active" aria-current="page"> <a href="#">Seleccion Inventario</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <?php include_once "../../assest/config/verIndicadorEconomico.php"; ?>
                    </div>
                </div>
                <!-- Main content -->
                <section class="content">
                    <div class="card">                                         
                            <div class="card-header with-border bg-info">                                   
                                <h4 class="card-title">Seleccionar existencia</h4>                                        
                            </div>
                        <form class="form" role="form" method="post" name="form_reg_dato" id="form_reg_dato">
                        <div class="card-footer">
                                <div class="btn-group btn-rounded btn-block  col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12" role="group" aria-label="Acciones generales">
                                    <button type="button" class="btn btn-success  " data-toggle="tooltip" title="Volver" name="CANCELAR" value="CANCELAR" Onclick="irPagina('<?php echo $URLO; ?>.php?op&id=<?php echo $id_dato; ?>&a=<?php echo $accion_dato; ?>&urlo=<?php echo $urlo_dato; ?>');">
                                        <i class="ti-back-left "></i> Volver
                                    </button>
                                    <button type="submit" class="btn btn-rounded btn-primary" data-toggle="tooltip" title="Por Folio" name="AGREGAR" value="AGREGAR" <?php echo $DISABLED; ?>>
                                        <i class="ti-save-alt"></i> P. Folio
                                    </button>
                                    <button type="submit" class="btn btn-rounded btn-info" data-toggle="tooltip" title="Por Cantidad" name="DIVIDIR" value="DIVIDIR" <?php echo $DISABLED; ?>>
                                        <i class="ti-save-alt"></i> P. Cantidad
                                    </button>
                                </div>
                            </div> 
                            <div class="card-body">
                                <input type="hidden" class="form-control" placeholder="ID DESPACHO" id="IDP" name="IDP" value="<?php echo $IDP; ?>" />
                                <input type="hidden" class="form-control" placeholder="OP DESPACHO" id="OPP" name="OPP" value="<?php echo $OPP; ?>" />
                                <input type="hidden" class="form-control" placeholder="URL DESPACHO" id="URLO" name="URLO" value="<?php echo $URLO; ?>" />
                                <input type="hidden" class="form-control" placeholder="ID EMPRESA" id="EMPRESA" name="EMPRESA" value="<?php echo $EMPRESAS; ?>" />
                                <input type="hidden" class="form-control" placeholder="ID PLANTA" id="PLANTA" name="PLANTA" value="<?php echo $PLANTAS; ?>" />
                                <input type="hidden" class="form-control" placeholder="ID TEMPORADA" id="TEMPORADA" name="TEMPORADA" value="<?php echo $TEMPORADAS; ?>" />
                                <div class="row">
                                    <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 col-xs-1">
                                    </div>
                                    <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 col-xs-5">
                                        <div class="form-group">
                                            <label> </label>
                                        </div>
                                    </div>
                                </div>
                                <div clas="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="selecionExistencia" class="table-hover " style="width: 100%;">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Número Folio </th>
                                                        <th>Selección</th>
                                                        <th>Seleccion Cantidad</th>
                                                        <th>Código Producto</th>
                                                        <th>Producto</th>
                                                        <th>Tipo Contenedor</th>
                                                        <th>Unidad Medida</th>
                                                        <th>Total Cantidad</th>
                                                        <th>Valor Unitario</th>
                                                        <th>Bodega</th>
                                                        <th>Fecha Ingreso</th>
                                                        <th>Fecha Modificación</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($ARRAYINVENTARIO as $r) : ?>
                                                        <?php $CONTADOR = $CONTADOR + 1; ?>
                                                        <?php
                                                        $ARRAYVERBODEGA = $BODEGA_ADO->verBodega($r['ID_BODEGA']);
                                                        if ($ARRAYVERBODEGA) {
                                                            $NOMBREBODEGA = $ARRAYVERBODEGA[0]['NOMBRE_BODEGA'];
                                                        } else {
                                                            $NOMBREBODEGA = "Sin Datos";
                                                        }
                                                        $ARRAYVERPRODUCTO = $PRODUCTO_ADO->verProducto($r['ID_PRODUCTO']);
                                                        if ($ARRAYVERPRODUCTO) {
                                                            $CODIGOPRODUCTO = $ARRAYVERPRODUCTO[0]['CODIGO_PRODUCTO'];
                                                            $NOMBREPRODUCTO = $ARRAYVERPRODUCTO[0]['NOMBRE_PRODUCTO'];
                                                        } else {
                                                            $CODIGOPRODUCTO = "Sin Datos";
                                                            $NOMBREPRODUCTO = "Sin Datos";
                                                        }
                                                        $ARRAYTVERCONTENEDOR = $TCONTENEDOR_ADO->verTcontenedor($r['ID_TCONTENEDOR']);
                                                        if ($ARRAYTVERCONTENEDOR) {
                                                            $NOMBRETCONTENEDOR = $ARRAYTVERCONTENEDOR[0]['NOMBRE_TCONTENEDOR'];
                                                        } else {
                                                            $NOMBRETCONTENEDOR = "Sin Datos";
                                                        }
                                                        $ARRAYVERTUMEDIDA = $TUMEDIDA_ADO->verTumedida($r['ID_TUMEDIDA']);
                                                        if ($ARRAYVERTUMEDIDA) {
                                                            $NOMBRETUMEDIDA = $ARRAYVERTUMEDIDA[0]['NOMBRE_TUMEDIDA'];
                                                        } else {
                                                            $NOMBRETUMEDIDA = "Sin Datos";
                                                        }
                                                        ?>
                                                        <tr class="text-center">
                                                            <td><?php echo $r['FOLIO_INVENTARIO']; ?> </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="checkbox" name="SELECIONAREXISTENCIA[]" id="SELECIONAREXISTENCIA<?php echo $r['ID_INVENTARIO']; ?>" value="<?php echo $r['ID_INVENTARIO']; ?>">
                                                                    <label for="SELECIONAREXISTENCIA<?php echo $r['ID_INVENTARIO']; ?>"> Seleccionar</label>
                                                                </div>
                                                            </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" class="form-control" name="IDCAJA[]" value="<?php echo  $CONTADOR; ?>">
                                                                        <input type="hidden" class="form-control" name="IDEXISTENCIA[]" value="<?php echo $r['ID_INVENTARIO']; ?>">
                                                                        <input type="hidden" class="form-control" name="FOLIO[]" value="<?php echo  $r['FOLIO_INVENTARIO']; ?>">
                                                                        <input type="hidden" class="form-control" name="CANTIDADORIGINAL[]" value="<?php echo $r['CANTIDAD']; ?>">
                                                                        <input type="text" placeholder="cantidad a selecionar"  pattern="^[0-9]+([.][0-9]{1,3})?$" class="form-control" name="CANTIDAD[]">
                                                                    </div>
                                                                </td>
                                                            <td><?php echo $CODIGOPRODUCTO; ?></td>
                                                            <td><?php echo $NOMBREPRODUCTO; ?></td>
                                                            <td><?php echo $NOMBRETCONTENEDOR; ?></td>
                                                            <td><?php echo $NOMBRETUMEDIDA; ?></td>
                                                            <td><?php echo $r['CANTIDAD']; ?></td>
                                                            <td><?php echo $r['VALOR']; ?></td>
                                                            <td><?php echo $NOMBREBODEGA; ?></td>
                                                            <td><?php echo $r['INGRESO']; ?></td>
                                                            <td><?php echo $r['MODIFICACION']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              
                            <!-- /.box -->
                        </form>
                </section>
                <!-- /.content -->

            </div>
        </div>



        <?php include_once "../../assest/config/footer.php"; ?>
        <?php include_once "../../assest/config/menuExtraMaterial.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>
    <script>            
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                showConfirmButton: true
            })
            Toast.fire({
                icon: "info",
                title: "Informacion importante",
                html: "<label>Para <b>seleccionar</b> una parte de la <b>Cantidad</b> de un folio, ingrese la Cantidad a Ingresar y presione <b> P. Cantidad </b> </label><label>Para <b>Selecionar folios</b> completos, seleccione los folios y presione <b>P. Folios </b> </label>"
            })
        </script>
    <?php 

        //echo 'ACCCION ES '.$_REQUEST['AGREGAR'];
        if (isset($_REQUEST['AGREGAR'])) {

            echo '<script> console.log("prueba"); </script>';

          //echo '1';
            $IDDESPACHO = $_REQUEST['IDP'];
            if (isset($_REQUEST['SELECIONAREXISTENCIA'])) {
                $SELECIONAREXISTENCIA = $_REQUEST['SELECIONAREXISTENCIA'];
                $SINO = "0";
               // die(2);
            } else {
               // die(3);
                $SINO = "1";
                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"warning",
                        title:"Accion restringida",
                        text:"Se debe selecionar al menos una existencia.",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroSelecionInventarioMDespachom.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                            
                    })
                </script>';
            }
            //die(4);
            if($SINO==0){  
               // die(5); 
                //var_dump($SELECIONAREXISTENCIA);
                foreach ($SELECIONAREXISTENCIA as $r) :
                    $IDEXISMATERIAPRIMA = $r;
                    $INVENTARIOM->__SET('ID_DESPACHO', $IDDESPACHO);
                    $INVENTARIOM->__SET('ID_INVENTARIO', $IDEXISMATERIAPRIMA);
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $INVENTARIOM_ADO->actualizarSelecionarDespachoCambiarEstado($INVENTARIOM);

                    $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Se agregado el Inventario de materiales al despacho.","material_despachom", "NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  

                endforeach;        

                

                $id_dato =  $_REQUEST['IDP'];
                $accion_dato =  $_REQUEST['OPP'];
                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Accion realizada",
                        text:"Se agregado el Inventario al despacho.",
                        showConfirmButton: true,
                        confirmButtonText:"Volver a Despacho",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                    })
                </script>';
            }   
            
        }
        if (isset($_REQUEST['DIVIDIR'])) {
            $SINO=1;
            $IDDESPACHO = $_REQUEST['IDP'];
            $ARRAYIDCAJA = $_REQUEST['IDCAJA'];
            $ARRAYFOLIO = $_REQUEST['FOLIO'];
            $ARRAYIDEXISTENCIA = $_REQUEST['IDEXISTENCIA'];
            $ARRAYCANTIDADORIGINAL = $_REQUEST['CANTIDADORIGINAL'];
            $ARRAYCANTIDAD = $_REQUEST['CANTIDAD'];

            if (isset($_REQUEST['IDCAJA'])) {

                foreach ($ARRAYIDCAJA as $ID) :
                    $IDNETO = $ID - 1;
                    
                    $IDEXISTENCIA = $ARRAYIDEXISTENCIA[$IDNETO];
                    $FOLIOORIGINAL = $ARRAYFOLIO[$IDNETO];
                    $CANTIDADORIGINAL = $ARRAYCANTIDADORIGINAL[$IDNETO];
                    $CANTIDAD = $ARRAYCANTIDAD[$IDNETO];


                    if ($CANTIDAD != "") {
                        $SINOCANTIDAD = 0;
                        $MENSAJE = $MENSAJE;
                        if ($CANTIDAD <= 0) {
                            $SINOCANTIDAD = 1;
                            $MENSAJE = $MENSAJE . "" . $FOLIOORIGINAL . ": Solo deben ingresar un valor mayor a zero. ";
                        } else {
                            if ($CANTIDAD >= $CANTIDADORIGINAL) {
                                $SINOCANTIDAD = 1;
                                $MENSAJE = $MENSAJE . " " . $FOLIOORIGINAL . ": La cantidad selecionada no puede se mayor o igual a la cantiddad original. ";
                            } else {
                                $SINOCANTIDAD = 0;
                                $MENSAJE = $MENSAJE;
                            }
                        }
                    } else {
                        $SINOCANTIDAD = 1;
                        //$MENSAJE = $MENSAJE . "" . $FOLIOORIGINAL . ": SE DEBE INGRESAR UN DATO EN KILOS DESPACHO. ";
                    }

                    if ($SINOCANTIDAD == 0) {
                        //KILOS PARA LINEA NUEVA
                        $CANTIDADRESTANTE = $CANTIDADORIGINAL - $CANTIDAD;
                        $CANTIDADNUEVO = $CANTIDAD;

                        
                        

                        //ACTUALIZA LOS DATOS DE LA FOLIO ACTUAL
                      
                        $INVENTARIOM->__SET('ID_DESPACHO', $IDDESPACHO);
                        $INVENTARIOM->__SET('ID_INVENTARIO', $IDEXISTENCIA);
                        $INVENTARIOM->__SET('CANTIDAD_INVENTARIO', $CANTIDADNUEVO);
                        // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                        $INVENTARIOM_ADO->actualizarSelecionarDespachoCambiarCantidadEstado($INVENTARIOM);
                        
                        $AUSUARIO_ADO->agregarAusuario2("NULL",2,2,"".$_SESSION["NOMBRE_USUARIO"].", Se agregado el Inventario de materiales al despachos.","material_despachom", "NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
    

                        $FOLIOALIASESTACTICO = $FOLIOORIGINAL;
                        $FOLIOALIASDIANAMICO = "EMPRESA:" . $_REQUEST['EMPRESA'] . "_PLANTA:" . $_REQUEST['PLANTA'] . "_TEMPORADA:" . $_REQUEST['TEMPORADA'] .
                            "_TIPO_FOLIO:Materiales_DESPACHO:" . $_REQUEST['IDP'] . "_FOLIO:" . $FOLIOORIGINAL;

                        //CREA UNA FOLIO NUEVO CON EL RESTANTE DE LOS ENVASES
                        $ARRAYVEREXITENICA = $INVENTARIOM_ADO->verInventario($IDEXISTENCIA);
                        
                        foreach ($ARRAYVEREXITENICA as $r) :    
                            $INVENTARIOM->__SET('FOLIO_INVENTARIO', $r['FOLIO_INVENTARIO']);
                            $INVENTARIOM->__SET('FOLIO_AUXILIAR_INVENTARIO', $r['FOLIO_AUXILIAR_INVENTARIO']); 
                            $INVENTARIOM->__SET('ALIAS_DINAMICO_FOLIO', $FOLIOALIASDIANAMICO);
                            $INVENTARIOM->__SET('ALIAS_ESTATICO_FOLIO', $FOLIOALIASESTACTICO);                            
                            $INVENTARIOM->__SET('TRECEPCION', $r['TRECEPCION']);  
                            $INVENTARIOM->__SET('VALOR_UNITARIO', $r['VALOR_UNITARIO']);   
                            $INVENTARIOM->__SET('CANTIDAD_INVENTARIO', $CANTIDADRESTANTE);   
                            $INVENTARIOM->__SET('ID_BODEGA', $r['ID_BODEGA']);     
                            $INVENTARIOM->__SET('ID_FOLIO', $r['ID_FOLIO']);     
                            $INVENTARIOM->__SET('ID_PRODUCTO', $r['ID_PRODUCTO']);     
                            $INVENTARIOM->__SET('ID_TCONTENEDOR', $r['ID_TCONTENEDOR']);     
                            $INVENTARIOM->__SET('ID_TUMEDIDA', $r['ID_TUMEDIDA']);     
                            $INVENTARIOM->__SET('ID_RECEPCION', $r['ID_RECEPCION']);     
                            $INVENTARIOM->__SET('ID_PLANTA2', $r['ID_PLANTA2']);     
                            $INVENTARIOM->__SET('ID_PLANTA3', $r['ID_PLANTA3']);     
                            $INVENTARIOM->__SET('ID_PROVEEDOR', $r['ID_PROVEEDOR']);     
                            $INVENTARIOM->__SET('ID_PRODUCTOR', $r['ID_PRODUCTOR']); 
                            $INVENTARIOM->__SET('ID_EMPRESA', $EMPRESAS);
                            $INVENTARIOM->__SET('ID_PLANTA', $PLANTAS);
                            $INVENTARIOM->__SET('ID_TEMPORADA', $TEMPORADAS);
                        // LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                           $INVENTARIOM_ADO->agregarInventarioDespacho($INVENTARIOM);

                           $AUSUARIO_ADO->agregarAusuario2("NULL",2,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Inventario de materiales, por una seleción de cantidad.","material_despachom", "NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'], $_SESSION['ID_PLANTA'],$_SESSION['ID_TEMPORADA'] );  
                        endforeach;
                            
                        $SINO = 0;
                    }
                endforeach;
                
                if ($SINO == 0) {    
                    if ($MENSAJE == "") { 
                        $id_dato =  $_REQUEST['IDP'];
                        $accion_dato =  $_REQUEST['OPP'];
                        echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Accion realizada",
                                text:"Se agregado la existencia al despacho.",
                                showConfirmButton: true,
                                confirmButtonText:"Volver al despacho",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                            })
                        </script>';
                        //echo "<script type='text/javascript'> location.href ='" . $_REQUEST['URLO'] . ".php?op';</script>";
                    }else{                        
                        $id_dato =  $_REQUEST['IDP'];
                        $accion_dato =  $_REQUEST['OPP'];
                        echo '<script>
                            Swal.fire({
                                icon:"success",
                                title:"Accion realizada",
                                text:"Se agregado la existencia al despacho. ' . $MENSAJE . '",
                                showConfirmButton: true,
                                confirmButtonText:"Volver al despacho",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href="' . $_REQUEST['URLO'] . '.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                            })
                        </script>';
                    }                   
                } 
                if ($SINOCANTIDAD == 1) {
                    if ($MENSAJE != "") {
                        $id_dato =  $_REQUEST['IDP'];
                        $accion_dato =  $_REQUEST['OPP'];
                        echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"' . $MENSAJE . '",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            }).then((result)=>{
                                location.href="registroSelecionInventarioMDespachom.php?op&id='.$id_dato.'&a='.$accion_dato.'&urlo='.$urlo_dato.'";                        
                            })
                        </script>';
                    }
                }
               
            }
        }
    ?>
</body>

</html>