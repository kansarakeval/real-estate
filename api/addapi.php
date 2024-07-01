<?php
    include("../connection.php");

    $serverimgpath ="../images/";

    //get image
    @$image = $_FILES['image'];
    @$name = $_POST['name'];
    @$email = $_POST['email'];
    @$mobile = $_POST['mobile'];
    @$rating = $_POST['rating'];
    @$city = $_POST['city'];
    @$price = $_POST['price'];
    @$description = $_POST['description'];

    if($name!=null && $email != null && $mobile != null && $rating != null && $city != null && $price !=null && $description != null && $image!=null)
    {

        
        //image name
        $imgName = $image['name'];

        //imagepath
        $path = $image['tmp_name'];

        //server storage path
        $uploadFile = $serverimgpath.basename($imgName);
        // echo $uploadFile;

        $res = move_uploaded_file($path,$uploadFile);
        
        if($res)
        {
            $query = "INSERT INTO detail (`name`,`email`,`mobile`,`rating`,`city`,`price`,`description`,`image`) VALUES ('$name','$email','$mobile','$rating','$city','$price','$description','$imgName')";
            $res = mysqli_query($conn,$query);

            if($res)
            {
                $msg = array('status'=>'Success');
                echo json_encode($msg);
                http_response_code(200);
            }
            else
            {
                $msg = array('status'=>'Failed');
                echo json_encode($msg);
                http_response_code(400);

            }
        }
    }
    else{
        $msg = array('status'=>'Key not Exits');
        echo json_encode($msg);
        http_response_code(404);
    }
?>