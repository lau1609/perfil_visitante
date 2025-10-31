<?php
// ini_set("display_errors",1);
// error_reporting(E_ALL);	
// var_dump($_GET);
// echo 'entro al php';

// Ajustar el tiempo de vida de la sesión a 2 semanas (1209600 segundos)
error_reporting(0);
$session_lifetime = 1209600; // 2 semanas en segundos

ini_set('session.gc_maxlifetime', $session_lifetime);
session_set_cookie_params([
    'lifetime' => $session_lifetime,
    'path' => '/',
    'domain' => '', 
    'secure' => isset($_SERVER['HTTP']), // true si se usa HTTPS
    'httponly' => true,
    'samesite' => 'Lax' // Puede ser 'Strict' o 'None'
]);

session_name('_user');
session_start();
include_once("../../Connections/config.php");
if ($_GET['method'] == 'validate_session') {
    if (isset($_SESSION['EC_Username'])) {
        validate_userPass($_SESSION['EC_Username'], $_SESSION['EC_Password']);
    } else {
        validate_userPass($_POST['login_user'], sha1($_POST['login_password']));
    }
}
$array = Array();

function validate_userPass($loginUsername, $password) {
    global $connectMySql;
    $loginUsername = mysqli_real_escape_string($connectMySql, $loginUsername);
    $password = mysqli_real_escape_string($connectMySql, $password);

    $LoginRS__query = sprintf("SELECT id_usenc, name_usenc, contra_usenc FROM users_enc_tab WHERE name_usenc = '%s' AND contra_usenc = '%s' AND stat_usenc = 1", $loginUsername, $password);
    $LoginRS = mysqli_query($connectMySql, $LoginRS__query);
    $loginFoundUser = mysqli_num_rows($LoginRS);
    $loginData = mysqli_fetch_assoc($LoginRS);

    if ($loginFoundUser) {
        $_SESSION['EC_Username'] = $loginUsername;
        $_SESSION['EC_Password'] = $password;
        $sessionData = array($loginUsername, $password, $loginData['id_usenc']);
        $array =  array(
            'stat' => $sessionData
        );
        echo json_encode($array);
        exit;
    } else {
      $array =  array(
            'stat' => 'unsuccessful'
        );
        print_r(json_encode($array));
    }
}
?>