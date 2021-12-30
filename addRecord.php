<?php
  session_start();

  // For database connectivity
  $mysqli = new mysqli("localhost", "root", "", "myprojects") or die(mysqli_error($mysqli));

  if(isset($_POST['savebtn'])){
    $regno = $_POST['regno'];
  }

  // To check whether the table contains the specified row
  $result = $mysqli->query("select * from stud_marklist where regno ='$regno' ") or die(mysqli_error($mysqli));
  $num = mysqli_num_rows($result);

  // If the query returns true
  if($num ==1){
    $_SESSION['infomsg'] ="This record already exist";
    header("location: adminPage.php");
  }

  // If the query returns false
  else{
    $sname = $_POST['sname'];
    $dob = $_POST['dob'];
    $mark1 = $_POST['mark1'];
    $mark2 = $_POST['mark2'];
    $mark3 = $_POST['mark3'];
    $mark4 = $_POST['mark4'];
    $mark5 = $_POST['mark5'];

    // To insert the values in the table
    $addquery = $mysqli->query("insert into stud_marklist (regno, sname, dob, mark1, mark2, mark3, mark4, mark5) values ('$regno', '$sname', '$dob', '$mark1', '$mark2', '$mark3', '$mark4', '$mark5')") or
    die(mysqli_error($mysqli));
    $_SESSION['successmsg'] ="The record is successfully created";
    header("location: adminPage.php");
  }

?>