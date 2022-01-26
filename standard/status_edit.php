<?php date_default_timezone_set("Asia/Bangkok");
$date_today = (date('d/m/Y H:i:s'));
?>
<?php include('status_edit_sql.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title></title>
</head>

<body>
    <h5 align="left" class="text-success">สถานะของเอกสารปัจจุบัน : <?php echo $result['name_status']; ?>
        <div align="right">
            <a class="btn " style="background-color:#FFD700;" onclick="window.history.go(-1); return false;">
                <h3>ย้อนกลับ</h3>
            </a>
            <hr>
        </div>
        <section class="about section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div align="left">
                            <label for="">ที่มาของเอกสาร</label>
                        </div>
                        <?php if ($result['standard_source'] == 1) : ?>
                            <div class="col-md-2">
                                <div class="card mt-4 ">
                                    <div class="card-body bg-warning text-white">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">ที่มาของการประชุม</label>
                                                <input type="text" name="standard_meet" class="form-control" disabled value="<?php echo $result["standard_meet"] ?>">

                                            </div>

                                        </div>
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">วันที่ประชุม สมอ. </label>
                                                <input type="text" name="standard_survey" class="form-control" disabled value="<?php echo datethai($result["standard_survey"]) ?>">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($result['standard_source'] == 2) : ?>
                            <div class="col-md-2">
                                <div class="card mt-4">
                                    <div class="card-body bg-danger text-white">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">วันที่รับหนังสือจากสมอ.</label>
                                                <input type="text" id="mydate1" name="standard_origin" class="form-control" disabled value="<?php echo DateThai($result["standard_pick"]); ?>">
                                                <br>
                                                <label for="">วันที่ส่งเอกสารออกไป สมอ.</label>
                                                <input type="text" id="mydate2" name="standard_origin" class="form-control" disabled value="<?php echo DateThai($result["standard_pickup"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($result['standard_source'] == 3) : ?>
                            <div class="col-md-2">
                                <div class="card mt-4">
                                    <div class="card-body bg-warning text-white">
                                        <div class="">
                                            <div class="form-group mb-2">
                                                <label for="">วันที่ประกาศราชกิจจานุเบกษา</label>
                                                <input type="text" id="mydate2" name="standard_origin" class="form-control" disabled value="<?php echo DateThai($result["standard_gazet"]); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="section-title">
                            <div class="col-md-8">
                                <h2>แก้ไขเอกสาร</h2>
                                <h3>แก้ไขเอกสาร <span>มอก.</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="card mt-4">
                                    <div class="card-body ">
                                        <div class="col-md-3">
                                            <div class="card mt-4 ">
                                                <div class="card-body bg-primary text-white">
                                                    <div class="">
                                                        <div class="form-group mb-2">
                                                            <label for="">สถานะ</label>
                                                            <select class="form-control" name="standard_status" value="<?php echo $result['standard_status'] ?>" style="height: unset !important;" required>
                                                                <option selected>กรุณาเลือกสถานะ</option>
                                                                <?php
                                                                $sqll = "SELECT * FROM select_status";
                                                                $queryy = sqlsrv_query($conn, $sqll);
                                                                while ($result2 = sqlsrv_fetch_array($queryy, SQLSRV_FETCH_ASSOC)) { ?>
                                                                    <option value="<?php echo $result2['id_statuss'];  ?>">
                                                                        <?php echo $result2['statuss_name'];  ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="card mt-4">
                                                <div class="card-body bg-success text-white">
                                                    <div class="">
                                                        <div class="form-group mb-2">
                                                            <label for="">วันที่แต่งตั้งสถานะ</label>
                                                            <div class="input-group">
                                                                <input id="" type="text" name="standard_day" class=" form-control" value="<?php echo DateThai($result['standard_day']) ?>" disabled>
                                                                <input id="mydate" type="text" name="standard_day" class=" form-control" required>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="card mt-4">
                                                <div class="card-body bg-warning text-white">
                                                    <div class="">
                                                        <div class="form-group mb-2">
                                                            <label for="">หมายเหตุ</label>
                                                            <div class="input-group">
                                                                <input id="" type="text" name="standard_note" class=" form-control" value="<?php echo ($result['standard_note']) ?>">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- หลายฟอร์ม -->
                                        <div class="col-md-3">
                                            <div class="card mt-4">
                                                <div class="card-body bg-info text-white">
                                                    <div class="">
                                                        <label for="">ไฟล์แนบ</label>
                                                        <a href="javascript:void(0)" onclick="add_element('main5','sub_main5');" class=" float-end btn btn-success">เพิ่ม</a>
                                                        <?php
                                                        $standarsidtb = $_REQUEST['standard_idtb'];
                                                        $sql5 = "SELECT * FROM dimension_file WHERE standard_idtb  = '$standarsidtb' ";
                                                        $query5 = sqlsrv_query($conn, $sql5);
                                                        while ($result5 = sqlsrv_fetch_array($query5, SQLSRV_FETCH_ASSOC)) { ?>
                                                            <?php $file_id =  $result5['id_dimension_file'];
                                                            $file_name =  $result5['fileupload'];
                                                            ?>
                                                            <input type="text" name="id_dimension_file[]" class="form-control" style="display:none;" value="<?php echo $file_id ?>">

                                                            <input type="file" name="fileupload[]" class="form-control" value="<?php echo $file_name ?>">


                                                        <?php } ?>
                                                        <div class="main-form1 mt-3 " id="main5">
                                                            <!-- <input type="file" class="form-control" name="fileupload[]" id="fileupload" style="height: unset !important;"> -->
                                                            <div style="display:none;">
                                                                <div class="row" id="sub_main5">

                                                                    <div class="">
                                                                        <div class="form-group mb-2 input-group mt-3">
                                                                            <input type="text" name="id_dimension_file[]" class="form-control" id="id_dimension_file">

                                                                            <input type="file" class="form-control" name="fileupload[]" id="fileupload" style="height: unset !important;">
                                                                            <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 
                                <div class="col-md-4">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group mb-2">
                                                    <label for="">วาระจากที่ประชุม สมอ. </label>
                                                    <input type="text" name="standard_meet" class="form-control" value="<?php echo $result["standard_meet"] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="col-md-4">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group mb-2 f-red">
                                                    <label for="">เลขที่ มอก.*</label>
                                                    <input type="text" name="standard_number" class="form-control" required value="<?php echo $result["standard_number"] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group mb-2">
                                                    <label for="">ชื่อมาตรฐาน</label>
                                                    <input type="text" name="standard_detail" class="form-control" value="<?php echo $result["standard_detail"] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group mb-2">
                                                    <label for="">กลุ่มผลิตภัณฑ์</label>
                                                    <a href="javascript:void(0)" onclick="add_element('main4','sub_main4');" class=" float-end btn btn-success">เพิ่ม</a>
                                                    <?php
                                                    $standarsidtb = $_REQUEST['standard_idtb'];
                                                    $sql = "SELECT * FROM dimension_group WHERE standard_idtb  = '$standarsidtb' ";
                                                    $query1 = sqlsrv_query($conn, $sql);
                                                    while ($result = sqlsrv_fetch_array($query1, SQLSRV_FETCH_ASSOC)) { ?>
                                                        <?php $group =  $result['group_id']; ?>
                                                        <select class="form-control" name="group_id[]" id="group_id" style="height: unset !important;">
                                                            <option value="">กรุณาเลือกกลุ่มผลิตภัณฑ์</option>
                                                            <?php
                                                            $sql2 = "SELECT * FROM group_tb";
                                                            $query2 = sqlsrv_query($conn, $sql2);
                                                            while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) {
                                                                $group2 =  $result2['group_id'];
                                                                if ($group == $group2) {
                                                                    $c = "selected";
                                                                } else {
                                                                    $c = "";
                                                                }
                                                            ?>

                                                                <option value="<?php echo $result2['group_id'];  ?>" <?php echo $c; ?>><?php echo $result2['group_name']; ?>
                                                                </option>
                                                            <?php } ?>
                                                            <input style="display:none;" type="text" name="id_dimension_group[]" class="form-control" value="<?php echo $result["id_dimension_group"] ?>">
                                                        </select>


                                                    <?php } ?>
                                                    <div class="main-form1 mt-3 " id="main4">

                                                        <div style="display:none;">
                                                            <div class=" mb-2 input-group mt-2" id="sub_main4">
                                                                <select class="form-control" name="group_id[]" id="group_id" style="height: unset !important;">
                                                                    <option selected disabled>กรุณาเลือกกลุ่มผลิตภัณฑ์
                                                                    </option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM group_tb";
                                                                    $query = sqlsrv_query($conn, $sql);
                                                                    while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
                                                                        <option value="<?php echo $result['group_id'];  ?>">
                                                                            <?php echo $result['group_name'];  ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                                <input type="text" name="id_dimension_group[]" class="form-control" id="id_dimension_group">

                                                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group mb-2">
                                                    <label for="">หน่วยงานคู่แข่ง</label>
                                                    <a href="javascript:void(0)" onclick="add_element('main10','sub_main10');" class=" float-end btn btn-success">เพิ่ม</a>
                                                    <?php
                                                    $standarsidtb = $_REQUEST['standard_idtb'];
                                                    $sql2 = "SELECT * FROM dimension_agency WHERE standard_idtb  = '$standarsidtb' ";
                                                    $query2 = sqlsrv_query($conn, $sql2);
                                                    while ($result2 = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                                        <?php $agency =  $result2['agency_id']; ?>
                                                        <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;">
                                                            <option value="">กรุณาเลือกหน่วยงานคู่แข่ง</option>
                                                            <?php
                                                            $sql22 = "SELECT * FROM agency_tb";
                                                            $query22 = sqlsrv_query($conn, $sql22);
                                                            while ($result22 = sqlsrv_fetch_array($query22, SQLSRV_FETCH_ASSOC)) {
                                                                $agency2 =  $result22['agency_id'];
                                                                if ($agency == $agency2) {
                                                                    $c = "selected";
                                                                } else {
                                                                    $c = "";
                                                                }
                                                            ?>

                                                                <option value="<?php echo $result22['agency_id'];  ?>" <?php echo $c; ?>><?php echo $result22['agency_name']; ?>
                                                                </option>
                                                            <?php } ?>
                                                            <input style="display:none;" type="text" name="id_dimension_agency[]" class="form-control" value="<?php echo $result2["id_dimension_agency"] ?>">
                                                        </select>
                                                    <?php } ?>
                                                    <div class="main-form1 mt-3 " id="main10">

                                                        <div style="display:none;">
                                                            <div class=" mb-2 input-group mt-2" id="sub_main10">
                                                                <select class="form-control" name="agency_id[]" id="agency_id" style="height: unset !important;">
                                                                    <option selected disabled>
                                                                        กรุณาเลือกหน่วยงานคู่แข่ง</option>
                                                                    <?php
                                                                    $sql2 = "SELECT * FROM agency_tb";
                                                                    $query2 = sqlsrv_query($conn, $sql2);
                                                                    while ($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)) { ?>
                                                                        <option value="<?php echo $result['agency_id'];  ?>">
                                                                            <?php echo $result['agency_name'];  ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <input type="text" name="id_dimension_agency[]" class="form-control" id="id_dimension_agency">

                                                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                                <!-- หลายฟอร์ม -->

                                <div class="col-md-4">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group mb-2">
                                                    <label for="">หน่วยงานที่ขอ</label>
                                                    <a href="javascript:void(0)" onclick="add_element('main15','sub_main15');" class=" float-end btn btn-success">เพิ่ม</a>

                                                    <?php
                                                    $standarsidtb = $_REQUEST['standard_idtb'];
                                                    $sql3 = "SELECT * FROM dimension_department WHERE standard_idtb  = '$standarsidtb' ";
                                                    $query3 = sqlsrv_query($conn, $sql3);
                                                    while ($result3 = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                                        <?php $department =  $result3['department_id']; ?>
                                                        <select class="form-control" name="department_id[]" id="department_id" style="height: unset !important;">
                                                            <option value="">กรุณาเลือกหน่วยงานที่ขอ</option>
                                                            <?php
                                                            $sql33 = "SELECT * FROM department_tb";
                                                            $query33 = sqlsrv_query($conn, $sql33);
                                                            while ($result33 = sqlsrv_fetch_array($query33, SQLSRV_FETCH_ASSOC)) {
                                                                $department2 =  $result33['department_id'];
                                                                if ($department == $department2) {
                                                                    $c = "selected";
                                                                } else {
                                                                    $c = "";
                                                                }
                                                            ?>

                                                                <option value="<?php echo $result33['department_id'];  ?>" <?php echo $c; ?>><?php echo $result33['department_name']; ?>
                                                                </option>
                                                            <?php } ?>
                                                            <input style="display:none;" type="text" name="id_dimension_department[]" class="form-control" value="<?php echo $result3["id_dimension_department"] ?>">
                                                        </select>
                                                    <?php } ?>
                                                    <div class="main-form1 mt-3 " id="main15">

                                                        <div style="display:none;">
                                                            <div class=" mb-2 input-group mt-2" id="sub_main15">
                                                                <select class="form-control" name="department_id[]" id="department_id" style="height: unset !important;">
                                                                    <option selected disabled>กรุณาเลือกหน่วยงานที่ขอ
                                                                    </option>
                                                                    <?php
                                                                    $sql3 = "SELECT * FROM department_tb";
                                                                    $query3 = sqlsrv_query($conn, $sql3);
                                                                    while ($result = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                                                        <option value="<?php echo $result['department_id'];  ?>">
                                                                            <?php echo $result['department_name'];  ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <input type="text" name="id_dimension_department[]" class="form-control" id="id_dimension_department">

                                                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger">ลบ</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="form-group mb-2">
                                                    <label for="">ประเภทมาตรฐาน</label>
                                                    <a href="javascript:void(0)" onclick="add_element('main7','sub_main7');" class=" float-end btn btn-success">เพิ่ม</a>
                                                    <?php
                                                    $standarsidtb = $_REQUEST['standard_idtb'];
                                                    $sql = "SELECT * FROM dimension_manda WHERE standard_idtb  = '$standarsidtb' ";
                                                    $query3 = sqlsrv_query($conn, $sql);
                                                    while ($result = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                                        <?php $manda =  $result['manda_id']; ?>
                                                        <select class="form-control" name="manda_id[]" id="manda_id" style="height: unset !important;">
                                                            <option value="">กรุณาเลือกประเภทมาตรฐาน</option>
                                                            <?php
                                                            $sql2 = "SELECT * FROM manda_tb";
                                                            $query4 = sqlsrv_query($conn, $sql2);
                                                            while ($result2 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) {
                                                                $manda2 =  $result2['manda_id'];
                                                                if ($manda == $manda2) {
                                                                    $c = "selected";
                                                                } else {
                                                                    $c = "";
                                                                }
                                                            ?>

                                                                <option value="<?php echo $result2['manda_id'];  ?>" <?php echo $c; ?>><?php echo $result2['manda_name']; ?>
                                                                </option>
                                                            <?php } ?>
                                                            <input style="display:none;" type="text" name="id_dimension_manda[]" class="form-control" value="<?php echo $result["id_dimension_manda"] ?>">
                                                        </select>


                                                    <?php } ?>
                                                    <div class="main-form1 mt-3 " id="main7">

                                                        <div style="display:none;">
                                                            <div class=" mb-2 input-group mt-2" id="sub_main7">
                                                                <select class="form-control" name="manda_id[]" id="manda_id" style="height: unset !important;">
                                                                    <option selected disabled>กรุณาเลือกประเภทมาตรฐาน
                                                                    </option>
                                                                    <?php
                                                                    $sql = "SELECT * FROM manda_id";
                                                                    $query = sqlsrv_query($conn, $sql);
                                                                    while ($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) { ?>
                                                                        <option value="<?php echo $result['manda_id'];  ?>">
                                                                            <?php echo $result['manda_name'];  ?></option>
                                                                    <?php } ?>

                                                                </select>
                                                                <input type="text" name="id_dimension_manda[]" class="form-control" id="id_dimension_manda">

                                                                <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>





                                <!-- หลายฟอร์ม -->

                                <!-- <div class="col-md-4">
                                            <div class="card mt-4">
                                                <div class="card-body">
                                                    <div class="">
                                                        <div class="form-group mb-2">
                                                            <label for="">ประเภทผลิตภัณฑ์</label>
                                                            <a href="javascript:void(0)" onclick="add_element('main16','sub_main16');" class=" float-end btn btn-success">เพิ่ม</a>

                                                            <?php
                                                            $standarsidtb = $_REQUEST['standard_idtb'];
                                                            $sql4 = "SELECT * FROM dimension_type WHERE standard_idtb  = '$standarsidtb' ";
                                                            $query4 = sqlsrv_query($conn, $sql4);
                                                            while ($result4 = sqlsrv_fetch_array($query4, SQLSRV_FETCH_ASSOC)) { ?>
                                                                <?php $type =  $result4['type_id']; ?>
                                                                <select class="form-control" name="type_id[]" id="type_id" style="height: unset !important;">
                                                                    <option value="">กรุณาเลือกประเภทผลิตภัณฑ์</option>
                                                                    <?php
                                                                    $sql44 = "SELECT * FROM type_tb";
                                                                    $query44 = sqlsrv_query($conn, $sql44);
                                                                    while ($result44 = sqlsrv_fetch_array($query44, SQLSRV_FETCH_ASSOC)) {
                                                                        $type2 =  $result44['type_id'];
                                                                        if ($type == $type2) {
                                                                            $c = "selected";
                                                                        } else {
                                                                            $c = "";
                                                                        }
                                                                    ?>

                                                                        <option value="<?php echo $result44['type_id'];  ?>" <?php echo $c; ?>>
                                                                            <?php echo $result44['type_name']; ?></option>
                                                                    <?php } ?>
                                                                    <input style="display:none;" type="text" name="id_dimension_type[]" class="form-control" value="<?php echo $result4["id_dimension_type"] ?>">

                                                                </select>
                                                            <?php } ?>
                                                            <div class="main-form1 mt-3 " id="main16">

                                                                <div style="display:none;">
                                                                    <div class=" mb-2 input-group mt-2" id="sub_main16">
                                                                        <select class="form-control" name="type_id[]" id="type_id" style="height: unset !important;">
                                                                            <option selected disabled>กรุณาเลือกประเภทผลิตภัณฑ์
                                                                            </option>
                                                                            <?php
                                                                            $sql3 = "SELECT * FROM type_tb";
                                                                            $query3 = sqlsrv_query($conn, $sql3);
                                                                            while ($result = sqlsrv_fetch_array($query3, SQLSRV_FETCH_ASSOC)) { ?>
                                                                                <option value="<?php echo $result['type_id'];  ?>">
                                                                                    <?php echo $result['type_name'];  ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <input type="text" name="id_dimension_type[]" class="form-control" id="id_dimension_type">

                                                                        <button type="button" onclick="$(this).parent().remove();" class="remove-btn btn btn-danger ">ลบ</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                            </div>
                    </div> -->


                                <center>
                                    <button type="submit" name="save_multiple_data" class="btn btn-primary mt-3">บันทึกข้อมูล</button>
                                </center>
                        </form>

                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
<script>
    picker_date(document.getElementById("mydate"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("mydate1"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("mydate2"), {
        year_range: "-12:+10"
    });
</script>