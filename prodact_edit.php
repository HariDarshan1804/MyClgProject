<?php
  session_start();
  include 'connetion.php';

  if (isset($_POST['update'])) 
  {
    $title = $_POST['title'];
    $discount = $_POST['description'];
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
    move_uploaded_file($tempname,"image/".$nam. "." .$ext);
    $final = $nam. "." .$ext;
    $category_id = $_POST['category_id'];
    $edit_date = date("Y-m-d H:i:s");
    $edit_by = $_SESSION['admin_id'];

    


    if (!empty($_FILES['image']['name']))  {
        $qurey = "update tbl_prodact set title='".$title."',description='".$description."',price='".$price."',btn_link='".$btn_link."',image='".$final."',category_id='".$category_id."',edit_date='".$edit_date."',edit_by='".$edit_by."' where id='".$_GET['id']."'";
      }else{
        $qurey = "update tbl_prodact set title='".$title."',description='".$description."',price='".$price."',btn_link='".$btn_link."',category_id='".$category_id."',edit_date='".$edit_date."',edit_by='".$edit_by."'  where id='".$_GET['id']."'";
      }
    

    $finel = mysqli_query($connect,$qurey);

    header('location:prodact_list.php');
  }

  $display = "select * from tbl_prodact where id='".$_GET['id']."'";
  $result = mysqli_query($connect,$display);
  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Prodact Edit</title>
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
            <h1>Prodact Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Prodact Edit</li>
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
                    <label for="exampleInputPassword1">description</label>
                    <textarea class="form-control" placeholder="Discount" name="description"><?php echo $row['description'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">price</label>
                    <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $row['price'];?>">
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
                  <div class="form-group">
                    <select class="form-control" name="category_id">
                      <option>Select Category</option>
                      <?php 
                      $prodact_qurey = "select id,name from tbl_prodact_category where is_delete='n'";
                      $prodact_connetion = mysqli_query($connect,$prodact_qurey);
                      while ($prodact_row = mysqli_fetch_array($prodact_connetion)) {

                      ?>
                      <option value="<?php echo $prodact_row['id'];?>" <?php if($prodact_row['id']==$row['category_id']){ echo "selected";}?>><?php echo $prodact_row['name'];?></option>
                    <?php } ?>
                    </select>
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
</script>
</body>
</html>
