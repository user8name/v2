<?php
require get_template_directory() . '/tools/PHPExcel/IOFactory.php';



//$wpdb->query("START TRANSACTION");
function get_excel(){
    //elsx文件路径
    $inputFileName = "D:/3/1-2199.xlsx";
    global $wpdb;
    date_default_timezone_set('PRC');
// 读取excel文件
    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {

    }

// 确定要读取的sheet，什么是sheet，看excel的右下角，真的不懂去百度吧
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();
    $dataname = $sheet->rangeToArray('A' . 1 . ':' . $highestColumn . 1, NULL, TRUE, FALSE);
    $dataname = $dataname[0];
    array_unshift($dataname,'cid','cid1','cid2');
    $data = [];
    $product = '';
    $product1 = '';
    $product2 = '';
    $cid = '';
    $cid1 = '';
    $cid2 = '';
    for ($row = 2; $row <= $highestRow; $row++){
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
        $rowData = $rowData[0];
        if($product != $rowData[0]){
            $product = $rowData[0];
            $terms = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name = '$product'");
            if(count($terms)>0){
                $cid = $terms;
            }else{
                $rowDatas = str_replace(' ','_',strtolower($rowData[0]));
                $ter = $wpdb->get_results("INSERT INTO $wpdb->terms (`name`,`slug`) values ('$rowData[0]','$rowDatas')");
                $id = $wpdb->insert_id;
                $wpdb->get_results("INSERT INTO $wpdb->term_taxonomy (`term_taxonomy_id`,`term_id`,`taxonomy`) values('$id','$id','category')");
                $cid = $id;
            }
        }
        if($product1 != $rowData[1]){
            $product1 = $rowData[1];
            $parid = $wpdb->get_results("SELECT term_id FROM $wpdb->terms WHERE `name` = '$rowData[1]'",ARRAY_N);
            $onid = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE `name` = '$rowData[0]'");
            if(count($parid)>0){
                $result = array_column($parid,'0');
                $result = implode(',',$result);
                $terms = $wpdb->get_var("SELECT term_id FROM $wpdb->term_taxonomy WHERE term_id in ('$result') and `parent` = '$onid'");
                if($terms){
                    $cid1 = $terms;
                }else{
                    $rowDatas = str_replace(' ','_',strtolower($rowData[1]));
                    $ter = $wpdb->get_results("INSERT INTO $wpdb->terms (`name`,`slug`) values ('$rowData[1]','$rowDatas')");
                    $id = $wpdb->insert_id;
                    $wpdb->get_results("INSERT INTO $wpdb->term_taxonomy (`term_taxonomy_id`,`term_id`,`taxonomy`,`parent`) values('$id','$id','category','$onid')");
                    $cid1 = $id;
                }
            }else{
                $rowDatas = str_replace(' ','_',strtolower($rowData[1]));
                $ter = $wpdb->get_results("INSERT INTO $wpdb->terms (`name`,`slug`) values ('$rowData[1]','$rowDatas')");
                $id = $wpdb->insert_id;
                $wpdb->get_results("INSERT INTO $wpdb->term_taxonomy (`term_taxonomy_id`,`term_id`,`taxonomy`,`parent`) values('$id','$id','category','$onid')");
                $cid1 = $id;
            }
        }
        if($rowData[2]){
            if($product2 != $rowData[2]){
                $product2 = $rowData[2];
                $parid = $wpdb->get_results("SELECT term_id FROM $wpdb->terms WHERE `name` = '$rowData[2]'",ARRAY_N);
                if(count($parid)>0){
                    $result = array_column($parid,'0');
                    $result = implode(',',$result);
                    $terms = $wpdb->get_var("SELECT term_id FROM $wpdb->term_taxonomy WHERE term_id in ('$result') and `parent` = '$cid1'");
                    if($terms){
                        $par2 = $wpdb->get_var("SELECT term_id FROM $wpdb->term_taxonomy WHERE term_id in ('$terms') and `parent` = '$cid1'");
                        if($par2){
                            $cid2 = $terms;
                        }else{
                            $rowDatas = str_replace(' ','_',strtolower($rowData[2]));
                            $ter = $wpdb->get_results("INSERT INTO $wpdb->terms (`name`,`slug`) values ('$rowData[2]','$rowDatas')");
                            $id = $wpdb->insert_id;
                            $wpdb->get_results("INSERT INTO $wpdb->term_taxonomy (`term_taxonomy_id`,`term_id`,`taxonomy`,`parent`) values('$id','$id','category','$cid1')");
                            $cid2 = $id;
                        }
                    }
                }else{
                    $rowDatas = str_replace(' ','_',strtolower($rowData[2]));
                    $ter = $wpdb->get_results("INSERT INTO $wpdb->terms (`name`,`slug`) values ('$rowData[2]','$rowDatas')");
                    $id = $wpdb->insert_id;
                    $wpdb->get_results("INSERT INTO $wpdb->term_taxonomy (`term_taxonomy_id`,`term_id`,`taxonomy`,`parent`) values('$id','$id','category','$cid1')");
                    $cid2 = $id;
                }
            }
        }else{
            $cid2 = 0;
        }
        array_unshift($rowData,$cid,$cid1,$cid2);
        $data[] =$rowData;
    }
    ouput($dataname,$data);
}

//if(mr_dowork()){
//    $wpdb->query("COMMIT");
//}else{
//    $wpdb->query("ROLLBACK");
//}
function ouput($title,$data){
    $obj = new \PHPExcel();
    $obj->getProperties()->setTitle('工作表格1');
//设置单元格内容
    $fileName = '学生信息';
    $fileType = 'Xlsx';
    foreach ($title as $key => $value) {
        $obj->getActiveSheet()->setCellValueByColumnAndRow($key, 1, $value);
    }
    $row = 2; //从第二行开始
    foreach ($data as $item) {
        $column = 1;
        foreach ($item as $value) {
            $obj->getActiveSheet()->setCellValueByColumnAndRow($column-1, $row, $value);
            $column++;
        }
        $row++;
    }
    ob_clean();
//    if ($fileType == 'xls') {
//        header('Content-Type: application/vnd.ms-excel');
//        header('Content-Disposition: attachment;filename="' . $fileName . '.xls');
//        header('Cache-Control: max-age=1');
//        $objWriter = new \PHPExcel_Writer_Excel5($obj);
//        $objWriter->save('php://output');
//        exit;
//    } elseif ($fileType == 'xlsx') {
//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx');
//        header('Cache-Control: max-age=1');
//        $objWriter = \PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
//        $objWriter->save('php://output');
//        exit;
//    }

//1.下载到服务器
    $objWriter = \PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
    $objWriter->save('D:/3/190.xlsx');
}
product();
function product(){
    global $wpdb;
    $result = $wpdb->get_var("select * from $wpdb->terms limit 0,1");
    var_dump($result);die;
}