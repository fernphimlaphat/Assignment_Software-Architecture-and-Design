<?php include 'classFollowUP.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <br>
    <div class="card-header bg-navy">
        <h1 class="card-title">ติดตามอาการ</h1><br>
    </div>

    <?php
    $SSID = $_GET['p_id'];
    $PatientFollowing = new DataFollowUP(new FollowUPOrder_Timestamp($SSID));
    $PatientFollowing->printHeader($SSID);
    $PatientFollowing->printData($SSID);
    ?>
    <form action="" method="post">
        <input type="checkbox" id="p_level" name="p_level" value="3">
        <label for="p_level" required>วินิจฉัยสำเร็จ</label><br>
        <?php
        ?>
        <button type="submit" name="updated" class="btn btn-success">ยืนยัน</button>
    </form>

    <script>
    $(function() {
        $(".datatable").DataTable();
        // $('#example2').DataTable({
        //   "paging": true,
        //   "lengthChange": false,
        //   "searching": false,
        // http://fordev22.com/
        //   "ordering": true,
        //   "info": true,
        //   "autoWidth": false,
        // });
    });
    </script>

</body>

</html>









<?php
include_once('functions.php');
$updatedata = new UpdateToFollowup();
if (isset($_POST['updated'])) {
    $id = $_GET['p_id'];
    $p_level = $_POST['p_level'];

    $sql = $updatedata->updated($p_level, $id);
    if ($sql) {
        echo "<script>alert('Updated Successfully');</script>";
        echo "<script>window.lozcation.href='newcase.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again');</script>";
        echo "<script>window.location.href='patient_info.php'</script>";
    }
}
$menu = "Detailfollowing";

?>
<?php include("header.php"); ?>
<?php
include_once('classFollowUP.php');
$id = $_GET['p_id'];
$updatepatient = new Fetchonerecord();
$sql = $updatepatient->fetchonerecord($id);
?>