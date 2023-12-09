<?php
//delete logic
    include 'Database.php';
    if(isset($_GET['deleteid']))
    {
        $name = $_GET['deleteid'];
        $sql= "DELETE FROM admin1 where email='$name'";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
            header('Location:display.php');
        }
        else
        {
            echo"sorry";
        }
    }    
?>
