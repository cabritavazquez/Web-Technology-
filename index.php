<head>
<title>WT</title>

   <link rel = "stylesheet" type= "text/css" href="css/style.css">

   

</head>



<?php
    //require_once('queryFunctions.php');
 
   $host = "127.0.0.1";
   $username = "root";
   $password = "Myp4ss00";
   $database = "Web";
   
$conn = new mysqli ($host, $username, $password, $database);
if ($conn->connect_errno) {
    echo "Failed conex to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    echo $mysqli->host_info . "\n";
}

$sql = "SELECT title, code from list"

?>


<h1>Books List</h1>
<table>
  <thead>
    <tr>
      <th>Title</th>
      <th>Url</th>
      <th>. . .</th>
      <th>. . .</th>
    </tr>
  </thead>

<?php
   $rows = $conn->query($sql);
   if (!$rows)
    die ($conn->error);
   foreach ($rows as $row)
    {
    echo '<tr>
            <td>'.$row["title"].'</td>
            <td><a href="details.php?code='.urlencode($row["code"]).'">See details</a></td>
            <td><a href="edit.php?dni='.urlencode($row["code"]).'">Edit </a></td>
            <td><a href="delete.php?code='.urlencode($row["code"]).'">Delete </a></td>

      </tr>';
    }

   echo "</table>";
   $conn = null;
?>

<br/></br> 
  <div class="uno">
    <form method="post" action="new.php">
      <input type="submit" value="Add a new book"/>
    </form>
  </div>
