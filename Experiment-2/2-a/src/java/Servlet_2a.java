import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class Servlet_2a extends GenericServlet {
    public void service(ServletRequest req, ServletResponse res) throws IOException, ServletException{
        res.setContentType("text/html");
        PrintWriter out = res.getWriter();
        String username = req.getParameter("uname");
        String email = req.getParameter("email");
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
        "            td:first-child \n" +
        "            {    \n" +
        "                text-align: right;    \n" +
        "                font-weight: bold;    \n" +
        "            }    \n" +
        "            td:last-child \n" +
        "            {    \n" +
        "                text-align: left; \n" +
        "            }</style>"
                + "</head>");
        out.println("<body style='background: Cyan'>"
                + "<h1>Login Successful</h1>"
                + "<br><h2>Welcome "+username+"</h2>"
                        + "<br><table style='text-align: center'>"
                            + "<tr><td>Username:</td><td>"+username+"</td></tr>"
                            + "<tr><td>Email:</td><td>"+email+"</td></tr>"
                        + "</table>"
                    + "</body></html>");
    }
}