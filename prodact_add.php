<?php
  session_start(); 
  include 'connetion.php';

  if(isset($_POST['submit'])) 
  {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $btn_link = $_POST['btn_link'];

    $image = $_FILES['image']['name'];
    $tempname = $_FILES["image"]["tmp_name"];
    $image_size = $_FILES["image"]["size"];
    $image_type = $_FILES["image"]["type"];
    $min_rand = rand(0,1000);
    $max_rand = rand(100000000000,10000000000000000);
    $nam = rand($min_rand,$max_rand);
    $ext =end(explode(".", $image));
    move_uploaded_file($tempname,"image/".$nam.".".$ext);
    $final = $nam. "." .$ext;

    $category_id = $_POST["category_id"];
    $add_date = date("Y-m-d H:i:s");
    $add_by = $_SESSION['admin_id'];


    $qurey = "insert into tbl_prodact(title,description,price,btn_link,image,category_id,add_date,add_by) values('".$title."','".$description."','".$price."','".$btn_link."','".$final."','".$category_id."','".$add_date."','".$add_by."')";
    $row = mysqli_query($connect,$qurey);


    header('location:prodact_list.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Prodact Add</title>
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
            <h1>Prodact Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Prodact Add</li>
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
                    <input type="text" class="form-control" placeholder="Title" name="title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" placeholder="Description" name="description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Price</label>
                    <input type="text" class="form-control" placeholder="price" name="price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Button link</label>
                    <textarea class="form-control" placeholder="Button link" name="btn_link"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile" id="imgInp">image</label>
                    <input type="file" class="form-control" name="image" id="imgInp">
                    <img id="blah" src="#" alt="select image" width="10%" >
                  </div>
                  <div class="form-group">
                    <label>category</label>
                    <br>
                    <select name="category_id" class="form-control">
                      <option value="">Select category</option>
                      <?php
                      $prodact_qurey = "select id,name from tbl_prodact_category where is_delete='n'";
                      $prodact_connetion = mysqli_query($connect,$prodact_qurey);
                      while ($prodact_row = mysqli_fetch_array($prodact_connetion)) {
                      ?>
                      <option value="<?php echo $prodact_row['id'];?>"><?php echo $prodact_row['name'];?></option>
                    <?php } ;?>
                    </select>
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