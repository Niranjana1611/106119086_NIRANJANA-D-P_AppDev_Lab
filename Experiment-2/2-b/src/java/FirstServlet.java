import java.io.*;  
import javax.servlet.*;  
import javax.servlet.http.*;  
public class FirstServlet extends HttpServlet {  
    public void doGet(HttpServletRequest request, HttpServletResponse response){  
        try{    
            response.setContentType("text/html");  
            PrintWriter out = response.getWriter();  

            String username = request.getParameter("userName");
            String password = request.getParameter("password");
            
            if(username == null || username.equals("") || password == null || password.equals(""))
            {
                out.print("Please Enter both User Name and Password");
                RequestDispatcher requestDispatcher =request.getRequestDispatcher("/index.html");
                requestDispatcher.include(request, response);
            }
            
            else if(username.equals(password))
            {
                out.println("<html>"
                + "<head>"
                + "<title>Servlet</title>"
                + "<style>body\n" +
        "            {    \n" +
        "                font-family: sans-serif;   \n" +
        "                text-align: center;   \n" +
        "                background: Cyan;\n" +
        "                background-repeat: no-repeat;\n" +
        "                background-attachment: fixed;\n" +
        "            }    \n" +
        "            table\n" +
        "            {    \n" +
        "                border-radius: 5px;\n" +
        "                border-spacing: 0 15px;\n" +
        "                text-align: center;    \n" +
        "                background: white;\n" +
        "                font-family: sans-serif;    \n" +
        "                font-size: 20;    \n" +
        "                border: 3px solid black;    \n" +
        "                width: 600px;    \n" +
        "                margin: 20px auto;    \n" +
        "            }    \n" +
        "            td \n" +
        "            {    \n" +
        "                padding: 10px;    \n" +
        "            }    \n" +
        "            </style>"
                + "</head>");
        out.println("<body style='background: Cyan'>"
                + "<h1>Login Successful</h1>"
                + "<form action='SecondServlet'>"
                + "<input type='hidden' name='uname' value='"+username+"'>"
                + "<br><h2>Welcome "+username+"</h2>"
                        + "<br><table style='text-align: center'>"
                            + "<tr><td>Username:</td><td>"+username+"</td></tr>"
                            + "<tr><td colspan='2' style='text-align: center'><input type='submit' value='Check Hit Count'></td></tr>"
                        + "</table></form>"
                    + "</body></html>"); 
            }
            else 
            {
                out.print("Wrong Password");
                RequestDispatcher requestDispatcher =request.getRequestDispatcher("/index.html");
                requestDispatcher.include(request, response);
            }
        }
        catch(Exception e){System.out.println(e);}  
    }   
}