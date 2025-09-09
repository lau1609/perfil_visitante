var isMobile = false; //initiate as false
// import tinyColor from "https://cdn.skypack.dev/tinycolor2@1.4.2";
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

	// Touch or Click Definimos si se usará click o Touch según disponibilidad // touchstart
	var clickHandler = ('ontouchstart' in document.documentElement ? "touchend" : "click");
	var touchmoved;
	if ('ontouchstart' in document.documentElement){ document.addEventListener("touchstart", function(){}, false); /*var touchSet = true;*/ }

	var tapHandler = ('ontouchstart' in document.documentElement ? "taphold" : "contextmenu");
	
	if(!isMobile)
		{
		   clickHandler = 'click';
		   tapHandler = 'contextmenu';
		}
        

        let html =
            '<div id="filters">'+
            '<label id="labSelect" for="" style="border-left: 1px solid #8F4ADA;">'+
                '<select name="localidad" id="localidad">'+
                    '<option hidden="" value="">Selecciona una localidad</option>'+
                    '<option value="2">Chihuahua</option>'+
                    '<option value="3">Casas Grandes</option>'+
                    '<option value="4">Guachochi</option>'+
                    '<option value="6">Creel</option>'+
                    '<option value="7">Batopilas</option>'+
                    '<option value="8">Parral</option>'+
                    '<option value="1">Juarez</option>'+
                '</select>'+
            '</label>'+
            '<div class="divFilterFec" style="display: flex">'+
                '<label for="" style="border-left: 1px solid #4C74B2;">De<input type="date" name="inicio" id="inicio"></label><label for="" style="border-left: 1px solid #CE0F69;">hasta<input type="date" name="fin" id="fin"></label>'+
            '</div>'+
            '<div style="display: flex; margin-left: 15px;align-items: center;"><button id="show">Mostrar</button></div>'+
        '</div>'+
        '<div class="contHotelGrTab" style="width:100% ;display: flex;justify-content: space-between;">'+
            '<table id="tableContHot" style="width:100%;">'+
                '<tr style="color: blueviolet;background: #EADBF5;">'+
                    
                '</tr>'+
            '</table>'+
            '<div class="contGraph" style="width:100%">'+
                '<div class="contButGenRepor none">'+
                    '<p>Generar Reporte</p>'+
                    '<button class="pointer reportesMS" id="reporMen" data-muni="" data-id="mens">Mensual</button>'+
                    '<button class="pointer reportesMS" id="reporSem" data-muni="" data-id="sem">Semanal</button>'+
                    '<button class="pointer reportInfog" id="reporInf" data-muni="" data-id="infografia">Infografía</button>'+
                '</div>'+
                '<div style="width:100%;display: flex;justify-content: space-around;align-items: flex-end;">'+
                    '<canvas id="myChartMensual"></canvas>'+
                    '<canvas id="myChart2"></canvas>'+
                '</div>'+
                
            '</div>'+
            '<div class="graphMens none"> <button id="viewHotel" class="viewHotel">Ver por hotel</button><canvas class="none" id="myChart"></canvas><div>'+
        '</div>';

        let html2 ='<div class="contFiltradoInfo">'+
                    '<h3 style="margin-top: 35px;width: 100%;font-weight: 600;">Filtrado de información</h3>'+
                    '<div class="contOptFilt">'+
                       ' <label for="" style="box-shadow: 2px 1px 4px rgb(72, 103, 209, 40%);"><input type="radio" name="filtInfo" value="all" id="">Todo</label>'+
                        '<label for="" style="box-shadow: 2px 1px 4px rgb(201, 49, 201, 40%);"><input type="radio" name="filtInfo" value="between" id="">Comparativa</label>'+
                        '<label for="" style="box-shadow: 2px 1px 4px rgb(49, 201, 155, 40%);"><input type="radio" name="filtInfo" value="only" id="">Individual</label>'+
                        '<label class="pointer" id="reporGen" for="" style="margin-left:30px;font-weight: 700;background: rgb(112, 36, 119, .8);color: white;">Reporte General</label>'+
                    '</div>'+
                '</div>'+
                '<div class="secDiv2Hot">'+
                '</div>'+
                '<div class="secDivHot">'+
                    '<h3 style="margin-top: 35px;width: 100%;font-weight: 600;">Información de hoteles</h3>'+
                    '<div class="selMuniFilt">'+
                        '<select name="muniFilt" id="muniFilt">'+
                            '<option hidden="" value="">Selecciona una localidad</option>'+
                            '<option value="2">Chihuahua</option>'+
                            '<option value="3">Casas Grandes</option>'+
                            '<option value="4">Guachochi</option>'+
                            '<option value="6">Creel</option>'+
                            '<option value="7">Batopilas</option>'+
                            '<option value="8">Parral</option>'+
                            '<option value="1">Juarez</option>'+
                       ' </select>'+
                    '</div>'+
                    '<table class="infoHotel" id="infoHotel" style="width:100%">'+
                        '<tr style="">'+
                            '<th style="width:15%">Hotel</th>'+
                            '<th style="width:15%">Clave</th>'+
                            '<th style="width:20%">Telefono</th>'+
                            '<th style="width:40%">Dirección</th> '+
                        '</tr>'+
                    '</table>'+
                '</div>';

                let individual =
            '<div id="filters">'+
            
            '<label id="labSelect" for="" style="border-left: 1px solid #8F4ADA;">'+
                '<select name="localidad" class="locIndividual" id="localidad">'+
                    '<option hidden="" value="">Selecciona una localidad</option>'+
                    '<option value="2">Chihuahua</option>'+
                    '<option value="3">Casas Grandes</option>'+
                    '<option value="1">Juarez</option>'+
                    '<option value="4">Guachochi</option>'+
                    '<option value="6">Creel</option>'+
                    '<option value="7">Batopilas</option>'+
                    '<option value="8">Parral</option>'+
                '</select>'+
            '</label>'+
            '<label id="labSelect" for="" style="border-left: 1px solid #C0C0C1;">'+
                '<select name="hotel" id="hotel">'+
                    '<option hidden="" value="">Selecciona un hotel</option>'+
                '</select>'+
            '</label>'+
            '<div class="divFilterFec" style="display: flex">'+
                '<label for="" style="border-left: 1px solid #4C74B2;">De<input type="date" name="inicio" id="inicio"></label><label for="" style="border-left: 1px solid #CE0F69;">hasta<input type="date" name="fin" id="fin"></label>'+
            '</div>'+
            '<div style="display: flex; margin-left: 15px;align-items: center;"><button id="show3">Mostrar</button></div>'+
        '</div>'+
        '<div class="contHotelGrTab" style="width:100% ;display: flex;justify-content: space-between;">'+
            '<table id="tableContHot" style="width:100%;">'+
                '<tr style="color: blueviolet;background: #EADBF5;">'+
                '</tr>'+
            '</table>'+
            '<div class="contGraph" style="width:100%">'+
                '<canvas id="myChart"></canvas>'+
            '</div>'+
        '</div>';

        let estadis = 
    '<div id="contCanvaInc">'+
        '<div class="inicialLoc">'+
            '<label id="labIniLoc" for="">'+
                '<select class="local" name="localidad2" id="localidad2">'+
                    '<option hidden="" value="">Localidad para esta sección</option>'+
                    '<option value="2">Chihuahua</option>'+
                    '<option value="1">Juarez</option>'+
                    '<option value="3">Casas Grandes</option>'+
                    '<option value="4">Guachochi</option>'+
                    '<option value="6">Creel</option>'+
                    '<option value="7">Batopilas</option>'+
                    '<option value="8">Parral</option>'+
                '</select>'+
                '<button class="resFilt none">Reset filtros</button>'+
            '</label>'+
        '</div>'+
            '<div class="conGraf">'+
                '<h3>Graficar</h3>'+
                '<div class="contButGraf">'+
                    '<button class="butFiltInc" data-mes="1" data-filtInc="1" style="background-color: rgb(0, 45, 114, .8);">Mes</button>'+
                    '<button class="butFiltInc" data-mes="1" data-filtInc="2" style="background-color: rgb(206, 15, 105, .8);">Establecimiento</button>'+
                    '<button class="butFiltInc" data-mes="1" data-filtInc="3" style="background-color: rgb(95, 36, 159, .8);">Estatus</button>'+
                    '<button class="butFiltInc none more" data-mes="1" data-incTyp="" data-filtinc="4" style="background-color: rgba(84, 88, 89,1);position: absolute;top: 46%;right: 9%;">Último mes</button>'+
                '</div>'+
            '</div>'+
            '<div id="containCanvaInc"><p>Seleccionar gráfica <br> (El contenido será de los ultimos 3 meses)</p></div>'+
        '</div>'+
        '<div class="contTabInc">'+
            '<div class="filtInc" id="filters">'+
                '<label id="labSelect" for="" style="border-left: 1px solid #C0C0C1;">'+
                    '<select name="statInc" id="statInc">'+
                        '<option hidden="" value="">Estatus de recompensas</option>'+
                        '<option value="0">Recompensas activas</option>'+
                        '<option value="1">Recompensas inactivas</option>'+
                        '<option value="2">Dadas de baja</option>'+
                    ' </select>'+
                '</label>'+
                '<label id="labSelect" for="" style="border-left: 1px solid #C0C0C1;">'+
                    '<select name="estabInc" id="estabInc">'+
                        '<option hidden="" value="">Selecciona establecimiento</option>'+
                    ' </select>'+
                '</label>'+
                '<label id="labSelect" for="" style="border-left: 1px solid #C0C0C1;">'+
                    '<select name="time" id="time">'+
                        '<option hidden="" value="">Ver por . . .</option>'+
                        '<option value="1">Mes</option>'+
                        '<option value="2">3 meses</option>'+
                    ' </select>'+
                '</label>'+
                
            '</div>'+
            '<div id="titleTabInc"><h3></h3></div>'+
            '<table id="tabInc">'+
                '<tr style="background-color: rgb(115, 62, 172); color: white;">'+
                    '<th>Folio</th>'+
                    '<th>Establecimiento</th>'+
                    '<th>Creación</th>'+
                    '<th>Finalización</th>'+
                    '<th>Estatus</th>'+
                '</tr>'+
            '</table>';

            let controlInc = '<div class="contEstControl">'+
                    '<div class="inicialLoc">'+
                        '<label id="labIniLoc" for="">'+
                            '<select class="local" name="localidad3" id="localidad3">'+
                                '<option hidden="" value="">Localidad para esta sección</option>'+
                                '<option value="2">Chihuahua</option>'+
                                '<option value="1">Juarez</option>'+
                                '<option value="3">Casas Grandes</option>'+
                                '<option value="4">Guachochi</option>'+
                                '<option value="6">Creel</option>'+
                                '<option value="7">Batopilas</option>'+
                                '<option value="8">Parral</option>'+
                            '</select>'+
                            '<button class="resFilt none">Reset filtros</button>'+
                        '</label>'+
                    '</div>'+
                    '<div class="contButsAdd">'+
                        '<p style="margin-right: 10px;">Añadir</p>'+
                        '<div class="contButs">'+
                            '<button data-add="1" class="butAdd" style="background-color: rgb(206, 15, 105, .6);">Establecimiento</button>'+
                        '</div>'+
                    '</div>'+
                    '<div class="contPrinContInc">'+
                        '<div class="contListEst">'+

                            

                        '</div>'+
                    '</div>'+
                '</div>';
                
