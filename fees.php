<?php
  include 'connetion.php';
  session_start();
  $_SESSION['side_menu']="fees";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STAS-Student Fees</title>

  <?php include 'includes/header_link.php';?>
  <script type="text/javascript">
    function del(id){
      if (confirm('are you sure to delete')) {
        window.location.href = "prodact_delete.php?id="+id;
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
            <h1>Fees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Fees</li>
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
              </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th width="12%">Student Name</th>
                  <th width="12%">Student Enroll No.</th>
                  <th width="12%">Amount</th>
                    <th width="12%"> Semester</th>
                    <th width="12%">Receipt Date</th>
                    <th width="12%">Payment Type</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $counter = 1;
                
                    $qurey = " SELECT student_fees.fees_id,student_fees.amount,student_fees.semester,student_fees.date,student_fees.payment_mode,student.stu_id,student.student_name,student.student_enrollno FROM student_fees INNER JOIN student ON student_fees.stu_id = student.stu_id AND student_fees.stu_id = '". $_SESSION['admin_id']."'";
                    $connetion = mysqli_query($connect,$qurey);
                   
                    while( $row = mysqli_fetch_array($connetion)){

                    
                    ?>
            
                  <tr>
                 
                    <td><?php echo $row['student_name'];?></td>
                    <td><?php echo $row['student_enrollno'];?></td>
                    <td><?php echo $row['amount'];?></td>
                    <td><?php echo $row['semester'];?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['payment_mode']; ?></td>   
                  </tr>

                      <?php
                    }
                      ?>

                
                 
                 
                 
     </tbody>
                  <tfoot>
                  
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
    $("#example1")({
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
