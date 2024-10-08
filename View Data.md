# Fetch data from a MySQL database and display it in an HTML table using PHP:

### Step 1: Set up the Database
First, ensure you have a MySQL database created and some data in a table. For this example, let's create a database `mydb` and a table `users`.

1. **Create Database and Table**:
   ```sql
   CREATE DATABASE mydb;

   USE mydb;

   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100),
       email VARCHAR(100),
       age INT
   );

   INSERT INTO users (name, email, age) VALUES
   ('Pankaj', 'pankaj@example.com', 25),
   ('Rahul', 'rahul@example.com', 22),
   ('Priya', 'priya@example.com', 30);
   ```

### Step 2: Create a PHP File to Connect to the Database
To connect to the MySQL database using PHP, create a file called `connect.php`.

```php
<?php
// Database connection details
$servername = "localhost";
$username = "root";  // Default MySQL username
$password = "";      // Leave empty if no password is set for MySQL
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

### Step 3: Fetch Data from Database
Now, you need to write a PHP script to fetch the data and display it in an HTML table. Create a file named `display_users.php`.

```php
<?php
// Include the connection file
include 'connect.php';

// SQL query to fetch data
$sql = "SELECT id, name, email, age FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>User List</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
    </tr>

    <?php
    // Check if any results were returned
    if ($result->num_rows > 0) {
        // Loop through and display each row as a table row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data available</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
```

### Step 4: Run the Application
- Place the `connect.php` and `display_users.php` files in your web server directory (e.g., `htdocs` in XAMPP for local development).
- Open a browser and go to: `http://localhost/display_users.php`.

This will display the user data from your `users` table in an HTML table format.

### Explanation:
1. **Database Connection**: The `connect.php` file connects to the database using `mysqli`.
2. **SQL Query**: The query in `display_users.php` fetches data from the `users` table.
3. **Displaying in Table**: The PHP script loops through the result set and dynamically generates HTML table rows for each user record.
4. **Closing Connection**: At the end, the database connection is closed using `$conn->close()`.

This method can be used to display any kind of data from the database in an HTML table using PHP.
