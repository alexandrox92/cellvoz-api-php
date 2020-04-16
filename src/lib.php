<?php

function envia_sms($telefono,$mensaje,$debug)
{
$indicativos = array("300","301","302","303","304","305","310","311","312","313","314","315","316","317","318","319","320","321","322","323","350","351");
$indicativo_cliente=substr($telefono,0,3);

if(strlen($telefono) == 10)
  { 
if (in_array($indicativo_cliente, $indicativos)) 
{

  $account=$GLOBALS["account"];
  $api_key=$GLOBALS["api_key"];
  $password=$GLOBALS["password"];
  $api_numero_telefono='57'.$telefono;
  $api_mensaje_texto=$mensaje; 
/***********************************************************************/

$fullurl = "https://api.cellvoz.co/v2/auth/login";

$headers = array(
    "Content-Type: application/json",
);

$post_params = array(
    "api_key" => $api_key,
    "account" => $account,
	"password" => $password,
    "Content-type: application/json",
);
$post_params = json_encode($post_params);

$curl = curl_init($fullurl);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_params);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_VERBOSE, 1);

$response = curl_exec($curl);
$respuesta_final_autentificacion=json_decode($response, true);
$token_autentificacion=$respuesta_final_autentificacion['token'];

/********************************************************************/
$fullurl = "https://api.cellvoz.co/v2/sms/single";

$headers = array(
	"api-key: ".$api_key,
    "Authorization: Bearer ".$token_autentificacion,
    "Content-Type: application/json",
);

$post_params = array(
	"number" => $api_numero_telefono,
	"message" => $api_mensaje_texto,
    "Content-type: application/json",
);
$post_params = json_encode($post_params);

$curl = curl_init($fullurl);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_params);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_VERBOSE, 1);

$response = curl_exec($curl);
$respuesta_final_envio=json_decode($response, true);
$mensaje_enviado=$respuesta_final_envio['success'];
/********************************************************************/

if($mensaje_enviado == 1) { $er="Mensaje Enviado"; } else { $er="Mensaje No Enviado"; }

}
else
{
$er="El indicativo del telefono celular no esta permitido";
}
  }
  else
  {
   $er="La longitud del telefono celular no concuerda con un numero valido";
  }

if($debug == true)
	{ 
		echo '<pre>';print_r($respuesta_final_autentificacion);echo '</pre>';
		echo '<pre>';print_r($respuesta_final_envio);echo '</pre>';
		echo $er;
	}
}

?>
