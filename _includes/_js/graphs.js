var clickHandler = ('ontouchstart' in document.documentElement ? "touchend" : "click");
	var touchmoved;
	if ('ontouchstart' in document.documentElement){ document.addEventListener("touchstart", function(){}, false); /*var touchSet = true;*/ }

	///import ChartDataLabels from 'chartjs-plugin-datalabels';
//import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";
let arrDatos= Array();
$(document).ready(function() {
	let muni;
	let myChart = undefined;
	$('#reg').change(function (e) {
		console.log('change');
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
		var reg = parseInt(document.getElementById("reg").value);
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
			
				
				$('.aliTit').append('<div class="contButExc" id="contButExc"><button id="butExc" data-tab="miTabla" data-nam="'+muni+'.xls")">Exportar a Excel<img style="width: 15px; margin-left: 6px;" src="_images/excel.png"></button></div>'+
				'<div id="contButInfo"><button id="genInfog">Generar infografía</button></div>');

				for (let i = 0; i < data.length; i++) {
					$('.contInf').append('<div data-id="'+data[i][0]['id_preg']+'" class="preguntas">'+data[i][0]['preg_name']+'</div>');
					for (let a = 0; a < arrDatos[i].length; a++) {
						
							$('#miTabla').append('<tr class="tableDate"><td>'+arrDatos[i][a]['id_preg']+'</td>'+
							'<td>'+arrDatos[i][a]['preg_name']+'</td>'+
							'<td>'+arrDatos[i][a]['name']+'</td>'+
							'<td>'+muni+'</td>'+
							'<td>'+arrDatos[i][a]['fecha']+'</td></tr>');
					}
				}
			}
		});
	});

	let datos = Array();
	$(document).on(clickHandler, '.preguntas', function(e) {
		datos = [];
		const pregunta = $(this);
		const pregID = pregunta.attr('data-id');
		$('#sentimentTable').html('');
		//console.log(pregID);
		$('.excel').removeClass('none');
		for (let i = 0; i < arrDatos.length; i++) {
			// $('.contInf').append('<div data-id="'+arrDatos[i][0]['id_preg']+'" class="preguntas">'+arrDatos[i][0]['preg_name']+'</div>');
			for (let a = 0; a < arrDatos[i].length; a++) {
				let id = arrDatos[i][a]['id_preg'];
				if (pregID == id) {
					datos.push({
						name: arrDatos[i][a]['name'],
						fecha: arrDatos[i][a]['fecha'],
						cont: arrDatos[i][a]['cont'],
						id_preg: arrDatos[i][a]['id_preg'],
						preg_color: arrDatos[i][a]['preg_color'],
						preg_name: arrDatos[i][a]['preg_name']
					});
				}
			}
		}
		if (pregID == 42 || pregID == 17) {
			//console.log(datos);
			comenters(datos);
		}else{
			
			values(datos, pregID);
		}
	});

	$(document).on(clickHandler, '#butExc', function(e) {
		const pregunta = $(this);
		const tab = pregunta.attr('data-tab');
		const name = pregunta.attr('data-nam');
		exportTableToExcel(tab, name);
	});

	$(document).on(clickHandler, '#createGraph', function(e) {
		$('#divCreGraph').removeClass('none');
	});

	$(document).on(clickHandler, '#close', function(e) {
		$('.excel').addClass('none');
	});

	$('#changeGraph').change(function(e) {
		who = parseInt(this.value); 
		let id = datos[0]['id_preg'];
		
		if (id == 42 || id == 17) {
			$('#sentimentTable').html('');
			comenters(datos, who);
		}else{
			values(datos, id, who);
		}
		
	});

	$('#partEncFilt').change(function(e) {
		let reg = parseInt(document.getElementById("reg").value);
		let part = parseInt(this.value);
		console.log(part);
		request = $.ajax({
			dataType: 'text', //json
			url: '_includes/_php/graphs.php',
			type: 'POST',
			data: { region: reg, part: part },
			success: function(data) {
				console.log(data);
				console.log(data.length);
				var datos = JSON.parse(data);
				console.log(datos);
				for (let i = 0; i < datos.length; i++) {
					$('#unir1').append('<option value="'+datos[i]['id']+'">'+datos[i]['preg']+' </option>');
					$('#unir2').append('<option value="'+datos[i]['id']+'">'+datos[i]['preg']+' </option>');
				}
			}

		});
	});

	



	$(document).on(clickHandler, '#createNew', function(e) {
		console.log(arrDatos);
		let union1 = parseInt(document.getElementById("unir1").value);
		let union2 = parseInt(document.getElementById("unir2").value);
		let arrayUni1 = Array();
		let arrayUni2 = Array();
		for (let i = 0; i < arrDatos.length; i++) {
			idPreg = arrDatos[i][0]['id_preg'];
			
			if (union1 == idPreg  ||  union2 == idPreg) {
				if (union1 == idPreg) {
					for (let a = 0; a < arrDatos[i].length; a++) {
							arrayUni1.push({
								name: arrDatos[i][a]['name'],
								fecha: arrDatos[i][a]['fecha'],
								cont: arrDatos[i][a]['cont'],
								id_preg: arrDatos[i][a]['id_preg'],
								preg_color: arrDatos[i][a]['preg_color'],
								preg_name: arrDatos[i][a]['preg_name']
							});
					}

				}else{
					for (let a = 0; a < arrDatos[i].length; a++) {
							arrayUni2.push({
								name: arrDatos[i][a]['name'],
								fecha: arrDatos[i][a]['fecha'],
								cont: arrDatos[i][a]['cont'],
								id_preg: arrDatos[i][a]['id_preg'],
								preg_color: arrDatos[i][a]['preg_color'],
								preg_name: arrDatos[i][a]['preg_name']
							});
					}
				} // fin del else
			}  // fin del if
		}  //fin del for

	    datos.push(arrayUni1, arrayUni2);
		//values(datos, validate);
	});
	let who;

	$(document).on(clickHandler, '#butFilt', function(e) {
		let datosFilt = Array();
		var inpIni = document.getElementById('start');
		var ini = inpIni.value;
		var inpFin = document.getElementById('end');
		var fin = inpFin.value;
		let id = datos[0]['id_preg'];
		for (let i = 0; i < datos.length; i++) {
			if (verificarFechaEnRango(datos[i]['fecha'], ini, fin)) {
				datosFilt.push({
					fecha: datos[i]['fecha'],
					name: datos[i]['name'],
					cont: datos[i]['cont'],
					id_preg: datos[i]['id_preg'],
					preg_color: datos[i]['preg_color'],
					preg_name: datos[i]['preg_name']
				});
			} 
		}
		if (datosFilt.length == 0) {
			$('#noExist').html('No hay datos para mostrar');
		}else{
			$('#noExist').html('');
		}
		
		if (id == 42 || id == 17) {
			$('#sentimentTable').html('');
			comenters(datosFilt, who);
		}else{
			values(datosFilt, id, who);
		}
	});

	$(document).on(clickHandler, '#image', function(e) {
		let arch = datos[0]['preg_name'] + muni;
		let miDiv = 'imgGraph';
		descargarComoImagen(miDiv, arch);
	});

	function descargarComoImagen(divId, nombreArchivo) {
		// Selecciona el elemento div
		var div = document.getElementById(divId);
		// Usa html2canvas para convertir el contenido del div en una imagen
		html2canvas(div).then(function(canvas) {
			// Crea un enlace para descargar la imagen
			var enlace = document.createElement('a');
			enlace.href = canvas.toDataURL();
			enlace.download = nombreArchivo + '.png';
			enlace.click();
		});
	}

	function values(datos, pregID, who) {
		var palabras  = Array();
		const conteoPalabras = {};
		const numeros = [];
		const palabrasUnicas = [];
		console.log(datos);
		
			for (let a = 0; a < datos.length; a++) {
				palabras.push(datos[a]['name']);
			}
			palabras.forEach(palabra => {
				conteoPalabras[palabra] = (conteoPalabras[palabra] || 0) + 1;
			});
			Object.entries(conteoPalabras).forEach(([palabra, cantidad], indice) => {
				numeros.push(cantidad);
				palabrasUnicas.push(palabra);
			});

			dataset = { 0: numeros, 1: palabrasUnicas };
			console.log(dataset);
			console.log(pregID);

			graficas(dataset, who)
	}

	function graficas(dataset, who) {
		switch (who) {
			case 1:
				grapBar(dataset);
				break;
			case 2:
				grapBarHor(dataset)
				break;
			case 3:
				grapLin(dataset)
				break;
			case 4:
				grapDonut(dataset)
				break;
			case 5:
				grapPie(dataset)
				break;
			case 6:
				grapCircle(dataset)
				break;
		
			default:
				grapBar(dataset);
				break;
		}
	}

	function comenters(datos, graph) {
		const resultado = analizarSentimiento(datos);
		graficas(resultado, graph);
	}
	
	function verificarFechaEnRango(fecha, rangoInicio, rangoFin) {
		// Convertir las fechas a objetos Date
		var fechaObj = new Date(fecha);
		var inicioObj = new Date(rangoInicio);
		var finObj = new Date(rangoFin);
		// Verificar si la fecha está dentro del rango
		return (fechaObj >= inicioObj && fechaObj <= finObj);
	}
	Chart.register(ChartDataLabels);

	function grapBar(dataset){
		console.log('grapBar');
		//console.log(dataset);
		let ctx = document.getElementById("myChart").getContext("2d");
		if (myChart) {
			myChart.destroy();
		}
		
		myChart = new Chart(ctx, {
		  type: 'bar',
		  data: {
			labels: dataset[1],
			datasets: [{
			  label: ' personas',
			  data: dataset[0],
			  datalabels: {display: false},
			  backgroundColor: [
					'rgba(0, 45, 114, 1)',
					'rgba(206, 15, 105, 1)',
					'rgba(84, 88, 89, 1)',
					'rgba(95, 36, 159, 1)',

					'rgba(206, 15, 105, .5)',
					'rgba(84, 88, 89, .5)',
					'rgba(0, 45, 114, .5)',
					'rgba(95, 36, 159, .5)',

					'rgba(206, 15, 105, .8)',
					'rgba(84, 88, 89, .8)',
					'rgba(0, 45, 114, .8)',
					'rgba(95, 36, 159, .)',
				],
			  borderWidth: 1
			}]
		  },
		  plugins: [ChartDataLabels],
		  options: {
			responsive: true,
			scales: {
			  y: {
				beginAtZero: true
			  },
			  x: {
				ticks: {
					fonSize: 5,
					maxRotation: 25,
					minRotation: 25
				}
			  }
			},
			plugins: {
				legend: {
					display: false
				},
				datalabels: {
					display: false // Ocultar los números dentro de las barras
				  },
				title: {
					display: true,
					text: datos[0]['preg_name'],
					color: 'Black' // Cambiar el color del título a rojo
				}
			}
		  }
		});

		myChart.render();
	}

	function grapBarHor(dataset){
		console.log('grapBarHor');
		//console.log(myChart);
		if (myChart) {
			myChart.destroy();
		}
		const ctx = document.getElementById('myChart');
		myChart = new Chart(ctx, {
			type: 'bar',
			data: {
			  labels: dataset[1],
			  datasets: [{
				label: 'Total',
				axis: 'y',
				datalabels: {display: false},
				data: dataset[0],
				backgroundColor: [
					'rgba(0, 45, 114, 1)',
					'rgba(206, 15, 105, .3)',
					'rgba(84, 88, 89, .5)',
					'rgba(95, 36, 159, .8)',

					'rgba(206, 15, 105, 1)',
					'rgba(84, 88, 89, .3)',
					'rgba(0, 45, 114, .5)',
					'rgba(95, 36, 159, .8)',

					'rgba(84, 88, 89, 1)',
					'rgba(0, 45, 114, .3)',
					'rgba(206, 15, 105, .5)',
					'rgba(95, 36, 159, .8)',
				  ],
				borderWidth: 1
			  }]
			},
			options: {
			indexAxis: 'y',
			  scales: {
				y: {
				  beginAtZero: true
				}
			  },
			  plugins: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: datos[0]['preg_name'],
					color: 'Black' // Cambiar el color del título a rojo
				}
			 }
			}
		  });

		  myChart.render();
	}

	function grapLin(dataset){
		console.log('grapLin');
		//console.log(myChart);
		let ctx = document.getElementById("myChart").getContext("2d");
		if (myChart) {
			myChart.destroy();
		}
		myChart = new Chart(ctx, {
		  type: 'line',
		  data: {
			labels: dataset[1],
			datasets: [{
			  label: 'Total',
			  data: dataset[0],
			  datalabels: {display: false},
			  backgroundColor: [
				'rgba(0, 45, 114, 1)',
					'rgba(206, 15, 105, .3)',
					'rgba(84, 88, 89, .5)',
					'rgba(95, 36, 159, .8)',

					'rgba(206, 15, 105, 1)',
					'rgba(84, 88, 89, .3)',
					'rgba(0, 45, 114, .5)',
					'rgba(95, 36, 159, .8)',

					'rgba(84, 88, 89, 1)',
					'rgba(0, 45, 114, .3)',
					'rgba(206, 15, 105, .5)',
					'rgba(95, 36, 159, .8)',
				],
				borderColor: [
					'rgba(0, 45, 114, 1)',
					'rgba(206, 15, 105, 1)',
					'rgba(84, 88, 89, 1)',
					'rgba(95, 36, 159, 1)',

					'rgba(206, 15, 105, .5)',
					'rgba(84, 88, 89, .5)',
					'rgba(0, 45, 114, .5)',
					'rgba(95, 36, 159, .5)',

					'rgba(206, 15, 105, .8)',
					'rgba(84, 88, 89, .8)',
					'rgba(0, 45, 114, .8)',
					'rgba(95, 36, 159, .)',
				],
			  borderWidth: 1
			}]
		  },
		  options: {
			scales: {
				x: {
					// grid: {
					//   tickColor: 'red'
					// },
					ticks: {
					  color: 'gray',
					}
				  }
			},
			plugins: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: datos[0]['preg_name'],
					color: 'Black' // Cambiar el color del título a rojo
				}
			}
		  }
		});
		myChart.render();
	}

	function grapDonut(dataset){
		console.log('grapDonut');
		//console.log(myChart);
		let ctx = document.getElementById("myChart").getContext("2d");
		if (myChart) {
			myChart.destroy();
		}
		myChart = new Chart(ctx, {
		  type: 'doughnut',
		  data: {
			labels: dataset[1],
			datasets: [{
			  label: 'Total',
			  data: dataset[0],
			  datalabels: {display: false},
			  backgroundColor: [
				'rgba(0, 45, 114, 1)',
					'rgba(206, 15, 105, .3)',
					'rgba(84, 88, 89, .5)',
					'rgba(95, 36, 159, .8)',

					'rgba(206, 15, 105, 1)',
					'rgba(84, 88, 89, .3)',
					'rgba(0, 45, 114, .5)',
					'rgba(95, 36, 159, .8)',

					'rgba(84, 88, 89, 1)',
					'rgba(0, 45, 114, .3)',
					'rgba(206, 15, 105, .5)',
					'rgba(95, 36, 159, .8)',
				],
			  borderColor: [
					'rgba(0, 45, 114, 1)',
					'rgba(206, 15, 105, .3)',
					'rgba(84, 88, 89, .5)',
					'rgba(95, 36, 159, .8)',

					'rgba(206, 15, 105, 1)',
					'rgba(84, 88, 89, .3)',
					'rgba(0, 45, 114, .5)',
					'rgba(95, 36, 159, .8)',

					'rgba(84, 88, 89, 1)',
					'rgba(0, 45, 114, .3)',
					'rgba(206, 15, 105, .5)',
					'rgba(95, 36, 159, .8)',
				],
			  borderWidth: 1
			}],
			hoverOffset: 4
		  },
		  options: {
			plugins: {
				// legend: {
				// 	display: false
				// },
				title: {
					display: true,
					text: datos[0]['preg_name'],
					color: 'Black' // Cambiar el color del título a rojo
				}
			}
		  }
		});
		myChart.render();
	}

	function grapPie(dataset) {
		console.log('grapCircle');
		//console.log(myChart);
		if (myChart) {
			myChart.destroy();
		}
		const ctx = document.getElementById('myChart');
		myChart = new Chart(ctx, {
			type: 'pie',
			data: {
			  labels: dataset[1],
			  datasets: [{
				label: 'Total',
				data: dataset[0],
				datalabels: {display: false},
				backgroundColor: [
						'rgba(0, 45, 114, 1)',
						'rgba(206, 15, 105, .3)',
						'rgba(84, 88, 89, .5)',
						'rgba(95, 36, 159, .8)',

						'rgba(206, 15, 105, 1)',
						'rgba(84, 88, 89, .3)',
						'rgba(0, 45, 114, .5)',
						'rgba(95, 36, 159, .8)',

						'rgba(84, 88, 89, 1)',
						'rgba(0, 45, 114, .3)',
						'rgba(206, 15, 105, .5)',
						'rgba(95, 36, 159, .8)',
				  ]
			  }]
			},
			options: {
				responsive: true,
				plugins: {
					// legend: {
					// 	display: false
					// },
					title: {
						display: true,
						text: datos[0]['preg_name'],
						color: 'Black' // Cambiar el color del título a rojo
					}
				}
			}
		  });

		  myChart.render();
	}

	function grapCircle(dataset) {
		console.log('grapCircle');
		//console.log(myChart);
		if (myChart) {
			myChart.destroy();
		}
		const ctx = document.getElementById('myChart');
		myChart = new Chart(ctx, {
			type: 'polarArea',
			data: {
			  labels: dataset[1],
			  datasets: [{
				label: 'Total',
				data: dataset[0],
				datalabels: {display: false},
				backgroundColor: [
						'rgba(0, 45, 114, 1)',
						'rgba(206, 15, 105, .3)',
						'rgba(84, 88, 89, .5)',
						'rgba(95, 36, 159, .8)',

						'rgba(206, 15, 105, 1)',
						'rgba(84, 88, 89, .3)',
						'rgba(0, 45, 114, .5)',
						'rgba(95, 36, 159, .8)',

						'rgba(84, 88, 89, 1)',
						'rgba(0, 45, 114, .3)',
						'rgba(206, 15, 105, .5)',
						'rgba(95, 36, 159, .8)',
				  ]
			  }]
			},
			options: {
				plugins: {
					// legend: {
					// 	display: false
					// },
					title: {
						display: true,
						text: datos[0]['preg_name'],
						color: 'Black' // Cambiar el color del título a rojo
					}
				}
			}
		  });

		  myChart.render();
	}

	function exportTableToExcel(tableID, filename) {
		if (!filename) filename = 'excel_data.xls';
		let dataType = 'data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8';
	
		// Origen de los datos
		let tableSelect = document.getElementById(tableID);
		let tableHTML = tableSelect.outerHTML;
	
		// Encabezado necesario para los archivos de Excel
		let header = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><meta charset="UTF-8"></head><body>';
		let footer = '</body></html>';
	
		// Combinar encabezado, contenido de la tabla y pie de página
		let html = header + tableHTML + footer;
	
		// Crea el archivo descargable
		let blob = new Blob([html], { type: dataType });
	
		// Crea un enlace de descarga en el navegador
		if (window.navigator && window.navigator.msSaveOrOpenBlob) { // Descargar para IExplorer
			window.navigator.msSaveOrOpenBlob(blob, filename);
		} else { // Descargar para Chrome, Firefox, etc.
			let a = document.createElement("a");
			document.body.appendChild(a);
			a.style = "display: none";
			let xlsUrl = URL.createObjectURL(blob);
			a.href = xlsUrl;
			a.download = filename;
			a.click();
			URL.revokeObjectURL(a.href)
			a.remove();
		}
	}
	});




	
	function analizarSentimiento(datos) {
		let negativos = 0;
		let positivos = 0;
		let neutral = 0;
		let numeros = Array();
		let dataset= Array();
		let palabrasUnicas = Array();
	
		// Frases clave que indican sentimientos positivos
		const frasesPositivas = ['feliz','bonito', 'divertirte', 'amables','amabilidad', 'alegre', 'bien', 'positivo','positiva', 'bueno', 'encantador','encantadora','encantadores','encantadoras','recomendado', 'recomendadídisimo', 'recomendadidisimo', 'recomendable', 'satisfactorio', 'padrisimo', 'padrísimo', 'satisfecho', 'satisfecha', 'satisfechos', 'satisfechas', 'maravilloso','maravillosa','maravillosos','maravillosas', 'excelente', 'increíble', 'increible', 'agradable', 'divertido','divertida','divertidos','divertidas', 'genial', 'fantástico', 'fantastico', 'fantástica', 'fantastica', 'fantásticos', 'fantasticos', 'fantásticas', 'fantasticas','perfecto','perfecta','perfectas','perfectos', 'extraordinario', 'único', 'unico', 'hermoso', 'estupendo', 'fabuloso', 'bien organizado', 'me gusta', 'buen servicio','recomiendo este lugar'];
	
		// Frases clave que indican sentimientos negativos
		const frasesNegativas = ['triste', 'no funciona','mejorar', 'frustar', 'desilusionado', 'desiluciono', 'desiluciona', 'desilucionarse', 'frustrante', 'sucia', 'sucios', 'sucio', 'sucias', 'insatisfecho', 'enojado', 'mal', 'malo', 'mala', 'horrible', 'negativo', 'terrible', 'caducado', 'caducados', 'decepcionante', 'desagradable', 'pesima', 'aburrido', 'estresante', 'frustrante', 'malísimo', 'malísimo', 'caro', 'caros', 'carisímo', 'carisímos', 'carisimo', 'carisimos', 'carisima', 'carisimas', 'carísima', 'carísimas', 'lamentable', 'pésimo', 'pesimo', 'desastroso', 'desastrosa', 'robo', 'grosero', 'groseros', 'grosera', 'groseras', 'mala organización', 'no funciona', 'no me gusta', 'decepcionante experiencia', 'terrible servicio', 'mejorar la hospitalidad',];
	
		$('#sentimentTable').append('<tr class="titTabSent"><td class="pregTabSent">Comentario'+
				'<td class="sentTabSent">Sentimiento</td>'+
				'<td class="dateTabSent">Fecha</td>');
	
		for (let i = 0; i < datos.length; i++) {
			let texto = datos[i]['name']
			texto = texto.toLowerCase();
	
			// Verificar frases clave para determinar el sentimiento
			let positivas = 0;
			let negativas = 0;
	
			frasesPositivas.forEach(frase => {
				if (texto.includes(frase)) {
					positivas++;
				}
			});
	
			frasesNegativas.forEach(frase => {
				if (texto.includes(frase)) {
					negativas++;
				}
			});
	
			let sentimiento;
	
			if (positivas > negativas) {
				sentimiento = 'positivo';
				positivos++;
			} else if (negativas > positivas) {
				sentimiento = 'negativo';
				negativos++;
			} else {
				sentimiento = 'neutral';
				neutral++;
			}
	
			$('#sentimentTable').append('<tr class="tableSent"><td class="pregTabSent">'+datos[i]['name']+'</td>'+
				'<td class="sentTabSent">'+sentimiento.charAt(0).toUpperCase() + sentimiento.slice(1)+'</td>'+
				'<td class="dateTabSent">'+datos[i]['fecha']+'</td>');
		}
	
		numeros.push(negativos, positivos, neutral);
		palabrasUnicas.push('Negativos', 'Positivos', 'Neutral');
		dataset = { 0: numeros, 1: palabrasUnicas };
	
		return dataset;
	}


	// ------------------------- funciones para generar infografias ----------------------------------
	$(document).on(clickHandler, '.genInfografia', function(e) {
		generarInfografia();
	});

	$(document).on(clickHandler, '#genInfog', function(e) {
		openInfografia();
	});
	$(document).on(clickHandler, '#closeInfo', function(e) {
		closeInfografia();
	});

	function closeInfografia() {
		$('.contInfografia').addClass('none');
	}
	let resultado;

	function openInfografia(){
		$('.contInfografia ').removeClass('none');
	}
	async  function generarInfografia() {
		

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




			const inicioDate = new Date(fecInicio2);
            const finDate = new Date(fechaFin2);
			// inicioDate.setHours(0, 0, 0, 0); // Normalizar a las 00:00:00
			// finDate.setHours(23, 59, 59, 999); // Normalizar a las 23:59:59
			finDate.setDate(finDate.getDate() + 1);
			inicioDate.setDate(inicioDate.getDate() + 1);

			// console.log(inicioDate, finDate);
            const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

            
			if (inicioDate.getFullYear() === finDate.getFullYear() && inicioDate.getMonth() === finDate.getMonth()) {
				// Mismo mes
				resultado = monthNames[inicioDate.getMonth()];
			} else {
				// Rango de meses
				const inicioMes = monthNames[inicioDate.getMonth()];
				const finMes = monthNames[finDate.getMonth()];
				if (inicioDate.getDate() === 1 && finDate.getDate() === new Date(finDate.getFullYear(), finDate.getMonth() + 1, 0).getDate()) {
					resultado = monthNames[inicioDate.getMonth()]; // Si es todo el mes
				} else {
					resultado = `Acum. ${inicioMes.substring(0, 3)} - ${finMes.substring(0, 3)}`;
				}
			}

            // console.log(resultado);
            // Aquí puedes definir la variable y usar el valor de 'resultado' como necesites
        
		



			$('.genInfografia').addClass('none');
			$('.load-wrapp').removeClass('none');
			var infografiaInp = document.querySelector('input[name="imageInfo"]:checked');
			let infografia;
			if (infografiaInp) {
				infografia = infografiaInp.nextElementSibling;
				// console.log(infografia); // Aquí puedes hacer lo que necesites con la URL de la imagen seleccionada
			}
			let textInfografia = infografiaInp.value;
			// console.log(textInfografia);
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
				if (textInfografia == 'infografia') {
					infografia1(respuestas);
				}
			}, 500);
			
		}
    }

	function infografia1(respuestas){
		function capitalizeFirstLetter(texto) {
			// console.log(texto);
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

		console.log(respuestas);
		var canvas = document.getElementById('canvaIMG');
		canvas.width = infografia.naturalWidth;
		canvas.height = infografia.naturalHeight;
		

		// Ajusta el ancho máximo y la altura de la línea según sea necesario
		let maxWidth = 600; // Ajusta este valor según sea necesario
		let lineHeight = 100; // Ajusta este valor según sea necesario
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
				ctx.font = '85px Arial'; // Establecer el tamaño y la fuente del texto
				ctx.fillStyle = 'black'; // Establecer el color del texto
				ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta'])+' de ', 280, 1300); // Posición del primer marcador de posición
				ctx.fillText(respuestas[24][0]['respuesta'].replace(/ /g, " a ") + ' años', 220, 1400); 
				// ------------ EN QUE TRABAJA -------------
				ctx.font = 'bold 110px Arial';
				ctx.fillText(parseFloat(respuestas[29][0]['porcentaje'].toFixed(0))+'%', 950, 1200);
				ctx.font = '85px Arial'; // Establecer el tamaño y la fuente del texto
				ctx.fillStyle = 'black'; // Establecer el color del texto
				ctx.fillText(capitalizeFirstLetter(respuestas[29][0]['respuesta']), 870, 1300);
				// ---------------- NIVEL DE ESTUDIOS -------------------
				ctx.font = 'bold 110px Arial';
				ctx.fillText(parseFloat(respuestas[27][0]['porcentaje'].toFixed(0))+'%', 1600, 1200);
				ctx.font = '85px Arial'; // Establecer el tamaño y la fuente del texto
				ctx.fillStyle = 'black'; // Establecer el color del texto
				ctx.fillText(capitalizeFirstLetter(respuestas[27][0]['respuesta']), 1500, 1300);
				
				urlsIconos.push(respuestas[idRespuesta][0]['icons']);
				urlsIconos.push(respuestas[29][0]['icons']);
				urlsIconos.push(respuestas[27][0]['icons']);

				coordenadasIconos.push({ x: 320, y: 900, w: 200, h: 200 });
				coordenadasIconos.push({ x: 950, y: 900, w: 200, h: 200 });
				coordenadasIconos.push({ x: 1650, y: 900, w: 200, h: 200 });
				//icono.src = respuestas[idRespuesta][0]['icons'];

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
							ctx.fillText(capitalizeFirstLetter(respuestas[26][i]['respuesta']), iniciox, inicioy); // Posición del primer marcador de posición
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
							ctx.fillText(capitalizeFirstLetter(respuestas[45][i]['respuesta']), iniciox, inicioy); // Posición del primer marcador de posición
							ctx.font = 'bold 80px Arial';
							ctx.fillText(parseFloat(respuestas[45][i]['porcentaje'].toFixed(0))+'%', iniporx, inipory); 
							inicioy = inicioy + 100;
							inipory = inipory + 100;
						}
					}
					break;
				case 28:
					// ------------- CON QUIENES VIAJA ------------------
					ctx.font = '85px Arial'; // Establecer el tamaño y la fuente del texto
					ctx.fillStyle = 'black'; // Establecer el color del texto
					ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta']), 1250, 3050); // Posición del primer marcador de posición
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestas[idRespuesta][0]['porcentaje'].toFixed(0))+'%', 1500, 3180);
					urlsIconos.push(respuestas[idRespuesta][0]['icons']);
				    coordenadasIconos.push({ x: 1450, y: 3250, w: 280, h: 280 });
					break;
				case 30:
					// ---------------- N° DE PERSONAS ---------------------
					ctx.font = 'bold 110px Arial';
					ctx.fillText(parseFloat(respuestas[idRespuesta][0]['porcentaje'].toFixed(0))+'%', 400, 3100);
					ctx.font = '85px Arial'; // Establecer el tamaño y la fuente del texto
					ctx.fillStyle = 'black'; // Establecer el color del texto
					ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta']), 300, 3200); // Posición del primer marcador de posición
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
									let xPos = 2500 + (index * 550); // Ajusta la posición x según el índice
								// Si es el elemento con "1 dia", lo dibujamos en el centro
								if (respuesta.respuesta === "1 dia") {
									ctx.fillText(respuesta.respuesta, 3050, 1150); // Posición del centro
								} else {
									// Calcula la posición dependiendo del índice y la posición de "1 dia"
									if (index < indice1Dia) {
										ctx.fillText(respuesta.respuesta, 2500 + (index * 550), 1150); // Antes del centro
									} else {
										ctx.fillText(respuesta.respuesta, 3050 + ((index - 1) * 400), 1150); // Después del centro
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
						if (respuestas[35][i].respuesta == "Mas de $2,001") {

						}else{
							respuestas[35][i].respuesta = respuestas[35][i].respuesta.replace(/ /g, " a ");
						}
					}

					let contV = 1;
					//lineCount = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 3400, maxWidth, lineHeight)
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
						// line = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 3650, maxWidth, lineHeight);
						// line = wrapText(ctx, capitalizeFirstLetter(respuestasArray[2]['respuesta']), centerX2, 3900, maxWidth, lineHeight);

						ctx.font = 'bold 110px Arial';
						ctx.fillText(parseFloat(respuestasArray[i]['porcentaje'].toFixed(0)) + '%', 3400, alinePorY + lineHeight * (line + 1));
						// ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 3400, 3670 + lineHeight * (lineCount2 + 1));
						// ctx.fillText(parseFloat(respuestasArray[2]['porcentaje'].toFixed(0))+ '%', 3400, 3920 + lineHeight * (lineCount2 + 1));
						contV++;
						aliney = aliney + 250;
						alinePorY = alinePorY + 250;
					}



					// if (respuestas[35].length === 3) {
					// 	lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 3400, maxWidth, lineHeight);
					// 	lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 3650, maxWidth, lineHeight);
					// 	lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[2]['respuesta']), centerX2, 3900, maxWidth, lineHeight);
					// 	ctx.font = 'bold 110px Arial';
					// 	ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 3400, 3420 + lineHeight * (lineCount1 + 1));
					// 	ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 3400, 3670 + lineHeight * (lineCount2 + 1));
					// 	ctx.fillText(parseFloat(respuestasArray[2]['porcentaje'].toFixed(0))+ '%', 3400, 3920 + lineHeight * (lineCount2 + 1));
					// }
					// if (respuestas[35].length === 2) {
					// 	lineCount1 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[0]['respuesta']), centerX1, 3400, maxWidth, lineHeight);
					// 	lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[1]['respuesta']), centerX2, 3650, maxWidth, lineHeight);
					// 	lineCount2 = wrapText(ctx, capitalizeFirstLetter(respuestasArray[2]['respuesta']), centerX2, 3900, maxWidth, lineHeight);
					// 	ctx.font = 'bold 110px Arial';
					// 	ctx.fillText(parseFloat(respuestasArray[0]['porcentaje'].toFixed(0)) + '%', 3400, 3420 + lineHeight * (lineCount1 + 1));
					// 	ctx.fillText(parseFloat(respuestasArray[1]['porcentaje'].toFixed(0)) + '%', 3400, 3670 + lineHeight * (lineCount2 + 1));
					// 	ctx.fillText(parseFloat(respuestasArray[2]['porcentaje'].toFixed(0))+ '%', 3400, 3920 + lineHeight * (lineCount2 + 1));
					// }
					
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
					// ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][2]['respuesta']), 5400, 1050);
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
					ctx.font = '85px Arial'; // Establecer el tamaño y la fuente del texto
					ctx.fillStyle = 'black'; // Establecer el color del texto
					ctx.fillText(capitalizeFirstLetter(respuestas[idRespuesta][0]['respuesta']), 4850, 2550); // Posición del primer marcador de posición
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
		//console.log(resultado);
		ctx.font = 'bold 135px Arial'; 
		ctx.fillStyle = 'white'; 
		//cargarIconos();
		// parseFloat(objeto.porcentaje.toFixed(1));
		cargarIconos();
		

		let iconosCargados = 0;

		// Función para dibujar un icono en el canvas
		function dibujarIcono(icono, coordenadas) {
			// console.log(icono, coordenadas);
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
					
					// Cargar y dibujar el icono por defecto
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
						enlaceDescarga.download = 'infografia.jpg';
						enlaceDescarga.click();
						$('.genInfografia').removeClass('none');
						$('.load-wrapp').addClass('none');
					}
				}
			});
		}

		
		
		// Llama a la función para cargar los iconos
		
		//ctx.drawImage(icono, 1222, 1164.91); 
