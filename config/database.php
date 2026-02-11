<?php
/**
 * Database Configuration
 * WebKomersial - Gedung Serbaguna Booking System
 */

// Database credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_sewagedung');

// Create connection
function getDBConnection()
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Set charset to UTF-8
    $conn->set_charset("utf8mb4");

    return $conn;
}

// Test connection (optional, can be removed in production)
function testConnection()
{
    try {
        $conn = getDBConnection();
        $conn->close();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

?>