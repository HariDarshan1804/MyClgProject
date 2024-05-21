<?php
  include 'connetion.php';
  session_start();
  $_SESSION['side_menu']="result";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STAS-Student Result</title>

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
            <h1>Result</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Result</li>
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
              <?php 
                    $counter = 1;
                    $qurey = "Select* from student_result_sem2 where id='". $_SESSION['admin_id']."'";
                    $connetion = mysqli_query($connect,$qurey);
                    $row = mysqli_fetch_array($connetion)
                    
                    ?>
              <div class='row'>
                <div class='col-6'>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="Name" class="form-control" id="exampleInputName"  readonly value='<?php echo $row['student_name']?>'>
                </div>
                </div>
                <div class='col-6'>
                <div class="form-group">
                    <label for="exampleInputEmail1">Enrollment No.</label>
                    <input type="email" class="form-control" id="exampleInputEnrollmentNo." readonly value='<?php echo $row['enrollment_no.']?>'>
                    
                </div>
                </div>
              </div>
              <div class='row'>
                <div class='col-6'>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Details</label>
                    <input type="email" class="form-control" id="exampleInputCourseDetails"  readonly value='<?php echo $row['course_name']?>'>
                </div>
                </div>
                <div class='col-6'>
                <div class="form-group">
                    <label for="exampleInputEmail1">Year</label>
                    <input type="email" class="form-control" id="exampleInputYear" readonly value='<?php echo $row['year']?>'>
                </div>
                </div>
              </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th width="12%">Subject Title</th>
                    <th width="12%"> CIE Theory</th>
                    <th width="12%">ESE Theory</th>
                    <th width="10%">Total</th>
                    <th width="12%">CIE Practical</th>
                    <th width="12%">ESE Practical</th>
                    <th width="10%">Total</th>
                    <th width="10%">Subject Grade</th>
                  </tr>
                  </thead>
                  <tbody>
                    

                  <tr>
                  <td>BioChemistry</td> 
                    <td><?php echo $row['biochemistry_theory_cie'];?></td>
                    <td><?php echo $row['biochemistry_theory_ese'];?></td>
                    
                    <td><?php echo $row['total_grade_1'];?></td>
                   
                    <td><?php echo $row['biochemistry_practical_cie'];?></td>
                    <td><?php echo $row['biochemistry_practical_ese'];?></td>
                    <td><?php echo $row['total_grade_5']; ?></td>
                    <td><?php echo $row['subject_grade_5']; ?></td>   
                  </tr>

                  <tr>
                  <td>BioTechnology</td> 
                    <td><?php echo $row['biotechnology_theory_cie'];?></td>
                    <td><?php echo $row['biotechnology_theory_ese'];?></td>
                    
                    <td><?php echo $row['total_grade_2'];?></td>
                    
                    <td><?php echo $row['biochemistry_practical_cie'];?></td>
                    <td><?php echo $row['biochemistry_practical_ese'];?></td>
                    <td><?php echo $row['total_grade_6']; ?></td>
                    <td><?php echo $row['subject_grade_6']; ?></td>   
                  </tr>

                  <tr>
                  <td>Computer Science</td> 
                    <td><?php echo $row['computer_science_theory_cie'];?></td>
                    <td><?php echo $row['computer_science_theory_ese'];?></td>
                    <td><?php echo $row['total_grade_3'];?></td>
                    <td><?php echo $row['computer_science_practical_cie'];?></td>
                    <td><?php echo $row['computer_science_practical_ese'];?></td>
                    <td><?php echo $row['total_grade_7']; ?></td>
                    <td><?php echo $row['subject_grade_7']; ?></td>   
                  </tr>

                  <tr>
                  <td>English</td> 
                    <td><?php echo $row['english_theory_cie'];?></td>
                    <td><?php echo $row['english_theory_ese'];?></td>
                    
                    <td><?php echo $row['total_grade_4'];?></td>
                   
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo $row['subject_grade_4']; ?></td>
                    
                    
                  </tr>
                  
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
