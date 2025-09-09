<?php

error_reporting(0);
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    
include_once('../../Connections/config.php');
// include_once('../../Connections/config2.php');

date_default_timezone_set('America/Chihuahua');

if ($_POST['respuestaObj'] ) {
    
    $serializedData = $_POST['respuestaObj'];
    $serializedData2 = $_POST['respuestaObj2'];
    $part_enc = $_POST['valorEnc'];
    $municipio = $_POST['municipio'];
    //echo $municipio;
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
            $m = 'CG';
            break;
        case 4:
            $m = 'GU';
            break;   
        case 8:
            $m = 'PA';
             break; 
        case 6:
            $m = 'CR';
             break; 
        case 7:
            $m = 'BA';
            break;
    }

    
    $user = uniqid($m);
  
  //  exit;
    for ($i=0; $i < count($serializedData) ; $i++) { 
        $preg = $serializedData[$i]['preguntaID'];
        $respuesta = $serializedData[$i]['respuesta'];
        $fechaActual = date("Y-m-d");
        $fechaActual2  = date("Y-m-d H:i:s");
        $horaActual = date("H:i:s");
        if (is_array($respuesta)) {
            $respuesta = implode(', ', $respuesta);
        } 
        
        // echo '----------------------------------------';
            $sql = "INSERT INTO respuestas_tb (resp_user, resp_name, resp_id_preg, resp_id_muni, resp_id_part, resp_fecha_reg, resp_clave, resp_hora) 
        VALUES 
        ('$user','$respuesta', '$preg', '$municipio', '$part_enc', '$fechaActual', '$clave', '$horaActual'); ";
 
        
//  echo $sql;
        if (mysqli_query($connectMySql, $sql)) {
            $cont++;
            // echo $cont;
        }
    }

    if ($serializedData2[0]['preguntaID'] != 0) {
        $resp = $serializedData2[0]["respuesta"];
        $preg = $serializedData2[0]["preguntaID"];
        $sql = "INSERT INTO resp_abiertas_tb (user_resp,text_resp,id_muni_resp,id_preg_resp,fec_resp,clave_hot_resp)
        VALUES ('$user','$resp', '$municipio', '$preg', '$fechaActual', '$clave'); ";
        if (mysqli_query($connectMySql, $sql)) {
        }
    }

    if ($cont > 1) {
        echo 'success';
    }
}

if ($_POST['addEstab'] == true) {
    $fileTmpPath = $_FILES['upload']['tmp_name'];
    $fileName = $_FILES['upload']['name'];
    $fileSize = $_FILES['upload']['size'];
    $fileType = $_FILES['upload']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $localidad = $_POST['municipio'];
    $name = $_POST['nameEstab'];
    $typEstab = $_POST['typEstab'];
    $typRecom = $_POST['typRecom'];
    $descRecom = $_POST['descRecom'];
    $horEstab = $_POST['horEstab'];
    $dirEstab = $_POST['dirEstab'];
    $urlEstab = $_POST['urlEstab'];
    $correoEstab = $_POST['correoEstab'];
    $today = date("Y-m-d");


    switch ($localidad) {
        case 2:
            $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/generateQR/_images/imgRecom/chihuahua/';
            $uploadFileDir2 = '_images/imgRecom/chihuahua/';
            break;
        case 3:
            $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/generateQR/_images/imgRecom/Casas-Grandes/';
            $uploadFileDir2 = '_images/imgRecom/Casas-Grandes/';
            break;
        case 1:
            $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/generateQR/_images/imgRecom/juarez/';
            $uploadFileDir2 = '_images/imgRecom/juarez/';
            break;
        default:
            break;
    }
    $dest_path = $uploadFileDir . $name . '_' . $today . '.' . $fileExtension;
    $dest_path2 = $uploadFileDir2 . $name . '_' . $today . '.' . $fileExtension;
    if (!is_dir($uploadFileDir)) {
        mkdir($uploadFileDir, 0777, true); 
    }
    if (move_uploaded_file($fileTmpPath, $dest_path)) {
    } else{
         echo 'No cargo el pdf';
            exit;
    }

    $sql = "INSERT INTO museum_register (muse_name, recom_id_est, recom_id_rec, recom_desc, recom_hor, recom_dir, recom_url, muse_img, recom_correo,muse_loc)
        VALUES
        ('$name','$typEstab', '$typRecom', '$descRecom', '$horEstab', '$dirEstab', '$urlEstab', '$dest_path2', '$correoEstab','$localidad'); ";

        if (mysqli_query($connectMySql, $sql)) {
            echo 'successful';
        }else {
            echo 'unsuccessful';
        }
}


