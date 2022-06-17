<?php
$insert = false;
if(isset($_POST['name'])){
    $submit = true;
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Succes connecting to ther db"; 

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `form`.`form` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Succesfully Inserted";
        $insert = true;[]
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="lp "src="lp.jpg" alt="trip">
    <div class="container">
        <h1>Welcome to S.H Jondhale Polytechnic trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
        if($insert == true){
        echo "<p class='NewMsg'>Thanks for submitting your form. we are happy to see you joining for the trip</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="batch" id="batch" placeholder="Enter your batch">
            <input type="email" name="email" id="email" placeholder="Enter your email address">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter any other information"></textarea>
            <button class="btn">SUBMIT</button>
        </form>
    </div>
    <script src="index.js"></script>
    <!--INSERT INTO `form` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'name', '18', 'Male', 'support@test.com', '999999999', 'this is my first form', current_timestamp()); -->
    
</body>
</html>
