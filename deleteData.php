<?php

include 'conn.php';

// $firstname = $_POST['fn'];
// $lastname = $_POST['ln'];
// $department = $_POST['d'];
$id = $_GET['id'];
$sqlDELETE = "DELETE FROM student_list WHERE id = '$id' ";
mysqli_query($conn, $sqlDELETE);

header("location: index.php");

?>