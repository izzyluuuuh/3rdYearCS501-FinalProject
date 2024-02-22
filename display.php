<?php
session_start();
?>
<!-- display.php -->
<form action="login.php" method="POST">
    <div class="login">
        <p><a href="login.php">Login</a></p>
    </div>
</form>

<?php
class FormInfoClass {
    //Properties
    public $username;
    public $password;
    public $last_name;
    public $first_name;
    public $middle_initial;
    public $age;
    public $contact_number;
    public $email;
    public $address;

    //Getters and Setters
    public function getUsername() {
        return $this->username;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getLastName() {
        return $this->last_name;
    }
    
    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }
    
    public function getFirstName() {
        return $this->first_name;
    }
    
    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }
    
    public function getMiddleInitial() {
        return $this->middle_initial;
    }
    
    public function setMiddleInitial($middle_initial) {
        $this->middle_initial = $middle_initial;
    }
    
    public function getAge() {
        return $this->age;
    }
    
    public function setAge($age) {
        $this->age = $age;
    }
    
    public function getContactNumber() {
        return $this->contact_number;
    }
    
    public function setContactNumber($contact_number) {
        $this->contact_number = $contact_number;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getAddress() {
        return $this->address;
    }
    
    public function setAddress($address) {
        $this->address = $address;
    }
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_initial = $_POST['middle_initial'];
$age = $_POST['age'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$address = $_POST['address'];

// Create FormInfoClass object
$formInfo = new FormInfoClass();

// Set form data
$formInfo->setUsername($username);
$formInfo->setPassword($password);
$formInfo->setLastName($last_name);
$formInfo->setFirstName($first_name);
$formInfo->setMiddleInitial($middle_initial);
$formInfo->setAge($age);
$formInfo->setContactNumber($contact_number);
$formInfo->setEmail($email);
$formInfo->setAddress($address);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Form Validation</title>
    </head>
    <body>
        <div class="container">
            <?php
                // Display form data
                echo "<h3>User Information:</h3><br>";
                echo "Username: " . $formInfo->getUsername() . "<br>";
                echo "Password: " . $formInfo->getPassword() . "<br>";
                echo "Last Name: " . $formInfo->getLastName() . "<br>";
                echo "First Name: " . $formInfo->getFirstName() . "<br>";
                echo "Middle Initial: " . $formInfo->getMiddleInitial() . "<br>";
                echo "Age: " . $formInfo->getAge() . "<br>";
                echo "Contact Number: " . $formInfo->getContactNumber() . "<br>";
                echo "Email: " . $formInfo->getEmail() . "<br>";
                echo "Address: " . $formInfo->getAddress() . "<br>";
            ?>
        </div>
    </body>
</html>

<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_initial = $_POST['middle_initial'];
$age = $_POST['age'];
$contact_number = $_POST['contact_number'];
$email = $_POST['email'];
$address = $_POST['address'];

// Create the table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Inventory (
    id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    middle_initial VARCHAR(10),
    age INT(3) NOT NULL,
    contact_number VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL
)";

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Check if username already exists
    $usernameQuery = "SELECT * FROM Inventory WHERE username = '$username'";
    $usernameResult = $conn->query($usernameQuery);

    if ($usernameResult->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
        exit;
    }

    // Check if email already exists
    $emailQuery = "SELECT * FROM Inventory WHERE email = '$email'";
    $emailResult = $conn->query($emailQuery);

    if ($emailResult->num_rows > 0) {
        echo "Email already exists. Please use a different email address.";
        exit;
    }


    // If username and email are unique, proceed with registration
//Insert form data into database
$sql = "INSERT INTO inventory (username, password, last_name, first_name, middle_initial, age, contact_number, email, address)
        VALUES ('$username', '$password', '$last_name', '$first_name', '$middle_initial', '$age', '$contact_number', '$email', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


// Use the SQL UPDATE statement here (REQ 03)
$updateSql = "UPDATE Inventory SET username = 'new_username' WHERE id = 1";
if ($conn->query($updateSql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

// Use the SQL DELETE statement here (REQ 04)
$deleteSql = "DELETE FROM Inventory WHERE id = 2";
if ($conn->query($deleteSql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<br>
    <br>
    <br>
    <div class="return">
    <a href="index.php">Back</a></p>
    </div>

<style>
body {
    background-color: #222;
    color: #fff;
    font-family: Arial, sans-serif;
}
    /* Styles for the login form */
form {
    /* display: flex; */
    justify-content: left;
    align-items: center;
    height: 10vh;
}

.login {
    background-color: #333;
    color: #fff;
    padding: 20px;
    border-radius: 5px;
}

.login a {
    color: #fff;
    text-decoration: none;
}

/* Styles for the container */
.container {
    background-color: #222;
    color: #fff;
    padding: 20px;
    border-radius: 5px;
    margin-top: 20px;
}

.container h3 {
    margin-bottom: 10px;
}
/* Styles for the return link */
.return {
    text-align: left;
    margin-top: 20px;
}

.return a {
    color: #fff;
    text-decoration: none;
}

</style>