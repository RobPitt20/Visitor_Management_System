<?php
 
$db = mysqli_connect('localhost', 'root', '', 'visitor_management');

// Add New Event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Event_name'])) {
    $Appointment_date = mysqli_real_escape_string($db, $_POST['appointment_date']);
    $Appointment_time = mysqli_real_escape_string($db, $_POST['Appointment_time']);
    $event_date = mysqli_real_escape_string($db, $_POST['event_date']);
    $event_name = mysqli_real_escape_string($db, $_POST['event_name']);
    $created_at = mysqli_real_escape_string($db, $_POST['created_at']);
 
    $sql = "INSERT INTO calendar (event_name, created_at, appointment_date, appointment_time) VALUES ('$event_name', '$created_at', '$Appointment_date','$Appointment_time')";
    if ($db->query($sql) === TRUE) {
        echo "<script>alert('Event added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $db->error . "');</script>";
    }
}
 
// Fetch Events
if (isset($_GET['loadEvents'])) {
    $sql = "SELECT id, event_name, event_purpose, event_date FROM events";
    $result = $db->query($sql);
 
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
 
    echo json_encode($events);
    exit();
}
 
// Delete Event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_event'])) {
    $event_id = mysqli_real_escape_string($db, $_POST['event_id']);
 
    $sql = "DELETE FROM events WHERE id = '$event_id'";
    if ($db->query($sql) === TRUE) {
        echo "<script>alert('Event deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $db->error . "');</script>";
    }
}
?>
 
 
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Management System - Schedules</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');


.navbar-custom {
    background-color: #39204c; /* Custom navbar color */
}

.navbar-nav .nav-item {
    margin-right: 2rem; /* Adjust this value as needed */
}

body {
    background-color: #f7f5e6;
    font-family: 'Poppins', sans-serif;
    font-size: 1.25rem;
    margin: 0px;
}
 
        .calendar {
            text-align: center;
            margin: 20px auto;
            max-width: 600px auto;
            
        }
 
        .calendar-controls button {
            background-color: #6a5acd;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
 
        .calendar-controls button:hover {
            background-color: #483d8b;
        }
 
        .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr); /* 7 equal columns for each day */
        gap: 10px;
        margin: 20px auto;
        padding: 10px;
        width: 100%;
}

.day-header {
    font-weight: bold;
    text-align: center;
    background: linear-gradient(to right, #6a5acd, #483d8b); /* Gradient background */
    color: white;
    padding: 5px; /* Adjusted padding to make the background smaller */
    border: 1px solid #483d8b;
    border-radius: 5px;
    width: 100%; /* Full width for the header */
}

 .day {
    background-color: #e9e8fc; /* Light purple background for dates */
    border: 1px solid #ccc; /* Add a border around each day */
    text-align: center; /* Center-align text */
    padding: 10px 0; /* Add padding to make it look uniform */
    border-radius: 5px; /* Rounded corners for a clean look */
    font-size: 16px; /* Font size for the date */
    cursor: pointer; /* Add pointer cursor for interactivity */
    transition: background-color 0.3s; /* Smooth hover effect */
}

.day:hover {
    background-color: #d1c9fa; /* Darker purple for hover effect */
    border-color: #a29de5; /* Adjust border color on hover */
}

.highlighted {
    background-color: #ffd700; /* Highlighted background for special dates */
    border-color: #ffae42; /* Border for highlighted dates */
    font-weight: bold; /* Emphasize highlighted dates */
}
 
        h2 {
            margin-bottom: 0;
        }
 
        .header {
            background-color: #3b0e5c;
            color: white;
            padding: 20px;
        }
 
        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
 
        .header h1 {
            margin: 0;
            font-size: 2rem;
            white-space: nowrap;
        }
 
        nav {
            display: flex;
            gap: 20px;
        }
 
        nav a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }
 
        nav a:hover {
            text-decoration: underline;
        }
 
        .container {
            display: flex;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
 
        .calendar {
            flex: 1;
            margin: 20px;
            padding: 20px;
            border: 2px solid #3b0e5c;
            border-radius: 5px;
            background-color: #FFFCF1;
        }
 
        .event-list {
            flex: 2;
            margin: 20px;
            padding: 20px;
            border: 2px solid #3b0e5c;
            border-radius: 5px;
            background-color: #FFFCF1;
        }
 
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
 
        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            width: 500px;
            max-width: 90%;
            text-align: center;
        }
 
        .close-btn {
            cursor: pointer;
            font-size: 1.5rem;
            color: #3b0e5c;
        }
 
        .close-btn:hover {
            color: #6a9ed3;
        }
        .btn, .btn-confirm, .btn-cancel, .close-modal-btn {
    background-color: #007BFF; /* Blue color */
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
}

