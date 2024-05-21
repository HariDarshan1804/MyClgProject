<?php
  session_start();
  include 'connetion.php';

  if (isset($_POST['update'])) 
  {
    $title = $_POST['title'];
    $discount = $_POST['discount'];
    $btn_name = $_POST['btn_name'];
    $btn_link = $_POST['btn_link'];

    $image = $_FILES['image']['name'];
    $tempname = $_FILES["image"]["tmp_name"];
    $image_size = $_FILES["image"]["size"];
    $image_type = $_FILES["image"]["type"];
    $min_rand = rand(0,1000);
    $max_rand = rand(100000000000,10000000000000000);
    $nam = rand($min_rand,$max_rand);
    $ext =end(explode(".", $image));
    move_uploaded_file($tempname,"image/".$nam. "." .$ext); 
    $final = $nam. "." .$ext;
    $edit_date = date("Y-m-d H:i:s");
    $edit_by = $_SESSION['admin_id'];

    


    if (!empty($_FILES['image']['name']))  {
        $qurey = "update tbl_discount set title='".$title."',discount='".$discount."',btn_name='".$btn_name."',btn_link='".$btn_link."',image='".$final."',edit_date='".$edit_date."',edit_by='".$edit_by."' where id='".$_GET['id']."'";
      }else{
        $qurey = "update tbl_discount set title='".$title."',discount='".$discount."',btn_name='".$btn_name."',btn_link='".$btn_link."',edit_date='".$edit_date."',edit_by='".$edit_by."'  where id='".$_GET['id']."'";
      }
    

    $finel = mysqli_query($connect,$qurey);

    header('location:discount_list.php');
  }

  $display = "select * from tbl_discount where id='".$_GET['id']."'";
  $result = mysqli_query($connect,$display);
  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Discount Edit</title>
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
            <h1>Discount Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Discount Edit</li>
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
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $row["title"];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">discount</label>
                    <textarea class="form-control" placeholder="Discount" name="discount"><?php echo $row['discount'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Button name</label>
                    <input type="text" class="form-control" placeholder="Button name" name="btn_name" value="<?php echo $row['btn_name'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Button link</label>
                    <textarea class="form-control" placeholder="Button link" name="btn_link"><?php echo $row['btn_link'];?></textarea>
                  </div>
                 <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <input type="file" name="image" class="form-control" id="imgInp" value="<?php echo $row['image'];?>">
                    <img id="blah" src="#" alt="select image" width="10%" >
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="update" value="Submit">
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
