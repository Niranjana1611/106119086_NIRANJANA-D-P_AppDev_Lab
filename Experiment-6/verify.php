<?php
    require('db_conn.php');
    $email = $_GET['email'];
    $v_code = $_GET['v_code'];
    
    if(isset($_GET['email']) && isset($_GET['v_code']))
    {
    	$sql = "SELECT * FROM users WHERE email='$email' AND verification_code='$v_code'";
    	$result = mysqli_query($conn, $sql);
    	if($result)
    	{
    		if(mysqli_num_rows($result)==1)
    		{
    			$result_fetch = mysqli_fetch_assoc($result);
    			if($result_fetch['is_verified'] == '0')
    			{
    				$update = "UPDATE users SET is_verified = '1' WHERE email='$email' AND verification_code='$v_code'";
    				if(mysqli_query($conn, $update))
    				{
    					echo "<script>
    						alert('Email Verification Successful! Please LOGIN');
    						window.location.href = 'index.php';
    					</script>";
    				}
    				else
    				{
    					echo "<script>
								alert('Cannot run Query');
								window.location.href = 'index.php';
							</script>";
    				}
    			}
    			else
    			{
    				echo "<script>
    						alert('Email Already Registered');
    						window.location.href = 'index.php';
    					</script>";
    			}
    		}
    	}
    	else
    	{
    		echo "<script>
					alert('Cannot run Query');
					window.location.href = 'index.php';
				</script>";
    	}
    }
?>