.btn:hover, .btn-confirm:hover, .btn-cancel:hover, .close-modal-btn:hover {
    background-color: #0056b3; /* Darker blue for hover effect */
}
    </style>
</head>
 
<body>
    <!-- Header Section -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom ">
    <a class="navbar-brand ml-4"  href="#">Visitor Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav" style="margin-right: 5rem;"> <!-- Adjust margin-right to position closer to center -->
            <li class="nav-item " style="margin-right: 2rem;"> <!-- Adjust the value as needed -->
                <a class="nav-link" href="http://localhost/htdocfinals2/QrScanner.php">Qr Scanner<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" style="margin-right: 2rem;"> <!-- Adjust the value as needed -->
                <a class="nav-link" href="http://localhost/htdocfinals2/add-guest.php">Add guest</a>
            </li>
            <li class="nav-item active" style="margin-right: 2rem;"> <!-- Adjust the value as needed -->
                <a class="nav-link" href="http://localhost/htdocfinals2/SCHEDULEPAGE/schedulep.php">Schedules</a>
            </li>
            </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="confirmLogout()">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
 
    <!-- Main Content -->
    <div class="container">
        <!-- Calendar Section -->
        <div class="calendar">
            <h3>Appointments for Selected Date</h3>
            <div id="appointment-details">
                <ul id="appointment-list"></ul>
            </div>
            <h2>November 2024</h2>
            <div class="calendar-controls">
                <button id="prevMonth">Previous Month</button>
                <button id="nextMonth">Next Month</button>
            </div>
            <div class="calendar-grid">
                <div class="day">1</div>
                <div class="day">2</div>
                <div class="day">3</div>
                <div class="day">4</div>
                <div class="day">5</div>
                <div class="day">6</div>
                <div class="day">7</div>
                <div class="day">8</div>
                <div class="day">9</div>
                <div class="day">10</div>
                <div class="day">11</div>
                <div class="day">12</div>
                <div class="day">13</div>
                <div class="day">14</div>
                <div class="day">15</div>
                <div class="day">16</div>
                <div class="day">17</div>
                <div class="day">18</div>
                <div class="day">19</div>
                <div class="day">20</div>
                <div class="day">21</div>
                <div class="day">22</div>
                <div class="day">23</div>
                <div class="day">24</div>
                <div class="day">25</div>
                <div class="day">26</div>
                <div class="day">27</div>
                <div class="day">28</div>
                <div class="day">29</div>
                <div class="day">30</div>
            </div>
        </div>
        <!-- Event List Section -->
        <div class="event-list">
    <h3>List of Events:</h3>
    <button class="btn" onclick="openEventModal()">Add Event</button>
    <div id="eventListContainer">
        <!-- Table for displaying events -->
        <table id="eventTable" border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Purpose</th>
                    <th>Event Date</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Rows will be added dynamically -->
            </tbody>
        </table>
    </div>
</div>


    </div>
 
   <!-- Modal for Event Details -->
