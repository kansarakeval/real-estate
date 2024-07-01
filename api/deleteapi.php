<?php

    include("../connection.php");

    @$id = $_POST['id'];

    if($id != null)
    {
        $readQuery = "SELECT * FROM detail";
        $data =  mysqli_query($conn,$readQuery);

        $arr = mysqli_fetch_assoc($data);
        $name = $arr['image'];
        unlink("../images/$name");

        $query ="DELETE FROM detail WHERE `id` = '$id'";
        $res = mysqli_query($conn,$query);
        if($res)
        {
            $msg = array('status'=>'Success');
            echo json_encode($msg);
        }
        else
        {
            $msg = array('status'=>'Failed');
            echo json_encode($msg);
        }
    }
    else
    {
        $msg = array('status'=>'Body Not Exites');
        echo json_encode($msg);
    }


?>