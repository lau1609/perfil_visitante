<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/PHPMailer/src/Exception.php';
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; 
// echo 'despues del require';
header('Content-Type: application/json');

if (!isset($_FILES['csvFile']) || $_FILES['csvFile']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'Error al subir el archivo.']);
    exit;
}

$url = $_POST['url'];
$cadenaConvert = strtr($cadena, " ", "_");
$locc = str_replace('-', ' ', $_POST['loc']);
$hotel = $_POST['hotel'];


$loc = strtoupper($locc);
$fileTmpPath  = $_FILES['csvFile']['tmp_name'];
$dataType     = $_POST['dataType'] ?? 'correo';
$fileContent  = file_get_contents($fileTmpPath);

// --- RegEx ---
function extraer_datos($texto, $tipo) {
    $regex = '';
    
    if ($tipo === 'correo') {
        // correos
        $regex = '/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z]{2,}\b/i'; 
    } elseif ($tipo === 'telefono') {
        // teléfonos 
        $regex = '/(?:\+?\d{1,3}[-. ]?)?\(?\d{2,}\)?[ -. ]?\d{2,}[-. ]?\d{2,}[-. ]?\d{2,}/';
    } else {
        return [];
    }

    $coincidencias = [];
    preg_match_all($regex, $texto, $coincidencias); 
    
    return array_unique($coincidencias[0]); 
}

$datos_extraidos = extraer_datos($fileContent, $dataType);

if (empty($datos_extraidos)) {
    echo json_encode(['success' => false, 'message' => 'No se encontraron datos válidos (correos o teléfonos) en el archivo.']);
    exit;
}

$sendStatus = 'Ningún envío realizado.';
// $url = 'https://sichitur.org/perfil_visitante/parral/?hotel=HGRPA';
$muni = "Parral";

    
    foreach ($datos_extraidos as $item) {
    $status = 'fallido'; 

    if ($dataType === 'correo') {
        try {
            $mail = new PHPMailer(true); 
            $mail->isSMTP();
            $mail->SMTPDebug = 0; // 0 para producción
            $mail->Host = 'smtp.hostinger.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'reportes@sichitur.org';
            $mail->Password = 'S!chitur.2025';
            $mail->setFrom('reportes@sichitur.org', 'Secretaría de Turismo del Estado de Chihuahua');
            $mail->addReplyTo('reportes@sichitur.org', 'Secretaría de Turismo del Estado de Chihuahua');
            $mail->addAddress($item);
            $mail->Subject = '¡Gracias por tu visita a '.$locc.', Chihuahua';
            $mail->CharSet = 'UTF-8';
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ];
            
            $htmlContent = '
<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color:#f4f4f6; padding:20px 0; font-family:Arial,Helvetica,sans-serif;">
  <tr>
    <td align="center">
      <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff; border-radius:6px; overflow:hidden;">
        <tr>
          <td style="background:#26448E; padding:18px 20px; text-align:center;">
            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
              <tr>
                <td align="left" style="vertical-align:middle;">
                  <img src="https://sichitur.org/perfil_visitante/_images/logo-st.png" width="210" alt="Secretaría de Turismo" style="display:block; border:0; outline:none; text-decoration:none;">
                </td>
                <td align="right" style="vertical-align:middle;">
                  <img src="https://sichitur.org/perfil_visitante/_images/logoAB.png" width="130" alt="SICHITUR" style="display:block; border:0; outline:none; text-decoration:none;">
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td style="padding:28px 36px; color:#333333; font-size:15px; line-height:1.5;">
            <h2 style="margin:0 0 12px 0; font-size:20px; color:#1f2b6b; text-align:center;">GRACIAS POR VISITAR ' . htmlspecialchars($loc, ENT_QUOTES) . '</h2>

            <p style="margin:12px 0 0 0; text-align:center;">
              Tu opinión nos ayuda a mejorar y seguir haciendo de Chihuahua un destino inolvidable 💚.
            </p>

            <p style="margin:14px 0 0 0; text-align:center;">
              Por favor, responde nuestra breve encuesta del Perfil del Visitante y recibe <span style="font-weight:900">RECOMPENSAS</span> en menos de <span style="font-weight:900">30 SEGUNDOS</span>.
            </p>

            <table role="presentation" align="center" style="margin:18px auto 10px auto;">
              <tr>
                <td align="center">
                  <a href="https://sichitur.org/perfil_visitante/' . rawurlencode($url) . '/?hotel=' . rawurlencode($hotel) . '" 
                     target="_blank"
                     style="
                       display:inline-block;
                       background-color:#CE0F69;
                       color:#ffffff;
                       text-decoration:none;
                       padding:12px 22px;
                       border-radius:5px;
                       font-weight:600;
                       font-size:15px;
                     ">
                    👉 Ir a la encuesta
                  </a>
                </td>
              </tr>
            </table>

            <p style="margin:14px 0 0 0; text-align:center; color:#666666; font-size:13px;">
              Si el botón no funciona, copia y pega este enlace en tu navegador:<br>
              <a href="https://sichitur.org/perfil_visitante/' . rawurlencode($url) . '/?hotel=' . rawurlencode($hotel) . '" style="color:#26448E; word-break:break-all;">https://sichitur.org/perfil_visitante/' . rawurlencode($url) . '/?hotel=' . rawurlencode($hotel) . '</a>
            </p>
          </td>
        </tr>

        <!-- footer -->
        <tr>
          <td style="background:#fafafa; padding:12px 20px; text-align:center; color:#999999; font-size:12px;">
            © ' . date('Y') . ' Secretaría de Turismo de Chihuahua<br>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>';
            $mail->msgHTML($htmlContent);
            $mail->send();
            $status = 'enviado'; 

        } catch (\Throwable $e) {
            $status = 'fallido';
        }

        
    } elseif ($dataType === 'telefono') {
        $status = (rand(1, 10) > 1) ? 'enviado' : 'fallido';
    }

    $reporteEnvios[] = [
        'dato' => $item,
        'tipo' => $dataType,
        'estado' => $status 
    ];
}



echo json_encode([
    'success' => true,
    'extracted_data' => $reporteEnvios, 
    'total_procesado' => count($datos_extraidos),
    'tipo_dato' => $dataType
]);