// 		icono.onload = function() {
// 			// Dibujar el icono en el canvas después de que se haya cargado
// 			ctx.drawImage(icono, 250, 790, 250, 250); // Cambia las coordenadas según sea necesario
// 			console.log('entro al onload');
// 			var imagenInfografia = canvas.toDataURL('image/jpg');
// // Crear un enlace para descargar la imagen
// 			var enlaceDescarga = document.createElement('a');
// 			enlaceDescarga.href = imagenInfografia;
// 			enlaceDescarga.download = 'infografia.jpg';
// 			enlaceDescarga.click();
			
		};
		
		
		// return;
		// //var canvas = document.createElement('canvas');
		// var canvas = document.getElementById('canvaIMG');
		// canvas.width=0;
		// canvas.width = infografia.naturalWidth;
		// canvas.height = infografia.naturalHeight;
		// var ctx = canvas.getContext('2d');
		// ctx.drawImage(infografia, 0, 0);
		// // Reemplazar los marcadores de posición con los datos estadísticos
		// ctx.font = '30px Arial'; // Establecer el tamaño y la fuente del texto
		// ctx.fillStyle = 'red'; // Establecer el color del texto
		// ctx.fillText('Dato estadístico 1', 121, 421); // Posición del primer marcador de posición
		// ctx.fillText('Dato estadístico 2', 651, 434); // Posición del segundo marcador de posición
		// // Convertir el canvas en una imagen
		// var imagenInfografia = canvas.toDataURL('image/jpg');
		// // Crear un enlace para descargar la imagen
		// console.log(imagenInfografia);
		// var enlaceDescarga = document.createElement('a');
		// enlaceDescarga.href = imagenInfografia;
		// enlaceDescarga.download = 'infografia.jpg';
		// enlaceDescarga.click();
	// }

	async function porcentaje() {
		//console.log(arrDatos);
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
			// console.log(respuestas);
			const resultados = [];
			respuestas.forEach(respuesta => {
				//console.log(respuesta);
				// && respuesta.id_preg === 42
				if (respuesta.length === 0 || respuesta[0].id_preg === '42') {
					return;
				}
				const idPregunta = respuesta[0].id_preg;
				const conteoRespuestasPregunta = {}; // Usamos un objeto para llevar el recuento de cada respuesta
				respuesta.forEach(resp => {
					const nombreRespuesta = resp.name;
					if (!conteoRespuestasPregunta[nombreRespuesta]) {
						conteoRespuestasPregunta[nombreRespuesta] = 1; // Inicializamos el contador en 1 si es la primera vez que vemos esta respuesta
					} else {
						conteoRespuestasPregunta[nombreRespuesta]++; // Incrementamos el contador si ya hemos visto esta respuesta antes
					}
				});
				// Convertimos el objeto en un array de objetos
				const conteoArray = Object.keys(conteoRespuestasPregunta).map(nombreRespuesta => ({
					respuesta: nombreRespuesta,
					conteo: conteoRespuestasPregunta[nombreRespuesta]
				}));
				// Ahora puedes calcular los porcentajes y almacenar los resultados como desees
				const totalRespuestas = respuesta.length;
				conteoArray.forEach(item => {
					item.porcentaje = (item.conteo / totalRespuestas) * 100;
				});
				// Almacenar los resultados para esta pregunta
				resultados.push([idPregunta, conteoArray]);
			});
			//console.log(resultados);
			resolve(resultados);
		});
	}
	
	