<?php
include 'connetion.php'; 
session_start();
$_SESSION['side_menu']="library";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STAS-Student Library</title>
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
            <h1 class="m-0">Subject Library</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subject Library</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     <div class="container"> 
        <div class="row ">
            <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                       <th width="12%">ID</th>
                      <th width="12%">Book Name</th>
                      <th width="12%">Book Status</th>
                      <th width="12%">Book Department</th>

                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php 
                    $counter = 1;
                
                    $qurey = " SELECT * from student_library ";
                    $connetion = mysqli_query($connect,$qurey);
                   
                    while( $row = mysqli_fetch_array($connetion)){
                      ?>
                      <tr>
                      <td><?php echo $row['ID'];?></td>
                      <td><?php echo $row['book_name'];?></td>
                      <td><?php echo $row['book_status'];?></td>
                      <td><?php echo $row['book_department'];?></td>
                    </tr>

                    <?php 
                      }
                    ?>
            

              
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            </div>
        </div>
    </div>
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
