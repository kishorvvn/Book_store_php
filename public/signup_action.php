<?php


    if(isset($_POST['submit'])){

        include_once '../resources/config.php';
        include_once '../resources/functions.php';
       

        global $connection;
        $first = escape_string($_POST['first']);
        $last = escape_string($_POST['last']);
        $email = escape_string($_POST['email']);
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        //error handlers
        //check if the field is empty

        if(empty($first) || empty($last) || empty($email) || empty($username) || empty($password)){
            header("Location: signup.php?signup=empty");
            exit();
        }
        else {
            // check if input characters are valid
            if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
                header("Location: signup.php?signup=invalid");
                exit(); 
            } else {
                // check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: signup.php?signup=invalid");
                exit(); 
            } else {
                //check username already exists
                $query = query("SELECT * FROM users WHERE user_username = '$username'");
                $resultCheck = mysqli_num_rows($query);
                if($resultCheck > 0){
                    header("Location: signup.php?signup=error");
                exit(); 
                } else {
                    //hashing the password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Insert the user into the database

                    $query = query("INSERT INTO users (user_first, user_last, user_email, user_username, user_password) VALUES ('$first', '$last', '$email', '$username', '$hashedPassword');");
                    header("Location: signup.php?signup=success");
                    exit();

                }
            }
            
        }
    } 

}
else {
    header("Location: signup.php");
    exit();
}