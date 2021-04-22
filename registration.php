<!DOCTYPE html>
<head>
    <title>Registration Form</title>
</head>
<body>
<div>
    <form name="registration" method="POST">
            <h1>Create an account</h1>
            <p>Fill in the form with valid information</p>

            <label for="username">Username:</label><br>
            <input type="text" name="username" placeholder="enter your username" required /><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" placeholder="enter your password" required /><br>

            <input type="submit" name="submit" value="Sign up">
</body>
</html>

<?php
include("config.php");
if(isset($_POST["submit"])) {
    $melding = "";
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $date = date('Y-m-d H:i:s');

    //Controleer of username al bestaat
    $sql = "SELECT * FROM tbluser WHERE Username = ?";
    $stmt = $verbinding->prepare($sql);
    $stmt->execute(array($username));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
        $melding = "This username is taken";
    }else{
        $sql = "INSERT INTO tbluser VALUES (null,?,?,?,?)";
        $stmt = $verbinding->prepare($sql);
        try{
            $stmt->execute(array($username, $passwordHash, $date, $date));
            $id = $verbinding->lastInsertId();
            $melding = "New account succesfully made!";
        }catch(PDOException $e){
            $melding = "Oops! Something went wrong!";
            $e->getMessage();
        }
        $sql = "INSERT INTO tblmoneyz VALUES (null,?,?)";
        $stmt->execute(array($id, 50));       
        }
    }
?>