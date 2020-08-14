<?php 
require_once("includes/config.php");
// code user cid availablity
if(!empty($_POST["cid"])) {
	$cid= $_POST["cid"];
	if (filter_var($cid, FILTER_VALIDATE_cid)===false) {

		echo "error : Invalid cid. Please Try agian!";
	}
	else {
		$sql ="SELECT cid FROM customer WHERE cid=:cid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':cid', $cid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> cid already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> cid available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}


?>
