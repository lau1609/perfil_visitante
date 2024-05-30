// JavaScript Document

/* PREPARATIVOS */	


var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

	// Touch or Click Definimos si se usará click o Touch según disponibilidad // touchstart
	var clickHandler = ('ontouchstart' in document.documentElement ? "touchend" : "click");
	var touchmoved;
	if ('ontouchstart' in document.documentElement){ document.addEventListener("touchstart", function(){}, false); /*var touchSet = true;*/ }

	/* EJEMPLO 

	$(document).on(clickHandler, "SELECTOR", function(){		
		if(!touchmoved){	
			
			CODIGO
		
			
		}
	}).on('touchmove', function(e){
		touchmoved = true;
	}).on('touchstart', function(){
		touchmoved = false;
	});*/
	
	// Long Tab or Click Derecho
	var tapHandler = ('ontouchstart' in document.documentElement ? "taphold" : "contextmenu");
	
	if(!isMobile)
		{
		   clickHandler = 'click';
		   tapHandler = 'contextmenu';
		}


		let municipio;

$(document).ready(function() {
    "use strict";

	//cronometro();
	

		// en cuento se carga la pagina, se da overflow hidden
		  window.addEventListener('load', function() {
			setTimeout(function() {
				//console.log('ghdj');
			  window.scroll({
				top: 0,
				left: 0,
				behavior: 'auto'
			  });
			}, 0);
		  });
		 	$('body').css('overflow', 'hidden');
		
	  
			
	/* -------------------------------------- */

	// click de nueva encuesta (recarga la pagina)
	
	$(document).on('click', '#newEnc', function(e) {
		location.replace(location.href);
	});

	// Envio de encuesta
	
	$(document).on('submit', '.form-questions', function(e) {
		e.preventDefault(); // Evita el envío del formulario por defecto
		var $form = $(this);
		const formData = $(this).serializeArray();
		var respuestaObj = [];
		const respuestas = {};
		const elementosQsGeneral = $(this).find('.qs-general');
  		const cant = elementosQsGeneral.length;
		const valorEnc = $form.find('.parteEncuesta').val();
		municipio = $form.find('.municipio').val();
		const clave = $form.find('#hotel').val();
		console.log(clave)


		//return;
		 var $inputs = $form.find("input, select, button, textarea, checkbox, number, radio, text, range, label");
		 $form.find('.required').each(function() {
			// console.log(this.value);
			// console.log(this);
		   if (this.value === '' ) {
				$(this).css('border', '1px solid red');
			} else {
				$(this).css('border-color', ''); // Elimina el borde rojo si no está vacío
				var preguntaID = $(this).data('id-pregunta');
				var respuesta = $(this).val();
				  respuestaObj.push({
					preguntaID: preguntaID,
					respuesta: respuesta
				});

			}
		});

		$form.find('.checkRadio').each(function() {
			const preguntaRadio = $(this);
			const preguntaID = preguntaRadio.attr('data-id-pregunta');
			let respuestaSeleccionada = null;
			console.log(preguntaRadio);
		
			// Obtener el input de tipo radio seleccionado dentro del grupo
			const inputSeleccionado = preguntaRadio.find('input[type="radio"]:checked');
			console.log(inputSeleccionado);
		
			// Verificar si se seleccionó algún radio button
			if (inputSeleccionado.length > 0) {
				// Obtener el valor seleccionado
				respuestaSeleccionada = inputSeleccionado.val();
				// Eliminar el borde rojo (en caso de haberlo)
				preguntaRadio.css('border-color', 'transparent');
			} else {
				// No se seleccionó ninguna opción, establecer borde rojo
				preguntaRadio.css('border', '1px solid red');
			}
		
			// Agregar la respuesta al array de respuestas
			respuestaObj.push({
				preguntaID: preguntaID,
				respuesta: respuestaSeleccionada
			});
			console.log(respuestaObj);
		});
		

		$form.find('.checkbox').each(function() {
			const preguntaCheckbox = $(this);
			const preguntaID = preguntaCheckbox.attr('data-id-pregunta');
			let nameArray = preguntaID;
			nameArray = [];
			const checkboxesSeleccionados = preguntaCheckbox.find('input[type="checkbox"]:checked');
			const checkboxesSeleccionado = Array.from(checkboxesSeleccionados).filter(checkbox => checkbox.checked);
			if (checkboxesSeleccionado.length > 0) {
				$(this).css('border-color', 'transparent');
				checkboxesSeleccionado.forEach(checkbox => {
					const valor = checkbox.value;
					nameArray.push(valor);
				});
				respuestaObj.push({
					preguntaID: preguntaID,
					respuesta: nameArray
				});
				//respuestas[preguntaID] = nameArray;
				
			}else if (checkboxesSeleccionado == 0) {
				$(this).css('border', '1px solid red');
			}
		  });
		let countRequiredElements = $form.find('.required').length;
		let countCheckboxElements = $form.find('.checkbox').length;
		let countRadio = $form.find('.checkRadio').length;
		let totalCount = 0;
		if (countCheckboxElements > 0 || countRadio > 0) {
			totalCount = countRequiredElements + countCheckboxElements + countRadio;
		} else {
			totalCount = countRequiredElements;
		}
		// Sumar los conteos para obtener el número total de elementos con clase "required" o "checkbox"
		//console.log(totalCount);
		//console.log(respuestaObj.length);
		console.log(respuestaObj);
		  let g = true;
		  //return;
		if (respuestaObj.length == totalCount) {
			var request;
			var serializedData = [];
			$inputs.each(function() {
				//   serializedData.push(respuestaObj);
				//   if (respuestas > 0) {
				// 	respuestaObj = {
				// 		ckeckbox: respuestas
				// 	  };
				//   }
				//   console.log(respuestaObj);
				// //}
			  });

			  
			$inputs.prop("disabled", true);
			var request;
			//Abortamos cualquier solicitud actual
			if (request) { request.abort(); }
			//console.log(respuestaObj);
			
			request = $.ajax({
				dataType: 'text', //json
				url: '../_includes/_php/querys.php',
				type: 'POST',
				data: {respuestaObj, valorEnc, municipio, clave },
				success: function(data) {
					console.log(data);
					$inputs.prop("disabled", false);
					if(data == 'success'){
						var bodyElement = document.querySelector('body');
						const section2 = document.getElementById('section2');
						$('.align-enc').addClass('none');
						$('.cont-pop').addClass('block');
						$('.cont-pop').removeClass('none');
						cronometro().then(() => {
							$('#newEnc').trigger('click');
							// Aquí puedes poner cualquier código que necesite ejecutarse después de que el cronómetro haya terminado
						});
						
						// setTimeout(() => {
						// 	$('#newEnc').trigger('click');
						// }, 30000);
						// console.log('Formulario enviado');
					}
				}

			});
		}else {
			alert('Seleccione todas las opciones con *');
		}
	});
});

