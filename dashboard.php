<?php
include 'connetion.php'; 
session_start();
$_SESSION['side_menu']="student_profile";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STAS-Student Dashboard</title>
<?php include 'includes/header_link.php';?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include 'includes/top_menu.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include 'includes/side_menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- Profile Image -->
         <div class = "col-12" >
         <?php 

         $id =  $_SESSION['admin_id'];
                    $qurey = "Select * from student_profile where id='".$id."'" ;
                    $connetion = mysqli_query($connect,$qurey);
                    $row = mysqli_fetch_array($connetion);
                    ?>
         <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="student_img/studentimg.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row['name'];?></h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>School Of Technology And Applied Science</b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $row['department'];?></h3></b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $row['gender'];?></h3></b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $row['email'];?></h3></b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $row['mobile_no'];?></h3></b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $row['dob'];?></h3></b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $row['father_name'];?></h3></b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $row['father_occupation'];?></h3></b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b><?php echo $row['mother_name'];?></h3></b> <a class="float-right"></a>
                  </li>
                  
                  <li class="list-group-item">
                    <b><?php echo $row['mother_occupation'];?></h3></b> <a class="float-right"></a>
                  </li>

                </ul>

              </div>
              <!-- /.card-body -->
          </div>
         </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include 'includes/footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include 'includes/footer_link.php';?>
</body>
</html>
