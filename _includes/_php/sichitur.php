<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
error_reporting(0);
include_once('../../Connections/config3.php');
//var_dump($connectMySql);

if (isset($_GET['pdf'])== 'true') {
    $directory = $_SERVER['DOCUMENT_ROOT'] . '/indTuris/';
    $archivosPDF = scandir($directory);
    $listaEvidencias = [];

    foreach ($archivosPDF as $archivo) {
        if (pathinfo($archivo, PATHINFO_EXTENSION) == 'pdf') {
            // Descomponer el nombre del archivo
            $partes = explode('_', pathinfo($archivo, PATHINFO_FILENAME));
            // Verificar si el nombre cumple con el formato esperado
                $type = $partes[0];
                // Separar la fecha y la hora
                // $fecha = substr($fechaHora, 0, 10); // "2024-10-10"
                // $fechaHora = str_replace('-', ':', substr($partes[3], 0, 10)) . ' ' . str_replace('-', ':', substr($partes[3], 11));
                $listaEvidencias[] = [
                    'type' => $type,
                    'name' => $archivo
                ];
        }
    }
    echo json_encode($listaEvidencias);


} else if (isset($_GET['id'])) {
    // ini_set("display_errors",1);
    // error_reporting(E_ALL);
    $id = $_GET['id'];
    // echo 'llego a busca el id';

    $sql = "SELECT i.*, m.municipio
    FROM indturis_tb i
    JOIN municipios2 m ON i.ind_muni = m.id
    WHERE ind_muni = ?";
    $stmt = $connectMySql->prepare($sql);
    $stmt->bind_param("i", $id); // Suponiendo que $id es un número entero
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();


    $cond = "ind_ano = " .$data['ind_ano'] ." AND ind_muni = $id";
    $acumOcu = calcAcumOcu($cond);
    $acumDen = calcAcumDen($cond);
    $acumTurN = calcAcumTurN($cond);
    $acumEst = calcAcumEst($cond);
    $acumDerr = calcAcumDerr($cond);
    $acumLlegT = calcAcumLlegT($cond);

    $acums = array(
        'ocu' => $acumOcu['total'],
        'den' => $acumDen['total'],
        'turN' => $acumTurN['total'],
        'est' => $acumEst['total'],
        'derr' => $acumDerr['total'],
        'llegT' => $acumLlegT['total']
    );
    $data['acums'] = $acums;


    echo json_encode($data ?: []);

} else if (isset($_GET['table'])) {
    // echo 'entro al if';
    $table = str_replace(['[', ']'], '', $_GET['table']);
    // echo $table;
    $sql = "SELECT * FROM notices";
    $result = $connectMySql->query($sql);
    if (!$result) {
        echo "Error en la consulta: " . mysqli_error($connectMySql);
    }
    if ($result) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data); 
    } else {
        echo "Error al obtener datos.";
    }
} else if (isset($_GET['type'])) {
    $directory = $_SERVER['DOCUMENT_ROOT'] . '/indTuris/';
    $archivosPDF = scandir($directory);
    $listaEvidencias = [];

    foreach ($archivosPDF as $archivo) {
        if (pathinfo($archivo, PATHINFO_EXTENSION) == 'pdf') {
            $partes = explode('_', pathinfo($archivo, PATHINFO_FILENAME));
                $type = $partes[0];
                if ($type == $_GET['type']) {
                    $listaEvidencias[] = [
                        'type' => $type,
                        'name' => $archivo
                    ];
                }
                
        }
    }
    echo json_encode($listaEvidencias);
} else {
    $query_rsResp = sprintf("SELECT i.*, m.municipio
       FROM indturis_tb i
       JOIN municipios2 m ON i.ind_muni = m.id
       ORDER BY i.ind_id DESC LIMIT 51
   ");
    // ("SELECT * FROM indturis_tb ORDER BY ind_id DESC LIMIT 51");
    
    $rsResp = mysqli_query($GLOBALS['connectMySql'],$query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);
    $test = array();
    $test2 = array();
    do{ 
        array_push($test, array(
            'mes' => $row_rsResp['ind_mes'],
            'anio' => $row_rsResp['ind_ano'],
            'muni' => $row_rsResp['ind_muni'],
            'color' => $row_rsResp['ind_color'],
            'turisN' => $row_rsResp['ind_TurisN'],
            'dens' => $row_rsResp['ind_dens'],
            'est' => $row_rsResp['ind_est'],
            'derr' => $row_rsResp['ind_derrama'],
            'ocu' => $row_rsResp['ind_ocu'],
            'nMuni' => $row_rsResp['municipio'],
            'llegT' => $row_rsResp['ind_llegTur']
        ));
    } while ($row_rsResp = mysqli_fetch_assoc($rsResp));
    

    $query_rsResp2 = sprintf("SELECT * FROM municipios2");
    $rsResp2 = mysqli_query($GLOBALS['connectMySql'],$query_rsResp2);
    $row_rsResp2 = mysqli_fetch_assoc($rsResp2);
    $totalRows_rsResp2 = mysqli_num_rows($rsResp2);

    do{ 
        array_push($test2, array(
            'id' => $row_rsResp2['id'],
            'name' => $row_rsResp2['municipio']
        ));
    } while ($row_rsResp2 = mysqli_fetch_assoc($rsResp2));

    $cond = "ind_ano = " .$test['0']['anio'];
    $acumOcu = calcAcumOcu($cond);
    $acumDen = calcAcumDen($cond);
    $acumTurN = calcAcumTurN($cond);
    $acumEst = calcAcumEst($cond);
    $acumDerr = calcAcumDerr($cond);
    $acumLlegT = calcAcumLlegT($cond);

    $acums = array(
        'ocu' => $acumOcu['total'],
        'den' => $acumDen['total'],
        'turN' => $acumTurN['total'],
        'est' => $acumEst['total'],
        'derr' => $acumDerr['total'],
        'llegT' => $acumLlegT['total']
    );

    $all = array(
        'ind' => $test,
        'acums' => $acums,
        'munis' => $test2
    );

    echo json_encode($all);
}




function calcAcumLlegT($cond){
    $query_rsResp = sprintf("SELECT SUM(ind_llegTur) AS total
                    FROM indturis_tb
                    WHERE $cond;
   ");
    $rsResp = mysqli_query($GLOBALS['connectMySql'],$query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);
    return $row_rsResp;
}

function calcAcumOcu($cond){
    $query_rsResp = sprintf("SELECT AVG(ind_ocu) AS total
                    FROM indturis_tb
                    WHERE $cond;
   ");
    $rsResp = mysqli_query($GLOBALS['connectMySql'],$query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);
    return $row_rsResp;
}

function calcAcumDen($cond){
    $query_rsResp = sprintf("SELECT AVG(ind_dens) AS total
                    FROM indturis_tb
                    WHERE $cond;
   ");
    $rsResp = mysqli_query($GLOBALS['connectMySql'],$query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);
    return $row_rsResp;
}

function calcAcumTurN($cond){
    $query_rsResp = sprintf("SELECT SUM(ind_TurisN) AS total
                    FROM indturis_tb
                    WHERE $cond;
   ");
    $rsResp = mysqli_query($GLOBALS['connectMySql'],$query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);
    return $row_rsResp;
}

function calcAcumEst($cond){
    $query_rsResp = sprintf("SELECT AVG(ind_est) AS total
                    FROM indturis_tb
                    WHERE $cond;
   ");
    $rsResp = mysqli_query($GLOBALS['connectMySql'],$query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);
    return $row_rsResp;
}

function calcAcumDerr($cond){
    $query_rsResp = sprintf("SELECT SUM(ind_derrama) AS total
                    FROM indturis_tb
                    WHERE $cond;
   ");
    $rsResp = mysqli_query($GLOBALS['connectMySql'],$query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);
    return $row_rsResp;
}