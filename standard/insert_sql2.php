<?php
function datetodb($date)
//    23/04/2564
{
    $day = substr($date, 0, 2); // substrตัดข้อความที่เป็นสติง
    $month = substr($date, 3, 2); //ตัดตำแหน่ง
    $year = substr($date, 6) - 543;
    $dateme = $year . '-' . $month . '-' . $day;
    return $dateme; //return ส่งค่ากลับไป
}
?>

<?php
require '../connection/connection.php';
$mode = $_REQUEST["mode"];


if ($mode == "insert_data") {
    // echo '<pre>';
    // print_r($mode);
    // echo '</pre>';
    $standard_meet = $_REQUEST["standard_meet"];
    $standard_number = $_REQUEST["standard_number"];
    $standard_detail = $_REQUEST["standard_detail"];
    // $standard_tacking = $_REQUEST["standard_tacking"];
    // $standard_note = $_REQUEST["standard_note"];
    $standard_source = $_REQUEST["standard_source"];
    // $standard_origin = $_REQUEST["standard_origin"];
    $standard_survey = datetodb($_REQUEST["standard_survey"]);
    if ($_REQUEST["standard_pick"] != "" && $_REQUEST["standard_pickup"] != "") {
         $standard_pick = datetodb($_REQUEST["standard_pick"]);
         $standard_pickup = datetodb($_REQUEST["standard_pickup"]);
    } else {
        $standard_pick = "";
        $standard_pickup = "";
    }
    $date = date('Y-m-d');
    //$file = $_REQUEST["file"];
    $group_id = $_REQUEST["group_id"];
    $manda_id = $_REQUEST["manda_id"];
    // echo '<pre>'.print_r($_REQUEST, 1).'</pre>';
    // exit;
    $agency_id = empty($_REQUEST["agency_id"]) ? [] : $_REQUEST['agency_id'];
    // $type_id = $_REQUEST["type_id"];
    $department_id = $_REQUEST["department_id"];
    $status_id = empty($_REQUEST["status_id"]) ? [] : $_REQUEST['status_id'];
    $sql = "INSERT INTO main_std (  standard_meet  , standard_number ,
     standard_detail  , standard_create  , standard_source  , standard_survey ,
     standard_pick , standard_pickup , standard_status) 
      VALUES ('$standard_meet','$standard_number',
      '$standard_detail'  , '$date' ,'$standard_source'  , '$standard_survey' ,
      '$standard_pick' ,'$standard_pickup' , '7')";
    //$conn->query($sql);
    //sqlsrv_close($conn);
