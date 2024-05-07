<?php

error_reporting(0);
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
include_once('../../Connections/config.php');
date_default_timezone_set('America/Chihuahua');
if ($_POST['respuestaObj'] ) {
    
    
    $serializedData = $_POST['respuestaObj'];
    $part_enc = $_POST['valorEnc'];
    $municipio = $_POST['municipio'];
    $clave = $_POST['clave'];
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
        $horaActual = date("H:i:s");
        if (is_array($respuesta)) {
            $respuesta = implode(', ', $respuesta);
        } 
        
        // echo '----------------------------------------';
            $sql = "INSERT INTO respuestas_tb (resp_user, resp_name, resp_id_preg, resp_id_muni, resp_id_part, resp_fecha_reg, resp_clave, resp_hora) 
        VALUES 
        ('$user','$respuesta', '$preg', '$municipio', '$part_enc', '$fechaActual', '$clave', '$horaActual'); ";
 
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

// echo 'v drhjszkm';
if ($_POST['hotel'] == true) {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $muni = $_POST['municipio'];

    $query_rsHotel = sprintf("SELECT * FROM hoteles_tb WHERE hotel_muni_id = $muni ORDER BY hotel_id ASC");
    $rsHotel = mysqli_query($GLOBALS['connectMySql'],$query_rsHotel);
    $row_rsHotel = mysqli_fetch_assoc($rsHotel);
    $totalRows_rsHotel = mysqli_num_rows($rsHotel);
    $hoteles = array();
    if ($totalRows_rsHotel > 0) {
        do{ 
            array_push($hoteles, array(
                'id' => $row_rsHotel['hotel_id'],
                'lat' => $row_rsHotel['hotel_latitud'],
                'lon' => $row_rsHotel['hotel_longitud'],
                'hotel' => $row_rsHotel['hotel_name'] 
            ));
        } while ($row_rsHotel = mysqli_fetch_assoc($rsHotel));
        
        print_r(json_encode($hoteles));
        exit;
        
    }else if($totalRows_rsHotel == 0) {
        exit;
    }
}
?>