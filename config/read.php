<?php

// For Inserting the data into DB
include('config/db_con.php');

//For File Name & Directory
// include('config/upload.php');

//To use PHPSpreadSheet Lib
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);

//Locating File
$loc = "../uploadfiles/".$file_name;
$spreadsheet = $reader->load($loc);
$worksheet = $spreadsheet->getActiveSheet();
$highestRow = $worksheet->getHighestRow(); // e.g. 10
$highestColumn = $worksheet->getHighestColumn(); // e.g 'C'
$sql = "";

if($highestColumn == "C"){
    //Scanning Excel File & Query Ready
    for($i=1; $i<=$highestRow; $i++){
        $cellValueA = $worksheet->getCell('A'.$i)->getValue();
        $cellValueB = $worksheet->getCell('B'.$i)->getValue();
        $cellValueC = $worksheet->getCell('C'.$i)->getValue();
        // echo $cellValueA." ".$cellValueB." ".$cellValueC."<br>";
        $sql .= "INSERT INTO `users`(`auto_key`, `user_id`, `name`, `password`, `status`) VALUES (NULL,'$cellValueA', '$cellValueB', '$cellValueC', 1);";
    }
    $html = "";
    //Multiquery Insert
    if (mysqli_multi_query($db_con, $sql)) {
        for($i=1; $i<=$highestRow; $i++){
            $cellValueA = $worksheet->getCell('A'.$i)->getValue();
            $cellValueB = $worksheet->getCell('B'.$i)->getValue();
            $cellValueC = $worksheet->getCell('C'.$i)->getValue();
            // echo $cellValueA." ".$cellValueB." ".$cellValueC."<br>";
            $html .= "<tr>";
            $html .= "<td>".$cellValueA."</td>";
            $html .= "<td>".$cellValueB."</td>";
            // $html .= "<td>".$cellValueC."</td>";
            $html .= "</tr>";
        }
        echo $html;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db_con);
    }
}
else{
    echo "Sorry! Not Matching Colunms";
}


//Closing DB connection
mysqli_close($db_con);


