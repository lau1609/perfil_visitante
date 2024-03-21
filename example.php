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
                <form class="form-questions">
                    <div class="part1">
                        <div class="qs-general">
                            <h3>1.- Genero <span style="color:red;">*</span> <br> (Gender)</h3>
                            <select name="" class="options">
                                <option value="mujer">Mujer (woman)</option>
                                <option value="man">Hombre (Man)</option>
                                <option value="none">Prefiero no decirlo (I´d rather not say it)</option>
                            </select>
                        </div>

                        <div class="qs-general">
                            <h3>2.- Edad  <span style="color:red;">*</span> <br> (Age)</h3>
                            <select name="" class="options">
                                <option value="18-25">18 a 25</option>
                                <option value="26-35">26 a 35</option>
                                <option value="36-45">36 a 45</option>
                                <option value="46-55">46 a 55</option>
                                <option value="56-65">56 a 65</option>
                                <option value="none">>Prefiero no decirlo (I´d rather not say it)</option>
                            </select>
                        </div>

                        <div class="qs-general">
                            <h3>3.- Nacionalidad <span style="color:red;">*</span> <br> (Nationality)</h3>
                            <select name="" id="nacionalidad" class="options">
                                <option value="Internacional">Internacional (International)</option>
                                <option value="Mexico">México (Mexico)</option>
                            </select>
                        </div>

                        <div class="qs-general">
                            <h3>4.- Lugar de Residencia  <span style="color:red;">*</span> <br> (Place of residence)</h3>
                            <select id="inter" name="pais-int" class="options" style="display:none;">
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
                                <option value="Banglades">Banglades (Bangladesh)</option>
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
                                <option value="Emiratos-Arabes-Unidos">Emiratos Arabes Unidos (United Arab Emirates)</option>
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
                                <option value="Panama">Panamá (Panama)</option>
                                <option value="Papua-Nueva-Guinea">Papúa Nueva Guinea (Papua New Guinea)</option>
                                <option value="Paraguay">Paraguay (Paraguay)</option>
                                <option value="Peru">Perú (Peru)</option>
                                <option value="Polonia">Polonia (Polonia)</option>
                                <option value="Portugal">Portugal (Portugal)</option>
                                <option value="Reino-Unido">Reino Unido (United Kingdom)</option>
                                <option value="Republica-Centroafricana">República Centroafricana (Central African Republic)</option>
                                <option value="Republica-Checa">Republica Checa (Czech Republic)</option>
                                <option value="Republica-Democratica-del-Congo">Republica Democratica del Congo (Democratic Republic of the Congo)</option>
                                <option value="Republica-Dominicana">Republica Dominicana (Dominican Republic)</option>
                                <option value="Republica-Sudafricana">Republica Sudafricana (Sudafrican Republic)</option>
                                <option value="Ruanda">Ruanda (Rwanda)</option>
                                <option value="Rumania">Rumanía (Rumania)</option>
                                <option value="Rusia">Rusia (Rusia)</option>
                                <option value="Samoa">Samoa (Samoa)</option>
                                <option value="San-Cristobal-y-Nieves">San Cristobal y Nieves (Saint Kitts and Nevis)</option>
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


                            <select class="mexico" name="est-mex" class="options" id="mexico" style="display:none;">
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Albania">Albania (Albania)</option>
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
                                <option value="Michoacan-de-Ocampo">Michoacan de Ocampo</option>
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
                                <option value="Yukatan">Yukatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>
                        </div>


                        <div class="qs-general">
                            <h3>5.- Nivel de estudio <span style="color:red;">*</span> <br> (Education level)</h3>
                            <select name="" class="options">
                                <option value="Primaria">Primaria (Elementary school)</option>
                                <option value="Secundaria">Secundaria (Middle school)</option>
                                <option value="Preparatoria">Preparatoria (High school)</option>
                                <option value="Carrera-técnica">Carrera técnica (Technical career)</option>
                                <option value="Carrera-universitaria">Carrera universitaria (Collage career)</option>
                                <option value="Posgrado">Posgrado (MBA or Ph.D)</option>
                            </select>
                        </div>

                        <div class="qs-general">
                            <h3>6.- ¿A qué se dedica? <span style="color:red;">*</span> <br> (What is your current occupation?)</h3>
                            <select name="" class="options">
                                <option value="Estudiante">Estudiante (Student)</option>
                                <option value="Auto-empleado">Auto empleado (Self employed)</option>
                                <option value="Empleado">Empleado (Employee)</option>
                                <option value="Empresario">Empresario (Entrepreneur)</option>
                                <option value="Jubilado">Jubilado (Retired)</option>
                                <option value="Servidor-Publico">Servidor Público (Public server)</option>
                                <option value="Maestro">Maestro (Teacher)</option>
                                <option value="Hogar">Hogar (Home)</option>
                                <option value="Prefiero-no-decirlo">Prefiero no decirlo (i´d rather not say it)</option>
                            </select>
                        </div>

                        <div class="qs-general">
                            <h3>7.- ¿Quienes conforman el grupo de viaje? <span style="color:red;">*</span><br> (Who are you traveling with?) </h3>
                            <select name="" class="options">
                                <option value="Solo">Solo (By self)</option>
                                <option value="Auto-empleado">Pareja (Spouse/partner)</option>
                                <option value="Amigos-o-parientes">Amigos o parientes (Friends or relatives)</option>
                                <option value="Colegas-de-trabajo">Colegas de trabajo (Work colleagues)</option>
                                <option value="Familia">Familia (Family)</option>
                            </select>
                        </div>

                        
                    </div>

                    <div class="part2">
                        <div class="qs-general">
                            <h3>1.- ¿Con cuantas personas viaja -Sin contarse a usted-?  <span style="color:red;">*</span> <br>(How many people you travelling with?)</h3>
                            <select name="" class="options">
                                <option value="Ninguna">Ninguna (None)</option>
                                <option value="1-persona">1 persona (Person)</option>
                                <option value="2-a-5-personas">2 a 5 personas (Peoples)</option>
                                <option value="6-a-12-personas">6 a 12 personas (Peoples)</option>
                                <option value="13-a-20-personas">13 a 20 personas (Peoples)</option>
                                <option value="21-a-50-personas">21 a 50 personas (Peoples)</option>
                                <option value="51-o-mas-personas">51 o mas personas (51 or more peoples)</option>
                            </select>
                        </div>

                        <div class="qs-general">
                            <h3>2.- ¿Como se entero del destino? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span>  <br>(How did you find out about this destination?) </h3>
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
                            <h3>3.- ¿Cuantas veces ha visitado el destino? <span style="color:red;">*</span><br> (How many times have you visited this destination?)</h3>
                            <select name="" class="options">
                                <option value="Primera-vez">Primera vez (First time)</option>
                                <option value="Dos-veces">Dos veces (Twice)</option>
                                <option value="Tres-o-mas-veces">Tres o mas veces (Three or more)</option>
                            </select>
                        </div>

                        <div class="qs-general">
                            <h3>4.- ¿Cuantos dias se va a quedar en la region?  <span style="color:red;">*</span><br> (How many days are you staying in this region?)</h3>
                            <select name="" class="options">
                                <option value="1-dia">1 dia (Day)</option>
                                <option value="2-a-3-dias">2 a 3 dias (Days)</option>
                                <option value="4-a-6-dias">4 a 6 dias (Days)</option>
                                <option value="7-o-mas-dias">7 o mas dias (Days or more)</option>
                            </select>
                        </div>

                        <div class="qs-general">
                            <h3>5.- Para visitar el Parque de Aventura, ¿Dónde pernoctó o pernoctará?  <span style="color:red;">*</span><br> (For visiting Copper Canyon Adventure Park, where did you or are you going to overnight?)</h3>
                            <select name="" class="options">
                                <option value="Divisadero">Divisadero / Areponapuchi</option>
                                <option value="Creel">Creel</option>
                                <option value="Cerocahui">Cerocahui</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="Los-Mochis">Los Mochis</option>
                                <option value="San-Rafael">San Rafael</option>
                                <option value="Aun-no-saben">Aún no saben / They still don´t know</option>
                            </select>
                        </div>

                        <div class="qs-general">
                            <h3>6.- ¿Cúal es el motivo de tu viaje? <span style="color:red;">*  </span> <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span>  <br>(What is your reason for travelling?) </h3>
                            <label for=""><input type="checkbox" name="motivo-del-viaje" value="Boda-o-evento-social" id="">Boda o evento social (Wedding or social party)</label>
                            <label for=""><input type="checkbox" name="motivo-del-viaje" value="Turismo-cultural-gastronomio" id="">Turismo cultural, rural, gastronómico, etnoturismo (Cultural tourism, ethnotourism, rural tourism,gastronomic tourism)</label>
                            <label for=""><input type="checkbox" name="motivo-del-viaje" value="Turismo-naturaleza-ecoturismo" id="">Turismo de naturaleza, de aventura, ecoturismo (Nature tourism, ecotourism, rural tourism,gastronomic tourism)</label>
                            <label for=""><input type="checkbox" name="motivo-del-viaje" value="Trabajo,-estudio,-negocios" id="">Trabajo, estudio o negocios (Work, study or business)</label>
                            <label for=""><input type="checkbox" name="motivo-del-viaje" value="Radio/TV" id="">Evento deportivo (Sports event)</label>
                            <label for=""><input type="checkbox" name="motivo-del-viaje" value="Tratamiento-médico" id="">Tratamiento médico y de bienestar (Health & well-being trips)</label>
                            <label for=""><input type="checkbox" name="motivo-del-viaje" value="Descanso,-diversion" id="">descanso y diversión (Rest & recreation)</label>
                            <label for=""><input type="checkbox" name="motivo-del-viaje" value="Espiritual-o-religioso" id="">Espiritual o religioso (Religious trip)</label>
                            <label for=""><input type="checkbox" name="motivo-del-viaje" value="Visita-a-familiares,-amigos" id="">Visita a familiares y amigos (Visiting family & friends tourism)</label>
                        </div>

                        <div class="qs-general">
                            <h3>7.- ¿Que tipo de transporte se utilizó para llegar a este destino? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span>  <br>(What type of transportation did you use to get here?) </h3>
                            <label for=""><input type="checkbox" name="transporte" value="Autobus" id="">Autobús (Bus-independent traveller)</label>
                            <label for=""><input type="checkbox" name="transporte" value="Automovil-particular" id="">Automovil particular (Personal car)</label>
                            <label for=""><input type="checkbox" name="transporte" value="Vehiculo-de-renta" id="">Vehículo de renta (Rental car)</label>
                            <label for=""><input type="checkbox" name="transporte" value="Via-aerea" id="">Vía aérea (By air)</label>
                            <label for=""><input type="checkbox" name="transporte" value="Vehículo-de-agencia-de-viajes" id="">Vehículo de la agencia de viajes (Tour operator vehicle)</label>
                            <label for=""><input type="checkbox" name="transporte" value="Tren-Chepe" id="">Tren Chepe (Chepe train)</label>
                            <label for=""><input type="checkbox" name="transporte" value="Motocicleta" id="">Motocicleta (Motorcycle)</label>
                            <label for=""><input type="checkbox" name="transporte" value="Bicicleta" id="">Bicicleta (Bicycle)</label>
                        </div>

                        
                    </div>

                    <div class="part2">
                        <div class="qs-general">
                            <h3>1.- ¿Que actividades realizo en este viaje? <span style="color:red;">*  </span>  <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span> <br>(What activities did you do in this trip?) </h3>
                            <label for=""><input type="checkbox" name="actividades" value="Caminatas" id="">Caminatas (Hikes)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Actividades-PABC" id="">Actividades de Aventura PABC (Adventure activities PABC)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Paseos-a-caballo" id="">Paseos a caballo (Horse back rinding tours)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Paseos-en-cuatrimotos-y-4x4" id="">Paseos en cuatrimotos y 4x4 (ATVs tours)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Paseos-en-bicicletas" id="">Paseos en bicicletas (MTB tours)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Observacion-de-flora" id="">Observación de flora (Flora y fauna tours)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Observacion-sideral" id="">Observacion sideral (Sky observation tour)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Paseos-teatreales" id="">Paseos teatreales (Theatrical tours)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Muestras-gastronomicas" id="">Muestras gastronómicas (Food tastings or cooking workshops)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Actividad-cultural-en-pueblos-originarios" id="">Actividad cultural en contacto con pueblos originarios (Cultural immersion in touch with indigenous cultures)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Talleres-artesanales" id="">Talleres artesanales (Traditional hand crafts workshop)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Medicina-tradicional" id="">Medicina tradicional (Traditional & alternative medicine)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Conciertos-y-festivales-de-música" id="">Conciertos y festivales de música (Concerts & musical festivals)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Paseo-en-vehículo" id="">Paseo en vehículo (Vehicle ride)</label>
                            <label for=""><input type="checkbox" name="actividades" value="Ninguna" id="">Ninguna (None)</label>
                        </div>


                        <div class="qs-general">
                            <h3>2.- ¿Que otras actividades le hubiera gustado encontrar en la región? <span style="color:red;">*  </span>  <span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span> <br>(Which other activities would you have liked to find?) </h3>
                            <label for=""><input type="checkbox" name="add-actividades" value="Caminatas" id="">Caminatas (Hikes)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Paseos-a-caballo" id="">Paseos a caballo (Horse back rinding tours)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Paseos-en-cuatrimotos-y-4x4" id="">Paseos en cuatrimotos (ATVs tours)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Paseos-en-bicicletas" id="">Paseos en bicicletas (MTB tours)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Observacion-de-flora" id="">Observación de flora (Flora y fauna tours)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Observacion-sideral" id="">Observacion sideral (Sky observation tour)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Paseos-teatreales" id="">Paseos teatreales (Theatrical tours)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Muestras-gastronomicas" id="">Muestras gastronómicas (Food tastings or cooking workshops)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Actividad-cultural-en-pueblos-originarios" id="">Actividad cultural en contacto con pueblos originarios (Cultural immersion in touch with indigenous cultures)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Recorridos-y-catas-de-vino-o-sotol" id="">Recorridos y catas de vino o sotol (Wine & sotol tours & tastings)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Talleres-artesanales" id="">Talleres artesanales (Traditional hand crafts workshop)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Medicina-tradicional" id="">Medicina tradicional (Traditional & alternative medicine)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Medicina-tradicional" id="">Espectaculo de luz y sonido (Light & sound show)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Conciertos-y-festivales-de-música" id="">Conciertos y festivales de música (Concerts & musical festivals)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Paseo-en-vehículo" id="">Atracciones para niños (Attractions for childen)</label>
                            <label for=""><input type="checkbox" name="add-actividades" value="Ninguna" id="">Otros <input class="other" type="text" name="" id=""></label>
                        </div>


                        <div class="qs-general">
                            <h3>4.- ¿Que otros atractivos turísticos del estado le gustaria conocer? <span style="color:red;">*  </span><span style="font-family: 'PublicSans Italic Extra Light'; color: #545859;">Se puede marcar mas de una opción</span>  <br>(Which other attractions in Chihuahua would you like to visit?) </h3>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Otras-barrancas" id="">Otras barrancas (Other mayor canyons)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Cañon-del-Pegüis" id="">Cañon del Pegüis (Pegüis canyon)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Paquime" id="">Zona arquelógica de Paquimé (Paquimé archeological zone)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Cascada-de-Basaseachi" id="">Cascada de Basaseachi (Basaseachi waterfall)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Otras-cascadas" id="">Otras cascadas (Other waterfalls)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Pueblos-magicos" id="">Pueblos mágicos: Batopilas, Casas Grandes, Creel (Magical towns)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Tren-Chepe" id="">Tren Chepe (Chepe train)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Dunas-de-Samalayuca" id="">Dunas de Samalayuca (Samalayuka dunes)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Motocicleta" id="">Sitios y edificios históricos (Mexican Revolucion historial sites)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Lago-de-Arareko" id="">Lago de Arareko (Arareko lake)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Recowata" id="">Aguas termales de Recowata (Hot springs)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Museos" id="">Museos (Museums)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Cultura-Menonita" id="">Cultura Menonita (Menonite culture)</label>
                            <label for=""><input type="checkbox" name="new-atractivos-turisticos" value="Ninguno" id="">Ninguno (None)</label>
                        </div>

                        <div class="qs-general">
                            <label for="">¿Le gustaria agregar algo de alguna de las siguientes Áreas?</label>
                            <div class="comments">
                                <div class="opts">
                                    <select name="" class="options">
                                        <option value="7-trolesas">Circuito de 7 trolesas</option>
                                        <option value="Teleferico">Teleférico</option>
                                        <option value="Via-ferrata">Via ferrata</option>
                                        <option value="Zip-rider">Zip rider</option>
                                        <option value="Restaurante">Restaurante</option>
                                        <option value="Cartas">Cartas</option>
                                    </select>
                                </div>
                                <div class="text-opts"><textarea name="" id="" cols="30" rows="10"></textarea></div>
                            </div>
                        </div>
                    </div>

                   
                    <div class="cont-butt-env"> 
                        <p class="but-env">Enviar</p>
                    </div>

                </form>
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
            $(section1).slideUp(1000, "linear");
            
            
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
    </script>
        

         <?php include_once("../phpAssets/footer.php"); ?>
    
    </body>
</html>