# PHP String

In PHP, a **string** is a sequence of characters used to store text.

Examples:

```php
$name = "Pankaj";
$city = "Mumbai";
$message = "Welcome to PHP";
```

Strings are usually written inside **single quotes `' '`** or **double quotes `" "`**.

---

## Step 1: Create a String

```php
<?php

$name = "Pankaj";

echo $name;

?>
```

Output:

```text
Pankaj
```

Here:

```php
$name = "Pankaj";
```

means we are storing the text `"Pankaj"` inside the variable `$name`.

---

## Step 2: Single Quotes vs Double Quotes

### Single quotes

```php
$name = 'Pankaj';

echo $name;
```

### Double quotes

```php
$name = "Pankaj";

echo $name;
```

Both work.

But there is an important difference when using variables.

---

## Step 3: Variable Inside a String

With **double quotes**, PHP can directly replace a variable with its value.

```php
<?php

$name = "Pankaj";

echo "My name is $name";

?>
```

Output:

```text
My name is Pankaj
```

With single quotes:

```php
<?php

$name = "Pankaj";

echo 'My name is $name';

?>
```

Output:

```text
My name is $name
```

So, for beginners:

```text
" " → variables are interpreted
' ' → variables are treated as normal text
```

---

# Step 4: Concatenation

**Concatenation** means joining strings together.

PHP uses the `.` operator.

```php
<?php

$firstName = "Pankaj";
$lastName = "Chouhan";

echo $firstName . " " . $lastName;

?>
```

Output:

```text
Pankaj Chouhan
```

You can also create a complete sentence:

```php
<?php

$name = "Pankaj";
$course = "PHP";

echo "My name is " . $name . " and I am learning " . $course;

?>
```

Output:

```text
My name is Pankaj and I am learning PHP
```

---

# Step 5: String Length

Use `strlen()` to find the number of characters.

```php
<?php

$name = "Pankaj";

echo strlen($name);

?>
```

Output:

```text
6
```

Because:

```text
P a n k a j
1 2 3 4 5 6
```

Example:

```php
$text = "Hello World";

echo strlen($text);
```

Output:

```text
11
```

The space is also counted as a character.

---

# Step 6: Convert String to Uppercase

Use `strtoupper()`.

```php
<?php

$name = "pankaj";

echo strtoupper($name);

?>
```

Output:

```text
PANKAJ
```

---

# Step 7: Convert String to Lowercase

Use `strtolower()`.

```php
<?php

$name = "PANKAJ";

echo strtolower($name);

?>
```

Output:

```text
pankaj
```

---

# Step 8: Capitalize the First Letter

Use `ucfirst()`.

```php
<?php

$name = "pankaj";

echo ucfirst($name);

?>
```

Output:

```text
Pankaj
```

---

# Step 9: Remove Extra Spaces

Sometimes user input contains unnecessary spaces.

For example:

```text
"   Pankaj   "
```

Use `trim()`.

```php
<?php

$name = "   Pankaj   ";

echo trim($name);

?>
```

Output:

```text
Pankaj
```

This is especially useful when working with **HTML forms and user input**.

---

# Step 10: Find Text Inside a String

Use `strpos()`.

```php
<?php

$text = "I am learning PHP";

echo strpos($text, "PHP");

?>
```

Output:

```text
14
```

PHP uses **zero-based indexing**, so the first character is position `0`.

```text
I → 0
  → 1
a → 2
m → 3
...
```

If the text isn't found, `strpos()` returns `false`.

---

# Step 11: Replace Text

Use `str_replace()`.

```php
<?php

$text = "I am learning PHP";

$newText = str_replace("PHP", "Python", $text);

echo $newText;

?>
```

Output:

```text
I am learning Python
```

The syntax is:

```php
str_replace(old, new, string);
```

---

# Step 12: Get Part of a String

Use `substr()`.

```php
<?php

$text = "Hello World";

echo substr($text, 0, 5);

?>
```

