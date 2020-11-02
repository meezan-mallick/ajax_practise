<?php

    $conn = new mysqli("localhost","root","","meezan");

    if($conn->connect_error)
    {
        die ("connection error".$conn->connect_error);
    }
    
    $query = "select * from student";
    $result = $conn->query($query);

    $output = " <thead class='thead-dark'>
                <th scope='col'>ID</th>
                <th scope='col'>Name</th>
                <th scope='col'>Subject</th>
                <th scope='col'>Edit</th>
                <th scope='col'>Delete</th>
               
            </thead>
            ";

    if($result->num_rows >0)
    {
        while ($row = $result->fetch_assoc())
        {
             
            $output .= "
            <tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['subject']."</td>
                <td><button class='btn-edit btn-info' data-id='".$row['id']."'>Edit</button></td>
                <td><button class='btn-delete btn-danger' data-id='".$row['id']."'>Delete</button></td>
                
            
            </tr>
            ";
        }
    }

    echo $output;

?>