if ($_POST['partEnc'] == true) {
   // echo 'partEnc';
    $muni = $_POST['municipio'];

    $query_rsResp = sprintf("SELECT resp_id_part FROM respuestas_tb WHERE resp_id_muni = $muni AND resp_id_part <> 4  ORDER BY resp_id DESC");
    $rsResp = mysqli_query($GLOBALS['connectMySql'],$query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);
    // echo $query_rsResp;

    // echo $totalRows_rsResp;

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
// ini_set("display_errors",1);
// error_reporting(E_ALL);
if ($_POST['opc'] == '2') {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $query_rsHotel = sprintf("SELECT * FROM hoteles_tb ORDER BY hotel_muni_id ASC");
    $rsHotel = mysqli_query($GLOBALS['connectMySql'],$query_rsHotel);
    $row_rsHotel = mysqli_fetch_assoc($rsHotel);
    $totalRows_rsHotel = mysqli_num_rows($rsHotel);

    $hoteles = array();
    if ($totalRows_rsHotel > 0) {
        do{ 
            array_push($hoteles, array(
                'id' => $row_rsHotel['hotel_id'],
                'name' => $row_rsHotel['hotel_name'],
                'clave' => $row_rsHotel['hotel_clave'],
                'muni' => $row_rsHotel['hotel_muni_id'],
                'tel' => $row_rsHotel['hotel_tel'],
                'dir' => $row_rsHotel['hotel_dir'] 
            ));

        } while ($row_rsHotel = mysqli_fetch_assoc($rsHotel));
        
        print_r(json_encode($hoteles));
        exit;
        
    }else if($totalRows_rsHotel == 0) {
        exit;
    }
}

if ($_POST['serial'] == true) {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $serializedData = $_POST['serializedData'];
    parse_str($serializedData, $output);
    $name = isset($output['name']) ? $output['name'] : '';
    $clave = isset($output['clave']) ? $output['clave'] : '';
    $tel = isset($output['tel']) ? $output['tel'] : '';
    $dir = isset($output['dir']) ? $output['dir'] : '';
    $id = isset($output['id']) ? $output['id'] : '';
    $updateOrd= sprintf("
    UPDATE hoteles_tb
    SET hotel_name = '$name', hotel_clave = '$clave', hotel_tel = '$tel', hotel_dir = '$dir'
    WHERE hotel_id = $id;");
    $rsUpOrd = mysqli_query($GLOBALS['connectMySql'],$updateOrd);
    if ($rsUpOrd) {
           echo 'successful';
        exit;
    }else{echo 'unsuccessful';};
}


if ($_POST['reporGen'] == true) {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $resp = array();
    $query_rsQuery = sprintf("SELECT 
                                l.name_loc AS nombre_municipio,
                                COUNT(DISTINCT CASE 
                                    WHEN YEAR(DATE_SUB(r.resp_fecha_reg, INTERVAL 6 HOUR)) = YEAR(CURDATE()) 
                                    THEN r.resp_user 
                                END) AS total_anio,
                                
                                COUNT(DISTINCT CASE 
                                    WHEN YEAR(DATE_SUB(r.resp_fecha_reg, INTERVAL 6 HOUR)) = YEAR(CURDATE()) 
                                    AND MONTH(DATE_SUB(r.resp_fecha_reg, INTERVAL 6 HOUR)) = MONTH(CURDATE()) 
                                    THEN r.resp_user 
                                END) AS total_mes,
                                
                                COUNT(DISTINCT CASE 
                                    WHEN YEARWEEK(DATE_SUB(r.resp_fecha_reg, INTERVAL 6 HOUR), 1) = YEARWEEK(CURDATE(), 1) 
                                    THEN r.resp_user 
                                END) AS total_semana

                            FROM loc_register l
                            LEFT JOIN respuestas_tb r ON r.resp_id_muni = l.id_loc
                            WHERE l.status_loc = 0
                            GROUP BY l.id_loc, l.name_loc
                            ORDER BY l.name_loc;
                            ;");

                            // $query_rsQuery = sprintf("SELECT 
                            //     l.name_loc AS nombre_municipio,
                            //     COUNT(DISTINCT CASE WHEN YEAR(r.resp_fecha_reg) = YEAR(CURDATE()) THEN r.resp_user END) AS total_anio,
                            //     COUNT(DISTINCT CASE WHEN YEAR(r.resp_fecha_reg) = YEAR(CURDATE()) AND MONTH(r.resp_fecha_reg) = MONTH(CURDATE()) THEN r.resp_user END) AS total_mes,
                            //     COUNT(DISTINCT CASE WHEN YEARWEEK(r.resp_fecha_reg, 1) = YEARWEEK(CURDATE(), 1) THEN r.resp_user END) AS total_semana
                            // FROM loc_register l
                            // LEFT JOIN respuestas_tb r ON r.resp_id_muni = l.id_loc
                            // WHERE l.status_loc = 0
                            // GROUP BY l.id_loc, l.name_loc
                            // ORDER BY l.name_loc;");

        $rsQuery = mysqli_query($GLOBALS['connectMySql'],$query_rsQuery);
        $row_rsQuery = mysqli_fetch_assoc($rsQuery);
        $totalRows_rsQuery = mysqli_num_rows($rsQuery);
        // echo $query_rsQuery;
        // var_dump($row_rsQuery);
        if ($totalRows_rsQuery > 0) {
            do{ 
                array_push($resp, array(
                    'name' => $row_rsQuery['nombre_municipio'],
                    'año' => $row_rsQuery['total_anio'],
                    'mes' => $row_rsQuery['total_mes'],
                    'sem' => $row_rsQuery['total_semana']
                ));

            } while ($row_rsQuery = mysqli_fetch_assoc($rsQuery));
        }
        print_r(json_encode($resp));
        exit;
}

if ($_POST['reporte'] == true) {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $muni = $_POST['muni'];
    $query_rsQuery = sprintf("SELECT 
                        COUNT(DISTINCT CASE 
                            WHEN YEAR(DATE_SUB(resp_fecha_reg, INTERVAL 7 HOUR)) = YEAR(DATE_SUB(NOW(), INTERVAL 7 HOUR)) 
                            THEN resp_user 
                        END) AS total_anio,

                        COUNT(DISTINCT CASE 
                            WHEN YEAR(DATE_SUB(resp_fecha_reg, INTERVAL 7 HOUR)) = YEAR(DATE_SUB(NOW(), INTERVAL 7 HOUR)) 
                            AND MONTH(DATE_SUB(resp_fecha_reg, INTERVAL 7 HOUR)) = MONTH(DATE_SUB(NOW(), INTERVAL 7 HOUR)) 
                            THEN resp_user 
                        END) AS total_mes,

                        COUNT(DISTINCT CASE 
                            WHEN YEARWEEK(DATE_SUB(resp_fecha_reg, INTERVAL 7 HOUR), 1) = YEARWEEK(DATE_SUB(NOW(), INTERVAL 7 HOUR), 1) 
                            THEN resp_user 
                        END) AS total_semana,

                        l.name_loc AS nombre_municipio

                    FROM respuestas_tb r
                    JOIN loc_register l ON r.resp_id_muni = l.id_loc
                    WHERE r.resp_id_muni = %s;", $muni);



    // $query_rsQuery = sprintf("SELECT 
    //                             COUNT(DISTINCT CASE WHEN YEAR(resp_fecha_reg) = YEAR(CURDATE()) THEN resp_user END) AS total_anio,
    //                             COUNT(DISTINCT CASE WHEN YEAR(resp_fecha_reg) = YEAR(CURDATE()) AND MONTH(resp_fecha_reg) = MONTH(CURDATE()) THEN resp_user END) AS total_mes,
    //                             COUNT(DISTINCT CASE WHEN YEARWEEK(resp_fecha_reg, 1) = YEARWEEK(CURDATE(), 1) THEN resp_user END) AS total_semana,
    //                             l.name_loc AS nombre_municipio
    //                         FROM respuestas_tb r
    //                         JOIN loc_register l ON r.resp_id_muni = l.id_loc
    //                         WHERE r.resp_id_muni = %s;", $muni);



        $rsQuery = mysqli_query($GLOBALS['connectMySql'],$query_rsQuery);
        $row_rsQuery = mysqli_fetch_assoc($rsQuery);
        $totalRows_rsQuery = mysqli_num_rows($rsQuery);
        // echo $query_rsQuery;
        // var_dump($row_rsQuery);
        print_r(json_encode($row_rsQuery));
}

if ($_POST['hotFilt'] == true) {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $loc = $_POST['loc'];
    $ini = $_POST['ini'];
    $fin = $_POST['fin'];
    if ($_POST['show']) {
        if ($_POST['show'] === '1') {
            $hoteles = $_POST['hotels']; 
            $query_rsHotelF = sprintf("SELECT * FROM respuestas_tb WHERE resp_id_muni = %d
            AND resp_fecha_reg BETWEEN '%s' AND '%s'
            AND (resp_clave IS NOT NULL AND resp_clave != '' AND resp_clave != ' ');",
            $loc,
            $ini,
            $fin,);
            $rsHotelF = mysqli_query($GLOBALS['connectMySql'],$query_rsHotelF);
            $row_rsHotelF = mysqli_fetch_assoc($rsHotelF);
            $totalRows_rsHotelF = mysqli_num_rows($rsHotelF);
            $hotelesF = array();
            if ($totalRows_rsHotelF > 0) {
                do{ 
                    array_push($hotelesF, array(
                        'id' => $row_rsHotelF['resp_id'],
                        'clave' => $row_rsHotelF['resp_clave'],
                        'muni' => $row_rsHotelF['resp_id_muni'],
                        'user' => $row_rsHotelF['resp_user'],
                        'parte' => $row_rsHotelF['resp_id_part'],
                        'fecha' => $row_rsHotelF['resp_fecha_reg']
                    ));
                } while ($row_rsHotelF = mysqli_fetch_assoc($rsHotelF));
                print_r(json_encode($hotelesF));
                exit;
            }else if($totalRows_rsHotelF === 0) {
                // echo 'no hay nada';
                exit;
            } //fin de else if
        } else if ($_POST['show'] === '2') {
            $hoteles = $_POST['hotels']; // Agrega aquí las claves de los hoteles que quieres incluir
            $clavesHoteles = "'" . implode("','", $hoteles) . "'";
            $query_rsHotelF = sprintf("SELECT * FROM respuestas_tb WHERE resp_id_muni = %d
            AND resp_fecha_reg BETWEEN '%s' AND '%s'
            AND (resp_clave IS NOT NULL AND resp_clave != '' AND resp_clave != ' ')
            AND resp_clave IN (%s);",
            $loc,
            $ini,
            $fin,
            $clavesHoteles);
            $rsHotelF = mysqli_query($GLOBALS['connectMySql'],$query_rsHotelF);
            $row_rsHotelF = mysqli_fetch_assoc($rsHotelF);
            $totalRows_rsHotelF = mysqli_num_rows($rsHotelF);
            $hotelesF = array();
            if ($totalRows_rsHotelF > 0) {
                do{ 
                    array_push($hotelesF, array(
                        'id' => $row_rsHotelF['resp_id'],
                        'clave' => $row_rsHotelF['resp_clave'],
                        'muni' => $row_rsHotelF['resp_id_muni'],
                        'user' => $row_rsHotelF['resp_user'],
                        'parte' => $row_rsHotelF['resp_id_part'],
                        'fecha' => $row_rsHotelF['resp_fecha_reg']
                    ));
                } while ($row_rsHotelF = mysqli_fetch_assoc($rsHotelF));
                print_r(json_encode($hotelesF));
                exit;
            }else if($totalRows_rsHotelF === 0) {
                // echo 'no hay nada';
                exit;
            } //fin de else if
        }else if($_POST['show'] === '3'){ // --------------- EL SHOW3 (fin de if show 3) ---------------
            $hotel = $_POST['hotelN'];
            $query_rsHotelF = sprintf("SELECT * FROM respuestas_tb WHERE resp_id_muni = %d
            AND resp_fecha_reg BETWEEN '%s' AND '%s'
            AND resp_clave = '%s';",
            $loc,
            $ini,
            $fin,
            $hotel);
            $rsHotelF = mysqli_query($GLOBALS['connectMySql'],$query_rsHotelF);
            $row_rsHotelF = mysqli_fetch_assoc($rsHotelF);
            $totalRows_rsHotelF = mysqli_num_rows($rsHotelF);
            $hotelesF = array();
            //echo $query_rsHotelF;
            if ($totalRows_rsHotelF > 0) {
                do{ 
                    array_push($hotelesF, array(
                        'id' => $row_rsHotelF['resp_id'],
                        'clave' => $row_rsHotelF['resp_clave'],
                        'muni' => $row_rsHotelF['resp_id_muni'],
                        'user' => $row_rsHotelF['resp_user'],
                        'parte' => $row_rsHotelF['resp_id_part'],
                        'fecha' => $row_rsHotelF['resp_fecha_reg']
                    ));
                } while ($row_rsHotelF = mysqli_fetch_assoc($rsHotelF));
                print_r(json_encode($hotelesF));
                exit;
            }else if($totalRows_rsHotelF === 0) {
                $hotelesF = [];
                exit;
            }
        } //fin de else show == 3
    }else { // fin de post['show']
    } //fin del else
} // fin de este if



if ($_POST['estadistica'] == true) {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $id = $_POST['id'];
    if ($id != '') {
        $query_rsQuery = sprintf("SELECT 
                                    d.reg_id,
                                    d.reg_code,
                                    d.reg_fecha_ini,  
                                    t.muse_name AS reg_museo_name,  
                                    d.reg_museo,
                                    d.reg_fecha_fin,
                                    d.reg_status
                                FROM 
                                    code_registro d
                                JOIN 
                                    museum_register t
                                ON 
                                    d.reg_museo = t.muse_id
                                WHERE d.reg_loc = '%s'
                                ORDER BY 
                                    d.reg_id DESC", $id);
        $rsQuery = mysqli_query($GLOBALS['connectMySql'],$query_rsQuery);
        $row_rsQuery = mysqli_fetch_assoc($rsQuery);
        $totalRows_rsQuery = mysqli_num_rows($rsQuery);
    }else {
        $query_rsQuery = sprintf("SELECT 
                                    d.reg_id,
                                    d.reg_code,
                                    d.reg_loc,
                                    d.reg_fecha_ini,  
                                    t.muse_name AS reg_museo_name,  
                                    d.reg_museo,
                                    d.reg_fecha_fin,
                                    d.reg_status
                                FROM 
                                    code_registro d
                                JOIN 
                                    museum_register t
                                ON 
                                    d.reg_museo = t.muse_id
                                ORDER BY 
                                    d.reg_id DESC");
        $rsQuery = mysqli_query($GLOBALS['connectMySql'],$query_rsQuery);
        $row_rsQuery = mysqli_fetch_assoc($rsQuery);
        $totalRows_rsQuery = mysqli_num_rows($rsQuery);
    // echo $query_rsQuery;
    }  
    $query = array();
    if ($totalRows_rsQuery > 0) {
        do{ 
            array_push($query, array(
                'id' => $row_rsQuery['reg_id'],
                'code' => $row_rsQuery['reg_code'],
                'inicio' => $row_rsQuery['reg_fecha_ini'],
                'fin' => $row_rsQuery['reg_fecha_fin'],
                'museoID' => $row_rsQuery['reg_museo'],
                'museo' => $row_rsQuery['reg_museo_name'],
                'loc' => $row_rsQuery['reg_loc'],
                'status' => $row_rsQuery['reg_status'] 
            ));
        } while ($row_rsQuery = mysqli_fetch_assoc($rsQuery));
        print_r(json_encode($query));
        exit;
    }
}


if ($_POST['datos'] == true) {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $id = $_POST['id'];
    if ($id === '') {
        $query_rsQuery = sprintf("SELECT * FROM museum_register ORDER BY muse_id DESC");
        $rsQuery = mysqli_query($GLOBALS['connectMySql'],$query_rsQuery);
        $row_rsQuery = mysqli_fetch_assoc($rsQuery);
        $totalRows_rsQuery = mysqli_num_rows($rsQuery);

       
    }else {
        $query_rsQuery = sprintf("SELECT * FROM museum_register WHERE muse_loc = %s ORDER BY muse_id DESC", $id);
        $rsQuery = mysqli_query($GLOBALS['connectMySql'],$query_rsQuery);
        $row_rsQuery = mysqli_fetch_assoc($rsQuery);
        $totalRows_rsQuery = mysqli_num_rows($rsQuery);

       
    }

    $query = array();
    if ($totalRows_rsQuery > 0) {
        do{ 
            array_push($query, array(
                'id' => $row_rsQuery['muse_id'],
                'name' => $row_rsQuery['muse_name'],
                'desc' => $row_rsQuery['recom_desc'],
                'hor' => $row_rsQuery['recom_hor'],
                'dir' => $row_rsQuery['recom_dir'],
                'url' => $row_rsQuery['recom_url'],
                'img' => $row_rsQuery['muse_img'],
                'stat' => $row_rsQuery['muse_status'],
                'correo' => $row_rsQuery['recom_correo'] 
            ));
        } while ($row_rsQuery = mysqli_fetch_assoc($rsQuery));
        print_r(json_encode($query));
        exit;
    }
}



if ($_POST['filtersInc'] == true) {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $id = $_POST['id'];
    if ($id === '') {
        $query_rsEstab = sprintf("SELECT * FROM museum_register;");
        $rsEstab = mysqli_query($GLOBALS['connectMySql'],$query_rsEstab);
        $row_rsEstab = mysqli_fetch_assoc($rsEstab);
        $totalRows_rsEstab = mysqli_num_rows($rsEstab);
    }else{
        $query_rsEstab = sprintf("SELECT * FROM museum_register WHERE muse_loc = %d;", $id);
        $rsEstab = mysqli_query($GLOBALS['connectMySql'],$query_rsEstab);
        $row_rsEstab = mysqli_fetch_assoc($rsEstab);
        $totalRows_rsEstab = mysqli_num_rows($rsEstab);
    }
    // echo $query_rsEstab;
    $estab = array();
    if ($totalRows_rsEstab > 0) {
        do{ 
            array_push($estab, array(
                'id' => $row_rsEstab['muse_id'],
                'name' => $row_rsEstab['muse_name'],
                'typ_estab' => $row_rsEstab['recom_id_est'],
                'typ_rec' => $row_rsEstab['recom_id_rec'],
                'status' => $row_rsEstab['muse_status'],
                'desc' => $row_rsEstab['recom_desc']
            ));
        } while ($row_rsEstab = mysqli_fetch_assoc($rsEstab));
        print_r(json_encode($estab));
        exit;
    }
}

// var_dump($_POST);
if ($_POST['statusCh'] != '') {
    // echo 'entro';
    $st = $_POST['statusCh'];
    $id = $_POST['id'];
    $updateOrd= sprintf("
    UPDATE museum_register
    SET muse_status = '$st'
    WHERE muse_id = $id;");
    // echo $updateOrd;
    $rsUpOrd = mysqli_query($GLOBALS['connectMySql'],$updateOrd);
    if ($rsUpOrd) {
           echo 'successful';
        exit;
    }else{echo 'unsuccessful';};
}

// var_dump($_POST);
if ($_POST['actInc'] === 'true') {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $serializedData = $_POST['serializedData'];
    parse_str($serializedData, $output);
    $correo = isset($output['correo']) ? $output['correo'] : '';
    $url = isset($output['url']) ? $output['url'] : '';
    $dir = isset($output['dir']) ? $output['dir'] : '';
    $recom = isset($output['desc']) ? $output['desc'] : '';
    $hor = isset($output['hor']) ? $output['hor'] : '';

    $id = $_POST['id'];
    $updateOrd= sprintf("
    UPDATE museum_register
    SET recom_correo = '%s', recom_url = '%s', recom_dir = '%s', recom_desc = '%s', recom_hor = '%s'
    WHERE muse_id = '%s';",$correo,$url,$dir,$recom,$hor,$id);
    $rsUpOrd = mysqli_query($GLOBALS['connectMySql'],$updateOrd);
    if ($rsUpOrd) {
           echo 'successful';
        exit;
    }else{echo 'unsuccessful';};
}


?>