<?php

include_once('Connections/config.php');

// ini_set("display_errors",1);
// error_reporting(E_ALL);

$sql = "UPDATE prueba_fecha SET cont1 = 1, cont2= 1 WHERE id = 1";

  if ($connectMySql->query($sql) === TRUE) {
      echo "Registro actualizado correctamente.";
 } else {
     echo "Error al actualizar el registro: " . $conn->error;
  }

  echo $sql;

$fecha_actual = new DateTime();
$primer_dia_siguiente_mes = new DateTime("first day of next month", $fecha_actual->getTimezone());
$ultimo_dia_mes = $primer_dia_siguiente_mes->modify("-1 day");
$fecha_formato = $ultimo_dia_mes->format('Y-m-d');

//  $sql = "INSERT INTO prueba_fecha (fecha_fin, cont1, cont2) 
//          VALUES 
//        ('$fecha_formato', 0, 0); ";

// if (mysqli_query($connectMySql, $sql)) {
//     echo $sql;
// }
        

?>