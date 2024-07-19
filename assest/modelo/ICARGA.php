<?php
/*
    * MODELO DE CLASE DE LA ENTIDAD  PLANTA
    */
    require_once '../../assest/config/BDCONFIG.php';

//ESTRUCTURA DE LA CLASE
class ICARGA
{

    //ATRIBUTOS DE LA CLASE    
    private      $ID_ICARGA;
    private      $NUMERO_ICARGA;
    private      $FECHA_ICARGA;
    private      $BOOKING_ICARGA;
    private      $FECHA_INGRESO;
    private      $FECHA_MODIFCIACION;
    private      $FECHAETD_ICARGA;
    private      $FECHAETA_ICARGA;
    private      $FECHAETAREAL_ICARGA;
    private      $FDA_ICARGA;
    private      $TEMBARQUE_ICARGA;
    private      $NCONTENEDOR_ICARGA;
    private      $CRT_ICARGA;
    private      $NVIAJE_ICARGA;
    private      $NAVE_ICARGA;
    private      $FECHASTACKING_ICARGA;
    private      $FUMIGADO_ICARGA;
    private      $T_ICARGA;
    private      $O2_ICARGA;
    private      $C02_ICARGA;
    private      $ALAMPA_ICARGA;
    private      $DUS_ICARGA;
    private      $BOLAWBCRT_ICARGA;
    private      $NETO_ICARGA;
    private      $REBATE_ICARGA;
    private      $PUBLICA_ICARGA;
    private      $FECHA_CDOCUMENTAL_ICARGA;
    private      $OBSERVACION_ICARGA;
    private      $OBSERVACIONI_ICARGA;
    private      $NREFERENCIA_ICARGA;
    private      $TOTAL_ENVASE_ICAGRA;
    private      $TOTAL_NETO_ICARGA;
    private      $TOTAL_BRUTO_ICARGA;
    private      $TOTAL_US_ICARGA;
    private      $LIQUIDACION;
    private      $PAGO;
    private      $ESTADO;
    private      $ESTADO_ICARGA;
    private      $ESTADO_REGISTRO;
    private      $ID_EXPPORTADORA;
    private      $ID_CONSIGNATARIO;
    private      $ID_NOTIFICADOR;
    private      $ID_BROKER;
    private      $ID_RFINAL;
    private      $ID_MERCADO;
    private      $ID_AADUANA;
    private      $ID_AGCARGA;
    private      $ID_DFINAL;
    private      $ID_TRANSPORTE;
    private      $ID_TVEHICULO;
    private      $ID_LCARGA;
    private      $ID_LDESTINO;
    private      $ID_LAREA;
    private      $ID_ACARGA;
    private      $ID_ADESTINO;
    private      $ID_NAVIERA;
    private      $ID_PCARGA;
    private      $ID_PDESTINO;
    private      $ID_FPAGO;
    private      $ID_CVENTA;
    private      $ID_MVENTA;
    private      $ID_TCONTENEDOR;
    private      $ID_ATMOSFERA;
    private      $ID_TFLETE;
    private      $ID_SEGURO;
    private      $ID_PAIS;
    private      $ID_EMPRESA;
    private      $ID_PLANTA;
    private      $ID_TEMPORADA;


    //FUNCIONES GET Y SET
    public function __GET($k)
    {
        return $this->$k;
    }
    public function __SET($k, $v)
    {
        return $this->$k = $v;
    }

    static public function mdlGetInstructivoCarga($id)
    {
        $stmt = BDCONFIG::conectar()->prepare("SELECT * FROM fruta_icarga WHERE ID_ICARGA = :icarga");
        $stmt->bindParam(":icarga",$id, PDO::PARAM_STR);
        $stmt->execute();

        $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $retorno;
    }
}
