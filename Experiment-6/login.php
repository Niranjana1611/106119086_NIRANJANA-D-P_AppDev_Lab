<?php
    require('db_conn.php');
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>ABC Institute Login</title>
    <style type="text/css">
        body
        {    
            font-family: sans-serif;   
            background: linear-gradient(-45deg, #23a6d5, #23d5ab);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }    
        input[type="text"], input[type="email"], input[type="password"]
        {    
            width: 250px;
            height: 20px;    
        }    
        input[type="submit"], input[type="reset"] 
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
        table
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
        td 
        {    
            padding: 10px;    
        }    
        td:first-child 
        {    
            text-align: right;    
            font-weight: bold;    
        }    
        td:last-child 
        {    
            text-align: left; 
        } 
    </style>
</head>
<body>
    <br>
    <h1 align="center">ABC INSTITUTE</h1>
    <br>
    <form method="POST" action="register.php">
        <table>
            <tr>
                <td>Email: </td><td><input type="email" id="Email" name="email" required></td>
            </tr>
            <tr>
                <td>Password: </td><td><input type="password" id="Password" name="password" required></td>
            </tr>
            <tr>
                <td></td><td><input type="submit" name="Login" value="Login"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">Don't have an Account? <a href="index.php">SIGNUP</a></td>
            </tr>
        </table>
    </form>
</body>
</html>