<?php

include '../conn.php';

function DateThai($strDate) {
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear,";
}

$sql = "SELECT 
                            repair_detail.repair_detail_id,
                            repair_detail.repair_detail_data,  
                            repair_detail.repair_detail_create_at,
                            repair_detail.repair_detail_update_at,
                            profile.profile_fname,
                            profile.profile_lname,
                            oe.oe_name,
                            oe.oe_code,
                            oe.oe_id,
                            position.position_name
                    FROM ((
                        repair_detail
                            INNER JOIN oe      ON repair_detail.repair_detail_oe_id = oe.oe_id
                            INNER join position on position.position_id = oe.oe_position)
                            INNER JOIN profile ON repair_detail.repair_detail_users_id = profile.profile_users_id)"
        . "WHERE repair_detail.repair_detail_id = '" . $_GET['repair_detail_id'] . "' ";
$result = mysqli_query($conn, $sql);
$jobdetails = mysqli_fetch_assoc($result);


$date = DateThai($strDate);
$repair_detail_id=$jobdetails['repair_detail_id'];
$strDate = $jobdetails['repair_detail_create_at'];
$strDate2 = $jobdetails['repair_detail_update_at'];
$fname=$jobdetails['profile_fname'];
$lname=$jobdetails['profile_lname'];
$oe_code=$jobdetails['oe_code'];
$oe_name=$jobdetails['oe_name'];
$position_name=$jobdetails['position_name'];
$repair_detail_data=$jobdetails['repair_detail_data'];
$date1=$jobdetails['repair_detail_create_at'];
$date2 = DateThai($date1);



require_once '../vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/fonts',
    ]),
    'fontdata' => $fontData + [
        'thsarabun' => [
            'R' => 'THSarabun.ttf',
        ]
    ],
    'default_font' => 'thsarabun'
]);




$content = " 
    
<div style='border: 3px solid black;'>
<p style='font-family: thsarabun; font-size: 18pt; text-align: center;'><b>ใบแจ้งซ่อม</b></p>
<p style='font-family: thsarabun; font-size: 16pt; text-align: left; margin-left:20px;'><b>เลขที่ใบแจ้งซ่อม</b> : $repair_detail_id
    <br>
    <b>วันที่แจ้ง</b> : $date2<br><br> 
</p>
<div>
<p style='font-family: thsarabun; font-size: 16pt; text-align: left; margin: -30px 0px 0px 20px;'><b>ข้อการแจ้งซ่อม</b>

 <ul>
    <li>ผู้แจ้ง : $fname $lname </li>
    <li>หมายเลข SN : $oe_code </li>
    <li>ชื่ออุปกรณ์ : $oe_name </li>
    <li>แผนก : $position_name </li>
    <li>อาการเสีย : $repair_detail_data </li>    
</ul>
</p>    
<br>

<p style='font-family: thsarabun; font-size: 16pt; text-align: left; margin: -30px 0px 0px 20px;'><b></b>

 <ul>
    <li>ลายมือชื่อผู้แจ้ง :____________________________ </li>
    <li>ลายมือชื่อผู้ซ่อม :____________________________ </li>  
</ul>
</p> 
</div>
</div><br>
<div style='border: 3px solid black;'>
<p style='font-family: thsarabun; font-size: 18pt; text-align: center;'><b>ใบแจ้งซ่อม ( สำเนา ) </b></p>
<p style='font-family: thsarabun; font-size: 16pt; text-align: left; margin-left:20px;'><b>เลขที่ใบแจ้งซ่อม</b> : $repair_detail_id
    <br>
    <b>วันที่แจ้ง</b> : $date2<br><br> 
</p>
<div>
<p style='font-family: thsarabun; font-size: 16pt; text-align: left; margin: -30px 0px 0px 20px;'><b>ข้อการแจ้งซ่อม</b>

 <ul>
    <li>หมายเลข SN : $oe_code </li>
    <li>ชื่ออุปกรณ์ : $oe_name </li>
    <li>แผนก : $position_name </li>
    <li>อาการเสีย : $repair_detail_data </li>    
</ul>
</p>    
<br>

<p style='font-family: thsarabun; font-size: 16pt; text-align: left; margin: -30px 0px 0px 20px;'><b></b>

 <ul>
   <li>ลายมือชื่อผู้แจ้ง :____________________________ </li>
    <li>ลายมือชื่อผู้ซ่อม :____________________________ </li>  
</ul>
</p> 
</div>
</div>


";


$mpdf->WriteHTML($content);
$mpdf->Output();
?>




<div style="margin-right: 20px;">
    
</div>