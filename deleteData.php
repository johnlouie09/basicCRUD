<?php

include 'conn.php';

$id = $_POST['delete_id'];

$sqlDELETE = "DELETE FROM student_list WHERE id = '$id' ";

mysqli_query($conn, $sqlDELETE);

header("location: index.php");

?>