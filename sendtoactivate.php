
<?php

if (isset($_GET["email"]) && 
    isset($_GET["nickname"]) && 
    isset($_GET['fraction']) &&
    isset($_GET['org']) &&
    isset($_GET['rang']) &&
    isset($_GET['data']) &&
    isset($_GET['discord']) &&
    isset($_GET['vk_id'])) {

    $conn = new mysqli("localhost", "root", "mysql", "datausers");
    if($conn->connect_error){
        } 
        $email = $conn->real_escape_string($_GET["email"]);
        $nickname = $conn->real_escape_string($_GET["nickname"]);
        $fraction = $conn->real_escape_string($_GET["fraction"]);
        $org = $conn->real_escape_string($_GET["org"]);
        $rang = $conn->real_escape_string($_GET["rang"]);
        $data = $conn->real_escape_string($_GET["data"]);
        $discord = $conn->real_escape_string($_GET["discord"]);
        $vk_id = $conn->real_escape_string($_GET["vk_id"]);
        $email = $conn->real_escape_string($_GET["email"]);

        $sql = "UPDATE users SET    
        email='$email', 
        nickname='$nickname',
        fraction='$fraction',
        org='$org',
        rang='$rang',
        data='$data',
        discord='$discord',
        vk_id='$vk_id',
        email='$email' WHERE vk_id=$vk_id";
        

        if($conn->query($sql)){ 
            global $_SESSION;
            session_start();
            $_SESSION['email'] = $email;
            echo ("Регистрация прошла успешно");
            $conn->close(); 
            header('Location: index.php'); 
        } else { 
        echo "Ошибка" . $conn->error; } 
        
        
}?>