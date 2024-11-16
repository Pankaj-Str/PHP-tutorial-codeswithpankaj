# PHP Regular Expressions

Regular expressions (regex) are patterns used to match character combinations in strings. PHP provides support for regular expressions using the preg_match(), preg_match_all(), and preg_replace() functions. Here’s a step-by-step guide with examples:

Step 1: Understand the Syntax

- Delimiters: Regular expressions are enclosed within delimiters, often /.

Example: /pattern/
- Modifiers: Placed after the pattern, e.g., i for case-insensitivity.
Example: /pattern/i

Step 2: Basic Pattern Matching

Example: Check if a string contains “hello”
```php
<?php
$pattern = "/hello/"; // Regular expression
$text = "Hello, welcome to PHP!";

if (preg_match($pattern, $text)) {
    echo "Match found!";
} else {
    echo "No match found.";
}
?>
```
Explanation:
- /hello/ matches “hello”.
- preg_match() checks if the pattern exists in the string.

Step 3: Case-Insensitive Match

Example: Match “hello” regardless of case
```php
<?php
$pattern = "/hello/i"; // 'i' modifier for case-insensitivity
$text = "HELLO, world!";

if (preg_match($pattern, $text)) {
    echo "Match found!";
} else {
    echo "No match found.";
}
?>
```
Explanation:
- The i modifier makes the pattern case-insensitive.

Step 4: Validate Email Format

Example: Validate an email address
```php
<?php
$pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$email = "example@domain.com";

if (preg_match($pattern, $email)) {
    echo "Valid email!";
} else {
    echo "Invalid email!";
}
?>
```
Explanation:
- ^[a-zA-Z0-9._%+-]+ matches the local part before @.
- @[a-zA-Z0-9.-]+ matches the domain name.
- \.[a-zA-Z]{2,}$ ensures a valid domain extension.

Step 5: Extract Data Using preg_match

Example: Extract numbers from a string
```php
<?php
$pattern = "/\d+/"; // Matches one or more digits
$text = "The price is 1234 dollars.";

if (preg_match($pattern, $text, $matches)) {
    echo "Found number: " . $matches[0];
} else {
    echo "No number found.";
}
?>
```
Explanation:
- \d+ matches digits.
- The preg_match() function stores matches in the $matches array.

Step 6: Find All Matches Using preg_match_all

Example: Find all words in a string
```php
<?php
$pattern = "/\b\w+\b/"; // Matches whole words
$text = "PHP is amazing!";
preg_match_all($pattern, $text, $matches);

print_r($matches[0]); // Output all words
?>
```
Explanation:
- \b denotes word boundaries.
- \w+ matches word characters.

Step 7: Replace Text Using preg_replace

Example: Replace “PHP” with “Programming”
```php
<?php
$pattern = "/PHP/";
$replacement = "Programming";
$text = "PHP is awesome!";

$result = preg_replace($pattern, $replacement, $text);
echo $result;
?>
```
Explanation:
- preg_replace() replaces all matches of the pattern.

Step 8: Advanced Example: Validate a Phone Number

Example: Validate phone numbers in the format (123) 456-7890
```php
<?php
$pattern = "/^\(\d{3}\) \d{3}-\d{4}$/";
$phone = "(123) 456-7890";

if (preg_match($pattern, $phone)) {
    echo "Valid phone number!";
} else {
    echo "Invalid phone number!";
}
?>
```
Explanation:
- \(\d{3}\) matches a 3-digit area code in parentheses.
- \d{3}-\d{4} matches the rest of the number.

Summary

- Use preg_match() to check for patterns.
- Use preg_match_all() to find all matches.
- Use preg_replace() to replace patterns.
- Always test your regex for correctness.


