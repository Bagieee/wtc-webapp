<?php

require_once("dbCon.php");

$raum = $_GET['raumId'];
$stmt;
$target_dir = "../Bilder/";
$file_tmp = $_FILES["files"]["tmp_name"];
$filename = $_FILES["files"]["name"];
$dbUrl = "/Bilder/". pathinfo($filename, PATHINFO_FILENAME);
$outfile = pathinfo($filename, PATHINFO_FILENAME) . ".png";
$outfileRotate = pathinfo($filename, PATHINFO_FILENAME) ."Rotate.png";
$target_file = $target_dir . $outfile;
$target_fileRotate = $target_dir . $outfileRotate;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $extension = pathinfo($filename, PATHINFO_EXTENSION); 
    switch ($extension) {
      case 'jpg':
      case 'jpeg':
        $set_image = imagecreatefromjpeg($file_tmp);
        break;
      case 'gif':
        $set_image = imagecreatefromgif($file_tmp);
        break;
      case 'png':
        $set_image = imagecreatefrompng($file_tmp);
        break;
    }
    imagepng($set_image, $file_tmp);
   
    copy($file_tmp, $target_file);

    imagepng(imagerotate(imagecreatefrompng($file_tmp),270,0),$file_tmp);
    move_uploaded_file($file_tmp,$target_fileRotate);

    

    $stmt = $pdo->prepare("UPDATE tblpic SET picUrl = ? WHERE picRaumId = ? ");
    $stmt->execute([$dbUrl, $raum]);

    $uploadOk = 1;
    HEADER('Location:' .$_SERVER['HTTP_REFERER']);
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

?>