<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador de Infografías</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <link rel="stylesheet" type="text/css" href="_includes/_css/hd.css">
  <script src="script.js"></script>
  <style>
    body {
        background-image: url(_images/chih.jpg) !important;
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
        color: rgb(0, 45, 114, .8);
    }
    .contImagePlant{
        width: auto;
        display: flex;
        justify-content: space-between;
        padding: 20px 16px;
        background-color: rgb(255, 255, 255, .5);
        border-radius: 5px;
        border: 1px solid rgb(0, 45, 114, .3);
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
        color: rgb(0, 45, 114, .8);
        margin-right: 8px;
    }
    input[type="date"]::-webkit-calendar-picker-indicator {
       color: rgb(0, 45, 114, .7);
    }
    .timeInfo input{
        border-style: none;
        background: rgb(255, 255, 255, .5);
        color: rgb(0, 45, 114, .7);
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
        border: 1px solid rgb(0, 45, 114, .4);
        color: rgb(0, 45, 114, .8);
        border-radius: 5px;
    }
    button.genInfografia:hover {
        background: rgb(0, 45, 114, .4);
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
                <input type="date" name="iniInfo" id="">
                <h3 style="margin-left:8px;">Hasta</h3>
                <input type="date" name="finInfo" id="">
            </div>

            <div class="contButInfo">
                <button onclick="generarInfografia()" class="genInfografia">Generar</button>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    function generarInfografia() {
        // Cargar la imagen de la plantilla
        var infografiaInp = document.querySelector('input[name="imageInfo"]:checked');
        let infografia;
        if (infografiaInp) {
            infografia = infografiaInp.nextElementSibling;
            console.log(infografia); // Aquí puedes hacer lo que necesites con la URL de la imagen seleccionada
        }
        

        document.querySelectorAll('input[name="imageInfo"]').forEach(input => {
            input.addEventListener('change', function() {
                console.log('antes del if');
                if (this.checked) {
                    console.log('el if');
                    infografia = this.parentElement.querySelector('img');
                    console.log(infografia); // Aquí puedes hacer lo que necesites con la URL de la imagen seleccionada
                }
            });
        });

        let textInfografia = infografiaInp.value;
        console.log(textInfografia);
       if (textInfografia == 'infografia') {
            console.log('es la primera');
       }
       //return;
        // var infografia = document.getElementById('infografia');
        // Crear un elemento canvas del mismo tamaño que la imagen
        var canvas = document.createElement('canvas');
        canvas.width = infografia.width;
        canvas.height = infografia.height;
        var ctx = canvas.getContext('2d');
        // Dibujar la imagen en el canvas
        console.log(infografia);
        ctx.drawImage(infografia, 0, 0);
        // Reemplazar los marcadores de posición con los datos estadísticos
        ctx.font = '30px Arial'; // Establecer el tamaño y la fuente del texto
        ctx.fillStyle = 'red'; // Establecer el color del texto
        ctx.fillText('Dato estadístico 1', 121, 421); // Posición del primer marcador de posición
        ctx.fillText('Dato estadístico 2', 651, 434); // Posición del segundo marcador de posición
        // Convertir el canvas en una imagen
        var imagenInfografia = canvas.toDataURL('image/jpeg');
        // Crear un enlace para descargar la imagen
        var enlaceDescarga = document.createElement('a');
        enlaceDescarga.href = imagenInfografia;
        enlaceDescarga.download = 'infografia.png';
        enlaceDescarga.click();
    }


</script>