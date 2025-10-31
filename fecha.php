<!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            body { font-family: 'Arial', sans-serif; margin: 0; padding: 0; font-size: 10px; }
            .header-bar {
                 color: #734DB7; padding: 10px 20px; font-size: 18px;
                text-align: center; font-weight: bold;
            }
            .subtitle-bar {
                color: #26448E; padding: 5px 20px; font-size: 14px;
                text-align: right; margin-bottom: 20px;    text-align: center;
            }
            .container { padding: 0 20px; box-sizing: border-box; }

            .main-table { width: 100%; border-collapse: collapse; table-layout: fixed; }
            .main-table td { 
                padding: 10px; 
                vertical-align: top; 
                border: none; 
            }
            .main-table .t1-column { width: 10%; }
            .main-table .t2-column { width: 40%; }
            .main-table .t3-column { width: 50%; }

            .indicator-section { margin-bottom: 25px; }
            .indicator-title { font-size: 18px; color: #002D72; margin: 0; font-weight: bold; }
            .indicator-value { font-size: 32px; color: #734DB7; margin: 5px 0; font-weight: bold; }
            .indicator-change { font-size: 11px; margin: 0; }
            .detail-title { font-size: 14px; color: #002D72; margin-top: 10px; margin-bottom: 5px; font-weight: bold; }
            
            .detail-table { width: 50%; border-collapse: collapse; font-size: 10px; margin-top: 5px; }
            .detail-table td { padding: 2px 0; border: none; }
            .detail-table .label { color: #555; text-align: left; }
            .detail-table .data { font-weight: bold; text-align: right; }
            
            .monthly-occupancy-table { margin-top: 30px; }
            .monthly-occupancy-table table { width: 100%; border-collapse: collapse; font-size: 9px; text-align: center; }
            .monthly-occupancy-table th, .monthly-occupancy-table td { border: 1px solid #ccc; padding: 4px; }
            .monthly-occupancy-table th { background-color: #f2f2f2; }
            .sub-detail-table{width: 100%;}
            .sub-detail-table .label{font-weight:100;color:#26448E; }
            .sub-detail-table .data{font-weight:900;color:black;}
            .tabHeader{ width: 100%;margin-top: 20px; }
            .tabHeader .headP1 {width: 60%; background:#26448E; color:white;}
            .tabHeader .headP2 {width: 20px; background:#734DB7;height:100%;padding:0 5px;}
            .tabHeader .headP3 {width: 20px; background:#26448E;height:100%;padding:0 5px;}
            .tabHeader .headP4{background: #D3D3D3;}
            .titHead{margin: 0;font-size: 30px; text-align: center;}
        </style>
    </head>
    <body>
        <!-- HEADER  -->
        <table class="tabHeader">
          <tr>
            <td class="headP1"><h3 class="titHead">Indicadores Turísticos</h3></td>
            <td class="headP2"><div class="colMor"></div></td>
            <td class="headP3"><div class="colBlue"></div></td>
            <td class="headP4">
              <div class="header-bar">{$municipio_nombre}</div>
              <div class="subtitle-bar">Ene - {$mes_reporte} {$ano_actual}</div>
            </td>
          </tr>
        </table>

        
        <div class="container">
          <!-- TABLA PRINCIPAL -->
            <table class="main-table">
              <!-- 3 TR PARA TURISTAS, OCUPACION Y DERRAMA -->
               <!-- primer tr turistas noche -->
                <tr>
                  <!-- 3 TD PARA LA DIVISION DE LOS ELEMENTOS (ICONOS, DATOS, GRÁFICAS) -->
                  <td class="t1-column">{$icon_viajero}</td>
                  <td class="t2-column">
                    <p class="indicator-title"> TURISTAS NOCHE</p>
                    <!-- TABLA PARA TURISTAS NOCHE -->
                      <table class="sub-detail-table">
                        <tr>
                          <td>
                            <p class="indicator-value">{$format_box_value($tnoche_acum, false, 0)}</p>
                          </td>
                          <td>
                            <!-- TABLA PARA REISDENTES Y NO RESIDENTES -->
                            <table class="detail-table">
                                <tr>
                                    <td class="label">No Residente</td>
                                    <td class="data">{$format_box_value($no_residentes_acum, false, 0)}</td>
                                </tr>
                                <tr>
                                    <td class="label">Residente</td>
                                    <td class="data">{$format_box_value($residentes_acum, false, 0)}</td>
                                </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <!-- PARTE DE ABAJO DE TURISTAS NOCHE (% CAMBIO Y CLASIFICACIÓN HOTELERA) -->
                        <div class="indicator-section">
                            <p class="indicator-change" style="color: {$tnoche_color};">
                                {$tnoche_flecha} {$tnoche_cambio_texto} comparado con el mismo periodo del año pasado.
                            </p>

                            <p class="detail-title">Por Clasificación Hotelera</p>
                            <table class="detail-table">
                                <tr>
                                    <td class="label">1 y 2 estrellas</td>
                                    <td class="data">{$format_box_value($tnoche_acum_1_2, false, 0)}</td>
                                </tr>
                                <tr>
                                    <td class="label">3, 4 y 5 estrellas</td>
                                    <td class="data">{$format_box_value($tnoche_acum_3_4_5, false, 0)}</td>
                                </tr>
                            </table>
                        </div>
                  </td>
                    <td class="tt3-column" rowspan="1">
                        <div style="height: 100%; background-color: #f7f7f7; padding: 10px; border: 1px solid #eee;">
                            <p style="text-align: center; color: #888;">[ESPACIO PARA GRÁFICA DE BARRAS ACUMULADAS]</p>
                            
                        </div>
                    </td>
                </tr>
                
                <!-- segundo tr ocupación -->
                <tr>
                  <td class="t1-column">{$icon_viajero}</td>
                  <td class="t2-column">
                    <p class="indicator-title"> % DE OCUPACIÓN</p>
                    <table class="sub-detail-table">
                        <tr>
                          <td>
                            <p class="indicator-value">{$format_box_value($ocupacion_acum, false, 2)}%</p>
                          </td>
                          <td>
                            <!-- TABLA PARA ESTADÍA Y DENSIDAD -->
                            <table class="detail-table">
                                <tr>
                                    <td class="label">Estadía</td>
                                    <td class="data">{$format_box_value($ocu_acum, false, 2)}</td>
                                </tr>
                                <tr>
                                    <td class="label">Densidad:</td>
                                    <td class="data">{$format_box_value($dens_acum, false, 2)}</td>
                                </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                      <!-- DATOS DE ABAJO % DE OCUPACION (% DE CAMBIO) -->
                        <div class="indicator-section">
                            <p class="indicator-change" style="color: {$ocupacion_color};">
                                {$ocupacion_flecha} {$ocupacion_cambio_texto} comparado con el mismo periodo del año pasado.
                            </p>
                            <div style="clear: both;"></div>
                        </div>
                    </td>
                     
                  </td>
                  <td class="t3-column" rowspan="1">
                      <div style="margin-top: 20px; margin-bottom: 20px; border-top: 1px solid #ddd;"><p style="text-align: center; color: #888;">[ESPACIO PARA GRÁFICA DE OCUPACIÓN MENSUAL]</p></div>
                  </td>




                </tr>
                <!-- tercer fila de derrama -->
                <tr>
                  <td class="t1-column">{$icon_viajero}</td>
                  <td class="t2-column">
                    <div class="indicator-section" style="margin-top: 20px;">
                      <p class="indicator-title">DERRAMA ECONÓMICA</p>
                      <p class="indicator-value">{$format_box_value($derrama_acum, true, 2)} MDP</p>
                      <p class="indicator-change" style="color: {$derrama_color};">
                          {$derrama_flecha} {$derrama_cambio_texto} comparado con el mismo periodo del año pasado.
                      </p>

                      <p class="detail-title">Por Clasificación Hotelera</p>
                      <table class="detail-table">
                          <tr>
                              <td class="label">${$format_box_value($derrama_acum_1_2, true, 2)}</td>
                              <td class="data">en 1 y 2 estrellas</td>
                          </tr>
                          <tr>
                              <td class="label">${$format_box_value($derrama_acum_3_5, true, 2)}</td>
                              <td class="data">en 3, 4 y 5 estrellas</td>
                          </tr>
                      </table>
                    </div>
                  </td>
                  <td class="t3-column" rowspan="1">
                      <div style="margin-top: 20px; margin-bottom: 20px; border-top: 1px solid #ddd;"><p style="text-align: center; color: #888;">[ESPACIO PARA GRÁFICA DE OCUPACIÓN MENSUAL]</p></div>
                      
                    </td>
                </tr>
                <!-- footer de datos -->
                <tr>
                    <td class="t2-column">
                        <table class="detail-table" style="width: 100%;">
                            <tr>
                                <td style="width: 50%;">
                                    <div class="indicator-section">
                                        <p class="indicator-title">{$icon_chihuahua} PARTICIPACIÓN ESTATAL</p>
                                        <p class="indicator-value" style="font-size: 24px;">{$part_estatal_porc}</p>
                                        <p class="indicator-change">En Turistas Noche</p>
                                    </div>
                                </td>
                                <td style="width: 50%;">
                                    <div class="indicator-section">
                                        <p class="indicator-title">{$icon_hotel} NO. DE HABITACIONES</p>
                                        <p class="indicator-value" style="font-size: 24px;">{$format_box_value($totHabit, false, 0)}</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>

                    
                </tr>
            </table>
            <div class="monthly-occupancy-table">
                {$table_html}
            </div>

            <div style="clear: both;"></div>
        </div>
    </body>
    </html>