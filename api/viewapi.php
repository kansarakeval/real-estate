<?php

    include("../connection.php");

    // $cate = $_GET['category'];

    // if($cate!=null)
    // {
        $query="SELECT * FROM detail";
        $res = mysqli_query($conn,$query);
        $arr = array();

        if(mysqli_num_rows($res)>0)
        {
            while($data = mysqli_fetch_assoc($res))
            {
                $arr[]=$data;
            }
        }
        
        $json = json_encode($arr,JSON_PRETTY_PRINT);
        echo $json;
    // }
?>