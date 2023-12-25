<style type="text/css">
	.header {
		width: 100%;

		font-family: Calibri;
		margin-top: 325px;
		margin-bottom: 325px;
		margin-right: 50%;
		margin-left: 40%;

	}

	input[type=text],
	select {
		width: 20%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	input[type=submit],
	.btn {
		width: 10%;
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}
</style>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/css/materialize.min.css">-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.1/js/materialize.min.js"></script>

<div class="header">
	<h1>Registration Department</h1>

	<form name="register" method="post" action="" enctype="multipart/form-data">
		<div class="input-group">
			<label style="font-weight: bold;font-size: 20px">Token No&ensp;&emsp;</label>
			<input type="text" name="token_no" id="token_no"><br><br>
			<label style="font-weight: bold;font-size: 20px">Name&emsp;&emsp;&emsp;</label>
			<input type="text" name="user_name" id="user_name"><br><br>
			<label style="font-weight: bold;font-size: 20px">Name(Tamil)&ensp;</label>
			<input type="text" name="user_name_tamil" id="user_name_tamil"><br><br>


			<button type="button" class="btn" onclick="saveData()">Save</button>

			<button class="btn" onclick="speak(voice_speak.value)">Speak</button>
		</div>
		<table border='1' cellpadding='10'>
			<thead>
				<tr>
					<th>Token No</th>
					<th>Token Name</th>
					<th>Token Name Tamil</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</form>

</div>

<?php
error_reporting(E_ERROR | E_PARSE);
// $database_username = 'root';
// $database_password = 'u.VychRqb]3lVpr(';
//  $pdo_conn = new PDO('mysql:host=localhost;dbname=register_office',$database_username,$database_password);

$database_username = 'root';
$database_password = 'password';
$pdo_conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=register_db', $database_username, $database_password);

//echo $pdo_conn;
if ($pdo_conn) {
	// echo "ok";
} else {
	// echo "nok";
}
$pdo_statement = $pdo_conn->prepare("SELECT * FROM register_details where id!='' ORDER BY id DESC");
$pdo_statement->execute();
$token_details = $pdo_statement->fetch(PDO::FETCH_ASSOC);
$spk_status = $token_details['speak_status'];


?>
<input type="hidden" name="voice_speak" id="voice_speak" value='<?php echo $spk_status; ?>'><br><br>

<script src="/ajax/libs/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		fetch_data();
		var voice_speak = $('#voice_speak').val();
		speak(voice_speak);

	});

	function fetch_data() {
		$.ajax({
			type: "POST",
			url: "crud.php",
			data: "action=list",
			success: function(data) {
				console.log({
					data
				})
				if (data) {
					$('tbody').html(data);


				} else {
					$('tbody').html('');
				}
			}
		});

	}

	function clearInput() {
		document.getElementById('token_no').value = "";
		document.getElementById('user_name').value = "";
		document.getElementById('user_name_tamil').value = "";
	}

	function saveData() {
		var token_no = document.getElementById('token_no').value;
		var user_name = document.getElementById('user_name').value;
		var user_name_tamil = document.getElementById('user_name_tamil').value;

		if (token_no && user_name && user_name_tamil) {
			var action = "insert";
			var formData = new FormData();
			formData.append('token_no', token_no);
			formData.append('token_name', user_name);
			formData.append('token_name_tamil', user_name_tamil);
			formData.append('action', action);
			formData.append('speak_status', 0);

			$.ajax({
				type: "POST",
				url: "crud.php",
				data: formData,
				processData: false,
				contentType: false,
				success: function(data) {
					fetch_data();
					clearInput();
					// Handle success
				},
				error: function(jqXHR, textStatus, errorThrown) {
					// Handle error
				}
			});
		} else {
			alert("Please fill in all fields");
		}
	}



	function speak(voice_speak) {
		if ((voice_speak == 0) || (voice_speak == '')) {
			$('#voice_speak').val('1');
		} else {
			$('#voice_speak').val('0');
		}
		var speak_status = $('#voice_speak').val();
		var action = "update";
		$.ajax({
			type: "POST",
			url: "crud.php",
			data: "speak_status=" + speak_status + "&action=" + action,
			success: function(data) {
				fetch_data();
			}
		});


	}
</script>