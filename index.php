<?php include 'connetion.php';?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Login</title>
	<!-- header link -->
    <?php include 'includes/header_link.php';?>
	<link rel="stylesheet" type="text/css" href="css/styless.css">
    <!-- header link end -->
		<script type="text/javascript">
    function sem(id){
      if (confirm('are you sure to show')) {
        var tab = 'student_user';
        var file = 'studentdropdown.php';
        window.location.href = "studentdropdown.php?id="+id+'&tabs='+tab+'&file='+file;
      }
    }
	</script>
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/logo.png">
			<h2 class="title">School Of Technology And Applied Sciences</h2>
		</div>
		<div class="login-content">
			<form method='post' action="logincheck.php" >
				<img src="img/avatar.svg">
				<div class="form-group">
                        <label>Select</label>
                        <select class="form-control" name="taskOption">
                          <option value="student_user">Student Login</option>
                          <option value="teacher_user">Teacher Login</option >
                          <option value="principal_user">Principal Login</option>
                          <option value="library_user">Librarian Login</option>
                          <option value="admin_tb">Admin Login</option>
                        </select>
                      </div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username" >
                        
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" >
            	   </div>
            	</div>
            	<a href="forgetpassword.php">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login" href='javascript:void(0)' onclick="sem(<?php echo $row['id'];?>)">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
	
</body>
</html>
