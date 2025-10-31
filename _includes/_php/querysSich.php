
<?php
error_reporting(0);
// ini_set("display_errors",1);
// error_reporting(E_ALL);
include_once('../../Connections/config3.php');
date_default_timezone_set('America/Chihuahua');


if ($_POST['indTuris']) {
    $query_rsMunicipios = sprintf("SELECT id AS municipio_id, municipio AS nombre_municipio FROM municipios2 ORDER BY municipio ASC");
    $rsMunicipios = mysqli_query($GLOBALS['connectMySql'], $query_rsMunicipios);
    $row_rsMunicipios = mysqli_fetch_assoc($rsMunicipios);
    $munis = array();
    do {
        array_push($munis, array(
            'id' => $row_rsMunicipios['municipio_id'],
            'name' => $row_rsMunicipios['nombre_municipio']
        ));
    } while ($row_rsMunicipios = mysqli_fetch_assoc($rsMunicipios));

    $query_rsIndturis = sprintf("SELECT 
                i.id,
                i.region,
                m.id AS id_muni,
                m.municipio AS nombre_municipio,
                l.local_name AS loc,
                i.localidad,
                i.fecha,
                i.tNoche,
                i.derrama,
                i.ocupacion,
                i.llegadaT,
                i.estadia,
                i.densidad,
                i.totHosp,
                i.totHabit
                FROM indturis_tb AS i
                LEFT JOIN municipios2 AS m ON i.municipio = m.id
                LEFT JOIN locals_tb AS l ON i.localidad  = l.local_id
                ORDER BY i.id DESC;
            ");
    $rsIndturis = mysqli_query($GLOBALS['connectMySql'], $query_rsIndturis);
    $row_rsIndturis = mysqli_fetch_assoc($rsIndturis);

    $indTuris = array();

    do {
        // $fecha_original = $row_rsIndturis['fecha'];
        // $fecha_objeto = new DateTime($fecha_original);
        // $fecha_formateada = $fecha_objeto->format('d-m-Y');
        array_push($indTuris, array(
            'ind_id' => $row_rsIndturis['id'],
            'name_muni' => $row_rsIndturis['nombre_municipio'],
            'id_muni' => $row_rsIndturis['id_muni'],
            'loc' => $row_rsIndturis['loc'],
            'fecha' => $row_rsIndturis['fecha'],
            'tNoche' => $row_rsIndturis['tNoche'],
            'derr' => $row_rsIndturis['derrama'],
            'llegT' => $row_rsIndturis['llegadaT'],
            'est' => $row_rsIndturis['estadia'],
            'ocu' => $row_rsIndturis['ocupacion'],
            'dens' => $row_rsIndturis['densidad'],
            'totHos' => $row_rsIndturis['totHosp'],
            'totHab' => $row_rsIndturis['totHabit']
        ));
    } while ($row_rsIndturis = mysqli_fetch_assoc($rsIndturis));

    $arrInd = array(
        'munis' => $munis,
        'indTuris' => $indTuris
    );
    echo json_encode($arrInd );
}


if ($_POST['updIndTuris']) {
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $tNoche = $_POST['tNoche'];
    $derr = $_POST['derr'];
    $llegT = $_POST['llegT'];
    $est = $_POST['est'];
    $dens = $_POST['dens'];
    $totHos = $_POST['totHos'];
    $totHab = $_POST['totHab'];

    $updateOrd= sprintf("
    UPDATE indturis_tb
    SET fecha  = '$fecha ', tNoche = '$tNoche', derrama = '$derr', llegadaT = '$llegT', estadia = '$est', densidad = '$dens', totHosp = '$totHos', totHabit = '$totHab'
    WHERE id = $id;");
    $rsUpOrd = mysqli_query($GLOBALS['connectMySql'],$updateOrd);
    if ($rsUpOrd) {
           echo 'successful';
        exit;
    }else{
        echo 'unsuccessful';
    };


}



?>