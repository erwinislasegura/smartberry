<?php
require_once '../../assest/controlador/Anticipo.php';
require_once '../../assest/modelo/Anticipos.php';


class AjaxAnticipos {
    public $id_detalle_anticipo;

    public function ajaxBorrarDetalle(){
        $tabla = 'detalle_anticipo';
        $item = 'id_detalle_anticipo';
        $valor = $this->id_detalle_anticipo;
        $respuesta = AnticipoController::ctrBorrarDetalleAnticipoAjax($tabla, $item, $valor);
        echo json_encode($respuesta);
    }
}


if (isset($_POST['del_detail'])) {
    $esconderProducto = new AjaxAnticipos();
    $esconderProducto->id_detalle_anticipo = base64_decode($_POST['del_detail']);
    $esconderProducto->ajaxBorrarDetalle();
}