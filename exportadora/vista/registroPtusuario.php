<?php


include_once "../../assest/config/validarUsuarioExpo.php";

//LLAMADA ARCHIVOS NECESARIOS PARA LAS OPERACIONES

include_once '../../assest/modelo/PTUSUARIO.php';
//INICIALIZAR CONTROLADOR

$PTUSUARIO = new PTUSUARIO();

//INCIALIZAR VARIBALES A OCUPAR PARA LA FUNCIONALIDAD


$CONTADOR=0;
$TUSUARIO="";

$FRUTA="";
$FRUTATODO="";
$FAVISO="";
$FRABIERTO="";
$FGRANEL="";
$FGRECEPCION="";
$FGDESPACHO="";
$FGGUIA="";
$FPACKING="";
$FPPROCESO="";
$FPREEMBALEJE="";
$FSAG="";
$FSAGINSPECCION="";
$FFRIGORIFICO="";
$FFRECEPCION="";
$FFRDESPACHO="";
$FFRGUIA="";
$FFRREPALETIZAJE="";
$FFRPC="";
$FFRCFOLIO="";
$FCFRUTA="";
$FCFRECHAZO="";
$FCFLEVANTAMIENTO="";
$FEXISTENCIA="";

$MATERIALES="";
$MRABIERTO="";
$MATERIALESTODO="";
$MMATERIALES="";
$MMATERIALESTODO="";
$MMRECEPION="";
$MMDEAPCHO="";
$MMGUIA="";
$MENVASE="";
$MENVASETODO="";
$MERECEPCION="";
$MEDESPACHO="";
$MEGUIA="";
$MADMINISTRACION="";
$MADMINISTRACIONTODO="";
$MAOC="";
$MAOCAR="";
$MKARDEX="";
$MKARDEXTODO="";
$MKMATERIAL="";
$MKENVASE="";


$MATERIALES="";
$MATERIALESTODO="";
$MENVASE="";
$MADMINISTRACION="";
$MAOC="";
$MAOCAR="";
$MKARDEX="";

$EXPORTADORA="";
$EXPORTADORATODO="";
$EMATERIALES="";
$EEXPORTACION="";
$ELIQUIDACION="";
$EPAGO="";
$EFRUTA="";
$EFCICARGA="";
$EINFORMES="";



$ESTADISTICA="";
$ESTADISTICATODO="";
$ESTARVSP="";
$ESTASTOPMP="";
$ESTAINFORME="";
$ESTAEXISTENCIA="";
$ESTAPRODUCTOR="";

$MANTENEDORES="";
$MANTENEDORESTODO="";
$MREGISTRO="";
$MEDITAR="";
$MVER="";
$MAGRUPADO="";

$ADMINISTRADOR="";
$ADMINISTRADORTODO="";
$ADUSUARIO="";
$ADAPERTURA="";
$ADAVISO="";

$DISABLED="";
$DISABLED2="disabled";

$DISABLEDFRUTA="disabled";
$DISABLEDFRUTAGRANEL="disabled";
$DISABLEDFRUTAPACKING="disabled";
$DISABLEDFRUTASAG="disabled";
$DISABLEDFRUTAFRIGORIFICO="disabled";
$DISABLEDFRUTACALIDAD="disabled";

$DISABLEDMATERIAL="disabled";
$DISABLEDMMATERIAL="disabled";
$DISABLEDMENVASE="disabled";
$DISABLEDMADMINISTRACION="disabled";
$DISABLEDMMKARDEX="disabled";

$DISABLEDEXPORTADORA="disabled";
$DISABLEDMANTENEDORES="disabled";
$DISABLEDADMINISTRADOR="disabled";
$DISABLEDESTADISTICA="disabled";
$DISABLEDESTADISTICAPRODUCTOR="";
$OP="";
$SINO="";

$ARRAYTUSUARIOS="";
$ARRAYPTUSUARIO="";

