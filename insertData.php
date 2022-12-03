<?php

include 'conn.php';

$firstname = $_POST['fn'];
$lastname = $_POST['ln'];
$department = $_POST['d'];
$sqlInsert = "INSERT INTO student_list (firstname, lastname, department) VALUES('$firstname','$lastname','$department')";
mysqli_query($conn, $sqlInsert);

header("location: index.php");

?>