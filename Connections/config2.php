<?php

# Connect MySQL
$server_source2 = "local"; // 'local' or 'remote'

$hostname_connectMySql2 = "localhost";

if($server_source2 == 'local'):
$database_connectMySql2 = "codeqr_museum";
$username_connectMySql2 = "user";
$password_connectMySql2 = "root2023";
else:
$database_connectMySql2 = "u960560109_perfil_visitan";
$username_connectMySql2 = "u960560109_user";
$password_connectMySql2 = "Sich¡tur.2024";
endif;

$connectMySql2 = new mysqli($hostname_connectMySql2, $username_connectMySql2, $password_connectMySql2, $database_connectMySql2);

//var_dump($connectMySql);

if (mysqli_connect_errno()) {
    printf("Conexi&oacute;n fallida: %s\n", mysqli_connect_error());
    exit();
}

$GLOBALS['connectMySql2'] = $connectMySql2;
$GLOBALS['thisDomain'] = 'http://apex-trailers.com/sudi';
mysqli_query($connectMySql2,"SET NAMES 'utf8'");
mysqli_query($connectMySql2,"SET lc_time_names = 'es_MX'");

// Zona: México
setlocale(LC_TIME, 'es_MX');


?>