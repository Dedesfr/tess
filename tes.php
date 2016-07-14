<?php 
	include"koneksi.php";
	$id = $_REQUEST['nomer'];
	
	 $sql = mysql_query("SELECT * FROM search WHERE id = $id");
	 $row = mysql_fetch_array($sql);
	 echo $row['firstname'].' '.$row['lastname'];


 ?>