<div id="eventModal" class="modal">
    <div class="modal-content">
        <!-- <span class="close-btn" onclick="closeEventModal()">&times;</span> -->
        <h2>Add Event Details</h2>
        
        <div class="form-group">
            <label for="eventName">Event Name</label>
            <input type="text" id="eventName" placeholder="Enter event name">
        </div>
        <div class="form-group">
            <label for="eventPurpose">Event Purpose</label>
            <input type="text" id="eventPurpose" placeholder="Enter event purpose">
        </div>
        <div class="form-group">
            <label for="eventDate">Event Date</label>
            <input type="date" id="eventDate">
        </div>
        <button class="btn" onclick="submitEventDetails()">Submit</button>
        <!-- Close Button -->
        <button class="btn close-modal-btn" onclick="closeEventModal()">Close</button>
    </div>
</div>

 
    <!-- Modal for Appointment Booking -->
   <div id="appointmentFormContainer" class="modal">
    <div class="modal-content">
        <!-- <span class="close-btn" onclick="closeAppointmentModal()">&times;</span> -->
        <h2>Book Appointment</h2>
        <form id="appointmentForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" maxlength="11" required>
            </div>
            <div class="form-group">
                <label for="appointment_time">Appointment Time:</label>
                <input type="time" id="appointment_time" required>
            </div>
            <button type="submit" class="btn">Book Appointment</button>
        </form>
    </div>
</div>
<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal">
  <div class="modal-content">
    <!-- <span class="close-btn" onclick="closeDeleteModal()">&times;</span> -->
    <h2>Are you sure you want to delete this data?</h2>
    <div>
      <button id="confirmDeleteBtn" class="btn-confirm" onclick="confirmDelete()">Yes</button>
      <button class="btn-cancel" onclick="closeDeleteModal()">No</button>
    </div>
  </div>
</div>

<!-- Example Delete Button -->
<!-- <button onclick="openModal(123)">Delete Event</button> -->

 
    <!-- JavaScript -->
    <script>
 
let events = [];
 
document.addEventListener('DOMContentLoaded', function () {
    refresh();
    // fetchEventList().then(renderCalendar).catch(error => {
    //     console.error('Error rendering calendar:', error);
    // });
});

function refresh(){
    fetchEventList().then(renderCalendar).catch(error => {
        console.error('Error rendering calendar:', error);
    });
}


//       function submitEventDetails() {
//     const eventName = document.getElementById("eventName").value;
//     const eventPurpose = document.getElementById("eventPurpose").value;
//     const eventDate = document.getElementById("eventDate").value;
 
//     if (eventName && eventPurpose && eventDate) {
//         alert(`Event Added:\nName: ${eventName}\nPurpose: ${eventPurpose}\nDate: ${eventDate}`);
//             addEventToList(eventName, eventPurpose, eventDate);
           
//             const xhr = new XMLHttpRequest();
//             xhr.open("POST", "save_event.php", true);
//             xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//             xhr.onreadystatechange = function () {
//                 if (xhr.readyState === 4 && xhr.status === 200) {
//                     alert(xhr.responseText);
//                     closeEventModal();
//                 }
//             };
//             xhr.send(`eventName=${eventName}&eventPurpose=${eventPurpose}&eventDate=${eventDate}`);
//         } else {
//             alert("Please fill all fields.");
//         }
// }
 
