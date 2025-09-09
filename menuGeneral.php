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
    <!-- <script src="_includes/_js/graphs.js"></script> -->
    <script src="_includes/_js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="_images/_js/main.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet"/>
    <!-- <script src="https://kit.fontawesome.com/my id.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-jkihXtPklFJy8q3rnoEMBstczhBwFwO48lEQ7EDKlA5JX7xu5Q0NVg7lLeK/cHhV7hly0iygDRNyo6N88U6B9g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <script src="https://example.com/fontawesome/v6.5.2/js/all.js" data-auto-replace-svg="nest"></script>
    <!-- <link rel="stylesheet" type="text/css" media="only screen and (max-width:2000px)"  href="_includes/_css/large.css">
    <link rel="stylesheet" type="text/css" media="only screen and (max-width:1600px)"  href="_includes/_css/regular.css">
    <link rel="stylesheet" type="text/css" media="only screen and (max-width:1024px)"  href="_includes/_css/medium.css">
    <link rel="stylesheet" type="text/css" media="only screen and (max-width:600px)"   href="_includes/_css/small.css"> -->

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <style>
        @font-face {
            font-family: 'PublicSans';
            src: url('https://sichitur.org/perfil_visitante/_fonts/PublicSans-Regular.woff') format('woff');
            font-style: normal;
        }
        body{
            background-color: white !important;
            font-family: 'PublicSans'
        }
        .contMain{
            display: flex;
            width: 100%;
            justify-content: center;
            align-items:center;
            flex-direction: column;
        }
        .titleMain{
            text-align:center;
            width: 90%;
            color:#274C67;
        }
        ul{
            width: 90%;
            color: #CE0F69;
        }
        li{
            margin: 15px 0;
        }
        li a{
            color: #545859;
            font-size: 1rem;
            text-decoration: underline; 
        }
        li a:hover{
            color: #CE0F69;
            transition: .3s;
            transform: scale(1.1);
        }
        li a:hover > li{
            transform: scale(1.1);
        }
        h3{
            font-size:1.2rem;
            font-weight: 500;
            color: #545859;
            text-align: start;
            width: 90%;
            margin: 0;
        }

        @media (max-width: 700px) {
           .contLI{flex-direction: column;}
           #contLinks, #contImage{width: 100% !important; }
           ul{margin: 7px;}
        }
        .none{display:none;}
    </style>

</head>
<body style="overflow: auto !important">
    <div class="contMain">
        <h1 class="titleMain">Gestión Turistica</h1>
        <div class="contLI" style="display:flex;justify-content:space-between;width: 90%;">
            <div id="contLinks" style="display:flex;width:50%;flex-direction:column;justify-content: center;">
                <h3>SICHITUR</h3>
                <ul>
                    <li><a href="https://sichitur.org/generateQR/addNotice.php" target="_blank">Agregar notas a SICHITUR</a></li>
                    <li><a href="https://sichitur.org" target="_blank">SICHITUR</a></li>
                </ul>
                <H3>PERFIL DEL VISITANTE</H3>
                <ul>
                    <li><p style="color:#545859;" class="encPerf">Encuesta perfil del visitante</p></li>
                    <ul id="priEncVis" class="none">
                        <li class="hotels" data-loc="2">Chihuahua</li>
                        <ul id="chihuahua" class="none">
                            <li><a target="_blank" href="https://sichitur.org/perfil_visitante/chihuahua/?hotel=HT3HN">Hotel 3</a></li>
                            <li><a target="_blank" href="https://sichitur.org/perfil_visitante/chihuahua/?hotel=HTST2">Hotel 2</a></li>
                            <li><a target="_blank" href="https://sichitur.org/perfil_visitante/chihuahua/?hotel=HT4AL">Hotel 4</a></li>
                        </ul>

                        <li class="hotels" data-loc="1">Juarez</li>
                            <ul id="juarez" class="none">
                            </ul>
                    </ul>
                    <li><a href="https://sichitur.org/generateQR/admin.php" target="_blank">Registro de museos activos e inactivos</a></li>

                    <li id="genQR"><p style="color:#545859;">Generación de incentivos QR de la encuesta</p> </li>
                    <ul id="listQR" class="none">
                        <li><a href="https://sichitur.org/generateQR/?loc=chihuahua" target="_blank">Chihuahua</a></li>
                        <li><a href="https://sichitur.org/generateQR/?loc=juarez" target="_blank">Juarez</a></li>
                    </ul>

                    <li><a href="https://sichitur.org/generateQR/menu_qr.php" target="_blank">Escaner de QR</a></li>
                    <li><a href="https://perfilvisitante.sichitur.org/" target="_blank">Estadistica de la encuesta</a></li>
                </ul> 
            </div>

            <div id="contImage" style="width:45%"> 
                <img src="_images/fondoMenu.png" alt="" style="width:100%">
            </div>
        </div>
        

    </div>
</body>

</html>


