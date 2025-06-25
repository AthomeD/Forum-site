<?php
function respond($data, $status = 200) {
    http_response_code($status);
    echo json_encode($data);
    exit;
}

function respondError($message, $status = 400) {
    respond(['status' => 'error', 'message' => $message], $status);
}
?>
