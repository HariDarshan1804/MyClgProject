<?php
  include 'connetion.php';
  session_start();
  $_SESSION['side_menu']="discount";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Discount</title>

  <?php include 'includes/header_link.php';?>
  <script type="text/javascript">
    function del(id){
      if (confirm('are you sure to delete')) {
        window.location.href = "discount_delete.php?id="+id;
      }
    }
  </script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'includes/top_menu.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'includes/side_menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Discount List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Discount List</li>
              <br>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <a href="Discount_add.php" class="btn btn-primary mb-3">Add</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="5%">No.</th>
                    <th>Image</th>
                    <th width="25%">Title</th>
                    <th width="20%">Discount</th>
                    <th width="10%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $counter = 1;
                    $qurey = "select id,title,discount,image from tbl_discount where is_delete='n' order by id desc";
                    $connetion = mysqli_query($connect,$qurey);
                    while($row = mysqli_fetch_array($connetion))
                    {
                    ?>

                  <tr>
                    <td><?php echo $counter;?></td>
                    <td>
                      <img src="image/<?php echo $row['image'];?>"  alt="image" width="30%" >
                    </td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['discount'];?></td>
                    <td><a href="discount_edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="javascript:void(0)" onclick="del(<?php echo $row['id'];?>)" class="btn btn-danger btn-sm">  &nbsp;<i class="fa fa-trash-o"></i></a></td>
                    
                  </tr>
                  <?php $counter++; }?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'includes/footer.php';?>
  <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include 'includes/footer_link.php'?>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
