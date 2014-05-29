Salas
=====

App con sistema de registro y login, desarrollada con AngularJS, PHP y MySQL.



Instalación
-----------

Para que el apliactivo funcione de forma correcta, se debe:


1. Cambiar los datos de la base de datos usaurio, clave en el archivo aplicacion/config.inc

2. Restaurar la base de de datos incluída salas.sql

3. un servidor local o remoto debidamente configurado con apache, php5+ y mysql server.


Pueden observar un demo en funcionamiento: [Demo](http://gomosoft.com/salas)


Detalles
--------

Esta apliación es una practica elaborada para probar el modelo de desarrollo que nos permite AngularJS. Está aplicación tiene las siguientes características:


1. Registro de usuarios.

2. Control de acceso de usuarios a determinadas salas a través del número de documento.

3. Registro de las operaciones realizadas por cada usuario (Log: ingreso, salida, registro).

4. Control de tiempo de permanencia dentro de una sala. 


Las sala se refiere a un espacio reservado para un grupo de usuarios, este espacio puede ser usado con afines varios, queda a la imaginación de cada quien.


Proposito
---------

La idea es promover el entendimiento de como funciona AngularJS, también como la podemos usar para construir aplicaciones MVC desde el frontend al backend. 