<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create Freshdesk Ticket w/ Attachment</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		/* Center DIV */
		.centered {
			text-align: center;
			vertical-align: middle;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="centered">
				<h2>Create Ticket w/ Attachment</h2>
			</div>
		</div>
		<form name="form" method="post" enctype="multipart/form-data" action="submit.php">
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label>Input Number</label>
						<input type="text" class="form-control" name="input_number" required>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label>Input Text</label>
						<input type="text" class="form-control" name="input_text" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label>Select Agent</label>
						<select class="form-control" name="agent" required>
							<option>-</option>
							<option value="00000000000">Agent 1</option>
							<option value="00000000000">Agent 2</option>
							<option value="00000000000">Agent 3</option>
							<option value="00000000000">Agent 4</option>
						</select>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label>Upload File</label>
						<input type="file" class="form-control" name="uploaded_file">
					</div>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="centered">
					<div class="col-xs-12">
						<button type="submit" name="Submit" value="Submit" class="btn btn-default btn-sm">
							<span class="glyphicon glyphicon-refresh"></span> Upload Attachment
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>