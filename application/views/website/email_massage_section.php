<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>email Massage</title>
</head>
<body>
	<h1>email massage</h1>
	<div class="email_to">
		
			<span>To</span>
			<input type="email" name="email" name = "email">
			<a href="<?= base_url('USER/FILTER/index'); ?>">
				<i class="fa-solid fa-filter"></i>
			</a>
	</div>
	<div class="email_from">
		<span>From</span>
		<input type="email" name="email" name = "email">
		<a href="<?= base_url('USER/PROJECTMAIL/to_email'); ?>">
			<i class="fa-solid fa-filter"></i>
		</a>
	</div> 	
	<div class="email_subject">
		<a href="<?= base_url('USER/PROJECTMAIL/to_subject'); ?>">subject</a>
	</div>
	<div class="email_massage">
		<a href="<?= base_url('USER/PROJECTMAIL/to_massage/'); ?>">massage</a>
	</div>
	<a href="<?= base_url('USER/PROJECTMAIL/email_send_process'); ?>">send</a><a href="<?= base_url('USER/PROJECTMAIL/email_save_process'); ?>">save</a>
	<p style="color: red;"><?php echo $_SESSION['please_insert_save_mail_data']; ?></p>


</body>
</html>