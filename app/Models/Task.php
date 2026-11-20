<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'user_id'])]
class Task extends Model
{

    const STATUS_COMPLETED = 1;
    const STATUS_NOTEDONE = 0;

}
