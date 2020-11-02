<?php 

$name =  $_POST["fname"];
$sub =  $_POST["sub"];

$conn = new mysqli("localhost","root","","meezan");

if($conn->connect_error)
{
    die ("connection error".$conn->connect_error);
}

else
{
    $query = "insert into student (name,subject) values ( '".$name."' , '".$sub."' )";
    
        if($conn->query($query))
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

}


    
    
    
?>