<?php
// Set the file path
$file = 'user_data.csv';

// Check if the file exists, and create it if not
if (!file_exists($file)) {
    $headers = ['Full Name', 'Email Address', 'Message', 'Number'];
    $fileHandle = fopen($file, 'w');
    fputcsv($fileHandle, $headers);
    fclose($fileHandle);
}

// Collect form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    $number = $_POST['number'] ?? '';

    // Append data to the CSV file
    $fileHandle = fopen($file, 'a');
    fputcsv($fileHandle, [$fullname, $email, $message, $number]);
    fclose($fileHandle);

    // Respond back to the client
    echo 'Thank You For Your Response!';
} else {
    echo 'Invalid request!';
}
?>