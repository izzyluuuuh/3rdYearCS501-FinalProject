<!DOCTYPE html>
<html>
<head>
    <title>Account Registration Form</title>
    <style>
    body {
        background-color: #000;
        color: #fff;
        font-family: Arial, sans-serif;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1C1C1C;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1)
        }

        h1 {
            text-align: center;
            margin-bottom: 50px;
        }

        form {
            margin: 0 auto;
            width: 400px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #C1BDB3;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        input[type="tel"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 3px solid #001242;
        }

        input[type="submit"] {
            background-color: #A288E3;
            color: #000;
            padding: 10px 20px;
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
        }

        a {
            color: 000022;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
        ::placeholder {
             color: red;
        }
</style>
</head>
<body>
<div class="container">
    <h1>Account Registration</h1>
    <form action="display.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="*" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="*" required><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" placeholder="*" required><br><br>
        
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" placeholder="*" required><br><br>
        
        <label for="middle_initial">Middle Initial:</label>
        <input type="text" id="middle_initial" name="middle_initial"><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" placeholder="*" required><br><br>
        
        <label for="contact_number">Contact Number:</label>
        <input type="tel" id="contact_number" name="contact_number" placeholder="*" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="*" required><br><br>
        
        <label for="address">Address:</label>
        <textarea id="address" name="address" placeholder="*" required></textarea><br><br>
        
        <input type="submit" value="Register">

        <p>
                Already a member? <a href="login.php">Sign in</a>
        </p>
        <br>
        <br>


        <div class="updatecon">
        <label for="new_username">New username</label>
        <input type="text" id="new_username" name="new_username">

        <input type="submit" value="Update" name="update">
        </div>
    </form>
    </div>
</body>
</html>