<?php
session_start();
if(isset($_SESSION['id'])){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patients List</title>
    <link rel="stylesheet" href="style/styles.css">
	<link rel="stylesheet" href="style/bootstrap.css">
	<link rel="stylesheet" href="style/css/all.css">
	<link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 header sidenavbar">
                <?php
                    include "header.php";
                ?>
            </div>
            <div class="col-sm-10 wider-page">
                <div class="col-sm-12">
                    <h1 class="heading text-center">Patients List</h1>
                </div>
                <div class="col-sm-12">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Filter</button>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Patient Name</th>
                                <th>Mobile Number</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Husband/Father name</th>
                                <th>Date</th>
                                <th>Re-Print Form</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                    include "connection.php";
                                    if(isset($_GET['date'])){
                                        $date = date("Y-m-d", strtotime($_GET['date']));
                                    }else{
                                        $date = date("Y-m-d");
                                    }
                                    $query = "SELECT * FROM tbl_opd WHERE date(added_at) = '$date' ORDER BY added_at DESC";
                                    $result = $con->query($query);
                                    $a = 1;
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <tr>
                                            <th><?php echo $a ?></th>
                                            <th><?php echo $row['patient_name'] ?></th>
                                            <th><?php echo $row['phone'] ?></th>
                                            <th><?php echo $row['age'] ?></th>
                                            <th><?php echo $row['gender'] == 0 ? "Male" : "Female" ?></th>
                                            <th><?php echo $row['spouse_name'] ?></th>
                                            <th><?php echo date("d M, Y", strtotime($row['added_at'])) ?></th>
                                            <th><a href='print.php?submit=&patient_id=<?php echo $row['id'] ?>'>Re-Print Form</a></th>
                                        </tr>
                                        <?php
                                        $a++;
                                    }
                                ?>
                            </tr>
                        </tbody>
                    </table>            
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}else
{
header("location: index.php");

}