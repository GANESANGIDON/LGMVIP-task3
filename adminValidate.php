<?php
  session_start();

  // For database connectivity
  $mysqli = new mysqli("localhost", "root", "", "myprojects") or die(mysqli_error($mysqli));
  
  if(isset($_POST['loginbtn'])){
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];
  }
  // To check whether the table contains the specified row
  $result  = $mysqli->query("select * from admin where uname = '$uname' && pword = '$pword' ") or die(mysqli_error($mysqli));
  $num = mysqli_num_rows($result);

  // If the query returns true
  if($num ==1){
    $_SESSION['username'] = $uname;
    header("location: adminPage.php");
  }
  // If the query returns false
  else{
    $_SESSION['message'] = "username or password is incorrect !";
    header("location: adminLogin.php");
  }

?>