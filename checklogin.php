<?php

    if (isset($_GET["nickname"]) && isset($_GET["password"])) {
        $conn = new mysqli("localhost", "root", "mysql", "datausers");
            if($conn->connect_error){
                echo "Не смог зайти в базу данных, повторите попытку позже...";
            }
            $nickname = $conn->real_escape_string($_GET["nickname"]);
            $password = $conn->real_escape_string($_GET["password"]);
            $sql = "SELECT * FROM users WHERE email='$nickname'";
            if($result = $conn->query($sql)){
                foreach($result as $row){
                    $nnickname = $row['email'];
                    $npassword = $row['password'];
                }
            }
            if(($nickname = $nnickname) && ($password = $npassword)) {
                
                session_start();
                global $_SESSION;
                $_SESSION['email']=$nickname;
                header('Location: index.php');
            } else {
                echo "Неверные логин или пароль!";
            }
        $conn->close(); 
    } else { header('Location: login.php'); }
?>
            