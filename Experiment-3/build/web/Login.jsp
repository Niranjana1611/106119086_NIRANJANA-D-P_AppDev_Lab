<%-- 
    Document   : Login
    Created on : 10-Feb-2022, 1:31:01 am
    Author     : Niranjana
--%>

<%@ page import="java.sql.*"%>
<%@ page import="java.util.*"%>
<%!
    Connection con;
    PreparedStatement ps1, ps2;
    public void jspInit()
    {
        try
        {
            Class.forName("org.apache.derby.jdbc.ClientDriver").newInstance();
            con = DriverManager.getConnection("jdbc:derby://localhost:1527/Experiment3","root","Niranjana");
            ps1 = con.prepareStatement("SELECT COUNT(*) FROM USERS WHERE rollnumber = ? AND password=?");
            ps2 = con.prepareStatement("SELECT * FROM USERS");
        }
        catch(Exception ex)
        {
            ex.printStackTrace();
        }
    }
%>
<%
    String param = request.getParameter("s1");
    if(param =="link")
    {
        ResultSet rs = ps2.executeQuery();
        out.println("<table>");
        while(rs.next())
        {
            out.println("<tr>");
            out.println("<td>"+rs.getString(1)+"</td>");
            out.println("<td>"+rs.getString(2)+"</td");
            out.println("</tr>");
        }
        out.println("</table>");
        rs.close();
    }
    else
    {
        String user = request.getParameter("rno");
        String pass = request.getParameter("pass");
        ps1.setString(1,user);
        ps1.setString(2,pass);
        ResultSet rs = ps1.executeQuery();
        int cnt = 0;
        if (rs.next())
        cnt = rs.getInt(1);
        if(cnt == 0)
        {
            out.println("<html> "
            + "<head> <title>Login</title> <meta charset='UTF-'> <meta name='viewport' content='width=device-width, initial-scale=1.0'>"
            + "<style> body{ font-family: sans-serif; background: lightgreen; background-attachment: fixed; text-align: center;} div{ text-align: center; border: 5px outset black;background-color: White; width: 50%; padding: 10px; margin: auto; }</style> </head>");
            out.println("<body><br><br><br><div>"
            + "<br><b><i><h2><font color=red>INVALID CREDENTIALS</fonr></h2></i></b><br><br>"
            + "<a href='index.html'><input type='button' value='LOGIN AGAIN'></a>"
            + "<br><br></div><body>"
            + "</html>");
        }
        else
        {
            out.println("<html> "
            + "<head> <title>Login</title> <meta charset='UTF-'> <meta name='viewport' content='width=device-width, initial-scale=1.0'>"
            + "<style> body{ font-family: sans-serif; background: lightgreen; background-attachment: fixed; text-align: center;} div{ text-align: center; border: 5px outset black;background-color: White; width: 50%; padding: 10px; margin: auto; }</style> </head>");
            out.println("<body><br><br><br><div>"
            + "<br><b><i><h2><font color=green>LOGIN SUCCESSFUL!</font></h2></i></b><br><br>"
            + "<h3><i>INSTRUCTIONS</i></h3><br>"
            + "1. There are 5 questions in total. Attend all the queations.<br><br>"
            + "2. Each question carries 5 marks.<br><br>"
            + "3. Once you submit the exam, your report will be displayed.<br><br>"
            + "4. If you get 25 you will be considered as PASS with FULL MARKS;"
            + "<br> If you get above 10 you will be considered PASS;"
            + "<br> If you get below 10 you will be considered as FAIL.<br><br>"
            + "5. Please click the below button to start your Exam.<br><br><br>"
            + "<a href='test.html'><input type='button' value='START EXAM'></a>"
            + "<br><br></div><body>"
            + "</html>");
        }
    }
 %>
<%!
    public void jspDestroy()
    {
        try
        {
           ps1.close();
           ps2.close();
           con.close();
        }
        catch(Exception ex)
        {
           ex.printStackTrace();
        }
    }
%>
