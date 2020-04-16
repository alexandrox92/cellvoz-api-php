<?php
/*EJEMPLO DE USO DE LIBRERIA */

///// DEFINICION DE VARIABLES PARA CONEXION 
$GLOBALS["password"]="micontraseña1234";   /// Contraseña de tu cuenta en www.cellvoz.com
$GLOBALS["api_key"]="7ee1b43d8d83c282993a333c76653eb94256e2a9b";  /// API KEY generado desde tu panel de cliente
$GLOBALS["account"]="0046684445";  /// ID de usuario de tu cuenta en www.cellvoz.com

require_once('lib.php');

///llamado de la funcion y envio del mensaje 
// Parametro 1 --> Numero de telefono sin codigo de pais
// Parametro 2 --> Mensaje de texto a enviar
// Parametro 3 --> Variable para DEBUG, true mostrara proceso, FALSE enviara el mensaje de forma transparente

envia_sms("3144566739","Mensaje de prueba con API 2.0 API GITHUB ",TRUE);



