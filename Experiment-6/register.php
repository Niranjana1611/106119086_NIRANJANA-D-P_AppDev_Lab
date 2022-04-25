<?php
    require('db_conn.php');
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	function sendMail($email, $v_code)
	{
		require 'vendor/autoload.php';
		$mail = new PHPMailer(true);

		try 
		{
		    $mail->isSMTP();
		    $mail->Host       = 'smtp.gmail.com';
		    $mail->SMTPAuth   = true;
		    $mail->Username   = 'niranjanadhanasekaran@gmail.com';
		    $mail->Password   = 'niranju2001';
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		    $mail->Port       = 465;

		    $mail->setFrom('niranjanadhanasekaran@gmail.com', 'ABC Institute');
		    $mail->addAddress($email);

		    $mail->isHTML(true);
		    $mail->Subject = 'ABC Institute Email Verification';
		    $mail->Body    = "Thanks for Registration!
		    					Click the link to verify the Account
		    					<a href='http://localhost/Week5_Qn6/verify.php?email=$email&v_code=$v_code'>VERIFY</a>";

		    $mail->send();
		    return true;
		} 
		catch (Exception $e) 
		{
		    return false;
		}
	}

    if(isset($_POST['SignUp']))
    {
    	$username = $_POST['username'];
    	$email = $_POST['email'];
		
    	$user_exist_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    	$result = mysqli_query($conn, $user_exist_query); 
    	if($result)
    	{
    		if(mysqli_num_rows($result)>0)
    		{
    			$result_fetch = mysqli_fetch_assoc($result);
    			if($result_fetch['username'] == $username)
    			{
    				echo "<script>
    						alert('Username already taken');
    						window.location.href = 'index.php';
    					</script>";
    			}
    		}
    		else
    		{
    			$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    			$v_code = bin2hex(random_bytes(16));
    			$query = "INSERT INTO users (username, email, password, verification_code, is_verified) VALUES ('$username', '$email', '$password', '$v_code', '0')";

    			if(mysqli_query($conn, $query) && sendMail($email, $v_code))
    			{
    				echo "<script>
    						alert('Registration Successful! Please check your Email for Verifying your Account');
    						window.location.href = 'index.php';
    					</script>";
    			}
    			else
    			{
    				echo "<script>
    						alert('Server Down');
    						window.location.href = 'index.php';
    					</script>";
    			}
    		}
    	}
    }

    if(isset($_POST['Login']))
    {
    	$email = $_POST['email'];
    	$password = $_POST['password'];

    	$user_query = "SELECT * FROM users WHERE email='$email'";
    	$result = mysqli_query($conn, $user_query); 

    	if($result)
    	{
    		if(mysqli_num_rows($result) == 1)
    		{
    			$result_fetch = mysqli_fetch_assoc($result);
    			if(password_verify($password, $result_fetch['password']))
    			{
    				$_SESSION['logged_in'] = true;
    				$_SESSION['username'] = $result_fetch['username'];
    				header("location: home.php");
    			}
    			else
    			{
    				echo "<script>
							alert('Incorrect Password');
							window.location.href = 'index.php';
						</script>";
    			}
    		}
    		else
    		{
    			echo "<script>
						alert('Email Not Registered');
						window.location.href = 'index.php';
					</script>";
    		}
    	}
    	else
    	{
    		echo "<script>
					alert('Database Error');
					window.location.href = 'index.php';
				</script>";
    	}
    }
?>