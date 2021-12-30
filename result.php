<?php 
  session_start();

  // For authentication
  if(!isset($_SESSION['registernum'])){
    header("location: index.php");
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
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <title>Result</title>
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
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    /* heading */
    main h3{
      color: brown;
    }

    /* student details table */
    .sdTable{
      width: 400px;
    }

    /* student details table heading */
    .sdTable th{
      background-color: #E26A2C;
      color: white;
      border: 1px solid white;
    }

    /* student details table data */
    .sdTable td{
      background-color: #FFD07F;
      border: 1px solid white;
    }

    /* student result table */
    .smTable{
      width: 500px;
    }

    /* student result table heading */
    .smTable th{
      background-color: #E26A2C;
      color: white;
      border: 1px solid white;
    }
    
    /* student result table data */
    .smTable td{
      background-color: #FFD07F;
      border: 1px solid white;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Result</span>
      <div>
        <!-- print as pdf button -->
        <button class="btn btn-success me-2" onclick="printPdf()"><i class="fas fa-print"></i> Print</button>
        <!-- student logout button -->
        <a href="studLogout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </nav>

  <?php
    // For database connectivity
    $mysqli = new mysqli("localhost", "root", "", "myprojects") or die(mysqli_error($mysqli));
    if(isset($_SESSION['registernum'])){
      $regno = $_SESSION['registernum'];
    }
    
    // To fetch data from the database
    $result = $mysqli->query("select * from stud_marklist where regno = '$regno' ") or die(mysqli_error($mysqli));
    $row = $result->fetch_array();
  ?>

  <main>
    <!-- heading -->
    <h3 class="text-center my-4">Semester Marksheet</h3>
    <!-- student details table -->
    <table class="table sdTable mb-4">
      <tr>
        <th>Register Number</th>
        <td><?php echo $row['regno'];?></td>
      </tr>
      <tr>
        <th>Student Name</th>
        <td><?php echo $row['sname'];?></td>
      </tr>
      <tr>
        <th>Date of Birth</th>
        <td>
          <?php
          // To format and display date as DD-MM-YYYY
            $orgdate = $row['dob'];
            $newdate = date("d-m-Y", strtotime($orgdate));
            echo $newdate;
          ?>
        </td>
      </tr>
    </table>
    <!-- marksheet table -->
    <table class="table smTable text-center">
      <thead>
        <th>Slno</th>
        <th>Subject Code</th>
        <th>Marks</th>
        <th>Remarks</th>
      </thead>
      <!-- row 1 -->
      <tr>
        <td>1</td>
        <td>SAE51</td>
        <td><?php echo $row['mark1'];?></td>
        <td>
          <?php 
            if($row['mark1']< 35){
              echo 'Re-Appear';
            }
            else{
              echo 'Pass';
            }
          ?>
        </td>
      </tr>
      <!-- row 2 -->
      <tr>
        <td>2</td>
        <td>SAE5A</td>
        <td><?php echo $row['mark2'];?></td>
        <td>
          <?php 
            if($row['mark2']< 35){
              echo 'Re-Appear';
            }
            else{
              echo 'Pass';
            }
          ?>
        </td>
      </tr>
      <!-- row 3 -->
      <tr>
        <td>3</td>
        <td>SAE5B</td>
        <td><?php echo $row['mark3'];?></td>
        <td>
          <?php 
            if($row['mark3']< 35){
              echo 'Re-Appear';
            }
            else{
              echo 'Pass';
            }
          ?>
        </td>
      </tr>
      <!-- row 4 -->
      <tr>
        <td>4</td>
        <td>SAE5C</td>
        <td><?php echo $row['mark4'];?></td>
        <td>
          <?php 
            if($row['mark4']< 35){
              echo 'Re-Appear';
            }
            else{
              echo 'Pass';
            }
          ?>
        </td>
      </tr>
      <!-- row 5 -->
      <tr>
        <td>5</td>
        <td>SEE5A</td>
        <td><?php echo $row['mark5'];?></td>
        <td>
          <?php 
            if($row['mark5']< 35){
              echo 'Re-Appear';
            }
            else{
              echo 'Pass';
            }
          ?>
        </td>
      </tr>
    </table>
  </main>
  <!-- custom javascript -->
  <script>
    function printPdf(){
      window.print();
    }
  </script>
</body>

</html>