function submitEventDetails() {
    const eventName = document.getElementById('eventName').value;
    const eventPurpose = document.getElementById('eventPurpose').value;
    const eventDate = document.getElementById('eventDate').value;
    const eventId = document.getElementById('eventModal').dataset.eventId;

    const formData = new URLSearchParams();
    formData.append('eventName', eventName);
    formData.append('eventPurpose', eventPurpose);
    formData.append('eventDate', eventDate);

    if (eventId) {
        // Update existing event
        fetch(`http://localhost/htdocfinals2/SCHEDULEPAGE/save_event.php?id=${eventId}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: formData.toString()
        })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Handle response
                refresh();
                closeEventModal(); // Close the modal
            })
            .catch(error => console.error('Error updating event:', error));
    } else {
        // Add new event
        fetch('http://localhost/htdocfinals2/SCHEDULEPAGE/save_event.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: formData.toString()
        })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Handle response
                refresh();
                closeEventModal(); // Close the modal
            })
            .catch(error => console.error('Error adding event:', error));
    }
}
 
 
function addEventToList(name, purpose, date) {
    const eventList = document.querySelector(".event-list");
    const newEvent = document.createElement("div");
    newEvent.className = "event-item";
    newEvent.innerHTML = `
        <span>${name} - ${date}</span>
        <div>
            <button class="btn-icon" title="Edit" onclick="openEditModal('${name}', '${purpose}', '${date}')">&#9998;</button>
            <button class="btn-icon" title="Delete" onclick="deleteEvent(this)">&#128465;</button>
        </div>
    `;
    eventList.appendChild(newEvent);
}
 
 
function openEventModal() {
    const modal = document.getElementById("eventModal");
    modal.style.display = "flex";
}
 
function closeEventModal() {
    const modal = document.getElementById("eventModal");
    modal.style.display = "none";
}

 
function openDeleteModal() {
    const modal = document.getElementById("deleteModal");
    modal.style.display = "flex";
}

function closeDeleteModal() {
    const modal = document.getElementById("deleteModal");
    modal.style.display = "none";
}
 
 
 
function deleteEvent(button) {
    const eventItem = button.closest(".event-item");
    eventItem.remove();
}

// function fetchEventList() {
//     fetch('http://localhost/Gabo/save_event.php') // Update this with the correct path
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Network response was not ok');
//             }
//             return response.json();
//         })
//         .then(data => {
//             events = data;
//             renderEventTable();
//         })
//         .catch(error => console.error('Error fetching events:', error));
// }


async function fetchEventList() {
    try {
        const response = await fetch('http://localhost/htdocfinals2/SCHEDULEPAGE/save_event.php?loadEvents=true'); // Add loadEvents query
        events = await response.json(); // Store the fetched events in the variable
        renderEventTable(); // Call renderEventTable after fetching events
    } catch (error) {
        console.error('Error fetching events:', error);
        events = []; // Fallback to empty array on error
    }
}

function renderEventTable() {
    const tableBody = document.querySelector('#eventTable tbody');
    tableBody.innerHTML = ''; // Clear existing rows

    events.forEach(event => {
        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${event.event_name}</td>
            <td>${event.purpose}</td>
            <td>${event.appointment_date}</td>
            <td>${event.created_at}</td>
            <td>
                <button class="btn" onclick="updateEvent(${event.id})">Edit</button>
                <button class="btn" onclick="showDeleteModal(${event.id})">Delete</button>
            </td>
        `;

        tableBody.appendChild(row);
    });
}

function confirmDelete(){
    const eventId = document.getElementById('deleteModal').dataset.eventId;
    
    // Determine if this is a new event or an update
    if (eventId) {
        // Update existing event
        fetch(`http://localhost/htdocfinals2/SCHEDULEPAGE/save_event.php?id=${eventId}`, {
            method: 'DELETE',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `eventName=${eventName}&eventPurpose=${eventPurpose}&eventDate=${eventDate}`
        })
            .then(response => response.text())
            .then(data => {
                console.log(data); // Handle response
                refresh();// Refresh the table
                closeDeleteModal(); // Close the modal
                
            })
            .catch(error => console.error('Error updating event:', error));
    }

}


 
 
 
let currentMonth = 10; // Default to November (0 = January, 11 = December)
let currentYear = 2024;
 
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
 
