<html>
  <head>
    <style>
      textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
        </style>
      <title>Teacher Profile</title>
    </head>
  
   <?php 
$choice = $_POST['tch'];
$host = "localhost";
$user = "postgres";
$pass = "omkar123";
$dbname = "Student";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
if($choice=="View Query")
{

    $query="select * from query";
    $result = pg_query($conn, $query);
    if ($result)
    {
        while($row = pg_fetch_row($result))
        {
        $n= $row[0]." : ".$row[1];
        echo "<br>$n";
        }
    }
}
if($choice=="View Synopsis")
{
  //echo "<form action=viewsynopsis.php method=post>";
  echo "  <center><br><br><br><br><br><h1> View Synopsis</h1></center>";
  $query = "SELECT * FROM synopsis";
$result = pg_query($conn, $query);
if ($result)
{
 
    while($row = pg_fetch_row($result))
    {
    $email=$row[0];
    $synop=$row[1];
    echo "<center><br> Email Id :  '".$email."' <br><br>";
    echo " <img src= '".$synop."'  height= 100% width= 50%><hr><hr></center>";

    }

}

}
if($choice=="Send Suggestion")
{
session_start();
$email= $_SESSION['email'];
  echo "<form action=suggestion.php method=post>";
  
  echo "  <center><br><br><br><br><br><h1> Send Suggestions</h1><label for=Teacher Email Id><b>teacher Email Id:</b></label><br><br><input type=text value = '".$email."' readonly placeholder=Enter email Id name=eid id=eid maxlength=20  size=50 required> <br><br><label for=Suggestions><b>Suggestions:</b></label><br><br> <textarea id=sug name=sug rows=10 cols=80 required></textarea> ";
   echo "  <br><br><input type=submit  value= Suggestions name=e></center>";
  echo "</form>";
}
?>

    </body>
</html>



