<?php 
  session_start();
  
  // For authentication
  if(!isset($_SESSION['username'])){
    header("location: adminLogin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- custom css -->
  <style>
    body{
      background-color: mintcream;
    }

    .navbar{
      position: sticky;
      top: 0;
      left: 0;
    }

    main{
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0px;
    }

    /* form container */
    .formContainer{
      width: 450px;
      padding: 15px 30px;
      border-radius: 5px;
      background-color: #FFF5B7;
      box-shadow: 0px 0px 5px grey;
    }

    /* label */
    label{
      font-weight: 600;
    }

    /* input field */
    .form-control:focus {
      box-shadow: none !important;
      box-shadow: inset 0px -3px 0px gold !important;
      border: 1px solid gold !important;
    }

    /* marks input field container */
    .markGroup {
      display: grid;
      grid-template-columns: 20% 80%;
      align-items: center;
    }
  </style>
  <title>Record update Page</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Mark Update System</span>
      <!-- back button -->
      <a href="marklist.php" class="btn btn-light"><i class="fas fa-arrow-left me-1"></i>Back</a>
    </div>
  </nav>

  <?php
    // variables initial value
    $regno = "";
    $sname = "";
    $dob = "";
    $mark1 = "";
    $mark2 = "";
    $mark3 = "";
    $mark4 = "";
    $mark5 = "";
    
    if(isset($_GET['editbtn'])){
      $regno = $_GET['editbtn'];

      // database connectivity
      $mysqli = new mysqli("localhost", "root", "", "myprojects") or die(mysqli_error($mysqli));
      $result = $mysqli->query("select * from stud_marklist where regno ='$regno' ") or die(mysqli_error($mysqli));
      $row = $result->fetch_array();

      // variables value
      $sname = $row['sname'];
      $dob = $row['dob'];
      $mark1 = $row['mark1'];
      $mark2 = $row['mark2'];
      $mark3 = $row['mark3'];
      $mark4 = $row['mark4'];
      $mark5 = $row['mark5'];
    }
    
    If(isset($_POST['updatebtn'])){
      $regno = $_POST['regno'];
      $sname = $_POST['sname'];
      $dob = $_POST['dob'];
      $mark1 = $_POST['mark1'];
      $mark2 = $_POST['mark2'];
      $mark3 = $_POST['mark3'];
      $mark4 = $_POST['mark4'];
      $mark5 = $_POST['mark5'];

      // To update the values of the specified row in the table
      $updatequery = $mysqli->query("update stud_marklist set sname ='$sname', dob ='$dob', mark1 =$mark1, mark2 =$mark2, mark3 =$mark3, mark4 =$mark4, mark5= $mark5 where regno = $regno") or 
      die(mysqli_error($mysqli));
      $_SESSION['updatemsg'] = "The record is successfully updated";
      header("location: marklist.php");
    }
  ?>
  <main>
    <!-- Record update form -->
    <div class="formContainer">
        <form method="post">
          <div class="formGroup my-2">
            <label for="regnum" class="mb-2">Register Number : </label>
            <input type="number" class="form-control" name="regno" id="regnum" value ="<?php echo $regno;?>"
            placeholder="student register number">
          </div>
          <div class="formGroup my-2">
            <label for="studname">Student Name : </label>
            <input type="text" class="form-control" name="sname" id="studnum" value ="<?php echo $sname;?>"
            placeholder="name of the student" required>
          </div>
          <div class="formGroup my-2">
            <label for="birthdate">Date of Birth : </label>
            <input type="date" class="form-control" name="dob" id="birthdate" value ="<?php echo $dob;?>" required>
          </div>
          <div class="markGroup my-3">
            <label for="mark1">SAE51 : </label>
            <input type="number" class="form-control" name="mark1" id="mark1" value ="<?php echo $mark1;?>"
            placeholder="Enter the mark" required>
          </div>
          <div class="markGroup my-3">
            <label for="mark2">SAE5A : </label>
            <input type="number" class="form-control" name="mark2" id="mark2" value ="<?php echo $mark2;?>"
            placeholder="Enter the mark" required>
          </div>
          <div class="markGroup my-3">
            <label for="mark3">SAE5B : </label>
            <input type="number" class="form-control" name="mark3" id="mark3" value ="<?php echo $mark3;?>"
            placeholder="Enter the mark" required>
          </div>
          <div class="markGroup my-3">
            <label for="mark4">SAE5C : </label>
            <input type="number" class="form-control" name="mark4" id="mark4" value ="<?php echo $mark4;?>"
            placeholder="Enter the mark" required>
          </div>
          <div class="markGroup my-3">
            <label for="mark5">SEE5A : </label>
            <input type="number" class="form-control" name="mark5" id="mark5" value ="<?php echo $mark5;?>"
            placeholder="Enter the mark" required>
          </div>
          <!-- update button -->
          <button type="submit" class="btn btn-warning my-2" name="updatebtn"><i class="fas fa-file-edit"></i> Update</button>
        </form>
      </div>
    </main>
</body>

</html>