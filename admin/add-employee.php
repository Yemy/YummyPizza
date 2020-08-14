<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['create']))
{
$employee=$_POST['employee'];
$email=$_POST['email'];
$password=$_POST['password'];
$salary=$_POST['salary'];
$phoneno=$_POST['phoneno'];
$status=$_POST['status'];

$sql = "INSERT INTO `employees` (`eid`, `ename`, `email`, `password`, `salary`, `startdate`, `enddate`, `phoneno`, `status`) VALUES (NULL, :employee, :email, :password, :salary, CURRENT_TIMESTAMP, NULL, :phoneno, :status);";

$query = $dbh->prepare($sql);
$query->bindParam(':employee',$employee,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':salary',$salary,PDO::PARAM_STR);
$query->bindParam(':phoneno',$phoneno,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Employee Added successfully";
header('location:manage-employees.php');
}
else 
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:manage-employees.php');
}

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="employee" content="" />
    <title>Yummy Pizza Online Order System| Add employee</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Employee</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Employee Info
</div>
<div class="panel-body">
<form role="form" method="post">
<div class="form-group">
<label>Employee Name</label>
<input class="form-control" type="text" name="employee" autocomplete="off"  required />
<label>Email</label>
<input class="form-control" type="text" name="email" autocomplete="off"  required />
<label>Password</label>
<input class="form-control" type="password" name="password" autocomplete="off"  required />
<label>Phone No</label>
<input class="form-control" type="text" name="phoneno" autocomplete="off"  required />
<label>Salary</label>
<input class="form-control" type="text" name="salary" autocomplete="off"  required />
<label>Status</label>
<input class="form-control" type="text" name="status" autocomplete="off"  required />
</div>

<button type="submit" name="create" class="btn btn-info">Add </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
