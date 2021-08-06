<?php
exit();
set_time_limit(0);
ini_set('memory_limit', '512M');
$headerArr = [
    'URL'
];
$exprot_data=[];

global $wpdb;
$select="SELECT id,cid,productname,seo_description,detail FROM ".$wpdb->prefix."products  WHERE isdel=0 and utime>'2021-06-16 00:16:32' ";

$data=$wpdb->get_results($select);

foreach ($data as $k=>$v){

    $js = json_decode($v->detail, true);

    $one_data=[];
    foreach ($js as $key=>$value){
        if (!in_array($key,$headerArr) && $key!=""){
            $headerArr[]=$key;
        }
        $one_data[$key]=$value;
    }
    $purl = home_url().'/'.sanitize_title(preg_replace( '/[^A-Za-z0-9\-\s\-]/', '', $v->productname)) . '-item-'.$v->id.'.html';

    $one_data['URL']=$purl;
    $exprot_data[]=$one_data;
    unset($one_data);
}
unset($data);


exportExcel($headerArr,$exprot_data);
function exportExcel($headerArr,$exprot_data)
{
    // 引入类库

//    include('./tools/');  //引入PHP EXCEL类
    require get_template_directory() . '/tools/PHPExcel.php';

    // 文件名和文件类型
    $fileName = "formulationbio-".date('Y-m-d',time());
    $fileType = "xlsx";

    // 模拟获取数据
    $data = $exprot_data;

    $obj = new \PHPExcel();

    // 以下内容是excel文件的信息描述信息
//    $obj->getProperties()->setCreator(''); //设置创建者
//    $obj->getProperties()->setLastModifiedBy(''); //设置修改者
//    $obj->getProperties()->setTitle(''); //设置标题
//    $obj->getProperties()->setSubject(''); //设置主题
//    $obj->getProperties()->setDescription(''); //设置描述
//    $obj->getProperties()->setKeywords('');//设置关键词
//    $obj->getProperties()->setCategory('');//设置类型

    // 设置当前sheet
    $obj->setActiveSheetIndex(0);

    // 设置当前sheet的名称
    $obj->getActiveSheet()->setTitle('formulationbio');


    $list=[];
    $c=count($headerArr);
    for ($i=0;$i<$c;$i++){
        $list[]=PHPExcel_Cell::stringFromColumnIndex($i);        //将数字转化成列 A B C
    }

//    var_dump($list);exit();
    // 填充第一行数据
    $obb=$obj->getActiveSheet();

    foreach ($headerArr as $k=>$v){
        $obb->setCellValue($list[$k] . '1', $v);
    }

    // 填充第n(n>=2, n∈N*)行数据
    $length = count($data);
    $bbjj=$obj->getActiveSheet();
    for ($i = 0; $i < $length; $i++) {
//        $index=0;
//        foreach ($headerArr as $kk1=>$vv1){
//            var_dump($vv1);
//            $bbjj->setCellValueExplicit($list[$kk1] . ($i + 2), $vv1, \PHPExcel_Cell_DataType::TYPE_STRING);//将其设置为文本格式
//            $index++;
//        }
        foreach ($data[$i] as $kk=>$vv){
            $now_key=array_search($kk,$headerArr);

            $bbjj->setCellValueExplicit($list[$now_key] . ($i + 2), $vv, \PHPExcel_Cell_DataType::TYPE_STRING);//将其设置为文本格式
//            $index++;
        }
    }

    // 设置加粗和左对齐
//    foreach ($list as $col) {
//        // 设置第一行加粗
//        $obj->getActiveSheet()->getStyle($col . '1')->getFont()->setBold(true);
//        // 设置第1-n行，左对齐
//        for ($i = 1; $i <= $length + 1; $i++) {
//            $obj->getActiveSheet()->getStyle($col . $i)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
//        }
//    }

    // 设置列宽
//    $obj->getActiveSheet()->getColumnDimension('A')->setWidth(20);
//    $obj->getActiveSheet()->getColumnDimension('B')->setWidth(20);
//    $obj->getActiveSheet()->getColumnDimension('C')->setWidth(15);

    // 导出
    ob_clean();
    if ($fileType == 'xls') {
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xls');
        header('Cache-Control: max-age=1');
        $objWriter = new \PHPExcel_Writer_Excel5($obj);
        $objWriter->save('php://output');
        exit;
    } elseif ($fileType == 'xlsx') {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx');
        header('Cache-Control: max-age=1');
        $objWriter = \PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }
}
