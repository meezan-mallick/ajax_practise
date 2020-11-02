<?php 


$id =  $_POST["stu_id"];
$name =  $_POST["fname"];
$subject =  $_POST["sub"];


$conn = new mysqli("localhost","root","","meezan");

if($conn->connect_error)
{
    die ("connection error".$conn->connect_error);
}

else
{
    $query = "update student set name = '{$name}',subject='{$sunject}' where id = ".$id."";
    
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