$(document).on(clickHandler, 'input[name="cantPerson"]', function(e) {
	console.log('el onchange');
	var person = $(this).val();
	const divWhyPerson = document.getElementById("whyPersonVis");
	const selPerson = document.getElementById("selPerson");
	
	if (person == "Ninguna") {
		$(selPerson).removeClass('required'); 
		divWhyPerson.style.display = 'none'; CSS
		
	}else {
		$(selPerson).addClass('required'); 
		divWhyPerson.style.display = 'block'; 
	}
});


// click de nacionalidad

$(document).on(clickHandler, 'input[name="nacionalidad"]', function(e) {
	console.log('el onchange');
	var nac = $(this).val();
	const mex = document.getElementById("mexico");
	const inter = document.getElementById("inter");
	const eu = document.getElementById("estEU");
	const mx = document.getElementById("estMex");
	eu.style.display = 'none'; 
	mx.style.display = 'none'; 
	$('.united').removeClass('required'); 
	$('.mex').removeClass('required'); 

	if (nac == "Mexico") {
		mex.style.display = 'block'; 
		inter.style.display = 'none';
		$(mex).addClass('required'); 
		$(inter).removeClass('required'); 
	}else if (nac == "Internacional") {
		inter.style.display = 'block'; 
		mex.style.display = 'none'; 
		$(inter).addClass('required'); 
		$(mex).removeClass('required'); 
	}
});

$(document).on(clickHandler, '#openQR', function(e) {
	console.log(municipio);
	let muniQR
	if (municipio == 2) {
		muniQR == 'Juarez'
	}else if (municipio == 1) {
		muniQR = 'Chihuahua';
	}
	window.open("https://sichitur.org/generateQR/?loc="+muniQR);
});



