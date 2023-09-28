<?php


function formatearFecha ($fecha)
{
    /* 2023-06-02 16:01:21 */
    $dia=substr($fecha,8,2);
    $mes=substr($fecha,5,2);
    $anio=substr($fecha,0,4);
    $hora=substr($fecha,11,5);

    $fechaformateada=$dia."-".$mes."-".$anio."-".$hora;
    return $fechaformateada;
}

function mensajeLogin($msg)
{
        switch ($msg) {
            case '1':
				$mensaje='<p style="text-shadow: none;" class="text-success font-weight-bold">Gracias por usar el sistema!</p>';
                break;

            case '2':
				$mensaje='<p style="text-shadow: none;" class="text-danger font-weight-bold">Usuario u contraseña incorrecta</p>';
                break;

            case '3':
				$mensaje='<p style="text-shadow: none;" class="text-danger font-weight-bold">Acceso no valido - favor inicie sesión</p>';
                break;

            default:
                $mensaje="";
                break;
        }
        return $mensaje;
}


?>