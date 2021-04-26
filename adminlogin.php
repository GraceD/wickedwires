<?php
if (isset($_POST['submit']))
{
$email=$_POST['email'];
$pw=$_POST['pw'];
$sql = "SELECT * FROM admin WHERE username = '$email' AND password = '$pw';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['email'];
			$message='Logged in successfully';
			echo "<script> window.location.assign('admin.php'); </script>";
		}
		else{
			$message = 'Wrong email or password.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<?=template_header('Admin Login')?>
<script type="text/javascript">
	function validate()	{
		var pw=document.getElementById("pw");
		if(pw.value.length< 8)
		{
			alert("Password consists of atleast 8 characters");
			pw.focus();
			return false;
		}
		return true;
	}
</script>
<div class="card-body text-center mx-auto bg-white mt-0 shadow col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
	<div id="loginarea" class="text-center">
  <form id="login" action="index.php?page=admin" onsubmit="return validate()" method="post" name="login">
  <h1 id="logintext" class="h3 mb-3 font-weight-normal">Sign in</h1>
	<table>
		<tr><td><div class="data">Username:</div></td><td><input type="text" id="email" size="30" maxlength="30" name="email"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><div class="data">Password:</div></td><td><input type="password" id="pw" size="30" maxlength="30" name="pw"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	</table>
	<br>
	<INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block">
</div>
  </form></div>
  <br><br><br>
</div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<?=template_footer()?>