//INCIALIZAR ARREGLOS
$ARRAYTUSUARIOS = $TUSUARIO_ADO->listarTusuarioCBX();
$ARRAYPTUSUARIO = $PTUSUARIO_ADO->listarPtusuarioCBX();
include_once "../../assest/config/validarDatosUrl.php";
include_once "../../assest/config/datosUrl.php";

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
///OBTENCION DE DATOS ENVIADOR A LA URL
//PARA OPERACIONES DE EDICION Y VISUALIZACION
if (isset($id_dato) && isset($accion_dato)) {
    //ALMACENAR DATOS DE VARIABLES DE LA URL
    $IDOP = $id_dato;
    $OP = $accion_dato;


    //IDENTIFICACIONES DE OPERACIONES
    //OPERACION DE CAMBIO DE ESTADO
    //0 = DESACTIVAR
    if ($OP == "0") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPTUSUARIOID = $PTUSUARIO_ADO->verPtusuario($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA


        foreach ($ARRAYPTUSUARIOID as $r) :
            
            $FRUTA= "" . $r['FRUTA'];
            $FAVISO= "" . $r['FAVISO'];
            $FRABIERTO= "" . $r['FRABIERTO'];
            $FGRANEL= "" . $r['FGRANEL'];
            $FGRECEPCION= "" . $r['FGRECEPCION'];
            $FGDESPACHO= "" . $r['FGDESPACHO'];
            $FGGUIA= "" . $r['FGGUIA'];
            $FPACKING= "" . $r['FPACKING'];
            $FPPROCESO= "" . $r['FPPROCESO'];
            $FPREEMBALEJE= "" . $r['FPREEMBALEJE'];
            $FSAG= "" . $r['FSAG'];
            $FSAGINSPECCION= "" . $r['FSAGINSPECCION'];
            $FFRIGORIFICO= "" . $r['FFRIGORIFICO'];
            $FFRECEPCION= "" . $r['FFRECEPCION'];
            $FFRDESPACHO= "" . $r['FFRDESPACHO'];
            $FFRGUIA= "" . $r['FFRGUIA'];
            $FFRREPALETIZAJE= "" . $r['FFRREPALETIZAJE'];
            $FFRPC= "" . $r['FFRPC'];
            $FFRCFOLIO= "" . $r['FFRCFOLIO'];
            $FCFRUTA= "" . $r['FCFRUTA'];
            $FCFRECHAZO= "" . $r['FCFRECHAZO'];
            $FCFLEVANTAMIENTO= "" . $r['FCFLEVANTAMIENTO'];
            $FEXISTENCIA= "" . $r['FEXISTENCIA'];

            $MATERIALES = "" . $r['MATERIALES'];
            $MRABIERTO = "" . $r['MRABIERTO'];
            $MMATERIALES = "" . $r['MMATERIALES'];
            $MMRECEPION = "" . $r['MMRECEPION'];
            $MMDEAPCHO = "" . $r['MMDEAPCHO'];
            $MMGUIA = "" . $r['MMGUIA'];
            $MENVASE = "" . $r['MENVASE'];
            $MERECEPCION = "" . $r['MERECEPCION'];
            $MEDESPACHO = "" . $r['MEDESPACHO'];
            $MEGUIA = "" . $r['MEGUIA'];
            $MADMINISTRACION = "" . $r['MADMINISTRACION'];
            $MAOC = "" . $r['MAOC'];
            $MAOCAR = "" . $r['MAOCAR'];
            $MKARDEX = "" . $r['MKARDEX'];
            $MKMATERIAL= "" . $r['MKMATERIAL'];
            $MKENVASE= "" . $r['MKENVASE'];

            $EXPORTADORA= "" . $r['EXPORTADORA'];          
            $EMATERIALES= "" . $r['EMATERIALES'];
            $EEXPORTACION= "" . $r['EEXPORTACION'];
            $ELIQUIDACION= "" . $r['ELIQUIDACION'];
            $EPAGO= "" . $r['EPAGO'];
            $EFRUTA= "" . $r['EFRUTA'];
            $EFCICARGA= "" . $r['EFCICARGA'];
            
            $EINFORMES= "" . $r['EINFORMES'];
            
            $ESTADISTICA= "" . $r['ESTADISTICA'];          
            $ESTARVSP= "" . $r['ESTARVSP'];
            $ESTASTOPMP= "" . $r['ESTASTOPMP'];
            $ESTAINFORME= "" . $r['ESTAINFORME'];
            $ESTAEXISTENCIA= "" . $r['ESTAEXISTENCIA'];
            $ESTAPRODUCTOR= "" . $r['ESTAPRODUCTOR'];

            $MANTENEDORES = "" . $r['MANTENEDORES'];
            $MREGISTRO = "" . $r['MREGISTRO'];
            $MEDITAR = "" . $r['MEDITAR'];
            $MVER = "" . $r['MVER'];
            $MAGRUPADO = "" . $r['MAGRUPADO'];
            
            $ADMINISTRADOR = "" . $r['ADMINISTRADOR'];
            $ADUSUARIO = "" . $r['ADUSUARIO'];
            $ADAPERTURA = "" . $r['ADAPERTURA'];
            $ADAVISO = "" . $r['ADAVISO'];

            $TUSUARIO = "" . $r['ID_TUSUARIO'];
        endforeach;

    }
    //1 = ACTIVAR
    if ($OP == "1") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPTUSUARIOID = $PTUSUARIO_ADO->verPtusuario($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA


        foreach ($ARRAYPTUSUARIOID as $r) :
            
            $FRUTA= "" . $r['FRUTA'];
            $FAVISO= "" . $r['FAVISO'];
            $FRABIERTO= "" . $r['FRABIERTO'];
            $FGRANEL= "" . $r['FGRANEL'];
            $FGRECEPCION= "" . $r['FGRECEPCION'];
            $FGDESPACHO= "" . $r['FGDESPACHO'];
            $FGGUIA= "" . $r['FGGUIA'];
            $FPACKING= "" . $r['FPACKING'];
            $FPPROCESO= "" . $r['FPPROCESO'];
            $FPREEMBALEJE= "" . $r['FPREEMBALEJE'];
            $FSAG= "" . $r['FSAG'];
            $FSAGINSPECCION= "" . $r['FSAGINSPECCION'];
            $FFRIGORIFICO= "" . $r['FFRIGORIFICO'];
            $FFRECEPCION= "" . $r['FFRECEPCION'];
            $FFRDESPACHO= "" . $r['FFRDESPACHO'];
            $FFRGUIA= "" . $r['FFRGUIA'];
            $FFRREPALETIZAJE= "" . $r['FFRREPALETIZAJE'];
            $FFRPC= "" . $r['FFRPC'];
            $FFRCFOLIO= "" . $r['FFRCFOLIO'];
            $FCFRUTA= "" . $r['FCFRUTA'];
            $FCFRECHAZO= "" . $r['FCFRECHAZO'];
            $FCFLEVANTAMIENTO= "" . $r['FCFLEVANTAMIENTO'];
            $FEXISTENCIA= "" . $r['FEXISTENCIA'];

            $MATERIALES = "" . $r['MATERIALES'];
            $MRABIERTO = "" . $r['MRABIERTO'];
            $MMATERIALES = "" . $r['MMATERIALES'];
            $MMRECEPION = "" . $r['MMRECEPION'];
            $MMDEAPCHO = "" . $r['MMDEAPCHO'];
            $MMGUIA = "" . $r['MMGUIA'];
            $MENVASE = "" . $r['MENVASE'];
            $MERECEPCION = "" . $r['MERECEPCION'];
            $MEDESPACHO = "" . $r['MEDESPACHO'];
            $MEGUIA = "" . $r['MEGUIA'];
            $MADMINISTRACION = "" . $r['MADMINISTRACION'];
            $MAOC = "" . $r['MAOC'];
            $MAOCAR = "" . $r['MAOCAR'];
            $MKARDEX = "" . $r['MKARDEX'];
            $MKMATERIAL= "" . $r['MKMATERIAL'];
            $MKENVASE= "" . $r['MKENVASE'];

            $EXPORTADORA= "" . $r['EXPORTADORA'];          
            $EMATERIALES= "" . $r['EMATERIALES'];
            $EEXPORTACION= "" . $r['EEXPORTACION'];
            $ELIQUIDACION= "" . $r['ELIQUIDACION'];
            $EPAGO= "" . $r['EPAGO'];
            $EFRUTA= "" . $r['EFRUTA'];
            $EFCICARGA= "" . $r['EFCICARGA'];
            $EINFORMES= "" . $r['EINFORMES'];
            
            $ESTADISTICA= "" . $r['ESTADISTICA'];          
            $ESTARVSP= "" . $r['ESTARVSP'];
            $ESTASTOPMP= "" . $r['ESTASTOPMP'];
            $ESTAINFORME= "" . $r['ESTAINFORME'];
            $ESTAEXISTENCIA= "" . $r['ESTAEXISTENCIA'];
            $ESTAPRODUCTOR= "" . $r['ESTAPRODUCTOR'];

            $MANTENEDORES = "" . $r['MANTENEDORES'];
            $MREGISTRO = "" . $r['MREGISTRO'];
            $MEDITAR = "" . $r['MEDITAR'];
            $MVER = "" . $r['MVER'];
            $MAGRUPADO = "" . $r['MAGRUPADO'];
            
            $ADMINISTRADOR = "" . $r['ADMINISTRADOR'];
            $ADUSUARIO = "" . $r['ADUSUARIO'];
            $ADAPERTURA = "" . $r['ADAPERTURA'];
            $ADAVISO = "" . $r['ADAVISO'];

            $TUSUARIO = "" . $r['ID_TUSUARIO'];
        endforeach;

    }
    //editar =  OBTENCION DE DATOS PARA LA EDICION DE REGISTRO
    if ($OP == "editar") {
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL

        $ARRAYPTUSUARIOID = $PTUSUARIO_ADO->verPtusuario($IDOP);

        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA
        foreach ($ARRAYPTUSUARIOID as $r) :    

            $FRUTA= "" . $r['FRUTA'];
            if($FRUTA=="1"){
                $DISABLEDFRUTA="";
            }
            $FAVISO= "" . $r['FAVISO'];
            $FRABIERTO= "" . $r['FRABIERTO'];
            $FGRANEL= "" . $r['FGRANEL'];
            if($FGRANEL=="1"){
                $DISABLEDFRUTAGRANEL="";
            }
            $FGRECEPCION= "" . $r['FGRECEPCION'];
            $FGDESPACHO= "" . $r['FGDESPACHO'];
            $FGGUIA= "" . $r['FGGUIA'];
            $FPACKING= "" . $r['FPACKING'];
            if($FPACKING=="1"){
                $DISABLEDFRUTAPACKING="";
            }
            $FPPROCESO= "" . $r['FPPROCESO'];
            $FPREEMBALEJE= "" . $r['FPREEMBALEJE'];
            $FSAG= "" . $r['FSAG'];
            if($FSAG=="1"){
                $DISABLEDFRUTASAG="";
            }
            $FSAGINSPECCION= "" . $r['FSAGINSPECCION'];
            $FFRIGORIFICO= "" . $r['FFRIGORIFICO'];
            if($FFRIGORIFICO=="1"){
                $DISABLEDFRUTAFRIGORIFICO="";
            }
            $FFRECEPCION= "" . $r['FFRECEPCION'];
            $FFRDESPACHO= "" . $r['FFRDESPACHO'];
            $FFRGUIA= "" . $r['FFRGUIA'];
            $FFRREPALETIZAJE= "" . $r['FFRREPALETIZAJE'];
            $FFRPC= "" . $r['FFRPC'];
            $FFRCFOLIO= "" . $r['FFRCFOLIO'];
            $FCFRUTA= "" . $r['FCFRUTA'];
            if($FCFRUTA=="1"){
                $DISABLEDFRUTACALIDAD="";
            }
            $FCFRECHAZO= "" . $r['FCFRECHAZO'];
            $FCFLEVANTAMIENTO= "" . $r['FCFLEVANTAMIENTO'];
            $FEXISTENCIA= "" . $r['FEXISTENCIA'];

            $MATERIALES = "" . $r['MATERIALES'];
            if($MATERIALES=="1"){
                $DISABLEDMATERIAL="";
            }
            $MRABIERTO = "" . $r['MRABIERTO'];
            $MMATERIALES = "" . $r['MMATERIALES'];
            if($MMATERIALES=="1"){
                $DISABLEDMMATERIAL="";
            }
            $MMRECEPION = "" . $r['MMRECEPION'];
            $MMDEAPCHO = "" . $r['MMDEAPCHO'];
            $MMGUIA = "" . $r['MMGUIA'];
            $MENVASE = "" . $r['MENVASE'];
            if($MENVASE=="1"){
                $DISABLEDMENVASE="";
            }
            $MERECEPCION = "" . $r['MERECEPCION'];
            $MEDESPACHO = "" . $r['MEDESPACHO'];
            $MEGUIA = "" . $r['MEGUIA'];
            $MADMINISTRACION = "" . $r['MADMINISTRACION'];
            if($MADMINISTRACION=="1"){
                $DISABLEDMADMINISTRACION="";
            }
            $MAOC = "" . $r['MAOC'];
            $MAOCAR = "" . $r['MAOCAR'];
            $MKARDEX = "" . $r['MKARDEX'];
            if($MKARDEX=="1"){
                $DISABLEDMMKARDEX="";
            }
            $MKMATERIAL= "" . $r['MKMATERIAL'];
            $MKENVASE= "" . $r['MKENVASE'];

            $EXPORTADORA= "" . $r['EXPORTADORA'];
            if($EXPORTADORA=="1"){
                $DISABLEDEXPORTADORA="";
            }
            $EMATERIALES= "" . $r['EMATERIALES'];
            $EEXPORTACION= "" . $r['EEXPORTACION'];
            $ELIQUIDACION= "" . $r['ELIQUIDACION'];
            $EPAGO= "" . $r['EPAGO'];
            $EFRUTA= "" . $r['EFRUTA'];
            $EFCICARGA= "" . $r['EFCICARGA'];
            $EINFORMES= "" . $r['EINFORMES'];

            $ESTADISTICA= "" . $r['ESTADISTICA'];
            if($ESTADISTICA=="1"){
                $DISABLEDESTADISTICA="";
            }
            $ESTARVSP= "" . $r['ESTARVSP'];
            $ESTASTOPMP= "" . $r['ESTASTOPMP'];
            $ESTAINFORME= "" . $r['ESTAINFORME'];
            $ESTAEXISTENCIA= "" . $r['ESTAEXISTENCIA'];
            $ESTAPRODUCTOR= "" . $r['ESTAPRODUCTOR'];
            if($ESTAPRODUCTOR=="1"){
                $DISABLEDESTADISTICAPRODUCTOR="disabled";
            }
            $MANTENEDORES = "" . $r['MANTENEDORES'];
            if($MANTENEDORES=="1"){
                $DISABLEDMANTENEDORES="";
            }
            $MREGISTRO = "" . $r['MREGISTRO'];
            $MEDITAR = "" . $r['MEDITAR'];
            $MVER = "" . $r['MVER'];
            $MAGRUPADO = "" . $r['MAGRUPADO'];
            
            $ADMINISTRADOR = "" . $r['ADMINISTRADOR'];
            if($ADMINISTRADOR=="1"){
                $DISABLEDADMINISTRADOR="";
            }
            $ADUSUARIO = "" . $r['ADUSUARIO'];
            $ADAPERTURA = "" . $r['ADAPERTURA'];
            $ADAVISO = "" . $r['ADAVISO'];

            $TUSUARIO = "" . $r['ID_TUSUARIO'];
        endforeach;
    }

    //ver =  OBTENCION DE DATOS PARA LA VISUALIZAAR INFORMAICON DE REGISTRO
    if ($OP == "ver") {
        //DESABILITAR INPUT DEL FORMULARIO
        //PARA QUE NO MODIFIQUE NIGUNA INFORMACION, OBJETIVO ES VISUALIZAR INFORMACION
        $DISABLED = "disabled";
        //OBTENCION DE INFORMACIOND DE LA FILA DEL REGISTRO
        //ALMACENAR INFORMACION EN ARREGLO
        //LLAMADA A LA FUNCION DE CONTROLADOR verPlanta(ID), 
        //SE LE PASE UNO DE LOS DATOS OBTENIDO PREVIAMENTE A TRAVEZ DE LA URL
        $ARRAYPTUSUARIOID = $PTUSUARIO_ADO->verPtusuario($IDOP);
        //OBTENCIONS DE LOS DATODS DE LA COLUMNAS DE LA FILA OBTENIDA
        //PASAR DATOS OBTENIDOS A VARIABLES QUE SE VISUALIZAR EN EL FORMULARIO DE LA VISTA


        foreach ($ARRAYPTUSUARIOID as $r) :
            
            $FRUTA= "" . $r['FRUTA'];
            $FAVISO= "" . $r['FAVISO'];
            $FRABIERTO= "" . $r['FRABIERTO'];
            $FGRANEL= "" . $r['FGRANEL'];
            $FGRECEPCION= "" . $r['FGRECEPCION'];
            $FGDESPACHO= "" . $r['FGDESPACHO'];
            $FGGUIA= "" . $r['FGGUIA'];
            $FPACKING= "" . $r['FPACKING'];
            $FPPROCESO= "" . $r['FPPROCESO'];
            $FPREEMBALEJE= "" . $r['FPREEMBALEJE'];
            $FSAG= "" . $r['FSAG'];
            $FSAGINSPECCION= "" . $r['FSAGINSPECCION'];
            $FFRIGORIFICO= "" . $r['FFRIGORIFICO'];
            $FFRECEPCION= "" . $r['FFRECEPCION'];
            $FFRDESPACHO= "" . $r['FFRDESPACHO'];
            $FFRGUIA= "" . $r['FFRGUIA'];
            $FFRREPALETIZAJE= "" . $r['FFRREPALETIZAJE'];
            $FFRPC= "" . $r['FFRPC'];
            $FFRCFOLIO= "" . $r['FFRCFOLIO'];
            $FCFRUTA= "" . $r['FCFRUTA'];
            $FCFRECHAZO= "" . $r['FCFRECHAZO'];
            $FCFLEVANTAMIENTO= "" . $r['FCFLEVANTAMIENTO'];
            $FEXISTENCIA= "" . $r['FEXISTENCIA'];

            $MATERIALES = "" . $r['MATERIALES'];
            $MRABIERTO = "" . $r['MRABIERTO'];
            $MMATERIALES = "" . $r['MMATERIALES'];
            $MMRECEPION = "" . $r['MMRECEPION'];
            $MMDEAPCHO = "" . $r['MMDEAPCHO'];
            $MMGUIA = "" . $r['MMGUIA'];
            $MENVASE = "" . $r['MENVASE'];
            $MERECEPCION = "" . $r['MERECEPCION'];
            $MEDESPACHO = "" . $r['MEDESPACHO'];
            $MEGUIA = "" . $r['MEGUIA'];
            $MADMINISTRACION = "" . $r['MADMINISTRACION'];
            $MAOC = "" . $r['MAOC'];
            $MAOCAR = "" . $r['MAOCAR'];
            $MKARDEX = "" . $r['MKARDEX'];
            $MKMATERIAL= "" . $r['MKMATERIAL'];
            $MKENVASE= "" . $r['MKENVASE'];

            $EXPORTADORA= "" . $r['EXPORTADORA'];          
            $EMATERIALES= "" . $r['EMATERIALES'];
            $EEXPORTACION= "" . $r['EEXPORTACION'];
            $ELIQUIDACION= "" . $r['ELIQUIDACION'];
            $EFRUTA= "" . $r['EFRUTA'];
            $EPAGO= "" . $r['EPAGO'];
            $EFCICARGA= "" . $r['EFCICARGA'];
            $EINFORMES= "" . $r['EINFORMES'];
            
            $ESTADISTICA= "" . $r['ESTADISTICA'];          
            $ESTARVSP= "" . $r['ESTARVSP'];
            $ESTASTOPMP= "" . $r['ESTASTOPMP'];
            $ESTAINFORME= "" . $r['ESTAINFORME'];
            $ESTAEXISTENCIA= "" . $r['ESTAEXISTENCIA'];
            $ESTAPRODUCTOR= "" . $r['ESTAPRODUCTOR'];

            $MANTENEDORES = "" . $r['MANTENEDORES'];
            $MREGISTRO = "" . $r['MREGISTRO'];
            $MEDITAR = "" . $r['MEDITAR'];
            $MVER = "" . $r['MVER'];
            $MAGRUPADO = "" . $r['MAGRUPADO'];
            
            $ADMINISTRADOR = "" . $r['ADMINISTRADOR'];
            $ADUSUARIO = "" . $r['ADUSUARIO'];
            $ADAPERTURA = "" . $r['ADAPERTURA'];
            $ADAVISO = "" . $r['ADAVISO'];

            $TUSUARIO = "" . $r['ID_TUSUARIO'];
        endforeach;
    }
}





