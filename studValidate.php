<?php
  session_start();

  // For database connectivity
  $mysqli = new mysqli("localhost", "root", "", "myprojects") or die(mysqli_error($mysqli));

  if(isset($_POST['loginbtn'])){
    $regno = $_POST['regno'];
    $dob =$_POST['dob'];
  }

  // To check whether the table contains the specified row
  $result = $mysqli->query("select * from stud_marklist where regno ='$regno' && dob ='$dob' ") or die(mysqli_error($mysqli));
  $num = mysqli_num_rows($result);

  // If the query returns true
  if($num ==1){
    $_SESSION['registernum'] = $regno;
    header("location: result.php");
  }
  // If the query returns false
  else{
    $_SESSION['message']="invalid register number or password !";
    header("location: index.php");
  }

?>