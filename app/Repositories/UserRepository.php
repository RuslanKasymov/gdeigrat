<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function get($id)
    {
        return User::find($id);
    }
}
