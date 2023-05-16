<!DOCTYPE html>
<html>
<head>
  <title>Reservation Form</title>
  <style>
    .time-slot {
      display: inline-block;
      padding: 5px 10px;
      border: 1px solid #000;
      margin: 5px;
      cursor: pointer;
    }
    
    .time-slot.unselectable {
      background-color: #f0f0f0;
      pointer-events: none;
    }

    .time-slot.selected {
      background-color: #30c5ff;
    }
  </style>
</head>
<body>

    <form action="reservation_add.php" method="POST">
        <label for="email">Email:</label>

        <?php
        session_start();

        // Check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // User is logged in, display appropriate content
            echo '<input type="email" name="email" id="email" value="' . $_SESSION['email'] . '" required>';
        } else {
            // User is not logged in, display appropriate content
            echo '<input type="email" name="email" id="email" required>';
        }


        ?>

        <label for="num_people">Nombre de couverts:</label>
        <select name="num_people" id="num_people" onchange="getTimeSlots()" required>
        <?php
            include 'nombre_couverts_retrieval.php';
            $maxPeople = 6; // Maximum number of people
            for ($i = 1; $i <= $maxPeople; $i++) {
                if ($i == $nombre){
                    echo "<option value=\"$i\" selected>$i personne" . ($i > 1 ? "s" : "") . "</option>";
                }else{
                    echo "<option value=\"$i\">$i personne" . ($i > 1 ? "s" : "") . "</option>";
                }
            }
        ?>  
        </select>

        <label for="reservation_date">Choisir un jour:</label>
        <input type="date" name="reservation_date" id="reservation_date" onchange="getTimeSlots()" min="<?php echo date('Y-m-d'); ?>" required>

        <div>
            <label>Horaire disponibles</label>
            <div id="time_slots">
                <!-- Time slots will be dynamically populated here -->
            </div>
        </div>

        <label for="comments">Commentaires:</label><br>
        <?php
            include 'nombre_couverts_retrieval.php';
            echo '<textarea name="comments" id="comments" rows="4">' . $allergie . '</textarea><br>';
        ?>

        <input type="hidden" name="selected_time" id="selected_time" value="">

        <button type="submit" name="submit" id="reservation_button" disabled>Réserver</button>
    </form>

</body>

<script>
    function getDate() {
        // Get the selected date from the input field
        var selectedDate = document.getElementById("reservation_date").value;

        // Create a new Date object with the selected date
        var date = new Date(selectedDate);

        var year = date.getFullYear(); // Get the 4-digit year
        var month = ('0' + (date.getMonth() + 1)).slice(-2); // Get the 2-digit month (zero-padded)
        var day = ('0' + date.getDate()).slice(-2); // Get the 2-digit day of the month (zero-padded)

        var formattedDate = year + '-' + month + '-' + day; // Format the date as 'YYYY-MM-DD'

        return formattedDate;
    }

    function getDayOfWeek() {
        // Get the selected date from the input field
        var selectedDate = document.getElementById("reservation_date").value;

        // Create a new Date object with the selected date
        var date = new Date(selectedDate);

        // Get the day of the week (0-6 where 0 is Sunday, 1 is Monday, etc.)
        var dayOfWeek = date.getDay();

        // Array of day names
        var days = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

        // Get the name of the day based on the dayOfWeek value
        var dayName = days[dayOfWeek];

        // Display the day of the week
        return dayName;
    }

    function getNombre() {
        return document.getElementById("num_people").value;
    }

    function getTimeSlots() {
        // Retrieve opening hours from the database or API
        // Get the day of the week
        var date = getDate();
        var dayOfWeek = getDayOfWeek();
        var nombre = getNombre();

        // Send an AJAX request to fetch the opening hours for the selected day
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "fetch_opening_hours.php?dayOfWeek=" + dayOfWeek + "&date=" + date + "&nombre=" + nombre, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Parse the response as JSON
            var openingHoursAvailability = JSON.parse(xhr.responseText);

            // Generate time slots for every 15 minutes
            var timeSlots = "";
            for (var i = 0; i < openingHoursAvailability[0].openingHours.length; i++) {
                if (openingHoursAvailability[0].availability[i]) {
                    timeSlots += '<div class="time-slot"  onclick="selectTimeSlot(this)">' + openingHoursAvailability[0].openingHours[i] + '</div>';
                } else {
                    timeSlots += '<div class="time-slot unselectable"">' + openingHoursAvailability[0].openingHours[i] + '</div>';
                }
            }

            // Display the time slots
            var timeSlotsContainer = document.getElementById("time_slots");
            timeSlotsContainer.innerHTML = timeSlots;
            }
        };
        xhr.send();
    }

    var selectedTimeSlot = null;
    function selectTimeSlot(timeSlot) {
        var reservationButton = document.getElementById("reservation_button");

        if (timeSlot.classList.contains("selected")) {
            timeSlot.classList.remove("selected");
            selectedTimeSlot = null;
            reservationButton.disabled = true;
        } else {
            if (selectedTimeSlot) {
                selectedTimeSlot.classList.remove("selected");
            }

            timeSlot.classList.add("selected");
            selectedTimeSlot = timeSlot;
            document.getElementById("selected_time").value = selectedTimeSlot.textContent.trim();
            reservationButton.disabled = false;
        }
    }
    
</script>
</html>