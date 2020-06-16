<head>
<title>Book</title>
<link rel = "stylesheet" type= "text/css" href="css/style.css">
</head>

<?php

 
   $host = "127.0.0.1";
   $username = "root";
   $password = "Myp4ss00";
   $database = "Web";
   
$conn = new mysqli ($host, $username, $password, $database);
if ($conn->connect_errno) {
    echo "Failed conex to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    echo $mysqli->host_info . "\n";
}

  $stmt = $conn->prepare("SELECT * from list where code=?");

  $stmt->bind_param("i", $_GET['code']);

  
   $stmt->execute();
   $rows = $stmt->get_result();
   
   if (!$rows)
    die ($conn->error);
   
   $row=$rows->fetch_assoc();
  ?>
<h1>Details</h1>

<table>
  <tr>
    <th><strong>title: </strong></th><th><?php echo $row["title"] ?></th>
  </tr>
  <tr>
    <th><strong>author: </strong></th><th><?php echo $row["author"] ?></th>
  </tr>   
  <tr>
    <th><strong>code: </strong></th><th><?php echo $row["code"] ?></th>
  </tr>
  <tr>
    <th><strong>price(€): </strong></th><th><?php echo $row["price"] ?></th>
  </tr> 
  <tr>
    <th><strong>genre: </strong></th><th><?php echo $row["genre"] ?></th>
  </tr> 
</table>


 <br/>
<div class="uno">
  <a href="/index.php">index</a>
</div>

<?php
   $conn = null;
  ?>
