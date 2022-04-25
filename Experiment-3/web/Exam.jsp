<%-- 
    Document   : Exam
    Created on : 10-Feb-2022, 1:32:46 am
    Author     : Niranjana
--%>

<%@page contentType="text/html"  language="java"  import="java.sql.*"%>
<html>
    <head>
        <title>Online Exam Server</title>
        <style>
            body
            {    
                font-family: sans-serif;   
                background: lightgreen;
                background-attachment: fixed;
            }
            div
            { 
                text-align: center;
                border: 5px outset black;
                background-color: White;
                width: 50%;
                padding: 10px;
                margin: auto;
            }
        </style>
    </head>
    <body>
        <br><br>
        <h1 style="text-align:center">RESULT</h1>
        <div>
            <%
                String str1=request.getParameter("qn1");
                String str2=request.getParameter("qn2");
                String str3=request.getParameter("qn3");
                String str4=request.getParameter("qn4");
                String str5=request.getParameter("qn5");
                int mark=0;
                Class.forName("org.apache.derby.jdbc.ClientDriver").newInstance();
                Connection
                con=DriverManager.getConnection("jdbc:derby://localhost:1527/Experiment3","root","Niranjana");
                Statement stmt=con.createStatement();
                ResultSet rs=stmt.executeQuery("SELECT * FROM ANSWERS");
                while(rs.next())
                {
                    String dbans1=rs.getString(1);
                    String dbans2=rs.getString(2);
                    String dbans3=rs.getString(3);
                    String dbans4=rs.getString(4);
                    String dbans5=rs.getString(5);
                    if(str1.equals(dbans1)) mark=mark+5;
                    if(str2.equals(dbans2)) mark=mark+5;
                    if(str3.equals(dbans3)) mark=mark+5;
                    if(str4.equals(dbans4)) mark=mark+5;
                    if(str5.equals(dbans5)) mark=mark+5;
                }
                if(mark<=10)
                {
                 out.println("<h4>Your Mark: "+mark+"</h4>"
                 + "<h3>Result: FAIL");
                }
                else if(mark>10 && mark<=20)
                {
                 out.println("<h4>Your Mark: "+mark+"</h4>"
                 + "<h3>Result: PASS");
                }
                else
                {
                 out.println("<h4>Your Mark: "+mark+"</h4>"
                 + "<h3>Result: PASS with FULL Marks!");
                }
            %>
            <br><br>
            <a href="index.html"><input type="button" value="BACK TO LOGIN"></a>
            <br>
        </div>
    </body>
</html>
