# Módulo Reviews

Este módulo de Magento consiste en la prueba técnica para Pronovias.

El candidato tendrá que realizar y publicar en GitHub (proyecto abierto a todo el mundo) un módulo de Magento compatible con la última versión 1.9.x CE (Si es compatible con la última 1.14.x EE mejor).
Se trata de un módulo de fidelización que mandará al cliente pasados “N” días de su compra un email con un enlace al Magento desde el cual podrá valorar los siguientes puntos de 0 a 5:
Entrega, producto, atención al cliente.
Además tendrá un campo de freetext en el que podrá poner lo que considere oportuno… ie:
-          Entrega: 5
-          Producto: 5
-          Atención al cliente: 5
-          Comentarios: La atención de diez! El pedido llegó antes de tiempo y es exactamente lo que esperaba.
Por otro lado, el administrador del ecommerce podrá aceptar o denegar las review que deberán aparecer en: http://urldelmagento.dominio/reviews
Se valorará trabajar adecuadamente con saneamientos, traducciones, paginaciones y documentación del código además de la posibilidad de instalarlo con modgit/modman/composer.
Para realizar el ejercicio se dispondrá de una semana natural. El candidato entregará la URL del proyecto en el cual deberá aparecer la información necesaria para su instalación.

# Instalación

Para instalar el módulo hay que copiar los archivos y pegarlos en el archivo raíz del proyecto. Una vez pegados hay que borrar la caché.

# Manual

Dentro del Backoffice aparecerá en el menú la opción Agil -> Reviews, en dónde se encuentran todas las reviews realizadas hasta la fecha. En Sistema -> Configuración aparecerá el tab Agil en dónde se podrá modificar el número de días en cuanto se mandará el mail.

Dentro de la opción Agil -> Reviews se podrá aprobar y desaprobar las reviews que se mostrarán en la parte pública, cuando se crea una valoración... esta por defecto aparecerá en el estado desaprobado a la espera de que un administrador la apruebe desde el backoffice.
