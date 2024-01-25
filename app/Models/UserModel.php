<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Change 'users' to your actual users table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    public function getUserByUsernameAndPassword($username, $password)
    {
        return $this->where('username', $username)
                    ->where('password', $password)
                    ->first();
    }
}
