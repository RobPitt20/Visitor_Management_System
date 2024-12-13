<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To-Do List with Calendar</title>
  <style>
    /* Your CSS styles here */
   body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(30deg, green, yellow, gold);
      background-size: 600% 600%;
      animation: gradient 3s ease infinite;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
    }


    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }

    .container {
      display: flex;
      flex-direction: column; /* Added */
      max-width: 900px; /* Changed */
      width: 100%; /* Added */
      margin: 20px; /* Added */
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    .w3-third {
      padding: 40px;
      border-bottom: 1px solid #ccc; /* Changed */
    }

    .todo-list {
      padding: 20px;
    }

    .header {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .notes textarea {
      width: 100%; /* Changed */
    }

    .selected-date,
    .upcoming-events {
      margin-top: 20px;
      text-align: center;
      font-weight: bold;
    }

    .selected-date span,
    .upcoming-events span {
      font-size: 18px;
      color: #333;
    }

    .todo-list ul {
      list-style-type: none;
      padding: 0;
    }

    .todo-list li {
      margin-bottom: 10px;
      position: relative;
    }

    .todo-list .delete-task {
      position: absolute;
      right: 0;
      top: 0;
      cursor: pointer;
      color: red;
      font-weight: bold;
    }

    .todo-list button,
    .clear-all-button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      margin-right: 10px;
    }

    .todo-list button:hover,
    .clear-all-button:hover {
      background-color: #0056b3;
    }

    .clear-all-button {
      background-color: red;
      margin-bottom: 10px;
    }

    .image-container {
      margin-top: 20px; /* Added */
    }

    .image-container img {
      max-width: 100%;
      height: auto;
    }
  </style>
  <!-- FullCalendar CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <div class="w3-third">
      <div class="w3-card w3-container">
        <h2>Calendar</h2>
        <button onclick="showSelectedDate()">Show Selected Date</button>
        <input type="date" id="calendar" style="margin-bottom: 5px;">
        <input type="text" id="eventTitle" placeholder="Event Title">
        <div class="notes">
          <textarea id="reminder" placeholder="Write your mini notes here..."></textarea>
        </div>
        <button onclick="addEvent()">Add Event</button>
        <div class="selected-date" id="selectedDate"></div>
        <div class="upcoming-events" id="upcomingEvents"></div>
      </div>
    </div>
    <div class="todo-list">
      <div class="header">To-Do List</div>
      <!-- Date and Time Display -->
      <div class="header">
        <h2>Manila, Philippine Time: <span id="clock"></span></h2>
      </div>
      <input type="text" id="taskInput" placeholder="Add a new task">
      <button onclick="addTask()">Add Task</button>
      <button onclick="clearAllTasks()" class="clear-all-button">Clear All</button>
      <ul id="tasks"></ul>
    </div>
  </div>


<!-- FullCalendar JavaScript -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>

  <script>

    // Your JavaScript code here

    // JavaScript code goes here

    // Define an array to store tasks

    let tasks = [];
 
    // Function to add a task

    function addTask() {

      const taskInput = document.getElementById("taskInput");

      const taskText = taskInput.value.trim();
 
      if (taskText !== "") {

        // Add task to the array

        tasks.push(taskText);
 
        // Update the task list

        updateTaskList();
 
        // Clear the input field

        taskInput.value = "";

      }

    }
 
    // Function to update the task list

    function updateTaskList() {

      const tasksList = document.getElementById("tasks");

      tasksList.innerHTML = "";
 
      tasks.forEach((task, index) => {

        const li = document.createElement("li");

        li.textContent = task;

        // Create a button for removing the task

        const deleteButton = document.createElement("button");

        deleteButton.textContent = "x";

        deleteButton.classList.add("delete-task");

        deleteButton.onclick = function() {

          deleteTask(index);

        };
 
        // Append the delete button to the task item

        li.appendChild(deleteButton);
 
        tasksList.appendChild(li);

      });

    }
 
    // Function to delete a task

    function deleteTask(index) {

      tasks.splice(index, 1);

      updateTaskList();

    }
 
    // Function to clear all tasks

    function clearAllTasks() {

      tasks = [];

      updateTaskList();

    }
 
    // Function to add an event

    function addEvent() {

      const eventTitle = document.getElementById("eventTitle").value.trim();

      const reminder = document.getElementById("reminder").value.trim();

      const selectedDate = document.getElementById("calendar").value;
 
      if (eventTitle !== "" && selectedDate !== "") {

        // You can add code here to handle adding the event to your calendar or database

        // For now, let's just log the event details

        console.log("Event Title:", eventTitle);

        console.log("Date:", selectedDate);

        console.log("Reminder:", reminder);
 
        // Clear input fields

        document.getElementById("eventTitle").value = "";

        document.getElementById("reminder").value = "";

        document.getElementById("calendar").value = "";
 
        // Show a confirmation message (optional)

        alert("Event added successfully!");

      } else {

        alert("Please fill in all the fields.");

      }

    }
 
    // Initialize clock

    updateClock();

    setInterval(updateClock, 1000);
 
    // Function to update clock

    function updateClock() {

      const now = new Date();

      const clockElement = document.getElementById("clock");

      clockElement.textContent = now.toLocaleTimeString("en-US", {

        hour: "numeric",

        minute: "2-digit",

        second: "2-digit",

      });

    }

  </script>
 
  <!-- Add image after the container -->

  <div class="image-container">

    <img src="sched.png" alt="Schedule">

  </div>

</body>

</html>
