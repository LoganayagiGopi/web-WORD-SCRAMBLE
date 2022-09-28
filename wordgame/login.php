<?php


$uname = $_POST['uname'];
$pswd = $_POST['pswd']; 

$conn = new mysqli('localhost','root','','wordgame');
if($conn->connect_error){
    die('connection Failed: '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("select * from register where uname = ?");
    $stmt->bind_param("s",$uname,);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0)
    {
      $data=$stmt_result->fetch_assoc();
      
      if($data['pswd'] === $pswd )
      {
         header("Location: http://localhost/wordgame/index.html");  
      }
      else
      {
         echo "<h2>Invalid UserName or Password</h2>";
      }
    }
    else
    {
      echo "<h2>Invalid UserName or Password</h2>";
    }
}
?> 
        
        