$(document).ready(function() {

    // setTimeout(() => {
        
        $(document).on('change', '.locBetween', function(e) {
            console.log(hoteles);
            var id = $(this).val();
            let optHotels = '';
            for (let i = 0; i < hoteles.length; i++) {
                if (id === hoteles[i]['muni']) {
                    optHotels += '<label><input type="checkbox" value="' + hoteles[i]['clave'] + '"> ' + hoteles[i]['name'] + '</label>';
                }
                    
                    // optHotels2 += '<option value="' + hoteles[i]['clave'] + '"> ' + hoteles[i]['name'] + '</option>';
                }
                $('.dropdown').html(optHotels);

        });

        
        $(document).on('change', '.locIndividual', function(e) {
            console.log(hoteles);
            var id = $(this).val();
            let optHotels2 = '';
            for (let i = 0; i < hoteles.length; i++) {
                if (id === hoteles[i]['muni']) {
                    optHotels2 += '<option value="' + hoteles[i]['clave'] + '"> ' + hoteles[i]['name'] + '</option>';
                }
                    
                    // optHotels2 += '<option value="' + hoteles[i]['clave'] + '"> ' + hoteles[i]['name'] + '</option>';
                }
                $('#hotel').html(optHotels2);

        });
            $(document).on(clickHandler, 'input[name="filtInfo"]', function(e) {
                // if (event.target && event.target.matches('input[name="filtInfo"]')) {
                    const selectedValue = $(this).val();
                    let optHotels = '';
                    let optHotels2 = '';
                    // for (let i = 0; i < hoteles.length; i++) {
                    //     optHotels += '<label><input type="checkbox" value="' + hoteles[i]['clave'] + '"> ' + hoteles[i]['name'] + '</label>';
                    //     optHotels2 += '<option value="' + hoteles[i]['clave'] + '"> ' + hoteles[i]['name'] + '</option>';
                    // }
        
                    const hoy = new Date(); // Obtener fecha actual
                    // Formatear la fecha como YYYY-MM-DD
                    const fechaFormateada = hoy.toISOString().split('T')[0];
                    switch (selectedValue) {
                        case 'all':
                            document.querySelector('.secDiv2Hot').innerHTML = html;
                            document.getElementById('fin').value = fechaFormateada;
                            break;
                        case 'between':
                            document.querySelector('.secDiv2Hot').innerHTML = '<div id="filters" style="width:100%;display:flex;justify-content:flex-end;">' +
                                '<label id="labSelect" for="" style="border-left: 1px solid #C0C0C1;">' +
                                '<select name="localidad" class="locBetween" id="localidad">' +
                                '<option hidden="" value="">Localidad</option>' +
                                '<option value="2">Chihuahua</option>' +
                                '<option value="3">Casas Grandes</option>' +
                                '<option value="1">Juarez</option>' +
                                '<option value="4">Guachochi</option>'+
                                '<option value="6">Creel</option>'+
                                '<option value="7">Batopilas</option>'+
                                '<option value="8">Parral</option>'+
                                '</select>' +
                                '</label>' +
                                '<div class="custom-select-container">' +
                                '<div class="select-box" style="border-left: 1px solid #8F4ADA;" onclick="toggleDropdown(event)">' +
                                '<span class="selected">Hoteles</span>' +
                                '<div class="dropdown">' +
                                '<label><input type="hidden"  value="">Seleccione una localidad</label>'+
                                '</div>' +
                                '</div>' +
                                '</div> ' +
                                '<div class="divFilterFec" style="display: flex">' +
                                '<label for="" style="border-left: 1px solid #4C74B2;">De<input type="date" name="inicio2" id="inicio2"></label><label for="" style="border-left: 1px solid #CE0F69;">hasta<input type="date" name="fin2" id="fin2"></label>' +
                                '</div>' +
                                '<div style="display: flex; margin-left: 15px;align-items: center;"><button id="show2">Mostrar</button></div>' +
                                '</div>' +
                                '<div id="contBetween"><canvas id="myChart"></canvas></div>';
                                document.getElementById('fin2').value = fechaFormateada;
                            break;
                        case 'only':
                            document.querySelector('.secDiv2Hot').innerHTML = individual;
                            // for (let i = 0; i < hoteles.length; i++) {
                            //     optHotels2 += '<option value="' + hoteles[i]['clave'] + '"> ' + hoteles[i]['name'] + '</option>';
                            // }
                            // $('#hotel').append(optHotels2);
                            document.getElementById('fin').value = fechaFormateada;
                            break;
                        default:
                            break;
                    }
                    

                // }
           
            });
        
        
    // }, 1000);
    
    
    $(document).on(clickHandler, '.hotels', function(e) {
        let pregunta = $(this);
        const localidad = pregunta.attr('data-loc');
        switch (localidad) {
            case '1':
                $('#juarez').toggleClass('none');
                break;
            case '2':
                $('#chihuahua').toggleClass('none');
                break;
            default:
                break;
        }
    });


    $(document).on(clickHandler, '.encPerf', function(e) {
        $('#priEncVis').toggleClass('none');
    });

    $(document).on(clickHandler, '#genQR', function(e) {
        $('#listQR').toggleClass('none');
    });

    $(document).on('change', '#abrir-cerrar', function(e) {
        $('#contMenu').toggleClass('none');
        $('#contMenu').toggleClass('flex');
        $('.header').toggleClass('width-30');
    });

    $(document).on(clickHandler, '.opcMenu', function(e) {
        let opc = $(this).attr('data-opc');
        switch (opc) {
            case '1':
                $('#section1').removeClass('none');
                $('#section2').addClass('none');
                
                break;
            case '2':
                $('#section1').addClass('none');
                $('#section2').removeClass('none');
                $('#section2').html(html2);
                setTimeout(() => {
                    datos(opc);
                }, 500);
                
                break;
            case '3':
                var $contTypeInc = $('.contTypeInc');
                var $flecImg = $(this).find('.flecImg');
                
                $contTypeInc.toggleClass('none');
                
                if ($contTypeInc.hasClass('none')) {
                    $flecImg.css('transform', 'rotate(0deg)');
                } else {
                    $flecImg.css('transform', 'rotate(180deg)');
                }
            break;
            default:
                break;
        }
    });

    $(document).on(clickHandler, '.typeInc', function(e) {
        let opc = $(this).attr('data-typeinc');
        // console.log(opc);
        let id = '';
        switch (opc) {
            case '1':
                // console.log('opc1')
                $('#section1').addClass('none');
                $('#section2').removeClass('none');
                setTimeout(() => {
                    datosIncE(id);
                }, 500);
                break;
            case '2':
                $('#section1').addClass('none');
                $('#section2').removeClass('none');
                setTimeout(() => {
                    datosIncC(id);
                }, 500);
                break;
            default:
                break;
        }
    });


    $(document).on(clickHandler, '.listEst', function(e) {
        // console.log('el listEst');
        $('.contInfInc').removeClass('abrirDesp');
        $('.butEdit').addClass('none');
        let infInc = $(this).find('.contInfInc');
        let butEdit = $(this).find('.butEdit');
        // console.log(infInc);
        $(infInc).addClass('abrirDesp');
        $(butEdit).removeClass('none');
    });


    $(document).on(clickHandler, '#show3', function(e) {
        var selectedValues = document.getElementById('hotel').value;
        let ini = document.getElementById('inicio').value;
        let fin = document.getElementById('fin').value;
        let localidad = document.getElementById('localidad').value;
        let show = 3;
        // console.log(ini, fin, localidad, );
        console.log(selectedValues);
        if (selectedValues.length === '' || ini === '' || fin === '') {
            // console.log(selectedValues.length);
            if (selectedValues === '' ) {
                $('.select-box').css('border', '1px solid red');
            }else{$('#hotelOpc3').css('border', 'none');}
            if (ini === '') {
                $('#inicio2').css('border', '1px solid red');
            }else{$('#inicio2').css('border', 'none');}
            if (fin === '') {
                $('#fin2').css('border', '1px solid red');
            }else{$('#fin2').css('border', 'none');}
        }else{
            request = $.ajax({
                dataType: 'json', //json
                url: 'perfil_visitante/_includes/_php/querys.php',
                type: 'POST',
                data: {loc:localidad, fin, ini, hotFilt: true, show : show, hotelN: selectedValues},
                success: function(data) {
                    // console.log(data);
                    //return;
                    if (data.length > 0) {
                        let respuestas = data;
                        const hotelesFiltrados = data;
                        
                        const resultados = calcularPorcentajeYConteo(respuestas, hoteles);
                       
                        let hotelesF = Array();
                        let months = {};
                        for (let i = 0; i < resultados.length; i++) {
                            if (resultados[i]['totalUsuarios'] > 0) {
                                hotelesF.push({
                                    hotel: resultados[i]['hotel'],
                                    clave: resultados[i]['clave'],
                                    users: resultados[i]['totalUsuarios'],
                                    porcentaje: resultados[i]['porcentaje'],
                                    p1: resultados[i]['part1'],
                                    p2: resultados[i]['part2'],
                                    p3: resultados[i]['part3'],
                                    p1Por: resultados[i]['porPart1'],
                                    p2Por: resultados[i]['porPart2'],
                                    p3Por: resultados[i]['porPart3'],
                                    mes: resultados[i]['conteoUsuariosPorMes'],
                                    sem: resultados[i]['conteoUsuariosPorSemana'],
                                })
                            }
                        }


                        const allMonths = new Set();
                        hotelesF.forEach(item => {
                            Object.keys(item.mes).forEach(month => {
                                allMonths.add(month);
                            });
                        });

                        // Convertir Set a Array y ordenar
                        const sortedMonths = Array.from(allMonths).sort((a, b) => {
                            return parseInt(a.replace('mes', '')) - parseInt(b.replace('mes', ''));
                        });


                        hotelesF.forEach(hotel => {
                            const sortedMes = {};
                            sortedMonths.forEach(month => {
                                if (hotel.mes[month] !== undefined) {
                                    sortedMes[month] = hotel.mes[month];
                                } else {
                                    sortedMes[month] = 0; // o cualquier valor por defecto
                                }
                            });
                            hotel.mes = sortedMes;
                        });
                        let uniqueKeys;
                        function getUniqueKeys(hotelesF) {
                            uniqueKeys = new Set();
                            hotelesF.forEach(item => {
                                const keys = Object.keys(item.mes).length > 0 ? Object.keys(item.mes) : Object.keys(item.sem);
                                keys.forEach(key => uniqueKeys.add(key));
                            });
                            return Array.from(uniqueKeys);
                        }

                        months = getUniqueKeys(hotelesF);
                        for (let i = 0; i < months.length; i++) {
                            let key = months[i];
                            switch (key) {
                                case 'mes1':
                                    months[i] = 'Ene';
                                    break;
                                case 'mes2':
                                    months[i] = 'Feb';
                                    break;
                                case 'mes3':
                                    months[i] = 'Mar';
                                    break;
                                case 'mes4':
                                    months[i] = 'Abr';
                                    break;
                                case 'mes5':
                                    months[i] = 'May';
                                    break;
                                case 'mes6':
                                    months[i] = 'Jun';
                                    break;
                                case 'mes7':
                                    months[i] = 'Jul';
                                    break;
                                case 'mes8':
                                    months[i] = 'Ago';
                                    break;
                                case 'mes9':
                                    months[i] = 'Sep';
                                    break;
                                case 'mes10':
                                    months[i] = 'Oct';
                                    break;
                                case 'mes11':
                                    months[i] = 'Nov';
                                    break;
                                case 'mes12':
                                    months[i] = 'Dic';
                                    break;
                            
                                default:
                                    break;
                            }  
                        }
                        document.querySelectorAll('#textNone').forEach(element => element.remove());
                        grapDouble(hotelesF, months);
                    }else{
                        if (myChart) {
                            myChart.destroy();
                        }
                        $('.contGraph').append('<p id="textNone" style="top: 50vh;right: 38%;">No hay datos para mostrar</p>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (myChart) {
                        myChart.destroy();
                    }
                    $('.contGraph').append('<p style="top: 50vh;right: 38%;" id="textNone">No hay datos para mostrar</p>');
                    console.log('Error en la solicitud:', textStatus, errorThrown);
                    console.log('Respuesta del servidor:', jqXHR.responseText);
                }
            });
        }

    });



    $(document).on(clickHandler, '#show2', function(e) {
        var checkboxes = document.querySelectorAll('.dropdown input[type="checkbox"]:checked');
        var selectedValues = [];
        checkboxes.forEach(function(checkbox) {
            selectedValues.push(checkbox.value);
        });
        let ini = document.getElementById('inicio2').value;
        let fin = document.getElementById('fin2').value;
        let localidad = document.getElementById('localidad').value;
        let show = 2;
        if (selectedValues.length === 0 || ini === '' || fin === '') {
            if (selectedValues.length === 0 ) {
                $('.select-box').css('border', '1px solid red');
            }else{$('.select-box').css('border', 'none');}
            if (ini === '') {
                $('#inicio2').css('border', '1px solid red');  
            }else{$('#inicio2').css('border', 'none');}

            if (fin === '') {
                $('#fin2').css('border', '1px solid red');
            }else{$('#fin2').css('border', 'none');}
        }else{

            request = $.ajax({
                dataType: 'json', //json
                url: 'perfil_visitante/_includes/_php/querys.php',
                type: 'POST',
                data: {loc:localidad, fin, ini, hotFilt: true, show : show, hotels: selectedValues},
                success: function(data) {
                    if (data.length > 0) {
                        let respuestas = data;
                        const hotelesFiltrados = data;
                        
                        const resultados = calcularPorcentajeYConteo(respuestas, hoteles);
                        console.log(resultados);
                        let hotelesF = Array();
                        let months = {};
                        for (let i = 0; i < resultados.length; i++) {
                            if (resultados[i]['totalUsuarios'] > 0) {
                                hotelesF.push({
                                    hotel: resultados[i]['hotel'],
                                    clave: resultados[i]['clave'],
                                    users: resultados[i]['totalUsuarios'],
                                    porcentaje: resultados[i]['porcentaje'],
                                    p1: resultados[i]['part1'],
                                    p2: resultados[i]['part2'],
                                    p3: resultados[i]['part3'],
                                    p1Por: resultados[i]['porPart1'],
                                    p2Por: resultados[i]['porPart2'],
                                    p3Por: resultados[i]['porPart3'],
                                    mes: resultados[i]['conteoUsuariosPorMes'],
                                    sem: resultados[i]['conteoUsuariosPorSemana'],
                                })
                            }
                        }

                        
                        // console.log(hotelesF);

                        const allMonths = new Set();
                        hotelesF.forEach(item => {
                            Object.keys(item.mes).forEach(month => {
                                allMonths.add(month);
                            });
                        });

                        // Convertir Set a Array y ordenar
                        const sortedMonths = Array.from(allMonths).sort((a, b) => {
                            return parseInt(a.replace('mes', '')) - parseInt(b.replace('mes', ''));
                        });
                        hotelesF.forEach(hotel => {
                            const sortedMes = {};
                            sortedMonths.forEach(month => {
                                if (hotel.mes[month] !== undefined) {
                                    sortedMes[month] = hotel.mes[month];
                                } else {
                                    sortedMes[month] = 0; // o cualquier valor por defecto
                                }
                            });
                            hotel.mes = sortedMes;
                        });
                        let uniqueKeys;

                        function getUniqueKeys(hotelesF) {
                            uniqueKeys = new Set();
                            hotelesF.forEach(item => {
                                const keys = Object.keys(item.mes).length > 0 ? Object.keys(item.mes) : Object.keys(item.sem);
                                keys.forEach(key => uniqueKeys.add(key));
                            });
                            return Array.from(uniqueKeys);
                        }
                        months = getUniqueKeys(hotelesF);
                        for (let i = 0; i < months.length; i++) {
                            let key = months[i];
                            switch (key) {
                                case 'mes1':
                                    months[i] = 'Ene';
                                    break;
                                case 'mes2':
                                    months[i] = 'Feb';
                                    break;
                                case 'mes3':
                                    months[i] = 'Mar';
                                    break;
                                case 'mes4':
                                    months[i] = 'Abr';
                                    break;
                                case 'mes5':
                                    months[i] = 'May';
                                    break;
                                case 'mes6':
                                    months[i] = 'Jun';
                                    break;
                                case 'mes7':
                                    months[i] = 'Jul';
                                    break;
                                case 'mes8':
                                    months[i] = 'Ago';
                                    break;
                                case 'mes9':
                                    months[i] = 'Sep';
                                    break;
                                case 'mes10':
                                    months[i] = 'Oct';
                                    break;
                                case 'mes11':
                                    months[i] = 'Nov';
                                    break;
                                case 'mes12':
                                    months[i] = 'Dic';
                                    break;
                            
                                default:
                                    break;
                            }  
                        }
                        document.querySelectorAll('#textNone').forEach(element => element.remove());
                        console.log(hotelesF);
                        grapDouble(hotelesF, months);
                    }else{
                        if (myChart) {
                            myChart.destroy();
                        }
                        $('#contBetween').append('<p id="textNone">No hay datos para mostrar</p>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (myChart) {
                        myChart.destroy();
                    }
                    $('#contBetween').append('<p id="textNone">No hay datos para mostrar</p>');
                    console.log('Error en la solicitud:', textStatus, errorThrown);
                    console.log('Respuesta del servidor:', jqXHR.responseText);
                }
            });
        }
    });

    $(document).on(clickHandler, '.resFilt', function(e) {
       $(`.typeInc[data-typeinc="1"]`).click(); 
    });

    
    $(document).on(clickHandler, '#reporGen', function(e) {
        $('.contMain').append('<div class="contLoadRep"><div class="loader">'+
                                    '<div class="inner one"></div>'+
                                    '<div class="inner two"></div>'+
                                    '<div class="inner three"></div>'+
                                '</div><div>');
        $.ajax({
            url: 'perfil_visitante/_includes/_php/querys.php',
            type: 'POST',
            dataType: "json",
            data: {reporGen:true},
            success: function(data) {
                console.log(data);
                const fechaActual = new Date();

                let anioActual = fechaActual.getFullYear(); 
                let mesActual = new Date().toLocaleDateString('es-MX', { month: 'long' });
                        console.log(mesActual.charAt(0).toUpperCase() + mesActual.slice(1)); 
                        let mes = mesActual.charAt(0).toUpperCase() + mesActual.slice(1);
                if (data.length>0) {
                     $('.contLoadRep').html(`<div style="margin-left:40px: color:red" id="closeResporte">CERRAR</div><button data-name="General" data-fec="${anioActual} hasta ${mes}" id="descargarIMG">Descargar</button><div id="reporte" class="contTabReporGen"><table id="resuGen">
                                            <caption ALIGN=top>Resumen de respuestas por Municipio Perfil del Visitante</caption>        
                                            <tr class="trTitle">
                                                <th style="border-left:none">Municipio</th><th>Semanal</th><th>Mensual</th><th>Anual</th>
                                            </tr>
                                        </table></div>`);

                    for (let i = 0; i < data.length; i++) {
                        $('#resuGen').append(`<tr ALIGN=CENTER>    
                                                <th class="titMuniRepor" >${data[i].name}</th>
                                                <td>${data[i].sem}</td>
                                                <td>${data[i].mes}</td>
                                                <td>${data[i].año}</td>
                                            </tr>`);
                    }
                }
                
            },
            error: function(xhr, status, error) {
                console.error('Error en la carga de datos:', status, error);
                alert('Error en la carga de datos');
            }
        });

    });

    $(document).on(clickHandler, '#statInc', function(e) {
        if (!touchmoved) {
            $('#statInc').change(function(e) {
                var stat = $(this).val();
                let estable = $('#estabInc').val();
                let time = $('#time').val();
                $('.resFilt').removeClass('none');
                let statusFilt = datosInc.filter(item => {
                    let stats = item['status'];
                    let museId = item['museoID'];
                    let matchStat = (stat === "" || stats === stat);
                    let matchEstable = (estable === "" || estable == museId);
                    let matchTime = true;
                    if (time !== "") {
                        const today = new Date();
                        let inicioDate = new Date(item.inicio);
                        if (time === "1") {
                            const oneMonthAgo = new Date();
                            oneMonthAgo.setMonth(today.getMonth() - 1);
                            matchTime = (inicioDate >= oneMonthAgo && inicioDate <= today);
                        } else if (time === "2") {
                            const threeMonthsAgo = new Date();
                            threeMonthsAgo.setMonth(today.getMonth() - 3);
                            matchTime = (inicioDate >= threeMonthsAgo && inicioDate <= today);
                        }
                    }
    
                    return matchStat && matchEstable && matchTime;
                });
    
                let loc = statusFilt.length > 0 ? statusFilt[0]['loc'] : '';
                let nameLoc = nameL(loc);


                let nameMus;
                let valid =false;
                if (statusFilt.length>0) {
                    nameMus = statusFilt[0]['museo'];
                }else{
                    nameMus = '';
                    valid = true;
                }
                
                title(stat, estable, time, nameMus,valid);


                $('#tabInc').html('<tr style="background-color: rgb(115, 62, 172); color: white;">' +
                    '<th>Folio</th>' +
                    '<th>Establecimiento</th>' +
                    '<th>Creación</th>' +
                    '<th>Finalización</th>' +
                    '<th>Estatus</th>' +
                    '</tr>');
                // $('#titleTabInc h3').html(`Recompensas ${stat === "0" ? "activas" : stat === "1" ? "inactivas" : "dadas de baja"} ${estable != "0" ? ' de '+ statusFilt[0]['museo'] : ''}`);
    
                statusFilt.forEach(item => {
                    let statusText = item['status'] === '0' ? 'Activo' : 'Inactivo';
                    $('#tabInc').append('<tr>' +
                        '<td>' + item['code'] + '</td>' +
                        '<td>' + item['museo'] + '</td>' +
                        '<td>' + item['inicio'] + '</td>' +
                        '<td>' + item['fin'] + '</td>' +
                        '<td>' + statusText + '</td>' +
                        '</tr>');
                });
    
                console.log(statusFilt);
            });
        }
    });


    $(document).on(clickHandler, '#estabInc', function(e) {
        if (!touchmoved) {
            $('#estabInc').change(function(e) {
                $('.resFilt').removeClass('none');
                console.log('el establecimiento');
                var stat = $('#statInc').val();
                let estable = $(this).val();
                let time = $('#time').val();
    
                let statusFilt = datosInc.filter(item => {
                    let stats = item['status'];
                    let museId = item['museoID'];
                    let matchStat = (stat === "" || stats === stat);
                    let matchEstable = (estable === "" || estable == museId);
                    let matchTime = true;
    
                    if (time !== "") {
                        const today = new Date();
                        let inicioDate = new Date(item.inicio);
                        if (time === "1") {
                            const oneMonthAgo = new Date();
                            oneMonthAgo.setMonth(today.getMonth() - 1);
                            matchTime = (inicioDate >= oneMonthAgo && inicioDate <= today);
                        } else if (time === "2") {
                            const threeMonthsAgo = new Date();
                            threeMonthsAgo.setMonth(today.getMonth() - 3);
                            matchTime = (inicioDate >= threeMonthsAgo && inicioDate <= today);
                        }
                    }
    
                    return matchStat && matchEstable && matchTime;
                });
    
                let loc = statusFilt.length > 0 ? statusFilt[0]['loc'] : '';
                let nameLoc = nameL(loc);
                
                let nameMus;
                let valid =false;
                if (statusFilt.length>0) {
                    nameMus = statusFilt[0]['museo'];
                }else{
                    nameMus = '';
                    valid = true;
                }
                
                title(stat, estable, time, nameMus,valid);
                
                $('#tabInc').html('<tr style="background-color: rgb(115, 62, 172); color: white;">' +
                    '<th>Folio</th>' +
                    '<th>Establecimiento</th>' +
                    '<th>Creación</th>' +
                    '<th>Finalización</th>' +
                    '<th>Estatus</th>' +
                    '</tr>');
                // $('#titleTabInc h3').html(`Recompensas ${stat === "0" ? "activas" : stat === "1" ? "inactivas" : "dadas de baja"} (${nameLoc})`);
    
                statusFilt.forEach(item => {
                    let statusText = item['status'] === '0' ? 'Activo' : 'Inactivo';
                    $('#tabInc').append('<tr>' +
                        '<td>' + item['code'] + '</td>' +
                        '<td>' + item['museo'] + '</td>' +
                        '<td>' + item['inicio'] + '</td>' +
                        '<td>' + item['fin'] + '</td>' +
                        '<td>' + statusText + '</td>' +
                        '</tr>');
                });
    
                console.log(statusFilt);
            });
        }
    });


    $(document).on(clickHandler, '#time', function(e) {
        if (!touchmoved) {
            $('#time').change(function(e) {
                $('.resFilt').removeClass('none');
                console.log('el establecimiento');
                var stat = $('#statInc').val();
                let estable = $('#estabInc').val();
                let time = $(this).val();
    
                let statusFilt = datosInc.filter(item => {
                    let stats = item['status'];
                    let museId = item['museoID'];
                    let matchStat = (stat === "" || stats === stat);
                    let matchEstable = (estable === "" || estable == museId);
                    let matchTime = true;
    
                    if (time !== "") {
                        const today = new Date();
                        let inicioDate = new Date(item.inicio);
                        
                        if (time === "1") {
                            const oneMonthAgo = new Date();
                            oneMonthAgo.setMonth(today.getMonth() - 1);
                            matchTime = (inicioDate >= oneMonthAgo && inicioDate <= today);
                        } else if (time === "2") {
                            const threeMonthsAgo = new Date();
                            threeMonthsAgo.setMonth(today.getMonth() - 3);
                            console.log(threeMonthsAgo);
                            console.log(inicioDate);
                            matchTime = (inicioDate >= threeMonthsAgo && inicioDate <= today);
                        }
                    }
    
                    return matchStat && matchEstable && matchTime;
                });
                
    
                let loc = statusFilt.length > 0 ? statusFilt[0]['loc'] : '';
                let nameLoc = nameL(loc);
                
                let nameMus;
                let valid =false;
                if (statusFilt.length>0) {
                    nameMus = statusFilt[0]['museo'];
                }else{
                    nameMus = '';
                    valid = true;
                }
                
                title(stat, estable, time, nameMus,valid);

                $('#tabInc').html('<tr style="background-color: rgb(115, 62, 172); color: white;">' +
                    '<th>Folio</th>' +
                    '<th>Establecimiento</th>' +
                    '<th>Creación</th>' +
                    '<th>Finalización</th>' +
                    '<th>Estatus</th>' +
                    '</tr>');
                // $('#titleTabInc h3').html(`Recompensas ${stat === "0" ? "activas" : stat === "1" ? "inactivas" : "dadas de baja"} (${nameLoc})`);
    
                statusFilt.forEach(item => {
                    let statusText = item['status'] === '0' ? 'Activo' : 'Inactivo';
                    $('#tabInc').append('<tr>' +
                        '<td>' + item['code'] + '</td>' +
                        '<td>' + item['museo'] + '</td>' +
                        '<td>' + item['inicio'] + '</td>' +
                        '<td>' + item['fin'] + '</td>' +
                        '<td>' + statusText + '</td>' +
                        '</tr>');
                });
    
                console.log(statusFilt);
            });
        }
    });
    

    
    $(document).on(clickHandler, '#localidad3', function(e) {
        console.log('localidad 3');
        if (!touchmoved) {
            $(function() {
                $('#localidad3').change(function(e) {
                    var id = $(this).val();
                    datosIncC(id);
                });
            });
        }
    });

    $(document).on(clickHandler, '#localidad2', function(e) {
        console.log('localidad 2');
        if (!touchmoved) {
            $(function() {
                $('.local').change(function(e) {
                    var id = $(this).val();
                    datosIncE(id);
                });
            });
        }
    });

    $(document).on(clickHandler, '#descargarPDF', function(e) {
    const element = document.getElementById('reporte');
    let name = $(this).attr('data-name');
    let fec = $(this).attr('data-fec');
    html2canvas(element, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const { jsPDF } = window.jspdf;

        const pdf = new jsPDF({
            orientation: 'landscape',
            unit: 'px',
            format: [canvas.width, canvas.height] 
        });

        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();

        const imgWidth = canvas.width;
        const imgHeight = canvas.height;

        const x = (pageWidth - imgWidth) / 2;
        const y = (pageHeight - imgHeight) / 2;

        pdf.addImage(imgData, 'PNG', x, y, imgWidth, imgHeight);
        pdf.save('Perfil Visitante de '+name+' de '+fec+'.pdf');
    });
});




    $(document).on(clickHandler, '#descargarIMG', function(e) {
        let name = $(this).attr('data-name');
        let fec = $(this).attr('data-fec');
        const element = document.getElementById('reporte');
        html2canvas(element, { scale: 2 }).then(canvas => {
            const link = document.createElement('a');
            link.download = 'Perfil Visitante '+name+' de '+fec+'.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        });
    });

    $(document).on(clickHandler, '#closeResporte', function(e) {
        // ctxSeman.destroy();
        // ctxMensual.destroy();
        $('.contLoadRep').remove();
        // if (ctxSemanal) {
        //     ctxSemanal.destroy();
        //  }
        //  if (ctxMensual) {
        //     ctxMensual.destroy();
        // }
    });

    $(document).on(clickHandler, '.reportInfog', function(e) {
        let reg = $(this).attr('data-muni');
        let ini = document.getElementById('inicio').value;
        let fin = document.getElementById('fin').value;
        console.log(ini, fin);
        $('.contMain').append('<div class="contLoadRep2"></div>');
        $.ajax({
            url: 'perfil_visitante/_includes/_php/graphs.php',
            type: 'POST',
            dataType: "json",
            data: {reg, infog2:true, ini, fin},
            success: function(data) {
                console.log(data);
                $('.contLoadRep2').html(`<div class="headerInfog">
                    <img src="perfil_visitante/_images/sichitur.png" style="width: 150px;">
                    <div class="tituloInfog">
                        <h3>PERFIL DEL VISITANTE DE <span style="font-weight: 900;"> ${data[0]['name_loc'].toUpperCase()}</span></h3>
                    </div>
                    <img src="perfil_visitante/_images/logo.png" style="width: 150px;">
                </div><div id="contenedor"></div><div class="footInfo">
                    <h3 style="color: white;width: 100%;text-align: center;font-size: 1rem;">FUENTE:SECRETARÍA CON INFORMACIÓN RECOPILADA DE ENCUESTAS PERFIL DEL VISITANTE DE <span>${data[0]['name_loc'].toUpperCase()}</span></h3>
                </div>`);


                const columnas = {
                    '1': [],
                    '2': [],
                    '3': [],
                    '4': [],
                    '5': []
                };
                console.log(data);

                for (const pregunta of data) {
                    const part = pregunta.preg_part_infog;
                    // console.log(pregunta.preg_part_infog);
                    if (pregunta.preg_part_infog != 0) {
                        console.log(pregunta.preg_part_infog);
                        if (pregunta.preg_part_infog == 7 || pregunta.preg_part_infog == 6 || pregunta.preg_part_infog == 5) {
                            console.log('es 5,6,7: '+pregunta.preg_part_infog);
                            columnas[5].push(pregunta);   
                            console.log(columnas[5]);
                        }else{
                            console.log('no es 5,6,7 es : '+pregunta.preg_part_infog);
                            columnas[part].push(pregunta);   
                        }
                        
                    }
                }

                let flag = 1;
                let color = '';
                for (const key in columnas) {
                    const preguntasEnColumna = columnas[key];
                    
                    if (key !== '5') {
                        for (const pregunta of preguntasEnColumna) {
                            let item = `<h3>${pregunta.preg_name}</h3>`;
                            const respuestas = pregunta.respuestas;
                            respuestas.sort((a, b) => b.porcentaje - a.porcentaje);
                            switch (flag) {
                                case 1:
                                    color = 'morado';
                                    flag = 2;
                                    break;
                                case 2:
                                    color = 'azul';
                                    flag = 3;
                                    break;
                                case 3:
                                    color = 'rosa';
                                    flag = 1;
                                    break;
                                default:
                                    break;
                            }
                            let porTot = 0;
                            let cont = 0;

                            for (const respuesta of respuestas) {
                                cont++;
                                
                                if (respuesta.respuesta !== '' && respuesta.respuesta !== 'none') {
                                    if (porTot < 75 || cont <= 2) {
                                        
                                        const firstLetter = respuesta.respuesta.charAt(0);
                                        const rest = respuesta.respuesta.slice(1);
                                        let text = firstLetter.toUpperCase() + rest;
                                        
                                        porTot += respuesta.porcentaje;
                                        
                                        if (cont === 1) {
                                            item += `
                                                <div class="respPorcentaje">
                                                    <p style="font-weight:900;">${text}</p>
                                                    <h4 class="${color}" style="font-weight:900;">${respuesta.porcentaje}%</h4>
                                                </div>`;
                                        } else {
                                            item += `
                                                <div class="respPorcentaje">
                                                    <p style="font-weight:100;">${text}</p>
                                                    <h4 class="${color}" style="font-weight:100;">${respuesta.porcentaje}%</h4>
                                                </div>`;
                                        }
                                    }
                                }
                            }
                            $('#contenedor').append(`<div class="item">${item}</div>`);
                        }
                    }
                }

                const partes5a7 = columnas['5'];
                const div5a7 = $('<div class="itemNation item"></div>');

                console.log(partes5a7);
                for (const pregunta of partes5a7) {
                    let clase = "";
                    
                    switch (parseInt(pregunta.preg_part_infog)) {
                        case 5:
                            clase="nation";
                            break;
                        case 6:
                            clase="mex";
                            break;
                        case 7:
                            clase="int";
                            break;
                    
                        default:
                            break;
                    }
                    let contItem = $(`<div class="itemEsp ${clase}"></div>`)
                    let item = ``;//<h3>${pregunta.preg_name}</h3>
                    console.log(item);
                    const respuestas = pregunta.respuestas;
                    respuestas.sort((a, b) => b.porcentaje - a.porcentaje);
                    switch (flag) {
                        case 1:
                            color = 'morado';
                            flag = 2;
                            break;
                        case 2:
                            color = 'azul';
                            flag = 3;
                            break;
                        case 3:
                            color = 'rosa';
                            flag = 1;
                            break; 
                        default:
                            break;
                    }
                    let porTot = 0;
                    let cont = 0; 

                    for (const respuesta of respuestas) {
                        cont++;

                        if (respuesta.respuesta !== '' && respuesta.respuesta !== 'none' && (porTot < 75 || cont <= 2)) {
                            porTot = porTot + respuesta.porcentaje;
                            if (cont == 1) {
                              item += `
                                <div class="respPorcentaje">
                                    <p style="font-weight:900">${respuesta.respuesta}</p>
                                    <h4 class="${color}" style="font-weight:900">${respuesta.porcentaje}%</h4>
                                </div>`;  
                            }else{
                                item += `
                                <div class="respPorcentaje">
                                    <p>${respuesta.respuesta}</p>
                                    <h4 style="color: ${color}">${respuesta.porcentaje}%</h4>
                                </div>`;  
                            }
                            
                        }
                    }
                    contItem.append(item);
                    div5a7.append(contItem);
                }
                console.log
                $('#contenedor').append(div5a7);
                
            },
            error: function(xhr, status, error) {
                console.error('Error en la carga de datos:', status, error);
                alert('Error en la carga de datos');
            }
        });
    });





    
    $(document).on(clickHandler, '.reportesMS', function(e) {
        
        let id = $(this).attr('data-id');
        let muni = $(this).attr('data-muni');
        $('.contMain').append('<div class="contLoadRep"><div class="loader">'+
                                    '<div class="inner one"></div>'+
                                    '<div class="inner two"></div>'+
                                    '<div class="inner three"></div>'+
                                '</div><div>');
        

        $.ajax({
            url: 'perfil_visitante/_includes/_php/querys.php',
            type: 'POST',
            dataType: "json",
            data: {reporte:true, muni:muni},
            success: function(data) {
                console.log(data);
                if (data['total_anio'] != '') {
                    let texto = data['nombre_municipio'];
                        let resultado = texto.replace(/-/g, ' ');
                    console.log('dentro del if data');
                    console.log(id);
                    function obtenerRangoSemana() {
                            const hoy = new Date();
                            const diaSemana = hoy.getDay(); 
                            const dia = diaSemana === 0 ? 7 : diaSemana;
                            const lunes = new Date(hoy);
                            lunes.setDate(hoy.getDate() - (dia - 1));
                            const domingo = new Date(lunes);
                            domingo.setDate(lunes.getDate() + 6);
                            const dias = [lunes.getDate(), domingo.getDate()];
                            const mes = lunes.toLocaleDateString('es-MX', { month: 'long' });

                            return `${dias[0]} al ${dias[1]} de ${mes}`;
                        }
                        
                        let fechaRep = obtenerRangoSemana();
                        console.log(fechaRep);
                    
                    if (id == 'sem') {
                        console.log('dentro del reporte semanal');
                        
                        
                        $('.contLoadRep').html(`<div><button id="descargarPDF" data-name="${resultado}" data-fec="${fechaRep}">Descargar PDF</button><button data-name="${resultado}" data-fec="${fechaRep}" id="descargarIMG">Descargar como imagen</button><div style="margin-left:40px: color:red" id="closeResporte">CERRAR</div></div>
                                                <div id="reporte" style="padding: 25px 0;width:1000px;font-family:Arial;display:flex;justify-content:center;border: 1px solid rgb(0,0,0,.05);">
                                                <div style="width:950px;">
                                                    <div style="color: white;text-align: center;display: flex;height: 60px;justify-content: center;align-items: center;width: 100%;">
                                                        <h2 style="font-size: 1.5rem;background:#002D72;margin:0;line-height: 60px;width:740px">Perfil del Visitante de <span style="font-style: italic;" id="nombreDestino">${resultado}</span></h2>
                                                        <h2 style="font-size: 1.5rem;padding:6px;background:#734DB7;margin: 0;border-left: 2px solid rgb(255, 255, 255);height: 48px;"></h2>
                                                        <h2 style="font-size: 1.5rem;padding:6px;background:#002D72;margin: 0;border-left: 2px solid rgb(255, 255, 255);height: 48px;"></h2>
                                                        <div style="text-align: center;width: 150px;font-weight: bold; color: #5c2c91;height: 60px;background: #D9D9D9;padding: 0 15px;line-height: 30px;font-size: 1rem;">
                                                            Acumulado de <br> <span id="rangoFechas" style="line-height:6px !important;color:#002D72;">${fechaRep}</span>
                                                        </div>
                                                    </div>
                                                    <canvas id="myChartSemana" width="950" height="400" style="margin: 30px 0;"></canvas>
                                                    <div style="margin:40px 0;font-size: 16px;">
                                                        <p style="margin: 0;">Respuestas acumuladas:</p>
                                                        <ul style="display:flex;flex-direction:row;list-style-type:square;font-weight:700;color:black;">
                                                            <li style="margin-right: 80px;"><span style="font-style: italic;" id="respSemana">${data.total_semana}</span> en la semana</li>
                                                            <li style="margin-right: 80px;"><span style="font-style: italic;" id="respMes">${data.total_mes}</span> en el mes</li>
                                                            <li><span style="font-style: italic;" id="respAnio">${data.total_anio}</span> en el año</li>
                                                        </ul>
                                                    </div>
                                                    <div style="width:100%;display:flex;align-items:center;justify-content:space-between;">
                                                        <img style="width:160px" src="perfil_visitante/_images/logo.png" alt="">
                                                        <div style="width:670px;display:flex;flex-direction:column;">
                                                            <div style="width:100%;height:5px;background-color: #5c2c91;margin-bottom:2px"></div>
                                                            <div style="width:100%;height:5px;background-color: #002D72"></div>
                                                        </div>
                                                        <img style="width:100px" src="perfil_visitante/_images/sichitur.png" alt="">
                                                    </div>
                                                </div>
                                            </div>`);
                                            //  ctxSemanal = document.getElementById("myChartSemana").getContext("2d");
                                            
                            let datosSemanal = {
                            labels: diasSemana,
                            datasets: [
                                {
                                    data: Object.values(reporSem),
                                    backgroundColor: "rgba(75, 192, 192, 0.6)",
                                    borderColor: "rgba(75, 192, 192, 1)",
                                    borderWidth: .8,
                                    pointRadius: 2,
                                }
                            ]
                        };

                         const configSemanal = {
                            type: "line",
                            data: datosSemanal,
                            options: {
                                plugins: {
                                    legend: {
                                        display: false  // oculta cuadro de color con texto
                                    },
                                    title: {
                                        display: false  // oculta título del gráfico
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,    // mostrar numero entero
                                            precision: 0   // no permite decimales
                                        },
                                        font: {
                                            size: 8
                                        }
                                    },
                                    x: {
                                        ticks: {
                                            font: {
                                                size: 8
                                            }
                                        }
                                    }
                                }
                            }
                        };
                        let ctxSeman = document.getElementById("myChartSemana").getContext("2d");
                                            
                        new Chart(ctxSeman, configSemanal);
                        // ctxSemanal.render();
                    }else{
                        const mesActual = new Date().toLocaleDateString('es-MX', { month: 'long' });
                        console.log(mesActual.charAt(0).toUpperCase() + mesActual.slice(1)); 
                        let mes = mesActual.charAt(0).toUpperCase() + mesActual.slice(1);
                        $('.contLoadRep').html(`<div><button id="descargarPDF" data-name="${resultado}" data-fec="${mes}">Descargar PDF</button><button data-name="${resultado}" data-fec="${mes}" id="descargarIMG">Descargar como imagen</button><div style="margin-left:40px: color:red" id="closeResporte">CERRAR</div></div>
                                                <div id="reporte" style="padding: 25px 0;width:1000px;font-family:Arial;display:flex;justify-content:center;border: 1px solid rgb(0,0,0,.05)">
                                                    <div style="width:950px;">
                                                        <div style="color: white;text-align: center;display: flex;height: 60px;justify-content: center;align-items: center;width: 100%;">
                                                            <h2 style="font-size: 1.5rem;background:#002D72;margin:0;line-height: 60px;width:740px">Perfil del Visitante de <span style="font-style: italic;" id="nombreDestino">${resultado}</span></h2>
                                                            <h2 style="font-size: 1.5rem;padding:6px;background:#734DB7;margin: 0;border-left: 2px solid rgb(255, 255, 255);height: 48px;"></h2>
                                                            <h2 style="font-size: 1.5rem;padding:6px;background:#002D72;margin: 0;border-left: 2px solid rgb(255, 255, 255);height: 48px;"></h2>
                                                            <div style="text-align: center;width: 150px;font-weight: bold; color: #5c2c91; height: 60px;background: #D9D9D9;padding: 0 15px;line-height: 30px;font-size: 1rem;">
                                                                Acumulado de <br> <span id="rangoFechas" style="color:#002D72;">${mes}</span>
                                                            </div>
                                                        </div>
                                                        <div style="display:flex;width:100%">
                                                            <div style="display:flex;flex-direction:column;">
                                                                <canvas id="myChartMes" width="700" height="320" style="margin-top: 25px;margin-bottom: 20px;"></canvas>
                                                                <canvas id="myChartSemana" width="700" height="320" style="margin-bottom: 25px;"></canvas>
                                                            </div>
                                                            <div style="margin:40px 0;font-size: .95rem;display: flex;flex-direction: column;justify-content: center;align-items: end;width: 250px;">
                                                                <p style="margin: 0;">Respuestas acumuladas:</p>
                                                                <ul style="list-style-type:square;font-weight:700;color: black;width: 138px;text-align: end;">
                                                                    <li ><span style="font-style: italic;" id="respSemana">${data.total_semana}</span> en la semana</li>
                                                                    <li ><span style="font-style: italic;" id="respMes">${data.total_mes}</span> en el mes</li>
                                                                    <li><span style="font-style: italic;" id="respAnio">${data.total_anio}</span> en el año</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div style="width:100%;display:flex;align-items:center;justify-content:space-between;">
                                                            <img style="width:160px" src="perfil_visitante/_images/logo.png" alt="">
                                                            <div style="width:670px;display:flex;flex-direction:column;">
                                                                <div style="width:100%;height:5px;background-color: #5c2c91;margin-bottom:2px"></div>
                                                                <div style="width:100%;height:5px;background-color: #002D72"></div>
                                                            </div>
                                                            <img style="width:100px" src="perfil_visitante/_images/sichitur.png" alt="">
                                                        </div>
                                                    </div>
                                                </div>`);
                                                
                                                
                        let datosSemanal = {
                            labels: diasSemana,
                            datasets: [
                                {
                                    label: "Respuestas del "+fechaRep ,
                                    data: Object.values(reporSem),
                                    backgroundColor: "rgba(75, 192, 192, 0.6)",
                                    borderColor: "rgba(75, 192, 192, 1)",
                                    borderWidth: .8,
                                    pointRadius: 2,
                                }
                            ]
                        };
                         const configSemanal = {
                            type: "line",
                            data: datosSemanal,
                            options: {
                                plugins: {
                                    legend: {
                                    display: true, // Puedes poner true si deseas mostrar la leyenda
                                    labels: {
                                        font: {
                                            size: 10 // Cambia este número según el tamaño que desees
                                        }
                                    }
                                }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,    // mostrar numero entero
                                            precision: 0   // no permite decimales
                                        },
                                        font: {
                                            size: 8
                                        }
                                    },
                                    x: {
                                        ticks: {
                                            font: {
                                                size: 8
                                            }
                                        }
                                    }
                                }
                            }
                        };
                        
                        let ctxSeman = document.getElementById("myChartSemana").getContext("2d");
                                                // console.log(ctxSeman);
                                                
                        new Chart(ctxSeman, configSemanal);
                        // ctxSemanal.render();



                        
                        let datosMensual = {
                            labels: reporMens.map((resultado) => resultado.dia), // Fechas como etiquetas
                            datasets: [
                                {
                                    label: "Respuestas de "+mes ,
                                    data: reporMens.map((resultado) => resultado.total), // Conteos por día
                                    backgroundColor: "rgba(153, 102, 255, 0.6)",
                                    borderColor: "rgba(153, 102, 255, 1)",
                                    borderWidth: .8,
                                    pointRadius: 2,
                                }
                            ]
                        };

                        // Configuración de la gráfica mensual
                        const configMensual = {
                            type: "line",
                            data: datosMensual,
                            options: {
                                plugins: {
                                    legend: {
                                        display: true, // Puedes poner true si deseas mostrar la leyenda
                                        labels: {
                                            font: {
                                                size: 10 // Cambia este número según el tamaño que desees
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,    // mostrar numero entero
                                            precision: 0   // no permite decimales
                                        },
                                        font: {
                                            size: 8
                                        }
                                    },
                                    x: {
                                        ticks: {
                                            font: {
                                                size: 8 
                                            }
                                        }
                                    }
                                }
                            }
                        };

                        
                         let ctxMensual = document.getElementById("myChartMes").getContext("2d");
                        
                        new Chart(ctxMensual, configMensual);
                        // ctxMensual.render();
                    }


                    

                } else {
                        alert('Error en el servidor');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la carga de datos:', status, error);
                alert('Error en la carga de datos');
            }
        });
    });
    let diasSemana;

    let reporSem = Array();
    let reporMens = Array();


    $(document).on(clickHandler, '#show', function(e) {
        if (myChart) {
			myChart.destroy();
		}
        if (myChart2) {
			myChart.destroy();
		}
        let localidad = document.getElementById('localidad').value;
        let ini = document.getElementById('inicio').value;
        let fin = document.getElementById('fin').value;
        let show = 1;
        if (localidad === '' || ini === '' || fin === '') {
            if (localidad === '') {
                $('#localidad').css('border', '1px solid red');
            }else{$('#localidad').css('border', 'none');}

            if (ini === '') {
                $('#inicio').css('border', '1px solid red');  
            }else{$('#inicio').css('border', 'none');}

            if (fin === '') {
                $('#fin').css('border', '1px solid red');
            }else{$('#fin').css('border', 'none');}
        }else{
            request = $.ajax({
                dataType: 'json', //json
                url: 'perfil_visitante/_includes/_php/querys.php',
                type: 'POST',
                data: {loc:localidad, fin, ini, hotFilt: true, show},
                success: function(data) {
                    console.log(data);
                    if (data.length > 0) {
                        let respuestas = data;
                        function calcularPorcentajeYConteo(respuestas, hoteles) {
                            // console.log(hoteles);
                            const porcentajesHoteles = [];

                            const hotelesLocalidad = hoteles.filter(hotel => hotel.muni === String(localidad));
                            console.log("Hoteles en la localidad seleccionada:", hotelesLocalidad);
                            hotelesLocalidad.forEach(hotel => {
                                const respuestasHotel = respuestas.filter(respuesta => respuesta.clave === hotel.clave && hotel.muni == String(localidad));
                                console.log(respuestasHotel);
                                const totalRespuestas = respuestasHotel.length;
                                const totalUsuarios = new Set(respuestasHotel.map(respuesta => respuesta.user)).size;
                                const part1 = new Set(respuestasHotel.filter(respuesta => respuesta.parte === '1').map(respuesta => respuesta.user)).size;
                                const part2 = new Set(respuestasHotel.filter(respuesta => respuesta.parte === '2').map(respuesta => respuesta.user)).size;
                                const part3 = new Set(respuestasHotel.filter(respuesta => respuesta.parte === '3').map(respuesta => respuesta.user)).size;
                                
                                const porcentajeParte1 = totalUsuarios > 0 ? ((part1 / totalUsuarios) * 100).toFixed(2) + '%' : '0%';
                                const porcentajeParte2 = totalUsuarios > 0 ? ((part2 / totalUsuarios) * 100).toFixed(2) + '%' : '0%';
                                const porcentajeParte3 = totalUsuarios > 0 ? ((part3 / totalUsuarios) * 100).toFixed(2) + '%' : '0%';

                                const porcentaje = totalUsuarios > 0 ? ((totalRespuestas / respuestas.length) * 100).toFixed(2) + '%' : '0%';
                                porcentajesHoteles.push({
                                    hotel: hotel.name,
                                    clave: hotel.clave,
                                    part1: part1,
                                    part2: part2,
                                    part3: part3,
                                    porPart1: porcentajeParte1,
                                    porPart2: porcentajeParte2,
                                    porPart3: porcentajeParte3,
                                    porcentaje: porcentaje,
                                    totalRespuestas: totalRespuestas,
                                    totalUsuarios: totalUsuarios
                                });
                            });
                           return porcentajesHoteles;
                        }
                        const resultados = calcularPorcentajeYConteo(respuestas, hoteles);


                        
                        

                        console.log(resultados);
                        // console.log('-----------k-respuestas---------');
                        // Seleccionar todos los elementos <tr> con la clase 'addLine'
                        const elementos = document.querySelectorAll('tr.addLine');
                        // Eliminar cada elemento seleccionado
                        elementos.forEach(elemento => {
                            elemento.remove();
                        });
                        let conteo = Array();
                        let hotel = Array();
                        let datos = Array();
                        $('.contButGenRepor').removeClass('none');
                        $('#reporSem').attr('data-muni', localidad);
                        $('#reporMen').attr('data-muni', localidad);
                        $('#reporInf').attr('data-muni', localidad);
                        $('#tableContHot').html('<th style="width: 40%">Hotel</th><th style="width: 15%">Parte 1</th><th style="width: 15%">Parte 2</th><th style="width: 15%">Parte 3</th><th style="width: 15%">Respuestas obtenidas</th>');
                        let contPers = 0;
                        for (let i = 0; i < resultados.length; i++) {
                            
                            $('#tableContHot').append('<tr class="addLine">'+
                            '<td>'+resultados[i]['hotel']+'</td>'+
                            '<td>'+resultados[i]['part1']+'<br><span>('+resultados[i]['porPart1']+')</span></td>'+
                            '<td>'+resultados[i]['part2']+'<br><span>('+resultados[i]['porPart2']+')</span></td>'+
                            '<td>'+resultados[i]['part3']+'<br><span>('+resultados[i]['porPart3']+')</span></td>'+
                            '<td>'+resultados[i]['totalUsuarios']+'<br><span>('+resultados[i]['porcentaje']+')</span></td>'+
                            '</tr>');
                            contPers = contPers + parseInt(resultados[i]['totalUsuarios']);
                            conteo.push(resultados[i]['totalUsuarios']);
                            hotel.push(resultados[i]['hotel']);
                        }

                        $('#tableContHot').append('<tr class="addLine" style="font-weight:900;">'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td></td>'+
                            '<td>Total de personas:</td>'+
                            '<td>'+contPers+'</span></td>'+
                            '</tr>');

                            
                        datos = { 0: conteo, 1: hotel };
                        let title = 'Respuestas obtenidas';
                        grapBar(datos, title);

                        // ======================== GRÁFICA SEMANAL ==================================
                        const hoy = new Date();
                        console.log("Fecha actual:", hoy);
                        
                        const diaSemana = hoy.getDay(); // 0: Domingo, 1: Lunes, ..., 6: Sábado
                        
                        // Calcular el lunes de la semana actual
                        const lunes = new Date(hoy);
                        lunes.setDate(hoy.getDate() - diaSemana + (diaSemana === 0 ? -6 : 1)); // Mover al lunes de esta semana
                        
                        // Establecer la hora a las 00:00:00 para el lunes
                        lunes.setHours(0, 0, 0, 0);
                        console.log("Lunes a las 00:00:", lunes);
                        
                        // Calcular el domingo de la semana actual
                        const domingo = new Date(lunes);
                        domingo.setDate(lunes.getDate() + 6); // Mover al domingo de esta semana
                        domingo.setHours(23, 59, 59, 999);    // Para que sea hasta el final del domingo
                        console.log("Domingo a las 23:59:", domingo);

                        // Formatear las fechas a YYYY-MM-DD
                        const formatoFecha = (fecha) => fecha.toISOString().split("T")[0];
                        const lunesStr = formatoFecha(lunes);
                        const domingoStr = formatoFecha(domingo);

                        diasSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];
                        const conteoRespuestasSemanal = diasSemana.reduce((acc, dia) => {
                            acc[dia] = new Set(); // Usamos un Set para evitar duplicados
                            return acc;
                        }, {});

                        // Filtrar respuestas de esta semana y contar usuarios únicos por día
                        respuestas.forEach((respuesta) => {
                            if (respuesta.fecha >= lunesStr && respuesta.fecha <= domingoStr) {
                                const fechaRespuesta = new Date(`${respuesta.fecha}T00:00:00`);
                                const diaSemanaRespuesta = fechaRespuesta.getDay();
                                const nombreDia = diasSemana[diaSemanaRespuesta === 0 ? 6 : diaSemanaRespuesta - 1]; // Ajustar para empezar en Lunes
                                conteoRespuestasSemanal[nombreDia].add(respuesta.user); // Agregar el usuario al Set del día correspondiente
                            }
                        });

                        // Convertir los Sets en conteos
                        const resultadosSemanal = Object.fromEntries(
                            Object.entries(conteoRespuestasSemanal).map(([dia, usuarios]) => [dia, usuarios.size])
                        );

                        console.log("Resultados Semanal:", resultadosSemanal);
                        reporSem = resultadosSemanal;

                        let datosSemanal = {
                            labels: diasSemana,
                            datasets: [
                                {
                                    label: "Respuestas de esta semana",
                                    data: Object.values(resultadosSemanal),
                                    backgroundColor: "rgba(75, 192, 192, 0.6)",
                                    borderColor: "rgba(75, 192, 192, 1)",
                                    borderWidth: 1
                                }
                            ]
                        };
                        const configSemanal = {
                            type: "line",
                            data: datosSemanal,
                            options: {
                                plugins: {
                                    legend: {
                                        display: false  // oculta cuadro de color con texto
                                    },
                                    title: {
                                        display: false  // oculta título del gráfico
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,    // mostrar numero entero
                                            precision: 0   // no permite decimales
                                        }
                                    }
                                }
                            }
                        };

                        // Renderizar la gráfica semanal
                        const ctxSemanal = document.getElementById("myChart2").getContext("2d");
                        new Chart(ctxSemanal, configSemanal);

                        // ==================================== GRÁFICA MENSUAL ===========================================
                        const inicioMes = new Date(hoy.getFullYear(), hoy.getMonth(), 1); // Primer día del mes actual
                        const finMes = new Date(hoy.getFullYear(), hoy.getMonth() + 1, 0); // Último día del mes actual

                        const inicioMesStr = formatoFecha(inicioMes);
                        const finMesStr = formatoFecha(finMes);

                        // Generar un array con los días del mes actual
                        const diasMes = [];
                        for (let dia = inicioMes; dia <= finMes; dia.setDate(dia.getDate() + 1)) {
                            diasMes.push(formatoFecha(new Date(dia))); // Guardar cada día formateado
                        }

                        // Inicializar el objeto de conteo por días
                        const conteoRespuestasMensual = diasMes.reduce((acc, dia) => {
                            acc[dia] = new Set(); // Usamos un Set para evitar duplicados
                            return acc;
                        }, {});

                        // Filtrar respuestas del mes actual y contar usuarios únicos por día
                        respuestas.forEach((respuesta) => {
                            if (respuesta.fecha >= inicioMesStr && respuesta.fecha <= finMesStr) {
                                conteoRespuestasMensual[respuesta.fecha]?.add(respuesta.user); // Agregar el usuario al Set del día correspondiente
                            }
                        });

                        // Convertir los Sets en conteos
                        const resultadosMensual = diasMes.map((dia) => ({
                            dia,
                            total: conteoRespuestasMensual[dia].size
                        }));

                        console.log("Resultados Mensual:", resultadosMensual);
                        reporMens = resultadosMensual

                        // Preparar datos para la gráfica mensual
                        let datosMensual = {
                            labels: resultadosMensual.map((resultado) => resultado.dia), // Fechas como etiquetas
                            datasets: [
                                {
                                    label: "Respuestas del mes actual",
                                    data: resultadosMensual.map((resultado) => resultado.total), // Conteos por día
                                    backgroundColor: "rgba(153, 102, 255, 0.6)",
                                    borderColor: "rgba(153, 102, 255, 1)",
                                    borderWidth: 1
                                }
                            ]
                        };

                        // Configuración de la gráfica mensual
                        const configMensual = {
                            type: "line",
                            data: datosMensual,
                            options: {
                                plugins: {
                                    legend: {
                                        display: false  // oculta cuadro de color con texto
                                    },
                                    title: {
                                        display: false  // oculta título del gráfico
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1,    // mostrar numero entero
                                            precision: 0   // no permite decimales
                                        }
                                    }
                                }
                            }
                        };

                        // Renderizar la gráfica mensual
                        const ctxMensual = document.getElementById("myChartMensual").getContext("2d");
                        new Chart(ctxMensual, configMensual);


                        $('.graphMens').removeClass('none');

                        // Obtener el array con la información de los hoteles y sus porcentajes, total de respuestas y total de usuarios
                    }else {
                        $('#tableContHot').append('<tr class="addLine">' +
                            '<td colspan="5" class="noResp">NINGUN HOTEL HA RECABADO RESPUESTAS</td>' +
                            '</tr>');
                    }
                    
                    
                    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
                    $('#tableContHot').html('<th style="width: 40%">Hotel</th><th style="width: 15%">Parte 1</th><th style="width: 15%">Parte 2</th><th style="width: 15%">Parte 3</th><th style="width: 15%">Respuestas obtenidas</th>');
                    $('#tableContHot').append('<tr class="addLine">'+
                        '<td colspan="5" class="noResp">NO SE HAN OBTENIDO RESPUESTAS DE NINGÚN HOTEL</td>'+
                        '</tr>');
                },
                complete: function() {
                    console.log('Solicitud AJAX completada.');
                }
            });
        }
    });
    
    $(document).on(clickHandler, '.viewHotel', function(e) {
        $('#myChart').removeClass('none');
        $(this).html('Ocultar');
        $(this).addClass('ocultarGraph');
        $(this).removeClass('viewHotel');
    });

    $(document).on(clickHandler, '.ocultarGraph', function(e) {
        $('#myChart').addClass('none');
        $(this).html('Ver por hotel');
        $(this).removeClass('ocultarGraph');
        $(this).addClass('viewHotel');
    });
    	
	$(document).on(clickHandler, '.edit', function(e) {
		let hotel = $(this).attr('data-idHotel');
        let table = $('#infoHotel');
        table.find('tr').each(function() {
            var id = $(this).data('hotel');
            
            const idToFind = hotel; // Cambia esto al id que deseas buscar

            // Encuentra el hotel con el id correspondiente
            const hotelArr = hoteles.find(h => h.id === idToFind);
            //console.log(hotelArr);
            if (id == hotel) {
                $(this).html('<td style="width:15%"> <input class="inputEdit" type="text" name="name" value="'+ hotelArr.name+'"></td>'+
                '<td style="width:15%"> <input type="text" class="inputEdit" name="clave" value="'+ hotelArr.clave +'"></td>'+
                '<td style="width:20%"> <input type="text" class="inputEdit" name="tel" value="'+hotelArr.tel+'"></td>'+
                '<td style="width:40%"> <input type="text" class="inputEdit" name="dir" value="'+hotelArr.dir+'"></td>'+
                '<td><p data-idHotel="'+hotelArr.id+'" class="save pointer">Guardar </p><input type="hidden" name="id" value="'+hotelArr.id+'"></td>');
            }
        });

	});


    $(document).on('click', '.butFiltInc', function(e) {
        let tyInc = $(this).attr('data-filtinc');
        let dataMes = $(this).attr('data-mes');
        $('.contButGraf .butFiltInc').css('opacity', '0.4');
        $('.contButGraf .butFiltInc').css('box-shadow', 'none');
        $(this).css('opacity', '1');
        $(this).css('box-shadow', '0px 2px 4px rgb(0,0,0,.6)');
        // console.log(datosInc);
        const today = new Date();
        const threeMonthsAgo = new Date();
        threeMonthsAgo.setMonth(today.getMonth() - 3); // Ajustar para incluir el mes actual
    
        const oneMonthAgo = new Date();
        oneMonthAgo.setMonth(today.getMonth() - 1); // Un mes atrás
    
        $('.resFilt').removeClass('none');
        let filteredData;
        if (dataMes == 2) {
            filteredData = datosInc.filter(item => {
                const inicioDate = new Date(item.inicio);
                return inicioDate >= oneMonthAgo && inicioDate <= today;
            });
        } else if (dataMes == 1) {
            filteredData = datosInc.filter(item => {
                const inicioDate = new Date(item.inicio);
                return inicioDate >= threeMonthsAgo && inicioDate <= today;
            });
        }
    
        // console.log(filteredData);
        let palabras = [];
        let cont = [];
        let dataset = [];
        let title = '';
        switch (parseInt(tyInc)) {
            case 1:
                function getMonthName(date) {
                    return date.toLocaleString('default', { month: 'long' });
                }
                const monthCounts = {};
                for (let i = 2; i >= 0; i--) {
                    const date = new Date(today.getFullYear(), today.getMonth() - i, 1);
                    const monthName = getMonthName(date);
                    monthCounts[monthName] = 0;
                }
                filteredData.forEach(item => {
                    const monthName = getMonthName(new Date(item.inicio));
                    if (monthCounts[monthName] !== undefined) {
                        monthCounts[monthName]++;
                    }
                });
                for (const [month, count] of Object.entries(monthCounts)) {
                    palabras.push(month);
                    cont.push(count);
                }
                dataset = { 0: cont, 1: palabras };
                $('#containCanvaInc').html('<canvas id="myChart" width="300" height="300"></canvas>');
                title = 'QR generados por mes';
                console.log(dataset);
                grapBar(dataset, title);
                $('.more').attr('data-incTyp', 1);
                $('.more').removeClass('none');
                break;
            case 2:
                const museoCounts = {};
                filteredData.forEach(item => {
                    const museo = item.museo;
                    if (museoCounts[museo]) {
                        museoCounts[museo]++;
                    } else {
                        museoCounts[museo] = 1;
                    }
                });
                for (const [museo, count] of Object.entries(museoCounts)) {
                    palabras.push(museo);
                    cont.push(count);
                }
                dataset = { 0: cont, 1: palabras };
                $('#containCanvaInc').html('<canvas id="myChart" width="300" height="300"></canvas>');
                title = 'QR generados por establecimiento';
                grapBar(dataset,title);
                $('.more').attr('data-incTyp', 2);
                $('.more').removeClass('none');
                break;
            case 3:
                const statCounts = {};
                filteredData.forEach(item => {
                    const status = item.status;
                    if (statCounts[status]) {
                        statCounts[status]++;
                    } else {
                        statCounts[status] = 1;
                    }
                });
                for (const [status, count] of Object.entries(statCounts)) {
                    let statusLabel;
                    if (status === '1') {
                        statusLabel = 'Inactivo';
                    } else if (status === '0') {
                        statusLabel = 'Activo';
                    }
                    palabras.push(statusLabel);
                    cont.push(count);
                }
                dataset = { 0: cont, 1: palabras };
                $('#containCanvaInc').html('<canvas id="myChart" width="300" height="300"></canvas>');
                title = 'QR´s activos e inactivos';
                grapBar(dataset,title);
                $('.more').attr('data-incTyp', 3);
                $('.more').removeClass('none');
                break;
            case 4:
                let vari = $(this).attr('data-mes');
                if (vari === '1') {
                    $(this).html('Ultimos 3 meses');
                }else if(vari === '2'){
                    $(this).html('Solo último mes');
                }

                let idTypInc = $('.more').attr('data-incTyp');
                $('.butFiltInc').each(function() {
                    let mes = $(this).attr('data-mes');
                    mes = mes == 1 ? 2 : 1;
                    $(this).attr('data-mes', mes);
                });
                $(`.butFiltInc[data-filtinc="${idTypInc}"]`).click();
                break;
            default:
                break;
        }
    });



    
    $(document).on(clickHandler, '.editInfo', function(e) {
        e.preventDefault();
        let button = $(this);
        $(button).html('Guardar');
        $(button).removeClass('editInfo');
        $(button).addClass('saveInfo');
        // console.log('click al edit');
        let id = $(this).attr('data-id');
        let contInfInc = button.closest('.listEst').find('.contInfInc'); // Encuentra el contenedor 'contInfInc' dentro del mismo div 'listEst'
        for (let i = 0; i < datosInc.length; i++) {
            if (datosInc[i]['id'] === id) {
                $(contInfInc).html('<div class="infInc">'+
                                        '<img src="https://sichitur.org/generateQR/'+datosInc[i]['img']+'" alt="">'+
                                        '<div class="contInfo">'+
                                            '<p>Dirección: <input class="inpEditInc" name="dir" type="text" value="'+datosInc[i]['dir']+'" name="" id=""></p>'+
                                            '<p>Recompensa: <input class="inpEditInc" name="desc" type="text" value="'+datosInc[i]['desc']+'" name="" id=""></p>'+
                                            '<p>URL: <input class="inpEditInc" name="url" type="text" value="'+datosInc[i]['url']+'" name="" id=""></p>'+
                                            '<p>Horario: <input class="inpEditInc" name="hor" type="text" value="'+datosInc[i]['hor']+'" name="" id=""></p>'+
                                            '<p>Correo: <input class="inpEditInc" name="correo" type="text" value="'+datosInc[i]['correo']+'" name="" id=""></p>'+
                                        '</div>'+
                                    '</div>');
            }
            
        }
    });



    $(document).on(clickHandler, '.saveInfo', function(e) {
        let id = $(this).attr('data-id');
        let button = $(this);
        let contInfInc = button.closest('.listEst').find('.contInfInc'); 
        var $inputs = contInfInc.find("input, select, button, textarea, checkbox, number, radio, text, range, label");
        var serializedData = $inputs.serialize();
        $inputs.prop("disabled", true);
        
        request = $.ajax({
            dataType: 'text', //json
            url: 'perfil_visitante/_includes/_php/querys.php',
            type: 'POST',
            data: {serializedData, actInc : true,id},
            success: function(data) {
                // console.log(data);
                if (data === 'successful') {
                    $(`.typeInc[data-typeinc="2"]`).click(); 
                    setTimeout(() => {
                        if ($(`.listEst[data-id="${id}"]`).length) {
                            // console.log('existe');
                            // console.log(id);
                            $(`.listEst[data-id="${id}"]`).click(); 
                        }
                    }, 600);
                }else{
                    alert('Error en el servidor');
                }
            }
        });
    });


    $(document).on(clickHandler, '.imgCloseEstab', function(e) {
        $('.addEst').remove();
    });

    $(document).on(clickHandler, '.butAdd', function(e) {
        let type = $(this).attr('data-add');
        console.log(type);
        switch (parseInt(type)) {
            case parseInt(1):
                addEstablecimiento();
                break;
        
            default:
                break;
        }
    });

    $(document).on(clickHandler, '#saveNewEstab', function(e) {
        let contInfInc = $('.contEstab');
        console.log(contInfInc);
        var $inputs = contInfInc.find(".saveServ");
        console.log($inputs);
        var formData = new FormData();
        let cont;
        $inputs.each(function() {
            let name = $(this).attr('name');
            let val = $(this).val();
            if (val == '') {
                $(this).css('border-bottom', '1px solid red');
                cont++;
                return;
            }else{
                formData.append(name, val); 
            }
            
            
        });
        // console.log(cont);
        if (cont > 0) {
            alert('Llene todos los campos');
        }else{
            var fileInput = $('#upload')[0];
            formData.append('upload', fileInput.files[0]);
            formData.append('addEstab', 'true');
            for (var pair of formData.entries()) {
                console.log(pair);
            }

            $.ajax({
                url: 'perfil_visitante/_includes/_php/querys.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    if (data === 'successful') {
                        console.log('click para refreshear pantalla');
                        $('.addEst').remove();
                        $(`.typeInc[data-typeinc="2"]`).click();
                    } else {
                            alert('Error en el servidor');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error en la carga de datos:', status, error);
                    alert('Error en la carga de datos');
                }
            });
        }

    });


    $(document).on(clickHandler, '.stateSvg', function(e) {
        let id = $(this).attr('data-id');
        let st = $(this).attr('data-state');
        let statusCh = st === '1' ? '0' : '1';
        let div = this;
        // console.log(div);
        // console.log(statusCh);
        request = $.ajax({
            dataType: 'text', //json
            url: 'perfil_visitante/_includes/_php/querys.php',
            type: 'POST',
            data: {id,statusCh},
            success: function(data) {
                // console.log(this);
                if (data === 'successful') {
                   if (statusCh === '1') {
                        $(div).css('color','gray');
                        div.setAttribute('data-state', '1');
                   }else if (statusCh === '0'){
                        $(div).css('color','green');
                        div.setAttribute('data-state', '0');
                   }
                }
            }
        });
    });
    


    $(document).on(clickHandler, '.save', function(e) {
        let hotel = $(this).attr('data-idHotel');
        let table = $('#infoHotel');
        let trEdit;
        table.find('tr').each(function() {
            
            var id = $(this).data('hotel');
            //console.log(hotel, id);
            if (id == hotel) {
                trEdit = $(this);
                var $inputs = $(this).find('input');
                let serializedData = $inputs.map(function() {
                    return encodeURIComponent(this.name) + '=' + encodeURIComponent(this.value);
                }).get().join('&');

                let params = new URLSearchParams(serializedData);
                let dataObject = {};
                for (let [key, value] of params.entries()) {
                    dataObject[key] = value;
                }
                $inputs.prop('disabled', true);
                request = $.ajax({
                    dataType: 'text', //json
                    url: 'perfil_visitante/_includes/_php/querys.php',
                    type: 'POST',
                    data: {serializedData, serial:true},
                    success: function(data) {
                        // console.log(data);
                        if (data === 'successful') {
                            $(trEdit).html('<td style="width:15%">'+dataObject.name+'</td>'+
                               '<td style="width:15%">'+dataObject.clave+'</td>'+
                               '<td style="width:20%">'+dataObject.tel+'</td>'+
                               '<td style="width:40%">'+dataObject.dir+'</td>'+
                                '<td><p data-idHotel="'+dataObject.id+'" class="edit pointer">Editar</p></td>');
                        }
                    }
                });

            }
        });
    });

    $('#muniFilt').change(function (e) {
        var reg = parseInt(document.getElementById("muniFilt").value);
        let hotelsFilt = Array();
        // Seleccionar todos los elementos <tr> con la clase 'addLine'
        const elementos = document.querySelectorAll('tr.lineHotels');
        // Eliminar cada elemento seleccionado
        elementos.forEach(elemento => {
            elemento.remove();
        });
        for (let i = 0; i < hoteles.length; i++) {
            if (hoteles[i]['muni'] == reg) {
                $('#infoHotel').append('<tr class="lineHotels" data-hotel="'+hoteles[i]['id']+'">'+
                '<td style="width:15%">'+hoteles[i]['name']+'</td>'+
                '<td style="width:15%">'+hoteles[i]['clave']+'</td>'+
                '<td style="width:20%">'+hoteles[i]['tel']+'</td>'+
                '<td style="width:40%">'+hoteles[i]['dir']+'</td>'+
                '<td><p data-idHotel="'+hoteles[i]['id']+'" class="edit pointer">Editar</p></td>'+
                '</tr>');
            }
        }
    });
});

