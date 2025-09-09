<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadistica Perfil del Vistante</title>

    <script src="_includes/_js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/d3@7"></script>
    <script src="https://github.com/caged/d3-tip.git"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="_includes/_js/graphs.js"></script>
    <script src="_includes/_js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <!-- <script src="_includes/_js/main.js"></script> -->
    <script src="_includes/_js/d3-tip.js"></script>
    <link rel="stylesheet" type="text/css" href="_includes/_css/hd.css">
    

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet"/>
    <!-- <script src="https://kit.fontawesome.com/my id.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-jkihXtPklFJy8q3rnoEMBstczhBwFwO48lEQ7EDKlA5JX7xu5Q0NVg7lLeK/cHhV7hly0iygDRNyo6N88U6B9g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->



    
    <script
  src="https://example.com/fontawesome/v6.5.2/js/all.js"
  data-auto-replace-svg="nest"
></script>
    <link rel="stylesheet" type="text/css" media="only screen and (max-width:2000px)"  href="_includes/_css/large.css">
    <link rel="stylesheet" type="text/css" media="only screen and (max-width:1600px)"  href="_includes/_css/regular.css">
    <link rel="stylesheet" type="text/css" media="only screen and (max-width:1024px)"  href="_includes/_css/medium.css">
    <link rel="stylesheet" type="text/css" media="only screen and (max-width:600px)"   href="_includes/_css/small.css">
    
    <!-- <script src="_libreries/d3-tip-master/index.js"></script> -->

    <style>
        body{ background-color: white !important;}
        div.bar {
            display: inline-block;
            width: 10%;
            height: 75px;   /* Esto se cambiará próximamente */
            background-color: teal;
            margin-left: 10px;
        }
        .none{
            display: none !important;
        }
        rect {
            stroke: SteelBlue;
            stroke-width: 2;
            /* fill: LightSteelBlue; */
        }
        rect:hover {
            fill: SteelBlue;
        }
        #graphs{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        .contInf{
            width:60%;
            border-top: 1px solid #C3CAD1;
            margin-top: 30px;
        }
        div#miId {
            font-family: system-ui;
            width: 100%;
            text-align: center;
            font-weight: 500;
            padding: 5px;
            font-size: 1rem;
            /* box-shadow: 4px -4px 4px rgb(84, 88, 89, 30%); */
            width: 96%;
        }
        h1, h2, h3, h4, h5{
            margin: 0;
            margin-bottom: 10px;
        }
        div#respAb {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        .preg{
            border-right: 1px solid rgb(122, 152, 169);
            border-bottom: 1px solid rgb(122, 152, 169);
        }
        .resp{
            border-bottom: 1px solid rgb(122, 152, 169);
            border-left: 1px solid rgb(122, 152, 169);
        }
        td {
            width: 50%;
            text-align: center;
        }
        table{
            width: 70%;
            font-family: system-ui;
            font-size: .9rem;
        }
        .contTit{
            width:100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }
        .aliTit{
            width: 60%;
            margin-top: 25px;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        select{
            width: 110px;
            text-align: center;
            padding: 8px 0;
            border-style: none;
            border-bottom: 1px solid;
        }
        .contVal{
            display: flex;
        }
        p{
            margin:0;
        }
        tr.titDat td {
            border-bottom: 1px solid steelblue;
        }
        .tabDate{
            width: 100%;
            margin-bottom: 50px;
        }

        .contDat td {
            border-bottom: 1px solid rgb(154, 195, 217, 60%);
        }
        .excel {
            flex-direction:column;
            position: fixed;
            background: red;
            height: 100% !important;
            width: 100% !important;
            z-index: 3;
            display: flex;
            overflow: scroll;
            align-items: center;
            top: 0;
            background: rgba(38, 68, 142, 0.3);
        }
        .preguntas{
            padding: 7px 0;
            font-family: system-ui;
            font-size: 1rem;
            color: #545859;
            font-weight: unset;
            cursor: pointer;
        }
        /* .conFec [type="date"]::-webkit-calendar-picker-indicator{
            background-color: rgb(206, 15, 105);
            filter: invert(1);
        } */
        button#butExc {
            border: none;
            background: #DDF3DF;
            padding: 5px 10px;
            border-radius: 5px;
            color: #545859;
        }
        button:hover {
            box-shadow: 1px 1px 4px rgb(0,0,0, 50%);
            transition: .3s;
        }
        .preguntas:hover{
            transform: scale(1.02);
            color: #002D72;
            transition: .5s;
        }
        #titChart{
            text-align: center;
            font-family: system-ui;
            font-weight: 500;
            font-size: 1.1rem;
        }
        #filtFec{
            display:flex;
            justify-content: center;
            position: relative;
            z-index: 2;
        }
        .conFec {
            padding: 5px;
            border-radius: 3px;
            color: rgb(87, 104, 111);
            font-family: system-ui;
            display: flex;
            justify-content: space-between;
        }
        .conFec input{
            border: none;
            font-family: system-ui;
            color: rgb(87, 104, 111);
            width: 103px;
            margin-right: 15px;
        }
        /* input[type="date"]::-webkit-calendar-picker-indicator {
            background: none;
        } */
        button{
            border-style: none;
            background: none;
        }
        #butFilt:hover{
            box-shadow: 0px 0px 0px;
        }
        #butFilt svg{fill: rgb(150, 158, 165)}
        #butFilt svg:hover{
            fill: #627383;
            transition. .3s;
        }
        canvas{
            height: 80vh !important;
        }
        div#noExist {
            text-align: center;
            font-family: system-ui;
            color: #CE0F69;
            font-weight: 600;
        }
        .dwImage{
            display: flex;
            justify-content: end;
            width: 90%;
            top: 100px;
            position: absolute;
        }

        @media (max-width: 600px) {
            canvas {
                height: 33vh !important;
            }

            #filtFec{
                flex-direction: column;
            }

            #butFilt{
                position: absolute;
                right: 14vh;
            }
            #butFilt svg {
                fill: rgb(150, 158, 165);
                width: 31px;
                height: 31px;
            }
        }

    </style>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

