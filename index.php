<?php

include "calendario.php";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calendario</title>
  <meta name="description" content="My Own Calendar Project">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>
<body>

  <header>
    <h1>🗓️ Calendario<br> Meu projeto de calendario</h1>
  </header>

  <!-- mensagem de sugesso\erro -->
  <?php if ($successMsg): ?>
    <div class="alert success"><?= $successMsg ?></div>
  <?php elseif ($errorMsg): ?>
    <div class="alert error"><?= $errorMsg ?></div>
  <?php endif; ?>

  <!-- relogio -->
  <div class="clock-container">
    <div id="clock"></div>
  </div>

  <!-- caledario -->
  <div class="calendar">
    <div class="nav-btn-container">
      <button onclick="changeMonth(-1)" class="nav-btn">⏮️</button>
      <h2 id="monthYear" style="margin: 0"></h2>
      <button onclick="changeMonth(1)" class="nav-btn">⏭️</button>
    </div>

    <div class="calendar-grid" id="calendar"></div>
  </div>

  <!-- 📌 Modal -->
  <div class="modal" id="eventModal">
    <div class="modal-content">

      <!-- Dropdown Selector -->
      <div id="eventSelectorWrapper" style="display: none;">
        <label for="eventSelector"><strong>Select Event:</strong></label>
        <select id="eventSelector" onchange="handleEventSelection(this.value)">
          <option disabled selected>Escolher envento...</option>
        </select>
      </div>

      <!-- 📝 Form -->
      <form method="POST" id="eventForm">
        <input type="hidden" name="action" id="formAction" value="add">
        <input type="hidden" name="event_id" id="eventId">

        <label for="courseName">Título do Curso:</label>
        <input type="text" name="course_name" id="courseName" required>

        <label for="instructorName">Nome do Instrutor:</label>
        <input type="text" name="instructor_name" id="instructorName" required>

        <label for="startDate">Data de Início:</label>
        <input type="date" name="start_date" id="startDate" required>

        <label for="endDate">Data de término:</label>
        <input type="date" name="end_date" id="endDate" required>

        <label for="startTime">Horário de Início:</label>
        <input type="time" name="start_time" id="startTime" required>

        <label for="endTime">Hora de término:</label>
        <input type="time" name="end_time" id="endTime" required>

        <button type="submit">💾 Salvar</button>
      </form>

      <!-- deletar -->
      <form method="POST" onsubmit="return confirm('Voce tem certeza que quer deletar isso?')">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="event_id" id="deleteEventId">
        <button type="submit" class="submit-btn">🗑️ Deletar</button>
      </form>

      <!-- cancelar -->
      <button type="button" class="submit-btn" onclick="closeModal()" style="background:#ccc">❌ Cancelar</button>
    </div>
  </div>

  <!-- 🔽 Events JSON from PHP -->


  <!-- logica do caledario -->

  <script>
    const events = <?= json_encode($eventsFromDB, JSON_UNESCAPED_UNICODE); ?>;
  </script>

  <script src="calendario.js"></script>

</body>

</html>