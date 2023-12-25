<?php
// header('Content-Type: text/html;charset=utf-8');
error_reporting(E_ERROR | E_PARSE);
$database_username = 'admin';
$database_password = 'admin';
$pdo_conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=ascent_register', $database_username, $database_password);

// echo $pdo_conn;
if ($pdo_conn) {
	// echo "ok";
} else {
	// echo "nok";
}
?>
<?php

$token_name = "";
$token_name_tamil = "";
$toke_no = "";
$pdo_statement = $pdo_conn->prepare("SELECT * FROM register_details where id!=''   ORDER BY id DESC limit 1");
$pdo_statement->execute();
$token_details = $pdo_statement->fetch(PDO::FETCH_ASSOC);
$token_name = $token_details['token_name'];
$token_name_tamil = $token_details['token_name_tamil'];
$toke_no = $token_details['token_no'];
if ($token_details['id'] != '') {
	$tk_no = $token_details['token_no'];

	$token_no = "Your Token Number is " . join(" ", str_split($tk_no, 1)) . "                      Your Name " . $token_details['token_name'];
} else {
	$token_no = '-';
}

?>



<style>
	body {
		background: url(img/bg-final.png);
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}

	.hed h3 {
		font-size: 18.5px;
		font-weight: 700;
		line-height: 30px;
		margin-bottom: 0px;
		margin-bottom: 15px;
		margin-top: 10px;
	}

	.hole-hed {
		padding: 40px 0px;
	}

	hr.no-bre {
		margin-bottom: 35px;
	}

	.logo img {
		float: right;
	}

	.box table tr td {
		padding: 11px;
		font-weight: 600;
		color: #fff;
		font-size: 22px;
	}

	.box {
		background: url(https://html.dreamitsolution.net/techno/assets/images/call-bg.png);
		border-radius: 5px;
		box-shadow: 0 5px 0 rgb(255 255 255 / 16%);
		padding: 20px 10px 38px;
		margin: 0px 18px;
		background-color: #40054a;
	}

	/*.boc {
    margin-top: 40px;
}*/

	td.count2 {
		font-size: 30px !important;
	}

	.box.tab1 p {
		color: #fff;
		font-size: 25px;
		font-weight: 600;
		margin-bottom: 20px;
	}

	.nos {
		text-align: center;
	}

	.box.tab1 h3 {
		color: #fff;
		font-size: 45px;
		font-weight: 600;
	}

	hr.du {
		color: #ffffff;
	}

	h3.count23 {
		font-size: 65px !important;
		font-weight: 700 !important;
		margin-bottom: 40px !important;
	}

	.date {
		background: #fff;
		margin-top: 22px !important;
		border: 2px solid #40054a;
		border-radius: 5px;
		padding: 5px 0px;
	}

	.date p {
		padding: 0px 0px;
		margin-bottom: 0px;
		color: #40054a;
		font-weight: 700;
		font-size: 22px;
	}

	.time-zone {
		width: 81%;
		margin: -44px auto 0px;
	}

	/* animation class and keyframes */
	.overflow-hidden {
		overflow: hidden;
	}

	.drop-in {
		animation: drop-in 1s ease 200ms forwards;
	}

	img.loho-2 {
		width: 45%;
	}

	@keyframes drop-in {
		from {
			opacity: 0;
			transform: translateY(-100px);
		}

		to {
			opacity: 1;
			transform: translate(0px);
		}
	}
</style>
<!DOCTYPE html>

<html>

<head>

	<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
	<title>Registration Department</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">

	<!-- Favicon -->
	<link rel="icon" href="assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
	<script type="text/javascript" src="js/mespeak.js"></script>
	<script src="https://code.responsivevoice.org/responsivevoice.js?key=QzvHp2yA"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!--<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;400&display=swap" rel="stylesheet">-->
</head>

<body>
	<div class="hole-hed">
		<div class="container-fluid">
			<div class="row hed">
				<div class="col-md-4">
					<div class="col-md-12  align-self-center" style="text-align: center;">
						<img src="img/logo-ref.png" class="loho-2">
						<h3> 1 எண் இணை சார்பதிவாளர் அலுவலகம் <br /> தென் சென்னை</h3>
					</div>



					<!--<hr class="no-bre">-->
					<div class="boc">
						<div class="row">

							<div class="col-md-12 col-12 nos">
								<div class="box tab1 overflow-hidden">
									<p>Token Number / வில்லை எண்</p>
									<h3 class="count23 number"><?php echo $toke_no; ?></h3>
									<textarea hidden id="token_no"><?php echo $token_no; ?></textarea>
									<textarea hidden id="toke_no"><?php echo $toke_no; ?></textarea>
									<hr class="du">
									<p>Name / பெயர் </p>
									<h3 class="" style="font-size: 30px !important;"><?php echo $token_name; ?> </h3>
									<textarea hidden id="token_name"><?php echo $token_name; ?></textarea>
									<h3 style="margin-top: 6px;font-size: 25px !important;">
										<span><?php echo ($token_name_tamil); ?></span>
									</h3>


								</div>
								<div class="time-zone">
									<div class="row date">
										<div class="col-md-4 col-4">
											<p><span id="cur_time"></span></p>
										</div>
										<div class="col-md-8  col-8">
											<p><?php echo date("l"); ?> - <?php echo date('d-m-Y'); ?></p>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div style="display :none" ;?>
							<input type="range" id="rate" min="1" max="100" value="10" />
							<input type="range" id="pitch" min="0" max="2" value="1" />
							<input type="text" id="voices" value="Google UK English Female" />
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4"></div>
			<div class="col-md-4"></div>






</body>

<script src="ajax/libs/jquery.min.js"></script>
<script>
	//$(".number").counterUp({time:3000});


	setTimeout(function() {
		window.location.reload(1);
	}, 25000);


	$(document).ready(function() {

		speak();
		var today = new Date();
		if (today.getMinutes() < 10) {
			var min = "0" + today.getMinutes();
		} else {
			var min = today.getMinutes();
		}

		var time = today.getHours() + ":" + min;

		if (today.getHours() <= 11) {

			document.getElementById('cur_time').innerHTML = time + " AM";
		} else {
			document.getElementById('cur_time').innerHTML = time + " PM";
		}

	});

	function speak() {
		function loadVoice() {
			meSpeak.loadVoice("voices/en/en-wm.json", voiceLoaded);
		}

		function voiceLoaded(success, message) {
			if (success) {
				// meSpeak 
				var text = $('#token_no').val();
				var token_no = $('#toke_no').val();
				var uToken = token_no.split('').join(' ');
				var token_name = $('#token_name').val();
				// 			responsiveVoice.speak(text,"Tamil Male",{ rate: 0.8});

				responsiveVoice.speak("Your Token Number is", "Tamil Female", {
					rate: 1.3,
					onend: function() {
						setTimeout(function() {
							responsiveVoice.speak(uToken, "Tamil Female", {
								rate: 1.1,
								onend: function() {
									setTimeout(function() {
											responsiveVoice.speak("Your Name",
												"Tamil Female", {
													rate: 1.3,
													onend: function() {
														setTimeout(function() {
																responsiveVoice
																	.speak(
																		token_name,
																		"Tamil Female", {
																			rate: 1.1
																		});
															},
															500
														); // Wait 0.5 seconds before speaking the name
													}
												});
										},
										500
									); // Wait 0.5 seconds before speaking the name label
								}
							});
						}, 500); // Wait 0.5 seconds before speaking the token number
					}
				});



				// 			meSpeak.speak(text, {
				// 				amplitude: 90,
				// 				wordgap: 5,
				// 				pitch: 70,
				// 				speed: 140,
				// 				variant: 'f5'
				// 			});
			} else {
				alert("Failed to load a voice: " + message);
			}
		}
		loadVoice();


		// meSpeak.speak($('#token_no').val());


		// for (var i = 0; i <= 2; i++) {
		// 	var text = $('#token_no').val();
		// 	var msg = new SpeechSynthesisUtterance();
		// 	var voices = window.speechSynthesis.getVoices();
		// 	msg.voice = voices[$('#voices').val()];
		// 	msg.rate = $('#rate').val() / 15;
		// 	msg.pitch = $('#pitch').val();
		// 	msg.text = text;

		// 	msg.onend = function(e) {
		// 		console.log('Finished in ' + event.elapsedTime + ' seconds.');
		// 	};

		// 	speechSynthesis.speak(msg);
		// }
	}
</script>
<script src="js/mespeak.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/js/materialize.min.js"></script>

</html>