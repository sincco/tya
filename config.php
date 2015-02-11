<?php
#/////////////////////////////////
# Configuración de la aplicación
#/////////////////////////////////

#-----------------------
#Constantes del sistema
#-----------------------
define('APP_NAME', 'Tiempo y Asistencia');
define('APP_COMPANY', 'Sincco.com');
define('APP_KEY', 'iqclhu7o8h0zalwk.61fukhdzxbu0jhnx'); #llave de encripcion de datos
define('APP_PROTOCOL', (($_SERVER['SERVER_PORT']==80) ? 'http://' : 'https://'));
define('BASE_URL', APP_PROTOCOL.$_SERVER['SERVER_NAME'].'/tya/'); #URL base para todos los elementos estaticos

#------------------------
#Conexion a DB de la APP
#------------------------
define('DB_HOST', 'localhost');
define('DB_USER', 'renta.tya');
define('DB_PASS', 'Sp9ZGXuV4JQ98XMr');
define('DB_NAME', 'renta.tya');
define('DB_CHAR', 'utf8');
define('DB_MANAGER', 'mysql');

#------------------------------
#Plantilla por default
#------------------------------
define('DEFAULT_TEMPLATE', '');

#------------------------------
#Manejo de seguridad en la APP
#------------------------------
define('SECURITY_ACTIVE', true); #Define si se activa el control de seguridad en la APP
define('SECURITY_CLASS', 'lib_seguridad'); 	#La clase que valida la seguridad de acceso, se extiende de Seguridad
											#...y debe estar alojada en _libs
											#Debe tener, por definicion un metodo llamado Validar_Acceso 
											#y otro Error_Seguridad

#/////////////////////////////////
# Configuración del framework
#/////////////////////////////////

#------------------------------
#Constantes del desarrollador
#------------------------------
define('DEV_SHOWERRORS', TRUE); #muestra pantalla de errores en el sistema
define('DEV_SHOWPHPERRORS', TRUE); #muestra errores de PHP
define('DEV_LOG', TRUE); #escribe un archivo en la carpeta _logs
#-------------------
#Manejo de sesiones
#-------------------
define('SESSION_NAME', 'renta.tya'); #nombre de la sesion
define('SESSION_SSLONLY', FALSE); #si debe conectarse sólo por HTTPS
define('SESSION_INACTIVITY', 60); #tiempo de espera para que la sesion caduque por inactividad
define('SESSION_TYPE', 'db'); #define si las sesiones se manejan en archivo o base de datos file|db
#-------------------
#Error 404
#-------------------
#Si DEV_SHOWERRORS es FALSE, se activa esta pagina para evitar que el usuario vea el log del evento
#(aunque el log se almacena en el archivo)
define('ERROR_404', APP_PROTOCOL.$_SERVER['SERVER_NAME'].'html/404.html');