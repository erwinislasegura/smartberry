<?php

class SUBIR {
    
    
    public function __CONSTRUCT()
    {
     
    }

    public function subirImg($ARCHIVO,$NOMBRENUEVOIMG, $DIRECTORIODESTINON){        
        
        
        //Recogemos el archivo enviado por el formulario
        $ARCHIVORIGEN = $ARCHIVO['name'];
        $NUEVONOMBRE = $NOMBRENUEVOIMG;
        $DIRECTORIODESTINO=$DIRECTORIODESTINON;
        $FORMATO=".png";
        $TAMANOMAXIMO=2048000;
        
        $MENSAJE = [
            'OK' => 'ARCHIBO SUBIDO CORRECTAMENTE.',
            'ERR_INI_SIZE' => 'EL TAMA&ntilde;O DEL ARCHIVO HA SUPERADA EL PERMITIDO',
            'SMS_MAX_SIZE' => 'EL TAMA&ntilde;O MAXIMO PERMITIDO ES DE 2 MB' ,       
            'ERR_EXT' => 'LA EXTENSION DEL ARCHIVO ES INCORRECTA.',
            'SMS_EXT' => 'SE PERMITEN ARCHIVOS .gif, .jpg, .png .jpeg',  
            'ERR_NO_FILE' => 'SE PRODUJO UN ERROR AL SUBIR EL ARCHIVO.',
            'NO_FILE' => 'NO HA SELECIONADO ARCHIVO.',

        ];
        
        $RETORNO=[
            'MENSAJE' =>'',
            'UBICACION' =>'',
            'NOMBREARCHIVO' =>'',        
            'FORMATO' =>'',
            'SRC' =>''
            
        ];
        
        
        //Si el archivo contiene algo y es diferente de vacio
        if (isset($ARCHIVORIGEN) && $ARCHIVORIGEN != "") {
            //Obtenemos algunos datos necesarios sobre el archivo
            $tipo = $ARCHIVO['type'];       
            $tamano = $ARCHIVO['size'];
            $temp = $ARCHIVO['tmp_name'];
            
            
            //Se comprueba si el archivo a cargar es correcto observando su extensi�n y tama�o
            
            if (!($tipo=='image/jpeg' ||$tipo=='image/gif'||$tipo=='image/jpg'||$tipo=='image/png') && $tamano < $TAMANOMAXIMO) {
                
                $RETORNO['MENSAJE']=$MENSAJE['ERR_INI_SIZE'].', '.$MENSAJE['SMS_MAX_SIZE'].' </br> '.$MENSAJE['ERR_EXT'].', '.$MENSAJE['SMS_EXT'].'.' ;
            
                
            }else {
                
                if(strpos($tipo, "gif") ){      
                    $FORMATO=".gif";                
                }elseif (strpos($tipo, "jpeg")){
                    $FORMATO=".png";
                    
                }elseif (strpos($tipo, "jpg")){
                    $FORMATO=".png";
                    
                }elseif (strpos($tipo, "png")){
                    $FORMATO=".png";                
                }
                //Si la imagen es correcta en tama�o y tipo
                //Se intenta subir al servidor
                if (move_uploaded_file($temp,$DIRECTORIODESTINO.$NUEVONOMBRE.$FORMATO)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                    chmod($DIRECTORIODESTINO.$NUEVONOMBRE.$FORMATO, 0777);
                    //Mostramos el mensaje de que se ha subido co �xito
                    
                    $RETORNO['MENSAJE']=$MENSAJE['OK'];
                    $RETORNO['UBICACION']=$DIRECTORIODESTINO;
                    $RETORNO['NOMBREARCHIVO']=$NUEVONOMBRE;
                    $RETORNO['FORMATO']=$FORMATO;    
                    $RETORNO['SRC']='<img src="'.$DIRECTORIODESTINO.$NUEVONOMBRE.$FORMATO.'" width="200px" height="200px">';         
                
                }
                else {
                    //Si no se ha podido subir la imagen, mostramos un mensaje de error
                    $RETORNO['MENSAJE']=$MENSAJE['ERR_NO_FILE'];
                    
                }

            }

        }else{

            $RETORNO['MENSAJE']=$MENSAJE['NO_FILE'];

        }
        
    return $RETORNO;
        

    }




}
?>