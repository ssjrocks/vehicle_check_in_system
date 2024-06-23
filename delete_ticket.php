<?php
require_once 'db_connect.php';

function deleteTicket($id) {
    global $pdo;

    $sql = "DELETE FROM Tickets WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    return $stmt->rowCount();
}

// Example usage:
// $deletedRows = deleteTicket(1);
// echo "Deleted $deletedRows ticket^(s^)";
