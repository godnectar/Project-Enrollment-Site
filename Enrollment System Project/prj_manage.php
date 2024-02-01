<?php    
$choice = $_POST['p'];

session_start();
$email= $_SESSION['email'];

if($choice=="Add Project")
{
  $host = "localhost";
$user = "postgres";
$pass = "omkar123";
$dbname = "Student";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
$query = "SELECT * FROM projects";
$result = pg_query($conn, $query);
if ($result)
{
$i=0;
    while($row = pg_fetch_row($result))
    {
    $i=$row[0];
   }
   $i++;
}

?>
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
body{
  background-color: skyblue;
}
        </style>
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="register.css">
      <title>Teacher Register</title>
    </head>
  
    <title>Project Registration</title>
    </head>
    <Body>      
  <form action="addproject.php" method="post">
    
  
  <div class="container">
    <centre> <h1> Project Registeration</h1></centre>

    <p><marquee  direction="right">Please fill the form to register Your Project</marquee></p>
    <label for="Project id"><b>Project Id:</b></label>
    <input type="text" placeholder="Enter Project Id" value=<?php echo " $i " ?> name="pid" id="pid" maxlength="20"  size="50" readonly required>
    
    <label for="Project Name"><b>Project Name:</b></label>
    <input type="text" placeholder="Enter Project Name" name="pname" id="ProjectName" maxlength="20"  size="50" required>
    
    <label for="projecttype"><b>Project Type:</b></label>
    <input type="text" placeholder="EnterProjectType" name="ptype" id="ProjectType" maxlength="20"  size="50" required>

    <label for="frontend"><b>Front End:</b></label>
    <input type="text" placeholder="frontend" name="frend" id="frend" maxlength="20"  size="50" required>
    
    <label for="backend"><b>Back End:</b></label>
    <input type="text" placeholder="backend" name="bkend" id="bkend" maxlength="20"  size="50" required>

    <label for="osname"><b>Operating System Used</b></label>
    <input type="text" placeholder="os" name="os" id="os" maxlength="20"  size="50" required>

    <label for="servername"><b>Server Used</b></label>
    <input type="text" placeholder="servername" name="server" id="server" maxlength="20"  size="50" required>

    <label for="nstudents"><b>Number of Students</b></label>
    <input type="text" placeholder="nstudents" name="ns" id="ns" maxlength="20"  size="50" required>
   
    <label for="status"><b>Status </b></label>
    <input type="text" placeholder="status" name="status" id="status" maxlength="20"  size="50" required>
   
    <label for="pguide"><b>Project Guide </b></label>
    <input type="text" placeholder="projectguide" name="pg" id="pg" maxlength="20"  size="50" required>
   
    <label for="studs">Choose Student's Names</label>
<?php 
    $host = "localhost";
$user = "postgres";
$pass = "omkar123";
$dbname = "Student";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
$query = "SELECT * FROM sregister";
$result = pg_query($conn, $query);
if ($result)
{
 // display user's profile data on the page
 echo "<select name=stud[]  multiple>";
    while($row = pg_fetch_row($result))
    {
    $n= $row[0]."_".$row[1]."_".$row[2];
    echo " <option value=.$n.>".$n."</option>";
    }
    echo "</select>";
}
?>
    <button type="submit" class="registerbtn">Register</button>
  </div>

</form>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>

<?php
}


if($choice=="Update Project")
{
  echo"<br><br><br>";
  echo "<body style=background-color:skyblue>";  
  echo "<form action=editproject.php method=post>";
  echo "  <center><br><br><br><br><br> <h1> Project Updation</h1>";
  echo "  <label for=Project id><b>Project Id:</b></label>";
  echo "  <input type=text placeholder=Enter Project Id name=pid id=pid maxlength=20  size=50 required>";
  echo "  <br><br><input type=submit  value= EditProject name=e></center>";
  echo "</form></body></html>";
}
if($choice=="Delete Project")
{
  echo"<br><br><br>";
  echo "<body style=background-color:skyblue>"; 
  echo "<form action=confirm.php method=post>";
  echo "  <input type=text placeholder=Enter Project Id name=pid id=pid maxlength=20  size=50 required>";
  echo "  <br><br><input type=submit  value= DeleteProject name=e></center>";
  echo "</form>";
}
if($choice=="Upload Synopsis")
{
  echo"<br><br><br>";
  echo "<center><body style=background-color:skyblue>"; 
  echo "<form action=addsynopsis.php method=post>";
  echo "  <input type=text name=email maxlength=50  value ='".$email."' size=50 required readonly> ";
  echo " <br><br><br><br><br><br><br><br> Upload Synopsis File In JPG / PNG Format <br><br>";
  echo"<input type=file name=f id=file size=35><br><br><br><br><br>";
  echo"<input type=submit name=e id=submit value=Upload_Synopsis>";
  echo "</form>";
}
if($choice=="Ask Query")
{
  echo"<br><br><br>";
  echo "<body style=background-color:skyblue>"; 
  echo "<form action=query.php method=post>";
  echo "  <center><br><br><br><br><br><h1> Send Query</h1><label for=Teacher Email Id><b>Teacher Email Id:</b></label><br><br><input type=text placeholder=Enter email Id name=eid id=eid maxlength=20  size=50 required> <br><br><label for=query><b>Query:</b></label><br><br> <textarea id=sug name=que rows=10 cols=80 required></textarea> ";
   echo "  <br><br><input type=submit  value= AskQuery name=e></center>";
  echo "</form>";
}
if($choice=="Check Suggestion")
{
  echo"<br><br><br>";
  echo "<body style=background-color:skyblue>"; 
	$host = "localhost";
	$user = "postgres";
	$pass = "omkar123";
	$dbname = "Student";

	$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");	
    $query="select * from suggest";
    $result = pg_query($conn, $query);
    
    if ($result)
    {
      
    while($row = pg_fetch_row($result))
    {
    echo "<br> $row[0] ::: $row[1]";
    }
    }

  }
  
?>