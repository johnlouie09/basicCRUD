<?php

include 'conn.php';

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$department = $_POST['dept'];
$sqlInsert = "INSERT INTO student_list (firstname, lastname, department) VALUES('$firstname','$lastname','$department')";
mysqli_query($conn, $sqlInsert);

header("location: index.php");

?>