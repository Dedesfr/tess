<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","dede");
    $db=mysql_select_db("travel",$con);
    $query=mysql_query("select * from search where firstname LIKE '%{$key}%' OR lastname LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $fname = $row['firstname'];
      $lname = $row['lastname'];
      $array[] = $fname.' '.$lname;
    }
    echo json_encode($array);

if (isset($_GET['nama'])) {
      $searchq = $_GET['nama'];
      $searchq = preg_replace("#[^0-9a-z]#i","", $searchq);
      $query=mysql_query("select * from search where firstname LIKE '%{$searchq}%' OR lastname LIKE '%{$searchq}%'");
      $count = mysql_num_rows($query);
      if ($count == 0) {
        echo "ga ada orang";
      }
      else{
      while($row = mysql_fetch_array($query)){
      $id = $row['id'];
      header("Location: tes.php?nomer=".$id);  
    }
  }
    }
?>
