# PHP Functions

A **function** in PHP is a reusable block of code that performs a specific task.

Instead of writing the same code again and again, we can write it **once inside a function** and call it whenever we need it.

### Simple example

```php
function sayHello() {
    echo "Hello, Welcome to PHP!";
}
```

Then call it:

```php
sayHello();
```

Output:

```text
Hello, Welcome to PHP!
```

Think of a function like a **machine**:

```text
Input
  ↓
Function
  ↓
Output
```

---

# Step 1: Create Your First Function

The basic syntax is:

```php
function functionName() {
    // code
}
```

Example:

```php
<?php

function sayHello() {
    echo "Hello World!";
}

?>
```

At this point, the function has been **created**, but it hasn't executed yet.

---

# Step 2: Call the Function

To execute a function, write its name followed by `()`.

```php
<?php

function sayHello() {
    echo "Hello World!";
}

sayHello();

?>
```

Output:

```text
Hello World!
```

So remember:

```text
Create function
       ↓
Call function
       ↓
Function executes
```

---

# Step 3: Why Do We Need Functions?

Suppose you want to print:

```text
Welcome to PHP
```

three times.

Without a function:

```php
echo "Welcome to PHP";
echo "Welcome to PHP";
echo "Welcome to PHP";
```

With a function:

```php
function welcome() {
    echo "Welcome to PHP<br>";
}

welcome();
welcome();
welcome();
```

Much easier to reuse.

---

# Step 4: Function With a Parameter

A **parameter** allows us to send data into a function.

```php
<?php

function greet($name) {
    echo "Hello " . $name;
}

greet("Pankaj");

?>
```

Output:

```text
Hello Pankaj
```

Call it again:

```php
greet("Rahul");
```

Output:

```text
Hello Rahul
```

The same function can work with different values.

---

# Step 5: Multiple Parameters

A function can accept multiple parameters.

```php
<?php

function studentInfo($name, $age) {
    echo "Name: " . $name . "<br>";
    echo "Age: " . $age;
}

studentInfo("Pankaj", 25);

?>
```

Output:

```text
Name: Pankaj
Age: 25
```

Another call:

```php
studentInfo("Rahul", 22);
```

Output:

```text
Name: Rahul
Age: 22
```

---

# Step 6: Function With a Return Value

Sometimes we don't want the function to directly print something.

Instead, we want the function to **calculate something and return the result**.

Use `return`.

```php
<?php

function add($a, $b) {
    return $a + $b;
}

$result = add(10, 20);

echo $result;

?>
```

Output:

```text
30
```

The process is:

```text
10 + 20
   ↓
 add()
   ↓
  30
```

---

# Step 7: Why Use `return`?

Consider:

```php
function add($a, $b) {
    return $a + $b;
}
```

Now we can store the result:

```php
$result = add(10, 20);
```

And use it later:

```php
echo $result;
```

We can also do:

```php
$total = add(10, 20) + 50;

echo $total;
```

Output:

```text
80
```

This is one of the most important concepts when learning functions.

---

# Step 8: Function for Multiplication

```php
<?php

function multiply($a, $b) {
    return $a * $b;
}

$result = multiply(5, 4);

echo $result;

?>
```

Output:

```text
20
```

---

# Step 9: Function for Checking Even or Odd

```php
<?php

function checkEvenOdd($number) {

    if ($number % 2 == 0) {
        return "Even";
    } else {
        return "Odd";
    }

}

echo checkEvenOdd(10);

?>
```

Output:

```text
Even
```

Try:

```php
echo checkEvenOdd(7);
```

Output:

```text
Odd
```

---

# Step 10: Default Parameter

Sometimes you want to provide a default value.

```php
<?php

function greet($name = "Student") {
    echo "Hello " . $name;
}

greet();

?>
```

Output:

```text
Hello Student
```

But if you provide a value:

```php
greet("Pankaj");
```

Output:

```text
Hello Pankaj
```

So:

```text
No value provided
       ↓
"Student" is used

Value provided
       ↓
Provided value is used
```

---

# Step 11: Type Declarations

PHP allows us to specify what type of data a function expects.

For example:

