<?php

include 'conn.php';

$student_id = $_POST['student_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$department = $_POST['department'];

$query_update = "UPDATE student_list SET firstname='$first_name', lastname='$last_name', department='$department' WHERE id=$student_id ";

mysqli_query($conn, $query_update);

header("location: index.php");

?>