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
                <h1>Encuesta de satisfacción del restaurante Barranco / Barranco restaurant satisfaction survey</h1>
            </div>    

            <div class="cont-questions">
                

                  
                    <!-- ------------------------------------------------------- -->
                        <form class="form-questions" >
                            <input type="hidden" name="part-enc" class="parteEncuesta" value="4">
                            <input type="hidden" name="municipio" class="municipio" value="5">
                                <div class="qs-general">
                                    <h3>1.- ¿Cómo calificarias la calidad de la comida? <span style="color:red;">*</span> <br>(How would you rate the quality of the food?) </h3>
                                    <select name="" class="options required" data-id-pregunta="18">
                                        <option hidden="" value="">Seleciona un opcion</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>2.- ¿Cómo calificarias el servicio recibido por el personal del restaurante? <span style="color:red;">*</span> <br>(How would you rate the service received by the restaurant staff?) </h3>
                                    <select name="" class="options required" data-id-pregunta="19">
                                        <option hidden="" value="">Seleciona un opcion</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>3.- ¿Cómo calificarias la velocidad del servicio? <span style="color:red;">*</span> <br>(How would you rate the speed of the service?) </h3>
                                    <select name="" class="options required" data-id-pregunta="20">
                                        <option hidden="" value="">Seleciona un opcion</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>4.- ¿Cómo calificarias el ambiente del restaurante? <span style="color:red;">*</span> <br>(How would you rate the atmosphere of the restaurant?) </h3>
                                    <select name="" class="options required" data-id-pregunta="21">
                                        <option hidden="" value="">Seleciona un opcion</option>
                                        <option value="Excelente">Excelente (Excellent)</option>
                                        <option value="Bueno">Bueno (Good)</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Malo">Malo (Bad)</option>
                                    </select>
                                </div>

                                <div class="qs-general">
                                    <h3>5.- ¿Le gustaría agregar algo? <span style="color:red;">*</span> <br>(Would you like to add something?) </h3>
                                    <div class="text-opts" style="width:100%; width: 100%; height: 45px;"><textarea class="required" name="" id="" cols="30" rows="10" style="height: 45px;" data-id-pregunta="22"></textarea></div>
                                </div>
                            <div class="cont-butt-env"> 
                                <input class="but-env" type="submit" value="Enviar">
                            </div>

                        </form>
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