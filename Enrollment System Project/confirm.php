<!DOCTYPE html>

<html>
<head>
<meta charset="ISO-8859-1">
<title>My Profile</title>
<style >
  
input
{

}

body{ font-size:larger;}
</style>
</head>
<body>
<?php

$pid = $_POST['pid'];
$host = "localhost";
$user = "postgres";
$pass = "omkar123";
$dbname = "Student";
$conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
$name="";
$n="";
$query = "SELECT * FROM projects WHERE pid=".$pid."";
$result = pg_query($conn, $query);
if ($result)
{   
echo"<form action=deleteproject.php method=post>";
    echo"<center>";
    echo"<table>";
       
    while($row = pg_fetch_array($result))
    {

        echo " <tr><td><label for=Project id><b>Project Id  :</b></label></td><td><input type=text  value=".$row[0]." placeholder=Enter Project Id name=pid id=ProjectName maxlength=20  size=50   readonly ></td></tr>";    
        echo " <tr><td></td><td></td></tr>";
        echo " <tr><td><label for=Project Name><b>Project Name  :</b></label></td><td><input type=textarea  value=".$row[1]."  name=pname  maxlength=50  size=50 ></td></tr>";    
        echo " <tr><td></td><td></td></tr>";
        echo " <tr><td><label for=projecttype><b>Project Type  :</b></label></td><td><input type=text value=".$row[2]." placeholder=EnterProjectType name=ptype id=ProjectType maxlength=20  size=50 required></td></tr>";       
        echo " <tr><td></td><td></td></tr>";
        echo " <tr><td><label for=frontend><b>Front End:</b></label></td><td><input type=text value=".$row[3]." placeholder=frontend name=frend id=frend maxlength=20  size=50 required></td></tr>";
        echo " <tr><td></td><td></td></tr>";
        echo "  <tr><td><label for=backend><b>Back End:</b></label></td><td><input type=text value=".$row[4]." placeholder=backend name=bkend id=bkend maxlength=20  size=50 required></td></tr>";
        echo " <tr><td></td><td></td></tr>";
        echo "  <tr><td><label for=osname><b>Operating System Used</b></label></td><td><input type=text value=".$row[5]." placeholder=os name=os id=os maxlength=20  size=50 required></td></tr>";
        echo " <tr><td></td><td></td></tr>";
        echo "  <tr><td><label for=servername><b>Server Used</b></label></td><td><input type=text value=".$row[6]." placeholder=servername name=server id=server maxlength=20  size=50 required></td></tr>";
        echo " <tr><td></td><td></td></tr>";
        echo "  <tr><td><label for=nstudents><b>Number of Students</b></label></td><td><input type=text value=".$row[7]." placeholder=nstudents name=ns id=ns maxlength=20  size=50 required></td></tr>";
        echo " <tr><td></td><td></td></tr>";
        echo " <tr><td><label for=status><b>Status </b></label></td><td><input type=text value=".$row[8]." placeholder=status name=status id=status maxlength=20  size=50 required></td></tr>";
        echo " <tr><td></td><td></td></tr>";
        echo " <tr><td><label for=pguide><b>Project Guide </b></label></td><td><input type=text  value=".$row[9]." placeholder=projectguide name=pg id=pg maxlength=20  size=50 required></td></tr>";
               echo "</table>";
               echo " <label for=studs><b>Choose Students Names</b></label><br><br>";
               pg_close($conn);
            
            $conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
            session_start();
            $email= $_SESSION['email'];
            $query = "SELECT * FROM prj_studlist where pid=".$pid." ";
            $result = pg_query($conn, $query);
            if ($result)
            {
                while($row = pg_fetch_row($result))
                {
                $n= $n.'  '.$row[1];
                }
               
            }
            pg_close($conn);
            echo"<br><br><br>";
            echo "<button type=submit class=registerbtn>DeleteProject</button>";
            echo"</center>";
            echo "</form>";
    }  
}

?>
 </div>
</body>
</html>