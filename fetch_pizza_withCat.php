<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>Yuumy Online Pizza Ordering System</title>
	<!-- BOOTSTRAP CORE STYLE  -->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONT AWESOME STYLE  -->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- DATATABLE STYLE  -->
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<!-- CUSTOM STYLE  -->
	<link href="assets/css/style.css" rel="stylesheet" />
	<!-- GOOGLE FONT -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!-- <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
	<!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
<?php include('includes/header.php');?>
    <style>
        #BookA:hover{
            background-color: #48d1cc;
            cursor: pointer;
        }
    </style>
</head>

<body>
	<div id="jquery-script-menu">
		<div class="jquery-script-center">
			<div class="jquery-script-ads"><script type="text/javascript"><!--
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script></div>
			<div class="jquery-script-clear"></div>
		</div>
	</div>
		<div id="mytable" class="container" style="margin-top:150px;">
				<h1>List of Available Pizza Based on Categories</h1>
			<table id="table_format" class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Category Name</th>
					<th>Status</th>
					<th>Creation Date</th>
					<th>Udate Date</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$db = new PDO("mysql:host=localhost;dbname=yummy pizza", "root", "");
					$stmt = $db->prepare("select * from categories");
					$stmt->execute();
					while($row=$stmt->fetch()){
				 ?>
				 <tr>
					<td> <?php 
					$catid = $row['id']; 
					echo $row['id'] ?></td>

					<td data-href = "fetch_pizza.php" id="BookA">  <?php echo $row['catname'] ?> </td>
					<td  class="center"><?php if($row['status']==1) { ?>
                                            <a href="#" class="btn btn-success btn-xs">Active</a>
                                            <?php } else {?>
                                            <a href="#" class="btn btn-danger btn-xs">Inactive</a>
                                            <?php } ?></td>
					<td> <?php echo $row['createddate'] ?></td>	
				 </tr>
				<?php
				}
			  ?>
			</tbody>
		</table>
	</div>
	<?php include('includes/footer.php');?>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="ddtf.js"></script>
<script>
jQuery('#table_format').ddTableFilter();
</script>
<script type="text/javascript">
	$('mytable').ddTableFilter();

	document.addEventListener('DOMContentLoaded', () =>{
		const rows = document.querySelectorAll("td[data-href]");
		rows.forEach(row => {
			row.addEventListener("click", () =>{
				window.location.href = row.dataset.href;
			});
		});
	});

	// $(document).ready(function (){
	// 	$(document.td).on("click", "td[data-href", function (){
	// 		window.location.href = this.dataset.href;
	// 	});
	// });

</script>
</body>
</html>
<?php } ?>
