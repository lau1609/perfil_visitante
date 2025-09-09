<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.5.2/tinycolor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.5.2/tinycolor.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<style>
    body {
      font-family: Arial, sans-serif;
    }
    .encuesta-container {
      display: flex;
      align-items: flex-start;
      gap: 20px;
      margin: 20px;
    }
    .steps {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
    }
    .step {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: #ccc;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      position: relative;
      z-index: 1;
      cursor: pointer;
    }
    .step.active {
      background-color: rgb(45,79,166);
    }
    .finish{
        background-color: rgb(41,155,21,.2);
    }
    .step::before {
      content: '';
      position: absolute;
      width: 2px;
      height: 0;
      background-color: rgb(45,79,166);
      top: 100%;
      left: 50%;
      transform: translateX(-50%);
      transition: height 0.4s ease-in-out;
      z-index: -1;
    }
    .step.active::before {
      height: 40px; /* Altura de conexión */
    }
    .preguntas {
      width: 100%;
    }
    .pregunta {
      display: none;
      background-color: #f5f5f5;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .pregunta-activa {
      display: block;
    }
    button.siguiente {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="encuesta-container">
    <div class="steps">
      <div class="step active" id="step-1" data-step="1">1</div>
      <div class="step" id="step-2" data-step="2">2</div>
      <div class="step" id="step-3" data-step="3">3</div>
    </div>
    <div class="preguntas">
      <div class="pregunta pregunta-activa" id="pregunta-1">
        <p>¿Cuál es tu nombre?</p>
        <input type="text">
        <button class="siguiente">Siguiente</button>
      </div>
      <div class="pregunta" id="pregunta-2">
        <p>¿De dónde vienes?</p>
        <input type="text">
        <button class="siguiente">Siguiente</button>
      </div>
      <div class="pregunta" id="pregunta-3">
        <p>¿Cuál fue tu experiencia?</p>
        <textarea></textarea>
        <button class="siguiente">Finalizar</button>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      function mostrarPregunta(index, valid) {
        $('.pregunta-activa').slideUp(300, function () {
          $(this).removeClass('pregunta-activa');
          $('#pregunta-' + index).slideDown(300).addClass('pregunta-activa');
        });

        $('.step').removeClass('active');
        $('#step-' + index).addClass('active');

        console.log('#step-' + index);
        if (valid == true) {
            console.log('el check');
           //$('#step-' + index).data('step','✔'); 
           let calc = index - 1;
           $('#step-' + calc).html('✔');
           $('#step-' + calc).addClass('finish');
        }
        

      }
let vali;
      $('.siguiente').on('click', function () {
        let actual = $('.pregunta-activa').attr('id').split('-')[1];
        let siguiente = parseInt(actual) + 1;
        if ($('#pregunta-' + siguiente).length) {
            vali = true;
          mostrarPregunta(siguiente, vali);
        }
      });

      $('.step').on('click', function () {
        let index = $(this).data('step');
        vali = false;
        mostrarPregunta(index, vali);
      });
    });
  </script>
</body>