<?php
// print_r($_FILES);

$ds          = DIRECTORY_SEPARATOR;  //1

$storeFolder = '../uploads';   //2

if (!empty($_FILES)) {

    // $tempFile = $_FILES['file']['tmp_name'];          //3

    // $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4

    // $targetFile =  $targetPath. $_FILES['file']['name'];  //5

    // move_uploaded_file($tempFile,$targetFile); //6
    date_default_timezone_set('Asia/Kolkata');

    $target_dir = "../uploadfiles/";
    $target_file = $target_dir .date("d_m_y_h_i_sa"). basename($_FILES["file"]["name"]);
    $file_name =  date("d_m_y_h_i_sa").basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $excelFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($excelFileType != "xlsx" && $excelFileType != "xls" ) {
        echo $excelFileType;
        // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
            include('../read.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}

?>
