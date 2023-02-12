<?php

    if (isset($_GET["color"]) && 
        isset($_GET["lvladmin"]) && 
        isset($_GET['shadow'])) {

        $conn = new mysqli("localhost", "root", "mysql", "datausers");
        if($conn->connect_error){
            echo ("Произошла неизвестная ошибка");
        } 
        $color               = $conn->real_escape_string($_GET["color"]);
        $lvladmin            = $conn->real_escape_string($_GET["lvladmin"]);
        $shadow              = $conn->real_escape_string($_GET['shadow']);
        
        $sql = "INSERT INTO colorstyle (color, lvladmin, shadow) VALUE ('$color', $lvladmin, '$shadow')";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $conn->error;
          } $conn->close(); 
}?>