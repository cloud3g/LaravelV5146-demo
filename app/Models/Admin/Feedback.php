<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];
}
