<?php
include 'forum.php';
include 'response_helper.php';

$contact_id = $_GET['contact_id'] ?? null;
if (!$contact_id) {
    respondError("Missing contact ID");
}

$limit = $_GET['limit'] ?? 20;
$page = $_GET['page'] ?? 1;
$offset = ($page - 1) * $limit;

$sql = "SELECT message, type, created_at 
        FROM messages WHERE contact_id = ? 
        ORDER BY created_at ASC LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $contact_id, $limit, $offset);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $messages = $result->fetch_all(MYSQLI_ASSOC);

    // Mark messages as seen (if received)
    $update_sql = "UPDATE messages SET type = 'seen' WHERE contact_id = ? AND type = 'received'";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("i", $contact_id);
    $update_stmt->execute();

    respond(['status' => 'success', 'messages' => $messages]);
} else {
    respondError("Failed to fetch messages");
}
?>
