<!DOCTYPE HTML>
<html lang="es" prefix="og: https://ogp.me/ns#">
    <head>
        <meta property="og:url" content="" >
        <meta property="og:type" content="website" >
        <meta property="og:title" content="Perfil del visitante" >
        <meta property="og:description" content="Encuesta destinada a crear un perfil de nuestra visitantes de ciudad Guachochi" >
        <meta property="og:image" content="" >

        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
        <script src="../node_modules/geolib/lib/index.js"></script>
        
        <?php include_once("../phpAssets/head.php"); ?>
        
        <title>Inicio</title>
        <style>
            .contLogosImg,  .contLogosImg2{
                background-image: url(../_images/batopilas.jpg);
            }
        </style>
    </head>

    <body>
    <?php include_once("../phpAssets/analytics.php"); ?>
    <?php include_once("../phpAssets/header.php"); ?>


            <!-- ------ seccion 2 de la encusta --------- -->
             <div id="sectionPort">
                <div class="degradadoPort"></div>
                <div class="contLogosImg">
                    <div class="contLogosPor">
                        <img style="width:15vh" src="../_images/logo-st.png" alt="">
                        <img style="width:7.5vh" src="../_images/logoSichitur.png" alt="">
                        <!-- <img style="width:13vh" src="../_images/_svg/asocHotel.svg" alt=""> -->
                        
                    </div>
                </div>

                <div class="contTextTitle">
                    <h3>Encuesta del visitante</h3>
                    <h4>Visitor survey</h4>
                    <p>Por favor responde las siguientes preguntas / <span>Please answer the following questions:</span></p>
                </div>
             </div>
    
    <div id="section2" class="cont-general" style="">
         <div  class="align-enc" >
           <!-- <div class="title-enc"> 
                 <h1>Encuesta del visitante / Visitor survey</h1> 
            </div>    -->

            <div class="cont-questions">
                

                    <!-- ------------------------------------------------------- -->
                    <div class="part1" style="display:none;">
                        <form class="form-questions">
                        <input type="hidden" name="part-enc" class="parteEncuesta" value="1">
                            <input type="hidden" name="municipio" class="municipio" value="7">
                            <!-- <input type="hidden" name="hotel" id="hotel" class="" value=""> -->
                            
                            <div class="qs-general checkRadio" data-id-pregunta="139">
                                <h3><span class="number" style="padding: 7px 15px;">1</span> Género <span style="color:red;">*</span> <br> (Gender)</h3>
                                <label ><input type="radio" id="" name="genero" value="mujer" class=""  />Mujer (Woman)</label>
                                <label ><input type="radio" id="" name="genero" value="hombre"  />Hombre (Man)</label>
                                <label ><input type="radio" id="" name="genero" value="None"  />Prefiero no decirlo (I'd rather not disclose)</label>
    
                                <!-- <select name="genero" class="options required" data-id-pregunta="23">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="mujer">Mujer (Woman)</option>
                                    <option value="hombre">Hombre (Man)</option>
                                    <option value="none">Prefiero no decirlo (I prefer not to say)</option>
                                </select> -->

                            </div>

                            <div class="qs-general checkbox" data-id-pregunta="153">
                                <h3><span class="number">2</span> ¿Qué transporte utilizó para llegar? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción </span>  <br>(What type of transportation did you use to arrive?<span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;"> Check all that apply </span>)</h3>
                                <label ><input type="checkbox" name="transporte" value="Autobus" id="">Autobús (Bus)</label>
                                <label ><input type="checkbox" name="transporte" value="Bicicleta" id="">Bicicleta (Bicycle)</label>
                                <label ><input type="checkbox" name="transporte" value="Motocicleta" id="">Motocicleta (Motorcycle)</label>
                                <label ><input type="checkbox" name="transporte" value="Automovil-particular" id="">Automovil particular (Private car)</label>
                                <label ><input type="checkbox" name="transporte" value="Vehículo-de-agencia-de-viajes" id="">Vehículo de la agencia de viajes (Travel agency vehicle)</label>
                                
                            </div>
                            
                            <div class="qs-general">
                                <h3><span class="number">3</span> ¿Cuántos días se quedará en la región?  <span style="color:red;">*</span><br> (How long are you staying in the town?)</h3>
                                <select name="" class="options required" data-id-pregunta="152">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="1-dia">1 día (Day)</option>
                                    <option value="2-a-3-dias">2 - 3 días (Days)</option>
                                    <option value="4-a-6-dias">4 - 6 días (Days)</option>
                                    <option value="7-o-mas-dias">7 o más días (Days or more)</option>
                                </select>
                            </div>

                            <div class="qs-general">
                                <h3><span class="number">4</span>  ¿Cuántas veces ha visitado este destino? <span style="color:red;">*</span> <br> (How many times have you visited this destination?)</h3>
                                <select name="" class="options required" data-id-pregunta="151">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="Primera-vez">Primera vez (First time)</option>
                                    <option value="Dos-veces">Dos veces (Twice)</option>
                                    <option value="Tres-veces-o-mas">Tres veces o mas (three or more)</option>
                                </select>
                            </div>

                            <div class="qs-general checkbox" data-id-pregunta="154">
                                <h3><span class="number">5</span> ¿Cúal es el motivo de tu viaje? <span style="color:red;">*  </span> <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción </span>  <br>(What is your reason for travelling?<span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;"> Check all that apply </span>)</h3>
                                <label ><input type="checkbox" name="motivo-del-viaje" value="Negocios-o-reuniones" id="">Negocios o reuniones (Business, convention or expo)</label>
                                <label ><input type="checkbox" name="motivo-del-viaje" value="Evento-deportivo" id="">Evento deportivo (Sport events)</label>
                                <label ><input type="checkbox" name="motivo-del-viaje" value="Turismo-naturaleza-de-aventura-ecoturismo" id="">Turismo de naturaleza, de aventura, ecoturismo (Nature tourism, adventure tourism,ecotourism)</label>
                                <label ><input type="checkbox" name="motivo-del-viaje" value="Visita-a-familiares/-amigos" id="">Visita a familiares y amigos (Family or friends visit)</label>
                                <label ><input type="checkbox" name="motivo-del-viaje" value="Turismo-cultural-gastronomico" id="">Turismo cultural, rural, gastronómico, enoturismo (Cultural, rural, gastronomic tourism, wine tourism)</label>
                            </div>
                            <div class="qs-general checkbox" data-id-pregunta="155">
                                <h3><span class="number">6</span> ¿Qué actividades realizó  en este viaje?  <span style="color:red;">*  </span> <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción </span>  <br>(What activities did you do on this trip?  <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;"> Check all that apply </span>)</h3>
                                
                                <label ><input type="checkbox" name="actividades-realizo" value="Caminatas" id="">Caminatas (Hikes)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Paseos-a-caballo " id="">Paseos a caballo (Horse back rinding tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Paseos-en-cuatrimotos-y-4x4" id="">Paseos en cuatrimotos y 4x4 (ATVs tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Paseos-en-bicicletas" id="">Paseos en bicicletas (MTB tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Observación-de-flora-y-fauna" id="">Observación de flora y fauna (Flora & fauna tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Observación-sideral" id="">Observación sideral (Sky observation tour)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Paseos-teatrales" id="">Paseos teatrales (Theatrical tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Muestras-gastronómicas" id="">Muestras gastronómicas (Food tastings or cooking workshops)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Actividad-cultural-con-pueblos-originarioss" id="">Actividad cultural con pueblos originarios (Cultural immersion with indigenous cultures)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Talleres-artesanales" id="">Talleres artesanales (Traditional hand crafts workshop)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Conciertos-y-festivales-de-música" id="">Conciertos y festivales de música (Concerts & musical festivals)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Paseo-en-vehículo" id="">Paseo en vehículo (Vehicle ride)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Otra" id="">Otra (Other)</label>
                            </div>

                            
                            <div class="avisoPriv">
                                <p>Al enviar esta encuesta, confirmas haber leído y entendido nuestro <a target="_blank" href="../_pdf/Aviso de privacidad.pdf">Aviso de Privacidad</a></p>
                            </div>

                            <div class="cont-butt-env"> 
                                <input class="but-env" type="submit" value="Enviar">
                            </div>

                        </form>
                    </div>

                        

                    <!-- ------------------------------------------------------------------------------------------------- -->
               
                    <div class="part2" style="display:none;">     
                        <form class="form-questions" >
                            <input type="hidden" name="part-enc" class="parteEncuesta" value="2">
                            <input type="hidden" name="municipio" class="municipio" value="7">
                            <!-- <input type="hidden" name="hotel" id="hotel" value=""> -->
                        
                            <div class="qs-general">
                                <h3><span class="number" style="padding: 7px 15px;">1</span> Edad  <span style="color:red;">*</span> <br> (Age)</h3>
                                <select name="edad" class="options required" data-id-pregunta="140">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="18-25">18 - 25</option>
                                    <option value="26-35">26 - 35</option>
                                    <option value="36-45">36 - 45</option>
                                    <option value="46-55">46 - 55</option>
                                    <option value="56-65">56 - 65</option>
                                    <option value="56-65">66 o mas (or more)</option>
                                    <option value="Prefiero-no-decirlo">Prefiero no decirlo (I'd rather not disclose)</option>
                                </select>
                            </div>

                            
                            <div class="qs-general">
                                <h3><span class="number">2</span> ¿A qué se dedica? <span style="color:red;">*</span> <br> (What do you do for a living?)</h3>
                                <select name="" class="options required" data-id-pregunta="147">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="Estudiante">Estudiante (Student)</option>
                                    <option value="Empleado">Empleado (Employee)</option>
                                    <option value="Empresario">Empresario (CEO/Manager)</option>
                                    <option value="Jubilado">Jubilado (Retired)</option>
                                    <option value="Servidor-Publico">Servidor público (Public servant)</option>
                                    <option value="Otros">Otros (Other)</option>
                                </select>
                            </div>

                            <div class="qs-general">
                                <h3><span class="number">3</span> Nivel académico <span style="color:red;">*</span> <br> (Educational level)</h3>
                                <select name="" class="options required" data-id-pregunta="146">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="Primaria">Primaria (Elementary school)</option>
                                    <option value="Secundaria">Secundaria (Middle school)</option>
                                    <option value="Preparatoria">Preparatoria (High school)</option>
                                    <option value="Carrera-técnica">Carrera técnica (Technical degree)</option>
                                    <option value="Carrera-universitaria">Carrera universitaria (College degree)</option>
                                    <option value="Posgrado">Posgrado (MBA or PhD)</option>
                                </select>
                            </div>

                            <div class="qs-general checkbox" data-id-pregunta="150">
                                <h3><span class="number">4</span> ¿Cómo se enteró del destino? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción </span>  <br>(How did you find out about the location<span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;"> Check all that apply </span>)</h3>
                                <label ><input type="checkbox" name="como-se-entero" value="Redes-Sociales" id="">Redes Sociales (Social media)</label>
                                <label ><input type="checkbox" name="como-se-entero" value="Recomendacion" id="">Recomendación (Word of mouth)</label>
                                <label ><input type="checkbox" name="como-se-entero" value="Internet" id="">Internet</label>
                                <label ><input type="checkbox" name="como-se-entero" value="Visita-previa" id="">Visita previa (Previous visit)</label>
                                <label ><input type="checkbox" name="como-se-entero" value="Ferias/exposiciones" id="">Ferias y exposiciones (Expos & trade shows)</label>
                                <label ><input type="checkbox" name="como-se-entero" value="Agencia-de-viajes" id="">Agencia de viajes (Travel agency)</label>
                                <label ><input type="checkbox" name="como-se-entero" value="Medios-impresos" id="">Medios impresos (Printed media)</label>
                                <label ><input type="checkbox" name="como-se-entero" value="Radio-o-Televisión" id="">Radio o Televisión (Radio or TV)</label>
                            </div>

                            <div class="qs-general checkbox" data-id-pregunta="156">
                                    <h3><span class="number">5</span> ¿Qué otras actividades le hubiese gustado encontrar?   <span style="color:red;">*  </span> <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción </span>  <br>(What other activities would you have liked to experience? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;"> Check all that apply </span>)</h3>
                                    <label ><input type="checkbox" name="actividades-realizo" value="Paseos-teatrales" id="">Paseos teatrales (Theatrical tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Caminatas" id="">Caminatas (Hikes)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Paseos-a-caballo " id="">Paseos a caballo (Horse back rinding tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Paseos-en-cuatrimotos-y-4x4" id="">Paseos en cuatrimotos y 4x4 (ATVs tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Paseos-en-bicicletas" id="">Paseos en bicicletas (MTB tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Observación-de-flora-y-fauna" id="">Observación de flora y fauna (Flora & fauna tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Observación-sideral" id="">Observación sideral (Sky observation tour)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Muestras-gastronómicas" id="">Muestras gastronómicas (Food tastings or cooking workshops)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Recorridos-y-catas-de-vino-o-sotol" id="">Recorridos y catas de vino o sotol (Wine tasting & tours)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Actividades-acuáticas" id="">Actividades acuáticas (Water activities)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Conciertos-y-festivales-de-música" id="">Conciertos y festivales de música (Concerts & musical festivals)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Actividad-cultural-con-pueblos-originarioss" id="">Actividad cultural con pueblos originarios (Cultural immersion with indigenous cultures)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Atracciones-para-niños" id="">Atracciones para niños (Children's attractions)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Callejoneadas" id="">Callejoneadas (Street parties)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Comida-típica-chihuahuense" id="">Comida típica chihuahuense (Chihuahua's regional food)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Senderismo" id="">Senderismo (Hiking)</label>
                                <label ><input type="checkbox" name="actividades-realizo" value="Otra" id="">Otra (Other)</label>
                            </div>


                            <div class="avisoPriv">
                                <p>Al enviar esta encuesta, confirmas haber leído y entendido nuestro <a target="_blank" href="../_pdf/Aviso de privacidad.pdf">Aviso de Privacidad</a></p>
                            </div>
                            
                            <div class="cont-butt-env">
                                <input class="but-env" type="submit" value="Enviar">
                            </div>

                        </form>
                    </div>

                    <!-- ------------------------------------------------------- -->
                    <div class="part3" style="display:none;">
                        <form class="form-questions preguntas" >
                            <input type="hidden" name="part-enc" class="parteEncuesta" value="3">
                            <input type="hidden" name="municipio" class="municipio" value="7">
                            <!-- <input type="hidden" name="hotel" id="hotel" value=""> -->

                            <div class="qs-general checkRadio pregunta pregunta-activa" data-preg="1" data-id-pregunta="141">
                                <h3><span class="number" style="padding: 7px 15px;">1</span> Nacionalidad <span style="color:red;">*</span> <br> (Nationality)</h3>
                                <label ><input type="radio" id="" name="nacionalidad" value="Internacional" />Internacional (External)</label>
                                <label ><input type="radio" id="" name="nacionalidad" value="Mexico" />México (Mexico)</label>

                            </div>

                            <div class="qs-general">
                                <h3><span class="number">2</span> Lugar de Residencia  <span style="color:red;">*</span> <br> (Place of residence)</h3>
                                <select id="inter" name="pais" class="options required" style="display:none;" data-id-pregunta="142">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="Estados-Unidos">Estados Unidos (United States)</option>
                                    <option value="Alemania">Alemania (Germany)</option>
                                    <option value="Brasil">Brasil (Brazil)</option>
                                    <option value="Canadá">Canadá (Canada)</option>
                                    <option value="China">China (China)</option>
                                    <option value="Colombia">Colombia (Colombia)</option>
                                    <option value="Francia">Francia (France)</option>
                                    <option value="Italia">Italia (Italy)</option>
                                    <option value="Panamá">Panamá (Panama)</option>
                                    <option value="Perú">Perú (Peru)</option>
                                    <option value="Puerto-Rico">Puerto Rico (Puerto Rico)</option>
                                    <option value="Rusia">Rusia (Russia)</option>
                                    <option value="Suiza">Suiza (Switzerland)</option>
                                    <option value="Afganistán">Afganistán (Afghanistan)</option>
                                    <option value="Albania">Albania (Albania)</option>
                                    <option value="Andorra">Andorra (Andorra)</option>
                                    <option value="Angola">Angola (Angola)</option>
                                    <option value="Anguilla">Anguilla (Anguilla)</option>
                                    <option value="Antártida">Antártida (Antarctica)</option>
                                    <option value="Antigua-y-Barbuda">Antigua y Barbuda (Antigua and Barbuda)</option>
                                    <option value="Antillas-Holandesas">Antillas Holandesas (Netherlands Antilles)</option>
                                    <option value="Arabia-Saudita">Arabia Saudita (Saudi Arabia)</option>
                                    <option value="Argelia">Argelia (Algeria)</option>
                                    <option value="Argentina">Argentina (Argentina)</option>
                                    <option value="Armenia">Armenia (Armenia)</option>
                                    <option value="Aruba">Aruba (Aruba)</option>
                                    <option value="Australia">Australia (Australia)</option>
                                    <option value="Austria">Austria (Austria)</option>
                                    <option value="Azerbaiyán">Azerbaiyán (Azerbaijan)</option>
                                    <option value="Bahamas">Bahamas (Bahamas)</option>
                                    <option value="Bangladesh">Bangladesh (Bangladesh)</option>
                                    <option value="Barbados">Barbados (Barbados)</option>
                                    <option value="Baréin">Baréin (Bahrain)</option>
                                    <option value="Bélgica">Bélgica (Belgium)</option>
                                    <option value="Belice">Belice (Belize)</option>
                                    <option value="Benín">Benín (Benin)</option>
                                    <option value="Bermudas">Bermudas (Bermuda)</option>
                                    <option value="Bielorrusia">Bielorrusia (Belarus)</option>
                                    <option value="Bolivia">Bolivia (Bolivia)</option>
                                    <option value="Bosnia-y-Herzegovina">Bosnia-Herzegovina (Bosnia and Herzegovina)</option>
                                    <option value="Botsuana">Botsuana (Botswana)</option>
                                    <option value="Brunei-Darussalam">Brunei Darussalam (Brunei Darussalam)</option>
                                    <option value="Bulgaria">Bulgaria (Bulgaria)</option>
                                    <option value="Burkina-Faso">Burkina Faso (Burkina Faso)</option>
                                    <option value="Burundi">Burundi (Burundi)</option>
                                    <option value="Bután">Bután (Bhutan)</option>
                                    <option value="Cabo-Verde">Cabo Verde (Cape Verde)</option>
                                    <option value="Camboya">Camboya (Cambodia)</option>
                                    <option value="Camerún">Camerún (Cameroon)</option>
                                    <option value="Chad">Chad (Chad)</option>
                                    <option value="Chile">Chile (Chile)</option>
                                    <option value="Chipre">Chipre (Cyprus)</option>
                                    <option value="Ciudad-del-Vaticano">Ciudad del Vaticano (Vatican City)</option>
                                    <option value="Comores">Comores (Comoros)</option>
                                    <option value="Corea-del-Norte">Corea del Norte (North Korea)</option>
                                    <option value="Corea-del-Sur">Corea del Sur (South Korea)</option>
                                    <option value="Costa-de-Marfil">Costa de Marfil (Ivory Coast (Cote d'Ivoire))</option>
                                    <option value="Costa-Rica">Costa Rica (Costa Rica)</option>
                                    <option value="Croacia">Croacia (Croatia)</option>
                                    <option value="Cuba">Cuba (Cuba)</option>
                                    <option value="Dinamarca">Dinamarca (Denmark)</option>
                                    <option value="Djibouti">Djibouti, Yibuti (Djibouti)</option>
                                    <option value="Dominica">Dominica (Dominica)</option>
                                    <option value="Ecuador">Ecuador (Ecuador)</option>
                                    <option value="Egipto">Egipto (Egypt)</option>
                                    <option value="El-Salvador">El Salvador (El Salvador)</option>
                                    <option value="Emiratos">Emiratos Árabes Unidos (United Arab Emirates)</option>
                                    <option value="Eritrea">Eritrea (Eritrea)</option>
                                    <option value="Eslovaquia">Eslovaquia (Slovakia (Slovak Republic))</option>
                                    <option value="Eslovenia">Eslovenia (Slovenia)</option>
                                    <option value="España">España (Spain)</option>
                                    <option value="Estonia">Estonia (Estonia)</option>
                                    <option value="Etiopía">Etiopía (Ethiopia)</option>
                                    <option value="Filipinas">Filipinas (Philippines)</option>
                                    <option value="Finlandia">Finlandia (Finland)</option>
                                    <option value="Fiyi">Fiyi (Fiji)</option>
                                    <option value="Gabón">Gabón (Gabon)</option>
                                    <option value="Gambia">Gambia (The Gambia)</option>
                                    <option value="Georgia">Georgia (Georgia)</option>
                                    <option value="Ghana">Ghana (Ghana)</option>
                                    <option value="Gibraltar">Gibraltar (Gibraltar)</option>
                                    <option value="Granada">Granada (Grenada)</option>
                                    <option value="Grecia">Grecia (Greece)</option>
                                    <option value="Groenlandia">Groenlandia (Greenland)</option>
                                    <option value="Guadalupe">Guadalupe (Guadeloupe)</option>
                                    <option value="Guam">Guam (Guam)</option>
                                    <option value="Guatemala">Guatemala (Guatemala)</option>
                                    <option value="Guayana-Francesa">Guayana Francesa (French Guiana)</option>
                                    <option value="Guinea">Guinea (Guinea)</option>
                                    <option value="Guinea-Ecuatorial">Guinea Ecuatorial (Equatorial Guinea)</option>
                                    <option value="Guinea-Bisáu">Guinea-Bisáu (Guinea-Bissau)</option>
                                    <option value="Guyana">Guyana (Guyana)</option>
                                    <option value="Haití">Haití (Haiti)</option>
                                    <option value="Honduras">Honduras (Honduras)</option>
                                    <option value="Hong-Kong">Hong Kong (Hong Kong)</option>
                                    <option value="Hungría">Hungría (Hungary)</option>
                                    <option value="India">India (India)</option>
                                    <option value="Indonesia">Indonesia (Indonesia)</option>
                                    <option value="Irán">Irán (Iran (Islamic Republic of))</option>
                                    <option value="Iraq">Iraq (Iraq)</option>
                                    <option value="Irlanda">Irlanda (Ireland)</option>
                                    <option value="Isla-de-Navidad">Isla de Navidad, Isla Christmas (Christmas Island)</option>
                                    <option value="Isla-Pitcairn">Isla Pitcairn (Pitcairn Island)</option>
                                    <option value="Islandia">Islandia (Iceland)</option>
                                    <option value="Irán">Irán (Iran)</option>
                                    <option value="Irlanda">Irlanda (Ireland)</option>
                                    <option value="Islandia">Islandia (Iceland)</option>
                                    <option value="Islas-Caimán">Islas Caimán (Cayman Islands)</option>
                                    <option value="Islas-Cocos">Islas Cocos (Cocos (Keeling) Islands)</option>
                                    <option value="Islas-Cook">Islas Cook (Cook Islands)</option>
                                    <option value="Islas-Feroe">Islas Feroe (Faroe Islands)</option>
                                    <option value="Islas-Malvinas">Islas Malvinas (Falkland Islands)</option>
                                    <option value="Islas-Marianas-del-Norte">Islas Marianas del Norte (Northern Mariana Islands)</option>
                                    <option value="Islas-Marshall">Islas Marshall (Marshall Islands)</option>
                                    <option value="Islas-Salomón">Islas Salomón (Solomon Islands)</option>
                                    <option value="Islas-Turcas-y-Caicos">Islas Turcas y Caicos (Turks and Caicos Islands)</option>
                                    <option value="Islas-Virgenes-Británicas">Islas Virgenes Británicas (Virgin Islands (British))</option>
                                    <option value="Islas-Vírgenes-de-los-Estados-Unidos">Islas Vírgenes de los Estados Unidos (Virgin Islands (U.S.A.))</option>
                                    <option value="Israel">Israel (Israel)</option>
                                    <option value="Jamaica">Jamaica (Jamaica)</option>
                                    <option value="Japón">Japón (Japan)</option>
                                    <option value="Jordania">Jordania (Jordan)</option>
                                    <option value="Kazajistán">Kazajistán (Kazakhstan)</option>
                                    <option value="Kenia">Kenia (Kenya)</option>
                                    <option value="Kirguistán">Kirguistán (Kyrgyzstan)</option>
                                    <option value="Kiribati">Kiribati (Kiribati)</option>
                                    <option value="Kosovo">Kosovo (Kosovo)</option>
                                    <option value="Kuwait">Kuwait (Kuwait)</option>
                                    <option value="Laos">Laos (República Democrática Popular) (Laos, People's Democratic Republic)</option>
                                    <option value="Lesoto">Lesoto (Lesotho)</option>
                                    <option value="Letonia">Letonia (Latvia)</option>
                                    <option value="Líbano">Líbano (Lebanon)</option>
                                    <option value="Liberia">Liberia (Liberia)</option>
                                    <option value="Libia">Libia (Libya)</option>
                                    <option value="Liechtenstein">Liechtenstein (Liechtenstein)</option>
                                    <option value="Lituania">Lituania</option>
                                    <option value="Luxemburgo">Luxemburgo (Luxembourg)</option>
                                    <option value="Macao">Macao (Macau)</option>
                                    <option value="Macedonia-del-Norte">Macedonia del Norte (North Macedonia)</option>
                                    <option value="Madagascar">Madagascar (Madagascar)</option>
                                    <option value="Malasia">Malasia (Malaysia)</option>
                                    <option value="Malawi">Malawi (Malawi)</option>
                                    <option value="Maldivas">Maldivas (Maldives)</option>
                                    <option value="Mali">Malí (Mali)</option>
                                    <option value="Malta">Malta (Malta)</option>
                                    <option value="Marruecos">Marruecos (Morocco)</option>
                                    <option value="Martinica">Martinica (Martinique)</option>
                                    <option value="Mauricio">Mauricio (Mauritius)</option>
                                    <option value="Mauritania">Mauritania (Mauritania)</option>
                                    <option value="Mayotte">Mayotte (Mayotte)</option>
                                    <option value="Micronesia">Micronesia (Micronesia)</option>
                                    <option value="Moldavia">Moldavia (Moldova)</option>
                                    <option value="Mónaco">Mónaco (Monaco)</option>
                                    <option value="Mongolia">Mongolia (Mongolia)</option>
                                    <option value="Montenegro">Montenegro (Montenegro)</option>
                                    <option value="Montserrat">Montserrat (Montserrat)</option>
                                    <option value="Mozambique">Mozambique (Mozambique)</option>
                                    <option value="Namibia">Namibia (Namibia)</option>
                                    <option value="Nauru">Nauru (Nauru)</option>
                                    <option value="Nepal">Nepal (Nepal)</option>
                                    <option value="Nicaragua">Nicaragua (Nicaragua)</option>
                                    <option value="Níger">Níger (Niger)</option>
                                    <option value="Nigeria">Nigeria (Nigeria)</option>
                                    <option value="Niue">Niue (Niue)</option>
                                    <option value="Noruega">Noruega (Norway)</option>
                                    <option value="Nueva-Caledonia">Nueva Caledonia (New Caledonia)</option>
                                    <option value="Nueva-Zelanda">Nueva Zelanda (New Zealand)</option>
                                    <option value="Omán">Omán (Oman)</option>
                                    <option value="Países-Bajos">Países Bajos (Netherlands)</option>
                                    <option value="Pakistán">Pakistán (Pakistan)</option>
                                    <option value="Palau">Palau (Palau)</option>
                                    <option value="Palestina">Palestina (Palestine)</option>
                                    <option value="Papúa-Nueva-Guinea">Papúa Nueva Guinea (Papua New Guinea)</option>
                                    <option value="Paraguay">Paraguay (Paraguay)</option>
                                    <option value="Polinesia-Francesa">Polinesia Francesa (French Polynesia)</option>
                                    <option value="Polonia">Polonia (Poland)</option>
                                    <option value="Portugal">Portugal (Portugal)</option>
                                    <option value="Qatar">Qatar (Qatar)</option>
                                    <option value="Reino-Unido">Reino Unido (United Kingdom)</option>
                                    <option value="Rep.-Centroafricana">República Centroafricana (Central African Republic)</option>
                                    <option value="Rep.-Checa">República Checa (Czech Republic)</option>
                                    <option value="Rep.-del-Congo">República del Congo (Congo, Republic of (Brazzaville))</option>
                                    <option value="Rep.-Democrática-del-Congo">República Democrática del Congo (Democratic Republic of the Congo)</option>
                                    <option value="Congo">Congo (Kinshasa)</option>
                                    <option value="Rep.-Dominicana">República Dominicana (Dominican Republic)</option>
                                    <option value="Reunión">Reunión (Réunion)</option>
                                    <option value="Ruanda">Ruanda (Rwanda)</option>
                                    <option value="Rumanía">Rumanía (Romania)</option>
                                    <option value="Sáhara-Occidental">Sáhara Occidental (Western Sahara)</option>
                                    <option value="Samoa">Samoa (Samoa)</option>
                                    <option value="Samoa-Americana">Samoa Americana (American Samoa)</option>
                                    <option value="San-Cristóbal-y-Nieves">San Cristóbal y Nieves (Saint Kitts and Nevis)</option>
                                    <option value="San-Marino">San Marino (San Marino)</option>
                                    <option value="San-Vicente-y-las-Granadinas">San Vicente y las Granadinas (Saint Vincent and the Grenadines)</option>
                                    <option value="Sta.-Lucía">Santa Lucía (Saint Lucia)</option>
                                    <option value="Sto-Tomé-y-Príncipe">Santo Tomé y Príncipe (Sao Tome and Principe)</option>
                                    <option value="Senegal">Senegal (Senegal)</option>
                                    <option value="Serbia">Serbia (Serbia)</option>
                                    <option value="Seychelles">Seychelles (Seychelles)</option>
                                    <option value="Sierra-Leona">Sierra Leona (Sierra Leone)</option>
                                    <option value="Singapur">Singapur (Singapore)</option>
                                    <option value="Siria">Siria (Syria, Syrian Arab Republic)</option>
                                    <option value="Somalia">Somalia (Somalia)</option>
                                    <option value="Sri-Lanka">Sri Lanka (Sri Lanka)</option>
                                    <option value="Suzilandia">Suzilandia, Esuatini (Swaziland (Eswatini))</option>
                                    <option value="Sudáfrica">Sudáfrica (South Africa)</option>
                                    <option value="Sudán">Sudán (Sudan)</option>
                                    <option value="Sudán-del-Sur">Sudán del Sur (South Sudan)</option>
                                    <option value="Suecia">Suecia (Sweden)</option>
                                    <option value="Surinam">Surinam (Suriname)</option>
                                    <option value="Tailandia">Tailandia (Thailand)</option>
                                    <option value="Taiwán">Taiwán (República de China) (Taiwan (Republic of China))</option>
                                    <option value="Tanzania">Tanzania (Tanzania)</option>
                                    <option value="Tayikistán">Tayikistán (Tajikistan)</option>
                                    <option value="Tíbet">Tíbet (Tibet)</option>
                                    <option value="Timor-Oriental">Timor Oriental (East Timor)</option>
                                    <option value="Togo">Togo (Togo)</option>
                                    <option value="Tokelau">Tokelau (Tokelau)</option>
                                    <option value="Tonga">Tonga (Tonga)</option>
                                    <option value="Trinidad-y-Tobago">Trinidad y Tobago (Trinidad and Tobago)</option>
                                    <option value="Túnez">Túnez (Tunisia)</option>
                                    <option value="Turkmenistán">Turkmenistán (Turkmenistan)</option>
                                    <option value="Turquía">Turquía (Turkey)</option>
                                    <option value="Turkmenistán">Turkmenistán (Turkmenistan)</option>
                                    <option value="Turquía">Turquía (Türkiye (Turkey))</option>
                                    <option value="Tuvalu">Tuvalu (Tuvalu)</option>
                                    <option value="Ucrania">Ucrania (Ukraine)</option>
                                    <option value="Uganda">Uganda (Uganda)</option>
                                    <option value="Uruguay">Uruguay (Uruguay)</option>
                                    <option value="Uzbekistán">Uzbekistán (Uzbekistan)</option>
                                    <option value="Vanuatu">Vanuatu (Vanuatu)</option>
                                    <option value="Venezuela">Venezuela (Venezuela)</option>
                                    <option value="Vietnam">Vietnam (Vietnam)</option>
                                    <option value="Wallis-y-Futuna">Wallis y Futuna (Wallis and Futuna Islands)</option>
                                    <option value="Yemen">Yemen (Yemen)</option>
                                    <option value="Zambia">Zambia (Zambia)</option>
                                    <option value="Zimbabwe">Zimbabwe (Zimbabwe)</option>
                                </select>

                                <select  class="mexico" name="pais" class="options required" id="mexico" style="display:none;" data-id-pregunta="143">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="B. C.">Baja California</option>
                                    <option value="B. C. Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="CDMX">CDMX</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Coahuila">Coahuila de Zaragoza</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo">Estado de Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Edo-de-Mexico">Estado de México</option>
                                    <option value="Michoacan">Michoacán de Ocampo</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nvo-Leon">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Queretaro">Querétaro</option>
                                    <option value="Quintana-Roo">Quintana Roo</option>
                                    <option value="SLP">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz">Veracruz</option>
                                    <option value="Yukatan">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>

                            <div class="qs-general" id="estEU" style="display:none">
                                <h3><span class="number2">+</span> Dentro de EUA <span style="color:red;">*</span> <br> (USA)</h3>
                                <select name="" class="options united"  data-id-pregunta="144">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="Alabama">Alabama (Alebama)</option>
                                    <option value="Alaska">Alaska (Alaska)</option>
                                    <option value="Arizona">Arizona (Arizona)</option>
                                    <option value="Arkansas">Arkansas (Arkansas)</option>
                                    <option value="California">California (California)</option>
                                    <option value="Carolina-del-Norte">Carolina del Norte (North Carolina)</option>
                                    <option value="Carolina-del-Sur">Carolina del Sur (South Carolina)</option>
                                    <option value="Colorado">Colorado (Colorado)</option>
                                    <option value="Connecticut">Connecticut (Connecticut)</option>
                                    <option value="Dakota-del-Norte">Dakota del Norte (North Dakota)</option>
                                    <option value="Dakota-del-Sur">Dakota del Sur (South Dakota)</option>
                                    <option value="Delaware">Delaware (Delaware)</option>
                                    <option value="Illinois">Illinois (Illinois)</option>
                                    <option value="Indiana">Indiana (IN)</option>
                                    <option value="lowa">lowa (lowa)</option>
                                    <option value="Kansas">Kansas (Kansas)</option>
                                    <option value="Kentucky">Kentucky (kenucky)</option>
                                    <option value="Luisiana">Luisiana (Luisiana)</option>
                                    <option value="Maine">Maine (Maine)</option>
                                    <option value="Maryland">Maryland (Maryland)</option>
                                    <option value="Massachusetts ">Massachusetts  (Massachusetts )</option>
                                    <option value="Michigan">Michigan (Michigan)</option>
                                    <option value="Minnesota">Minnesota (Minesota)</option>
                                    <option value="Misispi">Misispi (Mississippi)</option>
                                    <option value="Misuri">Misuri (MISSOURI)</option>
                                    <option value="Montana">Montana (Montana)</option>
                                    <option value="Nebraska">Nebraska (Nebraska)</option>
                                    <option value="Nevada">Nevada (Nevada)</option>
                                    <option value="Nva-Jersey">Nueva Jersey (New jersey)</option>
                                    <option value="Nva-York">Nueva York (New York)</option>
                                    <option value="Nvo-Hampshire ">Nuevo Hampshire (New Hampshire)</option>
                                    <option value="Nvo-Mexico">Nuevo Mexico (New Mexico)</option>
                                    <option value="Ohio">Ohio (Ohio)</option>
                                    <option value="Oklahoma">Oklahoma (Oklahoma)</option>
                                    <option value="Oregon">Oregón (Oregon)</option>
                                    <option value="Pensilvania">Pensilvania (Pennsylvania)</option>
                                    <option value="Rhode-Island">Rhode Island (Rhode Island)</option>
                                    <option value="Tennessee">Tennessee (Tennessee)</option>
                                    <option value="Texas">Texas (Texas)</option>
                                    <option value="Utah">Utah (Utah)</option>
                                    <option value="Vermont">Vermont (Vermont)</option>
                                    <option value="Virginia">Virginia (Virginia)</option>
                                    <option value="Virginia-Occidental">Virginia Occidental (West Virginia)</option>
                                    <option value="Washington">Washington (Washington)</option>
                                    <option value="Wisconsin">Wisconsin (Wisconsin)</option>
                                    <option value="Wyoming">Wyoming (Wyoming)</option>
                                </select>
                            </div>

                            <div class="qs-general" id="estMex" style="display:none">
                                <h3><span class="number2">+</span> Dentro de Chihuahua <span style="color:red;">*</span> <br> (Chihuahua)</h3>
                                <select name="" style="width: 100%;" class="options mex"  data-id-pregunta="145">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="Ahumada">Ahumada</option>
                                    <option value="Aldama">Aldama</option>
                                    <option value="Allende">Allende</option>
                                    <option value="Aquiles-Serdán">Aquiles Serdán</option>
                                    <option value="Bachíniva">Bachíniva</option>
                                    <option value="Balleza">Balleza</option>
                                    <option value="Batopilas">Batopilas</option>
                                    <option value="Bocoyna">Bocoyna</option>
                                    <option value="Buenaventura">Buenaventura</option>
                                    <option value="Camargo">Camargo</option>
                                    <option value="Carichí">Carichí</option>
                                    <option value="Casas-Grandes">Casas Grandes</option>
                                    <option value="Cuauhtémoc">Cuauhtémoc</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Chínipas">Chínipas</option>
                                    <option value="Coronado">Coronado</option>
                                    <option value="Cusihuiriachi">Cusihuiriachi</option>
                                    <option value="Coyame">Coyame</option>
                                    <option value="Delicias">Delicias</option>
                                    <option value="Dr-Belisario-Domínguez">Dr. Belisario Domínguez</option>
                                    <option value="Galeana">Galeana</option>
                                    <option value="Santa-Isabel">Santa Isabel</option>
                                    <option value="Gómez-Farías">Gómez Farías</option>
                                    <option value="Gran-Morelos">Gran Morelos</option>
                                    <option value="Guachochi">Guachochi</option>
                                    <option value="Guadalupe">Guadalupe</option>
                                    <option value="Guadalupe-y-Calvo">Guadalupe y Calvo</option>
                                    <option value="Guazapares">Guazapares</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Hidalgo-del-Parral">Hidalgo del Parral</option>
                                    <option value="Huejotitán">Huejotitán</option>
                                    <option value="Ignacio-Zaragoza">Ignacio Zaragoza</option>
                                    <option value="Janos">Janos</option>
                                    <option value="Jiménez">Jiménez</option>
                                    <option value="Juárez">Juárez</option>
                                    <option value="Julimes">Julimes</option>
                                    <option value="López">López</option>
                                    <option value="Madera">Madera</option>
                                    <option value="Maguarichi">Maguarichi</option>
                                    <option value="Manuel-Benavides">Manuel Benavides</option>
                                    <option value="Matachí">Matachí</option>
                                    <option value="Matamoros">Matamoros</option>
                                    <option value="Meoqui">Meoqui</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Moris">Moris</option>
                                    <option value="Namiquipa">Namiquipa</option>
                                    <option value="Nonoava">Nonoava</option>
                                    <option value="Nuevo-Casas-Grandes">Nuevo Casas Grandes</option>
                                    <option value="Ocampo">Ocampo</option>
                                    <option value="Ojinaga">Ojinaga</option>
                                    <option value="Praxedis-G-Guerrero">Praxedis G. Guerrero</option>
                                    <option value="Riva-Palacio">Riva Palacio</option>
                                    <option value="Rosales">Rosales</option>
                                    <option value="Rosario">Rosario</option>
                                    <option value="San-Fco-de-Borja">San Francisco de Borja</option>
                                    <option value="San-Fco-de-Conchos">San Francisco de Conchos</option>
                                    <option value="San-Fco-del-Oro">San Francisco del Oro</option>
                                    <option value="Santa-Bárbara">Santa Bárbara</option>
                                    <option value="Satevó">Satevó</option>
                                    <option value="Saucillo">Saucillo</option>
                                    <option value="Temósachic">Temósachic</option>
                                    <option value="El-Tule">El-Tule</option>
                                    <option value="Urique">Urique</option>
                                    <option value="Uruachi">Uruachi</option>
                                    <option value="Valle-de-Zaragoza">Valle de Zaragoza</option>
                                </select>
                            </div>

                            <div class="qs-general checkRadio pregunta" data-id-pregunta="148">
                                <h3><span class="number">3</span> ¿Con cuántas personas viaja?  <span style="color:red;">*</span> <br>(How many people are you traveling with?)</h3>
                                <label ><input type="radio" id="" name="cantPerson" value="Ninguna"/>Ninguna (None)</label>
                                <label ><input type="radio" id="" name="cantPerson" value="1-persona"/>1 persona (Person)</label>
                                <label ><input type="radio" id="" name="cantPerson" value="2-a-3-personas"/>2 - 3 personas (2 - 3 persons)</label>
                                <label ><input type="radio" id="" name="cantPerson" value="3-a-4 personas"/>3 - 4 personas (3 - 4 persons)</label>
                                <label ><input type="radio" id="" name="cantPerson" value="4-o-mas"/>4 o mas (4 or more)</label>
                            </div>

                            <div class="qs-general pregunta" style="display:none" data-preg="6" id="whyPersonVis">
                                <h3><span class="number2">+</span> ¿Quiénes conforman el grupo de viaje? <span style="color:red;">*</span><br> (Who makes up the travel group?) </h3>
                                <select name=""  style="width: 100%;" class="options" id="selPerson" data-id-pregunta="149">
                                    <option hidden="" value="">Seleciona un opción (Select an option)</option>
                                    <option value="Pareja">Pareja (Spouse/couple)</option>
                                    <option value="Amigos-o-parientes">Amigos o parientes (Friends or relatives)</option>
                                    <option value="Colegas-de-trabajo">Colegas de trabajo (Co-workers)</option>
                                    <option value="Familia">Familia (Family)</option>
                                    <option value="Tour-de-viaje">Tour de viaje (Travel tour)</option>
                                </select>
                            </div>

                            <div class="qs-general checkbox" data-id-pregunta="157">
                                    <h3><span class="number">4</span> ¿Qué otros elementos le hubiera gustado encontrar en la región?    <span style="color:red;">*  </span> <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción </span>  <br>(Which other elements would you have liked to find? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;"> Check all that apply </span>)</h3>
                                    <label ><input type="checkbox"  name="elementos-quisiese-encontrar" value="Horarios-extendidos-para-restaurantes" id="">Horarios extendidos para restaurantes y cafeterías (Restaurants & coffee shops open later)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Cajeros-automáticos" id="">Cajeros automáticos (ATM)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Wifi" id="">Wifi </label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Señal-de-datos" id="">Señal de datos para celular (Cell phone internet signal) </label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Botes-de-basura" id="">Botes de basura (Trash cans)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Áreas-de-descanso" id="">Áreas de descanso (Leisure areas)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Transporte-urbano" id="">Transporte urbano (Urban transport)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Señalética-urbana" id="">Señalética urbana  (Urban signage)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Baños-públicos" id="">Baños públicos (Public restrooms)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Taxis" id="">Taxis</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Módulos-de-información-turística">Módulos de información turística (Touristic information offices)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Comida-típica-chihuahuense" id="">Comida típica chihuahuense (Chihuahua typical food)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Campamentos" id="">Campamentos (Camping area)</label>
                                    <label ><input type="checkbox" name="elementos-quisiese-encontrar" value="Vida-nocturna" id="">Vida nocturna (Night-life)</label>
                            </div>


                            <div class="qs-general checkbox" data-i                       
                                    d-pregunta="158">
                                    <h3><span class="number">5</span> ¿Qué otros atractivos turísticos del estado te gustaría conocer?  <span style="color:red;">*  </span> <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción </span>  <br>(Which other attractions in Chihuahua would you like to visit? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;"> Check all that apply </span>)</h3>
                                    <label ><input type="checkbox"  name="atractivos-turisticos" value="Parque-Barrancas-del Cobre" id="">Parque Barrancas del Cobre (Copper Canyon Park)</label>
                                    <label ><input type="checkbox"  name="atractivos-turisticos" value="Otras-barrancas-y-cañones" id="">Otras barrancas y cañones (Other mayor canyons)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Cañón-del-Pegüis" id="">Cañón del Pegüis (Pegüis Canyon)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Paquimé" id="">Zona arqueológica de Paquimé (Paquimé archeological zone)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Cascada-de-Basaseachi" id="">Cascada de Basaseachi (Basaseachi waterfall)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Otras-Cascadas" id="">Otras Cascadas (Other waterfalls)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Pueblos-Mágicos" id="">Pueblos Mágicos: Batopilas, Casas Grandes, Creel, Parral (Magical towns)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Tren-Chepe" id="">Tren Chepe (Chepe train)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Dunas-de-Samalayuca">Dunas de Samalayuca (Samalayuca dunes)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Sitios-históricos" id="">Sitios históricos (historical sites)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Lago-de-Arareko" id="">Lago de Arareko (Arareko lake)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Museos" id="">Museos (Museums)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Cultura-Menonita" id="">Cultura Menonita (Menonite culture)</label>
                                    <label ><input type="checkbox" name="atractivos-turisticos" value="Ninguno" id="">Ninguno (None)</label>
                            </div>


                            <div class="avisoPriv">
                                <p>Al enviar esta encuesta, confirmas haber leído y entendido nuestro <a target="_blank" href="../_pdf/Aviso de privacidad.pdf">Aviso de Privacidad</a></p>
                            </div>
                            <div class="cont-butt-env"> 
                                <input class="but-env" type="submit" value="Enviar">
                            </div>

                        </form>
                    </div><!--  fin de parte 3 del formulario -->
            </div>
        </div>

        <div class="cont-pop none">
            <div id="sectionPort">
                <div class="degradadoPortFin"></div>
                <div class="contLogosImg2">
                    <div class="contLogosPor">
                        <img style="width:15vh" src="../_images/logo-st.png" alt="">
                        <img style="width:7.5vh" src="../_images/logoSichitur.png" alt="">
                        
                    </div>
                </div>

                <div class="contTextTitle fin">
                    <h3>¡Gracias por contestar nuestra encuesta! </h3>
                    <h4>Thanks for answering our survey!</h4>
                    <div class="lineFin"></div>
                    <h4 style="font-size: 1.1rem;font-weight: 100;">¡Tu beneficio te espera! Solo tienes que elegir y descargar el código qr para poder reclamar tu recompensa. </h4>
                    <h5>/ Your benefit awaits! Simply select and download the QR code to claim your reward.</h4>
                    <div class="timer"><span class="zeros">00:</span> <div class="caja ind">30</div><sub class="seg">Seg</sub></div>
                    <span style="margin-bottom: 20px;">Recompensa / Reward</span>
                    <button id="openQR" class="ind">Elegir/Choose</button>
                </div>
                
            </div>
            
        </div>
        
    </div>

    <script>

$(document).ready(function() {
    const section1 = document.getElementById('section1');
        const section2 = document.getElementById('section2');
        // const image = document.getElementById('arrow');
        const container = document.getElementById('big-container');
        var bodyElement = document.querySelector('body');
        //console.log(section1);
    
    let control = document.getElementById('arrow');
    console.log('click al arrow');
   // $('#arrow').trigger('click');
    setTimeout(() => {
                    var request;
                    //Abortamos cualquier solicitud actual
                    if (request) { request.abort(); }
                    request = $.ajax({
                        dataType: 'text',
                        url: '../_includes/_php/querys.php',
                        type: 'POST',
                        data: {partEnc: true, municipio: 7},
                        success: function(data) {
                            console.log(data);
                            var part1 = document.querySelector('.part1');
                            var part2 = document.querySelector('.part2');
                            var part3 = document.querySelector('.part3');
                            // Obtener la query string de la URL actual
                            const queryString = window.location.search;
                            // Crear un objeto URLSearchParams para manejar la query string
                            const urlParams = new URLSearchParams(queryString);
                            // Obtener el valor de la variable llamada "variable"
                            const hotelCLV = urlParams.get('hotel');
                            console.log(hotelCLV); 
                            console.log('clave de hotel');

                            // var inpHotel = document.getElementById("hotel");

                            // inpHotel.value = hotelCLV;
                            
                            if (data == 1) {
                                part2.style.display = 'block';
                                $('.part2 form').append('<input type="hidden" name="hotel" id="hotel" value="'+hotelCLV+'">');
                                //console.log(options);
                            } else if(data == 2) {
                                part3.style.display = 'block';
                                $('.part3 form').append('<input type="hidden" name="hotel" id="hotel" value="'+hotelCLV+'">');
                                
                                // divCont = part3;
                            } else if(data == 3) {
                                part1.style.display = 'block';
                                $('.part1 form').append('<input type="hidden" name="hotel" id="hotel" value="'+hotelCLV+'">');
                                // divCont = part1; 
                            }
                        }
                    });
                }, 100);




   
});
    
    </script>
        

         <?php include_once("../phpAssets/footer.php"); ?>
    
    </body>
</html>