var isMobile = false; 
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

	var clickHandler = ('ontouchstart' in document.documentElement ? "touchend" : "click");
	var touchmoved;
	if ('ontouchstart' in document.documentElement){ document.addEventListener("touchstart", function(){}, false); /*var touchSet = true;*/ }

	var tapHandler = ('ontouchstart' in document.documentElement ? "taphold" : "contextmenu");
	var time_session; // <-- Monitor de sessión una ves iniciada esta.
	if(!isMobile)
		{
		   clickHandler = 'click';
		   tapHandler = 'contextmenu';
		}

        let loadCSV = `<div class="contFormCSV">
        <div class="contInst">
        <p><span style="font-weight:900;font-size: 1.3rem;">¡IMPORTANTE!</span><BR> Favor de subir un archivo <span style="font-weight:900;font-style:italic">CSV</span> para poder extraer los destinatarios</p>
        </div>
                <form id="uploadForm" enctype="multipart/form-data">
                    <div class="contQuest">
                      <label for="csvFile" class="custom-file-label">Seleccionar Archivo CSV...</label>
                <input type="file" name="csvFile" id="csvFile" accept=".csv" required="">

                <span id="file-name-display" class="file-name-display">Ningún archivo seleccionado.</span></div>

                    <div class="contQuest">
                    <select name="dataType" id="dataType">
                        <option value="correo" hidden>Selecciona el tipo de envio</option>
                        <option value="correo">Correo Electrónico</option>
                        <option value="telefono">Número de Teléfono</option>
                    </select></div>
                    <div class="contQuest muniHidd"></div>

                    <button type="submit">Procesar Archivo</button>
                </form><div>

                <div id="loader" style="display: none;">
                    Cargando y procesando... <span>⏳</span>
                </div>
                <div id="results"></div>`;
                        
        let sesion = `<div class="conLog">
            <div class="contImgLog">
                <div class="imgBlue" style="--bg-image: url('https://pbs.twimg.com/media/Ew32uCOXIAkgT7m.jpg');">
                        <div _ngcontent-ng-c3296142043="" class="backBlue"></div>
                    </div>
                <div class="wrapper">
                    <div class="container">
                        <h1>Plataforma de envio de encuesta</h1>
                        <div class="form" id="formLog" autocomplete="off" >
                            <input type="text" id="user" placeholder="Usuario">
                            <input type="password" id="contra" placeholder="Contraseña">
                            <button id="login-button" type="button" disabled>Iniciar sesión</button>
                        </div>
                        <p style="font-size:.7rem;font-style:italic;color:white; width:90%">En caso de <span style="font-weight:900">olvidar su contraseña</span>, favor de comunicarse a la Secretaria de Turismo, <span style="font-weight:900">(614) 429 33 00 Ext. 14558</span></p>
                    </div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            
        </div>`;

  
$(document).ready(function() {
    "use strict";
	session_check();
    $(document).on('change', '#csvFile', function() {
        
        const fileInput = this; 
        const fileNameDisplay = document.getElementById('file-name-display');

        if (fileNameDisplay) {
            
            
            if (fileInput.files && fileInput.files.length > 0) {
                
                const fileName = fileInput.files[0].name; 
                
                // Actualización del <span>
                fileNameDisplay.textContent = `Archivo seleccionado: ${fileName}`;
                fileNameDisplay.style.color = '#28a745'; 
                fileNameDisplay.style.fontWeight = 'bold';
                
            } else {
                fileNameDisplay.textContent = 'Ningún archivo seleccionado.';
                fileNameDisplay.style.color = '#6c757d'; 
                fileNameDisplay.style.fontWeight = 'normal';
            }
        }
    });
    

		
});
$(document).on('click', '#login-button', function(e) {
        e.preventDefault();
        let user = $("#user").val();
        let contra = $("#contra").val();
        validate_phpSession(user, contra);
    });


function activarFormulario() {
    const inputs = document.querySelectorAll(".form input");
    const button = document.getElementById("login-button");

    function checkInputs() {
        let allFilled = true;
        inputs.forEach(input => {
        if (input.value.trim() === "") {
            allFilled = false;
        }
        });
        button.disabled = !allFilled;
    }

    inputs.forEach(input => {
        input.addEventListener("input", checkInputs);
    });
    }
	/********************************************************************************************/
