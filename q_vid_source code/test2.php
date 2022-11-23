<?php
    session_start();

    include_once('StatusFactory.php');
    include_once('LevelFactory.php');
    include_once('Amount.php');
    function clientCode(Amount $factory)
    {
        if($id=="1"){
            $First = $factory->createFirst();
            echo $First->getAmountFirst($id) . "\n"; 
        }
        elseif($id=="2"){
            $Second = $factory->createSecond();
            echo $Second->getAmountSecond($id) . "\n";
        }
        else{
            $Third = $factory->createThird();
            echo $Third->getAmountThird($id) . "\n";
        }
        
    }
    if($_SESSION['id']==""){
        header("location: signin.php");
    }else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    hr {
        position: relative;
        height: 3px;
        background: grey;    
    }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Welcome admin,<?php echo $_SESSION['fname']; ?></h1>
    <a href="logout.php" class="btn btn-danger">Logout</a>

    <h4>ผู้ป่วยระดับต่างๆ</h4>
    <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="w3-panel w3-padding-16 w3-round-xlarge w3-teal">
                    <h2>ผู้ป่วยสีเขียว</h2>
                    <h4><?php 
                    $factory = new StatusFactory();
                    $First = $factory->createFirst();
                    echo $First->getAmountFirst("1") . "\n";
                    ?></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w3-panel w3-padding-16 w3-round-xlarge w3-amber">
                    <h2>ผู้ป่วยสีเหลือง</h2>
                    <h4><?php 
                    $factory = new StatusFactory();
                    $First = $factory->createFirst();
                    echo $First->getAmountFirst("2") . "\n";
                    ?></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w3-panel w3-padding-16 w3-round-xlarge w3-red">
                    <h2>ผู้ป่วยสีเแดง</h2>
                    <h4><?php 
                    $factory = new StatusFactory();
                    $First = $factory->createFirst();
                    echo $First->getAmountFirst("3") . "\n";
                    ?></h4>
                </div>
            </div>
        </div>

      <h4>ผู้ป่วยสถานะต่างๆ</h4>
      <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="w3-panel w3-padding-16 w3-pale-blue w3-leftbar w3-border-blue">
                    <h2>ผู้ป่วยรอการรักษา</h2>
                    <h4><?php 
                    $factory = new LevelFactory();
                    $First = $factory->createFirst();
                    echo $First->getAmountFirst("1") . "\n";
                    ?></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w3-panel w3-padding-16 w3-pale-blue w3-leftbar w3-border-blue">
                    <h2>ผู้ป่วยติดตามอาการ</h2>
                    <h4><?php 
                    $factory = new LevelFactory();
                    $First = $factory->createFirst();
                    echo $First->getAmountFirst("2") . "\n";
                    ?></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w3-panel w3-padding-16 w3-pale-blue w3-leftbar w3-border-blue">
                    <h2>ผู้ป่วยรักษาเสร็จแล้ว</h2>
                    <h4><?php 
                    $factory = new LevelFactory();
                    $First = $factory->createFirst();
                    echo $First->getAmountFirst("3") . "\n";
                    ?></h4>
                    <!-- <h4>จำนวน <?php echo clientCode(new LevelFactory("3")); ?> คน</h4> -->
                </div>
            </div>
        </div>
      
    </div>
<script>
    
</script>
</body>
</html>

<?php
}
?>