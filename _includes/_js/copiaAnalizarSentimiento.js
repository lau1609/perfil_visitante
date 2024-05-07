function analizarSentimiento(datos) {
		let negativos = 0;
		let positivos = 0;
		let neutral = 0;
		let numeros = Array();
		let dataset= Array();
		let palabrasUnicas = Array();
		// Palabras clave que indican sentimientos positivos
		const palabrasPositivas = ['feliz','bonito', 'divertirte', 'amables','amabilidad', 'alegre', 'bien', 'positivo','positiva', 'bueno', 'encantador','encantadora','encantadores','encantadoras','recomendado', 'recomendadídisimo', 'recomendadidisimo', 'recomendable', 'satisfactorio', 'padrisimo', 'padrísimo', 'satisfecho', 'satisfecha', 'satisfechos', 'satisfechas', 'maravilloso','maravillosa','maravillosos','maravillosas', 'excelente', 'increíble', 'increible', 'agradable', 'divertido','divertida','divertidos','divertidas', 'genial', 'fantástico', 'fantastico', 'fantástica', 'fantastica', 'fantásticos', 'fantasticos', 'fantásticas', 'fantasticas','perfecto','perfecta','perfectas','perfectos', 'extraordinario', 'único', 'unico', 'hermoso', 'estupendo', 'fabuloso'];
		// Palabras clave que indican sentimientos negativos
		const palabrasNegativas = ['triste', 'mejorar', 'frustar', 'desilusionado', 'desiluciono', 'desiluciona', 'desilucionarse', 'frustrante', 'sucia', 'sucios', 'sucio', 'sucias', 'insatisfecho', 'enojado', 'mal', 'malo', 'mala', 'horrible', 'negativo', 'terrible', 'caducado', 'caducados', 'decepcionante', 'desagradable', 'pesima', 'aburrido', 'estresante', 'frustrante', 'malísimo', 'malísimo', 'caro', 'caros', 'carisímo', 'carisímos', 'carisimo', 'carisimos', 'carisima', 'carisimas', 'carísima', 'carísimas', 'lamentable', 'pésimo', 'pesimo', 'desastroso', 'desastrosa', 'robo', 'grosero', 'groseros', 'grosera', 'groseras'];
		$('#sentimentTable').append('<tr class="titTabSent"><td class="pregTabSent">Comentario'+
				'<td class="sentTabSent">Sentimiento</td>'+
				'<td class="dateTabSent">Fecha</td>');

		for (let i = 0; i < datos.length; i++) {
			let texto = datos[i]['name']
			// Convertir el texto a minúsculas para hacer coincidencias insensibles a mayúsculas y minúsculas
			texto = texto.toLowerCase();
			// Dividir el texto en palabras
			const palabras = texto.split(/\s+/);
			// Contadores para palabras positivas, negativas y neutras
			let positivas = 0;
			let negativas = 0;
			// Analizar cada palabra del texto
			palabras.forEach(palabra => {
				if (palabrasPositivas.includes(palabra)) {
					positivas++;
				} else if (palabrasNegativas.includes(palabra)) {
					negativas++;
				}
			});
			// Determinar el sentimiento basado en el recuento de palabras positivas y negativas
			let sentimiento;
			
			if (positivas > negativas) {
				sentimiento = 'positivo';
				positivos++;
				$('#sentimentTable').append('<tr class="tableSent"><td class="pregTabSent">'+datos[i]['name']+'</td>'+
				'<td class="sentTabSent">Positivo</td>'+
				'<td class="dateTabSent">'+datos[i]['fecha']+'</td>');
			} else if (negativas > positivas) {
				sentimiento = 'negativo';
				negativos++;
				$('#sentimentTable').append('<tr class="tableSent"><td class="pregTabSent">'+datos[i]['name']+'</td>'+
				'<td class="sentTabSent">Negativo</td>'+
				'<td class="dateTabSent">'+datos[i]['fecha']+'</td>');
			} else {
				sentimiento = 'neutral';
				neutral++;
				$('#sentimentTable').append('<tr class="tableSent"><td class="pregTabSent">'+datos[i]['name']+'</td>'+
				'<td class="sentTabSent">Neutral</td>'+
				'<td class="dateTabSent">'+datos[i]['fecha']+'</td>');
			}  
		}


		numeros.push(negativos, positivos, neutral);
		palabrasUnicas.push('Negativos', 'Positivos', 'Neutral');
		dataset = { 0: numeros, 1: palabrasUnicas };

		return dataset;
	}