if (isset($_POST)) {
   
 
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Privilegio Tipo Usuario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <?php include_once "../../assest/config/urlHead.php"; ?>
        
    <style>
        fieldset{
            border: 2px solid #198ca9de;
            padding: 10px;
            margin: 10px;
            background-color: #ffffff87;
            border-radius: 4px solid;
            -webkit-border-radius: 4px solid;
            -moz-border-radius: 4px solid;
            -ms-border-radius: 4px solid;
            -o-border-radius: 4px solid;
        }
        legend{
            
            border: 1px solid #198ca9de;
        }
    </style>

    <script type="text/javascript">    


        function fruta(){              
            FRUTA = document.getElementById('FRUTA').checked;
            if(FRUTA==true){    
                document.getElementById('FRUTATODO').disabled = false;  
                document.getElementById('FGRANEL').disabled = false;   
                document.getElementById('FAVISO').disabled = false;   
                document.getElementById('FRABIERTO').disabled = false;   
                document.getElementById('FPACKING').disabled = false;   
                document.getElementById('FFRIGORIFICO').disabled = false;   
                document.getElementById('FSAG').disabled = false;  
                document.getElementById('FCFRUTA').disabled = false;   
                document.getElementById('FEXISTENCIA').disabled = false;   

            }else{
                document.getElementById('FRUTATODO').disabled = true;  
                document.getElementById('FGRANEL').disabled = true;   
                document.getElementById('FAVISO').disabled = true;   
                document.getElementById('FRABIERTO').disabled = true;   
                document.getElementById('FGRECEPCION').disabled = true;   
                document.getElementById('FGDESPACHO').disabled = true;   
                document.getElementById('FGGUIA').disabled = true;   
                document.getElementById('FPACKING').disabled = true;   
                document.getElementById('FPPROCESO').disabled = true;   
                document.getElementById('FPREEMBALEJE').disabled = true;   
                document.getElementById('FSAG').disabled = true;  
                document.getElementById('FSAGINSPECCION').disabled = true;   
                document.getElementById('FFRIGORIFICO').disabled = true;   
                document.getElementById('FFRECEPCION').disabled = true;  
                document.getElementById('FFRDESPACHO').disabled = true;   
                document.getElementById('FFRGUIA').disabled = true;    
                document.getElementById('FFRREPALETIZAJE').disabled = true;   
                document.getElementById('FFRPC').disabled = true;   
                document.getElementById('FFRCFOLIO').disabled = true;   
                document.getElementById('FCFRUTA').disabled = true;   
                document.getElementById('FCFRECHAZO').disabled = true;   
                document.getElementById('FCFLEVANTAMIENTO').disabled = true;   
                document.getElementById('FEXISTENCIA').disabled = true;   
                
                document.getElementById('FRUTATODO').checked = false;  
                document.getElementById('FGRANEL').checked = false;   
                document.getElementById('FAVISO').checked = false;   
                document.getElementById('FRABIERTO').checked = false;   
                document.getElementById('FGRECEPCION').checked = false;   
                document.getElementById('FGDESPACHO').checked = false;   
                document.getElementById('FGGUIA').checked = false;   
                document.getElementById('FPACKING').checked = false;   
                document.getElementById('FPPROCESO').checked = false;   
                document.getElementById('FPREEMBALEJE').checked = false;   
                document.getElementById('FSAG').checked = false;  
                document.getElementById('FSAGINSPECCION').checked = false;   
                document.getElementById('FFRIGORIFICO').checked = false;   
                document.getElementById('FFRECEPCION').checked = false;  
                document.getElementById('FFRDESPACHO').checked = false;  
                document.getElementById('FFRGUIA').checked = false;    
                document.getElementById('FFRREPALETIZAJE').checked = false;   
                document.getElementById('FFRPC').checked = false;   
                document.getElementById('FFRCFOLIO').checked = false;   
                document.getElementById('FCFRUTA').checked = false;   
                document.getElementById('FCFRECHAZO').checked = false;   
                document.getElementById('FCFLEVANTAMIENTO').checked = false;   
                document.getElementById('FEXISTENCIA').checked = false;   
            }
        }         
        function frutagranel(){              
            FGRANEL = document.getElementById('FGRANEL').checked;
            if(FGRANEL==true){    
                document.getElementById('FGRECEPCION').checked = true;   
                document.getElementById('FGDESPACHO').checked = true;   
                document.getElementById('FGGUIA').checked = true;    

            }else{
                document.getElementById('FGRECEPCION').checked = false;   
                document.getElementById('FGDESPACHO').checked = false;   
                document.getElementById('FGGUIA').checked = false;   
                
                document.getElementById('FGRECEPCION').disabled = true;   
                document.getElementById('FGDESPACHO').disabled = true;   
                document.getElementById('FGGUIA').disabled = true;   
            }
        }         
        function frutapacking(){              
            FPACKING = document.getElementById('FPACKING').checked;
            if(FPACKING==true){      
                document.getElementById('FPPROCESO').checked = true;   
                document.getElementById('FPREEMBALEJE').checked = true;   

            }else{  
                document.getElementById('FPPROCESO').checked = false;   
                document.getElementById('FPREEMBALEJE').checked = false;
                
                document.getElementById('FPPROCESO').disabled = true;   
                document.getElementById('FPREEMBALEJE').disabled = true;       
            }
        }         
        function frutasag(){              
            FSAG = document.getElementById('FSAG').checked;
            if(FSAG==true){      
                document.getElementById('FSAGINSPECCION').checked = true;   
            }else{  
                document.getElementById('FSAGINSPECCION').checked = false;   
                
                document.getElementById('FSAGINSPECCION').disabled = true;     
            }
        }     
        function frutafrigorifico(){              
            FFRIGORIFICO = document.getElementById('FFRIGORIFICO').checked;
            if(FFRIGORIFICO==true){          
                document.getElementById('FFRECEPCION').checked = true;  
                document.getElementById('FFRDESPACHO').checked = true;   
                document.getElementById('FFRGUIA').checked = true;  
                document.getElementById('FFRREPALETIZAJE').checked = true;    
                document.getElementById('FFRPC').checked = true;   
                document.getElementById('FFRCFOLIO').checked = true;   

            }else{    
                document.getElementById('FFRECEPCION').checked = false;  
                document.getElementById('FFRDESPACHO').checked = false;   
                document.getElementById('FFRGUIA').checked = false;   
                document.getElementById('FFRREPALETIZAJE').checked = false; 
                document.getElementById('FFRPC').checked = false;   
                document.getElementById('FFRCFOLIO').checked = false;   
                
                document.getElementById('FFRECEPCION').disabled = true;  
                document.getElementById('FFRDESPACHO').disabled = true;   
                document.getElementById('FFRGUIA').disabled = true;   
                document.getElementById('FFRREPALETIZAJE').disabled = true; 
                document.getElementById('FFRPC').disabled = true;   
                document.getElementById('FFRCFOLIO').disabled = true;                   
            }
        } 
        function frutacalidad(){              
            FCFRUTA = document.getElementById('FCFRUTA').checked;
            if(FCFRUTA==true){          
                document.getElementById('FCFRECHAZO').checked = true;   
                document.getElementById('FCFLEVANTAMIENTO').checked = true;   

            }else{   
                document.getElementById('FCFRECHAZO').checked = false;   
                document.getElementById('FCFLEVANTAMIENTO').checked = false;   
                
                document.getElementById('FCFRECHAZO').disabled = true;   
                document.getElementById('FCFLEVANTAMIENTO').disabled = true;  
            }
        }   
        function material(){            
            MATERIALES = document.getElementById('MATERIALES').checked;
            if(MATERIALES==true){  
                document.getElementById('MATERIALESTODO').disabled = false;   
                document.getElementById('MMATERIALES').disabled = false;   
                document.getElementById('MRABIERTO').disabled = false;   
                document.getElementById('MENVASE').disabled = false;   
                document.getElementById('MADMINISTRACION').disabled = false;   
                document.getElementById('MKARDEX').disabled = false;   
            }else{    
                document.getElementById('MATERIALESTODO').disabled = true;  
                document.getElementById('MRABIERTO').disabled = true;   
                document.getElementById('MMATERIALES').disabled = true;   
                document.getElementById('MMRECEPION').disabled = true;   
                document.getElementById('MMDEAPCHO').disabled = true;   
                document.getElementById('MMGUIA').disabled = true;   
                document.getElementById('MENVASE').disabled = true;   
                document.getElementById('MERECEPCION').disabled = true;   
                document.getElementById('MEDESPACHO').disabled = true;   
                document.getElementById('MEGUIA').disabled = true; 
                document.getElementById('MADMINISTRACION').disabled = true;   
                document.getElementById('MAOC').disabled = true;   
                document.getElementById('MAOCAR').disabled = true; 
                document.getElementById('MKARDEX').disabled = true;   
                document.getElementById('MKMATERIAL').disabled = true;   
                document.getElementById('MKENVASE').disabled = true;   
                
                document.getElementById('MATERIALESTODO').checked = false;  
                document.getElementById('MRABIERTO').checked = false;   
                document.getElementById('MATERIALES').checked = false;  
                document.getElementById('MMATERIALES').checked = false;   
                document.getElementById('MMRECEPION').checked = false;   
                document.getElementById('MMDEAPCHO').checked = false;   
                document.getElementById('MMGUIA').checked = false;   
                document.getElementById('MENVASE').checked = false;   
                document.getElementById('MERECEPCION').checked = false;   
                document.getElementById('MEDESPACHO').checked = false;   
                document.getElementById('MEGUIA').checked = false; 
                document.getElementById('MADMINISTRACION').checked = false;   
                document.getElementById('MAOC').checked = false;   
                document.getElementById('MAOCAR').checked = false; 
                document.getElementById('MKARDEX').checked = false;   
                document.getElementById('MKMATERIAL').checked = false;   
                document.getElementById('MKENVASE').checked = false;   
            }
        }          
        function mmaterial(){            
            MMATERIALES = document.getElementById('MMATERIALES').checked;
            if(MMATERIALES==true){    
                document.getElementById('MMRECEPION').disabled = false;   
                document.getElementById('MMDEAPCHO').disabled = false;   
                document.getElementById('MMGUIA').disabled = false;   
            }else{                  
                document.getElementById('MMRECEPION').disabled = true;   
                document.getElementById('MMDEAPCHO').disabled = true;   
                document.getElementById('MMGUIA').disabled = true;         
                
                document.getElementById('MMRECEPION').disabled = true;   
                document.getElementById('MMDEAPCHO').disabled = true;    
                document.getElementById('MMGUIA').disabled = true;          
                
            }
        }          
        function menvase(){            
            MENVASE = document.getElementById('MENVASE').checked;
            if(MENVASE==true){    
                document.getElementById('MERECEPCION').disabled = false;   
                document.getElementById('MEDESPACHO').disabled = false;   
                document.getElementById('MEGUIA').disabled = false;  
            }else{                 
                document.getElementById('MERECEPCION').disabled = true;   
                document.getElementById('MEDESPACHO').disabled = true;   
                document.getElementById('MEGUIA').disabled = true;  
                
                document.getElementById('MERECEPCION').disabled = true;   
                document.getElementById('MEDESPACHO').disabled = true;    
                document.getElementById('MEGUIA').disabled = true;      
                
            }
        }  
        function madministracion(){            
            MADMINISTRACION = document.getElementById('MADMINISTRACION').checked;
            if(MADMINISTRACION==true){   
                document.getElementById('MAOC').disabled = false;   
                document.getElementById('MAOCAR').disabled = false;  
            }else{                
                document.getElementById('MAOC').disabled = true;   
                document.getElementById('MAOCAR').disabled = true;  
                
                document.getElementById('MAOC').disabled = true;   
                document.getElementById('MAOCAR').disabled = true;    
            }
        }  
        function mkardex(){            
            MKARDEX = document.getElementById('MKARDEX').checked;
            if(MKARDEX==true){     
                document.getElementById('MKMATERIAL').disabled = false;   
                document.getElementById('MKENVASE').disabled = false; 
            }else{                
                document.getElementById('MKMATERIAL').disabled = true;   
                document.getElementById('MKENVASE').disabled = true; 
                
                document.getElementById('MKMATERIAL').disabled = true;   
                document.getElementById('MKENVASE').disabled = true;    
            }
        }          
        function exportadora(){              
            EXPORTADORA = document.getElementById('EXPORTADORA').checked;
            if(EXPORTADORA==true){    
                document.getElementById('EXPORTADORATODO').disabled = false;   
                document.getElementById('EMATERIALES').disabled = false;   
                document.getElementById('EEXPORTACION').disabled = false;  
                document.getElementById('ELIQUIDACION').disabled = false;  
                document.getElementById('EPAGO').disabled = false;   
                document.getElementById('EFRUTA').disabled = false;    
                document.getElementById('EFCICARGA').disabled = false;   
                document.getElementById('EINFORMES').disabled = false; 
                
            }else{                  
                document.getElementById('EXPORTADORATODO').disabled = true;   
                document.getElementById('EMATERIALES').disabled = true;   
                document.getElementById('EEXPORTACION').disabled = true;    
                document.getElementById('ELIQUIDACION').disabled = true;    
                document.getElementById('EPAGO').disabled = true;    
                document.getElementById('EFRUTA').disabled = true;   
                document.getElementById('EFCICARGA').disabled = true;   
                document.getElementById('EINFORMES').disabled = true;  

                document.getElementById('EXPORTADORATODO').checked = false; 
                document.getElementById('EXPORTADORA').checked = false;   
                document.getElementById('EMATERIALES').checked = false;   
                document.getElementById('EEXPORTACION').checked = false;  
                document.getElementById('ELIQUIDACION').checked = false;  
                document.getElementById('EPAGO').checked = false;   
                document.getElementById('EFRUTA').checked = false;   
                document.getElementById('EFCICARGA').checked = false;     
                document.getElementById('EINFORMES').checked = false;   
            }
        }         
        function estadistica(){              
            ESTADISTICA = document.getElementById('ESTADISTICA').checked;
            if(ESTADISTICA==true){    
                document.getElementById('ESTADISTICATODO').disabled = false; 
                document.getElementById('ESTARVSP').disabled = false;   
                document.getElementById('ESTASTOPMP').disabled = false;   
                document.getElementById('ESTAINFORME').disabled = false;   
                document.getElementById('ESTAEXISTENCIA').disabled = false;     
                document.getElementById('ESTAPRODUCTOR').disabled = false;  

            }else{                  
                document.getElementById('ESTADISTICATODO').disabled = true; 
                document.getElementById('ESTARVSP').disabled = true;   
                document.getElementById('ESTASTOPMP').disabled = true;   
                document.getElementById('ESTAINFORME').disabled = true;    
                document.getElementById('ESTAEXISTENCIA').disabled = true;     
                document.getElementById('ESTAPRODUCTOR').disabled = true;  

                document.getElementById('ESTADISTICATODO').checked = false;   
                document.getElementById('ESTARVSP').checked = false;   
                document.getElementById('ESTASTOPMP').checked = false;   
                document.getElementById('ESTAINFORME').checked = false;    
                document.getElementById('EINFORMES').checked = false;     
                document.getElementById('ESTAEXISTENCIA').checked = false;     
                document.getElementById('ESTAPRODUCTOR').checked = false;  
            }
        }     
        function mantenedores(){              
            MANTENEDORES = document.getElementById('MANTENEDORES').checked;
            if(MANTENEDORES==true){    
                document.getElementById('MANTENEDORESTODO').disabled = false;   
                document.getElementById('MREGISTRO').disabled = false;   
                document.getElementById('MEDITAR').disabled = false;    
                document.getElementById('MVER').disabled = false;   
                document.getElementById('MAGRUPADO').disabled = false; 
            }else{                  
                document.getElementById('MANTENEDORESTODO').disabled = true;   
                document.getElementById('MREGISTRO').disabled = true;   
                document.getElementById('MEDITAR').disabled = true;    
                document.getElementById('MVER').disabled = true;     
                document.getElementById('MAGRUPADO').disabled = true; 

                document.getElementById('MANTENEDORESTODO').checked = false;  
                document.getElementById('MANTENEDORES').checked = false;   
                document.getElementById('MREGISTRO').checked = false;   
                document.getElementById('MEDITAR').checked = false;    
                document.getElementById('MVER').checked = false;  
                document.getElementById('MAGRUPADO').checked = false; 
            }
        }         
        function administrador(){              
            ADMINISTRADOR = document.getElementById('ADMINISTRADOR').checked;
            if(ADMINISTRADOR==true){    
                document.getElementById('ADMINISTRADORTODO').disabled = false;   
                document.getElementById('ADUSUARIO').disabled = false;   
                document.getElementById('ADAPERTURA').disabled = false;   
                document.getElementById('ADAVISO').disabled = false;   
            }else{                  
                document.getElementById('ADMINISTRADORTODO').disabled = true;   
                document.getElementById('ADUSUARIO').disabled = true;
                document.getElementById('ADAPERTURA').disabled = true;
                document.getElementById('ADAVISO').disabled = true;
                 
                document.getElementById('ADMINISTRADORTODO').checked = false;   
                document.getElementById('ADMINISTRADOR').checked = false;   
                document.getElementById('ADUSUARIO').checked = false;    
                document.getElementById('ADAPERTURA').checked = false;   
                document.getElementById('ADAVISO').checked = false;   
            }
        }    
        function frutatodo(){              
            FRUTATODO = document.getElementById('FRUTATODO').checked;
            if(FRUTATODO==true){    
                document.getElementById('FGRANEL').checked = true;   
                document.getElementById('FAVISO').checked = true;   
                document.getElementById('FRABIERTO').checked = true;   
                document.getElementById('FGRECEPCION').checked = true;   
                document.getElementById('FGDESPACHO').checked = true;   
                document.getElementById('FGGUIA').checked = true;   
                document.getElementById('FPACKING').checked = true;   
                document.getElementById('FPPROCESO').checked = true;   
                document.getElementById('FPREEMBALEJE').checked = true;   
                document.getElementById('FSAG').checked = true;  
                document.getElementById('FSAGINSPECCION').checked = true;   
                document.getElementById('FFRIGORIFICO').checked = true;   
                document.getElementById('FFRECEPCION').checked = true;  
                document.getElementById('FFRDESPACHO').checked = true;   
                document.getElementById('FFRGUIA').checked = true;   
                document.getElementById('FFRREPALETIZAJE').checked = true;   
                document.getElementById('FFRPC').checked = true;   
                document.getElementById('FFRCFOLIO').checked = true;   
                document.getElementById('FCFRUTA').checked = true;   
                document.getElementById('FCFRECHAZO').checked = true;   
                document.getElementById('FCFLEVANTAMIENTO').checked = true;   
                document.getElementById('FEXISTENCIA').checked = true;   
                
                document.getElementById('FGRANEL').disabled = false;   
                document.getElementById('FRABIERTO').disabled = false;   
                document.getElementById('FGRECEPCION').disabled = false; 
                document.getElementById('FGRECEPCION').disabled = false;   
                document.getElementById('FGDESPACHO').disabled = false;   
                document.getElementById('FGGUIA').disabled = false;   
                document.getElementById('FPACKING').disabled = false;   
                document.getElementById('FPPROCESO').disabled = false;   
                document.getElementById('FPREEMBALEJE').disabled = false;   
                document.getElementById('FSAG').disabled = false;  
                document.getElementById('FSAGINSPECCION').disabled = false;   
                document.getElementById('FFRIGORIFICO').disabled = false;   
                document.getElementById('FFRECEPCION').disabled = false;  
                document.getElementById('FFRDESPACHO').disabled = false;   
                document.getElementById('FFRGUIA').disabled = false;    
                document.getElementById('FFRREPALETIZAJE').disabled = false;   
                document.getElementById('FFRPC').disabled = false;   
                document.getElementById('FFRCFOLIO').disabled = false;   
                document.getElementById('FCFRUTA').disabled = false;   
                document.getElementById('FCFRECHAZO').disabled = false;   
                document.getElementById('FCFLEVANTAMIENTO').disabled = false;   
                document.getElementById('FEXISTENCIA').disabled = false;   

            }else{

                document.getElementById('FGRANEL').disabled = false;   
                document.getElementById('FAVISO').disabled = false;   
                document.getElementById('FRABIERTO').disabled = false;   
                document.getElementById('FGRECEPCION').disabled = true;   
                document.getElementById('FGDESPACHO').disabled = true;   
                document.getElementById('FGGUIA').disabled = true;   
                document.getElementById('FPACKING').disabled = false;   
                document.getElementById('FPPROCESO').disabled = true;   
                document.getElementById('FPREEMBALEJE').disabled = true;   
                document.getElementById('FSAG').disabled = false;  
                document.getElementById('FSAGINSPECCION').disabled = true;   
                document.getElementById('FFRIGORIFICO').disabled = false;   
                document.getElementById('FFRECEPCION').disabled = true;  
                document.getElementById('FFRDESPACHO').disabled = true;   
                document.getElementById('FFRGUIA').disabled = true;    
                document.getElementById('FFRREPALETIZAJE').disabled = true;   
                document.getElementById('FFRPC').disabled = true;   
                document.getElementById('FFRCFOLIO').disabled = true;   
                document.getElementById('FCFRUTA').disabled = false;   
                document.getElementById('FCFRECHAZO').disabled = true;   
                document.getElementById('FCFLEVANTAMIENTO').disabled = true;   
                document.getElementById('FEXISTENCIA').disabled = false;   

                document.getElementById('FGRANEL').checked = false;   
                document.getElementById('FAVISO').checked = false;   
                document.getElementById('FRABIERTO').checked = false;   
                document.getElementById('FGRECEPCION').checked = false;   
                document.getElementById('FGDESPACHO').checked = false;   
                document.getElementById('FGGUIA').checked = false;   
                document.getElementById('FPACKING').checked = false;   
                document.getElementById('FPPROCESO').checked = false;   
                document.getElementById('FPREEMBALEJE').checked = false;   
                document.getElementById('FSAG').checked = false;  
                document.getElementById('FSAGINSPECCION').checked = false;   
                document.getElementById('FFRIGORIFICO').checked = false;   
                document.getElementById('FFRECEPCION').checked = false;  
                document.getElementById('FFRDESPACHO').checked = false;   
                document.getElementById('FFRGUIA').checked = false;   
                document.getElementById('FFRREPALETIZAJE').checked = false;   
                document.getElementById('FFRPC').checked = false;   
                document.getElementById('FFRCFOLIO').checked = false;   
                document.getElementById('FCFRUTA').checked = false;   
                document.getElementById('FCFRECHAZO').checked = false;   
                document.getElementById('FCFLEVANTAMIENTO').checked = false;   
                document.getElementById('FEXISTENCIA').checked = false;   
            }
        }  
        function materialtodo(){              
            MATERIALESTODO = document.getElementById('MATERIALESTODO').checked;
            if(MATERIALESTODO==true){    
                document.getElementById('MRABIERTO').checked = true;   
                document.getElementById('MMATERIALES').checked = true;   
                document.getElementById('MMRECEPION').checked = true;   
                document.getElementById('MMDEAPCHO').checked = true;   
                document.getElementById('MMGUIA').checked = true;   
                document.getElementById('MENVASE').checked = true;   
                document.getElementById('MERECEPCION').checked = true;   
                document.getElementById('MEDESPACHO').checked = true;   
                document.getElementById('MEGUIA').checked = true;  
                document.getElementById('MADMINISTRACION').checked = true;   
                document.getElementById('MAOC').checked = true;   
                document.getElementById('MAOCAR').checked = true;  
                document.getElementById('MKARDEX').checked = true;   
                document.getElementById('MKMATERIAL').checked = true;   
                document.getElementById('MKENVASE').checked = true;   
                
                document.getElementById('MRABIERTO').disabled = false;   
                document.getElementById('MMRECEPION').disabled = false;   
                document.getElementById('MMDEAPCHO').disabled = false;   
                document.getElementById('MMGUIA').disabled = false;   
                document.getElementById('MENVASE').disabled = false;   
                document.getElementById('MERECEPCION').disabled = false;   
                document.getElementById('MEDESPACHO').disabled = false;   
                document.getElementById('MEGUIA').disabled = false; 
                document.getElementById('MADMINISTRACION').disabled = false;   
                document.getElementById('MAOC').disabled = false;   
                document.getElementById('MAOCAR').disabled = false; 
                document.getElementById('MKARDEX').disabled = false;   
                document.getElementById('MKMATERIAL').disabled = false;   
                document.getElementById('MKENVASE').disabled = false;                   

            }else{
                document.getElementById('MRABIERTO').checked = false;   
                document.getElementById('MMATERIALES').checked = false;   
                document.getElementById('MMRECEPION').checked = false;   
                document.getElementById('MMDEAPCHO').checked = false;   
                document.getElementById('MMGUIA').checked = false;   
                document.getElementById('MENVASE').checked = false;   
                document.getElementById('MERECEPCION').checked = false;   
                document.getElementById('MEDESPACHO').checked = false;   
                document.getElementById('MEGUIA').checked = false; 
                document.getElementById('MADMINISTRACION').checked = false;   
                document.getElementById('MAOC').checked = false;   
                document.getElementById('MAOCAR').checked = false; 
                document.getElementById('MKARDEX').checked = false;   
                document.getElementById('MKMATERIAL').checked = false;   
                document.getElementById('MKENVASE').checked = false;    
                
                document.getElementById('MRABIERTO').disabled = false;   
                document.getElementById('MMRECEPION').disabled = true;   
                document.getElementById('MMDEAPCHO').disabled = true;   
                document.getElementById('MMGUIA').disabled = true;   
                document.getElementById('MENVASE').disabled = false;   
                document.getElementById('MERECEPCION').disabled = true;   
                document.getElementById('MEDESPACHO').disabled = true;   
                document.getElementById('MEGUIA').disabled = true; 
                document.getElementById('MADMINISTRACION').disabled = false;   
                document.getElementById('MAOC').disabled = true;   
                document.getElementById('MAOCAR').disabled = true; 
                document.getElementById('MKARDEX').disabled = false;   
                document.getElementById('MKMATERIAL').disabled = true;   
                document.getElementById('MKENVASE').disabled = true;   

            }
        }  
        function exportadoratodo(){              
            EXPORTADORATODO = document.getElementById('EXPORTADORATODO').checked;
            if(EXPORTADORATODO==true){    
                document.getElementById('EMATERIALES').checked = true;   
                document.getElementById('EEXPORTACION').checked = true;    
                document.getElementById('ELIQUIDACION').checked = true;    
                document.getElementById('EPAGO').checked = true;  
                document.getElementById('EFRUTA').checked = true;  
                document.getElementById('EFCICARGA').checked = true; 
                document.getElementById('EINFORMES').checked = true;  
            }else{
                document.getElementById('EMATERIALES').checked = false;   
                document.getElementById('EEXPORTACION').checked = false;    
                document.getElementById('ELIQUIDACION').checked = false;   
                document.getElementById('EPAGO').checked = false;   
                document.getElementById('EFRUTA').checked = false;   
                document.getElementById('EFCICARGA').checked = false; 
                document.getElementById('EINFORMES').checked = false;   
            }
        }          
        function estadisticatodo(){              
            ESTADISTICATODO = document.getElementById('ESTADISTICATODO').checked;
            if(ESTADISTICATODO==true){    
                document.getElementById('ESTARVSP').checked = true;   
                document.getElementById('ESTASTOPMP').checked = true;   
                document.getElementById('ESTAINFORME').checked = true;  
                document.getElementById('ESTAEXISTENCIA').checked = true;  
            }else{
                document.getElementById('ESTARVSP').checked = false;   
                document.getElementById('ESTASTOPMP').checked = false;   
                document.getElementById('ESTAINFORME').checked = false;    
                document.getElementById('ESTAEXISTENCIA').checked = false;   
            }
        }          
        function estadisticaproductor(){              
            ESTAPRODUCTOR = document.getElementById('ESTAPRODUCTOR').checked;
            if(ESTAPRODUCTOR==true){    
                document.getElementById('ESTADISTICATODO').checked = false;   
                document.getElementById('ESTARVSP').checked = false;   
                document.getElementById('ESTASTOPMP').checked = false;   
                document.getElementById('ESTAINFORME').checked = false;    
                document.getElementById('ESTAEXISTENCIA').checked = false;   
                
                document.getElementById('ESTADISTICATODO').disabled = true;   
                document.getElementById('ESTARVSP').disabled = true;   
                document.getElementById('ESTASTOPMP').disabled = true;   
                document.getElementById('ESTAINFORME').disabled = true;    
                document.getElementById('ESTAEXISTENCIA').disabled = true;    
            }else{                
                document.getElementById('ESTADISTICATODO').disabled = false;  
                document.getElementById('ESTARVSP').disabled = false;   
                document.getElementById('ESTASTOPMP').disabled = false;   
                document.getElementById('ESTAINFORME').disabled = false;    
                document.getElementById('ESTAEXISTENCIA').disabled = false;     
            }
        }  
        function mantenedorestodo(){              
            MANTENEDORESTODO = document.getElementById('MANTENEDORESTODO').checked;
            if(MANTENEDORESTODO==true){    
                document.getElementById('MREGISTRO').checked = true;   
                document.getElementById('MEDITAR').checked = true;    
                document.getElementById('MVER').checked = true;  
                document.getElementById('MAGRUPADO').checked = true;  
            }else{
                document.getElementById('MREGISTRO').checked = false;   
                document.getElementById('MEDITAR').checked = false;    
                document.getElementById('MVER').checked = false;  
                document.getElementById('MAGRUPADO').checked = false;  
            }
        }        
        function administradorstodo(){              
            ADMINISTRADORTODO = document.getElementById('ADMINISTRADORTODO').checked;
            if(ADMINISTRADORTODO==true){     
                document.getElementById('ADUSUARIO').checked = true;   
                document.getElementById('ADAPERTURA').checked = true;   
                document.getElementById('ADAVISO').checked = true;   
            }else{
                document.getElementById('ADUSUARIO').checked = false;   
                document.getElementById('ADAPERTURA').checked = false;   
                document.getElementById('ADAVISO').checked = false;   
            }
        }


        function validacion() {

            TUSUARIO = document.getElementById("TUSUARIO").selectedIndex;
            document.getElementById('val_tusuario').innerHTML = "";

  
            if (TUSUARIO == null || TUSUARIO == 0) {
                document.form_reg_dato.TUSUARIO.focus();
                document.form_reg_dato.TUSUARIO.style.borderColor = "#FF0000";
                document.getElementById('val_tusuario').innerHTML = "NO HA SELECCIONADO NINGUNA ALTERNATIVA";
                return false;
            }
            document.form_reg_dato.TUSUARIO.style.borderColor = "#4AF575";

        }


        function irPagina(url) {
            location.href = "" + url;
        }


  
    </script>


</head>

<body class="hold-transition light-skin fixed sidebar-mini theme-primary" >
    <div class="wrapper">
        <?php include_once "../../assest/config/menuExpo.php"; ?>
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Privilegio Tipo Usuario</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Usuario</li>
                                        <li class="breadcrumb-item active" aria-current="page"> <a href="#">Privilegio Tipo Usuario </a>
                                        </li>
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
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div class="box">
                                <div class="box-header with-border bg-primary">
                                    <h4 class="box-title">Registro Privilegio </h4>                                      
                                </div>
                                <!-- /.box-header -->
                                <form class="form" role="form"  method="post"  name="form_reg_dato" id="form_reg_dato" >
                                    <div class="box-body">
                                        <hr class="my-15">                                        
                                        <div class="row">
                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Tipo Usuario</label>
                                                    <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $IDOP; ?>" />
                                                    <select class="form-control select2" id="TUSUARIO" name="TUSUARIO" style="width: 100%;"  value="<?php echo $TUSUARIO; ?>"  <?php echo $DISABLED; ?>>
                                                        <option></option>
                                                        <?php foreach ($ARRAYTUSUARIOS as $r) : ?>
                                                            <?php if ($ARRAYTUSUARIOS) {    ?>
                                                                <option value="<?php echo $r['ID_TUSUARIO']; ?>" <?php if ($TUSUARIO == $r['ID_TUSUARIO']) { echo "selected";  } ?>>
                                                                    <?php echo $r['NOMBRE_TUSUARIO'] ?>
                                                                </option>
                                                            <?php } else { ?>
                                                                <option>No Hay Datos Registrados </option>
                                                            <?php } ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <label id="val_tusuario" class="validacion"> </label>
                                                </div>
                                            </div>
                                        </div>                                                                           
                                        <fieldset>
                                            <legend>Fruta </legend> 
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FRUTA"  name="FRUTA" class="filled-in chk-col-info"      <?php if ($FRUTA == "1") { echo "checked"; } ?>  onchange="fruta();"  <?php echo $DISABLED;?> >
                                                    <label for="FRUTA">Fruta</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FRUTATODO"  name="FRUTATODO" class="filled-in chk-col-danger"      <?php echo $FRUTATODO;?>  onchange="frutatodo();"  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                    <label for="FRUTATODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div>      
                                            <hr>
                                            <div class="row">                                             
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FAVISO"  name="FAVISO" class="filled-in chk-col-success"   <?php if ($FAVISO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                    <label for="FAVISO">Mostrar Avisos</label>	
                                                </div>                                             
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="FRABIERTO"  name="FRABIERTO" class="filled-in chk-col-success"   <?php if ($FRABIERTO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                    <label for="FRABIERTO">Mostrar Registro Abiertos</label>	
                                                </div>  
                                            </div>           
                                            <hr>                    
                                            <fieldset>     
                                                <legend>Granel </legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FGRANEL"  name="FGRANEL" class="filled-in chk-col-success"   <?php if ($FGRANEL == "1") { echo "checked"; } ?> onchange="frutagranel();"  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FGRANEL">Granel</label>	
                                                    </div>
                                                </div> 
                                                <div class="row">                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FGRECEPCION"  name="FGRECEPCION" class="filled-in chk-col-success"   <?php if ($FGRECEPCION == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FGRECEPCION">Recepcion</label>	
                                                    </div>                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FGDESPACHO"  name="FGDESPACHO" class="filled-in chk-col-success"   <?php if ($FGDESPACHO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FGDESPACHO">Despacho</label>	
                                                    </div>                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FGGUIA"  name="FGGUIA" class="filled-in chk-col-success"   <?php if ($FGGUIA == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FGGUIA">Guía</label>	
                                                    </div>  
                                                </div>
                                            </fieldset>      
                                            <fieldset>     
                                                <legend>Packing </legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FPACKING"  name="FPACKING" class="filled-in chk-col-success"   <?php if ($FPACKING == "1") { echo "checked"; } ?> onchange="frutapacking();"  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FPACKING">Packing</label>	
                                                    </div>
                                                </div> 
                                                <div class="row">                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FPPROCESO"  name="FPPROCESO" class="filled-in chk-col-success"   <?php if ($FPPROCESO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FPPROCESO">Proceso</label>	
                                                    </div>                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FPREEMBALEJE"  name="FPREEMBALEJE" class="filled-in chk-col-success"   <?php if ($FPREEMBALEJE == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FPREEMBALEJE">Reembalaje</label>	
                                                    </div>   
                                                </div>
                                            </fieldset>
                                            <fieldset>     
                                                <legend>Operaciones Sag </legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FSAG"  name="FSAG" class="filled-in chk-col-success"   <?php if ($FSAG == "1") { echo "checked"; } ?> onchange="frutasag();"  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FSAG">Operaciones Sag</label>	
                                                    </div>
                                                </div> 
                                                <hr>
                                                <div class="row">                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FSAGINSPECCION"  name="FSAGINSPECCION" class="filled-in chk-col-success"   <?php if ($FSAGINSPECCION == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FSAGINSPECCION">Inspeccion</label>	
                                                    </div>    
                                                </div>
                                            </fieldset>
                                            <fieldset>     
                                                <legend>Frigorifico </legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FFRIGORIFICO"  name="FFRIGORIFICO" class="filled-in chk-col-success"   <?php if ($FFRIGORIFICO == "1") { echo "checked"; } ?> onchange="frutafrigorifico();"  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FFRIGORIFICO">Frigorifico</label>	
                                                    </div>
                                                </div> 
                                                <hr>
                                                <div class="row">                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FFRECEPCION"  name="FFRECEPCION" class="filled-in chk-col-success"   <?php if ($FFRECEPCION == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FFRECEPCION">Recepción</label>	
                                                    </div>                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FFRDESPACHO"  name="FFRDESPACHO" class="filled-in chk-col-success"   <?php if ($FFRDESPACHO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FFRDESPACHO">Despacho</label>	
                                                    </div>                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FFRGUIA"  name="FFRGUIA" class="filled-in chk-col-success"   <?php if ($FFRGUIA == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FFRGUIA">Guía</label>	
                                                    </div>                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FFRREPALETIZAJE"  name="FFRREPALETIZAJE" class="filled-in chk-col-success"   <?php if ($FFRREPALETIZAJE == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FFRREPALETIZAJE">Repaletizaje</label>	
                                                    </div>                                           
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FFRPC"  name="FFRPC" class="filled-in chk-col-success"   <?php if ($FFRPC == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FFRPC">Planificador carga</label>	
                                                    </div>                                           
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FFRCFOLIO"  name="FFRCFOLIO" class="filled-in chk-col-success"   <?php if ($FFRCFOLIO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FFRCFOLIO">Cambio Folio</label>	
                                                    </div> 
                                                </div>
                                            </fieldset>
                                            <fieldset>     
                                                <legend>Calidad de Fruta </legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FCFRUTA"  name="FCFRUTA" class="filled-in chk-col-success"   <?php if ($FCFRUTA == "1") { echo "checked"; } ?> onchange="frutacalidad();"  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FCFRUTA">Calidad de Fruta</label>	
                                                    </div>
                                                </div> 
                                                <hr>
                                                <div class="row">                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FCFRECHAZO"  name="FCFRECHAZO" class="filled-in chk-col-success"   <?php if ($FCFRECHAZO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FCFRECHAZO">Rechazo</label>	
                                                    </div>                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FCFLEVANTAMIENTO"  name="FCFLEVANTAMIENTO" class="filled-in chk-col-success"   <?php if ($FCFLEVANTAMIENTO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FCFLEVANTAMIENTO">Levantamiento</label>	
                                                    </div>  
                                                </div>
                                            </fieldset>
                                            <fieldset>     
                                                <legend>Existencia</legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="FEXISTENCIA"  name="FEXISTENCIA" class="filled-in chk-col-success"   <?php if ($FEXISTENCIA == "1") { echo "checked"; } ?> onchange=""  <?php echo $DISABLED;?> <?php echo $DISABLEDFRUTA;?>>
                                                        <label for="FEXISTENCIA">Existencia</label>	
                                                    </div>
                                                </div> 
                                            </fieldset>
                                        </fieldset> 
                                        <fieldset>
                                            <legend>Materiales </legend> 
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MATERIALES"  name="MATERIALES" class="filled-in chk-col-info"      <?php if ($MATERIALES == "1") { echo "checked"; } ?>  onchange="material();"  <?php echo $DISABLED;?> >
                                                    <label for="MATERIALES">Materiales</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MATERIALESTODO"  name="MATERIALESTODO" class="filled-in chk-col-danger"      <?php echo $MATERIALESTODO;?>  onchange="materialtodo();"  <?php echo $DISABLED;?> <?php echo $DISABLEDMATERIAL;?>>
                                                    <label for="MATERIALESTODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div>       
                                            <hr>
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MRABIERTO"  name="MRABIERTO" class="filled-in chk-col-success"   <?php if ($MRABIERTO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMATERIAL;?>>
                                                    <label for="MRABIERTO">Mostrar Registros Abiertos</label>	
                                                </div>
                                            </div>            
                                            <hr>                    
                                            <fieldset>     
                                                <legend>Material </legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MMATERIALES"  name="MMATERIALES" class="filled-in chk-col-success"   <?php if ($MMATERIALES == "1") { echo "checked"; } ?> onchange="mmaterial();"  <?php echo $DISABLED;?> <?php echo $DISABLEDMATERIAL;?>>
                                                        <label for="MMATERIALES">Material</label>	
                                                    </div>
                                                </div> 
                                                <div class="row">                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MMRECEPION"  name="MMRECEPION" class="filled-in chk-col-success"   <?php if ($MMRECEPION == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMMATERIAL;?>>
                                                        <label for="MMRECEPION">Recepcion</label>	
                                                    </div>                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MMDEAPCHO"  name="MMDEAPCHO" class="filled-in chk-col-success"   <?php if ($MMDEAPCHO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMMATERIAL;?>>
                                                        <label for="MMDEAPCHO">Despacho</label>	
                                                    </div>                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MMGUIA"  name="MMGUIA" class="filled-in chk-col-success"   <?php if ($MMGUIA == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMMATERIAL;?>>
                                                        <label for="MMGUIA">Guía</label>	
                                                    </div>  
                                                </div>
                                            </fieldset>
                                            <fieldset>    
                                                <legend>Envases </legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MENVASE"  name="MENVASE" class="filled-in chk-col-success"   <?php if ($MENVASE == "1") { echo "checked"; } ?> onchange="menvase();" <?php echo $DISABLED;?> <?php echo $DISABLEDMATERIAL;?>>
                                                        <label for="MENVASE">Material</label>	
                                                    </div>
                                                </div> 
                                                <div class="row">                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MERECEPCION"  name="MERECEPCION" class="filled-in chk-col-success"   <?php if ($MERECEPCION == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMENVASE;?>>
                                                        <label for="MERECEPCION">Recepcion</label>	
                                                    </div>                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MEDESPACHO"  name="MEDESPACHO" class="filled-in chk-col-success"   <?php if ($MEDESPACHO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMENVASE;?>>
                                                        <label for="MEDESPACHO">Despacho</label>	
                                                    </div>                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MEGUIA"  name="MEGUIA" class="filled-in chk-col-success"   <?php if ($MEGUIA == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMENVASE;?>>
                                                        <label for="MEGUIA">Guía</label>	
                                                    </div>  
                                                </div>
                                            </fieldset>                                            
                                            <fieldset>    
                                                <legend>Administracion </legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MADMINISTRACION"  name="MADMINISTRACION" class="filled-in chk-col-success"   <?php if ($MADMINISTRACION == "1") { echo "checked"; } ?> onchange="madministracion();" <?php echo $DISABLED;?> <?php echo $DISABLEDMATERIAL;?>>
                                                        <label for="MADMINISTRACION">Administracion</label>	
                                                    </div>
                                                </div> 
                                                <div class="row">                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MAOC"  name="MAOC" class="filled-in chk-col-success"   <?php if ($MAOC == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMADMINISTRACION;?>>
                                                        <label for="MAOC">Orden Compra</label>	
                                                    </div>                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MAOCAR"  name="MAOCAR" class="filled-in chk-col-success"   <?php if ($MAOCAR == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMADMINISTRACION;?>>
                                                        <label for="MAOCAR">Orden compra A/R</label>	
                                                    </div>   
                                                </div>
                                            </fieldset>                                                                              
                                            <fieldset>    
                                                <legend>Kardex </legend> 
                                                <div class="row">                                            
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MKARDEX"  name="MKARDEX" class="filled-in chk-col-success"   <?php if ($MKARDEX == "1") { echo "checked"; } ?> onchange="mkardex();" <?php echo $DISABLED;?> <?php echo $DISABLEDMATERIAL;?>>
                                                        <label for="MKARDEX">Kardex</label>	
                                                    </div>
                                                </div> 
                                                <div class="row">                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MKMATERIAL"  name="MKMATERIAL" class="filled-in chk-col-success"   <?php if ($MKMATERIAL == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMMKARDEX;?> >
                                                        <label for="MKMATERIAL">Material</label>	
                                                    </div>                                             
                                                    <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                        <input type="checkbox" id="MKENVASE"  name="MKENVASE" class="filled-in chk-col-success"   <?php if ($MKENVASE == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMMKARDEX;?>>
                                                        <label for="MKENVASE">Envase</label>	
                                                    </div>   
                                                </div>
                                            </fieldset>
                                        </fieldset>       
                                        <fieldset>
                                            <legend>Exportadora </legend> 
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EXPORTADORA"  name="EXPORTADORA" class="filled-in chk-col-info"      <?php if ($EXPORTADORA == "1") { echo "checked"; } ?>  onchange="exportadora();"  <?php echo $DISABLED;?> >
                                                    <label for="EXPORTADORA">Exportadora</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EXPORTADORATODO"  name="EXPORTADORATODO" class="filled-in chk-col-danger"      <?php echo $EXPORTADORATODO;?>  onchange="exportadoratodo();"  <?php echo $DISABLED;?> <?php echo $DISABLEDEXPORTADORA;?>>
                                                    <label for="EXPORTADORATODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div>                  
                                            <hr>                    
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EMATERIALES"  name="EMATERIALES" class="filled-in chk-col-success"   <?php if ($EMATERIALES == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDEXPORTADORA;?>>
                                                    <label for="EMATERIALES">Materiales</label>	
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EEXPORTACION"  name="EEXPORTACION" class="filled-in chk-col-success"     <?php if ($EEXPORTACION == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDEXPORTADORA;?>>
                                                    <label for="EEXPORTACION">Exportación</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ELIQUIDACION"  name="ELIQUIDACION" class="filled-in chk-col-success"     <?php if ($ELIQUIDACION == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDEXPORTADORA;?>>
                                                    <label for="ELIQUIDACION">Liquidación</label>                                        
                                                </div>     
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EPAGO"  name="EPAGO" class="filled-in chk-col-success"     <?php if ($EPAGO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDEXPORTADORA;?>>
                                                    <label for="EPAGO">Pago</label>                                        
                                                </div>        
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="EINFORMES"  name="EINFORMES" class="filled-in chk-col-success"     <?php if ($EINFORMES == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDEXPORTADORA;?>>
                                                    <label for="EINFORMES">Informes</label>                                        
                                                </div>
                                            </div>          
                                            <div class="row">       
                                                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">                                                                        
                                                    <fieldset>     
                                                        <legend>Fruta </legend> 
                                                        <div class="row">                                            
                                                            <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                                <input type="checkbox" id="EFRUTA"  name="EFRUTA" class="filled-in chk-col-success"   <?php if ($EFRUTA == "1") { echo "checked"; } ?>   <?php echo $DISABLED;?> <?php echo $DISABLEDEXPORTADORA;?>>
                                                                <label for="EFRUTA">Fruta</label>	
                                                            </div>
                                                        </div> 
                                                        <hr>
                                                        <div class="row">                                             
                                                            <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                                <input type="checkbox" id="EFCICARGA"  name="EFCICARGA" class="filled-in chk-col-success"   <?php if ($EFCICARGA == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDEXPORTADORA;?>>
                                                                <label for="EFCICARGA">Cambio Instructivo Carga</label>	
                                                            </div>   
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </fieldset>                                          
                                        <fieldset>
                                            <legend>Estadistica </legend> 
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ESTADISTICA"  name="ESTADISTICA" class="filled-in chk-col-info"      <?php if ($ESTADISTICA == "1") { echo "checked"; } ?> onchange="estadistica();"  <?php echo $DISABLED;?> >
                                                    <label for="ESTADISTICA">Estadistica</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ESTADISTICATODO"  name="ESTADISTICATODO" class="filled-in chk-col-danger"      <?php echo $ESTADISTICATODO;?>  onchange="estadisticatodo();"  <?php echo $DISABLED;?> <?php echo $DISABLEDESTADISTICA;?> <?php echo $DISABLEDESTADISTICAPRODUCTOR;?> >
                                                    <label for="ESTADISTICATODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div>                  
                                            <hr>                    
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ESTARVSP"  name="ESTARVSP" class="filled-in chk-col-success"   <?php if ($ESTARVSP == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDESTADISTICA;?> <?php echo $DISABLEDESTADISTICAPRODUCTOR;?> >
                                                    <label for="ESTARVSP">Recepción vs Proceso</label>	
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ESTASTOPMP"  name="ESTASTOPMP" class="filled-in chk-col-success"     <?php if ($ESTASTOPMP == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDESTADISTICA;?> <?php echo $DISABLEDESTADISTICAPRODUCTOR;?>>
                                                    <label for="ESTASTOPMP">Stock MP</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ESTAINFORME"  name="ESTAINFORME" class="filled-in chk-col-success"     <?php if ($ESTAINFORME == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDESTADISTICA;?> <?php echo $DISABLEDESTADISTICAPRODUCTOR;?>>
                                                    <label for="ESTAINFORME">Informe</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ESTAEXISTENCIA"  name="ESTAEXISTENCIA" class="filled-in chk-col-success"     <?php if ($ESTAEXISTENCIA == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDESTADISTICA;?> <?php echo $DISABLEDESTADISTICAPRODUCTOR;?> >
                                                    <label for="ESTAEXISTENCIA">Existencias</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ESTAPRODUCTOR"  name="ESTAPRODUCTOR" class="filled-in chk-col-success"     <?php if ($ESTAPRODUCTOR == "1") { echo "checked"; } ?> onchange="estadisticaproductor();" <?php echo $DISABLED;?> <?php echo $DISABLEDESTADISTICA;?>>
                                                    <label for="ESTAPRODUCTOR">Productor</label>                                        
                                                </div>
                                            </div>
                                        </fieldset> 
                                        <fieldset>
                                            <legend>Mantenedores </legend> 
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MANTENEDORES"  name="MANTENEDORES" class="filled-in chk-col-info"      <?php if ($MANTENEDORES == "1") { echo "checked"; } ?> onchange="mantenedores();"  <?php echo $DISABLED;?> >
                                                    <label for="MANTENEDORES">Mantenedores</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MANTENEDORESTODO"  name="MANTENEDORESTODO" class="filled-in chk-col-danger"      <?php echo $MANTENEDORESTODO;?>  onchange="mantenedorestodo();"  <?php echo $DISABLED;?> <?php echo $DISABLEDMANTENEDORES;?>>
                                                    <label for="MANTENEDORESTODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div>                  
                                            <hr>                    
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MREGISTRO"  name="MREGISTRO" class="filled-in chk-col-success"   <?php if ($MREGISTRO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMANTENEDORES;?>>
                                                    <label for="MREGISTRO">Registro</label>	
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MEDITAR"  name="MEDITAR" class="filled-in chk-col-success"     <?php if ($MEDITAR == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMANTENEDORES;?>>
                                                    <label for="MEDITAR">Editar</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MVER"  name="MVER" class="filled-in chk-col-success"     <?php if ($MVER == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMANTENEDORES;?>>
                                                    <label for="MVER">Ver</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="MAGRUPADO"  name="MAGRUPADO" class="filled-in chk-col-success"     <?php if ($MAGRUPADO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDMANTENEDORES;?>>
                                                    <label for="MAGRUPADO">Agrupado</label>                                        
                                                </div>
                                            </div>
                                        </fieldset>                                        
                                        <fieldset>
                                            <legend>Administrador </legend>    
                                            <div class="row">
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ADMINISTRADOR"  name="ADMINISTRADOR" class="filled-in chk-col-info"      <?php if ($ADMINISTRADOR == "1") { echo "checked"; } ?>  onchange="administrador();" <?php echo $DISABLED;?>  >
                                                    <label for="ADMINISTRADOR">Administrador</label>                                        
                                                </div>
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ADMINISTRADORTODO"  name="ADMINISTRADORTODO" class="filled-in chk-col-danger"      <?php echo $ADMINISTRADORTODO;?>  onchange="administradorstodo();"  <?php echo $DISABLED;?>  <?php echo $DISABLEDADMINISTRADOR;?>>
                                                    <label for="ADMINISTRADORTODO">Selecionar Todo</label>                                        
                                                </div>
                                            </div>                  
                                            <hr>                    
                                            <div class="row">                                            
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ADUSUARIO"  name="ADUSUARIO" class="filled-in chk-col-success"   <?php if ($ADUSUARIO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDADMINISTRADOR;?>>
                                                    <label for="ADUSUARIO">Usuario</label>	
                                                </div>                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ADAPERTURA"  name="ADAPERTURA" class="filled-in chk-col-success"   <?php if ($ADAPERTURA == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDADMINISTRADOR;?>>
                                                    <label for="ADAPERTURA">Apertura Registros</label>	
                                                </div>                                          
                                                <div class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-6 col-6 col-xs-6">
                                                    <input type="checkbox" id="ADAVISO"  name="ADAVISO" class="filled-in chk-col-success"   <?php if ($ADAVISO == "1") { echo "checked"; } ?>  <?php echo $DISABLED;?> <?php echo $DISABLEDADMINISTRADOR;?>>
                                                    <label for="ADAVISO">Avisos</label>	
                                                </div>
                                            </div>          
                                        </fieldset>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <div class="btn-group   col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12 " role="group" aria-label="Acciones generales">                                    
                                            <button type="button" class="btn  btn-warning " data-toggle="tooltip" title="Cancelar" name="CANCELAR" value="CANCELAR" Onclick="irPagina('registroPtusuario.php');">
                                                <i class="ti-trash"></i>Cancelar
                                            </button>
                                            <?php if ($OP == "editar") { ?>
                                                <button type="submit" class="btn btn-primary" name="EDITAR" value="EDITAR"   data-toggle="tooltip" title="Guardar" Onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } else if($OP == "0") { ?>
                                                <button type="submit" class="btn btn-danger" name="ELIMINAR" value="ELIMINAR"  data-toggle="tooltip" title="Deshabilitar"  >
                                                    <i class="ti-save-alt"></i> Deshabilitar
                                                </button>
                                            <?php } else if($OP == "1"){ ?>                                                    
                                                <button type="submit" class="btn btn-success" name="HABILITAR" value="HABILITAR"  data-toggle="tooltip" title="Habilitar"  >
                                                    <i class="ti-save-alt"></i> Habilitar
                                                </button>
                                            <?php } else { ?>
                                                <button type="submit" class="btn btn-primary" name="GUARDAR" value="GUARDAR"  data-toggle="tooltip" title="Guardar"  <?php echo $DISABLED; ?> Onclick="return validacion()">
                                                    <i class="ti-save-alt"></i> Guardar
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div class="box">
                                <div class="box-header with-border bg-info">
                                    <h4 class="box-title">Agrupado Privilegio</h4>
                                </div>
                                <div class="box-body">                              
                                    <table id="listar" class="table-hover " style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Número</th>
                                                <th>Tipo Usuario</th>
                                                <th class="text-center">Operaciónes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ARRAYPTUSUARIO as $r) : ?>
                                                <?php $CONTADOR=$CONTADOR+1;?>
                                                <?php 
                                                    $ARRAYVERTUSUARIO=$TUSUARIO_ADO->verTusuario($r['ID_TUSUARIO']);
                                                    if($ARRAYVERTUSUARIO){
                                                      $NOMBRETUSUARIO=$ARRAYVERTUSUARIO[0]["NOMBRE_TUSUARIO"];
                                                    }else{
                                                        $NOMBRETUSUARIO="Sin Datos";
                                                    }
                                                
                                                ?>
                                                <tr class="center">
                                                    <td>
                                                        <a href="#" class="text-warning hover-warning">
                                                            <?php echo $CONTADOR; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $NOMBRETUSUARIO; ?></td>             
                                                    <td class="text-center">
                                                                <form method="post" id="form1">
                                                                    <div class="list-icons d-inline-flex">
                                                                        <div class="list-icons-item dropdown">
                                                                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <span class="icon-copy ti-settings"></span>
                                                                            </button>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <input type="hidden" class="form-control" placeholder="ID" id="ID" name="ID" value="<?php echo $r['ID_PTUSUARIO']; ?>" />
                                                                                <input type="hidden" class="form-control" placeholder="URL" id="URL" name="URL" value="registroPtusuario" />
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Ver">
                                                                                    <button type="submit" class="btn btn-info btn-block  btn-sm" id="VERURL" name="VERURL">
                                                                                        <i class="ti-eye"></i> Ver
                                                                                    </button>
                                                                                </span> 
                                                                                <span href="#" class="dropdown-item" data-toggle="tooltip" title="Editar">
                                                                                    <button type="submit" class="btn  btn-warning btn-block   btn-sm" id="EDITARURL" name="EDITARURL">
                                                                                        <i class="ti-pencil-alt"></i> Editar
                                                                                    </button>
                                                                                </span>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 1) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Deshabilitar">
                                                                                        <button type="submit" class="btn btn-block btn-danger btn-sm" id="ELIMINARURL" name="ELIMINARURL">
                                                                                            <i class="ti-na "></i> Deshabilitar
                                                                                        </button>
                                                                                    </span>                                                                                
                                                                                <?php } ?>
                                                                                <?php if ($r['ESTADO_REGISTRO'] == 0) { ?>
                                                                                    <span href="#" class="dropdown-item" data-toggle="tooltip" title="Habilitar">
                                                                                        <button type="submit" class="btn btn-block btn-success btn-sm" id="HABILITARURL" name="HABILITARURL">
                                                                                            <i class="ti-check "></i> Habilitar
                                                                                        </button>
                                                                                    </span>    
                                                                                <?php } ?>                                                       
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </td>                                               
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </section>
            <!-- /.content -->
            </div>
            <!--.row -->

        </div>
    </div>
    <?php include_once "../../assest/config/footer.php"; ?>
    <?php include_once "../../assest/config/menuExtraExpo.php"; ?>
    </div>
    <?php include_once "../../assest/config/urlBase.php"; ?>

    <?php 
                  //OPERACIONES
            //OPERACION DE REGISTRO DE FILA
            if (isset($_REQUEST['GUARDAR'])) {
                $ARRAYPTUSUARIOVALIDAR=$PTUSUARIO_ADO->listarPtusuarioPorTusuarioCBX($_REQUEST['TUSUARIO']);
                if($ARRAYPTUSUARIOVALIDAR){
                    $SINO="1";
                    echo '<script>
                            Swal.fire({
                                icon:"warning",
                                title:"Accion restringida",
                                text:"Existe un registro asociado al tipo usuario selecionado",
                                showConfirmButton: true,
                                confirmButtonText:"Cerrar",
                                closeOnConfirm:false
                            })
                        </script>';
                }else{
                    $SINO="0";
                }
                if($SINO=="0"){
                    //UTILIZACION METODOS SET DEL MODELO
                    //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO   
                    $PTUSUARIO->__SET('FRUTA', isset($_REQUEST['FRUTA'])); 
                    $PTUSUARIO->__SET('FAVISO', isset($_REQUEST['FAVISO']));  
                    $PTUSUARIO->__SET('FRABIERTO', isset($_REQUEST['FRABIERTO']));
                    $PTUSUARIO->__SET('FGRANEL', isset($_REQUEST['FGRANEL'])); 
                    $PTUSUARIO->__SET('FGRECEPCION', isset($_REQUEST['FGRECEPCION'])); 
                    $PTUSUARIO->__SET('FGDESPACHO', isset($_REQUEST['FGDESPACHO'])); 
                    $PTUSUARIO->__SET('FGGUIA', isset($_REQUEST['FGGUIA'])); 
                    $PTUSUARIO->__SET('FPACKING', isset($_REQUEST['FPACKING'])); 
                    $PTUSUARIO->__SET('FPPROCESO', isset($_REQUEST['FPPROCESO'])); 
                    $PTUSUARIO->__SET('FPREEMBALEJE', isset($_REQUEST['FPREEMBALEJE'])); 
                    $PTUSUARIO->__SET('FSAG', isset($_REQUEST['FSAG'])); 
                    $PTUSUARIO->__SET('FSAGINSPECCION', isset($_REQUEST['FSAGINSPECCION'])); 
                    $PTUSUARIO->__SET('FFRIGORIFICO', isset($_REQUEST['FFRIGORIFICO'])); 
                    $PTUSUARIO->__SET('FFRECEPCION', isset($_REQUEST['FFRECEPCION'])); 
                    $PTUSUARIO->__SET('FFRDESPACHO', isset($_REQUEST['FFRDESPACHO'])); 
                    $PTUSUARIO->__SET('FFRGUIA', isset($_REQUEST['FFRGUIA'])); 
                    $PTUSUARIO->__SET('FFRREPALETIZAJE', isset($_REQUEST['FFRREPALETIZAJE'])); 
                    $PTUSUARIO->__SET('FFRPC', isset($_REQUEST['FFRPC'])); 
                    $PTUSUARIO->__SET('FFRCFOLIO', isset($_REQUEST['FFRCFOLIO']));                   
                    $PTUSUARIO->__SET('FCFRUTA', isset($_REQUEST['FCFRUTA'])); 
                    $PTUSUARIO->__SET('FCFRECHAZO', isset($_REQUEST['FCFRECHAZO'])); 
                    $PTUSUARIO->__SET('FCFLEVANTAMIENTO', isset($_REQUEST['FCFLEVANTAMIENTO'])); 
                    $PTUSUARIO->__SET('FEXISTENCIA', isset($_REQUEST['FEXISTENCIA']));              
                    $PTUSUARIO->__SET('MATERIALES', isset($_REQUEST['MATERIALES']));         
                    $PTUSUARIO->__SET('MRABIERTO', isset($_REQUEST['MRABIERTO'])); 
                    $PTUSUARIO->__SET('MMATERIALES', isset($_REQUEST['MMATERIALES'])); 
                    $PTUSUARIO->__SET('MMRECEPION', isset($_REQUEST['MMRECEPION'])); 
                    $PTUSUARIO->__SET('MMDEAPCHO', isset($_REQUEST['MMDEAPCHO'])); 
                    $PTUSUARIO->__SET('MMGUIA', isset($_REQUEST['MMGUIA']));                     
                    $PTUSUARIO->__SET('MENVASE', isset($_REQUEST['MENVASE'])); 
                    $PTUSUARIO->__SET('MERECEPCION', isset($_REQUEST['MERECEPCION'])); 
                    $PTUSUARIO->__SET('MEDESPACHO', isset($_REQUEST['MEDESPACHO'])); 
                    $PTUSUARIO->__SET('MEGUIA', isset($_REQUEST['MEGUIA'])); 
                    $PTUSUARIO->__SET('MADMINISTRACION', isset($_REQUEST['MADMINISTRACION'])); 
                    $PTUSUARIO->__SET('MAOC', isset($_REQUEST['MAOC'])); 
                    $PTUSUARIO->__SET('MAOCAR', isset($_REQUEST['MAOCAR']));                     
                    $PTUSUARIO->__SET('MKARDEX', isset($_REQUEST['MKARDEX'])); 
                    $PTUSUARIO->__SET('MKMATERIAL', isset($_REQUEST['MKMATERIAL'])); 
                    $PTUSUARIO->__SET('MKENVASE', isset($_REQUEST['MKENVASE'])); 
                    $PTUSUARIO->__SET('EXPORTADORA', isset($_REQUEST['EXPORTADORA'])); 
                    $PTUSUARIO->__SET('EMATERIALES', isset($_REQUEST['EMATERIALES'])); 
                    $PTUSUARIO->__SET('EEXPORTACION', isset($_REQUEST['EEXPORTACION'])); 
                    $PTUSUARIO->__SET('ELIQUIDACION', isset($_REQUEST['ELIQUIDACION']));  
                    $PTUSUARIO->__SET('EPAGO', isset($_REQUEST['EPAGO']));  
                    $PTUSUARIO->__SET('EFRUTA', isset($_REQUEST['EFRUTA'])); 
                    $PTUSUARIO->__SET('EFCICARGA', isset($_REQUEST['EFCICARGA']));                     
                    $PTUSUARIO->__SET('EINFORMES', isset($_REQUEST['EINFORMES'])); 
                    $PTUSUARIO->__SET('ESTADISTICA', isset($_REQUEST['ESTADISTICA']));  
                    $PTUSUARIO->__SET('ESTARVSP', isset($_REQUEST['ESTARVSP']));  
                    $PTUSUARIO->__SET('ESTASTOPMP', isset($_REQUEST['ESTASTOPMP']));  
                    $PTUSUARIO->__SET('ESTAINFORME', isset($_REQUEST['ESTAINFORME']));  
                    $PTUSUARIO->__SET('ESTAEXISTENCIA', isset($_REQUEST['ESTAEXISTENCIA']));  
                    $PTUSUARIO->__SET('ESTAPRODUCTOR', isset($_REQUEST['ESTAPRODUCTOR']));
                    $PTUSUARIO->__SET('MANTENEDORES', isset($_REQUEST['MANTENEDORES'])); 
                    $PTUSUARIO->__SET('MREGISTRO', isset($_REQUEST['MREGISTRO'])); 
                    $PTUSUARIO->__SET('MEDITAR', isset($_REQUEST['MEDITAR'])); 
                    $PTUSUARIO->__SET('MVER', isset($_REQUEST['MVER'])); 
                    $PTUSUARIO->__SET('MAGRUPADO', isset($_REQUEST['MAGRUPADO'])); 
                    $PTUSUARIO->__SET('ADMINISTRADOR', isset($_REQUEST['ADMINISTRADOR']));
                    $PTUSUARIO->__SET('ADUSUARIO', isset($_REQUEST['ADUSUARIO']));
                    $PTUSUARIO->__SET('ADAPERTURA', isset($_REQUEST['ADAPERTURA']));
                    $PTUSUARIO->__SET('ADAVISO', isset($_REQUEST['ADAVISO']));
                    $PTUSUARIO->__SET('ID_USUARIOI', $IDUSUARIOS); 
                    $PTUSUARIO->__SET('ID_USUARIOM', $IDUSUARIOS); 
                    $PTUSUARIO->__SET('ID_TUSUARIO', $_REQUEST['TUSUARIO']); 
                    //LLAMADA AL METODO DE REGISTRO DEL CONTROLADOR
                    $PTUSUARIO_ADO->agregarPtusuario($PTUSUARIO);
                   
                    $AUSUARIO_ADO->agregarAusuario2("NULL",3,1,"".$_SESSION["NOMBRE_USUARIO"].", Registro de Privilegio.","usuario_ptusuario","NULL",$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );           
                   

                    //REDIRECCIONAR A PAGINA registroPtusuario.php                    
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title:"Registro Creado",
                            text:"El registro de Privilegio se ha creado correctamente",
                            showConfirmButton: true,
                            confirmButtonText:"Cerrar",
                            closeOnConfirm:false
                        }).then((result)=>{
                            location.href = "registroPtusuario.php";                            
                        })
                    </script>';
                }
            }
            //OPERACION EDICION DE FILA
            if (isset($_REQUEST['EDITAR'])) {
                //UTILIZACION METODOS SET DEL MODELO
                //SETEO DE ATRIBUTOS DE LA CLASE, OBTENIDO EN EL FORMULARIO  
                $PTUSUARIO->__SET('FRUTA', isset($_REQUEST['FRUTA'])); 
                $PTUSUARIO->__SET('FAVISO', isset($_REQUEST['FAVISO']));  
                $PTUSUARIO->__SET('FRABIERTO', isset($_REQUEST['FRABIERTO'])); 
                $PTUSUARIO->__SET('FGRANEL', isset($_REQUEST['FGRANEL'])); 
                $PTUSUARIO->__SET('FGRECEPCION', isset($_REQUEST['FGRECEPCION'])); 
                $PTUSUARIO->__SET('FGDESPACHO', isset($_REQUEST['FGDESPACHO'])); 
                $PTUSUARIO->__SET('FGGUIA', isset($_REQUEST['FGGUIA'])); 
                $PTUSUARIO->__SET('FPACKING', isset($_REQUEST['FPACKING'])); 
                $PTUSUARIO->__SET('FPPROCESO', isset($_REQUEST['FPPROCESO'])); 
                $PTUSUARIO->__SET('FPREEMBALEJE', isset($_REQUEST['FPREEMBALEJE'])); 
                $PTUSUARIO->__SET('FSAG', isset($_REQUEST['FSAG'])); 
                $PTUSUARIO->__SET('FSAGINSPECCION', isset($_REQUEST['FSAGINSPECCION'])); 
                $PTUSUARIO->__SET('FFRIGORIFICO', isset($_REQUEST['FFRIGORIFICO'])); 
                $PTUSUARIO->__SET('FFRECEPCION', isset($_REQUEST['FFRECEPCION'])); 
                $PTUSUARIO->__SET('FFRDESPACHO', isset($_REQUEST['FFRDESPACHO'])); 
                $PTUSUARIO->__SET('FFRGUIA', isset($_REQUEST['FFRGUIA'])); 
                $PTUSUARIO->__SET('FFRREPALETIZAJE', isset($_REQUEST['FFRREPALETIZAJE'])); 
                $PTUSUARIO->__SET('FFRPC', isset($_REQUEST['FFRPC'])); 
                $PTUSUARIO->__SET('FFRCFOLIO', isset($_REQUEST['FFRCFOLIO']));                   
                $PTUSUARIO->__SET('FCFRUTA', isset($_REQUEST['FCFRUTA'])); 
                $PTUSUARIO->__SET('FCFRECHAZO', isset($_REQUEST['FCFRECHAZO'])); 
                $PTUSUARIO->__SET('FCFLEVANTAMIENTO', isset($_REQUEST['FCFLEVANTAMIENTO'])); 
                $PTUSUARIO->__SET('FEXISTENCIA', isset($_REQUEST['FEXISTENCIA']));   
                $PTUSUARIO->__SET('MATERIALES', isset($_REQUEST['MATERIALES']));       
                $PTUSUARIO->__SET('MRABIERTO', isset($_REQUEST['MRABIERTO'])); 
                $PTUSUARIO->__SET('MMATERIALES', isset($_REQUEST['MMATERIALES'])); 
                $PTUSUARIO->__SET('MMRECEPION', isset($_REQUEST['MMRECEPION'])); 
                $PTUSUARIO->__SET('MMDEAPCHO', isset($_REQUEST['MMDEAPCHO'])); 
                $PTUSUARIO->__SET('MMGUIA', isset($_REQUEST['MMGUIA']));                     
                $PTUSUARIO->__SET('MENVASE', isset($_REQUEST['MENVASE'])); 
                $PTUSUARIO->__SET('MERECEPCION', isset($_REQUEST['MERECEPCION'])); 
                $PTUSUARIO->__SET('MEDESPACHO', isset($_REQUEST['MEDESPACHO'])); 
                $PTUSUARIO->__SET('MEGUIA', isset($_REQUEST['MEGUIA'])); 
                $PTUSUARIO->__SET('MADMINISTRACION', isset($_REQUEST['MADMINISTRACION'])); 
                $PTUSUARIO->__SET('MAOC', isset($_REQUEST['MAOC'])); 
                $PTUSUARIO->__SET('MAOCAR', isset($_REQUEST['MAOCAR']));                     
                $PTUSUARIO->__SET('MKARDEX', isset($_REQUEST['MKARDEX'])); 
                $PTUSUARIO->__SET('MKMATERIAL', isset($_REQUEST['MKMATERIAL'])); 
                $PTUSUARIO->__SET('MKENVASE', isset($_REQUEST['MKENVASE'])); 
                $PTUSUARIO->__SET('EXPORTADORA', isset($_REQUEST['EXPORTADORA'])); 
                $PTUSUARIO->__SET('EMATERIALES', isset($_REQUEST['EMATERIALES'])); 
                $PTUSUARIO->__SET('EEXPORTACION', isset($_REQUEST['EEXPORTACION'])); 
                $PTUSUARIO->__SET('ELIQUIDACION', isset($_REQUEST['ELIQUIDACION'])); 
                $PTUSUARIO->__SET('EPAGO', isset($_REQUEST['EPAGO']));  
                $PTUSUARIO->__SET('EFRUTA', isset($_REQUEST['EFRUTA'])); 
                $PTUSUARIO->__SET('EFCICARGA', isset($_REQUEST['EFCICARGA'])); 
                $PTUSUARIO->__SET('EINFORMES', isset($_REQUEST['EINFORMES'])); 
                $PTUSUARIO->__SET('ESTADISTICA', isset($_REQUEST['ESTADISTICA']));  
                $PTUSUARIO->__SET('ESTARVSP', isset($_REQUEST['ESTARVSP']));  
                $PTUSUARIO->__SET('ESTASTOPMP', isset($_REQUEST['ESTASTOPMP']));  
                $PTUSUARIO->__SET('ESTAINFORME', isset($_REQUEST['ESTAINFORME']));  
                $PTUSUARIO->__SET('ESTAEXISTENCIA', isset($_REQUEST['ESTAEXISTENCIA']));  
                $PTUSUARIO->__SET('ESTAPRODUCTOR', isset($_REQUEST['ESTAPRODUCTOR']));
                $PTUSUARIO->__SET('MANTENEDORES', isset($_REQUEST['MANTENEDORES'])); 
                $PTUSUARIO->__SET('MREGISTRO', isset($_REQUEST['MREGISTRO'])); 
                $PTUSUARIO->__SET('MEDITAR', isset($_REQUEST['MEDITAR'])); 
                $PTUSUARIO->__SET('MVER', isset($_REQUEST['MVER'])); 
                $PTUSUARIO->__SET('MAGRUPADO', isset($_REQUEST['MAGRUPADO'])); 
                $PTUSUARIO->__SET('ADMINISTRADOR', isset($_REQUEST['ADMINISTRADOR']));
                $PTUSUARIO->__SET('ADUSUARIO', isset($_REQUEST['ADUSUARIO']));
                $PTUSUARIO->__SET('ADAPERTURA', isset($_REQUEST['ADAPERTURA']));
                $PTUSUARIO->__SET('ADAVISO', isset($_REQUEST['ADAVISO']));
                $PTUSUARIO->__SET('ID_USUARIOM', $IDUSUARIOS);  
                $PTUSUARIO->__SET('ID_PTUSUARIO', $_REQUEST['ID']);
                //LLAMADA AL METODO DE EDICION DEL CONTROLADOR
                $PTUSUARIO_ADO->actualizarPtusuario($PTUSUARIO);
                
                $AUSUARIO_ADO->agregarAusuario2("NULL",3,2,"".$_SESSION["NOMBRE_USUARIO"].", Modificación de Privilegio.","usuario_ptusuario", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );     

                //REDIRECCIONAR A PAGINA registroPtusuario.php                              
                echo '<script>
                    Swal.fire({
                        icon:"info",
                        title:"Registro Modificado",
                        text:"El registro de Privilegio se ha modificado correctamente",
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPtusuario.php";                            
                    })
                    </script>';
            }
            
            
            if (isset($_REQUEST['ELIMINAR'])) {

                

                $PTUSUARIO->__SET('ID_PTUSUARIO', $_REQUEST['ID']);
                $PTUSUARIO_ADO->deshabilitar($PTUSUARIO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,4,"".$_SESSION["NOMBRE_USUARIO"].", Deshabilitar  Privilegio.","usuario_ptusuario", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                
                
                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"Registro Modificado",
                        text:"El registro de Privilegio se ha Deshabilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPtusuario.php";                            
                    })
                </script>';
            }
            
            if (isset($_REQUEST['HABILITAR'])) {

                $PTUSUARIO->__SET('ID_PTUSUARIO', $_REQUEST['ID']);
                $PTUSUARIO_ADO->habilitar($PTUSUARIO);

                $AUSUARIO_ADO->agregarAusuario2("NULL",3,5,"".$_SESSION["NOMBRE_USUARIO"].", Habilitar Privilegio.","usuario_ptusuario", $_REQUEST['ID'],$_SESSION["ID_USUARIO"],$_SESSION['ID_EMPRESA'],'NULL',$_SESSION['ID_TEMPORADA'] );                               

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"Registro Modificado",
                        text:"El registro de Privilegio se ha Habilitado correctamente", 
                        showConfirmButton: true,
                        confirmButtonText:"Cerrar",
                        closeOnConfirm:false
                    }).then((result)=>{
                        location.href = "registroPtusuario.php";                            
                    })
                </script>';
            }
    
    ?>
</body>
</html>