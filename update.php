<?php 

$id =  $_POST["stu_id"];


$conn = new mysqli("localhost","root","","meezan");

    if($conn->connect_error)
    {
        die ("connection error".$conn->connect_error);
    }
    
    $query = "select * from student where id = ".$id." ";
    $result = $conn->query($query);

    $output = "";

    if($result->num_rows >0)
    {
        while ($row = $result->fetch_assoc())
        {
             
            $output .= "
                        <div class='form-group'>
                        <label for='exampleInputEmail1'>Name</label>
                        <input id='edit-name' type='text'  class='form-control' value='{$row['name']}'  placeholder='Enter Student Name'>
                        <input id='edit-id' type='text' class='form-control' hidden value='{$row['id']}'  placeholder='Enter Student Name'>
                        </div>
                        <div class='form-group'>
                            <label for='exampleInputPassword1'>Subject</label>
                            <input id='edit-subject' type='text' value='{$row['subject']}' class='form-control' placeholder='Enter Student Subject'>
                        </div>
                    
                        <button id='edit-save' type='submit' class='btn btn-primary'>Submit</button>
                        ";
        }
    }

    echo $output;

    
    
    
?>