# Login and Logout

----

This example uses:

* PHP Sessions
* No Database
* Hardcoded Username & Password
* Beginner Friendly

## Project Structure

```text
login-system/
│
├── index.php        (Login Page)
├── dashboard.php    (Protected Page)
├── logout.php       (Logout)
└── style.css        (Optional CSS)
```

---

# Step 1: Create `index.php`

```php
<?php
session_start();

// Hardcoded Username & Password
$correct_username = "admin";
$correct_password = "12345";

$error = "";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == $correct_username && $password == $correct_password)
    {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Form</h2>

<form method="POST">

Username:
<br>
<input type="text" name="username" required>

<br><br>

Password:
<br>
<input type="password" name="password" required>

<br><br>

<input type="submit" name="login" value="Login">

</form>

<p style="color:red;">
<?php echo $error; ?>
</p>

</body>
</html>
```

---

# Step 2: Create `dashboard.php`

```php
<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome</h1>

<h2>Hello, <?php echo $_SESSION['username']; ?></h2>

<p>You have successfully logged in.</p>

<a href="logout.php">Logout</a>

</body>
</html>
```

---

# Step 3: Create `logout.php`

```php
<?php
session_start();

session_destroy();

header("Location: index.php");
exit();
?>
```

---

# Step 4: Run the Project

Move the folder into:

```text
htdocs/login-system
```

Start:

* Apache (XAMPP)

Open browser:

```text
http://localhost/login-system/
```

---

# Login Credentials

```
Username : admin

Password : 12345
```

---

# How It Works

## Step 1

User opens:

```
index.php
```

Login form appears.

↓

## Step 2

User enters:

```
Username
Password
```

↓

## Step 3

PHP checks:

```php
if($username == "admin" && $password == "12345")
```

↓

If Correct

```php
$_SESSION['username'] = $username;
```

Session is created.

↓

Redirect to

```
dashboard.php
```

↓

Dashboard displays:

```
Welcome Admin
```

↓

When user clicks **Logout**

```
logout.php
```

↓

```php
session_destroy();
```

Session is removed.

↓

Redirect back to

```
index.php
```

---

# Session Flow Diagram

```text
             User

               │
               ▼

         Open index.php

               │
               ▼

         Login Form

               │
        Username & Password
               │
               ▼

      Credentials Correct?

        Yes              No
         │                │
         ▼                ▼

 Create Session      Show Error
         │
         ▼

 dashboard.php

         │
         ▼

   Welcome Admin

         │
         ▼

   Click Logout

         │
         ▼

 session_destroy()

         │
         ▼

 Back to Login Page
```

---

# Understanding the Session

Creating a session:

```php
$_SESSION['username'] = $username;
```

Checking if the user is logged in:

```php
if(!isset($_SESSION['username']))
{
    header("Location: index.php");
}
```

Destroying the session:

```php
session_destroy();
```

---

# Output

### Login Page

```text
-----------------------------
        Login Form

Username: ___________

Password: ___________

[ Login ]

-----------------------------
```

### Dashboard

```text
-----------------------------
Welcome

Hello, admin

You have successfully logged in.

Logout

-----------------------------
```

