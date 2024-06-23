<?php
require_once 'db_connect.php';

if ($pdo) {
    echo "Connected successfully to the database.";
} else {
    echo "Connection failed.";
}