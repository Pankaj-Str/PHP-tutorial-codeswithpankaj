# Complete PHP + MySQL Student Management System

In this tutorial, we will build a complete Student Registration and Management System from scratch. You will learn how to create a form, save data in a database, display records, update existing records, and delete records. Finally, you will access the project from your phone.

We'll use simple PHP, MySQL, HTML, and CSS with XAMPP, so you don't need to learn a framework first.

[Form Selection](https://images.openai.com/static-rsc-4/-Ey-37TsoMeC-GjXbXypoJViBxjn9NeF1M4ptp6kg8pNq95x8Baa80fKPzVVfK6A2FRfR7TWVFxwJfLg1nZvHM-8RNxMi9K4CUo1nJHOjuwn6rVY7dtLIaHOJhZ3nxE5MBRV9AedqDAEFY99bm7gFwiTZmWWsQxZ-NtPUDoV0Ps?purpose=inline)

## 1. What will we build?

1\. Create student

Register a student with name, email, and course.

2\. Store data

Save student records in a MySQL database.

3\. Read records

Display all registered students in a table.

4\. Update records

Edit a student's information.

5\. Delete records

Remove a selected student from the database.

This is called a CRUD application:

- C — Create
- R — Read
- U — Update
- D — Delete

## 2. Technologies required

| Technology     | Purpose                            |
| -------------- | ---------------------------------- |
| HTML           | Create the form and pages          |
| CSS            | Design a responsive interface      |
| PHP            | Process form submissions           |
| MySQL          | Store student records              |
| XAMPP          | Run Apache, PHP, and MySQL locally |
| phpMyAdmin     | Create and inspect database tables |
| Mobile browser | Access the project from your phone |

## 3. Install XAMPP

Download XAMPP from the official website: [Apache Friends — XAMPP](https://www.apachefriends.org/).

Install it and start the following services in the XAMPP Control Panel:

- Apache
- MySQL

Open your browser and visit:

`http://localhost/`

Then open:

`http://localhost/phpmyadmin/`

If phpMyAdmin opens, your local environment is ready.

For macOS: XAMPP uses an installation directory such as `/Applications/XAMPP/htdocs/`. On Windows, it is commonly `C:\xampp\htdocs\`.

## 4. Create the project folder

Create a folder named `student-management` inside your XAMPP `htdocs` directory.

Windows:

```
C:\xampp\htdocs\student-management
```

macOS:

```
/Applications/XAMPP/htdocs/student-management
```

Create these files:

```
student-management/
│
├── db.php
├── index.php
├── save.php
├── students.php
├── edit.php
├── delete.php
└── style.css
```

We will write the complete code for every file below.

## 5. Create the MySQL database

Open phpMyAdmin:

`http://localhost/phpmyadmin/`

Click New, create a database named `student_db`, then select the SQL tab and execute:

```

CREATE DATABASE IF NOT EXISTS student_db;

USE student_db;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    course VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

```

Your database structure will be:

```
student_db
└── students
    ├── id
    ├── name
    ├── email
    ├── course
    └── created_at
```

The `id` column automatically generates a unique ID for each student.

## 6. Create the database connection — `db.php`

This file connects your PHP application to MySQL. We will reuse it in the other PHP files.

```

<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = "localhost";
$username = "root";
$password = "";
$database = "student_db";

try {
    $conn = new mysqli(
        $host,
        $username,
        $password,
        $database
    );

    $conn->set_charset("utf8mb4");

} catch (mysqli_sql_exception $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit("Database connection failed. Check your database settings.");
}
?>

```

Explanation:

- `localhost` means MySQL is running on the same computer.
- `root` is the default XAMPP MySQL username in many local installations.
- An empty password is a common default for local XAMPP installations; change it if your installation uses a password.
- `student_db` is the database we created.
- `utf8mb4` supports a wide range of characters and symbols.

## 7. Design the website — `style.css`

This file gives all the pages a consistent, mobile-friendly design.

```

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 20px;
    font-family: Arial, sans-serif;
    background: #f4f6f9;
    color: #222;
}

.container {
    max-width: 1000px;
    margin: 25px auto;
    padding: 25px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
}

h1, h2 {
    margin-top: 0;
}

.form-group {
    margin-bottom: 16px;
}

label {
    display: block;
    margin-bottom: 7px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.btn {
    display: inline-block;
    padding: 10px 15px;
    margin: 4px 2px;
    border: 0;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    font-size: 14px;
}

.btn-primary {
    background: #1769e0;
    color: white;
}

.btn-edit {
    background: #fff0c2;
    color: #664d03;
}

.btn-delete {
    background: #dc3545;
    color: white;
}

.btn-secondary {
    background: #e5e7eb;
    color: #222;
}

.message {
    padding: 12px;
    margin: 15px 0;
    background: #e8f7ed;
    border-radius: 5px;
}

.error {
    background: #ffe7e7;
    color: #a00000;
}

.table-container {
    width: 100%;
    overflow-x: auto;
    margin-top: 20px;
}

table {
    width: 100%;
    min-width: 650px;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background: #edf1f7;
}

.actions {
    white-space: nowrap;
}

@media (max-width: 600px) {
    body {
        padding: 8px;
    }

    .container {
        margin: 10px auto;
        padding: 16px;
    }
}

```

The table will scroll horizontally on smaller phone screens rather than forcing every column to fit.

## 8. Create the registration form — `index.php`

This is the first page the user sees. It collects the student's name, email, and course.

```

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Student Registration</h1>
    <p>Enter student details below.</p>

    <form action="save.php" method="POST">

        <div class="form-group">
            <label for="name">Student Name</label>
            <input
                type="text"
                id="name"
                name="name"
                maxlength="100"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                maxlength="150"
                required
            >
        </div>

        <div class="form-group">
            <label for="course">Course</label>
            <input
                type="text"
                id="course"
                name="course"
                maxlength="100"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Register Student
        </button>

    </form>

    <p>
        <a class="btn btn-secondary" href="students.php">
            View All Students
        </a>
    </p>
</div>

</body>
</html>

```

Important concepts:

- `method="POST"` sends the form data to the server.
- `action="save.php"` tells the browser which PHP file will receive the data.
- Each input has a `name` attribute so PHP can identify the submitted value.
- `required` prevents submitting an empty field through the normal browser form.

## 9. Save student data — `save.php`

Now we will insert the submitted data into MySQL.

```

<?php

require "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Please submit the registration form.");
}

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$course = trim($_POST["course"] ?? "");

if (
    $name === "" ||
    strlen($name) > 100 ||
    $course === "" ||
    strlen($course) > 100 ||
    strlen($email) > 150 ||
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {
    http_response_code(400);
    exit("Please enter a valid name, email, and course.");
}

$stmt = $conn->prepare(
    "INSERT INTO students (name, email, course)
     VALUES (?, ?, ?)"
);

$stmt->bind_param("sss", $name, $email, $course);
$stmt->execute();
$stmt->close();

header("Location: students.php");
exit;
?>

```

How it works:

1. PHP receives the form values.
2. It checks that the required information is valid.
3. A prepared SQL statement inserts the values into MySQL.
4. The browser is redirected to `students.php`.

The SQL query is:

```
INSERT INTO students (name, email, course)
VALUES (?, ?, ?);
```

The question marks are placeholders. The prepared statement binds the actual values separately, helping prevent SQL injection.

## 10. Display database records — `students.php`

This page reads the student records from MySQL and displays them in a table with Edit and Delete buttons.

```

<?php
require "db.php";

$result = $conn->query(
    "SELECT id, name, email, course, created_at
     FROM students
     ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Student Management</h1>

    <a href="index.php" class="btn btn-primary">
        + Add Student
    </a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <?php if ($result->num_rows > 0): ?>

                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <?= (int) $row["id"] ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row["name"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row["email"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row["course"]) ?>
                        </td>

                        <td class="actions">
                            <a
                                class="btn btn-edit"
                                href="edit.php?id=<?= (int) $row["id"] ?>"
                            >
                                Edit
                            </a>

                            <form
                                action="delete.php"
                                method="POST"
                                style="display:inline"
                                onsubmit="return confirm('Are you sure you want to delete this student?');"
                            >
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= (int) $row["id"] ?>"
                                >

                                <button
                                    type="submit"
                                    class="btn btn-delete"
                                >
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>

            <?php else: ?>

                <tr>
                    <td colspan="5">No students registered yet.</td>
                </tr>

            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>

```

What you learned:

- `SELECT` retrieves database records.
- `fetch_assoc()` reads each record as an associative array.
- `while` loops through all students.
- `htmlspecialchars()` safely displays text in HTML.
- The Edit link passes the student's ID to `edit.php`.
- The Delete form sends the ID to `delete.php` using POST.

## 11. Update a student — `edit.php`

This page loads the selected student's existing information. You can change the details and save them back to the database.

```

<?php
require "db.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    http_response_code(400);
    exit("Invalid student ID.");
}

$stmt = $conn->prepare(
    "SELECT name, email, course FROM students WHERE id = ?"
);
$stmt->bind_param("i", $id);
$stmt->execute();

$student = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$student) {
    http_response_code(404);
    exit("Student not found.");
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $course = trim($_POST["course"] ?? "");

    if (
        $name === "" ||
        strlen($name) > 100 ||
        $course === "" ||
        strlen($course) > 100 ||
        strlen($email) > 150 ||
        !filter_var($email, FILTER_VALIDATE_EMAIL)
    ) {
        $error = "Please enter valid student details.";
    } else {
        $stmt = $conn->prepare(
            "UPDATE students
             SET name = ?, email = ?, course = ?
             WHERE id = ?"
        );

        $stmt->bind_param(
            "sssi",
            $name,
            $email,
            $course,
            $id
        );

        $stmt->execute();
        $stmt->close();

        header("Location: students.php");
        exit;
    }

    // Keep entered values if validation fails.
    $student["name"] = $name;
    $student["email"] = $email;
    $student["course"] = $course;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Update Student</h1>

    <?php if ($error !== ""): ?>
        <p class="message error">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="POST">

        <div class="form-group">
            <label for="name">Student Name</label>
            <input
                type="text"
                id="name"
                name="name"
                maxlength="100"
                required
                value="<?= htmlspecialchars($student["name"]) ?>"
            >
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                maxlength="150"
                required
                value="<?= htmlspecialchars($student["email"]) ?>"
            >
        </div>

        <div class="form-group">
            <label for="course">Course</label>
            <input
                type="text"
                id="course"
                name="course"
                maxlength="100"
                required
                value="<?= htmlspecialchars($student["course"]) ?>"
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Update Student
        </button>

        <a href="students.php" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

</body>
</html>

```

How the Update operation works:

Suppose student ID 3 is enrolled in Python and you change the course to Java.

```
UPDATE students
SET name = ?, email = ?, course = ?
WHERE id = ?;
```

PHP updates only the selected student's record because the query includes `WHERE id = ?`.

The ID is taken from the URL when the edit page loads. The server validates it and uses it in a prepared statement.

## 12. Delete a student — `delete.php`

This file permanently removes the selected record from the database.

```

<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method not allowed.");
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    http_response_code(400);
    exit("Invalid student ID.");
}

$stmt = $conn->prepare(
    "DELETE FROM students WHERE id = ?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();

header("Location: students.php");
exit;
?>

```

How Delete works:

1. Click Delete beside a student.
2. Confirm the browser confirmation dialog.
3. PHP receives the student's ID through POST.
4. MySQL deletes only the matching record.
5. PHP redirects back to the student list.

The SQL operation is:

```
DELETE FROM students WHERE id = ?;
```

This example uses a prepared statement and POST, but a production website should also implement CSRF protection and user authentication before enabling destructive operations.

## 13. Run your complete project

Make sure Apache and MySQL are running in XAMPP.

Open these pages in your browser:

Registration Form

Open the form and add a student.

`localhost/student-management/`

Open

Student List

View, edit, or delete student records.

`localhost/student-management/students.php`

Open

These Open buttons target the local server of the device running the browser. If XAMPP is installed on a different computer, use that computer's IP address instead.

### Test with sample data

Enter these details in your registration form:

| Field         | Value            |
| ------------- | ---------------- |
| Student Name  | Rahul Sharma     |
| Email Address | rahul\@gmail.com |
| Course        | Python           |

Click Register Student.

The browser should redirect to the student list, showing the new record.

Now test each CRUD operation:

- Create: Add another student named Priya.
- Read: Open the student list.
- Update: Change Rahul's course from Python to Java.
- Delete: Remove Priya and confirm the prompt.

## 14. Verify records directly in MySQL

Open phpMyAdmin:

`http://localhost/phpmyadmin/`

Select `student_db` → `students` → Browse.

You can also run this SQL query:

```

USE student_db;

SELECT * FROM students ORDER BY id DESC;

```

To view only students enrolled in Java:

```

SELECT *
FROM students
WHERE course = 'Java';

```

This demonstrates that PHP is reading and writing actual MySQL records, rather than just displaying data in the browser.

## 15. Access the project from your phone

[Jasvee International Preparing your for better Tomorrow](https://images.openai.com/static-rsc-4/FEa_TdTy-oGyIq49wZQLzH9qDDuXG72hrToPumsTHmNNAHM9RL0lkXW22ZI7VgMNlpKDdWfQhJpNIKrcA0Z208rH19E5uTHGhUQny1j_yZvMRgow0Kpz2Q3D_VDNOxrJpDCwNb93MCi3faawfGUn9C35yVT76aWlHtjWPgAsw9I?purpose=inline)

[jasveeinternational.in](https://jasveeinternational.in/student-registration.php)

To access the project from an Android or iPhone browser:

1. Connect your phone and computer to the same Wi-Fi network.
2. Keep Apache and MySQL running on the computer.
3. Find the computer's local IP address.

On Windows, run this command in Command Prompt:

```
ipconfig
```

Look for the IPv4 address of your active Wi-Fi or Ethernet connection, for example `192.168.1.10`.

On macOS, open System Settings → Network and inspect your connected network's IP address.

4\. On your phone, open:

```
http://192.168.1.10/student-management/
```

Replace `192.168.1.10` with your actual computer IP address.

To view student records:

```
http://192.168.1.10/student-management/students.php
```

If the page does not open, check that both devices are on the same network and allow incoming connections to Apache through the computer's firewall. Some guest Wi-Fi networks block communication between devices.

Important: This setup is for local development. It does not make your website publicly accessible over mobile data or from anywhere in the world. For that, you will need web hosting, a domain if desired, and a properly secured deployment.

## 16. Common errors and solutions

| Error                         | What to check                                                                      |
| ----------------------------- | ---------------------------------------------------------------------------------- |
| `404 Not Found`               | Confirm the project folder is inside `htdocs` and the URL matches the folder name. |
| `Database connection failed`  | Check MySQL is running and the credentials in `db.php` are correct.                |
| `Table doesn't exist`         | Confirm the `students` table was created inside `student_db`.                      |
| Blank page                    | Check Apache/PHP error logs and PHP syntax.                                        |
| Phone cannot connect          | Check the IP address, Wi-Fi, firewall, and Apache status.                          |
| Update or delete doesn't work | Check that the student ID exists and PHP can connect to MySQL.                     |




