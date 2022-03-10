<?php
$target_dir = "../Bilder/";
// print_r($_FILES["files"]);
// print_r($_FILES);
$file_tmp = $_FILES["files"]["tmp_name"][0];
$filename = $_FILES["files"]["name"][0];
print_r($_FILES["files"]["name"]);
$target_file = $target_dir . $_FILES["files"]["name"][0];
// print_r($target_file);
// print_r($file_tmp);
// print_r($filename);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["files"]["tmp_name"][0]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    move_uploaded_file($file_tmp,$target_file);
    $uploadOk = 1;
    HEADER('Location:' .$_SERVER['HTTP_REFERER']);
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
?>