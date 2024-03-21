
<?php
error_reporting(0);
include_once('../../Connections/config.php');

if ($_POST['reg']) {
    
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    $muni = $_POST['reg'];

    $query_rsResp = sprintf("SELECT * FROM respuestas_tb WHERE resp_id_muni = $muni ORDER BY resp_id desc");
    $rsResp = mysqli_query($GLOBALS['connectMySql'], $query_rsResp);
    $row_rsResp = mysqli_fetch_assoc($rsResp);
    $totalRows_rsResp = mysqli_num_rows($rsResp);

    $query_rsPreg = sprintf("SELECT * FROM preguntas_tb WHERE preg_numi_id = $muni ");
    $rsPreg = mysqli_query($GLOBALS['connectMySql'], $query_rsPreg);

    $array_respuestas = array(); // Array donde se almacenarán las respuestas separadas
    $respuestasg = array();
    while ($row_rsResp = mysqli_fetch_assoc($rsResp)) {
        $respuestasg[] = $row_rsResp;
    }

    //echo '<pre>'; print_r($respuestasg); echo '</pre>';
    $contResp = array();
    while ($row_rsPreg = mysqli_fetch_assoc($rsPreg)) {
        $preg_id = $row_rsPreg['preg_id'];
        $preg_name = $row_rsPreg['preg_name'];
        $preguntas[$preg_id] = $preg_name;
        $preg_color = $row_rsPreg['preg_color'];
        $color[$preg_id] = $preg_color;
         $contResp[$preg_id] = 0;
        // Iterar sobre las respuestas y contar las que corresponden a esta pregunta
        foreach ($respuestasg as $respuestag) {
            if ($respuestag['resp_id_preg'] == $preg_id) {
                $contResp[$preg_id]++;
            }
        }
    }

    // Obtener respuestas y separarlas si es necesario
    if (count($respuestasg) != 0) {
        $contw = 0;
        //echo '<pre>'; print_r($respuestasg); echo '</pre>';
        for ($a=0; $a < count($respuestasg); $a++) { 
            $resp_name =  str_replace("-", " ", $respuestasg[$a]['resp_name']);
            $resp_id_preg = $respuestasg[$a]['resp_id_preg'];
            $resp_id_muni = $respuestasg[$a]['resp_id_muni'];
            $resp_fecha_reg = $respuestasg[$a]['resp_fecha_reg'];
            $resp_user = $respuestasg[$a]['resp_user'];


           // echo $resp_id_preg. '-';
            if ($resp_id_preg == '42' || $resp_id_preg == '17') {
                $nueva_respuesta = array(
                    'resp_name' => $resp_name,
                    'resp_id_preg' => $resp_id_preg,
                    'preg_name' => $preguntas[$resp_id_preg], 
                    'preg_color' => $color[$resp_id_preg], 
                    'cont' => $contResp[$resp_id_preg],
                    'resp_user' => $resp_user,
                    'resp_fecha_reg' => $resp_fecha_reg
                );
                $array_respuestas[] = $nueva_respuesta;
            }else {
                // Separar las respuestas por comas si es necesario
                $respuestas_separadas = explode(", ", $resp_name);
                for ($i=0; $i <count($respuestas_separadas) ; $i++) { 
                    $nueva_respuesta = array(
                        'resp_name' => $respuestas_separadas[$i],
                        'resp_id_preg' => $resp_id_preg,
                        'preg_name' => $preguntas[$resp_id_preg], 
                        'preg_color' => $color[$resp_id_preg], 
                        'cont' => $contResp[$resp_id_preg],
                        'resp_user' => $resp_user,
                        'resp_fecha_reg' => $resp_fecha_reg
                    );
                    $array_respuestas[] = $nueva_respuesta;
                }
            }
            
           
        }
    }
    // Iterar sobre las respuestas y procesarlas según sea necesario
    $array = array();
    foreach ($array_respuestas as $respuesta) {
        $key = $respuesta['resp_id_preg'];
        $obj = array(
            'name' => $respuesta['resp_name'],
            'id_preg' => $respuesta['resp_id_preg'],
            'preg_name' => '', // Placeholder para el nombre de la pregunta
            'preg_color' => $respuesta['preg_color'],
            'cont' => $respuesta['cont'],
            'user' => $respuesta['resp_user'],
            'fecha' => $respuesta['resp_fecha_reg']
        );
        // Verificar si la clave ya existe en el array
        if (!isset($array[$key])) {
            $array[$key] = array(); // Si no existe, inicializa un nuevo array para esa clave
        }
        // Agregar el objeto al array correspondiente a la clave
        $array[$key][] = $obj;
    }
    foreach ($array as &$grupo_respuestas) {
        foreach ($grupo_respuestas as &$respuesta) {
            $preg_id = $respuesta['id_preg'];
            $preg_name = isset($preguntas[$preg_id]) ? $preguntas[$preg_id] : ''; // Obtener el nombre de la pregunta del array de preguntas
            $respuesta['preg_name'] = $preg_name;
        }
    }
    $arrayReestablecido = array_values($array);
    echo json_encode($arrayReestablecido);
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

?>