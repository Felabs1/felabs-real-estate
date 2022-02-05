<?php

$filename = $_FILES['file']['name'];
$location = "uploads/".$filename;
$uploadOK = 1;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);
$valid_extensions = array('jpg', 'jpeg', 'png');

if(!in_array(strtolower($imageFileType), $valid_extensions)){
    $uploadOK = 0;
}

if($uploadOK == 0){
    echo 0;
}else{
    if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
        echo $location;
    }else{
        echo 0;
    }
}


?>