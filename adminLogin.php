<?php session_start();?>

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
    body {
      background-color: mintcream;
    }

    .navbar {
      position: sticky;
      top: 0;
      left: 0;
    }

    main {
      width: 100%;
      height: calc(100vh - 54px);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .formContainer {
      width: 400px;
      padding: 15px 30px;
      border-radius: 5px;
      background-color: aliceblue;
      box-shadow: 0px 0px 5px grey;
    }

    .form-control:focus {
      box-shadow: none !important;
      box-shadow: inset 0px -3px 0px dodgerblue !important;
      border: 1px solid dodgerblue !important;
    }
  </style>
  <title>Admin Login Page</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Admin Login</span>
      <!-- back button -->
      <a href="index.php" class="btn btn-light"><i class="fas fa-arrow-left me-1"></i>Back</a>
    </div>
  </nav>

  <!-- alert message for incorrect username or password -->
  <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-warning py-2">
    <i class="fas fa-exclamation-triangle text-warning"></i> 
      <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
      ?>
    </div>
  <?php endif;?>
  <main>
    <div class="formContainer">
      <!-- Admin login form -->
      <form class="form" action="adminValidate.php" method="post">
        <div class="form-group my-3">
          <label for="username">Username</label>
          <input class="form-control mt-2" type="text" name="uname" id="username" 
          placeholder="Enter your the username" required>
        </div>
        <div class="form-group my-3">
          <label for="password">Password</label>
          <input class="form-control mt-2" type="password" name="pword" id="password" 
          placeholder="Enter the password" required>
        </div>
        <div class="form-groups mt-4 mb-2">
          <!-- login button -->
          <button class="btn btn-primary" type="submit" name="loginbtn"><i class="fas fa-sign-in-alt"></i> Login</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>