# Error and Exception Handling in PHP

PHP provides mechanisms to handle both errors and exceptions to ensure that your application runs smoothly and gracefully handles unexpected issues. Below is a guide on how to set up error and exception handling in PHP.

1. Setting Up Error Reporting

First, configure PHP’s error reporting to control what types of errors are displayed. This helps in debugging during development.
```php
<?php
// Show all errors during development
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
```
In this Example
- error_reporting(E_ALL): Sets PHP to report all types of errors.
- ini_set('display_errors', 1): Displays errors on the screen. It is recommended to turn this off in a production environment.

2. Basic Error Handling Using die()

PHP’s die() function can be used for basic error handling. This function stops code execution and displays a message.
```php
<?php
$file = fopen("example.txt", "r") or die("Unable to open file!");
fclose($file);
?>
```
In this example:
- If the file example.txt does not exist, die() will stop the code and print “Unable to open file!”.

3. Custom Error Handling with set_error_handler()

To create custom error handling, PHP provides set_error_handler() to define your own function to handle errors.
```php
<?php
// Custom error handler function
function customError($errno, $errstr) {
    echo "Error [$errno]: $errstr";
}

// Set custom error handler
set_error_handler("customError");

// Trigger an error
echo($undefinedVariable);
?>
```
Explanation:
- set_error_handler("customError") registers customError as the custom handler.
- When $undefinedVariable is used, PHP triggers a notice, which is handled by customError.

4. Exception Handling with try-catch

Exceptions in PHP can be handled using try-catch blocks. This structure lets you handle exceptions and keep your code running.
```php
<?php
try {
    // Code that may throw an exception
    $number = 5;
    if ($number < 10) {
        throw new Exception("Number is too low.");
    }
} catch (Exception $e) {
    // Handle exception
    echo "Caught exception: " . $e->getMessage();
}
?>
```
Explanation:
- throw new Exception("Number is too low."); raises an exception if $number is less than 10.
- catch (Exception $e) catches the exception and displays an error message.

5. Creating a Custom Exception Class

You can create custom exceptions by extending the Exception class. This can be useful for more complex applications.
```php
<?php
class CustomException extends Exception {
    public function errorMessage() {
        // Custom error message
        return "Custom Error: " . $this->getMessage();
    }
}

try {
    throw new CustomException("This is a custom exception.");
} catch (CustomException $e) {
    echo $e->errorMessage();
}
?>
```
Explanation:
- CustomException extends PHP’s Exception class.
- The errorMessage() function provides a custom error format.
- throw new CustomException(...) throws a CustomException, which is caught and handled.

6. Handling Multiple Exceptions

PHP allows multiple catch blocks to handle different types of exceptions.
```php
<?php
try {
    // Trigger different exceptions
    throw new Exception("A general exception.");
} catch (CustomException $e) {
    echo $e->errorMessage();
} catch (Exception $e) {
    echo "Caught generic exception: " . $e->getMessage();
}
?>
```
7. Using finally for Cleanup

The finally block can be used for cleanup tasks, such as closing database connections.
```php
<?php
try {
    // Code that may throw an exception
    throw new Exception("Something went wrong.");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    echo "Cleanup code runs here.";
}
?>
```
- The finally block always executes, regardless of whether an exception occurred.

8. Using error_log() to Log Errors

Instead of displaying errors, you can log them to a file using error_log().
```php
<?php
function customError($errno, $errstr) {
    error_log("Error [$errno]: $errstr", 3, "error_log.log");
    echo "An error occurred. Please check the logs.";
}

set_error_handler("customError");

// Trigger an error
echo($undefinedVariable);
?>
```
Explanation:
- error_log("Error...", 3, "error_log.log") writes the error to a log file (error_log.log).
- Only the message “An error occurred. Please check the logs.” is displayed to the user.

