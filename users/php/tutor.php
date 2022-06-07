<?php
session_start();
if (!isset($_SESSION['sessionid'])) {
    echo "<script>alert('Session not available. Please login');</script>";
    echo "<script> window.location.replace('login.php')</script>";
}

include_once("dbconnect2.php");
$sqltutors = "SELECT * FROM tbl_tutors";
$stmt = $conn->prepare($sqltutors);
        $stmt->execute();
        $number_of_rows = $stmt->fetchColumn();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();



$results_per_page = 10;
if (isset($_GET['pageno'])) {
    $pageno = (int)$_GET['pageno'];
    $page_first_result = ($pageno - 1) * $results_per_page;
} else {
    $pageno = 1;
    $page_first_result = 0;
}

$stmt = $conn->prepare($sqltutors);
$stmt->execute();
$number_of_result = $stmt->rowCount();
$number_of_page = ceil($number_of_result / $results_per_page);
$sqltutors = $sqltutors . " LIMIT $page_first_result , $results_per_page";
$stmt = $conn->prepare($sqltutors);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

$conn= null;
function uploadImage($filename)
{
    $target_dir = "../../assets/courses/";
    $target_file = $target_dir . $filename . ".png";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js" defer></script>
    <script src="../js/menu.js" defer></script>

    <title>Welcome to Course Lists</title>
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
            <h3>Tutor</h3>
            <p>

            </p>
        </div>
    </div>

    <div class="w3-bar w3-blue">
        <a href="login.php" class="w3-bar-item w3-button w3-right">Log Out</a>
    </div>

    <div class="w3-grid-template">
        <?php
        $i = 0;
        foreach ($rows as $tutor) {
            $i++;
            $ttid = $tutor['tutor_id'];
            $ttemail = $tutor['tutor_email'];
            $ttphone = $tutor['tutor_phone'];
            $ttname = $tutor['tutor_name'];
            $ttps = $tutor['tutor_password'];
            $ttds = $tutor['tutor_description'];
            $ttrd = $tutor['tutor_datereg'];
            echo "<div class='w3-card-4 w3-round' style='margin:4px'>
            <header class='w3-container w3-blue'><h5><b>$ttid</b></h5></header>";
            echo "<a href='tutor.php?ttid=$ttid' style='text-decoration: none;'> <img class='w3-image' src=../../assets/tutors/1.jpg" ." style='width:100%;height:250px'></a><hr>";
            echo "<div class='w3-container'><p>ID: $ttid<br>Email: $ttemail<br>Phone: $ttphone<br>Name: $ttname<br>Password: $ttps<br>Description: $ttds<br>Tutor Registration Date: $ttrd<br></p></div>
            </div>";
            
        }
        ?>
    </div>
    <br>
    <?php
    $num = 1;
    if ($pageno == 1) {
        $num = 1;
    } else if ($pageno == 2) {
        $num = ($num) + 10;
    } else {
        $num = $pageno * 10 - 9;
    }
    echo "<div class='w3-container w3-row'>";
    echo "<center>";
    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<a href = "courses.php?pageno=' . $page . '" style="text-decoration: none">&nbsp&nbsp' . $page . ' </a>';
    }
    echo " ( " . $pageno . " )";
    echo "</center>";
    echo "</div>";
    ?>
    <footer class="w3-footer w3-center w3-bottom w3-blue">MyTutor</footer>
    
</body>
</html>