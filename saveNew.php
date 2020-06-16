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


  $stmt = $conn->prepare("INSERT INTO list (code, title , author , price , genre) values (?, ? , ? , ? , ?)");

  $stmt->bind_param("issis", $_POST['code'] , $_POST['title'] ,$_POST['author'],$_POST['price'] , $_POST['genre']);
   
  
    $stmt->execute();

   $res = $stmt->get_result();

      if ($res){
      die("Failed : " .$conn->error);
    }

    $conn = null;


   header("Location:/index.php");

   
?>
