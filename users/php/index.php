<?php
session_start();
if (!isset($_SESSION['sessionid'])) {
    echo "<script>alert('Session not available. Please login');</script>";
    echo "<script> window.location.replace('login.php')</script>";
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/menu.js" defer></script>

    <title>Welcome to MyTutor</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <a href="index.php" class="w3-bar-item w3-button">Dashboard</a>
        <a href="courses.php" class="w3-bar-item w3-button">Courses</a>
        <a href="tutor.php" class="w3-bar-item w3-button">Tutors</a>
        <a href="#" class="w3-bar-item w3-button">Subscription</a>
        <a href="#" class="w3-bar-item w3-button">Profile</a>
    </div>

    <div class="w3-blue">
        <button class="w3-button w3-blue w3-xlarge" onclick="w3_open()">☰</button>
        <div class="w3-container">
            <h3>Dashboard</h3>
            <p>
                

            </p>
        </div>
    </div>

    <div class="w3-bar w3-blue">
        <a href="login.php" class="w3-bar-item w3-button w3-right">Log Out</a>
    </div>
    <footer class="w3-footer w3-center w3-bottom w3-blue">MyTutor</footer>
    
</body>
</html>