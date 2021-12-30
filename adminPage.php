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
      background-color: #DDFFBC;
      box-shadow: 0px 0px 5px grey;
    }

    /* label */
    label{
      font-weight: 600;
    }

    /* input field */
    .form-control:focus {
      box-shadow: none !important;
      box-shadow: inset 0px -3px 0px seagreen !important;
      border: 1px solid seagreen !important;
    }

    /* marks input field container */
    .markGroup {
      display: grid;
      grid-template-columns: 20% 80%;
      align-items: center;
    }
  </style>
  <title>Admin Page</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Mark Entering System</span>
      <div class="d-inline-block">
        <!-- marklist navigate button -->
        <a href="marklist.php" class="btn btn-primary me-2"><i class="fas fa-list-alt"></i> View Marklist</a>
        <!-- logout button -->
        <a href="adminLogout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </nav>

  <!-- alert message if the record already exist  -->
  <?php if(isset($_SESSION['infomsg'])):?>
    <div class="alert alert-info py-2">
      <i class="fas fa-info-circle text-info"></i> 
      <?php
        echo $_SESSION['infomsg'];
        unset($_SESSION['infomsg']);
      ?>
    </div>
  <?php endif;?>

  <!-- alert message if the record created successfully -->
  <?php if(isset($_SESSION['successmsg'])):?>
    <div class="alert alert-success py-2">
     <i class="fas fa-check-circle text-success"></i> 
      <?php 
        echo $_SESSION['successmsg'];
        unset($_SESSION['successmsg']);
      ?>
    </div>
  <?php endif;?>
  
  <main>
    <div class="formContainer my-2">
      <!-- Add record form -->
      <form action="addRecord.php" method="post">
        <div class="formGroup my-2">
          <label for="regnum" class="mb-2">Register Number : </label>
          <input type="number" class="form-control" name="regno" id="regnum" 
          placeholder="student register number" required>
        </div>
        <div class="formGroup my-2">
          <label for="studname">Student Name : </label>
          <input type="text" class="form-control" name="sname" id="studnum" 
          placeholder="name of the student" required>
        </div>
        <div class="formGroup my-2">
          <label for="birthdate">Date of Birth : </label>
          <input type="date" class="form-control" name="dob" id="birthdate" required>
        </div>
        <div class="markGroup my-3">
          <label for="mark1">SAE51 : </label>
          <input type="number" class="form-control" name="mark1" id="mark1" 
          placeholder="Enter the mark" required>
        </div>
        <div class="markGroup my-3">
          <label for="mark2">SAE5A : </label>
          <input type="number" class="form-control" name="mark2" id="mark2" 
          placeholder="Enter the mark" required>
        </div>
        <div class="markGroup my-3">
          <label for="mark3">SAE5B : </label>
          <input type="number" class="form-control" name="mark3" id="mark3" 
          placeholder="Enter the mark" required>
        </div>
        <div class="markGroup my-3">
          <label for="mark4">SAE5C : </label>
          <input type="number" class="form-control" name="mark4" id="mark4" 
          placeholder="Enter the mark" required>
        </div>
        <div class="markGroup my-3">
          <label for="mark5">SEE5A : </label>
          <input type="number" class="form-control" name="mark5" id="mark5" 
          placeholder="Enter the mark" required>
        </div>
        <!-- Add record button -->
        <button type="submit" class="btn btn-success my-2" name="savebtn"><i class="fad fa-save"></i> Save</button>
      </form>
    </div>
    </main>  
</body>

</html>