<!DOCTYPE html >
<html lang="en">
<head>
	
</head>
			<body>
			<h1>Hi <?php echo $name[0]?></h1>
			<label>Click the button below to activate your JuanCreatives account.</label>
			<a href="<?php echo url('/').'/signup/verifyaccount/'.$userid.'/'.$verificationCode;?>"><button><?php echo url('/').'/signup/verifyaccount/'.$userid.'/'.$verificationCode;?></a>

			</body>
</html>