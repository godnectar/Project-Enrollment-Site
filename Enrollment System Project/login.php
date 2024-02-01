<?php
$email=$_POST['email'];
$password=$_POST['password'];
$user1=$_POST['user'];
// PostgreSQL database connection parameters
$host = "localhost";
$user = "postgres";
$pass = "omkar123";
$dbname = "Student";

    // database connection here
    $conn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");
    if ($conn) {
        echo"";
      }
    
      if($user1=='student')
      {
            $sql = "select * from  sregister where  email  = '$email' and password = '$password'";  
            $result = pg_query($conn, $sql);  
            $row = pg_fetch_array($result);  
            $count = pg_num_rows($result);  
            $flag = 0;
            if($count == 1){  
            $flag = 1;
            echo "<h1><center> Login successful </center></h1>";  
            }  
            else{  
            echo "<center><h1> Login failed. Invalid username or password.</center></h1>";  
            }

            // validate the user's credentials and set the session variable
            if ($flag==1) {
            session_start();
            $_SESSION['email'] = $email;

            // redirect to the profile page
            header('Location: My_Profile.php');
            exit();
            }
      }
        else if($user1=='teacher')
      {
            $sql = "select * from  tregister where  email  = '$email' and password = '$password'";  
            $result = pg_query($conn, $sql);  
            $row = pg_fetch_array($result);  
            $count = pg_num_rows($result);  
            $flag = 0;
            if($count == 1){  
            $flag = 1;
            echo "<h1><center> Login successful </center></h1>";  
            }  
            else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
            }

            // validate the user's credentials and set the session variable
            if ($flag==1) {
            session_start();
            $_SESSION['email'] = $email;

            // redirect to the profile page
            header('Location: My_tProfile.php');
            exit();
            }
      }
?>