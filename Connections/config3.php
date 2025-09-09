<?php

# Connect MySQL
$server_source = "local"; // 'local' or 'remote'

$hostname_connectMySql = "localhost";

if($server_source == 'local'):
    $database_connectMySql = "sichitur_bd";
    $username_connectMySql = "rootSic";
    $password_connectMySql = "sichitur.2023";
    else:
    $database_connectMySql = "u960560109_sichitur_bd";
    $username_connectMySql = "u960560109_userSic";
    $password_connectMySql = "Sichitur.2023";
endif;

// echo  $database_connectMySql, $username_connectMySql, $password_connectMySql;

$connectMySql = new mysqli($hostname_connectMySql, $username_connectMySql, $password_connectMySql, $database_connectMySql);

// var_dump($connectMySql);
// var_dump($connectMySql);

if (mysqli_connect_errno()) {
    printf("Conexi&oacute;n fallida: %s\n", mysqli_connect_error());
    exit();
}

$GLOBALS['connectMySql'] = $connectMySql;
$GLOBALS['thisDomain'] = 'http://testgoogle.free.nf/';
mysqli_query($connectMySql,"SET NAMES 'utf8'");
mysqli_query($connectMySql,"SET lc_time_names = 'es_MX'");

// Zona: México
setlocale(LC_TIME, 'es_MX');
?>