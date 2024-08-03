<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("location: home.php");
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="style/bootstrap.css">
    <scirpt src="css/js/all.js"></scirpt>
    <title>Login</title>
    <style>
    /** Login Page **/

.login-box{
	transform: translate(0%, 50%);
	border-radius: 3px;
	border: 1px solid #ccc;
	padding: 50px 50px 50px 50px !important;
	box-shadow: 0px 0px 10px 1px;
}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5 mx-auto login-box">
                <?php
                    if(isset($_POST['submit'])){
                        include "connection.php";
                        $select = "SELECT * FROM tbl_user WHERE username = '$_POST[username]' && password = '$_POST[password]'";
                        $result = $con->query($select);
                        if(!$result){
                            echo "<p class='alert alert-danger'>Internal server error, please try again later</p>";
                        }else{
                            if(mysqli_num_rows($result) == 0){
                                echo "<p class='alert alert-danger'>Invalid Credentials</p>";
                            }else{
                                $row = mysqli_fetch_assoc($result);
                                $_SESSION = $row;
                                ?>
                                <script>
                                    window.location.replace("home.php");
                                </script>
                                <?php
                            }
                        }
                    }
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    }