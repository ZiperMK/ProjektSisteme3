<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h1>Login</h1>
        <form action="../DB/loginuser.php" method="post">
            <fieldset>
                <label>Username</label>
                <input required minlength="1" maxlength="12" title="1-12 characters" type="text" name="uname" placeholder="Username"><br>
                <label>Password</label>
                <input required minlength="1" maxlength="20" title="1-12 characters" type="password" name="pw" placeholder="Password"><br>
            </fieldset>
        <input type="submit" value="Login">    
        </form>
    </body>
</html>