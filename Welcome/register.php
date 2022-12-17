<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <h1>Registracija</h1>
        <form action="../DB/insertuser.php" method="post">
            <fieldset>
                <label>Username</label>
                <input required minlength="1" maxlength="12" title="1-12 characters" type="text" name="uname" placeholder="Username"><br>
                <label>E-mail</label>
                <input required minlength="1" maxlength="50" title="Enter email" type="text" name="email" placeholder="E-mail"><br>
                <label>Password</label>
                <input required minlength="1" maxlength="20" title="1-12 characters" type="password" name="pw" placeholder="Password"><br>
                <label>Confirm password</label>
                <input required minlength="1" maxlength="20" title="1-12 characters" type="password" name="pw_0" placeholder="Confirm password"><br>
            </fieldset>
        <input type="submit" value="Register now!">    
        </form>
    </body>
</html>