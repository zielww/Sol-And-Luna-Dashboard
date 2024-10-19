<?php

namespace Core\Authenticator;

use Core\App;
use Core\Database;

class CustomerAuth
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function attempt(string $email): bool
    {
        return (bool) $this->db->query("select * from users where email = :email", ['email' => strtolower($email)])->find();
    }

    public function edit_attempt(string $email, string | int $user_id) : bool
    {
        $similar_email = (bool) $this->db->query('select * from users where email = :email and user_id = :user_id', ['email' => $email, 'user_id' => $user_id])
            ->find();

        if ($similar_email) {
            return false;
        }

        return $this->attempt($email);
    }
}