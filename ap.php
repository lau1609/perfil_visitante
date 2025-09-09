<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador de Infografías</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script src="_includes/_js/jquery-3.3.1.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

  <link rel="stylesheet" type="text/css" href="_includes/_css/hd.css">
  <!-- <script src="script.js"></script> -->
  <style>
    body {
        /* background-image: url(_images/chih.jpg) !important; */
        width: 100%;
        height: 100%;
        background-size: cover;
    }
    body::before{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(207, 220, 240, 0.9);
        z-index: 1;
    }
    .contImagePlant img:hover {
        transform: scale(1.15);
        transition: .2s;
    }
    .aliInfografia h1 {
        font-family: 'PublicSans Bold';
        font-size: 1.7rem;
        color: rgb(38, 68, 142, .8);
    }
    .contImagePlant{
        width: auto;
        display: flex;
        justify-content: space-between;
        padding: 20px 16px;
        background-color: rgb(255, 255, 255, .5);
        border-radius: 5px;
        border: 1px solid rgb(38, 68, 142, .3);
    }
    .contImagePlant img {
        width: 20%;
        box-shadow: 1px 0px 5px rgb(0, 0, 0, 50%);
    }
    .contInfografia {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        z-index: 2;
    }
    .aliInfografia {
        width: 90%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: 7vh;
    }
    .timeInfo{
        display: flex;
        justify-content: center;
    }
    .timeInfo {
        display: flex;
        justify-content: start;
        margin-top: 4vh;
    }
    .timeInfo h3{
        margin: 0;
        font-family: 'PublicSans SemiBold';
        color: rgb(38, 68, 142, .8);
        margin-right: 8px;
    }
    input[type="date"]::-webkit-calendar-picker-indicator {
       color: rgb(38, 68, 142, .7);
    }
    .timeInfo input{
        border-style: none;
        background: rgb(255, 255, 255, .5);
        color: rgb(38, 68, 142, .7);
    }
    .contButInfo{
        width: 100%;
        justify-content: end;
        display: flex;
        margin-top: 20px;
    }
    button.genInfografia {
        border-style: none;
        padding: 7px 16px;
        font-size: 1rem;
        border: 1px solid rgb(38, 68, 142, .4);
        color: rgb(38, 68, 142, .8);
        border-radius: 5px;
    }
    button.genInfografia:hover {
        background: rgb(38, 68, 142, .4);
        color: white;
        border: white;
        transition: .3s;
    }
  </style>
</head>
<body>
    <div class="contInfografia">
        <div class="aliInfografia">
            <h1>Seleccione una platilla</h1>
            <div class="contPlant">
                <div class="contImagePlant">
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
                        echo "<label><input name='imageInfo' type='radio' value='$id'><img id= class='imageInfo' id='$id' src='$rutaCarpeta$imagen' alt='$imagen'></label>";
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
                <button onclick="generarInfografia()" class="genInfografia">Generar</button>
            </div>
            <canvas  id="canvaIMG" style="z-index: 2;display: none;"></canvas>
        </div>
    </div>
</body>
</html>