function renderCalendar() {
    const calendarGrid = document.querySelector(".calendar-grid");
    const monthTitle = document.querySelector(".calendar h2");
    const firstDayOfMonth = new Date(currentYear, currentMonth, 1);
    const lastDateOfMonth = new Date(currentYear, currentMonth + 1, 0);
    const daysInMonth = lastDateOfMonth.getDate();
    const firstDayOfWeek = firstDayOfMonth.getDay(); // Get day of the week (0 = Sunday, 6 = Saturday)

    const dayNames = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

    // Set the month title
    monthTitle.textContent = `${months[currentMonth]} ${currentYear}`;

    // Clear previous grid
    calendarGrid.innerHTML = "";

    // Add day headers (Monday to Sunday)
    dayNames.forEach(day => {
        const dayHeader = document.createElement("div");
        dayHeader.className = "day-header";
        dayHeader.textContent = day;
        calendarGrid.appendChild(dayHeader);
    });

    // Adjust the first day of the month for Monday start (0 = Sunday, shift to start at Monday)
    const adjustedFirstDayOfWeek = (firstDayOfWeek === 0 ? 6 : firstDayOfWeek - 1);

    // Fill the grid with empty days for the first week
    for (let i = 0; i < adjustedFirstDayOfWeek; i++) {
        const emptyDay = document.createElement("div");
        calendarGrid.appendChild(emptyDay);
    }

    // Fill the grid with days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dayElement = document.createElement("div");
        dayElement.className = "day";
        dayElement.textContent = day;

        // Format the current date for comparison (YYYY-MM-DD)
        const formattedDate = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;

        // Check if the formattedDate exists in the events list
        if (events.some(event => event.appointment_date === formattedDate)) {
            dayElement.classList.add("highlighted");
        }

        calendarGrid.appendChild(dayElement);
    }
}
 
function openAppointmentModal(day) {
    const appointmentForm = document.getElementById("appointmentFormContainer");
    const appointmentDetails = document.getElementById("appointment-details");
 
    // Open the appointment modal
    appointmentForm.style.display = "flex";
 
    // Update the modal title to show the selected day
    const modalTitle = document.querySelector("#appointmentFormContainer h2");
    modalTitle.textContent = `Book Appointment for ${months[currentMonth]} ${day}, ${currentYear}`;
 
    // Clear any previous appointments for the day
    appointmentDetails.innerHTML = `<ul id="appointment-list"></ul>`;
    // Optionally, you can populate existing appointments for the day here.
}
 
function closeAppointmentModal() {
    const appointmentForm = document.getElementById("appointmentFormContainer");
    appointmentForm.style.display = "none";
}
function updateEvent(eventId) {
    // Find the event by ID
    console.log("dfsdfds");
   console.log(event);
   console.log(events)
   const eventOne =events.find(x => x.id = eventId)
   console.log(eventOne)
  

       openEventModal();

        document.getElementById('eventName').value = eventOne.event_name;
        document.getElementById('eventPurpose').value = eventOne.purpose;
        document.getElementById('eventDate').value = eventOne.appointment_date;

        document.getElementById('eventModal').dataset.eventId = eventOne.id;


}
function confirmLogout() {
        if (confirm("Are you sure you want to logout?")) {
            window.location.href = "http://localhost/htdocfinals2/htdocfinals-sandra/login.php";
        }
    }

function showDeleteModal(eventId) {

    openDeleteModal();
        document.getElementById('deleteModal').dataset.eventId = eventId;



}
 
// Handle navigation buttons (Previous and Next month)
document.getElementById("prevMonth").addEventListener("click", () => {
    if (currentMonth === 0) {
        currentMonth = 11;
        currentYear--;
    } else {
        currentMonth--;
    }
    renderCalendar();
});
 
document.getElementById("nextMonth").addEventListener("click", () => {
    if (currentMonth === 11) {
        currentMonth = 0;
        currentYear++;
    } else {
        currentMonth++;
    }
    renderCalendar();
});
 
// Initialize the calendar on page load
renderCalendar();
 
 

 
 
document.getElementById("appointmentForm").addEventListener("submit", function (event) {
    event.preventDefault();
 
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const appointmentTime = document.getElementById("appointment_time").value;
 
    if (name && email && phone && appointmentTime) {
        // Add the appointment to the list for the selected day
        const appointmentDetails = document.getElementById("appointment-details");
        const appointmentList = appointmentDetails.querySelector("ul");
       
        const newAppointment = document.createElement("li");
        newAppointment.textContent = `${name} - ${appointmentTime} (Phone: ${phone})`;
 
        appointmentList.appendChild(newAppointment);
 
        closeAppointmentModal(); // Close the modal after booking
    } else {
        alert("Please fill out all the fields.");
    }
});
 
 
 
 
 
 
    </script>
</body>
</html>
