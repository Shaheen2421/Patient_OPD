<?php
session_start();

if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Hospital | Home Page</title>
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
	<link rel="stylesheet" href="style/css/all.css">
	<link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 header sidenavbar">
				<?php
				include "./header.php";
				?>
			</div>
			<div class="col-sm-10 wider-page page_width">
				<form class="contact100-form validate-form" action="./print.php" method="post">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group row border border-dark">
								<label for="staticEmail" class="col-sm-3 col-form-label">Patient Name</label>
								<div class="col-sm-9">
									<input type="text" name="patient_name" class="form-control-plaintext" placeholder="Full Name">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row border border-dark">
								<label for="staticEmail" class="col-sm-3 col-form-label">Age</label>
								<div class="col-sm-9">
									<input type="Number" name="age" class="form-control-plaintext" placeholder="Age">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row border border-dark">
								<label for="staticEmail" class="col-sm-3 col-form-label">
									<select name="guardian_type">
										<option value="0">Husband Name</option>
										<option value="1">Father Name</option>
									</select>
								</label>
								<div class="col-sm-9">
									<input type="text" class="form-control-plaintext" name="spouse_name" placeholder="Husband/Father name">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row border border-dark">
								<label for="staticEmail" class="col-sm-3 col-form-label">Phone</label>
								<div class="col-sm-9">
									<input type="number" class="form-control-plaintext" name="phone" placeholder="9999999999">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row border border-dark">
								<label for="staticEmail" class="col-sm-3 col-form-label">Gender</label>
								<div class="col-sm-9">
									<select name="gender">
										<option value="0">Female</option>
										<option value="1">Male</option>
										<option value="2">Transgender</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group row border border-dark">
								<label for="staticEmail" class="col-sm-3 col-form-label">Address</label>
								<div class="col-sm-9">
									<input type="text" class="form-control-plaintext" name="address" placeholder="#Address">
								</div>
							</div>
						</div>
						<button class="btn btn-block btn-primary" type="submit" name="submit">Submit</button>
					</div>
					<!-- <div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
						<span class="label-input100">FULL NAME *</span>
						<input class="input100" type="text" name="patient_name" placeholder="Enter Your Name">
					</div>
					<div class="wrap-input100 bg1 rs1-wrap-input100">
						<span class="label-input100"><div class="select-guardian">
								<select class="js-select2" name="guardian_type">
									<option value="0">Husband Name</option>
									<option value="1">Father Name</option>
								</select>
								<div class="dropDownSelect2"></div>
							</div>
							<input class="input100" type="text" name="spouse_name" placeholder="Enter Husband/Father Name">
						</span>
					</div>
					<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Enter Your Age">
						<span class="label-input100">Age * <input class="input100" type="text" name="age" placeholder="Age"></span>
					</div>
					<div class="wrap-input100 input100-select bg1 rs1-wrap-input100">
						<span class="label-input100">Gender * <div>
							<select class="js-select2" name="gender">
								<option value="0">Male</option>
								<option value="1">Female</option>
							</select>
							<div class="dropDownSelect2"></div>
						</div></span>
					</div>
					<div class="wrap-input100 bg1 rs1-wrap-input100">
						<span class="label-input100">Phone <input class="input100" type="text" name="phone" placeholder="Enter Number Phone"></span>
					</div>
					<div class="wrap-input100 bg1" data-validate="Please Type Your Address">
						<span class="label-input100">Address</span>
						<input class="input100" type="text" name="address" placeholder="Enter Your Address">
					</div> -->

					<!-- <div class="wrap-input100 validate-input bg0 rs1-alert-validate"> -->
					<!-- <table class="table table-bordred table-striped">
						<thead>
							<tr>
								<th colspan=6>General Physical Examination</th>
							</tr>
							<tr>
								<th>
									<span>Ht:<input type="text" class="inputTable" name="ht">cm</span>
								</th>
								<th>
									<span>Wt:<input type="text" class="inputTable" name="wt">kg</span>
								</th>
								<th>
									<span>Temp:<input type="text" class="inputTable" name="temp">F</span>
								</th>
								<th>
									<span>Pulse:<input type="text" class="inputTable" name="pulse">min</span>
								</th>
								<th>
									<span>BP:<input type="text" class="inputTable" name="mmhg">mmHg</span>
								</th>
								<th>
									<span>RR:<input type="text" class="inputTable" name="min">min</span>
								</th>
							</tr>
							<tr>
								<th>Pallor -
									<span class="donate-now">
										<input type="radio" id="pallor" value="0" name="pallor" />
										<label for="pallor">Present</label>
									</span>
									<span class="donate-now">
										<input type="radio" id="pallor1" value="1" name="pallor" />
										<label for="pallor1">Absent</label>
									</span>
								</th>
								<th>Iclarus -
									<span class="donate-now">
										<input type="radio" id="iclarus" value="0" name="iclarus" />
										<label for="iclarus">Present</label>
									</span>
									<span class="donate-now">
										<input type="radio" id="iclarus1" value="1" name="iclarus" />
										<label for="iclarus1">Absent</label>
									</span>
								</th>
								<th>Oedema -
									<span class="donate-now">
										<input type="radio" id="oedema" value="0" name="oedema" />
										<label for="oedema">Present</label>
									</span>
									<span class="donate-now">
										<input type="radio" id="oedema1" value="1" name="oedema" />
										<label for="oedema1">Absent</label>
									</span>
								</th>
								<th>Cyanosis -
									<span class="donate-now">
										<input type="radio" id="cyanosis1" value="0" name="cyanosis" />
										<label for="cyanosis1">Present</label>
									</span>
									<span class="donate-now">
										<input type="radio" id="cyanosis" value="1" name="cyanosis" />
										<label for="cyanosis">Absent</label>
									</span>
								</th>
								<th>Dehydration -
									<span class="donate-now">
										<input type="radio" id="dehydration" value="0" name="dehydration" />
										<label for="dehydration">Present</label>
									</span>
									<span class="donate-now">
										<input type="radio" id="dehydration1" value="1" name="dehydration" />
										<label for="dehydration1">Absent</label>
									</span>
								</th>
							</tr>
						</thead>
					</table>
					<div class="wrap-input100 validate-input bg0 rs1-alert-validate">
						<span class="label-input100">Systematic Examination (CNS/CVS/Resp):</span>
						<textarea class="input100" name="systematic_examination" placeholder="Your message here..."></textarea>
					</div>
					<div class="wrap-input100 validate-input bg0 rs1-alert-validate">
						<span class="label-input100">Local Examination (Abdominal / Chest / Resp): </span>
						<textarea class="input100" name="local_examination" placeholder="Your message here..."></textarea>
					</div>
					<table class="table table-bordered table-striped">
						<tr>
							<th>Different Diagnosis</th>
							<th rowspan="3" width="800" height="400">
								<div class="wrap-input100 validate-input bg0 rs1-alert-validate">
									<span class="label-input100">Treatment Plan </span>
									<textarea class="input100" style="height: -webkit-fill-available;" name="treatment_plan" placeholder="Your message here..."></textarea>
								</div>
							</th>
						</tr>
						<tr>
							<th>Investigation</th>
						</tr>
						<tr>
							<th>Final Designations</th>
						</tr>
					</table>
					<p style="width:100%; float: right; text-align: right;">Doctor Signature</p> -->
					<!-- <div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate="Please Type Your Message">
						<span class="label-input100">Message</span>
						<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
					</div> -->

					<!-- <div class="container-contact100-form-btn">
						<button type="submit" class="contact100-form-btn" name="submit">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<!-- <script src="vendor/animsition/js/animsition.min.js"></script> -->
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
			$(".js-select2").each(function() {
				$(this).on('select2:close', function(e) {
					if ($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					} else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
	<!--===============================================================================================-->
	<!-- <script src="vendor/daterangepicker/moment.min.js"></script> -->
	<!-- <script src="vendor/daterangepicker/daterangepicker.js"></script> -->
	<!--===============================================================================================-->
	<!-- <script src="vendor/countdowntime/countdowntime.js"></script> -->
	<!--===============================================================================================-->
	<!-- <script src="vendor/noui/nouislider.min.js"></script> -->
	<script>
		var filterBar = document.getElementById('filter-bar');

		noUiSlider.create(filterBar, {
			start: [1500, 3900],
			connect: true,
			range: {
				'min': 1500,
				'max': 7500
			}
		});

		var skipValues = [
			document.getElementById('value-lower'),
			document.getElementById('value-upper')
		];

		filterBar.noUiSlider.on('update', function(values, handle) {
			skipValues[handle].innerHTML = Math.round(values[handle]);
			$('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
			$('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
		});
	</script>
	<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script> -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>

</body>
<style>

	/* .printable{
		display: none;
	} */

	@media print{
		.header{
			display: none !important;
		}
		.printable{
			display: unset;
		}
		.rs1-wrap-input100 {
			display: inline-block !important;
		}
		.alert{
			display: none;
		}
		form{
			display: none !important;
		}
	}

</style>
</html>

<?php
}else{
    header("location: index.php");
}