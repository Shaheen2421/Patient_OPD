<?php
session_start();
if (isset($_SESSION['id'])) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Patient Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->
        <!-- <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> -->
        <!--===============================================================================================-->
        <!-- <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> -->
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <!-- <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css"> -->
        <!--===============================================================================================-->
        <!-- <link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css"> -->
        <!--===============================================================================================-->
        <!-- <link rel="stylesheet" type="text/css" href="css/util.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="css/main.css"> -->
        <!--===============================================================================================-->
        <link rel="stylesheet" href="style/styles.css">
        <link rel="stylesheet" href="style/bootstrap.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
        <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body onload="doPrint()">
        <?php
        error_reporting(0);
        include "connection.php";
        if (isset($_POST['submit']) || isset($_GET['submit'])) {
            unset($_POST['submit']);
            if ($_GET['patient_id'] != null) {
                $select = "SELECT * FROM tbl_opd WHERE id = $_GET[patient_id]";
                $result = $con->query($select);
                $_POST = mysqli_fetch_assoc($result);
                $exe = 1;
            } else {
                $data = implode("', '", $_POST);
                $keys = implode(", ", array_keys($_POST));
                $insert = "INSERT INTO tbl_opd ($keys) VALUES ('$data')";
                $exe = $con->query($insert);
            }
            if (!$exe) {
                echo mysqli_error($con);
                echo "<p class='alert alert-danger'> Internal server error, please try again later</p>";
            } else {
                // echo "स्वशासी राज्य चिकित्सा महाविद्यालय सोसाइटी सम्बद्य जिल महिला चिकित्सालय फ़िरोज़ाबाद";
                echo "<p class='alert alert-success'>Patient Added successfully</p>";
        ?>
                <div class="printable">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="images/Seal_of_Uttar_Pradesh.svg.png" style="width: 150px;">
                            </div>
                            <div class="col-sm-8">
                                <h1 style="text-align: center; font-size: 30px; font-weight: bold;">स्वशासी राज्य चिकित्सा महाविद्यालय सोसाइटी <br> <span style="font-size: 25px;">सम्बद्ध - जिला महिला चिकित्सालय, फ़िरोज़ाबाद (उ.प्र.)</span></h1>
                            </div>
                            <div class="col-sm-2">
                                <img src="images/coin.png" style="width: 150px;">
                            </div>
                            <div class="col-sm-12">
                                <h3 style="text-align:center; font-size: 15px; font-weight: bold">(केवल पन्द्रह दिन के लिए मान्य)</h3>
                            </div>
                            <div class="col-sm-12">
                                <h3 style="text-align:center; font-size: 16px; font-weight: bold; text-decoration: underline;">Out Patient Department (OPD) Ticket</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Date: <?php echo $_POST['added_at'] ? date("d / m / Y H:i:s", strtotime($_POST['added_at'])) : date("d / m / Y H:i:s") ?></h5>
                            </div>
                            <div class="col-sm-6">
                                <h5 style="text-align: right;">Sr. No.: <?php echo $_POST['id'] ? $_POST['id'] : mysqli_insert_id($con) ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row border border-dark">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Patient Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="patient_name" value="<?php echo @$_POST['patient_name'] ?>" class="form-control-plaintext" placeholder="Full Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row border border-dark">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Age</label>
                                    <div class="col-sm-9">
                                        <input type="Number" name="age" value="<?php echo @$_POST['age'] ?>" class="form-control-plaintext" placeholder="Age">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row border border-dark">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">
                                        <select name="guardian_type">
                                            <option value="0" <?php echo $_POST['guardian_type'] == 0 ? "selected" : "" ?>>Husband Name</option>
                                            <option value="1" <?php echo $_POST['guardian_type'] == 1 ? "selected" : "" ?>>Father Name</option>
                                        </select>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext"  value="<?php echo @$_POST['spouse_name'] ?>" name="spouse_name" placeholder="Husband/Father name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row border border-dark">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control-plaintext" value="<?php echo @$_POST['phone'] ?>" name="phone" placeholder="9999999999">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row border border-dark">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <select name="gender">
                                            <option value="0" <?php echo $_POST['gender'] == "0" ? "selected" : "";  ?>>Female</option>
                                            <option value="1" <?php echo $_POST['gender'] == "1" ? "selected" : "";  ?>>Male</option>
                                            <option value="2" <?php echo $_POST['gender'] == "2" ? "selected" : "";  ?>>Transgender</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row border border-dark">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control-plaintext" value="<?php echo @$_POST['address'] ?>" name="address" placeholder="#Address">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th colspan=7>General Physical Examination</th>
                        </tr>
                        <tr>
                            <th>GC: Fair/Avg/Poor</th>
                            <th>Ht:______CM</th>
                            <th>Wt:______kg</th>
                            <th>Temp:______F</th>
                            <th>Min:______Pulse</th>
                            <th>BP:______mm/hg</th>
                            <th>RR:______min</th>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Pallor &nbsp;&nbsp;&nbsp; | Icaluras &nbsp;&nbsp;&nbsp; | Oedema &nbsp;&nbsp;&nbsp;</th>
                            <th>Obst. History: G_______P_______L_______A_______</th>
                            <th>T.T.  &nbsp;&nbsp; I,  &nbsp; I</th>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-sm-3 section-border">
                            <ul>
                                <li>P/A</li>
                                <li>P/S</li>
                                <li>P/V</li>
                            </ul>
                        </div>
                        <div class="col-sm-8 section-border">
                            <p style="text-align: center">Complaints</p>
                            <textarea name="" id="" class="form-control" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row treatment-plan">
                        <div class="col-sm-2 section-border">
                            <h2>LAB TEST</h2>
                            <ul>
                                <li>-HB gm%</li>
                                <li>-CBC</li>
                                <li>-ABO/RH Grouping</li>
                                <li>-LFT:-T.S. Bill
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-/SGPT/ALK/.P
                                </li>
                                <li>-KFT: - B U L
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-S. Creative
                                </li>
                                <li>
                                    -Urine - Alb.
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Sugar
                                </li>
                                <li>
                                    -Blood Sugar - F.
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-PP
                                        <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-RBS
                                </li>
                                <li>-VDRL</li>
                                <li>-HIV</li>
                                <li>-HBs Ag</li>
                                <li>-Anti HCV</li>
                                <li>-USG</li>
                            </ul>
                        </div>
                        <div class="col-sm-9 section-border">
                            <h4 class="text-center">Treatment & Advice</h4>
                        </div>
                    </div>
                    <p style="width:100%; float: right; text-align: right;">Doctor Signature</p>
                </div>
        <?php
            }
        }
        ?>
    </body>
    <script>
        function doPrint() {
            window.print();
            setTimeout(() => {
                document.location.href = "home.php";
            }, 2000);
        }
    </script>
    <style>
        .printable {
            display: list-item;
            padding: 26px;
        }

        @media print {
            .header {
                display: none !important;
            }

            .alert{
                display: none;
            }

            .printable {
                display: list-item;
                padding: 26px;
            }
            .treatment-plan{
                height: 615px;
                /* display: block; */
            }
        }
    </style>

    </html>

<?php
} else {
    header("location: index.php");
}
