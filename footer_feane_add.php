<?php
  session_start(); 
  include 'connetion.php';

  if(isset($_POST['submit'])) 
  {
    $icon = $_POST['icon'];
    $link = $_POST['link'];
    $add_date = date("Y-m-d H:i:s");
    $add_by = $_SESSION['admin_id'];


    $qurey = "insert into tbl_footer_feane(icon,link,add_date,add_by) values('".$icon."','".$link."','".$add_date."','".$add_by."')";
    $row = mysqli_query($connect,$qurey);


    header('location:footer_feane_list.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Contect Us Add</title>
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
            <h1>Footer Feane Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Footer Feane Add</li>
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
                    <label for="exampleInputEmail1">Icon</label>
                    <select class="form-control select" name="icon">
                      <?php
                      $icon_qurey = "select id,name,icon,code from tbl_icon";
                      $icon_result = mysqli_query($connect,$icon_qurey);
                      while ($icon_row = mysqli_fetch_array($icon_result)) { 
                      ?>
                      <option value="<?php echo $icon_row['id'];?>"><?php echo $icon_row['code'];?>&nbsp;&nbsp;<?php echo $icon_row['name'];?></option>
                      <?php } ?>    
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Link</label>
                    <input type="text" class="form-control" placeholder="Link" name="link">
                  </div>
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
