# PHP Array

An **array** in PHP is used to store **multiple values in a single variable**.

For example, instead of creating:

```php
$name1 = "Pankaj";
$name2 = "Rahul";
$name3 = "Amit";
```

we can store all names inside one array:

```php
$names = ["Pankaj", "Rahul", "Amit"];
```

---

## Step 1: Create Your First Array

```php
<?php

$names = ["Pankaj", "Rahul", "Amit"];

?>
```

Here:

* `$names` → variable name
* `[]` → creates an array
* `"Pankaj"`, `"Rahul"`, `"Amit"` → array elements

---

## Step 2: Print the Complete Array

You cannot normally display an array using `echo`.

Use `print_r()`:

```php
<?php

$names = ["Pankaj", "Rahul", "Amit"];

print_r($names);

?>
```

Output:

```text
Array
(
    [0] => Pankaj
    [1] => Rahul
    [2] => Amit
)
```

Notice that PHP automatically gives each element an **index**.

```text
0 → Pankaj
1 → Rahul
2 → Amit
```

PHP array indexing starts from **0**.

---

# Step 3: Access an Array Element

Suppose we want only `"Rahul"`.

```php
<?php

$names = ["Pankaj", "Rahul", "Amit"];

echo $names[1];

?>
```

Output:

```text
Rahul
```

Because:

```text
Index     Value
  0       Pankaj
  1       Rahul
  2       Amit
```

So:

```php
$names[0]; // Pankaj
$names[1]; // Rahul
$names[2]; // Amit
```

---

# Step 4: Change an Array Value

We can modify an existing element.

```php
<?php

$names = ["Pankaj", "Rahul", "Amit"];

$names[1] = "Vikas";

print_r($names);

?>
```

Output:

```text
Array
(
    [0] => Pankaj
    [1] => Vikas
    [2] => Amit
)
```

`Rahul` has been replaced by `Vikas`.

---

# Step 5: Add a New Element

Use `[]` to add a new value at the end.

```php
<?php

$names = ["Pankaj", "Rahul", "Amit"];

$names[] = "Vikas";

print_r($names);

?>
```

Output:

```text
Array
(
    [0] => Pankaj
    [1] => Rahul
    [2] => Amit
    [3] => Vikas
)
```

---

# Step 6: Count Array Elements

PHP provides the `count()` function.

```php
<?php

$names = ["Pankaj", "Rahul", "Amit", "Vikas"];

echo count($names);

?>
```

Output:

```text
4
```

So:

```php
count($names)
```

means:

> How many elements are inside `$names`?

---

# Step 7: Loop Through an Array

This is one of the most important things you'll use with arrays.

Use `foreach`.

```php
<?php

$names = ["Pankaj", "Rahul", "Amit"];

foreach ($names as $name) {
    echo $name . "<br>";
}

?>
```

Output:

```text
Pankaj
Rahul
Amit
```

### How does it work?

```php
foreach ($names as $name)
```

means:

> Take each value from `$names` one by one and store it temporarily in `$name`.

---

# Step 8: Array With Numbers

Arrays can also store numbers.

```php
<?php

$marks = [80, 75, 90, 85];

echo $marks[0];

?>
```

Output:

```text
80
```

We can loop through them:

```php
<?php

$marks = [80, 75, 90, 85];

foreach ($marks as $mark) {
    echo $mark . "<br>";
}

?>
```

Output:

```text
80
75
90
85
```

---

# Step 9: Associative Array

So far, PHP automatically created numeric indexes.

But we can create our **own keys**.

```php
<?php

$student = [
    "name" => "Pankaj",
    "age" => 25,
    "course" => "PHP"
];

?>
```

Now the structure is:

```text
name   → Pankaj
age    → 25
course → PHP
```

Access values using their keys:

```php
echo $student["name"];
```

Output:

```text
Pankaj
```

Another example:

```php
echo $student["course"];
```

Output:

```text
PHP
```

---

# Step 10: Loop Through an Associative Array

```php
<?php

$student = [
    "name" => "Pankaj",
    "age" => 25,
    "course" => "PHP"
];

foreach ($student as $key => $value) {
    echo $key . " : " . $value . "<br>";
}

?>
```

Output:

```text
name : Pankaj
age : 25
course : PHP
```

Here:

```php
$key
```

contains:

```text
name
age
course
```

And:

```php
$value
```

contains:

```text
Pankaj
25
PHP
```

---

# Step 11: Real-Life Example — Student Data

Let's create a simple student array.

```php
<?php

$student = [
    "name" => "Pankaj",
    "age" => 25,
    "city" => "Mumbai",
    "course" => "Data Science"
];

echo "Name: " . $student["name"] . "<br>";
echo "Age: " . $student["age"] . "<br>";
echo "City: " . $student["city"] . "<br>";
echo "Course: " . $student["course"];

?>
```

Output:

```text
Name: Pankaj
Age: 25
City: Mumbai
Course: Data Science
```

---

# Step 12: Multidimensional Array

An array can contain other arrays.

For example, multiple students:

```php
<?php

$students = [
    [
        "name" => "Pankaj",
        "age" => 25
    ],
    [
        "name" => "Rahul",
        "age" => 22
    ],
    [
        "name" => "Amit",
        "age" => 24
    ]
];

?>
```

Access the first student's name:

```php
echo $students[0]["name"];
```

Output:

```text
Pankaj
```

Access Rahul:

```php
echo $students[1]["name"];
```

Output:

```text
Rahul
```

---

# Step 13: Loop Through Multidimensional Array

```php
<?php

$students = [
    [
        "name" => "Pankaj",
        "age" => 25
    ],
    [
        "name" => "Rahul",
        "age" => 22
    ],
    [
        "name" => "Amit",
        "age" => 24
    ]
];

foreach ($students as $student) {
    echo "Name: " . $student["name"] . "<br>";
    echo "Age: " . $student["age"] . "<br>";
    echo "<hr>";
}

?>
```

Output:

```text
Name: Pankaj
Age: 25

----------------

Name: Rahul
Age: 22

----------------

Name: Amit
Age: 24
```

---

## Step 14: Useful PHP Array Functions

Once you understand the basics, learn these functions:

| Function          | Purpose                    |
| ----------------- | -------------------------- |
| `count()`         | Count elements             |
| `print_r()`       | Display array              |
| `sort()`          | Sort ascending             |
| `rsort()`         | Sort descending            |
| `array_push()`    | Add elements               |
| `array_pop()`     | Remove last element        |
| `array_shift()`   | Remove first element       |
| `array_unshift()` | Add element at beginning   |
| `in_array()`      | Check whether value exists |
| `array_merge()`   | Combine arrays             |

### Example: `sort()`

```php
<?php

$numbers = [50, 20, 40, 10, 30];

sort($numbers);

print_r($numbers);

?>
```

Output:

```text
Array
(
    [0] => 10
    [1] => 20
    [2] => 30
    [3] => 40
    [4] => 50
)
```

---

## Beginner Practice Example

Try creating this yourself:

```php
<?php

$students = ["Pankaj", "Rahul", "Amit", "Vikas"];

echo "Total Students: " . count($students) . "<br>";

foreach ($students as $student) {
    echo $student . "<br>";
}

?>
```

The expected output is:

```text
Total Students: 4
Pankaj
Rahul
Amit
Vikas
```


