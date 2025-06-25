<?php
include 'forum.php';
include 'response_helper.php';

$user_id = 1; // Replace with session or authentication token
$contact_id = $_POST['contact_id'] ?? null;
$message = $_POST['message'] ?? null;

if (!$contact_id || !$message) {
    respondError("Contact ID and message are required");
}

$type = 'sent';
$sql = "INSERT INTO messages (user_id, contact_id, message, type) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiss", $user_id, $contact_id, $message, $type);

if ($stmt->execute()) {
    // Update last_message in contacts table
    $update_sql = "UPDATE contacts SET last_message = ?, last_message_date = NOW() WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("si", $message, $contact_id);
    $update_stmt->execute();

    respond(['status' => 'success', 'message_id' => $stmt->insert_id]);
} else {
    respondError("Failed to send message");
}
?>