function toggleDropdown(event) {
    // Prevent the dropdown from closing when clicking inside the dropdown
    event.stopPropagation();
    document.querySelector('.select-box .dropdown').classList.toggle('show');
}

document.addEventListener('click', function(event) {
    var customSelectContainer = document.querySelector('.custom-select-container');
    
    if (customSelectContainer) {
        var isClickInside = customSelectContainer.contains(event.target);

        if (!isClickInside) {
            var dropdown = document.querySelector('.select-box .dropdown');
            if (dropdown) {
                dropdown.classList.remove('show');
            }
        }
    }
});

document.querySelectorAll('.select-box .dropdown input[type="checkbox"]').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        updateSelected();
    });

    // Prevent the dropdown from closing when clicking on checkboxes
    checkbox.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});

function updateSelected() {
    var selected = [];
    document.querySelectorAll('.select-box .dropdown input[type="checkbox"]:checked').forEach(function(checkbox) {
        selected.push(checkbox.value);
    });
    document.querySelector('.select-box .selected').textContent = selected.join(', ') || 'Select options';
}


let hoteles = Array();
function datos(opc) {
    const elementos = document.querySelectorAll('tr.lineHotels');
    if (elementos) {
       // Eliminar cada elemento seleccionado
    elementos.forEach(elemento => {
        elemento.remove();
    }); 
    }
    
    request = $.ajax({
        dataType: 'json', //json
        url: 'perfil_visitante/_includes/_php/querys.php',
        type: 'POST',
        data: {opc: opc },
        success: function(data) {
            // console.log(data);
            hoteles = data;
            for (let i = 0; i < data.length; i++) {
                $('.infoHotel').append('<tr class="lineHotels" data-hotel="'+data[i]['id']+'">'+
                '<td style="width:15%">'+data[i]['name']+'</td>'+
                '<td style="width:15%">'+data[i]['clave']+'</td>'+
                '<td style="width:20%">'+data[i]['tel']+'</td>'+
                '<td style="width:40%">'+data[i]['dir']+'</td>'+
                '<td><p data-idHotel="'+data[i]['id']+'" class="edit pointer">Editar</p></td>'+
                '</tr>');
            } 
        }
    });
}
let datosInc = Array();


