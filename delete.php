<?php 


$id =  $_POST["stu_id"];

echo $id;

$conn = new mysqli("localhost","root","","meezan");

if($conn->connect_error)
{
    die ("connection error".$conn->connect_error);
}

else
{
    $query = "delete from student where id = ".$id."";
    
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