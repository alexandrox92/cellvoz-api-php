# Envio de SMS desde api 2.0 de CELLVOZ usando php
Libreria para envio de SMS con API 2.0 de CellVoz (www.cellvoz.com)

Libreria para el envio de SMS desde PHP usando la plataforma de CELLVOZ www.cellvoz.com libreria orientada a integración rapida desde php sin el uso de frameworks molestos 

## Validación y envios mas rapidos 
  - Generación automatica del `bearerAuth` para `Authentication` de la API 2.0 
  - Pre - Validación de longitud de Numero Telefonico
  - Pre - Validación de operador movil dentro de ARRAY permitidos
  - Posibilidad de DEBUG para muestra de posibles fallas
    
## Requisitos 
  - PHP 5.2 o Superior 
  - CURL 

## Ejemplo de uso: 
Solo define las variables necesarias, include la libreria y llama la función, para obtener estas variables es necesario tener una cuenta valida y con saldo en www.cellvoz.com.

```sh
$GLOBALS["password"]="micontraseña1234"; 
$GLOBALS["api_key"]="7ee1b43d8d83c282993a333c76653eb94256e2a9b";  
$GLOBALS["account"]="0046684445";  
require_once('lib.php');
envia_sms("3144566739","Mensaje de prueba con API 2.0 API GITHUB ",TRUE);
```

El Script puede ser adaptado facilmente para llamar variables de configuracion desde base de datos y no con variables GLOBALS, el uso de este script es de libre uso.

Documentación original disponible en http://apidoc.cellvoz.com/ 

Comentarios, Fallas o Mejoras 
----
Envia tus comentarios o fallas a soporte[a]creativos.com.co para poder solucionarlas lo mas pronto posible


License
----
GPL V3