$(document).on(clickHandler, '.qs-general', function(e) {
    if (!touchmoved) {
        $(function() {
			$('#inter').change(function(e) {
				console.log('inernacional');
				var ue = document.getElementById("inter").value;
				const eu = document.getElementById("estEU");

				if (ue == "Estados-Unidos" ) {
					console.log('el display de eu');
					eu.style.display = 'block'; 
					$('.united').addClass('required'); 
				}else {
					$('.united').removeClass('required'); 
					eu.style.display = 'none'; 
				}
            });


			$('#mexico').change(function(e) {
				console.log('mexico');
				var me = this.value;
				const mex = document.getElementById("estMex");

				if (me == "Chihuahua" ) {
					console.log('el display de eu');
					mex.style.display = 'block'; 
					$('.mex').addClass('required'); 
				}else {
					$('.mex').removeClass('required'); 
					mex.style.display = 'none'; 
				}
            });



			$('#restAct').change(function(e) {
				//console.log('el onchange restAct');
				var nac = document.getElementById("restAct").value;
				const res = document.getElementById("Restaurante");
				const resF = $("#Restaurante"); 
				const actF = $("#Actividades"); 
				const act = document.getElementById("Actividades");
				if (nac == "Restaurante") {
					resF.find('.qs-general').each(function() {
						const selectElement = $(this).find('select');
						const selectText = $(this).find('textarea');
						const inputText= $(this).find('input[type="text"]');
						if (selectElement.length > 0) {
							selectElement.addClass('required');
						  }
						  if (selectText.length > 0) {
							//console.log('textarea');
							selectText.addClass('required');
						  }
						  if (inputText.length > 0) {
							inputText.addClass('required');
						  }
					});


					actF.find('.qs-general').each(function() {
						const selectElement = $(this).find('select');
						const selectText = $(this).find('textarea');
						const inputText= $(this).find('input[type="text"]');
						if (selectElement.length > 0) {
							selectElement.removeClass('required');
						  }
						  if (selectText.length > 0) {
							selectText.removeClass('required');
						  }
						  if (inputText.length > 0) {
							inputText.removeClass('required');
						  }
					});
					res.style.display = 'block'; 
					act.style.display = 'none'; 

				// --------------------------------------------

				}else if (nac == "Actividades") {
					actF.find('.qs-general').each(function() {
						const selectElement = $(this).find('select');
						const selectText = $(this).find('textarea');
						const inputText= $(this).find('input[type="text"]');
						if (selectElement.length > 0) {
							selectElement.addClass('required');
						  }
						  if (selectText.length > 0) {
							selectText.addClass('required');
						  }
						  if (inputText.length > 0) {
							inputText.addClass('required');
						  }
					});

					resF.find('.qs-general').each(function() {
						const selectElement = $(this).find('select');
						const selectText = $(this).find('textarea');
						const inputText= $(this).find('input[type="text"]');
						if (selectElement.length > 0) {
							selectElement.removeClass('required');
						  }
						  if (selectText.length > 0) {
							selectText.removeClass('required');
						  }
						  if (inputText.length > 0) {
							inputText.removeClass('required');
						  }
				});

					act.style.display = 'block'; 
					res.style.display = 'none'; 
				}
            });
		});
	}


	

	var checkW = document.getElementById('work');
	var clicDiv = document.getElementsByClassName('clickOpDiv');
    var contCheck = document.getElementById('contWork');
	var estudio = document.getElementById('Estudios');
	var contCheck2 = document.getElementById('contWork2');
    $(document).on(clickHandler, clicDiv, function(e) {
		const element = $(contCheck).find('.qs-general');
        //console.log('change de checkbooooox');
        if (checkW.checked || estudio.checked) {
			if (estudio.checked && checkW.checked || checkW.checked) {
				$(contCheck).removeClass('none');
				$(contCheck2).removeClass('none');
				element.find('select').each(function() {
					$(this).addClass('required');
				});
			}else if (estudio.checked) {
				$(contCheck).removeClass('none');
				$('.giroEcon').addClass('required');
				$(contCheck2).addClass('none');
				$('.viaticos').removeClass('required');
			}
        } else {
			element.find('select').each(function() {
				$(this).removeClass('required');
			});
            $(contCheck).addClass('none');
        }
    });



	
    // estudio.addEventListener('change', function() {
	// 	console.log('click estudio');
	// 	const element = $(contCheck).find('.qs-general');
    //     //console.log('change de checkbooooox');
    //     if (estudio.checked || checkW.checked) {
	// 		if (estudio.checked) {
	// 			$(contCheck).removeClass('none');
	// 			$('.giroEcon').addClass('required');
	// 		}else{
	// 			$(contCheck).removeClass('none');
	// 			$(contCheck2).removeClass('none');
	// 			element.find('select').each(function() {
	// 				$(this).addClass('required');
	// 			});
	// 		}
    //     } else {
	// 		element.find('select').each(function() {
	// 			$(this).removeClass('required');
	// 		});
    //         $(contCheck).addClass('none');
    //     }
    // });


});


