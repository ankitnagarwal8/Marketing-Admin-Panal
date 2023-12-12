<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		*{
/*			background: #ffeeff;*/
		}
		.frist{
			
			height: 100%;
			padding: 5rem;
			margin-left: 20rem;

		}
		.second{
			background: #fff;
			padding: 5rem;
			height: 27rem;
			width: 30rem;
			border: 1px dashed red;
			border-radius: 20px;	
		}
		.custom-select {
			min-width: 350px;
			position: relative;
		}

		select {
			appearance: none;
			/*  safari  */
			-webkit-appearance: none;
			/*  other styles for aesthetics */
			width: 100%;
			font-size: 1.15rem;
			padding: 0.675em 6em 0.675em 1em;
			background-color: #fff;
			border: 1px solid #caced1;
			border-radius: 0.25rem;
			color: #000;
			cursor: pointer;
/*			margin-top: 5vh;*/
		}

		.custom-select::before,
		.custom-select::after {
			--size: 0.3rem;
			content: "";
			position: absolute;
			right: 1rem;
			pointer-events: none;
		}

		.custom-select::before {
			border-left: var(--size) solid transparent;
			border-right: var(--size) solid transparent;
			border-bottom: var(--size) solid black;
			top: 40%;
		}

		.custom-select::after {
			border-left: var(--size) solid transparent;
			border-right: var(--size) solid transparent;
			border-top: var(--size) solid black;
			top: 55%;
		}

		input[type=submit] {
			background-color: #0352fc;
			border: none;
			color: #fff;
			font-size: 20px;
			padding: 15px 30px;
			text-decoration: none;
			margin: 4px 2px;
			cursor: pointer;
			height:3.5rem;
			width:22rem;
			margin-top: 4rem;
			border-radius: 5px;
      	}
		
		input[type=file]::file-selector-button {
			margin-right: 20px;
			border: none;
			background: #084cdf;
			padding: 10px 20px;
			border-radius: 10px;
			color: #fff;
			cursor: pointer;
			transition: background .2s ease-in-out;
			margin-top: 4rem;
		}

		input[type=file]::file-selector-button:hover {
  			background: #0d45a5;
  		}
  		img{
  			height: 100px;
  			width:500px;
  			margin-top: 1rem;
  		}
  		
	</style>
</head>
<body>
	<div class="frist">
		<div class="second">

			<form method="post" enctype="multipart/form-data" action="<?= base_url('USER/IMPORT_CONTACT/import'); ?>">
				<div class="custom-select">
					<!-- <input type="text" name="name"> -->
					<?php $options = [
    					'select'  => '--select--',
    					'git'  => 'GitHub',
    					'Linked'    => 'Linked in',
    					'Whatsapp'  => 'Whats App',
    					'Facebook' => 'Facebook',
					];

					echo form_dropdown('shirts', $options, 'large');
					?>
  					
				</div>
				<input type="file" name="file" value="Download SWIFT Code Report">

				<input type="submit" name="importSubmit">
			</form>
			<div class="">
				<p style="color:red;">Please Use Only This Formate & upload .csv file</p>
				<img src="<?= base_url('../assets/image/user_data_str.png'); ?>">
				
			</div>
		</div>
	</div>

</body>
</html>


