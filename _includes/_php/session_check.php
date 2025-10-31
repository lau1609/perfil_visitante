<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

error_reporting(0);

set_error_handler(function($errno, $errstr, $errfile, $errline) {
    echo json_encode([
        'status' => 'error',
        'message' => "Error en el archivo $errfile en la línea $errline: $errstr"
    ]);
    exit; 
});

set_exception_handler(function($exception) {
    echo json_encode([
        'status' => 'error',
        'message' => "Excepción no controlada: " . $exception->getMessage()
    ]);
    exit;
});

$session_lifetime = 1296000;

ini_set('session.gc_maxlifetime', $session_lifetime);
session_set_cookie_params([
    'lifetime' => $session_lifetime,
    'path' => '/',
    'domain' => '',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax'
]);

if (isset($_POST['emp']) && $_POST['emp'] == true) {
    session_name('_emp');
} else {
    session_name('_user');
}

session_start();

if (!isset($_POST['method'])) {
    echo json_encode(['status' => 'error', 'message' => 'No se recibió el parámetro "method".']);
    exit;
}

if ($_POST['method'] == 'checking_a_session') {
    if (isset($_SESSION['EC_Username'])) {
        echo json_encode(['status' => 'ok', 'user' => $_SESSION['EC_Username']]);
    } else {
        echo json_encode(['status' => 'inactive', 'message' => 'La sesión no está activa']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no válido']);
}
?>
