<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Details</title>
</head>
<body>
	<h1>view campaing details</h1>
	<?php foreach($results as $result): ?>
	<form action="<?= base_url("USER/CREATE_COMPAING/edit_process/".$result['id']); ?>" method="post">
		<input type="text" name="title" value="<?php echo $result['title'] ?>">
		<input type="text" name="contant" value="<?php echo $result['contant'] ?>">
		<input type="submit" name="">
	</form>
<?php endforeach; ?>

</body>
</html>