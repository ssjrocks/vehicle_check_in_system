<?php
require_once 'db_connect.php';

function addTicket($type, $description, $priority, $priorityDetails, $createdByManagerId) {
    global $pdo;

    $sql = "INSERT INTO Tickets ^(type, status, description, priority, priority_details, created_by_manager_id^) 
            VALUES (:type, 'open', :description, :priority, :priority_details, :created_by_manager_id)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':type' => $type,
        ':description' => $description,
        ':priority' => $priority,
        ':priority_details' => $priorityDetails,
        ':created_by_manager_id' => $createdByManagerId
    ]);

    return $pdo->lastInsertId();
}

// Example usage:
// $newTicketId = addTicket('load', 'Load cargo from truck ABC123', true, 'Urgent delivery', 1);
// echo "New ticket added with ID: " . $newTicketId;
