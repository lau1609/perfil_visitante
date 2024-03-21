<!DOCTYPE HTML>
<html lang="es" prefix="og: https://ogp.me/ns#">
    <head>
        <meta property="og:url" content="" >
        <meta property="og:type" content="website" >
        <meta property="og:title" content="Verificación de Hidrocarburos" >
        <meta property="og:description" content="Bienvenidos a Verificación de hidrocarburos, estamos a tus órdenes." >
        <meta property="og:image" content="_images/OG.jpg" >
        
        <?php include_once("../phpAssets/head.php"); ?>
        
        <title>Inicio</title>
        <style>
            #section1{
                background: linear-gradient(128deg,#6c8454 25%,#a99754 75%);
            }

            body{
                background: #cebe7e;
            }

            .title-enc h1 {
                color: #393f29;
            }

            .but-env{
                padding: 8px 35px;
                color: white;
                background-color: #6c8454;
                border-radius: 5px;
                font-family: 'PublicSans';
                border-style: none;
                font-size: 1.1rem;
                }

            .but-env:hover{
                background-color: #a99754;
                transition: .4s;
                cursor: pointer;
            }
        </style>

    </head>
    <body>
    <?php include_once("../phpAssets/analytics.php"); ?>
    <?php include_once("../phpAssets/header.php"); ?>
    <div id="section1">
        <img src="../_images/_svg/log-aventura.avif" alt="">
            <h3 class="title-conect">¡Gracias por visitar El parque de Aventura!</h3>
            <span class="spa-title">'Vivelo para amarlo'</span>

            <div class="contImgConect"><svg id="arrow" xmlns="http://www.w3.org/2000/svg" width="74" height="74" viewBox="0 0 24 24">
                <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6z" fill="white"/>
                </svg>
            </div>
        </div>
            <!-- ------ seccion 2 de la encusta --------- -->
    
    <div id="section2" class="cont-general" style="">
        <div  class="align-enc" >
            <div class="title-enc">
                <h1>Encuesta del visitante / Visitor profile survey</h1>
            </div>    

            <div class="cont-questions">
                

                    <!-- ------------------------------------------------------- -->
                    <div class="part1" style="display:none;">
                        <form class="form-questions">
                        <input type="hidden" name="part-enc" class="parteEncuesta" value="1">
                            <input type="hidden" name="municipio" class="municipio" value="5">
                            
                            <div class="qs-general">
                                <h3>1.- Género <span style="color:red;">*</span> <br> (Gender)</h3>
                                <select name="genero" class="options required" data-id-pregunta="1">
                                    <option hidden="" value="">Seleciona una opción</option>
                                    <option value="mujer">Mujer (woman)</option>
                                    <option value="hombre">Hombre (Man)</option>
                                    <option value="none">Prefiero no decirlo (I prefer not to say)</option>
                                </select>
                            </div>

                            <div class="qs-general">
                                <h3>2.- Edad  <span style="color:red;">*</span> <br> (Age)</h3>
                                <select name="edad" class="options required" data-id-pregunta="2">
                                    <option hidden="" value="">Seleciona una opción</option>
                                    <option value="18-25">18 a 25</option>
                                    <option value="26-35">26 a 35</option>
                                    <option value="36-45">36 a 45</option>
                                    <option value="46-55">46 a 55</option>
                                    <option value="56-65">56 a 65</option>
                                    <option value="none">>Prefiero no decirlo (I prefer not to say)</option>
                                </select>
                            </div>

                            <div class="qs-general">
                                <h3>3.- Nacionalidad <span style="color:red;">*</span> <br> (Nationality)</h3>
                                <select name="nacionalidad" id="nacionalidad" class="options required" data-id-pregunta="3">
                                    <option hidden="" value="">Seleciona una opción</option>
                                    <option value="Internacional">Internacional (International)</option>
                                    <option value="Mexico">México (Mexico)</option>
                                </select>
                            </div>


                            <div class="qs-general">
                                <h3>4.- Lugar de Residencia  <span style="color:red;">*</span> <br> (Place of residence)</h3>
                                <select id="inter" name="pais" class="options required" style="display:none;" data-id-pregunta="4">
                                    <option hidden="" value="">Seleciona una opción</option>
                                    <option value="Afganistan">Afganistán (Afghanistan)</option>
                                    <option value="Albania">Albania (Albania)</option>
                                    <option value="Alemania">Alemania (Germany)</option>
                                    <option value="Andorra">Andorra (Andorra)</option>
                                    <option value="Angola">Angola (Angola)</option>
                                    <option value="Antigua/Barbuda">Antigua y Barbuda (Antigua & Barbuda)</option>
                                    <option value="Arabia-Saudita">Arabia Saudita (Saudi Arabi)</option>
                                    <option value="Argelia">Argelia (Algeria)</option>
                                    <option value="Argentina">Argentina (Argentina)</option>
                                    <option value="Armenia">Armenia (Armenia)</option>
                                    <option value="Australia">Australia (Australia)</option>
                                    <option value="Austria">Austria (Austria)</option>
                                    <option value="Azerbaiyán">Azerbaiyán (Azarbaijan)</option>
                                    <option value="Bahamas">Bahamas (The Bahamas)</option>
                                    <option value="Banglades">Bangladés (Bangladesh)</option>
                                    <option value="Barbados">Barbados (Barbados)</option>
                                    <option value="Barein">Baréin (Bahrain)</option>
                                    <option value="Bélgica">Bélgica (Belgium)</option>
                                    <option value="Belice">Belice (Belize)</option>
                                    <option value="Benín">Benín (Benin)</option>
                                    <option value="Bielorrusia">Bielorrusia (Belarus)</option>
                                    <option value="Birmania/Myanmar">Birmania/Myanmar (Burma)</option>
                                    <option value="Bolivia">Bolivia (Bolivia)</option>
                                    <option value="Bosnia/Herzegovina">Bosnia y Herzegovina (Bosnia & Herzegovina)</option>
                                    <option value="Botsuana">Botsuana (Botswana)</option>
                                    <option value="Brasil">Brasil (Brazil)</option>
                                    <option value="Brunei">Brunéi (Brunei)</option>
                                    <option value="Bulgaria">Bulgaria (Bulgaria)</option>
                                    <option value="Burkina-Faso">Burkina Faso (Burkina Faso)</option>
                                    <option value="Burundi">Burundi (Burundi)</option>
                                    <option value="Bután">Bután (Bhutan)</option>
                                    <option value="Cabo-Verde">Cabo Verde (Cabo Verde)</option>
                                    <option value="Camboya">Camboya (Cambodia)</option>
                                    <option value="Camerun">Camerún (Cameroon)</option>
                                    <option value="Canada">Canadá (Canada)</option>
                                    <option value="Catar">Catar (Qatar)</option>
                                    <option value="Chad">Chad (Chad)</option>
                                    <option value="Chile">Chile (Chile)</option>
                                    <option value="China">China (China)</option>
                                    <option value="Chipre">Chipre (Cyprus)</option>
                                    <option value="Ciudad-del-Vaticano">Ciudad del Vaticano (Holy See)</option>
                                    <option value="Colombia">Colombia (Colombia)</option>
                                    <option value="Comoras">Comoras (Comoros)</option>
                                    <option value="Corea-del-Norte">Corea del Norte (North Korea)</option>
                                    <option value="Corea-del-Sur">Corea del Sur (South Korea)</option>
                                    <option value="Costa-de-Marfil">Costa de Marfil (Cote d´Ivoire)</option>
                                    <option value="Costa-Rica">Costa Rica (Costa Rica)</option>
                                    <option value="Croacia">Croacia (Croatia)</option>
                                    <option value="Cuba">Cuba (Cuba)</option>
                                    <option value="Dinamarca">Dinamarca (Denmark)</option>
                                    <option value="Dominica">Dominica (Dominica)</option>
                                    <option value="Ecuador">Ecuador (Ecuador)</option>
                                    <option value="Egipto">Egipto (Egypt)</option>
                                    <option value="Salvador">El Salvador (El Salvador)</option>
                                    <option value="Emiratos-Arabes-Unidos">Emiratos Árabes Unidos (United Arab Emirates)</option>
                                    <option value="Eritrea">Eritrea (Eritrea)</option>
                                    <option value="Eslovaquia">Eslovaquia (Eslovakia)</option>
                                    <option value="Eslovenia">Eslovenia (Slovenia)</option>
                                    <option value="España">España (Spain)</option>
                                    <option value="Estados-Unidos">Estados Unidos (United States)</option>
                                    <option value="Estonia">Estonia (Estonia)</option>
                                    <option value="Etiopia">Etiopía (Ethiopia)</option>
                                    <option value="Filipinas">Filipinas (Philippines)</option>
                                    <option value="Finlandia">Finlandia (Finland)</option>
                                    <option value="Fiyi">Fiyi (Fiji)</option>
                                    <option value="Francia">Francia (Francia)</option>
                                    <option value="Gabon">Gabón (Gabon)</option>
                                    <option value="Gambia">Gambia (The Gambia)</option>
                                    <option value="Georgia">Georgia (Georgia)</option>
                                    <option value="Ghana">Ghana (Ghana)</option>
                                    <option value="Granada">Granada (Granada)</option>
                                    <option value="Grecia">Grecia (Greece)</option>
                                    <option value="Guatemala">Guatemala (Guatemala)</option>
                                    <option value="Guyana">Guyana (Guyana)</option>
                                    <option value="Guinea">Guinea (Guinea)</option>
                                    <option value="Guinea-Ecuatorial">Guinea Ecuatorial (Equatorial Guinea)</option>
                                    <option value="Guinea-Bisau">Guinea-Bisáu (Guinea-Bissau)</option>
                                    <option value="Haiti">Haití (Haiti)</option>
                                    <option value="Honduras">Honduras (Honduras)</option>
                                    <option value="Hungria">Hungría (Hungary)</option>
                                    <option value="India">India (India)</option>
                                    <option value="Indonesia">Indonesia (Indonesia)</option>
                                    <option value="Irak">Irak (Iraq)</option>
                                    <option value="Iran">Irán (Iran)</option>
                                    <option value="Irlanda">Irlanda (Ireland)</option>
                                    <option value="Islandia">Islandia (Iceland)</option>
                                    <option value="Islas-Marshall">Islas Marshall (Marshall Islands)</option>
                                    <option value="Islas-Salomon">Islas Salomón (Solomon Islands)</option>
                                    <option value="Israel">Israel (Israel)</option>
                                    <option value="Italia">Italia (Italy)</option>
                                    <option value="Jamaica">Jamaica (Jamaica)</option>
                                    <option value="Japon">Japón (Japan)</option>
                                    <option value="Jordania">Jordania (Jordania)</option>
                                    <option value="Kazajistan">Kazajistán (Kazakhstan)</option>
                                    <option value="Kenia">Kenia (Kenya)</option>
                                    <option value="Kirguistan">Kirguistán (Kyrgystan)</option>
                                    <option value="Kiribati">Kiribati (Kiribati)</option>
                                    <option value="Kuwait">Kuwait (Kuwait)</option>
                                    <option value="Laos">Laos (Laos)</option>
                                    <option value="Lesoto">Lesoto (Lesotho)</option>
                                    <option value="Letonia">Letonia (Latvia)</option>
                                    <option value="Libano">Líbano (Lebanon)</option>
                                    <option value="Liberia">Liberia (Liberia)</option>
                                    <option value="Libia">Libia (Libya)</option>
                                    <option value="Liechtenstein">Liechtenstein (Liechtenstein)</option>
                                    <option value="Lituania">Lituania (Lituania)</option>
                                    <option value="Luxemburgo">Luxemburgo (Luxembourg)</option>
                                    <option value="Macedonia-del-Norte">Macedonia del Norte (North Macedonia)</option>
                                    <option value="Madagascar">Madagascar (Madagascar)</option>
                                    <option value="Malasia">Malasia (Malaysia)</option>
                                    <option value="Malaui">Malaui (Malawi)</option>
                                    <option value="Maldivas">Maldivas (Maldives)</option>
                                    <option value="Mali">Malí (Mali)</option>
                                    <option value="Malta">Malta (Malta)</option>
                                    <option value="Marruecos">Marruecos (Morocco)</option>
                                    <option value="Mauricio">Mauricio (Mauritius)</option>
                                    <option value="Mauritania">Mauritania (Mauritania)</option>
                                    <option value="Micronesia">Micronesia (Micronesia)</option>
                                    <option value="Moldavia">Moldavia (Moldavia)</option>
                                    <option value="Monaco">Mónaco (Monaco)</option>
                                    <option value="Mongolia">Mongolia (Mongolia)</option>
                                    <option value="Montenegro">Montenegro (Montenegro)</option>
                                    <option value="Mozambique">Mozambique (Mozambique)</option>
                                    <option value="Namibia">Namibia (Namibia)</option>
                                    <option value="Nauru">Nauru (Nauru)</option>
                                    <option value="Nepal">Nepal (Nepal)</option>
                                    <option value="Nicaragua">Nicaragua (Nicaragua)</option>
                                    <option value="Niger">Níger (Niger)</option>
                                    <option value="Nigeria">Nigeria (Nigeria)</option>
                                    <option value="Noruega">Noruega (Noruega)</option>
                                    <option value="Nueva-Zelanda">Nueva Zelanda (New Zealand)</option>
                                    <option value="Oman">Omán (Oman)</option>
                                    <option value="Paises-Bajos">Países Bajos (Netherlands)</option>
                                    <option value="Pakistan">Pakistán (Pakistan)</option>
                                    <option value="Palaos">Palaos (Palau)</option>
                                    <option value="Panama">Panamá (Panamá)</option>
                                    <option value="Papua-Nueva-Guinea">Papúa Nueva Guinea (Papua New Guinea)</option>
                                    <option value="Paraguay">Paraguay (Paraguay)</option>
                                    <option value="Peru">Perú (Peru)</option>
                                    <option value="Polonia">Polonia (Polonia)</option>
                                    <option value="Portugal">Portugal (Portugal)</option>
                                    <option value="Reino-Unido">Reino Unido (United Kingdom)</option>
                                    <option value="Republica-Centroafricana">República Centroafricana (Central African Republic)</option>
                                    <option value="Republica-Checa">República Checa (Czech Republic)</option>
                                    <option value="Republica-Democratica-del-Congo">República Democrática del Congo (Democratic Republic of the Congo)</option>
                                    <option value="Republica-Dominicana">República Dominicana (Dominican Republic)</option>
                                    <option value="Republica-Sudafricana">República Sudafricana (Sudafrican Republic)</option>
                                    <option value="Ruanda">Ruanda (Rwanda)</option>
                                    <option value="Rumania">Rumanía (Rumania)</option>
                                    <option value="Rusia">Rusia (Rusia)</option>
                                    <option value="Samoa">Samoa (Samoa)</option>
                                    <option value="San-Cristobal-y-Nieves">San Cristóbal y Nieves (Saint Kitts and Nevis)</option>
                                    <option value="San-Marino">San Marino (San Marino)</option>
                                    <option value="San-Vicente-y-las-Granadinas">San Vicente y las Granadinas (Saint Vincent and the Grenadines)</option>
                                    <option value="Santa-Lucia">Santa Lucía (Saint Lucia)</option>
                                    <option value="Santo-Tome-y-Principe">Santo Tomé y Príncipe (Sao Tome and Principe)</option>
                                    <option value="Senegal">Senegal (Senegal)</option>
                                    <option value="Serbia">Serbia (Serbia)</option>
                                    <option value="Seychelles">Seychelles (Seychelles)</option>
                                    <option value="Sierra-Leona">Sierra Leona (Sierra Leone)</option>
                                    <option value="Singapur">Singapur (Singapore)</option>
                                    <option value="Siria">Siria (Syria)</option>
                                    <option value="Sri-Lanka">Sri Lanka (Sri Lanka)</option>
                                    <option value="Suzilandia">Suzilandia (Swaziland)</option>
                                    <option value="Sudan">Sudán (Sudan)</option>
                                    <option value="Sudan-del-Sur">Sudán del Sur (South Sudan)</option>
                                    <option value="Suecia">Suecia (Sweden)</option>
                                    <option value="Suiza">Suiza (Switzerland)</option>
                                    <option value="Surinam">Surinam (Suriname)</option>
                                    <option value="Tailandia">Tailandia (Thailand)</option>
                                    <option value="Tanzania">Tanzania (Tanzania)</option>
                                    <option value="Tayikistan">Tayikistán (Tajikistan)</option>
                                    <option value="Timor-Oriental">Timor Oriental (East Timor)</option>
                                    <option value="Togo">Togo (Togo)</option>
                                    <option value="Tonga">Tonga (Tonga)</option>
                                    <option value="Trinidad-y-Tobago">Trinidad y Tobago (Trinidad and Tobago )</option>
                                    <option value="Tunez">Túnez (Tunisia)</option>
                                    <option value="Turkmenistan">Turkmenistán (Turkmenistan)</option>
                                    <option value="Turquia">Turquía (Turkey)</option>
                                    <option value="Tuvalu">Tuvalu (Tuvalu)</option>
                                    <option value="Ucrania">Ucrania (Ukraine)</option>
                                    <option value="Uganda">Uganda (Uganda)</option>
                                    <option value="Uruguay">Uruguay (Uruguay)</option>
                                    <option value="Uzbekistán">Uzbekistan (Uzbekistan)</option>
                                    <option value="Vanuatu">Vanuatu (Vanuatu)</option>
                                    <option value="Venezuela">Venezuela (Venezuela)</option>
                                    <option value="Vietnam">Vietnam (Vietnam)</option>
                                    <option value="Yemen">Yemen (Yemen)</option>
                                    <option value="Yibuti">Yibuti (Djibouti)</option>
                                    <option value="Zambia">Zambia (Zambia)</option>
                                    <option value="Zimbabue">Zimbabue (Zimbabwe)</option>
                                </select>
                                


                                <select class="mexico" name="pais" class="options required" id="mexico" style="display:none;" data-id-pregunta="4">
                                    <option hidden="" value="">Seleciona una opción</option>
                                    <option value="Aguascalientes">Aguascalientes</option>
                                    <option value="Baja-California">Baja California</option>
                                    <option value="Baja-California-Sur">Baja California Sur</option>
                                    <option value="Campeche">Campeche</option>
                                    <option value="CDMX">CDMX</option>
                                    <option value="Chiapas">Chiapas</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Coahuila-de-Zaragoza">Coahuila de Zaragoza</option>
                                    <option value="Colima">Colima</option>
                                    <option value="Durango">Durango</option>
                                    <option value="Guanajuato">Guanajuato</option>
                                    <option value="Guerrero">Guerrero</option>
                                    <option value="Estado-de-Hidalgo">Estado de Hidalgo</option>
                                    <option value="Jalisco">Jalisco</option>
                                    <option value="Estado-de-Mexico">Estado de México</option>
                                    <option value="Michoacan-de-Ocampo">Michoacán de Ocampo</option>
                                    <option value="Morelos">Morelos</option>
                                    <option value="Nayarit">Nayarit</option>
                                    <option value="Nuevo-Leon">Nuevo León</option>
                                    <option value="Oaxaca">Oaxaca</option>
                                    <option value="Puebla">Puebla</option>
                                    <option value="Queretaro">Querétaro</option>
                                    <option value="Quintana-Roo">Quintana Roo</option>
                                    <option value="San-Luis-Potosi">San Luis Potosí</option>
                                    <option value="Sinaloa">Sinaloa</option>
                                    <option value="Sonora">Sonora</option>
                                    <option value="Tabasco">Tabasco</option>
                                    <option value="Tamaulipas">Tamaulipas</option>
                                    <option value="Tlaxcala">Tlaxcala</option>
                                    <option value="Veracruz-de-Ignacio-de-la-Llave">Veracruz de Ignacio de la Llave</option>
                                    <option value="Yucatan">Yucatán</option>
                                    <option value="Zacatecas">Zacatecas</option>
                                </select>
                            </div>

                            <div class="qs-general" id="estEU" style="display:none">
                                <h3>5.- Dentro de EUA <span style="color:red;">*</span> <br> (Inside U.S.Al)</h3>
                                <select name="" class="options united"  data-id-pregunta="11">
                                <option hidden="" value="">Seleciona una opción</option>
                                    <option value="Alebame">Alebame (Alebama)</option>
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
                                    <option value="Indiana">Misispi (Mississippi)</option>
                                    <option value="Misuri">Misuri (MISSOURI)</option>
                                    <option value="Montana">Montana (Montana)</option>
                                    <option value="Nebraska">Nebraska (Nebraska)</option>
                                    <option value="Nevada">Nevada (Nevada)</option>
                                    <option value="Nueva-Jersey">Nueva Jersey (New jersey)</option>
                                    <option value="Nueva-York">Nueva York (New York)</option>
                                    <option value="Nuevo-Hampshire ">Nuevo Hampshire (New Hampshire)</option>
                                    <option value="Nuevo-Mexico">Nuevo Mexico (New Mexico)</option>
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
                            

                            <div class="qs-general">
                                <h3>6.- ¿Quiénes conforman el grupo de viaje? <span style="color:red;">*</span><br> (Who are you traveling with?) </h3>
                                <select name="" class="options required" data-id-pregunta="5">
                                    <option hidden="" value="">Seleciona una opción</option>
                                    <option value="Solo">Solo (By self)</option>
                                    <option value="Pareja">Pareja (Spouse/partner)</option>
                                    <option value="Amigos-o-parientes">Amigos o parientes (Friends or relatives)</option>
                                    <option value="Colegas-de-trabajo">Colegas de trabajo (Work colleagues)</option>
                                    <option value="Familia">Familia (Family)</option>
                                </select>
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
                            <input type="hidden" name="municipio" class="municipio" value="5">
                        
                            <div class="qs-general checkbox" data-id-pregunta="6">
                                <h3>1.- ¿Qué tipo de transporte se utilizó para llegar a este destino? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar más de una opción</span>  <br>(What type of transportation did you use to get here?) </h3>
                                <label for=""><input type="checkbox" name="Operador" value="Vehículo-de-agencia-de-viajes" id="" >Vehículo de la agencia de viajes (Tour operator vehicle)</label>
                                <label for=""><input type="checkbox" name="Automovil-particular" value="Automovil-particular" id="" >Automovil particular (Personal car)</label>
                                <label for=""><input type="checkbox" name="Tren-Chepe" value="Tren-Chepe" id="" >Tren Chepe (Chepe train)</label>
                                <label for=""><input type="checkbox" name="Aereo" value="Aereo" id="" >Aéreo (By air)</label>
                            </div>

                            <div class="qs-general checkbox" data-id-pregunta="7">
                                <h3>2.- ¿Qué otras actividades le hubiera gustado encontrar en la región? <span style="color:red;">*  </span>  <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span> <br>(Which other activities would you have liked to find?) </h3>
                                <label for=""><input type="checkbox" name="add-actividades" value="Observacion-de-flora" id="" >Observación de flora (Flora y fauna tours)</label>
                                <label for=""><input type="checkbox" name="add-actividades" value="Observacion-sideral" id="" >Observación sideral (Sky observation tour)</label>
                                <label for=""><input type="checkbox" name="add-actividades" value="Paseos-teatreales" id="">Paseos teatreales (Theatrical tours)</label>
                                <label for=""><input type="checkbox" name="add-actividades" value="Actividad-cultural-en-pueblos-originarios" id="">Actividad cultural en contacto con pueblos originarios (Cultural immersion in touch with indigenous cultures)</label>
                                <label for=""><input type="checkbox" name="add-actividades" value="Recorridos-y-catas-de-vino-o-sotol" id="">Recorridos y catas de vino o sotol (Wine & sotol tours & tastings)</label>
                                <label for=""><input type="checkbox" name="add-actividades" value="Talleres-artesanales" id="">Talleres artesanales (Traditional hand crafts workshop)</label>
                                <label for=""><input type="checkbox" name="add-actividades" value="Conciertos-y-festivales-de-música" id="">Conciertos y festivales de música (Concerts & musical festivals)</label>
                                <label for=""><input type="checkbox" name="add-actividades" value="Paseo-en-vehículo" id="">Atracciones para niños (Attractions for childen)</label>
                                <label for=""><input type="checkbox" name="add-actividades" value="Otros" id="">Otros <input class="other" type="text" name="" id=""></label>
                            </div>

                            <div class="qs-general checkbox" data-id-pregunta="8">
                                <h3>3.- ¿Qué otros elementos le hubiera gustado encontrar en la región? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span>  <br>(Which other elements would you have liked to find?) </h3>
                                <label for=""><input type="checkbox" name="new-elementos" value="Horarios-extendidos-para-restaurantes-y-cafeterias" id="" data-id-pregunta="8">Horarios extendidos para restaurantes y cafeterías (Restaurants & coffee shops open later)</label>
                                <label for=""><input type="checkbox" name="new-elementos" value="Cajeros-automaticos" id="" >Cajeros automáticos (ATM)</label>
                                <label for=""><input type="checkbox" name="new-elementos" value="Wifi" id="" >Wifi </label>
                                <label for=""><input type="checkbox" name="new-elementos" value="datos-de-celular" id="">Señal de datos para celular (Cell phone internet signal)</label>
                                <label for=""><input type="checkbox" name="new-elementos" value="Botes-de-basura" id="" >Botes de basura (Trash cans)</label>
                                <label for=""><input type="checkbox" name="new-elementos" value="Areas-de-descanso" id="">Áreas de descanso (Leisure areas)</label>
                                <label for=""><input type="checkbox" name="new-elementos" value="Modulos-turisticos" id="">Módulos de información turística (Touristic information offices)  </label>
                                <label for=""><input type="checkbox" name="new-elementos" value="Comida-chihuahuense" id="">Comida típica chihuahuense (Chihuahua typical food)</label>
                                <label for=""><input type="checkbox" name="new-elementos" value="Vida-nocturna" id="">Vida nocturna (Night-life)</label>
                            </div>

                            <div class="qs-general checkbox" data-id-pregunta="9">
                                <h3>4.- ¿Cómo se enteró del destino? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span>  <br>(How did you find out about this destination?) </h3>
                                <label for=""><input type="checkbox" name="como-se-entero" value="Recomendacion" id="">Recomendación (Through word-of-mouth)</label>
                                <label for=""><input type="checkbox" name="como-se-entero" value="Internet" id="">Internet (Through word-of-mouth)</label>
                                <label for=""><input type="checkbox" name="como-se-entero" value="Medios-impresos" id="">Medios impresos (Printed media)</label>
                                <label for=""><input type="checkbox" name="como-se-entero" value="Radio/TV" id="">Radio y TV (Radio & TV)</label>
                                <label for=""><input type="checkbox" name="como-se-entero" value="Redes-Sociales" id="">Redes Sociales (Social media)</label>
                                <label for=""><input type="checkbox" name="como-se-entero" value="Ferias/exposiciones" id="">Ferias y exposiciones (Expos & trade showa)</label>
                                <label for=""><input type="checkbox" name="como-se-entero" value="Visita-previa" id="">Visita previa (Already visited)</label>
                                <label for=""><input type="checkbox" name="como-se-entero" value="Agencia-de-viajes" id="">Agencia de viajes (Travel agency)</label>
                            </div>

                            <div class="qs-general">
                                <h3>5.- ¿Cuántos días se va a quedar en la región?  <span style="color:red;">*</span><br> (How many days are you staying in this region?)</h3>
                                <select name="" class="options required" data-id-pregunta="10">
                                <option hidden="" value="">Seleciona una opción/option>
                                    <option value="1-dia">1 día (Day)</option>
                                    <option value="2-a-3-dias">2 a 3 días (Days)</option>
                                    <option value="4-a-6-dias">4 a 6 días (Days)</option>
                                    <option value="7-o-mas-dias">7 o mas días (Days or more)</option>
                                </select>
                            </div>

                            <div class="cont-butt-env">
                                <input class="but-env" type="submit" value="Enviar">
                            </div>

                        </form>
                    </div>
                    <!-- ------------------------------------------------------- -->
                    <div class="part3" style="display:none;">
                        <form class="form-questions" >
                            <input type="hidden" name="part-enc" class="parteEncuesta" value="3">
                            <input type="hidden" name="municipio" class="municipio" value="5">
                    

                            <!-- <div class="qs-general">
                                <h3>1.- Encuesta  <br>(Survey?) </h3>
                                <select name="" class="options" id="restAct" data-id-pregunta="11">
                                    <option hidden="" value="">Seleciona un opcion</option>
                                    <option value="Restaurante">Restaurante</option>
                                    <option value="Actividades">Actividades</option>
                                </select>
                            </div> -->

                            <!-- <div id="Actividades" style="display:none;"> -->
                                <div class="qs-general checkbox" data-id-pregunta="12">
                                    <h3>2.- ¿Qué actividad de aventura realizó? <span style="color:red;">*</span>  <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span>  <br>(What adventure activity did you do?) </h3>
                                    <label for=""><input type="checkbox" name="actividades" value="Teleferico" id="" data-id-pregunta="12">Teléférico (Cableway)</label>
                                    <label for=""><input type="checkbox" name="actividades" value="Tirolesa" id="" data-id-pregunta="12">Tirolesa (zip line)</label>
                                    <label for=""><input type="checkbox" name="actividades" value="Zip-Rider" id="" data-id-pregunta="12">Zip Rider (ziprider) </label>
                                    <label for=""><input type="checkbox" name="actividades" value="Via-Ferrata" id="" data-id-pregunta="12">Vía Ferrata (via ferrata)</label>
                                    <label for=""><input type="checkbox" name="actividades" value="Bosque-Aero" id="" data-id-pregunta="12">Bosque Aero (Aero forest)</label>
                                </div>

                                <div class="qs-general">
                                    <h3>3.- ¿Cómo calificaría el servicio recibido en la actividad de aventura? <span style="color:red;">*</span><br>(How would you rate the service received in the adventure activity?) </h3>
                                    <select name="" class="options required" data-id-pregunta="13">
                                        <option hidden="" value="">Seleciona una opción</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>4.- ¿Cómo calificarías el tiempo de respuesta para iniciar con su actividad? <span style="color:red;">*</span> <br>(How would you rate the response time to start your activity?) </h3>
                                    <select name="" class="options required" data-id-pregunta="14">
                                        <option hidden="" value="">Seleciona una opción</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>5.- ¿Cómo calificaría la atención de los guías que le atendieron? <span style="color:red;">*</span> <br>(How would you rate the attention of the guides who attended you?) </h3>
                                    <select name="" class="options required" data-id-pregunta="15">
                                        <option hidden="" value="">Seleciona una opción</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>6.- Nombre de (los) guía (s) que lo atendieron <span style="color:red;">*</span> <br>(Name of the guide(s) who assisted you) </h3>
                                    <div class="text-opts" style="width:100%; width: 100%; height: 45px;"><textarea style="height: 45px;" name="" id="" cols="30" rows="10" class="required" data-id-pregunta="16"></textarea></div>
                                </div>

                                <div class="qs-general">
                                    <h3>7.- Si alguna de tus respuestas fue mala ¿Como podríamos mejorar la experiencia?  <span style="color:red;">*</span> <br>(If any of your answers were wrong, how could we improve the experience?) </h3>
                                    <div class="text-opts" style="width:100%; width: 100%; height: 45px;"><textarea name="" id="" cols="30" rows="10" style="height: 45px;" class="required" data-id-pregunta="17"></textarea></div>
                                </div>
                            <!-- </div> -->

                            <div id="Restaurante" style="display:none;"> <!-- restaurante -->
                                <div class="qs-general">
                                    <h3>1.- , ('18', '98, 115,', '¿Cómo calificarías la calidad de la comida?', '5', '3') <span style="color:red;">*</span> <br>(How would you rate the quality of the food?) </h3>
                                    <select name="" class="options " data-id-pregunta="18">
                                        <option hidden="" value="">Seleciona una opción</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>2.- ¿Cómo calificarías el servicio recibido por el personal del restaurante? <span style="color:red;">*</span> <br>(How would you rate the service received by the restaurant staff?) </h3>
                                    <select name="" class="options" data-id-pregunta="19">
                                        <option hidden="" value="">Seleciona una opción</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>3.- ¿Cómo calificarías la rapidez del servicio? <span style="color:red;">*</span> <br>(How would you rate the speed of the service?) </h3>
                                    <select name="" class="options" data-id-pregunta="20">
                                        <option hidden="" value="">Seleciona una opción</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>4.- ¿Cómo calificarías el ambiente del restaurante? <span style="color:red;">*</span> <br>(How would you rate the atmosphere of the restaurant?) </h3>
                                    <select name="" class="options" data-id-pregunta="21">
                                        <option hidden="" value="">Seleciona una opción</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>5.- ¿Le gustaría agregar algo? <span style="color:red;">*</span> <br>(Would you like to add something?) </h3>
                                    <div class="text-opts" style="width:100%; width: 100%; height: 45px;"><textarea name="" id="" cols="30" rows="10" style="height: 45px;" data-id-pregunta="22"></textarea></div>
                                </div>
                            </div>
                            <div class="cont-butt-env"> 
                                <input class="but-env" type="submit" value="Enviar">
                            </div>

                        </form>
                    </div><!--  fin de parte 3 del formulario -->
            </div>
        </div>

        <div class="cont-pop none">
            <div class="ali-pop">
                <h3>¡Gracias por contestar nuestra encuesta!</h3>
                <p id="newEnc">Nueva encuesta</p>
            </div>
        </div>
        
    </div>

    <script>
        const section1 = document.getElementById('section1');
        const section2 = document.getElementById('section2');
        const image = document.getElementById('arrow');
        const container = document.getElementById('big-container');
        var bodyElement = document.querySelector('body');
        console.log(section1);

        image.addEventListener('click', () => {
            console.log('el click del arroww');
            $(section1).slideUp(500, "linear");
            
            
            $(section2).slideDown(1000);
            setTimeout(() => {
                section2.style.height = 'auto';  
                bodyElement.style.overflow = 'auto';
                // section2.style.height = 'auto';
            }, 500);
            
             
        });
            section1.addEventListener('animationend', () => {
               console.log('ncds');
             section1.style.visibility = 'visible';
            }); 
            section2.addEventListener('animationend', () => {
            section2.style.animation = 'none';
            });


            $(document).on('click', '#arrow', function(e) {
				setTimeout(() => {
					var request;
					//Abortamos cualquier solicitud actual
					if (request) { request.abort(); }
					request = $.ajax({
						dataType: 'text', //json
						url: '../_includes/_php/querys.php',
						type: 'POST',
						data: {partEnc: true, municipio: 5},
						success: function(data) {
							console.log(data);
							var part1 = document.querySelector('.part1');
                            var part2 = document.querySelector('.part2');
                            var part3 = document.querySelector('.part3');
                            console.log(data);

                            if (data == 1) {
                                part2.style.display = 'block';
                                console.log('el 1'); 
                            } else if(data == 2){
                                part3.style.display = 'block';
                                console.log('el 2'); 
                            }else if(data == 3){
                                part1.style.display = 'block'; 
                                console.log('el 3');  
                            }
						}
                    

					});
				}, 100);
			});

    </script>
        

         <?php include_once("../phpAssets/footer.php"); ?>
    
    </body>
</html>