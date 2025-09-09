<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Turistica</title>

    <link rel="stylesheet" type="text/css" media="only screen and (min-width:100px)"  href="perfil_visitante/_includes/_css/large.css">
    <link rel="stylesheet" type="text/css" media="only screen and (min-width:100px)"  href="perfil_visitante/_includes/_css/general.css">

    <script src="perfil_visitante/_includes/_js/jquery-3.3.1.min.js"></script>
    <script  src="perfil_visitante/_includes/_js/main3.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<style>
    #myChart, #myChart2, #myChartMensual{
        height : 38vh !important;
    }
</style>
</head>
<body style="overflow: auto !important">
    <div class="contMain">
        <div class="header">
            <div class="contHeader">
            
                <div class="toggleMenu">
                    <div>
                        <input id="abrir-cerrar" name="abrir-cerrar" type="checkbox" value="" />
                        <label for="abrir-cerrar" class="toggle-button">
                            <span class="cerrar" title="Cerrar">Cerrar</span>
                            <span class="abrir" title="Abrir">Abrir</span>
                        </label>
                    </div>
                </div>

                <div class="none" id="contMenu">
                    <div style="display: flex;margin-top: 20px;justify-content: flex-start;flex-direction:column;">
                        <h1 class="titleMain">Gestión Turistica</h1>
                        <div style="width:100%;align-items: center;display:flex;flex-direction:column;justify-content:center; margin-top:20px">
                            <p style="text-decoration: underline;" class="opcMenu" data-opc="1">Inicio</p>
                            <p style="text-decoration: underline;" class="opcMenu" data-opc="2">Hoteles</p>
                            <p class="opcMenu" data-opc="3">Incentivos <img class="flecImg" style="width: 15px;" src="perfil_visitante/_images/general/arrow.png" alt=""></p>
                            <div class="contTypeInc none">
                                <p class="typeInc" data-typeInc="1">Estadistica</p>
                                <p class="typeInc" data-typeInc="2">Control</p>
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%; display: flex;justify-content:center;"><img style="width:30%;margin-bottom: 20px;" src="perfil_visitante/_images/figura.png" alt="" style="width:100%"></div>
                </div>
            </div>
        </div>
        
        <div class="contLI" style="display:flex;justify-content:center;width:100%;">

            <div id="section1" style="display:flex;justify-content:center;width:100%;"> 
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
                        <!-- <li><a href="https://sichitur.org/generateQR/admin.php" target="_blank">Registro de museos activos e inactivos</a></li> -->

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
                    <img style="width: 75vh;" src="perfil_visitante/_images/fondoMenu.png" alt="" style="width:100%">
                </div>
                <!-- <div class="contEstControl">
                    <div class="inicialLoc">
                        <label id="labIniLoc" for="">
                            <select class="local" name="localidad2" id="localidad2">
                                <option hidden="" value="">Localidad para esta sección</option>
                                <option value="2">Chihuahua</option>
                                <option value="1">Juarez</option>
                            </select>
                            <button class="resFilt none">Reset filtros</button>
                        </label>
                    </div>

                    <div class="contButsAdd">
                        <p style="margin-right: 10px;">Añadir</p>
                        <div class="contButs">
                            <button style="background-color: rgb(0, 45, 114, .8);margin-right:8px;">Tipo establecimiento</button>
                            <button style="background-color: rgb(206, 15, 105, .6);">Establecimiento</button>
                        </div>
                    </div>

                    <div class="contPrinContInc">
                        
                        <div class="contListEst">
                            <div></div>
                            <div class="listEst">
                                <div class="listEst2">
                                   <p>Museo Casa Chihuahua</p>
                                    <svg class="stateSvg" style="color:green" data-id="1" data-state="activate" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1.146 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                                    </svg> 
                                </div>
                                
                                <div class="contInfInc">
                                    <div class="infInc">
                                        <img src="generateQR/_images/imgRecom/museos/casaChih.png" alt="">
                                        <div class="contInfo">
                                            <p>Dirección: <span>C. Libertad 901, Zona Centro, 31000 Chihuahua, Chih.</span></p>
                                            <p>Recompensa: <span>-50% de descuento en una entrada individual</span></p>
                                            <p>URL: <span>https://www.casachihuahua.org.mx/</span></p>
                                            <p>Horario: <span>Mie a Lun de 9am - 5pm</span></p>
                                            <p>Correo: <span>turismotest2023@gmail.com</span></p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="listEst">
                                <div class="listEst2">
                                    <p>VIAJACHIDO.COM</p>
                                    <svg class="stateSvg" style="color:green" data-id="1" data-state="activate" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1.146 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                
            </div>
            

            <div id="section2" class="none">
                
                
            </div>

        </div>
        

    </div>
</body>

</html>


