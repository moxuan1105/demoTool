<?php
set_time_limit(0);
Header("Content-type:text/html;charset=utf-8");
include './PHPExeclClass/PHPExcel/IOFactory.php';

$conn1 = OCILogon("NPI_RD_SW", "NPI_RD_SW123.", "(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = 10.146.67.109)(PORT = 1526))(CONNECT_DATA =(SERVICE_NAME = bbc)(INSTANCE_NAME = bbc2)))","UTF-8");

$ql = "select * from XLWEB.VIEW_WAM_WASP_LINE t where rownum <= 2000 ORDER BY TEST_TIME desc";

$sql = oci_parse($conn1, $ql);
oci_execute($sql);
oci_fetch_all($sql, $results);

date_default_timezone_set('PRC');

$dir = dirname(__FILE__); //找出当前脚本所在路径

$objPHPExcel = new PHPExcel(); //实例化一个PHPExcel()对象
$objSheet = $objPHPExcel->getActiveSheet(); //选取当前的sheet对象

$objSheet->setTitle('SN'); //对当前sheet对象命名

for ($i = 0; $i < count($results["WIP_NO"]); $i++) {
    $objSheet->setCellValue("A" . ($i + 1), $results["WIP_NO"][$i]); //利用setCellValues()填充数据
}

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); //设定写入excel的类型
$objWriter->save($dir . '/test.xlsx'); //保存文件



select * from XLWEB.VIEW_WAM_WASP_LINE t where TEST_TIME > to_date('2018/12/31 00:00:00', 'YYYY/MM/DD HH24:MI:SS') AND rownum <= 2000 ORDER BY TEST_TIME desc;

select * from XLWEB.VIEW_WAM_WASP_LINE t  order by rownum desc limit 100;