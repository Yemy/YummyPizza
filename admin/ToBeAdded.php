<?php
 $sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid, tblbooks.nofbooks from  tblbooks WHERE CatId = '5' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

  ?>


     <!--  .hovme:hover{
        <?php $sql /*= "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid, tblbooks.nofbooks from  tblbooks WHERE CatId = '5' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ*/);
?>
    } -->




											<td><?php 
					$db = new PDO("mysql:host=localhost;dbname=library", "root", "");
					$stmt = $db->prepare("select * from tblcategory where id = 4");
					$stmt->execute();
					while($row=$stmt->fetch()){					
					 ?>					 	
					 </td> <?php } ?>