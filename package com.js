package com.example;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/hello")
public class HelloServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) 
            throws ServletException, IOException {
        // Set content type
        response.setContentType("text/html");

        // Write response
        response.getWriter().append("<html>")
                            .append("<head><title>Hello Servlet</title></head>")
                            .append("<body>")
                            .append("<h1>Hello from the Servlet!</h1>")
                            .append("<p>This is a simple Java Servlet example.</p>")
                            .append("<p><a href='hello.jsp'>Go to JSP Page</a></p>")
                            .append("</body>")
                            .append("</html>");
    }
}
