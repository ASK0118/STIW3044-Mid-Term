<?php

if(isset($_POST['submit'])){

    $name = addslashes($_POST['name']);
    $email = $_POST['email'];
    $pass = ($_POST['password']);
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    echo $sqlinsertdata = "INSERT INTO `tbl_users`(`user_name`, `user_email`, `user_pass`, `user_phonenum`, `user_homeadd`) 
    VALUES ('$name','$email','$pass',$phone,'$address')";

}

function uploadImage($filename)
{
    $target_dir = "../image/";
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
    <title>Register New User</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/script.js"></script>
    <script src="../js/menu.js"></script>


</head>
<body>
<header class="w3-header w3-blue w3-center w3-padding-32">
    <h3>MyTutor</h3>
    <p>New User Registration Page</p>
</header>

<p>

    <div class="w3-container w3-border w3-center w3-padding w3-card">

        <img class="w3-image w3-round w3-margin"src="../image/personicon.jpg" style="width:100%; max-width:400px"><br>
        <input type="file" name="fileToUpload" onchange="previewFile()">

    </div>

</p>
<form class="w3-container w3-padding formco" name="registerForm" action="userreg.php" method="post" enctype="multipart/form-data">

        <p>
            <label>Name</label>
            <input class="w3-input w3-border w3-round" name="name" id="idname"
            type="text" placeholder="Name" required>
        </p>

        <p>
            <label>Email</label>
            <input class="w3-input w3-border w3-round" name="email" id="idemail"
            type="email" placeholder="Email" required>
        </p>

        <p>
            <label>Password</label>
            <input class="w3-input w3-border w3-round" name="password" id="idpassword"
            type="password" placeholder="Password" required>
        </p>

        <p>
            <label>Phone Number</label>
            <input class="w3-input w3-border w3-round" name="phone" id="idphone"
            type="phone" placeholder="Phone" required>
        </p>

        <p>
            <label>Address</label>
            <input class="w3-input w3-border w3-round" name="address" id="idpaddress"
            type="address" placeholder="Adderss" required>
        </p>

        <div>
            <input class="w3-button w3-block w3-round w3-border w3-blue" type="submit" name="submit" value="Insert">

</form>

</div>
<footer class="w3-footer w3-blue w3-center"><p>MyTutor</p></footer>

</body>
</html>