<?php
// Generate a random unique identifier
$uniqueId = bin2hex(random_bytes(16)); // Generates a 32-character hexadecimal string

// Set the cookie with the unique identifier
setcookie('user_id', $uniqueId, time() + (86400 * 30), '/'); // Cookie expires in 30 days

// Display a message or redirect the user
echo "Cookie 'user_id' is set with value: $uniqueId";
?>