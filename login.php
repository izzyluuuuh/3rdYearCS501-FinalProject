<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
    body {
        background-color: #000;
        color: #fff;
        font-family: Arial, sans-serif;
    }
    
    .container {
        max-width: 372px;
        margin: 0 auto;
        padding: 20px;
        background-color: #1C1C1C;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1)
    }

    h1 {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
    }

    form {
        width: 300px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-size: 16px;
    }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #A288E3;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4A525A;
            /* #DADDD8; */
            color: #000;
        }

        p {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        a {
            color: 000022;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
</style>
</head>
<body>
    <div class="container">
    <h1>Login</h1>
    <br>
    <!-- <form action="portfolio.php" method="POST"> -->
    <form action="portfolioalt.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" name="login" value="Login">
        
        <p>
                Not yet a member? <a href="index.php">Sign up</a>
        </p>
    </form>
    </div>
</body>
</html>