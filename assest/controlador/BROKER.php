<?php

include_once '../../assest/modelo/BROKER.php';

class BrokerController {

    static public function ctrIndexBroker($empresa){
        $tabla = 'fruta_broker';
        $item = 'ID_EMPRESA';
        return BROKER::mdlIndexBroker($tabla, $item, $empresa);
    }

    static public function getBrokerName($id){
        $broker = BROKER::mdlGetBrokerName($id);
        return $broker;
    }

    static public function getBroker($id)
    {
        $broker = BROKER::mdlGetBroker($id);
        return $broker;
    }
}

?>