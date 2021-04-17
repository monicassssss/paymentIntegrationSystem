
<html>
    <head>
        <title>sign up form</title>
        <link rel="stylesheet" href="x.css">
        <body>
            <div class="login">
                <img src="i.png" class="avatar">
                <h1>Login Form</h1>
                <form action= "authentication.php" method="post">
                    <p>E-mail OR Username</p>
                    <input type="text" name="username" placeholder="Enter Username" required>
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Strong Password" required>
                    <input type="submit" name="login" value="Login">
                    <a href="#" >Forget Password</a><br>
                    <a href="#">Don't have account?</a>
                </form>
            </div>

        </body>
    </head>
    </html>