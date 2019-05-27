# prueba_videotienda
Proyecto para presentación de prueba técnica integ.ro

+ Modulo Usuarios:
    Permite la administración de usuarios que se conectan el sistema
+ Modulo peliculas:
    Permite la administracion de las diferentes peliculas almacenadas en la base de datos

Construido con el framework CodeIgniter Version 3.1.10

# Requisitos para el funcionamiento del sitio
+ PHP Version 7.2
+ Myslq Version 5.7.26
+ Conexion a repositorios https://use.fontawesome.com/releases/v5.8.2/css/all.css

# Instalacion
+ Clonar el repositorio https://github.com/SoulHarry/prueba_videotienda.git
+ En la ruta destinada por el servidor XAMPP, WAMPP
+ /var/html/www/ 
+ C:/wamp/www/

Crear una copia de la base de datos ubicada en la ruta prueba_videotienda/database/prueba_videotienda.sql

1. Configuración del archivo application/config/config.php

En la linea 26, configurar la URL del sitio

````bash
$config['base_url'] = 'http://localhost/prueba_videotienda';
````

2. Configuración del archivo application/config/databse.php

Configurar la información de la conexion, Servidor, usuario de base de datos, contraseña de acceso al servidor, nombre de la base de datos

`````bash
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost', <Servidor>
	'username' => 'root',      < Usuario de conexion a la base de datos>
	'password' => '',           <Contraseña de acceso al servidor de base de datos>
	'database' => 'prueba_videotienda', <Nombre de la base de datos>
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);

`````

# Inicio de sesion en el sitio

Dentro de la base de datos ya se encuentra un usuario para el ingreso al sitio

`````bash
Usuario: Administrador
Constraseña: Adm1nistrad0r*
`````


