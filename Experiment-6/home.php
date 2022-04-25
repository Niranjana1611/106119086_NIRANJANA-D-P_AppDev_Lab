<?php 
session_start();

if (isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style type="text/css">
        body
        {    
            font-family: sans-serif;   
            background: linear-gradient(-45deg, #23a6d5, #23d5ab);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }    
        
        input[type="submit"]
        {    
            text-align: center;
            font-family: sans-serif;  
            font-size: 15px; 
            width: 90px;    
            height: 30px;    
            position: relative;
            left: 100px;    
        }
        input:hover[type="submit"]
        {    
            text-align: center;
            font-family: sans-serif;  
            font-size: 15px; 
        }    
        div
        {    
            border-radius: 5px;
            border-spacing: 0 15px;
            text-align: center;    
            background: white;
            font-family: sans-serif;    
            font-size: 20;    
            border: 3px solid black;    
            width: 600px;    
            margin: 20px auto;    
        }    
    </style>
</head>
<body>
	<br>
	<div>
		<h1>ABC INSTITUTE</h1><br><br>
		<h3>Hello <?php echo $_SESSION['username']; ?>!!</h3><br>
		<a id="logout" href="logout.php"><input type="submit" value="Logout"></a><br><br>
	</div>
</body>
</html>
<?php 
}
else{
     header("Location: index.php");
     exit();
}
?>