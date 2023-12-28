<?php

$conn = mysqli_connect('localhost','root','','Web');

if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
} else {
        echo "Connection";
}
?>