// print_r($_REQUEST);
    $stmt = sqlsrv_query($conn, $sql);

    $sqlmaxid = "SELECT @@IDENTITY AS 'Maxid'";
    $querymax = sqlsrv_query($conn, $sqlmaxid);
    $resultMaxid = sqlsrv_fetch_array($querymax, SQLSRV_FETCH_ASSOC);

    $standard_idtb =  $resultMaxid['Maxid'];

    // if ($stmt == false) {
    //     die(print_r(sqlsrv_errors()));
    // } else {
    //     echo "บันทึกข้อมูลสำเร็จ";
    //     echo "<br>";

    // }

    //1

       $countagency = count($agency_id);
    //echo $test;


    for ($i = 0; $i < $countagency; $i++) {
        $agencyid =  $agency_id[$i];

        //echo "<br>";

        if (trim($agencyid) <> "") {
            $sql3 = "INSERT INTO dimension_agency ( agency_id , standard_idtb  ) 
            VALUES ('$agencyid', '$standard_idtb')";

            $stmt3 = sqlsrv_query($conn, $sql3);
        }
        // if ($stmt3 == false) {
        //     die(print_r(sqlsrv_errors()));
        // } else {
        //     echo "บันทึกข้อมูลสำเร็จ2";
        // }


        //echo "<br>";
    }
    
    $countmanda = count($manda_id);
    //echo $test;
    for ($i = 0; $i < $countmanda; $i++) {
        $mandaid =  $manda_id[$i];

        //echo "<br>";

        if (trim($mandaid) <> "") {
            $sql7 = "INSERT INTO dimension_manda ( manda_id , standard_idtb  ) 
            VALUES ('$mandaid', '$standard_idtb')";

            $stmt7 = sqlsrv_query($conn, $sql7);
        }
    }
   

    //2

    $countgroup = count($group_id);

    //echo $test;


    for ($i = 0; $i < $countgroup; $i++) {
        $groupid =  $group_id[$i];

        //echo "<br>";
        if (trim($groupid) <> "") {

            $sql2 = "INSERT INTO dimension_group ( group_id , standard_idtb  ) 
            VALUES ('$groupid', '$standard_idtb')";

            $stmt2 = sqlsrv_query($conn, $sql2);
        }

        // if ($stmt2 == false) {
        //     die(print_r(sqlsrv_errors()));
        // } else {
        //     echo "บันทึกข้อมูลสำเร็จ1";
        // }


        //echo "<br>";
    }



    //3

    // $counttype = count($type_id);
    // for ($i = 0; $i < $counttype; $i++) {
    //     $typeid =  $type_id[$i];
    //     if (trim($typeid) <> "") {

    //         $sql3 = "INSERT INTO dimension_type ( type_id , standard_idtb  ) 
    //   VALUES ('$typeid', '$standard_idtb')";

    //         $stmt3 = sqlsrv_query($conn, $sql3);
    //     }
    // }




    $countboxdepartment = count($department_id);
    for ($i = 0; $i < $countboxdepartment; $i++) {
        $departmentid =  $department_id[$i];

        //echo "<br>";
        if (trim($departmentid) <> "") {

            $sql4 = "INSERT INTO dimension_department ( department_id , standard_idtb  ) 
      VALUES ('$departmentid', '$standard_idtb')";
            $stmt4 = sqlsrv_query($conn, $sql4);
        }
    }




    //$file_id = $_FILES["fileupload"];

    //     date_default_timezone_set("Asia/Bangkok");
    //     $date = date("Y-m-d H:i:s");
    //     //เพิ่มไฟล์
    //    $upload = $_FILES['fileupload'];
    //    print_r($upload);
    //     // print_r($upload);
    //     $count_upload = count($upload['name']);

    //     for ($i = 0; $i < $count_upload; $i++) {
    //         $file_name = $upload['name'][$i];
    //         $file_type = $upload['type'][$i];
    //         $file_tmp_name = $upload['tmp_name'][$i];
    //         $file_error = $upload['error'][$i];
    //         $file_size = $upload['size'][$i];

    //         // echo "<br> $i . $file_name ";

    //         if ($file_name != "" && $file_tmp_name !="") {   //not select file
    //             //โฟลเดอร์ที่จะ upload file เข้าไป 
    //             $path = "../fileupload/";


    //             //เอาชื่อไฟล์ที่มีอักขระแปลกๆออก
    //             $remove_these = array(' ', '`', '"', '\'', '\\', '/', '_');
    //             $newname = str_replace($remove_these, '', $file_name);

    //             //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
    //             $newname = time() . '-' . $newname;
    //             $path_copy = $path . $newname;
    //             $path_link = "../fileupload/" . $newname;

    //             //echo $newname;

    //             //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์

    //             move_uploaded_file($file_tmp_name, $path_copy);

    //             $sql5 = "INSERT INTO dimension_file (fileupload , standard_idtb , upload_date) 
    //         VALUES ( '$newname' , '$standard_idtb' , '$date')";
    //             $stmt5 = sqlsrv_query($conn, $sql5);
    //         }
    //     }

    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");
    //เพิ่มไฟล์
    $upload = $_FILES['fileupload'];
    $count_upload = count($upload['name']);

    for ($i = 0; $i < $count_upload; $i++) {
        $file_name = $upload['name'][$i];
        $file_type = $upload['type'][$i];
        $file_tmp_name = $upload['tmp_name'][$i];
        $file_error = $upload['error'][$i];
        $file_size = $upload['size'][$i];

        // echo "<br> $i . $file_name ";

        if ($file_name != "") {   //not select file
            //โฟลเดอร์ที่จะ upload file เข้าไป 
            $path = "../fileupload/";

            $numrand        = (mt_rand()); //สุ่มตัวเลข
            //$path           = "userfile/"; //กำหนดpath ใหม่
            $type           = strrchr($file_name, "."); //ดึงเฉพาะนามสกุลไฟล์
            $newname        = $date .  $numrand . $type; //ตั้งชื่อใหม่เรียงวันที่ ตัวเลขที่สุม และนามสกุลไฟล์
            $path_copy      = $path . $newname; //กำหนดpath
            //$path_link      = "/fileupload/" . $newname; //กำหนดlink
            echo $file_name;
            // copy($fltem, $path_copy
            copy($file_tmp_name, $path_copy); //คัดลอกไwล์

            $sql_insert_file = "INSERT INTO dimension_file (fileupload , standard_idtb , upload_date) 
                    VALUES ( '$newname' , '$standard_idtb' , '$date')";
            // $insert_file = sqlsrv_query($conn, $sql_insert_file);
        }
    }
    if (sqlsrv_query($conn, $sql_insert_file)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลสถานะสำเร็จ !!");';
        $alert .= 'window.location.href = "../index.php?page=status";';
        $alert .= '</script>';
        echo $alert;
        exit();;
    } else {
        echo "Error: " . $sql4 . "<br>" . sqlsrv_errors($conn);
    }
    
    sqlsrv_close($conn);
}
