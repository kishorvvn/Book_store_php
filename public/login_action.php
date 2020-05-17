<?php
// session_start();


    if(isset($_POST['submit'])){

        include_once '../resources/config.php';
        include_once '../resources/functions.php';
        global $connection;
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        if(empty(($username) || empty($password))){
            header("Location: index.php?login=empty");
            // redirect("index.php");
            // set_message("Please fill out the details");
            exit();
        } else {
            $query = query("SELECT * FROM users WHERE user_username='$username'");
            $resultCheck = mysqli_num_rows($query);

            if($resultCheck < 1){
                header("Location: index.php?login=error");
                // redirect("Signup.php");
                // set_message("Please sing up first.");
                exit();
            } else {
                if($row = mysqli_fetch_assoc($query)){
                    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    // dehashing the password
                    $hashedPWDCheck = password_verify($password, $row['user_password']);
                    // true if matches
                    if($hashedPWDCheck == false){
                        header("Location:index.php?login=error");
                        // redirect("index.php");
                        // set_message("Username and password does not match");
                        exit();
                    } elseif ($hashedPWDCheck == true) {
                        // log in the user
                        redirect("index.php");
                        $_SESSION['u_id']= $row['user_id'];
                        $_SESSION['u_first']= $row['user_first'];
                        $_SESSION['u_last']= $row['user_last'];
                        $_SESSION['u_email']= $row['user_email'];
                        $_SESSION['u_password']= $row['user_password'];
                        // redirect("index.php");
                        header("Location:index.php?login=success");
                        exit();
                    }
                }
            }
        }

    } else {
        header("Location: index.php?login=error");
        exit();
    }

