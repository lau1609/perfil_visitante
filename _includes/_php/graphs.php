
<?php
error_reporting(0);
include_once('../../Connections/config.php');

if ($_POST['reg']) {
    $muni = intval($_POST['reg']);

    $query = "
        SELECT 
            p.preg_id,
            p.preg_name,
            p.preg_color,
            p.preg_part_infog,
            r.resp_name,
            l.name_loc
        FROM 
            preguntas_tb p
        JOIN 
            respuestas_tb r ON p.preg_id = r.resp_id_preg
        JOIN
            loc_register l ON r.resp_id_muni = l.id_loc
        WHERE
            p.preg_numi_id = ?
        AND 
            r.resp_id_muni = ?
        ORDER BY
            p.preg_id ASC
    ";

    $stmt = mysqli_prepare($GLOBALS['connectMySql'], $query);
    mysqli_stmt_bind_param($stmt, "ii", $muni, $muni);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $preguntas = [];
    $respuestasPorPregunta = [];

    // 3. Procesar los datos y separar las respuestas de checkbox
    while ($row = mysqli_fetch_assoc($result)) {
        $pregId = $row['preg_id'];
        $respName = $row['resp_name'];

        // Guardar los datos de la pregunta si aún no existen
        if (!isset($preguntas[$pregId])) {
            $preguntas[$pregId] = [
                'preg_name' => $row['preg_name'],
                'preg_color' => $row['preg_color'],
                'name_loc' => $row['name_loc'],
                'preg_part_infog' => $row['preg_part_infog']
            ];
        }

        // Dividir la cadena de respuestas por la coma y procesar cada una
        $respuestasSeparadas = explode(", ", $respName);
        foreach ($respuestasSeparadas as $respuestaUnica) {
            // Reemplazar los guiones por espacios en blanco
            $respuestaLimpia = str_replace("-", " ", $respuestaUnica);
            // Agrupar las respuestas por pregunta
            $respuestasPorPregunta[$pregId][] = $respuestaLimpia;
        }
    }
    mysqli_stmt_close($stmt);

    // 4. Calcular el conteo y los porcentajes finales
    $finalData = [];
    foreach ($preguntas as $pregId => $preguntaInfo) {
        $respuestasDelGrupo = $respuestasPorPregunta[$pregId] ?? [];
        $totalRespuestas = count($respuestasDelGrupo);
        $conteoRespuestas = array_count_values($respuestasDelGrupo);

        // Crear el array final para el JSON
        $respuestasFinales = [];
        foreach ($conteoRespuestas as $nombreRespuesta => $conteo) {
            $respuestasFinales[] = [
                'respuesta' => $nombreRespuesta,
                'conteo' => $conteo,
                'porcentaje' => ($totalRespuestas > 0) ? round(($conteo / $totalRespuestas) * 100) : 0
            ];
        }

        $finalData[] = [
            'id_preg' => $pregId,
            'preg_name' => $preguntaInfo['preg_name'],
            'name_loc' => $preguntaInfo['name_loc'],
            'preg_color' => $preguntaInfo['preg_color'],
            'preg_part_infog' => $preguntaInfo['preg_part_infog'],
            'respuestas' => $respuestasFinales
        ];
    }
    
    // 5. Enviar respuesta JSON
    header('Content-Type: application/json');
    echo json_encode($finalData);
    
    mysqli_close($GLOBALS['connectMySql']);
    exit;
}


if ($_POST['region']) {
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    $region = $_POST['region'];
    $part = $_POST['part'];
    $query_rsResp = sprintf("SELECT * FROM preguntas_tb WHERE preg_part = $part and preg_numi_id = $region");
    $rsResp = mysqli_query($GLOBALS['connectMySql'], $query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);

    $respuesta = array();
    do{ 
        array_push($respuesta, array(
            'id' => $row_rsResp['preg_id'],
            'preg' => $row_rsResp['preg_name'] 
        ));
    } while ($row_rsResp = mysqli_fetch_assoc($rsResp));
    print_r(json_encode($respuesta));

    exit;
}




// ################## FUNCIONES ###################
// function porcentaje($arrayReestablecido, $ini, $fin) {
//     $iniDate = strtotime($ini);
//     $finDate = strtotime($fin);

//     $resultados = [];

//     foreach ($arrayReestablecido as $array) {
//         $respuestas = array_filter($array, function($respuesta) use ($iniDate, $finDate) {
//             $fechaRespuesta = strtotime($respuesta['fecha']);
//             return $fechaRespuesta >= $iniDate && $fechaRespuesta <= $finDate;
//         });

//         if (empty($respuestas)) {
//             continue;
//         }

//         $first = reset($respuestas);
//         if ($first['id_preg'] === '42') {
//             continue;
//         }

//         $idPregunta = $first['id_preg'];
//         $nPregunta = $first['preg_name'];
//         $conteoRespuestasPregunta = [];

//         foreach ($respuestas as $resp) {
//             $nombreRespuesta = $resp['name'];
//             if (!isset($conteoRespuestasPregunta[$nombreRespuesta])) {
//                 $conteoRespuestasPregunta[$nombreRespuesta] = 1;
//             } else {
//                 $conteoRespuestasPregunta[$nombreRespuesta]++;
//             }
//         }

//         $totalRespuestas = count($respuestas);
//         $conteoArray = [];

//         foreach ($conteoRespuestasPregunta as $nombreRespuesta => $conteo) {
//             $conteoArray[] = [
//                 'respuesta'  => $nombreRespuesta,
//                 'conteo'     => $conteo,
//                 'porcentaje' => round(($conteo / $totalRespuestas) * 100)
//             ];
//         }

//         $resultados[] = [$nPregunta, $conteoArray];
//     }

//     return $resultados;
// }


?>