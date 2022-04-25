<!DOCTYPE html>
<html>
<head>
    <link href="login_style.css" type="text/css" rel="stylesheet"/>
    <style>
        body
        {    
            font-family: sans-serif;   
            background: lightgreen;
            background-attachment: fixed;
        }
        input[type="text"], input[type="password"]
        {    
            width: 250px;
            height: 20px;    
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
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        function login_check()
        {
            var rollno = $("#rollno").val();
            var password = $("#password").val();
            if(rollno!="" && password!="")
            {
                $.ajax({
                    type:'post',
                    url:'login_check.php',
                    data:
                    {
                        login_check: "login_check",
                        rollno: rollno,
                        password: password
                    },
                    success:function(response) 
                    {
                        if(response=="success")
                        {
                            window.location.href="home.php";
                        }
                        else
                        {
                            alert("Wrong Details");
                        }
                    }
                });
            }
            else
            {
                alert("Please Fill All The Details");
            }
            return false;
        }
    </script>
</head>
<body>
    <br>
    <h1 style="text-align: center">ABC BOOKS</h1><br>
    <form id="myForm" method="post" action="login_check.php" onsubmit="return login_check();">
        <table style="text-align: center">
            <tr>
                <td>Roll Number: </td>
                <td><input type="text" name="rollno" required></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center"><input type="submit" id="submit" name="submit" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>