Output:

```text
Hello
```

Here:

```php
substr($text, 0, 5);
```

means:

* Start from position `0`
* Take `5` characters

Another example:

```php
echo substr("Hello World", 6, 5);
```

Output:

```text
World
```

---

# Step 13: Compare Strings

You can compare strings using `==`.

```php
<?php

$name = "Pankaj";

if ($name == "Pankaj") {
    echo "Name matched";
}

?>
```

Output:

```text
Name matched
```

You can also use strict comparison:

```php
if ($name === "Pankaj") {
    echo "Name matched";
}
```

For beginners:

```text
==  → compares values
=== → compares value and data type
```

---

# Step 14: Check Whether a String Contains Text

In modern PHP, `str_contains()` is very useful.

```php
<?php

$text = "I am learning PHP";

if (str_contains($text, "PHP")) {
    echo "PHP found";
}

?>
```

Output:

```text
PHP found
```

---

# Step 15: Convert String into an Array

Use `explode()`.

Suppose:

```php
$text = "PHP,Python,Java";
```

We can convert it into an array:

```php
<?php

$text = "PHP,Python,Java";

$languages = explode(",", $text);

print_r($languages);

?>
```

Output:

```text
Array
(
    [0] => PHP
    [1] => Python
    [2] => Java
)
```

So:

```text
String
"PHP,Python,Java"

        ↓ explode()

Array
["PHP", "Python", "Java"]
```

---

# Step 16: Convert Array into String

The opposite of `explode()` is `implode()`.

```php
<?php

$languages = ["PHP", "Python", "Java"];

$text = implode(", ", $languages);

echo $text;

?>
```

Output:

```text
PHP, Python, Java
```

Remember:

```text
explode() → String → Array

implode() → Array → String
```

---

# Step 17: Loop Through Characters

You can access individual characters using indexes.

```php
<?php

$name = "Pankaj";

echo $name[0];
echo $name[1];
echo $name[2];

?>
```

Output:

```text
Pan
```

Because:

```text
P → 0
a → 1
n → 2
k → 3
a → 4
j → 5
```

You can also use a loop:

```php
<?php

$name = "Pankaj";

for ($i = 0; $i < strlen($name); $i++) {
    echo $name[$i] . "<br>";
}

?>
```

Output:

```text
P
a
n
k
a
j
```

---

# Step 18: Real-Life Example

Let's create a small student profile.

```php
<?php

$name = "Pankaj";
$course = "PHP";
$city = "Mumbai";

echo "Student Name: " . $name . "<br>";
echo "Course: " . $course . "<br>";
echo "City: " . $city . "<br>";

?>
```

Output:

```text
Student Name: Pankaj
Course: PHP
City: Mumbai
```

---

# Important PHP String Functions

| Function         | Purpose                          |
| ---------------- | -------------------------------- |
| `strlen()`       | Find string length               |
| `strtoupper()`   | Convert to uppercase             |
| `strtolower()`   | Convert to lowercase             |
| `ucfirst()`      | Capitalize first character       |
| `trim()`         | Remove spaces from beginning/end |
| `strpos()`       | Find position of text            |
| `str_replace()`  | Replace text                     |
| `substr()`       | Extract part of string           |
| `str_contains()` | Check whether text exists        |
| `explode()`      | String → Array                   |
| `implode()`      | Array → String                   |

## Beginner Practice

Try this example yourself:

```php
<?php

$name = "  pankaj chouhan  ";

$name = trim($name);
$name = ucwords($name);

echo "Name: " . $name . "<br>";
echo "Length: " . strlen($name) . "<br>";
echo "Uppercase: " . strtoupper($name) . "<br>";
echo "Lowercase: " . strtolower($name);

?>
```

This one small program lets you practice **`trim()` + `ucwords()` + `strlen()` + `strtoupper()` + `strtolower()` + string concatenation** together.
