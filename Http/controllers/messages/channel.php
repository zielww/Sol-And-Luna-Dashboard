<?php

use Pusher\Pusher;
use Core\App;
use Core\Database;

$admin = Core\Session::get('admin');
$db = App::resolve(Database::class);

$pusher = new Pusher(
    $_ENV['PUSHER_AUTH_KEY'],
    $_ENV['PUSHER_SECRET'],
    $_ENV['PUSHER_APP'],
    array(
        'cluster' => $_ENV['PUSHER_CLUSTER'],
        'useTLS' => true
    )
);

$data = json_decode(file_get_contents('php://input'), true);

$ids = array(
    intval($admin['user_id']),
    intval($_GET['chat'])
);
sort($ids, SORT_NUMERIC);
$chat_channel = 'chat-channel-' . $ids[0] . '-' . $ids[1];

$messageData = [
    'sender_id' => intval($admin['user_id']),
    'recipient_id' => intval($_GET['chat']),
    'message' => $data['message'] ?? 'Empty',
    'sent_at' => date('Y-m-d H:i:s'),
];

$db->query("INSERT INTO messages (sender_id, recipient_id, message_text, sent_at) VALUES (:sender_id, :recipient_id, :message, :sent_at)", $messageData);

$pusher->trigger($chat_channel, 'message-sent', $messageData);

echo json_encode(['status' => 'success']);
exit;

