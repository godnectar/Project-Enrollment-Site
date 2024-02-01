<?php
// establish database connection
$host = "localhost";
$user = "postgres";
$pass = "omkar123";
$dbname = "Student";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
    $name="";
$e="";
// get user's profile data from the database
session_start();
$email= $_SESSION['email'];
$query = "SELECT * FROM tregister WHERE email='".$email."' ";
$result = pg_query($conn, $query);
if ($result)
{
 // display user's profile data on the page
    while($row = pg_fetch_row($result))
    {
    $name= $row[0] . " ".$row[1]. " ".$row[2];
    $e=$row[5];
    $r=$row[6];
   }
}
 else
  {
    echo "Error: " . pg_last_error($conn);
} 
?>


<!DOCTYPE html>

<html>
<head>
<meta charset="ISO-8859-1">
<title>My Profile</title>
<style >
input[type=text], input[type=password], textarea 
{  
  width: 20%;  
  height:55px;
  border: none;  
  background: #f1f1f1;  
  margin-bottom :50px;
  
}  
body{
  font-size:medium;
}
.hello{
  
  background-color: linear-gradient(to right, #1da1f2, #76FF7A );     
  animation-name: example;
  animation-duration: 10s;
  border: 1px solid black;
  width: 90%;
  height: 105px; 
  margin-top: 10px;
  margin-left: 5%;
  margin-bottom:20px;
}

@keyframes example {
  from {background-color:#98FB98;}
  to {background-color: #FFA07A;}
}
table {
            width:  100%;
            height:  50%;
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
        }
        .scrollingTable {
          height: 50%;
            width: 50em;
            overflow-y: auto;
        }
    </style>
    </head>
<body>
<script type="text/javascript">
        function makeTableScroll() {
            // Constant retrieved from server-side via JSP
            var maxRows = 10;

            var table = document.getElementById('myTable');
            var wrapper = table.parentNode;
            var rowsInTable = table.rows.length;
            var height = 0;
            if (rowsInTable > maxRows) {
                for (var i = 0; i < maxRows; i++) {
                    height += table.rows[i].clientHeight;
                }
                wrapper.style.height = height + "px";
            }
        }
    </script>

<body onload="makeTableScroll();">
    
    <div style="border: 1px solid black; width: 99.6%; height: 80px;background-color:#6699CC;color:white; text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
    <b>PROFILE</b>
    </div>
    <div style="border: 1px solid black; width: 20%; height: 800px; float: left;background-color: #E0FFFF;">
   <br>
   <br>
   <br>
   <div>
    <center><img src="user.png" height = "100px" width="100" alt="icon">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    &nbsp;&nbsp;Name: <?php echo " $name" ?>
    <br><br>
    &nbsp;&nbsp;Contact no: <?php echo " $r" ?>
    <br><br>
    &nbsp;&nbsp;Email: <?php echo "$e" ?>
    <br> <br> <br> <br>
      <br> <br>
      <br> <br>
      <br> <br>
      <br> <br>
    </div>
    </div></center>
    
    
    <div style="border: 1px solid black; width: 79.5%; height: 800px; float: left;background-color:#F0FFFF">
    
    
    <br><br><br><br><br><br><br><br><br><br><br><br>
        <center>
        <font size="10">  <u>Project Details</u></font>
        <br><br>
    <div class="scrollingTable">
          <table id="myTable">
         
      <?php
        $q = "SELECT * FROM projects ";
        $r = pg_query($conn, $q);
        if ($r) 
        {
              
         
         echo "<hr><thead><tr><th>Project ID</th><th>Project Name </th><th>Project Type</th><th>Project Front </th> <th>Project Back</th><th>Project OS </th><th>Project Server </th><th>Students </th><th>Project Status </th><th>Project Guide </th></tr>";
         while($row = pg_fetch_row($r))
          {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[8]</td><td>$row[9]</td></tr>";
          }
        echo "</table></div>";
        }
        
      pg_close($conn);
      ?>
      </center>


          <Br><Br><Br><Br><Br>
        <center>
          <form action="tch_manage.php" method="post">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit"  value="View Query" name="tch">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit"  value="Send Suggestion" name="tch">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit"  value="View Synopsis" name="tch">
         
          </form>
        </center>

    </div>
    
    
   &nbsp;&nbsp;&nbsp;&nbsp;
   
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</body>
</html>
