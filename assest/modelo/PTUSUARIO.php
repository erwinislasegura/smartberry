<?php
/*
* MODELO DE CLASE DE LA ENTIDAD  PTUSUARIO
 */

 //ESTRUCTURA DE LA CLASE
class PTUSUARIO {
    
    //ATRIBUTOS DE LA CLASE
    private	$ID_PTUSUARIO;    
    //privilegios de sistema fruta
    private $FRUTA;
    private $FAVISO;
    private $FRABIERTO;
    //granel
    private $FGRANEL;
    private $FGRECEPCION;
    private $FGDESPACHO;
    private $FGGUIA;
    //packing
    private $FPACKING;
    private $FPPROCESO;
    private $FPREEMBALEJE;
    //sag
    private $FSAG;
    private $FSAGINSPECCION;
    //frigorifoco
    private $FFRIGORIFICO;
    private $FFRECEPCION;
    private $FFRDESPACHO;
    private $FFRGUIA;
    private $FFRREPALETIZAJE;
    private $FFRPC;
    private $FFRCFOLIO;
    //calidad de fruta
    private $FCFRUTA;
    private $FCFRECHAZO;
    private $FCFLEVANTAMIENTO;
    //existencia
    private $FEXISTENCIA;
    //privilegios de sistema materiales
    private $MATERIALES;
    private $MRABIERTO;
    //materiales
    private $MMATERIALES;
    private $MMRECEPION;
    private $MMDEAPCHO;
    private $MMGUIA;
    //envases
    private $MENVASE;
    private $MERECEPCION;
    private $MEDESPACHO;
    private $MEGUIA;
    // administrción
    private $MADMINISTRACION;
    private $MAOC;
    private $MAOCAR;
    //kardex
    private $MKARDEX;
    private $MKMATERIAL;
    private $MKENVASE;
    //privilegios de sistema exportadora
    private $EXPORTADORA;
    private $EMATERIALES;
    private $EEXPORTACION;
    private $ELIQUIDACION;
    private $EPAGO;
    private $EFRUTA;
    private $EFCICARGA;
    private $EINFORMES;
    //privilegios de mantenedores sitemas
    private $MANTENEDORES;
    private $MREGISTRO;
    private $MEDITAR;
    private $MVER;
    private $MAGRUPADO;    
    //privilegios del administrador
    private $ADMINISTRADOR;
    private $ADUSUARIO;
    private $ADAPERTURA;
    private $ADAVISO;
    //estadistica
    private $ESTADISTICA;
    private $ESTARVSP;
    private $ESTASTOPMP;
    private $ESTAINFORME;
    private $ESTAEXISTENCIA;
    private $ESTAPRODUCTOR;
    //datos de ingresos
    private $INGRESO; 
    private $MODIFICACION; 
    private $ESTADO_REGISTRO; 
    private	$ID_TUSUARIO;
    private	$ID_USUARIOI;
    private	$ID_USUARIOM;
    
    //FUNCIONES GET Y SET
    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}
?>