<?php
    $insert = false;
    if (isset($_POST['name'])) {
        
        $server="localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if (!$con) {
            die("connection to this database failed due to" . mysqli_connect_error());
        }
        // echo "Connection Successful to the db";
        $name = $_POST['name'];
        $age= $_POST['age'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $desc=$_POST['desc'];

        $sql = "INSERT INTO  `trip` . `trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `date`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

        //echo $sql;

        if ($con->query($sql) == true) {
            $insert = true;
        } else {
            echo "Error: $sql <br> $con->error";
        }

        $con-> close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg-image" src="bg.jpg" alt="goa">
    <div class="container">
        <h1>Welcome to Mumbai to Goa Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip.</p>
        <?php 
        if($insert == true){
            echo "<p class='submitMsg'>  Thanks for submitting your form . We are happy to see you jining us for the goa trip </p>";
        }
        ?>
        <br>
        <form  method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your Age" min="0">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your phone number" min="0"> 
            <textarea  id="desc" name="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
            <span>
                <button class="btn" type="submit">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn" type="reset">Reset</button>
            </span>
        </form>
        
    </div>
</body>
</html>