function datosIncC(id) {
    let datos = true;
    request = $.ajax({
        dataType: 'json', //json
        url: 'perfil_visitante/_includes/_php/querys.php',
        type: 'POST',
        data: { datos : datos, id:id },
        success: function(data) {
            datosInc = data;
            if (data.length > 0) {
                // console.log('se actualizo');
                $('#section2').removeClass('none');
                $('#section2').html(controlInc);
                // $('#contCanvaInc').html('<canvas id="canvasInc" width="300" height="300"></canvas>');
                // console.log(data);
                for (let i = 0; i < data.length; i++) {
                    let statusText = data[i]['stat'] === '1' ? 'gray' : 'green';
                    // console.log(statusText);
                    $('.contListEst').append('<div class="listEst" data-id="'+data[i]['id']+'">'+
                                '<div class="listEst2">'+
                                    '<p>'+data[i]['name']+'</p>'+
                                    '<svg class="stateSvg" style="color:'+statusText+'" data-id="'+data[i]['id']+'" data-state="'+data[i]['stat']+'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">'+
                                        '<path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1.146 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"></path>'+
                                    '</svg>' +
                                    '<div class="butEdit none">'+
                                        '<button data-id="'+data[i]['id']+'" class="editInfo">Editar</button>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="contInfInc">'+
                                    '<div class="infInc">'+
                                        '<img src="https://sichitur.org/generateQR/'+data[i]['img']+'" alt="">'+
                                        '<div class="contInfo">'+
                                            '<p>Dirección: <span>'+data[i]['dir']+'</span></p>'+
                                            '<p>Recompensa: <span>'+data[i]['desc']+'</span></p>'+
                                            '<p>URL: <span><a href="'+data[i]['url']+'">'+data[i]['url']+'</a></span></p>'+
                                            '<p>Horario: <span>'+data[i]['hor']+'</span></p>'+
                                            '<p>Correo: <span>'+data[i]['correo']+'</span></p>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>');
                }

                // filtersIncE(id);
            }else{
                $('#containCanvaInc').html('<div id="containCanvaInc"><p>NO HAY CONTENIDO DE ESTA LOCALIDAD</p></div>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
            // $('#containCanvaInc').html('<div id="containCanvaInc"><p>NO HAY CONTENIDO DE ESTA LOCALIDAD</p></div>');
            $('#section2').html('<div class="error">NO HAY DATOS PARA MOSTRAR</div>>');
            setTimeout(() => {
                let id = '';
                datosIncC(id)
            }, 2000);
        },
        complete: function() {
            console.log('Solicitud AJAX completada.');
        }
    });
}


function datosIncE(id) {
    let estadistica = true;
    request = $.ajax({
        dataType: 'json', //json
        url: 'perfil_visitante/_includes/_php/querys.php',
        type: 'POST',
        data: { estadistica : estadistica, id:id },
        success: function(data) {
            // console.log(data);
            datosInc = data;
            if (data.length > 0) {
                // console.log('se actualizo');
                $('#section2').removeClass('none');
                $('#section2').html(estadis);
                // $('#contCanvaInc').html('<canvas id="canvasInc" width="300" height="300"></canvas>');
                for (let i = 0; i < data.length; i++) {
                    let statusText = data[i]['status'] === '0' ? 'Activo' : 'Inactivo';
                    $('#tabInc').append('<tr>'+
                            '<td>'+data[i]['code']+'</td>'+
                            '<td>'+data[i]['museo']+'</td>'+
                            '<td>'+data[i]['inicio']+'</td>'+
                            '<td>'+data[i]['fin']+'</td>'+
                            '<td>'+statusText+'</td>'+
                        '</tr>');
                }

                filtersIncE(id);
            }else{
                $('#containCanvaInc').html('<div id="containCanvaInc"><p>NO HAY CONTENIDO DE ESTA LOCALIDAD</p></div>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
            // $('#containCanvaInc').html('<div id="containCanvaInc"><p>NO HAY CONTENIDO DE ESTA LOCALIDAD</p></div>');
            $('#section2').html('<div class="error">NO HAY DATOS PARA MOSTRAR</div>>');
            setTimeout(() => {
                let id = '';
                datosIncE(id)
            }, 2000);
        },
        complete: function() {
            console.log('Solicitud AJAX completada.');
        }
    });
}

let establecimientos = Array();
function filtersIncE(id) {
    let filtersInc = true;
    request = $.ajax({
        dataType: 'json', //json
        url: 'perfil_visitante/_includes/_php/querys.php',
        type: 'POST',
        data: { filtersInc : filtersInc, id:id },
        success: function(data) {
            establecimientos = data;
            let loc;
            if (data.length > 0) {
                if (id === '') {
                    loc = '';
                }else{
                    loc = data [0]['loc'];
                }
                let name = nameL();
                
                // $('#contCanvaInc').html('<canvas id="canvasInc" width="300" height="300"></canvas>');
                $('#titleTabInc h3').html('Registro completo de folios ' + '('+name+')');
                for (let i = 0; i < data.length; i++) {
                    let statusText = data[i]['status'] === '0' ? 'Activo' : 'Inactivo';
                    $('#estabInc').append('<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>');
                }
            }else{
                $('#containCanvaInc').html('<div id="containCanvaInc"><p>NO HAY CONTENIDO DE ESTA LOCALIDAD</p></div>');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
            // $('#containCanvaInc').html('<div id="containCanvaInc"><p>NO HAY CONTENIDO DE ESTA LOCALIDAD</p></div>');
            // $('#section2').html('<div class="error">NO HAY DAoTOS PARA MOSTRAR</div>>');
            alert('Hubo un error al consultar establecimientos');
        },
        complete: function() {
            console.log('Solicitud AJAX completada.');
        }
    });
}



let myChart;
let myChart2;

function nameL(loc) {
    let name = '';
    switch (parseInt(loc)) {
        case '1':
            name = 'JUAREZ';
            break;
        case 2:
            name = 'CHIHUAHUA';
            break;
        case 3:
            name = 'Casas-Grandes';
            break;
        case 4:
            name = 'Guachochi';
            break;
        case 6:
            name = 'Creel';
            break;
        case 7:
            name = 'Batopilas';
            break;
        case 8:
            name = 'Parral';
            break;
        default:
            name = 'TODAS LAS LOCALIDADES';
            break;
    }
    return name;
}







function grapDouble(hotelsF, months) {
   
    const baseColors = ['#002D72', '#CE0F69', 'rgb(115, 77, 183)', '#545859'];
    const hotelColors = {};
    const usedColors = [];

    function getRandomBaseColor() {
        let randomIndex = Math.floor(Math.random() * baseColors.length);
        return baseColors[randomIndex];
    }

    function generateSimilarColor(baseColor) {
        let r = parseInt(baseColor.slice(1, 3), 16);
        let g = parseInt(baseColor.slice(3, 5), 16);
        let b = parseInt(baseColor.slice(5, 7), 16);
    
        let variation = 30; // Ajusta este valor para mayor o menor variación
         r = Math.min(255, Math.max(0, r + Math.floor(Math.random() * (2 * variation + 1)) - variation));
        g = Math.min(255, Math.max(0, g + Math.floor(Math.random() * (2 * variation + 1)) - variation));
        b = Math.min(255, Math.max(0, b + Math.floor(Math.random() * (2 * variation + 1)) - variation));
    
        return `#${((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1).toUpperCase()}`;
    }

    function getColorForHotel(hotelName) {
        if (!hotelColors[hotelName]) {
            let baseColor;
            do {
                baseColor = getRandomBaseColor();
            } while (usedColors.includes(baseColor));
    
            hotelColors[hotelName] = baseColor;
            usedColors.push(baseColor);
        }
        return hotelColors[hotelName];
    }
    const datasets = hotelsF.map(hotel => {
        const hotelColor = getColorForHotel(hotel.hotel);
        return {
            label: hotel.hotel,
            data: months.map(month => {
                console.log(month);
                let mess = numMes(month);
                const monthKey = `mes${mess}`; // 'mes5', 'mes6', etc.
                return hotel.mes[monthKey] || 0;
            }),
            fill: false, // Para no rellenar el área bajo la línea
            borderColor: hotelColor,
            backgroundColor: hotelsF.length > 1 
                            ? hotelColor  // Un solo color por hotel si hay múltiples hoteles
                            : months.map(() => getRandomBaseColor()),  // Colores similares para barras si es un solo hotel
            tension: 0.1
        };
    });

    const ctx = document.getElementById('myChart').getContext('2d');
    if (myChart) {
        myChart.destroy();
    }
     myChart = new Chart(ctx, {
        type: 'bar', // Puedes cambiar a 'bar' si prefieres una gráfica de barras
        data: {
            labels: months,
            datasets: datasets
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Comparación de Respuestas por Mes'
                }
            },
            scales: {
                x: {
                    type: 'category',
                    title: {
                        display: true,
                        text: 'Mes'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Número de Respuestas'
                    }
                }
            }
        }
    });
}

function addEstablecimiento() {
    console.log('agregr establecimientos');
    $('.contMain').append('<div class="addEst">'+
        '<div class="aliContEstab">'+
            '<div class="contEstab">'+
            ' <img class="imgCloseEstab" src="perfil_visitante/_images/cerrar.png"/>'+
                '<input class="saveServ" type="text" name="nameEstab" placeholder="Nombre del establecimiento"/>'+
                '<select class="saveServ" name="typEstab">'+
                    '<option hidden="" value="">Tipo de establecimiento</option>'+
                    '<option value="1">Museo</option>'+
                    '<option value="2">Tours y paseos</option>'+
                    '<option value="3">Hotel</option>'+
                    '<option value="4">Restaurante</option>'+
                    '<option value="5">Salon de eventos</option>'+
                '</select>'+
                '<select class="saveServ" name="typRecom">'+
                    '<option hidden="" value="">Tipo de recompensa</option>'+
                    '<option value="2">Descuento</option>'+
                    '<option value="1">Regalo (entradas, productos, ect)</option>'+
                '</select>'+
                '<select class="saveServ" name="municipio">'+
                    '<option hidden="" value="">Selecciona un municipio</option>'+
                    '<option value="2">Chihuahua</option>'+
                    '<option value="3">Casas Grandes</option>'+
                    '<option value="4">Guachochi</option>'+
                    '<option value="6">Creel</option>'+
                    '<option value="7">Batopilas</option>'+
                    '<option value="8">Parral</option>'+
                    '<option value="1">Juarez</option>'+
                    
                '</select>'+
                '<textarea class="saveServ" name="descRecom" placeholder="Descripción de la recompensa"></textarea>'+
                '<input class="saveServ" type="text" name="horEstab" placeholder="Horario del establecimiento"/>'+
                '<input class="saveServ" type="text" name="dirEstab" placeholder="Dirección del establecimiento"/>'+
                '<input class="saveServ" type="text" name="urlEstab" placeholder="URL del establecimiento"/>'+
                '<input type="text" name="correoEstab" placeholder="Correo para recibir QR generados"/>'+
                '<input class="saveServ" type="file" id="upload"  accept=".jpg, .jpeg, .png" name="imagenEstab"/>'+
                '<div class="contButEstab"><button id="saveNewEstab">Guardar</button></div>'+
            '</div>'+
        '</div>'+
        '</div>');
    
}

function numMes(key){
    let mes;
    switch (key) {
        case 'Ene':
            mes = '1';
            break;
        case 'Feb':
            mes = '2';
            break;
        case 'Mar':
            mes = '3';
            break;
        case 'Abr':
            mes = '4';
            break;
        case 'May':
            mes = '5';
            break;
        case 'Jun':
            mes = '6';
            break;
        case 'Jul':
            mes = '7';
            break;
        case 'Ago':
            mes = '8';
            break;
        case 'Sep':
            mes = '9';
            break;
        case 'Oct':
            mes = '10';
            break;
        case 'Nov':
            mes = '11';
            break;
        case 'Dic':
            mes = '12';
            break;
    
        default:
            break;
    }  
    return mes;
}


function title(stat, estable, time, nameMus,valid) {
    console.log(stat, estable, time);
    // Generar el título dinámico
    if (valid === true) {
        $('#titleTabInc h3').html('No se encontraron datos');
    }else{
        let title = `Recompensas`; 
        if (stat === "0") {
            title += " activas";
        } else if (stat === "1") {
            title += " inactivas";
        } else if (stat === "2") {
            title += " dadas de baja";
        }

        console.log(title);
        if (estable != "") {
            let museo = nameMus != '' > 0 ? nameMus : '';
            title += ` de ${museo}`;
        } else {
            title += ' (todo)';
        }
        console.log(title);


        if (time != "") {
            
            title += ` de ${time === "1" ? " un mes" : " 3 meses"}`;
        }

        console.log(title);

        $('#titleTabInc h3').html(title);
    }
}


function calcularMesYSemana(fecha) {
    const date = new Date(fecha);
    const year = date.getFullYear();
    const month = date.getMonth() + 1; // Enero es 0, así que sumamos 1
    const day = date.getDate();
    // Obtener el primer día del mes y la primera semana del año
    const firstDayOfMonth = new Date(year, month - 1, 1);
    const firstDayOfYear = new Date(year, 0, 1);
    // Obtener el número de semana del mes
    const monthWeek = Math.ceil((day + firstDayOfMonth.getDay()) / 7);
    return { month: `mes${month}`, week: `semana${monthWeek}` };
}

function calcularPorcentajeYConteo(respuestas, hotelesFiltrados) {
    // Crear una copia del array de respuestas para agregar mes y semana
    const respuestasConMesYSemana = respuestas.map(respuesta => {
        const { month, week } = calcularMesYSemana(respuesta.fecha);
        return { ...respuesta, month, week };
    });
    const porcentajesHoteles = [];
    hotelesFiltrados.forEach(hotel => {
        const respuestasHotel = respuestasConMesYSemana.filter(respuesta => respuesta.clave === hotel.clave);
        const totalRespuestas = respuestasHotel.length;
        const totalUsuarios = new Set(respuestasHotel.map(respuesta => respuesta.user)).size;
        const part1 = new Set(respuestasHotel.filter(respuesta => respuesta.parte === '1').map(respuesta => respuesta.user)).size;
        const part2 = new Set(respuestasHotel.filter(respuesta => respuesta.parte === '2').map(respuesta => respuesta.user)).size;
        const part3 = new Set(respuestasHotel.filter(respuesta => respuesta.parte === '3').map(respuesta => respuesta.user)).size;                        
        const porcentajeParte1 = totalUsuarios > 0 ? ((part1 / totalUsuarios) * 100).toFixed(2) + '%' : '0%';
        const porcentajeParte2 = totalUsuarios > 0 ? ((part2 / totalUsuarios) * 100).toFixed(2) + '%' : '0%';
        const porcentajeParte3 = totalUsuarios > 0 ? ((part3 / totalUsuarios) * 100).toFixed(2) + '%' : '0%';
        const porcentaje = totalUsuarios > 0 ? ((totalRespuestas / respuestas.length) * 100).toFixed(2) + '%' : '0%';
        // Calcular usuarios únicos por mes y semana
        const usuariosPorMes = {};
        respuestasHotel.forEach(respuesta => {
            if (!usuariosPorMes[respuesta.month]) {
                usuariosPorMes[respuesta.month] = new Set();
            }
            usuariosPorMes[respuesta.month].add(respuesta.user);
        });
        const usuariosPorSemana = {};
        respuestasHotel.forEach(respuesta => {
            if (!usuariosPorSemana[respuesta.week]) {
                usuariosPorSemana[respuesta.week] = new Set();
            }
            usuariosPorSemana[respuesta.week].add(respuesta.user);
        });
        // Convertir sets a tamaños
        const conteoUsuariosPorMes = {};
        Object.keys(usuariosPorMes).forEach(month => {
            conteoUsuariosPorMes[month] = usuariosPorMes[month].size;
        });
        const conteoUsuariosPorSemana = {};
        Object.keys(usuariosPorSemana).forEach(week => {
            conteoUsuariosPorSemana[week] = usuariosPorSemana[week].size;
        });
        porcentajesHoteles.push({
            hotel: hotel.name,
            clave: hotel.clave,
            part1: part1,
            part2: part2,
            part3: part3,
            porPart1: porcentajeParte1,
            porPart2: porcentajeParte2,
            porPart3: porcentajeParte3,
            porcentaje: porcentaje,
            totalRespuestas: totalRespuestas,
            totalUsuarios: totalUsuarios,
            conteoUsuariosPorMes: conteoUsuariosPorMes,
            conteoUsuariosPorSemana: conteoUsuariosPorSemana
        });
    });
    return porcentajesHoteles;
}

function grapBar(dataset, title){
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
          label: ' total',
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
                text: title,
                color: 'Black' // Cambiar el color del título a rojo
            }
        }
      }
    });

    myChart.render();
}
