<?php
require_once 'db_connect.php';

function getTickets($status = null) {
    global $pdo;

    $sql = "SELECT * FROM Tickets";
    if ($status) {
        $sql .= " WHERE status = :status";
    }

    $stmt = $pdo->prepare($sql);

    if ($status) {
        $stmt->execute([':status' => $status]);
    } else {
        $stmt->execute();
    }

    return $stmt->fetchAll();
}

// Example usage:
// $openTickets = getTickets('open');
// print_r($openTickets);
