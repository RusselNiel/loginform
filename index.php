<?php

$host = "localhost";
$username_db = "root";
$password_db = "123456";
$database = "SECRET";

$con = new mysqli($host,$username_db,$password_db,$database);

if ($con->connect_error){
      die("Connection Field: " . $con->connect_error);
    }else {
        echo "<h3 style = 'color: white;'>YOUR DATA IS DIRECT TO {$database} FILE'!</h3>"; // Debug message
}

if (isset($_POST['submit'])){
    echo"<h3 style ='color: white;'>Form Submitted!</h3>";

    $input_username_from_form  = $_POST['username'];
    $input_password_from_form  = $_POST['password'];


    $sql = "INSERT INTO student_list1 (user_name, pass_name) VALUES (?, ?)";

    if($stmt = $con->prepare($sql)){
        echo "<p style = 'color: white'>Statement Prepared.</p>";

        $stmt->bind_param("ss",$input_username_from_form, $input_password_from_form);

        if($stmt->execute()){
            echo "<p style='color:green;'>Data successfully saved!</p>";
        }else {
            echo "<p style = 'color:red;'>Error saving data: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }else{
        echo "<p style='color:red;'>Error preparing statement: " . $con->error . "</p>";
    }
}else {
    echo "<h3 style = 'color: white'> Form not yet submitted.</h3>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    
    <title>Document</title>
</head>
<body>
    <style>
       
    </style>

   
<!-- <h1 class="h1"><?php echo "HELLO"; ?></h1> -->
 <video autoplay loop muted playsinline class="bg-video">
    <source src="backvid.mp4" type="video/mp4">
 </video>
 <div class="main">
    <?php
      if ($con->connect_error){
        die("<h3 style='color: white;'>Connection Failed: " . $con->connect_error . "</h3>");
      } else {
        echo "<h3 style='color: white;'>YOUR DATA IS DIRECT TO {$database} FILE!</h3>";
      }

      if (isset($_POST['submit'])) {
        echo "<h3 style='color: white;'>Form Submitted!</h3>";
      } else {
        echo "<h3 style='color: white;'>Form not yet submitted.</h3>";
      }
    ?>

    <h2 class = "log">LOGIN FORM</h2>
    
        <form action="" method="POST">
        <div class = "container">
            <div class="username">

            <label for="username_field">Username: </label>
            <input type="text" id="username_field" name="username"><br><br>
            </div>

            <div class="pasword">
            <label for="password_field">Password: </label>
            <input type="password" id="password_field" name="password"><br><br>
             </div>


            <button type="submit" name="submit">submit</button>
           
        </div>
        </form>
    
</body>
</html>

<?php
$con->close();
?>