/******************        Función para crear menu usuario registrado        ****************/
/********************************************************************************************/
function validate_phpSession(user, contra) {
    var request = $.ajax({
        url: '_includes/_php/login_validate.php?method=validate_session',
        type: "POST",
        dataType: 'json',
		data: {login_user: user,login_password: contra}
    });
    // En conexión exitosa
    request.done(function(response, textStatus, jqXHR) {
        let id;
        if (response['stat'] != 'unsuccessful') {
            id = response['stat'][2];
            var session_response = response['stat'];
            // aqui generar vista de usuario registrado
            user_main(session_response[0], session_response[1]);
            validateMuni(id);
        } else {
			console.log('datos incorrectos');
            activarFormulario();
            alert('Credenciales incorrectas');
            // si no existe session activa
        }
    });        
}

function user_main(userName, userPassword) {
    "use strict";
    $('.contMain').html(loadCSV);
	

	time_session = setInterval(function() { session_check(); }, 600000);
}

				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////                            Validar Session                              ///////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validamos si existe una sesión de usuario.
function session_check() {
    "use strict";

    var request = $.ajax({
        url: '_includes/_php/session_check.php',
        type: "POST",
        dataType: "json",           
        data: { method: 'checking_a_session' },              
    });

    request.done(function(response, textStatus, jqXHR) {

        if (!response || typeof response !== 'object') {
            console.error('Respuesta inesperada:', response);
            handleSessionInactive();
            return;
        }

        if (response.status === 'ok' && response.user) {
            console.log('ya existe sesion');
            $('.contMain').html(loadCSV);  
            let userName = response.user;
            empView(userName);

        } else if (response.status === 'inactive') {
            console.log('no hay sesion');
            handleSessionInactive();

        } else if (response.status === 'error') {
            console.error('Error del servidor:', response.message || 'Error desconocido');
            handleSessionInactive();

        } else {
            console.warn('Respuesta no contemplada:', response);
            handleSessionInactive();
        }
    });

    request.fail(function(jqXHR, textStatus, errorThrown) {
        console.error('Fallo en la petición:', textStatus, errorThrown);
        try {
            if (jqXHR && jqXHR.responseText) {
                console.error('Respuesta del servidor:', jqXHR.responseText);
            }
        } catch (e) { /* ignore */ }
        handleSessionInactive();
    });

    function handleSessionInactive() {
        if (typeof clearInterval === 'function') {
            clearInterval(time_session);
        } else {
            try { clearInterval(window.time_session); } catch(e){}
        }
        $('.contMain').html(sesion); 
        if (typeof activarFormulario === 'function') activarFormulario();
    }
}




function validateMuni(user) {
    // console.log(user);
    $.ajax({
            url: '_includes/_php/querys.php',
            type: 'POST',
            dataType: "json",
            data: {id:user, valiUsSes:true},
            success: function(data) {
               console.log(data);
               if (data['found'] == true) {  
                $('#uploadForm').append(`<input type="hidden" name="url" value="${data['user']['url_loc']}">
                                        <input type="hidden" name="loc" value="${data['user']['name_loc']}">`);
                let hoteles = data['hoteles'];
                if (data['hoteles'].length > 1) {
                    $('.muniHidd').append(`
                            <select name="hotel" id="selMuni">
                                <option value="" hidden="">Seleccione el hotel al que pertenece</option>
                            </select>`);
                        
                        // console.log(hoteles);
                    for (let i = 0; i < hoteles.length; i++) {
                       $('#selMuni').append(`<option value="${hoteles[i]['hotel_clave']}">${hoteles[i]['hotel_name']}</option>`);
                    }
                }else{
                    $('.muniHidd').append(`<input type="hidden" name="hotel" value="${hoteles[0]['hotel_clave']}">`);
                }
               }else{
                alert('sin municipio seleccionado');
               }
            },
            error: function(xhr, status, error) {
               
            }
        });
}

function empView(user) {
    request = $.ajax({
        url: '_includes/_php/querys.php',
        type: "POST",
        dataType: 'text',
        data: {empView: true, user}
    });
    request.done(function(response, textStatus, jqXHR) {
        if (response != '') {
            validateMuni(response);
        }else{
            alert('Sin municipio detectado. Favor de comunicarse con la Secretaria de Turismo');
        }
        
    });
    request.fail(function(response, textStatus, jqXHR) {
        console.log('fallo el ajax');
        alert('FALLO EN EL SERVIDOR. FAVOR DE COMUNICARSE A LA SECRETARIA DE TURISMO');
    });
}



