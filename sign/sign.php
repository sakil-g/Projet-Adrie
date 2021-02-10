<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Suggestion field using jQuery, PHP and MySQL - Learn infinity</title>
    
    

    <!-- Font Awesome Css -->
    <link href="../sign/css/font-awesome.min.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="../sign/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../sign/css/app_style.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
		
		#btnSaveSign {
			color: #fff;
			background: #f99a0b;
			padding: 5px;
			border: none;
			border-radius: 5px;
			font-size: 20px;
			margin-top: 10px;
		}
		#signArea{
			width:304px;
			margin: 15px auto;
		}
		.sign-container {
			width: 90%;
			margin: auto;
		}
		.sign-preview {
			width: 150px;
			height: 50px;
			border: solid 1px #CFCFCF;
			margin: 10px 5px;
		}
		.tag-ingo {
			font-family: cursive;
			font-size: 12px;
			text-align: left;
			font-style: oblique;
		}
		.center-text {
			text-align: center;
		}
	</style>
</head>
<body>
    <div class="all-content-wrapper">
		
	
		<section class="container">
			

								<div id="signArea" >
									<h2 class="tag-ingo">Put signature below,</h2>
									<div class="sig sigWrapper" style="height:auto;">
										<div class="typed"></div>
										<canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
									</div>
								</div>
								
								<div class="d-flex justify-content-center">
								<button id="btnSaveSign">Save Signature</button>
								</div>
								<div class="sign-container">
								<?php
								$image_list = glob("../sign/doc_signs/*.png");
								foreach($image_list as $image){
									//echo $image;
								?>
								<img src="<?php echo $image; ?>" class="sign-preview" />
								<?php
								}
								?>
								</div>
									

								
		</section>
    </div>
	
	<!-- Jquery Core Js -->
    <script src="../sign/js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../sign/js/bootstrap.min.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="../sign/js/bootstrap-select.js"></script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<link href="../sign/css/jquery.signaturepad.css" rel="stylesheet">
	<script src="../sign/js/numeric-1.2.6.min.js"></script> 
	<script src="../sign/js/bezier.js"></script>
	<script src="../sign/js/jquery.signaturepad.js"></script> 
	
	<script type='text/javascript' src="https://github.com/niklasvh/html2canvas/releases/download/0.4.1/html2canvas.js"></script>
	<script src="../sign/js/json2.min.js"></script>
	
	<script>

	$(document).ready(function(e){

		$(document).ready(function() {
			$('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
		});
		
		$("#btnSaveSign").click(function(e){
			html2canvas([document.getElementById('sign-pad')], {
				onrendered: function (canvas) {
					var canvas_img_data = canvas.toDataURL('../sign/image/png');
					var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
					//ajax call to save image inside folder
					$.ajax({
						url: '../sign/save_sign.php',
						data: { img_data:img_data },
						type: 'post',
						dataType: 'json',
						success: function (response) { 
						   window.location.reload();
						}
					});
				}
			});
		});

	});
	</script>
</body>
</html>
