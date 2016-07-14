<?php 
include"koneksi.php";
      if (isset($_POST['nama'])) {
      $searchq = $_POST['nama'];
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
      
           
      

    } ?>
<html>
<head>
  <title>Search</title>
  
  <script src="jquery.min.js"></script>
  <script src="typeahead.min.js"></script>
  <script src="bootstrap.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
   <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
     <style type="text/css">
.bs-example{
  font-family: sans-serif;
  position: relative;
  margin: 50px;
}
.typeahead, .tt-query, .tt-hint {
  border: 2px solid #CCCCCC;
  border-radius: 8px;
  font-size: 24px;
  height: 30px;
  line-height: 30px;
  outline: medium none;
  padding: 8px 12px;
  width: 396px;
}
.typeahead {
  background-color: #FFFFFF;
}
.typeahead:focus {
  border: 2px solid #0097CF;
}
.tt-query {
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
  color: #999999;
}
.tt-dropdown-menu {
  background-color: #FFFFFF;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 8px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
  margin-top: 12px;
  padding: 8px 0;
  width: 422px;
}
.tt-suggestion {
  font-size: 24px;
  line-height: 24px;
  padding: 3px 20px;
}
.tt-suggestion.tt-is-under-cursor {
  background-color: #0097CF;
  color: #FFFFFF;
}
.tt-suggestion p {
  margin: 0;
}
</style>
</head>
<body>
  <div class="row">
      <div class=".col-md-6">
        <div class="jumbotron">
        <h1>Ajax Search Box using Node and MySQL <small>Codeforgeek Tutorial</small></h1>
         <button type="button" class="btn btn-primary btn-lg">Visit Tutorial</button>
      </div>
  </div>
  <div class=".col-md-6">
    <div class="panel panel-default">
    <div class="bs-example">
        
         <!--<input type="text" name="typeahead" class="typeahead tt-query" autocomplete="on" spellcheck="false" placeholder="Type your Query">-->
        <form action="#" method="POST">
          <input type="text" name="nama" class="typeahead tt-query" placeholder="Type your Query" spellcheck="false" autocomplete="on" >
          <input type="submit" value="Search" name="submit">
          </form>
    </div>
  </div>
  </div>
  </div>
</body>
</html>