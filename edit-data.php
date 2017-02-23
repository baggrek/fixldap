<!DOCTYPE html>
<html>
<head>
	<title>Rubah Data</title>
	<?php
		include("navbar.php");
	?>
</head>
<body>
	<?php
		$id = $_GET['id'];
		include("koneksi.php");

	?>
	<div class="container">
	<h1>Rubah Data</h1></br>
		<div class="row">
			<div class="col-md-6 col-lg-6 col-xs-12">
				<form action="edit-data-proses.php" method="POST">
				<input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
				<tr>
					<td>User Name</td>
					<td>:</td>
					<td><input type="text" name="user_name" class="form-control" required=""></td>
				</tr>
				<tr>
					<td>User Name</td>
					<td>:</td>
					<td><input type="password" name="sandi" class="form-control" required=""></td>
				</tr>
				<tr>
					<td><input type="submit" name="rubah" value="Save"></td>
				</tr>
					
				</form>
			</div>
		</div>
	</div>
</body>
</html>