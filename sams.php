<?php
@include 'db_conn.php';

$sql = "SELECT idemployees, first_name, middle_name, last_name FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        echo $row['idemployees'] . " " . $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] . "<br>";
    }
    echo "<br>";
}

?>