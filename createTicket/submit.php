<?php
	// Include File Upload Function
	include("fileupload.php");
?>

<?php
	if(isset($_POST['Submit'])) {
		// POST data
		$input_number=$_POST['input_number'];
		$input_text=$_POST['input_text'];
		$agent=$_POST['agent'];

		// File Upload data
		$path = "tempFolder/";
		$file = $_FILES['uploaded_file']['name'];
		$file_path = $path . $file;

		// Freshdesk domain information
			// Your agent API key
			$api_key = "YOUR_API_KEY";
			// Your Freshdesk subdomain 
				// For example "example.freshdesk.com" enter "example"
			$yourdomain = "YOUR_DOMAIN";

		// Ticket data
		$ticket_payload = array(
			'subject' => "PHP Form",
			'description' => "This ticket was created by a PHP form",
			'type' => "File Upload",
			'email' => "example@example.com",
			'group_id' => 00000000000,
			'responder_id' => $agent,
			'priority' => 1,
			'status' => 2,
			'source' => 2,
			// Custom Fields
			'custom_fields[cf_input_number]' => $input_number,
			'custom_fields[cf_input_text]' => $input_text,
			'attachments[]' => curl_file_create($file_path, "application/pdf", $file)
			);

		// Freshdesk API
		$url = "https://$yourdomain.freshdesk.com/api/v2/tickets";
		$ch = curl_init($url);
		$headers[] = "Content-type: multipart/form-data;";
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_USERPWD, "$api_key");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $ticket_payload);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec($ch);
		$info = curl_getinfo($ch);
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$headers = substr($server_output, 0, $header_size);
		$response = substr($server_output, $header_size);

		// Uncomment below to see logging and errors
		/*
		if($info['http_code'] == 201) {
			echo "Ticket created successfully, the response is given below \n";
			echo "Response Headers are \n";
			echo $headers."\n";
			echo "Response Body \n";
			echo "$response \n";
		} else {
			if($info['http_code'] == 404) {
				echo "Error, Please check the end point \n";
			} else {
				echo "Error, HTTP Status Code : " . $info['http_code'] . "\n";
				echo "Headers are ".$headers;
				echo "Response are ".$response;
			}
		}*/
		curl_close($ch);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ticket Submited</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div>
				Ticket Created Successfully! <br>
				Redirecting in: <div id="counter">5</div>
			</div>
			<script>
				setInterval(function() {
					var div = document.querySelector("#counter");
					var count = div.textContent * 1 - 1;
					div.textContent = count;
					if (count <= 0) {
						window.location.replace("index.php");
					}
				}, 1000);
			</script>
		</div>
	</div>
</body>
</html>

<?php
	// Include File Delete Function
	include("filedelete.php");
?>