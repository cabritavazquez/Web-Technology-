<head>
<title>Edit book</title>
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
  <form method="post" action="/saveEdit.php">

  <h1>Edit book</h1>

  <label for="code"><strong>Code:</strong></label>
  <input type="text" name="code" id="code" value="<?php echo $row["code"]?$row["code"]:""?>"/> 
    </br>

  <label for="title"><strong>Title: </strong> </label>
    <input type="text" name="title" id="title" value="<?php echo $row["title"]?$row["title"]:""?>"/>
    </br>

  <label for="author"><strong>Author: </strong> </label>
    <input type="text" name="author" id="author" value="<?php echo $row["author"]?$row["author"]:""?>"/>
    </br>

  <label for="price"><strong>Price(€): </strong> </label>
    <input type="text" name="price" id="price" value="<?php echo $row["price"]?$row["price"]:""?>"/>
    </br>

  <label for="genre"><strong>Genre: </strong> </label>
    <input type="text" name="genre" id="genre" value="<?php echo $row["genre"]?$row["genre"]:""?>"/>
    <br/><br/>


  <input type="submit" value="Save changes">
  <input type="reset" value="Cancel">
</form>

<div class="uno">
<a href="/index.php">index</a>
</div>

<?php
   $conn = null;
  ?>
