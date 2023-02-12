<?php

    if (isset($_GET["nickname"]) && 
        isset($_GET["fraction"]) && 
        isset($_GET["org"]) && 
        isset($_GET["rang"]) && 
        isset($_GET["discord"]) && 
        isset($_GET["data"]) && 
        isset($_GET["lgots"]) && 
        isset($_GET["userstatus"])) {

        $conn = new mysqli("localhost", "root", "mysql", "datausers");
        if($conn->connect_error){
            echo ("Произошла неизвестная ошибка");
        } 
            $nickname               = $conn->real_escape_string($_GET["nickname"]);
            $fraction               = $conn->real_escape_string($_GET["fraction"]);
            $org                    = $conn->real_escape_string($_GET["org"]);
            $rang                   = $conn->real_escape_string($_GET["rang"]);
            $discord                = $conn->real_escape_string($_GET["discord"]);
            $data                   = $conn->real_escape_string($_GET["data"]);
            $lgots                  = $conn->real_escape_string($_GET["lgots"]);
            $userstatus             = $conn->real_escape_string($_GET["userstatus"]);
            
            $sql = "UPDATE users (adminstatus, nickname, data, discord, activated, lgots, fraction, org, rang, lvladmin) SET 
            ('$userstatus', '$nickname', '$data', '$discord', '1', '$lgots', '$fraction', '$org', '$rang', '$lvladmin') WHERE vk_id='$vk_id'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
              } else {
                echo "Error updating record: " . $conn->error;
              } $conn->close(); 
        ;; 
}?>