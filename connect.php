<?php
    $conn = mysqli_connect("localhost","root","","blog");
    if(!$conn){
        echo "Failed to connect." or die(mysqli_connect_error());
    }
?>