<?php
  session_start(); 
  include 'connetion.php';

  if (isset($_POST['submit'])) 
  {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $btn_name = $_POST['btn_name'];
    $btn_link = $_POST['btn_link'];
    $edit_date = date("Y-m-d H:i:s");
    $edit_by = $_SESSION['admin_id'];

  

    $qurey = "update tbl_slider set title='".$title."',description='".$description."',btn_name='".$btn_name."',btn_link='".$btn_link."',edit_date='".$edit_date."',edit_by='".$edit_by."' where id='".$_GET['id']."'";
    $final = mysqli_query($connect,$qurey);

    header('location:slider_list.php');
  }

  $display = "select * from tbl_slider where id='".$_GET['id']."'";
  $result = mysqli_query($connect,$display);
  $row = mysqli_fetch_array($result);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Slider Edit</title>
  <?php include 'includes/header_link.php';?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'includes/top_menu.php';?>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include 'includes/side_menu.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $row['title'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" placeholder="Description" name="description"><?php echo $row['description'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Button name</label>
                    <input type="text" class="form-control" placeholder="Button name" name="btn_name" value="<?php echo $row['btn_name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Button link</label>
                    <textarea class="form-control" placeholder="Button link" name="btn_link"><?php echo $row['btn_link'];?></textarea>
                  </div>
                 <!--  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
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

<?php include 'includes/footer_link.php'?>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
