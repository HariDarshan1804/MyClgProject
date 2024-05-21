<?php
  session_start();
  include 'connetion.php';

  if (isset($_POST['update'])) 
  {
    $icon = $_POST['icon'];
    $name = $_POST['name'];
    $link = $_POST['link'];
    
    $edit_date = date("Y-m-d H:i:s");
    $edit_by = $_SESSION['admin_id'];

    
    $qurey = "update tbl_contact_us set icon='".$icon."',name='".$name."',link='".$link."',edit_date='".$edit_date."',edit_by='".$edit_by."' where id='".$_GET['id']."'";
    $finel = mysqli_query($connect,$qurey);

    header('location:contect_us_list.php');
  }

  $display = "select * from tbl_contact_us where id='".$_GET['id']."'";
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
                    <label for="exampleInputEmail1">Icon</label>
                    <select class="form-control select" name="icon">
                      <?php
                      $counter = 1;
                      $icon_qurey = "select id,name,icon,code from tbl_icon where is_delete='n'";
                      $icon_result = mysqli_query($connect,$icon_qurey);
                      while ($icon_row = mysqli_fetch_array($icon_result)) { 
                      ?>
                      
                      <option value="<?php echo $icon_row['id'];?>" <?php if ($icon_row['id'] == $row['icon']) echo 'selected'; ?>><?php echo $icon_row['code'];?>&nbsp;&nbsp;<?php echo $icon_row['name'];?></option>
                    
                      <?php $counter++; }?>    
                  </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <textarea class="form-control" placeholder="Name" name="name"><?php echo $row['name'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Link</label>
                    <input type="text" class="form-control" placeholder="Link" name="link" value="<?php echo $row['link'];?>">
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

$dko  =  select * from icone=$  