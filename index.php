<?php session_start();?>

<!doctype html>
<html lang="en">

<head>
  <!-- meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- font awesome cdn link-->
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
      height: calc(100vh - 54px);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* form container */
    .formContainer{
      width: 400px;
      padding: 15px 30px;
      border-radius: 5px;
      background-color: aliceblue;
      box-shadow: 0px 0px 5px grey;
    }

    /* label */
    label{
      font-weight: 600;
    }

    /* input field */
    .form-control:focus {
      box-shadow: none !important;
      box-shadow: inset 0px -3px 0px dodgerblue !important;
      border: 1px solid dodgerblue !important;
    }
  </style>
  <title>Home Page</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Student Login</span>
      <div class="d-inline-block">
        <!-- admin page navigate button -->
        <a href="adminLogin.php" class="btn btn-primary"><i class="fas fa-user-alt"></i> Admin Login</a>
      </div>
    </div>
  </nav>

  <!-- alert message for incorrect username or password -->
  <?php if(isset($_SESSION['message'])):?>
    <div class="alert alert-warning py-2">
      <i class="fas fa-exclamation-triangle"></i> 
      <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>
    </div>
  <?php endif;?>

  <main>
    <div class="formContainer">
      <!-- Student login form -->
      <form class="form" action="studValidate.php" method="post">
        <div class="form-group my-3">
          <label for="regno">Username</label>
          <input class="form-control mt-2" type="number" name="regno" id="regno"
            placeholder="enter your register number" required>
        </div>
        <div class="form-group my-3">
          <label for="dob">Date of Birth</label>
          <input class="form-control mt-2" type="date" name="dob" id="dob" required>
        </div>
        <div class="form-groups mt-4 mb-2">
          <!-- login button -->
          <button class="btn btn-primary" type="submit" name="loginbtn"><i class="fas fa-hand-holding-box"></i> Get marks</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>