let end;
console.log(end);
	function cronometro() {
		end  = Date.now() + 30*1000;
		console.log('cronometro');
		return new Promise((resolve, reject) => {
			cronometro2(resolve);
		});	}
	
	function cronometro2(resolve) {
		
		let caja = document.querySelector('.caja');
		let tiempoTranscurrido = Math.floor((end - Date.now()) / 1000);
		//console.log(tiempoTranscurrido);
		if(tiempoTranscurrido > 0)
		{
		   console.log(`Han transcurrido ${tiempoTranscurrido} segundos`);
		   caja.innerHTML = tiempoTranscurrido;
		   //Programamos para que se revise de nuevo el tiempo transcurrido en 500ms
		   setTimeout(() => {
            cronometro2(resolve);
        }, 500);
		} else{
			resolve();
		}
	  
	}

//Cambio de tamaño en la vetana
function thisResize() {
	
}

/* ################################################################################################################################################ */

		/* /////////////////////////////// ENVIO DEL CONTACTANOS /////////////////////////// */

		$(document).on('submit','#form-contact',function(e){
			"use strict";
			console.log("Enviando");
			var rootpath = 'https://vhverificaciones.com.mx/';
					// Definimos el tipo de formulario
					var loginPath = rootpath+'correo/envio_correo.php';
					//console.log(rootpath);
					console.log(loginPath);
					// Variable que contiene la solicitud
					var request;
					// Establecemos la variable del Formulario
					var $form = $(this);
					// Seleccionamos todos los posibles inputs
					var $inputs = $form.find("input, select, button, textarea, checkbox, number, radio, text, range, label");
					// Serializamos la información del Formulario 
					var serializedData = $form.serialize();
					console.log(serializedData);
					// Deshabilitamos los inputs mientras se ejecuta el Ajax
					$inputs.prop("disabled", true);
					// Disparamos la solicitud (request) 
					request = $.ajax({
						url: loginPath,
						//dataType: "json",
						type: "post",
						data: serializedData
					});
					
					// Conexión exitosa
					request.done(function (response, textStatus, jqXHR){					
						console.log(response);

						/* if (i>0) {
							
						} */$inputs.prop("disabled", false);
						if(response != 'fail'){
							console.log('se envio el correo');
							$("#content").html("¡Gracias por contactarnos!");
							setTimeout(function() {
									console.log('close');
									$('#form-contact').addClass('none');
							}, 300);	
						}else{
							i++;
						}
					}); 
				
					 //Si falla la conexión
					request.fail(function (jqXHR, textStatus, errorThrown){
						console.error(
						"Han ocurrido los siguientes errores: "+
						textStatus, errorThrown
						);
					});			
					// Habilitamos de nuevo los botones
					request.always(function () {
					});
				// No enviar el formulario
				return false; 
			
			});


			$(document).on('click', '#menu_btn', function(e) {
				"use strict";
				if (!touchmoved) {
					$('header').toggleClass('opened');
				}
			}).on('touchmove', function(e) {
				touchmoved = true;
			}).on('touchstart', function() {
				touchmoved = false;
			});


			//open popup
			$('.btt-lrm').on('click', function() {
				console.log('click open');
				$('.cd-popup').addClass('is-visible');
				return false;
			});


	$(document).on(clickHandler, '.btn-hamburguesa', function(e) {
		"use strict";
		if (!touchmoved) {
			$('header').toggleClass('opened');
		}
	}).on('touchmove', function(e) {
		touchmoved = true;
	}).on('touchstart', function() {
		touchmoved = false;
	});


	$('.cd-popup').height($(window).height());
   
   
	   //close popup
		   $('.cd-popup-close').on('click', function() {
			   console.log('click close');
			   $('.cd-popup').removeClass('is-visible');
			   return false;
		   });

var resizeTimer; $(window).resize(function () { if (resizeTimer) { clearTimeout(resizeTimer); } resizeTimer = setTimeout(function() { resizeTimer = null; thisResize(); }, 500);});