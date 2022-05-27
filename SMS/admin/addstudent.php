<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php include('../header.php') ?>

<?php include('admin.header.php') ?>

<div class="container jumbotron">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">Student Information Sheet</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				      Student No.:<input type="text" class="form-control" name="roll" placeholder="Enter Student No." >
				  </div>
				  <div class="form-group">
				    
				    Full Name:<input type="text" class="form-control" name="ullname" placeholder="Full name" required>
				  </div>
				  <div class="form-group">
				      City: <input type="text" class="form-control" name="city" placeholder="Enter City" required>
				  </div>
				  <div class="form-group">
				    
				    Parent Phone No.:<input type="text" class="form-control" name="pphone" placeholder="Enter Parent Phone No." required>
				  </div>
				  <div class="form-group">
				    
				    Yr&Lv:<input type="number" class="form-control" name="standard" placeholder="Enter Yr&Lv" required>
				  </div>

				   <div class="form-group">
				    
				    Student Photo:<input type="file" class="form-control" name="simg" required>
				  </div>

				  <button type="submit" name="submit" class="btn btn-success btn-lg">Done</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>

<?php 

	if (isset($_POST['submit'])) {
		if (!empty($_POST['roll']) && !empty($_POST['fullname'])) {
		
			include ('../dbcon.php');
			$roll=$_POST['roll'];
			$name=$_POST['fullname'];
			$city=$_POST['city'];
			$pphone=$_POST['pphone'];
			$standard=$_POST['standard'];
			include('ImageUpload.php');

			$sql = "INSERT INTO `student`( `rollno`, `name`, `city`, `pcontact`, `standard`,`image`) VALUES ('$roll','$name','$city','$pphone',$standard,'$imgName')";

			$run = mysqli_query($conn,$sql);

			if ($run == true) {
				
				?>
				<script>
					alert("Data Inserted Successfully");
				</script>
				<?php
			} else {
				echo "Error : ".$sql."<br>". mysqli_error($conn); 
			}
		} else {
				?>
				<script>
					alert("Please insert atleast roll no. and fullname");
				</script>
				<?php
		}


	}

 ?>








