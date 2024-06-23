<?php
require_once 'db_connect.php';

function updateTicket($id, $status, $description = null, $priority = null, $priorityDetails = null, $assignedOperatorId = null) {
    global $pdo;

    $sql = "UPDATE Tickets SET status = :status";
    $params = [':id' => $id, ':status' => $status];

    if ($description !== null) {
        $sql .= ", description = :description";
        $params[':description'] = $description;
    }
    if ($priority !== null) {
        $sql .= ", priority = :priority";
        $params[':priority'] = $priority;
    }
    if ($priorityDetails !== null) {
        $sql .= ", priority_details = :priority_details";
        $params[':priority_details'] = $priorityDetails;
    }
    if ($assignedOperatorId !== null) {
        $sql .= ", assigned_operator_id = :assigned_operator_id";
        $params[':assigned_operator_id'] = $assignedOperatorId;
    }

    $sql .= " WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->rowCount();
}

// Example usage:
// $updatedRows = updateTicket(1, 'in_progress', null, null, null, 2);
// echo "Updated $updatedRows ticket^(s^)";
