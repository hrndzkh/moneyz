 <!DOCTYPE html>
 <head>
     <title>Log in</title>
</head>
<body>
<form name="inloggen" method="POST" action="">
    <h1>Log in</h1>
    <label for="username">Username:</label><br>
    <input required type="text" name="username" placeholder="enter username" /> <br>
    <label for="username">Password:</label><br>
    <input required type="password" name="password" placeholder="enter your password"/><br>
    <input type="submit" id="submit" name="submit" value="Log In" />
</form>

<?php
if(isset($_POST["submit"])) {
    $melding = "";
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    try{
        $sql = "SELECT * FROM tbluser WHERE Username = ?";
        $stmt = $verbinding->prepare($sql);
        $stmt->execute(array($email));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result) {
            $passwordInDatabase = $result["password"];
            $rol = $result["rol"];
            if(password_verify($password,$passwordInDatabase)){
                $_SESSION["USERNAME"] = $resultaat["username"];   
            }else{
                $melding .= "Please try again<br>";
            }
        }else{
            $melding .= "Please try again<br>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
        $melding .= "Welcome!";
}
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       