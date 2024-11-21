<?php
// Step 1: Define the JSON file or API URL
$apiUrl = 'path/to/your/json/file.json'; // Replace with the actual file path or API endpoint

// Step 2: Fetch the JSON data
$jsonData = file_get_contents($apiUrl);

// Step 3: Decode the JSON data into a PHP array
$data = json_decode($jsonData, true);

// Check if data is valid
if (!isset($data[0]['PostOffice'])) {
    die('Invalid JSON data');
}

// Step 4: Extract the PostOffice array
$postOffices = $data[0]['PostOffice'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Office Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Post Office Data</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Branch Type</th>
                <th>Delivery Status</th>
                <th>Circle</th>
                <th>District</th>
                <th>Division</th>
                <th>Region</th>
                <th>Block</th>
                <th>State</th>
                <th>Country</th>
                <th>Pincode</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postOffices as $postOffice): ?>
                <tr>
                    <td><?= htmlspecialchars($postOffice['Name']) ?></td>
                    <td><?= htmlspecialchars($postOffice['BranchType']) ?></td>
                    <td><?= htmlspecialchars($postOffice['DeliveryStatus']) ?></td>
                    <td><?= htmlspecialchars($postOffice['Circle']) ?></td>
                    <td><?= htmlspecialchars($postOffice['District']) ?></td>
                    <td><?= htmlspecialchars($postOffice['Division']) ?></td>
                    <td><?= htmlspecialchars($postOffice['Region']) ?></td>
                    <td><?= htmlspecialchars($postOffice['Block']) ?></td>
                    <td><?= htmlspecialchars($postOffice['State']) ?></td>
                    <td><?= htmlspecialchars($postOffice['Country']) ?></td>
                    <td><?= htmlspecialchars($postOffice['Pincode']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
