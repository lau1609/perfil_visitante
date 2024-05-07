var clickHandler = ('ontouchstart' in document.documentElement ? "touchend" : "click");
	var touchmoved;
	if ('ontouchstart' in document.documentElement){ document.addEventListener("touchstart", function(){}, false); /*var touchSet = true;*/ }

	///import ChartDataLabels from 'chartjs-plugin-datalabels';
//import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";
$(document).ready(function() {
	let muni;
	let myChart = undefined;
	let arrDatos= Array();
	$('#reg').change(function () {
		//console.log('change');
		let elementsToDelete = document.querySelectorAll('.preguntas');
		elementsToDelete.forEach(element => {
			element.remove();
		});

		var elementoAEliminar = document.getElementById("butExc");
		// Verificar si el elemento existe
		if (elementoAEliminar) {
			// Obtener el padre del elemento
			var padre = elementoAEliminar.parentNode;
			// Eliminar el elemento del DOM
			padre.removeChild(elementoAEliminar);
		} else {
			console.log("El elemento no existe.");
		}
		let elementos = document.querySelectorAll('.tableDate');
		// Iterar sobre los elementos y eliminarlos
		elementos.forEach(function(elemento) {
			elemento.remove();
		});
		var reg = parseInt(document.getElementById("reg").value);
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
				$('.aliTit').append('<div class="contButExc"><button id="butExc" data-tab="miTabla" data-nam="'+muni+'.xls")">Exportar a Excel<img style="width: 15px; margin-left: 6px;" src="_images/excel.png"></button></div>');
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
	