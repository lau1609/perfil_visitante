<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio de encuestas</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="_includes/_js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="_includes/_css/genCSV.css">
    <script src="_includes/_js/mainEnc.js"></script>
    <style>
        body{
            font-family: 'Gotham';
            margin:0;
        }

    </style>
</head>
<body>
    <div class="header">
            <div class="contHeader">
                <img class="img1" src="_images/logo-st.png" alt="">
                <img class="img2" src="_images/logoAB.png" alt="">
            </div>
        </div>
    <div class="contMain">
        
        
    </div>
</body>
</html>

<script>
document.addEventListener('submit', function(e) {
    e.preventDefault();
    
    document.getElementById('loader').style.display = 'block';
    document.getElementById('results').innerHTML = '';
    let url = document.querySelector('[name="url"]').value;
    let loc = document.querySelector('[name="loc"]').value;
    let hotel = document.querySelector('[name="hotel"]').value;

    const formData = new FormData(e.target); 
    // formData.append('url', url);
    // formData.append('loc', loc);
    // formData.append('hotel', hotel);

    for (const pair of formData.entries()) {
        console.log(pair[0], pair[1]);
    }

    // return;
    fetch('_includes/_php/procesarCSV.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('loader').style.display = 'none';

        if (data.success) {
            console.log(data);
            let html = `
                <h3>Reporte de Envíos (${data.tipo_dato === 'correo' ? 'Correo Electrónico' : 'Número de Teléfono'}):</h3>
                <style>
                    .status-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                    .status-table th, .status-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                    .status-enviado { background-color: #e6ffe6; color: #008000; font-weight: bold; } /* Verde claro */
                    .status-fallido { background-color: #ffe6e6; color: #cc0000; font-weight: bold; }  /* Rojo claro */
                    .status-cell { text-align: center; }
                </style>
                <table class="status-table">
                    <thead>
                        <tr>
                            <th>${data.tipo_dato === 'correo' ? 'Correo Electrónico' : 'Número de Teléfono'}</th>
                            <th class="status-cell">Estado de Envío</th>
                        </tr>
                    </thead>
                    <tbody>
            `;
            
            data.extracted_data.forEach(item => {
                const isSent = item.estado === 'enviado';
                const statusClass = isSent ? 'status-enviado' : 'status-fallido';
                const statusText = isSent ? 'ENVIADO ✅' : 'FALLIDO ❌';

                html += `
                    <tr>
                        <td>${item.dato}</td>
                        <td class="status-cell ${statusClass}">${statusText}</td>
                    </tr>
                `;
            });

            html += `
                    </tbody>
                </table>
            `;
            
            document.getElementById('results').innerHTML = html;
        } else {
            document.getElementById('results').innerHTML = `<p style="color: red;">❌ Error: ${data.message}</p>`;
        }
    })
    .catch(error => {
        document.getElementById('loader').style.display = 'none';
        document.getElementById('results').innerHTML = `<p style="color: red;">❌ Error de conexión: ${error}</p>`;
    });
});
</script>