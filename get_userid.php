<?php
	$id = $_GET['nickname'];
    
    $conn = new mysqli("localhost", "root", "mysql", "datausers");
        if($conn->connect_error){
            echo ("Произошла неизвестная ошибка");
    } 
    $sql = "SELECT * FROM users WHERE nickname='$id'";
    if($result = $conn->query($sql)){
        foreach($result as $row){

            $userid = $row["id"];
            $nickname = $row["nickname"];
            $adminstatus = $row["adminstatus"];
            $fullstr = $row['lvladmin'];
        }
    }
    echo "$fullstr, $userid, $nickname, $adminstatus";
    $conn->close(); 
?>