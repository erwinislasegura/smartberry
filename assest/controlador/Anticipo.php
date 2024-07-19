<?php

class AnticipoController{
    const TABLE_ANTICIPOS = 'liquidacion_anticipo';
    const TABLE_DETALLE_ANTICIPOS = 'detalle_anticipo';
    const MONEDA_PRUEBA = 1;
    const MONEDA_USD = 2;
    const MONEDA_EUR = 3;
    const MONEDA_CLP = 5;

    static public function ctrCrearAnticipo($temporada){
        if(getenv('APP_ENV') == 'local'){
            $prefix = '';
        } else {
            $prefix = '/fvolcanv2';
        }


        if (isset($_POST['id_broker'])) {
            if (preg_match('/^[0-9]+$/', $_POST['id_broker'])) {

                $date = new DateTime('NOW');
                $today = $date->format('Y-m-d');
                $hash = time();

                $datos = [
                    'id_empresa' => $_SESSION['ID_EMPRESA'],
                    'hash' => $hash,
                    'id_broker' => $_POST['id_broker'],
                    'estado_registro' => 1,
                    'estado' => 1,
                    'id_usuario' => $_SESSION['ID_USUARIO'],
                    'id_perfil_usuario' => 1,
                    'id_temporada' => $temporada,
                    'observacion' => $_POST['observacion_anticipo'],
                    'fecha_ingreso' => $today,
                    'fecha_modificacion' => $today,
                ];

                $respuesta = AnticiposModel::mdlCrearAnticipo(self::TABLE_ANTICIPOS,$datos);
                if ($respuesta == 'ok') {
                    echo
                    '<script>
								swal.fire({
									title: "<strong>BIEN HECHO</strong>",
									text: "El anticipo fue creado exitosamente",
									icon: "success"
								}).then((result)=>{
									if(result.value){
										window.location = "'.$prefix.'/exportadora/vista/registroAnticipo.php?hash='.$hash.'";
									}
								});
							</script>';
                } else {
                    echo
                        '<script>
								swal.fire({
									title: "<strong>RAYOS! </strong>",
									text: "Hay un error en la base de datos '.$respuesta.'",
									icon: "error"
								});
							</script>';
                }
            } else {
                echo
                '<script>
						swal.fire({
							title: "<strong>ATENCION</strong>",
							text: "El anticipo no puede estar vacio o contener caracteres especiales",
							icon: "error"
						}).then((result)=>{
							if(result.value){
								window.location = "'.$prefix.'/exportadora/vista/registroAnticipo.php?hash='.$hash.'";
							}
						});
					</script>';
            }
        }
    }

    static public function ctrBuscarAnticipo($hash){
        $item = 'hash';
        $respuesta = AnticiposModel::mdlBuscarAnticipo(self::TABLE_ANTICIPOS,$item,$hash);
        return $respuesta;
    }

    static public function getAnticipo($broker)
    {
        $respuesta = AnticiposModel::getHeaderAnticipo(self::TABLE_ANTICIPOS,$_SESSION['ID_EMPRESA'], $broker, $_SESSION['ID_TEMPORADA']);
        return $respuesta;
    }

    static public function ctrListarAnticipos(){
        $anticipos = AnticiposModel::mdlListarAnticipos(self::TABLE_ANTICIPOS);
        return $anticipos;
    }

    static public function getDetalleAnticipo($valor)
    {
        $item = 'id_anticipo';
        $detalle = AnticiposModel::mdlGetDetalleAnticipo(self::TABLE_DETALLE_ANTICIPOS, $item, $valor);
        return $detalle;
    }
    
    static public function ctrAgregarDetalleAnticipo($hash, $retorno)
    {
        if(getenv('APP_ENV') == 'local'){
            $prefix = '';
        } else {
            $prefix = '/fvolcanv2';
        }

        if (
            isset($_POST['nombre_anticipo'])
        )
        {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombre_anticipo']) &&
                preg_match('/^[0-9]+$/', $_POST['moneda'])
            ) {

                $datos = [
                    'id_anticipo' => $hash,
                    'nombre_anticipo' => $_POST['nombre_anticipo'],
                    'moneda' => $_POST['moneda'],
                    'fecha_anticipo' => $_POST['fecha_anticipo'],
                    'valor_anticipo' => $_POST['valor_anticipo'],
                ];

                $respuesta = AnticiposModel::mdlCrearDetalleAnticipo(self::TABLE_DETALLE_ANTICIPOS,$datos);
                if ($respuesta == 'ok') {
                    echo
                        '<script>
								swal.fire({
									title: "<strong>BIEN HECHO</strong>",
									text: "El detalle de anticipo fue creado exitosamente",
									icon: "success"
								}).then((result)=>{
									if(result.value){
										window.location = "'.$prefix.'/exportadora/vista/registroAnticipo.php?hash='.$retorno.'";
									}
								});
							</script>';
                } else {
                    echo
                        '<script>
								swal.fire({
									title: "<strong>RAYOS! </strong>",
									text: "Hay un error en la base de datos '.$respuesta.'",
									icon: "error"
								});
							</script>';
                }
            } else {
                echo
                '<script>
						swal.fire({
							title: "<strong>ATENCION</strong>",
							text: "El detalle de anticipo no puede estar vacio o contener caracteres especiales",
							icon: "error"
						}).then((result)=>{
							if(result.value){
								window.location = "'.$prefix.'/exportadora/vista/registroAnticipo.php?hash='.$retorno.'";
							}
						});
					</script>';
            }
        }
    }

    static public function ctrGetSumaAnticipos($anticipo)
    {
        $item = 'valor_anticipo';
        $suma = AnticiposModel::mdlGetSumaAnticipos(self::TABLE_DETALLE_ANTICIPOS, $item, $anticipo);
        return $suma;
    }

    static public function ctrBorrarDetalleAnticipoAjax($tabla, $item, $valor)
    {
        $borrar_detalle = AnticiposModel::mdlEliminarAnticipoAjax($tabla, $item, $valor);

    }
}

?>