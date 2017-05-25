<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php

        if(isset($data['error'])) echo $data['error'];

        ?>

        <form method="POST" action="/authentication/register">
            <input type="text" name="login" placeholder="Login"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Register</button>
        </form>
    </body>
</html>