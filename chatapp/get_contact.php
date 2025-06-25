<?php
include 'forum.php';
include 'response_helper.php';

$user_id = 1; // Replace with session or authentication token
$limit = $_GET['limit'] ?? 10;
$page = $_GET['page'] ?? 1;
$offset = ($page - 1) * $limit;

$sql = "SELECT id, contact_name, last_message, last_message_date 
        FROM contacts WHERE user_id = ? LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $user_id, $limit, $offset);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    $contacts = $result->fetch_all(MYSQLI_ASSOC);
    respond(['status' => 'success', 'contacts' => $contacts]);
} else {
    respondError("Failed to fetch contacts");
}
?>
