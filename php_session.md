# PHP Sessions

## What is a Session?

A **Session** is used to store user information on the **server** so it can be accessed across multiple pages.

**Example:**

* User logs in.
* Store username in a session.
* Access username on any page without asking the user to log in again.

---

# Step 1: Create a Project

```
session_demo/
│
├── index.php
├── home.php
└── logout.php
```

---

# Step 2: Create `index.php`

Start the session and store data.

```php
<?php
session_start();

// Store data in session
$_SESSION["username"] = "Pankaj";
$_SESSION["email"] = "pankaj@gmail.com";

echo "Session Created Successfully.<br>";
echo "<a href='home.php'>Go to Home</a>";
?>
```

### Output

```
Session Created Successfully.

Go to Home
```

---

# Step 3: Create `home.php`

Retrieve session values.

```php
<?php
session_start();

echo "Welcome " . $_SESSION["username"] . "<br>";
echo "Email : " . $_SESSION["email"] . "<br>";
?>

<a href="logout.php">Logout</a>
```

### Output

```
Welcome Pankaj
Email : pankaj@gmail.com

Logout
```

---

# Step 4: Create `logout.php`

Destroy the session.

```php
<?php
session_start();

session_destroy();

echo "Session Destroyed Successfully.";
?>
```

### Output

```
Session Destroyed Successfully.
```

---

# Complete Flow

```
User Opens index.php
          │
          ▼
session_start()
          │
          ▼
Store Data in Session
          │
          ▼
Open home.php
          │
          ▼
Read Session Data
          │
          ▼
Click Logout
          │
          ▼
session_destroy()
          │
          ▼
Session Deleted
```

---

# Example 2: Login System Using Session

## login.php

```php
<?php
session_start();

$username = "admin";
$password = "12345";

if($username == "admin" && $password == "12345")
{
    $_SESSION["user"] = $username;
    header("Location: dashboard.php");
}
?>
```

---

## dashboard.php

```php
<?php
session_start();

if(!isset($_SESSION["user"]))
{
    header("Location: login.php");
    exit();
}

echo "Welcome " . $_SESSION["user"];
?>

<br><br>

<a href="logout.php">Logout</a>
```

---

## logout.php

```php
<?php
session_start();

session_destroy();

header("Location: login.php");
?>
```

---

# Common Session Functions

| Function                   | Description                                 |
| -------------------------- | ------------------------------------------- |
| `session_start()`          | Starts a new or resumes an existing session |
| `$_SESSION[]`              | Stores or retrieves session variables       |
| `isset($_SESSION["name"])` | Checks whether a session variable exists    |
| `unset($_SESSION["name"])` | Removes a specific session variable         |
| `session_destroy()`        | Deletes the entire session                  |

---

# Real-Life Uses of Sessions

* User Login Authentication
* Shopping Cart
* Online Banking
* Student Portal
* Admin Panel
* E-commerce Websites
* Online Exams
* User Preferences

---

# Interview Questions

### Q1. What is a Session in PHP?

**Answer:** A session stores user data on the server and allows that data to be shared across multiple pages.

### Q2. Why do we use `session_start()`?

**Answer:** It starts a new session or resumes an existing one so session variables can be used.

### Q3. Where are session variables stored?

**Answer:** On the server.

### Q4. Which superglobal is used for sessions?

**Answer:**

```php
$_SESSION
```

### Q5. How do you destroy a session?

**Answer:**

```php
session_destroy();
```

---

# Practice Exercise

Create a simple login system where:

1. User enters a username.
2. Save the username in a session.
3. Redirect to a dashboard page.
4. Display **"Welcome, username"**.
5. Add a **Logout** button that destroys the session and redirects to the login page.

