<?php

use Core\App;
use Core\Database;

$admin = Core\Session::get('admin');
$db = App::resolve(Database::class);

$users = $db->query("
    SELECT users.*, user_images.name 
    FROM users 
    LEFT JOIN user_images ON users.user_id = user_images.user_id 
    WHERE users.email != :email
    ORDER BY created_at ASC
", [
    'email' => $admin['email']
])->get();

if (!$_GET['chat'] ?? false) {
    redirect("/messages?chat=" . $users[0]['user_id']);
}

$current_chat_mate = $db->query("
    SELECT users.*, user_images.name 
    FROM users 
    LEFT JOIN user_images ON users.user_id = user_images.user_id 
    WHERE users.user_id = :user_id
", [
    'user_id' => $_GET['chat']
])->find_or_fail();


$chat_history = $db->query("
    SELECT * FROM messages 
    WHERE (sender_id = :user_id AND recipient_id = :chat_mate_id) 
    OR (sender_id = :chat_mate_id AND recipient_id = :user_id) 
    ORDER BY sent_at ASC", [
    'chat_mate_id' => $_GET['chat'],
    'user_id' => $admin['user_id']
])->get();

require base_path('Http/views/messages/index.php');