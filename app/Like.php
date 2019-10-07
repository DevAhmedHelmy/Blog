<?php

namespace App;

use App\User;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
