<?php

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
?>

<script>
    var part1 = document.querySelector('.part1');
            var part2 = document.querySelector('.part2');
            var part3 = document.querySelector('.part3');
            $(document).on('click', '#arrow', function(e) {
                setTimeout(() => {
                    var request;
                    //Abortamos cualquier solicitud actual
                    if (request) { request.abort(); }
                    request = $.ajax({
                        dataType: 'text',
                        url: '../_includes/_php/querys.php',
                        type: 'POST',
                        data: {partEnc: true, municipio: 2},
                        success: function(data) {
                            //console.log(data);
                            var part1 = document.querySelector('.part1');
                            var part2 = document.querySelector('.part2');
                            var part3 = document.querySelector('.part3');
                            // Obtener la ubicación del usuario
                            navigator.geolocation.getCurrentPosition(position => {
                                console.log('Latitud: ' + position.coords.latitude);
                                console.log('Longitud: ' + position.coords.longitude);
                                const latUsuario = position.coords.latitude;
                                const lonUsuario = position.coords.longitude;
                                // Realizar la solicitud AJAX para obtener las ubicaciones
                                ajaxUbication(latUsuario, lonUsuario).then(ubicaciones => {
                                    // Filtrar y mostrar las ubicaciones según la distancia
                                    blockDivs(data, ubicaciones, part1, part2, part3);
                                }).catch(error => {
                                    console.error('Error en la llamada AJAX: ' + error);
                                    alert('No fue posible conectar con nuestro servicio');
                                });
                            }, error => {
                                console.log('Error al obtener la ubicación: ' + error.message);
                               // alert('No fue posible detectar su ubicación');
                                $.ajax({
                                    dataType: 'json',
                                    url: '../_includes/_php/querys.php',
                                    type: 'POST',
                                    data: {hotel: true, municipio: 2},
                                    success: function(datos) {
                                        let options = '<option hidden="" value="">Seleciona un opción</option>';
                                        for (let i = 0; i < datos.length; i++) {
                                            options = options +'<option value="'+datos[i]['id']+'">'+datos[i]['hotel']+'</option>' 
                                        }
                                        if (data == 1) {
                                            part2.style.display = 'block';
                                            $(part2).find('form').each(function() {
                                                $(this).prepend('<div class="qs-general">'+
                                                            '<h3>Selecciona tu hotel de hospedaje <span style="color:red;">*</span> <br> (Select your lodging hotel)</h3>'+
                                                            '<select name="hotel" class="options required" data-id-pregunta="23">'+options+
                                                            '</select>'+
                                                            '</div>')
                                            });
                                            //console.log(options);
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        alert('No fue posible conectar con nuestro servicio');
                                    }
                                });

                            });
                        }
                    });
                }, 100);
            });

            function ajaxUbication(latUsuario, lonUsuario) {
                return new Promise((resolve, reject) => {
                    $.ajax({
                        dataType: 'json',
                        url: '../_includes/_php/querys.php',
                        type: 'POST',
                        data: {hotel: true, municipio: 2},
                        success: function(datos) {
                            // Agregar la distancia a cada ubicación
                            datos.forEach(ubicacion => {
                                ubicacion.distancia = calcularDistancia(latUsuario, lonUsuario, ubicacion.lat, ubicacion.lon);
                            });
                            // Ordenar las ubicaciones por distancia
                            datos.sort((a, b) => a.distancia - b.distancia);
                            resolve(datos);
                        },
                        error: function(xhr, status, error) {
                            alert('No fue posible conectar con nuestro servicio');
                            reject(error);
                        }
                    });
                });
            }

            function blockDivs(data, ubicaciones, part1, part2, part3) {
                let options = '<option hidden="" value="">Seleciona un opción</option>';
                for (let i = 0; i < ubicaciones.length; i++) {
                     options = options +'<option value="'+ubicaciones[i]['id']+'">'+ubicaciones[i]['hotel']+'</option>' 
                }
                if (data == 1) {
                    part2.style.display = 'block';
                    $(part2).find('form').each(function() {
                        $(this).prepend('<div class="qs-general">'+
                                    '<h3>Selecciona tu hotel de hospedaje <span style="color:red;">*</span> <br> (Select your lodging hotel)</h3>'+
                                    '<select name="hotel" class="options required" data-id-pregunta="23">'+options+
                                    '</select>'+
                                    '</div>')
                    });

                    //console.log(options);
                } else if(data == 2) {
                    part3.style.display = 'block';
                    part3.find('form').each(function() {
                    // Aquí puedes agregar elementos HTML según las ubicaciones ordenadas
                });
                    divCont = part3;
                } else if(data == 3) {
                    part1.style.display = 'block';
                    part1.find('form').each(function() {
                    // Aquí puedes agregar elementos HTML según las ubicaciones ordenadas
                });
                    divCont = part1; 
                }
            }

            function calcularDistancia(latUsuario, lonUsuario, latUbicacion, lonUbicacion) {
                const earthRadius = 6371; // Radio de la tierra en kilómetros
                const lat1 = deg2rad(latUsuario);
                const lon1 = deg2rad(lonUsuario);
                const lat2 = deg2rad(latUbicacion);
                const lon2 = deg2rad(lonUbicacion);

                const dLat = lat2 - lat1;
                const dLon = lon2 - lon1;

                const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                    Math.cos(lat1) * Math.cos(lat2) *
                    Math.sin(dLon / 2) * Math.sin(dLon / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                const distance = earthRadius * c;

                return distance;
            }

            function deg2rad(deg) {
                return deg * (Math.PI / 180);
            }
</script>
