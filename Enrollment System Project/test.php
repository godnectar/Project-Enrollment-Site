<?php
$conn = pg_connect("host=localhost port=5432 dbname=Student user=postgres password=omkar123");
if (!$conn) 
{
    echo "Failed to connect to PostgreSQL database.";
}
?>