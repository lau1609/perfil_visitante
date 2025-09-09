<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .barra-pasos {
  display: flex;
  gap: 10px;
  margin-bottom: 20px;
}

.bolita {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background-color: #007BFF;
  color: white;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.bolita.completada {
  background-color: #28a745;
}

.bolita.oculta {
  display: none;
}

    </style>
</head>
<body>
    <div id="preguntas-container">
  <div class="pregunta" data-preg="1">
    <label>¿Cuál es tu edad?</label>
    <input type="number" required>
  </div>

  <div class="pregunta" data-preg="2" style="display: none;">
    <label>¿Viajaste solo?</label>
    <select required>
      <option value="">Selecciona una opción</option>
      <option value="sí">Sí</option>
      <option value="no">No</option>
    </select>
  </div>

  <!-- Más preguntas -->
</div>

<!-- Línea de progreso -->
<div id="progreso" class="barra-pasos"></div>

<!-- Botón de enviar solo visible al final -->
<button type="submit" id="btnEnviar" style="display: none;">Enviar</button>

</body>
</html>

<script>
    let preguntas = $('.pregunta').filter(':visible');
let total = preguntas.length;
let actual = 0;

function renderProgreso() {
  $('#progreso').empty();
  preguntas = $('.pregunta').filter(':visible'); // Actualiza visible
  total = preguntas.length;

  preguntas.each(function(i) {
    const bolita = $('<div>')
      .addClass('bolita')
      .text(i + 1)
      .attr('data-index', i);
    
    if (i < actual) bolita.addClass('completada');

    $('#progreso').append(bolita);
  });

  // Mostrar botón si estamos en la última
  $('#btnEnviar').toggle(actual === total - 1);
}

function mostrarPregunta(index) {
  let actualPregunta = preguntas.eq(actual);
  let siguientePregunta = preguntas.eq(index);

  actualPregunta.slideUp(300, function() {
    siguientePregunta.slideDown(300);
    actual = index;
    renderProgreso();
  });
}

function siguientePreguntaSiResponde() {
  let actualPregunta = preguntas.eq(actual);
  let input = actualPregunta.find('input, select, textarea')[0];
  if (input.checkValidity()) {
    if (actual + 1 < total) {
      mostrarPregunta(actual + 1);
    } else {
      $('#btnEnviar').show();
    }
  }
}

// Detectar cambios en inputs y avanzar
$(document).on('change', '.pregunta:visible input, .pregunta:visible select', function() {
  siguientePreguntaSiResponde();
});

// Click en bolitas
$(document).on('click', '.bolita.completada', function() {
  let index = parseInt($(this).attr('data-index'));
  mostrarPregunta(index);
});

// Iniciar con primera pregunta visible
$('.pregunta').hide().eq(0).show();
renderProgreso();

</script>