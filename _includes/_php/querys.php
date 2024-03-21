<?php

error_reporting(0);
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
include_once('../../Connections/config.php');

if ($_POST['respuestaObj'] ) {
    
    
    $serializedData = $_POST['respuestaObj'];
    $part_enc = $_POST['valorEnc'];
    $municipio = $_POST['municipio'];
    $cont = 0; 
    $m = 'mu';
    
    switch ($municipio) {
        case 1:
            $m = 'JU';
            break;
        case 2:
            $m = 'CH';
            break;
        case 3:
            $m = 'GU';
            break;
        case 4:
            $m = 'PL';
            break;   
        case 5:
            $m = 'PA';
            break;
    }

    $user = uniqid($m);
    for ($i=0; $i < count($serializedData) ; $i++) { 
        $preg = $serializedData[$i]['preguntaID'];
        $respuesta = $serializedData[$i]['respuesta'];
        $fechaActual = date("Y-m-d");
        if (is_array($respuesta)) {
            $respuesta = implode(', ', $respuesta);
        } 
        
        // echo '----------------------------------------';
            $sql = "INSERT INTO respuestas_tb (resp_user, resp_name, resp_id_preg, resp_id_muni, resp_id_part, resp_fecha_reg) 
        VALUES 
        ('$user','$respuesta', '$preg', '$municipio', '$part_enc', '$fechaActual'); ";
 
        if (mysqli_query($connectMySql, $sql)) {
            $cont++;
        }
    }

    if ($cont > 1) {
        echo 'success';
    }

    

}


if ($_POST['partEnc'] == true) {
   // echo 'partEnc';
    $muni = $_POST['municipio'];

    $query_rsResp = sprintf("SELECT resp_id_part FROM respuestas_tb WHERE resp_id_muni = $muni AND resp_id_part <> 4  ORDER BY resp_id DESC");
    $rsResp = mysqli_query($GLOBALS['connectMySql'],$query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);

    if ($totalRows_rsResp > 0) {
        
        $ultimaPosicion = end($row_rsResp);
        echo $ultimaPosicion; 
    }else if($totalRows_rsResp == 0) {
        echo 3; 
    }
}
?>