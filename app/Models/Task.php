<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    const STATUS_COMPLETED = 1;
    const STATUS_NOTEDONE = 0;

    function scopeTaskByUser($query, $user){
    $query->where('id', $user)->get();
    }
}
