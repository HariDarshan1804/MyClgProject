<?php
  session_start();
  include 'connetion.php';

  if (isset($_POST['update'])) 
  {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $persons = $_POST['persons'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $edit_date = date("Y-m-d H:i:s");
    $edit_by = $_SESSION['admin_id'];

    $qurey = "update tbl_book set name='".$name."',number='".$number."',persons='".$persons."',email='".$email."',date='".$date."',edit_date='".$edit_date."',edit_by='".$edit_by."' where id='".$_GET['id']."'";
    
    $finel = mysqli_query($connect,$qurey);

    header('location:book_list.php');
  }

  $display = "select * from tbl_book where id='".$_GET['id']."'";
  $result = mysqli_query($connect,$display);
  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Book List Edit</title>
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
            <h1>Book List Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Book List Edit</li>
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
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $row["name"];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Number</label>
                    <input type="Number" class="form-control" placeholder="Phone Number" name="number" value="<?php echo $row["number"];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $row['email'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Persons</label>
                      <select class="form-control nice-select wide" name="persons">
                          <option value="1" disabled selected>
                            How many persons?
                          </option>
                          <option value="2">
                            2
                          </option>
                          <option value="3">
                            3
                          </option>
                          <option value="4">
                            4
                          </option>
                          <option value="5">
                            5
                          </option>
                      </select>
                  </div>
                 <div class="form-group">
                    <label for="exampleInputFile">Date</label>
                    <input type="date" name="date" class="form-control"  value="<?php echo $row['date'];?>">
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
