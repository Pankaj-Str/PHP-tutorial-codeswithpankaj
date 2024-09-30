# codeswithpankaj login logout

# PHP-tutorial-codeswithpankaj
# login system 
### Step 1: Database Setup

First, create a MySQL database and a table to store user information. You can run the following SQL commands:

```sql
CREATE DATABASE user_login;

USE user_login;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert a sample user (password is hashed)
INSERT INTO users (username, password) VALUES ('testuser', '$2y$10$EIXQ9gYUgBQ3mM1ws71N7OCrG/kolL3hFTq4qQm3f1k1Y3BhD9g0u'); 
```

### Step 2: HTML Login Form

Create an `index.php` file for the login form:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
```

### Step 3: PHP Login Logic

Create a `login.php` file to handle the login process:

```php
<?php
// Database connection
$servername = "localhost";
$username = "your_db_username"; // replace with your database username
$password = "your_db_password"; // replace with your database password
$dbname = "user_login";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User exists, verify password
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($input_password, $hashed_password)) {
            echo "Login successful! Welcome, " . htmlspecialchars($input_username) . ".";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
}

$conn->close();
?>
```

### Important Security Notes:

1. **Password Hashing**: Always hash passwords before storing them in the database. In this example, `password_hash` can be used when creating users. For checking passwords, use `password_verify`.

2. **SQL Injection Protection**: Prepared statements are used to prevent SQL injection.

3. **Data Sanitization**: Always sanitize user input to prevent XSS and other attacks.

### Step 4: Testing

1. Access the `index.php` file in your browser.
2. Enter the username `testuser` and the password `password` (the hashed password in the database is for this plaintext password).
3. Submit the form to see the login result.


