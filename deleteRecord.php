<?php
  session_start();

  // For database connectivity
  $mysqli = new mysqli("localhost", "root", "", "myprojects") or die(mysqli_error($mysqli));

  if(isset($_GET['deletebtn'])){
    $regno = $_GET['deletebtn'];
    // To delete the specified row from the table
    $delquery = $mysqli->query("delete from stud_marklist where regno = '$regno' ") or 
    die(mysqli_error($mysqli));
    $_SESSION['delmsg'] = "The record has been deleted";
    header("location: marklist.php");
  }
 ?>