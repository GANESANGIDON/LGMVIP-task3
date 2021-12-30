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
  <!-- Bootstrap CSS cdn link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- font awesome cdn link-->
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
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px 0px;
    }

    /* marklist table */
    .markTable{
      width: 90%;
    }

    /* marklist table heading */
    .markTable th{
      background-color: #E26A2C;
      color: white;
      border: 1px solid white;
    }

    /* marklist table data */
    .markTable td{
      background-color: #FFF0BC;
      border: 1px solid white;
    }

    /* marklist table container */
    .marklistContainer {
      width: 90%;
    }

    /* icons */
    .icon{
      font-weight: 600;
    }
  </style>
  <title>Marklist</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Students Marklist</span>
      <!-- back button -->
      <a href="adminPage.php" class="btn btn-light"><i class="fas fa-arrow-left me-1"></i>Back</a>
    </div>
  </nav>

  <?php
    // For database connectivity 
    $mysqli = new mysqli("localhost", "root", "", "myprojects") or die(mysqli_error($mysqli));

    // To fetch data from the database
    $result = $mysqli->query("select * from stud_marklist") or die(mysqli_error($mysqli));
    $num = mysqli_num_rows($result);

    // If the query returns false
    if($num ==0){
      $_SESSION['errmsg'] = "This table is empty !";
    }
  ?> 

  <!-- alert message if the table is empty -->
  <?php if(isset($_SESSION['errmsg'])):?>
  <div class="alert alert-info py-2">
    <i class="fas fa-empty-set text-info"></i> 
    <?php
      echo $_SESSION['errmsg'];
      unset($_SESSION['errmsg']);
    ?>
  </div>
  <?php endif;?>

  <!-- alert message if the specified record is deleted -->
  <?php if(isset($_SESSION['delmsg'])):?>
  <div class="alert alert-danger py-2">
    <i class="fas fa-minus-circle text-danger"></i> 
    <?php
      echo $_SESSION['delmsg'];
      unset($_SESSION['delmsg']);
    ?>
  </div>
  <?php endif;?>

  <!-- alert message if the specified record is successfully updated -->
  <?php if(isset($_SESSION['updatemsg'])):?>
  <div class="alert alert-warning py-2">
    <i class="fas fa-file-edit text-warning"></i> 
    <?php 
      echo $_SESSION['updatemsg'];
      unset($_SESSION['updatemsg']);
    ?>
  </div>
  <?php endif;?>

  <main>
    <!-- Marklist table -->
    <table class="table markTable table-hover">
      <thead>
        <tr>
          <th>RegNo</th>
          <th>Name</th>
          <th>Date of Birth</th>
          <th>SAE51</th>
          <th>SAE5A</th>
          <th>SAE5B</th>
          <th>SAE5C</th>
          <th>SEE5A</th>
          <th>Remarks</th>
          <th>Operations</th>
        </tr>
      </thead>
      <!-- To display all the records present in the table -->
      <?php while($row = $result->fetch_assoc()):?>
      <tr>
        <td><?php echo $row['regno'];?></td>
        <td><?php echo $row['sname'];?></td>
        <td>
          <?php
            // To format and display date as DD-MM-YYYY
            $orgdate = $row['dob'];
            $newdate = date("d-m-Y", strtotime($orgdate));
            echo $newdate;
          ?>
        </td>
        <td><?php echo $row['mark1'];?></td>
        <td><?php echo $row['mark2'];?></td>
        <td><?php echo $row['mark3'];?></td>
        <td><?php echo $row['mark4'];?></td>
        <td><?php echo $row['mark5'];?></td>
        <td>
          <?php
            if($row['mark1']<35 || $row['mark2']<35 || $row['mark3']<35 || $row['mark4']<35 || $row['mark5']<35){
              echo "Re-Appear";
            }
            else{
              echo "Pass";
            }
          ?>
        </td>
        <td>
          <!-- edit icon -->
          <a href="editRecord.php?editbtn=<?php echo $row['regno'];?>" class="text-warning me-2"
            style="text-decoration: none;"><i class="fas fa-edit"></i> <span class="icon">Edit</span></a>
          <!-- delete icon -->
          <a href="deleteRecord.php?deletebtn=<?php echo $row['regno'];?>" class="text-danger"
            style="text-decoration: none;"><i class="fas fa-trash-alt"></i> <span class="icon">Delete</span></a>
        </td>
      </tr>
      <?php endwhile;?>
    </table>
  </main>
</body>

</html>