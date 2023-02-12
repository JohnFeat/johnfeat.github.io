
<?php

    if (isset($_GET["email"]) && isset($_GET["password"])) {

        $conn = new mysqli("localhost", "root", "mysql", "datausers");
        if($conn->connect_error){
            } 
            $email = $conn->real_escape_string($_GET["email"]);
            $password = $conn->real_escape_string($_GET["password"]);
            $sql = "SELECT * FROM users";
            if($result = $conn->query($sql)){
                foreach($result as $row){
                    $nnickname = $row['nickname'];
                    $npassword = $row['password'];
                    $id = intdiv($row['id']) + 1;
                }
            }
            $today = date("20y-m-d");
            echo $today;
            $sql = "INSERT INTO users 
            ( id,   email,    password, adminstatus, lvladmin, nickname, data,     discord, activated, lgots, fraction, org,    rang, vk_id) VALUE 
            ($id, '$email', '$password', 'none',   '0',        'none', '$today', 'none',       '0',    '0',    'none', 'none',       '0', 'none')";
            if($conn->query($sql)){ 
                echo ("Регистрация прошла успешно");
                $conn->close(); 
                header('Location: index.php'); 
            } else { 
            echo "Ошибка" . $conn->error; } 
            
            
}?>