<script>
    // $(document).on(clickHandler, '.genInfografia', function(e) {
	// 	generarInfografia();
	// });

    $(document).ready(function() {
        let elementsToDelete = document.querySelectorAll('.preguntas');
		elementsToDelete.forEach(element => {
			element.remove();
		});
		
		const elementoAEliminar = document.getElementById("contButExc");
		const elementoAEliminar2 = document.getElementById("contButInfo");
		// Verificar si el elemento existe
		if (elementoAEliminar) {
			elementoAEliminar.remove();
			elementoAEliminar2.remove();
		} else {
			console.log("El elemento no existe.");
		}

		let elementos = document.querySelectorAll('.tableDate');
		// Iterar sobre los elementos y eliminarlos
		elementos.forEach(function(elemento) {
			elemento.remove();
		});
        var reg = parseInt(2);
		console.log(reg);
		request = $.ajax({
			dataType: 'json', //json
			url: '_includes/_php/graphs.php',
			type: 'POST',
			data: { reg },
			success: function(data) {
				//console.log(data);
				arrDatos= data;
				let width = screen.width-(screen.width/10);
				
				$('#graphs').removeClass('none');

				switch (reg) {
					case 1:
						muni = 'Juárez'
						break;
					case 2:
						muni = 'Chihuahua'
						break;
					case 3:
						muni = 'Guachochi'
						break;
					case 4:
						muni = 'Parral'
						break;
					case 5:
						muni = 'PABC'
						break;

					default:
						'municipio'
						break;
				}
			
                console.log(arrDatos);
			}
		});
    });
    

    let infografia;

	function closeInfografia() {
		$('.contInfografia').addClass('none');
	}
	let resultado;

	function openInfografia(){
		$('.contInfografia ').removeClass('none');
	}

    let arrDatos= Array();
	async  function generarInfografia() {
        console.log('generar infografia');
		

        console.log('despues del axax');

        // Cargar la imagen de la plantilla
		const radios = document.querySelectorAll('input[name="imageInfo"]');
		const fecInicio = document.getElementById('iniInfo');
		const fechaFin = document.getElementById('finInfo');
		const fecInicio2 = document.getElementById('iniInfo').value;
		const fechaFin2 = document.getElementById('finInfo').value;


		let seleccionado = false;

		radios.forEach(radio => {
			if (radio.checked) {
				seleccionado = true;
			}
		});
		if (!seleccionado || fecInicio.value === '' || fechaFin.value === '') {
            console.log('dentro del if de validacion');
			if (!seleccionado) {
				alert('Selecciona una plantilla');
				let a = document.getElementById('contenedorPlantilla');
				a.style = "border: 1px solid red !important;";
			}else{
				alert('Selecciona una fecha de inicio y de fin');
				if (fecInicio.value === '') {
					let a = document.getElementById('iniInfo');
					a.style = "border: 1px solid red";
				}else{
					let a = document.getElementById('finInfo');
					a.style = "border: 1px solid red";
				}
			}
			
			event.preventDefault();
		}else{

            console.log('el else');
			const inicioDate = new Date(fecInicio2);
            const finDate = new Date(fechaFin2);
			finDate.setDate(finDate.getDate() + 1);
			inicioDate.setDate(inicioDate.getDate() + 1);
            const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

            
			if (inicioDate.getFullYear() === finDate.getFullYear() && inicioDate.getMonth() === finDate.getMonth()) {
				// mismo mes
				resultado = monthNames[inicioDate.getMonth()];
			} else {
				// rango de meses
				const inicioMes = monthNames[inicioDate.getMonth()];
				const finMes = monthNames[finDate.getMonth()];
				if (inicioDate.getDate() === 1 && finDate.getDate() === new Date(finDate.getFullYear(), finDate.getMonth() + 1, 0).getDate()) {
					resultado = monthNames[inicioDate.getMonth()]; // Si es todo el mes
				} else {
					resultado = `Acum. ${inicioMes.substring(0, 3)} - ${finMes.substring(0, 3)}`;
				}
			}

            console.log(resultado);
			$('.genInfografia').addClass('none');
			$('.load-wrapp').removeClass('none');
			var infografiaInp = document.querySelector('input[name="imageInfo"]:checked');
			
			if (infografiaInp) {
				infografia = infografiaInp.nextElementSibling;
				
			}
			let textInfografia = infografiaInp.value;
			let datPorc;
			try {
				datPorc = await porcentaje();
			} catch (error) {
				console.error('Error al calcular el porcentaje:', error);
			}
			datPorc.forEach(resultado => {
				resultado[1].sort((a, b) => b.porcentaje - a.porcentaje);
			});
			let iconos = Array();
		
				fetch('Connections/datos.json')
					.then(res => res.json())
					.then(datos => {
						// console.log(datos); 
						iconos = datos;
					}).catch(error => {
						console.error('Error al obtener los datos:', error);
					});
			let infoFin = Array();
			let respuestas = Array();
			for (let i = 0; i < datPorc.length; i++) {
				let id = datPorc[i][0];
				let arrayInt = datPorc[i][1];
				//console.log(arrayInt);
				if (!id != 42 ) {
					let cont;
					if (!respuestas[id]) {
						respuestas[id] = [];
					}

					if (arrayInt.length <= 5) {
						cont = arrayInt.length ;
					}else{
						cont = 5;
					}

					for (let a = 0; a < cont; a++) {
						respuestas[id].push(arrayInt[a]);
					}
				}
			}
			setTimeout(() => {
				for (let idRespuestas in respuestas) {
					for (let idIconos in iconos) {
						if (idRespuestas === idIconos) {
							const respuestasArray = respuestas[idRespuestas];
							for (let i = 0; i < respuestasArray.length; i++) {
								const respuesta = respuestasArray[i].respuesta;
								if (iconos[idIconos].hasOwnProperty(respuesta)) {
									let ico = iconos[idIconos][respuesta];
									respuestasArray[i].icons = ico;
								}
							}
						}
					}
				}

                console.log(infografia);
				var canvas = document.getElementById('canvaIMG');
					canvas.width = infografia.naturalWidth;
					canvas.height = infografia.naturalHeight;

					let maxWidth = 600;
					let lineHeight = 100; 
					let y1;let y2; let y3;
					var ctx = canvas.getContext('2d');
					ctx.drawImage(infografia, 0, 0);
					let coordenadasIconos = Array();
					let urlsIconos = Array();
					var icono = new Image(); 
				if (textInfografia == 'infografia') {
					infografia1(respuestas);

					
				}
			}, 500);
			
		}
    }

	function capitalizeFirstLetter(texto) {
		return texto.charAt(0).toUpperCase() + texto.slice(1).toLowerCase();
	}
	function wrapText(context, text, x, y, maxWidth, lineHeight) {
		const words = text.split(' ');
		let line = '';
		let lineCount = 0;
		const lines = [];
	
		for (let n = 0; n < words.length; n++) {
			let testLine = line + words[n] + ' ';
			let metrics = context.measureText(testLine);
			let testWidth = metrics.width;
			if (testWidth > maxWidth && n > 0) {
				lines.push(line);
				line = words[n] + ' ';
				lineCount++;
			} else {
				line = testLine;
			}
		}
		lines.push(line);
	
		for (let i = 0; i < lines.length; i++) {
			let line = lines[i];
			let metrics = context.measureText(line);
			let lineWidth = metrics.width;
			context.fillText(line, x - lineWidth / 2, y);
			y += lineHeight;
		}
	
		return lineCount; // Returns the number of lines
	}

	function infografia1(respuestas){
		console.log(respuestas);
		var canvas = document.getElementById('canvaIMG');
		canvas.width = infografia.naturalWidth;
		canvas.height = infografia.naturalHeight;

		let maxWidth = 600;
		let lineHeight = 100; 
		let y1;let y2; let y3;
		var ctx = canvas.getContext('2d');
		ctx.drawImage(infografia, 0, 0);
		let coordenadasIconos = Array();
		let urlsIconos = Array();
		var icono = new Image(); 

		for (let idRespuesta in respuestas) {
			console.log('el for del switch');
			let lineCount3;
			let lineCount2;
			let lineCount1;
			let centerX1;
			let centerX2;
			let centerX3;
			let respuestasArray = respuestas[idRespuesta];

			
			switch (parseInt(idRespuesta)) {
				case 23:
					console.log('la pregunta genero');
					// ------------- GENERO ------------
				ctx.font = 'bold 110px Arial black';
				//ctx.textAlign = 'center';
				ctx.fillText(parseFloat(respuestas[idRespuesta][0]['porcentaje'].toFixed(0))+'%', 300, 1200);
				ctx.font = '85px Arial'; 
				ctx.fillStyle = 'black'; 
				ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta'])+' de ', 280, 1300); // Posición del primer marcador de posición
				ctx.fillText(respuestas[24][0]['respuesta'].replace(/ /g, " a ") + ' años', 220, 1400); 
				// ------------ EN QUE TRABAJA -------------
				ctx.font = 'bold 110px Arial';
				ctx.fillText(parseFloat(respuestas[29][0]['porcentaje'].toFixed(0))+'%', 950, 1200);
				ctx.font = '85px Arial';
				ctx.fillStyle = 'black'; 
				ctx.fillText(capitalizeFirstLetter(respuestas[29][0]['respuesta']), 870, 1300);
				// ---------------- NIVEL DE ESTUDIOS -------------------
				ctx.font = 'bold 110px Arial';
				ctx.fillText(parseFloat(respuestas[27][0]['porcentaje'].toFixed(0))+'%', 1600, 1200);
				ctx.font = '85px Arial'; 
				ctx.fillStyle = 'black'; 
				ctx.fillText(capitalizeFirstLetter(respuestas[27][0]['respuesta']), 1500, 1300);

			
				
				
				urlsIconos.push(respuestas[idRespuesta][0]['icons']);
				urlsIconos.push(respuestas[29][0]['icons']);
				urlsIconos.push(respuestas[27][0]['icons']);

				coordenadasIconos.push({ x: 320, y: 900, w: 200, h: 200 });
				coordenadasIconos.push({ x: 950, y: 900, w: 200, h: 200 });
				coordenadasIconos.push({ x: 1650, y: 900, w: 200, h: 200 });

				// return;
					break;
				
				case 25:
					// ------------- DE DONDE VIENE ------------------
					console.log('de donde proviene');
					ctx.font = 'bold 80px Arial';

					if (respuestas[idRespuesta][0]['respuesta'] === 'Mexico') {
						ctx.fillText(parseFloat(respuestas[idRespuesta][0]['porcentaje'].toFixed(0))+'%', 400, 2050);
						ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta']), 600, 2050);


						ctx.fillText(parseFloat(respuestas[idRespuesta][1]['porcentaje'].toFixed(0))+'%', 1300, 2050);
						ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][1]['respuesta']), 1500, 2050);
					}else{
						ctx.fillText(parseFloat(respuestas[idRespuesta][1]['porcentaje'].toFixed(0))+'%', 400, 2050);
						ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][1]['respuesta']), 600, 2050);
						
						ctx.fillText(parseFloat(respuestas[idRespuesta][0]['porcentaje'].toFixed(0))+'%', 1300, 2050);
						ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta']), 1500, 2050);
					}

					if (respuestas[43]) {
						let iniciox = 1570;
						let inicioy = 2190;
						let iniporx = 2020;
						let inipory = 2190;
						for (let i = 0; i < respuestas[43].length; i++) {
							ctx.font = '70px Arial'; 
							ctx.fillStyle = 'black'; 
							ctx.fillText(capitalizeFirstLetter(respuestas[43][i]['respuesta']), iniciox, inicioy); // Posición del primer marcador de posición
							ctx.font = 'bold 80px Arial';
							ctx.fillText(parseFloat(respuestas[43][i]['porcentaje'].toFixed(0))+'%', iniporx, inipory); 
							inicioy = inicioy + 100;
							inipory = inipory + 100;
						}
					}
					if (respuestas[26]) {
						let iniciox = 900;
						let inicioy = 2190;
						let iniporx = 1350;
						let inipory = 2190;
						for (let i = 0; i < respuestas[26].length; i++) {
							ctx.font = '70px Arial'; 
							ctx.fillStyle = 'black'; 
							ctx.fillText(capitalizeFirstLetter(respuestas[26][i]['respuesta']), iniciox, inicioy);
							ctx.font = 'bold 80px Arial';
							ctx.fillText(parseFloat(respuestas[26][i]['porcentaje'].toFixed(0))+'%', iniporx, inipory); 
							inicioy = inicioy + 100;
							inipory = inipory + 100;
						}
					}
					if (respuestas[45]) {
						let iniciox = 130;
						let inicioy = 2190;
						let iniporx = 650;
						let inipory = 2190;
						for (let i = 0; i < respuestas[45].length; i++) {
							ctx.font = '70px Arial'; 
							ctx.fillStyle = 'black'; 
							ctx.fillText(capitalizeFirstLetter(respuestas[45][i]['respuesta']), iniciox, inicioy);
							ctx.font = 'bold 80px Arial';
							ctx.fillText(parseFloat(respuestas[45][i]['porcentaje'].toFixed(0))+'%', iniporx, inipory); 
							inicioy = inicioy + 100;
							inipory = inipory + 100;
						}
					}
					break;
				case 28:
					// ------------- CON QUIENES VIAJA ------------------
					ctx.font = '85px Arial'; 
					ctx.fillStyle = 'black';
					ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta']), 1250, 3050); 
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestas[idRespuesta][0]['porcentaje'].toFixed(0))+'%', 1500, 3180);
					urlsIconos.push(respuestas[idRespuesta][0]['icons']);
				    coordenadasIconos.push({ x: 1450, y: 3250, w: 280, h: 280 });
					break;
				case 30:
					// ---------------- N° DE PERSONAS ---------------------
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestas[idRespuesta][0]['porcentaje'].toFixed(0))+'%', 400, 3100);
					ctx.font = '85px Arial'; 
					ctx.fillStyle = 'black'; 
					ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta']), 300, 3200);
					urlsIconos.push(respuestas[idRespuesta][0]['icons']);
				    coordenadasIconos.push({ x: 350, y: 3250, w: 280, h: 280 });
					break;
				case 31:
					// ---------------- COMO SE ENTERO DEL DESTINO ---------------------
					maxWidth = 600;
					ctx.font = '85px Arial';
					ctx.fillStyle = 'black';
					centerX1 = 4150 + maxWidth / 2;
					centerX2 = 4800 + maxWidth / 2;
					centerX3 = 5400 + maxWidth / 2;
					lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 1050, maxWidth, lineHeight);
					lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 1050, maxWidth, lineHeight);
					lineCount3 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[2]['respuesta']), centerX3, 1050, maxWidth, lineHeight);
					// ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][2]['respuesta']), 5400, 1050);
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 4350, 1100 + lineHeight * (lineCount1 + 1));
					ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 5000, 1100 + lineHeight * (lineCount2 + 1));
					ctx.fillText(parseFloat(respuestasArray[2]['porcentaje'].toFixed(0))+ '%', 5600, 1100 + lineHeight * (lineCount3 + 1));

					urlsIconos.push(respuestas[idRespuesta][0]['icons']);
					urlsIconos.push(respuestas[idRespuesta][1]['icons']);
					urlsIconos.push(respuestas[idRespuesta][2]['icons']);
					y1 = 1150 + lineHeight * (lineCount1 + 1);
					y2 = 1150 + lineHeight * (lineCount2 + 1);
					y3 = 1150 + lineHeight * (lineCount3 + 1);


					coordenadasIconos.push({ x: 4330, y: y1, w: 200, h: 200 });
					coordenadasIconos.push({ x: 4980, y: y2, w: 200, h: 200 });
					coordenadasIconos.push({ x: 5630, y: y3, w: 200, h: 200 });
					
					break;
				case 32:
					// ---------------- N° DE DIAS ---------------------
					if (respuestas[idRespuesta].length > 0) {
						ctx.font = '85px Arial'; 
						ctx.fillStyle = 'black';
						let respuestasArray = respuestas[idRespuesta];
						let indice1Dia = respuestasArray.findIndex(respuesta => respuesta.respuesta === "1 dia");
						let contador = 1;
						respuestasArray.forEach((respuesta, index) => {
								if (contador <= 3) {
									// console.log(contador);
									let xPos = 2500 + (index * 550);
								
								if (respuesta.respuesta === "1 dia") {
									ctx.fillText(respuesta.respuesta, 3050, 1150); // Posición del centro
								} else {
									if (index < indice1Dia) {
										ctx.fillText(respuesta.respuesta, 2500 + (index * 550), 1150); // antes del centro
									} else {
										ctx.fillText(respuesta.respuesta, 3050 + ((index - 1) * 400), 1150); // después del centro
									}
								}
								contador ++;
							}
							
						});
						ctx.font = 'bold 110px Arial';
						ctx.fillText(parseFloat(respuestas[idRespuesta][0]['porcentaje'].toFixed(0))+'%', 2530, 1300);
						ctx.fillText(parseFloat(respuestas[idRespuesta][1]['porcentaje'].toFixed(0))+'%', 3050, 1300);
						ctx.fillText(parseFloat(respuestas[idRespuesta][2]['porcentaje'].toFixed(0))+'%', 3500, 1300);
					}
					break;
				case 33:
							// ---------------- MOTIVO DEL VIAJE ---------------------
					ctx.font = '75px Arial';
					ctx.fillStyle = 'black';
					centerX1 = 2550 + maxWidth / 2;
					centerX2 = 3450 + maxWidth / 2;
					lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 1580, maxWidth, lineHeight);
					lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 1580, maxWidth, lineHeight);
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 2650, 1620 + lineHeight * (lineCount1 + 1));
					ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 3600, 1620 + lineHeight * (lineCount2 + 1));
					urlsIconos.push(respuestas[idRespuesta][0]['icons']);
					urlsIconos.push(respuestas[idRespuesta][1]['icons']);
					coordenadasIconos.push({ x: 2350, y: 1550, w: 200, h: 200 });
					coordenadasIconos.push({ x: 3200, y: 1550, w: 200, h: 200 });
							
					break;
				case 34:
								// ---------------- Giro economico ---------------------
					maxWidth = 500;
					ctx.font = '75px Arial';
					ctx.fillStyle = 'black';
					centerX1 = 2570 + maxWidth / 2;
					centerX2 = 3000 + maxWidth / 2;
					centerX3 = 3420 + maxWidth / 2;

					// console.log(respuestas[idRespuesta].length);
					if (respuestas[idRespuesta].length >= 3) {
						lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 2350, maxWidth, lineHeight);
						lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 2350, maxWidth, lineHeight);
						lineCount3 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[2]['respuesta']), centerX3, 2350, maxWidth, lineHeight);
						ctx.font = 'bold 110px Arial';
						ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 2710, 2400 + lineHeight * (lineCount1 + 1));
						ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 3190, 2400 + lineHeight * (lineCount2 + 1));
						ctx.fillText(parseFloat(respuestasArray[2]['porcentaje'].toFixed(0)) + '%', 3620, 2400 + lineHeight * (lineCount2 + 1));
						urlsIconos.push(respuestas[idRespuesta][0]['icons']);
						urlsIconos.push(respuestas[idRespuesta][1]['icons']);
						urlsIconos.push(respuestas[idRespuesta][2]['icons']);
						coordenadasIconos.push({ x: 2670, y: 2600, w: 200, h: 200 });
						coordenadasIconos.push({ x: 3150, y: 2600, w: 200, h: 200 });
						coordenadasIconos.push({ x: 3580, y: 2600, w: 200, h: 200 });
					}


					if (respuestas[idRespuesta].length === 2) {
						lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 2350, maxWidth, lineHeight);
						lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX3, 2350, maxWidth, lineHeight);
						ctx.font = 'bold 110px Arial';
						ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 2710, 2400 + lineHeight * (lineCount1 + 1));
						ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 3620, 2400 + lineHeight * (lineCount2 + 1));
						urlsIconos.push(respuestas[idRespuesta][0]['icons']);
						urlsIconos.push(respuestas[idRespuesta][1]['icons']);
						coordenadasIconos.push({ x: 2670, y: 2600, w: 200, h: 200 });
						coordenadasIconos.push({ x: 3580, y: 2600, w: 200, h: 200 });
					}


					if (respuestas[idRespuesta].length === 1) {
						lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX2, 2350, maxWidth, lineHeight);
						ctx.font = 'bold 110px Arial';
						ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 3150, 2400 + lineHeight * (lineCount2 + 1));
						urlsIconos.push(respuestas[idRespuesta][0]['icons']);
						coordenadasIconos.push({ x: 3150, y: 2600, w: 200, h: 200 });
					}
					
								
					break;

				case 35:
						// ---------------- VIATICOS POR DÍA ---------------------
						console.log('viaticos por dia');
						
						maxWidth = 800;
					ctx.font = '90px Arial';
					ctx.fillStyle = 'black';
					centerX1 = 3100 + maxWidth / 2;
					centerX2 = 3100 + maxWidth / 2;
					centerX3 = 3100 + maxWidth / 2;
					let cont = respuestas[35];
					for (let i = 0; i < cont.length; i++) {
						console.log(respuestas[35][i].respuesta);
						if (respuestas[35][i].respuesta == "Mas de $2,001") {

						}else{
							respuestas[35][i].respuesta = respuestas[35][i].respuesta.replace(/ /g, " a ");
						}
					}

					let contV = 1;
					let line = 'lineCount' + contV;
					let forCont;
					let aliney = 3400;
					let alinePorY = 3420;
					if (respuestas[35].length >= 3) {
						forCont = 3;
					}else{
						forCont = respuestas[35].length;
					}
					 
					for (let i = 0; i < forCont; i++) {
						ctx.font = '85px Arial';
						ctx.fillStyle = 'black';
						line = wrapText(ctx, capitalizeFirstLetter(respuestasArray[i]['respuesta']), centerX1, aliney, maxWidth, lineHeight);
						
						ctx.font = 'bold 110px Arial';
						ctx.fillText(parseFloat(respuestasArray[i]['porcentaje'].toFixed(0)) + '%', 3400, alinePorY + lineHeight * (line + 1));
						contV++;
						aliney = aliney + 250;
						alinePorY = alinePorY + 250;
					}

					
					console.log('fin de viaticos por día');
					maxWidth = 600;
					break;
				
				case 36:
					// ---------------- MEDIO DE TRANSPORTE ---------------------
					maxWidth = 500;
					ctx.font = '85px Arial';
					ctx.fillStyle = 'black';
					centerX1 = 4550 + maxWidth / 2;
					centerX2 = 5100 + maxWidth / 2;
					lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 1750, maxWidth, lineHeight);
					lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 1750, maxWidth, lineHeight);
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 4700, 1800 + lineHeight * (lineCount1 + 1));
					ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 5250, 1800 + lineHeight * (lineCount2 + 1));

					urlsIconos.push(respuestas[idRespuesta][0]['icons']);
					urlsIconos.push(respuestas[idRespuesta][1]['icons']);
					y1 = 1830 + lineHeight * (lineCount1 + 1);
					y2 = 1830 + lineHeight * (lineCount2 + 1);

					coordenadasIconos.push({ x: 4700, y: y1, w: 200, h: 200 });
					coordenadasIconos.push({ x: 5250, y: y2, w: 200, h: 200 });
						
					break;

				case 37:
					// ---------------- REALIZO O REALIZARA ALGUNA ACTIVIDAD ---------------------
					ctx.font = '85px Arial'; 
					ctx.fillStyle = 'black'; 
					ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta']), 4850, 2550); 
					ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][1]['respuesta']), 5300, 2550); 
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestas[idRespuesta][0]['porcentaje'].toFixed(0))+'%', 4800, 2700);
					ctx.fillText(parseFloat(respuestas[idRespuesta][1]['porcentaje'].toFixed(0))+'%', 5250, 2700);
					
					break;
				case 38:
					// ---------------- QUE ACTIVIDADES REALIZO ---------------------
					maxWidth = 500;
					ctx.font = '75px Arial';
					ctx.fillStyle = 'black';
					centerX1 = 6300 + maxWidth / 2;
					centerX2 = 6800 + maxWidth / 2;
					centerX3 = 7300 + maxWidth / 2;
					lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 1000, maxWidth, lineHeight);
					lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 1000, maxWidth, lineHeight);
					lineCount3 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[2]['respuesta']), centerX3, 1000, maxWidth, lineHeight);
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 6450, 1030 + lineHeight * (lineCount1 + 1));
					ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 6950, 1030 + lineHeight * (lineCount2 + 1));
					ctx.fillText(parseFloat(respuestasArray[2]['porcentaje'].toFixed(0)) + '%', 7450, 1030 + lineHeight * (lineCount3 + 1));
						
					urlsIconos.push(respuestas[idRespuesta][0]['icons']);
					urlsIconos.push(respuestas[idRespuesta][1]['icons']);
					urlsIconos.push(respuestas[idRespuesta][2]['icons']);
					y1 = 1100 + lineHeight * (lineCount1 + 1);
					y2 = 1100 + lineHeight * (lineCount2 + 1);
					y3 = 1100 + lineHeight * (lineCount3 + 1);
					coordenadasIconos.push({ x: 6430, y: y1, w: 200, h: 200 });
					coordenadasIconos.push({ x: 6930, y: y2, w: 200, h: 200 });
					coordenadasIconos.push({ x: 7430, y: y3, w: 200, h: 200 });
					break;

				case 39:
					// ---------------- PORQUE NO REALIZO ACTIVIDADES ---------------------
					maxWidth = 450;
					ctx.font = '75px Arial';
					ctx.fillStyle = 'black';
					centerX1 = 4400 + maxWidth / 2;
					centerX2 = 4900 + maxWidth / 2;
					centerX3 = 5400 + maxWidth / 2;
					if (respuestas[idRespuesta].length === 3) {
						lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 3100, maxWidth, lineHeight);
						lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 3100, maxWidth, lineHeight);
						lineCount3 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[2]['respuesta']), centerX3, 3100, maxWidth, lineHeight);
						ctx.font = 'bold 110px Arial';
						ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 4550, 3170 + lineHeight * (lineCount1 + 1));
						ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 5050, 3170 + lineHeight * (lineCount2 + 1));
						ctx.fillText(parseFloat(respuestasArray[2]['porcentaje'].toFixed(0)) + '%', 5550, 3170 + lineHeight * (lineCount3 + 1));
					}
					if (respuestas[idRespuesta].length === 2) {
						lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 3100, maxWidth, lineHeight);
						lineCount3 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX3, 3100, maxWidth, lineHeight);
						ctx.font = 'bold 110px Arial';
						ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 4550, 3170 + lineHeight * (lineCount1 + 1));
						ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 5550, 3170 + lineHeight * (lineCount3 + 1));
					}
					if (respuestas[idRespuesta].length === 1) {
						lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX2, 3100, maxWidth, lineHeight);
						ctx.font = 'bold 110px Arial';
						ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 5050, 3170 + lineHeight * (lineCount2 + 1));
					}
					console.log('porque no realizo actividades');
						
					break;
				case 41:
					// ---------------- QUE ACTIVIDADES REALIZO ---------------------
					maxWidth = 500;
					ctx.font = '75px Arial';
					ctx.fillStyle = 'black';
					centerX1 = 6300 + maxWidth / 2;
					centerX2 = 6800 + maxWidth / 2;
					centerX3 = 7300 + maxWidth / 2;
					lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 2100, maxWidth, lineHeight);
					lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 2100, maxWidth, lineHeight);
					lineCount3 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[2]['respuesta']), centerX3, 2100, maxWidth, lineHeight);
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 6450, 2130 + lineHeight * (lineCount1 + 1));
					ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 6950, 2130 + lineHeight * (lineCount2 + 1));
					ctx.fillText(parseFloat(respuestasArray[2]['porcentaje'].toFixed(0)) + '%', 7450, 2130 + lineHeight * (lineCount3 + 1));
						
					urlsIconos.push(respuestas[idRespuesta][0]['icons']);
					urlsIconos.push(respuestas[idRespuesta][1]['icons']);
					urlsIconos.push(respuestas[idRespuesta][2]['icons']);
					y1 = 2200 + lineHeight * (lineCount1 + 1);
					y2 = 2200 + lineHeight * (lineCount2 + 1);
					y3 = 2200 + lineHeight * (lineCount3 + 1);
					coordenadasIconos.push({ x: 6430, y: y1, w: 200, h: 200 });
					coordenadasIconos.push({ x: 6930, y: y2, w: 200, h: 200 });
					coordenadasIconos.push({ x: 7430, y: y3, w: 200, h: 200 });
					console.log('el ultimo texto');
					break;

				
				default:
					break;
			}
		}
		ctx.font = 'bold 135px Arial'; 
		ctx.fillStyle = 'white';
		console.log(ctx);
		
		setTimeout(() => {
			cargarIconos();
		}, 1000);
		
		

		let iconosCargados = 0;

		function dibujarIcono(icono, coordenadas) {
			console.log('el drawimage');
			ctx.drawImage(icono, coordenadas.x, coordenadas.y, coordenadas.w, coordenadas.h);
		}

		function cargarIconos() {
			console.log(urlsIconos);
			let = iconoDefault = "_images/infografias/iconos/not-found.png";
			urlsIconos.forEach((url, index) => {
				const icono = new Image();
				icono.src = url;
				icono.onload = function() {
					dibujarIcono(icono, coordenadasIconos[index]);
					iconosCargados++;
					verificarIconosCargados();
				};

				icono.onerror = function() {
					console.log(`No se pudo cargar el icono: ${icono.src}. Cargando icono por defecto.`);
					
					const iconoFallback = new Image();
					iconoFallback.src = iconoDefault;
					iconoFallback.onload = function() {
						dibujarIcono(iconoFallback, coordenadasIconos[index]);
						iconosCargados++;
						verificarIconosCargados();
					}
				};

				function verificarIconosCargados() {
					if (iconosCargados === urlsIconos.length) {
						const imagenInfografia = canvas.toDataURL('image/jpeg');
						const enlaceDescarga = document.createElement('a');
						enlaceDescarga.href = imagenInfografia;
						console.log('se descargo la imagen');
						enlaceDescarga.download = 'infografia '+resultado+'.jpg';
						enlaceDescarga.click();
						console.log('temino el proceso');
					}
				}
			});
		}

	};	

	async function porcentaje() {
		console.log(arrDatos);
        console.log('los porcentajes');
		return new Promise((resolve, reject) => {
			let ini = document.getElementById('iniInfo').value;
			let fin = document.getElementById('finInfo').value;
			let respuestas = Array();
			let iniDate = new Date(ini);
			let finDate = new Date(fin);
			respuestas = arrDatos.map(array => {
				return array.filter(respuesta => {
					let fechaRespuesta = new Date(respuesta.fecha);
					return fechaRespuesta >= iniDate && fechaRespuesta <= finDate;
				});
			});
			const resultados = [];
			respuestas.forEach(respuesta => {
				if (respuesta.length === 0 || respuesta[0].id_preg === '42') {
					return;
				}
				const idPregunta = respuesta[0].id_preg;
				const conteoRespuestasPregunta = {}; 
				respuesta.forEach(resp => {
					const nombreRespuesta = resp.name;
					if (!conteoRespuestasPregunta[nombreRespuesta]) {
						conteoRespuestasPregunta[nombreRespuesta] = 1;
					} else {
						conteoRespuestasPregunta[nombreRespuesta]++; 
					}
				});
				const conteoArray = Object.keys(conteoRespuestasPregunta).map(nombreRespuesta => ({
					respuesta: nombreRespuesta,
					conteo: conteoRespuestasPregunta[nombreRespuesta]
				}));
				const totalRespuestas = respuesta.length;
				conteoArray.forEach(item => {
					item.porcentaje = (item.conteo / totalRespuestas) * 100;
				});
				resultados.push([idPregunta, conteoArray]);
			});
			resolve(resultados);
		});
	}

</script>