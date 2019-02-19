<?php
include './PHPExeclClass/PHPExcel/IOFactory.php';

$inputFileName = './4a.xlsx';
date_default_timezone_set('PRC');
// 读取excel文件
try {            
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('加载文件发生错误："'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

// 确定要读取的sheet，什么是sheet，看excel的右下角，真的不懂去百度吧
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
// $highestColumn = $sheet->getHighestColumn();
$highestColumn = 'E';
// $highestColumn = 'I';
// $highestColumn = 'H';
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

$i=1;

// 获取一行的数据
for ($row = 2; $row <= 200; $row++){
    for ($col = 0; $col < $highestColumnIndex; $col++){
        if($col != 4){
            $Data[$i][] = (string)$sheet->getCellByColumnAndRow($col, $row)->getValue();
        }else{
            $Data[$i][] = (string)$sheet->getCellByColumnAndRow($col, $row)->getFormattedValue();
        }
    }  
    $i++;
}
// echo "<pre>";
// var_dump($Data);
    // echo "<br>";
$a = json_encode($Data);
// file_put();
file_put_contents("4a.json","$a");


// $inputFileName = "./wl_upload/" . $_FILES["file"]["name"];
// date_default_timezone_set('PRC');
// 读取excel文件
// try {
// $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
// $objReader = PHPExcel_IOFactory::createReader($inputFileType);
// $objPHPExcel = $objReader->load($inputFileName);
// } catch(Exception $e) {
// die('加载文件发生错误：'."pathinfo($inputFileName,PATHINFO_BASENAME)".':'.$e->getMessage());
// }

// echo '1';die;
// $sheet = $objPHPExcel->getSheet(0);
// $highestRow = $sheet->getHighestRow();
// $highestColumn = $sheet->getHighestColumn();
// $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

// // 获取一行的数据
// for ($row = 2; $row <= $highestRow; $row++){
//             for ($col = 0; $col < $highestColumnIndex; $col++){
//                     $Data[$row][] =(string)$sheet->getCellByColumnAndRow($col, $row)->getValue();
//             }  
// }
// // echo '<pre>';