```php
<?php

function add(int $a, int $b) {
    return $a + $b;
}

echo add(10, 20);

?>
```

Here:

```php
int $a
int $b
```

means `$a` and `$b` should be integers.

We can also specify the return type:

```php
<?php

function add(int $a, int $b): int {
    return $a + $b;
}

echo add(10, 20);

?>
```

Here:

```php
: int
```

means the function should return an integer.

---

# Step 12: String Function Example

Let's create our own function to welcome a student.

```php
<?php

function welcomeStudent($name) {

    return "Welcome " . $name . "!";

}

$message = welcomeStudent("Pankaj");

echo $message;

?>
```

Output:

```text
Welcome Pankaj!
```

---

# Step 13: Function With Calculation

Suppose we want to calculate the total price.

```php
<?php

function calculateTotal($price, $quantity) {

    return $price * $quantity;

}

$total = calculateTotal(500, 3);

echo "Total: ₹" . $total;

?>
```

Output:

```text
Total: ₹1500
```

This is a real-world use of functions.

---

# Step 14: Function for Student Marks

```php
<?php

function calculatePercentage($math, $science, $english) {

    $total = $math + $science + $english;

    $percentage = ($total / 300) * 100;

    return $percentage;
}

$result = calculatePercentage(80, 75, 90);

echo "Percentage: " . $result . "%";

?>
```

Output:

```text
Percentage: 81.666666666667%
```

You could format it:

```php
echo "Percentage: " . round($result, 2) . "%";
```

Output:

```text
Percentage: 81.67%
```

---

# Step 15: Built-in PHP Functions

PHP already provides hundreds of functions.

For example:

### String length

```php
$name = "Pankaj";

echo strlen($name);
```

### Convert to uppercase

```php
echo strtoupper("hello");
```

### Count array elements

```php
$numbers = [10, 20, 30];

echo count($numbers);
```

### Check data type

```php
$value = 100;

var_dump($value);
```

These are called **built-in functions** because PHP provides them for us.

---

# Step 16: User-Defined Functions

When **we create our own function**, it is called a user-defined function.

Example:

```php
function calculateSquare($number) {
    return $number * $number;
}

echo calculateSquare(5);
```

Output:

```text
25
```

So there are two important categories:

```text
PHP Functions
│
├── Built-in Functions
│   ├── strlen()
│   ├── count()
│   ├── strtoupper()
│   └── round()
│
└── User-Defined Functions
    ├── calculateSquare()
    ├── greet()
    └── calculateTotal()
```

---

# Step 17: Complete Beginner Example

Let's combine everything.

```php
<?php

function calculateTotal($price, $quantity) {

    return $price * $quantity;

}

function calculateDiscount($total, $discount) {

    return ($total * $discount) / 100;

}

$price = 1000;
$quantity = 3;
$discount = 10;

$total = calculateTotal($price, $quantity);

$discountAmount = calculateDiscount($total, $discount);

$finalPrice = $total - $discountAmount;

echo "Price: ₹" . $price . "<br>";
echo "Quantity: " . $quantity . "<br>";
echo "Total: ₹" . $total . "<br>";
echo "Discount: ₹" . $discountAmount . "<br>";
echo "Final Price: ₹" . $finalPrice;

?>
```

Output:

```text
Price: ₹1000
Quantity: 3
Total: ₹3000
Discount: ₹300
Final Price: ₹2700
```

This example demonstrates the real power of functions: **break a large problem into small, reusable pieces of code.**

---

## Important Concepts to Remember

| Concept               | Meaning                                 |
| --------------------- | --------------------------------------- |
| `function`            | Creates a function                      |
| `functionName()`      | Calls a function                        |
| Parameter             | Input received by a function            |
| Argument              | Actual value passed to a function       |
| `return`              | Sends a result back                     |
| Default parameter     | Value used when no argument is provided |
| Type declaration      | Specifies expected data type            |
| Built-in function     | Function provided by PHP                |
| User-defined function | Function created by the programmer      |

### The basic pattern to remember

```php
function functionName($parameter) {

    // code

    return $result;
}

$output = functionName($value);

echo $output;
```

Once you understand **parameters + arguments + return**, PHP functions become much easier to work with.
