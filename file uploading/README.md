# simple file upload feature using PHP:

Step 1: Create an HTML Form for File Upload

	1.	First, create a basic HTML form that allows users to select a file to upload.
	2.	Set the enctype attribute to multipart/form-data to allow file uploads.
	3.	Set the form method to POST since files cannot be sent with GET.

File: upload_form.html

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Example</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileUpload">Choose file:</label>
        <input type="file" name="fileUpload" id="fileUpload">
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>

Step 2: Handle File Upload in PHP

	1.	Create a PHP script that handles the uploaded file from the HTML form.
	2.	Check if the form is submitted and if a file is uploaded.
	3.	Define a target directory to save the uploaded files.
	4.	Validate the file (optional), such as checking file size or type.
	5.	Use PHP’s move_uploaded_file() function to move the uploaded file to the target directory.

File: upload.php

<?php
if (isset($_POST['submit'])) {
    // Check if the file was uploaded without errors
    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
        $file = $_FILES['fileUpload'];
        $filename = basename($file['name']); // Get the original file name
        $targetDir = "uploads/"; // Define the target directory

        // Ensure the upload directory exists
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFilePath = $targetDir . $filename;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file " . htmlspecialchars($filename) . " has been uploaded successfully.";
        } else {
            echo "Error: Unable to move the uploaded file.";
        }
    } else {
        echo "Error: File upload failed. Error code: " . $_FILES['fileUpload']['error'];
    }
} else {
    echo "No file uploaded.";
}
?>

Step 3: Create an uploads Directory

	•	Ensure that the uploads directory exists in the same directory as upload.php.
	•	Set permissions to allow PHP to save files in it. For most systems, permissions should be 0777.

Step 4: Test the File Upload

	1.	Open the upload_form.html in a browser.
	2.	Select a file to upload and submit the form.
	3.	If successful, the file should appear in the uploads directory, and you should see a success message on the page.

Explanation of Key Parts:

	•	$_FILES Array: Stores file data. $_FILES['fileUpload']['name'] gives the file name, $_FILES['fileUpload']['tmp_name'] gives the temporary path, and $_FILES['fileUpload']['error'] shows any error.
	•	move_uploaded_file(): Moves the file from the temporary directory to the uploads folder.
	•	Error Handling: The script checks if there are any errors in the file upload and displays an appropriate message.