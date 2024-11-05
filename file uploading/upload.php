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