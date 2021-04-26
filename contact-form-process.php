<?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$msg=$_POST['msg'];

		$to='wickedwiresruss@gmail.com'; // Receiver Email ID, Replace with your email ID
		$subject='Form Submission';
		$message="Name: ".$name."\n"."Email: ".$email."\n"."Wrote the following: "."\n\n".$msg;
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			header('Refresh: 1; URL=/wickedwires/indexMsgThks.php');
		}
		else{
			echo "Something went wrong!";
		}
	}
?>