</head>
<body style="overflow: auto !important">
    <div class="contTit">
    <h3 style="    font-family: system-ui;
            color: #627885;text-align:center;">Generación de estadística Perfil del Visitante</h3>
        <div class="aliTit">
            <select name="region" id="reg">
                <option type="hidden" value="">Seleccione una localidad</option>
                <!-- <option value="1">Juarez</option> -->
                <option value="2">Chihuahua</option>
                <option value="3">Casas Grandes</option>
            </select>
            
        </div>
    </div>
    
    <div id="graphs" class="none">
        <div id="respAb">
            <div class="contInf">
                <div class="divTitCrate">
                    <h4 style="margin-top: 30px; font-family: system-ui; font-weight: 600;">Seleccione para mostrar gráfico</h4>
                    <!-- <button id="createGraph">Crear grafico</button> -->
                </div>
                
            </div>
        </div>
        <?php $fechaActual = date("Y-m-d");?>
        
    </div>

    <div data-id="" class="excel none" style="width: 100%">
        <div style="display:flex;justify-content:space-between;width:90%;background-color:white;margin-top: 20px;border-top-right-radius: 10px;border-top-left-radius: 10px;">
            <span style="margin-top: 20px; cursor:pointer;font-family: system-ui;font-weight: 600;text-decoration: underline; margin-left: 35px;color: rgb(206, 15, 105);" id="close">Cerrar</span>
            <select name="" id="changeGraph">
                <option hidden="" value="">Cambiar gráfico</option>
                <option value="1">Gráfico de Barras</option>
                <option value="2">Gráfico de Barras Horizontal</option>
                <option value="3">Grafico Linear</option>
                <option value="4">Gráfico Donut</option>
                <option value="5">Grafico Pie</option>
                <option value="6">Grafico Polar area</option>
            </select>
        </div>
        <div class="dwImage"><img id="image" style="cursor:pointer;height:33px;background-color: white;margin-right: 25px;margin-top: 25px;" src="_images/dimage.png" alt=""></div>
        <div id="imgGraph" class="contExc" style="padding: 0 0 15px 0; width: 90%; background-color: #fff;" >
            <h3 id="titChart"></h3>
            <div id="filtFec">
                <div class="conFec">
                    <label for="start" style="margin-right: 5px;">Inicio:</label>
                    <input type="date" id="start" name="trip-start" value=""/>
                </div>
                
                <div class="conFec">
                    <label for="end" style="margin-right: 5px;">Fin:</label>
                    <input type="date" id="end" name="trip-end" value="<?php echo $fechaActual;?>"/>
                </div>
                <button id="butFilt"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg></button>
            </div>
            <div id="noExist"></div>
            <div style="padding: 12px 0;background:#fff; width:100%; display:flex; justify-content:center;"><canvas id="myChart"></canvas></div>
            
        </div>
        <table id="sentimentTable" class="">
                <tr>
                    <th>Respuesta</th>
                    <th>Sentimiento</th>
                    <th>Fecha</th>
                </tr>
        </table>
    </div>
    

    <table id="miTabla" class="none">
            <tr>
                <th>Id de pregunta</th>
                <th>Pregunta</th>
                <th>Usuario</th>
                <th>Respuesta</th>
                <th>Municipio</th>
                <th>Hotel</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </table>

    <div id="divCreGraph" class="none">
        <div id="aliCreGraph">
            <h3>Parte de la encuesta</h3>
            <div class="aliPartsGraph">
               <div class="contPartsGraph">
                   <select name="" id="partEncFilt" style="width: 30% !important;">
                        <option hidden="" value="">Selecione que parte de la encuesta quiere filtrar</option>
                        <option value="1">Parte 1</option>
                        <option value="2">Parte 2</option>
                        <option value="3">Parte 3</option>
                   </select>

                   <div class="contUnion">
                        <label for="" >Unir</label>
                        <select name="" id="unir1"></select>
                        <label for=""> con </label>
                        <select name="" id="unir2"></select>
                        <button id="createNew">Crear</button>
                   </div>
                </div>
            </div>
            <canvas id="myChart2"></canvas>
            
        </div>
    </div>


    <div class="contInfografia none">
        <div class="contCloseInfo"><img id="closeInfo" src="_images/cerrar.png" alt=""></div>
        <div class="aliInfografia">
            <h1>Seleccione una platilla</h1>
            <div class="contPlant">
                <div class="contImagePlant" id="contenedorPlantilla">
                    <?php 
                    // Ruta de la carpeta que contiene las imágenes
                    $rutaCarpeta = '_images/infografias/';
                    // Obtener una lista de todos los archivos en la carpeta
                    $archivos = scandir($rutaCarpeta);

                    // Filtrar los archivos para incluir solo imágenes
                    $imagenes = array_filter($archivos, function($archivo) {
                        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
                        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']);
                    });

                    // Imprimir las etiquetas de imagen HTML para cada imagen
                    foreach ($imagenes as $imagen) {
                        $id = pathinfo($imagen, PATHINFO_FILENAME); // Obtener el nombre del archivo sin extensión como ID
                        echo "<label id='labelInfografia'><input class='inpInfo' style='visibility: hidden;width: 0;' name='imageInfo' type='radio' value='$id'><img  class='imageInfo' id='$id' src='$rutaCarpeta$imagen' alt='$imagen'></label>";
                    }
                    ?>
                </div>
            </div>

            <div class="timeInfo">
                <h3>Desde</h3>
                <input type="date" name="iniInfo" id="iniInfo">
                <h3 style="margin-left:8px;">Hasta</h3>
                <input type="date" name="finInfo" id="finInfo">
            </div>

            <div class="contButInfo">
                <button  class="genInfografia">Generar</button>
                <div class="load-wrapp none">
                    <div class="load-3">
                        <p>Generando</p>
                        <div>
                            <div class="line"></div>
                            <div class="line"></div>
                            <div class="line"></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <canvas  id="canvaIMG" style="z-index: 2;display: none;"></canvas>
    </div>
</body>

</html>
