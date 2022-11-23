<?php
    //include_once("functions.php");
    include_once("RegisterController.php");
    $userdata = new RegisterController();

    if(isset($_POST['submit'])){
        $fname = $_POST['fullname'];
        $uname = $_POST['username'];
        $uemail = $_POST['email'];
        $password = md5($_POST['password']);
        $urole = '1';  // 1 = user,2 = admin

        $sql = $userdata->registration($fname,$uname,$uemail,$password,$urole);

        if($sql){
            echo "<script>alert('Register Successful!');</script>";
            echo "<script>window.location.href='signin.php'</script>";
        }else{
            echo "<script>alert('Something went wrong! Please try again.');</script>";
            echo "<script>window.location.href='signin.php'</script>";
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Register Page</h1>
        <hr>
        <form method = "post">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full name</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" id="username" name="username" 
                onblur="checkusername(this.value)">
                <span id="usernameavailable"></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="username" name="password">
            </div>
            <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
            <a href="signin.php" class="btn btn-primary">Go to Login</a>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        function checkusername(val){
            $.ajax({
                type: 'POST',
                url: 'checkuser_available.php',
                data: 'username='+val,
                success: function(data){
                    $('#usernameavailable').html(data);
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>