# Step-by-step example to create a PHP session with an auto time-out feature :

### Step 1: Start the Session
First, we need to start a session that will keep track of the user's activities.

```php
<?php
session_start();
?>
```

### Step 2: Set a Timeout Duration
Define a session timeout duration (in seconds). For this example, let's set the timeout to 10 minutes (600 seconds).

```php
<?php
session_start();

// Define session timeout duration (e.g., 10 minutes)
$timeout_duration = 600;
?>
```

### Step 3: Track Last Activity
To implement auto time-out, track the last activity time in the session.

```php
<?php
session_start();

// Define session timeout duration (e.g., 10 minutes)
$timeout_duration = 600;

// Check if "last_activity" is set in the session
if (isset($_SESSION['last_activity'])) {
    // Calculate the session's lifetime
    $elapsed_time = time() - $_SESSION['last_activity'];

    // If the session has expired, destroy it
    if ($elapsed_time > $timeout_duration) {
        session_unset();     // Unset $_SESSION variable for the run-time
        session_destroy();   // Destroy session data
        header("Location: login.php"); // Redirect to login page or timeout page
        exit();
    }
}

// Update the last activity timestamp
$_SESSION['last_activity'] = time();
?>
```

### Step 4: Example Usage Page
Let's put everything together into an example page (`protected_page.php`). This page should only be accessible while the session is active.

```php
<?php
session_start();

// Define session timeout duration (e.g., 10 minutes)
$timeout_duration = 600;

// Check if "last_activity" is set in the session
if (isset($_SESSION['last_activity'])) {
    // Calculate the session's lifetime
    $elapsed_time = time() - $_SESSION['last_activity'];

    // If the session has expired, destroy it
    if ($elapsed_time > $timeout_duration) {
        session_unset();     // Unset $_SESSION variable for the run-time
        session_destroy();   // Destroy session data
        header("Location: login.php"); // Redirect to login page or timeout page
        exit();
    }
}

// Update the last activity timestamp
$_SESSION['last_activity'] = time();

// Check if the user is logged in (assuming you have a login check)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Protected Page</title>
</head>
<body>
    <h1>Welcome to the Protected Page!</h1>
    <p>You are currently logged in. This page will timeout after 10 minutes of inactivity.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
```

### Step 5: Creating Login and Logout Functionality
For a complete example, let's add a simple `login.php` and `logout.php`:

#### `login.php` (Simplified Example)
```php
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming the login is successful
    $_SESSION['user_id'] = 1; // You can replace with a real user ID from your database
    $_SESSION['last_activity'] = time(); // Set last activity time
    header("Location: protected_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
```

#### `logout.php`
```php
<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>
```

### Summary
1. **Session Start & Timeout Setup**: We start a session and define a timeout period.
2. **Track Last Activity**: Update the `$_SESSION['last_activity']` on each request. If the elapsed time exceeds the defined timeout, destroy the session and redirect to the login page.
3. **Login & Logout Pages**: Implement a simple login and logout mechanism to demonstrate session management.

This approach ensures that the session expires automatically after the set duration of inactivity.
