<?php
  session_start();
  include 'connetion.php';

  if (isset($_POST['update'])) 
  {
    $name = $_POST['name'];
    $icon = $_POST['icon'];
    $code = $_POST['code'];
    
    $edit_date = date("Y-m-d H:i:s");
    $edit_by = $_SESSION['admin_id'];

    
    $qurey = "update tbl_icon set name='".$name."',icon='".$icon."',code='".$code."',edit_date='".$edit_date."',edit_by='".$edit_by."' where id='".$_GET['id']."'";
    $final = mysqli_query($connect,$qurey);

    header('location:icon_list.php');
  }

  $display = "select * from tbl_icon where id='".$_GET['id']."'";
  $result = mysqli_query($connect,$display);
  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Contact icon Edit</title>
  <?php include 'includes/header_link.php';?>
  <style type="text/css">
    .select {
      font-family: 'FontAwesome', 'sans-serif';
    }
  </style>
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
            <h1>Contact Us Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact Us Edit</li>
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
                    <label for="exampleInputEmail1">Name</label>
                   <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $row['name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Icon</label>
                    <input type="text" class="form-control" placeholder="Icon" name="icon" value="<?php echo $row['icon'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Code</label>
                    <input type="text" class="form-control" placeholder="Uni Code" name="code" value="<?php echo $row['code'];?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="update" value="submit">
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


 // image_javascript
 imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
</body>
</html>
